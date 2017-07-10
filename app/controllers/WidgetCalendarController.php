<?php

/**
 * Created by PhpStorm.
 * User: Jorge Rafael
 * Date: 1/6/14
 * Time: 12:04 PM
 */

namespace controllers;

use DB\SQL\Mapper;

class WidgetCalendarController {

    function index($f3) {
        $user = $f3->get('SESSION.id');
        $al = new Mapper($f3->get('DB'), 'widget_activity_list');

        // for the calendar activities we join this two checking for satisfying and
        // demanding fields, this allow us to use all of them in both, calendar and
        // activity list later one when showing it on calendar.
        // pleasurable activities



        $f3->set('user_id', $user);
        $f3->set('cdate', date('Y-m-d'));
        $f3->set('tstamp', date('Ymdhis'));
        echo \Template::instance()->render('dashboard/windows/window.calendar.htm');
    }

    function calendar32($f3) {




        $user = $f3->get('SESSION.id');
        $al = new Mapper($f3->get('DB'), 'widget_activity_list');

        // for the calendar activities we join this two checking for satisfying and
        // demanding fields, this allow us to use all of them in both, calendar and
        // activity list later one when showing it on calendar.
        // pleasurable activities

        $f3->set('activities_left', $f3->get('DB')->exec('SELECT * FROM widget_activity_list where ubication="left" and user=' . $user));
        // demanding activities

        $f3->set('activities_right', $f3->get('DB')->exec('SELECT * FROM widget_activity_list where ubication="right" and user=' . $user));



        $f3->set('user_id', $user);
        $f3->set('cdate', date('Y-m-d'));
        $f3->set('tstamp', date('Ymdhis'));
        echo \Template::instance()->render('dashboard/windows/window.calendar32.htm');
    }

    function calendar36($f3) {

        $user = $f3->get('SESSION.id');
        $al = new Mapper($f3->get('DB'), 'widget_activity_list');

        // for the calendar activities we join this two checking for satisfying and
        // demanding fields, this allow us to use all of them in both, calendar and
        // activity list later one when showing it on calendar.
        // pleasurable activities

        $f3->set('activities_left', $f3->get('DB')->exec('SELECT * FROM widget_activity_list where ubication="left" and user=' . $user));
        // demanding activities

        $f3->set('activities_right', $f3->get('DB')->exec('SELECT * FROM widget_activity_list where ubication="right" and user=' . $user));



        $f3->set('user_id', $user);
        $f3->set('cdate', date('Y-m-d'));
        $f3->set('tstamp', date('Ymdhis'));
        echo \Template::instance()->render('dashboard/windows/window.calendar36.htm');
    }

    function calendar39($f3) {

        $user = $f3->get('SESSION.id');
        $al = new Mapper($f3->get('DB'), 'widget_activity_list');

        // for the calendar activities we join this two checking for satisfying and
        // demanding fields, this allow us to use all of them in both, calendar and
        // activity list later one when showing it on calendar.
        // pleasurable activities

        $f3->set('activities_left', $f3->get('DB')->exec('SELECT * FROM widget_activity_list where ubication="left" and user=' . $user));
        // demanding activities

        $f3->set('activities_right', $f3->get('DB')->exec('SELECT * FROM widget_activity_list where ubication="right" and user=' . $user));

        $f3->set('activity_cat', $f3->get('DB')->exec('SELECT * FROM activity_category where user_id=' . $user));

        $f3->set('user_id', $user);
        $f3->set('cdate', date('Y-m-d'));
        $f3->set('tstamp', date('Ymdhis'));
        echo \Template::instance()->render('dashboard/windows/window.calendar39.htm');
    }

    /**
     * Receives the data from fullcalendar.eventResize: dayDelta, minuteDelta
     * @param $f3
     */
    function updateTimeInterval($f3) {
        $id = $f3->get('PARAMS.id');
        $al = new Mapper($f3->get('DB'), 'widget_activity_list');
        $al->load(array('id=?', $id));
        $al->copyfrom("POST");
        if ($al->save()) {
            echo json_encode(array('status' => 'success'));
            exit;
        }
        echo json_encode(array('status' => 'error'));
        exit;
    }

