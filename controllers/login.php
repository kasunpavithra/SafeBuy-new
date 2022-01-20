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
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function loginProfile()
    {
        if (isset($_POST["submitLogin"])) {
            $username = $this->test_input($_POST['username']);
            $password = $_POST['password'];
            echo $password;
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
            $username = $this->test_input($_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $name = $this->test_input($_POST['name']);
            // $email = $this->test_input($_POST['email']);
            $email = $this->test_input(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
            $houseno = $this->test_input($_POST['houseno']);
            $street = $this->test_input($_POST['street']);
            $city = $this->test_input($_POST['city']);
            $district = $this->test_input($_POST['district']);
            $zipcode = $this->test_input($_POST['zipcode']);
            $mobileno = $this->test_input($_POST['mobileno']);
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

                header("Location:../login/");
            }
        }
        header("Location:../login/");
    }


    function example()
    {
        $this->index();
    }
}
