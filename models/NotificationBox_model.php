<?php
class NotificationBox_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getNotificationCustomerIDList($customer_id)
    {
        $sql = "SELECT CustomerNotificationID FROM CUSTOMERNOTIFICATION WHERE CUSTOMER_ID=$customer_id";
        return $this->db->runQuery($sql);
    }
}
