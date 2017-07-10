<?php

namespace controllers;

use DB\SQL\Mapper;
use models\User;
use models\Quiz;
use models\Natreg;
use models\Natnegcircle;

class StepController {

    function step($f3) {
        $security = $f3->get('security');
        if (!$security->check_login())
            $f3->reroute('/login');

        $user = new User($f3->get('DB'));
        $user = $user->getById($f3->get('SESSION.id'));
        $tstep = $user->getTreatmentStep();
        
        $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
        
        $manager = new TreatmentManager($user);
        $manager->executeRules();

        $due = $user->getDueQuiz();
        $f3->set('quiz_step', '/' . $due['id'] . '/' . $due['questionnaire_id'] . '/' . $due['current_step']);

        // override values set up in rules, only when accessing from widget overview
        // this mean user can view desired step but not save anything
        $substep = $f3->get('PARAMS.substep');
        $step = $f3->get('PARAMS.step');
        
if(!(ctype_digit($step))||($step<0||$step>8)||($step==6 && $user->stepA==0)||($step==7 && $user->stepB==0)||($step==8 && $user->step6==0))
            $f3->reroute('/');//URL manipulation P095-296 fix
        
        $curStep = $step;
        $f3->set('curStep', "$step");

        if ($f3->get('PATTERN') == "/step/readonly/@step/@substep") 
             $f3->set('readonly', true);
        
            $f3->set('currentStep', "$step");
            $f3->set('treatmentStep', "$tstep");
            $f3->set('currentSubStep', "$substep");
            
        $cday = $this->dandateformat(date('l', time()));
        $f3->set('cdaycal', $cday);
        define('cdaycal', $cday);

        if ($curStep == 8) {
            $userId = $f3->get('SESSION.id');

            $usertoolsdata = $f3->get('DB')->exec('SELECT tool_id FROM user_map_tools WHERE user_id=' . $userId);

            if ($usertoolsdata) {
                $toolarr = array();
                foreach ($usertoolsdata as $k => $utool) {
                    $toolarr[] = array('tid' => $utool['tool_id']);
                }

                $f3->set('usertool', $toolarr);
            } else {
                $f3->set('usertool', '');
            }
            
            // to show or not usefull tools from stepA and B
            if(($user->stepA < $user->step6) && ($user->stepA != 0) )
            {
                 $f3->set('IsStepACompleted', true);
            }
            if(($user->stepB < $user->step6)  && ($user->stepB != 0) )
            {
                 $f3->set('IsStepBCompleted', true);
            }
            // end

            $quizdata = $f3->get('DB')->exec('SELECT questionnaire_id FROM quiz where taken_by=' . $userId);
            foreach ($quizdata as $k => $qdata);

            $userdetails = $f3->get('DB')->exec('SELECT owner_id FROM user where id=' . $userId);
            foreach ($userdetails as $key => $data) {
                $owner = $data['owner_id'];
            }

            $today = date('Y-m-d H:i:s', time());

//            if ($userdetails) {
//                if ($qdata['questionnaire_id'] == 6) {
//                    
//                } else {
//                    $f3->get('DB')->exec("INSERT INTO quiz (questionnaire_id, created_by, taken_by, description, current_step, create_date, completed_date) VALUES (6, " . $owner . ", " . $userId . ", 'Sixth questionaire', '0', '" . $today . "', NULL)");
//                }
//            }

            $natModel = new Natreg($f3->get('DB'));
            $natnegcircle = $f3->get('DB')->exec('SELECT * FROM widget_nat_negcircle WHERE user=' . $userId . ' AND step=0');
            $natnegtht = array();

            foreach ($natnegcircle as $key => $natreg) {
                $natnegtht[] = array(
                    'id' => $natreg['id'],
                    //'date' => date('l d. F', strtotime($natreg['create_date'])),
                    'negthts' => $natreg['text']
                        //'posresp' => $natreg->possible_response
                );
            }

            $f3->set('natnegthts', $natnegtht);
            
           
        }

        if ($step == 7) {
            $user_id = $f3->get('SESSION.id');

            $usrplact = $f3->get('DB')->exec('SELECT * FROM widget_activity_list WHERE user=' . $user_id . ' AND ubication="left" ORDER BY activity ASC');

            if ($usrplact) {
                $userplract = array();
                foreach ($usrplact as $key => $usrdata) {
                    $userplract[] = array(
                        'wdgtid' => $usrdata['id'],
                        'activity' => $usrdata['activity'],
                        'user_plract' => $usrdata['user_plract']
                    );
                }

                $f3->set('userplract', $userplract);
            } else {
                $f3->set('userplract', "");
            }
        }

        $f3->set('completedStep', $user->getCompletedStep());

        echo \Template::instance()->render("dashboard/__layout-dashboard.htm");
    }

