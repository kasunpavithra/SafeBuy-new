<?php
session_start();
include ("model/db_con.php");
include("functions.php");

$user_data = check_login();
