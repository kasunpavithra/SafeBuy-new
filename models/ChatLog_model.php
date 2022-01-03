<?php
class ChatLog_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function printSomething()
    {
    }

    function getChatIDList($customer_id)
    { 
        $arr =  $this->db->runQuery("SELECT chat_id FROM CHAT WHERE CUSTOMER_ID='$customer_id'");
       
        return $arr;
    }
}
