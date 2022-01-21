<?php
include_once "shopStaff.php";
require_once "Menu.php";
require_once "ChatMediatorImpl.php";
require_once "Customer.php";

class ShopManager extends ShopStaff
{
    private $menu;
    private $mediator;
    function __construct($id)
    {
        parent::__construct($id);
        $this->menu = new Menu();
    }


    function index()
    {
    }


    function restockItem()
    {
        if (isset($_POST["restockItem"])) {
            $itemID = $_POST["itemID"];
            $this->model->restockItem($itemID);
        }
        header("Location:Dashboard");
    }
    function dashboard()
    {
        $this->checkIsManager();
        // if (!isset($_SESSION['staffuserID'])) {
        //     header("Location: ../../stafflogin/");
        //     die();
        // }
        // $categories=array();
        // $items = $this->menu->getItems();
        //  foreach ($items as $key => $value) {
        //     if(array_key_exists($value->getCategoryName(), $categories)){
        //             array_push($categories[$value->getCategoryName()],$value);
        //     }
        //     else{
        //         $categories[$value->getCategoryName()]=array($value);
        //     }
        // }
        $categorySet = [];
        $numberofCat = 0;
        // $items = $this->menu->getItems();
        $categories = $this->model->getCategoryNames();
        //print_r($categories);
        foreach ($categories as $key => $value) {
            $categorySet[$numberofCat++] = $value[0];
        }
        // foreach ($items as $key => $item) {
        //     if (!in_array($item->getCategoryName(), $categorySet)) {
        //         $categorySet[$numberofCat++] = $item->getCategoryName();
        //     }
        // }
        $items = $this->menu->getItems();
        $this->view->items = $items;
        $this->view->categories = $categorySet;
        $this->view->render('shopManagerHome');
    }
    function AddNotification()
    {
        if (isset($_POST["offerAddBtn"])) {
            $limitAmount = $_POST["limitAmount"];
            $offerPercent = $_POST["offerPercent"];
            echo $limitAmount . " " . $offerPercent;
            $this->sendNotification("Not");
        }
    }
    function categoryItems()
    {
        if (isset($_GET["category"])) {
            $items = array();
            $category = $_GET["category"];
            $allitems = $this->menu->getItems();
            foreach ($allitems as $key => $value) {
                if ($value->getCategoryName() == $category) {
                    array_push($items, $value);
                }
            }
            foreach ($items as $key => $value) {
                // echo $value;
            }
            $this->view->items = $items;
            $this->view->render('ShopManagerItems');
        }
    }
    function saveItemDetail()
    {
        if (isset($_POST["updateQuantity"])) {
            $quantity = $_POST["quantity"];
            $itemID = $_POST["itemID"];
            // echo "<script>alert($quantity==0)</script>";
            if ($quantity == NULL) {
                echo "<script>alert('Please add the quanity')</script>";
                echo "<script>location.href='Dashboard'</script>";
            } else {
                $this->model->updateItemQuantity($itemID, $quantity);
            }
            echo "<script>location.href='Dashboard'</script>";
        } else 
        if (isset($_POST["setItemName"])) {
            $name = $_POST["name"];
            $itemID = $_POST["itemID"];
            if ($name == '') {
                echo "<script>alert('Please set name for Item')</script>";
                echo "<script>location.href='Dashboard'</script>";
            } else {
                $this->model->updateItemName($itemID, $name);
            }
            echo "<script>location.href='Dashboard'</script>";
        } else if (isset($_POST["updateDescription"])) {
            $description = $_POST["description"];
            $itemID = $_POST["itemID"];
            if ($description == "") {
                echo "<script>alert('Please set description')</script>";
                echo "<script>location.href='Dashboard'</script>";
            } else {
                $this->model->updateItemDescription($itemID, $description);
            }
            echo "<script>location.href='Dashboard'</script>";
        } else if (isset($_POST["updateDiscount"])) {
            $discount = $_POST["discount"];
            $itemID = $_POST["itemID"];
            if ($discount == NULL) {
                $discount = 0;
                $this->model->updateDiscount($itemID, $discount);
            } else {
                $this->model->updateDiscount($itemID, $discount);
            }
            echo "<script>location.href='Dashboard'</script>";
        } else if (isset($_POST["updatePrice"])) {
            $price = $_POST["price"];
            $itemID = $_POST["itemID"];
            if ($price == 0 || $price == NULL) {
                echo "<script>alert('You have not set price in this item')</script>";
                echo "<script>location.href='Dashboard'</script>";
            } else {
                $this->model->updatePrice($itemID, $price);
            }
            echo "<script>location.href='Dashboard'</script>";
        } else if (isset($_POST["updateImage"])) {
            // $img = $_POST["image"];
            $itemID = $_POST["itemID"];
            if (!empty($_FILES["image"]["name"])) {
                $fileName = basename($_FILES["image"]["name"]);
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                $fileType;
                if (in_array($fileType, $allowTypes)) {
                    $image = $_FILES['image']['tmp_name'];
                    $imgContent = "'" . addslashes(file_get_contents($image)) . "'";

                    $insert = $this->model->saveItemImage($imgContent, $itemID);

                    if ($insert) {
                        header("Location:Dashboard");
                    } else {
                        echo "<script>alert('Please try again')</script>";
                        echo "<script>location.href='Dashboard'</script>";
                        //header("Location:Dashboard");
                    }
                } else {
                    echo "<script>alert('Please upload an image file here')</script>";
                    echo "<script>location.href='Dashboard'</script>";
                    // header("Location:Dashboard");
                }
            } else {
                echo "<script>alert('Please upload an image file here')</script>";
                echo "<script>location.href='Dashboard'</script>";
                // header("Location:Dashboard");
            }
        }
    }


