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
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    div.container {

        /* background-color: #ffffffdc; */
        backdrop-filter: blur(10px);
        /* width: 400px;
  height: 400px; */
        /* margin: 7em auto; */
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
        padding: 20px;
        margin: 50px;
    }

    body {
        /* background-color: #F45B5B; */
        background-image: url('https://images.unsplash.com/photo-1600414428654-bdee5b7af614?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=773&q=80F');
    }

    form {
        padding: 10px;
    }

    div.orders {
        width: 90%;
        margin: auto;
        border: 1px solid;
        /* border-color: #F45B5B; */
        /* border-radius: 1.5em; */
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
        background-color: #50eb50;
    }

    h1 {
        text-align: center;
    }
</style>
<style>
    a.list-group-item {
        height: auto;
        min-height: 220px;
    }

    form {
        color: black;
    }

    a.list-group-item.active,
    a.list-group-item.active:hover {
        background-color: white;

    }

    .stars {
        margin: 20px auto 1px;
    }
</style>

<body>

    <div class="container">
        <h1> Buy Orders
        </h1>
        <?php
        foreach ($buyOrders as $buyOrder) { ?>
            <div class="row">
                <div class="well">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">

                            <form action="itemDetails" method="GET">
                                <h4>Order ID: <?php echo $buyOrder->getOrderId(); ?> </h4>

                                <h5>Created Date : <?php echo $buyOrder->getCreateDate();  ?></h5>
                                <input type="hidden" name="orderID" value="<?php echo $buyOrder->getOrderId(); ?>">
                                <!-- <input type="submit" value="See More Detail and Rate Items,Order" name=""> -->
                                <button type="submit" class="btn btn-success">See More Detail and Rate Items,Order</button>

                            </form>
                            <form action="OrderStatus" method="GET">
                                <input type="hidden" name="orderID" value="<?php echo $buyOrder->getOrderId(); ?>">

                                <!-- <input type="submit" value="See order Status" name=""> -->
                                <!-- <button type="button" class="btn btn-success">Success</button> -->
                                <button type="submit" class="btn btn-success">See order Status</button>

                            </form>


                        </a>

                    </div>
                </div>
            </div>


        <?php  }   ?>

    </div>
    <div class="container">
        <h1> Return Orders</h1>

        <?php
        foreach ($returnOrders as $returnOrder) { ?>
            <div class="row">
                <div class="well">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">

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


                        </a>

                    </div>
                </div>
            </div>


        <?php  }   ?>

    </div>
    <!-- <div class="container">
        <h1>Buy Orders</h1>
        <?php
        foreach ($buyOrders as $buyOrder) { ?>
            <div class="orders">
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


        <?php  }   ?> -->
    <!-- </div> -->
</body>

</html>