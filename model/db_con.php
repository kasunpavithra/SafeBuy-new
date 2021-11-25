<?php
//set connetion for db_school
function setConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "safebuy";

    //create connection
    $con = new mysqli($servername,$username,$password,$db_name);

    //check connection
    if($con -> connect_error){
        die("Connetion faild: " . $con -> connect_error);
    }
    //echo "Connected Successfully";
    return $con;
}
function ruMySqlQuery($sql){
    $conn = setConnection();

    try{
        $result = $conn->query($sql);
    }catch(Exception $e){
        echo "caught exception: ", $e ->getMessage(),"\n";
    }finally{
        mysqli_close($conn);
        return $result;
    }
}

?>