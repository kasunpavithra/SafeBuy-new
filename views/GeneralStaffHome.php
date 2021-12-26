<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- All CSS -->
  <!-- <link rel="stylesheet" href="../../../public/CSS/bootstrap.min.css">
  <link rel="stylesheet" href="../../../public/CSS/themify-icons.css">
  <link rel="stylesheet" href="../../../public/CSS/owl.carousel.min.css">
  <link rel="stylesheet" href="../../../public/CSS/home_staff.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />

  <meta name="robots" content="noindex, nofollow" />
  <title>Staff View of Order History</title>
</head>

<body>
  <div class="container-fluid pt-5">
    <div class="row justify-content-end">
      <div class="col-sm-3">
        <div class="dropdown">
          <button id="dd1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
            Filter Orders<i class="fa fa-filter"></i>
          </button>
          <ul class="dropdown-menu">
            <li>
              <h5 class="dropdown-header text-danger">Buy Orders</h5>
            </li>
            <li><a class="dropdown-item" href="-1">All</a></li>
            <li><a class="dropdown-item" href="0">Being Approved</a></li>
            <li><a class="dropdown-item" href="1">Ready to ship</a></li>
            <li><a class="dropdown-item" href="2">Invoiced</a></li>
            <li><a class="dropdown-item" href="3">Shipped</a></li>
            <li><a class="dropdown-item" href="4">Delivered</a></li>
            <li><a class="dropdown-item" href="5">Closed</a></li>
            <li><a class="dropdown-item" href="6">Cancelled</a></li>
            <li>
              <h5 class="dropdown-header text-danger">Return Orders</h5>
            </li>
            <li><a class="dropdown-item" href="12">All</a></li>
            <li><a class="dropdown-item" href="7">Being Approved</a></li>
            <li><a class="dropdown-item" href="8">Being Shipped</a></li>
            <li><a class="dropdown-item" href="9">Recieved</a></li>
            <li><a class="dropdown-item" href="10">closed</a></li>
            <li><a class="dropdown-item" href="11">Cancelled</a></li>
            
          </ul>
        </div>
      </div>
    </div>

    <!--order details started-->
    <?php
    foreach ($this->orderArr as $odr) {
      echo
      '<div class="row">
    <div class="col-md-1"><img src="https://bootdey.com/img/Content/user_3.jpg" class="media-object img-thumbnail" /></div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-12"><label class="label label-danger">';
      if ($odr instanceof BuyOrder) {
        echo BuyOrder::STATES[$odr->getStatus()];
      } else {
        echo ReturnOrder::STATES[$odr->getStatus()];
      }
      echo '</label></div>
          <span><strong>Order ID</strong></span> <span class="label label-info">group name</span><br />
          cost: $' . $odr->getAmount() . '<br />
          <!-- add code to disable the accept reject buttons once the order is accepted
                      -->
          
        </div>
        <div class="col-md-12">order made on:' . $odr->getCreateDate() . ' by <a href="#">' . $odr->getCustomerName() . '</a></div>
      </div>
    </div>
    <div class="col-md-2">
        <a href="../../../../';
      if ($odr instanceof BuyOrder) {
        echo "BuyOrder";
      } else {
        echo "ReturnOrder";
      }
      echo '/con1/' . $odr->getOrderId() . '/staffView" class="btn btn-primary">View</a>
      </div>
  </div>';
    } //you need to modify here to add customer name
    ?>
    <!--order details end-->


    <!-- Footer strat -->
    <div class="fixed-bottom">
      <footer class="footer ">
        <div class="container foo-top">
          <div class="row">

            <div class="container">
              <p class="copyright">Copyright © 2019 <a href="#">themeies.com</a>. All rights reserved.</p>
            </div>
      </footer>
    </div>
    <!-- Footer end -->

  </div>

  <!-- JS -->
  <script>

  </script>
</body>

</html>