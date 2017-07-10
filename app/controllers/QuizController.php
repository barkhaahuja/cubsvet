<?php

namespace controllers;

use models\Answer;
use models\Quiz;
use models\Response;
use models\User;
use models\Quizuserrules;
use models\Questions_New;
use models\Question_Templates;
use models\MappingQuestionnaireUser;
use models\Response_New;
use models\Options_New;
use models\Graph;

class QuizController {

    function index($f3) {
        $f3->set('questionnaire', $f3->get('PARAMS.questionnaire'));
        $f3->set('step', $f3->get('PARAMS.step'));
        $f3->set('quiz', $f3->get('PARAMS.quiz'));
        $f3->set('onStepX', $f3->get('security')->isControlGroup());
        echo \Template::instance()->render('dashboard/windows/window.quiz.htm');
    }

    function show($f3) {
        if (null == ($id = $f3->get('PARAMS.questionnaire')))
            $id = 1;

        if (null == ($step = $f3->get('PARAMS.step')))
            $step = 0;

        //$user_id=$f3->get('SESSION.id');
        //$this->updateuserrule($f3,$user_id,2);
        // this will always come from main controller
        $mappingquestionnaireuser = $f3->get('PARAMS.quiz');
        $user = new User($f3->get('DB'));
        $user = $user->getById($f3->get('SESSION.id'));


        if ($user->group_id == 1) {
            $video = "X.2.mp4";
        } elseif ($user->group_id == 2) {
            $video = "0.4.mp4";
        }
        $f3->set('currentStep', $user->getCurrentStep() ? : 1);
        $f3->set('carousel_indicators', $this->carouselIndicators($id, $step));

        if (isset($video)) {
            $f3->set('video', $video);
        }
        
        $f3->set('onStepX', $f3->get('security')->isControlGroup());
        // set current quiz in course
        $f3->set('qstnrid', $f3->get('PARAMS.questionnaire'));
        $f3->set('quiz_id', $mappingquestionnaireuser);
        $f3->set('user_id', $f3->get('SESSION.id'));
        //echo 'quiz/' . $id . '/quiz_' . $step . '.html';
        //$f3->set('quiz', "quiz/$id/quiz_$step.html");
        
        // change by deepanshu for new quiz strcuture
        $mapping = new MappingQuestionnaireUser($f3->get('DB')); 
        $mapping->updateStartedOn($mappingquestionnaireuser);
        
        $question = new Questions_New($f3->get('DB')); 
        $question->getByQuestionnaireAndStep($id, $step);
        
        $template = new Question_Templates($f3->get('DB'));
        $template->getById($question->question_template_id);
      
        // graph data set
       
        if($question->isgraph == 1)
        {
            $graphObj = new Graph();
            $graphObj = $this->getLiteQuestionnaireGraphData($f3, $id, $step, $mappingquestionnaireuser);
        
            $f3->set('gdatas', $graphObj->gdatas);
            $f3->set('glabels', $graphObj->glabels);
            $f3->set('tcount', $graphObj->tcount);
            $f3->set('gphdata', $graphObj->gphdata);
            $f3->set('highx', $graphObj->highx);
        }
        // end
        
        $f3->set('question_title', $question->title);
        $f3->set('question_subtitle', $question->subtitle);
        $f3->set('question_description', $question->description);
        $f3->set('question_number_skip', $question->question_number_skip);
        $f3->set('question_is_introduction', $question->is_introduction);
        $f3->set('question_videoURL',  $question->videoURL);
        $f3->set('question_template',  $template->id);
        $f3->set('questionnaire_step',  $step);
        $f3->set('questionnaire_id', $id);
        $f3->set('questionnaire_questionid', $question->id);
        $f3->set('questionnaire_mappingquestionnaireuser', $mappingquestionnaireuser);
        
        //$f3->set('colors',array('red','blue','yellow'));
        $f3->set('question_options', $question->getAllOptions($question->id));
        
        // resetting question object
        $islastQuestion = $question->isLastQuestion($id, $step);
        $f3->set('questionnaire_islastquestion', ($islastQuestion)? "true": "false");
        
        // resetting question object
        $isfirstQuestion = $question->isFirstQuestion($id, $step);
        $f3->set('questionnaire_isfirstquestion', ($isfirstQuestion)? "true": "false");
        
        $f3->set('quizURL', "quiz/templates/".$template->view_name);
        
        // change end
        
        $f3->set('content', 'quiz/__layout-quiz.htm');
        echo \Template::instance()->render('__layout.htm');
    }

    function carouselIndicators($id, $page) {

        $f3 = \Base::instance();
        $user = new User($f3->get('DB'));
        $step = (int) $user->getCurrentStep();

        switch ($id) {
            case 1:
                if ($page > 0 AND $page < 5) {
                    return array('pages' => 2, 'active' => (int) $page, 'offset' => 0, 'id' => 1);
                }
                if ($page >= 5 AND $page < 16) {
                    return array('pages' => 10, 'active' => (int) $page - 4, 'offset' => 4, 'id' => 1);
                }
                if ($page >= 16 AND $page < 23) {
                    return array('pages' => 6, 'active' => (int) $page - 15, 'offset' => 15, 'id' => 1);
                }
                if ($page >= 23 AND $page < 28) {
                    return array('pages' => 5, 'active' => (int) $page - 22, 'offset' => 22, 'id' => 1);
                }
               
                return array('pages' => 0, 'active' => (int) $page, 'offset' => 0, 'id' => 1);
                break;  
            case 2:
                if ($page > 0 AND $page < 12) {
                    return array('pages' => 10, 'active' => (int) $page - 1, 'offset' => 1, 'id' => 1);
                }
                if ($page >= 13 AND $page < 20) {
                    return array('pages' => 6, 'active' => (int) $page - 12, 'offset' => 12, 'id' => 1);
                }
                if ($page >= 20 AND $page < 24) {
                    return array('pages' => 4, 'active' => (int) $page - 19, 'offset' => 19, 'id' => 1);
                }
                if ($page >= 25 AND $page < 28) {
                    return array('pages' => 3, 'active' => (int) $page - 24, 'offset' => 24, 'id' => 1);
                }
                return array('pages' => 0, 'active' => (int) $page, 'offset' => 0, 'id' => 1);
                break;  
                
            case 3:
                if ($page > 0 AND $page < 4) {
                    return array('pages' => 3, 'active' => (int) $page, 'offset' => 0, 'id' => 1);
                }
                return array('pages' => 0, 'active' => (int) $page, 'offset' => 0, 'id' => 1);
                break;  
                
            case 4:
                if ($page > 0 AND $page < 12) {
                    return array('pages' => 10, 'active' => (int) $page - 1, 'offset' => 0, 'id' => 1);
                }
                if ($page > 12 AND $page < 19) {
                    return array('pages' => 6, 'active' => (int) $page - 12, 'offset' => 12, 'id' => 1);
                }
                if ($page > 19 AND $page < 24) {
                    return array('pages' => 4, 'active' => (int) $page - 19, 'offset' => 19, 'id' => 1);
                }
                if ($page > 24 AND $page < 28) {
                    return array('pages' => 3, 'active' => (int) $page - 24, 'offset' => 24, 'id' => 1);
                }
               
                return array('pages' => 0, 'active' => (int) $page, 'offset' => 0, 'id' => 1);
                break;  
        }
    }

