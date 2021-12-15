<?php
class Order extends Controller
{
    private $orders;
    function __construct()
    {
        parent::__construct();
        $this->loadModel("Order");
        $this->orders = $this->model->getOrders();
    }
    function index()
    {
        $this->view->users = $this->model->getData();
        $this->view->render('Test');
    }

    function getOrders()
    {
        return $this->orders;
    }
}
