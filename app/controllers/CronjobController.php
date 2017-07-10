<?php

namespace controllers;

use DB\SQL\Mapper;
use models\User;
use models\Quiz;

class CronjobController {

    function first_notification_to_login($f3) {
        //$f3 = \Base::instance();
        $user = new User($f3->get('DB'));
        $userdetails = $f3->get('DB')->exec('SELECT email,create_date,id,name,password,phone,sms_notification FROM user where confirmed!=1');
        if ($userdetails) {
            foreach ($userdetails as $key => $data) {
                $created_date = new \DateTime($data['create_date']);
                $user_id = $data['id'];
                $firstname = $data['name'];
                $email = $data['email'];
                $password = $data['password'];

                $current_date = new \DateTime();
                $interval = $current_date->diff($created_date);
                $interval_count = $interval->format('%a');

                if ($interval_count >= 2 || $interval_count < 5) {
                    $f3->set('email', $email);
                    $f3->set('password', $password);
                    $body = \Template::instance()->render('cron/user_first_notification_treatment.htm');

                    //MAIL
                    $message = $body;
                    $to = $email;
                    $subject = "første meddelelse til login";

                    $this->sendCronjobMail($f3, $to, $subject, $message);

                    //SMS
                    /*$smsnotfdata = '';
                    $mssge = '';
                    $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='first_notification_to_login'");

                    if ($smsnotfdata) {
                        foreach ($smsnotfdata as $k => $data);
                        $mssge = $data['message'];
                    }

                    $mobno = $data['phone'];
                    $mobno = str_replace('+', '', $mobno);
                    $mobno = str_replace('-', '', $mobno);
                    $mobno = str_replace(' ', '', $mobno);
                    //$sms_notif = $data['sms_notification'];

                    if (isset($mssge) && isset($mobno)) {
                        if ($mssge && $mobno) {
                            $this->sendCronSMS($f3, $mssge, $mobno);
                        }
                    }*/
                }
            }
        }
    }

    function second_notification_to_login($f3) {
        //$f3 = \Base::instance();
        $user = new User($f3->get('DB'));
        $userdetails = $f3->get('DB')->exec('SELECT email,create_date,id,name,password,phone,sms_notification FROM user where confirmed!=1');
        if ($userdetails) {
            foreach ($userdetails as $key => $data) {
                $created_date = new \DateTime($data['create_date']);
                $user_id = $data['id'];
                $firstname = $data['name'];
                $email = $data['email'];
                $password = $data['password'];
                $current_date = new \DateTime();
                $interval = $current_date->diff($created_date);
                $interval_count = $interval->format('%a');
                if ($interval_count >= 5) {
                    $f3->set('email', $email);
                    $f3->set('password', $password);
                    $body = \Template::instance()->render('cron/user_second_notification_treatment.htm');

                    //MAIL
                    $message = $body;
                    $to = $email;
                    $subject = "anden meddelelse til login";

                    $this->sendCronjobMail($f3, $to, $subject, $message);

                    //SMS
                    /*$smsnotfdata = '';
                    $mssge = '';
                    $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='first_notification_to_login'");

                    if ($smsnotfdata) {
                        foreach ($smsnotfdata as $k => $data);
                        $mssge = $data['message'];
                    }

                    $mobno = $data['phone'];
                    $mobno = str_replace('+', '', $mobno);
                    $mobno = str_replace('-', '', $mobno);
                    $mobno = str_replace(' ', '', $mobno);
                    $sms_notif = $data['sms_notification'];

                    if (isset($mssge) && isset($mobno) && isset($sms_notif)) {
                        if ($mssge && $mobno && $sms_notif) {
                            $this->sendCronSMS($f3, $mssge, $mobno);
                        }
                    }*/
                }
            }
        }
    }

