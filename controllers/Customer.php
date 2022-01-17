<?php
include_once('Person.php');
require_once("shop.php");
require_once("Order.php");
require_once("Menu.php");
require_once("OrderStatusCustomer.php");
require_once("Cart.php");
require_once("chatLog.php");
require_once("NotificationBox.php");
class Customer extends Person
{

    private $customer_id;
    private $name;
    private $street;
    private $house_no;
    private $city;
    private $zip_code;
    private $district;
    private $mobile_no;
    private $username;
    private $email;
    private $profile_pic;
    private $cart;
    private $buyorders = array();
    private $returnorders = array();
    private $shop;
    function __construct($id)
    {
        parent::__construct();

        $this->setDetails($id);
    }
    function checkLogin()
    {
        if (!isset($_SESSION["userID"])) {
            $this->logout();
        }
    }
    function getChat()
    {
        $chatLog =  ChatLog::getInstance($this->customer_id);
        $this->view->chatLog = $chatLog;
        $this->view->render("CustomerChat");
        $chatLog->markAsSeen($this->customer_id, 1);
    }
    //

    function customerSendMessage()
    {
        if (isset($_POST["msg"])) {
            $message = $_POST["msg"];
            if ($this->model->addMessage($this->customer_id, $message)) {
                header("Location: getChat");
            }
        }
    }
    function setDetails($id)
    {
        $this->loadModel("Customer");
        $details = $this->model->getDetails($id)[0];

        $this->customer_id = $details["Customer_id"];
        $this->name = $details["Name"];

        $this->street = $details["Street"];
        $this->house_no = $details["House_no"];
        $this->city = $details["City"];
        $this->zip_code = $details["Zip_code"];
        $this->district = $details["District"];
        $this->mobile_no = $details["Mobile_no"];
        $this->username = $details["Username"];
        $this->email = $details["Email"];
        $this->profile_pic = $details["Profile_pic"];
        $this->cart = new Cart($this->setCart($id)[0][0]);
    }
    function deleteItem()
    {
        if (isset($_POST["deleteBtn"])) {
            $itemID = $_POST["itemID"];
            $isdelete = $this->model->deleteCartItem($itemID);
            if ($isdelete) {
                header("Location:PayCart");
            }
        }
    }
    function updateShopRatingViews()
    {
        if (isset($_POST["submitOrderRatings"])) {
            $orderID = $_POST["orderID"];
            $rate = $_POST["rate"];
            $this->model->rateOrder($orderID, $rate);
        }
        header("Location:orderHistory");
    }
    function  placeReturnOrder()
    {
        header("Location:orderHistory");
    }
    function returnOrderPlace()
    {
        $reason = $_POST["reason"];
        $quantity = $_POST["quantity"];
        $orderID = $_POST["orderID"];
        $itemName = $_POST["itemName"];
        $price = $_POST["price"];
        $amount = NULL;
        if (isset($_POST["amount"])) {
            $amount = $_POST["amount"];
        }
        $orderItemID = $_POST["orderItemID"];
        $returnOrderID = NULL;
        $returnOrderIn = $this->model->returnOrderExists($orderID);
        if (empty($returnOrderIn)) {
            $this->addReturnOrder($this->customer_id, $amount, $orderID);
        } else {
            $returnOrderID = $returnOrderIn[0][0];
        }
        if ($returnOrderID == NULL) {
            $returnOrderID = $this->model->returnOrderExists($orderID)[0][0];
        }
        $isadded =  $this->model->addReturnItem($returnOrderID, $quantity, $reason, $orderItemID);
        echo $isadded;
        // echo $reason . " " . $quantity . " " . $orderID . " " . $itemName . " " . $price . " " . $this->customer_id." ".$orderItemID;
        // echo $returnOrderID;
    }
    function addReturnOrder($customer_id, $price, $orderID)
    {
        $this->model->createReturnOrder($customer_id, $price, $orderID);
    }
    function updateRatingsViews()
    {
        $itemID = $_POST["orderItemID"];
        $rate = $review = NULL;
        if (isset($_POST["submitrateview"])) {
            if (isset($_POST["rate"])) {
                $rate = $_POST["rate"];
            }
            if (isset($_POST["review"])) {
                $review = $_POST["review"];
            }
        }
        if ($rate != NULL) {
            $this->model->rateItem($itemID, $rate);
        }
        if ($review != NULL) {
            $this->model->reviewItem($itemID, $review);
        }
        header("Location:orderHistory");
    }
    function OrderStatus()
    {
        $this->view->order_Id = $_GET["orderID"];
        $order = new BuyOrder($_GET["orderID"]);
        $this->view->stat_no  = $order->getStatus();
        $this->view->type = "BuyOrder";
        $this->view->render("OrderStatusCustomer");
    }
    function ReturnOrderStatus()
    {
        $this->view->order_Id = $_GET["orderID"];
        $order = new ReturnOrder($_GET["orderID"]);
        $this->view->stat_no  = $order->getStatus();
        $this->view->type = "ReturnOrder";
        $this->view->render("OrderStatusCustomer");
    }
    function categoryDetail()
    {
        $categoryID = $_GET["categoryID"];
        $menu = new Menu();
        $items = $menu->getItems();
        $categoryItems = array();
        foreach ($items as  $item) {
            if ($item->getCategoryID() == $categoryID) {
                array_push($categoryItems, $item);
            }
        }
        $this->view->categoryItems = $categoryItems;
        $this->view->render("CategoryItems");
    }
    function rateItem()
    {
        $this->checkLogin();

        $itemID = $_POST["itemID"];
        $rate = $_POST["Itemrate"];

        if ($rate != NULL) {
            $success =  $this->model->rateItem($itemID, $rate);
            if ($success) {
                echo true;
            }
        }
    }
    function reviewShop()
    {
        $this->checkLogin();

        $orderID = $_POST["orderID"];
        $review = $_POST["orderreview"];

        $success = $this->model->reviewOrder($orderID, $review);
        if ($success) {
            echo true;
        }
    }
    function rateShop()
    {

        $orderID = $_POST["orderID"];
        $rate = $_POST["orderrate"];
        $success = $this->model->rateOrder($orderID, $rate);
        if ($success) {
            echo true;
        }
    }
    function reviewItem()
    {
        $itemID = $_POST["itemID"];
        $review = $_POST["itemReview"];

        if ($review != NULL) {
            $success =  $this->model->reviewItem($itemID, $review);
            if ($success) {
                echo true;
            }
        }
    }
    function itemDetails()
    {
        $orderID = $_GET["orderID"];
        $order = NULL;
        $this->setShop(new Shop());
        $orderLog = $this->shop->getOrderLog();
        // $buyorders = $orderLog->getBuyOrders();
        // foreach ($buyorders as $key => $value) {
        //     if ($value->getCustomerId() == $this->customer_id) {
        //         array_push($this->buyorders, $buyorders[$key]);
        //     };
        // }
        $returnorders = $orderLog->getReturnOrders();
        $returnOrder = NULL;

        foreach ($returnorders as $key => $value) {
            if ($value->getBuyOrderId() == $orderID) {
                $returnOrder = $value;
                break;
            };
        }
        // foreach ($buyorders as $buyorder) {
        //     if ($buyorder->getOrderId() == $orderID) {
        //         $order = $buyorder;
        //         break;
        //     }
        // }

        $this->view->order = new BuyOrder($orderID);
        $this->view->returnOrder = $returnOrder;
        $this->view->render("OrderDetail");
    }

