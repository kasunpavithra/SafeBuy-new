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

  private $paymentMethod;
  private $rating;


  function __construct($orderId)
  {
    $this->orderId = $orderId;
    //load the model
    $this->loadModel("BuyOrder");
    //get buyOrder details
    $orderDetails = $this->model->getOrderDetails($orderId)[0];
    $this->customerId = $orderDetails["Customer_id"];
    $this->createDate = $orderDetails["create_date"];
    $this->closedDate = $orderDetails["closed_date"];
    $this->status = $orderDetails["status"];
    $this->amount = $orderDetails["amount"];
    $this->paymentMethod = $orderDetails["payment_method"];
    $this->rating = $orderDetails["rating"];
    $this->review = $orderDetails["review"];

    //call parent 
    parent::__construct($orderId);
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

  }
}
