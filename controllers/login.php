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
                $_SESSION["invalidLogin"] = true;
                header("Location:../login/");
            }
        }
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
                echo "<script>alert('User Already Exists')</script>";
                echo "<script>location.href='../login/'</script>";
                
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

                // header("Location:../login/");
            }
        }
        // header("Location:../login/");
    }


    function example()
    {
        $this->index();
    }
}
