<?php
require_once("Order.php");
class ReturnOrder extends Order
{
    private $buyOrderId;

    function __construct($orderId)
    {
        $this->orderId = $orderId;
        //load the model
        $this->loadModel("ReturnOrder");
        //get buyOrder details
        $orderDetails = $this->model->getOrderDetails($orderId)[0];

        $this->customerId = $orderDetails['Customer_id'];
        $this->createDate = $orderDetails['create_date'];
        $this->closedDate = $orderDetails['closed_date'];
        $this->status = $orderDetails['status'];
        $this->review = $orderDetails['review'];
        $this->amount = $orderDetails['amount'];
        $this->buyOrderId = $orderDetails['buyorderID'];

        parent::__construct();
    }
    function index()
    {
        var_dump($this);
        //view logic here
    }
}
