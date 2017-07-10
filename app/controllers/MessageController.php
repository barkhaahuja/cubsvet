<?php

namespace controllers;

use models\User;
use utilities\SecurityUtility;
use utilities\LoggingUtility;

class MessageController {

    function index($f3) {
           
        $security = $f3->get('security');
        if (!$security->check_login())
            $f3->reroute('/login');

        if (isset($_REQUEST['uid'])) {
            $uid = $_REQUEST['uid'];
        } else {
            $uid = 0;
        }
         
        // for logging only
		if(isset($_REQUEST['uid']))
		{
			$logginuser = new User($f3->get('DB'));
			$logginuser->getById($uid);
			LoggingUtility::LogActivity("Viewed messaging for user ", "", "", "", $logginuser->id);
		}
        
        // end
        
        // discharged status
        $dischargedUserID = 0;
        if($uid != 0)
        {
           $dischargedUserID = $uid;
        }
        else
        {
           $dischargedUserID = $f3->get('SESSION.id');
        }
        $patientuser = new User($f3->get('DB'));
        $patientuser = $patientuser->getById($dischargedUserID);
        $f3->set('discharged', $patientuser->discharged);
        //$f3->set('discharge_date', $user->discharge_date);
        // end

        if ($f3->get('security')->isDoctorGroup() || $f3->get('security')->isAdminGroup()) {
            $f3->set('showAdminButton', true);
        }
        
        $user_id = $f3->get('SESSION.id');

        $user = new User($f3->get('DB'));
        $user = $user->getById($f3->get('SESSION.id'));

        $f3->set('currentStep', $user->getCurrentStep() ? : 1);
        $f3->set('currentSubStep', $user->getCurrentSubStep() ? : 0);
        $f3->set('completedStep', $user->getCompletedStep());

        $first_chat = 0;

        //chat first time check
        $msgdata = $f3->get('DB')->exec('SELECT * FROM message_threads A, user B WHERE A.user_id=B.id AND A.user_id=' . $user_id);

        if (!$msgdata) {
            $first_chat = 1;
        }
        
        if (isset($first_chat)) {
            $f3->set('firstChat', $first_chat);
        }

        $doct = 0;

        if ($uid) {
            $userdata = $f3->get('DB')->exec('SELECT name FROM user where id=' . $uid);
            $doct = 1;

            if ($userdata) {
                foreach ($userdata as $k => $d)
                    ;

                $f3->set('sendername', $d['name']);
            }
        } else {
            $userdata = $f3->get('DB')->exec('SELECT owner_id FROM user where id=' . $user_id);

            if ($userdata) {
                foreach ($userdata as $k => $d)
                    ;

                $oid = $d['owner_id'];

                $userdata1 = $f3->get('DB')->exec('SELECT name FROM user where id=' . $oid);

                if ($userdata1) {
                    foreach ($userdata1 as $k1 => $d1)
                        ;
                    $f3->set('sendername', $d1['name']);
                }
            }
        }

        $f3->set('is_first_login', $user->isFirstLogin());
        $f3->set('user_id', $user_id);
        $f3->set('uid', $uid);

        if ($doct) {
            $f3->set('messages', $f3->get('DB')->exec('SELECT * FROM messages where  (owner_id=' . $user_id . '  and doctor_id=' . $uid . ') or (owner_id=' . $uid . '  and doctor_id=' . $user_id . ') order by created_at desc'));
        } else {
            $f3->set('messages', $f3->get('DB')->exec('SELECT * FROM messages where  (owner_id=' . $user_id . ' and doctor_id=' . $oid . ') or (owner_id=' . $oid . ' and doctor_id=' . $user_id . ')  order by created_at desc'));
        }

         
        $f3->set('content', "dashboard/section.messages.htm");
        if($user->group_id==5) //added just to test issue 
           $f3->set('isMasterAdmin', 1); //to resolve P095-287

        echo \Template::instance()->render('dashboard/__layout-dashboard.htm');
    }

