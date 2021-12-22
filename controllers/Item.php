<?php
class Item extends Controller
{
    private $itemId;
    private $name;
    private $categoryId;
    private $price;
    private $avQuantity;
    private $description;
    private $discount;
    private $image;
    private $rating;
    private $review;
    private $status;
    private $createdAt;

    function __construct($itemId)
    {
        parent::__construct();
        $this->itemId = $itemId;

        //load the model
        $this->loadModel("Item");

        $itemDetails = $this->model->getItemDetails($itemId)[0];
        // var_dump($itemDetails);
        $this->name = $itemDetails[1];
        $this->categoryId = $itemDetails[2];
        $this->price = $itemDetails[3];
        $this->avQuantity = $itemDetails[4];
        $this->description = $itemDetails[5];
        $this->discount = $itemDetails[6];
        $this->image = $itemDetails[7];
        $this->rating = $itemDetails[8];
        $this->review = $itemDetails[9];
        $this->status = $itemDetails[10];
        $this->createdAt = $itemDetails[11];
        // var_dump($this);
    }
    function index(){
        echo "hi?";
        //You can crate view option here or within new function
    }
}
