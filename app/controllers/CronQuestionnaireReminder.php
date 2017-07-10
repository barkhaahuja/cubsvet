<?php

namespace controllers;

use models\Quiz;
use models\User;
use utilities\QuizUtility;

class CronQuestionnaireReminder {

    public function quizReminder()
    {
        $f3 = \Base::instance();
        $users = new User($f3->get('DB'));
        $users = $users->getAllUsersEligibleForReminder();
     
	 //$this->sendMail("pradeep@atdrive.com", "cron", "running");
	   
        foreach ($users as $user) {
            
            try {
                
                if($user->mail_notification == 1)
                {
                    
                    $days = QuizUtility::getDaysSincePreBigQuestionnaireTaken($user);

                    if($days >= 70 && $days <= 77)
                    {
                        $ismailed = $f3->get('DB')->exec("SELECT id FROM quizremindermails WHERE questionnaire_id = 2 AND user_id = ".$user->id);
                        if(sizeof($ismailed) == 0)
                        {
                            $this->sendPostReminderMail($user);
                        }
                    }
                    if($days >= 168 && $days <= 173 )
                    { 
                        $ismailed1 = $f3->get('DB')->exec("SELECT id FROM quizremindermails WHERE questionnaire_id = 4 AND user_id = ".$user->id);
                        if(sizeof($ismailed1) == 0)
                        {
                            $this->sendFollowReminderMail($user);
                        }
                    }
                }
            } 
            catch (Exception $e) {
               echo "Exception<br/>";
            }

        }
        
        echo "Ran Successfully!";
    }
    
    public function sendPostReminderMail($user)
    {
        $f3 = \Base::instance();
         
        $body = \Template::instance()->render('mail/post_reminder_mail.htm');
        $message = $body;
        $to = $user->email;
        $subject = "Spørgeskema";
        
        $f3->get('DB')->exec("INSERT INTO quizremindermails (questionnaire_id, user_id) VALUES ('2', '$user->id')");
                    
        $this->sendMail($to, $subject, $message);
    }

    public function sendFollowReminderMail($user)
    {
        $f3 = \Base::instance();
         
        $body = \Template::instance()->render('mail/follow_reminder_mail.htm');
        $message = $body;
        $to = $user->email;
        $subject = "Spørgeskema";
        
        $f3->get('DB')->exec("INSERT INTO quizremindermails (questionnaire_id, user_id) VALUES ('4', '$user->id')");
        
        $this->sendMail($to, $subject, $message);
    }
    
    public function sendMail($to, $subject, $message)
    {
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: NoDep <admin@internetpsykiatrien.com>' . "\r\n";
	$headers .= 'Bcc: pradeep@atdrive.com' . "\r\n";
      
	   if( mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers, '-pradeep@atdrive.com'))
	   {
		   echo "yay!";
	   }		  
	   else
	   {
		   echo "old!";
	   }
    }
    
    function beforeRoute($f3) {
//        if ($f3->get('HOST') != '127.0.0.1')
//            $f3->error('404');
    }

 
}
