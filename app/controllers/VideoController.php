<?php

namespace controllers;

use models\User;

class VideoController {

    function index($f3) {
        if (!($id = $f3->get('PARAMS.video'))) {
            throw new \InvalidArgumentException("Video identifier needed.");
        }

        $user = new User($f3->get('DB'));
        $user = $user->getById($f3->get('SESSION.id'));
        $quiz = $user->getDueQuiz();
        $f3->set('quiz', $quiz);

        // wired checking to state if control user enter in the time period
        // where he/she needs to wait 10 weeks before login in again.
        // if @video is 0.4.mp4 this should be set up also

        $f3->set('is_control_user', $user->group_id == 1 && $user->completed_step == '');
        $f3->set('user_id', $user->id);
        $f3->set('video', $id);   
        echo \Template::instance()->render('dashboard/windows/window.video.htm');
    }

    function beforeRoute($f3) {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }

}
