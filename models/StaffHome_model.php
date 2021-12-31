<?php
class StaffHome_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
    }
    function getData()
    {
        return $this->db->runQuery("SELECT * from users");
    }
    function getCategory()
    {
        // print_r($this->db->runQuery("SELECT * FROM CATEGORY"));
        return $this->db->runQuery("SELECT * FROM CATEGORY");
    }
    function getItems($categoryId)
    {
        return $this->db->runQuery("SELECT * FROM ITEM WHERE CATEGORY_ID='" . $categoryId . "'");
    }
    function addCategory($name, $desc)
    {
        $sql = "INSERT INTO CATEGORY (CATEGORY_NAME,DESCRIPTION) VALUES ('" . $name . "','" . $desc . "')";
        return $this->db->insertQuery($sql);
    }
}
