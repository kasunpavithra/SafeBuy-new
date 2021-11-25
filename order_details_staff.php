<?php
require 'controller/order_details_staff_con.php';
if (!empty($_POST)) {
  updateStatus();
}
$order_dls = getOrderDetails();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- All CSS -->
  <link rel="stylesheet" href="View/CSS/bootstrap.min.css">
  <link rel="stylesheet" href="View/CSS/themify-icons.css">
  <link rel="stylesheet" href="View/CSS/owl.carousel.min.css">
  <link rel="stylesheet" href="View/CSS/   home_staff.css">
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Hello, world!</title>
</head>

<body>


  <!-- Header strat -->
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
          <!-- <img src="images/logo.png" alt=""> -->
        </a>
        <a href="javascript:void(0);" id="mobile-menu-toggler">
          <i class="ti-align-justify"></i>
        </a>
        <ul class="navbar-nav">
          <li class="current-menu-item has-menu-child">
            <a href="#">Categories</a>
            <ul class="sub-menu">
              <li><a href="home-03.html">Add new category</a></li>
              <li><a href="home-01.html">Electronics</a></li>
              <li><a href="home-02.html">Groceries</a></li>
              <li><a href="home-03.html">Clothes</a></li>

            </ul>
          </li>
          <li>
            <a href="#">Deals</a>
            <ul class="sub-menu">
              <li><a href="home-03.html">Add new Deal</a></li>
              <li><a href="home-01.html">Electronics</a></li>
              <li><a href="home-02.html">Groceries</a></li>
              <li><a href="home-03.html">Clothes</a></li>

            </ul>
          </li>
          <li><a href="#">Recent</a></li>
          <li><a href="#">Contact us </a></li>
          <li><a href="#">My Profile</a></li>
          <li><a href="#"><input type="text" placeholder="Search.." class="navbar-search"></a></li>
        </ul>

        <div class="d-inline-flex align-items-center">
          <a href="#" class="search-icon icon">
            <!-- <img src="images/icons/search.png" alt=""> -->
            <i class="ti-search"></i>
          </a>

        </div>
      </nav>
    </div>
  </header>
  <!-- Header ends -->
  <!--order details started-->
  <div class="row">
    <div class="col-md-1"><img src="https://bootdey.com/img/Content/user_3.jpg" class="media-object img-thumbnail" /></div>
    <div class="col-md-11">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-12"><label class="label label-danger"> <?php echo $states[$order_dls["curr_stat"]]; ?></label></div>
          <span><strong>Order ID</strong></span> <span class="label label-info">group name</span><br />
          cost: $<?php echo $order_dls["amount"] ?> <br />
          <!-- add code to disable the accept reject buttons once the order is accepted
                      -->
          <form method="post" action="order_details_staff.php">
            <input name="approve" id="appr" type="submit" data-placement="top" class="btn btn-success btn-xs glyphicon glyphicon-ok" title="View" value="Approve">
            <input name="cancel" id="cnl" type="submit" data-placement="top" class="btn btn-danger btn-xs glyphicon glyphicon-trash" title="Danger" value="Decline">
            <input name="updatestat" id="upt" type="submit" data-placement="top" class="btn btn-info btn-xs glyphicon glyphicon-usd" title="Danger" value="<?php
                                                                                                                                                            echo $states_present[$order_dls["curr_stat"] + 1]; ?>">
            <input name="close" id="cls" type="submit" data-placement="top" class="btn btn-danger btn-xs glyphicon glyphicon-trash" title="Danger" value="Close">

          </form>
        </div>
        <div class="col-md-12">order made on: <?php echo $order_dls["order_date"] ?> by <a href="#"><?php echo $order_dls["customer_name"] ?> </a></div>
      </div>
    </div>
  </div>
  <!--order details end-->

  <div class="container bootdey">
    <div class="panel panel-default panel-order">
      <div class="panel-heading">
        <strong>Order items</strong>
        <div class="btn-group pull-right">
          <div class="btn-group">
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Filter history <i class="fa fa-filter"></i></button>
            <ul class="dropdown-menu dropdown-menu-right">
              <li><a href="#">Approved orders</a></li>
              <li><a href="#">Pending orders</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="panel-footer">Put here some note for example: bootdey si a gallery of free bootstrap snippets bootdeys</div>
    </div>
  </div>


  <!-- Footer strat -->
  <footer class="footer">
    <!-- <div class="container foo-top">
        <div class="row">

      <div class="container"> -->
    <p class="copyright">Copyright © 2019 <a href="#">themeies.com</a>. All rights reserved.</p>
    </div>
  </footer>
  <!-- Footer end -->

  <!-- JS -->
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
    approve_btn = document.getElementById("appr");
    decline_btn = document.getElementById("cnl");
    update_btn = document.getElementById("upt");
    close_btn = document.getElementById("cls");
    var status_value = '<?= $order_dls["curr_stat"] ?>';
    if (status_value == 0) {
      update_btn.style.visibility = 'hidden';
      close_btn.style.visibility = 'hidden';
    } else if (status_value > 0 && status_value < 5) {
      approve_btn.style.width = "0px";
      approve_btn.style.visibility = 'hidden';
      decline_btn.style.visibility = 'hidden';
      decline_btn.style.width = "0px";
      close_btn.style.visibility = 'hidden';
    } else if (status_value == 5) {
      approve_btn.style.visibility = 'hidden';
      decline_btn.style.visibility = 'hidden';
      update_btn.style.visibility = 'hidden';
      close_btn.style.visibility = 'hidden';
    } else if (status_value == 6) {
      approve_btn.style.visibility = 'hidden';
      approve_btn.style.width = "0px";
      decline_btn.style.visibility = 'hidden';
      decline_btn.style.width = "0px";
      update_btn.style.visibility = 'hidden';
      update_btn.style.width = "0px";
      close_btn.style.visibility="hidden";

    }
  </script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/scripts.js"></script>
</body>

</html>