<?php
class Login extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $this->view->users = $this->model->getData();
        $this->view->render('Login');
    }
    function loginProfile()
    {
        if (isset($_POST["submitLogin"])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $islogin = $this->model->isLogin($username, $password);
            if ($islogin) {
                $_SESSION['username'] = $username;
                $_SESSION['userID'] = $islogin;
                header("Location:../customer/con1/" . $islogin . "/Dashboard");
            } else {
                header("Location:../login/");
            }
        }
    }


    function example()
    {
        $this->index();
    }
}
