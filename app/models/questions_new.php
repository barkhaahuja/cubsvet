<?php

namespace models;

/**
 * @property  current_step
 * @property mixed create_date
 */
class Questions_New extends \DB\SQL\Mapper {

    // Instantiate mapper
    function __construct(\DB\SQL $db) {

        $f3 = \Base::instance();

        // This is where the mapper and DB structure synchronization occurs
        parent::__construct($f3->get('DB'), 'questions_new');
    }

    public function getByQuestionnaireAndStep($questionnaireid, $step)
    {
        $this->reset();
        $this->load(array('questionnaire_id='. $questionnaireid . ' and questionnaire_order_index='. $step));
    }
    
    public function getFirstStepOfQuestionnaire($questionnaireId)
    {
        $this->reset();
        $this->load(array('questionnaire_id='. $questionnaireId .' and deleted = 0 order by questionnaire_order_index asc limit 0,1'));
    }
    
    public function getNextStepOfquestionnaire($questionnaireId, $currentStep)
    {
        $this->reset();
        $this->load(array('questionnaire_id='. $questionnaireId .' and deleted = 0 and questionnaire_order_index > '.$currentStep.' order by questionnaire_order_index asc limit 0,1'));
    }
    
    public function isLastQuestion($questionnaireid, $step)
    {
        $this->reset();
        $this->load(array('questionnaire_id='. $questionnaireid .' and deleted = 0  order by questionnaire_order_index desc limit 0,1'));
        if($this->questionnaire_order_index == $step)
        {
            return true;
        }
       
        return false;
    }
    
    public function isFirstQuestion($questionnaireid, $step)
    {
        $this->reset();
        $this->load(array('questionnaire_id='. $questionnaireid .' and deleted = 0  order by questionnaire_order_index asc limit 0,1'));
        
        if($this->questionnaire_order_index == $step)
        {
            return true;
        }
        return false;
    }
    
    public function getAllOptions($id)
    {
        $f3 = \Base::instance();
        $options = new Options_New($f3->get('DB'));
        $options = $options->find(array('question_id='.$id.' and deleted = 0 order by option_order_index asc'));
        return $options;
    }
    
}
