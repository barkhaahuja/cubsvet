<?php

namespace controllers;

use DB\SQL\Mapper;
use models\Group;
use models\Note;
use models\Quiz;
use models\Response;
use models\User;
use models\Invalid_Logins;
use models\Activity_Log;
use models\Question;
use models\Response_New;
use utilities\SecurityUtility;
use utilities\LoggingUtility;

class UserController {

    public function index($f3) {
        $f3->set('content', 'user/page_profile.htm');
        $f3->set('isadmin',$f3->get('security')->isAdminGroup() );
        LoggingUtility::LogActivity("Viewed enterprise home screen");
        
        echo \Template::instance()->render('user/__layout-user.htm');
    }

    public function profile($f3) {
        LoggingUtility::LogActivity("Viewed his own user profile");
        $groups = new Group($f3->get('DB'));
		
        // call copy to post only here
        $f3->get('logged_user')->copyTo('POST');

        $f3->set('groups', $groups->all());
		
        $f3->set('content', 'user/page_edit.htm');
        $f3->set('isadmin',$f3->get('security')->isAdminGroup() );
        echo \Template::instance()->render('user/__layout-user.htm');
    }

    public function clinicians($f3) {
        
        LoggingUtility::LogActivity("Viewed all clinicians");
        
        $user = new User($f3->get('DB'));

        $f3->set('users', $user->allDoctors());
        // fix P0120-48
        $f3->set("unblocked", "");
        if("unblocked" == $f3->get('PARAMS.message'))
        {
                $f3->set("unblocked", "1");
        }
        // end
        $f3->set('content', 'user/page_clinicians.htm');
        $f3->set('isadmin',$f3->get('security')->isAdminGroup() );
        echo \Template::instance()->render('user/__layout-user.htm');
    }
    
     public function provideradmins($f3) {
        if($_SESSION["group_id"] != 5)
        {
            $f3->reroute('/user');
        }

        LoggingUtility::LogActivity("Viewed all provider admins");
        
        $user = new User($f3->get('DB'));

        $f3->set('users', $user->allProviderAdmins());
        // fix P0120-48
        $f3->set("unblocked", "");
        if("unblocked" == $f3->get('PARAMS.message'))
        {
                $f3->set("unblocked", "1");
        }
        // end
        $f3->set('content', 'user/page_provideradmins.htm');
        $f3->set('isadmin',$f3->get('security')->isAdminGroup() );
        echo \Template::instance()->render('user/__layout-user.htm');
    }
    

    public function users($f3) {
        
        LoggingUtility::LogActivity("Viewed all active patients");
         
        $user = new User($f3->get('DB'));
        $ownerid = $f3->get('SESSION.id');
       
        // fix P0120-48
        $f3->set("unblocked", "");
        if("unblocked" == $f3->get('PARAMS.message'))
        {
                $f3->set("unblocked", "1");
        }
        // end

        if ($f3->get('security')->isAdminGroup()) {
            $f3->set('users', $user->allActivePatients());
            $f3->set('content', 'user/page_users_steps.htm');
            //$f3->reroute('/user');
        } else {
            $f3->set('users', $user->allActivePatientsByOwnerid($ownerid));
            $f3->set('content', 'user/page_users_steps.htm');
        }
        $f3->set('isadmin',$f3->get('security')->isAdminGroup() );
        echo \Template::instance()->render('user/__layout-user.htm');
    }

    public function create($f3) {
        if ($f3->exists('POST.create')) {
            
			//checking for duplicate email/phone
			$tempUser = new User($f3->get('DB'));
			$tempUser->getByEmail(trim($f3->get('POST.email')));
			$valid = 1;
			if($tempUser->id > 0)
			{
				// add user form when post failed
				LoggingUtility::LogActivity("Add user form failed validation due to duplicate email");
				$valid = 0;
				$this->renderAddUserForm($f3,$f3->get('POST') ,"We cannot add this user ".trim($f3->get('POST.email')). " email is already associated with another user.");
				
			}
			if(trim($f3->get('POST.phone')) != '') {
				
				$tempUser->getByPhone(trim($f3->get('POST.phone')));
				if($tempUser->id > 0)
				{
					// add user form when post failed
					LoggingUtility::LogActivity("Add user form failed validation due to duplicate phone");
					$valid = 0;
					$this->renderAddUserForm($f3,$f3->get('POST') ,"We cannot add this user ".trim($f3->get('POST.phone')). " phone is already associated with another user.");
				}
			}
			
			if($valid)
			{
				
				$user = new User($f3->get('DB'));
				$user->add();
				$token = $this->insertToken($user->get('name'), $user->get('id'));
				$f3->set('token', $token);
				$f3->set('ori_password', $user->get('password'));
				$this->sendConfirmationMail($user->get('email'), $user->get('name'), $user->get('password'));
				
				if(isset ($_POST['sendcredentials']) && ($_POST['sendcredentials'] == 1 ))
				{ 
					$this->sendCredentialMail($user->get('email'), $user->get('name'), $user->get('password'));
				}
				
				LoggingUtility::LogActivity("Added a new patient " , json_encode($f3->get('POST')),"","", $user->get('id') );
				
				if($f3->get('POST.group_id') == 3)
				{
					$f3->reroute("/user/clinicians");
				}
				else if ($f3->get('POST.group_id') == 4)
				{
					$f3->reroute("/user/provideradmin");
				}
				else
				{
					$f3->reroute("/user/users");
				}
			}
			
        } else {
            LoggingUtility::LogActivity("Opened add patient form");
            $this->renderAddUserForm($f3);
        }
        $f3->set('isadmin',$f3->get('security')->isAdminGroup() );
        echo \Template::instance()->render('user/__layout-user.htm');
    }
	
	private function renderAddUserForm($f3, $input=array(), $errmessage = "")
	{	
		$groups = new Group($f3->get('DB'));
		if ($f3->get('security')->isDoctorGroup()) {
			$groups = $groups->getDoctorGroups();
		} else {
			$groups = $groups->all();
		}
		$f3->clear('POST');
		$f3->set('groups', array_reverse ($groups));
		$f3->set('POST', $input);
		$f3->set('errmessage', $errmessage);
		$f3->set('message', $f3->get('PARAMS.message'));
		$f3->set('content', 'user/page_edit.htm');
	}

