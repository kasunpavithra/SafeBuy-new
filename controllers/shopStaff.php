<?php
include_once "Person.php";
abstract class ShopStaff extends Person
{
    private $orderLog;
    private $staff_id;
    private $name;
    private $mobile_no;
    private $userName;
    private $email;
    private $profile_Pic;
    private $type;
    private $status;

 
    function __construct($id)
    {
        parent::__construct();

        $this->setDetails($id);
    }
    function index()
    {
    }

    function setDetails($id)
    {
        $this->loadModel("ShopStaff");
        $details = $this->model->getDetails($id)[0];
        $this->staff_id = $details["Staff_id"];
        $this->name = $details["Name"];
        $this->mobile_no = $details["Mobile_no"];
        $this->userName = $details["Username"];
        $this->email = $details["Email"];
        $this->profile_Pic = $details["Profile_pic"];
        $this->type = $details["Type"];
        $this->status = $details["status"];
        echo $this->userName;
        echo $this->mobile_no;
    }
    function logout()
    {
        if (isset($_SESSION['staffuserID'])) {
            session_destroy();
        }
        header("Location: ../../../../stafflogin/");
    }
}