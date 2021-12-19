<?php
require_once("Order.php");
class BuyOrder extends Order
{
    const STATES = array(
        "Being Approved", "Ready to ship", "Invoiced", "Shipped", "Delivered", "Closed", "Cancelled",
        "return being approved", "rerutn canceled", "return closed"
    );
    const STATES_PRESENT = array(
        "Being Approved", "Ready to ship", "Invoice", "Ship", "Deliver", "Close", "Cancelled",
        "return being approved", "rerutn canceled", "return closed"
    );

    private $orderId;

    function __construct($orderId)
    {
        parent::__construct($orderId);
    }
    function staffView(){
        $this->view->order=$this;
        $this->view->render('OrderDetailsStaff');
    }

    function updateStatus(){
        $order_id=$this->getOrderId();
        if(array_key_exists('updatestat', $_POST)) {
            $this->model->incrementStatus($order_id);
          }if(array_key_exists('approve', $_POST)) {
            $this->model->approveOrder($order_id);
          }if(array_key_exists('cancel', $_POST)) {
            $this->model->declineOrder($order_id);
          }if(array_key_exists('close', $_POST)) {
            $this->model->closeOrder($order_id);
          }
        
        header('Location: ../../../BuyOrder/con1/'.$order_id.'/staffView');
    }
}
?>