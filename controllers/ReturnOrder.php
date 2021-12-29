<?php
require_once("Order.php");
class ReturnOrder extends Order
{
    const STATES = array(
        "Being Approved", "Being Shipped", "Recieved", "Closed", "Cancelled",
    );
    const STATES_PRESENT = array(
        "Being Approved", "Ready to ship", "Recieve", "Close", "Cancel", "ship"
    );
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
    function staffView()
    {
        $this->checkIsStaff();
        $this->view->order = $this;
        $this->view->render('ROrderDetailsStaff');
    }
    function updateStatus()
    {
        $this->checkIsStaff();
        $order_id = $this->getOrderId();
        if (array_key_exists('updatestat', $_POST)) {
            $this->model->incrementStatus($order_id);
        }
        if (array_key_exists('approve', $_POST)) {
            $this->model->approveOrder($order_id);
        }
        if (array_key_exists('cancel', $_POST)) {
            $this->model->declineOrder($order_id);
        }
        if (array_key_exists('close', $_POST)) {
            $this->model->closeOrder($order_id);
        }

        header('Location: ../../../ReturnOrder/con1/' . $order_id . '/staffView');
    }
}
