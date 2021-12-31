<?php
require_once("shop.php");
require_once("Order.php");
require_once("Menu.php");
require_once("Cart.php");

class SafeBuy extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {

        $menu = new Menu();
        $categories = array();
        $items = $menu->getItems();
        foreach ($items as $key => $value) {
            if (array_key_exists($value->getCategoryName(), $categories)) {
                array_push($categories[$value->getCategoryName()], $value);
            } else {
                $categories[$value->getCategoryName()] = array($value);
            }
        }
        foreach ($categories as $key => $items) {
            usort($categories[$key], fn ($a, $b) => $a->getSoldQuantity() < $b->getSoldQuantity());
        }
        $descriptionList = $menu->getCategoryDescriptionList();
        $descList = array();
        foreach ($descriptionList as $key => $value) {
            $descList[$value[0]] = array();
            array_push($descList[$value[0]], $value[1]);
        }
        $this->view->descriptionList = $descList;
        $this->view->categories = $categories;

        $this->view->render('SafeBuy');
    }
}
