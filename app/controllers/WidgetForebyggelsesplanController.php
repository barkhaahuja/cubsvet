<?php

namespace controllers;

use DB\SQL\Mapper;


class WidgetForebyggelsesplanController
{

    function index($f3)
    {
        $user = $f3->get('SESSION.id');
        $al = new Mapper($f3->get('DB'), 'widget_activity_list');

        // pleasurable activities
        $f3->set('activities_left',$al->find(
            array('user=? AND ubication=?',$user,'left'),
            array('order'=>'sort_order ASC')
        ));
        // demanding activities
        $f3->set('activities_right',$al->find(
            array('user=? AND ubication=?',$user,'right'),
            array('order'=>'sort_order ASC')
        ));

        echo \Template::instance()->render('dashboard/windows/window.forebyggelsesplan.htm');
        //echo \Template::instance()->render('dashboard/windows/window.forebyggelsesplan.htm');
    }

    function beforeRoute($f3)
    {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }
}
