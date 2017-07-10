<?php

namespace controllers;

use DB\SQL\Mapper;


class WidgetProblemGoalController
{

    function index($f3)
    {
        $user = $f3->get('SESSION.id');
        //$pg = new Mapper($f3->get('DB'), 'widget_problem_goal');
        //$f3->set('activities',$pg->find(array('user=?',$user)));
        
        $prblmdata = $f3->get('DB')->exec('SELECT * FROM widget_problem_goal where user=' . $user . ' ORDER BY sorder ASC');
        
        $prblmglarr = array();
        
        if($prblmdata){
            foreach($prblmdata as $key => $data){
                $prblmglarr[] = array(
                    'id' => $data['id'],
                    'title' => $data['title'],
                    'problem' => $data['problem'],
                    'situation' => $data['situation'],
                    'goal' => $data['goal'],
                    'sorder' => $data['sorder']
                );
            }
        }
        
        if(isset($prblmglarr)){
            $f3->set('activities', $prblmglarr);
        }

        echo \Template::instance()->render('dashboard/windows/window.problem-goal.htm');
    }

    function update($f3)
    {
        $post = $f3->get('POST');
        $f3->scrub($post);

        $user = $f3->get('SESSION.id');
        $date_modified = date('Y-m-d H:i:s');
        $activities = isset($post['activities']) ? $post['activities'] : array();

        $pg = new Mapper($f3->get('DB'), 'widget_problem_goal');

        // Remove All
        $pg->erase(array('user=?',$user));

        // Add Left
        foreach ($activities as $activity) {
            $pg->reset();
            $pg->user = $user;
            $pg->title = $activity['title'];
            $pg->problem = $activity['problem'];
            $pg->situation = $activity['situation'];
            $pg->goal = $activity['goal'];
            $pg->date_modified = $date_modified;
            $pg->insert();
        }
        
        $id = $pg->_id;

        echo json_encode(array('status' => 'success', 'id' => $id));
    }
    
    function updatesort($f3)
    {
        $post = $f3->get('POST');
        $f3->scrub($post);

        $sort = explode(',', $post['sort']);
        
        $updorder = array();

        $db = $f3->get('DB');
        foreach($sort as $order => $id) {
            $db->exec("UPDATE widget_problem_goal SET sorder = :o WHERE id = :id",
                array(":o" => $order + 1, ":id" => (int)$id));
        }

        echo json_encode(array('status' => 'success'));
    }
    
    function saveprblmgoal($f3)
    {
        $user = $f3->get('SESSION.id');
        $date_modified = date('Y-m-d H:i:s');
        
        $id = $_REQUEST['id'];        
        $title = $_REQUEST['title'];
        $problem = $_REQUEST['problem'];
        $situation = $_REQUEST['situation'];
        $goal = $_REQUEST['goal'];
        
        $actid = '';
        
        
        
        if(isset($id) && $id > 0){
            $f3->get('DB')->exec("UPDATE widget_problem_goal SET title='".$title."', problem='".$problem."', situation='".$situation."', goal='".$goal."', date_modified='".$date_modified."' WHERE id=" . $id);
        
            echo json_encode(array('status' => 'success'));
        } else {
            $f3->get('DB')->exec("INSERT INTO widget_problem_goal (user, title, problem, situation, goal, sorder, date_modified) VALUES (" . $user . ", '".$title."', '".$problem."', '".$situation."', '".$goal."', 0, '".$date_modified."')");
        
            $actid = $f3->get('DB')->lastInsertId();
            echo json_encode(array('status' => 'success', 'id' => $actid));
        }  
    }
    
    function delete($f3){
        $user = $f3->get('SESSION.id');
        
        $id = $f3->get('PARAMS.id');
        
        $f3->get('DB')->exec("DELETE FROM widget_problem_goal WHERE id=" . $id);
        
        echo(json_encode(array('status' => 'success')));
        exit;    
    }

    function beforeRoute($f3)
    {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }

}
