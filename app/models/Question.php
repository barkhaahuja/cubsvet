<?php

namespace models;

/**
 * @property mixed questionnaire_id
 * @property string last_question
 * @property mixed id
 */
class Question extends \DB\SQL\Mapper
{

    // Instantiate mapper
    function __construct(\DB\SQL $db)
    {

        $f3 = \Base::instance();

        // This is where the mapper and DB structure synchronization occurs
        parent::__construct($f3->get('DB'), 'question');
    }

    /**
     * Verify if it is the last question for it questionnaire
     * @return bool
     */
    function isLastQuestion()
    {
        // lets find max id for the questionnaire
        $max_id = $this->select(
            'MAX(id) as last_question', array('questionnaire_id=?', $this->questionnaire_id));
        $result = $this->id == $max_id[0]['last_question'];
        $this->reset();
        return $result;
    }
}
