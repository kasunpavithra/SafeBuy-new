<?php
class Chat_Model extends Model{
    function __construct()
    {
        parent::__construct();
    }

   function getChatData($chat_id){
       $arr =  $this->db->runQuery("SELECT * FROM CHAT WHERE CHAT_ID=$chat_id");
      
       return $arr;
   }

}