    function deleteItem()
    {
        if (isset($_POST["deleteItem"])) {
            $itemID = $_POST["itemID"];
            $this->model->deleteItem($itemID);
        }
        header("Location:Dashboard");
    }
    function addItem()
    {
        if (isset($_POST["addItemBtn"])) {
            $categoryName = ($_POST["category"]);
            $itemName = $_POST["item"];
            $quantity = $_POST["quantity"];
            // $description = $_POST["categoryDesc"];
            // if ($this->addCategory($categoryName, $description)) {

            $categoryID = $this->getCategoryID($categoryName);
            $obj = $this->checkItemAvailable($itemName, $categoryID);
            // print_r($obj);
            if ($obj != NULL) {
                echo "<script>alert('The item already exists')</script>";
                echo "<script>location.href='Dashboard'</script>";
                exit();
                // if ($this->checkItemAvailable($itemName, $categoryID)) {
                // $this->model->updateCatItemQuantity($obj->getItemID(), $quantity);
            } else {
                $this->model->addItem($categoryID, $itemName, $quantity);
                echo "<script>location.href='Dashboard'</script>";
            }
        }
        // header("Location:Dashboard");
    }

    function addCategory()
    {
        // $categoryName, $description
        $description = $_POST["categoryDesc"];
        $categoryName = ($_POST["category"]);

        $categorySet = [];
        $numberofCat = 0;
        // $items = $this->menu->getItems();
        $categories = $this->model->getCategoryNames();
        //print_r($categories);
        foreach ($categories as $key => $value) {
            if (strtoupper($categoryName) == strtoupper($value[0])) {
                echo "<script>alert('Category Already Exists')</script>";
                echo "<script>location.href='Dashboard'</script>";
                exit();
            }
        }

        $isAdded =  $this->model->addCategory($categoryName, $description);
        if ($isAdded) {
            echo "<script>location.href='Dashboard'</script>";
        }
    }

    function getCategoryID($categoryName)
    {


        return  $this->model->getCategoryID($categoryName)[0][0];
    }
    function checkItemAvailable($itemName, $categoryID)
    {

        $allitems = $this->menu->getItems();
        foreach ($allitems as $key => $value) {
            if ($value->getName() == $itemName && $value->getCategoryID() == $categoryID) {
                return $value;
            }
        }
        return NULL;
    }
    function addOffers()
    {
        // $this->view->items = $this->menu->getItems();
        $this->view->render("OfferAddPage");
    }

    function sendNotification($msg)
    {
        $this->mediator = new ChatMediatorImpl();
        $customers =  $this->model->getCustomers();
        foreach ($customers as $customer) {
            $this->mediator->addUser(new Customer($customer["Customer_id"]));
        }
        $notIDs = $this->model->AddNotification($this->getStaff_id(), $msg);
        // print_r($notIDs);
        if (!(empty($notIDs))) {
            $this->mediator->sendNotification(end($notIDs)[0], $msg);
        }
        header("Location:Dashboard");
    }
}
