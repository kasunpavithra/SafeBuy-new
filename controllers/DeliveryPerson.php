<?php
include_once "shopStaff.php";
require_once "OrderLog.php";

class DeliveryPerson extends ShopStaff
{
    private $orderLog;
    private $currentState;
    function __construct($id)
    {
        parent::__construct($id);
        if($this->status ==0){
            $this->currentState = new Idle();
        }
        elseif($this->status ==1){
            $this->currentState = new AcceptingJobs();
        }
        elseif($this->status ==2){
            $this->currentState = new Delivering();
        }
    }
    function index()
    {
    }
    function dashboard()
    {

        $this->checkIsDeliveryPerson();
        $this->view->userName = $this->userName;
        $this->view->invoiceOrders = $this->getInvoiceOrders();
        $this->view->returnOrders = $this->getReturnOrders();
        $this->view->stateName = $this->currentState->getName();
        $this->view->render('DeliveryPersonHome');
    }

    function getInvoiceOrders()
    {
        $this->setOrderLog();
        $invoiceorders = array();
        foreach ($this->orderLog->getBuyOrders() as $order) {
            if ($order->getStatus() == 2 || $order->getStatus() == 3) {
                array_push($invoiceorders, $order);
            }
        }
        return $invoiceorders;
    }

    function getReturnOrders()
    {
        $this->setOrderLog();
        $returnOrders = array();
        foreach ($this->orderLog->getReturnOrders() as $order) {
            if ($order->getStatus() == 1 || $order->getStatus() == 2) {
                array_push($returnOrders, $order);
            }
        }
        return $returnOrders;
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
    function setOrderLog()
    {
        if (!isset($this->orderLog)) {
            $this->orderLog = new OrderLog();
        }
    }
    function updateStatus($orderId, $type)
    {
        $order = $this->findOrder($orderId, $type);
        $stat = $order->getStatus();
        if($type==1){
            $stat+=1;
        }
        if($this->status==0 && $stat==2 ){
            $this->nextState();
        }
        $order->updateStatus();
        header("Location: ../../Dashboard");
    }
    function updateStatusStaff()
    {
        $this->nextState();
        header("Location: Dashboard");
    }

    public function setState($state)
    {
        $this->currentState = $state;
        $this->updateStaffStatus();
    }
    public function nextState()
    {
        $this->currentState->nextState($this);
    }

    public function updateStaffStatus(){
        $this->model->incrementStatus($this->staff_id);
    }
}

abstract class State
{
    protected $name;
    function __construct($name)
    {
        $this->name=$name;
        
    }
    public abstract function nextState($deliveryPerson);

     /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }
}

class Idle extends State
{
    function __construct()
    {
        parent::__construct("Idle");
    }
    public function nextState($deliveryPerson)
    {
        $deliveryPerson->setState(new AcceptingJobs());
    }
}

class Delivering extends State
{
    function __construct()
    {
        parent::__construct("Delivering");
    }
    public function nextState($deliveryPerson)
    {
        $deliveryPerson->setState(new Idle());
    }
}

class AcceptingJobs extends State
{
    function __construct()
    {
        parent::__construct("Accepting Jobs");
    }
    public function nextState($deliveryPerson)
    {
        $deliveryPerson->setState(new Delivering());
    }

   
}
