<?php
include_once "Person.php";
abstract class ShopStaff extends Person
{
    private $orderLog;
    protected $staff_id;
    private $name;
    private $mobile_no;
    protected $userName;
    private $email;
    private $profile_Pic;
    private $type;
    protected $status;

 
    function __construct($id)
    {
        parent::__construct();
        // if(!isset($_SESSION["staffuserID"])){
        //     $this->logout();
        // }
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
        // echo $this->userName;
        // echo $this->mobile_no;
    }
    function logout()
    {
        if (isset($_SESSION['staffuserID'])) {
            session_destroy();
        }
        header("Location: ../../../stafflogin/");
    }

    /**
     * Get the value of staff_id
     */ 
    public function getStaff_id()
    {
        return $this->staff_id;
    }

    /**
     * Get the value of userName
     */ 
    public function getUserName()
    {
        return $this->userName;
    }
}
