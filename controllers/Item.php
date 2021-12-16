<?php
class Item
{
    private $itemId;
    private $name;
    private $categoryId;
    private $price;
    private $description;
    private $discount;
    private $rating;
    private $status;

    function __construct($itemDetails)
    {
        $itemId = $itemDetails[0];
        $name = $itemDetails[1];
        $categoryId = $itemDetails[2];
        $price = $itemDetails[3];
        $description = $itemDetails[4];
        $discount = $itemDetails[5];
        $rating = $itemDetails[6];
        $status = $itemDetails[7];
    }
}
