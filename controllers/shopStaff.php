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
        $this->setDetails($id);
    }
    function index()
    {
    }

    function setDetails($id)
    {
        if (is_numeric($id)) {
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
        }
        else{
            header("Location: ../../../stafflogin/");
        }
    }
    function logout()
    {
        if (isset($_SESSION['staffuserID'])) {
            unset($_SESSION['staffuserID']);
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
