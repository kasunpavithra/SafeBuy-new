<!DOCTYPE html>
<html lang="en">
<?php $row = ($this->row);

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <link rel="stylesheet" href="../public/CSS/customer_profile.css">
    <link rel="stylesheet" href="../public/CSS/notify.css">
    <!-- <link rel="stylesheet" href="../public/CSS/CreditCard.css"> -->

    <style>
        #title {
            margin-top: 5px;
            margin: 0;
            padding: 10px;
        }

        .titleContainer {
            margin-top: 5px;
            /* background-color: #FF9680; */
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            /* border-bottom: #FF9677; */
            background-image: url('https://images.unsplash.com/photo-1634973357973-f2ed2657db3c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80');

        }

        body {
            margin: 0;
        }

        .titleClass {

            top: 0;
            text-align: center;
            width: 100%;
            z-index: 1;
        }

        #profile {
            margin-top: 60px;
            margin-left: 50px;
            position: fixed;
            z-index: 1;
        }

        .info {
            margin-left: 20%;
        }

        @media screen and (max-width: 700px) {
            #profile {
                display: none;
            }

            .info {
                margin: 0 auto;
            }
        }

        @media screen and (min-width: 700px) {
            #sample {
                display: none;
            }
        }

        #sample {
            text-align: center;
        }

        .btn btn-primary {
            background-color: green;
        }
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');

        body {
            background: #F45B5B;
            color: black;
            background-image: url('https://images.unsplash.com/photo-1576072446584-4955dfe17b86?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');

        }

        nav {
            display: flex;
            align-items: center;
            /* background: #4ecc4a; */
            height: 60px;
            position: relative;
            /* border-bottom: 1px solid #495057; */
            /* background-image: url('https://images.unsplash.com/photo-1634973357973-f2ed2657db3c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80'); */
        }

        .icon {
            cursor: pointer;
            margin-right: 50px;
            line-height: 60px
        }

        .icon span {
            background: #f00;
            padding: 7px;
            border-radius: 50%;
            color: #fff;
            vertical-align: top;
            margin-left: -25px
        }

        .icon img {
            display: inline-block;
            width: 40px;
            margin-top: 4px
        }

        .icon:hover {
            opacity: .7
        }

        .logo {
            flex: 1;
            margin-left: 50px;
            color: #eee;
            font-size: 25px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
        }

        .notifications {
            z-index: 1;
            width: 300px;
            height: 0px;
            opacity: 0;
            position: absolute;
            top: 63px;
            right: 62px;
            border-radius: 5px 0px 5px 5px;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
        }

        .notifications h2 {
            font-size: 14px;
            padding: 10px;
            border-bottom: 1px solid #eee;
            color: #999
        }

        .notifications h2 span {
            color: #f00
        }

        .notifications-item {
            display: flex;
            border-bottom: 1px solid #eee;
            padding: 6px 9px;
            margin-bottom: 0px;
            cursor: pointer
        }

        .notifications-item:hover {
            background-color: #eee
        }

        .notifications-item img {
            display: block;
            width: 50px;
            height: 50px;
            margin-right: 9px;
            border-radius: 50%;
            margin-top: 2px
        }

        .notifications-item .text h4 {
            color: #777;
            font-size: 16px;
            margin-top: 3px
        }

        .notifications-item .text p {
            color: #aaa;
            font-size: 12px
        }

        .icon span {
            background: #f00;
            padding: 3px;
            border-radius: 50%;
            color: #fff;
            vertical-align: top;
            margin-left: -25px;
        }

        h2.logo {
            text-align: left;
        }

        h4.logo {
            text-align: right;
        }

        h4.logout {
            text-align: right;
        }

        table.titleTable {
            width: 100%;

            line-height: 0%;
        }

        a:hover {
            text-decoration: none;
        }

        td.logout {
            padding-right: 15px;
            text-align: right;
            font-size: 20px;
        }

        td {
            height: 50px;
        }

        td.logo {
            /* white-space:pre ; */
            width: 150px;
            text-align: left;
            font-size: 20px;
            padding-left: 15PX;
        }

        img.logo {
            width: 100px;
            height: 100px;
        }

        .overviewGrp {
            border-radius: 5px;
        }

        .UploadPicture {
            width: 220px;
            padding: 5px;
        }

        .EmailNotifications {
            height: 178px;
        }

        /* div.text-center{
            width: 944px;
        } */
    </style>
    <title>Customer Account</title>
</head>