    function index($f3) {
        if (!($step = $f3->get('PARAMS.step'))) {
            throw new \InvalidArgumentException("Step identifier needed.");
        }

        if (!($page = $f3->get('PARAMS.page'))) {
            //throw new \InvalidArgumentException("Page identifier needed.");
        }

        $f3->set('page', $page);
        $f3->set('step', $step);
        echo \Template::instance()->render('dashboard/windows/window.step.htm');
    }

    function show($f3) {
        if (!($step = $f3->get('PARAMS.step'))) {
            throw new \InvalidArgumentException("Step identifier needed.");
        }

        if (!($page = $f3->get('PARAMS.page'))) {
            //throw new \InvalidArgumentException("Page identifier needed.");
        }

        $f3->set('page', $page);
        $f3->set('step', $step);
        $f3->set('header', "step/$step/__header.htm");
        $f3->set('content', "step/$step/step_$page.htm");

        echo \Template::instance()->render('step/__layout.htm');
    }

    function show_ajax($f3) {
        if (!($step = $f3->get('PARAMS.step'))) {
            throw new \InvalidArgumentException("Step identifier needed.");
        }

        if (!($page = $f3->get('PARAMS.page'))) {
            // throw new \InvalidArgumentException("Page identifier needed.");
        }

        if ($page == 4) {
            // Loader
            $user = $f3->get('SESSION.id');
            $nc = new Mapper($f3->get('DB'), 'widget_negativecircle');
            $f3->set('nc', $nc->find(array('user=?', $user)));
            // End Loader
        }

        if ($this->existPage($step, $page)) {
            $html = \Template::instance()->render("step/$step/step_$page.htm");
            echo json_encode(array('status' => 'success', 'html' => $html));
            exit;
        }

        echo json_encode(array('status' => 'error'));
    }

    function existPage($step, $page) {
        return file_exists("app/templates/step/$step/step_$page.htm");
    }

    function save_userrisks($f3) {
        $user = $f3->get('SESSION.id');
        $create_date = date('Y-m-d H:i:s');
        $risk = $_REQUEST['urisk'];
        $owner = $_REQUEST['owner'];

        if (!$owner) {
            $owner = 0;
        }
        if ($owner == 1) {
            $owner = $user;
        }

        if ($risk) {
            $f3->get('DB')->exec("INSERT INTO user_risks (risk, user_id, owner_id, created_date) VALUES('" . $risk . "', " . $user . ", " . $owner . ", '" . $create_date . "')");

            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }

        exit;
    }

    function listuserrisks($f3) {
        $user = $f3->get('SESSION.id');

        $urskdata = $f3->get('DB')->exec('SELECT * FROM user_risks where user_id=' . $user);

        if ($urskdata) {
            $ursk = '';
            foreach ($urskdata as $key => $udata) {
                $ursk .= "<div class='riskmidcontbox'><h4>" . $udata['risk'] . "</h4><div class='riskclosebtn' id='riskclose_" . $udata['id'] . "'><img src='/assets/img/Closebutton.png' width='20' height='20' onclick='showdelconfirm(" . $udata['id'] . ")' /></div></div>";
                //$ursk .= "<div class='drag-cent'><h5>" . $udata['risk'] . "</h5><i class='closeIcon' onclick='showdelconfirm(" . $udata['id'] . ")'></i></div>";
            }

            echo json_encode(array('status' => 'success', 'usrrsk' => $ursk));
        } else {
            echo json_encode(array('status' => 'success', 'usrrsk' => ''));
        }

        exit;
    }

    function deleteuserrisk($f3) {
        $id = $_REQUEST['id'];

        $user = $f3->get('SESSION.id');

        $f3->get('DB')->exec("DELETE FROM user_risks WHERE id=" . $id);

        echo json_encode(array('status' => 'success'));

        exit;
    }