    function ReturnitemDetails()
    {
        $orderID = $_GET["orderID"];
    }
    function orderHistory()
    {
        $this->setShop(new Shop());
        $orderLog = $this->shop->getOrderLog();
        $buyorders = $orderLog->getBuyOrders();
        foreach ($buyorders as $key => $value) {
            if ($value->getCustomerId() == $this->customer_id) {
                array_push($this->buyorders, $buyorders[$key]);
                // echo $value->getCustomerName();
                // echo "<br>";
            };
        }
        $returnorders = $orderLog->getReturnOrders();
        foreach ($returnorders as $key => $value) {
            if ($value->getCustomerId() == $this->customer_id) {
                array_push($this->returnorders, $returnorders[$key]);
                // echo $value->getCustomerName();
                // echo "<br>";
            };
        }
        $this->view->buyOrders = $this->buyorders;
        $this->view->returnOrders = $this->returnorders;
        $this->view->render("orderHistory");
    }
    function item()
    {
        $itemID = $_GET["itemID"];
        $menu = new Menu();
        $items = $menu->getItems();
        foreach ($items as $key => $item) {
            if ($item->getItemId() == $itemID) {
                $this->view->item = $item;
                $this->view->render("Item");
                break;
            }
        }
    }
    function placeOrder()
    {
        if (isset($_POST["placeOrder"])) {
            $amount = $_POST["amount"];
            $paymentMethod = $_POST["paymentmethod"];

            $ischanged = $this->model->updateCartItemAsOrdered($this->cart->getCartID());
            if ($ischanged) {
                $isCreated = $this->model->createOrder($this->customer_id, $amount, $paymentMethod);
                $orderIDArray = $this->model->getOrderID($this->customer_id);
                $orderId = end($orderIDArray)[0];

                if ($isCreated) {
                    $cartItems = $this->cart->getCartItems();
                    foreach ($cartItems as $cartItem) {
                        $this->model->updateItem($cartItem->getItem_id(),  $cartItem->getAvQuantity() - $cartItem->getQuantity(), $cartItem->getSoldQuantity() + $cartItem->getQuantity());

                        $this->model->addOrderItem($orderId, $cartItem->getItem_id(), $cartItem->getQuantity(), $cartItem->getPrice(), $cartItem->getDiscount());
                        if ($cartItem->getAvQuantity() == $cartItem->getQuantity()) {
                            $this->model->setItemStatus(1, $cartItem->getItem_id());
                        }
                    }
                }
            }
        }
        header("Location:Dashboard");
    }
    function payCart()
    {
        $this->checkLogin();
        $this->view->cart = $this->cart->getCartItems();
        $this->view->render("CartPayment");
    }
    function setCart($id)
    {
        $cart =  $this->model->setCart($id);

        if (empty($cart)) {
            $this->model->createCart($id);
            $cart = $this->model->setCart($id);
        }
        return $cart;
    }
    function getOrders()
    {
        $this->setShop(new Shop());
        $orderLog = $this->shop->getOrderLog();
        $buyorders = $orderLog->getBuyOrders();
        foreach ($buyorders as $key => $value) {
            if ($value->getCustomerId() == $this->customer_id) {
                array_push($this->buyorders, $buyorders[$key]);
                // echo $value->getCustomerName();
                // echo "<br>";
            };
        }
        $returnorders = $orderLog->getReturnOrders();
        foreach ($returnorders as $key => $value) {
            if ($value->getCustomerId() == $this->customer_id) {
                array_push($this->returnorders, $returnorders[$key]);
                // echo $value->getCustomerName();
                // echo "<br>";
            };
        }
    }
    function OrderStatusCustomer()
    {
        (new OrderStatusCustomer())->index();
    }
    function markAsSeen()
    {
        $nid = $_POST["notID"];
        $markAsSeen = (NotificationBox::getInstance($this->customer_id))->markCustomerNotificationAsSeen($nid);
        if ($markAsSeen) {
            header("Location:customerProfile");
        } else {
            header("Location:customerProfile");
        }
    }
    function customerProfile()
    {
        if (!isset($_SESSION["userID"])) {
            $this->logout();
        }
        // $notifications = $this->model->getNotifications($this->getCustomer_id());
        // foreach ($notifications as $notification) {

        // }
        $notificationList =  (NotificationBox::getInstance($this->customer_id))->getCustomerNotificationList();
        $this->view->notifications = $notificationList;
        $this->view->row = $this->getDataRow();
        $this->view->cartItems = $this->model->getCartItems($_SESSION['userID']);
        $this->view->render("customerProfile");
    }
    function getDataRow()
    {
        $row = array();
        $row["customer_id"] = $this->getCustomer_id();
        $row["name"] = $this->getName();
        $row["street"] = $this->getStreet();
        $row["house_no"] = $this->getHouse_no();
        $row["city"] = $this->getCity();
        $row["zip_code"] = $this->getZip_code();
        $row["district"] = $this->getDistrict();
        $row["mobile_no"] = $this->getMobile_no();
        $row["username"] = $this->getUsername();
        $row["email"] = $this->getEmail();
        $row["profile_pic"] = $this->getProfile_pic();
        return $row;
    }
    function saveInfo()
    {
        if (isset($_POST["save"])) {
            $name = "'" . $_POST["name"] . "'";
            $userName = "'" . $_POST["username"] . "'";
            $addr = "'" . $_POST["inputAddress"] . "'";
            $homeNum = "'" . $_POST["houseNumber"] . "'";
            $mobNum = "'" . $_POST["mobileNumber"] . "'";
            $city = "'" . $_POST["inputCity"] . "'";
            $district = "'" . $_POST["District"] . "'";
            $zip = "'" . $_POST["inputZip"] . "'";

            $sql = "UPDATE CUSTOMER SET Name=$name , Username=$userName , Street=$addr , House_no=$homeNum , Mobile_no=$mobNum , City=$city , District=$district ,Zip_code=$zip where Customer_id='" . $_SESSION['userID'] . "'";
            $result = $this->model->saveInfo($sql);
            header("Location: customerProfile");
            // $this->loadDefault();
        }
    }
    function saveImage()
    {
        if (isset($_POST["submit"])) {
            if (!empty($_FILES["image"]["name"])) {
                $fileName = basename($_FILES["image"]["name"]);
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {
                    $image = $_FILES['image']['tmp_name'];
                    $imgContent = "'" . addslashes(file_get_contents($image)) . "'";

                    $insert = $this->model->saveImage("UPDATE CUSTOMER SET Profile_pic=$imgContent WHERE Customer_id='" . $_SESSION['userID'] . "'");

                    if ($insert) {
                        header("Location: customerProfile");
                    } else {
                    }
                } else {
                    echo "<script>alert('Please upload an image file here')</script>";
                }
            } else {
                echo "<script>alert('Please upload an image file here')</script>";
            }
        }
    }

