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
        } else if($filter >= 7 && $filter <= 11){
            $orders = $this->orderLog->getReturnOrders();
            $this->view->orderArr = array();
            foreach ($orders as $order) {
                if ($order->getStatus() == $filter-7) {
                    array_push($this->view->orderArr, $order);
                }
            }
        }else if($filter == 12){
            $this->view->orderArr = $this->orderLog->getReturnOrders();
        }else{
            $this->view->orderArr = $this->orderLog->getBuyOrders();
        }
        /*
        switch ($filter) {
            case "BeingApproved":
                foreach ($orders as $order) {
                    if ($order->getStatus() == 0) {
                        array_push($this->view->orderArr, $order);
                    }
                }
                $this->view->filter = "Being Approved";
                break;
            case "ReadyToShip":
                foreach ($orders as $order) {
                    if ($order->getStatus() == 1) {
                        array_push($this->view->orderArr, $order);
                    }
                }
                $this->view->filter = "Being Approved";
                break;
            case "Invoiced":
                foreach ($orders as $order) {
                    if ($order->getStatus() == 2) {
                        array_push($this->view->orderArr, $order);
                    }
                }
                $this->view->filter = "Being Approved";
                break;
            case "Shipped":
                foreach ($orders as $order) {
                    if ($order->getStatus() == 3) {
                        array_push($this->view->orderArr, $order);
                    }
                }
                $this->view->filter = "Being Approved";
                break;
            case "Delivered":
                foreach ($orders as $order) {
                    if ($order->getStatus() == 4) {
                        array_push($this->view->orderArr, $order);
                    }
                }
                $this->view->filter = "Being Approved";
                break;
            case "Closed":
                foreach ($orders as $order) {
                    if ($order->getStatus() == 5) {
                        array_push($this->view->orderArr, $order);
                    }
                }
                $this->view->filter = "Being Approved";
                break;
            case "Cancelled":
                foreach ($orders as $order) {
                    if ($order->getStatus() == 6) {
                        array_push($this->view->orderArr, $order);
                    }
                }
                $this->view->filter = "Being Approved";
                break;

            default:
                $this->view->orderArr = $this->orderLog->getBuyOrders();
                $this->view->filter = "Being Approved";
                break;
        }
        */
        $this->view->render('GeneralStaffHome');
    }
}