    public function insertToken($token, $id) {
        $f3 = \Base::instance();

        $uniq_token = md5(uniqid($token, true));

        $date = new \DateTime();

        $r_token = new \DB\SQL\Mapper($f3->get('DB'), 'registration_token');

        $r_token->create_date = $date->format('Y-m-d H:i');
        $r_token->token = $uniq_token;
        $r_token->user_id = $id;
        $r_token->insert();

        return $uniq_token;
    }

    public function sendConfirmationMail($email, $name, $password) {
        $f3 = \Base::instance();
        $f3->set('email', $email);
        $f3->set('password', $password);

        //MAIL
        //$body = \Template::instance()->render('mail/confirmation.htm');
        $body = \Template::instance()->render('mail/user_confirmation_eboks.htm'); // fix P0120-19
        $message = $body;
        $to = $email;
        //$subject = "Aktivering af e-mail";
        $subject = "Aktivering"; // fix P0120-19

        $this->sendConfirmMail($f3, $to, $subject, $message);
    }
    
     public function sendCredentialMail($email, $name, $password) {
        $f3 = \Base::instance();
        $f3->set('email', $email);
        $f3->set('password', $password);

        //MAIL
        $body = \Template::instance()->render('mail/confirmation.htm');
        //$body = \Template::instance()->render('mail/user_confirmation_eboks.htm'); // fix P0120-19
        $message = $body;
        $to = $email;
        //$subject = "Aktivering af e-mail";
        $subject = "Aktivering"; // fix P0120-19

        $this->sendConfirmMail($f3, $to, $subject, $message);
    }

    public function download($f3) {
        // your file to upload
        $file = 'app/data/log/user/user_' . $f3->get('PARAMS.id') . '.log';
        if (file_exists($file)) {
            header("Expires: 0");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header("Content-type: application/octet-stream");
            // tell file size
            header('Content-length: ' . filesize($file));
            // set file name
            header('Content-disposition: attachment; filename=' . basename($file));
            readfile($file);
            // Exit script. So that no useless data is output-ed.
            exit;
        } else {
            $message = "User has not logged in";
            $fh = fopen($file, 'w');
            fwrite($fh, $message . "\n");
            fclose($fh);
            
            // downloading file
            // header("Expires: 0");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header("Content-type: application/octet-stream");
            // tell file size
            header('Content-length: ' . filesize($file));
            // set file name
            header('Content-disposition: attachment; filename=' . basename($file));
            readfile($file);
            // Exit script. So that no useless data is output-ed.
            exit;
            //$f3->reroute('/user/users');
        }
    }

