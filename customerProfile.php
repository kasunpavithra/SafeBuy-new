<?php

include("controller/customerProfileController.php");

// 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <link rel="stylesheet" href="View/CSS/customer_profile.css">


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
<link rel="stylesheet" href="View/CSS/notify.css">

<body>
    <div>
        <div class="titleClass">
            <h1 id="title">Customer Profile</h1>
        </div>
        <div style="text-align: right; background-color: grey; padding-right: 15px; ;"><a href="home.php">
                <h2>MainPage</h2>
            </a><a href="controller/logoutController.php">
                <h4>LogOut</h4>
            </a></div>
    </div>


    <nav>
        <div class="logo"> STAY HOME AND SHOP ONLINE </div>
        <div class="icon" id="bell"> <img src="https://i.imgur.com/AC7dgLA.png" alt="">
            <span>12</span>
        </div>

        <div class="notifications" id="box">
            <h2>Notifications - <span>2</span></h2>
            <div class="notifications-item"> <img src="https://i.imgur.com/uIgDDDd.jpg" alt="img">
                <div class="text">
                    <h4>Samso aliao</h4>
                    <p>Samso Nagaro Like your home work</p>
                </div>
            </div>
            <div class="notifications-item"> <img src="https://img.icons8.com/flat_round/64/000000/vote-badge.png" alt="img">
                <div class="text">
                    <h4>John Silvester</h4>
                    <p>+20 vista badge earned</p>
                </div>
            </div>

        </div>
    </nav>


    <div id="sample">
        <a class="list-group-item list-group-item-action active" href="#Overview">Overview</a>
        <a class="list-group-item list-group-item-action" href="#Orders">Orders</a>
        <a class="list-group-item list-group-item-action" href="#Setting">Setting</a>
        <a class="list-group-item list-group-item-action" href="#ShippingAddress">Shipping Address</a>
        <a class="list-group-item list-group-item-action" href="#MessageCenter">Message Center</a>

    </div>

    <div class="row">

        <div class="col-2" id="profile">
            <div>
                <img style="width: 50%;  ;margin: 20px; margin-left: auto; margin-right: auto; display: block;" src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($row["Profile_pic"]); ?>" />
            </div>
            <a class="list-group-item list-group-item-action active" href="#Overview">Overview</a>
            <a class="list-group-item list-group-item-action" href="#Orders">Orders</a>
            <a class="list-group-item list-group-item-action" href="#Setting">Setting</a>
            <a class="list-group-item list-group-item-action" href="#ShippingAddress">Shipping Address</a>
            <a class="list-group-item list-group-item-action" href="#MessageCenter">Message Center</a>

        </div>

        <div class="col-9 container info" style="margin-top: 20px;">
            <div class="card text-center" id="Overview">
                <div class="card-header">My Order</div>
                <div class="card-body">
                    <div class="row" id="overviewElements">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Unpaid</h5>
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
                                    <h5 class="card-title">shipped</h5>
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
                                    <h5 class="card-title">To be shipped</h5>
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

                </div>
            </div>


            <div class="card text-center" id="Settings">
                <div class="card-header">Account</div>
                <div class="row">
                    <div class="col-sm-4">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Upload Picture</h5>
                                    <a class="btn btn-primary">
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
                                    <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body mx-3">
                                        <div class="md-form mb-5">
                                            <i class="fas fa-envelope prefix grey-text"></i>
                                            <input type="email" id="defaultForm-email" name="email" class="form-control validate">
                                            <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
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
                                    <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body mx-3">
                                        <div class="md-form mb-5">
                                            <i class="fas fa-envelope prefix grey-text"></i>
                                            <input type="password" id="defaultForm-password" name="currentPassword" class="form-control validate" required>
                                            <label data-error="wrong" data-success="right" for="defaultForm-password">Current Password</label>
                                        </div>

                                        <div class="md-form mb-4">
                                            <i class="fas fa-lock prefix grey-text"></i>
                                            <input type="password" id="defaultForm-passwordNew" name="newPassword" class="form-control validate" required>
                                            <label data-error="wrong" data-success="right" for="defaultForm-passwordNew">New Password</label>
                                        </div>

                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <input type="submit" class="btn btn-primary" value="Save Password" name="savePassword" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>




                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Security Information</h5>
                                <a href="" class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#modalEmail" >Change Email</a>
                                <br><br>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalPassword">Change Password</a>

                            </div>
                        </div>
                    </div>




                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Activate email notifications</h5>
                                <input type="checkbox" checked data-toggle="toggle" data-on="Email<br>Notifications<br>Enable" data-off="Email<br>Notifications<br>Disable">
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="card text-center" id="ShippingAddress">
                <div class="card-header">My Shipping Address</div>
                <div class="card-body">

                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value=<?php echo $row["Name"] ?> required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="username">User Name</label>
                                <input type="text" class="form-control" id="username" placeholder="User Name" name="username" value=<?php echo $row["Username"] ?> required>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Street Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="inputAddress" value=<?php echo $row["Street"] ?> required>
                        </div>
                        <div class="form-group">
                            <label for="houseNumber">House Number</label>
                            <input type="number" class="form-control" id="houseNumber" placeholder="House Number" name="houseNumber" value=<?php echo $row["House_no"] ?> required>
                        </div>
                        <div class="form-group">
                            <label for="mobileNumber">Mobile Number</label>
                            <input type="number" class="form-control" id="mobileNumber" placeholder="Mobile Number" name="mobileNumber" value=<?php echo $row["Mobile_no"] ?> required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity" name="inputCity" value=<?php echo $row["City"] ?> required>
                            </div>



                            <div class="form-group col-md-4">
                                <label for="inputDistrict">District</label>
                                <select id="district" name="District" class="form-control" required>
                                    <option><?php echo $row["District"] ?></option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip Code</label>
                                <input type="text" class="form-control" id="inputZip" name="inputZip" value=<?php echo $row["Zip_code"] ?> required>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="save" name="save">Save</button>
                    </form>

                </div>
            </div>



            <div class="card text-center" id="Wallet">
                <div class="card-header">Cards & Bank Accounts</div>
                <div class="card-body">

                </div>
            </div>


            <div class="site-footer" data-spm-anchor-id="a2g0o.new_account_index.0.i4.9bae25b9Hzn7hf">
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
                </div>
            </div>
        </div>


    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
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
                                    <i class="text-info font-weight-bold">1</i> items in your cart
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
                                        <tr>
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-md-3 text-left">
                                                        <img src="https://via.placeholder.com/250x250/5fa9f8/ffffff" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                                    </div>
                                                    <div class="col-md-9 text-left mt-sm-2">
                                                        <h4>Product Name</h4>
                                                        <p class="font-weight-light">Brand &amp; Name</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price">$49.00</td>
                                            <td data-th="Quantity">
                                                <input type="number" class="form-control form-control-lg text-center" value="1">
                                            </td>
                                            <td class="actions" data-th="">
                                                <div class="text-right">
                                                    <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                                        <i class="fas fa-sync"></i>
                                                    </button>
                                                    <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="float-right text-right">
                                    <h4>Subtotal:</h4>
                                    <h1>$99.00</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 d-flex align-items-center">
                            <div class="col-sm-6 order-md-2 text-right">
                                <a href="catalog.html" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Checkout</a>
                            </div>
                            <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                                <a href="catalog.html">
                                    <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>




</body>
<script>
    const selectDrop = document.querySelector('#district');
    let jsVar = '<?= $row["District"] ?>';
    console.log(<?php $row; ?>);
    console.log(jsVar);
    const districts = [jsVar, 'Colombo', 'Kandy', 'Galle', 'Ampara', 'Anuradhapura', 'Badulla', 'Batticaloa', 'Gampaha', 'Hambantota', 'Jaffna', 'Kalutara', 'Kegalle', 'Kilinochchi', 'Kurunegala', 'Mannar', 'Matale', 'Matara', 'Moneragala', 'Mullativu', 'Nuwara Eliya', 'Polonnaruwa', 'Puttalam', 'Ratnapura', 'Trincomalee', 'Vavuniya'];

    let output = "";
    let set = false;
    districts.forEach(d => {
        // console.log(d);
        if (d == jsVar && !set) {
            output += `<option>${d}</option>`;
            set = true;

        } else if (d != jsVar) {
            output += `<option>${d}</option>`;
        }
    });
    console.log(output);
    selectDrop.innerHTML = output;
</script>

</html>