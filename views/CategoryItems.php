<?php $items = $this->categoryItems; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $items[0]->getCategoryName(); ?></title>
</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<style>
    td.navbartd {
        /* width: min-content; */
        /* white-space: nowrap; */
        padding-left: 100px;


    }

    * {
        margin: 10px;
        padding: 0
    }

    body {
        display: block;
        justify-content: center;
        align-items: center;
        height: 100vh;
        /* background-color: #3cbc58; */
        background-image: url('https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fG9ubGluZSUyMHNob3BwaW5nfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60');
    }

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
        color: #b54e4f;
        z-index: 3
    }

    .content2 span {
        margin-left: 30px;
        font-style: Italic;
        font-size: 23px;
        color: #a82f31;
        z-index: 3
    }

    .content3 h3 {
        margin-left: 30px;
        font-size: 28px;
        font-weight: bold;
        color: #c43739;
        z-index: 3
    }

    .content3 {
        font-size: 50px;
        font-weight: 700;
        color: #a82f31;
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
        background-color: #b54e4f;
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
        background-color: #b54e4f;
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
        background-color: #b54e4f;
        border-radius: 50%;
        top: 10px;
        right: 10px;
        opacity: 0.2
    }

    .bubbles span:nth-child(2) {
        position: absolute;
        height: 50px;
        width: 50px;
        background-color: #b54e4f;
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
                        <td class="navbartd"><a class=" navbar-brand" href="dashboard">SAFEBUY</a></td>

                        <td class="navbartd hello"><a href="customerProfile">My Profile</a></td>
                        <td class="navbartd"><a href="orderHistory">Order History</a></td>
                        <td class="navbartd"><a href="PayCart">Cart</a></td>
                        <td class="navbartd"><a href="getChat">Chat with us</a></td>




                        <td class="navbartd"><a href="logout">Log out</a></td>
                        <td class="navbartd"><input type="hidden" id="searchbar" onkeyup="search_category()" type="text" name="search"></td>

                    </tr>
                </table>

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



    <div class="container" style="margin: 10px auto;">
        <div class="fluid-container">
            <div class="card-body">

                <p class="card-text">
                <h1 style="color: wheat;">Products in <?php echo $items[0]->getCategoryName(); ?></h1>
                </p>
            </div>
        </div>

    </div>
    <?php
    foreach ($items as $key => $item) { ?>
        <div class="fluid-container">

            <div class="fluid-container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
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

                                        <!-- <div>
                                            <form style="margin-left:30% ;" action="item" method="GET">
                                                <input type="hidden" name="itemID" value="<?php echo $item->getItemID(); ?>">

                                                <button class="btn btn-secondary" type="submit">See More about Item</button>

                                            </form>
                                        </div> -->
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
        </div>
        <br>
    <?php }

    ?>

    <!-- <?php
            foreach ($items as $item) { ?>
        <div class="row" style="width: 100%;">
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
                <form action="item" method="GET">
                    <input type="hidden" name="itemID" value="<?php echo $item->getItemID(); ?>">

                    <button class="btn btn-primary" type="submit" name="">See More</button>

                </form>

            </div>


        <?php }  ?> 
    </div>-->


</body>

</html>