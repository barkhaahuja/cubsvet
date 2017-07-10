<?php

namespace models;

use \DB\SQL\Mapper;
use \DB\SQL;

/**
 * @property mixed id
 * @property int confirmed
 * @property string create_date
 * @property int salt
 * @property string email
 * @property string name
 * @property string password
 * @property mixed group_id
 * @property int first_login
 * @property mixed access_date
 * @property mixed treatment_step
 * @property mixed completed_step_date
 * @property string completed_step
 */
class User extends Mapper {

    public function __construct(SQL $db) {
        parent::__construct($db, 'user');
    }

    public function all() {
        $this->reset();
        $this->load();
        return $this->query;
    }

    public function allByOwnerDoctor($doctor_id) {
        $this->reset();
        $this->load(array('owner_id=?', $doctor_id));
        return $this->query;
    }

    public function allDoctors() {
        $this->reset();
       // $this->load(array('group_id=?', 3));
		$this->load(array('group_id = 3 order by create_date desc'));
        return $this->query;
    }
     public function allProviderAdmins() {
        $this->reset();
     
        $this->load(array('group_id = 4 order by create_date desc'));
        return $this->query;
    }

    public function allPatients() {
        $this->reset();
        $this->load(array('(group_id = 1 OR group_id = 2) order by create_date desc'));
        return $this->query;
    }
    
    public function allPatientsByOwnerid($ownerid) {
        //$ownerid= $f3->get('SESSION.id');
        $this->reset();
        $this->load(array('(group_id = 1 OR group_id = 2) AND owner_id=' . $ownerid . ' order by create_date desc'));
        return $this->query;
    }

    public function checkOldPassword($oldpassword)
    {
          $f3 = \Base::instance();
          $salt = $this->salt;
          $password = $f3->get('security')->getPasswordTransform($oldpassword, $salt);
         if($password == $this->password)
         {
             return true;
         }
         else
         {
             return false;
         }
    }
    
    public function setNewPassword($newpassword)
    {
         $f3 = \Base::instance();
         $salt = time();
         $password = $f3->get('security')->getPasswordTransform($newpassword, $salt);
         $this->password = $password;
         $this->salt = $salt;
         $this->is_first_password_changed = 1;
         $this->save();
    }
    
    public function add() {
        $f3 = \Base::instance();
        $salt = time();
        $this->copyFrom('POST');
        $this->set('salt', $salt);

        if (($this->isControlGroup() || $this->isExperimentalGroup()) && $f3->get('security')->isDoctorGroup()) {
            // set up the creator (doctor) as owner
            $this->set('owner_id', $f3->get('SESSION.id'));
        }

        $this->set("password", $f3->get('security')
                        ->getPasswordTransform($this->get('password'), $salt));
						
		if(trim($this->get('phone')) == "" )
		{
			$this->set('sms_notification', 0);
		}
		
        $this->set('create_date', date('Y-m-d H:i:s', time()));
        $this->save();
      
    }

    /**
     * Check for Control Group role or $God for hydrated user
     * @return bool
     */
    function isControlGroup() {
        return $this->get('group_id') == 1 || $this->get('group_id') == 0;
    }

    /**
     * Check for Experimental Group role or $God hydrated user
     * @return bool
     */
    function isExperimentalGroup() {
        return $this->get('group_id') == 2 || $this->get('group_id') == 0;
    }

    /**
     * Check for Doctor Group role or $God hydrated user
     * @return bool
     */
    function isDoctorGroup() {
        return $this->get('group_id') == 3 || $this->get('group_id') == 0;
    }

    /**
     * Check for Admin Group role or $God hydrated user
     * @return bool
     */
    function isAdminGroup() {
        return $this->get('group_id') == 4 || $this->get('group_id') == 5 || $this->get('group_id') == 0;
    }

    public function getGroupName() {
        $g = new Group($this->db);
        $g->getById($this->group_id);
        return $g->get('name');
    }

    /**
     * @param $id
     * @return User
     */
    public function getById($id) {
        $this->reset();
        return $this->load(array('id=?', $id));
    }

    public function getByEmail($email) {
        $this->reset();
        $this->load(array('email=?', $email));
    }
	
	 public function getByEmailExcept($email,$id) {
        $this->reset();
        $this->load(array('email=? and id <> ?', $email, $id));
	}
    
    public function getByPhone($phone) {
        $this->reset();
        $this->load(array('phone=?', $phone));
		
    }
	
	public function getByPhoneExcept($phone, $id) {
        $this->reset();
        $this->load(array('phone=? and id <> ?', $phone, $id));
		//echo  $phone."=".$id."=".$this->email; exit;
    }
    
