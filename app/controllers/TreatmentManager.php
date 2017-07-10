<?php

namespace controllers;

use Ruler\Context;
use Ruler\RuleSet;
use models\Note;
use models\Quiz;
use models\User;
use \DB\SQL\Mapper;
use \Ruler\RuleBuilder;

/**
 * Class TreatmentManager
 *
 * Class to encapsulate logic for patient treatment. It should handle patient treatment
 * status, next steps to follow, etc... Possible use a Rule engine to manage this stuff.
 * Thi should be created an attached as a service to f3 if the logged in user is a patient,
 * that way we can use it throughout the application. From here we return rule sets to be
 * evaluated under certain circumstances, mostly driven by user "treatment_step" information
 *
 * THIS IS NOT A CLASS FOR DOCTORS OR ADMINS
 *
 * @package controllers
 */
class TreatmentManager {

    /**
     * @var Base
     */
    private $f3;

    /**
     * @var User
     */
    private $user;

    /**
     * @var RuleBuilder
     */
    private $rb;

    /**
     * @param $user User
     * @throws \InvalidArgumentException
     * @internal param $user_id
     */
    function __construct($user) {
        $this->f3 = \Base::instance();
        $this->user = $user;

        $this->rb = new RuleBuilder();
    }

    /**
     * Check for Patient Group role
     * @return bool
     */
    function getPatientGroups() {
        return array(1, 2);
    }

    /**
     * Check for Admin Group role
     * @return bool
     */
    function getAdminGroups() {
        return array(4);
    }

    /**
     * Check for Doctor Group role
     * @return bool
     */
    function getDoctorGroups() {
        return array(3);
    }

    /**
     * Prepare context for execute rules, api can receive an array of external vars
     * @param array $context
     */
    function executeRules(array $context = array()) {

        $completed_step_date = strtotime($this->user->completed_step_date);
        $weeks = (int) ceil((time() - $completed_step_date) / (3600 * 24 * 7));

        $days_since_last_completed_quiz = 0;
        $weeks_since_last_completed_quiz = 0;
        $quiz_type = 0;

        if ($last_quiz = $this->user->getLastCompletedQuiz()) {
            $completed_quiz_date = strtotime($last_quiz->completed_date);
            $days_since_last_completed_quiz = (int) floor((time() - $completed_quiz_date) / (3600 * 24));

            $weeks_since_last_completed_quiz = (int) floor((time() - $completed_quiz_date) / (3600 * 24 * 7));

            $quiz_type = $last_quiz['questionnaire_id'];
        }

        $ctx = new Context(
                array_merge(
                        array(
                    'user' => $this->user->cast(),
                    'step' => $this->f3->get('PARAMS.step') ? $this->f3->get('PARAMS.step') : $this->user->getCurrentStep(),
                    'substep' => $this->f3->get('PARAMS.substep') ? $this->f3->get('PARAMS.substep') : $this->user->getCurrentSubStep(),
                    'admins' => $this->getAdminGroups(),
                    'doctors' => $this->getDoctorGroups(),
                    'patients' => $this->getPatientGroups(),
                    'urlpattern' => $this->f3->get('PATTERN'),
                    'weeks_since_last_completed_step' => $weeks,
                    'days_since_last_completed_quiz' => $days_since_last_completed_quiz,
                    'weeks_since_last_completed_quiz' => $weeks_since_last_completed_quiz,
                    'last_quiz_type' => $quiz_type
                        ), $context
                )
        );



        // get the rules
        $rs = $this->getRules();
        // lets fire the whole thing
        $rs->executeRules($ctx);
    }

    function setWeekProgressWidget() {
        // Week Progress Widget
        //$this->f3->set('days', date("N", $this->user->weeksSinceRegistered()));
        $diff = time() - strtotime($this->user->create_date);
        $days = (int) (ceil($diff / (24 * 3600)));

        $this->f3->set('days', $days);
        $this->f3->set('weeks', $this->user->weeksSinceRegistered());
        $this->f3->set('useWPWidget', true);
    }

    function setNegativeCircleWidget() {
        // Negative Circle Data
        $nc = new Mapper($this->f3->get('DB'), 'widget_negativecircle');
        $this->f3->set('nc', $nc->find(array('user=?', $this->user->id)));
    }

    function setPsychiatricHelpWidget() {
        // Psychiatric Help Widget
        $this->f3->set('usePHWidget', true);
    }

