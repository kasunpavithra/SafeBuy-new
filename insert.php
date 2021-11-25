<?php

if (isset($_POST["title"])) {

    include "model/db_con.php";
    $des = '"' . $_POST["title"] . '"';
    $status = '"' . $_POST["status"] . '"';
    $sql = "INSERT INTO NOTIFICATION (DESCRIPTION,TYPE,STATUS) VALUES ($des,1,$status)";
    if (ruMySqlQuery($sql)) {
        echo "Connected";
    }
}
