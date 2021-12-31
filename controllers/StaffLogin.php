<?php
include_once "Login.php";
class StaffLogin extends Login
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        // $this->view->users = $this->model->getData();
        $this->view->render('staffLogin');
    }
    function loginProfile()
    {
        echo("asdasd");
        if (isset($_POST["submitLogin"])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $islogin = $this->model->isLogin($username, $password);
            
            if ($islogin[0]) {
                $_SESSION['staffusername'] = $username;
                $_SESSION['staffuserID'] = $islogin[0];
                
                switch ($islogin[1]) {
                    case 0:
                        header("Location:../ShopManager/con1/" . $islogin[0] . "/Dashboard");
                        break;
                    case 1:
                        header("Location:../GeneralStaff/con1/" . $islogin[0] . "/Dashboard/-1"); //-1 for all buy orders

                        break;
                    case 2:

                        header("Location:../DeliveryPerson/con1/" . $islogin[0] . "/Dashboard");
                        break;
                    default:
                        header("Location:../stafflogin/");
                        break;
                }
            } else {
                header("Location:../stafflogin/");
            }
        }
    }


    function example()
    {
        $this->index();
    }
}
