<?php
$order = $this->order;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <div class="sticky-top">
        <span class="d-block p-2 bg-primary text-white text-center"><?php echo "Order ID : " . $order->getorderID();
                                                                    echo "<br>";
                                                                    echo "Created Date : " . $order->getCreateDate();
                                                                    echo "<br>";
                                                                    if ($order->getStatus() == 4) {
                                                                        echo "Recieved Date : " . $order->getClosedDate();
                                                                        echo "<br>";
                                                                    }
                                                                    echo "Price : " . $order->getAmount();
                                                                    echo '<br>';
                                                                    switch ($order->getStatus()) {
                                                                        case '0':
                                                                            echo "Order Status : Approving";
                                                                            break;
                                                                        case '1':
                                                                            echo "Order Status : Ready for shipping";
                                                                            break;
                                                                        case '2':
                                                                            echo "Order Status : Invoiced";
                                                                            break;
                                                                        case '3':
                                                                            echo "Order Status : Shipping";
                                                                            break;
                                                                        case '4':
                                                                            echo "Order Status : Delivered";
                                                                            break;
                                                                        case '5':
                                                                            echo "Order Status : Already Delivered and Closed";
                                                                            break;
                                                                        default:
                                                                            echo '<div class="alert alert-danger" role="alert">Order has been rejected</div>';
                                                                            break;
                                                                    }
                                                                    ?></span>
    </div>
    <?php

    $items = $order->getOrderItems();
    foreach ($items as $item) { ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title"><?php echo "Return Order Item ID : " . $item->getROrderItemId();
                                                echo "<br>";
                                                echo ($item->getName());

                                                ?></h5>
                        <p class="card-text"><?php echo "Item review " . $item->getReturnReview();
                                                echo "<br>";
                                                echo "Return quantity " . $item->getRRuantity();
                                                echo "<br>";
                                                echo "Price : " . $item->getSoldPrice();
                                                echo "<br>";

                                                ?></p>
                    </div>
                </div>
            </div>
        </div>

    <?php }   ?>

</body>

</html>