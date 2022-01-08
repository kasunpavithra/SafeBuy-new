<?php

class GenaralStaff_Model extends Model{
    function __construct(){
        parent:: __construct();
    }
    function sendMessage($customerId,$msg,$status){
        $sql = "INSERT INTO chat (customer_id,message,status) VALUES ($customerId,$msg,$status)";
        return $this->db->insertQuery($sql);
        
    }

}
?>