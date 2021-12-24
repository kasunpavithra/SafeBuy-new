<?php
class OrderStatusCustomer extends Controller
{
    private $order_info;
    private $order_Id ;
    public $stat_no;
    function __construct()
    {
        parent::__construct();
        
        //$this->loadModel("OrderStatusCustomer");
    }

    function index()
    {
        $order_Id= 1;
        $order_info = $this->model->getOrderInfo($order_Id);
        if($order_info){
            $this->view->stat_no=$order_info[0]["order_status"];
            $this->view->order_Id=$order_info[0]["orderID"];
            $this->view->render('OrderStatusCustomer');
        }

    }


}
?>