<?php
include("controller/signupController.php");
?>
<!-- asdas -->

<html>

<head>
  <link rel="stylesheet" href="View/CSS/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="View/CSS/signupcopylogin.css">
  <title>Register</title>
</head>

<body>
  <div class="main">
    <p class="Sign" align="center">Register</p>
    <form class="form1" method="post">
    <input class="un " name="name" type="text" align="center" placeholder="Enter your Name" required>
      <input class="un " name="username" type="text" align="center" placeholder="Enter your Username" required>
      <input class="un" name="email" type="email" align="center" placeholder="Enter your E-Mail" required oninvalid="if (this.value == ''){this.setCustomValidity('This field is required!')} if (this.value != ''){this.setCustomValidity('The email you entered is invalid!')}" oninput="setCustomValidity('')">
      <input class="un" name="mobileno" type="text" align="center" placeholder="Enter your Mobile-No" required >
      <input class="un" name="houseno" type="text" align="center" placeholder="Enter your House-No" required>
      <input class="un" name="street" type="text" align="center" placeholder="Enter your Street" required>
      <input class="un" name="city" type="text" align="center" placeholder="Enter your City" required>
      <input class="un" name="district" type="text" align="center" placeholder="Enter your District" required>
      <input class="un" name="zipcode" type="text" align="center" placeholder="Enter your Zip-code" required>
      <input class="pass" name="password" type="password" align="center" placeholder="Enter your Password" required>
      <input class="submit" id="button" type="submit" value="Register">
      <!-- <a class="submit" align="center">Sign in</a>  -->
      <!-- input type submit -->
      <!-- <p class="forgot" align="center"><a href="#">Forgot Password?</p> -->
            
                
    </div>
     
</body>

</html>