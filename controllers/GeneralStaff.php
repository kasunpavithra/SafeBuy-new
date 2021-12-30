<?php
include_once "shopStaff.php";
require_once "OrderLog.php";

class GeneralStaff extends ShopStaff
{
    private $orderLog;
    function __construct($id)
    {
        parent::__construct($id);
        $this->orderLog = new OrderLog();
    }
    function index()
    {
    }
    function dashboard($filter)
    {
        $this->checkIsStaff();
        if ($filter >= 0 && $filter <= 6) {
            $orders = $this->orderLog->getBuyOrders();
            $this->view->orderArr = array();
            foreach ($orders as $order) {
                if ($order->getStatus() == $filter) {
                    array_push($this->view->orderArr, $order);
                }
            }
            $this->view->title = BuyOrder::STATES[$filter]." Buy Orders";
        } else if ($filter >= 7 && $filter <= 11) {
            $orders = $this->orderLog->getReturnOrders();
            $this->view->orderArr = array();
            foreach ($orders as $order) {
                if ($order->getStatus() == $filter - 7) {
                    array_push($this->view->orderArr, $order);
                }
            }
            $this->view->title = ReturnOrder::STATES[$filter-7]." Return Orders";
        } else if ($filter == 12) {
            $this->view->orderArr = $this->orderLog->getReturnOrders();
            $this->view->title = "All Return Orders";
        } else {
            $this->view->orderArr = $this->orderLog->getBuyOrders();
            $this->view->title = "All Buy Orders";
        }
        $this->view->filter = true;
        $this->view->render('GeneralStaffHome');
    }


    /*this funtion sets the view of BuyOrder for given 
    order Id*/
    function viewBuyOrder($orderId)
    {
        $order = $this->findOrder($orderId, 0);
        $this->view->order = $order;
        $this->view->render('OrderDetailsStaff');
    }


    /*this funtion sets the view of ReturnOrder for given 
    order Id*/
    function viewReturnOrder($orderId)
    {
        $order = $this->findOrder($orderId, 1);
        $this->view->order = $order;
        $this->view->render('ROrderDetailsStaff');
    }


    /*this funtion finds orders from the arraylist from order id
    $type =0 returns buy order and $type = 1 returns the relavant 
    return order*/
    private function findOrder($orderId, $type)
    {
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
    /*this funtion updates the status of order relavant to the
    order id. type=0 updates the relavant BuyOrder and type =1
    updates relavant ReturnOrder */
    public function updateStatus($orderId, $type)
    {
        $order = $this->findOrder($orderId, $type);
        $order->updateStatus();
        if ($type == 0)
            header("Location: ../../viewBuyOrder/" . $orderId);
        else
            header("Location: ../../viewReturnOrder/" . $orderId);
    }

    public function cusOtherOrders($customerId){
        $OBuyOrders = array();
        $OReturnOrders =array();
        foreach($this->orderLog->getBuyOrders() as $odr){
            if ($odr->getCustomerId() == $customerId){
                array_push($OBuyOrders,$odr);
            }
        }
        foreach($this->orderLog->getReturnOrders() as $odr){
            if ($odr->getCustomerId() == $customerId){
                array_push($OReturnOrders,$odr);
            }
        }
        $this->view->orderArr = $OBuyOrders;
        $this->view->ROrderArr = $OReturnOrders;
        $this->view->render('GeneralStaffHome');
        
    }
}