    function user_pleasurable_activities($f3) {
        $user = $f3->get('SESSION.id');

        $usrplact = $f3->get('DB')->exec('SELECT * FROM widget_activity_list WHERE user=' . $user . ' AND ubication="left" ORDER BY activity ASC');

        if ($usrplact) {
            $userplract = '';
            $userplract .= '<ul class="multiple">';
            foreach ($usrplact as $key => $usrdata) {
                if ($usrdata['user_plract'] == 0) {                
                    $userplract .= '<li id="actli_' . $usrdata['id'] . '" onclick="selectplractivity(&#39;' . $usrdata['activity'] . '&#39;, ' . $usrdata['id'] . ', &#39;actli_' . $usrdata['id'] . '&#39;)">' . $usrdata['activity'] . '</li>';
                }
                if ($usrdata['user_plract'] == 1) {
                    $userplract .= "<li class='line_B'>" . $usrdata['activity'] . " <i class='tickMark'></i></li>";
                }
            }
            $userplract .= '</ul>';

            echo json_encode(array('status' => 'success', 'userplract' => $userplract));
        } else {
            echo json_encode(array('status' => 'failed', 'userplract' => ''));
        }

        exit;
    }

    function update_user_pleasurable_activities($f3) {
        $id = $_REQUEST['id'];

        $user = $f3->get('SESSION.id');

        $f3->get('DB')->exec("UPDATE widget_activity_list SET user_plract=1 WHERE id=" . $id);

        echo json_encode(array('status' => 'success'));
        exit;
    }

    function selected_pleasurable_activities($f3) {
        $user = $f3->get('SESSION.id');
        $dactivity = $_REQUEST['divact'];
        $owner = $_REQUEST['owner'];
        $wgtactid = $_REQUEST['wgtactid'];

        if (!$owner) {
            $owner = 0;
        }
        if ($owner == 1) {
            $owner = $user;
        }

        $_SESSION['usrdivact'][] = array('user' => $user, 'divact' => $dactivity, 'owner' => $owner, 'wgtactid' => $wgtactid);

        echo json_encode(array('status' => 'success'));
        exit;
    }

    function deselected_pleasurable_activities($f3) {
        $user = $f3->get('SESSION.id');
        $dactivity = $_REQUEST['divact'];

        $dactivity = str_replace('#', ' ', $dactivity);

        foreach ($_SESSION['usrdivact'] as $key => $value) {
            if ($value["divact"] == $dactivity) {
                unset($_SESSION['usrdivact'][$key]);
            }
        }

        echo json_encode(array('status' => 'success'));
        exit;
    }

    function save_user_diversionary_activity($f3) {
        if (isset($_SESSION['usrdivact'])) {
            $user = $f3->get('SESSION.id');
            $create_date = date('Y-m-d H:i:s');

            $usrdivactarr = $_SESSION['usrdivact'];

            foreach ($usrdivactarr as $key => $usractdata) {
                $dactivity = $usractdata['divact'];
                $owner = $usractdata['owner'];
                $wgtactid = $usractdata['wgtactid'];

                $dactivity = str_replace('#', ' ', $dactivity);

                if ($dactivity) {
                    $f3->get('DB')->exec("INSERT INTO user_diversionary_activity (div_activity, user_id, owner_id, wgtact_id, created_date) VALUES('" . $dactivity . "', " . $user . ", " . $owner . ", " . $wgtactid . ", '" . $create_date . "')");

                    if ($wgtactid) {
                        $f3->get('DB')->exec("UPDATE widget_activity_list SET user_plract=1 WHERE id=" . $wgtactid);
                    }

                    $_SESSION['usrdivact'] = '';
                    unset($_SESSION['usrdivact']);
                }
            }
        }

        echo json_encode(array('status' => 'success'));
        exit;
    }

    function save_diversionary_activity($f3) {
        $user = $f3->get('SESSION.id');
        $dactivity = $_REQUEST['divact'];
        $owner = $_REQUEST['owner'];
        $create_date = date('Y-m-d H:i:s');

        if (!$owner) {
            $owner = 0;
        }
        if ($owner == 1) {
            $owner = $user;
        }

        $wgtactid = 0;

        if ($dactivity) {
            $f3->get('DB')->exec("INSERT INTO user_diversionary_activity (div_activity, user_id, owner_id, wgtact_id, created_date) VALUES('" . $dactivity . "', " . $user . ", " . $owner . ", " . $wgtactid . ", '" . $create_date . "')");
        }

        echo json_encode(array('status' => 'success'));
        exit;
    }

