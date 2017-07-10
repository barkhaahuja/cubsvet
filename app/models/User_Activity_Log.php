<?php

namespace models;

/**
 * @property  current_step
 * @property mixed create_date
 */
class User_Activity_Log extends \DB\SQL\Mapper {

    // Instantiate mapper
    function __construct(\DB\SQL $db) {

        $f3 = \Base::instance();

        // This is where the mapper and DB structure synchronization occurs
        parent::__construct($f3->get('DB'), 'user_activity_log');
    }
    
    public function getbyId($id)
    {
        $this->reset();
        $this->load(array('id = '.$id));
    }
   
}


