<?php

namespace controllers;

use DB\SQL\Mapper;
use models\Natreg;

class WidgetDepressiveController {

    function index($f3) {
         
        $user = $f3->get('SESSION.id');
        
       

        $f3->set('user_id', $user);
        $f3->set('cdate', date('Y-m-d'));
        $f3->set('tstamp', date('Ymdhis'));

        echo \Template::instance()->render('dashboard/windows/window.depressive.htm');
    }
    
    
     function depressive1($f3) {
         
        $user = $f3->get('SESSION.id');
        
       

        $f3->set('user_id', $user);
        $f3->set('cdate', date('Y-m-d'));
        $f3->set('tstamp', date('Ymdhis'));

        echo \Template::instance()->render('dashboard/windows/window.depressive1.htm');
    }
    
    function depressive2($f3) {
         
        $user = $f3->get('SESSION.id');
        
       

        $f3->set('user_id', $user);
        $f3->set('cdate', date('Y-m-d'));
        $f3->set('tstamp', date('Ymdhis'));

        echo \Template::instance()->render('dashboard/windows/window.depressive2.htm');
    }

function depressive3($f3) {
         
        $user = $f3->get('SESSION.id');
        
       

        $f3->set('user_id', $user);
        $f3->set('cdate', date('Y-m-d'));
        $f3->set('tstamp', date('Ymdhis'));

        echo \Template::instance()->render('dashboard/windows/window.depressive3.htm');
    }
    

    function beforeRoute($f3) {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }

    function updatechallange($f3) {
       
        $txt = $_REQUEST['txt'];
        $fld = $_REQUEST['fld'];

        $user = $f3->get('SESSION.id');
        $dt = date('Y-m-d h:i:s');

        $cdata = $f3->get('DB')->exec('SELECT * FROM depressive_tasks where user_id=' . $user);
        if ($cdata) {
            foreach ($cdata as $key => $data);
            
           
                $f3->get('DB')->exec("update depressive_tasks set " . $fld . "='" . $txt . "' where id=" . $data['id']);
            
        } else {

            $f3->get('DB')->exec("insert into depressive_tasks(user_id," . $fld . ",created_at) values(" . $user . ",'" . $txt . "','" . $dt . "')");
        }
        echo json_encode(array('status' => 'success'));

        exit;
    }
    
    
    

    function checkchallange($f3) {

        
        $fld = $_REQUEST['fld'];

        $user = $f3->get('SESSION.id');


        $cdata = $f3->get('DB')->exec('SELECT ' . $fld . ' FROM depressive_tasks where user_id=' . $user);
        if ($cdata) {
            foreach ($cdata as $key => $data)
                ;
            $txtdata = $data[$fld];

            if ($txtdata) {
                echo json_encode(array('status' => 'success', 'txtdata' => $txtdata));
            } else {
                echo json_encode(array('status' => 'failed', 'txtdata' => ''));
            }
        } else {
            echo json_encode(array('status' => 'failed', 'txtdata' => ''));
        }


        exit;
    }



    function getTstep($f3) {
        $user = $f3->get('SESSION.id');

        $negdata = $f3->get('DB')->exec('SELECT treatment_step FROM user where id=' . $user);
        if ($negdata) {
            foreach ($negdata as $key => $data)
                ;
            $tstep = $data['treatment_step'];
        }
        echo json_encode(array('status' => 'success', 'tstep' => $tstep));
    }
    
    
    function eventcheck($f3) {
        $user = $f3->get('SESSION.id');
        $flag=0;
        
      
        
        $negdata = $f3->get('DB')->exec('SELECT m9_event from depressive_tasks where  m9_status=0 and user_id=' . $user);
        if ($negdata) {
            
      
            foreach ($negdata as $key => $data);
                
            $e1 = $data['m9_event'];
           
            
            if ($e1) {

                $actdata = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where id=' . $e1);

                if ($actdata) {
                    foreach ($actdata as $key => $data)
                        ;

                $dt = $data['date_start'];
                $tday=date('Y-m-d H:i:s');   
                $timestamp = strtotime($dt);
               

                $day = date('d', $timestamp);
                $time = date('D', $timestamp) . " " . date('H', $timestamp) . "." . date('i', $timestamp);
                $month=date('m', $timestamp);
                
                
                 $timestamp1 = strtotime($tday);
                 if($timestamp1>$timestamp){
                     $flag=1;
                 }
                }
            }
            
        }
        echo json_encode(array('status' => 'success', 'flag' => $flag));
    }
    
