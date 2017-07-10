<?php

namespace models;

/**
 *
 * @property mixed id
 */
class Natreg extends \DB\SQL\Mapper {

    // Instantiate mapper
    function __construct(\DB\SQL $db)
    {
        $f3 = \Base::instance();
        
        // This is where the mapper and DB structure synchronization occurs
        parent::__construct($f3->get('DB'), 'widget_nat_registration');
    }
    
    public function all($id)
    {
        $this->reset();
        $this->load(array('user_id=?', $id));
        return $this->query;
    }
    
    public function addnatreg()
    {
        $f3 = \Base::instance();
        $this->copyFrom('POST');
        
        $this->set( 'user_id', $f3->get('SESSION.id') );
        $this->set( 'created_date', date('Y-m-d H:i:s', time()) );
        return $this->save();
    }
    
    // fix for - P0120-4
    public function adddemonatreg()
    {
        $f3 = \Base::instance();
        $this->set( 'negative_thoughts', 'Ny Negative tanker' );
        $this->set( 'user_id', $f3->get('SESSION.id') );
        $this->set( 'created_date', date('Y-m-d H:i:s', time()) );
        return $this->save();
    }
    public function editnatregwiththought($id, $thought)
    {
        $this->reset();
        $this->load(array('id=?', $id));
        $this->set('negative_thoughts', $thought);
        $this->set('negcircle', 1);
        return $this->save();
    }
    // end

    public function editnatreg($id)
    {
        $this->reset();
        $this->load(array('id=?', $id));
        $this->copyFrom('POST');
        return $this->save();
    }
    
    public function deletenatreg($id)
    {
        $this->reset();
        $this->load(array('id=?', $id));
        $this->erase();
    }
    
}
