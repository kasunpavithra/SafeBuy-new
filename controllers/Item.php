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
    private $categoryName;
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
        $this->categoryName = $this->model->getCategoryName($this->categoryId)[0][0];
        // var_dump($this);
    }
    public function getCategoryName()
    {
        return $this->categoryName;
    }
    function index()
    {
        echo "hi?";
        //You can crate view option here or within new function
    }
    function __toString()
    {
        return $this->name . " " . $this->categoryId . " " . $this->price . " " . $this->categoryName . " <br>";
    }

    /**
     * Get the value of categoryId
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Get the value of categoryName
     */


    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the value of discount
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the value of rating
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Get the value of review
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the value of itemId
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of avQuantity
     */
    public function getAvQuantity()
    {
        return $this->avQuantity;
    }
}
