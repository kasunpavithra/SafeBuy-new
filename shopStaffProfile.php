<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="View/JS/profile.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="View/JS/country.js"></script>

    <title>Account</title>
</head>
<style>
    #title {
        margin: 0;
        padding: 10px;
    }

    body {
        margin: 0;
    }

    .titleClass {
        background-color: grey;
        top: 0;
        text-align: center;
        width: 100%;
        z-index: 1;
    }

    #profile {
        margin-top: 170px;
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
</style>
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
    <div class="titleClass">
        <h1 id="title">Shop Staff Profile</h1>
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
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Personal Information</h5>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Upload picture</a>
                                <br><br>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Security Information</h5>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Change email address</a>
                                <br><br>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Change Password</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Activate email notifications</h5>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Activate</a>
                                <a href="#"></a> <br><br>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="card text-center" id="ShippingAddress">
                <div class="card-header">My Shipping Address</div>
                <div class="card-body">

                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phoneNumber">Password</label>
                                <input type="number" class="form-control" id="phoneNumber" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>



                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="country" name="country" class="form-control">
                                    <option value="Select Country"></option>
                                </select>
                            </div>



                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
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
                        <button type="submit" class="btn btn-primary">Save</button>
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
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>