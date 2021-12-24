
<!doctype html>
<html>
<!--  -->
<?php 
$stat_no= $this->stat_no ; 
$order_id=$this->order_Id;
?>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>OrderStatus</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="public/CSS/orderStatus.css">

</head>

<body oncontextmenu='return false' class='snippet-body'>
    <a href="controller/logoutController.php">
        <h4>LogOut</h4>
    </a>
    <a href="home.php">
        <h2>MainPage</h2>
    </a>
    <a href="customerProfile.php">
        <h2>Dashboard</h2>
    </a>
    <div class="container px-1 px-md-4 py-5 mx-auto">
        <div class="card">
            <div class="row d-flex justify-content-between px-3 top">
                <div class="d-flex">
                    <h5>ORDER : <span class="text-primary font-weight-bold"> <?php echo "$order_id"; ?> </span></h5>
                </div>

            </div>
            <?php
            //$stat_no = 1;
            switch ($stat_no) {
                case "0":
                    echo '
                <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <ul id="progressbar" class="text-center">
                        <li class="active step0"></li>
                        <li class="step0"></li>
                        <li class="step0"></li>
                        <li class="step0"></li>
                        <li class="step0"></li>
                    </ul>
                </div>
            </div>';

                    break;
                case "1":
                    echo '
                <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <ul id="progressbar" class="text-center">
                        <li class="active step0"></li>
                        <li class="active step0"></li>
                        <li class="step0"></li>
                        <li class="step0"></li>
                        <li class="step0"></li>
                    </ul>
                </div>
            </div>';
                    break;
                case "2":
                    echo '
                <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <ul id="progressbar" class="text-center">
                        <li class="active step0"></li>
                        <li class="active step0"></li>
                        <li class="active step0"></li>
                        <li class="step0"></li>
                        <li class="step0"></li>
                    </ul>
                </div>
            </div>';
                    break;
                case "3":
                    echo '
                <div class="row d-flex justify-content-center">
                <div class="col-12">
                <ul id="progressbar" class="text-center">
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="step0"></li>
                </ul>
            </div>
            </div>';
                    break;
                case "4":
                    echo '
                <div class="row d-flex justify-content-center">
            <div class="col-12">
                <ul id="progressbar" class="text-center">
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                </ul>
            </div>
        </div>';
                    break;
                case "5":
                    echo '
                    <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <ul id="progressbar" class="text-center">
                        <li class="active step0"></li>
                        <li class="active step0"></li>
                        <li class="active step0"></li>
                        <li class="active step0"></li>
                        <li class="active step0"></li>
                    </ul>
                </div>
            </div>';
                    break;
                case "6":
                    echo ' <div style="color:red" class="row justify-content-between top">
                        <h1>Order cancelled by the shop!</h1>
                  </div>';
                    break;
            }


            if ($stat_no != 6) {
                echo '
            <div class="row justify-content-between top">
                <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold">Order<br>Approved</p>
                    </div>
                </div>
                <div class="row d-flex icon-content"> <img class="icon" src="public/Images/readytoship.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold">Ready<br>to<br>Ship</p>
                    </div>
                </div>
                <div class="row d-flex icon-content"> <img class="icon" src="public/Images/invoice.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold">Order<br>Invoiced</p>
                    </div>
                </div>
                <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold">Order<br>Shipped</p>
                    </div>
                </div>
                <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold">Order<br>Arrived</p>
                    </div>
                </div>
            </div>
        </div>
    </div> ';
            }

            ?>

            <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
            <script type='text/javascript'></script>
</body>

</html>