    //-- User has placed an activity in the calendar
    function user_activityin_calendar($f3) {
        //$f3 = \Base::instance();

        $start_dt = date('Y-m-d H:i:s', mktime(date("H") + 2, 0, 0, date("m"), date("d"), date("Y")));
        $end_dt = date('Y-m-d H:i:s', mktime(date("H") + 2, 59, 59, date("m"), date("d"), date("Y")));

        $useract_data = $f3->get('DB')->exec("SELECT date_start,user,activity FROM widget_activity_list WHERE date_start >= '" . $start_dt . "' AND date_start <= '" . $end_dt . "'");

        if ($useract_data) {
            foreach ($useract_data as $key => $data) {
                $user_id = $data['user'];
                $activity = $data['activity'];

                $f3->set('acttext', $activity);

                $userdetails = $f3->get('DB')->exec('SELECT email,name,phone,sms_notification FROM user WHERE id=' . $user_id);
                foreach ($userdetails as $ky => $udata) {
                    $email = $udata['email'];
                    $name = $udata['name'];

                    $f3->set('name', $name);

                    //MAIL
                    $body = \Template::instance()->render('cron/user_place_activity_calendar.htm');
                    $message = $body;
                    $to = $email;
                    $subject = "Kalender aktivitet placeret";

                    $this->sendCronjobMail($f3, $to, $subject, $message);

                    //SMS
                    /*$smsnotfdata = '';
                    $mssge = '';
                    $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='first_notification_to_login'");

                    if ($smsnotfdata) {
                        foreach ($smsnotfdata as $k => $data);
                        $mssge = $data['message'];
                    }

                    $mobno = $udata['phone'];
                    $mobno = str_replace('+', '', $mobno);
                    $mobno = str_replace('-', '', $mobno);
                    $mobno = str_replace(' ', '', $mobno);
                    $sms_notif = $udata['sms_notification'];

                    if (isset($mssge) && isset($mobno) && isset($sms_notif)) {
                        if ($mssge && $mobno && $sms_notif) {
                            $this->sendCronSMS($f3, $mssge, $mobno);
                        }
                    }*/
                }
            }
        }
    }

    //-- Seven days have passed since last time a message was sent to the psychologist
    function user_message_sent_check($f3) {
        //$f3 = \Base::instance();        
        $usermsg_data = $f3->get('DB')->exec("SELECT M.user_id,U.name,M.created_at,U.phone,U.sms_notification FROM message_threads M, user U WHERE M.user_id=U.id AND (U.group_id=1 OR U.group_id=2) GROUP BY M.user_id ORDER BY created_at DESC");

        if ($usermsg_data) {
            foreach ($usermsg_data as $key => $mdata) {
                $created_date = new \DateTime($mdata['created_at']);
                $current_date = new \DateTime();
                $interval = $current_date->diff($created_date);
                $interval_count = $interval->format('%a');

                if ($interval_count >= 7) {
                    $name = $mdata['name'];

                    $f3->set('name', $name);

                    //MAIL
                    $body = \Template::instance()->render('cron/user_message_notification.htm');
                    $message = $body;
                    $to = $email;
                    $subject = "Påmindelse til send besked";

                    $this->sendCronjobMail($f3, $to, $subject, $message);

                    //SMS
                    /*$smsnotfdata = '';
                    $mssge = '';
                    $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='first_notification_to_login'");

                    if ($smsnotfdata) {
                        foreach ($smsnotfdata as $k => $data);
                        $mssge = $data['message'];
                    }

                    $mobno = $mdata['phone'];
                    $mobno = str_replace('+', '', $mobno);
                    $mobno = str_replace('-', '', $mobno);
                    $mobno = str_replace(' ', '', $mobno);
                    $sms_notif = $mdata['sms_notification'];

                    if (isset($mssge) && isset($mobno) && isset($sms_notif)) {
                        if ($mssge && $mobno && $sms_notif) {
                            $this->sendCronSMS($f3, $mssge, $mobno);
                        }
                    }*/
                }
            }
        }
    }
    
    //-- The user has terminated step 6 and 83 days have passed
    function user_terminated_step_six_83($f3) {
        //$f3 = \Base::instance();
        
        $userdetails = $f3->get('DB')->exec('SELECT email,completed_step_date,id,name,password,phone,sms_notification FROM user where completed_step=8');
        if ($userdetails) {
            foreach ($userdetails as $key => $data) {
                $completed_date = new \DateTime($data['completed_step_date']);
                $user_id = $data['id'];
                $firstname = $data['name'];
                $email = $data['email'];
                $mobno = $data['phone'];
                $sms_notif = $data['sms_notification'];

                $current_date = new \DateTime();
                $interval = $current_date->diff($completed_date);
                $interval_count = $interval->format('%a');

                if ($interval_count >= 83 && $interval_count < 90) {
                    $f3->set('name', $firstname);

                    //Mail
                    $body = \Template::instance()->render('cron/user_first_notification_termination.htm');
                    $message = $body;
                    $to = $email;
                    $subject = "trin 6 opsigelse";
                    $this->sendCronjobMail($f3, $to, $cc, $subject, $message);

                    //SMS
                    /*$smsnotfdata = '';
                    $mssge = '';
                    $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='first_notification_to_login'");

                    if ($smsnotfdata) {
                        foreach ($smsnotfdata as $k => $data);
                        $mssge = $data['message'];
                    }

                    $mobno = str_replace('+', '', $mobno);
                    $mobno = str_replace('-', '', $mobno);
                    $mobno = str_replace(' ', '', $mobno);

                    if (isset($mssge) && isset($mobno) && isset($sms_notif)) {
                        if ($mssge && $mobno && $sms_notif) {
                            $this->sendCronSMS($f3, $mssge, $mobno);
                        }
                    }*/
                }
            }
        }
    }
    
