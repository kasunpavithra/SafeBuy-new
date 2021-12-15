<?php
// session_start();
class customerProfile_Model extends Model
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
        $sql = "select * from customer where Customer_id= '" . $_SESSION['userID'] . "'";
        $row = $this->db->runQuery($sql);

        return $row;
    }
    function saveInfo($sql)
    {
        return $this->db->runQuery($sql);
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
    function getCartItems($userID)
    {
        $cartIDs = $this->db->runQuery("SELECT CART_ID FROM CARTTEMP WHERE Customer_id= '" . $userID . "'");
        $cartID = $cartIDs[0][0];
        $cartItems = $this->db->runQuery("SELECT * FROM CART_ITEMSTEMP WHERE Cart_id= '" . $cartID . "' AND ORDERED='0'");
        foreach ($cartItems as $key => $value) {

            $cartItems[$key]["itemDetails"] = $this->db->runQuery("SELECT * FROM ITEM WHERE itemID='" . $value["item_id"] . "'");
        }
        return $cartItems;
    }
    function deleteItemCart($itemCartID)
    {
        $sql = "DELETE FROM CART_ITEMSTEMP WHERE cart_item_id= '" . $itemCartID . "'";
        return $this->db->insertQuery($sql);
    }
    function createOrder($userID, $amount, $paymentMethod)
    {
        if ($paymentMethod == "cashOn") {
            $paymentMethod = 0;
        } else {
            $paymentMethod = 1;
        }
        $userID = "'$userID'";
        $amount = "'$amount'";
        $paymentMethod = "'$paymentMethod'";

        $sql = "INSERT INTO ORDERS (Customer_id,amount,payment_method) values ($userID,$amount,$paymentMethod)";
        return $this->db->insertQuery($sql);
    }

    function getLastOrderID($userID)
    {
        $userID = "'$userID'";
        $sql = "SELECT orderID from orders where Customer_id=$userID";
        $listOfIds = $this->db->runQuery($sql);
        $lastOrderID = end($listOfIds)[0];
        return $lastOrderID;
    }

    function addOrderItems($orderID, $cartItems)
    {
        $orderID = "'$orderID'";
        foreach ($cartItems as $key => $value) {
            // print_r($value);
            $itemsDetails = $value['itemDetails'][0];
            $itemID = "'" . $itemsDetails['itemID'] . "'";
            $quantity = "'" . $value["quantity"] . "'";
            $price = "'" . $itemsDetails["price"] . "'";
            $discount = "'" . $itemsDetails["discount"] . "'";
            $sql = "INSERT INTO ORDERITEM (OrderID,ItemID,quantity,price,discount) VALUES  ($orderID,$itemID,$quantity,$price,$discount)";
            $preQuantity = $itemsDetails["quantity"];
            $consumedQuantity = $value["quantity"];
            $newQuantity = "'" . ($preQuantity - $consumedQuantity) . "'";
            $this->db->insertQuery($sql);
            $this->updateItemDetail($itemID, $newQuantity);
            $cartItemID = "'" . $value["cart_item_id"] . "'";
            $this->markAsOrdered($cartItemID);
        }
    }

    function updateItemDetail($itemID, $newQuantity)
    {
        $sql = "UPDATE ITEM set quantity=$newQuantity where itemID=$itemID";
        $this->db->runQuery($sql);
    }
    function markAsOrdered($cartItemID)
    {
        $sql = "UPDATE CART_ITEMSTEMP SET ORDERED=1 WHERE CART_ITEM_ID=$cartItemID";
        $this->db->insertQuery($sql);
    }
}
