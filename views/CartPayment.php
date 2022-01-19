<?php $cart = $this->cart;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        margin-top: 20px;
        background-image: url('https://images.unsplash.com/photo-1591030434469-3d78c7b17820?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80');
    }
</style>

<body>
    <h1>Cart Payment</h1>



    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                                </div>
                                <div class="col-xs-6">
                                    <form action="Dashboard" method="">
                                        <button type="submit" class="btn btn-primary btn-sm btn-block">
                                            <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $amount = 0;
                    $disable = false;
                    foreach ($cart as $cartitem) { ?>
                        <div class="panel-body">
                            <form action="deleteItem" method="post">
                                <div class="row">
                                    <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                                    </div>
                                    <div class="col-xs-4">
                                        <h4 class="product-name"><strong><?php echo $cartitem->getName(); ?></strong></h4>
                                        <h4><small><?php echo $cartitem->getDescription(); ?></small></h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="col-xs-6 text-right">

                                            <h6><strong><?php
                                                        $prc = $cartitem->getPrice() - $cartitem->getPrice() * $cartitem->getDiscount();
                                                        echo ($prc); ?> <span class="text-muted">x</span></strong></h6>
                                        </div>
                                        <div class="col-xs-4">
                                            <input type="text" class="form-control input-sm" value="<?php echo $cartitem->getQuantity(); ?> " readonly>
                                        </div>
                                        <div class="col-xs-2">
                                            <input type="hidden" value="<?php echo $cartitem->getCart_item_id(); ?>" name="itemID">
                                            <button type="submit" class="btn btn-link btn-xs" name="deleteBtn" id="checkoutBtn">
                                                <span class="glyphicon glyphicon-trash"> </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($cartitem->getExceed()) {
                                    $disable = true;
                                ?>
                                    <hr>

                                    <div class="row">
                                        <div class="alert alert-danger" role="alert">
                                            The <?php echo $cartitem->getName();  ?> quantity exeeds.
                                        </div>
                                    </div>
                                <?php  } ?>
                            </form>
                            <hr>
                        <?php $amount += ($prc * $cartitem->getQuantity());
                    }
                    if ($amount > 0) {
                        ?>
                            <form action="placeOrder" method="POST">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentmethod" id="creditcard" value="creditcardpayment" checked>
                                    <label class="form-check-label" for="creditcard">
                                        Credit Card Payment
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentmethod" id="cashon" value="cashonpayment">
                                    <label class="form-check-label" for="cashon">
                                        Cash on Delivery
                                    </label>
                                </div>
                                <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                                <hr>
                                <div class="panel-footer">
                                    <div class="row text-center">
                                        <div class="col-xs-9">
                                            <h4 class="text-right">Total Rs: <strong><?php echo $amount;  ?>/=</strong></h4>
                                        </div>
                                        <div class="col-xs-3">
                                            <?php if ($disable || $amount == 0) { ?>
                                                <button type="button" class="btn btn-success btn-block" disabled>
                                                    Checkout
                                                </button>
                                            <?php } else {
                                            ?>
                                                <button type="submit" class="btn btn-success btn-block" name="placeOrder">
                                                    Checkout
                                                </button>
                                            <?php  } ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                        </div>
                </div>
            </div>
            <div>
            </div>
        </div>
    </div>
</body>
<!-- <script>
    document.getElementById("payConButton").onclick = function() {
        <?php if ($sum > 0 && !$quantityExceed) { ?>
            validateDetails();
        <?php } ?>
    };

    function validateDetails() {

        let conform = document.forms["payConform"];
        if (!conform["username"].value == "" && !conform["cardNumber"].value == "" && !conform["cvv"].value == "" && !conform["expmonth"].value == "" && !conform["expyear"].value == "") {
            let btn = document.getElementById("placeOrderBtn");
            let cshonBtn = document.getElementById("cashOnDelveryBtn");

            btn.className = "btn btn-primary active";
            let thisButn = document.getElementById("payConButton");
            thisButn.className = "btn btn-primary disabled";
            thisButn.style.color = "black";
            thisButn.style.backgroundColor = "yellow";
            btn.type = "submit";
            thisButn.innerHTML = "<div>Credit card details are already confirmed. <br> You can place your order</div>";

        }
    }
</script>
<script>
    function OnCash() {

        <?php if ($sum > 0 && !$quantityExceed) { ?>
            let btn = document.getElementById("placeOrderBtn");
            btn.type = "submit";
            btn.className = "btn btn-primary active";
        <?php } ?>
    }

    function OnCreditCard() {
        <?php if ($sum > 0 && !$quantityExceed) { ?>
            let btn = document.getElementById("placeOrderBtn");
            btn.type = "button";
            if (document.getElementById("payConButton").style.backgroundColor != "yellow") {
                btn.className = "btn btn-primary disabled";
                btn.type = "button";
            } else {
                btn.className = "btn btn-primary active";
                btn.type = "submit";
            }
        <?php } ?>
    }
</script> -->

</html>