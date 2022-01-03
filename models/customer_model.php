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
    function rateOrder($orderID, $rate)
    {
        return $this->db->insertQuery("UPDATE ORDERS SET RATING=$rate where orderID=$orderID");
    }
    function rateItem($itemID, $rate)
    {
        return $this->db->insertQuery("UPDATE ORDERITEM SET RATING=$rate where OrderItemID=$itemID");
    }
    function reviewOrder($orderID, $review)
    {
        return $this->db->insertQuery("UPDATE ORDERS SET REVIEW='$review' where orderID=$orderID");
    }
    function reviewItem($itemID, $review)
    {
        return $this->db->insertQuery("UPDATE ORDERITEM SET REVIEW='$review' where OrderItemID=$itemID");
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
    function addItemtoCart($itemID, $quantity, $cart)
    {
        $cartID = $cart->getCartID();
        $query = "INSERT INTO CART_ITEMSTEMP (CART_ID,ITEM_ID,QUANTITY,ORDERED) VALUES ('" . $cartID . "','" . $itemID . "','" . $quantity . "','0')";

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

        $query = "UPDATE CART_ITEMSTEMP SET QUANTITY = $quantity WHERE ITEM_ID=$itemID";
        return $this->db->insertQuery($query);
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
    // function createOrder($userID, $amount, $paymentMethod)
    // {
    //     if ($paymentMethod == "cashOn") {
    //         $paymentMethod = 0;
    //     } else {
    //         $paymentMethod = 1;
    //     }
    //     $userID = "'$userID'";
    //     $amount = "'$amount'";
    //     $paymentMethod = "'$paymentMethod'";

    //     $sql = "INSERT INTO ORDERS (Customer_id,amount,payment_method) values ($userID,$amount,$paymentMethod)";
    //     return $this->db->insertQuery($sql);
    // }

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
    function addReturnItem($returnOrderID, $quantity, $reason, $orderItemID)
    {
        $sql = "INSERT INTO RETURNITEM (RETURNORDERID,QUANTITY,REVIEW,ORDERITEMID) VALUES ($returnOrderID,$quantity,'$reason',$orderItemID)";
        return $this->db->insertQuery($sql);
    }
    function createReturnOrder($customer_id, $price, $orderID)
    {
        $sql = "INSERT INTO RETURNORDER (CUSTOMER_ID,AMOUNT,BUYORDERID) VALUES ($customer_id,$price,$orderID)";
        return $this->db->insertQuery($sql);
    }
    function returnOrderExists($orderID)
    {
        $sql = "SELECT RETURNORDERID FROM RETURNORDER WHERE BUYORDERID=$orderID";
        return $this->db->runQuery($sql);
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
    function setCart($id)
    {
        $sql = "SELECT CART_ID from carttemp where customer_id='" . $id . "'";
        $crt = $this->db->runQuery($sql);
        if (empty($crt)) {
            return array();
        }

        return $crt[0][0];
    }
    function createCart($id)
    {
        $sql = "INSERT INTO carttemp (customer_id) values ($id)";
        return $this->db->insertQuery($sql);
    }
    function deleteCartItem($itemID)
    {
        return $this->db->insertQuery("DELETE FROM CART_ITEMSTEMP WHERE CART_ITEM_ID=$itemID");
    }
    function updateCartItemAsOrdered($cartID)
    {
        return $this->db->insertQuery("UPDATE CART_ITEMSTEMP SET ORDERED=1 WHERE (cart_id=$cartID AND ordered=0)");
    }
    function createOrder($customer_id, $amount, $paymentMethod)
    {
        if ($paymentMethod == "cashOn") {
            $paymentMethod = 0;
        } else {
            $paymentMethod = 1;
        }
        return $this->db->insertQuery("INSERT INTO ORDERS (Customer_id,amount,payment_method) values ($customer_id,$amount,$paymentMethod)");
    }
    function updateItem($itemID,  $quantity, $newSoldQuantity)
    {
        return $this->db->insertQuery("UPDATE ITEM SET QUANTITY=$quantity ,SOLDQUANTITY='" . $newSoldQuantity . "' where itemID=$itemID");
    }
    function  getOrderID($customer_id)
    {
        return $this->db->runQuery("SELECT orderID FROM ORDERS where Customer_id=$customer_id");
    }
    function addOrderItem($orderId, $Item_id, $quantity, $price, $discount)
    {
        return $this->db->insertQuery("INSERT INTO ORDERITEM (orderID,itemID,quantity,price,discount) values ($orderId,$Item_id,$quantity,$price,$discount)");
    }
}