    function getLiteQuestionnaireGraphData($f3, $id, $step, $quiz)
    {
            // added for graph 
            $user_id = $f3->get('SESSION.id');
            $data_1 = array();
            $labels = array();

            $litequizdetails = $f3->get('DB')->exec('SELECT SUM(R.option_value)as total,Q.id,Q.user_id 
                        FROM mapping_questionnaire_user Q, response_new R 
                        WHERE Q.questionnaire_id=3
                        AND Q.user_id='.$user_id.'
                        AND Q.id=R.quiz_id
                        AND R.isoptional = 0 GROUP BY R.quiz_id');

            $max_X = 0;
            $tcount = 0;
            $gph_data = '[';

            for ($i = 0; $i < count($litequizdetails); $i++) {
                $litequiz = $litequizdetails[$i];
                $data_1[] = $litequiz['total'];
                $step_value = $i + 1;
                $labels[] = $step_value;
                $tcount++;

                $gph_data .= '{x: ' . $step_value . ',y: ' . $litequiz['total'] . '},';
            }

            if (isset($labels) && sizeof($labels) > 0) {
                $max_X = max($labels);

                if ($max_X < 10) {
                    $max_X = 10;
                }
            }

            $gph_data = rtrim($gph_data, ',');

            $gph_data .= ']';

            $graph_data = json_encode($data_1);
            $graph_Label = json_encode($labels);

            $graphObj = new Graph();
            $graphObj->gdatas = $graph_data;
            $graphObj->glabels = $graph_Label;
            $graphObj->tcount = $tcount;
            $graphObj->gphdata = $gph_data;
            $graphObj->highx = $max_X;
         
            return $graphObj;
    }
    
    /**
     * This show the next quiz step and process current one
     * @param $f3
     */
    function show_ajax($f3) {
       
        $post = $f3->get('POST');
        $f3->scrub($post);
        $id = $f3->get('PARAMS.questionnaire');
        $step = $f3->get('PARAMS.step');
        // used to set up the current quiz for this questionnaire and step
        $quiz = $f3->get('PARAMS.quiz');
        
        // new code
        // checking if template exists
           
//         if($this->checkIfTemplateExists($id, $step))
//         {  
             try {
                    if($this->process_form_inputs($f3, $id, $step, $post))
                    {
                        // updating user to proceed in program
                        if(($id == 1) && ($post['islastquestion'] == true )|| ($post['islastquestion'] == 1 ))
                        {
                            $userupdate = new User($f3->get('DB'));
                            $userupdate->getById($f3->get('SESSION.id'));
                            $userupdate->treatment_step = 0.4;
                            $userupdate->save();
                        }
                        // end
                       
                        
                          // checking for suicidal risk email
                            $suicidalmessage = 0;
                            
                            if(isset($post['option']))
                            {
                                if(($post['option'] == 79) || ($post['option'] == 80) || ($post['option'] == 223) || ($post['option'] == 224) || ($post['option'] == 173) || ($post['option'] == 174) || ($post['option'] == 303) || ($post['option'] == 304) )
                                { 
                                    // send suicidal mail
                                    $this->sendSuicidalMail();
                                    $suicidalmessage = 1;
                                }
                            }
                            // end

                         // check if graph needed
                         
                         // below has to be done
                         // update step for further
                         $mappingQuestionnaireUser = new MappingQuestionnaireUser($f3->get('DB'));
                         $result = $mappingQuestionnaireUser->updateQuestionnaireWithNextQuestion($quiz);
                        
                         if($post["islastquestion"] == "true")
                         {
                             // questionnaire finished
                             $mappingQuestionnaireUser->updateEndedOn($quiz);
                             echo json_encode(array('status' => 'success', 'quiz' => $quiz, 'questionnaire' => $id, 'nextStep' => $result,'close' => true ,'suicidalmessage' => $suicidalmessage));
                             exit;
                         }
                         else
                         {
                             echo json_encode(array('status' => 'success', 'quiz' => $quiz, 'questionnaire' => $id, 'nextStep' => $result,'close' => false , 'suicidalmessage' => $suicidalmessage));
                             exit;
                         }
                     }
                     else {
                        // unable to process form
                     }
                     
            } catch (\InvalidArgumentException $e) {
                echo json_encode(array('status' => 'error', 'msg' => $e->getMessage()));
                exit;
            }
            
//         }
//         else
//         {
//             // error no such template file exists
//             echo json_encode(array('status' => 'error', 'msg' => "Quiz file doesn't exist."));
//         }
        // old code
        /*
        if ($this->existQuiz($id, $step)) {
            try {
                $this->process_form($f3, $id, $step, $post);
            } catch (\InvalidArgumentException $e) {
                echo json_encode(array('status' => 'error', 'msg' => $e->getMessage()));
                exit;
            }

            // added for graph 
            $user_id = $f3->get('SESSION.id');
            $data_1 = array();
            $labels = array();

            $litequizdetails = $f3->get('DB')->exec('SELECT SUM(R.response)as total,Q.id,Q.taken_by FROM quiz Q, response R WHERE Q.questionnaire_id=2 AND Q.taken_by=' . $user_id . ' AND Q.id=R.quiz_id GROUP BY R.quiz_id');

            $max_X = 0;
            $tcount = 0;
            $gph_data = '[';

            for ($i = 0; $i < count($litequizdetails); $i++) {
                $litequiz = $litequizdetails[$i];
                $data_1[] = $litequiz['total'];
                $step_value = $i + 1;
                $labels[] = $step_value;
                $tcount++;

                $gph_data .= '{x: ' . $step_value . ',y: ' . $litequiz['total'] . '},';
            }

            if (isset($labels) && sizeof($labels) > 0) {
                $max_X = max($labels);

                if ($max_X < 10) {
                    $max_X = 10;
                }
            }

            $gph_data = rtrim($gph_data, ',');

            $gph_data .= ']';

            $graph_data = json_encode($data_1);
            $graph_Label = json_encode($labels);

            $f3->set('gdatas', $graph_data);
            $f3->set('glabels', $graph_Label);
            $f3->set('tcount', $tcount);

            $f3->set('gphdata', $gph_data);
            $f3->set('highx', $max_X);

            // end graph section 

            $f3->set('qstnrid', $f3->get('PARAMS.questionnaire'));
            $f3->set('onStepX', $f3->get('security')->isControlGroup());
            $f3->set('carousel_indicators', $this->carouselIndicators($id, $step));
            $f3->set('quiz_id', $quiz);
            $f3->set('user_id', $f3->get('SESSION.id'));

            $ci = \Template::instance()->render("quiz/__carousel-indicators.htm");
            $quiz = \Template::instance()->render("quiz/$id/quiz_$step.html");
            echo json_encode(array('status' => 'success',
                'quiz' => $quiz,
                'ci' => $ci,
                'data' => $post,
                'carousel_indicators' => $f3->get('carousel_indicators')));
            exit;
        }
*/
        echo json_encode(array('status' => 'error', 'msg' => "Quiz file doesn't exist."));
        
    }
    
    function checkIfTemplateExists($questionnaire, $step)
    {  
   
        $f3 = \Base::instance();
        $question = new Questions_New($f3->get('DB')); 
        $question->getByQuestionnaireAndStep($questionnaire, $step);
        $template = new Question_Templates($f3->get('DB'));
        $template->getById($question->question_template_id);
        return file_exists("app/templates/quiz/templates/".$template->view_name);
    }

    function existQuiz($id, $step) {
        return file_exists("app/templates/quiz/$id/quiz_$step.html");
    }

    public function update_step($f3) {
        $quiz = new Quiz($f3->get('DB'));
        $quiz->reset();
        $quiz->load(array('id=?', $f3->get('POST.id')));
        $quiz->copyFrom('POST');
        if ($quiz->save()) {
            echo json_encode(array('status' => 'success'));
            exit;
        }

        echo json_encode(array('status' => 'error'));
    }

    function process_form($f3, $questionnaire_id, $step, $data) {

        if (isset($data['separator']) && $data['separator']) {
            // nothing to do return immediately
            return true;
        }

        // video step ? need to check before checking empty user data question
        if (isset($data['video']) && $data['video']) {
            // update quiz step only, this allow resuming later
            $quiz = new Quiz($f3->get('DB'));
            /** @var $quiz Quiz */
            $quiz = $quiz->findone(array('id=?', $data['quiz_id']));
            $quiz['current_step'] = $step;
            $quiz->save();
            return true;
        }

        // load the related quiz
        if (!isset($data['quiz_id']) && empty($data['quiz_id'])) {
            throw new \InvalidArgumentException('Quiz identifier needed, null received.');
            return false;
        }

        // does user sent anything ?
        if (!isset($data['question'])) {
            throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
            return false;
        }

        // does user sent anything ?
        if ($this->is_array_empty($data['question'])) {
            throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
            return false;
        }

        // advanced validation
        if ($v = $this->advanced_validation($step, $data, $questionnaire_id)) {
            throw new \InvalidArgumentException($v);
            return false;
        }


        $quiz = new Quiz($f3->get('DB'));
        /** @var $quiz Quiz */
        $quiz = $quiz->findone(array('id=?', $data['quiz_id']));
        $quiz['current_step'] = $step;
        $quiz->save();

        // lets handle different cases
        $mobno = '';
        $sms_notif = '';

        $response = new Response($f3->get('DB'));

        foreach ($data['question'] as $question_id => $user_response) {
            $response->create($quiz, $question_id, $user_response);

            $answer_id = isset($user_response['answer_id']) ? $user_response['answer_id'] : null;

            if ($answer_id == '249' || $answer_id == '250') {


                $user_ID = $f3->get('SESSION.id');

                $userdeatils = $f3->get('DB')->exec('SELECT owner_id,id,name,last_name FROM user where id=' . $user_ID);
                foreach ($userdeatils as $key => $data1) {
                    $ownerid = $data1['owner_id'];
                    $firstname = $data1['name'];
                    $lastname = $data1['last_name'];
                }

                $doctordetails = $f3->get('DB')->exec('SELECT email,name,phone,sms_notification FROM user where id=' . $ownerid);
                foreach ($doctordetails as $key => $data) {
                    $doctormail = $data['email'];
                    $doctorname = $data['name'];
                    $doctormobno = $data['phone'];
                }

                $f3->set('first_name', $firstname);
                $f3->set('last_name', $lastname);
                $f3->set('userID', $user_ID);

                $mobno = $doctormobno;
                $mobno = str_replace('+', '', $mobno);
                $mobno = str_replace('-', '', $mobno);
                $mobno = str_replace(' ', '', $mobno);

                $mssge = "Du har fået en ny besked i NoDep";



                if (isset($mssge) && isset($mobno)) {
                    if ($mssge && $mobno) {
                        $this->sendSuicideRiskSMS($f3, $mssge, $mobno);
                    }
                }

                //MAIL
                $body = \Template::instance()->render('mail/therapist_suicidal_risk.htm');
                $message = $body;
                $to = $doctormail;
                $subject = "Suicidal risk";


                $this->sendSuicidalRiskMail($f3, $to, $subject, $message);
            }
            $response->reset();
        }

        return true;
    }
    
     /* this function validates and saves response */
     function process_form_inputs($f3, $questionnaire_id, $step, $data) {

        // response validate
        switch ($data['templateid']) {
            case "1":
                //introduction template needs no validation
                return true;
                break;
            case "2":
                //introduction video template needs no validation
                return true;
                break;
            case "3":
                return true;
                break;
            case "4":
               
                    // ###### start 
                   
                    if (!isset($data['mainRadio'])) {
                        throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                        return false;
                    }
                    if($data['mainRadio'] == "Ja")
                    {
                        if(isset($data['option']) && $data['option']!="")
                        {
                            $option = $data['option'];

                            if(sizeof($data['txt'.$option]) != 0 && $data['txt'.$option][0]!= "")
                            {
                                
                                // new code
                                $response = new Response_New($f3->get('DB'));
                                $response->quiz_id = $data['quiz'];
                                $response->question_id = $data['questionid'];
                                $response->option_id = 0;
                                $response->option_additional_remarks = "";
                                $response->option_value = $data['mainRadio'];
                                $response->responded_on = date('Y-m-d H:i:s', time());
                                $response->save();
                                
                                // second
                                $response = new Response_New($f3->get('DB'));
                                $response->quiz_id = $data['quiz'];
                                $response->question_id = $data['questionid'];
                                $response->option_id = isset($data['option'])? $data['option'] : 0;
                                $response->option_additional_remarks = "";
                                $response->option_value = implode(" , og antal timer/ugen: ", $data['txt'.$option]);
                                $response->responded_on = date('Y-m-d H:i:s', time());
                                $response->issuboption = 1;
                                $response->save();
                               
                            }
                            else
                            {
                                throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                                return false;
                            }
                        }
                        else
                        {
                            throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                            return false;
                        }

                    }
                    else
                    {
                        // new code
                        $response = new Response_New($f3->get('DB'));
                        $response->quiz_id = $data['quiz'];
                        $response->question_id = $data['questionid'];
                        $response->option_id = 0;
                        $response->option_additional_remarks = "";
                        $response->option_value = $data['mainRadio'];
                        $response->responded_on = date('Y-m-d H:i:s', time());
                        $response->save();
                    }
                  
                    return true;
                    // end
                    break;
                
                case "5":
                    // ###### start 
                    $response = new Response_New($f3->get('DB'));
                    $response->quiz_id = $data['quiz'];
                    $response->question_id = $data['questionid'];

                    if (!isset($data['option'])) {
                        throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                        return false;
                    }
                    
                    $response->option_id = $data['option'];
                    $response->responded_on = date('Y-m-d H:i:s', time());
                    $response->save();
                    return true;
                    // end
                    break;
                    
                case "6":
                
                    // ###### start 
                  
                    if (!isset($data['mainRadio'])) {
                        throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                        return false;
                    }
                    if($data['mainRadio'] == "Ja")
                    {
                        if(isset($data['option']) && $data['option']!="")
                        {
                            $option = $data['option'];

                            if(sizeof($data['txt'.$option]) != 0 && $data['txt'.$option][0]!= "")
                            {
                                
                                // new code
                                $response = new Response_New($f3->get('DB'));
                                $response->quiz_id = $data['quiz'];
                                $response->question_id = $data['questionid'];
                                $response->option_id = 0;
                                $response->option_additional_remarks = "";
                                $response->option_value = $data['mainRadio'];
                                $response->responded_on = date('Y-m-d H:i:s', time());
                                $response->save();
                                
                                // second
                                $response = new Response_New($f3->get('DB'));
                                $response->quiz_id = $data['quiz'];
                                $response->question_id = $data['questionid'];
                                $response->option_id = isset($data['option'])? $data['option'] : 0;
                                $response->option_additional_remarks = "";
                                $response->option_value = implode(" , ", $data['txt'.$option]);
                                $response->responded_on = date('Y-m-d H:i:s', time());
                                $response->issuboption = 1;
                                $response->save();
                               
                            }
                            else
                            {
                                throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                                return false;
                            }
                        }
                        else
                        {
                            throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                            return false;
                        }

                    }
                    else
                    {
                        // new code
                        $response = new Response_New($f3->get('DB'));
                        $response->quiz_id = $data['quiz'];
                        $response->question_id = $data['questionid'];
                        $response->option_id = 0;
                        $response->option_additional_remarks = "";
                        $response->option_value = $data['mainRadio'];
                        $response->responded_on = date('Y-m-d H:i:s', time());
                        $response->save(); 
                    }

                    return true;
                    // end
                    break;
                  
                case "7":
                    // ###### start 
                    $response = new Response_New($f3->get('DB'));
                    $response->quiz_id = $data['quiz'];
                    $response->question_id = $data['questionid'];

                    if (!isset($data['option'])) {
                        throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                        return false;
                    }
                    
                    $response->option_id = $data['option'];
                    $option = $data['option'];
                   
                    if(isset ($data['txt'.$option]))
                    {
                        $response->option_value = implode(",", $data['txt'.$option]);
                    }
                    
                    $response->responded_on = date('Y-m-d H:i:s', time());
                    $response->save();
                    return true;
                    // end
                    break;
                    
                case "8":
                    // ###### start 
                     // ###### start 
                    $response = new Response_New($f3->get('DB'));
                    $response->quiz_id = $data['quiz'];
                    $response->question_id = $data['questionid'];

                    if (!isset($data['option'])) {
                        throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                        return false;
                    }
                    
                    $response->option_id = $data['option'];
                    $response->responded_on = date('Y-m-d H:i:s', time());
                    $response->save();
                    return true;
                    // end
                    break;
                   
               case "9":
                    // ###### start 
                  

                    if (!isset($data['mainRadio'])) {
                        throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                        return false;
                    }
                    if($data['mainRadio'] == "Ja")
                    {
                     
                        if(isset($data['option']) && $data['option']!="")
                        {
                            $option = $data['option'];

                            if(sizeof($data['txt'.$option]) != 0 && $data['txt'.$option][0]!= "")
                            {
                                // new code
                                $response = new Response_New($f3->get('DB'));
                                $response->quiz_id = $data['quiz'];
                                $response->question_id = $data['questionid'];
                                $response->option_id = 0;
                                $response->option_additional_remarks = "";
                                $response->option_value = $data['mainRadio'];
                                $response->responded_on = date('Y-m-d H:i:s', time());
                                $response->save();
                                
                                // second
                                $response = new Response_New($f3->get('DB'));
                                $response->quiz_id = $data['quiz'];
                                $response->question_id = $data['questionid'];
                                $response->option_id = isset($data['option'])? $data['option'] : 0;
                                $response->option_additional_remarks = "";
                                $response->option_value = implode(" , ", $data['txt'.$option]);
                                $response->responded_on = date('Y-m-d H:i:s', time());
                                $response->issuboption = 1;
                                $response->save();
                           
                            }
                            else
                            {
                                throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                                return false;
                            }
                        }
                        else
                        {
                            throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                            return false;
                        }

                    }
                    else
                    {
                        // new code
                        $response = new Response_New($f3->get('DB'));
                        $response->quiz_id = $data['quiz'];
                        $response->question_id = $data['questionid'];
                        $response->option_id = 0;
                        $response->option_additional_remarks = "";
                        $response->option_value = $data['mainRadio'];
                        $response->responded_on = date('Y-m-d H:i:s', time());
                        $response->save(); 
                    }

                    return true;
                    // end
                    break;
                    
                 case "10":
                
                    // ###### start 
                  

                    if (!isset($data['mainRadio'])) {
                        throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                        return false;
                    }
                    if($data['mainRadio'] == "Ja")
                    {
                        if(isset($data['option']) && $data['option']!="")
                        {
                            
                                // checking for empty options given
                                if(($data['txtprepare0'] == "") && ($data['txtprepare1'] == "")  && ($data['txtprepare2'] == "")  && ($data['txtprepare3'] == "")  && ($data['txtprepare4'] == "") )
                                {
                                    throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                                    return false;
                                }
                            
                                // new code
                                $response = new Response_New($f3->get('DB'));
                                $response->quiz_id = $data['quiz'];
                                $response->question_id = $data['questionid'];
                                $response->option_id = 0;
                                $response->option_additional_remarks = "";
                                $response->option_value = $data['mainRadio'];
                                $response->responded_on = date('Y-m-d H:i:s', time());
                                $response->save();
                                
                               
                                //// old
                                // saving options
                                $response->option_id = $data['option'];
                                
                                $arr = array();
                                if(isset($data['txtprepare0']) && trim($data['txtprepare0']) != "" )
                                {
                                    $medicine = $data['txtprepare0'];
                                    $dosage = "";
                                    if(isset($data['txt0'])  && trim($data['txt0']) != ""){
                                        $dosage = $data['txt0'];
                                    }
                                    
                                    $response = new Response_New($f3->get('DB'));
                                    $response->quiz_id = $data['quiz'];
                                    $response->question_id = $data['questionid'];
                                    $response->option_id = isset($data['option'])? $data['option'] : 0;
                                    $response->option_additional_remarks = $dosage;
                                    $response->option_value = $medicine;
                                    $response->responded_on = date('Y-m-d H:i:s', time());
                                    $response->issuboption = 1;
                                    $response->save();
                                    
                                }
                                if(isset($data['txtprepare1']) && trim($data['txtprepare1']) != "" )
                                {
                                    $medicine = $data['txtprepare1'];
                                    $dosage = "";
                                    if(isset($data['txt1'])  && trim($data['txt1']) != ""){
                                        $dosage = $data['txt1'];
                                    }
                                    
                                    $response = new Response_New($f3->get('DB'));
                                    $response->quiz_id = $data['quiz'];
                                    $response->question_id = $data['questionid'];
                                    $response->option_id = isset($data['option'])? $data['option'] : 0;
                                    $response->option_additional_remarks = $dosage;
                                    $response->option_value = $medicine;
                                    $response->responded_on = date('Y-m-d H:i:s', time());
                                    $response->issuboption = 1;
                                    $response->save();
                                }
                                if(isset($data['txtprepare2']) && trim($data['txtprepare2']) != "" )
                                {
                                    $medicine = $data['txtprepare2'];
                                    $dosage = "";
                                    if(isset($data['txt2'])  && trim($data['txt2']) != ""){
                                        $dosage = $data['txt2'];
                                    }
                                    
                                    $response = new Response_New($f3->get('DB'));
                                    $response->quiz_id = $data['quiz'];
                                    $response->question_id = $data['questionid'];
                                    $response->option_id = isset($data['option'])? $data['option'] : 0;
                                    $response->option_additional_remarks = $dosage;
                                    $response->option_value = $medicine;
                                    $response->responded_on = date('Y-m-d H:i:s', time());
                                    $response->issuboption = 1;
                                    $response->save();
                                }
                                if(isset($data['txtprepare3']) && trim($data['txtprepare3']) != "" )
                                {
                                    $medicine = $data['txtprepare3'];
                                    $dosage = "";
                                    if(isset($data['txt3'])  && trim($data['txt3']) != ""){
                                        $dosage = $data['txt3'];
                                    }
                                    
                                    $response = new Response_New($f3->get('DB'));
                                    $response->quiz_id = $data['quiz'];
                                    $response->question_id = $data['questionid'];
                                    $response->option_id = isset($data['option'])? $data['option'] : 0;
                                    $response->option_additional_remarks = $dosage;
                                    $response->option_value = $medicine;
                                    $response->responded_on = date('Y-m-d H:i:s', time());
                                    $response->issuboption = 1;
                                    $response->save();
                                }
                                if(isset($data['txtprepare4']) && trim($data['txtprepare4']) != "" )
                                {
                                    $medicine = $data['txtprepare4'];
                                    $dosage = "";
                                    if(isset($data['txt4'])  && trim($data['txt4']) != ""){
                                        $dosage = $data['txt4'];
                                    }
                                    
                                    $response = new Response_New($f3->get('DB'));
                                    $response->quiz_id = $data['quiz'];
                                    $response->question_id = $data['questionid'];
                                    $response->option_id = isset($data['option'])? $data['option'] : 0;
                                    $response->option_additional_remarks = $dosage;
                                    $response->option_value = $medicine;
                                    $response->responded_on = date('Y-m-d H:i:s', time());
                                    $response->issuboption = 1;
                                    $response->save();
                                }
                                

                        }
                        else
                        {
                            throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                            return false;
                        }

                    }
                    else
                    {
                        // new code
                        $response = new Response_New($f3->get('DB'));
                        $response->quiz_id = $data['quiz'];
                        $response->question_id = $data['questionid'];
                        $response->option_id = 0;
                        $response->option_additional_remarks = "";
                        $response->option_value = $data['mainRadio'];
                        $response->responded_on = date('Y-m-d H:i:s', time());
                        $response->save(); 
                    }

                   
                    return true;
                    // end
                    break;
                    
                case "11":
                    // ###### start 
                    $response = new Response_New($f3->get('DB'));
                    $response->quiz_id = $data['quiz'];
                    $response->question_id = $data['questionid'];

                    if (!isset($data['option'])) {
                        throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                        return false;
                    }
                    $option = $data['option'];
                    $response->option_id = $data['option'];
                    $response->option_value = $data['txt'.$option];
                    $response->responded_on = date('Y-m-d H:i:s', time());
                    $response->save();
                    return true;
                    // end
                    break;
                    
                case "12":
                    // ###### start 
                   
                    // checking if all questions have answers
                    foreach ($data['options'] as $key => $value) {
                       if(!isset ($value) || $value == "")
                       {
                            throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                            return false;
                       }
                    }
                   
                    // saving answers now
                    foreach ($data['options'] as $key => $value) {
                        $response = new Response_New($f3->get('DB'));
                        $response->quiz_id = $data['quiz'];
                        $response->question_id = $data['questionid'];
                        $response->option_id = $key;
                        $response->option_value = $value;
                        $response->responded_on = date('Y-m-d H:i:s', time());
                        $response->save();
                    }
                    
                  
                    // checking and saving additional MCQ
                    if(isset ($data['additionalQuestionAnswer']))
                    { 
                        $response = new Response_New($f3->get('DB'));
                        $additionalReponsetext = new Options_New($f3->get('DB'));
                        if(isset ($data['additionalQuestionAnswer']) && $data['additionalQuestionAnswer'] != "")
                        {
                           $additionalReponsetext->getbyId($data['additionalQuestionAnswer']);
                           $response->option_value = $additionalReponsetext->option_text;
                        }
                        else
                        {
                            $response->option_value = "";
                        }
                        
                        $response->quiz_id = $data['quiz'];
                        $response->question_id = $data['questionid'];
                        $response->option_id = $data['additionalQuestionId'];
                        $response->responded_on = date('Y-m-d H:i:s', time());
                        $response->isoptional = 1;
                        $response->save();  
                        
                         
                    }
                    
                    return true;
                    // end
                    break;
                    
                case "13":
                    exit;
                    // ###### start 
                    $response = new Response_New($f3->get('DB'));
                    $response->quiz_id = $data['quiz'];
                    $response->question_id = $data['questionid'];

                    if (!isset($data['option'])) {
                        throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                        return false;
                    }
                    
                    $response->option_id = $data['option'];
                    $response->responded_on = date('Y-m-d H:i:s', time());
                    $response->save();
                   
                    return true;
                    // end
                    break;
                    
                case "14":
                    // ###### start 
                   
                    // checking if all questions are answered
                    $optionsthis = new Options_New($f3->get('DB'));
                    $optionslist = $optionsthis->getOptionsByQuestionId($data['questionid']);
                    
                    foreach ($optionslist as $optionsingle)
                    {
                        if(!(isset($data['radio'.$optionsingle->id]) && ($data['radio'.$optionsingle->id] != "")))
                        {
                           throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                            return false;
                        }
                    }
                    
                    // saving data now
                    foreach ($optionslist as $optionsingle)
                    {
                        $response = new Response_New($f3->get('DB'));
                        $response->quiz_id = $data['quiz'];
                        $response->question_id = $data['questionid'];
                        $response->option_id = $optionsingle->id;
                        $response->option_value = $data['radio'.$optionsingle->id];
                        $response->responded_on = date('Y-m-d H:i:s', time());
                        $response->save();
                    }
                  
                    return true;
                    // end
                    break;
                    
             case "15":
                   
                    // checking if all questions have answers
                    foreach ($data['options'] as $key => $value) {
                       if(!isset ($value) || $value == "")
                       {
                            throw new \InvalidArgumentException('Ups! Der mangler mindst et svar!');
                            return false;
                       }
                    }
                   
                    // saving answers now
                    foreach ($data['options'] as $key => $value) {
                        $response = new Response_New($f3->get('DB'));
                        $response->quiz_id = $data['quiz'];
                        $response->question_id = $data['questionid'];
                        $response->option_id = $key;
                        $response->option_value = $value;
                        $response->responded_on = date('Y-m-d H:i:s', time());
                        $response->save();
                    }
                    
                    return true;
                    // end
                    break;
                    
            case "16":
                    return true;
                    // end
                    break;    
                
                
        }

        
        return true;
    }

    function sendSuicidalMail()
    {
         $f3 = \Base::instance();
        $user_ID = $f3->get('SESSION.id');

        $userdeatils = $f3->get('DB')->exec('SELECT owner_id,id,name,last_name FROM user where id=' . $user_ID);
        foreach ($userdeatils as $key => $data1) {
            $ownerid = $data1['owner_id'];
            $firstname = $data1['name'];
            $lastname = $data1['last_name'];
        }

        $doctordetails = $f3->get('DB')->exec('SELECT email,name,phone,sms_notification FROM user where id=' . $ownerid);
        foreach ($doctordetails as $key => $data) {
            $doctormail = $data['email'];
            $doctorname = $data['name'];
            $doctormobno = $data['phone'];
        }

        $f3->set('first_name', $firstname);
        $f3->set('last_name', $lastname);
        $f3->set('userID', $user_ID);

        $mobno = $doctormobno;
        $mobno = str_replace('+', '', $mobno);
        $mobno = str_replace('-', '', $mobno);
        $mobno = str_replace(' ', '', $mobno);

        $mssge = "Du har fået en ny besked i NoDep";



        if (isset($mssge) && isset($mobno)) {
            if ($mssge && $mobno) {
                $this->sendSuicideRiskSMS($f3, $mssge, $mobno);
            }
        }

        //MAIL
        $body = \Template::instance()->render('mail/therapist_suicidal_risk.htm');
        $message = $body;
        $to = $doctormail;
        $subject = "Suicidal risk";


        $this->sendSuicidalRiskMail($f3, $to, $subject, $message);
    }
    
    /**
     * Check whether array given is really empty
     * @param array $data Data received from post
     * @return bool
     */
    function is_array_empty($data) {
        $result = true;

        if (is_array($data) && count($data) > 0) {
            foreach ($data as $value) {
                $result = $result && $this->is_array_empty($value);
            }
        } else {
            $result = empty($data);
        }

        return $result;
    }

    function advanced_validation($step, $data, $questionnaire) {
        // only for questionnaire 1
        if ($questionnaire == 1) {
            // $step = next step ...
            // for quiz_X.html step = X + 1
            switch ($step) {
                case 6:
                    if (!isset($data['question'][1]))
                        return 'Ups! Der mangler mindst et svar.';
                    if ($data['question'][1]['response'] == 'yes') {
                        if (!isset($data['question'][2]['answer_id']))
                            return 'Ups! Der mangler mindst et svar.';
                        if (!$data['question'][2][$data['question'][2]['answer_id']]['response'])
                            return 'Ups! Der mangler mindst et svar.';
                    }
                    break;
                case 7:
                    if (!isset($data['question'][3]))
                        return 'Ups! Der mangler mindst et svar.';
                    if ($data['question'][3]['response'] == 'yes') {
                        if (!isset($data['question'][4]['answer_id']))
                            return 'Ups! Der mangler mindst et svar.';
                        if (!$data['question'][4][$data['question'][4]['answer_id']]['response'])
                            return 'Ups! Der mangler mindst et svar.';
                    }
                    break;
                case 8:
                    if (!isset($data['question'][6]))
                        return 'Ups! Der mangler mindst et svar.';
                    if (!isset($data['question'][6]['answer_id']))
                        return 'Ups! Der mangler mindst et svar.';
                    if ($data['question'][6]['answer_id'] == 17 and ! $data['question'][6][17]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 10:
                    if (!isset($data['question'][8]))
                        return 'Ups! Der mangler mindst et svar.';
                    if (!isset($data['question'][8]['answer_id']))
                        return 'Ups! Der mangler mindst et svar.';
                    if ($data['question'][8]['answer_id'] == 26 and ! $data['question'][8][26]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 11:
                    if (!isset($data['question'][9]['response']))
                        return 'Ups! Der mangler mindst et svar.';
                    if ($data['question'][9]['response'] == 'yes' and ! $data['question'][9]['response_value'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 13:
                    if (!isset($data['question'][11]['response']))
                        return 'Ups! Der mangler mindst et svar.';
                    if ($data['question'][11]['response'] == 'yes' and ! $data['question'][11]['response_value'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 14:
                    if (!isset($data['question'][12]))
                        return 'Ups! Der mangler mindst et svar.';
                    if ($data['question'][12]['response'] == 'yes' and $this->is_array_empty($data['question'][13]))
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 23:
                    if (!$data['question'][21][59]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][21][60]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][21][61]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][21][62]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][21][63]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][21][64]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 24:
                    if (!$data['question'][22][65]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][22][66]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][22][67]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][22][68]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][22][69]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 25:
                    if (!$data['question'][23][70]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][23][71]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][23][72]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][23][73]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][23][74]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 37:
                    // must be one or another
                    if (!(isset($data['question'][34]) || isset($data['question'][35])))
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 38:
                    // must be one or another
                    if (!(isset($data['question'][36]) || isset($data['question'][37])))
                        return 'Ups! Der mangler mindst et svar.';
                    break;
            }
        } elseif ($questionnaire == 2) {
            switch ($step) {
                case 2:
                    if (!$data['question'][82][235]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][82][236]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][82][237]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][82][238]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][82][239]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][82][240]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 3:
                    if (!$data['question'][156][241]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][156][242]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][156][243]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][156][244]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][156][245]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][156][246]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 4:
                    if (!(isset($data['question'][157]) || isset($data['question'][157])))
                        return 'Ups! Der mangler mindst et svar.';
                    break;
            }
        } else if ($questionnaire == 6) {
            // $step = next step ...
            // for quiz_X.html step = X + 1
            switch ($step) {
                case 3:
                    if (!isset($data['question'][1]))
                        return 'Ups! Der mangler mindst et svar.';
                    if ($data['question'][1]['response'] == 'yes') {
                        if (!isset($data['question'][2]['answer_id']))
                            return 'Ups! Der mangler mindst et svar.';
                        if (!$data['question'][2][$data['question'][2]['answer_id']]['response'])
                            return 'Ups! Der mangler mindst et svar.';
                    }
                    break;
                case 4:
                    if (!isset($data['question'][3]))
                        return 'Ups! Der mangler mindst et svar.';
                    if ($data['question'][3]['response'] == 'yes') {
                        if (!isset($data['question'][4]['answer_id']))
                            return 'Ups! Der mangler mindst et svar.';
                        if (!$data['question'][4][$data['question'][4]['answer_id']]['response'])
                            return 'Ups! Der mangler mindst et svar.';
                    }
                    break;
                case 5:
                    if (!isset($data['question'][6]))
                        return 'Ups! Der mangler mindst et svar.';
                    if (!isset($data['question'][6]['answer_id']))
                        return 'Ups! Der mangler mindst et svar.';
                    if ($data['question'][6]['answer_id'] == 17 and ! $data['question'][6][17]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 7:
                    if (!isset($data['question'][8]))
                        return 'Ups! Der mangler mindst et svar.';
                    if (!isset($data['question'][8]['answer_id']))
                        return 'Ups! Der mangler mindst et svar.';
                    if ($data['question'][8]['answer_id'] == 26 and ! $data['question'][8][26]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 8:
                    if (!isset($data['question'][9]['response']))
                        return 'Ups! Der mangler mindst et svar.';
                    if ($data['question'][9]['response'] == 'yes' and ! $data['question'][9]['response_value'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 10:
                    if (!isset($data['question'][11]['response']))
                        return 'Ups! Der mangler mindst et svar.';
                    if ($data['question'][11]['response'] == 'yes' and ! $data['question'][11]['response_value'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 11:
                    if (!isset($data['question'][12]))
                        return 'Ups! Der mangler mindst et svar.';
                    if ($data['question'][12]['response'] == 'yes' and $this->is_array_empty($data['question'][13]))
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 20:
                    if (!$data['question'][21][59]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][21][60]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][21][61]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][21][62]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][21][63]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][21][64]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 21:
                    if (!$data['question'][22][65]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][22][66]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][22][67]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][22][68]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][22][69]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 22:
                    if (!$data['question'][23][70]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][23][71]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][23][72]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][23][73]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    if (!$data['question'][23][74]['response'])
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 34:
                    // must be one or another
                    if (!(isset($data['question'][34]) || isset($data['question'][35])))
                        return 'Ups! Der mangler mindst et svar.';
                    break;
                case 35:
                    // must be one or another
                    if (!(isset($data['question'][36]) || isset($data['question'][37])))
                        return 'Ups! Der mangler mindst et svar.';
                    break;
            }
        }

        return false;
    }

    function beforeRoute($f3) {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }

    function getuserrule($f3, $user_id) {
        $user_step = new Quizuserrules($f3->get('DB'));
        return $user_step->userquizSteps($f3, $user_id);
    }

    function updateuserrule($f3, $user_id, $step_id) {


        $user_step = new Quizuserrules($f3->get('DB'));
        return $user_step->updatequizSteps($f3, $user_id, $step_id);
    }

    function ofcchart($f3) {
        $data_1 = array();
        $labels = array();

        $user_id = $f3->get('SESSION.id');

        $litequizdetails = $f3->get('DB')->exec('SELECT SUM(R.response)as total,Q.id,Q.taken_by FROM quiz Q, response R WHERE Q.questionnaire_id=2 AND Q.taken_by=' . $user_id . ' AND Q.id=R.quiz_id GROUP BY R.quiz_id');
        for ($i = 0; $i < count($litequizdetails); $i++) {
            $litequiz = $litequizdetails[$i];
            $data_1[] = $litequiz['total'];
            $step_value = $i + 1;
            $labels[] = $step_value;
        }
        $graph_data = json_encode($data_1);
        // $graph_data  = json_
        $graph_Label = json_encode($labels);
        $f3->set('gdatas', $graph_data);
        $f3->set('glabels', $graph_Label);
        /* echo json_encode(array('status' => 'success','datastr'=>$data_1,'labels'=>$labels));
          exit; */
        //echo $graph_data;
        // echo \Template::instance()->render('dashboard/section.graph');
    }

    function questionaire_mail_notification($f3) {
        $qusID = $_REQUEST['qusid'];
        if ($qusID == 2) {
            $user_ID = $f3->get('SESSION.id');
            $userdeatils = $f3->get('DB')->exec('SELECT owner_id,id,name,last_name FROM user where id=' . $user_ID);
            foreach ($userdeatils as $key => $data1) {
                $ownerid = $data1['owner_id'];
                $firstname = $data1['name'];
                $lastname = $data1['last_name'];
            }

            $doctordetails = $f3->get('DB')->exec('SELECT email,name FROM user where id=' . $ownerid);
            foreach ($doctordetails as $key => $data) {
                $doctormail = $data['email'];
                $doctorname = $data['name'];
            }
            $f3->set('first_name', $firstname);
            $f3->set('last_name', $lastname);
            $f3->set('userID', $user_ID);
            $f3->set('message', ' Lite spørgeskema udfyldes.');
            /*
              require_once(__DIR__.'/../../3rdparty/smtp-mail/class.phpmailer.php');
              $mail = new \PHPMailer;

              $body = \Template::instance()->render('mail/questionaire_notification_doctor.htm');
              $mail->IsSMTP(); // telling the class to use SMTP
              $mail->SetFrom('admin@totem.com', 'NoDep');
              $mail->AddAddress($doctormail, $doctorname);
              $mail->Subject = "Spørgeskemaet udfyldes";
              $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
              $mail->MsgHTML($body);
              $mail->Send(); */

            //MAIL
           /* $body = \Template::instance()->render('mail/questionaire_notification_doctor.htm');
            $message = $body;
            $to = $doctormail;
            $subject = "Spørgeskemaet udfyldes";
            $this->sendQuestionaireMail($f3, $to, $subject, $message);
*/
            echo json_encode(array('status' => 'success', 'statusID' => 100));
            exit;
        } elseif ($qusID == 1) {

            $user_ID = $f3->get('SESSION.id');
            $userdeatils = $f3->get('DB')->exec('SELECT owner_id,id,name,last_name FROM user where id=' . $user_ID);
            foreach ($userdeatils as $key => $data1) {
                $ownerid = $data1['owner_id'];
                $firstname = $data1['name'];
                $lastname = $data1['last_name'];
            }

            $doctordetails = $f3->get('DB')->exec('SELECT email,name FROM user where id=' . $ownerid);
            foreach ($doctordetails as $key => $data) {
                $doctormail = $data['email'];
                $doctorname = $data['name'];
            }
            $f3->set('first_name', $firstname);
            $f3->set('last_name', $lastname);
            $f3->set('userID', $user_ID);
            $f3->set('message', ' Big spørgeskema udfyldes.');
            /*
              require_once(__DIR__.'/../../3rdparty/smtp-mail/class.phpmailer.php');
              $mail = new \PHPMailer;

              $body = \Template::instance()->render('mail/questionaire_notification_doctor.htm');
              $mail->IsSMTP(); // telling the class to use SMTP
              $mail->SetFrom('admin@totem.com', 'NoDep');
              $mail->AddAddress($doctormail, $doctorname);
              $mail->Subject = "Spørgeskemaet udfyldes";
              $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
              $mail->MsgHTML($body);
              $mail->Send();

             *              */

            //MAIL
           /* $body = \Template::instance()->render('mail/questionaire_notification_doctor.htm');
            $message = $body;
            $to = $doctormail;
            $subject = "Spørgeskemaet udfyldes";
            $this->sendQuestionaireMail($f3, $to, $subject, $message);
*/
            echo json_encode(array('status' => 'success', 'statusID' => 100));
            exit;
        } elseif ($qusID == 6) {

            $user_ID = $f3->get('SESSION.id');
            $userdeatils = $f3->get('DB')->exec('SELECT owner_id,id,name,last_name FROM user where id=' . $user_ID);
            foreach ($userdeatils as $key => $data1) {
                $ownerid = $data1['owner_id'];
                $firstname = $data1['name'];
                $lastname = $data1['last_name'];
            }

            $doctordetails = $f3->get('DB')->exec('SELECT email,name FROM user where id=' . $ownerid);
            foreach ($doctordetails as $key => $data) {
                $doctormail = $data['email'];
                $doctorname = $data['name'];
            }
            $f3->set('first_name', $firstname);
            $f3->set('last_name', $lastname);
            $f3->set('userID', $user_ID);
            $f3->set('message', 'sjette spørgeskema udfyldes.');
            /*  require_once(__DIR__.'/../../3rdparty/smtp-mail/class.phpmailer.php');
              $mail = new \PHPMailer;

              $body = \Template::instance()->render('mail/questionaire_notification_doctor.htm');
              $mail->IsSMTP(); // telling the class to use SMTP
              $mail->SetFrom('admin@totem.com', 'NoDep');
              $mail->AddAddress($doctormail, $doctorname);
              $mail->Subject = "Spørgeskemaet udfyldes";
              $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
              $mail->MsgHTML($body);
              $mail->Send(); */

            //MAIL
            /*$body = \Template::instance()->render('mail/questionaire_notification_doctor.htm');
            $message = $body;
            $to = $doctormail;
            $subject = "Spørgeskemaet udfyldes";
            $this->sendQuestionaireMail($f3, $to, $subject, $message);
*/
            echo json_encode(array('status' => 'success', 'statusID' => 100));
            exit;
        }

        echo json_encode(array('status' => 'failed', 'statusID' => $qusID));
        exit;
    }

    /*
    public function sendQuestionaireMail($f3, $to, $subject, $message) {
        //$subject = "Besked i NoDep";
        // To send HTML mail
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'From: NoDep <admin@internetpsykiatrien.com>' . "\r\n";
        $headers .= 'Bcc: pradeep@atdrive.com' . "\r\n";
        // Mail it
        mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
    }
*/
    public function sendSuicidalRiskMail($f3, $to, $subject, $message) {
        //$subject = "Besked i NoDep";
        // To send HTML mail
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'From: NoDep <admin@internetpsykiatrien.com>' . "\r\n";
        $headers .= 'Bcc: pradeep@atdrive.com' . "\r\n";
        //$headers .= 'Bcc: rajeesh.vr@sherston.com' . "\r\n";
        //$headers .= 'Bcc: sreejith.rajan@sherston.com' . "\r\n";
        // Mail it
        mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers, '-frajeesh.vr@sherston.com');
    }

    public function sendSuicideRiskSMS($f3, $message, $mobnum) {
		
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

}
