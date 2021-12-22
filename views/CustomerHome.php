<?php $categories = $this->categories; ?>
<html>

<head>
</head>
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script> -->
<link rel="stylesheet" href="home.css" />
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- All CSS -->
<link rel="stylesheet" href="../public/CSS/bootstrap.min.css">
<link rel="stylesheet" href="../public/CSS/themify-icons.css">
<link rel="stylesheet" href="../public/CSS/owl.carousel.min.css">
<link rel="stylesheet" href="../public/CSS/home_customer.css">

<title>SafeBuy-search results</title>

<body>
    <h1>Hello <?php echo $_SESSION['username'] ?></h1>
    <a href="logout/">Log out</a>
    <a href="customerProfile/">Customer Profile</a>
    <a href="OrderStatusCustomer.php">Orders</a>
    <script>
        function getQuantity(id) {
            
            if(document.getElementById("quant" + id).value==""){
                alert("Please input the number of quantity");
                return false;
            }
            document.cookie=("quant" + id+"="+document.getElementById("quant" + id).value);
            console.log(document.cookie);
            return true;
        }
    </script>

    <div class="container">

        <?php
        foreach ($this->categories as $category) {
            $items = $category["items"];
        ?>



            <div class="card-body">
                <h5 class="card-title"><?php echo $category["category_name"] ?></h5>
                <p class="card-text"><?php echo $category["Description"] ?></p>
            </div>
            <div class="row" style="width: 100%;">
                <?php foreach ($items as $key => $value) { ?>
                    <script>document.cookie="quant<?php echo $value["itemID"] ?>=0"</script>
                    <div class="col" style="border: 1px solid black;">

                        <form name="myForm" action="addItem/?ItemID=<?php echo $value['itemID'] ?>&quantity=<?php echo $_COOKIE["quant".$value['itemID']] ?>" method="POST" onsubmit="getQuantity(<?php echo $value['itemID'] ?>)">
                            <img style="width: 20%;  ;margin: 20px; margin-left: auto; margin-right: auto; display: block;" src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($value["itemImage"]); ?>" />
                            <h3><?php echo ("Rs : " . $value['price']); ?></h3>
                            <h3><?php echo ($value['description']); ?></h3>
                            <h3><?php echo ("Discount Rs : " . $value['discount']); ?></h3>
                            <h3><?php echo ("Ratings : " . $value['rating']); ?></h3>
                            <h3><?php echo ("Review : " . $value['review']); ?></h3>
                            <script>
                                var i = '<?= $value["itemID"] ?>';
                            </script>
                            <input id=<?php echo "quant" . $value["itemID"] ?> type="number" placeholder="Quantity" name="fname" require>

                            <?php $status = $value['status'];

                            $state = "";
                            if ($status == 0) {
                                $state = "In Stock";
                            } else if ($status == 1) {
                                $state = "Out of Stock";
                            } else if ($status == 2) {
                                $state = "Already removed from stock";
                            }

                            ?>

                            <h3><?php echo ("Status of the item : " . $state); ?></h3>
                            <button class="btn btn-primary" type="submit" name="add">Add Item to Cart</button>

                            <!-- <input class="btn btn-primary" type="submit" name="addItem" value="Add to Cart"> -->
                            <!-- <button class="btn btn-primary" type="submit" name="addItem">Add to cart</button> -->
                        </form>

                    </div>


                <?php }  ?>
                <div class="w-100"></div>

            </div>
        <?php

        }
        ?>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>