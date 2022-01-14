<?php
require_once "ShopNotification.php";
class Notification extends Controller
{
    private $customerNotificationID;
    private $customerID;
    private $seen;
    private $notificationID;
    private $description;
    function __construct($not_id)
    {
        parent::__construct();
        $this->setDetails($not_id);
    }

    function setDetails($not_id)
    {

        $this->loadModel("Notification");

        $details = $this->model->getDetails($not_id)[0];
        // print_r($details);
        $this->customerNotificationID = $details["CustomerNotificationID"];
        $this->customerID = $details["customer_id"];
        $this->notificationID = $details["notification_id"];
        $this->seen = $details["seen"];
        $this->description = (ShopNotification::getInstance($this->notificationID))->getDescription();
    }

    /**
     * Get the value of customerNotificationID
     */
    public function getCustomerNotificationID()
    {
        return $this->customerNotificationID;
    }

    /**
     * Get the value of customerID
     */
    public function getCustomerID()
    {
        return $this->customerID;
    }

    /**
     * Get the value of seen
     */
    public function getSeen()
    {
        return $this->seen;
    }

    /**
     * Get the value of notificationID
     */
    public function getNotificationID()
    {
        return $this->notificationID;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }
}