    function mcontent($f3) {
        $user_id = $f3->get('SESSION.id');
        $mid = $_REQUEST['mid'];
        $uid = $_REQUEST['uid'];
        if (!$uid) {
            $uid = 0;
        }

        $messages = $f3->get('DB')->exec('SELECT a.*,b.name FROM message_threads a, user b where a.message_id=' . $mid . ' and a.user_id=b.id order by a.id');

        $lload = '';

        foreach ($messages as $key => $data) {
            $date = date_create($data['created_at']);

            $ndate = date_format($date, 'd/m/Y H.i');

            if ($f3->get('security')->isDoctorGroup()) {

                if ($user_id == $data['user_id']) {

                    $lload = $lload . '<div style="float:left; margin-bottom:5px; margin-top:14px; width:595px; height:auto; background-color: white;">
                        <div style="float:right; margin-right:10px;margin-top:15px;width:150px;height:75px;"><div class="msg_boxleft">
                            <img src="/assets/img/Msg_pic.png"/>     <h2>' . $data['name'] . '</h2> <span style="font-size:12px; color: grey;"> ' . $ndate . '</span> </div>
                        </div>

                        <div class="tip_right">
                             ' . nl2br($data['message']) . '
                        </div>
                    </div>';
                } else {

                    $lload = $lload . '<div style="float:left; margin-bottom:5px; margin-top:10px; width:587px; height:auto; background-color: white;">
                        <div style="float:left; margin-left:15px;margin-top:15px;width:150px;height:75px;"><div class="msg_boxright">
                            <img src="/assets/img/Msg_pic.png" style="margin-top:5px;"/>  <h2>' . $data['name'] . '</h2>  <span style="font-size:12px; color: grey;"> ' . $ndate . '</span> </div>
                        </div>
                        <div class="tip">
                           ' . nl2br($data['message']) . '
                        </div>
                    </div>';
                }
            } else {
                if ($user_id == $data['user_id']) {
                    $lload = $lload . '<div style="float:left; margin-bottom:5px; margin-top:10px; width:587px; height:auto; background-color: white;">
                        <div style="float:left; margin-left:15px;margin-top:15px;width:150px;height:75px;"><div class="msg_boxright">
                            <img src="/assets/img/Msg_pic.png" style="margin-top:5px;"/>  <h2>' . $data['name'] . '</h2>  <span style="font-size:12px; color: grey;"> ' . $ndate . '</span> </div>
                        </div>
                        <div class="tip">
                           ' . nl2br($data['message']) . '
                        </div>
                    </div>';
                } else {


                    $lload = $lload . '<div style="float:left; margin-bottom:5px; margin-top:14px; width:595px; height:auto; background-color: white;">
                        <div style="float:right; margin-right:10px;margin-top:15px;width:150px;height:75px;"><div class="msg_boxleft">
                            <img src="/assets/img/Msg_pic.png"/>     <h2>' . $data['name'] . '</h2> <span style="font-size:12px; color: grey;"> ' . $ndate . '</span> </div>
                        </div>

                        <div class="tip_right">
                             ' . nl2br($data['message']) . '
                        </div>
                    </div>';
                }
            }
        }

        $f3->get('DB')->exec('update message_threads set status=1 where message_id=' . $mid . ' and user_id !=' . $user_id);
        echo $lload;
        exit;
    }

    function addmessage($f3) {
        
       
        
        $mid = $_REQUEST['mid'];
        $uid = $_REQUEST['uid'];
        $title = $_REQUEST['title'];
        $message = $_REQUEST['message'];
        $dt = date('Y-m-d H:i:s');
        //P095-273 added two lines below for title and message to prevent user to use tag < > in chat 
        $message= htmlspecialchars($message);
        $title=htmlspecialchars($title);

        if (!$uid) {
            $uid = 0;
        }
        $user_id = $f3->get('SESSION.id');

        //logging
		if(isset($_REQUEST['uid']))
		{
			$logginuser = new User($f3->get('DB'));
			$logginuser->getById($uid);
			LoggingUtility::LogActivity("Send message to user ","","","",$logginuser->id);
		}
        //end
        
        $userdata = $f3->get('DB')->exec('SELECT owner_id,group_id,email,name FROM user where id=' . $user_id);
        if ($userdata) {
            foreach ($userdata as $k => $d) {
                $did = $d['owner_id'];
                $groupid = $d['group_id'];
                $email = $d['email'];
                $username = $d['name'];
            }
        } else {
            $did = 0;
        }

        if ($uid) {
            $did = $uid;
        }

        if ($title != '-') {
            $f3->get('DB')->exec("insert into messages (owner_id, doctor_id, title,created_at) values(" . $user_id . "," . $did . ",'" . str_replace("'","\'",trim($title)) . "','" . $dt . "')");
            $mid = $f3->get('DB')->lastInsertId();
        }
        if ($mid) {
            $f3->get('DB')->exec("insert into message_threads (message_id, user_id,message,created_at) values(" . $mid . "," . $user_id . ",'" . str_replace("'","\'",trim($message)) . "','" . $dt . "')");

            echo json_encode(array('status' => 'success', 'mid' => $mid));
        }

        exit;
    }

