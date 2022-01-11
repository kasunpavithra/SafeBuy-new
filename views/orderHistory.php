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
<style>
    div.container {

        background-color: #ffffffdc;
        backdrop-filter: blur(10px);
        /* width: 400px;
  height: 400px; */
        /* margin: 7em auto; */
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
        padding: 20px;
        margin:50px;
    }
    body{
        background-color: #F45B5B;
    }
    form {
    padding: 10px;
}
div.orders{
    width: 90%;
    margin: auto;
    border: 1px solid;
    /* border-color: #F45B5B; */
    /* border-radius: 1.5em; */
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
}
h1{
    text-align: center;
}
</style>

<body>
    <div class="container">
        <h1>Buy Orders</h1>
        <?php
        foreach ($buyOrders as $buyOrder) { ?>
            <div class="orders" >
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
                
            </div>

        <?php  }   ?>

        <h1>Return Orders</h1>
        <?php
        foreach ($returnOrders as $returnOrder) { ?>
            <div class="orders">
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
                
            </div>


        <?php  }   ?>
    </div>
</body>

</html>