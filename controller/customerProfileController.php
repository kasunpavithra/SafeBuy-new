<?php
session_start();
include("model/db_con.php");
include("functions.php");

$user_data = check_login();
$cid = $_SESSION['Customer_id'];

$sql = "select * from customer where Customer_id='$cid'";
$result = ruMySqlQuery($sql);
$row = "";
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}

if (isset($_POST["save"])) {
    $name = "'" . $_POST["name"] . "'";
    $userName = "'" . $_POST["username"] . "'";
    $addr = "'" . $_POST["inputAddress"] . "'";
    $homeNum = "'" . $_POST["houseNumber"] . "'";
    $mobNum = "'" . $_POST["mobileNumber"] . "'";
    $city = "'" . $_POST["inputCity"] . "'";
    $district = "'" . $_POST["District"] . "'";
    $zip = "'" . $_POST["inputZip"] . "'";

    $sql = "UPDATE CUSTOMER SET Name=$name , Username=$userName , Street=$addr , House_no=$homeNum , Mobile_no=$mobNum , City=$city , District=$district ,Zip_code=$zip where Customer_id=$cid";
    $result = ruMySqlQuery($sql);
    if ($result) {
        header("Location: customerProfile.php");
    } else {
    }
}

$status = $statusMsg = '';

if (isset($_POST["submit"])) {
    $status = 'error';
    if (!empty($_FILES["image"]["name"])) {
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = "'" . addslashes(file_get_contents($image)) . "'";

            $insert = ruMySqlQuery("UPDATE CUSTOMER SET Profile_pic=$imgContent WHERE Customer_id='$cid'");

            if ($insert) {
                $status = 'success';
                $statusMsg = "File uploaded successfully.";
                header("Location: customerProfile.php");
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            echo "<script>alert('Please upload an image file here')</script>";
        }
    } else {
        echo "<script>alert('Please upload an image file here')</script>";
    }
}

if (isset($_POST["saveEmail"])) {
    $email = "'" . $_POST["email"] . "'";
    // echo $email;
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid Email')</script>";
    }
    $sql = "UPDATE CUSTOMER SET email=$email where Customer_id=$cid";

    if (ruMySqlQuery($sql)) {
        header("Location: customerProfile.php");
    } else {
    }
}

if (isset($_POST["savePassword"])) {
    $currentPassword = "'" . $_POST["currentPassword"] . "'";
    $newPassword = "'" . $_POST["newPassword"] . "'";
    if ($_POST["currentPassword"] == $row["Password"]) {
        $sql = "UPDATE CUSTOMER SET Password=$newPassword where Customer_id=$cid";
        if (ruMySqlQuery($sql)) {
            header("Location: customerProfile.php");
        } else {
        }
    } else {
        echo "<script>alert('Please enter your correct password')</script>";
    }
}
