<?php

namespace models;

/**
 * @property  current_step
 * @property mixed create_date
 */
class MappingQuestionnaireUser extends \DB\SQL\Mapper {

    // Instantiate mapper
    function __construct(\DB\SQL $db) {

        $f3 = \Base::instance();

        // This is where the mapper and DB structure synchronization occurs
        parent::__construct($f3->get('DB'), 'mapping_questionnaire_user');
    }

    
    // Below are new questions
    /**
    * @param $user User model instance
    * @return Quiz
    */
    function createQuestionnaireForUser($questionnaireId, $user) {
       
        $f3 = \Base::instance();
          
        $startingStep = 0;
        $question = new Questions_New($f3->get('DB'));
        $question->getFirstStepOfQuestionnaire($questionnaireId);
        
        $this['questionnaire_id'] = $questionnaireId;
        $this['created_by'] = $user->owner_id;
        $this['user_id'] = $user->id;
        $this['created_on'] = date('Y-m-d H:i:s', time());
        $this['current_step'] = $question->questionnaire_order_index;
        
        return $this->save();
    }
    
    function createLiteQuestionnaireForUser($user) {
        
        $this['questionnaire_id'] = 3;
        $this['created_by'] = $user->owner_id;
        $this['user_id'] = $user->id;
        $this['created_on'] = date('Y-m-d H:i:s', time());
        return $this->save();
    }
    
    function getByQuery($query)
    {
        $this->reset();
        $this->load(array($query));
        return $this->query;
    }
    
    function updateQuestionnaireWithNextQuestion($mappingQuestionnaireUserId)
    {
        $this->load(array('id='.$mappingQuestionnaireUserId));
        
        $f3 = \Base::instance();
        $question = new Questions_New($f3->get('DB'));
        $question->getNextStepOfquestionnaire($this->questionnaire_id, $this->current_step);
       
        if($question->dry())
        {
            // questionnaire has finished
        
            return -1;
        }
        else
        {
            $updatedStep =  $question->questionnaire_order_index;
            $this->db->exec('UPDATE mapping_questionnaire_user SET current_step = '.$updatedStep.' WHERE id=' . $mappingQuestionnaireUserId);
        
            return $updatedStep;
        }
        
    }
    
    function updateStartedOn($mappingId)
    {
        $this->reset();
        $this->db->exec("UPDATE mapping_questionnaire_user SET started_on = '". date('Y-m-d H:i:s', time()) ."' WHERE id=" . $mappingId." and started_on IS NULL");
    }

    function updateEndedOn($mappingId)
    {
        $this->reset();
        $this->db->exec("UPDATE mapping_questionnaire_user SET ended_on = '". date('Y-m-d H:i:s', time()) ."' WHERE id=" . $mappingId);
    }
    
    function getQuizIdForPreBigQuestionnaire($userid)
    {
        $this->reset();
        $this->load(array('questionnaire_id = 1 and user_id = '.$userid));
        
        if($this->dry() || ($this->started_on == null))
        {
            return -1;
        }
        else
        {
            return $this->id;
        }
    }
    
    function getByQuestionnareIdAndUserId($questionnaireid, $userid)
    {
        $this->reset();
        $this->load(array('questionnaire_id='.$questionnaireid.' and user_id='. $userid. ' order by id desc' ));
    }
}