    public function edit($id) {
        $f3 = \Base::instance();

        $this->reset();
        $this->load(array('id=?', $id));
        $this->copyFrom('POST');

        // ignore password if get empty

        if ($f3->exists('POST.password')) {
            $salt = $this->salt;
            $password = $f3->get('security')
                    ->getPasswordTransform($f3->get('POST.password'), $salt, $id);
            $this->set('password', $password);
        }
        $this->save();
    }

    public function delete($id) {
        $f3 = \Base::instance();
       
        $allquizes = $f3->get('DB')->exec('select id FROM mapping_questionnaire_user WHERE user_id='. $id);
       
        foreach ($allquizes as $quiz) {
            $response = $f3->get('DB')->exec('DELETE FROM response_new WHERE quiz_id='. $quiz['id']);
        }
        
        $deletequiz = $f3->get('DB')->exec('DELETE FROM mapping_questionnaire_user WHERE user_id='. $id);
        
        $this->reset();
        $this->load(array('id=?', $id));
        $this->erase();
    }

    /**
     * Return array with information of due quiz
     * @return array|FALSE
     */
    public function getDueQuiz() {
        if (($this->getGroupName() == 'Experimental') || ($this->getGroupName() == 'Control')) {
            $this->quizCleanUp();
        }
        $quiz = new Quiz($this->db);
        $dueQuiz = $quiz->findone(
                array('completed_date IS null AND taken_by=?', $this['id']), array('order' => 'questionnaire_id'));

        // return the firs one
        return empty($dueQuiz) ? FALSE : $dueQuiz;
    }

    /** function added by pradeep to cleanup extra quizzes * */
    public function quizCleanUp() {
        $f3 = \Base::instance();

        $questionaire1 = $f3->get('DB')->exec('DELETE FROM quiz WHERE completed_date IS NULL AND questionnaire_id=1 AND created_by = ' . $this['owner_id'] . ' AND taken_by=' . $this['id'] . ' AND id NOT IN  (select id from (select id FROM `quiz` WHERE completed_date IS NULL AND questionnaire_id=1 AND created_by = ' . $this['owner_id'] . ' AND taken_by=' . $this['id'] . ' order by create_date desc LIMIT 1) x)');
        $questionaire2 = $f3->get('DB')->exec('DELETE FROM quiz WHERE completed_date IS NULL AND questionnaire_id=2 AND created_by = ' . $this['owner_id'] . ' AND taken_by=' . $this['id'] . ' AND id NOT IN  (select id from (select id FROM `quiz` WHERE completed_date IS NULL AND questionnaire_id=2 AND created_by = ' . $this['owner_id'] . ' AND taken_by=' . $this['id'] . ' order by create_date desc LIMIT 1) x)');
        $questionaire3 = $f3->get('DB')->exec('DELETE FROM quiz WHERE completed_date IS NULL AND questionnaire_id=3 AND created_by = ' . $this['owner_id'] . ' AND taken_by=' . $this['id'] . ' AND id NOT IN  (select id from (select id FROM `quiz` WHERE completed_date IS NULL AND questionnaire_id=3 AND created_by = ' . $this['owner_id'] . ' AND taken_by=' . $this['id'] . ' order by create_date desc LIMIT 1) x)');
        $questionaire4 = $f3->get('DB')->exec('DELETE FROM quiz WHERE completed_date IS NULL AND questionnaire_id=4 AND created_by = ' . $this['owner_id'] . ' AND taken_by=' . $this['id'] . ' AND id NOT IN  (select id from (select id FROM `quiz` WHERE completed_date IS NULL AND questionnaire_id=4 AND created_by = ' . $this['owner_id'] . ' AND taken_by=' . $this['id'] . ' order by create_date desc LIMIT 1) x)');
        $questionaire5 = $f3->get('DB')->exec('DELETE FROM quiz WHERE completed_date IS NULL AND questionnaire_id=5 AND created_by = ' . $this['owner_id'] . ' AND taken_by=' . $this['id'] . ' AND id NOT IN  (select id from (select id FROM `quiz` WHERE completed_date IS NULL AND questionnaire_id=5 AND created_by = ' . $this['owner_id'] . ' AND taken_by=' . $this['id'] . ' order by create_date desc LIMIT 1) x)');
        $questionaire6 = $f3->get('DB')->exec('DELETE FROM quiz WHERE completed_date IS NULL AND questionnaire_id=6 AND created_by = ' . $this['owner_id'] . ' AND taken_by=' . $this['id'] . ' AND id NOT IN  (select id from (select id FROM `quiz` WHERE completed_date IS NULL AND questionnaire_id=6 AND created_by = ' . $this['owner_id'] . ' AND taken_by=' . $this['id'] . ' order by create_date desc LIMIT 1) x)');
    }

