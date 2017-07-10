<?php

namespace controllers;

use models\User;
use models\Invalid_Logins;
use controllers\TreatmentManager;
use utilities\SecurityUtility;
use utilities\LoggingUtility;

class Security {

    /**
     * @var Base
     */
    private $f3;

    /**
     * @var User
     */
    private $m;

    function __construct() {
        $this->f3 = \Base::instance();
        $this->m = new User($this->f3->get('DB'));
    }

     /**
     *
     * @param \Base $f3
     */
    function login($f3) {
		
        $post = $f3->get('POST');
        //$f3->scrub($post);
		

        if( (trim($_POST['username']) == '')  || (trim($_POST['password']) == '') )
        {
                $f3->reroute('/login/credentialsrequired');
        }
        else if (!filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)) //check for valid email format 
            $f3->reroute('/login?notification=error.invalidemail');
       	
        // fixing P0120-48
        $userNew = new User($f3->get('DB'));
        $userNew->getByEmail($_POST['username']);
        //P095-193 fix and also prevent from creating a invalid entry in user table having blank data
        if($userNew->dry()) // check if user exists or not.
            $f3->reroute('/login?notification=error.accountnotfound');
        if(($userNew->is_blocked == 1 ))
        {
            $f3->reroute('/login/accountblocked');
        }
        // end
		
		
        if ($u = $this->bind($post['username'], $post['password'])) {
		
            LoggingUtility::LogActivity("Successfully Logged In", "", $post['username']);
            
            // fixing P0120-48 
            $userNew->is_blocked = 0;
            $userNew->unsuccessful_login_tries = 0;
            $userNew->save();
            // end
			
            $f3->set('SESSION.id', $u->id);
            $f3->set('SESSION.user', $u->email);
            $f3->set('SESSION.group_id', $u->group_id);
            $f3->set('SESSION.is_first_login', $u->first_login);

            $u->updateAccessDate();

			// change by pradeep
            //$user = new User($f3->get('DB')); // -
			$user = new User($f3->get('DB')); // +
			$user = $user->getById($u->id); // +
			// end change
			
            $userfirststep = $f3->get('DB')->exec('SELECT completed_date FROM user_first_step where user_id=' . $u->id);
            $usr_fst_step_comp_date = '';
            foreach ($userfirststep as $key => $fstdata) {
                $usr_fst_step_comp_date = $fstdata['completed_date'];
            }

            if ($usr_fst_step_comp_date) {
                $hour = date('H', strtotime($usr_fst_step_comp_date));
                $min = date('i', strtotime($usr_fst_step_comp_date));
                $sec = date('s', strtotime($usr_fst_step_comp_date));

                $yr = date('Y', strtotime($usr_fst_step_comp_date));
                $mth = date('m', strtotime($usr_fst_step_comp_date));
                $dt = date('d', strtotime($usr_fst_step_comp_date));

                $first_step_compd_tenweeks = date('Y-m-d H:i:s', mktime($hour, $min, $sec, $mth, $dt + 70, $yr));

                $tenweeks_time = strtotime($first_step_compd_tenweeks);
                $today = date('Y-m-d H:i:s');
                $today_time = strtotime($today);

				// code by pradeep
                
				// if (($today_time >= $tenweeks_time) && ($user->getCurrentStep() < 8)) {
                   // $f3->get('DB')->exec("UPDATE user SET treatment_step='8.0',completed_step='7' WHERE id=" . $u->id);
                // }
				/*
				if (($today_time >= $tenweeks_time) && ($user->treatment_step < 8)) {
                    $f3->get('DB')->exec("UPDATE user SET treatment_step='8.0',completed_step='7' WHERE id=" . $u->id);
                 }
				 */
				 // end code pradeep
            }

            try {
                $manager = new TreatmentManager($u);
                $f3->set('manager', $manager);
            } catch (\InvalidArgumentException $e) {
                // pass silently
                //$f3->get('logger')->write($e->getMessage());
            }

            //
            if ($u->is_first_password_changed == 0) {
                $f3->reroute('/password_reset');
            }
            //
            
            
            if ($u->isAdminGroup()) {
                $f3->reroute('/user');
            } else if ($u->isFirstLogin()) {
                $f3->reroute('/section/settings.profile');
            } else {
                $f3->reroute($f3->get("ROOT"));
            }
        } else {
            
            LoggingUtility::LogActivity("Unsuccessful Login Attempt", "", $post['username']);
             
            //loggin invalid attempt
            $invalid = new Invalid_Logins($f3->get('DB'));
            $invalid->insert_invalid_login($userNew->id);
            
	    // fixing P0120-48 
            $unsuccessfulTries = $userNew->unsuccessful_login_tries;
            $unsuccessfulTries = $unsuccessfulTries + 1;
            if($unsuccessfulTries >= 5)
            {
                $userNew->is_blocked = 1;
            }
            $userNew->unsuccessful_login_tries =  $unsuccessfulTries;
            $userNew->save();
			
            if($unsuccessfulTries >= 5)
            {
                 LoggingUtility::LogActivity("Account blocked due to more than 5 unsuccessful login attempts", "", $post['username']);
                $f3->reroute(
                    '/login/accountblocked');                
            }
            // error.credentials
            $f3->reroute('/login?notification=error.credentials');
        }
    }
    
    function logout($f3) {

        $user = new User($f3->get('DB'));
        if (($user = $user->getById($f3->get('SESSION.id'))) && $user->isFirstLogin()) {
            $user->first_login = 0;
            $user->save();
        }
        LoggingUtility::LogActivity("Logged out");
        $f3->clear('SESSION');
        $f3->reroute('/');
    }
    
    function check_login() {
        $boolGracePeriodExpiry = SecurityUtility::gracePeriodExpiryCheck();
        if($boolGracePeriodExpiry == false)
        {
                $this->f3->reroute('/login/graceexpired');
        }
        
        $bool = SecurityUtility::idleTimeSessionExpiryCheck(false);
        if($bool == false)
        {
                $this->f3->reroute('/login/timeout');
        }
        return $this->f3->get('SESSION.user') ? TRUE : FALSE; 
    }

    /**
     * @param $username
     * @param $password
     * @return User|FALSE
     */
    function bind($username, $password) {

        $backends = array('__sql', '__test');

        for ($i = 0; $i < count($backends); $i++) {
            $r = $this->$backends[$i]($username, $password);
            if ($r)
                return $r;
        }

        return FALSE;
    }

    function __test($username, $password) {
        if ($username == "user" and $password == "user") {
            $r = new \stdClass();
            $r->email = 'user';
            // admin ?
            $r->id = 0;
            $r->group_id = 0;
            return $r;
        }

        return FALSE;
    }

    function __sql($username, $password) {

        // load the user
        $this->m->getByEmail($username);

        if ($this->m->dry()) {
            $this->f3->set('notification', "error.credentials");
            return false;
        }

        $salt = $this->m->get("salt");
        $user_password = $this->getPasswordTransform($password, $salt);

        //$user_password=$this->m->password;

        if ($this->m->password != $user_password) {
            $this->f3->set('notification', "error.credentials");
            return false;
        }

        if (!(boolean) $this->m->get('confirmed')) {
            $this->f3->set('notification', "success.mail");
            return false;
        }

        return $this->m;
    }

    public function getPasswordTransform($password, $salt, $id = null) {
        $pass = '';
        if (!$password) {
            if ($id) {
                $userId = $id;
                $userdata = $this->f3->get('DB')->exec('SELECT password FROM user WHERE id=' . $userId);
                foreach ($userdata as $k => $u)
                    ;
                $pass = $u['password'];
            }
        } else {
            $pass = hash('sha512', sha1($password . $salt));
        }
        return $pass;
    }

    /**
     * Check for Control Group role or $God
     * @return bool
     */
    function isControlGroup() {
        return ($this->f3->get('SESSION.group_id') == 1) || ($this->f3->get('SESSION.group_id') == 0);
    }

    /**
     * Check for Experimental Group role or $God
     * @return bool
     */
    function isExperimentalGroup() {
        return ($this->f3->get('SESSION.group_id') == 2) || ($this->f3->get('SESSION.group_id') == 0);
    }

    /**
     * Check for Doctor Group role or $God
     * @return bool
     */
    function isDoctorGroup() {
        return ($this->f3->get('SESSION.group_id') == 3) || ($this->f3->get('SESSION.group_id') == 0);
    }

    /**
     * Check for Patient Group role or $God
     * @return bool
     */
    function isPatientGroup() {
        return $this->isExperimentalGroup() || $this->isControlGroup();
    }

    /**
     * Check for Admin Group role or $God
     * @return bool
     */
    function isAdminGroup() {
        return $this->f3->get('SESSION.group_id') == 4 || $this->f3->get('SESSION.group_id') == 5 || $this->f3->get('SESSION.group_id') == 0;
    }

}