    function create($f3) {
        $stdt = $_REQUEST['date_start'];
        $endt = $_REQUEST['date_end'];
        $user = $f3->get('SESSION.id');

        $f3->get('DB')->exec("insert into widget_activity_list (user, activity,date_start,date_end,satisfying,challenging) values(" . $user . ",'Ny aktivitet','" . $stdt . "','" . $endt . "',0,0)");

        $aid = $f3->get('DB')->lastInsertId();

        echo json_encode(array('status' => 'success', 'id' => $aid));

        exit;
    }

    function createchact($f3) {
        $stdt = $_REQUEST['date_start'];
        $title = $_REQUEST['title'];
        $endt = $_REQUEST['date_end'];
        $cid = $_REQUEST['cid'];
        $eid = $_REQUEST['eid'];
        $user = $f3->get('SESSION.id');

        if ($eid) {
            $f3->get('DB')->exec("delete from widget_activity_list  where id=" . $eid);
        }

        $f3->get('DB')->exec("insert into widget_activity_list (user, activity,date_start,date_end,satisfying,challenging) values(" . $user . ",'" . $title . "','" . $stdt . "','" . $endt . "',0,0)");

        $aid = $f3->get('DB')->lastInsertId();


        $f3->get('DB')->exec("update nat_challenges set event_id=" . $aid . " where user_id=" . $user . " and nc_id=" . $cid);

        echo json_encode(array('status' => 'success', 'eid' => $aid));

        exit;
    }

    function beforeRoute($f3) {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }

    function events($f3) {
        $user = $f3->get('SESSION.id');
        $activities = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where  ubication IS NULL and user=' . $user);


        $mdata = array();
        foreach ($activities as $key => $data) {
            $adata = array();
            $adata['id'] = $data['id'];
            $adata['title'] = $data['activity'];
            $adata['start'] = $data['date_start'];
            $adata['end'] = $data['date_end'];
            //$adata['axisFormat']="H:mm";
            $adata['color'] = '#ccc';
            $adata['borderColor'] = "#000";

            $adata['textColor'] = "#000";
            $adata['opacity'] = '0.7';
            $adata['allDay'] = false;
            $adata['clockLeft'] = empty($data['satisfying']) ? 0 : $data['satisfying'];
            $adata['clockRight'] = empty($data['challenging']) ? 0 : $data['challenging'];


            $acheck = $f3->get('DB')->exec('SELECT * FROM depressive_tasks where m9_event=' . $data['id'] . ' or m9_event=' . $data['id'] . ' or m11_event=' . $data['id']);
            $bcheck = $f3->get('DB')->exec('SELECT * FROM nat_challenges where event_id=' . $data['id']);
            $ccheck = $f3->get('DB')->exec('SELECT * FROM leveregler_tasks where event_id=' . $data['id']);

            if ($acheck) {

                $adata['backgroundColor'] = "#8ED2CC";
            } else if ($bcheck) {

                $adata['backgroundColor'] = "#e4a66f";
            } else if ($ccheck) {

                $adata['backgroundColor'] = "#ada6d2";
            } else {

                $adata['backgroundColor'] = "#cccccc";
            }



            $mdata[] = $adata;
        }



        echo json_encode($mdata);
        exit;
    }

    function update($f3) {
        $id = $_REQUEST['id'];
        $act = $_REQUEST['activity'];
        $lcircle = $_REQUEST['lcircle'];
        $rcircle = $_REQUEST['rcircle'];
        $f3->get('DB')->exec("update widget_activity_list set activity='" . $act . "', satisfying=" . $lcircle . ",challenging=" . $rcircle . " where id=" . $id);
        echo json_encode(array('status' => 'success'));
        exit;
    }

    function drop($f3) {

        $stdt = $_REQUEST['date_start'];

        $user = $f3->get('SESSION.id');

        $id = $_REQUEST['id'];

        $activities = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where id=' . $id);

        if ($activities) {

            foreach ($activities as $key => $data)
                ;

            $f3->get('DB')->exec("insert into widget_activity_list(activity,date_start,user) values('" . $data['activity'] . "','" . $stdt . "'," . $user . ")");
        }
        echo json_encode(array('status' => 'success'));

        exit;
    }