    public function update($f3) {
           
        
        $user = new User($f3->get('DB'));

        if ($f3->exists('POST.update')) {
            
			// checking for duplicacy
			$tempUser = new User($f3->get('DB'));
			$tempUser->getByEmailExcept(trim($f3->get('POST.email')), $f3->get('POST.id'));
			
			
			$valid = 1;
			if($tempUser->id > 0)
			{
				// add user form when post failed
				$valid = 0;
				$f3->reroute(strtok($_SERVER['HTTP_REFERER'], '?')."?err=1&email=".trim($f3->get('POST.email')));
				
			}
			if(trim($f3->get('POST.phone')) != '') {
				
				$tempUser->getByPhoneExcept(trim($f3->get('POST.phone')), $f3->get('POST.id'));
				
				if($tempUser->id > 0)
				{
					// add user form when post failed
					$valid = 0;
					$f3->reroute(strtok($_SERVER['HTTP_REFERER'], '?')."?err=1&phone=".urlencode(trim($f3->get('POST.phone')) ));
				}
			}
			if($valid)
			{
			
				/*if($f3->get('SESSION.id') == $tempuser->id)
				{
					
					$f3->reroute("/user/profile");
				}
				else{
					// updating his users profile
					LoggingUtility::LogActivity("Updated details of patient " , json_encode($f3->get('POST')) ,"" ,"", $tempuser->id);
				}*/
				
				// end
				
				if ($f3->get('POST.stepA') == '') {
					$_POST['stepA'] = 0;
				}
				if ($f3->get('POST.stepB') == '') {
					$_POST['stepB'] = 0;
				}
				if ($f3->get('POST.step6') == '') {
					$_POST['step6'] = 0;
				}

				if ($_POST['stepB'] == 3 && $_POST['stepA'] == 0 && $_POST['step6'] == 0) {
					$_POST['stepB'] = 1;
				}
				if ($_POST['stepA'] == 3 && $_POST['stepB'] == 0 && $_POST['step6'] == 0) {
					$_POST['stepA'] = 1;
				}
				if ($_POST['step6'] == 3 && $_POST['stepB'] == 0 && $_POST['stepA'] == 0) {
					$_POST['stepA'] = 1;
				}

				if ($_POST['stepB'] == 2 && $_POST['stepA'] == 0 && $_POST['step6'] == 0) {
					$_POST['stepB'] = 1;
				}
				if ($_POST['stepA'] == 2 && $_POST['stepB'] == 0 && $_POST['step6'] == 0) {
					$_POST['stepA'] = 1;
				}
				if ($_POST['step6'] == 2 && $_POST['stepB'] == 0 && $_POST['stepA'] == 0) {
					$_POST['stepA'] = 1;
				}
				//------------------------------

				if ($_POST['stepB'] == 3 && $_POST['stepA'] == 2 && $_POST['step6'] == 0) {
					$_POST['stepA'] = 1;
					$_POST['stepB'] = 2;
				}
				if ($_POST['stepA'] == 3 && $_POST['stepB'] == 2 && $_POST['step6'] == 0) {
					$_POST['stepB'] = 1;
					$_POST['stepA'] = 2;
				}
				if ($_POST['step6'] == 3 && $_POST['stepB'] == 2 && $_POST['stepA'] == 0) {
					$_POST['stepB'] = 1;
					$_POST['step6'] = 2;
				}
				if ($_POST['step6'] == 3 && $_POST['stepA'] == 2 && $_POST['stepB'] == 0) {
					$_POST['stepA'] = 1;
					$_POST['step6'] = 2;
				}

				if ($_POST['stepB'] == 2 && $_POST['stepA'] == 2 && $_POST['step6'] == 0) {
					$_POST['stepB'] = 1;
				}
				if ($_POST['stepA'] == 2 && $_POST['stepB'] == 2 && $_POST['step6'] == 0) {
					$_POST['stepA'] = 1;
				}
				if ($_POST['step6'] == 2 && $_POST['stepB'] == 2 && $_POST['stepA'] == 0) {
					$_POST['stepA'] = 1;
				}

				//----------------------            
				if ($_POST['stepB'] == 3 && $_POST['stepA'] == 1 && $_POST['step6'] == 0) {
					$_POST['stepB'] = 2;
				}
				if ($_POST['stepA'] == 3 && $_POST['stepB'] == 1 && $_POST['step6'] == 0) {
					$_POST['stepA'] = 2;
				}
				if ($_POST['step6'] == 3 && $_POST['stepB'] == 1 && $_POST['stepA'] == 0) {
					$_POST['stepA'] = 2;
				}

				//--------------------------    
				if ($_POST['stepA'] == 1 && $_POST['stepB'] == 1 && $_POST['step6'] == 1) {
					$_POST['stepA'] = 1;
					$_POST['stepB'] = 2;
					$_POST['step6'] = 3;
				}
				if ($_POST['stepA'] == 2 && $_POST['step6'] == 2 && $_POST['stepB'] == 2) {
					$_POST['stepA'] = 1;
					$_POST['stepB'] = 2;
					$_POST['step6'] = 3;
				}
				if ($_POST['stepA'] == 3 && $_POST['step6'] == 3 && $_POST['stepB'] == 3) {
					$_POST['stepA'] = 1;
					$_POST['stepB'] = 2;
					$_POST['step6'] = 3;
				}

				if(trim($f3->get('POST.password')) != '')
				{
					$user = new User($f3->get('DB'));
					$user->getById($f3->get('POST.id'));
					$user->is_blocked = 0;
					$user->unsuccessful_login_tries = 0;
					$user->save();
				}
			
				if($f3->get('SESSION.id') == $user->id)
				{
					LoggingUtility::LogActivity("Updated his own user details " , json_encode($f3->get('POST')) );
				}
				else
				{
					$logginguser = new User($f3->get('DB'));
					$logginguser->getById($f3->get('POST.id'));
					LoggingUtility::LogActivity("Updated details of patient " , json_encode($f3->get('POST')) ,"" ,"", $logginguser->id);
				}

				$user->edit($f3->get('POST.id'));
				
				if($f3->get('POST.group_id') == 3)
				{
					$f3->reroute("/user/clinicians");
				}
				else if ($f3->get('POST.group_id') == 4)
				{
					$f3->reroute("/user/provideradmin");
				}
				else
				{
					$f3->reroute("/user/users");
				}
            }
            
        } else {
            
            $user->getById($f3->get('PARAMS.id'));
            LoggingUtility::LogActivity("Viewed details of patient ","","","", $user->id);
            
			if ($f3->get('security')->isAdminGroup() && (($user->group_id == 1) || ($user->group_id == 2) )) {
				$f3->reroute('/user');
			}      
			
            $ownr_id = $user->owner_id;
            $f3->set('discharged', $user->discharged);
            $f3->set('discharge_date', $user->discharge_date);
           
            $user->copyTo('POST');

            $groups = new Group($f3->get('DB'));
            if ($f3->get('security')->isDoctorGroup()) {
                $f3->set('groups', $groups->getDoctorGroups());
            } else {
                $f3->set('groups', $groups->all());
            }

            //editing a patient ? get his data
            $user = $f3->get('PARAMS.id');

            //data for negative circle
            $nc = new Mapper($f3->get('DB'), 'widget_negativecircle');
            $f3->set('ncs', $nc->find(array('user=?', $user)));

            //data for positive experience widget
            $noteModel = new Note($f3->get('DB'));
            $f3->set('notes', $noteModel->getByUser($user));

            //questionnaires data
            $responseModel = new Response($f3->get('DB'));
            $responseData = $responseModel->getPatientResponseData($user);
            $sixthQuestionnaireResponseData = $responseModel->getPatientSixthQuestionnaireResponseData($user);
            $followupQuestionnaireResponseData = $responseModel->getPatientSixthQuestionnaireResponseData($user);
            $liteResponseData = $responseModel->getPatientLiteResponseData($user);

            $out = array();
            foreach ($liteResponseData as $row) {
                $out[$row['question_id']] = $row;
            }
            
            //getting pre big questionnare data
            $response = new Response_New($f3->get('DB'));
            $f3->set('responses', $response->getQuestionnaireData(1,$user));
            // end
            $f3->set('followupQuestionnaireResponses', $response->getLiteQuestionnaireData(4,$user));
            $f3->set('sixthQuestionnaireResponses', $response->getQuestionnaireData(2,$user));
            
            $f3->set('literesponses', $response->getLiteQuestionnaireData(3,$user));
            $f3->set('liteIdsresponses', $response->getQuizIdForLiteQuestionnaires(3,$user));

            //data for problem goal widget
            $pg = new Mapper($f3->get('DB'), 'widget_problem_goal');
            $f3->set('pgs', $pg->find(array('user=?', $user)));

            // data for activity list widget
            $al = new Mapper($f3->get('DB'), 'widget_activity_list');
            $f3->set('all', $al->find(array('user=? AND ubication=?', $user, 'left')));
            $f3->set('alr', $al->find(array('user=? AND ubication=?', $user, 'right')));

            //data for NAT Registration
            $nat_reg = new Mapper($f3->get('DB'), 'widget_nat_registration');
            $f3->set('nat_list', $nat_reg->find(array('user_id=?', $user)));

            //data for NAT Negative circle
            $nat_negcldetails = $f3->get('DB')->exec('SELECT * FROM widget_nat_negcircle WHERE user=' . $user . ' order by create_date desc, step asc ');
            $nat_negclCount = $f3->get('DB')->exec('SELECT distinct negtht_id FROM widget_nat_negcircle WHERE user = ' . $user . '  order by negtht_id desc, step asc ');

            if ($nat_negcldetails) {
                $f3->set('nat_neg_list', $nat_negcldetails);
                $f3->set('nat_neg_list_count', $nat_negclCount);
            } else {
                $f3->set('nat_neg_list', '');
                $f3->set('nat_neg_list_count', 0);
            }

            //data for NAT challenges
            /*$nat_negchdetails = $f3->get('DB')->exec('SELECT * FROM nat_challenges WHERE user_id=' . $user . ' GROUP BY nc_id');
            $nat_negch = '';
            foreach ($nat_negchdetails as $key => $data) {
                $nat_ncid = $data['nc_id'];
                $nat_negch = $f3->get('DB')->exec('SELECT * FROM nat_challenges WHERE user_id=' . $user . ' AND nc_id=' . $nat_ncid);
            }
            */
            $nat_negch = $f3->get('DB')->exec('SELECT nat_challenges.*,widget_activity_list.date_start, widget_activity_list.date_end 
                                                FROM nat_challenges 
                                                left join widget_activity_list  on  nat_challenges.event_id = widget_activity_list.id
                                                WHERE user_id='.$user.'  order by created_at desc; ');
            $f3->set('nat_ch_list', $nat_negch);

            //data for liveregler tasks step A
            /*$liv_details = $f3->get('DB')->exec('SELECT * FROM leveregler_tasks WHERE user_id=' . $user . ' GROUP BY lc_id');
            $livtask_lst = '';
            foreach ($liv_details as $key => $data) {
                $liv_lcid = $data['lc_id'];
                $livtask_lst = $f3->get('DB')->exec('SELECT * FROM leveregler_tasks WHERE user_id=' . $user . ' AND lc_id=' . $liv_lcid);
            }*/
            $livtask_lst = $f3->get('DB')->exec('SELECT leveregler_tasks.*,widget_activity_list.date_start, widget_activity_list.date_end 
                                                FROM leveregler_tasks 
                                                left join widget_activity_list  on  leveregler_tasks.event_id = widget_activity_list.id
                                                WHERE user_id='.$user.'  order by created_at desc; ');
            $f3->set('livglr_list', $livtask_lst);

            //data for depressive tasks step B
            /*$deprs_details = $f3->get('DB')->exec('SELECT * FROM depressive_tasks WHERE user_id=' . $user . ' GROUP BY id');
            $deprstask_lst = '';
            foreach ($deprs_details as $key => $data) {
                $dep_lcid = $data['id'];
                $deprstask_lst = $f3->get('DB')->exec('SELECT * FROM depressive_tasks WHERE user_id=' . $user . ' AND id=' . $dep_lcid);
            }*/
            $deprstask_lst = $f3->get('DB')->exec('
            SELECT depressive_tasks.*, 

            (select widget_activity_list.date_start from widget_activity_list where widget_activity_list.id = depressive_tasks.m9_event) as m9_event_start,
            (select widget_activity_list.date_end from widget_activity_list where widget_activity_list.id = depressive_tasks.m9_event) as m9_event_end,

            (select widget_activity_list.date_start from widget_activity_list where widget_activity_list.id = depressive_tasks.m10_event) as m10_event_start,
            (select widget_activity_list.date_end from widget_activity_list where widget_activity_list.id = depressive_tasks.m10_event) as m10_event_end,

            (select widget_activity_list.date_start from widget_activity_list where widget_activity_list.id = depressive_tasks.m11_event) as m11_event_start,
            (select widget_activity_list.date_end from widget_activity_list where widget_activity_list.id = depressive_tasks.m11_event) as m11_event_end

            FROM depressive_tasks 
            WHERE user_id='.$user.' order by id desc; ');
            
            $f3->set('deprstask_list', $deprstask_lst);
            
            //diver activity
            $deprstask_lst_1 = $f3->get('DB')->exec('select * from user_diversionary_activity where  user_id = '.$user.' order by id desc;');
            $f3->set('deprstask_lst_1', $deprstask_lst_1);
            
            //user risk details for step 6
            $usr_risk = new Mapper($f3->get('DB'), 'user_risks');
            $f3->set('risk_list', $usr_risk->find(array('user_id=?', $user)));

            //user warning details for step 6
            $usr_warning = new Mapper($f3->get('DB'), 'user_warnings');

            //litequizgraph
            $data_1 = array();
            $labels = array();
            $tcount = 0;

            $litequizdetails = $f3->get('DB')->exec('SELECT SUM(R.option_value)as total,Q.id,Q.user_id 
                        FROM mapping_questionnaire_user Q, response_new R 
                        WHERE Q.questionnaire_id=3
                        AND Q.user_id='.$user.'
                        AND Q.id=R.quiz_id
                        AND R.isoptional = 0 GROUP BY R.quiz_id');
            $max_X = 0;
            $gph_data = '[';

            for ($i = 0; $i < count($litequizdetails); $i++) {
                $litequiz = $litequizdetails[$i];
                $data_1[] = $litequiz['total'];
                $step_value = $i + 1;
                $labels[] = $step_value;
                $tcount++;

                $gph_data .= '{x: ' . $step_value . ',y: ' . $litequiz['total'] . '},';
            }

            $graph_data = json_encode($data_1);
            $graph_Label = json_encode($labels);

            if (isset($labels) && sizeof($labels) > 0) {
                $max_X = max($labels);

                if ($max_X < 10) {
                    $max_X = 10;
                }
            }

            $gph_data = rtrim($gph_data, ',');

            $gph_data .= ']';

            $f3->set('gdatas', $graph_data);
            $f3->set('glabels', $graph_Label);
            $f3->set('tcount', $tcount);

            $f3->set('gphdata', $gph_data);
            $f3->set('highx', $max_X);

            /* end graph section */

            $userdatedetails = $f3->get('DB')->exec('SELECT start_date,end_date FROM questionnaire WHERE category=1');
            foreach ($userdatedetails as $key => $data) {
                $startdate = $data['start_date'];
                $enddate = $data['end_date'];
            }

            /** new code **/
            
            $f3->set('followup_questionnaire_start_date', $response->getQuestionnaireStartDate(4, $user));
            $f3->set('followup_questionnaire_end_date', $response->getQuestionnaireEndDate(4, $user));
            $f3->set('sixth_questionnaire_start_date', $response->getQuestionnaireStartDate(2, $user));
            $f3->set('sixth_questionnaire_end_date', $response->getQuestionnaireEndDate(2, $user)); 
            $f3->set('questionnaire_start_date', $response->getQuestionnaireStartDate(1, $user));
            $f3->set('questionnaire_end_date', $response->getQuestionnaireEndDate(1, $user));
            $f3->set('lite_questionnaire_start_date', $response->getQuestionnaireStartDate(3, $user));
            $f3->set('lite_questionnaire_end_date', $response->getQuestionnaireEndDate(3, $user));
                
             /** end new code **/
            
            $f3->set('warning_list', $usr_warning->find(array('user_id=?', $user)));

            //DOCTOR 
            $dctname = '';
            if ($ownr_id) {
                $doctordetails = $f3->get('DB')->exec('SELECT name,last_name FROM user WHERE id=' . $ownr_id);

                foreach ($doctordetails as $key => $dctdata) {
                    $fname = $dctdata['name'];
                    $lname = $dctdata['last_name'];

                    $dctname = ucwords($fname) . " " . ucwords($lname);
                }

                $f3->set('doctor', $dctname);
            }
            
            
            $f3->set('user', $user);
            $f3->set('message', $f3->get('PARAMS.message'));
              
            $f3->set('content', 'user/page_edit.htm');
        }
        $f3->set('isadmin',$f3->get('security')->isAdminGroup() );
        echo \Template::instance()->render('user/__layout-user.htm'); 
    }

    public function update_ajax($f3) {
        LoggingUtility::LogActivity("Updated his own notification settings",json_encode($f3->get('POST') ));
        $user = new User($f3->get('DB'));
        $user->edit($f3->get('POST.id'));
    }

    /**
     * Update from Settings Profile
     * @param \Base $f3
     */
    public function update_simple($f3) {
        
        if(!isset($_POST["password"]))
        {
            LoggingUtility::LogActivity("Updated his own profile settings",json_encode($f3->get('POST') ));
        }
        else
        {
            LoggingUtility::LogActivity("Updated his own password");
        }

        $user = new User($f3->get('DB'));
        $user->edit($f3->get('POST.id'));
        
        if ($user->isFirstLogin()) {
            $f3->reroute('/');
        } else {
            $f3->reroute('/section/settings.profile');
        }
    }

    /**
     * Update step for the user logged-in
     * @param \Base $f3
     */
    public function update_step($f3) {
		
        $user = new User($f3->get('DB'));
        $mail_notify = new User($f3->get('DB'));
        $user->edit($f3->get('POST.id'));

        $mail_notify->getById($f3->get('POST.id'));
        $step = $f3->get('POST.treatment_step');
		
        //---mail notification
        if ($step == 1.12) {

            $email = $mail_notify->email;
            $name = $mail_notify->name;
            $password = $mail_notify->password;
            $completed_step = $mail_notify->completed_step;
            $id = $mail_notify->id;
            $ownerid = $mail_notify->owner_id;
            $doctordetails = $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid);
            foreach ($doctordetails as $key => $data) {
                $doctormail = $data['email'];
            }
            $f3->set('email', $email);
            $f3->set('completed_step', '1');
            $f3->set('name', $name);
            $f3->set('id', $id);
            $f3->set('cc_clinician', $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid));

            //MAIL
            $body = \Template::instance()->render('mail/step_notification.htm');
            
            $patientName = $mail_notify->name. " ". $mail_notify->last_name;
            $body = str_replace("{patient_name}", $patientName, $body);

            $message = $body;
            //$to = $email;
            //$cc = $doctormail;
            $to = $doctormail;
            $cc = "";
            $subject = "Færdiggørelse af trin 1 i NoDep";

            if($mail_notify->discharged == 0)
            {
                 $this->sendStepMail($f3, $to, $cc, $subject, $message); 
            }
          
        }
        if ($step == 2.8) {
            $email = $mail_notify->email;
            $name = $mail_notify->name;
            $password = $mail_notify->password;
            $completed_step = $mail_notify->completed_step;
            $id = $mail_notify->id;
            $ownerid = $mail_notify->owner_id;
            $doctordetails = $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid);
            foreach ($doctordetails as $key => $data) {
                $doctormail = $data['email'];
            }
            $f3->set('email', $email);
            $f3->set('completed_step', '2');
            $f3->set('name', $name);
            $f3->set('id', $id);
            $f3->set('cc_clinician', $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid));

            //MAIL
            $body = \Template::instance()->render('mail/step_notification.htm');
            
            $patientName = $mail_notify->name. " ". $mail_notify->last_name;
            $body = str_replace("{patient_name}", $patientName, $body);

            $message = $body;
            //$to = $email;
            //$cc = $doctormail;
            $to = $doctormail;
            $cc = "";
            $subject = "Færdiggørelse af trin 2 i NoDep";

           if($mail_notify->discharged == 0)
            {
                 $this->sendStepMail($f3, $to, $cc, $subject, $message); 
            }
        }
        if ($step == 3.12) {
            $email = $mail_notify->email;
            $name = $mail_notify->name;
            $password = $mail_notify->password;
            $completed_step = $mail_notify->completed_step;
            $id = $mail_notify->id;
            $ownerid = $mail_notify->owner_id;
            $doctordetails = $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid);
            foreach ($doctordetails as $key => $data) {
                $doctormail = $data['email'];
            }
            $f3->set('email', $email);
            $f3->set('completed_step', '3');
            $f3->set('name', $name);
            $f3->set('id', $id);
            $f3->set('cc_clinician', $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid));

