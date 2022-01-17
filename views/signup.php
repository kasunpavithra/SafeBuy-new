<!DOCTYPE html>
<html lang="en">


<head>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../CSS/signupcopylogin.css">
    <title>Register</title>
</head>
<style>
    body {
        background-color: #F45B5B;
        font-family: 'Ubuntu', sans-serif;
    }

    .main {
        background-color: #FFFFFF;
        width: 400px;
        height: auto;
        margin: 5em auto;
        padding-bottom: 5px;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }

    .sign {
        padding-top: 20px;
        color: #8C55AA;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }

    .un {
        width: 76%;
        color: rgb(38, 50, 56);
        font-weight: 700;
        font-size: 14px;
        letter-spacing: 1px;
        background: rgba(136, 126, 126, 0.04);
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        outline: none;
        box-sizing: border-box;
        border: 2px solid rgba(0, 0, 0, 0.02);
        margin-bottom: 50px;
        margin-left: 46px;
        text-align: center;
        margin-bottom: 27px;
        font-family: 'Ubuntu', sans-serif;
    }

    form.form1 {
        padding-top: 40px;
    }

    .pass {
        width: 76%;
        color: rgb(38, 50, 56);
        font-weight: 700;
        font-size: 14px;
        letter-spacing: 1px;
        background: rgba(136, 126, 126, 0.04);
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        outline: none;
        box-sizing: border-box;
        border: 2px solid rgba(0, 0, 0, 0.02);
        margin-bottom: 50px;
        margin-left: 46px;
        text-align: center;
        margin-bottom: 27px;
        font-family: 'Ubuntu', sans-serif;
    }


    .un:focus,
    .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;

    }

    input[type=submit]:hover {
        background: #2AAA8A;
        /* Green */

    }

    .submit {
        cursor: pointer;
        border-radius: 5em;
        color: #fff;
        /* background: linear-gradient(to right, #9C27B0, #E040FB); */
        background-color: #F45B5B;
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }

    .forgot {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #1f2dac;
        padding-top: 15px;
    }

    a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        text-decoration: none
    }

    /* unvisited link */
    a:link {
        color: red;
    }

    /* visited link */
    /* a:visited {
  color: green;
} */

    /* mouse over link */
    a:hover {
        color: hotpink;
    }

    /* selected link */
    a:active {
        color: blue;
    }

    @media (max-width: 600px) {
        .main {
            border-radius: 0px;
        }
    }
</style>

<body>
    <div class="main">
        <p class="Sign" align="center">Register</p>
        <form action="registerCustomer" class="form1" method="post">
            <input class="un " name="name" type="text" align="center" placeholder="Enter your Name" required>
            <input class="un " name="username" type="text" align="center" placeholder="Enter your Username" required>
            <input class="un" name="email" type="email" align="center" placeholder="Enter your E-Mail" required oninvalid="if (this.value == ''){this.setCustomValidity('This field is required!')} if (this.value != ''){this.setCustomValidity('The email you entered is invalid!')}" oninput="setCustomValidity('')">
            <input class="un" name="mobileno" type="number" align="center" placeholder="Enter your Mobile-No" required>
            <input class="un" name="houseno" type="text" align="center" placeholder="Enter your House-No" required>
            <input class="un" name="street" type="text" align="center" placeholder="Enter your Street" required>
            <input class="un" name="city" type="text" align="center" placeholder="Enter your City" required>
            <input class="un" name="district" type="text" align="center" placeholder="Enter your District" required>
            <input class="un" name="zipcode" type="text" align="center" placeholder="Enter your Zip-code" required>
            <input class="pass" name="password" type="password" align="center" placeholder="Enter your Password" required>
            <input class="submit" name="signUpBtn" id="signUpBtn" type="submit" value="Register">

        </form>

    </div>

</body>

</html>