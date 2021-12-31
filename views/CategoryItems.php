<?php $items = $this->categoryItems; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    foreach ($items as $item) { ?>
        <div class="row" style="width: 100%;">
            <div class="col" style="border: 1px solid black;">
                <form action="addCartItem" method="POST">
                    <img style="width: 20%;  ;margin: 20px; margin-left: auto; margin-right: auto; display: block;" src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($item->getImage()); ?>" />
                    <h3><?php echo ("Rs : " . $item->getPrice()); ?></h3>
                    <h3><?php echo $item->getDescription(); ?></h3>
                    <h3><?php echo "Discount Rs : " . $item->getDiscount(); ?></h3>
                    <h3><?php echo "Ratings : " . $item->getRating(); ?></h3>
                    <h3><?php echo "Review : " . $item->getReview(); ?></h3>
                    <input type="hidden" name="itemID" value="<?php echo $item->getItemID(); ?>">
                    <input type="number" placeholder="Quantity" name="quantity" min="1" required>

                    <?php $status = $item->getStatus();

                    $state = "";
                    if ($status == 0) {
                        $state = "In Stock";
                    } else if ($status == 1) {
                        $state = "Out of Stock";
                    } else if ($status == 2) {
                        $state = "Already removed from stock";
                    }

                    ?>

                    <h3><?php echo ("Status of the item : " . $state); ?></h3>
                    <button class="btn btn-primary" type="submit" name="add">Add Item to Cart</button>

                </form>
                <form action="item" method="GET">
                    <input type="hidden" name="itemID" value="<?php echo $item->getItemID(); ?>">

                    <button class="btn btn-primary" type="submit" name="">See More</button>

                </form>

            </div>


        <?php }  ?>
        </div>


</body>

</html>