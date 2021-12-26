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
    <?php
    foreach ($buyOrders as $buyOrder) { ?>
        <div style="border: 1px solid;">
            <form action="itemDetails" method="GET">
                <h4>Order ID: <?php echo $buyOrder->getOrderId(); ?> </h4>
                <h5>Created Date : <?php echo $buyOrder->getCreateDate();  ?></h5>
                <input type="hidden" name="orderID" value="<?php echo $buyOrder->getOrderId(); ?>">
                <input type="submit" value="See More Detail and Rate Items" name="">
                <hr>
            </form>
        </div>

    <?php  }   ?>
</body>

</html>