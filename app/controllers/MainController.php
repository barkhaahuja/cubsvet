<?php

namespace controllers;

use models\Note;
use models\User;
use models\Quiz;
use models\MappingQuestionnaireUser;
use utilities\SecurityUtility;
use utilities\QuizUtility;
use utilities\LoggingUtility;
use utilities\SendSMS;

class MainController {

    function dashboard($f3) {
        
     
        $security = $f3->get('security');
        if (!$security->check_login())
            $f3->reroute('/login');

        $user = new User($f3->get('DB'));
       
        $current_date = date('Y-m-d H:i:s');
        $usertype = $user->group_id;

        $user = $user->getById($f3->get('SESSION.id'));
        $user_id = $f3->get('SESSION.id');
        // checking for first password change
        if($user->is_first_password_changed == 0 )
        {
            $this->password_reset($f3);
            exit;
        }
        
        // discharge status
        $f3->set('discharged', $user->discharged);
        if($user->discharged == 1)
        {
             $f3->set('grace_period_left', SecurityUtility::leftOverGracePeriod());
        }
        
        
      //code for logs
      $logger = new \Log('user/user_'.$user_id.'.log');
      $logger->write($user->name." | ".$user->step6_status,'r');
         
       
        $manager = new TreatmentManager($user);
        $manager->executeRules();
     
        $f3->set('current_step', $user->getCurrentStep() ? : 1);
        $f3->set('currentSubStep', $user->getCurrentSubStep() ? : 0);
        $f3->set('completedStep', $user->getCompletedStep());

        $f3->set('messages', $f3->get('DB')->exec('SELECT * FROM messages where  doctor_id=' . $user_id . ' or owner_id=' . $user_id . '  order by created_at desc'));

        $f3->set('section_title', 'Indstillinger');
        $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
 
        // adding relevant quiz for user
        QuizUtility::createRelevantQuizForUser($user);
       
        // flow goes
        if ($user->isFirstLogin()) {
            $user->first_login = 0;
            $user->save();
        }
        
        // checking for any pending quizes
        $pendingQuiz = QuizUtility::getPendingQuiz($user);
        if ($pendingQuiz != null) {
            $f3->set('pending_quiz', '1'); 
            $f3->set('pending_quiz_step', '/'.$pendingQuiz->id.'/'.$pendingQuiz->questionnaire_id.'/'.$pendingQuiz->current_step); 
        }
        
        /*
         * // don't know why this was added - deepanshu
        if ($user->post_treatment_mail) {
            $quiz->deleteLiteSixthQuestionnaireForUser($f3->get('SESSION.id'));
        }*/
        
        /*
        $liteQusIddetails = '';
        $liteQusIddetails = $f3->get('DB')->exec('SELECT id  FROM quiz WHERE current_step=0 AND questionnaire_id=2 AND taken_by=' . $user_id);

        if (!$liteQusIddetails) {


            $litequestionaire = $f3->get('DB')->exec('SELECT id  FROM quiz WHERE completed_date IS not null AND questionnaire_id=2 AND taken_by=' . $user_id . ' ' . 'ORDER BY completed_date DESC ');

            if ($litequestionaire) {
                $quizcompleteddetails = $f3->get('DB')->exec('SELECT completed_date FROM quiz WHERE completed_date IS not null AND questionnaire_id=2 AND taken_by=' . $user_id);
            } else {
                $quizcompleteddetails = $f3->get('DB')->exec('SELECT completed_date FROM quiz WHERE completed_date IS not null AND questionnaire_id=1 AND taken_by=' . $user_id);
            }



            if ($quizcompleteddetails) {
                foreach ($quizcompleteddetails as $key => $data) {
                    $quiz_completed_date = $data['completed_date'];
                }

                $crdt = date('Y-m-d', strtotime($current_date));
                $compdt = date('Y-m-d', strtotime($quiz_completed_date));

                $CheckInX = explode("-", $crdt);
                $CheckOutX = explode("-", $compdt);
                $date1 = mktime(0, 0, 0, $CheckInX[1], $CheckInX[2], $CheckInX[0]);
                $date2 = mktime(0, 0, 0, $CheckOutX[1], $CheckOutX[2], $CheckOutX[0]);
                $interval = ($date1 - $date2) / (3600 * 24);
                if ($user->disable_lite_questionnaires) {
                    if (!$user->final_big_questionnaire) {
                        $quiz->createBigQuestionnaireForUser($user);
                        $due = $user->getDueQuiz();
                        $f3->set('quiz_step', '/' . $due['id'] . '/' . $due['questionnaire_id'] . '/' . $due['current_step']);
                        $user->setFinalBigQuestionnaire($user_id);
                    }
                } else {
                    if ($interval >= 7) {
                        $quiz->createLiteQuestionnaireForUser($user);
                        $due = $user->getDueQuiz();
                        $f3->set('quiz_step', '/' . $due['id'] . '/' . $due['questionnaire_id'] . '/' . $due['current_step']);
                    }
                }
            }
        }
        
        */
        if($user->group_id==5) //added just to test issue 
           $f3->set('isMasterAdmin', 1); //to resolve P095-287
        echo \Template::instance()->render('dashboard/__layout-dashboard.htm');
    }

