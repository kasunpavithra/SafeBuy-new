<?php
include_once "shopStaff.php";
require_once "OrderLog.php";

class GeneralStaff extends ShopStaff
{
    private $orderLog;
    function __construct($id)
    {
        parent::__construct($id);
        $this->orderLog = new OrderLog();
    }
    function index()
    {
    }
    
    function dashboard()
    {

        if (!isset($_SESSION['staffuserID'])) {

            header("Location: ../../stafflogin/");
            die();
        }
        //var_dump($this->orderLog);
        $this->view->orderLog = $this->orderLog;
        $this->view->render('GeneralStaffHome');
    }
}
