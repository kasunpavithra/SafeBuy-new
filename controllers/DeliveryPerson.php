<?php
include_once "shopStaff.php";
require_once "OrderLog.php";

class DeliveryPerson extends ShopStaff{
   private $orderLog;
    function __construct($id)
    {
        parent::__construct($id);
       
    }
    function index(){
       
    }
     function dashboard()
    {
        
            $this->checkIsStaff();
            $this->view->invoiceOrders = $this->getInvoiceOrders();
            $this->view->render('DeliveryPersonHome');
        
    }

    function getInvoiceOrders(){
        $this->setOrderLog();
        $invoiceorders=array();
        foreach($this->orderLog->getBuyOrders() as $order){
            if($order->getStatus()==2 || $order->getStatus()==3){
                array_push($invoiceorders,$order);
            }
        }
        return $invoiceorders;
    }

    private function findOrder($orderId, $type)
    {
        $this->setOrderLog();
        $orderArr = null;
        if ($type == 0) $orderArr = $this->orderLog->getBuyOrders();
        else $orderArr =  $this->orderLog->getReturnOrders();
        foreach ($orderArr as $ord) {
            if ($ord->getOrderId() == $orderId) {
                return $ord;
            }
        }
        return null;
    }
    function setOrderLog(){
        if(!isset($this->orderLog)){
            $this->orderLog = new OrderLog();
        }
    }
    function updateStatus($orderId){
        
        $order=$this->findOrder($orderId,0);
        $order->updateStatus();
        echo "hiii my name is vinul";
        header("Location: ../Dashboard");
    }


    
}


