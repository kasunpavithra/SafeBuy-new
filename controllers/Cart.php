<?php
require_once("CartItem.php");
class Cart extends Controller
{
    private $cartItems = array();
    private $cartID;
    function __construct($id)
    {
        parent::__construct();
        $this->loadModel("cart");
        $this->loadCart($id);
        $this->cartID = $id;
    }
    function index()
    {
    }
    function loadCart($id)
    {
        $cartItems = $this->model->loadCartItems($id);
        foreach ($cartItems as $cartItem) {
            array_push($this->cartItems, new CartItem($cartItem[0]));
        }
    }
    function getCartItems()
    {
        return $this->cartItems;
    }

    /**
     * Get the value of cartID
     */ 
    public function getCartID()
    {
        return $this->cartID;
    }
}