    function setPositiveExperienceWidget() {
        // Positive Experience Widget
        $noteModel = new Note($this->f3->get('DB'));
        $data = $noteModel->last_note($this->user->id);

        if ($data) {
            $date = date('l d. F', strtotime($data->create_date));
            $date = $this->dandateformat($date);
            $note = substr($data->note, 0, 250);
        } else {
            $date = "";
            $note = "";
        }

        $this->f3->set('date', $date);
        $this->f3->set('note', $note);
        $this->f3->set('usePEWidget', true);
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

    function setProblemGoalWidget() {
        $this->f3->set('usePGWidget', true);
    }

    function setDueQuiz() {
        if (($due = $this->user->getDueQuiz())) {
            $this->f3->set('quiz_step', '/' . $due['id'] . '/' . $due['questionnaire_id'] . '/' . $due['current_step']);
        }
    }

    function setTreatmentOverviewWidget() {
        // Behandeling (Treatment Overview Widget)
        // TODO hook into db to show accurate data
        $this->f3->set('steps', array(
            '1' => array(
                'title' => 'Introduktion',
                'sections' => array(
                    '1.0' => 'Velkommen',
                    '1.1' => 'Velkommen til Trin 1',
                    '1.2' => 'Hvordan viser depression sig?',
                    '1.3' => 'Den negative cirkel',
                    '1.4' => 'Den negative cirkel',
                    '1.5' => 'Mere om negative cirkler',
                    '1.6' => 'Negative automatiske tanker og generelle leveregler',
                    '1.7' => 'Problem- og målliste',
                    '1.8' => 'Problem- og målliste',
                    '1.9' => 'Dagens positive oplevelse',
                    '1.10' => 'Dagens positive oplevelse',
                    '1.11' => 'Opsummering',
                    '1.12' => 'Godt gået!'
                )
            ),
            '2' => array(
                'title' => 'Aktivitetsregistrering',
                'sections' => array(
                    '2.0' => 'Velkommen',
                    '2.1' => 'Velkommen til Trin 2',
                    '2.2' => 'Aktivitetsliste',
                    '2.3' => 'Behageligt Aktivitetsliste',
                    '2.4' => 'Mønstre i depression',
                    '2.5' => 'Aktivitet Optagelse',
                    '2.6' => 'Aktivitets registrering',
                    '2.7' => 'Resumé',
                    '2.8' => 'Godt gået!'
                )
            ),
            '3' => array(
                'title' => 'Aktivitetsplanlægning',
                'sections' => array(
                    '3.0' => 'Velkommen',
                    '3.1' => 'Velkommen til Trin 3',
                    '3.2' => 'Udviddelse af aktivitetsliste',
                    '3.3' => 'Bryd den negative cirkel med tilfredsstillende aktiviteter',
                    '3.4' => 'Opdeling af opgaver',
                    '3.5' => 'At planlægge aktiviteter',
                    '3.6' => 'Aktivitetsplanlægning',
                    '3.7' => 'At dele en opgave op i mindre dele',
                    '3.8' => 'Aktivitetsplanlægning med opdeling af opgaver',
                    '3.9' => 'At kortlægge negative og selvkritiske tanker',
                    '3.10' => 'Registrering af negative automatiske tanker',
                    '3.11' => 'Opsummering af opgaver',
                    '3.12' => 'Godt gået!'
                )
            ),
            '4' => array(
                'title' => 'Negative automatiske tanker',
                'sections' => array(
                    '4.0' => 'Velkommen',
                    '4.1' => 'Velkommen til Trin 4',
                    '4.2' => 'Negative automatiske tanker',
                    '4.3' => 'Typiske fejlfortolkninger',
                    '4.4' => 'Bryd den negative cirkel med tilfredsstillende aktiviteter',
                    '4.5' => 'Introduktion til øvelsen',
                    '4.6' => 'Udfordre negative, automatiske tanker',
                    '4.7' => 'Opsummering',
                    '4.8' => 'Godt gået!'
                )
            ),
            '5' => array(
                'title' => 'Udfordring af negative automatiske tanker',
                'sections' => array(
                    '5.0' => 'Velkommen',
                    '5.1' => 'Udfordring af negative tanker gennem ændring af handlemåde',
                    '5.2' => 'Udfordring af negative tanker gennem ændring af handlemåde',
                    '5.3' => 'Udfordring af negativ automatisk tanke',
                    '5.7' => 'Udfordring af negative tanker gennem ændring af handlemåde',
                    '5.8' => 'Godt gået!'
                )
            ),
            '6' => array(
                'title' => 'Leveregler',
                'sections' => array(
                    '6.0' => 'Introduktion til øvelsen',
                    '6.1' => 'Leveregler og strategier',
                    '6.2' => 'Kortlægning og analyse af uhensigtsmæssig leveregel',
                    '6.3' => 'Kortlægning og analyse af uhensigtsmæssig leveregel',
                    '6.4' => 'Kortlægning og analyse af uhensigtsmæssig leveregel',
                    '6.5' => 'Leveregler og strategier',
                    '6.6' => 'Udfordring af unyttig leveregel ved at ændre adfærd i praksis',
                    '6.7' => 'Udfordring af unyttig leveregel ved at ændre adfærd i praksis',
                    '6.8' => 'Udfordring af unyttig leveregel ved at ændre adfærd i praksis',
                    '6.9' => 'Adfærdseksperiment',
                    '6.13' => 'Evaluering af adfærdseksperiment',
                    '6.14' => 'Opsummering',
                    '6.15' => 'Godt gået!'
                )
            ),
            '7' => array(
                'title' => 'Grublerier',
                'sections' => array(
                    '7.0' => 'Depressive grublerier',
                    '7.1' => 'Velkommen til Trin B',
                    '7.2' => 'Depressive grublerier',
                    '7.3' => 'Fordele og ulemper ved depressive grublerier',
                    '7.4' => 'Om at håndtere grublerier',
                    '7.5' => 'Beskrivelse og takling af unyttige grublerier',
                    '7.6' => 'Kortlægning af grubleri',
                    '7.7' => 'Afledning',
                    '7.8' => 'Liste over afledende aktiviteter',
                    '7.9' => 'Afledende aktiviteter Planlæg hvornår du vil gøre det',
                    '7.13' => 'Velkommen tilbage',
                    '7.14' => 'Afledende aktiviteter - Evaluering',
                    '7.15' => 'Problemløsning',
                    '7.16' => 'Problemløsning Planlæg hvornår du vil gøre det',
                    '7.20' => 'Velkommen tilbage',
                    '7.21' => 'Problemløsning Planlæg hvornår du vil gøre det',
                    '7.22' => 'Grubletid',
                    '7.23' => 'Grubletid Planlæg hvornår du vil gøre det',
                    '7.27' => 'Grubletid',
                    '7.28' => 'Grubletid - Evaluering',
                    '7.29' => 'Opsummering',
                    '7.30' => 'Godt gået!'
                )
            ),
            '8' => array(
                'title' => 'Tilbagefaldsforebyggelse',
                'sections' => array(
                    '8.0' => 'Forebyggelse af tilbagefald',
                    '8.1' => 'Forebyggelse af tilbagefald',
                    '8.2' => 'Vedligeholde det du har lært',
                    '8.3' => 'Kortlægning af nyttige redskaber',
                    '8.4' => 'Kortlægning af nyttige redskaber',
                    '8.5' => 'Din personlige forebyggelsesplan',
                    '8.6' => 'Kortlægning af risikosituationer/udløsende faktorer',
                    '8.7' => 'Risikosituationer og udløsende faktorer',
                    '8.8' => 'Kortlægning af tidlige tegn',
                    '8.9' => 'Tidlige advarselstegn',
                    '8.10' => 'Personlig handleplan ved risikosituationer og tidlige tegn på depression',
                    '8.11' => 'Personlig handleplan',
                    '8.12' => 'Afslutning',
                    '8.14' => 'Godt gået!'
                )
            )
        ));

        $this->f3->set('current_step', $this->user->getCurrentStep() ? : 1);
        $this->f3->set('current_step_complete', $this->user->treatment_step ? : '1.0');
        $this->f3->set('current_sub_step', $this->user->getCurrentSubStep() ? : 0);
        $this->f3->set('useTOWidget', true);
    }

    function setActivityListWidget() {
        $this->f3->set('useALWidget', true);
    }

    function setCalendarWidget() {
        // useCWidget
        $this->f3->set('useCWidget', true);

        $date = date('j', time());
        $day = date('l', time());
        $this->f3->set('datec', $date);
        $this->f3->set('day', $this->dandateformat($day));
        $this->f3->set('current_sub_step', $this->user->getCurrentSubStep() ? : 1);
    }

    function setNATRegistrationWidget() {
        $this->f3->set('useNATRegistrationWidget', true);
    }

    function setLevereglerWidget() {
        $this->f3->set('useLevereglerWidget', true);
    }

    function setDepressiveWidget() {
        $this->f3->set('useDepressiveWidget', true);
    }

    function setForebyggelsesplanWidget() {
        $this->f3->set('useForebyggeWidget', true);
    }

    function sendEmail($to, $name, $subject, $template) {
        $message = \Template::instance()->render($template);
        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $header .= 'To:' . $name . '<' . $to . '>' . "\r\n";
        $header .= "From: noreply@totem.com \r\n";

        mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', "$message", $header);
    }

    /**
     * Every time a patient log in into the site, we must check at which stage is, to take
     * him, if necessary; to proper page. Also if we need to create any resource like a quiz
     * for him to complete, we do this at login time. basically we will have several rules to
     * apply/execute its actions for each stage. Note that most of this is fired from Main
     * dashboard controller action.
     *
     * @return RuleSet
     */
    function getRules() {
        $rules = array();
        $rb = $this->rb;
        $f3 = $this->f3;
        $user = $this->user;
        $self = $this;

        /**
         * The following rules has a discriminant to execute in an exclusive way:
         * $rb['user']['isPatient'], these are the step 0 rules, called from
         * MainController->dashboard
         */
        // what to do when user stage is 0.3, he/she doing the quiz yet
        // so far the rule receive as context the user data as an array
        $rules['S <= 0.3'] = $rb->create(
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb->logicalAnd(
                                // are we under step 0.3 or on it
                                $rb['step']->equalTo(0), $rb['substep']->lessThanOrEqualTo(3)
                        )
                ), function () use ($self, $f3, $user) {
            //$f3->get('logger')->write("Fired rule: S <= 0.3");
            // at this stage there is already created the big quiz
            // instance (created at user confirmation time). This action
            // basically represent what we had in MainController->dashboard action

            $self->setWeekProgressWidget();

            $self->setPsychiatricHelpWidget();

            // get due quiz of this patient
            if ($dueQuiz = $user->getDueQuiz()) {
                // let show where he/she left over, if started     
                $f3->set('quiz_step', '/' . $dueQuiz['id'] . '/' . $dueQuiz['questionnaire_id'] . '/' . $dueQuiz['current_step']);
                // echo $dueQuiz['id'] . '/' . $dueQuiz['questionnaire_id'] . '/' . $dueQuiz['current_step'];
                // exit;
            } else {
                // finish the quiz but don't have seen the video yet?
                $user->treatment_step = '0.4';
                $user->save();



                if ($user->isControlGroup()) {
                    $f3->set('video', 'X.2.mp4');
                } else {
                    $f3->set('video', '0.4.mp4');
                }
            }
            $f3->set('currentStep', $user->getCurrentStep());
            $f3->set('content', 'dashboard/section.quiz.htm');
        }
        );

        /**
         * what to do when user stage is 0.4, he/she finished the quiz and need to watch
         * the summary video so far the rule receive as context the user data as an array
         */
        $rules['S == 0.4'] = $rb->create(
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb->logicalAnd(
                                // are we on step 0.4
                                $rb['step']->equalTo(0), $rb['substep']->equalTo(4)
                        )
                ), function () use ($self, $f3, $user, $rb ) {
            //$f3->get('logger')->write("Fired rule: S == 0.4");

            $self->setWeekProgressWidget();

            $self->setPsychiatricHelpWidget();

            if ($user->isControlGroup()) {
                $f3->set('video', 'X.2.mp4');
            } else {
                $f3->set('video', '0.4.mp4');
            }

            $f3->set('currentStep', $user->getCurrentStep());
            $f3->set('content', 'dashboard/section.quiz.htm');
        }
        );