    function eventcheck1($f3) {
        $user = $f3->get('SESSION.id');
        $flag=0;
        $negdata = $f3->get('DB')->exec('SELECT m10_event from depressive_tasks where  m10_status=0 and user_id=' . $user);
        if ($negdata) {
            foreach ($negdata as $key => $data);
                
            $e1 = $data['m10_event'];
           
            
            if ($e1) {

                $actdata = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where id=' . $e1);

                if ($actdata) {
                    foreach ($actdata as $key => $data)
                        ;

                    
                $dt = $data['date_start'];
                $tday=date('Y-m-d H:i:s');   
                $timestamp = strtotime($dt);
               

                $day = date('d', $timestamp);
                $time = date('D', $timestamp) . " " . date('H', $timestamp) . "." . date('i', $timestamp);
                $month=date('m', $timestamp);
                
                
                 $timestamp1 = strtotime($tday);
                 if($timestamp1>$timestamp){
                     $flag=1;
                 }
                }
            }
            
        }
        echo json_encode(array('status' => 'success', 'flag' => $flag));
    }
    
    function eventcheck2($f3) {
        $user = $f3->get('SESSION.id');
        $flag=0;
        $negdata = $f3->get('DB')->exec('SELECT m11_event from depressive_tasks where  m11_status=0 and user_id=' . $user);
        if ($negdata) {
            foreach ($negdata as $key => $data);
                
            $e1 = $data['m11_event'];
           
            
            if ($e1) {

                $actdata = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where id=' . $e1);

                if ($actdata) {
                    foreach ($actdata as $key => $data)
                        ;

                   
                $dt = $data['date_start'];
                $tday=date('Y-m-d H:i:s');   
                $timestamp = strtotime($dt);
               

                $day = date('d', $timestamp);
                $time = date('D', $timestamp) . " " . date('H', $timestamp) . "." . date('i', $timestamp);
                $month=date('m', $timestamp);
                
                
                 $timestamp1 = strtotime($tday);
                 if($timestamp1>$timestamp){
                     $flag=1;
                 }
                }
            
            }
        }
        echo json_encode(array('status' => 'success', 'flag' => $flag));
    }
    
    function updateeventstatus($f3) {
       

        $user = $f3->get('SESSION.id');
       

        $f3->get('DB')->exec("update depressive_tasks set m9_status=1 where user_id=" . $user);
           
        echo json_encode(array('status' => 'success'));

        exit;
    }
    
    
    function updateeventstatus1($f3) {
       

        $user = $f3->get('SESSION.id');
       

        $f3->get('DB')->exec("update depressive_tasks set m10_status=1 where user_id=" . $user);
           
        echo json_encode(array('status' => 'success'));

        exit;
    }
    
    function updateeventstatus2($f3) {
       

        $user = $f3->get('SESSION.id');
       

        $f3->get('DB')->exec("update depressive_tasks set m11_status=1 where user_id=" . $user);
           
        echo json_encode(array('status' => 'success'));

        exit;
    }
    
    
    function eventcheckforload($f3) {

        $user = $f3->get('SESSION.id');
        $flag = 0;
        $negdata = $f3->get('DB')->exec('SELECT m9_event from depressive_tasks where m9_status=0 and user_id=' . $user);
        if ($negdata) {
            foreach ($negdata as $key => $data);

                $e1 = $data['m9_event'];

                if ($e1) {

                    $flag = 1;
                }
            
        }
        echo json_encode(array('status' => 'success', 'flag' => $flag));
    }
    
    function eventcheckforload1($f3) {

        $user = $f3->get('SESSION.id');
        $flag = 0;
        $negdata = $f3->get('DB')->exec('SELECT m10_event from depressive_tasks where m10_status=0 and user_id=' . $user);
        if ($negdata) {
            foreach ($negdata as $key => $data);

                $e1 = $data['m10_event'];

                if ($e1) {

                    $flag = 1;
                }
            
        }
        echo json_encode(array('status' => 'success', 'flag' => $flag));
    }
    
    function eventcheckforload2($f3) {

        $user = $f3->get('SESSION.id');
        $flag = 0;
        $negdata = $f3->get('DB')->exec('SELECT m11_event from depressive_tasks where m11_status=0 and user_id=' . $user);
        if ($negdata) {
            foreach ($negdata as $key => $data);

                $e1 = $data['m11_event'];

                if ($e1) {

                    $flag = 1;
                }
            
        }
        echo json_encode(array('status' => 'success', 'flag' => $flag));
    }

}
