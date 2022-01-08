<?php
class ShopManager_Model extends Model
{
  function __construct()
  {
    parent::__construct();
  }
  function restockItem($itemID)
  {
    return $this->db->insertQuery("UPDATE ITEM SET item_availability=0 where itemID=$itemID");
  }
  function printSomething()
  {
  }
  function updatePrice($itemID, $price)
  {
    return $this->db->runQuery("UPDATE ITEM SET price=$price WHERE itemID='" . $itemID . "'");
  }
  function updateDiscount($itemID, $discount)
  {
    return $this->db->runQuery("UPDATE ITEM SET discount=$discount WHERE itemID='" . $itemID . "'");
  }
  function updateItemDescription($itemID, $description)
  {
    return $this->db->runQuery("UPDATE ITEM SET description='$description' WHERE itemID='" . $itemID . "'");
  }
  function updateItemName($itemID, $itemName)
  {
    return $this->db->runQuery("UPDATE ITEM SET name='$itemName' WHERE itemID='" . $itemID . "'");
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
    // return $this->db->runQuery("DELETE FROM ITEM WHERE itemID='" . $itemID . "'");
    return $this->db->insertQuery("UPDATE ITEM SET item_availability=1 where itemID=$itemID");
  }

  function addCategory($categoryName, $description)
  {
    return $this->db->insertQuery("INSERT INTO category (category_name,description) VALUES ('" . $categoryName . "','$description')");
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
