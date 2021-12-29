<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>This is DeliveryPerson</h1>
    <body>
    <h1>Hello <?php echo $_SESSION['staffuserID'] ?></h1>
    <a href="logout/">Log out</a>
    <a href="customerProfile/">Customer Profile</a>
    <a href="OrderStatusCustomer">Orders</a>
    <!-- <script>
        function getQuantity(id) {

            if (document.getElementById("quant" + id).value == "") {
                alert("Please input the number of quantity");
                return false;
            }
            document.cookie = ("quant" + id + "=" + document.getElementById("quant" + id).value);
            console.log(document.cookie);
            return true;
        }
    </script> -->

    <div class="container">

        
                            <h3><?php echo ("Status of the item : " . $state); ?></h3>
                            <button class="btn btn-primary" type="submit" name="add">Add Item to Cart</button>

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
</body>
</html>