    function delete_user_diversionary_activity($f3) {
        $id = $_REQUEST['id'];

        $user = $f3->get('SESSION.id');

        $userdivactdata = array();
        $userdivactdata = $f3->get('DB')->exec('SELECT wgtact_id FROM user_diversionary_activity WHERE id=' . $id);

        if ($userdivactdata) {
            foreach ($userdivactdata as $k => $usractdata)
                ;
            $wgtactid = $usractdata['wgtact_id'];
            if ($wgtactid) {
                $f3->get('DB')->exec("UPDATE widget_activity_list SET user_plract=0 WHERE id=" . $wgtactid);
            }
        }

        $f3->get('DB')->exec("DELETE FROM user_diversionary_activity WHERE id=" . $id);

        echo json_encode(array('status' => 'success'));
        exit;
    }

    function user_diversionary_activities($f3) {
        $user = $f3->get('SESSION.id');

        $userdivact = $f3->get('DB')->exec('SELECT * FROM user_diversionary_activity WHERE user_id=' . $user);

        if ($userdivact) {
            $usrdivact = '';
            $usrdivact .= '<ul class="listing">';
            foreach ($userdivact as $key => $usrdata) {
                $usrdivact .= '<li>' . $usrdata["div_activity"] . '<i class="closeIcon" onclick="deluserdivact(' . $usrdata["id"] . ')"></i></li>';
            }
            $usrdivact .= '</ul>';

            echo json_encode(array('status' => 'success', 'userdivact' => $usrdivact));
        } else {
            echo json_encode(array('status' => 'success', 'userdivact' => ''));
        }

        exit;
    }

    function save_userwarning($f3) {
        $user = $f3->get('SESSION.id');
        $create_date = date('Y-m-d H:i:s');
        $warning = $_REQUEST['urisk'];
        $owner = $_REQUEST['owner'];

        if (!$owner) {
            $owner = 0;
        }
        if ($owner == 1) {
            $owner = $user;
        }

        if ($warning) {
            $f3->get('DB')->exec("INSERT INTO user_warnings (warning, user_id, owner_id, created_date) VALUES('" . $warning . "', " . $user . ", " . $owner . ", '" . $create_date . "')");

            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }

        exit;
    }

    function listuserwarnings($f3) {
        $user = $f3->get('SESSION.id');

        $urskdata = $f3->get('DB')->exec('SELECT * FROM user_warnings where user_id=' . $user);

        if ($urskdata) {
            $ursk = '';
            foreach ($urskdata as $key => $udata) {
                $ursk .= "<div class='riskmidcontbox'>" . $udata['warning'] . "<div class='riskclosebtn' id='warngclose_" . $udata['id'] . "'><img src='/assets/img/Closebutton.png' width='20' height='20' onclick='showdelwarngconfirm(" . $udata['id'] . ")' /></div></div>";
            }

            echo json_encode(array('status' => 'success', 'usrrsk' => $ursk));
        } else {
            echo json_encode(array('status' => 'failed', 'usrrsk' => '22'));
        }

        exit;
    }

    function deleteuserwarning($f3) {
        $id = $_REQUEST['id'];

        $user = $f3->get('SESSION.id');

        $f3->get('DB')->exec("DELETE FROM user_warnings WHERE id=" . $id);

        echo json_encode(array('status' => 'success'));

        exit;
    }

    function save_userwarningsigns($f3) {
        $user = $f3->get('SESSION.id');
        $create_date = date('Y-m-d H:i:s');
        $warning = $_REQUEST['uwarning'];
        $owner = $_REQUEST['owner'];

        if (!$owner) {
            $owner = 0;
        }
        if ($owner == 1) {
            $owner = $user;
        }

        if ($warning) {
            $f3->get('DB')->exec("INSERT INTO user_warnings (warning, user_id, owner_id, created_date) VALUES('" . $warning . "', " . $user . ", " . $owner . ", '" . $create_date . "')");
            $userwarngid = $f3->get('DB')->lastInsertId();
            echo json_encode(array('status' => 'success', 'userwarngid' => $userwarngid));
        } else {
            echo json_encode(array('status' => 'success'));
        }

        exit;
    }