    function saveEmail()
    {
        if (isset($_POST["saveEmail"])) {
            $email = "'" . $_POST["email"] . "'";

            if (/*filter_var($email, FILTER_VALIDATE_EMAIL)*/true) {
                $sql = "UPDATE CUSTOMER SET email=$email where Customer_id='" . $_SESSION['userID'] . "'";
                echo $sql;
                if ($this->model->saveEmail($sql)) {
                    header("Location: customerProfile");
                } else {
                }
            } else {
                echo "<script>alert('Invalid Email')</script>";
            }
            $this->index();
        }
    }

    function savePassword()
    {
        $currentPassword = "'" . $_POST["currentPassword"] . "'";
        $newPassword = "'" . $_POST["newPassword"] . "'";
        if ($_POST["currentPassword"] == $this->model->getPassword($_SESSION["userID"])) {
            $sql = "UPDATE CUSTOMER SET Password=$newPassword where Customer_id='" . $_SESSION['userID'] . "'";
            if ($this->model->savePassword($sql)) {
                header("Location: customerProfile");
            } else {
            }
        } else {
            echo "<script>alert('Please enter your correct password')</script>";
            echo "<script>location.href='customerProfile'</script>";
        }
    }
    function dashboard()
    {
        if (!isset($_SESSION['userID'])) {

            header("Location: ../../login/");
            die();
        }
        $menu = new Menu();
        $categories = array();
        $items = $menu->getItems();
        foreach ($items as $key => $value) {
            if ($value->getAvailability() == 1) {
                continue;
            }
            if (array_key_exists($value->getCategoryName(), $categories)) {
                array_push($categories[$value->getCategoryName()], $value);
            } else {
                $categories[$value->getCategoryName()] = array($value);
            }
        }
        // foreach ($categories as $key => $items) {
        //     usort($categories[$key], fn ($a, $b) => $a->getSoldQuantity() < $b->getSoldQuantity());
        // }
        $descriptionList = $menu->getCategoryDescriptionList();
        $descList = array();
        foreach ($descriptionList as $key => $value) {
            $descList[$value[0]] = array();
            array_push($descList[$value[0]], $value[1]);
        }
        // print_r($descList);
        // $numOfDesc = 0;
        // foreach ($categories as $key => $value) {

        //     $categories[$key]["catdescription"] = $descriptionList[$numOfDesc++];
        //     // print_r($categories[$key]);
        //     // echo "<br>";
        //     foreach ($value as $item) {
        //     //   echo $item->getDiscount();
        //     //   echo "<br>";
        //     }
        // }
        $this->view->descriptionList = $descList;
        $this->view->categories = $categories;
        // 
        // foreach ($descriptionList as $key => $value) {
        //     $categories[$key]["description"] = $value[0];
        // }

        // $this->view->categories = $categories;
        // foreach ($this->view->categories as $value) {
        //     print_r($value);
        //     echo "<br>";
        // }
        $this->view->render('CustomerHome');
    }
    function logout()
    {
        if (isset($_SESSION['userID'])) {
            session_destroy();
        }
        header("Location: ../../../login/");
    }
    function addCartItem()
    {
        if (isset($_POST["add"])) {
            $itemID = $_POST["itemID"];
            $quantity = $_POST["quantity"];
            $cartItems = $this->cart->getCartItems();
            foreach ($cartItems as $cartItem) {
                if ($cartItem->getItem_id() == $itemID) {
                    echo $cartItem->getItem_id();
                    echo "<br>";
                    echo $itemID;
                    $isadded = $this->model->UpdateItemtoCart($itemID, $quantity + $cartItem->getQuantity());
                    if ($isadded) {

                        header("Location: Dashboard");
                        return;
                    }
                }
            }
            $isadded = $this->model->addItemtoCart($itemID, $quantity, $this->cart);
            if ($isadded) {
                header("Location: Dashboard");
                return;
            }
        }
    }

