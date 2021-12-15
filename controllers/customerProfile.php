<?php
class CustomerProfile extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        if (!isset($_SESSION['userID'])) {

            header("Location: ../login/");
            die();
        }
        $this->view->row = $this->model->getData();
        $this->view->cartItems = $this->model->getCartItems($_SESSION['userID']);
        $this->view->render('CustomerProfile');
    }
    function loadDefault()
    {
        header("Location:../login/");
    }
    function loginProfile()
    {
        if (isset($_POST["submitLogin"])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $islogin = $this->model->isLogin($username, $password);
            if ($islogin) {
                session_start();
                $_SESSION['username'] = $username;
                $this->view->render('CustomerHome');
            } else {
                $this->loadDefault();
            }
        }
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
            $this->loadDefault();
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
                        $this->loadDefault();
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

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sql = "UPDATE CUSTOMER SET email=$email where Customer_id='" . $_SESSION['userID'] . "'";

                if ($this->model->saveEmail($sql)) {
                    $this->loadDefault();
                } else {
                }
            } else {
                // echo "<script>alert('Invalid Email')</script>";
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
                $this->loadDefault();
            } else {
            }
        } else {
            echo "<script>alert('Please enter your correct password')</script>";
        }
    }
    function logout()
    {
        if (isset($_SESSION['userID'])) {

            session_destroy();
        }
        header("Location: ../../login/");
    }
    function removeItem()
    {
        $itemCartID = $_GET["id"];
        $isdeleted = $this->model->deleteItemCart($itemCartID);
        if ($isdeleted) {
            header("Location: ../");
        }
    }
    function placeOrder()
    {

        if (isset($_POST["placeOrder"])) {
            $amount = $_GET["amount"];
            $userID =  $_SESSION["userID"];
            $paymentMethod = $_POST["paymentMethod"];
            $cartItems = $this->model->getCartItems($_SESSION['userID']);
            $isCreated = $this->model->createOrder($userID, $amount, $paymentMethod);
            if ($isCreated) {
                $lastorderID = $this->model->getLastOrderID($userID);
                $this->model->addOrderItems($lastorderID, $cartItems);
                header("Location:../");
            }
            // foreach ($cartItems as $key => $value) {
            //     print_r($value);
            //     echo "<br>";
            //     echo "<br>";
            //     echo "<br>";
            //     echo "<br>";
            // }
        }
    }
}
