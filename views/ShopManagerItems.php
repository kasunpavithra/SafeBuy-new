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
        <?php
        echo "Item ID : " . $item->getItemId();
        ?>
        <?php
        if ($item->getAvailability() == 1) { ?>
            <h4>This Item is removed from you. You can restock the item.</h4>
            <form action="restockItem" method="post">
                Item Name: <?php echo $item->getName(); ?>
                <br>
                Quantity :
                <input type="text" name="quantity" id="quant" value="<?php echo $item->getAvQuantity(); ?>" readonly>
                <input type="hidden" name="itemID" value="<?php echo $item->getItemId(); ?>">
                <input type="submit" value="Re-stock the Item" name="restockItem">

            </form>
            <br><br><br>

        <?php
            continue;
        }

        ?>
        <form action="saveItemDetail" method="post">
            Item Name:
            <input type="text" name="name" id="name" value="<?php echo $item->getName(); ?>">
            <input type="hidden" name="itemID" value="<?php echo $item->getItemId(); ?>">
            <input type="submit" value="Update Name" name="setItemName">
            <br><br>
            Quantity :
            <input type="text" name="quantity" id="quant" value="<?php echo $item->getAvQuantity(); ?>">
            <input type="hidden" name="itemID" value="<?php echo $item->getItemId(); ?>">
            <input type="submit" value="Update Quantity" name="updateQuantity">
            <br><br>
            Description :
            <input type="text" name="description" id="description" value="<?php echo $item->getDescription(); ?>">
            <input type="hidden" name="itemID" value="<?php echo $item->getItemId(); ?>">
            <input type="submit" value="Update description" name="updateDescription">
            <br><br>
            Discount :
            <input type="number" step="0.01" name="discount" id="discount" value="<?php echo $item->getDiscount(); ?>" min="0" max="1">
            <input type="hidden" name="itemID" value="<?php echo $item->getItemId(); ?>">
            <input type="submit" value="Update discount" name="updateDiscount">
            <br><br>
            Price :
            <input type="number" name="price" id="price" value="<?php echo $item->getPrice(); ?>">
            <input type="hidden" name="itemID" value="<?php echo $item->getItemId(); ?>">
            <input type="submit" value="Update Price" name="updatePrice">
            <br><br>
            Image :
            <input type="number" name="price" id="price" value="<?php echo $item->getPrice(); ?>">
            <input type="hidden" name="itemID" value="<?php echo $item->getItemId(); ?>">
            <input type="submit" value="Update Price" name="updatePrice">
            <br><br>
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