    function sendmail($f3) {
        $mid = $_REQUEST['mid'];


        $user_id = $f3->get('SESSION.id');
        $did=0;
        
        if($mid){
        $userdata = $f3->get('DB')->exec('SELECT owner_id,doctor_id FROM messages where id=' . $mid);
        if ($userdata) {
            foreach ($userdata as $k => $d); 
                $doct_id = $d['doctor_id'];
                $own_id=$d['owner_id'];
        } }
        
        if($user_id==$doct_id){
            $did=$own_id;
        }else{
           $did=$doct_id;
        }

        $user = new User($f3->get('DB'));
        $user = $user->getById($user_id);
        
        if ($did) {
           
                $doctordetails = $f3->get('DB')->exec('SELECT email,name,mail_notification,phone,sms_notification FROM user where id=' . $did);
                foreach ($doctordetails as $key => $data) {
                    $doctormail = $data['email'];
                    $name = $data['name'];
                    $mobno = $data['phone'];
                    $sms_notif = $data['sms_notification'];
                    $mail_notif = $data['mail_notification'];
                }
                $f3->set('email', $doctormail);
                $f3->set('name', $name);
                //$f3->set('name', $username);
                $f3->set('id', $did);                

                //MAIL
                if (isset($mail_notif)) {
                    if ($mail_notif) {
                        $body = \Template::instance()->render('mail/mail_notification_user.htm');
                        $message = $body;
                        $message = str_replace("{patient_name}",$user->name." ".$user->last_name, $message);
                        $to = $doctormail;
                        $subject = "Ny besked i NoDep";
						
                        $this->sendChatMail($f3, $to, $subject, $message);
                    }
                }

                //SMS
                $smsnotfdata = '';
                $mssge = '';
                $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='new_chat_message'");

                if ($smsnotfdata) {
                    foreach ($smsnotfdata as $k => $data)
                        ;
                    $mssge = $data['message'];
                }

                /*$userdata = '';
                $mobno = '';
                $sms_notif = '';

                $userdata = $f3->get('DB')->exec("SELECT phone,sms_notification FROM user WHERE id=" . $did);

                if ($userdata) {
                    foreach ($userdata as $ky => $udata) {
                        $mobno = $udata['phone'];
                        $mobno = str_replace('+', '', $mobno);
                        $mobno = str_replace('-', '', $mobno);
                        $mobno = str_replace(' ', '', $mobno);
                        $sms_notif = $udata['sms_notification'];
                    }
                }*/
                
                if($mobno) {
                   $mobno = str_replace('+', '', $mobno);
                   $mobno = str_replace('-', '', $mobno);
                   $mobno = str_replace(' ', '', $mobno);
               }

               if (isset($mssge) && isset($mobno) && isset($sms_notif)) {
                   if ($mssge && $mobno && $sms_notif) {
                       $this->sendChatSMS($f3, $mssge ." fra ". $user->name ." " . $user->last_name, $mobno);
                   }
               }
           }    
    
            echo json_encode(array('status' => 'success', 'mid' => $mid));
        

        exit;
    }

    function tcontent($f3) {
        $user_id = $f3->get('SESSION.id');
        $uid = $_REQUEST['uid'];
        $doct = 0;
       
          if($uid){  
            $doct = 1;
          }
        

        if ($doct==0) {
            $userdata = $f3->get('DB')->exec('SELECT owner_id FROM user where id=' . $user_id);

            if ($userdata) {
                foreach ($userdata as $k => $d);
                $oid = $d['owner_id'];
            }
        }

        if ($doct) {
            $titles = $f3->get('DB')->exec('SELECT * FROM messages where  (owner_id=' . $user_id . '  and doctor_id=' . $uid . ') or (owner_id=' . $uid . '  and doctor_id=' . $user_id . ') order by created_at desc');
        } else {
            $titles = $f3->get('DB')->exec('SELECT * FROM messages where  (owner_id=' . $user_id . ' and doctor_id=' . $oid . ') or (owner_id=' . $oid . ' and doctor_id=' . $user_id . ')  order by created_at desc');
        }

        $lload = '';

        $lload = $lload . ' <ul>';
        foreach ($titles as $key => $data) {
            $lload = $lload . '<li  id="mtitle' . $data['id'] . '" ><a href="javascript:void(0)" data-uid="0" class="messagetitle" id="messagetitle" data-text="' . $data['title'] . '" data-id="' . $data['id'] . '"><span>' . $data['title'] . '</span><span style="font-size:10px;"> &nbsp;' . $data['created_at'] . '</span></a></li>';
        }

        $lload = $lload . ' </ul>';

        echo $lload;
        exit;
    }