    function recieveNotification($nid, $msg)
    {
        //prsentation logic here
        $this->model->saveRecievedNotification($this->getCustomer_id(), $msg, $nid);
    }

    /**
     * Get the value of customer_id
     */
    public function getCustomer_id()
    {
        return $this->customer_id;
    }

    /**
     * Set the value of customer_id
     *
     * @return  self
     */
    public function setCustomer_id($customer_id)
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set the value of street
     *
     * @return  self
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get the value of house_no
     */
    public function getHouse_no()
    {
        return $this->house_no;
    }

    /**
     * Set the value of house_no
     *
     * @return  self
     */
    public function setHouse_no($house_no)
    {
        $this->house_no = $house_no;

        return $this;
    }

    /**
     * Get the value of city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of zip_code
     */
    public function getZip_code()
    {
        return $this->zip_code;
    }

    /**
     * Set the value of zip_code
     *
     * @return  self
     */
    public function setZip_code($zip_code)
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    /**
     * Get the value of district
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set the value of district
     *
     * @return  self
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get the value of mobile_no
     */
    public function getMobile_no()
    {
        return $this->mobile_no;
    }

    /**
     * Set the value of mobile_no
     *
     * @return  self
     */
    public function setMobile_no($mobile_no)
    {
        $this->mobile_no = $mobile_no;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of profile_pic
     */
    public function getProfile_pic()
    {
        return $this->profile_pic;
    }

    /**
     * Set the value of profile_pic
     *
     * @return  self
     */
    public function setProfile_pic($profile_pic)
    {
        $this->profile_pic = $profile_pic;

        return $this;
    }

    /**
     * Get the value of shop
     */
    public function getShop()
    {
        return $this->shop;
    }



    /**
     * Set the value of shop
     *
     * @return  self
     */
    public function setShop($shop)
    {
        $this->shop = $shop;

        return $this;
    }
    function deleteAccount()
    {
        if (isset($_POST["delAcc"])) {
            $pass = $_POST["password"];
            if ($pass == $this->model->getPassword($this->customer_id)) {
                $delete =  $this->model->setAsDeletedAccount($this->customer_id);
                if ($delete) {
                    session_destroy();
                    echo "<script>alert('You deleted your account successfully')</script>";
                    echo "<script>location.href='../../../login/'</script>";

                }
            } else {
                echo "<script>alert('Wrong Password')</script>";
                echo "<script>location.href='dashboard'</script>";
            }
        }
    }

    public function getAddress()
    {
        $address = $this->house_no . "," . $this->street . "," . $this->city . "," . $this->district;
        return $address;
    }
}
