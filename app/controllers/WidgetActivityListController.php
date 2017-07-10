<?php

namespace controllers;

use DB\SQL\Mapper;

/**
 * Class WidgetActivityListController
 *
 * Activities can appear in Activity List widget and in Calendar Widget. When in calendar
 * we kept two values representing an scale of how demanding or pleasurable have been this
 * activities.
 *
 * @package controllers
 */
class WidgetActivityListController {

    function index($f3) {

        $user = $f3->get('SESSION.id');
        $al = new Mapper($f3->get('DB'), 'widget_activity_list');

        // pleasurable activities
        $f3->set('activities_left', $al->find(
                        array('user=? AND ubication=?', $user, 'left'), array('order' => 'sort_order ASC')
        ));
        // demanding activities
        $f3->set('activities_right', $al->find(
                        array('user=? AND ubication=?', $user, 'right'), array('order' => 'sort_order ASC')
        ));

        echo \Template::instance()->render('dashboard/windows/window.activity-list.htm');
    }

    function create($f3) {
        $post = $f3->get('POST');
        $f3->scrub($post);

        $user = $f3->get('SESSION.id');
        $date_modified = date('Y-m-d H:i:s');
        $activity = $post['activity'];
        $ubication = $post['ubication'];

        $al = new Mapper($f3->get('DB'), 'widget_activity_list');
        $al->user = $user;
        $al->activity = $activity;
        $al->ubication = $ubication;
        $al->date_modified = $date_modified;

        if ($al = $al->insert()) {
            echo json_encode(array('status' => 'success', 'id' => $al->id));
            exit;
        }

        echo json_encode(array('status' => 'error'));
    }

    function update($f3) {
        $post = $f3->get('POST');
        $f3->scrub($post);

        $user = $f3->get('SESSION.id');
        $date_modified = date('Y-m-d H:i:s');
        $id = $post['id'];

        $al = new Mapper($f3->get('DB'), 'widget_activity_list');
        $al->findone(array('user=? AND id=?', $user, $id));
        $al->copyFrom('POST');
        $al->user = $user;
        $al->date_modified = $date_modified;

        if ($al = $al->save()) {
            echo json_encode(array('status' => 'success', 'id' => $al->id));
            exit;
        }

        echo json_encode(array('status' => 'error'));
    }

    function remove($f3) {
        $post = $f3->get('POST');
        $f3->scrub($post);

        $id = $post['id'];
        $al = new Mapper($f3->get('DB'), 'widget_activity_list');
        if ($al->erase(array('id=?', $id))) {
            echo json_encode(array('status' => 'success'));
            exit;
        }

        echo json_encode(array('status' => 'error'));
    }

    function sort($f3) {
        $post = $f3->get('POST');
        $f3->scrub($post);

        $sort = explode(',', $post['sort']);

        $db = $f3->get('DB');
        foreach ($sort as $order => $id) {
            $db->exec("UPDATE widget_activity_list SET sort_order = :o WHERE id = :id", array(":o" => $order + 1, ":id" => (int) $id));
        }

        echo json_encode(array('status' => 'success'));
    }

    function beforeRoute($f3) {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }

    function leftload($f3) {

        $user = $f3->get('SESSION.id');


        $activities = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where ubication="left" and user=' . $user);

        $lload = '';

        foreach ($activities as $key => $data) {

            if (!$data['sort_order']) {
                $data['sort_order'] = $data['id'];
            }

            $lload = $lload . '<div id="' . $data['id'] . '"  data-sort="' . $data['sort_order'] . '"  class="Activity">
                                <div class="ActivityContent">
                                    ' . $data['activity'] . '
                                    <a href="javascript:void(0)" class="removeActivity" onclick="closeicon(' . $data['id'] . ')"></a>
                                </div>
                            </div>';
        }
        echo $lload;
        exit;
    }

    function rightload($f3) {

        $user = $f3->get('SESSION.id');

        $activities = $f3->get('DB')->exec('SELECT * FROM widget_activity_list where user=' . $user . ' and ubication="right"');

        $lload = '';

        foreach ($activities as $key => $data) {

            if (!$data['sort_order']) {
                $data['sort_order'] = $data['id'];
            }

            $lload = $lload . '<div id="' . $data['id'] . '" data-sort="' . $data['sort_order'] . '" class="Activity">
                                <div class="ActivityContent">
                                    ' . $data['activity'] . '
                                    <a href="javascript:void(0)" class="removeActivity" onclick="closeicon(' . $data['id'] . ')" ></a>
                                </div>
                            </div>';
        }
        echo $lload;
        exit;
    }

}
