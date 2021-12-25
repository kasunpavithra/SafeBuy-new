<?php
require_once "Item.php";
class Menu extends Controller{
    private $items;
    function __construct()
    {
        parent::__construct();
        //load model
        $this->loadModel("Menu");
        $itemsArr = $this->model->getMenuDetails();
        //var_dump($itemsArr);
        $this->items=array();
        foreach($itemsArr as $item){
           array_push($this->items, new Item($item['itemID']));
        }
        // var_dump($this);
        
    }
    function index(){
        echo "Hi? this is the menu";
        //add the presentation logic here
    }
}

?>