    function leftload($f3) {

        $user = $f3->get('SESSION.id');

        $activities_left = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where  ubication IS NULL and user=' . $user);

        $lload = '';
        $mdata = array();
        foreach ($activities_left as $key => $data) {

            $clockLeft = empty($data['satisfying']) ? 0 : $data['satisfying'];
            $clockRight = empty($data['challenging']) ? 0 : $data['challenging'];





            $lload = $lload . '<div id="EventEditor-' . $data['id'] . '" class="popover top">

        <div class="WidgetWidth260 RadCornAll">
            <div style="text-align:right; postion:relative;" id="whclose"> <a  href="javascript:void(0)" style="text-decoration: none; color:black;" class="DeleteEventEditor"  data-id="' . $data['id'] . '">Slet</a> <a  href="javascript:void(0)" class="CloseEventEditor" data-dismiss="popover"
                                                             type="button" style="text-decoration: none; color:black;">X</a></div>
            <div class="WidgetHeaderBar">beskriv din aktivitet</div>

            <div class="ContentWidget">

                <div class="EventLayout">

                    <textarea  name="actvt-' . $data['id'] . '" id="actvt-' . $data['id'] . '"  style="border:1px solid; font: verdana;" onclick="this.select()" rows="2" cols="25">' . $data['activity'] . '</textarea>
                    <input type="hidden" name="pinfo" id="pinfo" value="' . $data['id'] . '">
                     <input type="hidden" name="leftcircle" id="leftcircle" value="' . $clockLeft . '">
                     <input type="hidden" name="rightcircle" id="rightcircle" value="' . $clockRight . '">
                    <div class="clocks" style="margin-top: 20px;">
                        <div class="clock clock-64 fill" data-percent="' . $clockLeft . '" data-type="left"
                             data-id="' . $data['id'] . '" style="float: left;margin-left: 35px;"></div>
                        <div class="clock clock-64 fill" data-percent="' . $clockRight . '" data-type="right"
                             data-id="' . $data['id'] . '" style="float: right;margin-right: 35px;"></div>
                    </div>

                    <div class="popover bottom EventSlider EventSliderLeft">
                        <div class="arrow"></div>
                        <h3 class="popover-title">Popover bottom</h3>';
						
						
            if (strtotime($data['date_start']) < strtotime(date('Y-m-d H:i:s'))) {
                $lload = $lload . ' <div class="popover-content">
                            <p style="margin-bottom: 20px;" id="slide_text">Hvor <b>tilfredsstillende</b> var denne aktivitet?</p>

                            <div class="slider-container">
                                <input type="text" class="slider-percent" data-slider-min="0" data-slider-max="100"
                                       data-slider-step="1" data-slider-value="' . $clockLeft . '" data-slider-orientation="horizontal"
                                       data-slider-selection="after" data-slider-tooltip="hide">
                            </div>
                            <p class="slider-indicator">' . $clockLeft . '%</p>
                        </div>
                    </div>';
            } else {
                $lload = $lload . ' <div class="popover-content">
                            <p style="margin-bottom: 20px;"></p>
                          Man kan ikke angive værdier på aktiviteten, før den er hendt.
                        </div>
                    </div>';
            }

            $lload = $lload . ' </div>

                <div class="WD-Button WidgetButtons">
                    <a $lloadid="ButtonNegativeCircle" href="javascript:void(0)"
                       class="WB-overview RadCornAllExtreme CloseEventEditor" data-dismiss="popover"
                       type="button">FORTRYD</a>
                    <a href="javascript:void(0)" class="WB-continue RadCornAllExtreme SaveEventEditor">FÆRDIG</a>
                </div>

            </div>

        </div>

    </div>';
        }
        echo $lload;
        exit;
    }

