<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SafeBuy</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css?family=Mukta');

  body {
    font-family: 'Mukta', sans-serif;
    height: 100vh;
    min-height: 550px;
    background-image: url(http://www.planwallpaper.com/static/images/Free-Wallpaper-Nature-Scenes.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    position: relative;
    overflow-y: hidden;
    background-image: url('../../SafeBuy-new/public/Images/shoppingImage.jpg');

  }

  a {
    text-decoration: none;
    color: #444444;
  }

  .login-reg-panel {
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    text-align: center;
    width: 70%;
    right: 0;
    left: 0;
    margin: auto;
    height: 400px;
    background-color: #00cc00;
    opacity: 0.93;
  }

  .white-panel {
    background-color: rgba(255, 255, 255, 1);
    height: 500px;
    position: absolute;
    top: -50px;
    width: 50%;
    right: calc(50% - 50px);
    transition: .3s ease-in-out;
    z-index: 0;
    box-shadow: 0 0 15px 9px #00000096;
  }

  .login-reg-panel input[type="radio"] {
    position: relative;
    display: none;
  }

  .login-reg-panel {
    color: #333030;
  }

  .login-reg-panel #label-login,
  .login-reg-panel #label-register {
    border: 1px solid #9E9E9E;
    padding: 5px 5px;
    width: 150px;
    display: block;
    text-align: center;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 600;
    font-size: 18px;
  }

  .login-info-box {
    width: 30%;
    padding: 0 50px;
    top: 20%;
    left: 0;
    position: absolute;
    text-align: left;
  }

  .register-info-box {
    width: 30%;
    padding: 0 50px;
    top: 20%;
    right: 0;
    position: absolute;
    text-align: left;

  }

  .right-log {
    right: 50px !important;
  }

  .login-show,
  .register-show {
    z-index: 1;
    display: none;
    opacity: 0;
    transition: 0.3s ease-in-out;
    color: #242424;
    text-align: left;
    padding: 50px;
  }

  .show-log-panel {
    display: block;
    opacity: 0.9;
  }

  .login-show input[type="text"],
  .login-show input[type="password"] {
    width: 100%;
    display: block;
    margin: 20px 0;
    padding: 15px;
    border: 1px solid #b5b5b5;
    outline: none;
  }

  .login-show input[type="submit"] {
    max-width: 150px;
    width: 100%;
    background: #444444;
    color: #f9f9f9;
    border: none;
    padding: 10px;
    text-transform: uppercase;
    border-radius: 2px;
    float: right;
    cursor: pointer;
  }

  .login-show a {
    display: inline-block;
    padding: 10px 0;
  }

  .register-show input[type="text"],
  .register-show input[type="password"] {
    width: 100%;
    display: block;
    margin: 20px 0;
    padding: 15px;
    border: 1px solid #b5b5b5;
    outline: none;
  }

  .register-show input[type="submit"] {
    max-width: 150px;
    width: 100%;
    background: #444444;
    color: #f9f9f9;
    border: none;
    padding: 10px;
    text-transform: uppercase;
    border-radius: 2px;
    float: right;
    cursor: pointer;
  }

  .credit {
    position: absolute;
    bottom: 10px;
    left: 10px;
    color: #3B3B25;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 1px;
    z-index: 99;
  }

  a {
    text-decoration: none;
    color: #2c7715;
  }
