<?php
class ShopManager_Model extends Model
{
  function __construct()
  {
    parent::__construct();
  }

  function printSomething()
  {
  }
  function getData()
  {
    return $this->db->runQuery("SELECT * from customer");
  }
  function updateItemQuantity($itemID, $quantity)
  {
    return $this->db->runQuery("UPDATE ITEM SET quantity=$quantity WHERE itemID='" . $itemID . "'");
  }
  function deleteItem($itemID)
  {
    return $this->db->runQuery("DELETE FROM ITEM WHERE itemID='" . $itemID . "'");
  }

  function addCategory($categoryName)
  {
    return $this->db->insertQuery("INSERT INTO category (category_name) VALUES ('" . $categoryName . "')");
  }
  function getCategoryID($categoryName)
  {
    return $this->db->runQuery("SELECT Categoryid FROM CATEGORY WHERE Category_name='" . $categoryName . "'");
  }
  function addItem($categoryID, $itemName, $quantity)
  {
    return $this->db->insertQuery("INSERT INTO ITEM (name,category_id,quantity) values ('$itemName','$categoryID','$quantity')");
  }
  function getCategoryNames()
  {
    return $this->db->runQuery("SELECT category_name from category");
  }
}