    function rightload($f3) {


        $user = $f3->get('SESSION.id');

        $activities_right = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where  user=' . $user);

        $lload = '';
        $mdata = array();
        foreach ($activities_right as $key => $data) {

            $clockLeft = empty($data['satisfying']) ? 0 : $data['satisfying'];
            $clockRight = empty($data['challenging']) ? 0 : $data['challenging'];

            $lload = $lload . '<div id="EventEditor-' . $data['id'] . '" class="popover top">

        <div class="WidgetWidth260 RadCornAll">
            <div style="text-align:right;" id="whclose"> <a  data-id="' . $data['id'] . '" href="javascript:void(0)" style="text-decoration: none; color:black;" class="DeleteEventEditor " data-dismiss="popconfirm"
                                                             type="button">Slet</a><a  href="javascript:void(0)" style="text-decoration: none; color:black;" class="CloseEventEditor" data-dismiss="popover"
                                                             type="button"> X</a></div>
            <div class="WidgetHeaderBar">beskriv din aktivitet</div>

            <div class="ContentWidget">

                <div class="EventLayout">

                    <textarea  name="actvt-' . $data['id'] . '" id="actvt-' . $data['id'] . '"  style="border:1px solid; font: verdana;" onclick="this.select()" rows="2" cols="25">' . $data['activity'] . '</textarea>
                    <input type="hidden" name="pinfo" id="pinfo" value="' . $data['id'] . '">
                     <input type="hidden" name="leftcircle" id="leftcircle" value="' . $clockLeft . '">
                      <input type="hidden" name="rightcircle" id="rightcircle" value="' . $clockRight . '">
                    <div class="clocks" style="margin-top: 20px;">
                        <div class="clock clock-64 fill" data-percent="' . $clockLeft . '" data-type="left"
                             data-id="' . $data['id'] . '" style="float: left;margin-left: 35px;"><img src="/assets/img/BlueCircle-01.png" /></div>
                        <div class="clock clock-64 fill" data-percent="' . $clockRight . '" data-type="right"
                             data-id="' . $data['id'] . '" style="float: right;margin-right: 35px;"></div>
                    </div>

                    <div class="popover bottom EventSlider EventSliderRight">
                        <div class="arrow"></div>
                        <h3 class="popover-title">Popover bottom</h3>';
						
					
            if (strtotime($data['date_start']) < strtotime(date('Y-m-d H:i:s'))) {
                $lload = $lload . ' <div class="popover-content">
                            <p style="margin-bottom: 20px;" id="slide_text">Hvor <b>tilfredsstillende</b> var denne aktivitet?</p>

                            <div class="slider-container">
                                <input type="text" class="slider-percent" data-slider-min="0" data-slider-max="100"
                                       data-slider-step="1" data-slider-value="' . $clockLeft . '" data-slider-orientation="horizontal"
                                       data-slider-selection="after" data-slider-tooltip="hide">
                            </div>
                            <p class="slider-indicator">' . $clockLeft . '%</p>
                        </div>
                    </div>';
            } else {
                $lload = $lload . ' <div class="popover-content">
                            <p style="margin-bottom: 20px;"></p>
                          Man kan ikke angive værdier på aktiviteten, før den er hendt.
                        </div>
                    </div>';
            }

            $lload = $lload . ' </div>

                <div class="WD-Button WidgetButtons">
                    <a id="ButtonNegativeCircle" href="javascript:void(0)"
                       class="WB-overview RadCornAllExtreme CloseEventEditor" data-dismiss="popover"
                       type="button">FORTRYD</a>
                    <a href="javascript:void(0)" class="WB-continue RadCornAllExtreme SaveEventEditor">FÆRDIG</a>
                </div>

            </div>

        </div>

    </div>';
        }
        echo $lload;
        exit;
    }

    function leftboxload($f3) {

        $user = $f3->get('SESSION.id');

        $activities_left = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where ubication="left" and date_start IS NULL and user=' . $user);

        $lload = '';
        $mdata = array();
        foreach ($activities_left as $key => $data) {
            $lload = $lload . '<div align="left" class="innerrightbox" style="float: left;" data-id="' . $data['id'] . '" >
                                <div style="float:left; width: 345px; padding-top: 5px; text-align:center;">' . $data['activity'] . '</div>
                                <div style="float:left;margin-left:15px;" class="closeactlistbtn">  <a href="javascript:void(0)" data-id="' . $data['id'] . '" onclick="confirmactleftdel(' . $data['id'] . ')" class="removeActivity" ></a></div>
                            </div>';
        }
        echo $lload;
        exit;
    }

