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
}
