<?php $items = $this->items; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form {
        background-color: #ffffffdc;
        backdrop-filter: blur(10px);
        width: 80%;
        height: auto;
        margin: 30px;
padding: 10px;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
    body {
        background-color: #F45B5B;
        font-family: 'Ubuntu', sans-serif;

    }
</style>

<body>
    <div class="container">
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
            <form action="saveItemDetail" method="post" enctype="multipart/form-data">
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
                <input type="number" name="price" id="price" value="<?php echo $item->getPrice(); ?>" min="0">
                <input type="hidden" name="itemID" value="<?php echo $item->getItemId(); ?>">
                <input type="submit" value="Update Price" name="updatePrice">
                <br><br>
                Image :
                <img style="width: 20%;  ;margin: 20px; margin-left: auto; margin-right: auto; display: block;" src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($item->getImage()); ?>" />

                <input type="file" name="image" id="image">
                <input type="hidden" name="itemID" value="<?php echo $item->getItemId(); ?>">
                <input type="submit" value="Update Image" name="updateImage">
                <br><br>
                <form action="deleteItem" method="post">
                <input type="hidden" name="itemID" value="<?php echo $item->getItemId(); ?>">
                <input type="submit" value="Remove Item" name="deleteItem">
            </form>
            <br>
            </form>
            <br>
           

        <?php }
        ?>

    </div>
</body>

</html>