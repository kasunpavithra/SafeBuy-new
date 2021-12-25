<?php $categories = $this->categories; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Shop Manager </h1>
    <?php

    foreach ($categories as $cat) { ?>
        <form action="categoryItems" method="get">
            <input type="submit" name="category" value="<?php echo $cat;  ?>">
        </form>
    <?php }

    ?>

    <form action="addItem" method="post">
        <label for="categories">Categories</label>
        <select name="categories" id="categories">
            <?php
            foreach ($categories as $key => $value) { ?>
                <option value="<?php echo $value ?>"><?php echo $value ?></option>
            <?php }

            ?>
        </select>
        <label for="category">Category Name</label>
        <input type="text" name="category" id="category">
        <br>
        <label for="item">Item Name</label>
        <input type="text" name="item" id="item">
        <br>
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity">
        <br>
        <input type="submit" value="Add an Item" name="addItemBtn">
    </form>
</body>

</html>