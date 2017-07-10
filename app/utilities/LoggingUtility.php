<?php

namespace utilities;

use models\User;
use models\Activity_Log;

/**
 *
 * @property mixed id
 */
class LoggingUtility
{
    public static function LogActivity($text, $params = "" , $email = "", $phone = "", $patientid="") {
        
        $f3 = \Base::instance();
        $user = new User($f3->get('DB')); 
        
        if(trim($email) != "")
        {
            $user->getByEmail($email);
            if($user->group_id == 3) // clinicians only check
            {
                $activityLog = new Activity_Log($f3->get('DB'));
                $activityLog->LogActivity($user->id, $text, $params, $patientid);
            }
        }
        else if(trim($phone) != "")
        {
            $user->getByPhone($phone);
            if($user->group_id == 3) // clinicians only check
            {
                $activityLog = new Activity_Log($f3->get('DB'));
                $activityLog->LogActivity($user->id, $text, $params, $patientid);
            }
        }
        else 
        {
            $userId = $f3->get('SESSION.id');
            $user->getById($userId);
            if($user->group_id == 3) // clinicians only check
            {
                $activityLog = new Activity_Log($f3->get('DB'));
                $activityLog->LogActivity($userId, $text, $params, $patientid);
            }
        }
       
    }
    
}

