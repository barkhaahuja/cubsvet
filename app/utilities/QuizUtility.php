<?php

namespace utilities;

use models\User;
use models\MappingQuestionnaireUser;

/**
 *
 * @property mixed id
 */
class QuizUtility
{
  
    public static function createQuestionnaireForUser($questionnaireId, $user) {
        
        // checking if already exists
        $f3 = \Base::instance();
        $mappingQuestionnaireUser = new MappingQuestionnaireUser($f3->get('DB')); 
        $mappingQuestionnaireUser = $mappingQuestionnaireUser->find('questionnaire_id='. $questionnaireId . ' and user_id='. $user->id);
        
        // this is to avoid duplicate entries
        if(sizeof($mappingQuestionnaireUser) == 0)
        {
            $obj = new MappingQuestionnaireUser($f3->get('DB')); 
            $obj->createQuestionnaireForUser($questionnaireId, $user);
        }
    }
    
    public static function createLiteQuestionnaireForUser($user) {
        
        // checking if already exists
        $f3 = \Base::instance();
        if($user->disable_lite_questionnaires == 0)
        {
           $mappingQuestionnaireUser = new MappingQuestionnaireUser($f3->get('DB')); 
            $mappingQuestionnaireUser = $mappingQuestionnaireUser->findone('questionnaire_id = 3 and user_id=' . $user->id . ' order by created_on DESC');

            // this is to avoid duplicate entries
            if(($mappingQuestionnaireUser == null) || ($mappingQuestionnaireUser->ended_on != null))
            {
                $obj = new MappingQuestionnaireUser($f3->get('DB')); 
                $obj->createLiteQuestionnaireForUser($user);
            }
        }
        else
        {
            $f3->get('DB')->exec('delete from mapping_questionnaire_user where ended_on is null and questionnaire_id = 3 and user_id = '.$user->id);
        }
        
    }
    
    public static function getDaysSincePreBigQuestionnaireTaken($user)
    {
        $f3 = \Base::instance();
       $mappingQuestionnaireUser = new MappingQuestionnaireUser($f3->get('DB'));
       $mappingQuestionnaireUser = $mappingQuestionnaireUser->findone('questionnaire_id = 1 and user_id = ' .$user->id);
 
       if ($mappingQuestionnaireUser == null) {
           return -1; // pre big not yet completed
       }
       
       if ($mappingQuestionnaireUser->ended_on != null) {
           return self::getDaysTillToday($mappingQuestionnaireUser->ended_on);
       }
       else
       {
          return -1; // pre big not yet completed
       }
    }
    
    public static function getDaysSinceLiteQuestionnaireTaken($user)
    {
        $f3 = \Base::instance();
        $mappingQuestionnaireUser = new MappingQuestionnaireUser($f3->get('DB'));
        $mappingQuestionnaireUser = $mappingQuestionnaireUser->findone('questionnaire_id = 3 and user_id=' . $user->id . ' order by created_on DESC');
        
        if($mappingQuestionnaireUser == null)
        {
            // find out from first login date
            $prebigmapping = new MappingQuestionnaireUser($f3->get('DB'));
            $prebigmapping = $prebigmapping->findone('questionnaire_id = 1 and user_id='. $user->id);
			if($prebigmapping == null)
			{
				return 0;
			}
            return self::getDaysTillToday($prebigmapping->created_on);
        }
        else
        {
           if ($mappingQuestionnaireUser->ended_on != null) {

              return self::getDaysTillToday($mappingQuestionnaireUser->ended_on);
           }
           else
           {
              return -1; // already has a lite in pending
           }
        }
      
    }
    
    public static function createRelevantQuizForUser($user)
    {
        // checking if this user is a patient
        if(( ($user->isControlGroup() || $user->isExperimentalGroup())) && ($user->discharged == 0) )
        {
            // Checking for Pre-Big Questionnaire, Post Big and FollowUp
            if(!$user->hasTakenPreBigQuestionnaire())
            {
                self::createQuestionnaireForUser(1, $user);
            }
            else
            {
                $numberDays = self::getDaysSincePreBigQuestionnaireTaken($user);
                
                if ($numberDays >= 70 && $numberDays <= 77) {
                    // add Post Big Questionnaire
                    self::createQuestionnaireForUser(2, $user);
                }
                else if($numberDays >= 168)
                {
                    // add follow up questionnaire
                    self::createQuestionnaireForUser(4, $user);
                }
            }
            
            // Checking for lite questionnaire
           
            if (self::getDaysSinceLiteQuestionnaireTaken($user) >= 7) {
                 // add lite questionnaire
                 self::createLiteQuestionnaireForUser($user);
            }
        }
        else
        {
            // deleting any pending questionnaires
            if($user->discharged == 1)
            {
                $f3 = \Base::instance();
                $f3->get('DB')->exec('delete from mapping_questionnaire_user where ended_on is null and user_id = '.$user->id);
            
			}
        }
    }
    
    public static function getPendingQuiz($user)
    {
        $f3 = \Base::instance();
        $mappingQuestionnaireUser = new MappingQuestionnaireUser($f3->get('DB'));
        $mappingQuestionnaireUser = $mappingQuestionnaireUser->findone('user_id='. $user->id . ' and ended_on is null order by created_on ASC');
        
        return $mappingQuestionnaireUser;
    }        
    
    public static function getDaysTillToday($datetime)
    {
           $now = date_create(); 
           $ref = date_create($datetime);
           $timeDiff = ( date_timestamp_get($now) - date_timestamp_get($ref));
           $numberDays = $timeDiff/86400;  // 86400 seconds in one day
           $numberDays = floor($numberDays);
           return $numberDays;
    }
  
}
