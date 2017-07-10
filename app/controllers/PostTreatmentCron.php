<?php

namespace controllers;

use DB\SQL\Mapper;
use models\Group;
use models\Note;
use models\Quiz;
use models\Response;
use models\User;
use models\Question;

class PostTreatmentCron {

    function daily($f3) {

        $user = new User($f3->get('DB'));
        $quiz = new Quiz($f3->get('DB'));
        $users = $user->allPatients();
        $current_date = date('Y-m-d H:i:s');
        foreach ($users as $value) {

            $last_step = $value->get_last_step($value->get('id'));
            $weeks_after_treatment = $value->weeksAfterTreatment();
            $weeks_after_registration = $value->weeksAfterRegistration();
            $last_quiz_completion_date = $value->get_last_quiz_completion_date($value->id, 1);
            //echo $last_quiz_completion_date;
            $inter = $value->interval($current_date, $last_quiz_completion_date);
            //if ($value->id == 528) {
            if (($weeks_after_treatment >= 12) && ($weeks_after_treatment != 2386)) {
                if ((($last_step == 1) && ($value->completed_step == 6) && ($value->treatment_step == 6.15))
                        || (($last_step == 2) && ($value->completed_step == 7) && ($value->treatment_step == 7.30))
                        || (($last_step == 3) && ($value->completed_step == 8) && ($value->treatment_step == 8.14))
                        || (($last_step == 5) && (($value->completed_step == 5.5) || ($value->completed_step == 5.8) ) && ($value->treatment_step == 8.14))
                        ) {
                    echo 'userid: ' . $value->get('id') . 'weeks after treatment: ' . $weeks_after_treatment . 'weeks after registration' . $weeks_after_registration;
                    echo "<br/>";
                    $subject = 'Efter 90 dage efter behandling spørgeskema';
                    $message = \Template::instance()->render('mail/post_treatment_90.html');

                    if (!$value->get('post_treatment_mail')) {
                        $headers = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                        // Additional headers
                        $headers .= 'From: NoDep <ajay.kesharwani@atdrive.com>' . "\r\n";
                        $to = $value->get('email');

                        // Mail it
                        mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
                        $value->setPostTreamentMail($value->get('id'));
                    }
                    echo 'days after last quiz : ' . $inter;
                    if (($inter >= 84) && ($inter != 16707)) {
                        if (!is_null($value->get('owner_id'))) {
                            $due = $value->getDueQuiz();
                            $quiz->deleteLiteSixthQuestionnaireForUser($value->get('id'));

                            if ($due['questionnaire_id'] == 1) {
                                //$f3->set('quiz_step', '/' . $due['id'] . '/' . $due['questionnaire_id'] . '/' . $due['current_step']);
                            } else {
                                $quiz->createBigQuestionnaireForUser($value);
                            }
                        }
                    }
                    // }
                }
            }

            //echo 'days after last quiz: ' . $inter;
            if ($weeks_after_registration >= 22) {
                if (($inter >= 70) && ($inter != 16707)) {
                    if (!is_null($value->get('owner_id'))) {
                        $due = $value->getDueQuiz(); 
                        //echo 'due questionnaire:' . $due['questionnaire_id'];
                        if ($due['questionnaire_id'] == 1) {
                            //$f3->set('quiz_step', '/' . $due['id'] . '/' . $due['questionnaire_id'] . '/' . $due['current_step']);
                        } else {
                            $quiz->createBigQuestionnaireForUser($value);
                        }
                    }
                }
            }

            if ($weeks_after_registration >= 24) {
                $value->disableUserById($value->get('id'));
            }
            // }
        }
    }

}

?>