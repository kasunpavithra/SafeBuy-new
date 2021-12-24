<?php
include_once "shopStaff.php";

class DeliveryPerson extends ShopStaff{
   
    function __construct($id)
    {
        parent::__construct($id);
       
    }
    function index(){
       
    }
     function dashboard()
    {
        
            if (!isset($_SESSION['staffuserID'])) {
                header("Location: ../../stafflogin/");
                die();
            }
    
            $this->view->render('DeliveryPersonHome');
        
    }
}
