<?php
class ShopNotification_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getData($not_id)
    {
        return $this->db->runQuery("SELECT * FROM notification WHERE notification_id=$not_id");
    }
}
