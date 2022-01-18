<?php
include_once "shopStaff.php";
require_once "OrderLog.php";
require_once "chatLog.php";

class GeneralStaff extends ShopStaff
{
    private $orderLog;
    private $customers;
    private $hasNewMsgs;
    function __construct($id)
    {
        parent::__construct($id);
    }
    function index()
    {
    }
    function dashboard($filter)
    {
        $this->checkIsStaff();
        $this->setOrderLog();
        $this->setCustomers();
        if ($filter >= 0 && $filter <= 6) {
            $orders = $this->orderLog->getBuyOrders();
            $this->view->orderArr = array();
            foreach ($orders as $order) {
                if ($order->getStatus() == $filter) {
                    array_push($this->view->orderArr, $order);
                }
            }
            $this->view->title = BuyOrder::STATES[$filter] . " Buy Orders";
        } else if ($filter >= 7 && $filter <= 11) {
            $orders = $this->orderLog->getReturnOrders();
            $this->view->orderArr = array();
            foreach ($orders as $order) {
                if ($order->getStatus() == $filter - 7) {
                    array_push($this->view->orderArr, $order);
                }
            }
            $this->view->title = ReturnOrder::STATES[$filter - 7] . " Return Orders";
        } else if ($filter == 12) {
            $this->view->orderArr = $this->orderLog->getReturnOrders();
            $this->view->title = "All Return Orders";
        } else {
            $this->view->orderArr = $this->orderLog->getBuyOrders();
            $this->view->title = "All Buy Orders";
        }
        $this->view->filter = true;
        $this->view->gStaff = $this;
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
    /*This funtion is resposible for selecting all orders of given customer id.
    then it prints them. */
    public function cusOtherOrders($customerId)
    {
        $this->setCustomers();
        $this->setOrderLog();
        $OBuyOrders = array();
        $OReturnOrders = array();
        foreach ($this->orderLog->getBuyOrders() as $odr) {
            if ($odr->getCustomerId() == $customerId) {
                array_push($OBuyOrders, $odr);
            }
        }
        foreach ($this->orderLog->getReturnOrders() as $odr) {
            if ($odr->getCustomerId() == $customerId) {
                array_push($OReturnOrders, $odr);
            }
        }
        $this->view->orderArr = $OBuyOrders;
        $this->view->ROrderArr = $OReturnOrders;

        if (!empty($OBuyOrders))
            $this->view->title = $OBuyOrders[0]->getCustomerName() . "'s Buy Orders";
        if(!empty($OReturnOrders))
        $this->view->title2 = $OReturnOrders[0]->getCustomerName() . "'s Return Orders";
        $this->view->title =
            $this->view->render('GeneralStaffHome');
    }

    /*this funtion sets orderLog*/
    function setOrderLog(){
        if(!isset($this->orderLog)){
            $this->orderLog = new OrderLog();
        }
    }
    function chatView($customerId){
        $this->setCustomers();
        $this->view->customerId = $customerId;
        $this->view->chatLog = ChatLog::getInstance($customerId);
        $this->view->render('GeneralStaffChat');
        //mark as seen  //since we want to mark as customers msgs side=0
        $this->view->chatLog->markAsSeen($customerId,0);
    }
    private function setCustomers(){
        if(!isset($this->customers)){
            $customers =  $this->model->getCustomers();
            for($i=0; $i < count($customers); $i++){
                if((ChatLog::getInstance($customers[$i]["Customer_id"]))->getHasNewMsgsStaff()){
                    array_push($customers[$i],1);
                    $this->hasNewMsgs =1;
                }else{
                    array_push($customers[$i],0);
                }
            }
            if(!isset($this->hasNewMsgs)){
                $this->hasNewMsgs =0;
            }
            $this->customers = $customers;
        }
        //var_dump($this->customers);
        $this->view->customers = $this->customers;
        $this->view->hasNewMsgs = $this->hasNewMsgs;
    }

    function sendMessage($customerId){
        if(array_key_exists('msg',$_POST)){
            //since this is staff side status=1
            $msg = htmlspecialchars( $_POST['msg']);
            $this->model->sendMessage($customerId,$msg,1);
        }
        header("Location: ../chatView/".$customerId);
    }

    /**
     * Get the value of haveNewMsgs
     */ 
    public function getHasNewMsgs()
    {
        return $this->hasNewMsgs;
    }
}
