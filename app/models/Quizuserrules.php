<?php

namespace models;

/**
 *
 * @property mixed id
 */
class Quizuserrules extends \DB\SQL\Mapper
{

    // Instantiate mapper
    function __construct(\DB\SQL $db)
    {

        $f3 = \Base::instance();
        parent::__construct($db, 'user_quiz_step');
       

    }

   
// get all steps and templates===================

    
     public function quizSteps($f3) {
     
       return $f3->get('DB')->exec('SELECT * from quiz_rules');
        
    }

// get user step------------------

    public function userquizSteps($f3,$user_id) {
     
       return $f3->get('DB')->exec('SELECT * from user_quiz_step where user_id='.$user_id);
        
    }
    
// add/update user step------------------

    public function updatequizSteps($f3,$user_id,$step_id) {
     
       $step_data= $f3->get('DB')->exec('SELECT * from user_quiz_step where user_id='.$user_id);
       
       if($step_data){
            
           $f3->get('DB')->exec("update user_quiz_step set step_id=".$step_id.",create_at='".date('Y-m-d h:i:s')."' where user_id=".$user_id);
       }else{
          $f3->get('DB')->exec("insert into user_quiz_step (user_id,step_id,create_at) values(".$user_id.",".$step_id.",'".date('Y-m-d h:i:s')."')");
       }
        
       // $f3 = \Base::instance();
        
       /*
        $this->set("user_id", $user_id);
        $this->set("step_id", $step_id);
        $this->set('create_at', date('Y-m-d H:i:s'));
        $this->save();
         */
          
       return true;
        
    }
    
// get step name by id and template details------------------

   public function getStepName($f3,$step_id) {
     
       return $f3->get('DB')->exec('SELECT * from quiz_rules where id='.$step_id);
        
    }
   
}
