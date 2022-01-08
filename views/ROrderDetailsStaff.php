
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- All CSS -->
  <link rel="stylesheet" href="../../../../public/CSS/bootstrap.min.css">
  <link rel="stylesheet" href="../../../../public/CSS/themify-icons.css">
  <link rel="stylesheet" href="../../../../public/CSS/owl.carousel.min.css">
  <link rel="stylesheet" href="../../../../public/CSS/home_staff.css">
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
          <div class="col-md-12"><label class="label label-danger"> <?php echo ReturnOrder::STATES[$this->order->getStatus()]; ?></label></div>
          <span><strong>Return Order ID: </strong></span> <span class="label label-info"><?php echo $this->order->getOrderId(); ?></span><br />
          cost: $<?php echo $this->order->getamount() ?> <br />
          <!-- add code to disable the accept reject buttons once the order is accepted
                      -->
          <form method="post" <?php echo 'action="../updateStatus/'.$this->order->getOrderId().'/1"'?>>
            <input name="approve" id="appr" type="submit" data-placement="top" class="btn btn-success btn-xs glyphicon glyphicon-ok" title="View" value="Approve">
            <input name="cancel" id="cnl" type="submit" data-placement="top" class="btn btn-danger btn-xs glyphicon glyphicon-trash" title="Danger" value="Decline">
            <input name="updatestat" id="upt" type="submit" data-placement="top" class="btn btn-info btn-xs glyphicon glyphicon-usd" title="Danger" value="<?php
                                                                                                                                                            echo ReturnOrder::STATES_PRESENT[$this->order->getStatus() + 1]; ?>">
            <input name="close" id="cls" type="submit" data-placement="top" class="btn btn-danger btn-xs glyphicon glyphicon-trash" title="Danger" value="Close">

          </form>
        </div>
        <div class="col-md-12">order made on: <?php echo $this->order->getCreateDate() ?> by <?php echo '<a href="../chatView/'.$this->order->getCustomerId().'">'. $this->order->getCustomerName() ?> </a></div>
      </div>
    </div>
  </div>
  <!--order details end-->

  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-6">
      <table class="table table-striped">
        <tr>
          <th>Item Id</th>
          <th>Name</th>
          <th>Quantity</th>
          <th>Price(Rs)</th>
          <th>Discount(%)</th>
        </tr>
        <?php
          foreach($this->order->getOrderItems() as $item){
            echo '<tr><td>'.$item->getItemId().'</td>
                  <td>'.$item->getName().'</td>
                  <td>'.$item->getQuantity().'</td>
                  <td>'.$item->getSoldPrice().'</td>
                  <td>'.$item->getSoldDiscount().'</td></tr>';
          }
        ?>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2"></div> <?php echo
    '<a class="btn btn-success btn-xs glyphicon glyphicon-ok" href="../cusOtherOrders/'.$this->order->getCustomerId().'">See customers previous orders</a>
    <a class="btn btn-info btn-xs glyphicon glyphicon-usd" href="../viewBuyOrder/'.$this->order->getBuyOrderId().'">See Relevant BuyOrder</a>'; ?>
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
    var status_value = '<?= $this->order->getStatus() ?>';
    if (status_value == 0) {
      update_btn.style.visibility = 'hidden';
      close_btn.style.visibility = 'hidden';
    } else if (status_value > 0 && status_value < 3) {
      approve_btn.style.width = "0px";
      approve_btn.style.visibility = 'hidden';
      decline_btn.style.visibility = 'hidden';
      decline_btn.style.width = "0px";
      close_btn.style.visibility = 'hidden';
    } else if (status_value == 3) {
      approve_btn.style.visibility = 'hidden';
      decline_btn.style.visibility = 'hidden';
      update_btn.style.visibility = 'hidden';
      close_btn.style.visibility = 'hidden';
    } else if (status_value == 4) {
      approve_btn.style.visibility = 'hidden';
      approve_btn.style.width = "0px";
      decline_btn.style.visibility = 'hidden';
      decline_btn.style.width = "0px";
      update_btn.style.visibility = 'hidden';
      update_btn.style.width = "0px";
      close_btn.style.visibility="hidden";

    }
  </script>
</body>

</html>