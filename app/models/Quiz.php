<?php

namespace models;

/**
 * @property  current_step
 * @property mixed create_date
 */
class Quiz extends \DB\SQL\Mapper {

    // Instantiate mapper
    function __construct(\DB\SQL $db) {

        $f3 = \Base::instance();

        // This is where the mapper and DB structure synchronization occurs
        parent::__construct($f3->get('DB'), 'quiz');
    }

    /**
     * Label a quiz as completed
     */
    function setCompleted() {
        $this['completed_date'] = date('Y-m-d H:i:s', time());
        $this->save();
    }

    function daysSinceStarted() {
        $diff = time() - strtotime($this->create_date);
        return (int) ceil($diff / (24 * 3600));
    }

    /**
     * @param $user User model instance
     * @return Quiz
     */
    function createBigQuestionnaireForUser($user) {
        // big questionnaire
        $this['questionnaire_id'] = 1;
        $this['created_by'] = $user->owner_id;
        $this['taken_by'] = $user->id;
        $this['description'] = 'Big questionnaire';
        $this['create_date'] = date('Y-m-d H:i:s', time());

        return $this->save();
    }

    function createBigQuestionnaireForUserById($id, $ownerid) {
        $this['questionnaire_id'] = 1;
        $this['created_by'] = $ownerid;
        $this['taken_by'] = $id;
        $this['description'] = 'Big questionnaire';
        $this['create_date'] = date('Y-m-d H:i:s', time());

        return $this->save();
    }

    /**
     * @param $user User model instance
     * @return Quiz
     */
    function createLiteQuestionnaireForUser($user) {
      
        if(!$user->disable_lite_questionnaires && !$user->discharged)
        {
            // lite questionnaire
            $this['questionnaire_id'] = 2;
            $this['created_by'] = $user->owner_id;
            $this['taken_by'] = $user->id;
            $this['description'] = 'Lite questionnaire';
            $this['create_date'] = date('Y-m-d H:i:s', time());

            return $this->save();    
        }
        else
        {
            return false;
        }
    }

    /**
     * @param $user User model instance
     * @return Quiz
     */
    function createThirdQuestionaireForUser($user) {
        // Third questionaire
        $this['questionnaire_id'] = 3;
        $this['created_by'] = $user->owner_id;
        $this['taken_by'] = $user->id;
        $this['description'] = 'Third questionaire';
        $this['create_date'] = date('Y-m-d H:i:s', time());

        return $this->save();
    }

    /**
     * @param $user User model instance
     * @return Quiz
     */
    function createFourthQuestionaireForUser($user) {
        // Third questionaire
        $this['questionnaire_id'] = 4;
        $this['created_by'] = $user->owner_id;
        $this['taken_by'] = $user->id;
        $this['description'] = 'Fourth questionaire';
        $this['create_date'] = date('Y-m-d H:i:s', time());

        return $this->save();
    }

    /**
     * @param $user User model instance
     * @return Quiz
     */
    function createFifthQuestionaireForUser($user) {
        // Third questionaire
        $this['questionnaire_id'] = 5;
        $this['created_by'] = $user->owner_id;
        $this['taken_by'] = $user->id;
        $this['description'] = 'Fifth questionaire';
        $this['create_date'] = date('Y-m-d H:i:s', time());

        return $this->save();
    }

    /**
     * @param $user User model instance
     * @return Quiz
     */
    function createSixthQuestionaireForUser($user) {
        // Third questionaire
        $this['questionnaire_id'] = 6;
        $this['created_by'] = $user->owner_id;
        $this['taken_by'] = $user->id;
        $this['description'] = 'Sixth questionaire';
        $this['create_date'] = date('Y-m-d H:i:s', time());

        return $this->save();
    }

    function deleteLiteSixthQuestionnaireForUser($id) {
        $f3 = \Base::instance();
        $litequiz = $f3->get('DB')->exec('DELETE FROM quiz WHERE completed_date IS NULL AND questionnaire_id=2 AND taken_by=' . $id . '');
        $sixthquiz = $f3->get('DB')->exec('DELETE FROM quiz WHERE completed_date IS NULL AND questionnaire_id=6 AND taken_by=' . $id . '');
    }
    
    function deleteAllQuestionnaireForUser($id) {
        $f3 = \Base::instance();
        $ques= $f3->get('DB')->exec('DELETE FROM quiz WHERE completed_date IS NULL AND taken_by=' . $id . '');
    }
    
    function deleteLiteQuestionnaireForUser($id) {
        $f3 = \Base::instance();
        $litequiz = $f3->get('DB')->exec('DELETE FROM quiz WHERE completed_date IS NULL AND questionnaire_id=2 AND taken_by=' . $id . '');
    }

}
