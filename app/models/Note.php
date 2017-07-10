<?php

namespace models;

/**
 *
 * @property mixed id
 */
class Note extends \DB\SQL\Mapper
{

    // Instantiate mapper
    function __construct(\DB\SQL $db)
    {

        $f3 = \Base::instance();

        // This is where the mapper and DB structure synchronization occurs
        parent::__construct($f3->get('DB'), 'widget_positive_experience');
    }

    public function all()
    {
        $this->reset();
        $this->load();
        return $this->query;
    }

    public function last_note($user)
    {
        $this->reset();
        $this->getByUser($user);
        return $this->last();
    }

    public function getByUser($id)
    {
        $this->reset();
        $this->load(array('user_id=?', $id));
        return $this->query;
    }

    public function getById($id)
    {
        $this->reset();
        $this->load(array('id=?', $id));
        $this->copyTo('POST');
    }

    public function add()
    {
        $this->copyFrom('POST');
        $this->set( 'create_date', date('Y-m-d H:i:s', time()) );
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