<script>
    $(document).ready(function() {
        var down = false;
        $('#bell').click(function(e) {
            var color = $(this).text();
            if (down) {
                $('#box').css('height', '0px');
                $('#box').css('opacity', '0');
                down = false;
            } else {
                $('#box').css('height', 'auto');
                $('#box').css('opacity', '1');
                down = true;
            }
        });
    });
</script>

<body>
    <div class="titleContainer">
        <div class="titleClass">

            <h1 id="title">My Profile</h1>
        </div>
        <table class="titleTable">
            <tr>
                <td class="logo">
                    <a href="Dashboard">
                        <!-- <img src="../public/Images/Invoice.jpg" alt="Logo" class="logo"> -->
                        <!-- <h2 class="Logo">SafeBuy</h2> -->SafeBuy
                    </a>
                </td>
                <td class="logout">
                    <a href="logout">Log out
                        <!-- <h4 class="logout">LogOut</h4> -->
                    </a>
                </td>
            </tr>
        </table>





        <nav>
            <div class="logo"> STAY HOME AND SHOP ONLINE </div>

            <!-- Here for handle notifications-->

            <div>
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    Offer Notifications
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php
                        $count = 0;
                        foreach ($this->notifications as $notification) {
                            if ($notification->getSeen() == 0) {
                                $count++;
                            }
                        }
                        if ($count > 0) {
                            echo $count . "+";
                        }


                        ?>
                        <span class="visually-hidden">unseen notifications</span>
                    </span>
                </button>
            </div>







            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Notifications Unseen</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <?php
                    foreach ($this->notifications as $notification) {
                        if ($notification->getSeen() == 0) {
                    ?>
                            <form action="markAsSeen" method="POST" id="frm<?php echo $notification->getCustomerNotificationID(); ?>" onclick="this.submit()">
                                <div class="notifications-item"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmIpbf6JIEqeYtASCuaE26N59BuJ52RPPycQ&usqp=CAU" alt="img">

                                    <div class="text">
                                        <!-- <h4><?php echo $notification->getCustomerNotificationID(); ?></h4> -->
                                        <h4>
                                            <b><?php echo $notification->getDescription(); ?></b>
                                        </h4>
                                    </div>
                                </div>
                                <input type="hidden" name="notID" value="<?php echo $notification->getCustomerNotificationID(); ?>" id="btn<?php echo $notification->getCustomerNotificationID() ?>">
                            </form>
                    <?php   }
                    }  ?>
                </div>
            </div>


        </nav>
    </div>

    <!-- <div id=" sample">
                            <a class="list-group-item list-group-item-action active" href="#Overview">Overview</a>
                            <a class="list-group-item list-group-item-action" href="#Orders">Orders</a>
                            <a class="list-group-item list-group-item-action" href="#Setting">Setting</a>
                            <a class="list-group-item list-group-item-action" href="#ShippingAddress">Shipping Address</a>
                            <a class="list-group-item list-group-item-action" href="#MessageCenter">Message Center</a>

            </div> -->

    <div class="row">

        <div class="col-2" id="profile">
            <div>
                <img style="width: 50%;  ;margin: 20px; margin-left: auto; margin-right: auto; display: block;" src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($row["profile_pic"]); ?>" />
            </div>
            <div class="overviewGrp">
                <a class="list-group-item list-group-item-action active" href="#Overview">Overview</a>
                <a class="list-group-item list-group-item-action" href="orderHistory">Orders</a>
                <!-- <a class="list-group-item list-group-item-action" href="#Setting">Setting</a> -->
                <a class="list-group-item list-group-item-action" href="#ShippingAddress">Shipping Address</a>
                <a class="list-group-item list-group-item-action" href="getChat">Message Center</a>
            </div>
        </div>

        <div class="col-9 container info" style="margin-top: 20px;">
            <div class="card text-center" id="Overview">
                <!-- <div class="card-header">My Order</div>
                <div class="card-body">
                    <div class="row" id="overviewElements">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">My Cart</h5>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Click Here</a>
                                    <br><br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Shipped</h5>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Click Here</a>
                                    <br><br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                        <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">To be Shipped</h5>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Click Here</a>
                                    <br><br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-save2" viewBox="0 0 16 16">
                                        <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h2a.5.5 0 0 1 .354.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5A.5.5 0 0 1 5.5 6.5h2V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">To be reviewed</h5>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Click Here</a>
                                    <br><br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                                        <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> -->
            </div>


            <div class="card text-center" id="Settings">
                <div class="card-header">Account</div>
                <div class="row">
                    <div class="col-sm-6">
                        <form action="saveImage" method="POST" enctype="multipart/form-data">

                            <div class="card EmailNotifications">
                                <div class="card-body">
                                    <h5 class="card-title">Upload Picture</h5>
                                    <a class="btn btn-primary UploadPicture">
                                        <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                                        <input type="file" name="image">
                                    </a> <br><br>
                                    <input class="btn btn-primary" type="submit" name="submit" value="Upload Profile Picture">

                                </div>
                            </div>

                        </form>

                    </div>

                    <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Change your Email</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <!-- <span aria-hidden="true">&times;</span> -->
                                    </button>
                                </div>
                                <form action="saveEmail" method="POST">
                                    <div class="modal-body mx-3">
                                        <div class="md-form mb-5">
                                            <!-- <i class="fas fa-envelope prefix grey-text"></i> -->
                                            <input type="email" id="defaultForm-email" name="email" class="form-control validate" required>
                                            <label data-error="wrong" data-success="right" for="defaultForm-email"></label>
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <input type="submit" name="saveEmail" class="btn btn-primary" value="Save">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Change password</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="savePassword" method="POST">
                                    <div class="modal-body mx-3">
                                        <div class="md-form mb-5">
                                            <!-- <i class="fas fa-envelope prefix grey-text"></i> -->
                                            <input type="password" id="defaultForm-password" name="currentPassword" class="form-control validate" required>
                                            <label data-error="wrong" data-success="right" for="defaultForm-password">Current Password</label>
                                        </div>

                                        <div class="md-form mb-4">
                                            <!-- <i class="fas fa-lock prefix grey-text"></i> -->
                                            <input type="password" id="defaultForm-passwordNew" name="newPassword" class="form-control validate" required>
                                            <label data-error="wrong" data-success="right" for="defaultForm-passwordNew">New Password</label>
                                        </div>

                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <input type="submit" class="btn btn-primary" value="Save Password" name="savePassword">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>




                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Security Information</h5>
                                <a href="" class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#modalEmail">Change Email</a>
                                <br>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalPassword">Change Password</a>

                            </div>
                        </div>
                    </div>


                </div>

            </div>


            <div class="card text-center" id="ShippingAddress">
                <div class="card-header">My Shipping Address</div>
                <div class="card-body">

                    <form action="saveInfo" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>

                                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $row['name'] ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="username">User Name</label>

                                <input type="text" class="form-control" id="username" placeholder="User Name" name="username" value="<?php echo $row['username'] ?>" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Street Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="inputAddress" value="<?php echo $row['street'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="houseNumber">House Number</label>
                            <input type="number" class="form-control" id="houseNumber" placeholder="House Number" name="houseNumber" value="<?php echo $row['house_no'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="mobileNumber">Mobile Number</label>
                            <input type="number" class="form-control" id="mobileNumber" placeholder="Mobile Number" name="mobileNumber" value="<?php echo $row['mobile_no'] ?>" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity" name="inputCity" value="<?php echo $row['city'] ?>" required>
                            </div>



                            <div class="form-group col-md-4">
                                <label for="inputDistrict">District</label>
                                <select id="district" name="District" class="form-control" required>
                                    <option><?php echo $row["district"] ?></option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip Code</label>
                                <input type="text" class="form-control" id="inputZip" name="inputZip" value=" <?php echo $row['zip_code'] ?>" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <!-- <input class="form-check-input" type="checkbox" id="gridCheck"> -->
                                <!-- <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label> -->
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="save" name="save">Save</button>
                    </form>
                </div>
            </div>



            <!-- <div class="card text-center" id="Wallet">
                <div class="card-header">Cards & Bank Accounts</div>
                <div class="card-body">

                </div>
            </div> -->


            <!-- <div class="site-footer" data-spm-anchor-id="a2g0o.new_account_index.0.i4.9bae25b9Hzn7hf">
                 <div class="container clearfix">
                    <div class="sf-aliexpressInfo clearfix">
                        <div class="sf-siteIntro col-lg-30 col-md-30 col-sm-60">
                            <dl>
                                <dt>Help</dt>
                                <dd><a href="//sale.aliexpress.com/kr_helpcenter.htm">Customer Service</a>,
                                    <a href="//report.aliexpress.com">Disputes &amp; Reports</a>,
                                    <a href="//sale.aliexpress.com/v8Yr8f629D.htm" ref="nofollow">Buyer Protection</a>,
                                    <a href="http://ipp.alibabagroup.com" ref="nofollow">Report IPR infringement</a>

                                </dd>
                            </dl>
                        </div>
                        <div class="sf-MultiLanguageSite col-lg-30 col-md-30 col-sm-60">
                            <dl>
                                <dt>AliExpress Multi-Language Sites</dt>
                                <dd>
                                    <a href="//ru.aliexpress.com">Russian</a>,
                                    <a href="//pt.aliexpress.com">Portuguese</a>,
                                </dd> 
                            </dl>
                        </div>
                    </div>
                    <div class="sf-seoKeyword col-lg-30 col-md-30 col-sm-60">
                        <dl>
                            <dt>Browse by Category</dt>
                            <dd>
                                <span>
                                    <a href="//www.aliexpress.com/popular.html">All Popular</a>,
                                </span>

                            </dd>
                        </dl>
                    </div>
                    <div class="sf-alibabaGroup col-lg-30 col-md-30 col-sm-60">
                        <dl>
                            <dt>Alibaba Group</dt>
                            <dd>
                                <a href="http://www.alios.cn/" ref="nofollow">AliOS</a>,
                                <a href="http://www.1688.com/" ref="nofollow">1688</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="sf-download-app">
                        <a class="android-link" href="https://play.google.com/store/apps/details?id=com.alibaba.aliexpresshd" ref="nofollow" target="_blank">
                            Google Play
                        </a>
                        <a class="iphone-link" href="https://itunes.apple.com/us/app/aliexpress/id436672029" ref="nofollow" target="_blank">
                            App Store
                        </a>
                    </div>
                </div> -->
        </div>
    </div>


    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                Cart
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- <div class="modal-body">
                    ...
                </div> -->

                <section class="pt-5 pb-5">
                    <div class="container">
                        <div class="row w-100">
                            <div class="col-lg-12 col-md-12 col-12">
                                <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
                                <p class="mb-5 text-center">
                                    <i class="text-info font-weight-bold"><?php echo sizeof($this->cartItems) ?></i> items in your cart
                                </p>
                                <table id="shoppingCart" class="table table-condensed table-responsive">
                                    <thead>
                                        <tr>
                                            <th style="width:60%">Product</th>
                                            <th style="width:12%">Price</th>
                                            <th style="width:10%">Quantity</th>
                                            <th style="width:16%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sum = 0;
                                        $quantityExceed = false;
                                        foreach ($this->cartItems as $key => $value) {
                                            // // // echo($value["itemDetails"][0][1]);
                                            // echo($value[0]);
                                            // echo "<br>";
                                            // echo "<br>";
                                            // echo "<br>";
                                            // echo "<br>";
                                            $stockQuantity = $value["itemDetails"][0][3];
                                            $requiredQuantity = $value[3];


                                        ?>
                                            <tr>
                                                <form action="removeItem/?id=<?php echo $value[0] ?>" method="POST">
                                                    <td data-th="Product">
                                                        <div class="row">
                                                            <div class="col-md-3 text-left">
                                                                <img src="https://via.placeholder.com/250x250/5fa9f8/ffffff" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                                            </div>
                                                            <div class="col-md-9 text-left mt-sm-2">
                                                                <h4> <?php echo ($value["itemDetails"][0][4]); ?></h4>
                                                                <p class="font-weight-light">Brand &amp; Name</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-th="Price"> <?php echo ($value["itemDetails"][0][2]); ?></td>
                                                    <td data-th="Quantity">
                                                        <input type="number" id="quant<?php echo $value["itemDetails"][0][0];  ?>" style="width:100px ;" class="form-control form-control-lg text-center" value='<?php echo $value[3]; ?>' readonly>
                                                        <?php if ($stockQuantity < $requiredQuantity) {
                                                            $quantityExceed = true; ?>
                                                            <script>
                                                                try {
                                                                    document.getElementById("quant<?php echo $value["itemDetails"][0][0]; ?>").style.backgroundColor = "red";
                                                                    document.getElementById("payConButton").className = "btn btn-primary disabled";
                                                                } catch (err) {
                                                                    console.log(err);
                                                                }
                                                            </script>
                                                        <?php  } ?>
                                                    </td>
                                                    <td class="actions" data-th="">
                                                        <div class="text-right">
                                                            <button class="btn btn-white border-secondary bg-white btn-md mb-2" value="">
                                                                <i class="fas fa-sync">Remove Item</i>
                                                            </button>

                                                        </div>
                                                    </td>
                                                </form>

                                            </tr>

                                        <?php
                                            $sum += ($value["itemDetails"][0][2] * $value[3]);
                                        }
                                        ?>
                                        <?php if ($quantityExceed) { ?>

                                            <div style="color: red;">

                                                Quantity of some items have been exceeded.Please remove the item and add enough quantity
                                                <a href="../customerhome/">Here</a>
                                            </div>

                                        <?php
                                        } else if ($sum > 0) { ?>
                                            <div style="color: green;">

                                                You are ready to pay your order.
                                            </div>
                                        <?php  } else {
                                            // echo "<script>document.getElementById('onCashMethod').style.visibility=hidden;</script>";
                                            // echo "<script>document.getElementById('onCreditMethod').style.visibility=hidden;</script>";

                                            // let methd = document.getElementById("onCashMethod");
                                            // methd.style.visibility = hidden;
                                            // let methd2 = document.getElementById("onCreditMethod");
                                            // methd2.style.visibility = hidden;

                                        }
                                        ?>

                                    </tbody>
                                </table>
                                <div class="float-right text-right">
                                    <h4>Subtotal:</h4>
                                    <h1>Rs: <?php echo $sum ?>/=</h1>
                                </div>
                            </div>
                        </div>
                        <form action="placeOrder/?amount=<?php echo $sum; ?>" method="POST">
                            <div class="row mt-4 d-flex align-items-center">
                                <div class="form-check" id="onCreditMethod" onclick="OnCreditCard()">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="flexRadioDefault1" value="oncredit" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Pay by credit card
                                    </label>
                                </div>
                                <div class="form-check" id="onCashMethod" onclick="OnCash()">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="flexRadioDefault2" value="cashOn">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Cash on Dilivery
                                    </label>
                                </div>


                                <div class="col-sm-6 order-md-2 text-right">

                                    <button id="placeOrderBtn" type="button" name="placeOrder" class="btn btn-primary disabled">PlaceOrder</button>


                                </div>
                                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                                    <a href="../customerhome/">
                                        <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                <div class="container py-5">
                    <!-- For demo purpose -->
                    <div class="row mb-4">
                        <div class="col-lg-8 mx-auto text-center">
                            <h1 class="display-6">Payment Forms</h1>
                            <div style="color: grey;">
                                You can use credit card payment or cash on delivery method
                            </div>
                        </div>
                    </div> <!-- End -->
                    <div class="row">
                        <div class="">
                            <div class="card ">
                                <div class="card-header">
                                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                                        <!-- Credit card form tabs -->
                                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                                            <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Cash On Delivery </a> </li>
                                        </ul>
                                    </div> <!-- End -->
                                    <!-- Credit card form content -->
                                    <div class="tab-content">
                                        <!-- credit card info-->
                                        <div id="credit-card" class="tab-pane fade show active pt-3">
                                            <form name="payConform" role="form" onsubmit="event.preventDefault()">
                                                <div class="form-group"> <label for="username">
                                                        <h6>Card Owner</h6>
                                                    </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                                <div class="form-group"> <label for="cardNumber">
                                                        <h6>Card number</h6>
                                                    </label>
                                                    <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                                        <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <div class="form-group"> <label><span class="hidden-xs">
                                                                    <h6>Expiration Date</h6>
                                                                </span></label>
                                                            <div class="input-group"> <input type="number" placeholder="MM" name="expmonth" class="form-control" required>
                                                                <input type="number" placeholder="YY" name="expyear" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                            </label> <input type="text" name="cvv" required class="form-control" require> </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer"> <button id="payConButton" type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="paypal" class="tab-pane fade pt-3">
                                        <h6 class="pb-2">Cash on Dilivery</h6>
                                        <p> <button id="cashOnDelveryBtn" type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> I use cash on Delivery Service</button> </p>
                                        <p class="text-muted" id="cashOnDeliveryStatus"> If you preffer cash on delivery service please aggree. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>



        </div>
    </div>
</body>

<script>
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
</script>
<script>
    const selectDrop = document.querySelector('#district');
    let jsVar = '<?= $row["district"] ?>';
    console.log(<?php $row; ?>);
    console.log(jsVar);
    const districts = [jsVar, 'Colombo', 'Kandy', 'Galle', 'Ampara', 'Anuradhapura', 'Badulla', 'Batticaloa', 'Gampaha', 'Hambantota', 'Jaffna', 'Kalutara', 'Kegalle', 'Kilinochchi', 'Kurunegala', 'Mannar', 'Matale', 'Matara', 'Moneragala', 'Mullativu', 'Nuwara Eliya', 'Polonnaruwa', 'Puttalam', 'Ratnapura', 'Trincomalee', 'Vavuniya'];

    let output = "";
    let set = false;
    districts.forEach(d => {

        if (d == jsVar && !set) {
            output += `<option>${d}</option>`;
            set = true;

        } else if (d != jsVar) {
            output += `<option>${d}</option>`;
        };
    });
    selectDrop.innerHTML = output;
</script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>


</html>