    function otp($f3) {
    
         if ($phone = $f3->get('POST.phone')) 
         {
           
            $user = new User($f3->get('DB'));
            $user->getByPhone($phone);
            
            // check for valid
            if( ($user->otp == $f3->get('POST.otp')) && ($user->otp != '') )
            {
                $now = date_create(); 
                $ref = date_create($user->otpexpiry);
                $timeDiff = (date_timestamp_get($ref) - date_timestamp_get($now));
                
                if($timeDiff < 0)
                {
                    // token expired
                    $f3->set("notification", "error.otpexpired");
                    echo \Template::instance()->render('security/recover_password.htm');
                    exit;
                }
                else
                {
                    LoggingUtility::LogActivity("Forgot password OTP verified", "", "", $phone);
                    // success
                    $original_password = time();
                    $password = $f3->get('security')->getPasswordTransform($original_password, $original_password);
                    $user->salt = $original_password;
                    $user->password = $password;
                    $user->save();
                    $this->sendResetPassword($f3, $user->name, $user->phone, $original_password, $user->email);
               
                    $f3->reroute('/login/passwordreset');
                }
                
            }
            else
            {
                // token does not match
                // token expired
                $f3->set("notification", "error.otpnomatch");
                echo \Template::instance()->render('security/recover_password.htm');
                exit;
            }
          
         }
         
         echo \Template::instance()->render('security/recover_password.htm');
    }
    
    function login($f3) {
		
        if ($email = $f3->get('POST.email')) {
           
            $user = new User($f3->get('DB'));
            $user->getByPhone($email);
            
            // fixing P0120-48
            if($user->is_blocked == 1)
            {
                $f3->reroute('/login/accountblocked');
            }
            // end

            // grace period 
            $boolGraceExpired = SecurityUtility::gracePeriodExpiryCheckForForgotPassword($user);
            if($boolGraceExpired)
            {
                $f3->reroute('/login/graceexpired');
            }
            // end
            
            if (!$user->dry()) {
                
                $pass = rand(100000, 999999);
                $user->otp = $pass;
                $currentTime = date('Y-m-d H:i:s', time());
                $newdate = strtotime ( '+15 minute' , strtotime ( $currentTime ) ) ;
                $gracePeriodExpiry = date ( 'Y-m-j H:i:s' , $newdate );
                $user->otpexpiry = $gracePeriodExpiry;
                $user->save();
                LoggingUtility::LogActivity("Forgot password request", "",$user->email);
                // for fix P095-288
                if($user->confirmed != 1)
                {
                 $f3->set("notification", "error.notconfirmed");
                 echo \Template::instance()->render('security/recover_password.htm');
                 exit;
                }
                else
                {
                $this->sendOTP($f3, $user->name, $user->phone, $pass, $user->email);
                $f3->set("notification", "error.otpsent");
                $f3->set("phone", $email);
                
                echo \Template::instance()->render('security/recover_password.htm');
                exit;
                }
                // below is temp
//                $original_password = time();
//                $password = $f3->get('security')
//                        ->getPasswordTransform($original_password, $user->salt);
//                $user->password = $password;
//                $user->save();
//                $this->sendResetPassword($f3, $user->name, $user->phone, $original_password, $user->email);
            } else {
                
                //TODO show error page, user not found
                
                $f3->set("notification", "error.phonenotfound");
                echo \Template::instance()->render('security/recover_password.htm');
                exit;
            }
        } else {
            $f3->set("notification", "period.validation");
        }

        // adding code for session timeout message
        $message = $f3->get('PARAMS.message');
        
        if($message == 'credentialsrequired')
        {
             $f3->set("credentialsrequired", "1");
        }
        else if($message == 'timeout')
        {
            $f3->set("timeout", "1");
        }
        else if($message == 'graceexpired')
        {
            $f3->set("grace_expired", "1");
        }
        else if($message == 'accountblocked')
        {
            $f3->set("accountblocked", "1");
        }
        else if($message == "passwordreset")
        {
             $f3->set("passwordreset", "1");
        }
        
        // end
		
        echo \Template::instance()->render('security/login.htm');
    }

