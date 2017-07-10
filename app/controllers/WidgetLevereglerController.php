<?php

namespace controllers;

use DB\SQL\Mapper;
use models\Natreg;
use models\User;

class WidgetLevereglerController {

    function index($f3) {

        $user = $f3->get('SESSION.id');

        $f3->set('levereglers', $f3->get('DB')->exec('SELECT id,title FROM leveregler where user_id=0 or user_id=' . $user));

        $user1 = new User($f3->get('DB'));
        $user1 = $user1->getById($f3->get('SESSION.id'));
        $f3->set('currentStep', $user1->getCurrentStep());

        $f3->set('user_id', $user);
        $f3->set('cdate', date('Y-m-d'));
        $f3->set('tstamp', date('Ymdhis'));

        echo \Template::instance()->render('dashboard/windows/window.leveregler.htm');
    }

    function leveregler1($f3) {

        $user = $f3->get('SESSION.id');

        $f3->set('levereglers', $f3->get('DB')->exec('SELECT id,title FROM leveregler where user_id=0 or user_id=' . $user));

        $cdata = $f3->get('DB')->exec('SELECT a.lc_id,b.title FROM leveregler_tasks a, leveregler b where b.id=a.lc_id and a.user_id=' . $user);
        if ($cdata) {
            foreach ($cdata as $key => $data)
                ;
            $f3->set('cid', $data['lc_id']);
            $f3->set('title', $data['title']);
        }


        $user1 = new User($f3->get('DB'));
        $user1 = $user1->getById($f3->get('SESSION.id'));
        $f3->set('currentStep', $user1->getCurrentStep());

        $f3->set('user_id', $user);
        $f3->set('cdate', date('Y-m-d'));
        $f3->set('tstamp', date('Ymdhis'));

        echo \Template::instance()->render('dashboard/windows/window.leveregler1.htm');
    }

    function leveregler2($f3) {

        $user = $f3->get('SESSION.id');

        $f3->set('levereglers', $f3->get('DB')->exec('SELECT id,title FROM leveregler where user_id=0 or user_id=' . $user));

        $cdata = $f3->get('DB')->exec('SELECT a.lc_id,b.title FROM leveregler_tasks a, leveregler b where b.id=a.lc_id and a.user_id=' . $user);
        if ($cdata) {
            foreach ($cdata as $key => $data)
                ;
            $f3->set('cid', $data['lc_id']);
            $f3->set('title', $data['title']);
        }

        $user1 = new User($f3->get('DB'));
        $user1 = $user1->getById($f3->get('SESSION.id'));
        $f3->set('currentStep', $user1->getCurrentStep());

        $f3->set('user_id', $user);
        $f3->set('cdate', date('Y-m-d'));
        $f3->set('tstamp', date('Ymdhis'));

        echo \Template::instance()->render('dashboard/windows/window.leveregler2.htm');
    }

    function beforeRoute($f3) {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }

    function updatechallange($f3) {
        $cid = $_REQUEST['cid'];
        $txt = $_REQUEST['txt'];
        $fld = $_REQUEST['fld'];

        $user = $f3->get('SESSION.id');
        $dt = date('Y-m-d h:i:s');

        // this is to update title only which is stored in leveregler table and not leveregler_tasks
        if($fld == 'm1' && $cid != "")
        {
            $f3->get('DB')->exec("update leveregler set title='" . $txt . "' where id=" . $cid);
        }
        
        $cdata = $f3->get('DB')->exec('SELECT * FROM leveregler_tasks where user_id=' . $user . ' and lc_id=' . $cid);
        if ($cdata) {
            foreach ($cdata as $key => $data)
                ;

            if ($fld == 'm11') {
                $f3->get('DB')->exec("update leveregler_tasks set " . $fld . "='" . $txt . "',status=1 where id=" . $data['id']);
            } 
            else {
                $f3->get('DB')->exec("update leveregler_tasks set " . $fld . "='" . $txt . "' where id=" . $data['id']);
            }
        } else {

            $f3->get('DB')->exec("insert into leveregler_tasks(lc_id, user_id," . $fld . ",created_at) values(" . $cid . "," . $user . ",'" . $txt . "','" . $dt . "')");
        }
        echo json_encode(array('status' => 'success'));

        exit;
    }

    function createchallange($f3) {

        $txt = $_REQUEST['txt'];


        $user = $f3->get('SESSION.id');
        $dt = date('Y-m-d h:i:s');



        $f3->get('DB')->exec("insert into leveregler(title, user_id,status) values('" . $txt . "'," . $user . ",1)");
        $cid = $f3->get('DB')->lastInsertId();

        echo json_encode(array('status' => 'success', 'cid' => $cid));

        exit;
    }

    function checkchallange($f3) {

        $cid = $_REQUEST['cid'];
        $fld = $_REQUEST['fld'];

        $user = $f3->get('SESSION.id');


        $cdata = $f3->get('DB')->exec('SELECT ' . $fld . ' FROM leveregler_tasks where user_id=' . $user . ' and lc_id=' . $cid);
        if ($cdata) {
            foreach ($cdata as $key => $data) {
                $txtdata = $data[$fld];
            }

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
        $flag = 0;
        $negdata = $f3->get('DB')->exec('SELECT event_id from leveregler_tasks where  status=0 and user_id=' . $user . ' order by id desc limit 1');
        if ($negdata) {
            foreach ($negdata as $key => $data) {
                $e1 = $data['event_id'];
                if ($e1) {
                    $actdata = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where id=' . $e1);
                    if ($actdata) {
              
                        foreach ($actdata as $key => $data) {
                            $dt = $data['date_start'];
                        }
                       
                        $tday = date('Y-m-d H:i:s');
                        $timestamp = strtotime($dt);


                        $day = date('d', $timestamp);
                        $time = date('D', $timestamp) . " " . date('H', $timestamp) . "." . date('i', $timestamp);
                        $month = date('m', $timestamp);


                        $timestamp1 = strtotime($tday);
                        if ($timestamp1 > $timestamp) {
                            $flag = 1;
                        }
                    }
                }
            }
        }
        echo json_encode(array('status' => 'success', 'flag' => $flag));
    }

    function eventcheckforload($f3) {
        $user = $f3->get('SESSION.id');
        $flag = 0;
        $negdata = $f3->get('DB')->exec('SELECT event_id from leveregler_tasks where  status=0 and user_id=' . $user);
        if ($negdata) {
            foreach ($negdata as $key => $data) {

                $e1 = $data['event_id'];

                if ($e1) {
                    $actdata = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where id=' . $e1);

                    if ($actdata) {


                        $flag = 1;
                    }
                }
            }
        }
        echo json_encode(array('status' => 'success', 'flag' => $flag));
    }

    function updateeventstatus($f3) {
        $user = $f3->get('SESSION.id');
        $f3->get('DB')->exec("update leveregler_tasks set status=1 where user_id=" . $user);
        echo json_encode(array('status' => 'success'));
        exit;
    }

}