</style>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<body>
  <div class="login-reg-panel">
    <div class="login-info-box">
      <h2>Have an account?</h2>

      <p>You can login here</p>
      <label id="label-register" for="log-reg-show">Login</label>
      <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
      <div class="alert alert-warning" role="alert">
        Password should contain a number, a-z,A-Z and more than charactors
      </div>
    </div>

    <div class="register-info-box">
      <h2>Don't have an account?</h2>
      <p>Stay Safe and shop online.</p>
      <label id="label-login" for="log-login-show">Register</label>

      <input type="radio" name="active-log-panel" id="log-login-show">
    </div>

    <div class="white-panel">
      <form action="loginProfile" method="post">
        <div class="login-show">
          <h2>LOGIN</h2>
          <input type="text" name="username" placeholder="User Name">
          <input type="password" name="password" placeholder="Password">
          <input type="submit" name="submitLogin" value="Login">
          <!-- <a href="">Forgot password?</a> -->
        </div>
      </form>
      <div class="register-show">
        <h2>REGISTER</h2>


        <form action="registerCustomer" class="form1" method="post">
          <div class="form-row">
            <div class="col">
              <input class="un " name="name" type="text" placeholder="Enter your Name" required>
            </div>
            <div class="col">
              <input class="un " name="username" type="text" placeholder="Enter your Username" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <input class="un" name="email" type="email" placeholder="Enter your E-Mail" required oninvalid="if (this.value == ''){this.setCustomValidity('This field is required!')} if (this.value != ''){this.setCustomValidity('The email you entered is invalid!')}" oninput="setCustomValidity('')">
            </div>
            <div class="col">
              <input class="un" name="mobileno" type="number" placeholder="Enter your Mobile-No" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <input class="un" name="houseno" type="text" placeholder="Enter your House-No" required>
            </div>
            <div class="col">
              <input class="un" name="street" type="text" placeholder="Enter your Street" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <input class="un" name="city" type="text" placeholder="Enter your City" required>
            </div>
            <div class="col">
              <input class="un" name="district" type="text" placeholder="Enter your District" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <input class="un" name="zipcode" type="text" placeholder="Enter your Zip-code" required>
            </div>
            <div class="col">
              <input class="pass" id="psw" name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter your Password" required>

            </div>

          </div>

          <input class="submit" name="signUpBtn" id="signUpBtn" type="submit" value="Register">

        </form>

      </div>

    </div>

  </div>
  <div class="container" style="position: absolute; bottom: 10px; left: 15%;">
    <?php
    if (isset($_SESSION["invalidLogin"])) {
      if ($_SESSION["invalidLogin"]) { ?>
        <div class="alert alert-danger" role="alert">
          Invalid Attempt Pelase try again!
        </div>
      <?php
        unset($_SESSION["invalidLogin"]);
      }
    }
    if (isset($_SESSION["userExist"])) {
      if ($_SESSION["userExist"]) { ?>
        <div class="alert alert-danger" role="alert">
          The Username Already Exists.
        </div>
    <?php
        unset($_SESSION["userExist"]);
      }
    }

    ?>
  </div>
</body>

<script>
  var myInput = document.getElementById("psw");
  myInput.onkeyup = function() {
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    var numbers = /[0-9]/g;
    console.log(myInput.value.length);
    if (!myInput.value.match(upperCaseLetters) || !myInput.value.match(lowerCaseLetters) || !myInput.value.match(numbers) || !myInput.value.length >= 8) {
      this.style.border = "1px solid red";
    } else {
      if (myInput.value.length >= 8) {
        this.style.border = "1px solid green";

      } else {
        this.style.border = "1px solid red";

      }

    }
  }
</script>
<script>
  $(document).ready(function() {
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
  });


  $('.login-reg-panel input[type="radio"]').on('change', function() {
    if ($('#log-login-show').is(':checked')) {
      $('.register-info-box').fadeOut();
      $('.login-info-box').fadeIn();

      $('.white-panel').addClass('right-log');
      $('.register-show').addClass('show-log-panel');
      $('.login-show').removeClass('show-log-panel');

    } else if ($('#log-reg-show').is(':checked')) {
      $('.register-info-box').fadeIn();
      $('.login-info-box').fadeOut();

      $('.white-panel').removeClass('right-log');

      $('.login-show').addClass('show-log-panel');
      $('.register-show').removeClass('show-log-panel');
    }
  });
</script>


</html>