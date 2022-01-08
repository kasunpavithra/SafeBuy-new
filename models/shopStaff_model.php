<?php
class shopStaff_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getDetails($id)
    {
        $sql = "SELECT * FROM STAFF WHERE Staff_id='".$id."'";
        return $this->db->runQuery($sql);
        
    }
    function getCustomers(){
        $customers =  $this->db->runQuery("SELECT Customer_id,Name FROM customer");
        return $customers;
    }
    function sendMessage($customer,$msg,$status){
        $query = "INSERT INTO chat (customer_id,message,status) VALUES ('" . $customer . "','" . $msg . "','" . $status . "')";
        return $this->db->insertQuery($query);
    }
}
