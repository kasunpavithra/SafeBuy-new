<?php
include_once "shopStaff.php";
require_once "Menu.php";
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
        if (!isset($_SESSION['staffuserID'])) {
            header("Location: ../../stafflogin/");
            die();
        }
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

        $this->view->categories = $categorySet;
        $this->view->render('shopManagerHome');
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
            $this->model->updateItemQuantity($itemID, $quantity);
        } else 
        if (isset($_POST["setItemName"])) {
            $name = $_POST["name"];
            $itemID = $_POST["itemID"];
            $this->model->updateItemName($itemID, $name);
        } else if (isset($_POST["updateDescription"])) {
            $description = $_POST["description"];
            $itemID = $_POST["itemID"];
            $this->model->updateItemDescription($itemID, $description);
        } else if (isset($_POST["updateDiscount"])) {
            $discount = $_POST["discount"];
            $itemID = $_POST["itemID"];
            $this->model->updateDiscount($itemID, $discount);
        } else if(isset($_POST["updatePrice"])){
            $price = $_POST["price"];
            $itemID = $_POST["itemID"];
            $this->model->updatePrice($itemID, $price);
    
        }

        header("Location:Dashboard");
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
            $description = $_POST["categoryDesc"];
            if ($this->addCategory($categoryName, $description)) {

                $categoryID = $this->getCategoryID($categoryName);
                if ($this->checkItemAvailable($itemName)) {
                } else {
                    $this->model->addItem($categoryID, $itemName, $quantity);
                }
            }
            header("Location:Dashboard");
        }
    }
    function addCategory($categoryName, $description)
    {

        $categorySet = [];
        $numberofCat = 0;
        // $items = $this->menu->getItems();
        $categories = $this->model->getCategoryNames();
        //print_r($categories);
        foreach ($categories as $key => $value) {
            if (strtoupper($categoryName) == strtoupper($value[0])) {
                return true;
            }
        }
        return $this->model->addCategory($categoryName, $description);
    }
    function getCategoryID($categoryName)
    {


        return  $this->model->getCategoryID($categoryName)[0][0];
    }
    function checkItemAvailable($itemName)
    {

        $allitems = $this->menu->getItems();
        foreach ($allitems as $key => $value) {
            if ($value->getName() == $itemName) {
                return true;
            }
        }
        return false;
    }
    function sendNotification($msg)
    {
        $this->mediator->sendNotification($msg);
    }
}
