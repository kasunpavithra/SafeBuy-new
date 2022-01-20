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

<style>
  body {
    background-image: url('../../../../public/Images/order_his_stf.jpg');
    /* background-size: 100% 100%;
    background-repeat: no-repeat; */
    background-attachment: fixed;
  }

  #details {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid greenyellow;
    border-radius: 10px;
  }

  #order {
    margin-top: 4px;
    margin-bottom: 4px;
  }

  .order-cr {
    border: 1px solid greenyellow;
    margin-top: 3px;
    margin-bottom: 3px;
    border-radius: 10px;
  }
</style>

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
    <div class="container-fluid p-5" id="details">
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
                <?php $status = $this->order->getStatus();
                if ($status == 0) { ?>
                  <input name="approve" id="appr" type="submit" data-placement="top" class="btn btn-success btn-xs glyphicon glyphicon-ok" title="View" value="Approve">
                  <input name="cancel" id="cnl" type="submit" data-placement="top" class="btn btn-danger btn-xs glyphicon glyphicon-trash" title="Danger" value="Decline">
                <?php } elseif ($status > 0 && $status < 3) { ?>
                  <input name="updatestat" id="upt" type="submit" data-placement="top" class="btn btn-info btn-xs glyphicon glyphicon-usd" title="Danger" value="<?php
                                                                                                                                                                  echo ReturnOrder::STATES_PRESENT[$this->order->getStatus() + 1]; ?>">
                <?php } ?>
                <!-- <input name="close" id="cls" type="submit" data-placement="top" class="btn btn-danger btn-xs glyphicon glyphicon-trash" title="Danger" value="Close"> -->
              </form>
            </div>
            <div class="col-md-12">order made on: <?php echo $this->order->getCreateDate() ?> by <?php echo '<a href="../chatView/' . $this->order->getCustomerId() . '">' . $this->order->getCustomerName() ?> </a></div>
          </div>
        </div>
      </div>
      <!--order details end-->

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8">
          <table class="table table-striped">
            <tr>
              <th>Item Id</th>
              <th>Name</th>
              <th>Quantity</th>
              <th>Price(Rs)</th>
              <th>Discount(%)</th>
              <th>Return Review</th>
            </tr>
            <?php
            foreach ($this->order->getOrderItems() as $item) {
              echo '<tr><td>' . $item->getItemId() . '</td>
                  <td>' . $item->getName() . '</td>
                  <td>' . $item->getQuantity() . '</td>
                  <td>' . $item->getSoldPrice() . '</td>
                  <td>' . $item->getSoldDiscount() . '</td>
                  <td>' . $item->getReturnReview() . '</td></tr>';
            }
            ?>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4"> <?php echo
                                '<a class="btn btn-success btn-xs glyphicon glyphicon-ok" style="width:100%;" href="../cusOtherOrders/' . $this->order->getCustomerId() . '">See customers previous orders</a></div>
                                    <div class="col-md-4">
    <a class="btn btn-info btn-xs glyphicon glyphicon-usd" style="width:100%;" href="../viewBuyOrder/' . $this->order->getBuyOrderId() . '">See Relevant BuyOrder</a></div>'; ?>
        </div>


        <!-- Footer strat -->
        <footer class="footer text-centre" style="position: fixed; bottom:0;">
          <div class="row ">
            <p class="copyright">Copyright © 2019 <a href="#">themeies.com</a>. All rights reserved.</p>
          </div>
        </footer>
        <!-- Footer end -->
      </div>
    </div>
</body>

</html>