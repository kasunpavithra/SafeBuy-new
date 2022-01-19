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
<style>
    body {
        background-image: url('https://images.unsplash.com/photo-1522204523234-8729aa6e3d5f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');

    }


    .bigContainer {
        /* background-color: #00cc00; */

        padding-top: 20px;
    }

    .navbar {
        background-color: wheat;
        height: 100px;
    }



    .btn-outline-success {
        color: #00ff08;
        /* background-color: transparent; */
        background-image: none;
        border-color: #00ff08;

    }

    /* .category {
        margin-top: 10px;
    } */

    .container {
        background-color: #ffffffdc;
        backdrop-filter: blur(10px);
        /* width: 400px;
  height: 400px; */
        /* margin: 7em auto; */
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);

    }

    .pHelloUsername {
        padding: 5px;
        padding-top: 20px;
    }

    table.secondNav {

        width: 100%;
    }

    td.navbartd {
        /* width: min-content; */
        white-space: nowrap;
        padding-top: 30px;


    }


    a {
        color: grey
    }

    .navbar-collapse {

        flex-grow: 0;

    }

    .navbar {
        width: 100%;
        display: block;
    }

    .form-control {

        width: 100%;

    }

    .navbar-brand {
        padding-left: 10px;
    }



    select {
        background-color: wheat;
        border: none;
        width: 200px;
    }

    select {
        background-image: url('https://image.shutterstock.com/z/stock-vector-icon-of-check-box-423141364.jpg');

    }

    .CategoryDropDown {
        border: none;
    }
</style>
<style>
    .card {
        height: 500px;
        width: 100%;
        background-color: #ecfeef;
        position: relative;
        overflow: hidden;
        border: none;
        transition: all 0.5s;
        cursor: pointer;
        border-radius: 20px
    }

    .content1 h1 {
        margin-left: 30px;
        font-size: 60px;
        font-weight: bold;
        color: #3cca5b;
        z-index: 3
    }

    .content2 span {
        margin-left: 30px;
        font-style: Italic;
        font-size: 23px;
        color: #78d68f;
        z-index: 3
    }

    .content3 h3 {
        margin-left: 30px;
        font-size: 28px;
        font-weight: bold;
        color: #3fc75d;
        z-index: 3
    }

    .content3 {
        font-size: 50px;
        font-weight: 700;
        color: #3fc75d;
        font-family: 'Changa', sans-serif;
        display: flex;
        align-items: center;
        z-index: 3
    }

    .image img {
        height: 230px;
        width: 250px;
        position: absolute;
        bottom: 10px;
        right: 1px;
        z-index: 1000;
        transition: all 0.5s
    }

    .card:hover .image img {
        transform: rotate(10deg)
    }

    .rounded-1 {
        position: absolute;
        height: 350px;
        width: 350px;
        background-color: #40cd60;
        border-radius: 50% !important;
        bottom: -100px;
        left: -50px;
        z-index: 1;
        opacity: 0.4;
        transition: all 0.5s;
        transition-delay: 0.5s
    }

    .rounded-2 {
        position: absolute;
        height: 350px;
        width: 350px;
        background-color: #40cd60;
        border-radius: 50% !important;
        bottom: -78px;
        left: -60px;
        z-index: 1;
        opacity: 0.4;
        transition: all 0.5s
    }

    .card:hover .rounded-2 {
        bottom: -90px
    }

    .card:hover .rounded-1 {
        bottom: -110px
    }

    .warranty {
        position: absolute;
        font-weight: 600;
        bottom: 40px;
        left: 30px;
        color: #fff;
        z-index: 200;
        font-size: 30px
    }

    @media (max-width:470px) {
        .image img {
            height: 180px;
            width: 200px;
            position: absolute;
            bottom: 10px;
            right: 1px;
            z-index: 1000
        }
    }

    .bubbles span:nth-child(1) {
        position: absolute;
        height: 100px;
        width: 100px;
        background-color: #40cd60;
        border-radius: 50%;
        top: 10px;
        right: 10px;
        opacity: 0.2
    }

    .bubbles span:nth-child(2) {
        position: absolute;
        height: 50px;
        width: 50px;
        background-color: #40cd60;
        border-radius: 50%;
        top: 80px;
        right: 70px;
        opacity: 0.2
    }
</style>