    function recover_password($f3) {
        echo \Template::instance()->render('security/recover_password.htm');
    }

     public function sendOTP($f3, $name, $phone, $password, $email) {
        
        // Du har for nylig ønsket at ændre dit password. Herunder ser du dit nye password.
        $mobno = str_replace('+','',$phone);
        $mobno = str_replace('-','',$mobno);
        $mobno = str_replace(' ','',$mobno);

        
        if(isset($mobno)){
           $this->sendSMS($f3,"Nulstil adgangskode OTP : ".$password,$mobno);
           LoggingUtility::LogActivity("OTP sent to reset password", "", "", $mobno);
        }
   
    }
    
    public function sendResetPassword($f3, $name, $phone, $password, $email) {
        
        //new SMS
        
        // Du har for nylig ønsket at ændre dit password. Herunder ser du dit nye password.
        $mobno = str_replace('+','',$phone);
        $mobno = str_replace('-','',$mobno);
        $mobno = str_replace(' ','',$mobno);

        $smsnotfdata = '';
        $mssge = '';
        $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='reset_password'");

        if($smsnotfdata){
          foreach($smsnotfdata as $k => $data);
          $mssge = $data['message'];
        }

        $mssge = str_replace('{{username}}',$email, $mssge);
        $mssge = str_replace('{{password}}',$password, $mssge);
        
        if(isset($mssge) && isset($mobno)){
          if($mssge && $mobno){
           $this->sendSMS($f3,$mssge,$mobno);
            LoggingUtility::LogActivity("Password successfully reset", "","", $mobno);
          }
        }

        //end
        /*
        $f3->set('email', $email);
        $f3->set('password', $password);
        */
         /* $to = $email;
          require_once(__DIR__ . '/../../3rdparty/smtp-mail/class.phpmailer.php');
          $mail = new \PHPMailer;
          $body = \Template::instance()->render('mail/reset_password.htm');
          $mail->IsSMTP(); // telling the class to use SMTP

          $mail->SetFrom('admin@totem.com', 'NoDep');

          $mail->AddAddress($email, $name);
          $mail->Subject = "Ændring af password til NoDep";

          $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

          $mail->MsgHTML($body);
          $mail->Send(); */

        //MAIL
        /*$body = \Template::instance()->render('mail/reset_password.htm');
        $message = $body;
        $to = $email;
        $subject = "Ændring af adgangskode i NoDep";
        
        $this->sendResetMail($f3, $to, $subject, $message);
*/
        //SMS
        /* $smsnotfdata = '';
          $mssge = '';
          $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='reset_password'");

          if($smsnotfdata){
          foreach($smsnotfdata as $k => $data);
          $mssge = $data['message'];
          }

          $userdata = '';
          $mobno = '';
          $sms_notif = '';

          $userdata = $f3->get('DB')->exec("SELECT phone,sms_notification FROM user WHERE email='" . $email . "'");

          if ($userdata) {
          foreach ($userdata as $ky => $udata) {
          $mobno = $udata['phone'];

          $mobno = str_replace('+','',$mobno);
          $mobno = str_replace('-','',$mobno);
          $mobno = str_replace(' ','',$mobno);
          //$sms_notif = $udata['sms_notification'];
          }
          }

          if(isset($mssge) && isset($mobno)){
          if($mssge && $mobno){
          // $this->sendSMS($f3,$mssge,$mobno);
          }
          } */
    }

