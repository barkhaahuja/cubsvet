<?php

namespace controllers;

use models\Note;

class WidgetPositiveExperienceController
{

    function index($f3)
    {
        $noteModel = new Note($f3->get('DB'));
        $notes = array();

        foreach($noteModel->getByUser($f3->get('SESSION.id')) as  $note) {
            $date=date('l d. F', strtotime($note->create_date));
            $notes[] = array(
                'id' => $note->id,
                'date' => $this->dandateformat($date),
                'content' => $note->note
            );
        }
      
        $f3->set('ndate', $this->dandateformat(date('l d. F', time())));
        
        $f3->set('user_id', $f3->get('SESSION.id'));
        $f3->set('notes', $notes);
        echo \Template::instance()->render('dashboard/windows/window.positive-experience.htm');
    }

    function save_note($f3) {
        $note = new Note($f3->get('DB'));
        if($note->add()) {
            echo(json_encode(array('status' => 'success', 'id' => $note->id)));
            exit;
        }

        echo(json_encode(array('status' => 'error', 'msg' => "Could not save note.")));
        exit;
    }

    function delete_note($f3) {
        $id = $f3->get('PARAMS.id');
        $note = new Note($f3->get('DB'));
        $note->delete($id);
        echo(json_encode(array('status' => 'success')));
        exit;
    }
    
    function dandateformat($date){
        

        
    $months['January'] = array('dn'=>'Januar');
    $months['February'] = array('dn'=>'Februar');
    $months['March'] = array('dn'=>'Marts');
    $months['April'] = array('dn'=>'April');
    $months['May'] = array('dn'=>'Maj');
    $months['June'] = array('dn'=>'Juni');
    $months['July'] = array('dn'=>'Juli');
    $months['August'] = array('dn'=>'August');
    $months['September'] = array('dn'=>'September');
    $months['October'] = array('dn'=>'Oktober');
    $months['November'] = array('dn'=>'November');
    $months['December'] = array('dn'=>'December');

    $days['Monday'] = array('dn'=>'Mandag');
    $days['Tuesday'] = array('dn'=>'Tirsdag');
    $days['Wednesday'] = array('dn'=>'Onsdag');
    $days['Thursday'] = array('dn'=>'Torsdag');
    $days['Friday'] = array('dn'=>'Fredag');
    $days['Saturday'] = array('dn'=>'Lørdag');
    $days['Sunday'] = array('dn'=>'Søndag');

   
      
   

    foreach ($months as $key => $val){
        $date = str_replace($key, $val['dn'], $date);
    }
    foreach ($days as $key => $val){
        $date = str_replace($key, $val['dn'], $date);
    }
    
    return $date;
    }

    function update_note($f3) {
        $id = $f3->get('PARAMS.id');
        $note = new Note($f3->get('DB'));
        if( $note->edit($id) ) {
            echo(json_encode(array('status' => 'success', 'id' => $note->id)));
            exit;
        }

        echo(json_encode(array('status' => 'error', 'msg' => "Could not update note.")));
        exit;
    }

    function beforeRoute($f3)
    {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }

}
