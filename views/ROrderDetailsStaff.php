<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- All CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Hello, world!</title>
</head>

<body>

  <!-- navbar statrts -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a type="button" class="navbar-brand">
        <img src="../../../../public/Images/logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
      </a>
      <ul class="navbar-nav">
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
  <div class="container-fluid p-5">
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
            <form method="post" <?php echo 'action="../updateStatus/' . $this->order->getOrderId() . '/1"' ?>>
              <input name="approve" id="appr" type="submit" data-placement="top" class="btn btn-success btn-xs glyphicon glyphicon-ok" title="View" value="Approve">
              <input name="cancel" id="cnl" type="submit" data-placement="top" class="btn btn-danger btn-xs glyphicon glyphicon-trash" title="Danger" value="Decline">
              <input name="updatestat" id="upt" type="submit" data-placement="top" class="btn btn-info btn-xs glyphicon glyphicon-usd" title="Danger" value="<?php
                                                                                                                                                              echo ReturnOrder::STATES_PRESENT[$this->order->getStatus() + 1]; ?>">
              <input name="close" id="cls" type="submit" data-placement="top" class="btn btn-danger btn-xs glyphicon glyphicon-trash" title="Danger" value="Close">

            </form>
          </div>
          <div class="col-md-12">order made on: <?php echo $this->order->getCreateDate() ?> by <?php echo '<a href="../chatView/' . $this->order->getCustomerId() . '">' . $this->order->getCustomerName() ?> </a></div>
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
          foreach ($this->order->getOrderItems() as $item) {
            echo '<tr><td>' . $item->getItemId() . '</td>
                  <td>' . $item->getName() . '</td>
                  <td>' . $item->getQuantity() . '</td>
                  <td>' . $item->getSoldPrice() . '</td>
                  <td>' . $item->getSoldDiscount() . '</td></tr>';
          }
          ?>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3" > <?php echo
                                                  '<a class="btn btn-success btn-xs glyphicon glyphicon-ok" style="width:100%;" href="../cusOtherOrders/' . $this->order->getCustomerId() . '">See customers previous orders</a></div>
                                    <div class="col-md-3">
    <a class="btn btn-info btn-xs glyphicon glyphicon-usd" style="width:100%;" href="../viewBuyOrder/' . $this->order->getBuyOrderId() . '">See Relevant BuyOrder</a></div>'; ?>
      </div>


      <!-- Footer strat -->
      <footer class="footer text-centre" style="position: fixed; bottom:0;">
        <div class="row ">
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
          close_btn.style.visibility = "hidden";

        }
      </script>

    </div>
</body>

</html>