<body>
    <div id="topNavBar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> -->


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <table class="secondNav">
                    <tr>
                        <td class="navbartd"><a class=" navbar-brand" href="#">SAFEBUY</a></td>
                        <td class="navbartd">
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </td>
                        <td class="navbartd">
                            <div class="CategoryDropDown">
                                <select name="dropDownList" id="dropdowncategory">
                                    <option value="categoryHead">Select Category</option>
                                    <?php
                                    foreach ($this->categories as $categoryName => $items) {  ?>
                                        <option value="<?php echo $categoryName ?>"><?php echo $categoryName ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </td>
                        <td class="navbartd hello"><a href="customerProfile">My Profile</a></td>
                        <td class="navbartd"><a href="orderHistory">Order History</a></td>



                        <!-- <td class="navbartd"><a href="OrderStatusCustomer">Orders</a></td> -->
                        <td class="navbartd"><a href="PayCart">Cart</a></td>
                        <td class="navbartd"><a href="getChat">Chat with us</a></td>
                        <!-- <td class="navbartd"><a href="deleteAccount">Delete My Account</a></td> -->



                        <!-- <img src="../../SafeBuy-new/public/Images/logo.png"> -->
                        <!-- Image Here -->

                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteAccount">
                            Delete My Account
                        </button> -->

                        <!-- Delete Button Hre -->




                        <td class="navbartd"><a href="logout">Log out</a></td>
                        <td class="navbartd"><input type="hidden" id="searchbar" onkeyup="search_category()" type="text" name="search"></td>

                    </tr>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="deleteAccount" tabindex="-1" role="dialog" aria-labelledby="deleteAccount" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteAccount">Confirmation Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form action="deleteAccount" method="post">
                                    <div class="form-group">
                                        <label for="password" class="col-form-label">Input the password:</label>
                                        <input type="password" class="form-control" name="password" name="password" required>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="submit" name="delAcc" class="btn btn-primary">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </nav>
    </div>

    <!-- <div class="bigContainer"> -->
    <!-- <div class="container"> -->

    <!-- Here to implement New -->
    <div id="list">
        <?php foreach ($this->categories as $categoryName => $items) {
            $count = 0; ?>
            <div class="category" value="<?php echo $categoryName ?> ">
                <div class="container" style="margin: 10px auto;">

                    <div class="card-body">
                        <h4>Popular products in <?php echo $categoryName;  ?></h4>
                        <p class="card-text"><?php echo $descriptionList[$categoryName][0]; ?></p>
                    </div>

                    <form action="categoryDetail" method="GET">
                        <input type="hidden" name="categoryID" value="<?php echo $items[0]->getCategoryId(); ?>">

                        <button style="margin: 6px auto;" type="submit" class="btn btn-success">See More</button>

                    </form>
                </div>
                <?php
                foreach ($items as $key => $item) {

                    if ($count++ == 5) {
                        break;
                    }; ?>
                    <div class="fluid-container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <div class="card" >
                                    <div class="row g-0" <?php echo 'onclick=location.href="item?itemID=' . $item->getItemId() . '"' ?>>
                                        <div class="col-md-10">
                                            <div class="content1 mt-5">
                                                <h1><?php echo $item->getName(); ?><br></h1>
                                                <div class="content2"> <span><?php echo $item->getDescription(); ?></span> </div>
                                                <div class="content3 mt-5">

                                                    <h3>Rs : <span class="ms-2"><?php echo ($item->getPrice()); ?></span></h3>
                                                </div>
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
                                                <div class="content3 mt-5">
                                                    <h5 style="margin-left: 5%;"><?php echo ($state); ?></h5>
                                                </div>

                                                <div class="image">
                                                    <!-- <img class="card-img-top" style="width: 20%;  ;margin: 20px; margin-left: auto; margin-right: auto; display: block;" src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($item->getImage()); ?>" /> -->
                                                    <img src="https://i.imgur.com/kvdO7jw.png">
                                                </div> <span class="rounded-1"></span> <span class="rounded-2"></span> <span class="warranty"><?php echo "Discount : " . $item->getDiscount() * 100 . "%"; ?></span>
                                                <div class="bubbles"> <span></span> <span></span> </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div>
                                        <form style="margin-left:30% ;" action="addCartItem" method="POST">
                                            <input type="hidden" name="itemID" value="<?php echo $item->getItemID(); ?>">
                                            <input type="number" placeholder="Quantity" name="quantity" min="1" required>
                                            <br><br>
                                            <button class="btn btn-secondary" type="submit" name="add">Add Item to Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                <?php }

                ?>

            </div>

        <?php   }  ?>
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