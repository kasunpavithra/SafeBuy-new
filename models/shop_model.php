<?php
class Shop_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getStaffList()
    {
        $sql = "SELECT Staff_id,"."Type"." FROM STAFF";
        return $this->db->runQuery($sql);
    }
}
