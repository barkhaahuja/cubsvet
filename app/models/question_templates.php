<?php

namespace models;

/**
 * @property  current_step
 * @property mixed create_date
 */
class Question_Templates extends \DB\SQL\Mapper {

    // Instantiate mapper
    function __construct(\DB\SQL $db) {

        $f3 = \Base::instance();

        // This is where the mapper and DB structure synchronization occurs
        parent::__construct($f3->get('DB'), 'question_templates');
    }

    public function getById($id)
    {
        $this->reset();
        $this->load(array('id=?', $id));
    }
    
}