        /**
         * Moving to Step 1 (Control)
         */
        $rules['S == 0.4 , control user and 10 weeks later'] = $rb->create(
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb->logicalAnd(
                                $rb['step']->equalTo(0), $rb['substep']->equalTo(4)
                        ), $rb['user']['group_id']->equalTo(1), $rb['weeks_since_last_completed_quiz']->greaterThanOrEqualTo(0)
                ), function () use ($self, $f3, $user, $rb ) {
            // $f3->get('logger')->write("Fired rule: S == 0.4 , control user and 10 weeks later");
            $user->treatment_step = '1.0';
            $user->save();
            $f3->reroute('/');
        }
        );

        /**
         * Moving to Step 1 (Experimental)
         */
        $rules['S == 0.4 and experimental user'] = $rb->create(
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb->logicalAnd(
                                $rb['step']->equalTo(0), $rb['substep']->equalTo(4)
                        ), $rb['user']['group_id']->equalTo(2)
                ), function () use ($self, $f3, $user, $rb ) {
            //$f3->get('logger')->write("Fired rule: S == 0.4 and experimental user");
            $user->treatment_step = '1.0';
            $user->save();
            $f3->reroute('/');
        }
        );
        ///////////////// STEP 0 END \\\\\\\\\\\\\\\\\\\\\\\\\\

        /**
         * For step 1 we show two more widgets, rules are fired from StepController->step
         */
        // what to do when 1.0 >= user stage < 1.12, this is basically the same as the
        // previous stages but we need to cover all user stages here. Also we need two rules
        // for the case we are accessing the dashboard or the step per se.
        $rules['1.0 >= S <= 1.12 from step controller'] = $rb->create(
                // rule for viewing the step
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb->logicalOr(
                                // match when doing the step
                                $rb['urlpattern']->equalTo("/step/@step"),
                                // match when doing substep
                                $rb['urlpattern']->equalTo("/step/@step/@substep"),
                                // match even when in readonly mode, just to review desired substep
                                $rb['urlpattern']->equalTo("/step/readonly/@step/@substep")
                        ), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 1.0 or on it
                                        $rb['step']->equalTo(1), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 1.12
                                        $rb['step']->equalTo(1), $rb['substep']->lessThanOrEqualTo(12)
                                )
                        )
                ), function () use ($self, $f3, $user) {
            //$f3->get('logger')->write("Fired rule: 1.0 >= S <= 1.12 from step controller");
            // Stage 1 not showing the two new widgets yet
            $subStep = $f3->get('PARAMS.substep') ? $f3->get('PARAMS.substep') : $user->getCurrentSubStep();
            $step = $f3->get('PARAMS.step') ? $f3->get('PARAMS.step') : $user->getCurrentStep();

            $self->setNegativeCircleWidget();

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('currentStep', "$step-{$subStep}");
            $f3->set('user_id', $user->id);
            $f3->set('step', $step);
            $f3->set('content', "dashboard/steps/step.$step.htm");
        }
        );

        $rules['1.0 >= S <= 1.12 from dashboard controller'] = $rb->create(
                // rule for viewing the dashboard
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb['urlpattern']->equalTo("/"), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 1.0 or on it
                                        $rb['step']->equalTo(1), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 1.8
                                        $rb['step']->equalTo(1), $rb['substep']->lessThanOrEqualTo(12)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            // $f3->get('logger')->write("Fired rule: 1.0 >= S <= 1.12 from dashboard controller");
            // show this one only after showing its video and exercise on step
            if ($user->getCurrentSubStep() >= 10) {
                $self->setPositiveExperienceWidget();
            }

            // show this one only after showing its video and exercise on step
            if ($user->getCurrentSubStep() >= 8) {
                $self->setProblemGoalWidget();
            }

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            $self->setDueQuiz();

            // move to step 2.0 and set last completed step to 1
            if ($user->treatment_step == '1.12') {
                $userfirststep = $f3->get('DB')->exec('SELECT id FROM user_first_step where user_id=' . $user->id);

                if (!$userfirststep) {
                    $today = date('Y-m-d H:i:s');
                    $f3->get('DB')->exec("INSERT INTO user_first_step (user_id, completed_date) VALUES (" . $user->id . ", '" . $today . "')");
                }

                $user->treatment_step = '2.0';
                $user->completed_step = '1';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();
            }

            $f3->set('currentStep', $user->getCurrentStep());
            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('content', 'dashboard/section.quiz.htm');
        }
        );

        //////////////////////// STEP 2 RULES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

        $rules['2.0 >= S <= 2.8 from dashboard controller'] = $rb->create(
                // rule for viewing the dashboard
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb['urlpattern']->equalTo("/"), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 1.0 or on it
                                        $rb['step']->equalTo(2), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 1.8
                                        $rb['step']->equalTo(2), $rb['substep']->lessThanOrEqualTo(8)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //  $f3->get('logger')->write("Fired rule: 2.0 >= S <= 2.8 from dashboard controller");

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            if ($user->getCurrentSubStep() >= 3) {
                $self->setActivityListWidget();
            }

            if ($user->getCurrentSubStep() >= 6) {
                $self->setCalendarWidget();
            }

            $self->setDueQuiz();

            // move to step 3.0 and set last completed step to 2
            if ($user->treatment_step == '2.8') {
                $user->treatment_step = '3.0';
                $user->completed_step = '2';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();
            }

            $f3->set('currentStep', $user->getCurrentStep());
            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('content', 'dashboard/section.quiz.htm');
        }
        );

        $rules['2.0 >= S <= 2.8 from step controller'] = $rb->create(
                // rule for viewing the step
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb->logicalOr(
                                // match when doing the step
                                $rb['urlpattern']->equalTo("/step/@step"),
                                // match when doing substep
                                $rb['urlpattern']->equalTo("/step/@step/@substep"),
                                // match even when in readonly mode, just to review desired substep
                                $rb['urlpattern']->equalTo("/step/readonly/@step/@substep")
                        ), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 2.0 or on it
                                        $rb['step']->equalTo(2), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 2.8
                                        $rb['step']->equalTo(2), $rb['substep']->lessThanOrEqualTo(8)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //$f3->get('logger')->write("Fired rule: 2.0 >= S <= 2.8 from step controller");
            // Stage 1 not showing the two new widgets yet
            $subStep = $f3->get('PARAMS.substep') ? $f3->get('PARAMS.substep') : $user->getCurrentSubStep();
            $step = $f3->get('PARAMS.step') ? $f3->get('PARAMS.step') : $user->getCurrentStep();

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('currentStep', "$step-{$subStep}");
            $f3->set('user_id', $user->id);
            $f3->set('step', $step);
            $f3->set('content', "dashboard/steps/step.$step.htm");
        }
        );

        //Rajeesh - 26/03/2014 - step 3 rules
        //////////////////////// STEP 3 RULES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

        $rules['3.0 >= S <= 3.12 from dashboard controller'] = $rb->create(
                // rule for viewing the dashboard
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb['urlpattern']->equalTo("/"), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 1.0 or on it
                                        $rb['step']->equalTo(3), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 1.8
                                        $rb['step']->equalTo(3), $rb['substep']->lessThanOrEqualTo(12)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //$f3->get('logger')->write("Fired rule: 3.0 >= S <= 3.12 from dashboard controller");                           

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            $self->setActivityListWidget();

            $self->setCalendarWidget();

            if ($user->getCurrentSubStep() >= 10) {
                $self->setNATRegistrationWidget();
            }

            $self->setDueQuiz();
            // move to step 4.0 and set last completed step to 3
            if ($user->treatment_step == '3.12') {
                $user->treatment_step = '4.0';
                $user->completed_step = '3';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();
            }

            $f3->set('currentStep', $user->getCurrentStep());
            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('content', 'dashboard/section.quiz.htm');
        }
        );

        $rules['3.0 >= S <= 3.12 from step controller'] = $rb->create(
                // rule for viewing the step
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb->logicalOr(
                                // match when doing the step
                                $rb['urlpattern']->equalTo("/step/@step"),
                                // match when doing substep
                                $rb['urlpattern']->equalTo("/step/@step/@substep"),
                                // match even when in readonly mode, just to review desired substep
                                $rb['urlpattern']->equalTo("/step/readonly/@step/@substep")
                        ), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 2.0 or on it
                                        $rb['step']->equalTo(3), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 2.8
                                        $rb['step']->equalTo(3), $rb['substep']->lessThanOrEqualTo(12)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //$f3->get('logger')->write("Fired rule: 3.0 >= S <= 3.12 from step controller");
            // Stage 1 not showing the two new widgets yet
            $subStep = $f3->get('PARAMS.substep') ? $f3->get('PARAMS.substep') : $user->getCurrentSubStep();
            $step = $f3->get('PARAMS.step') ? $f3->get('PARAMS.step') : $user->getCurrentStep();

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('currentStep', "$step-{$subStep}");
            $f3->set('user_id', $user->id);
            $f3->set('step', $step);
            $f3->set('content', "dashboard/steps/step.$step.htm");
        }
        );

        //////////////////////// STEP 4 RULES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

        $rules['4.0 >= S <= 4.8 from dashboard controller'] = $rb->create(
                // rule for viewing the dashboard
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb['urlpattern']->equalTo("/"), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 1.0 or on it
                                        $rb['step']->equalTo(4), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 1.8
                                        $rb['step']->equalTo(4), $rb['substep']->lessThanOrEqualTo(8)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //$f3->get('logger')->write("Fired rule: 4.0 >= S <= 4.8 from dashboard controller");

            $self->setNATRegistrationWidget();

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            $self->setActivityListWidget();

            $self->setCalendarWidget();

            if ($user->getCurrentSubStep() >= 6) {
                $self->setNATRegistrationWidget();
            }

            $self->setDueQuiz();
            // move to step 5.0 and set last completed step to 4
            if ($user->treatment_step == '4.8') {
                $user->treatment_step = '5.0';
                $user->completed_step = '4';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();
            }

            $f3->set('currentStep', $user->getCurrentStep());
            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('content', 'dashboard/section.quiz.htm');
        }
        );

        $rules['4.0 >= S <= 4.8 from step controller'] = $rb->create(
                // rule for viewing the step
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb->logicalOr(
                                // match when doing the step
                                $rb['urlpattern']->equalTo("/step/@step"),
                                // match when doing substep
                                $rb['urlpattern']->equalTo("/step/@step/@substep"),
                                // match even when in readonly mode, just to review desired substep
                                $rb['urlpattern']->equalTo("/step/readonly/@step/@substep")
                        ), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 2.0 or on it
                                        $rb['step']->equalTo(4), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 2.8
                                        $rb['step']->equalTo(4), $rb['substep']->lessThanOrEqualTo(8)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //$f3->get('logger')->write("Fired rule: 4.0 >= S <= 4.8 from step controller");
            // Stage 1 not showing the two new widgets yet
            $subStep = $f3->get('PARAMS.substep') ? $f3->get('PARAMS.substep') : $user->getCurrentSubStep();
            $step = $f3->get('PARAMS.step') ? $f3->get('PARAMS.step') : $user->getCurrentStep();

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            $self->setCalendarWidget();

            $self->setActivityListWidget();

            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('currentStep', "$step-{$subStep}");
            $f3->set('user_id', $user->id);
            $f3->set('step', $step);
            $f3->set('content', "dashboard/steps/step.$step.htm");
        }
        );

        //////////////////////// STEP 5 RULES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

        $rules['5.0 >= S <= 5.8 from dashboard controller'] = $rb->create(
                // rule for viewing the dashboard
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb['urlpattern']->equalTo("/"), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 1.0 or on it
                                        $rb['step']->equalTo(5), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 1.8
                                        $rb['step']->equalTo(5), $rb['substep']->lessThanOrEqualTo(8)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //$f3->get('logger')->write("Fired rule: 5.0 >= S <= 5.5 from dashboard controller");

            $self->setPositiveExperienceWidget();

            $self->setNATRegistrationWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            $self->setActivityListWidget();

            $self->setCalendarWidget();

            $self->setDueQuiz();

            // move to step A and set last completed step to 5
            if ($user->treatment_step == '5.8' && $user->stepA == 1 && $user->stepa_status == 0) {
                $user->treatment_step = '6.0';
                $user->completed_step = '5';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();
            } else if ($user->treatment_step == '5.8' && $user->stepB == 1 && $user->stepb_status == 0) {// move to step B and set last completed step to 5
                $user->treatment_step = '7.0';
                $user->completed_step = '6';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();
            } else if ($user->treatment_step == '5.8' && $user->step6 == 1 && $user->step6_status == 0) { // move to step A and set last completed step to 5
                $user->treatment_step = '8.0';
                $user->completed_step = '7';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();
            } else if ($user->treatment_step == '5.8') {
                $user->treatment_step = '5.8';
                $user->completed_step = '5';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();
            }

            $f3->set('currentStep', $user->getCurrentStep());
            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('content', 'dashboard/section.quiz.htm');
        }
        );

        $rules['5.0 >= S <= 5.8 from step controller'] = $rb->create(
                // rule for viewing the step
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb->logicalOr(
                                // match when doing the step
                                $rb['urlpattern']->equalTo("/step/@step"),
                                // match when doing substep
                                $rb['urlpattern']->equalTo("/step/@step/@substep"),
                                // match even when in readonly mode, just to review desired substep
                                $rb['urlpattern']->equalTo("/step/readonly/@step/@substep")
                        ), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 5.0 or on it
                                        $rb['step']->equalTo(5), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 5.8
                                        $rb['step']->equalTo(5), $rb['substep']->lessThanOrEqualTo(8)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //$f3->get('logger')->write("Fired rule: 5.0 >= S <= 5.8 from step controller");
            // Stage 1 not showing the two new widgets yet
            $subStep = $f3->get('PARAMS.substep') ? $f3->get('PARAMS.substep') : $user->getCurrentSubStep();
            $step = $f3->get('PARAMS.step') ? $f3->get('PARAMS.step') : $user->getCurrentStep();

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            $self->setNATRegistrationWidget();

            $self->setActivityListWidget();

            $self->setCalendarWidget();

            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('currentStep', "$step-{$subStep}");
            $f3->set('user_id', $user->id);
            $f3->set('step', $step);
            $f3->set('content', "dashboard/steps/step.$step.htm");
        }
        );

        //////////////////////// STEP 6 RULES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

        $rules['6.0 >= S <= 6.15 from dashboard controller'] = $rb->create(
                // rule for viewing the dashboard
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb['urlpattern']->equalTo("/"), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 1.0 or on it
                                        $rb['step']->equalTo(6), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 1.8
                                        $rb['step']->equalTo(6), $rb['substep']->lessThanOrEqualTo(15)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //$f3->get('logger')->write("Fired rule: 6.0 >= S <= 6.15 from dashboard controller");

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            $self->setNATRegistrationWidget();

            $self->setActivityListWidget();

            if ($user->stepa_status == 1) {
                $self->setLevereglerWidget();
            }

            if ($user->stepb_status == 1) {
                $self->setDepressiveWidget();
            }

            if ($user->step6_status == 1) {
                $self->setForebyggelsesplanWidget();
            }

            $self->setCalendarWidget();

            $self->setDueQuiz();

            $uid = $f3->get('SESSION.id');

            $status = 1;

            // move to step 7.0 and set last completed step to 6
            if ($user->treatment_step == '6.15' && $user->stepB == 2 && $user->stepb_status == 0) {
                $user->treatment_step = '7.0';
                $user->completed_step = '6';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();
                $f3->get('DB')->exec("update user set stepa_status=" . $status . " where id=" . $uid);
            } else if ($user->treatment_step == '6.15' && $user->step6 == 2 && $user->step6_status == 0) { // move to step A and set last completed step to 5
                $user->treatment_step = '8.0';
                $user->completed_step = '7';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();
                $f3->get('DB')->exec("update user set stepa_status=" . $status . " where id=" . $uid);
            } else if ($user->treatment_step == '6.15' && $user->stepB == 3 && $user->stepb_status == 0) {
                $user->treatment_step = '7.0';
                $user->completed_step = '6';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();
                $f3->get('DB')->exec("update user set stepa_status=" . $status . " where id=" . $uid);
            } else if ($user->treatment_step == '6.15' && $user->step6 == 3 && $user->step6_status == 0) { // move to step A and set last completed step to 5
                $user->treatment_step = '8.0';
                $user->completed_step = '7';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();
                $f3->get('DB')->exec("update user set stepa_status=" . $status . " where id=" . $uid);
            } else if ($user->treatment_step == '6.15') {
                $user->treatment_step = '6.15';
                $user->completed_step = '6';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();
                $f3->get('DB')->exec("update user set stepa_status=" . $status . " where id=" . $uid);
            }

            $f3->set('currentStep', $user->getCurrentStep());
            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('content', 'dashboard/section.quiz.htm');
        }
        );

        $rules['6.0 >= S <= 6.15 from step controller'] = $rb->create(
                // rule for viewing the step
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb->logicalOr(
                                // match when doing the step
                                $rb['urlpattern']->equalTo("/step/@step"),
                                // match when doing substep
                                $rb['urlpattern']->equalTo("/step/@step/@substep"),
                                // match even when in readonly mode, just to review desired substep
                                $rb['urlpattern']->equalTo("/step/readonly/@step/@substep")
                        ), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 2.0 or on it
                                        $rb['step']->equalTo(6), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 2.8
                                        $rb['step']->equalTo(6), $rb['substep']->lessThanOrEqualTo(15)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //$f3->get('logger')->write("Fired rule: 6.0 >= S <= 6.13 from step controller");
            // Stage 1 not showing the two new widgets yet
            $subStep = $f3->get('PARAMS.substep') ? $f3->get('PARAMS.substep') : $user->getCurrentSubStep();
            $step = $f3->get('PARAMS.step') ? $f3->get('PARAMS.step') : $user->getCurrentStep();

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            $self->setNATRegistrationWidget();

            $self->setActivityListWidget();

            $self->setCalendarWidget();

            if ($user->stepa_status == 1) {
                $self->setLevereglerWidget();
            }

            if ($user->stepb_status == 1) {
                $self->setDepressiveWidget();
            }

            if ($user->step6_status == 1) {
                $self->setForebyggelsesplanWidget();
            }

            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('currentStep', "$step-{$subStep}");
            $f3->set('user_id', $user->id);
            $f3->set('step', $step);
            $f3->set('content', "dashboard/steps/step.$step.htm");
        }
        );

        //////////////////////// STEP 7 RULES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

        $rules['7.0 >= S <= 7.30 from dashboard controller'] = $rb->create(
                // rule for viewing the dashboard
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb['urlpattern']->equalTo("/"), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 1.0 or on it
                                        $rb['step']->equalTo(7), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 1.8
                                        $rb['step']->equalTo(7), $rb['substep']->lessThanOrEqualTo(30)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //$f3->get('logger')->write("Fired rule: 7.0 >= S <= 7.30 from dashboard controller");

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            if ($user->stepa_status == 1) {
                $self->setLevereglerWidget();
            }

            if ($user->stepb_status == 1) {
                $self->setDepressiveWidget();
            }

            if ($user->step6_status == 1) {
                $self->setForebyggelsesplanWidget();
            }

            $self->setNATRegistrationWidget();

            $self->setActivityListWidget();

            $self->setCalendarWidget();

            $self->setDueQuiz();

            $uid = $f3->get('SESSION.id');

            $status = 1;

            // move to step 7.0 and set last completed step to 6
            if ($user->treatment_step == '7.30' && $user->stepA == 2 && $user->stepa_status == 0) {
                $user->treatment_step = '6.0';
                $user->completed_step = '5';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();

                $f3->get('DB')->exec("update user set stepb_status=" . $status . " where id=" . $uid);
            } else if ($user->treatment_step == '7.30' && $user->step6 == 2 && $user->step6_status == 0) { // move to step A and set last completed step to 5
                $user->treatment_step = '8.0';
                $user->completed_step = '7';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();

                $f3->get('DB')->exec("update user set stepb_status=" . $status . " where id=" . $uid);
            } else if ($user->treatment_step == '7.30' && $user->stepA == 3 && $user->stepa_status == 0) {
                $user->treatment_step = '6.0';
                $user->completed_step = '5';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();
                $f3->get('DB')->exec("update user set stepb_status=" . $status . " where id=" . $uid);
            } else if ($user->treatment_step == '7.30' && $user->step6 == 3 && $user->step6_status == 0) { // move to step A and set last completed step to 5
                $user->treatment_step = '8.0';
                $user->completed_step = '7';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();

                $f3->get('DB')->exec("update user set stepb_status=" . $status . " where id=" . $uid);
            } else if ($user->treatment_step == '7.30') {
                $user->treatment_step = '7.30';
                $user->completed_step = '7';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();

                $f3->get('DB')->exec("update user set stepb_status=" . $status . " where id=" . $uid);
            }

            $f3->set('currentStep', $user->getCurrentStep());
            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('content', 'dashboard/section.quiz.htm');
        }
        );

        $rules['7.0 >= S <= 7.30 from step controller'] = $rb->create(
                // rule for viewing the step
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb->logicalOr(
                                // match when doing the step
                                $rb['urlpattern']->equalTo("/step/@step"),
                                // match when doing substep
                                $rb['urlpattern']->equalTo("/step/@step/@substep"),
                                // match even when in readonly mode, just to review desired substep
                                $rb['urlpattern']->equalTo("/step/readonly/@step/@substep")
                        ), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 2.0 or on it
                                        $rb['step']->equalTo(7), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 2.8
                                        $rb['step']->equalTo(7), $rb['substep']->lessThanOrEqualTo(30)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //$f3->get('logger')->write("Fired rule: 6.0 >= S <= 6.13 from step controller");
            // Stage 1 not showing the two new widgets yet
            $subStep = $f3->get('PARAMS.substep') ? $f3->get('PARAMS.substep') : $user->getCurrentSubStep();
            $step = $f3->get('PARAMS.step') ? $f3->get('PARAMS.step') : $user->getCurrentStep();

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            $self->setNATRegistrationWidget();

            if ($user->stepa_status == 1) {
                $self->setLevereglerWidget();
            }

            if ($user->stepb_status == 1) {
                $self->setDepressiveWidget();
            }

            if ($user->step6_status == 1) {
                $self->setForebyggelsesplanWidget();
            }

            $self->setActivityListWidget();

            $self->setCalendarWidget();

            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('currentStep', "$step-{$subStep}");
            $f3->set('user_id', $user->id);
            $f3->set('step', $step);
            $f3->set('content', "dashboard/steps/step.$step.htm");
        }
        );

        //////////////////////// STEP 7 RULES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\       

        $rules['8.0 >= S <= 8.14 from dashboard controller'] = $rb->create(
                // rule for viewing the dashboard
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb['urlpattern']->equalTo("/"), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 1.0 or on it
                                        $rb['step']->equalTo(8), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 1.8
                                        $rb['step']->equalTo(8), $rb['substep']->lessThanOrEqualTo(14)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //$f3->get('logger')->write("Fired rule: 8.0 >= S <= 8.14 from dashboard controller");

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            if ($user->stepa_status == 1) {
                $self->setLevereglerWidget();
            }
            /*
              if($user->stepb_status==1){
              $self->setDepressiveWidget();
              }
             * 
             */

            if ($user->step6_status == 1) {
                $self->setForebyggelsesplanWidget();
            }

            $self->setNATRegistrationWidget();

            $self->setActivityListWidget();

            $self->setCalendarWidget();

            $self->setDueQuiz();

            // move to step 8.0 and set last completed step to 7
            $uid = $f3->get('SESSION.id');
            $status = 1;

            if ($user->treatment_step == '8.14' && $user->stepA == 2 && $user->stepa_status == 0) {
                $user->treatment_step = '6.0';
                $user->completed_step = '5';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();

                $f3->get('DB')->exec("update user set step6_status=" . $status . " where id=" . $uid);
            } else if ($user->treatment_step == '8.14' && $user->stepB == 2 && $user->stepb_status == 0) { // move to step A and set last completed step to 5
                $user->treatment_step = '7.0';
                $user->completed_step = '6';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();

                $f3->get('DB')->exec("update user set step6_status=" . $status . " where id=" . $uid);
            } else if ($user->treatment_step == '8.14' && $user->stepA == 3 && $user->stepa_status == 0) {
                $user->treatment_step = '6.0';
                $user->completed_step = '5';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();

                $f3->get('DB')->exec("update user set step6_status=" . $status . " where id=" . $uid);
            } else if ($user->treatment_step == '8.14' && $user->stepB == 3 && $user->stepb_status == 0) { // move to step A and set last completed step to 5
                $user->treatment_step = '7.0';
                $user->completed_step = '6';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();

                $f3->get('DB')->exec("update user set step6_status=" . $status . " where id=" . $uid);
            } else if ($user->treatment_step == '8.14') {
                $user->treatment_step = '8.14';
                $user->completed_step = '8';
                $user->completed_step_date = date('Y-m-d H:i:s', time());
                $user->save();

                $f3->get('DB')->exec("update user set step6_status=" . $status . " where id=" . $uid);
            }

            $f3->set('currentStep', $user->getCurrentStep());
            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('content', 'dashboard/section.quiz.htm');
        }
        );

        $rules['8.0 >= S <= 8.14 from step controller'] = $rb->create(
                // rule for viewing the step
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb->logicalOr(
                                // match when doing the step
                                $rb['urlpattern']->equalTo("/step/@step"),
                                // match when doing substep
                                $rb['urlpattern']->equalTo("/step/@step/@substep"),
                                // match even when in readonly mode, just to review desired substep
                                $rb['urlpattern']->equalTo("/step/readonly/@step/@substep")
                        ), $rb->logicalAnd(
                                $rb->logicalAnd(
                                        // are we above step 2.0 or on it
                                        $rb['step']->equalTo(8), $rb['substep']->greaterThanOrEqualTo(0)
                                ), $rb->logicalAnd(
                                        // are we under step 2.8
                                        $rb['step']->equalTo(8), $rb['substep']->lessThanOrEqualTo(14)
                                )
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //$f3->get('logger')->write("Fired rule: 6.0 >= S <= 6.13 from step controller");
            // Stage 1 not showing the two new widgets yet
            $subStep = $f3->get('PARAMS.substep') ? $f3->get('PARAMS.substep') : $user->getCurrentSubStep();
            $step = $f3->get('PARAMS.step') ? $f3->get('PARAMS.step') : $user->getCurrentStep();

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            $self->setNATRegistrationWidget();

            $self->setActivityListWidget();

            $self->setCalendarWidget();

            $self->setDepressiveWidget();

            if ($user->stepa_status == 1) {
                $self->setLevereglerWidget();
            }

            if ($user->stepb_status == 1) {
                $self->setDepressiveWidget();
            }

            if ($user->step6_status == 1) {
                $self->setForebyggelsesplanWidget();
            }

            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('currentStep', "$step-{$subStep}");
            $f3->set('user_id', $user->id);
            $f3->set('step', $step);
            $f3->set('content', "dashboard/steps/step.$step.htm");
        }
        );

        $subStep = $f3->get('PARAMS.substep') ? $f3->get('PARAMS.substep') : $user->getCurrentSubStep();


        $rules[$subStep == 0] = $rb->create(
                // rule for viewing the step
                $rb->logicalAnd(
                        $rb['patients']->contains($rb['user']['group_id']), $rb->logicalOr(
                                // match when doing the step
                                $rb['urlpattern']->equalTo("/step/@step"),
                                // match when doing substep
                                $rb['urlpattern']->equalTo("/step/@step/@substep"),
                                // match even when in readonly mode, just to review desired substep
                                $rb['urlpattern']->equalTo("/step/readonly/@step/@substep")
                        )
                ), function () use ($self, $f3, $user, $rb) {
            //$f3->get('logger')->write("Fired rule: 6.0 >= S <= 6.13 from step controller");
            // Stage 1 not showing the two new widgets yet
            $subStep = $f3->get('PARAMS.substep') ? $f3->get('PARAMS.substep') : $user->getCurrentSubStep();
            $step = $f3->get('PARAMS.step') ? $f3->get('PARAMS.step') : $user->getCurrentStep();

            $self->setPositiveExperienceWidget();

            $self->setProblemGoalWidget();

            $self->setWeekProgressWidget();

            $self->setTreatmentOverviewWidget();

            $self->setPsychiatricHelpWidget();

            $self->setNATRegistrationWidget();

            $self->setActivityListWidget();

            $self->setCalendarWidget();

            $self->setDepressiveWidget();

            if ($user->stepa_status == 1) {
                $self->setLevereglerWidget();
            }

            if ($user->stepb_status == 1) {
                $self->setDepressiveWidget();
            }

            if ($user->step6_status == 1) {
                $self->setForebyggelsesplanWidget();
            }

            $f3->set('is_first_login', $f3->get('SESSION.is_first_login'));
            $f3->set('currentStep', "$step-{$subStep}");
            $f3->set('user_id', $user->id);
            $f3->set('step', $step);
            $f3->set('content', "dashboard/steps/step.$step.htm");
        }
        );



        /////////////////////// GENERAL RULES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
        // this rule is for the case the experimental user has finished the big quiz,
        // this means he/she is in step >= 1.0 and haves elapsed 7 days since finished
        // the big quiz.                

        $rules['experimental-patient-needs-lite-quiz'] = $rb->create(
                $rb->logicalAnd(
                        // is experimental user
                        $rb['user']['group_id']->equalTo(2),
                        // are we above step 0.4: finished the big quiz
                        $rb->logicalAnd(
                                // are we above step 1.X, 2.X, ..., etc.. or we are on it
                                $rb['step']->greaterThan(0), $rb['substep']->greaterThanOrEqualTo(0)
                        ),
                        // big quiz was the last completed
                        //$rb['last_quiz_type']->equalTo(1),
                        // quiz was completed 7 days ago
                        $rb['days_since_last_completed_quiz']->greaterThanOrEqualTo(7)
                ), function () use ($self, $f3, $user) {
            $f3->set('currentStep', $user->getCurrentStep());
        }
        );

        $rules['control-patient-needs-lite-quiz'] = $rb->create(
                $rb->logicalAnd(
                        // is experimental user
                        $rb['user']['group_id']->equalTo(1),
                        // are we above step 0.4: finished the big quiz
                        $rb->logicalAnd(
                                // are we above step 1.X, 2.X, ..., etc.. or we are on it
                                $rb['step']->greaterThan(0), $rb['substep']->greaterThanOrEqualTo(0)
                        ),
                        // big quiz was the last completed
                        //$rb['last_quiz_type']->equalTo(1),
                        // quiz was completed 7 days ago
                        $rb['days_since_last_completed_quiz']->greaterThanOrEqualTo(7)
                ), function () use ($self, $f3, $user) {
            $f3->set('currentStep', $user->getCurrentStep());
        }
        );

        if ($user->treatment_step == '8.13') {
            $rules['experimental-patient-needs-sixth-quiz'] = $rb->create(
                    $rb->logicalAnd(
                            // is experimental user
                            $rb['user']['group_id']->equalTo(2),
                            // are we above step 0.4: finished the big quiz
                            $rb->logicalAnd(
                                    // are we above step 1.X, 2.X, ..., etc.. or we are on it
                                    $rb['step']->greaterThan(0), $rb['substep']->greaterThanOrEqualTo(0)
                            ),
                            // big quiz was the last completed
                            $rb['last_quiz_type']->equalTo(1),
                            // quiz was completed 7 days ago
                            $rb['days_since_last_completed_quiz']->greaterThanOrEqualTo(7)
                    ), function () use ($self, $f3, $user) {
                //$f3->get('logger')->write("Fired rule: experimental-patient-needs-lite-quiz");
                // lets create the lite quiz instance if not created already
                $quiz = new Quiz($f3->get('DB'));
                if (($due = $user->getDueQuiz()) && $due->questionnaire_id == 6) {
                    // check if it is a lite quiz already created and do nothing
                    // pass
                } else {
                    //$due = $quiz->createSixthQuestionaireForUser($user);
                }

                $f3->set('currentStep', $user->getCurrentStep());
                // lets show where he/she left over, if started
                $f3->set('quiz_step', '/' . $due['id'] . '/' . $due['questionnaire_id'] . '/' . $due['current_step']);
            }
            );

            $rules['control-patient-needs-sixth-quiz'] = $rb->create(
                    $rb->logicalAnd(
                            // is experimental user
                            $rb['user']['group_id']->equalTo(1),
                            // are we above step 0.4: finished the big quiz
                            $rb->logicalAnd(
                                    // are we above step 1.X, 2.X, ..., etc.. or we are on it
                                    $rb['step']->greaterThan(0), $rb['substep']->greaterThanOrEqualTo(0)
                            ),
                            // big quiz was the last completed
                            $rb['last_quiz_type']->equalTo(1),
                            // quiz was completed 7 days ago
                            $rb['days_since_last_completed_quiz']->greaterThanOrEqualTo(7)
                    ), function () use ($self, $f3, $user) {
                //$f3->get('logger')->write("Fired rule: experimental-patient-needs-lite-quiz");
                // lets create the lite quiz instance if not created already
                $quiz = new Quiz($f3->get('DB'));
                if (($due = $user->getDueQuiz()) && $due->questionnaire_id == 6) {
                    // check if it is a lite quiz already created and do nothing
                    // pass
                } else {
                    //$due = $quiz->createSixthQuestionaireForUser($user);
                }

                $f3->set('currentStep', $user->getCurrentStep());
                // lets show where he/she left over, if started
                $f3->set('quiz_step', '/' . $due['id'] . '/' . $due['questionnaire_id'] . '/' . $due['current_step']);
            }
            );
        }
        
        
         if (($user->weeksAfterTreatment($f3->get('SESSION.id')) >=12) && ($user->get_last_step($f3->get('SESSION.id'))==(1 || 2 || 3 || 5))) {
            $rules['experimental-patient-needs-sixth-quiz'] = $rb->create(
                    $rb->logicalAnd(
                            // is experimental user
                            $rb['user']['group_id']->equalTo(2),
                            // are we above step 0.4: finished the big quiz
                            $rb->logicalAnd(
                                    // are we above step 1.X, 2.X, ..., etc.. or we are on it
                                    $rb['step']->greaterThan(0), $rb['substep']->greaterThanOrEqualTo(0)
                            ),
                            // big quiz was the last completed
                            $rb['last_quiz_type']->equalTo(1),
                            // quiz was completed 7 days ago
                            $rb['days_since_last_completed_quiz']->greaterThanOrEqualTo(7)
                    ), function () use ($self, $f3, $user) {
                //$f3->get('logger')->write("Fired rule: experimental-patient-needs-lite-quiz");
                // lets create the lite quiz instance if not created already
                $quiz = new Quiz($f3->get('DB'));
                if (($due = $user->getDueQuiz()) && $due->questionnaire_id == 6) {
                    // check if it is a lite quiz already created and do nothing
                    // pass
                } else {
                    //$due = $quiz->createSixthQuestionaireForUser($user);
                }

                $f3->set('currentStep', $user->getCurrentStep());
                // lets show where he/she left over, if started
                $f3->set('quiz_step', '/' . $due['id'] . '/' . $due['questionnaire_id'] . '/' . $due['current_step']);
            }
            );

            $rules['control-patient-needs-sixth-quiz'] = $rb->create(
                    $rb->logicalAnd(
                            // is experimental user
                            $rb['user']['group_id']->equalTo(1),
                            // are we above step 0.4: finished the big quiz
                            $rb->logicalAnd(
                                    // are we above step 1.X, 2.X, ..., etc.. or we are on it
                                    $rb['step']->greaterThan(0), $rb['substep']->greaterThanOrEqualTo(0)
                            ),
                            // big quiz was the last completed
                            $rb['last_quiz_type']->equalTo(1),
                            // quiz was completed 7 days ago
                            $rb['days_since_last_completed_quiz']->greaterThanOrEqualTo(7)
                    ), function () use ($self, $f3, $user) {
                //$f3->get('logger')->write("Fired rule: experimental-patient-needs-lite-quiz");
                // lets create the lite quiz instance if not created already
                $quiz = new Quiz($f3->get('DB'));
                if (($due = $user->getDueQuiz()) && $due->questionnaire_id == 6) {
                    // check if it is a lite quiz already created and do nothing
                    // pass
                } else {
                    //$due = $quiz->createSixthQuestionaireForUser($user);
                }

                $f3->set('currentStep', $user->getCurrentStep());
                // lets show where he/she left over, if started
                $f3->set('quiz_step', '/' . $due['id'] . '/' . $due['questionnaire_id'] . '/' . $due['current_step']);
            }
            );
        }

        /* if($user->treatment_step == '1.0' && $user->isControlGroup()) { 
          $rules['control-patient-needs-lite-quiz'] = $rb->create(
          $rb->logicalAnd(
          // is control user
          $rb['user']['group_id']->equalTo(1),
          // are we above step 0.4: finished the big quiz
          $rb->logicalAnd(
          // are we above step 1.X, 2.X, ..., etc.. or we are on it
          $rb['step']->greaterThan(0),
          $rb['substep']->greaterThanOrEqualTo(0)
          ),
          // big quiz was the last completed
          $rb['last_quiz_type']->equalTo(1),
          // quiz was completed 7 days ago
          $rb['days_since_last_completed_quiz']->greaterThanOrEqualTo(7)
          ),
          function () use ($self, $f3, $user) {
          //$f3->get('logger')->write("Fired rule: experimental-patient-needs-lite-quiz");
          // lets create the lite quiz instance if not created already
          $quiz = new Quiz($f3->get('DB'));
          if (($due = $user->getDueQuiz()) && $due->questionnaire_id == 2) {
          // check if it is a lite quiz already created and do nothing
          // pass
          } else {
          $due = $quiz->createLiteQuestionnaireForUser($user);
          }

          $f3->set('currentStep', $user->getCurrentStep());
          // lets show where he/she left over, if started
          $f3->set('quiz_step', '/' . $due['id'] . '/' . $due['questionnaire_id'] . '/' . $due['current_step']);
          }
          );
          } */

        // this rule is for the case the user is a control patient and has finished
        // the step X 10 weeks ago, in this case he should be moved to step 0 and sent
        // to dashboard.
        $rules['control-patient-start-step-0'] = $rb->create(
                $rb->logicalAnd(
                        // is control user
                        $rb['user']['group_id']->equalTo(1),
                        // the following two are related, last_completed_step
                        // and weeks since completed
                        $rb['user']['completed_step']->equalTo('X'), $rb['weeks_since_last_completed_step']->greaterThanOrEqualTo(10)
                ), function () use ($f3, $user) {

            //$f3->get('logger')->write("Fired rule: 'control-patient-start-step-0'");
            $user->treatment_step = '0';
            $user->completed_step = '10weeks';
            $user->completed_step_date = date('Y-m-d H:i', time());
            $user->save();

            // lets fire the beginning of the step
            $f3->reroute('/');
        }
        );

        // this is the opposite to the rule above, if control user tries to login before
        // the 10 weeks has elapsed, he wont be able to do it.
        $rules['control-patient-can-not-start-step-0'] = $rb->create(
                $rb->logicalAnd(
                        // is control user
                        $rb['user']['group_id']->equalTo(1),
                        // the following two are related, last_completed_step
                        // and weeks since completed
                        $rb['user']['completed_step']->equalTo('X'), $rb['weeks_since_last_completed_step']->lessThan(10)
                ), function () use ($self, $f3, $user) {
            //$f3->get('logger')->write("Fired rule: control-patient-can-not-start-step-0");
            //send email
            //$self->sendEmail($user->email,
            //    $user->name,
            //    "You can not login until 10 weeks has elapsed.",
            //    "mail/control_user_stepx.htm"
            //);
            // log out user
            $f3->reroute('/logout');
        }
        );

        // doctors get redirected always to dashboard
        $rules['doctor'] = $rb->create(
                $rb['doctors']->contains($rb['user']['group_id']), function () use ($f3) {
            $f3->reroute('/section/settings.profile');
        }
        );

        // admins get redirected always to backend
        $rules['admin'] = $rb->create(
                $rb['admins']->contains($rb['user']['group_id']), function () use ($f3) {
            $f3->reroute('/user');
        }
        );

        $rs = new RuleSet($rules);

        return $rs;
    }

    function beforeRoute($f3) {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }

}