    function rightboxload($f3) {

        $user = $f3->get('SESSION.id');

        $activities_right = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where ubication="right" and  date_start IS NULL and user=' . $user);

        $lload = '';
        $mdata = array();
        foreach ($activities_right as $key => $data) {

            $lload = $lload . '<div align="left" class="innerrightbox" style="float: left;" data-id="' . $data['id'] . '" >
                                <div style="float:left; width: 345px; padding-top: 5px; text-align:center;">' . $data['activity'] . '</div>
                                <div style="float:left;margin-left:15px;" class="closeactlistbtn">  <a href="javascript:void(0)" data-id="' . $data['id'] . '" onclick="confirmactleftdel(' . $data['id'] . ')" class="removeActivity""></a></div>
                            </div>';
        }
        echo $lload;
        exit;
    }

    function removeact($f3) {

        $id = $_REQUEST['id'];

        $user = $f3->get('SESSION.id');

        $f3->get('DB')->exec("delete from widget_activity_list where id=" . $id);

        echo json_encode(array('status' => 'success'));

        exit;
    }

    function removecat($f3) {

        $id = $_REQUEST['id'];


        $f3->get('DB')->exec("delete from user_activity_cat where cat_id=" . $id);
        $f3->get('DB')->exec("delete from activity_category where id=" . $id);

        echo json_encode(array('status' => 'success'));

        exit;
    }

    function removecatact($f3) {

        $id = $_REQUEST['id'];



        $f3->get('DB')->exec("delete from widget_activity_list where id=" . $id);
        $f3->get('DB')->exec("delete from user_activity_cat where act_id=" . $id);



        echo json_encode(array('status' => 'success'));

        exit;
    }

    function catactload($f3) {

        $id = $_REQUEST['id'];

        $activities = $f3->get('DB')->exec('SELECT a.act_id,b.activity,status FROM user_activity_cat a, widget_activity_list b where  a.cat_id=' . $id . ' and b.id=a.act_id');

        $lload = '';
        $mdata = array();
        $i = 1;
        foreach ($activities as $key => $data) {

            if ($data['status'] == 1) {
                $rdo = "checked";
            } else {
                $rdo = "";
            }

            $actname = substr($data['activity'], 0, 26);



            $lload = $lload . '<li class="two_innerBox"  data-id="' . $data['act_id'] . '" data-text="' . $data['activity'] . '">
								<div class="listing">
                                                                        <div class="listing_numberBox">
                                                                            ' . $i . '
                                                                        </div>
									<h4>' . $actname . '</h4>
                                                                        <div class="listing_boxRight">
                                                                            <i onclick="closeicon1(' . $data['act_id'] . ')" class="closeIcon1" data-caid="' . $data['act_id'] . '">close</i>
                                                                            <input type="checkbox"  id="checkbox-1-' . $data['act_id'] . '"    onclick=actcomplete("' . $data['act_id'] . '") ' . $rdo . ' >
                                                                        </div>
								</div>
							</li>';


            $i++;
        }
        echo $lload;
        exit;
    }

    function createcat($f3) {

        $user = $f3->get('SESSION.id');

        $title = $_REQUEST['title'];

        $stdt = date('Y-m-d h:i:s');

        $f3->get('DB')->exec("insert into activity_category (title,user_id,created_at,status) values('" . $title . "'," . $user . ",'" . $stdt . "',0)");

        $id = $f3->get('DB')->lastInsertId();


        echo json_encode(array('status' => 'success', 'id' => $id));

        exit;
    }

    function catload($f3) {

        $user = $f3->get('SESSION.id');

        $categories = $f3->get('DB')->exec('SELECT id,title FROM activity_category where user_id=' . $user);

        $lload = '';

        foreach ($categories as $key => $data) {

            $actcheck = $f3->get('DB')->exec('SELECT act_id FROM user_activity_cat where status=0 and cat_id=' . $data['id']);

            if ($actcheck) {
                $stl = "display:none;";
            } else {
                $stl = "float: left;margin-left: 141px;margin-top: 10px;";
            }
            $actcheck1 = $f3->get('DB')->exec('SELECT count(*) as cnt FROM user_activity_cat where cat_id=' . $data['id']);
            foreach ($actcheck1 as $key1 => $data1)
                ;
            if ($data1['cnt'] == 0) {
                $stl = "display:none;";
            }


            $lload = $lload . '<li class="one_innerBox catlist" id="catb-' . $data['id'] . '" data-id="' . $data['id'] . '">
								<div class="listing ">
									<h4 class="listactCategory">' . $data['title'] . '</h4>
                                                                             <i class="closeIcon" onclick="closeicon(' . $data['id'] . ')" data-id="' . $data['id'] . '">close</i>  <span id="catcomp-' . $data['id'] . '" style="' . $stl . '"> <img src="/assets/img/LoginAlertTick.png" height="20" width="20" /></span>
									
                                                                        
								</div>
							</li>';
        }
        echo $lload;
        exit;
    }

