<?php

namespace controllers;

use models\Quiz;
use models\User;

class CronController {

    public function hourly($f3) {
        
    }

    public function daily($f3) {
        
        //The user has not been logged on for two days: first notification(2 days) and second notification after 5 days
        $this->first_notification_to_login();
        $this->second_notification_to_login();
    }

    private function make_lite_questionnaires() {
        /*   $f3 = \Base::instance();

          $user = new User($f3->get('DB'));
          $quiz = new Quiz($f3->get('DB'));

          foreach ($user->find(array('group_id=?', 2)) as $u) {
          // user's quiz
          $q = $quiz->findone(array('taken_by=?', $u->id), array('order' => 'id DESC'));
          // lite questionnaires count
          $c = $quiz->count(array('taken_by =? AND questionnaire_id=?', $u->id,2));
          // if have questionnaire , past 7 days and no more than 5 lite questionnaires
          if ($q and $q->completed_date and $c < $f3->get('max_lite_quiz') ) {
          $completed_date = new \DateTime($q->completed_date);
          $current_date = new \DateTime();
          $interval = $current_date->diff($completed_date);
          if ($interval->format('%a') > 6) {
          $quiz->createLiteQuestionnaireForUser($u);
          }
          }
          }
         */
    }

    private function first_notification_to_login() {
        $f3 = \Base::instance();
        $user = new User($f3->get('DB'));
        $userdetails = $f3->get('DB')->exec('SELECT email,create_date,id,name,password,phone,sms_notification FROM user where confirmed!=1');
        if ($userdetails) {
            foreach ($userdetails as $key => $data) {
                $created_date = new \DateTime($data['create_date']);
                $user_id = $data['id'];
                $firstname = $data['name'];
                $email = $data['email'];
                $password = $data['password'];

                $current_date = new \DateTime();
                $interval = $current_date->diff($created_date);
                $interval_count = $interval->format('%a');

                if ($interval_count >= 2 || $interval_count < 5) {
                    $f3->set('email', $email);
                    $f3->set('password', $password);
                    $body = \Template::instance()->render('cron/user_first_notification_treatment.htm');

                    require_once(__DIR__ . '/../../3rdparty/smtp-mail/class.phpmailer.php');
                    $mail = new \PHPMailer;
                    $mail->IsSMTP(); // telling the class to use SMTP
                    $mail->SetFrom('admin@totem.com', 'NoDep');
                    $mail->AddAddress($email, $firstname);
                    $mail->Subject = "Aktivering af e-mail";
                    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
                    $mail->MsgHTML($body);
                    $mail->Send();
                    
                    //SMS
                    $smsnotfdata = '';
                    $mssge = '';
                    $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='first_notification_to_login'");

                    if ($smsnotfdata) {
                        foreach ($smsnotfdata as $k => $data);
                        $mssge = $data['message'];
                    }

                    $mobno = $data['phone'];
                    $mobno = str_replace('+','',$mobno);
                    $mobno = str_replace('-','',$mobno);
                    $mobno = str_replace(' ','',$mobno);
                    $sms_notif = $data['sms_notification'];

                    if (isset($mssge) && isset($mobno) && isset($sms_notif)) {
                        if ($mssge && $mobno && $sms_notif) {
                            $this->sendCronSMS($f3, $mssge, $mobno);
                        }
                    }
                }
            }
        }
    }

    private function second_notification_to_login() {
        $f3 = \Base::instance();
        $user = new User($f3->get('DB'));
        $userdetails = $f3->get('DB')->exec('SELECT email,create_date,id,name,password,phone,sms_notification FROM user where confirmed!=1');
        if ($userdetails) {
            foreach ($userdetails as $key => $data) {
                $created_date = new \DateTime($data['create_date']);
                $user_id = $data['id'];
                $firstname = $data['name'];
                $email = $data['email'];
                $password = $data['password'];
                $current_date = new \DateTime();
                $interval = $current_date->diff($created_date);
                $interval_count = $interval->format('%a');
                if ($interval_count >= 5) {
                    $f3->set('email', $email);
                    $f3->set('password', $password);
                    $body = \Template::instance()->render('cron/user_second_notification_treatment.htm');

                    require_once(__DIR__ . '/../../3rdparty/smtp-mail/class.phpmailer.php');
                    $mail = new \PHPMailer;
                    $mail->IsSMTP(); // telling the class to use SMTP
                    $mail->SetFrom('admin@totem.com', 'NoDep');
                    $mail->AddAddress($email, $firstname);
                    $mail->Subject = "Aktivering af e-mail";
                    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
                    $mail->MsgHTML($body);
                    $mail->Send();
                    
                    //SMS
                    $smsnotfdata = '';
                    $mssge = '';
                    $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='first_notification_to_login'");

                    if ($smsnotfdata) {
                        foreach ($smsnotfdata as $k => $data);
                        $mssge = $data['message'];
                    }

                    $mobno = $data['phone'];
                    $mobno = str_replace('+','',$mobno);
                    $mobno = str_replace('-','',$mobno);
                    $mobno = str_replace(' ','',$mobno);
                    $sms_notif = $data['sms_notification'];

                    if (isset($mssge) && isset($mobno) && isset($sms_notif)) {
                        if ($mssge && $mobno && $sms_notif) {
                            $this->sendCronSMS($f3, $mssge, $mobno);
                        }
                    }
                }
            }
        }
    }

