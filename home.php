<?php

require_once("controller/homeController.php");

?>


<html>

<head>

</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<link rel="stylesheet" href="home.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- All CSS -->
<link rel="stylesheet" href="View/CSS/bootstrap.min.css">
<link rel="stylesheet" href="View/CSS/themify-icons.css">
<link rel="stylesheet" href="View/CSS/owl.carousel.min.css">
<link rel="stylesheet" href="View/CSS/home_customer.css">

<title>SafeBuy-search results</title>

<body>
    <h1>Hello <?php echo $user_data['Username'] ?></h1>
    <a href="controller/logoutController.php">Log out</a>
    <a href="customerProfile.php">Customer Profile</a>
    <a href="OrderStatusCustomer.php">Orders</a>

    <div class="modal fade" id="paymentOption" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="container d-lg-flex">
                    <div class="box-1 bg-light user">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://images.pexels.com/photos/4925916/pexels-photo-4925916.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="pic rounded-circle" alt="">
                            <p class="ps-2 name">Oliur</p>
                        </div>
                        <div class="box-inner-1 pb-3 mb-3 ">
                            <div class="d-flex justify-content-between mb-3 userdetails">
                                <p class="fw-bold">Lightroom Presets</p>
                                <p class="fw-lighter"><span class="fas fa-dollar-sign"></span>33.00+</p>
                            </div>
                            <div id="my" class="carousel slide carousel-fade img-details" data-bs-ride="carousel" data-bs-interval="2000">
                                <div class="carousel-indicators"> <button type="button" data-bs-target="#my" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button> <button type="button" data-bs-target="#my" data-bs-slide-to="1" aria-label="Slide 2"></button> <button type="button" data-bs-target="#my" data-bs-slide-to="2" aria-label="Slide 3"></button> </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active"> <img src="https://images.pexels.com/photos/100582/pexels-photo-100582.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="d-block w-100"> </div>
                                    <div class="carousel-item"> <img src="https://images.pexels.com/photos/258092/pexels-photo-258092.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="d-block w-100 h-100"> </div>
                                    <div class="carousel-item"> <img src="https://images.pexels.com/photos/7974/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="d-block w-100"> </div>
                                </div> <button class="carousel-control-prev" type="button" data-bs-target="#my" data-bs-slide="prev">
                                    <div class="icon"> <span class="fas fa-arrow-left"></span> </div> <span class="visually-hidden">Previous</span>
                                </button> <button class="carousel-control-next" type="button" data-bs-target="#my" data-bs-slide="next">
                                    <div class="icon"> <span class="fas fa-arrow-right"></span> </div> <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <p class="dis info my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quos ipsa sed officiis odio </p>
                            <div class="radiobtn"> <input type="radio" name="box" id="one"> <input type="radio" name="box" id="two"> <input type="radio" name="box" id="three"> <label for="one" class="box py-2 first">
                                    <div class="d-flex align-items-start"> <span class="circle"></span>
                                        <div class="course">
                                            <div class="d-flex align-items-center justify-content-between mb-2"> <span class="fw-bold"> Collection 01 </span> <span class="fas fa-dollar-sign">29</span> </div> <span>10 x Presets. Released in 2018</span>
                                        </div>
                                    </div>
                                </label> <label for="two" class="box py-2 second">
                                    <div class="d-flex"> <span class="circle"></span>
                                        <div class="course">
                                            <div class="d-flex align-items-center justify-content-between mb-2"> <span class="fw-bold"> Collection 01 </span> <span class="fas fa-dollar-sign">29</span> </div> <span>10 x Presets. Released in 2018</span>
                                        </div>
                                    </div>
                                </label> <label for="three" class="box py-2 third">
                                    <div class="d-flex"> <span class="circle"></span>
                                        <div class="course">
                                            <div class="d-flex align-items-center justify-content-between mb-2"> <span class="fw-bold"> Collection 01 </span> <span class="fas fa-dollar-sign">29</span> </div> <span>10 x Presets. Released in 2018</span>
                                        </div>
                                    </div>
                                </label> </div>
                        </div>
                    </div>
                    <div class="box-2">
                        <div class="box-inner-2">
                            <div>
                                <p class="fw-bold">Payment Details</p>
                                <p class="dis mb-3">Complete your purchase by providing your payment details</p>
                            </div>
                            <form action="">
                                <div class="mb-3">
                                    <p class="dis fw-bold mb-2">Email address</p> <input class="form-control" type="email" value="luke@skywalker.com">
                                </div>
                                <div>
                                    <p class="dis fw-bold mb-2">Card details</p>
                                    <div class="d-flex align-items-center justify-content-between card-atm border rounded">
                                        <div class="fab fa-cc-visa ps-3"></div> <input type="text" class="form-control" placeholder="Card Details">
                                        <div class="d-flex w-50"> <input type="text" class="form-control px-0" placeholder="MM/YY"> <input type="password" maxlength=3 class="form-control px-0" placeholder="CVV"> </div>
                                    </div>
                                    <div class="my-3 cardname">
                                        <p class="dis fw-bold mb-2">Cardholder name</p> <input class="form-control" type="text">
                                    </div>
                                    <div class="address">
                                        <p class="dis fw-bold mb-3">Billing address</p> <select class="form-select" aria-label="Default select example">
                                            <option selected hidden>United States</option>
                                            <option value="1">India</option>
                                            <option value="2">Australia</option>
                                            <option value="3">Canada</option>
                                        </select>
                                        <div class="d-flex"> <input class="form-control zip" type="text" placeholder="ZIP"> <input class="form-control state" type="text" placeholder="State"> </div>
                                        <div class=" my-3">
                                            <p class="dis fw-bold mb-2">VAT Number</p>
                                            <div class="inputWithcheck"> <input class="form-control" type="text" value="GB012345B9"> <span class="fas fa-check"></span> </div>
                                        </div>
                                        <div class="d-flex flex-column dis">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <p>Subtotal</p>
                                                <p><span class="fas fa-dollar-sign"></span>33.00</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <p>VAT<span>(20%)</span></p>
                                                <p><span class="fas fa-dollar-sign"></span>2.80</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <p class="fw-bold">Total</p>
                                                <p class="fw-bold"><span class="fas fa-dollar-sign"></span>35.80</p>
                                            </div>
                                            <div class="btn btn-primary mt-2">Pay<span class="fas fa-dollar-sign px-1"></span>35.80 </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Security Information</h5>
                <a href="" class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#paymentOption">Pay the cart</a>
            </div>
        </div>
    </div>


    <header class="header">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <span>Phone: +01 256 25 235</span>
                        <span>email: info@eiser.com</span>
                    </div>
                    <div class="col text-right">
                        <span>gift card</span>
                        <span>track order</span>
                        <div class="lang d-inline-flex">
                            <span>language </span>
                            <ul class="lang-dropdown">
                                <li>Freance</li>
                                <li>Spanis</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <nav class="navbar">
                <!-- Site logo -->
                <a href="home-01.html" class="logo">
                    <img src="images/logo.png" alt="">
                </a>
                <a href="javascript:void(0);" id="mobile-menu-toggler">
                    <i class="ti-align-justify"></i>
                </a>
                <ul class="navbar-nav">
                    <li class="current-menu-item has-menu-child">
                        <a href="#">Home</a>
                    </li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">My Profile</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="login.html">Sign in</a></li>
                </ul>

                <div class="d-inline-flex align-items-center">
                    <a href="#" class="search-icon icon">
                        <!-- <img src="images/icons/search.png" alt=""> -->
                        <i class="ti-search"></i>
                    </a>
                    <a href="#" class="cart-bag icon">
                        <!-- <img src="images/icons/bag.png" alt=""> -->
                        <i class="ti-shopping-cart"></i>
                        <span class="itemCount">0</span>
                    </a>
                    <a href="#" class="wishlist icon">
                        <i class="ti-heart"></i>
                        <span class="itemCount">09</span>
                    </a>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header End -->


    <!--Trending Products start -->
    <section class="trending-products">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="sec-heading">
                        <h5 class="sec-title">Search results for "xxxx"</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <figure class="product-thumb">
                            <img src="images/products/8.jpg" alt="">
                            <div class="action-links">
                                <a href="#" class="quick-view icon"><i class="ti-eye"></i></a>
                                <a href="#" class="wishlist icon"><i class="ti-heart"></i></a>
                                <a href="#" class="add-cart icon"><i class="ti-shopping-cart"></i></a>
                            </div>
                        </figure>
                        <div class="product-content">
                            <h5 class="product-name"><a href="#">Red Women Purses</a></h5>
                            <div class="ratings">
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                            </div>
                            <p class="price">$35</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <figure class="product-thumb">
                            <img src="images/products/9.jpg" alt="">
                            <div class="action-links">
                                <a href="#" class="quick-view icon"><i class="ti-eye"></i></a>
                                <a href="#" class="wishlist icon"><i class="ti-heart"></i></a>
                                <a href="#" class="add-cart icon"><i class="ti-shopping-cart"></i></a>
                            </div>
                        </figure>
                        <div class="product-content">
                            <h5 class="product-name"><a href="#">Red Women Purses</a></h5>
                            <div class="ratings">
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                            </div>
                            <p class="price">$35</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <figure class="product-thumb">
                            <img src="images/products/10.jpg" alt="">
                            <div class="action-links">
                                <a href="#" class="quick-view icon"><i class="ti-eye"></i></a>
                                <a href="#" class="wishlist icon"><i class="ti-heart"></i></a>
                                <a href="#" class="add-cart icon"><i class="ti-shopping-cart"></i></a>
                            </div>
                        </figure>
                        <div class="product-content">
                            <h5 class="product-name"><a href="#">Red Women Purses</a></h5>
                            <div class="ratings">
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                            </div>
                            <p class="price">$35</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <figure class="product-thumb">
                            <img src="images/products/11.jpg" alt="">
                            <div class="action-links">
                                <a href="#" class="quick-view icon"><i class="ti-eye"></i></a>
                                <a href="#" class="wishlist icon"><i class="ti-heart"></i></a>
                                <a href="#" class="add-cart icon"><i class="ti-shopping-cart"></i></a>
                            </div>
                        </figure>
                        <div class="product-content">
                            <h5 class="product-name"><a href="#">Red Women Purses</a></h5>
                            <div class="ratings">
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                            </div>
                            <p class="price">$35</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <figure class="product-thumb">
                            <img src="images/products/12.jpg" alt="">
                            <div class="action-links">
                                <a href="#" class="quick-view icon"><i class="ti-eye"></i></a>
                                <a href="#" class="wishlist icon"><i class="ti-heart"></i></a>
                                <a href="#" class="add-cart icon"><i class="ti-shopping-cart"></i></a>
                            </div>
                        </figure>
                        <div class="product-content">
                            <h5 class="product-name"><a href="#">Red Women Purses</a></h5>
                            <div class="ratings">
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                            </div>
                            <p class="price">$35</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <figure class="product-thumb">
                            <img src="images/products/13.jpg" alt="">
                            <div class="action-links">
                                <a href="#" class="quick-view icon"><i class="ti-eye"></i></a>
                                <a href="#" class="wishlist icon"><i class="ti-heart"></i></a>
                                <a href="#" class="add-cart icon"><i class="ti-shopping-cart"></i></a>
                            </div>
                        </figure>
                        <div class="product-content">
                            <h5 class="product-name"><a href="#">Red Women Purses</a></h5>
                            <div class="ratings">
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                            </div>
                            <p class="price">$35</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <figure class="product-thumb">
                            <img src="images/products/14.jpg" alt="">
                            <div class="action-links">
                                <a href="#" class="quick-view icon"><i class="ti-eye"></i></a>
                                <a href="#" class="wishlist icon"><i class="ti-heart"></i></a>
                                <a href="#" class="add-cart icon"><i class="ti-shopping-cart"></i></a>
                            </div>
                        </figure>
                        <div class="product-content">
                            <h5 class="product-name"><a href="#">Red Women Purses</a></h5>
                            <div class="ratings">
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                            </div>
                            <p class="price">$35</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <figure class="product-thumb">
                            <img src="images/products/15.jpg" alt="">
                            <div class="action-links">
                                <a href="#" class="quick-view icon"><i class="ti-eye"></i></a>
                                <a href="#" class="wishlist icon"><i class="ti-heart"></i></a>
                                <a href="#" class="add-cart icon"><i class="ti-shopping-cart"></i></a>
                            </div>
                        </figure>
                        <div class="product-content">
                            <h5 class="product-name"><a href="#">Red Women Purses</a></h5>
                            <div class="ratings">
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                                <a href="#"><i class="ti-star"></i></a>
                            </div>
                            <p class="price">$35</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Trending Products end -->

    <!-- Footer strat -->
    <footer class="footer">
        <div class="container foo-top">
            <div class="row">
                <div class="col-md-2 col-sm-6">
                    <div class="widget widget-navigation">
                        <h4 class="widget-title">About us</h4>
                        <ul>
                            <li><a href="#">Who we are</a></li>
                            <li><a href="#">Work with us</a></li>
                            <li><a href="#">Become a supplier</a></li>
                            <li><a href="#">Investor relations</a></li>
                            <li><a href="#">Our devices</a></li>
                            <li><a href="#">Affiliate program</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 offset-md-1 col-sm-6">
                    <div class="widget widget-navigation">
                        <h4 class="widget-title">Useful links</h4>
                        <ul>
                            <li><a href="#">Who we are</a></li>
                            <li><a href="#">Work with us</a></li>
                            <li><a href="#">Become a supplier</a></li>
                            <li><a href="#">Investor relations</a></li>
                            <li><a href="#">Our devices</a></li>
                            <li><a href="#">Affiliate program</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 offset-md-1 col-sm-6">
                    <div class="widget widget-navigation">
                        <h4 class="widget-title">Online shopping</h4>
                        <ul>
                            <li><a href="#">Who we are</a></li>
                            <li><a href="#">Work with us</a></li>
                            <li><a href="#">Become a supplier</a></li>
                            <li><a href="#">Investor relations</a></li>
                            <li><a href="#">Our devices</a></li>
                            <li><a href="#">Affiliate program</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 offset-md-1 col-sm-6">
                    <div class="widget widget-app">
                        <h4 class="widget-title">experience app on mobile</h4>
                        <div class="app-btn">
                            <a href="#" class="google-play">
                                <i class="ti-android"></i>
                                <p><span>get it on</span>Goole play</p>
                            </a>
                            <a href="#" class="app-store">
                                <i class="ti-apple"></i>
                                <p><span>get it on</span>app store</p>
                            </a>
                        </div>
                    </div>
                    <div class="widget widget-social">
                        <h4 class="widget-title">Online shopping</h4>
                        <div class="social-media">
                            <a href="#"><i class="ti-facebook"></i></a><a href="#"><i class="ti-twitter-alt"></i></a><a href="#"><i class="ti-pinterest"></i></a><a href="#"><i class="ti-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <p class="copyright">Copyright © 2019 <a href="#">themeies.com</a>. All rights reserved.</p>
        </div>
    </footer>
    <!-- Footer end -->

    <!-- JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>