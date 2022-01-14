<?php
class Notification_Model extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function printSomething(){
  
    }
    function getDetails($not_id){
        return $this->db->runQuery("SELECT * FROM customernotification WHERE CustomerNotificationID=$not_id");
    }

}
