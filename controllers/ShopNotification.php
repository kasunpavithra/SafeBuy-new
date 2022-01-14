<?php

class ShopNotification extends Controller
{
    private $notificationID;
    private $description;
    private static $NotificationList = array();

    private function __construct($not_id)
    {
        parent::__construct();
        $this->setDetails($not_id);
    }

    function setDetails($not_id)
    {
        $this->loadModel("ShopNotification");
        $details = $this->model->getData($not_id)[0];
        $this->description = $details["description"];
    }
    static function getInstance($not_id)
    {
        if (array_key_exists($not_id, self::$NotificationList)) {
            return self::$NotificationList[$not_id];
        } else {
            self::$NotificationList[$not_id] = new ShopNotification($not_id);
            return self::$NotificationList[$not_id];
        }
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }
}