    function listuserwarningsigns($f3) {
        $user = $f3->get('SESSION.id');

        $urskdata = $f3->get('DB')->exec('SELECT * FROM user_warnings where user_id=' . $user);

        if ($urskdata) {
            $ursk = '';
            foreach ($urskdata as $key => $udata) {
                $ursk .= "<div class='Personhandlemidcontbox' id='" . $udata['id'] . "' onclick='rvmcontbox(" . $udata['id'] . ")'><div class='Personhandlemidtitle'>" . $udata['warning'] . "</div><div class='Personhandleclosebtn' id='warngsignsclose_" . $udata['id'] . "' onclick='showdelwarngsignsconfirm(" . $udata['id'] . ")'></div></div>";
            }

            echo json_encode(array('status' => 'success', 'usrrsk' => $ursk));
        } else {
            echo json_encode(array('status' => 'success', 'usrrsk' => ''));
        }

        exit;
    }

    function deleteuserwarningsigns($f3) {
        $id = $_REQUEST['id'];

        $user = $f3->get('SESSION.id');

        $f3->get('DB')->exec("DELETE FROM user_warnings WHERE id=" . $id);

        echo json_encode(array('status' => 'success'));

        exit;
    }

    function save_userrisksituations($f3) {
        $user = $f3->get('SESSION.id');
        $create_date = date('Y-m-d H:i:s');
        $risk = $_REQUEST['urisk'];
        $owner = $_REQUEST['owner'];

        if (!$owner) {
            $owner = 0;
        }
        if ($owner == 1) {
            $owner = $user;
        }

        if ($risk) {
            $f3->get('DB')->exec("INSERT INTO user_risks (risk, user_id, owner_id, created_date) VALUES('" . $risk . "', " . $user . ", " . $owner . ", '" . $create_date . "')");

            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }

        exit;
    }

    function listuserriskssituation($f3) {
        $user = $f3->get('SESSION.id');

        $urskdata = $f3->get('DB')->exec('SELECT * FROM user_risks where user_id=' . $user);

        if ($urskdata) {
            $ursk = '';
            foreach ($urskdata as $key => $udata) {
                $ursk .= "<div class='Personhandleriskmidcontbox'>" . $udata['risk'] . "<div class='riskclosebtn' id='risksitnclose_" . $udata['id'] . "'><img src='/assets/img/Closebutton.png' width='20' height='20' onclick='showdelrisksitnconfirm(" . $udata['id'] . ")' /></div></div>";
            }

            echo json_encode(array('status' => 'success', 'usrrsk' => $ursk));
        } else {
            echo json_encode(array('status' => 'failed', 'usrrsk' => ''));
        }

        exit;
    }

    function deluserrisksituation($f3) {
        $id = $_REQUEST['id'];

        $user = $f3->get('SESSION.id');

        $f3->get('DB')->exec("DELETE FROM user_risks WHERE id=" . $id);

        echo json_encode(array('status' => 'success'));

        exit;
    }

    function save_userwarningcomments($f3) {
        $user = $f3->get('SESSION.id');
        $create_date = date('Y-m-d H:i:s');
        $warningid = $_REQUEST['uwarningid'];
        $action = $_REQUEST['ucomment'];

        if ($warningid) {
            $f3->get('DB')->exec("INSERT INTO user_action_comment (warning_id, user_id, action, created_date) VALUES('" . $warningid . "', " . $user . ", '" . $action . "', '" . $create_date . "')");

            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }

        exit;
    }

    function listuserwarningcomment($f3) {
        $user = $f3->get('SESSION.id');
        $warningid = $_REQUEST['uwarningid'];

        $ursaction = $f3->get('DB')->exec('SELECT action FROM user_action_comment where user_id=' . $user . ' AND warning_id=' . $warningid);

        if ($ursaction) {
            $ursk = '';
            foreach ($ursaction as $key => $udata);
            $ursk = $udata['action'];

            echo json_encode(array('status' => 'success', 'usrrsk' => $ursk, 'statusID' => 100));
        } else {
            echo json_encode(array('status' => 'success', 'usrrsk' => '', 'statusID' => 101));
        }
        exit;
    }

