<?php $item = $this->item;

$ratingList = $this->item->getRatingList();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $item->getName(); ?></title>
</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
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
        background-image: url('https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');
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
    <h2 style="color: cornsilk;" class="text-center"> User Rating Form / Comment Form</h2>
    <?php

    foreach ($ratingList as $key => $value) {
        if ($value[0] == 0) {
            continue;
        }
    ?>
        <div class="container">


            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="img img-rounded img-fluid" />
                            <p class="text-secondary text-center">Customer</p>
                        </div>
                        <div class="col-md-10">
                            <p>
                                <?php
                                for ($i = 0; $i < $value[0]; $i++) {  ?>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                                <?php    }
                                ?>

                            </p>
                            <div class="clearfix"></div>
                            <p><?php echo $value[1]; ?></p>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
    ?>
    <!-- <?php
            foreach ($ratingList as $key => $value) { ?>
        <div>
            Ratings: <?php if ($value[0] != 0) echo $value[0];
                        else echo "Not Rated Yet" ?>
            Review : <?php if ($value[1] != "") echo $value[1];
                        else echo "Not reviewed yet"; ?>
        </div>
    <?php }
    ?> -->
</body>

</html>