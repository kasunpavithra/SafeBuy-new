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
  function saveItemImage($imgContent, $itemID)
  {
    return $this->db->insertQuery("UPDATE ITEM SET itemImage=$imgContent WHERE itemID='" . $itemID . "'");
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
    if ($quantity > 0) {
      $sttusUpdated = $this->db->insertQuery("UPDATE ITEM SET status=0 WHERE itemID='" . $itemID . "'");
    } else if ($quantity == 0) {
      $sttusUpdated = $this->db->insertQuery("UPDATE ITEM SET status=1 WHERE itemID='" . $itemID . "'");
    }
    if ($sttusUpdated) {
      return $this->db->runQuery("UPDATE ITEM SET quantity=$quantity WHERE itemID='" . $itemID . "'");
    }
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

    $IsaddItem = $this->db->insertQuery("INSERT INTO ITEM (name,category_id,quantity) values ('$itemName','$categoryID','$quantity')");
    if ($quantity == 0 && $IsaddItem) {
      return $this->db->insertQuery("UPDATE ITEM SET status=1 where name=$itemName");
    } else {
      return $IsaddItem;
    }
  }
  function updateCatItemQuantity($itemName, $quantity)
  {
    $quan = $this->db->runQuery("SELECT QUANTITY FROM ITEM WHERE NAME='$itemName'")[0][0];
    $quantity += $quan;
    $isAdded = $this->db->insertQuery("UPDATE ITEM SET quantity=$quantity WHERE name='$itemName'");
    return $isAdded;
  }
  function getCategoryNames()
  {
    return $this->db->runQuery("SELECT category_name from category");
  }
}
