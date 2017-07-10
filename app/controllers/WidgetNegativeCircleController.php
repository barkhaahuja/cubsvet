<?php

namespace controllers;

use DB\SQL\Mapper;

class WidgetNegativeCircleController
{

    function index($f3)
    {

        // Loader
        $user = $f3->get('SESSION.id');
        $nc = new Mapper($f3->get('DB'), 'widget_negativecircle');
        $f3->set('nc', $nc->find(array('user=?', $user)));
        // End Loader

        echo \Template::instance()->render('dashboard/windows/window.negative-circle.htm');
    }

    function save($f3)
    {
        $post = $f3->get('POST');
        $f3->scrub($post);

        $post['user'] = $f3->get('SESSION.id');
        $post['date_modified'] = date('Y-m-d H:i:s');

        $f3->set('DATA', $post);

        $nc = new Mapper($f3->get('DB'), 'widget_negativecircle');
        $nc->load(array('user=? AND step=?', $post['user'], $post['step']));
        $nc->copyFrom('DATA');
        $nc->save();

        echo json_encode(array('status' => 'success'));
    }

    function beforeRoute($f3)
    {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }

}