    /**
     * Return array with information of due quiz
     * @return array|FALSE
     */
    public function getLastCompletedQuiz() {
        $quiz = new Quiz($this->db);
        /* $lastQuiz = $quiz->findone(
          array('completed_date IS NOT null AND taken_by=?', $this['id']),
          array('order' => 'completed_date')); */
        //Rajeesh 31/03/2014
        $lastQuiz = $quiz->findone(
                array('completed_date IS NOT null AND taken_by=?', $this['id']), array('order' => 'completed_date DESC'));

        // return the firs one
        return empty($lastQuiz) ? FALSE : $lastQuiz;
    }

    public function weeksSinceRegistered() {
        $diff = time() - strtotime($this->create_date);
        return (int) (floor($diff / (7 * 24 * 3600)));
    }

    public function weeksAfterRegistration() {
        $diff = time() - strtotime($this->create_date);
        return (int) (floor($diff / (7 * 24 * 3600)));
    }

    public function updateAccessDate() {
        $this->access_date = date('Y-m-d H:i:s', time());
        $this->save();
    }

    public function getCurrentStep() {
        $step = explode(".", $this->treatment_step);
        return (int) $step[0];
    }

    public function getCurrentSubStep() {
        $step = explode(".", $this->treatment_step);
        return (isset($step[1])) ? (int) $step[1] : 0;
    }

    public function isFirstLogin() {
        return $this->first_login;
    }
	
