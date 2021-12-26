<?php
abstract class Person extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    //abstract function dashboard();

    function index()
    {
        // if (!isset($_SESSION['userID'])) {

        //     header("Location: ../login/");
        //     die();
        // }
        // $this->view->categories = $this->getCategories();
        // foreach ($this->view->categories as $key => $value) {
        //     $this->view->categories[$key]["items"] = $this->getItems($this->view->categories[$key][0]);
        // }
        // foreach ($this->orderList as $key => $value) {
        //     if ($_SESSION["userID"] == $value["Customer_id"]) {
        //         print_r($value);
        //         echo "<br>";
        //         echo "<br>";

        //         echo "<br>";
        //     }
        // }
        // $this->view->render('CustomerHome');
    }
    function getCategories()
    {

        return $this->model->getCategory();
    }
    function getItems($categoryID)
    {
        return $this->model->getItems($categoryID);
    }
    function logout()
    {
        if (isset($_SESSION['userID'])) {
            session_destroy();
        }
        header("Location: ../../../../login/");
    }
    function addItem()
    {
        if (isset($_POST["add"])) {
            $itemID = $_GET['ItemID'];
            $quantity = $_COOKIE["quant" . $itemID];
            $alreadyIn = $this->model->checkAlreadyIn($itemID);
            $isadded = false;
            if (!$alreadyIn) {
                $isadded = $this->model->addItemtoCart($itemID, $quantity);
            } else {

                $isadded = $this->model->UpdateItemtoCart($itemID, $quantity);
            }
            if ($isadded) {
                header("Location:../");
            }
        }
    }
}
