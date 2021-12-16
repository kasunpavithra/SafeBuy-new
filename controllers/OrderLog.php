<?php
class OrderLog extends Controller{
    const STAT =array("Being Approved","Ready to ship","Invoiced","Shipped","Delivered","Closed","Cancelled",
    "return being approved","rerutn canceled", "return closed");
    private $orders;

    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->orders = $this->model->getOrders();
        $this->view->orders = $this->orders;
        //var_dump($orders);
        $this->view->render('OrderLog');
    }
}
?>