    function checkmessage($f3) {

        $user_id = $f3->get('SESSION.id');
        $doct = 0;
        $uid = 0;
        $oid = 0;
        if (isset($_REQUEST['uid'])) {
            $uid = $_REQUEST['uid'];

            $doct = 1;
        } else {
            $uid = 0;
            $doct = 0;
        }

        if ($doct == 0) {
            $userdata = $f3->get('DB')->exec('SELECT owner_id FROM user where id=' . $user_id);

            if ($userdata) {
                foreach ($userdata as $k => $d)
                    ;
                $oid = $d['owner_id'];
            }
        }

        if ($doct == 1) {
            $message = $f3->get('DB')->exec('SELECT * FROM messages  where  (owner_id=' . $user_id . '  and doctor_id=' . $uid . ') or (owner_id=' . $uid . '  and doctor_id=' . $user_id . ') ');
        } else {
            $message = $f3->get('DB')->exec('SELECT * FROM messages  where  (owner_id=' . $user_id . ' and doctor_id=' . $oid . ') or (owner_id=' . $oid . ' and doctor_id=' . $user_id . ') ');
        }
        if ($message) {
            foreach ($message as $key => $data);

            $mid = $data['id'];
            $title = $data['title'];
            echo json_encode(array('status' => 'success', 'mid' => $mid, 'title' => $title, 'uid' => $user_id));
        }
    }
    
    // Auto logout filter check
    function beforeRoute($f3) {
       
        if( $f3->get('PATTERN') != "/section/checkmessagef" && $f3->get('PATTERN') != "/section/mcontent")
        {
             if (!$f3->get('security')->check_login())
             $f3->reroute('/login/timeout');
        }
       
    }

    function checkmessagef($f3) {
        
        // checking for automatic session timeout
        if(!SecurityUtility::idleTimeSessionExpiryCheck(true))
        {
             echo json_encode(array('status' => 'success', 'mflag' => -1));
             exit;
        }
        // else normal flow
        
        $user_id = $f3->get('SESSION.id');
        $mflag = 0;

        $oid = 0;

        if ($f3->get('security')->isDoctorGroup() || $f3->get('security')->isAdminGroup()) {
            
        } else {

            $userdata = $f3->get('DB')->exec('SELECT owner_id FROM user where id=' . $user_id);

            if ($userdata) {
                foreach ($userdata as $k => $d);
                $oid = $d['owner_id'];
            }

            $message = $f3->get('DB')->exec('SELECT * FROM messages  where  (owner_id=' . $user_id . ' and doctor_id=' . $oid . ') or (owner_id=' . $oid . ' and doctor_id=' . $user_id . ') ');

            if ($message) {
                foreach ($message as $key => $data) {
                    $mid = $data['id'];

                    $message_thread = $f3->get('DB')->exec('SELECT id FROM message_threads  where message_id=' . $mid . ' and status=0 and user_id !=' . $user_id);
                    if ($message_thread) {
                        $mflag = $mid;
                    }
                }
            }

            echo json_encode(array('status' => 'success', 'mflag' => $mflag));
        }
    }

    public function sendChatSMS($f3, $message, $mobnum) {
		
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

    public function sendChatMail($f3, $to, $subject, $message) {
        //$subject = "Besked i NoDep";

        // To send HTML mail
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'From: NoDep <admin@internetpsykiatrien.com>' . "\r\n";
		$headers .= 'Bcc: pradeep@atdrive.com' . "\r\n";
         //$headers .= 'Bcc: rahul@atdrive.com' . "\r\n";
		 //$headers .= 'Bcc: pradeep@atdrive.com' . "\r\n";
        //$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
        //$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
        // Mail it
        //mail($to, $subject, $message, $headers, '-frajeesh.vr@sherston.com');
		
		//mail($to, $subject, $message, $headers, '-rahul@atdrive.com');
		mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers, '-pradeep@atdrive.com');
    }

}
