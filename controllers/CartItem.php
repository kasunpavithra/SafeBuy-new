<?php
require_once "Item.php";
class CartItem extends Item
{
    private $cart_item_id;
    private $cart_id;
    private $item_id;
    private $quantity;
    private $exceed = false;
    function __construct($id)
    {

        $this->loadDetail($id);

        parent::__construct($this->item_id);
        $this->setExceed();
    }
    function index()
    {
    }
    function setExceed()
    {
        if ($this->quantity > $this->getAvQuantity()) {
            $this->exceed = true;
        }
    }
    function loadDetail($id)
    {
        $this->loadModel("CartItem");
        $detail = $this->model->getDetail($id)[0];
        $this->cart_item_id = $detail[0];
        $this->cart_id = $detail[1];
        $this->item_id = $detail[2];
        $this->quantity = $detail[3];
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Get the value of cart_id
     */
    public function getCart_id()
    {
        return $this->cart_id;
    }

    /**
     * Get the value of cart_item_id
     */
    public function getCart_item_id()
    {
        return $this->cart_item_id;
    }

    /**
     * Get the value of item_id
     */
    public function getItem_id()
    {
        return $this->item_id;
    }

    /**
     * Get the value of exceed
     */
    public function getExceed()
    {
        return $this->exceed;
    }
}
