<html>

<head>
  <!-- <link rel="stylesheet" href="../css/style.css"> -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- <link rel="stylesheet" href="View/CSS/login.css"> -->
  <link rel="stylesheet" href="../public/CSS/login.css">
  <title>Sign in</title>
</head>

<body>
  <div class="main">
    <p class="Sign" align="center">Sign in</p>
    <form class="form1" method="post" action="loginProfile">
      <input class="un " name='username' type="text" align="center" placeholder="Username">
      <input class="pass" name='password' type="password" align="center" placeholder="Password">
      <input class="submit" name="submitLogin" id="button" type="submit" value="Sign in">
      <!-- <a class="submit" align="center">Sign in</a> -->
      <p class="forgot" align="center"><a href="#" class="forgot">Forgot Password?</p>

    </form>
    <p class="forgot" align="center"><a href="../signup/" class="forgot">Sign Up Here</a></p>
  </div>

</body>

</html>