    public function sendSMS($f3, $message, $mobnum) {
        
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

    public function sendResetMail($f3, $to, $subject, $message) {
        //$subject = "Besked i NoDep";
        // To send HTML mail
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'From: NoDep <admin@internetpsykiatrien.com>' . "\r\n";
        $headers .= 'Bcc: pradeep@atdrive.com' . "\r\n";
        // Mail it
        mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers, '-pradeep@atdrive.com');
    }
    
    public function password_reset($f3) {
        
        $user = new User($f3->get('DB'));
        $user = $user->getById($f3->get('SESSION.id'));
        
        
        /// checking if this was posted
        if(isset($_POST['id']))
        {
            if (!isset($_POST['currentpassword']) || (trim($_POST['currentpassword']) == '')) {
                $f3->set('message', 'Giv nuværende adgangskode.'); //Please provide current password.
            }
            else if (!isset($_POST['newpassword']) || (trim($_POST['newpassword']) == '')) {
                 $f3->set('message', 'Giv nyt password.'); //Please provide new password.
            }
            else if (!isset($_POST['confirmpassword']) || (trim($_POST['confirmpassword']) == '')) {
                 $f3->set('message', 'Giv bekræftelse for nyt password.'); //Please provide confirmation for new password.
            }
            else if($_POST['newpassword'] != $_POST['confirmpassword'])
            {
                 $f3->set('message', 'Ny adgangskode og bekræftelse ikke passer.'); //New password and confirmation does not match.
            }
            else if(strlen($_POST['newpassword']) < 5)
            {
                 $f3->set('message', 'Ny adgangskode skal være mindst 5 tegn lang.'); //New password must be atleast 5 characters long.
            }
            else if(!$user->checkOldPassword($_POST['currentpassword']))
            {
                $f3->set('message', 'Gammel adgangskode er ikke korrekt.'); //Old password is not correct.
            }
            else if($user->checkOldPassword($_POST['newpassword']))
                {
                  $f3->set('message', 'Ny adgangskode bør ikke være det samme som gamle adgangskode.'); //New password should not be same as old password.
                }
            else
            {
                $user->setNewPassword($_POST['newpassword']);
                
                if(($user->group_id == 4) || ($user->group_id == 5) )
                {
                     $f3->reroute('/user');
                }
                else
                {
                     $f3->reroute('/section/settings.profile#');
                }
               
            }
            
        }
        
        ///
        
        $f3->set('current_step', $user->getCurrentStep() ? : 1);
        $f3->set('currentSubStep', $user->getCurrentSubStep() ? : 0);
        $f3->set('completedStep', $user->getCompletedStep());
        $f3->set('section_title', 'skift kodeord');
        $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
        $f3->set('section_title', 'Indstillinger');
        $f3->set('userid', $user->id);
        $f3->set('force_password_change', 1);
          if($user->group_id==5) //added just to test issue 
           $f3->set('isMasterAdmin', 1); //to resolve P095-287
        ///
        
        $f3->set('content', "dashboard/section.password_reset.htm");
        echo \Template::instance()->render('dashboard/__layout-dashboard.htm');
    }

    public function aboutus()
    {
        echo \Template::instance()->render('dashboard/aboutus.htm');
        exit;
    }

    public function home()
    {
        echo \Template::instance()->render('dashboard/home.htm');
        exit;
    }

     public function contactus()
    {
        echo \Template::instance()->render('dashboard/contactus.htm');
        exit;
    }

    public function blog()
    {
        echo \Template::instance()->render('dashboard/blog.htm');
        exit;
    }

    public function calendar($f3) {
        //$f3->set('content', 'user/calendar.htm');
      
        echo \Template::instance()->render('user/calendar.htm');
    }

}