    function selectedusefultools($f3) {
        $user = $f3->get('SESSION.id');
        $usefultool = $_REQUEST['tool'];
        $toolid = $_REQUEST['toolid'];
        $usetoolid = 'tool' . $toolid;
        $usrtoolid = '';
        $usertoolsdata = $f3->get('DB')->exec('SELECT id FROM user_map_tools WHERE tool_id="' . $usetoolid . '" AND user_id=' . $user);
        if ($usertoolsdata) {
            $f3->get('DB')->exec('DELETE FROM user_map_tools WHERE tool_id="' . $usetoolid . '" AND user_id=' . $user);
            echo json_encode(array('status' => 'failed', 'usrstatus' => '100'));
            exit;
        } else {

            $_SESSION['usrusefultool'][] = array('user' => $user, 'tool' => $usefultool, 'toolid' => $toolid);
            echo json_encode(array('status' => 'success', 'usrstatus' => $usetoolid));
            exit;
        }
    }

    function showselectedusefultools($f3) {
        $userId = $f3->get('SESSION.id');

        $usertoolsdata = $f3->get('DB')->exec('SELECT tool_id FROM user_map_tools WHERE user_id=' . $userId);

        if ($usertoolsdata) {
            $toolarr = array();
            foreach ($usertoolsdata as $k => $utool) {
                $toolarr[] = array('tid' => $utool['tool_id']);
            }

            $f3->set('userseltool', $toolarr);
            echo json_encode(array('status' => 'success'));
            exit;
        } else {
            $f3->set('userseltool', '');
        }
    }

    function save_user_useful_tools($f3) {
        if (isset($_SESSION['usrusefultool'])) {
            $user = $f3->get('SESSION.id');
            $create_date = date('Y-m-d H:i:s');

            $usrusefultoolarr = $_SESSION['usrusefultool'];

            foreach ($usrusefultoolarr as $key => $usrtooldata) {
                $usrtool = $usrtooldata['tool'];
                $tlid = $usrtooldata['toolid'];

                $toolid = 'tool' . $tlid;

                if ($usrtool) {
                    $f3->get('DB')->exec("INSERT INTO user_map_tools (user_id, tool, tool_id, created_date) VALUES(" . $user . ", '" . $usrtool . "', '" . $toolid . "', '" . $create_date . "')");

                    $_SESSION['usrusefultool'] = '';
                }
            }
        }

        echo json_encode(array('status' => 'success'));
        exit;
    }

    function getusertools($f3) {
        $user = $f3->get('SESSION.id');

        $usertoolsdata = $f3->get('DB')->exec('SELECT tool_id FROM user_map_tools WHERE user_id=' . $user);

        if ($usertoolsdata) {
            $toolarr = array();
            foreach ($usertoolsdata as $k => $utool) {
                $toolarr[] = array('tid' => $utool['tool_id']);
            }

            echo json_encode(array('status' => 'success', 'usrtool' => $toolarr));
        } else {
            echo json_encode(array('status' => 'success', 'usrtool' => ''));
        }

        exit;
    }

    function checkpasswordexists($f3) {
        $password = $_REQUEST['password'];
        $user = $f3->get('SESSION.id');

        if ($password) {
            $salt = '';
            $currentpassword = '';
            $userdetails = $f3->get('DB')->exec('SELECT salt,password FROM user where id=' . $user);
            foreach ($userdetails as $key => $data) {
                $salt = $data['salt'];
                $currentpassword = $data['password'];
            }
            $saltpassword = $f3->get('security')->getPasswordTransform($password, $salt);

            if ($saltpassword == $currentpassword) {
                echo json_encode(array('status' => 'success', 'usrrsk' => $currentpassword));
            } else {
                echo json_encode(array('status' => 'failed', 'usrrsk' => '22'));
            }
        }

        exit;
    }

    function checkcurrentpasswordexists($f3) {
        $password = $_REQUEST['password'];
        $user = $f3->get('SESSION.id');

        if ($password) {
            $salt = '';
            $currentpassword = '';
            $userdetails = $f3->get('DB')->exec('SELECT salt,password FROM user where id=' . $user);
            foreach ($userdetails as $key => $data) {
                $salt = $data['salt'];
                $currentpassword = $data['password'];
            }
            $saltpassword = $f3->get('security')->getPasswordTransform($password, $salt);

            if ($saltpassword == $currentpassword) {
                echo json_encode(array('status' => 'success', 'usrrsk' => $currentpassword));
            } else {
                echo json_encode(array('status' => 'failed', 'usrrsk' => '22'));
            }
        }

        exit;
    }

