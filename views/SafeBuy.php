<?php $categories = $this->categories;
$descriptionList = $this->descriptionList;
?>
<html>

<head>
</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<title>SafeBuy-search results</title>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SAFEBUY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <!-- Navbar -->

    <h1>Hello Customer</h1>

    <a href="orderHistory">View Order History</a>
    
    
    <a href="OrderStatusCustomer">Orders</a>
    <a href="PayCart">Pay Cart</a>
    <select name="dropDownList" id="dropdowncategory">
        <option value="categoryHead">Select Category</option>
        <?php
        foreach ($this->categories as $categoryName => $items) {  ?>
            <option value="<?php echo $categoryName ?>"><?php echo $categoryName ?></option>
        <?php } ?>
    </select>


    <input type="hidden" id="searchbar" onkeyup="search_category()" type="text" name="search">
    <div class="container">
        <div id="list">
            <?php
            $size = 0;
            foreach ($this->categories as $categoryName => $items) {
                $count = 0;
            ?>
                <div class="category" value="<?php echo $categoryName ?> ">
                    <div class="card-body">
                        <h4>Popular products in <?php echo $categoryName;  ?></h4>
                        <p class="card-text"><?php echo $descriptionList[$categoryName][0]; ?></p>
                    </div>
                    <form action="categoryDetail" method="GET">
                        <input type="hidden" name="categoryID" value="<?php echo $items[0]->getCategoryId(); ?>">
                        <button class="btn btn-primary" type="submit" name="">See More</button>

                    </form>
                    <div class="row" style="width: 100%;">
                        <?php foreach ($items as $key => $item) {
                            if ($count++ == 5) {
                                break;
                            };

                        ?>

                            <div class="col" style="border: 1px solid black;">
                                <form action="addCartItem" method="POST">
                                    <img style="width: 20%;  ;margin: 20px; margin-left: auto; margin-right: auto; display: block;" src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($item->getImage()); ?>" />
                                    <h3><?php echo ("Rs : " . $item->getPrice()); ?></h3>
                                    <h3><?php echo $item->getDescription(); ?></h3>
                                    <h3><?php echo "Discount Rs : " . $item->getDiscount(); ?></h3>
                                    <h3><?php echo "Ratings : " . $item->getRating(); ?></h3>
                                    <h3><?php echo "Review : " . $item->getReview(); ?></h3>
                                    <input type="hidden" name="itemID" value="<?php echo $item->getItemID(); ?>">
                                    <input type="number" placeholder="Quantity" name="quantity" min="1" required>

                                    <?php $status = $item->getStatus();

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

                                </form>
                                <form action="item" method="POST">
                                    <input type="hidden" name="itemID" value="<?php echo $item->getItemID(); ?>">

                                    <button class="btn btn-primary" type="submit" name="itemInfo">See More</button>

                                </form>

                            </div>


                        <?php }  ?>
                    </div>
                </div>
            <?php

            }
            ?>

        </div>
    </div>



    <script>
        let dropList = document.getElementById("dropdowncategory");
        dropList.onchange = search_category;

        function search_category() {
            if (document.getElementById("dropdowncategory").value != "categoryHead") {
                document.getElementById('searchbar').value = document.getElementById("dropdowncategory").value;
                let input = document.getElementById('searchbar').value
                input = input.toLowerCase();
                let x = document.getElementsByClassName('category');

                for (i = 0; i < x.length; i++) {
                    if (!x[i].innerHTML.toLowerCase().includes(input)) {
                        x[i].style.display = "none";
                    } else {
                        x[i].style.display = "list-item";
                    }
                }
            } else {
                document.getElementById('searchbar').value = null;
                let x = document.getElementsByClassName('category');
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "list-item";
                }
            }
        }
    </script>
</body>

</html>