    function createact($f3) {

        $user = $f3->get('SESSION.id');

        $title = $_REQUEST['title'];
        $cid = $_REQUEST['cid'];



        $f3->get('DB')->exec("insert into widget_activity_list (user, activity,satisfying,challenging) values(" . $user . ",'" . $title . "',0,0)");

        $id = $f3->get('DB')->lastInsertId();


        $f3->get('DB')->exec("insert into user_activity_cat (cat_id, act_id, status) values(" . $cid . "," . $id . ",0)");



        echo json_encode(array('status' => 'success'));

        exit;
    }

    function getcatdata($f3) {


        $cid = $_REQUEST['cid'];


        $user = $f3->get('SESSION.id');
        $categorydata = $f3->get('DB')->exec('SELECT obstacles,solutions FROM activity_category where id=' . $cid);
        if ($categorydata) {
            foreach ($categorydata as $key => $data)
                ;


            if (count($data) > 0) {
                echo json_encode(array('obst' => $data['obstacles'], 'sol' => $data['solutions']));
            }
        }
        exit;
    }

    function saveobst($f3) {

        $user = $f3->get('SESSION.id');

        $cid = $_REQUEST['cid'];
        $obst = $_REQUEST['obst'];


        $f3->get('DB')->exec("update activity_category set obstacles='" . $obst . "' where id=" . $cid);

        echo json_encode(array('status' => 'success'));

        exit;
    }

    function savesol($f3) {

        $user = $f3->get('SESSION.id');

        $cid = $_REQUEST['cid'];
        $sol = $_REQUEST['sol'];


        $f3->get('DB')->exec("update activity_category set solutions='" . $sol . "' where id=" . $cid);

        echo json_encode(array('status' => 'success'));

        exit;
    }

    function actcomplete($f3) {

        $id = $_REQUEST['id'];

        $actdata = $f3->get('DB')->exec('SELECT status FROM user_activity_cat where act_id=' . $id);
        if ($actdata) {
            foreach ($actdata as $key => $data)
                ;
            if ($data['status'] == 1) {
                $st = 0;
            } else {
                $st = 1;
            }
        }

        if ($st) {

            $f3->get('DB')->exec("update user_activity_cat set status=" . $st . " where act_id=" . $id);
        }
        echo json_encode(array('status' => 'success'));

        exit;
    }

    function getevent($f3) {
        $id = $_REQUEST['id'];
        $user = $f3->get('SESSION.id');
        $actdata = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where id=' . $id);
        if ($actdata) {
            foreach ($actdata as $key => $data)
                ;

            $dt = $data['date_start'];

            $timestamp = strtotime($dt);

            $day = date('d', $timestamp);
            $time = date('D', $timestamp) . " " . date('h', $timestamp) . ":" . date('i', $timestamp);


            if (count($data) > 0) {
                echo json_encode(array('status' => 'success', 'day' => $day, 'time' => $time));
            }
        }
        exit;
    }

