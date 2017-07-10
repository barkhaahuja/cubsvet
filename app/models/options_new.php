<?php

namespace models;

/**
 * @property  current_step
 * @property mixed create_date
 */
class Options_New extends \DB\SQL\Mapper {

    // Instantiate mapper
    function __construct(\DB\SQL $db) {

        $f3 = \Base::instance();

        // This is where the mapper and DB structure synchronization occurs
        parent::__construct($f3->get('DB'), 'question_options_new');
    }
    
    public function getbyId($id)
    {
        $this->reset();
        $this->load(array('id = '.$id));
    }
    
    public function getOptionsByQuestionId($questionid)
    {
        $this->reset();
        return $this->find(array('question_id = '.$questionid.' and deleted = 0'));
    }

    
    
}