            //MAIL
            $body = \Template::instance()->render('mail/step_notification.htm');
            
            $patientName = $mail_notify->name. " ". $mail_notify->last_name;
            $body = str_replace("{patient_name}", $patientName, $body);

            $message = $body;
            //$to = $email;
            //$cc = $doctormail;
            $to = $doctormail;
            $cc = "";
            $subject = "Færdiggørelse af trin 3 i NoDep";

            if($mail_notify->discharged == 0)
            {
                 $this->sendStepMail($f3, $to, $cc, $subject, $message); 
            }
        }
        if ($step == 4.8) {
            $email = $mail_notify->email;
            $name = $mail_notify->name;
            $password = $mail_notify->password;
            $completed_step = $mail_notify->completed_step;
            $id = $mail_notify->id;
            $ownerid = $mail_notify->owner_id;
            $doctordetails = $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid);
            foreach ($doctordetails as $key => $data) {
                $doctormail = $data['email'];
            }
            $f3->set('email', $email);
            $f3->set('completed_step', '4');
            $f3->set('name', $name);
            $f3->set('id', $id);
            $f3->set('cc_clinician', $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid));

            //MAIL
            $body = \Template::instance()->render('mail/step_notification.htm');
            
            $patientName = $mail_notify->name. " ". $mail_notify->last_name;
            $body = str_replace("{patient_name}", $patientName, $body);

            $message = $body;
            //$to = $email;
            //$cc = $doctormail;
            $to = $doctormail;
            $cc = "";
            $subject = "Færdiggørelse af trin 4 i NoDep";

            if($mail_notify->discharged == 0)
            {
                 $this->sendStepMail($f3, $to, $cc, $subject, $message); 
            }
        }

        if ($step == 5.5 || $step == 5.8) {

            $email = $mail_notify->email;
            $name = $mail_notify->name;
            $password = $mail_notify->password;
            $completed_step = $mail_notify->completed_step;
            $id = $mail_notify->id;
            $ownerid = $mail_notify->owner_id;
            $doctordetails = $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid);
            foreach ($doctordetails as $key => $data) {
                $doctormail = $data['email'];
            }
            $f3->set('email', $email);
            $f3->set('completed_step', '5');
            $f3->set('name', $name);
            $f3->set('id', $id);
            $f3->set('cc_clinician', $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid));

            //MAIL
            $body = \Template::instance()->render('mail/step_notification.htm');
            
            $patientName = $mail_notify->name. " ". $mail_notify->last_name;
            $body = str_replace("{patient_name}", $patientName, $body);

            $message = $body;
            //$to = $email;
            //$cc = $doctormail;
            $to = $doctormail;
            $cc = "";
            $subject = "Færdiggørelse af trin 5 i NoDep";

           if($mail_notify->discharged == 0)
            {
                 $this->sendStepMail($f3, $to, $cc, $subject, $message); 
            }
        }
        if ($step == 6.15) {
            $email = $mail_notify->email;
            $name = $mail_notify->name;
            $password = $mail_notify->password;
            $completed_step = $mail_notify->completed_step;
            $id = $mail_notify->id;
            $ownerid = $mail_notify->owner_id;
            $doctordetails = $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid);
            foreach ($doctordetails as $key => $data) {
                $doctormail = $data['email'];
            }

            $f3->set('email', $email);
            $f3->set('completed_step', 'A');
            $f3->set('name', $name);
            $f3->set('id', $id);
            $f3->set('ownerid', $ownerid);
            $f3->set('cc_clinician', $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid));

            //MAIL
            $body = \Template::instance()->render('mail/step_notification.htm');
            
            $patientName = $mail_notify->name. " ". $mail_notify->last_name;
            $body = str_replace("{patient_name}", $patientName, $body);

            $message = $body;
            //$to = $email;
            //$cc = $doctormail;
            $to = $doctormail;
            $cc = "";
            $subject = "Færdiggørelse af trin A i NoDep";

           if($mail_notify->discharged == 0)
            {
                 $this->sendStepMail($f3, $to, $cc, $subject, $message); 
            }
        }
        if ((string)$step === "7.30") {
           
            $email = $mail_notify->email;
            $name = $mail_notify->name;
            $password = $mail_notify->password;
            $completed_step = $mail_notify->completed_step;
            $id = $mail_notify->id;
            $ownerid = $mail_notify->owner_id;
            $doctordetails = $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid);
            foreach ($doctordetails as $key => $data) {
                $doctormail = $data['email'];
            }
            $f3->set('email', $email);
            $f3->set('completed_step', 'B');
            $f3->set('name', $name);
            $f3->set('id', $id);
            $f3->set('cc_clinician', $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid));

            //MAIL
            $body = \Template::instance()->render('mail/step_notification.htm');
            
            $patientName = $mail_notify->name. " ". $mail_notify->last_name;
            $body = str_replace("{patient_name}", $patientName, $body);

            $message = $body;
            //$to = $email;
            //$cc = $doctormail;
            $to = $doctormail;
            $cc = "";
            $subject = "Færdiggørelse af trin B i NoDep";

            if($mail_notify->discharged == 0)
            {
                 $this->sendStepMail($f3, $to, $cc, $subject, $message); 
            }
        }
        if ($step == 8.14) {

            $email = $mail_notify->email;
            $name = $mail_notify->name;
            $password = $mail_notify->password;
            $completed_step = $mail_notify->completed_step;
            $id = $mail_notify->id;
            $ownerid = $mail_notify->owner_id;
            $doctordetails = $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid);

            foreach ($doctordetails as $key => $data) {
                $doctormail = $data['email'];
            }
            $f3->set('email', $email);
            $f3->set('completed_step', '6');
            $f3->set('name', $name);
            $f3->set('id', $id);
            $f3->set('cc_clinician', $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid));

            //MAIL
            $body = \Template::instance()->render('mail/step_notification.htm');
            
            $patientName = $mail_notify->name. " ". $mail_notify->last_name;
            $body = str_replace("{patient_name}", $patientName, $body);

            $message = $body;
            //$to = $email;
            //$cc = $doctormail;
            $to = $doctormail;
            $cc = "";
            $subject = "Færdiggørelse af trin 6 i NoDep";

            if($mail_notify->discharged == 0)
            {
                 $this->sendStepMail($f3, $to, $cc, $subject, $message); 
            }
        }
		
        SecurityUtility::checkForPatientDischarge($mail_notify->id, $step);
        echo json_encode(array('status' => true));
        exit;
    }

    public function mail_notification_step($f3) {
        $user = new User($f3->get('DB'));
        $uid = $f3->get('SESSION.id');
        $user->getById($f3->get('POST.id'));

        $email = $user->email;
        $name = $user->name;
        $password = $user->password;
        $id = $user->id;
        $ownerid = $user->owner_id;
        $completed_step = $user->completed_step;

        $f3 = \Base::instance();
        $f3->set('email', $email);
        $f3->set('password', $password);
        $f3->set('name', $name);
        $f3->set('id', $id);
        $f3->set('cc_clinician', $f3->get('DB')->exec('SELECT email FROM user where id=' . $ownerid));

        $to = $email;
        require_once(__DIR__ . '/../../3rdparty/smtp-mail/class.phpmailer.php');
        $mail = new \PHPMailer;
        $body = '';
        $mail->IsSMTP(); // telling the class to use SMTP

        $mail->SetFrom('admin@totem.com', 'NoDep');
        $mail->AddAddress($email, $name);
        $mail->Subject = "";

        $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
        //$mail->AddBCC('pradeep@atdrive.com', 'Doctor');
        //$mail->AddBCC('rahul@atdrive.com', 'Doctor');
        $mail->AddBCC('pradeep@atdrive.com', 'Doctor');
        $mail->MsgHTML($body);
        $mail->Send();

        echo json_encode(array('status' => true));
        exit;
    }

    /**
     * Check Password from Settings Profile
     * @param \Base $f3
     */
    public function check_password_simple($f3) {
        $user = $f3->get('SESSION.user');
        $pass = $f3->get('POST.password');

        $status = $f3->get('security')->bind($user, $pass) ? 'success' : 'error';
        $user = new User($f3->get('DB'));
        $user = $user->getById($f3->get('SESSION.id'));
        if ($status == 'success') {
            if (($user->completed_step == 1.12) || ($user->completed_step == 2.8) || ($user->completed_step == 3.12) || ($user->completed_step == 4.8) || ($user->completed_step == 6.15) || ($user->completed_step == 5.5) || ($user->completed_step == 5.8) || ($user->completed_step == 7.30) || ($user->completed_step == 8.14)) {
                $_SESSION['ldqz'] = 1;
            }
        }

        echo json_encode(array('status' => $status));
    }

    function delete($f3) {
        if ($f3->exists('PARAMS.id')) {
            $user = new User($f3->get('DB'));
                      
            $logginguser = new User($f3->get('DB'));
            $logginguser->getById($f3->get('PARAMS.id'));
            if($logginguser->discharged!=1){ //P095-305 only active users can be Deleted.
            LoggingUtility::LogActivity("Deleted patient ","","","",$logginguser->id );
            $user->delete($f3->get('PARAMS.id'));
            }
            if($logginguser->group_id == 3)
            {
                $f3->reroute("/user/clinicians");
            }
            else if ($logginguser->group_id == 4)
            {
                $f3->reroute("/user/provideradmin");
            }
            else
            {
                $f3->reroute("/user/users");
            }
            
        }

        
        $f3->reroute('/user/users');
    }

    /**
     *
     * @param \Base $f3
     */
    function confirmUser($f3) {

        $params = $f3->get('PARAMS');

        $f3->scrub($params);
        $r_token = new \DB\SQL\Mapper($f3->get('DB'), 'registration_token');
        $user = new User($f3->get('DB'));
        $r_token->load(array('token=?', $params['token']));

        $user->load(array('id=?', $r_token->user_id));
        $date = strtotime($r_token->get('create_date'));
        $expire_date = (int) $f3->get('expiration_limit') * 7 * 24 * 3600;

        if ((time() - $date) <= $expire_date) {

            $user->confirmed = 1;

            $user->save();
            
            $hisOrHer=($user->sex=="Male")?("his"):(($user->sex=="Female")?"her":"their");//P095-321
            $logMessage="Activated ".$hisOrHer." account.";
			
			LoggingUtility::LogActivity($logMessage,"",$user->email);
            
            // Fixing P0120-49 
            /*$message = $user->getById($r_token->user_id);
            $f3 = \Base::instance();
            $f3->set('user_email', base64_decode($params['email']));
            $f3->set('user_password', base64_decode($params['password']));
            $f3->set('user_name', $user->name);

            $body = \Template::instance()->render('mail/confirmation_revert.htm');

            $this->sendConfirmMail_Revert($f3, $message->email, "Konto Aktivering mail", $body);
            */

            // create big quiz instance this user need to complete after
            // registration only if is not a doctor or an administrator
            if (!$user->isDoctorGroup() && !$user->isAdminGroup()) {
                $quiz = new Quiz($f3->get('DB'));
                //$quiz->createBigQuestionnaireForUser($user);
            }

            $r_token->erase();

            $f3->reroute('/login');
        } else {
            $r_token->erase();
            echo \Template::instance()->render('user/expirate_register.htm');
        }
    }

    public function sendValidation($email, $name) {
        $to = $email;
        $subject = "Validation your registration";
        $message = \Template::instance()->render('mail/user_validation.htm');
        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $header .= 'To:' . $name . '<' . $email . '>' . "\r\n";
        $header .= "From: noreply@totem.com \r\n";

        mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', "$message", $header);
    }

    function beforeRoute($f3) {

        if ($f3->get('PATTERN') == '/user/confirm/@token/@email/@password')
            return TRUE;

        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');

        // All users can change his data
        if ($f3->get('PATTERN') == '/user/update_simple' OR
                $f3->get('PATTERN') == '/user/check_password_simple' OR
                $f3->get('PATTERN') == '/user/update/step' OR
                $f3->get('PATTERN') == '/user/update_ajax'
        )
            return TRUE;

        // ACL, not a Doctor or Admin, redirect to home page
        if (!($f3->get('security')->isDoctorGroup() || $f3->get('security')->isAdminGroup()))
            $f3->reroute('/');

        // load current logged user
        $user = new User($f3->get('DB'));
        $user->getById($f3->get('SESSION.id'));
        // make variables available
        $f3->set('logged_user', $user);
        $f3->set('message', $f3->get('PARAMS.message'));
    }

    public function sendUserSMS($f3, $message, $mobnum) {
		// fix P083-520
		if(trim($mobnum) == "")
		{
			return true;
		}
		
        $msg = $message;
        if (strlen($msg) > 450) {
            $msg = substr($msg, 0, 450);
        }
        // The neccesary variables are set.
        $url = $f3->get('SMSurl');
        $url .= "?message=" . urlencode($msg);
        $url .= "&recipient=" . $mobnum; // Recipient
        $url .= $f3->get('SMSusername'); // Username
        $url .= $f3->get('SMSpassword'); // Password
        $url .= "&from=" . urlencode("NoDep"); // Sendername
        $url .= $f3->get('SMSutf'); // UTF8
        // The url is opened
       $checker = SendSMS::replier($url);
        if($checker == TRUE)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function sendStepMail($f3, $to, $cc = "", $subject, $message) {

        // To send HTML mail
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'From: NoDep <admin@internetpsykiatrien.com>' . "\r\n";
        $headers .= "Cc: " . $cc . "\r\n";
        //$headers .= 'Bcc: mohammed.shabbir@ccbt.co.uk' . "\r\n";
        //$headers .= 'Bcc: pradeep@atdrive.com' . "\r\n";
        //$headers .= 'Bcc: rahul@atdrive.com' . "\r\n";
        $headers .= 'Bcc: pradeep@atdrive.com' . "\r\n";
        // Mail it
        mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
    }

    public function sendConfirmMail($f3, $to, $subject, $message) {
        // To send HTML mail
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'From: NoDep <admin@internetpsykiatrien.com>' . "\r\n";
        // Mail it
        mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers, '-frajeesh.vr@sherston.com');
    }

    public function sendConfirmMail_Revert($f3, $to, $subject, $message) {
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'From: NoDep <admin@internetpsykiatrien.com>' . "\r\n";
        // Mail it
        mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers, '-frajeesh.vr@sherston.com');
    }

    /*
    public function disable_lite_questionnaireById($f3) {
        if ($f3->exists('PARAMS.id')) {
            $user = new User($f3->get('DB'));
            $quiz = new Quiz($f3->get('DB'));
            $quiz->deleteLiteSixthQuestionnaireForUser($f3->get('PARAMS.id'));
            $user->disableLiteQuestionnaireById($f3->get('PARAMS.id'));
        }
        $f3->reroute('/user/users');
    }
    */
    
    public function discharge($f3)
    {
        if ($f3->exists('PARAMS.id')) {
            $user = new User($f3->get('DB'));
            $user->getById($f3->get('PARAMS.id'));
            $quiz = new Quiz($f3->get('DB'));
            $quiz->deleteAllQuestionnaireForUser($f3->get('PARAMS.id'));
			
            //$user->disableLiteQuestionnaireById($f3->get('PARAMS.id'));
            
            $currentTime = date('Y-m-d H:i:s', time());
            $newdate = strtotime ( '+180 days' , strtotime ( $currentTime ) ) ;
            $gracePeriodExpiry = date ( 'Y-m-j H:i:s' , $newdate );

            $f3->get('DB')->exec("UPDATE user SET discharged = 1, discharge_date = '".$currentTime."', grace_period_expires_on = '". $gracePeriodExpiry ."' where id=" . $f3->get('PARAMS.id'));
            
            LoggingUtility::LogActivity("Manually discharged patient ","","","",$user->id );
            
            // sending out mail
            $body = \Template::instance()->render('mail/discharged.htm');
            $message = $body;
            $to = $user->email;
            $subject = "Afslutning af NoDep";

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

            // Additional headers
            $headers .= 'From: NoDep <admin@internetpsykiatrien.com>' . "\r\n";
            $headers .= 'Bcc: pradeep@atdrive.com' . "\r\n";
            mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers, '-pradeep@atdrive.com');

        }
        
        $f3->reroute('/user/users');
    }
    
    public function discharged_users($f3) {
        
        /*if ($f3->get('security')->isAdminGroup()) {
            $f3->reroute('/user');
        } */
        
        $user = new User($f3->get('DB'));
        $ownerid = $f3->get('SESSION.id');
        
        // fix P0120-48
        $f3->set("unblocked", "");
        if("unblocked" == $f3->get('PARAMS.message'))
        {
           $f3->set("unblocked", "1");
        }
        // end

        if ($f3->get('security')->isAdminGroup()) {
            $f3->set('users', $user->allDischargedPatients());
            $f3->set('content', 'user/page_discharged_users.htm');
        }
        else if($f3->get('security')->isDoctorGroup())
        {
            LoggingUtility::LogActivity("Viewed all discharged patients");
            $f3->set('users', $user->allDischargedPatientsByOwnerid($ownerid ));
            $f3->set('content', 'user/page_discharged_users.htm');
        }
        $f3->set('isadmin',$f3->get('security')->isAdminGroup() );
        echo \Template::instance()->render('user/__layout-user.htm');
    }
    
    public function finish($f3)
    {
        if ($f3->exists('PARAMS.id')) {
            $user = new User($f3->get('DB'));
            $quiz = new Quiz($f3->get('DB'));
            $quiz->deleteLiteQuestionnaireForUser($f3->get('PARAMS.id'));
            $user->disableLiteQuestionnaireById($f3->get('PARAMS.id'));
            //$f3->get('DB')->exec('UPDATE user SET discharged = 1 where id=' . $f3->get('PARAMS.id'));
        }
        
        $f3->reroute('/user/users');
    }
    
    public function unblock($f3)
    {
        if ($f3->exists('PARAMS.id')) {
            $user = new User($f3->get('DB'));
            $user->getById($f3->get('PARAMS.id'));
            $user->is_blocked = 0;
            $user->unsuccessful_login_tries = 0;
            if($user->discharged)
            {
                $user->save();
                $f3->reroute('/user/dischargedusers/unblocked');
            }
            else if($user->group_id == 3)
            {
                $user->save();
                LoggingUtility::LogActivity("Account un-blocked");
                $f3->reroute('/user/clinicians/unblocked');
            }
            else if($user->group_id == 4)
            {
                $user->save();
                LoggingUtility::LogActivity("Account un-blocked");
                $f3->reroute('/user/provideradmin/unblocked');
            }
            else if($user->group_id == 2 || $user->group_id == 1 )
            {
                LoggingUtility::LogActivity("Unblocked account of patient ".$user->id);
            }
            
            
            $user->save();
            $f3->reroute('/user/users/unblocked');
        }

        $f3->reroute('/user/users');
    }
    
    public function invalid_logins($f3)
    {
        LoggingUtility::LogActivity("Viewed invalid logins for patients");
        $user = new Invalid_Logins($f3->get('DB'));
        $ownerid = $f3->get('SESSION.id');
        
        $ownergroup = new User($f3->get('DB'));
        $ownergroup = $ownergroup->getById($ownerid);
        $ownergroup = $ownergroup->group_id;
       
        if ( ($ownergroup!=1) && ($ownergroup!=2)) {
           
            $f3->set('users', $user->allInvalidLoginsByOwnerid($ownerid, $ownergroup));
           
            $f3->set('content', 'user/page_users_invalid_logins.htm');
        }
        $f3->set('isadmin',$f3->get('security')->isAdminGroup() );
        echo \Template::instance()->render('user/__layout-user.htm');
    }
	
    public function GetActivityLog($f3)
    {
        $alog = new Activity_Log($f3->get('DB'));
        $userid = $f3->get('PARAMS.id');
		
		if (($userid != 0) && (trim($userid)!= "")) {
           
			 if($f3->get('SESSION.group_id') > 3)
			 {
				$jujer = new User($f3->get('DB'));
				$jujer->getById($userid);
				
				$f3->set('name', $jujer->email);
				$f3->set('users', $alog->GetActivityLog($userid));
           
				$f3->set('content', 'user/clinician_logs.htm');
			 }
			 else
			 {
				$f3->reroute('/user');
			 }

        }
		else{
			$f3->reroute('/user');
		}
		
        $f3->set('isadmin',$f3->get('security')->isAdminGroup() );
        echo \Template::instance()->render('user/__layout-user.htm');
    }

    public function calendar($f3) {
        $f3->set('content', 'user/calendar.htm');
      
        echo \Template::instance()->render('user/__layout-user.htm');
    }
    
    
	
    
}