    private function user_terminated_step_six_83()
    {
        $f3 = \Base::instance();
        $user = new User($f3->get('DB'));
        $userdetails = $f3->get('DB')->exec('SELECT email,completed_step_date,id,name,password,phone,sms_notification FROM user where completed_step=8');
        if ($userdetails) {
          foreach ($userdetails as $key => $data) {  
                $completed_date = new \DateTime($data['completed_step_date']);
                $user_id = $data['id'];
                $firstname = $data['name'];
                $email = $data['email'];
                $mobno = $data['phone'];
                $sms_notif = $data['sms_notification'];
                              
                $current_date = new \DateTime();
                $interval = $current_date->diff($completed_date);
                $interval_count = $interval->format('%a');
                
                if ($interval_count >= 83 && $interval_count<90) {
                    $f3->set('name', $firstname);
                    
                    //Mail
                    $body = \Template::instance()->render('cron/user_first_notification_termination.htm');
                    $message = $body;
                    $to = $email;
                    $subject = "step termination 6";
                    $this->sendStepTermination($f3, $to,$cc, $subject, $message);
                                        
                    //SMS
                    $smsnotfdata = '';
                    $mssge = '';
                    $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='first_notification_to_login'");

                    if ($smsnotfdata) {
                        foreach ($smsnotfdata as $k => $data);
                        $mssge = $data['message'];
                    }

                    
                    $mobno = str_replace('+','',$mobno);
                    $mobno = str_replace('-','',$mobno);
                    $mobno = str_replace(' ','',$mobno);
                    

                    if (isset($mssge) && isset($mobno) && isset($sms_notif)) {
                        if ($mssge && $mobno && $sms_notif) {
                            $this->sendCronSMS($f3, $mssge, $mobno);
                        }
                    }
                }
          }      
        }
    }        
     
    
    private function user_terminated_step_six_90()
    {
        $f3 = \Base::instance();
        $user = new User($f3->get('DB'));
        $userdetails = $f3->get('DB')->exec('SELECT email,completed_step_date,id,name,password,phone,sms_notification FROM user where completed_step=8');
        if ($userdetails) {
          foreach ($userdetails as $key => $data) {  
                $completed_date = new \DateTime($data['completed_step_date']);
                $user_id = $data['id'];
                $firstname = $data['name'];
                $email = $data['email'];
                $mobno = $data['phone'];
                $sms_notif = $data['sms_notification'];
                              
                $current_date = new \DateTime();
                $interval = $current_date->diff($completed_date);
                $interval_count = $interval->format('%a');
                
                if ($interval_count==90) {
                    $f3->set('name', $firstname);
                    
                    //Mail
                    $body = \Template::instance()->render('cron/user_second_notification_termination.htm');
                    $message = $body;
                    $to = $email;
                    $subject = "step termination 6";
                    $this->sendStepTermination($f3, $to,$cc, $subject, $message);
                                        
                    //SMS
                    $smsnotfdata = '';
                    $mssge = '';
                    $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='first_notification_to_login'");

                    if ($smsnotfdata) {
                        foreach ($smsnotfdata as $k => $data);
                        $mssge = $data['message'];
                    }

                    
                    $mobno = str_replace('+','',$mobno);
                    $mobno = str_replace('-','',$mobno);
                    $mobno = str_replace(' ','',$mobno);
                    

                    if (isset($mssge) && isset($mobno) && isset($sms_notif)) {
                        if ($mssge && $mobno && $sms_notif) {
                            $this->sendCronSMS($f3, $mssge, $mobno);
                        }
                    }
                }
          }      
        }
    }  
    
    
    private function user_terminated_step_six_90x()
    {
        $f3 = \Base::instance();
        $user = new User($f3->get('DB'));
        $userdetails = $f3->get('DB')->exec('SELECT email,completed_step_date,id,name,password,phone,sms_notification FROM user where completed_step=8');
        if ($userdetails) {
          foreach ($userdetails as $key => $data) {  
                $completed_date = new \DateTime($data['completed_step_date']);
                $user_id = $data['id'];
                $firstname = $data['name'];
                $email = $data['email'];
                $mobno = $data['phone'];
                $sms_notif = $data['sms_notification'];
                              
                $current_date = new \DateTime();
                $interval = $current_date->diff($completed_date);
                $interval_count = $interval->format('%a');
                
                if ($interval_count>90) {
                    $f3->set('name', $firstname);
                    
                    //Mail
                    $body = \Template::instance()->render('cron/user_third_notification_termination.htm');
                    $message = $body;
                    $to = $email;
                    $subject = "step termination 6";
                    $this->sendStepTermination($f3, $to,$cc, $subject, $message);
                                        
                    //SMS
                    $smsnotfdata = '';
                    $mssge = '';
                    $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='first_notification_to_login'");

                    if ($smsnotfdata) {
                        foreach ($smsnotfdata as $k => $data);
                        $mssge = $data['message'];
                    }

                    
                    $mobno = str_replace('+','',$mobno);
                    $mobno = str_replace('-','',$mobno);
                    $mobno = str_replace(' ','',$mobno);
                    

                    if (isset($mssge) && isset($mobno) && isset($sms_notif)) {
                        if ($mssge && $mobno && $sms_notif) {
                            $this->sendCronSMS($f3, $mssge, $mobno);
                        }
                    }
                }
          }      
        }
    }        
    
    function beforeRoute($f3) {
        if ($f3->get('HOST') != '127.0.0.1')
            $f3->error('404');
    }

    public function sendCronSMS($f3, $message, $mobnum) {
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

}