	public function hasTakenPreBigQuestionnaire()
	{
		$f3 = \Base::instance();
		$row = $f3->get('DB')->exec("SELECT * from mapping_questionnaire_user WHERE user_id = '" . $this->id . "' AND questionnaire_id = 1");
		
		if(sizeof($row) > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

    public function getTreatmentStep() {
        $step = $this->treatment_step;
        return $step;
    }

    public function getStepA() {
        $step = $this->stepA;
        return $step;
    }

    public function getStepB() {
        $step = $this->stepB;
        return $step;
    }

    public function getStep6() {
        $step = $this->step6;
        return $step;
    }

    public function getCompletedStep() {
        $step = $this->completed_step;
        return $step;
    }

    public function isPhoneNo($user) {
    
        if($user->phone != null && trim($user->phone) != '')
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    
    public function interval($startDate, $endDate) {
        $crdt = date('Y-m-d', strtotime($startDate));
        $compdt = date('Y-m-d', strtotime($endDate));

        $CheckInX = explode("-", $crdt);
        $CheckOutX = explode("-", $compdt);
        $date1 = mktime(0, 0, 0, $CheckInX[1], $CheckInX[2], $CheckInX[0]);
        $date2 = mktime(0, 0, 0, $CheckOutX[1], $CheckOutX[2], $CheckOutX[0]);
        $interval = ($date1 - $date2) / (3600 * 24);
        $interval = intval($interval);
        return $interval;
    }

    public function get_last_step($id) {
        $this->reset();
        $user = $this->load(array('id=?', $id));
        if ($user) {
            $aflag = $user->stepA;
            $bflag = $user->stepB;
            $flag6 = $user->step6;
            $stepa_status = $user->stepa_status;
            $stepb_status = $user->stepb_status;
            $step6_status = $user->step6_status;
            if ($aflag == 1 && $bflag == 2 && $flag6 == 3) { // a,b,c
                $last_step = 3;
            } else if ($aflag == 1 && $flag6 == 2 && $bflag == 3) { // a,c,b
                $last_step = 2;
            } else if ($bflag == 1 && $aflag == 2 && $flag6 == 3) { // b,a,c
                $last_step = 3;
            } else if ($bflag == 1 && $flag6 == 2 && $aflag == 3) { // b,c,a
                $last_step = 1;
            } else if ($flag6 == 1 && $aflag == 2 && $bflag == 3) { // c,a,b
                $last_step = 2;
            } else if ($flag6 == 1 && $bflag == 2 && $aflag == 3) { // c,b,a
                $last_step = 1;
            } else if ($aflag == 1 && $bflag == 2 && $flag6 == 0) { // a,b
                $last_step = 2;
            } else if ($aflag == 1 && $flag6 == 2 && $bflag == 0) { // a,c
                $last_step = 3;
            } else if ($bflag == 1 && $aflag == 2 && $flag6 == 0) { // b,a
                $last_step = 1;
            } else if ($bflag == 1 && $flag6 == 2 && $aflag == 0) { // b,c
                $last_step = 3;
            } else if ($flag6 == 1 && $aflag == 2 && $bflag == 0) { // c,a
                $last_step = 1;
            } else if ($flag6 == 1 && $bflag == 2 && $aflag == 0) { // c,b
                $last_step = 2;
            } else if ($aflag == 1 && $bflag == 0 && $flag6 == 2) { // a,c
                $last_step = 3;
            } else if ($aflag == 1 && $flag6 == 0 && $bflag == 2) { // a,b
                $last_step = 2;
            } else if ($bflag == 1 && $aflag == 0 && $flag6 == 2) { // b,c
                $last_step = 3;
            } else if ($bflag == 1 && $flag6 == 0 && $aflag == 2) { // b,a
                $last_step = 1;
            } else if ($flag6 == 1 && $aflag == 0 && $bflag == 2) { // c,b
                $last_step = 2;
            } else if ($flag6 == 1 && $bflag == 0 && $aflag == 2) { // c,a
                $last_step = 1;
            } else if ($aflag == 0 && $bflag == 1 && $flag6 == 2) { // b,c
                $last_step = 3;
            } else if ($aflag == 0 && $flag6 == 1 && $bflag == 2) { // c,b
                $last_step = 2;
            } else if ($bflag == 0 && $aflag == 1 && $flag6 == 2) { // a,c
                $last_step = 3;
            } else if ($bflag == 0 && $flag6 == 1 && $aflag == 2) { // c,a
                $last_step = 1;
            } else if ($flag6 == 0 && $aflag == 1 && $bflag == 2) { // a,b
                $last_step = 2;
            } else if ($flag6 == 0 && $bflag == 1 && $aflag == 2) { // b,a
                $last_step = 1;
            } else { //other combination
                $last_step = 5;
            }
        }
        return $last_step;
    }

    public function weeksAfterTreatment() {
        //echo '#####'.$this->completed_step_date;
        $diff = time() - strtotime($this->completed_step_date);
        return (int) (floor($diff / (7 * 24 * 3600)));
    }

    public function sendMail($to, $subject, $message) {

        $this->reset();
        // To send HTML mail
       
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'From: NoDep <ajay.kesharwani@atdrive.com>' . "\r\n";
        // Mail it
        mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers, '-frajeesh.vr@sherston.com');
    }

    public function setPostTreamentMail($id) {
        $this->reset();
        $this->db->exec('UPDATE user SET post_treatment_mail=true WHERE id=' . $id);
    }
    
    public function disableLiteQuestionnaireById($id) {

        $this->reset();
        $this->db->exec('UPDATE user SET disable_lite_questionnaires = true WHERE id=' . $id);
    }

    public function disableUserById($id) {
        $this->reset();
        $this->db->exec('UPDATE user SET discharged=true WHERE id=' . $id);
    }

    public function get_last_quiz_completion_date($user_id, $questionnaireId) {
        $quizcompleteddetails = $this->db->exec('SELECT completed_date FROM quiz WHERE completed_date IS not null AND questionnaire_id=' . $questionnaireId . ' AND taken_by=' . $user_id . ' ORDER BY completed_date ASC');

        if (count($quizcompleteddetails) > 0) {
            foreach ($quizcompleteddetails as $key => $data) {
                $quiz_completed_date = $data['completed_date'];
            }
            return $quiz_completed_date;
        }
    }

    public function setFinalBigQuestionnaire($id) {
        $this->reset();
        $this->db->exec('UPDATE user SET final_big_questionnaire=true WHERE id=' . $id);
    }
    
    public function allDischargedPatients() {
        $this->reset();
        $this->load(array('(group_id = 1 OR group_id = 2) AND discharged = 1 order by discharge_date desc'));
        return $this->query;
    }
    
     public function allDischargedPatientsByOwnerid($ownerid) {
        //$ownerid= $f3->get('SESSION.id');
        $this->reset();
        $this->load(array('(group_id = 1 OR group_id = 2) AND discharged = 1 AND owner_id=' . $ownerid . ' order by discharge_date desc'));
        return $this->query;
    }

    public function allActivePatients() {
        $this->reset();
        $this->load(array('(group_id = 1 OR group_id = 2) AND discharged = 0 order by create_date desc'));
        return $this->query;
    }
    
    public function allActivePatientsByOwnerid($ownerid) {
        //$ownerid= $f3->get('SESSION.id');
        $this->reset();
        $this->load(array('(group_id = 1 OR group_id = 2) AND discharged = 0 AND owner_id=' . $ownerid . ' order by create_date desc'));
        return $this->query;
    }
    
     public function isPatient($id) {
        $getUser = $this->db->exec('SELECT id FROM user WHERE (group_id = 1 OR group_id = 2) AND id = '.$id);
        if(count($getUser) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function getAllUsersEligibleForReminder()
    {
        $this->reset();
        return $this->find(array('discharged = 0'));
    }
    
      
   
   
}
