<?php

namespace controllers;


class WidgetPsychiatricHelpController
{
    function index($f3)
    {
        echo \Template::instance()->render('dashboard/windows/window.psychiatrichelp.htm');
    }

    function beforeRoute($f3)
    {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }
}
