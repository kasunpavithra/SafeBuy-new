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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />

  <meta name="robots" content="noindex, nofollow" />
  <title>Staff View of Order History</title>
</head>

<body>
  <!-- navbar starts -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a type="button" class="navbar-brand" data-bs-toggle="popover" <?php echo 'title="'.$this->gStaff->getStaff_id().': '.$this->gStaff->getUserName().'"'; ?>
       data-bs-content="Some content inside the popover">
        <img src="../../../../public/Images/logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#msgOffcanvas">
            Messages <?php if ($this->hasNewMsgs) {
                        echo '<span class="badge bg-secondary">New</span>';
                      } ?>
          </button>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Dashboard/-1">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="../logout">Logout</a>
        </li>
      </ul>

    </div>
  </nav>
  <!-- navbar ends -->


  <!-- message canvas start-->
  <div class="offcanvas offcanvas-end" id="msgOffcanvas">
    <div class="offcanvas-header">
      <h1 class="offcanvas-title">Messages</h1>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <div class="row">
        <div class="col-sm-12 border">
          <?php
          foreach ($this->customers as $cus) {
            echo '<div class="row">
              <div class="col-sm-12 border">
              <a href="../chatView/' . $cus[0] . '" class="btn btn-light" style="width: 100%;">
              <img src="../../../../public/Images/logo.png" style="width:40px;" class="rounded-pill">' . $cus[0] . ': ' . $cus[1];
            if ($cus[2]) {
              echo '<span class="badge bg-secondary">New</span>';
            }
            echo '</a></div>
              </div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!--message canvas end-->

  <!-- chat model start -->

  <!-- <div class="modal" id="chatModal">
    <div class="modal-dialog">
      <div class="modal-content">

        
        <div class="modal-header">
          <h4 class="modal-title">Customer Name</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        
        <div class="modal-body">
          <form action="" method="post" id="chat">
            <div class="col-sm-12">
              <p class="text-end">Sender HIIII</p>
              <p class="reciever">Reciever HIIII</p>
              <div class="panel-footer">
                <div class="input-group">
                  <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                  <span class="input-group-btn">
                    <button type="submit"  class="btn btn-primary btn-sm" id="send">Send</button>
                  </span>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div> -->
  <!-- chat model start -->



  <div class="container-fluid pt-5">
    <?php if (isset($this->filter)) echo '
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
    </div>'; ?>

    <!--order details started-->
    <div class="row">
      <div class="col-md-5">
        <h2><?php if (isset($this->title)) echo $this->title; ?></h2>
      </div>
    </div>
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
          <span><strong>Order ID: </strong></span> <span class="label label-info">' . $odr->getOrderId() . '</span><br />
          cost: $' . $odr->getAmount() . '<br />
          <!-- add code to disable the accept reject buttons once the order is accepted
                      -->
          
        </div>
        <div class="col-md-12">order made on:' . $odr->getCreateDate() . ' by <a href="../chatView/' . $odr->getCustomerId() . '">' . $odr->getCustomerName() . '</a></div>
      </div>
    </div>
    <div class="col-md-2">
        <a href="../';
      if ($odr instanceof BuyOrder) {
        echo "viewBuyOrder/";
      } else {
        echo "viewReturnOrder/";
      }
      echo  $odr->getOrderId() . '" class="btn btn-primary">View</a>
      </div>
  </div>';
    }

    if (isset($this->ROrderArr) && !empty($this->ROrderArr)) {
      echo '<div class="row">
              <div class="col-md-6">
                <h2>' . $this->title2 . '</h2>
              </div>
            </div>';
      foreach ($this->ROrderArr as $odr) {
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
                  <span class="danger"><strong>Return Order ID: </strong></span> <span class="label label-info">' . $odr->getOrderId() . '</span><br />
                  cost: $' . $odr->getAmount() . '<br />
                  <!-- add code to disable the accept reject buttons once the order is accepted
                              -->
                  
                </div>
                <div class="col-md-12">order made on:' . $odr->getCreateDate() . ' by <a href="../chatView/' . $odr->getCustomerId() . '">' . $odr->getCustomerName() . '</a></div>
              </div>
            </div>
            <div class="col-md-2">
                <a href="../';
        if ($odr instanceof BuyOrder) {
          echo "viewBuyOrder/";
        } else {
          echo "viewReturnOrder/";
        }
        echo  $odr->getOrderId() . '" class="btn btn-primary">View</a>
              </div>
          </div>';
      }
    }
    ?>


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
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl)
    })
  </script>
</body>

</html>