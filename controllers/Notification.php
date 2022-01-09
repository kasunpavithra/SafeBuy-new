<?php
class Notification extends Controller{
    private $customerNotificationID;
    private $customerID;
    private $seen;
    private $notificationID;
    function __construct($not_id)
    {
        parent::__construct();
    }
    function index(){
        $this->view->render('Test');
    }
}