    function checkemailexists($f3) {
        $email = $_REQUEST['email'];
        if ($email) {
            $useremailaddress = $f3->get('DB')->exec('SELECT id,email FROM user where email="' . $email . '"');
            if ($useremailaddress) {
                echo json_encode(array('status' => 'success', 'statusID' => 100));
            } else {
                echo json_encode(array('status' => 'failed', 'statusID' => 102));
            }
        }
        exit;
    }
    
    function checkphoneexists($f3) {
        $phone = $_REQUEST['phone'];
        $userid = isset ($_REQUEST['userid']) ? $_REQUEST['userid'] : '' ;
       
        if ($phone) {
            $useremailaddress= "";
            if($userid != '')
            {
               
                $useremailaddress = $f3->get('DB')->exec('SELECT id,phone FROM user where phone="' . $phone . '" and id <> '.$userid);
            }
            else
            {
                $useremailaddress = $f3->get('DB')->exec('SELECT id,phone FROM user where phone="' . $phone . '"');
            }
            
            if ($useremailaddress) {
                echo json_encode(array('status' => 'success', 'statusID' => 100));
            } else {
                echo json_encode(array('status' => 'failed', 'statusID' => 102));
            }
        }
        exit;
    }
    
    function checkphoneprofileexists($f3) {
        $phone = $_REQUEST['phone'];
        $userid = $_REQUEST['userid'];
        if ($phone) {
            $useremailaddress = $f3->get('DB')->exec("SELECT id,phone FROM user where phone='".$phone."' and id <> ".$userid);
            if ($useremailaddress) {
                echo json_encode(array('status' => 'success', 'statusID' => 100));
            } else {
                echo json_encode(array('status' => 'failed', 'statusID' => 102));
            }
        }
        
        if(trim($phone) == "")
        {
            echo json_encode(array('status' => 'failed', 'statusID' => 102));
        }
        
        exit;
    }
    
	  function checkemailprofileexists($f3) {
        $email = $_REQUEST['email'];
        $userid = $_REQUEST['userid'];
        if ($email) {
            $useremailaddress = $f3->get('DB')->exec("SELECT id,phone FROM user where email='".$email."' and id <> ".$userid);
            if ($useremailaddress) {
                echo json_encode(array('status' => 'success', 'statusID' => 100));
            } else {
                echo json_encode(array('status' => 'failed', 'statusID' => 102));
            }
        }
        
        if(trim($email) == "")
        {
            echo json_encode(array('status' => 'failed', 'statusID' => 102));
        }
        
        exit;
    }
    

    function sixthqstnloadcheck($f3) {
        $user = $f3->get('SESSION.id');

        $flag = 0;
        $curstep = 0;

        $quizzdata = $f3->get('DB')->exec('SELECT current_step FROM quiz WHERE questionnaire_id=6 AND taken_by=' . $user);

        if ($quizzdata) {
            foreach ($quizzdata as $key => $qdata) {
                $curstep = $qdata['current_step'];

                if ($curstep >= 60) {
                    $flag = 1;
                }
            }
        }

        echo json_encode(array('status' => 'success', 'flag' => $flag));
        exit;
    }

    function beforeRoute($f3) {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }

    function dandateformat($date) {
        $months['January'] = array('dn' => 'Januar');
        $months['February'] = array('dn' => 'Februar');
        $months['March'] = array('dn' => 'Marts');
        $months['April'] = array('dn' => 'April');
        $months['May'] = array('dn' => 'Maj');
        $months['June'] = array('dn' => 'Juni');
        $months['July'] = array('dn' => 'Juli');
        $months['August'] = array('dn' => 'August');
        $months['September'] = array('dn' => 'September');
        $months['October'] = array('dn' => 'Oktober');
        $months['November'] = array('dn' => 'November');
        $months['December'] = array('dn' => 'December');

        $days['Monday'] = array('dn' => 'Mandag');
        $days['Tuesday'] = array('dn' => 'Tirsdag');
        $days['Wednesday'] = array('dn' => 'Onsdag');
        $days['Thursday'] = array('dn' => 'Torsdag');
        $days['Friday'] = array('dn' => 'Fredag');
        $days['Saturday'] = array('dn' => 'Lørdag');
        $days['Sunday'] = array('dn' => 'Søndag');

        foreach ($months as $key => $val) {
            $date = str_replace($key, $val['dn'], $date);
        }
        foreach ($days as $key => $val) {
            $date = str_replace($key, $val['dn'], $date);
        }

        return $date;
    }

}
