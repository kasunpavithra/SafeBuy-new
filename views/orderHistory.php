<?php
$buyOrders = $this->buyOrders;
$returnOrders = $this->returnOrders;
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
    <h1>Buy Orders</h1>
    <?php
    foreach ($buyOrders as $buyOrder) { ?>
        <div style="border: 1px solid;">
            <form action="itemDetails" method="GET">
                <h4>Order ID: <?php echo $buyOrder->getOrderId(); ?> </h4>

                <h5>Created Date : <?php echo $buyOrder->getCreateDate();  ?></h5>
                <input type="hidden" name="orderID" value="<?php echo $buyOrder->getOrderId(); ?>">
                <input type="submit" value="See More Detail and Rate Items,Order" name="">

            </form>
            <form action="OrderStatus" method="GET">
                <input type="hidden" name="orderID" value="<?php echo $buyOrder->getOrderId(); ?>">

                <input type="submit" value="See order Status" name="">
            </form>
            <hr>
        </div>

    <?php  }   ?>

    <h1>Return Orders</h1>
    <?php
    foreach ($returnOrders as $returnOrder) { ?>
        <div style="border: 1px solid;">
            <form action="ReturnitemDetails" method="GET">
                <h4>Return Order ID: <?php echo $returnOrder->getOrderId(); ?> </h4>
                <h4>Buy Order ID of Return Order: <?php echo $returnOrder->getBuyOrderId(); ?> </h4>


                <h5>Created Date : <?php echo $returnOrder->getCreateDate();  ?></h5>
                <input type="hidden" name="orderID" value="<?php echo $returnOrder->getOrderId(); ?>">
                <input type="submit" value="See More Detail and Rate Items,Order" name="">

            </form>
            <form action="ReturnOrderStatus" method="GET">
                <input type="hidden" name="orderID" value="<?php echo $returnOrder->getOrderId(); ?>">

                <input type="submit" value="See order Status" name="">
            </form>
            <hr>
        </div>

    <?php  }   ?>
</body>

</html>