    function loadlvevent($f3) {


        $cid = $_REQUEST['cid'];


        $user = $f3->get('SESSION.id');
        $cdata = $f3->get('DB')->exec('SELECT event_id FROM leveregler_tasks where user_id=' . $user . ' and lc_id =' . $cid);

        if ($cdata) {
            foreach ($cdata as $k => $d)
                ;

            $eid = $d['event_id'];

            if ($eid) {

                $actdata = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where id=' . $eid);

                if ($actdata) {
                    foreach ($actdata as $key => $data)
                        ;

                    $dt = $data['date_start'];

                    $timestamp = strtotime($dt);

                    $day = date('d', $timestamp);
                    $time = date('D', $timestamp) . " " . date('H', $timestamp) . ":" . date('i', $timestamp);
                    $month = date('m', $timestamp);
                    $tday = date('Y-m-d H:i:s');
                    $eflag = 0;
                    $timestamp1 = strtotime($tday);
                    if ($timestamp1 > $timestamp) {
                        $eflag = 1;
                    }

                    if (count($data) > 0) {
                        echo json_encode(array('status' => 'success', 'day' => $day, 'time' => $time, 'eid' => $eid, 'month' => $month, 'date' => $eflag));
                    }
                }
            }
        }
        exit;
    }

    function loaddpevent($f3) {


        $fld = $_REQUEST['fld'];


        $user = $f3->get('SESSION.id');
        $cdata = $f3->get('DB')->exec('SELECT ' . $fld . ' FROM depressive_tasks where user_id=' . $user);

        if ($cdata) {
            foreach ($cdata as $k => $d)
                ;

            $eid = $d[$fld];

            if ($eid) {

                $actdata = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where id=' . $eid);

                if ($actdata) {
                    foreach ($actdata as $key => $data)
                        ;

                    $dt = $data['date_start'];



                    $timestamp = strtotime($dt);

                    $day = date('d', $timestamp);
                    $time = date('D', $timestamp) . " " . date('H', $timestamp) . ":" . date('i', $timestamp);
                    $tday = date('Y-m-d H:i:s');
                    $eflag = 0;
                    $timestamp1 = strtotime($tday);
                    if ($timestamp1 > $timestamp) {
                        $eflag = 1;
                    }

                    if (count($data) > 0) {
                        echo json_encode(array('status' => 'success', 'day' => $day, 'time' => $time, 'eid' => $eid, 'dt' => $dt, 'date' => $eflag));
                    }
                }
            }
        }
        exit;
    }

    function loadevent($f3) {

        $cid = $_REQUEST['cid'];
        $user = $f3->get('SESSION.id');
        $cdata = $f3->get('DB')->exec('SELECT event_id FROM nat_challenges where user_id=' . $user . ' and nc_id =' . $cid);

        if ($cdata) {
            foreach ($cdata as $k => $d)
                ;

            $eid = $d['event_id'];

            if ($eid) {

                $actdata = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where id=' . $eid);

                if ($actdata) {
                    foreach ($actdata as $key => $data)
                        ;

                    $dt = $data['date_start'];
                    $tday = date('Y-m-d H:i:s');
                    $timestamp = strtotime($dt);


                    $day = date('d', $timestamp);
                    $time = date('D', $timestamp) . " " . date('H', $timestamp) . "." . date('i', $timestamp);
                    $month = date('m', $timestamp);

                    $eflag = 0;
                    $timestamp1 = strtotime($tday);
                    if ($timestamp1 > $timestamp) {
                        $eflag = 1;
                    }

                    if (count($data) > 0) {
                        echo json_encode(array('status' => 'success', 'day' => $day, 'time' => $time, 'eid' => $eid, 'month' => $month, 'date' => $eflag));
                    }
                }
            }
        }
        exit;
    }

    function lvevents($f3) {
        $user = $f3->get('SESSION.id');
        $activities = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where  ubication IS NULL and user=' . $user);


        $mdata = array();
        foreach ($activities as $key => $data) {
            $adata = array();
            $adata['id'] = $data['id'];
            $adata['title'] = $data['activity'];
            $adata['start'] = $data['date_start'];
            $adata['end'] = $data['date_end'];
            //$adata['axisFormat']="H:mm";
            $adata['color'] = '#ccc';
            $adata['borderColor'] = "#000";

            $adata['textColor'] = "#000";
            $adata['opacity'] = '0.7';
            $adata['allDay'] = false;
            $adata['clockLeft'] = empty($data['satisfying']) ? 0 : $data['satisfying'];
            $adata['clockRight'] = empty($data['challenging']) ? 0 : $data['challenging'];


            $acheck = $f3->get('DB')->exec('SELECT * FROM depressive_tasks where m9_event=' . $data['id'] . ' or m9_event=' . $data['id'] . ' or m11_event=' . $data['id']);
            $bcheck = $f3->get('DB')->exec('SELECT * FROM nat_challenges where event_id=' . $data['id']);
            $ccheck = $f3->get('DB')->exec('SELECT * FROM leveregler_tasks where event_id=' . $data['id']);

            if ($acheck) {

                $adata['backgroundColor'] = "#8ED2CC";
            } else if ($bcheck) {

                $adata['backgroundColor'] = "#e4a66f";
            } else if ($ccheck) {

                $adata['backgroundColor'] = "#ada6d2";
            } else {

                $adata['backgroundColor'] = "#cccccc";
            }



            $mdata[] = $adata;
        }
        echo json_encode($mdata);
        exit;
    }

