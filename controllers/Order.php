<?php
//the previous implementation of the order class
// class Order extends Controller
// {
//     private $orders;
//     function __construct()
//     {
//         parent::__construct();
//         $this->loadModel("Order");
//         $this->orders = $this->model->getOrders();
//     }
//     function index()
//     {
//         $this->view->users = $this->model->getData();
//         $this->view->render('Test');
//     }

//     function getOrders()
//     {
//         return $this->orders;
//     }
//}

abstract class Order{
    private $items;
    private $orderId;
    private $customerId;
    private $createDate;
    private $status;
    private $amount;

    function __construct($orderDetails){
        $this->orderId =$orderDetails[0];
        $this->customerId =$orderDetails[1];
        $this->createDate =$orderDetails[2];
        $this->status =$orderDetails[3];
        $this->amount =$orderDetails[4];
    }

    function getItems(){
        //create item objects
    }
}

?>
