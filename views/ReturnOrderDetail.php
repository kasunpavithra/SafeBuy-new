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

<body>
    <h1><?php echo $order->getOrderId();
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "Status : " . $order->getStatus();
        echo "<br>";

        $items = $order->getOrderItems();
        foreach ($items as $item) {
            echo "Return Order Item ID : " . $item->getROrderItemId();
            echo "<br>";
            echo "Return Order ID : " . $item->getROrderId();
            echo "<br>";
            echo "Return Item Review " . $item->getReturnReview();
            echo "<br>";
            echo "Return Quantity " . $item->getRRuantity();
            echo "<br>";
            echo "Price : " . $item->getSoldPrice();
            echo "<br>";
            echo "Order Item : " . $item->getOrderItemId();
            echo "<hr>";
        }
        echo "Amount : " . $order->getAmount();

        ?></h1>
</body>

</html>