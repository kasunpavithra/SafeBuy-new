<?php
session_start();
if(isset($_SESSION['Customer_id']))
{
    
    session_destroy();

}
header("Location: ../login.php");
die;
?>