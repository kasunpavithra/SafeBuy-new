<?php
class Menu_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function getMenuDetails(){
        $menuDetails =  $this->db->runQuery("SELECT itemID FROM item");
        return $menuDetails;
    }
}
?>