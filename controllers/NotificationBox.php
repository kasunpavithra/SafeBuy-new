<?php
require_once("Notification.php");
class NotificationBox extends Controller
{

    private $customerNotificationList;
    private static $NotificationBoxList = array();
    private function __construct($customer_id)
    {
        parent::__construct();
        $this->loadModel("NotificationBox");
        $this->customerNotificationList = array();
        $this->makeDetails($customer_id);
    }
    function index()
    {
    }
    static function getInstance($customer_id)
    {
        if (array_key_exists($customer_id, self::$NotificationBoxList)) {
            return self::$NotificationBoxList[$customer_id];
        } else {
            self::$NotificationBoxList[$customer_id] = new NotificationBox($customer_id);
            return self::$NotificationBoxList[$customer_id];
        }
    }
    function makeDetails($customer_id)
    {

        $notification_idList = $this->model->getNotificationCustomerIDList($customer_id);

        foreach ($notification_idList as $notID) {
            $notification = new Notification($notID[0]);
            array_push($this->customerNotificationList, $notification);
        }
    }

    /**
     * Get the value of customerNotificationList
     */
    public function getCustomerNotificationList()
    {
        return $this->customerNotificationList;
    }
    public function markCustomerNotificationAsSeen($nid)
    {
        return $this->model->markAsSeen($nid);
    }
}
