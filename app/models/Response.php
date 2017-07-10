<?php

namespace models;

/**
 * @property mixed question_id
 */
class Response extends \DB\SQL\Mapper {

    // Instantiate mapper
    function __construct(\DB\SQL $db) {

        $f3 = \Base::instance();

        // This is where the mapper and DB structure synchronization occurs
        parent::__construct($f3->get('DB'), 'response');
    }

    function getPatientSixthQuestionnaireResponseData($user_id) {
        // let load everything related to it
        /* return $this->db->exec("SELECT r.*, a.answer, q.question FROM response r
          LEFT JOIN answer a ON r.answer_id = a.id
          LEFT JOIN question q ON r.question_id = q.id
          LEFT JOIN quiz qz ON r.quiz_id = qz.id
          WHERE qz.taken_by = ?", $user_id); */

        return $this->db->exec("SELECT r.*, a.answer, q.question,ap.id as ans_type FROM response r
          LEFT JOIN answer a ON r.answer_id = a.id
          LEFT JOIN question q ON r.question_id = q.id
          LEFT JOIN answer_type ap on q.answer_type = ap.id
          LEFT JOIN quiz qz ON r.quiz_id = qz.id
          WHERE  qz.questionnaire_id = 6 AND qz.taken_by = ?", $user_id);
    }

    function getPatientResponseData($user_id) {
        // let load everything related to it
        /* return $this->db->exec("SELECT r.*, a.answer, q.question FROM response r
          LEFT JOIN answer a ON r.answer_id = a.id
          LEFT JOIN question q ON r.question_id = q.id
          LEFT JOIN quiz qz ON r.quiz_id = qz.id
          WHERE qz.taken_by = ?", $user_id); */

        return $this->db->exec("SELECT r.*, a.answer, q.question,ap.id as ans_type FROM response r
          LEFT JOIN answer a ON r.answer_id = a.id
          LEFT JOIN question q ON r.question_id = q.id
          LEFT JOIN answer_type ap on q.answer_type = ap.id
          LEFT JOIN quiz qz ON r.quiz_id = qz.id
          WHERE  qz.questionnaire_id = 1 AND qz.taken_by = ?", $user_id);
    }

    function getPatientLiteResponseData($user_id) {
        /* return $this->db->exec("SELECT r.*, a.answer, q.question,ap.id as ans_type,qz.questionnaire_id as questionareID FROM response r
          LEFT JOIN answer a ON r.answer_id = a.id
          LEFT JOIN question q ON r.question_id = q.id
          LEFT JOIN answer_type ap on q.answer_type = ap.id
          LEFT JOIN quiz qz ON r.quiz_id = qz.id
          WHERE qz.questionnaire_id = 2 AND qz.taken_by = 41 ORDER BY qz.create_date DESC"); */
        return $this->db->exec("SELECT r.*, a.answer, q.question,ap.id as ans_type FROM response r
          LEFT JOIN answer a ON r.answer_id = a.id
          LEFT JOIN question q ON r.question_id = q.id
          LEFT JOIN answer_type ap on q.answer_type = ap.id
          LEFT JOIN quiz qz ON r.quiz_id = qz.id
          WHERE qz.questionnaire_id = 2 AND qz.taken_by =" . $user_id . "  ORDER BY qz.create_date");
    }

    /**
     * Handle the response creation
     *
     * Check what type of answer user gave and create a response entry in DB for it.
     *
     * @param Quiz $quiz
     * @param int $question_id
     * @param array $user_response
     * @internal param int $q Question id
     */
    function create($quiz, $question_id, $user_response) {

        $question = new Question($this->db);
        $question->load(array('id=?', $question_id));

        // yes/no answer ?
        if ($question['answer_type'] == 1) {
            // this should be: "yes"/"no"
            $this['response'] = isset($user_response['response']) ? $user_response['response'] : '';
            // in rare cases this is used, but we have one or two of those cases
            $this['response_value'] = isset($user_response['response_value']) ? $user_response['response_value'] : '';
            $this['question_id'] = $question_id;
            $this['quiz_id'] = $quiz['id'];
            $this['create_date'] = date('Y-m-d H:i:s', time());
        }

        // multiple choices?
        if ($question['answer_type'] == 2) {
            // this should always come, although can be with multiple values also
            $answer_id = isset($user_response['answer_id']) ? $user_response['answer_id'] : null;

            if ($answer_id) {
                // grab selected choice with responses
                $this['response'] = isset($user_response[$answer_id]['response']) ? $user_response[$answer_id]['response'] : '';
                $this['response_value'] = isset($user_response[$answer_id]['response_value']) ? $user_response[$answer_id]['response_value'] : '';

                // set the rest of fields
                $this['answer_id'] = $answer_id;
                $this['question_id'] = $question_id;
                $this['quiz_id'] = $quiz['id'];
                $this['create_date'] = date('Y-m-d H:i:s', time());
            } else {
                // we have multiple values iterate to grab them, look at step #11 big Q.
                // every entry comes with its answer_id
                foreach ($user_response as $answer_id => $values) {
                    $response = isset($values['response']) ? $values['response'] : '';
                    $response_value = isset($values['response_value']) ? $values['response_value'] : '';

                    if (!(empty($response) || empty($response_value))) {
                        $this->reset();
                        // grab selected choice with responses
                        $this['response'] = $response;
                        $this['response_value'] = $response_value;
                        // set the rest of fields
                        $this['answer_id'] = $answer_id;
                        $this['question_id'] = $question_id;
                        $this['quiz_id'] = $quiz['id'];
                        $this['create_date'] = date('Y-m-d H:i:s', time());

                        $this->save();
                    }
                }
            }
        }

        // numeric value or text? they behave the same
        if ($question['answer_type'] == 3 || $question['answer_type'] == 4) {
            // it can also be multiple
            foreach ($user_response as $answer_id => $values) {
                $response = isset($values['response']) ? $values['response'] : '';
                $response_value = isset($values['response_value']) ? $values['response_value'] : '';

                // we require at least one value for this response
                if (!empty($response)) {
                    $this->reset();
                    // grab selected choice with responses
                    $this['response'] = $response;
                    $this['response_value'] = $response_value;
                    // set the rest of fields
                    if ($answer_id != -1) {
                        $this['answer_id'] = $answer_id;
                    }
                    $this['question_id'] = $question_id;
                    $this['quiz_id'] = $quiz['id'];
                    $this['create_date'] = date('Y-m-d H:i:s', time());

                    $this->save();
                }
            }
        }

        // lastly we check if user finished the quiz
        if ($question->isLastQuestion()) {
            // set the completed date for this quiz
            $quiz->setCompleted();
            $quiz->save();
        }

        // lets save our hard work ;)
        $this->save();
    }

}
