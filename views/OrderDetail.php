<?php $order = $this->order;
$returnOrder = $this->returnOrder;
// var_dump($returnOrder);
// foreach ($returnOrder->getOrderItems() as $key => $value) {
//     echo $value->getName();
//     echo "<br>";
// };
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <div class="sticky-top">
        <span class="d-block p-2 bg-primary text-white text-center"><?php echo "Order ID : " . $order->getorderID();
                                                                    echo "<br>";
                                                                    echo "Created Date : " . $order->getCreateDate();
                                                                    echo "<br>";
                                                                    if ($order->getStatus() == 4) {
                                                                        echo "Recieved Date : " . $order->getClosedDate();
                                                                        echo "<br>";
                                                                    }
                                                                    echo "Price : " . $order->getAmount();
                                                                    echo '<br>';
                                                                    switch ($order->getStatus()) {
                                                                        case '0':
                                                                            echo "Order Status : Approving";
                                                                            break;
                                                                        case '1':
                                                                            echo "Order Status : Ready for shipping";
                                                                            break;
                                                                        case '2':
                                                                            echo "Order Status : Invoiced";
                                                                            break;
                                                                        case '3':
                                                                            echo "Order Status : Shipping";
                                                                            break;
                                                                        case '4':
                                                                            echo "Order Status : Delivered";
                                                                            break;
                                                                        case '5':
                                                                            echo "Order Status : Already Delivered and Closed";
                                                                            break;
                                                                        default:
                                                                            echo '<div class="alert alert-danger" role="alert">Order has been rejected</div>';
                                                                            break;
                                                                    }
                                                                    ?></span>
    </div>
    <div class="d-block p-2 bg-dark text-white">

        <br>
        <?php
        $items = $order->getOrderItems(); ?>
        <div>
            <form id="shopRateForm" action="updateShopRatingViews" method="post">
                <?php if ($order->getRating() == 0) { ?>
                    <label for="orderrate" id="rateLbl">Rate Now : (1-5) </label>
                    <input type="number" id="orderrate" name="orderrate" min="1" max="5" required>
                    <input type="hidden" name="orderID" value="<?php echo  $order->getOrderId(); ?>">
                    <input type="submit" id="shopRateBtn" name="submitOrderRatings" value="Rate the order">
                <?php

                } else { ?>
                    <label for="rate">Rate </label>
                    <input type="number" name="rate" min="1" max="5" value="<?php echo $order->getRating() ?>" readonly>

                <?php  }
                ?>
            </form>
            <?php
            if ($order->getRating() != 0 && $order->getReview() == "") { ?>
                <form id="shopReviewForm" action="updateShopRatingViews" method="post">
                    <label for="orderreview">Review : </label>
                    <input type="text" id="orderreview" name="orderreview" required>
                    <input type="hidden" name="orderID" value="<?php echo  $order->getOrderId(); ?>">
                    <input type="submit" id="shopReviewBtn" name="submitOrderReviews" value="Review the order">
                </form>
            <?php  }
            ?>
            <?php
            if ($order->getReview() != "") { ?>
                <form>
                    <label>Review </label>
                    <input type="text" value="<?php echo $order->getReview(); ?>" readonly>
                </form>
            <?php } ?>

            <form id="shopReviewForm2" action="updateShopRatingViews" method="post" style="visibility: hidden;">
                <label for="orderreview">Review : </label>
                <input type="text" id="orderreview2" name="orderreview" required>
                <input type="hidden" name="orderID" value="<?php echo  $order->getOrderId(); ?>">
                <input type="submit" id="shopReviewBtn2" name="submitOrderReviews2" value="Review the order">
            </form>
        </div>

    </div>


    <!-- Here -->
    <?php foreach ($items as $item) {
        $canSubmit = true;

    ?>
        <div class="modal fade" id="id<?php echo $item->getOrderItemId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel<?php echo $item->getOrderItemId(); ?>">Rate Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php

                    ?>
                    <div class="modal-body">
                        <form action="submitRate" id="myForm<?php echo $item->getOrderItemId(); ?>" method="POST">
                            <div>
                                <input type="hidden" name="itemID" value="<?php echo $item->getOrderItemId(); ?>">
                            </div>
                            <div class="form-group">
                                <label for="rate<?php echo $item->getOrderItemId(); ?>" class="col-form-label">Rate : </label>
                                <?php if ($item->getOItemRating() == 0) { ?>
                                    <input type="number" class="form-control" name="Itemrate" id="rate<?php echo $item->getOrderItemId(); ?>" min="1" max="5" value="<?php echo $item->getOItemRating(); ?>" required>
                                <?php  } else { ?>
                                    <input type="number" class="form-control" Fmin="1" max="5" value="<?php echo $item->getOItemRating(); ?>" readonly>
                                <?php } ?>

                            </div>
                            <?php
                            if ($item->getOItemRating() == 0) {
                            ?>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button id="rateBtn<?php echo $item->getOrderItemId(); ?>" name="rateBtn" type="submit" class="btn btn-primary">Rate Now</button>
                                </div>
                                <?php   } else {

                                if ($item->getOItemReview() == "") { ?>
                                <?php   } else { ?>

                                    <label class="col-form-label">Review : </label>
                                    <input style="visibility: visible;" type="text" class="form-control" value="<?php echo $item->getOItemReview(); ?>" readonly>
                            <?php }
                            } ?>
                        </form>

                        <?php if ($item->getOItemRating() != 0 && $item->getOItemReview() == "") { ?>
                            <form action="submitReview" id="reviewForm2<?php echo $item->getOrderItemId(); ?>" method="post">
                                <div>
                                    <input type="hidden" name="itemID" value="<?php echo $item->getOrderItemId(); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="itemReview" class="col-form-label">Review : </label>
                                    <input type="text" class="form-control" name="itemReview" id="review2<?php echo $item->getOrderItemId(); ?>" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button id="reviewBtn2<?php echo $item->getOrderItemId(); ?>" name="reviewBtn" type="submit" class="btn btn-primary">Review Now</button>
                                </div>

                            </form>

                        <?php  } ?>



                        <form action="submitReview" id="reviewForm<?php echo $item->getOrderItemId(); ?>" method="post">
                            <div>
                                <input type="hidden" name="itemID" value="<?php echo $item->getOrderItemId(); ?>">
                            </div>
                            <div class="form-group">
                                <label for="itemReview" class="col-form-label">Review : </label>
                                <input type="text" class="form-control" name="itemReview" id="review<?php echo $item->getOrderItemId(); ?>" value="<?php echo $item->getOItemReview(); ?>" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button id="reviewBtn<?php echo $item->getOrderItemId(); ?>" name="reviewBtn" type="submit" class="btn btn-primary">Review Now</button>
                            </div>


                        </form>

                    </div>

                </div>
            </div>
        </div>


    <?php
    }
    ?>

    <?php foreach ($items as $item) {

        if ($order->getStatus() < 4 || $order->getStatus() > 5) { ?>

            <?php
            if ($item instanceof OrderItem) { ?>
                <div class="container p-3 my-3 bg-primary text-white">
                    <h1><?php echo $item->getName(); ?></h1>
                    <p>Quantity : <?php echo $item->getQuantity(); ?></p>
                    <p>Price : <?php echo $item->getSoldPrice();  ?> X <?php echo $item->getQuantity();  ?></p>

                </div>
        <?php
            }
            continue;
        };

        ?>
        <div class="container p-3 my-3 bg-dark text-white" data-toggle="modal" data-target="#id<?php echo $item->getOrderItemId(); ?>" data-whatever="@mdo">
            <h1><?php echo $item->getName() ?></h1>
            <p>Quantity : <?php echo $item->getQuantity() ?></p>
            <p>Price : <?php echo $item->getSoldPrice();  ?> X <?php echo $item->getQuantity();  ?></p>

            <?php
            $timezone = "Asia/Kolkata";
            date_default_timezone_set($timezone);
            $closedDate = new DateTime($order->getClosedDate());
            $today = new DateTime(date("Y-m-d H:i:s"));
            $dates = $today->diff($closedDate)->d;
            $datesExceed = $dates > 7;
            $isAlreadyReturn = ($returnOrder != NULL);
            ?>
        </div>
        <div class="container p-3 my-3 bg-secondary text-white">
            <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample<?php echo $item->getOrderItemId(); ?>" role="button" aria-controls="offcanvasExample<?php echo $item->getOrderItemId(); ?>">
                Return the item
            </a>
        </div>


        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample<?php echo $item->getOrderItemId(); ?>" aria-labelledby="offcanvasExampleLabel<?php echo $item->getOrderItemId(); ?>">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel<?php echo $item->getOrderItemId(); ?>">Hello <?php echo  $_SESSION["username"]; ?></h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php
                if ($isAlreadyReturn) { ?>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Sorry!</h4>
                        <p>You have already place your return Order.</p>
                        <hr>
                        <p class="mb-0">Please check the status!!! Thank you</p>
                    </div>
                <?php   } else if ($datesExceed) { ?>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Sorry!</h4>
                        <p>We have given you only 7 days to return the item.</p>
                        <hr>
                        <p class="mb-0">Please put your rate and review.Thank you.</p>
                    </div>
                <?php   } else {
                ?>

                    <p>We have given you only <?php if (7 - $dates != 0) echo (7 - $dates) . " more days ";
                                                else echo "today " ?> to return items.</p>
                    <form id="returnItem<?php echo $item->getOrderItemId(); ?>" action="" method="post">
                        <div class="form-outline">
                            <input type="number" id="form12<?php echo $item->getOrderItemId(); ?>" name="quantity" class="form-control" min="1" max="<?php echo $item->getQuantity(); ?>" required>
                            <label class="form-label" for="form12<?php echo $item->getOrderItemId(); ?>">Return Quantity</label>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave the reason here" name="reason" id="floatingTextarea2<?php echo $item->getOrderItemId(); ?>" style="height: 100px" required></textarea>
                            <label for="floatingTextarea2<?php echo $item->getOrderItemId(); ?>">Reason for returning</label>
                        </div>
                        <div class="container p-3 my-3 bg-dark text-white">
                            <input type="hidden" name="orderID" value="<?php echo $order->getOrderId(); ?>">
                            <input type="hidden" name="itemName" value="<?php echo $item->getName(); ?>">
                            <input type="hidden" name="price" value="<?php echo $item->getSoldPrice(); ?>">
                            <input type="hidden" name="orderItemID" value="<?php echo $item->getOrderItemId(); ?>">
                            <input class="btn btn-primary" type="submit" id="addBtn<?php echo $item->getOrderItemId(); ?>" name="addReturnItem" value="Add to return Order">
                        </div>

                    </form>
                    <script>
                        $("#returnItem<?php echo $item->getOrderItemId(); ?>").submit(function(event) {
                            document.getElementById("form12<?php echo $item->getOrderItemId(); ?>").readOnly = true;
                            document.getElementById("floatingTextarea2<?php echo $item->getOrderItemId(); ?>").readOnly = true;
                            document.getElementById("addBtn<?php echo $item->getOrderItemId(); ?>").style.visibility = "hidden";

                            event.preventDefault();
                            var formValues = $(this).serialize().split("&");
                            console.log(formValues);
                            var obj = {};
                            for (var key in formValues) {
                                obj[formValues[key].split("=")[0]] = formValues[key].split("=")[1];
                            }

                            var table = document.getElementById("returnTable");

                            // Create an empty <tr> element and add it to the 1st position of the table:
                            var row = table.insertRow(1);

                            // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);

                            // Add some text to the new cells:
                            cell1.innerHTML = obj["itemName"];

                            cell2.innerHTML = obj["quantity"];
                            cell3.innerHTML = obj["reason"];
                            cell4.innerHTML = obj["price"] * obj["quantity"];
                            setReturnItemDetails(obj);
                            console.log(getReturnItemsDetails());

                        })
                    </script>

                <?php } ?>



            </div>
        </div>
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id<?php echo $item->getOrderItemId(); ?>" data-whatever="@mdo">Rate the Item</button> -->
        <script>
            document.getElementById("reviewForm<?php echo $item->getOrderItemId(); ?>").style.visibility = "hidden";
            $("#myForm<?php echo $item->getOrderItemId(); ?>").submit(function(event) {
                event.preventDefault();
                var formValues = $(this).serialize();

                $.post("rateItem", formValues, function(html) {
                    if (html) {
                        document.getElementById("rate<?php echo $item->getOrderItemId(); ?>").readOnly = true;

                        document.getElementById("rateBtn<?php echo $item->getOrderItemId(); ?>").style.visibility = "hidden";
                        document.getElementById("reviewForm<?php echo $item->getOrderItemId(); ?>").style.visibility = "visible";

                    }
                });


            });
            $("#reviewForm<?php echo $item->getOrderItemId(); ?>").submit(function(event) {
                event.preventDefault();
                var formValues = $(this).serialize();

                $.post("reviewItem", formValues, function(html) {
                    if (html) {
                        document.getElementById("review<?php echo $item->getOrderItemId(); ?>").readOnly = true;

                        document.getElementById("reviewBtn<?php echo $item->getOrderItemId(); ?>").style.visibility = "hidden";

                    }
                });

            });
            $("#reviewForm2<?php echo $item->getOrderItemId(); ?>").submit(function(event) {
                event.preventDefault();
                var formValues = $(this).serialize();
                $.post("reviewItem", formValues, function(html) {
                    if (html) {
                        document.getElementById("review2<?php echo $item->getOrderItemId(); ?>").readOnly = true;

                        document.getElementById("reviewBtn2<?php echo $item->getOrderItemId(); ?>").style.visibility = "hidden";

                    }
                });

            })
        </script>


    <?php  } ?>
    <?php if ((3 < $order->getStatus() && $order->getStatus() < 6) && !$datesExceed && !$isAlreadyReturn) { ?>
        <table class="table" id="returnTable">
            <thead>
                <tr>

                    <th scope="col">Return Item</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <div class="alert alert-danger" role="alert">
            <form action="placeReturnOrder" method="post" id="returnOrderConfirm">
                <input type="hidden" name="orderID" value="<?php echo $order->getOrderId(); ?>">
                <input type="submit" class="btn btn-danger" value="Confirm Return Order" name="confirmBtn" id="confirmReturnBtn">
            </form>
        </div>

    <?php } ?>
