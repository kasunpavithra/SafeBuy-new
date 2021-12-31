<?php $item = $this->item;

$ratingList = $this->item->getRatingList();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
    <?php
    foreach ($ratingList as $key => $value) { ?>
        <div>
            Ratings: <?php if ($value[0] != 0) echo $value[0];
                        else echo "Not Rated Yet" ?>
            Review : <?php if ($value[1] != "") echo $value[1];
                        else echo "Not reviewed yet"; ?>
        </div>
    <?php }
    ?>
</body>

</html>