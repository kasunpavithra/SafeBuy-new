<?php
require_once "ShopManager.php";
require_once "DeliveryPerson.php";
require_once "GeneralStaff.php";
require_once "OrderLog.php";
require_once "Menu.php";
class Shop extends Controller
{
    private $shopManager = array();
    private $deliveryPersons = array();
    private $orderLog;
    private $menu;
    private $shopStaffList = array();
    private $generalStaff = array();
    function __construct()
    {
        parent::__construct();
        $this->loadModel("Shop");
        $this->setShopStaffList();
        $this->setStaff($this->shopStaffList);
        // $this->setOrderLog(new OrderLog());
        $this->setMenu(new Menu());
    }
    function index()

    {
        // $this->setShopStaffList();
        // $this->setStaff($this->shopStaffList);
    }
    
  
    public function setShopStaffList()
    {
        $staffList = $this->model->getStaffList();
        foreach ($staffList as $key => $value) {
            array_push($this->shopStaffList, [$value[0], $value[1]]);
        }
    }
    function setStaff($shopStaffList)
    {
        foreach ($shopStaffList as $key => $value) {
            //type
            if ($value[1] == 0) {
                array_push($this->shopManager, new ShopManager($value[0]));
            } else if ($value[1] == 1) {
                array_push($this->generalStaff, new GeneralStaff($value[0]));
            } else if ($value[1] == 2) {
                array_push($this->deliveryPersons, new DeliveryPerson($value[0]));
            }
        }
    }

    /**
     * Get the value of menu
     */ 
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set the value of menu
     *
     * @return  self
     */ 
    public function setMenu($menu)
    {
        $this->menu = $menu;

    }

    /**
     * Get the value of orderLog
     */ 
    public function getOrderLog()
    {
        return $this->orderLog;
    }

    /**
     * Set the value of orderLog
     *
     * @return  self
     */ 
    public function setOrderLog($orderLog)
    {
        $this->orderLog = $orderLog;


    }
}