    //-- The user has terminated step 6 and 90 days have passed
    function user_terminated_step_six_90($f3) {
        //$f3 = \Base::instance();
        
        $userdetails = $f3->get('DB')->exec('SELECT email,completed_step_date,id,name,password,phone,sms_notification FROM user where completed_step=8');
        if ($userdetails) {
            foreach ($userdetails as $key => $data) {
                $completed_date = new \DateTime($data['completed_step_date']);
                $user_id = $data['id'];
                $firstname = $data['name'];
                $email = $data['email'];
                $mobno = $data['phone'];
                $sms_notif = $data['sms_notification'];

                $current_date = new \DateTime();
                $interval = $current_date->diff($completed_date);
                $interval_count = $interval->format('%a');

                if ($interval_count == 90) {
                    $f3->set('name', $firstname);

                    //Mail
                    $body = \Template::instance()->render('cron/user_second_notification_termination.htm');
                    $message = $body;
                    $to = $email;
                    $subject = "trin 6 opsigelse";
                    $this->sendCronjobMail($f3, $to, $cc, $subject, $message);

                    //SMS
                    /*$smsnotfdata = '';
                    $mssge = '';
                    $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='first_notification_to_login'");

                    if ($smsnotfdata) {
                        foreach ($smsnotfdata as $k => $data);
                        $mssge = $data['message'];
                    }

                    $mobno = str_replace('+', '', $mobno);
                    $mobno = str_replace('-', '', $mobno);
                    $mobno = str_replace(' ', '', $mobno);

                    if (isset($mssge) && isset($mobno) && isset($sms_notif)) {
                        if ($mssge && $mobno && $sms_notif) {
                            $this->sendCronSMS($f3, $mssge, $mobno);
                        }
                    }*/
                }
            }
        }
    }
    
    //-- The user has terminated step 6 and 9x days have passed
    function user_terminated_step_six_90x($f3) {
        //$f3 = \Base::instance();
        
        $userdetails = $f3->get('DB')->exec('SELECT email,completed_step_date,id,name,password,phone,sms_notification FROM user where completed_step=8');
        if ($userdetails) {
            foreach ($userdetails as $key => $data) {
                $completed_date = new \DateTime($data['completed_step_date']);
                $user_id = $data['id'];
                $firstname = $data['name'];
                $email = $data['email'];
                $mobno = $data['phone'];
                $sms_notif = $data['sms_notification'];

                $current_date = new \DateTime();
                $interval = $current_date->diff($completed_date);
                $interval_count = $interval->format('%a');

                if ($interval_count > 90) {
                    $f3->set('name', $firstname);

                    //Mail
                    $body = \Template::instance()->render('cron/user_third_notification_termination.htm');
                    $message = $body;
                    $to = $email;
                    $subject = "trin 6 opsigelse";
                    $this->sendCronjobMail($f3, $to, $cc, $subject, $message);

                    //SMS
                    /*$smsnotfdata = '';
                    $mssge = '';
                    $smsnotfdata = $f3->get('DB')->exec("SELECT message FROM sms_notification WHERE notification='first_notification_to_login'");

                    if ($smsnotfdata) {
                        foreach ($smsnotfdata as $k => $data);
                        $mssge = $data['message'];
                    }

                    $mobno = str_replace('+', '', $mobno);
                    $mobno = str_replace('-', '', $mobno);
                    $mobno = str_replace(' ', '', $mobno);

                    if (isset($mssge) && isset($mobno) && isset($sms_notif)) {
                        if ($mssge && $mobno && $sms_notif) {
                            $this->sendCronSMS($f3, $mssge, $mobno);
                        }
                    }*/
                }
            }
        }
    }

    public function sendCronSMS($f3, $message, $mobnum) {
		
		// fix P083-520
		if(trim($mobnum) == "")
		{
			return true;
		}
		
        $msg = $message;
        if (strlen($msg) > 450) {
            $msg = substr($msg, 0, 450);
        }

        // The neccesary variables are set.
        $url = $f3->get('SMSurl');
        $url .= "?message=" . urlencode($msg);
        $url .= "&recipient=" . $mobnum; // Recipient
        $url .= $f3->get('SMSusername'); // Username
        $url .= $f3->get('SMSpassword'); // Password
        $url .= "&from=" . urlencode("NoDep"); // Sendername
        $url .= $f3->get('SMSutf'); // UTF8
        // The url is opened
       $checker = SendSMS::replier($url);
        if($checker == TRUE)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function sendCronjobMail($f3, $to, $subject, $message) {
        // To send HTML mail
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'From: NoDep <admin@internetpsykiatrien.com>' . "\r\n";
        // Mail it
        mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
    }

}
