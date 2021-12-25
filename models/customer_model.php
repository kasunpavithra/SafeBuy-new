<?php
class Customer_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
    }
    function getDetails($id)
    {
        $sql = "SELECT * FROM CUSTOMER WHERE Customer_id='" . $id . "'";
        return $this->db->runQuery($sql);
    }
    function getData()
    {
        return $this->db->runQuery("SELECT * from users");
    }
    function saveImage($sql)
    {
        return $this->db->insertQuery($sql);
    }
    function saveEmail($sql)
    {
        return $this->db->insertQuery($sql);
    }
    function savePassword($sql)
    {
        return $this->db->insertQuery($sql);
    }
    function getPassword($userID)
    {
        $sql = "select Password from customer where Customer_id= '" . $_SESSION['userID'] . "'";
        $row = $this->db->runQuery($sql);
        // print_r($row);
        return $row[0]["Password"];
    }
    function saveInfo($sql)
    {
        return $this->db->runQuery($sql);
    }
    function getCategory()
    {
        // print_r($this->db->runQuery("SELECT * FROM CATEGORY"));
        return $this->db->runQuery("SELECT * FROM CATEGORY");
    }
    function getItems($categoryID)
    {
        // print_r($this->db->runQuery("SELECT * FROM CATEGORY"));
        return $this->db->runQuery("SELECT * FROM ITEM WHERE CATEGORY_ID='" . $categoryID . "'");
    }
    function addItemtoCart($itemID, $quantity)
    {
        $query = "INSERT INTO CART_ITEMSTEMP (CART_ID,ITEM_ID,QUANTITY,ORDERED) VALUES ('3','" . $itemID . "','" . $quantity . "','0')";
        echo $query;
        return $this->db->insertQuery($query);
    }

    function checkAlreadyIn($itemID)
    {
        $arrayOfItems = $this->db->runQuery("SELECT ITEM_ID,ORDERED FROM CART_ITEMSTEMP");
        foreach ($arrayOfItems as $key => $value) {

            if (($value)[0] == $itemID && ($value)[1] == 0) {
                return true;
            }
        }
        return false;
    }

    function UpdateItemtoCart($itemID, $quantity)
    {
        $prevQuan = $this->db->runQuery("SELECT QUANTITY FROM CART_ITEMSTEMP WHERE ITEM_ID='" . $itemID . "'")[0][0];
        $newQuantity = $quantity + $prevQuan;
        $query = "UPDATE CART_ITEMSTEMP SET QUANTITY='" . $newQuantity . "' WHERE ITEM_ID='" . $itemID . "'";
        return $this->db->insertQuery($query);
    }
}
