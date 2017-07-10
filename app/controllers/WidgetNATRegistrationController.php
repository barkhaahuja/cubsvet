<?php

namespace controllers;

use DB\SQL\Mapper;
use models\Natreg;
use models\User;

class WidgetNATRegistrationController {

    function index($f3) {
        $natModel = new Natreg($f3->get('DB'));
        $natnegtht = array();

        foreach ($natModel->all($f3->get('SESSION.id')) as $natreg) {
            $natnegtht[] = array(
                'id' => $natreg->id,
                'date' => date('l d. F', strtotime($natreg->created_date)),
                'negthts' => $natreg->negative_thoughts,
                'posresp' => $natreg->possible_response
            );
        }

        $f3->set('user_id', $f3->get('SESSION.id'));
        $f3->set('natnegthts', $natnegtht);
        
        $user = new User($f3->get('DB'));
        $user = $user->getById($f3->get('SESSION.id'));
        
        $f3->set('currentStep', $user->getCurrentStep());
        $f3->set('currentSubStep', $user->getCurrentSubStep());
        
        $dashbrd = 0;
        $dashbrd = $_REQUEST['dhbrd'];
        
        $f3->set('dashbrd', $dashbrd);

        echo \Template::instance()->render('dashboard/windows/window.nat-register.htm');
    }

    function negativecircle($f3) {
        // Loader
        $user = $f3->get('SESSION.id');
        $nc = new Mapper($f3->get('DB'), 'widget_nat_negcircle');
        $f3->set('nc', $nc->find(array('user=?', $user)));
        // End Loader
        
        $dashbrd = 0;
        $dashbrd = $_REQUEST['dhbrd'];
        
        $f3->set('dashbrd', $dashbrd);
        
        $user1 = new User($f3->get('DB'));
        $user1 = $user1->getById($f3->get('SESSION.id'));
        $f3->set('currentStep', $user1->getCurrentStep());
        $f3->set('currentSubStep', $user1->getCurrentSubStep());

        $f3->set('user_id', $f3->get('SESSION.id'));
        
        echo \Template::instance()->render('dashboard/windows/window.nat-negativecircle.htm');
    }

    function negativechallenge($f3) {
        $user = $f3->get('SESSION.id');
        $f3->set('challenges', $f3->get('DB')->exec('SELECT id,negative_thoughts FROM widget_nat_registration where user_id=' . $user));

        $user1 = new User($f3->get('DB'));
        $user1 = $user1->getById($f3->get('SESSION.id'));
        $f3->set('currentStep', $user1->getCurrentStep());
        $f3->set('currentSubStep', $user1->getCurrentSubStep());

        $f3->set('user_id', $user);
        $f3->set('cdate', date('Y-m-d'));
        $f3->set('tstamp', date('Ymdhis'));
        
        $dashbrd = 0;
        $dashbrd = $_REQUEST['dhbrd'];
        
        $f3->set('dashbrd', $dashbrd);

        echo \Template::instance()->render('dashboard/windows/window.nat-challenge.htm');
    }

    function save_natnegtht($f3) {
        $natModel = new Natreg($f3->get('DB'));
        if ($natModel->addnatreg()) {
            echo(json_encode(array('status' => 'success', 'id' => $natModel->id)));
            exit;
        }

        echo(json_encode(array('status' => 'error', 'msg' => "Could not save negative thought.")));
        exit;
    }

    function update_natposresp($f3) {
        $id = $f3->get('PARAMS.id');
        $natModel = new Natreg($f3->get('DB'));
        
        if ($natModel->editnatreg($id)) {
            echo(json_encode(array('status' => 'success', 'id' => $natModel->id)));
            exit;
        }
        
        echo(json_encode(array('status' => 'error', 'msg' => "Could not update note.")));
        exit;
    }

    function delete_natreg($f3) {
        $id = $f3->get('PARAMS.id');
        $natModel = new Natreg($f3->get('DB'));
        $natModel->deletenatreg($id);
        echo(json_encode(array('status' => 'success')));
        exit;
    }

    // fix  for - P0120-4
    function resetWidgetSession($f3)
    {
        $_SESSION['negcircle'] = array();
        $_SESSION['negthtid'] = 0;
        echo json_encode(array('status' => 'success'));
    }
    
