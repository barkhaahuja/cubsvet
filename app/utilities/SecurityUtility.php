<?php

namespace utilities;

use models\User;
use models\Quiz;

/**
 *
 * @property mixed id
 */
class SecurityUtility
{
    // creating function to check login session expiry
    public static function idleTimeSessionExpiryCheck($fromPolling = false)
    {
        if(version_compare(PHP_VERSION, '5.4.0') >= 0)
        {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
        else
        {
            if(session_id() == '') {
                session_start();
            }
        }
        
        $f3 = \Base::instance();
        
        if(!$f3->exists('SESSION.timestamp'))
        {
            $f3->set('SESSION.timestamp', time());
        }
        
        $idletime = 2 * 30 * 60; //1 hr of idle time the user gets logged out
      
        if (time() - ($f3->get('SESSION.timestamp')) > $idletime){
            
            session_destroy();
            session_unset();
           
			return false;
        }
        else{
            
            if(!$fromPolling)
            {
              $f3->set('SESSION.timestamp', time());
            }
          
            return true;
        }
        
    }
    
    
    // creating function to check if patient has expired grace period
    public static function gracePeriodExpiryCheck()
    {
       
        if(self::leftOverGracePeriod() < 0)
        {
            // logout as grace period has expired
            session_destroy();
            session_unset();
            return false;
        }
        
        return true;
    }
    
    // function to get left over grace period days
    public static function leftOverGracePeriod()
    {  
        $f3 = \Base::instance();
        
        // grace period check code
        if($f3->exists('SESSION.id'))
        {
            $userid = $f3->get('SESSION.id');
            
            if(($f3->get('SESSION.group_id') == 1) || ($f3->get('SESSION.group_id') == 2)) {
                $user = new User($f3->get('DB'));
                $user = $user->getById($userid);
                if($user->discharged != 1)
                {
                    return 1;
                }
                $now = date_create(); 
                $ref = date_create($user->grace_period_expires_on);
                $timeDiff = (date_timestamp_get($ref) - date_timestamp_get($now));
                $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                $numberDays = floor($numberDays);
                return $numberDays;
            }
            else
            {
                return 1; // logged in user is not patient
            }
        }
        else
        {
            return 1; // user is not logged in
        }
    }
    
    // grace period check for forgot password
    public static function gracePeriodExpiryCheckForForgotPassword($user)
    {
        if ($user->discharged != 1) {
            return false;
        }
        
        $f3 = \Base::instance();
        
        // grace period check code
        $userid = $user->id;

        if(($user->group_id == 1) || ($user->group_id == 2)) {
         
            $now = date_create(); 
            $ref = date_create($user->grace_period_expires_on);
            $timeDiff = (date_timestamp_get($ref) - date_timestamp_get($now));
            $numberDays = $timeDiff/86400;  // 86400 seconds in one day
            $numberDays = floor($numberDays);
            if ($numberDays < 0) {
                return true;
            }
            else{        
                return false;
            }
        }
        else
        {
            return false;
        }
        
    }
    
    private static function dischargePatient($id)
    {
        $f3 = \Base::instance();
        
        $user = new User($f3->get('DB'));
		$user = $user->getById($id);
        $quiz = new Quiz($f3->get('DB'));
        $quiz->deleteAllQuestionnaireForUser($id);
        //$user->disableLiteQuestionnaireById($f3->get('PARAMS.id'));

        $currentTime = date('Y-m-d H:i:s', time());
        $newdate = strtotime ( '+180 days' , strtotime ( $currentTime ) ) ;
        $gracePeriodExpiry = date ( 'Y-m-j H:i:s' , $newdate );

        $f3->get('DB')->exec("UPDATE user SET discharged = 1, discharge_date = '".$currentTime."', grace_period_expires_on = '". $gracePeriodExpiry ."' where id=" . $id);
    
        // sending email on patient discharge
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
  
    // grace period check for forgot password
    public static function checkForPatientDischarge($userID, $currentStep)
    {
        $f3 = \Base::instance();
        
        $user = new User($f3->get('DB'));
        $user = $user->getById($userID);
	
        /*
        if ($currentStep == 5.5 || $currentStep == 5.8) {
            
            if(($user->stepA == 0) && ($user->stepB == 0) && ($user->step6 == 0))
            {
                self::dischargePatient($userID);
            }
        }
        
        if($currentStep == 6.15)
        {
            if(($user->stepA > $user->stepB) && ($user->stepA > $user->step6))
            {
                self::dischargePatient($userID);
            }
        }
        
        if((string)$currentStep === "7.30")
        {
            if(($user->stepB > $user->stepA) && ($user->stepB > $user->step6))
            {
                self::dischargePatient($userID);
            }
        }
        */
        
        if($user->discharged == 0)
        {
            if($currentStep == 8.14)
            {
            /*    if(($user->step6 > $user->stepA) && ($user->step6 > $user->stepB))
                {
					*/
                    self::dischargePatient($userID);
             /*   }*/
            }
        }
        
    }
  
}