    function dpevents($f3) {
        $user = $f3->get('SESSION.id');
        $activities = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where  ubication IS NULL and user=' . $user);
        // demanding activities


        $mdata = array();
        foreach ($activities as $key => $data) {
            $adata = array();
            $adata['id'] = $data['id'];
            $adata['title'] = $data['activity'];
            $adata['start'] = $data['date_start'];
            $adata['end'] = $data['date_end'];
            //$adata['axisFormat']="H:mm";
            $adata['color'] = '#ccc';
            $adata['borderColor'] = "#000";

            $adata['textColor'] = "#000";
            $adata['opacity'] = '0.7';
            $adata['allDay'] = false;
            $adata['clockLeft'] = empty($data['satisfying']) ? 0 : $data['satisfying'];
            $adata['clockRight'] = empty($data['challenging']) ? 0 : $data['challenging'];


            $acheck = $f3->get('DB')->exec('SELECT * FROM depressive_tasks where m9_event=' . $data['id'] . ' or m9_event=' . $data['id'] . ' or m11_event=' . $data['id']);
            $bcheck = $f3->get('DB')->exec('SELECT * FROM nat_challenges where event_id=' . $data['id']);
            $ccheck = $f3->get('DB')->exec('SELECT * FROM leveregler_tasks where event_id=' . $data['id']);

            if ($acheck) {

                $adata['backgroundColor'] = "#8ED2CC";
            } else if ($bcheck) {

                $adata['backgroundColor'] = "#e4a66f";
            } else if ($ccheck) {

                $adata['backgroundColor'] = "#ada6d2";
            } else {

                $adata['backgroundColor'] = "#cccccc";
            }



            $mdata[] = $adata;
        }



        echo json_encode($mdata);
        exit;
    }

    function createlvact($f3) {
        $stdt = $_REQUEST['date_start'];
        $title = $_REQUEST['title'];
        $endt = $_REQUEST['date_end'];
        $cid = $_REQUEST['cid'];
        $eid = $_REQUEST['eid'];
        $user = $f3->get('SESSION.id');

        if ($eid) {
            $f3->get('DB')->exec("delete from widget_activity_list  where id=" . $eid);
        }
        $f3->get('DB')->exec("insert into widget_activity_list (user, activity,date_start,date_end,satisfying,challenging) values(" . $user . ",'" . $title . "','" . $stdt . "','" . $endt . "',0,0)");

        $aid = $f3->get('DB')->lastInsertId();


        $f3->get('DB')->exec("update leveregler_tasks set event_id=" . $aid . " where user_id=" . $user . " and lc_id=" . $cid);

        echo json_encode(array('status' => 'success', 'eid' => $aid));

        exit;
    }

    function createdpact($f3) {
        $stdt = $_REQUEST['date_start'];
        $title = $_REQUEST['title'];
        $endt = $_REQUEST['date_end'];
        $user = $f3->get('SESSION.id');
        $fld = $_REQUEST['fld'];

        $f3->get('DB')->exec("insert into widget_activity_list (user, activity,date_start,date_end,satisfying,challenging) values(" . $user . ",'" . $title . "','" . $stdt . "','" . $endt . "',0,0)");

        $aid = $f3->get('DB')->lastInsertId();
        $f3->get('DB')->exec("update depressive_tasks set " . $fld . "=" . $aid . " where user_id=" . $user);

        echo json_encode(array('status' => 'success', 'eid' => $aid));

        exit;
    }

}
