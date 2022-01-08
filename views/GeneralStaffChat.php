<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- css links -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />

  <meta name="robots" content="noindex, nofollow" />
  <title>Chat</title>
</head>

<body>

  <!-- navbar starts -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../../../../public/Images/logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#msgOffcanvas">
            Messages
          </button>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Dashboard/-1">Home</a>
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
              <img src="../../../../public/Images/logo.png" style="width:40px;" class="rounded-pill">' . $cus[0] . ': ' . $cus[1] . '</a></div>
              </div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!--message canvas end-->

  <!-- chat view start -->
  <div class="container-fluid p-5">
    <div class="row">
      <div class="col-sm-6">
        <form action=<?php echo '"../sendMessage/'.$this->customerId.'"' ?> method="post" id="chat">
          <div class="col-sm-12">
            <?php
              foreach($this->chatLog->getMessageList() as $chat){
                if($chat->getStatus() ==0){
                  echo '<p>'.$chat->getMessage().'</p>';
                }
                else{
                  echo '<p class="text-end">'.$chat->getMessage().'</p>';
                }
              }
            ?>
            <div class="panel-footer">
              <div class="input-group">
                <input name="msg" id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary btn-sm" id="send">Send</button>
                </span>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- chat view end -->


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