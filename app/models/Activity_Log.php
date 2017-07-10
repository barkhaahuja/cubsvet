<?php

namespace models;

/**
 * @property  current_step
 * @property mixed create_date
 */
class Activity_Log extends \DB\SQL\Mapper {

    // Instantiate mapper
    function __construct(\DB\SQL $db) {

        $f3 = \Base::instance();

        // This is where the mapper and DB structure synchronization occurs
        parent::__construct($f3->get('DB'), 'activity_log');
    }
    
    public function getbyId($id)
    {
        $this->reset();
        $this->load(array('id = '.$id));
    }
    
    public function LogActivity($user_id, $text, $params, $patientid)
    {
        if(($user_id != "") && ($user_id > 0))
        {
           $f3 = \Base::instance();
           $sql = "INSERT INTO activity_log (userid, activity_text, parameters, createdon, patientid) VALUES ($user_id, '$text' , '$params' ,'".date('Y-m-d H:i:s', time())."', ".(($patientid == "")? 'NULL':$patientid ).")";
           $userdetails = $f3->get('DB')->exec($sql);
        }
      
    }
    
    public function GetActivityLog($user_id)
    {
        if(($user_id != "") && ($user_id > 0))
        {
            $f3 = \Base::instance();
         
			 
            //deleting all with login date prior to 6 months
           $currentTime = date('Y-m-d H:i:s', time());
           $newdate = strtotime ( '-180 days' , strtotime ( $currentTime ) ) ;
           $sixmonthsbefore = date ( 'Y-m-j H:i:s' , $newdate );

           $deletelogs = $f3->get('DB')->exec("delete from activity_log where createdon < '". $sixmonthsbefore ."'" );
           // end
           $sql = "";
           if($f3->get('SESSION.group_id') == 3)
           {
                $sql = "select id, CONCAT_WS('', activity_text, (select email from user where id = activity_log.patientid)) as activity_text, parameters, createdon, userid, patientid from activity_log where userid = ". $user_id. " order by createdon desc, id desc";
           }
           else
           {
                $sql = "select id, CONCAT_WS('', activity_text, (select id from user where id = activity_log.patientid)) as activity_text, parameters, createdon, userid, patientid from activity_log where userid = ". $user_id. " order by createdon desc, id desc";
           }
          
           $userdetails = $f3->get('DB')->exec($sql);
           return $userdetails; 
		  
        }
    }
    
}
