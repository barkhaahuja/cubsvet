<?php

namespace models;

/**
 * @property  current_step
 * @property mixed create_date
 */
class Invalid_Logins extends \DB\SQL\Mapper {

    // Instantiate mapper
    function __construct(\DB\SQL $db) {

        $f3 = \Base::instance();

        // This is where the mapper and DB structure synchronization occurs
        parent::__construct($f3->get('DB'), 'invalid_logins');
    }
    
    public function getbyId($id)
    {
        $this->reset();
        $this->load(array('id = '.$id));
    }
    
    public function allInvalidLoginsByOwnerid($ownerid, $ownergroup) {
   
        $f3 = \Base::instance();
        
        //deleting all with login date prior to 6 months
        $currentTime = date('Y-m-d H:i:s', time());
        $newdate = strtotime ( '-180 days' , strtotime ( $currentTime ) ) ;
        $sixmonthsbefore = date ( 'Y-m-j H:i:s' , $newdate );

        $deletelogs = $f3->get('DB')->exec("delete from invalid_logins where logindatetime < '". $sixmonthsbefore ."'" );
        // end
        
        if($ownergroup == 3)
        {
            $userdetails = $f3->get('DB')->exec('SELECT user.id, user.name, user.last_name, user.email, user.phone, invalid_logins.logindatetime  FROM invalid_logins inner join user on user.id = invalid_logins.user_id where (group_id = 1 OR group_id = 2) AND owner_id=' . $ownerid .' order by invalid_logins.logindatetime desc' );
        }
        else if($ownergroup == 4)
        {
            $userdetails = $f3->get('DB')->exec('SELECT user.id, user.name, user.last_name, user.email, user.phone, invalid_logins.logindatetime  FROM invalid_logins inner join user on user.id = invalid_logins.user_id where group_id = 3 order by invalid_logins.logindatetime desc' );
        }
        else if($ownergroup == 5)
        {
            $userdetails = $f3->get('DB')->exec('SELECT user.id, user.name, user.last_name, user.email, user.phone, invalid_logins.logindatetime  FROM invalid_logins inner join user on user.id = invalid_logins.user_id where (group_id = 3 OR group_id = 4 OR group_id = 5) order by invalid_logins.logindatetime desc' );
        }
        
        return $userdetails;
    }
    
    public function insert_invalid_login($user_id)
    {
        if( ($user_id != "") && ($user_id > 0) )
        {
           $f3 = \Base::instance();
           $sql = "INSERT INTO invalid_logins (user_id, logindatetime) VALUES ($user_id, '".date('Y-m-d H:i:s', time())."')";
           $userdetails = $f3->get('DB')->exec( $sql );
        }
      
    }
   
}
