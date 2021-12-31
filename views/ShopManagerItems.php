<?php $items = $this->items; ?>
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
        <form action="saveItemDetail" method="post">
            Item Name: <?php echo $item->getName(); ?>
            <br>
            Quantity :
            <input type="text" name="quantity" id="quant" value="<?php echo $item->getAvQuantity(); ?>">
            <input type="hidden" name="itemID" value="<?php echo $item->getItemId(); ?>">
            <input type="submit" value="Save Details" name="updateQuantity">

        </form>
        <br>
        <form action="deleteItem" method="post">
            <input type="hidden" name="itemID" value="<?php echo $item->getItemId(); ?>">
            <input type="submit" value="Remove Item" name="deleteItem">
        </form>
        <br>
    <?php }
    ?>


</body>

</html>