</body>
<script>
    document.getElementById("shopReviewForm2").style.visibility = "hidden";

    $("#shopRateForm").submit(function(event) {


        event.preventDefault();
        var formValues = $(this).serialize();
        $.post("rateShop", formValues, function(html) {
            if (html) {
                document.getElementById("orderrate").readOnly = true;
                document.getElementById("rateLbl").innerText = "Rate";
                document.getElementById("shopRateBtn").style.visibility = "hidden";
                document.getElementById("shopReviewForm2").style.visibility = "visible";
            }
        });



    });

    $("#shopReviewForm").submit(function(event) {

        event.preventDefault();


        var formValues = $(this).serialize();
        $.post("reviewShop", formValues, function(html) {
            if (html) {
                document.getElementById("orderreview").readOnly = true;
                document.getElementById("shopReviewBtn").style.visibility = "hidden";


            }
        });



    });
    $("#shopReviewForm2").submit(function(event) {

        event.preventDefault();
        var formValues = $(this).serialize();
        $.post("reviewShop", formValues, function(html) {
            if (html) {
                document.getElementById("orderreview2").readOnly = true;
                document.getElementById("shopReviewBtn2").style.visibility = "hidden";
            }
        });



    });
</script>
<script>
    let Objects = [];
    let amount = 0;

    function setReturnItemDetails(obj) {

        Objects.push(obj);
        amount += parseFloat(parseFloat(obj["price"]) * parseFloat(obj["quantity"]));
    }

    function getReturnItemsDetails() {
        if (Objects.length > 0) {
            Objects[0]["amount"] = amount;
        }
        return Objects;
    }
</script>
<script>
    $("#returnOrderConfirm").submit(function(event) {
        // event.preventDefault();
        let formValues = getReturnItemsDetails();
        // console.log(formValues);
        if (formValues.length == 0) {
            alert("Please add items for returning");
            event.preventDefault();

        } else {
            for (let i = 0; i < formValues.length; i++) {
                let b = (formValues[i]);
                console.log(b);
                $.post("returnOrderPlace", b, function(html) {

                });

            }
        }
        // document.getElementById("confirmReturnBtn").style.visibility = "hidden";





    });
</script>

</html>