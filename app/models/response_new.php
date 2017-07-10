<?php

namespace models;

/**
 * @property  current_step
 * @property mixed create_date
 */
class Response_New extends \DB\SQL\Mapper {

    // Instantiate mapper
    function __construct(\DB\SQL $db) {

        $f3 = \Base::instance();

        // This is where the mapper and DB structure synchronization occurs
        parent::__construct($f3->get('DB'), 'response_new');
    }
    
    public function getbyId($id)
    {
        $this->reset();
        $this->load(array('id = '. $id));
    }

    public function getQuestionnaireData($questionnaireid, $user)
    {  
    
        return $this->db->exec("select case when r.issuboption = 1 THEN '' ELSE q.title END as rquestion,case when r.issuboption = 1 THEN '' ELSE q.subtitle END as rsubquestion,o.option_text as roption, r.option_value as optionvalue, r.option_additional_remarks as remarks,  case when r.issuboption = 1 THEN '' ELSE r.responded_on END as rdate from response_new r left join question_options_new o on r.option_id = o.id
                                left join questions_new q on r.question_id = q.id
                                left join mapping_questionnaire_user m on r.quiz_id = m.id
                                where m.user_id = ".$user." and m.questionnaire_id = ".$questionnaireid);
       
    }
    
    public function getQuizIdForLiteQuestionnaires($questionnaireid, $user)
    {
      
      $this->reset();
      return  $this->db->exec("select m.id, started_on, ended_on from mapping_questionnaire_user m where m.user_id = ".$user." and m.questionnaire_id = ".$questionnaireid." order by id desc");
        
    }
    
    public function getLiteQuestionnaireData($questionnaireid, $user)
    {  

        return $this->db->exec("select m.id, case when r.issuboption = 1 THEN '' ELSE q.title END as rquestion,case when r.issuboption = 1 THEN '' ELSE q.subtitle END as rsubquestion,o.option_text as roption, r.option_value as optionvalue, r.option_additional_remarks as remarks,  case when r.issuboption = 1 THEN '' ELSE r.responded_on END as rdate from response_new r left join question_options_new o on r.option_id = o.id
                                left join questions_new q on r.question_id = q.id
                                left join mapping_questionnaire_user m on r.quiz_id = m.id
                                where  m.user_id = ".$user." and m.questionnaire_id = ".$questionnaireid);
       
    }
    
    public function getQuestionnaireStartDate($questionnaireid, $user)
    {  
        $f3 = \Base::instance();
        $quiz = new MappingQuestionnaireUser($f3->get('DB'));
        $quiz->getByQuestionnareIdAndUserId($questionnaireid,$user);
        if($quiz->started_on == null)
        {
            if($questionnaireid == 1)
            {
                return "Pre-Big Questionnaire not started";
            }
            else if($questionnaireid == 2)
            {
                  return "Post-Big Questionnaire not started";
            }
            else if($questionnaireid == 3)
            {
                  return "Lite Questionnaire not started";
            }
            else if ($questionnaireid == 4)
            {
                  return "Follow up Questionnaire not started";
            }
        }
        else
        {
          return  $quiz->started_on;
        }
    }
    
    public function getQuestionnaireEndDate($questionnaireid, $user)
    {  
    
        $f3 = \Base::instance();
        $quiz = new MappingQuestionnaireUser($f3->get('DB'));
        $quiz->getByQuestionnareIdAndUserId($questionnaireid,$user);
        if($quiz->ended_on == null)
        {
            if($questionnaireid == 1)
            {
                return "Pre-Big Questionnaire not ended";
            }
            else if($questionnaireid == 2)
            {
                  return "Post-Big Questionnaire not ended";
            }
            else if($questionnaireid == 3)
            {
                  return "Lite Questionnaire not ended";
            }
            else if ($questionnaireid == 4)
            {
                  return "Follow up Questionnaire not ended";
            }
        }
        else
        {
          return  $quiz->ended_on;
        }
       
    }
    
}
