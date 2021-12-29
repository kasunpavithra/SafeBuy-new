<?php $order = $this->order; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php echo "Order ID : " . $order->getorderID(); ?>
    <br>
    <?php
    $items = $order->getOrderItems(); ?>
    <div>
        <form action="updateShopRatingViews" method="post">
            <?php if ($order->getRating() == 0) { ?>
                <label for="rate">Rate Now : (1-5) </label>
                <input type="number" name="rate" min="1" max="5" required>

                <input type="hidden" name="orderID" value="<?php echo  $order->getOrderId(); ?>">
                <input type="submit" name="submitOrderRatings" value="Save">

            <?php

            } else {

                echo "You already rated the order..";
            }
            ?>
        </form>
    </div>
    <?php foreach ($items as $item) {
        $canSubmit = true;
    ?>
        <div style="margin-bottom: 40px;">
            <form action="updateRatingsViews" method="POST">
                <h3><?php echo $item->getName();  ?></h3>
                <h4>Quantity : <?php echo $item->getQuantity(); ?></h4>
                <?php if ($item->getOItemRating() == 0) { ?>
                    <label for="rate">Rate Now : (1-5) </label>
                    <input type="number" name="rate" min="1" max="5">
                <?php
                    $canSubmit = true;
                } else {
                    $canSubmit = false;
                    echo "You already rated the item..";
                }
                ?>
                <br><br>
                <?php if ($item->getOItemReview() == "") { ?>
                    <label for="review">review Now : </label>
                    <input type="text" name="review">
                <?php
                    $canSubmit = true;
                } else {
                    $canSubmit = false;
                    echo "You already reviewed the item..";
                }
                ?>
                <br>
                <?php if ($canSubmit) { ?>
                    <input type="hidden" name="orderItemID" value="<?php echo  $item->getOrderItemId(); ?>">
                    <input type="submit" name="submitrateview" value="Save">
                <?php  } ?>
            </form>
        </div>
    <?php }
    ?>
</body>

</html>