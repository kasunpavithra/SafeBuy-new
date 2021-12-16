<?php
    class OrderDetailsStaff extends Controller{
        private $orderId;
        private $orderDetails;

        function __construct(){
            $orderId = 1;
            parent::__construct();
            $this->orderId = $orderId;
            $this->view->states = array("Being Approved","Ready to ship","Invoiced","Shipped","Delivered","Closed","Cancelled",
            "return being approved","rerutn canceled", "return closed");
            $this->view->states_present = array("Being Approved","Ready to ship","Invoice","Ship","Deliver","Close","Cancelled",
            "return being approved","rerutn canceled", "return closed");
        }
        function index(){
            $this->view->orderDetails= $this->model->getOrderDetails($this->orderId)[0];
            $this->view->customerDetails = $this->model->getCustomerDetails($this->view->orderDetails["Customer_id"])[0];

            $this->view->render('OrderDetailsStaff');
        }

        /*this is the funtion which is resposible for accept, decline or update order status
        by the staff members */
        function updateStatus(){
            $order_id=1;
            if(array_key_exists('updatestat', $_POST)) {
                $this->model->incrementStatus($order_id);
              }if(array_key_exists('approve', $_POST)) {
                $this->model->approveOrder($order_id);
              }if(array_key_exists('cancel', $_POST)) {
                $this->model->declineOrder($order_id);
              }if(array_key_exists('close', $_POST)) {
                $this->model->closeOrder($order_id);
              }
            header("Location: ../OrderDetailsStaff");
        }

    }

?>