    function save($f3) {
        if (!isset($_SESSION['prevnid'])) {
            $_SESSION['prevnid'] = '';
        }
        if (!isset($_SESSION['userid'])) {
            $_SESSION['userid'] = '';
        }

        $user = $f3->get('SESSION.id');
        $step = $_REQUEST['step'];
        $text = $_REQUEST['text'];
        $slider_val = $_REQUEST['slider_val'];
        $create_date = date('Y-m-d H:i:s');
        $negthtid = $f3->get('SESSION.negthtid');
        $newnegtht = $_REQUEST['newnegtht'];
        
        /*if(!$negthtid && $step == 1){
            $f3->get('DB')->exec("INSERT INTO widget_nat_registration (user_id, negative_thoughts, possible_response) VALUES(" . $user . ", '" . $text . "', '" . $text . "')");
            
            $negid = $f3->get('DB')->lastInsertId();
            $f3->set('SESSION.negthtid', $negid);
        }*/

        if (!$slider_val) {
            $slider_val = 0;
        }        
        if ($slider_val == 99) {
            $slider_val = 100;
        }
        if(!$negthtid){
            $negthtid = 0;
        }
        
        //$newnegtht = 1;
        if($newnegtht == 1){
            $_SESSION['negcircle'][] = array('step' => $step, 'text' => $text, 'slider_val' => $slider_val);
        } else if($newnegtht == 0){
            if ($_SESSION['prevnid'] != $negthtid || $_SESSION['userid'] != $user) {
                $_SESSION['prevnid'] = $negthtid;
                $_SESSION['userid'] = $user;
                $_SESSION['negcircle'] = array();
                $_SESSION['negcircle'][] = array('user' => $user, 'step' => $step, 'text' => $text, 'slider_val' => $slider_val);

            } else if ($_SESSION['prevnid'] == $negthtid && $_SESSION['userid'] == $user) {
                $_SESSION['negcircle'][] = array('step' => $step, 'text' => $text, 'slider_val' => $slider_val);
            }
        }

        $negcirarr = array();

        if (sizeof($_SESSION['negcircle']) == 5) { 
            $negcirarr = $_SESSION['negcircle'];
            $step = '';
            $text = '';
            $slider_val = 0;

            // fix for - P0120-4
            if($negthtid == 0)
            {
                $tempNATModel = new Natreg($f3->get('DB'));
                if ($tempNATModel->adddemonatreg()) {
                    $negthtid = $tempNATModel->id;
                }
                else
                {
                    echo json_encode(array('status' => 'fail'));
                    exit;
                }
            }
            $currentCircleStep = 1;
            // end
            
            foreach ($negcirarr as $k => $ndata) {
                $step = $ndata['step'];
                $text = $ndata['text'];
                $slider_val = $ndata['slider_val'];

                //$f3->get('DB')->exec("INSERT INTO widget_nat_negcircle (user, negtht_id, step, text, slider_val, create_date) VALUES(" . $user . ", " . $negthtid . ", " . $step . ", '" . $text . "', " . $slider_val . ", '" . $create_date . "')");
                $f3->get('DB')->exec(
                        "INSERT INTO widget_nat_negcircle (user, negtht_id, step, text, slider_val, create_date) VALUES(:user, :negthtid , :step, :text, :slider_val, :create_date)",
                        array(':user'=>$user, ':negthtid' => $negthtid, ':step' => $step, ':text' => $text, ':slider_val'=>$slider_val, ':create_date'=>$create_date)
                        );

                //echo "INSERT INTO widget_nat_negcircle (user, negtht_id, step, text, slider_val, create_date) VALUES(" . $user . ", " . $negthtid . ", " . $step . ", '" . $text . "', " . $slider_val . ", '" . $create_date . "')";
                $ncid = $f3->get('DB')->lastInsertId();
                $_SESSION['negcircle'] = array();

                // fix for - P0120-4
                if($currentCircleStep == 2){
                    $tempUpdateNATModel = new Natreg($f3->get('DB'));
                    $tempUpdateNATModel->editnatregwiththought($negthtid, $text);
                }
                $currentCircleStep++;
                // end
            }

            if ($ncid && $negthtid) {
                if($f3->get('SESSION.negthtid')){
                    $f3->get('DB')->exec("UPDATE widget_nat_registration SET negcircle = 1 WHERE id=" . $f3->get('SESSION.negthtid'));
                    echo json_encode(array('status' => 'success'));
                } else {                    
                    echo json_encode(array('status' => 'success'));
                }
                
            } else {                
                echo json_encode(array('status' => 'success'));
            }
        }

        echo json_encode(array('status' => 'success'));        
        exit;
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

        $cdata = $f3->get('DB')->exec('SELECT * FROM nat_challenges where user_id=' . $user . ' and nc_id=' . $cid);
        if ($cdata) {
            foreach ($cdata as $key => $data)
                ;

            if ($fld == 'm7') {
                $f3->get('DB')->exec("update nat_challenges set " . $fld . "='" . $txt . "',status=1 where id=" . $data['id']);
            } else {
                $f3->get('DB')->exec("update nat_challenges set " . $fld . "='" . $txt . "' where id=" . $data['id']);
            }
        } else {

            $f3->get('DB')->exec("insert into nat_challenges(nc_id, user_id," . $fld . ",created_at) values(" . $cid . "," . $user . ",'" . $txt . "','" . $dt . "')");
        }
        echo json_encode(array('status' => 'success'));

        exit;
    }
    
    
    function checkchallange($f3) {
        $cid = $_REQUEST['cid'];
        $fld = $_REQUEST['fld'];

        $user = $f3->get('SESSION.id');


        $cdata = $f3->get('DB')->exec('SELECT ' . $fld . ' FROM nat_challenges where user_id=' . $user . ' and nc_id=' . $cid);
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

    function getnegthought($f3) {
        $negid = $_REQUEST['negid'];
        $user = $f3->get('SESSION.id');

        $f3->set('SESSION.negthtid', $negid);

        $negdata = $f3->get('DB')->exec('SELECT negative_thoughts FROM widget_nat_registration where user_id=' . $user . ' and id=' . $negid);
        
        if ($negdata) {
            foreach ($negdata as $key => $data);
            $nehthts = $data['negative_thoughts'];

            if ($nehthts) {
                echo json_encode(array('status' => 'success', 'txtdata' => $nehthts));
            } else {
                echo json_encode(array('status' => 'failed', 'txtdata' => ''));
            }
        } else {
            echo json_encode(array('status' => 'failed', 'txtdata' => ''));
        }

        exit;
    }

    function loadcomplnegcircle($f3) {
        $user = $f3->get('SESSION.id');
        $negid = $_REQUEST['negid'];

        $negdata = $f3->get('DB')->exec('SELECT * FROM widget_nat_negcircle WHERE user=' . $user . ' AND negtht_id=' . $negid . ' ORDER BY step ASC');

        $negcircnt = sizeof($negdata);

        $negcircle = '';
        $i = 0;
        if ($negdata) {
            foreach ($negdata as $key => $ndata) {
                //-- step - 0
                if ($ndata['step'] == 0) {
                    $negcircle .= '<div class="MoveableContainer pos0 ">
                                <div id="S1_NC_TBSit">
                                    <div class="TB-Header">Situation <a class="help help-pos0" data-toggle="tooltip" href="javascript:void(0)"></a></div>
                                    <textarea class="TextFeild_Drk" name="textPos0">' . $ndata['text'] . '</textarea>

                                    <div class="tooltip-help-pos0"
                                     data-toggle="tooltip" data-html="true"
                                     data-original-title="<p>I hvilken situation havde du disse tanker? Beskriv situationen kort.</p>
                                     <p>Klik i tekstfeltet for at begynde at skrive.</p>"
                                     data-placement="bottom"></div>
                                </div>
                                <div id="S1_NC_SitBottom"></div>
                            </div>';
                }

                //-- background
                if ($i == 0) {
                    if ($negcircnt == 5) {
                        $negcircle .= '<div id="NC_BG">
                            <div class="Circle BC_BG_Stage8">
                                <a href="#" class="qstnspot"></a>
                                <div class="qstndropdown">
                                    <div class="sampqstns">
                                        Hvad taler for, at dine tanker er <br/> rigtige?<br/><br/>
                                        Hvad taler imod, at dine tanker er rigtige? <br/><br/>
                                        Er der andre måder at forstå situationen på? <br/><br/>
                                        Hvordan vil du have set på 
                                        situationen, før du blev deprimeret? <br/><br/>
                                        Hvad ville din bedste ven tænke i den situation? <br/><br/>
                                        Hvilke konsekvenser har det, hvis dine tanker er rigtige? <br/><br/>
                                    </div>
                                    <div class="lukbtnctr">
                                        <div class="lukbtn">LUK</div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }

                    if ($negcircnt == 4) {
                        $negcircle .= '<div id="NC_BG">
                                    <div class="Circle BC_BG_Stage7">

                                    </div>
                                </div>';
                    }

                    if ($negcircnt == 3) {
                        $negcircle .= '<div id="NC_BG">
                                    <div class="Circle BC_BG_Stage5">

                                    </div>
                                </div>';
                    }

                    if ($negcircnt == 2) {
                        $negcircle .= '<div id="NC_BG">
                                    <div class="Circle BC_BG_Stage3">

                                    </div>
                                </div>';
                    }

                    if ($negcircnt == 1) {
                        $negcircle .= '<div id="NC_BG">
                                        <div class="Circle BC_BG_Stage1">

                                        </div>
                                    </div>';
                    }
                }

                //-- step - 1
                if ($ndata['step'] == 1) {
                    $negcircle .= '<div class="MoveableContainer pos1 ">
                                <div class="S1_NC_TB">
                                    <div class="NC-Header">Negative tanker <a class="help help-pos1" href="javascript:void(0)"></a></div>
                                    <textarea class="TextFeild" name="textPos1">' . $ndata['text'] . '</textarea>

                                    <div class="tooltip-help-pos1"
                                         data-toggle="tooltip" data-html="true"
                                         data-original-title="Vis i procent på en skala fra 0-100%, hvor meget du troede på tankerne, da de fór
                                         gennem hovedet på dig. Hvis du vil angive 0% kan du bare klikke NÆSTE." data-placement="bottom"></div>

                                    <div class="EventSlider EventSliderRight" id="circnegtht" style="display: inline;"> 
                                            <div class="slider-container" style="float:left">
                                                <input type="text" class="slider-percent" data-slider-min="0" data-slider-max="100"
                                                       data-slider-step="1" data-slider-value="' . $ndata['slider_val'] . '" data-slider-orientation="horizontal"
                                                       data-slider-selection="after" data-slider-tooltip="hide">
                                            </div>
                                            <div class="slider-indicator" id="negthtperc" style="display: inline; float:right; position:relative;">' . $ndata['slider_val'] . '%</div>
                                    </div>
                                </div>
                            </div>';
                }

                //-- step - 2
                if ($ndata['step'] == 2) {
                    $negcircle .= '<div class="MoveableContainer pos2 " style="width: 400px;">
                            <div class="S1_NC_TB">
                                <div class="NC-Header">Følelser og kropslige reaktioner <a class="help help-pos2" href="javascript:void(0)"></a></div>
                                <textarea class="TextFeild" name="textPos2">' . $ndata['text'] . '</textarea>

                                <div class="tooltip-help-pos2"
                                     data-toggle="tooltip" data-html="true"
                                     data-original-title="<p>Beskriv dine følelser og kropslige reaktioner i cirklen. 
                                     Det kan være følelser som tristhed, vrede og nervøsitet.</p>
                                     <p>Vis følelsernes styrke på en skala fra 0-100%.</p>"  data-placement="bottom"></div>

                                <div class="EventSlider EventSliderRight" id="circresp" style="display: inline;">     
                                        <div class="slider-container" style="float:left">
                                            <input type="text" class="slider-percent2" data-slider-min="0" data-slider-max="100"
                                                   data-slider-step="1" data-slider-value="' . $ndata['slider_val'] . '" data-slider-orientation="horizontal"
                                                   data-slider-selection="after" data-slider-tooltip="hide">
                                        </div>
                                        <div class="slider-indicator" id="sldindresp" style="display: inline; float:right; position:relative;">' . $ndata['slider_val'] . '%</div>
                                </div>
                            </div>
                        </div>';
                }

                //-- step - 3
                if ($ndata['step'] == 3) {
                    $negcircle .= '<div class="MoveableContainer pos3 ">
                            <div class="S1_NC_TB">
                                <div class="NC-Header">Adfærd<a class="help help-pos3" href="javascript:void(0)"></a></div>
                                <textarea class="TextFeild" name="textPos3">' . $ndata['text'] . '</textarea>

                                <div class="tooltip-help-pos3"
                                     data-toggle="tooltip" data-html="true"
                                     data-original-title="<p>Hvad gjorde du i situationen? Beskriv det kort.</p>
                                     <p>Klik i tekstfeltet for at begynde at skrive.</p>" data-placement="bottom"></div>                                
                            </div>
                        </div>';
                }

                //-- step - 4
                if ($ndata['step'] == 4) {
                    $negcircle .= '<div class="MoveableContainer pos4 ">
                            <div class="S1_NC_TB">
                                <div class="NC-Header">Alternative tanker<a class="help help-pos4" href="javascript:void(0)"></a></div>
                                <textarea class="TextFeild" name="textPos4">' . $ndata['text'] . '</textarea>

                                <div class="tooltip-help-pos4"
                                     data-toggle="tooltip" data-html="true"
                                     data-original-title="<p>Prøv at finde alternative tanker til dine negative tanker.</p>
                                     <p>Klik på det store spørgsmålstegn i cirklen og brug de spørgsmål der bliver vist, til at bekæmpe dine negative
                                     tanker.</p>" data-placement="bottom"></div>

                                <div class="EventSlider EventSliderRight" id="circalttht" style="display: inline;"> 
                                        <div class="slider-container" style="float:left">
                                            <input type="text" class="slider-percent3" data-slider-min="0" data-slider-max="100"
                                                   data-slider-step="1" data-slider-value="' . $ndata['slider_val'] . '" data-slider-orientation="horizontal"
                                                   data-slider-selection="after" data-slider-tooltip="hide">
                                        </div>
                                        <div class="slider-indicator" id="sldalttht" style="display: inline; float:right; position:relative;">' . $ndata['slider_val'] . '%</div>
                                </div>
                            </div>
                        </div>';
                }

                $i++;
            }

            echo json_encode(array('status' => 'success', 'negcircle' => $negcircle, 'negcircnt' => $negcircnt));
        } else {
            echo json_encode(array('status' => 'failed', 'negcircle' => ''));
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

    function createchallange($f3) {
        $txt = $_REQUEST['txt'];

        $user = $f3->get('SESSION.id');
        $dt = date('Y-m-d h:i:s');

        $f3->get('DB')->exec("INSERT INTO widget_nat_registration(negative_thoughts,possible_response, user_id,status) VALUES('" . $txt . "','" . $txt . "'," . $user . ",0)");
        $cid = $f3->get('DB')->lastInsertId();

        echo json_encode(array('status' => 'success', 'cid' => $cid));
        exit;
    }

    function eventcheck($f3) {
        $user = $f3->get('SESSION.id');
        $flag = 0;
        $negdata = $f3->get('DB')->exec('SELECT event_id from nat_challenges where  status=0 and user_id=' . $user . ' order by id desc limit 1');
        if ($negdata) {
            foreach ($negdata as $key => $data); 

                $e1 = $data['event_id'];


                if ($e1) {

                    $actdata = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where id=' . $e1);

                    if ($actdata) {
                        foreach ($actdata as $key => $data);
                            
                        

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

    function eventcheckforload($f3) {
        $user = $f3->get('SESSION.id');
        $flag = 0;
        $negdata = $f3->get('DB')->exec('SELECT event_id from nat_challenges where  status=0 and user_id=' . $user);
        if ($negdata) {
            foreach ($negdata as $key => $data) {

                $e1 = $data['event_id'];

                if ($e1) {

                    $flag = 1;
                }
            }
        }
        echo json_encode(array('status' => 'success', 'flag' => $flag));
    }

    function natnegativethoughtslist($f3) {
        $user = $f3->get('SESSION.id');

        $usrnegthts = $f3->get('DB')->exec('SELECT * FROM widget_nat_registration WHERE user_id=' . $user);

        if ($usrnegthts) {
            $usernthts = '';
            $usernthts .= '<ul class="multiple">';
            foreach ($usrnegthts as $key => $usrdata) {
                if ($usrdata['negcircle'] == 1) {               
                    $usernthts .= '<li class="negcirthts" id="negtht_'.$usrdata['id'].'" onclick="compNegcircle('.$usrdata['id'].')"><p>'.$usrdata['negative_thoughts'].'</p><div class="rightCheckbox"><input type="checkbox" name="click" value="1" checked></div></li>';
                }
                if ($usrdata['negcircle'] == 0) {
                    $usernthts .= '<li class="negcirthts" id="negtht_'.$usrdata['id'].'" onclick="nextStep0('.$usrdata['id'].')"><p>'.$usrdata['negative_thoughts'].'</p><div class="rightCheckbox"><input type="checkbox" name="click" value="1"></div></li>';
                }
            }
            $usernthts .= '</ul>';

            echo json_encode(array('status' => 'success', 'usernthts' => $usernthts));
        } else {
            echo json_encode(array('status' => 'success', 'usernthts' => ''));
        }
        exit;
    }
    
    function updateeventstatus($f3) {
       

        $user = $f3->get('SESSION.id');
       

        $f3->get('DB')->exec("update nat_challenges set status=1 where user_id=" . $user);
           
        echo json_encode(array('status' => 'success'));

        exit;
    }
    
    function negativecircleclone($f3) { 
        // Loader
        $user = $f3->get('SESSION.id');
        $nc = new Mapper($f3->get('DB'), 'widget_nat_negcircle');
        $f3->set('nc', $nc->find(array('user=?', $user)));
        // End Loader
                
        $dashbrd = 0;
        $dashbrd = $_REQUEST['dhbrd'];
                
        $f3->set('dashbrd', $dashbrd);
        
        $user1 = new User($f3->get('DB'));
        $user1 = $user1->getById($f3->get('SESSION.id'));
        $f3->set('currentStep', $user1->getCurrentStep());
                
        $negid = $_REQUEST['ngid'];
        
        if($negid){
            $negdata = $f3->get('DB')->exec('SELECT * FROM widget_nat_negcircle WHERE user=' . $user . ' AND negtht_id=' . $negid . ' ORDER BY step ASC');

            $natnegcirc = array();

            if ($negdata) {
                foreach ($negdata as $key => $ndata) {
                    $natnegcirc[] = array(
                        'id' => $ndata['id'],
                        'step' => $ndata['step'],
                        'text' => $ndata['text'],
                        'sldval' => $ndata['slider_val']
                    );  
                }
            }
            $f3->set('natnegcic', $natnegcirc);
        }
        
        $f3->set('user_id', $f3->get('SESSION.id'));
        $f3->set('nc', $nc);
        $f3->set('negthtid', $negid);
        
        echo \Template::instance()->render('dashboard/windows/window.nat-negativecircle2.htm');
        exit;
    }
    
    function updatenegcircle($f3) {
        //$negtht_id = $f3->get('SESSION.negthtid'); fix P095-357
        $step = $_REQUEST['step'];
        $text = $_REQUEST['text'];
        $slider_val = $_REQUEST['slider_val'];
        $negtht_id = $_REQUEST['negthid'];
        $user = $f3->get('SESSION.id');

        if ($negtht_id) {
            if ((ctype_digit($step))&&($step>=0)&&($step<=4)) {
                $f3->get('DB')->exec("UPDATE widget_nat_negcircle SET text='" . $text . "',slider_val='" . $slider_val . "' WHERE user=" . $user . " AND negtht_id=" . $negtht_id . " AND step=" . $step . "");
                echo json_encode(array('status' => 'success', 'test' => $negtht_id, 'stp' => $step . "" . $step));
            } else
                echo json_encode(array('status' => 'failed', 'step' => $step, 'problem' => 'unknown step'));
        } else
            echo json_encode(array('status' => 'failed', 'neghtid' => $negtht_id, 'problem' => 'unknown negative thought'));
        exit;
    }
    
    function negativecircle3($f3) {
        // Loader
        $user = $f3->get('SESSION.id');
        $nc = new Mapper($f3->get('DB'), 'widget_nat_negcircle');
        $f3->set('nc', $nc->find(array('user=?', $user)));
        // End Loader
        
        $dashbrd = 0;
        $dashbrd = $_REQUEST['dhbrd'];
        
        $f3->set('dashbrd', $dashbrd);
        
        $user1 = new User($f3->get('DB'));
        $user1 = $user1->getById($f3->get('SESSION.id'));
        $f3->set('currentStep', $user1->getCurrentStep());

        $f3->set('user_id', $f3->get('SESSION.id'));
        
        echo \Template::instance()->render('dashboard/windows/window.nat-negativecircle3.htm');
    }

}
