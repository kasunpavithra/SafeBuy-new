<?php
require("controller/loginController.php");

?>

<html>

<head>
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="View/CSS/login.css">
  <title>Sign in</title>
</head>

<body>
  <div class="main">
    <p class="Sign" align="center">Sign in</p>
    <form class="form1" method="post">
      <input class="un " name='username' type="text" align="center" placeholder="Username">
      <input class="pass" name='password' type="password" align="center" placeholder="Password">
      <input class="submit" id="button" type="submit" value="Sign in">
      <!-- <a class="submit" align="center">Sign in</a> -->
      <p class="forgot" align="center"><a href="#" class="forgot">Forgot Password?</p>


  </div>

</body>

</html>