<?php
class SignUp extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $this->view->render('signup');
    }
    function registerCustomer()
    {
        if (isset($_POST["signUpBtn"])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $houseno = $_POST['houseno'];
            $street = $_POST['street'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $zipcode = $_POST['zipcode'];
            $mobileno = $_POST['mobileno'];
            $isUserExits = $this->model->getUserAlreadyExist($username);
            if (!empty($isUserExits)) {
                header("Location:../signup/");
            } else {
                $isRegister =   $this->model->registerNewCustomer(
                    $username,
                    $password,
                    $name,
                    $email,
                    $houseno,
                    $street,
                    $city,
                    $district,
                    $zipcode,
                    $mobileno
                );
                if ($isRegister) {
                    header("Location:../login/");
                } else {
                    header("Location:../signup/");
                }
            }
        }
        header("Location:../signup/");
    }


    function example()
    {
        $this->index();
    }
}
