<?php

namespace models;

use \DB\SQL\Mapper;
use \DB\SQL;

/**
 *
 * @property mixed id
 * @property mixed name
 */
class Group extends Mapper
{

    // Instantiate mapper
    function __construct(SQL $db)
    {

        $f3 = \Base::instance();

        // This is where the mapper and DB structure synchronization occurs
        parent::__construct($f3->get('DB'), 'group');
    }

    public function all()
    {
        $this->reset();
        $this->load();
        return $this->query;
    }

    public function getById($id)
    {
        $this->reset();
        $this->load(array('id=?', $id));
        return $this->query;
    }

    public function getDoctorGroups()
    {
        $this->reset();
        return $this->find(array('id < ?',3));
    }

    public function add()
    {
        $this->copyFrom('POST');
        return $this->save();
    }

    public function edit($id)
    {
        $this->reset();
        $this->load(array('id=?', $id));
        $this->copyFrom('POST');
        return $this->save();
    }

    public function delete($id)
    {
        $this->reset();
        $this->load(array('id=?', $id));
        $this->erase();
    }
}
