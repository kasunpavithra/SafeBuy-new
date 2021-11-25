<?php
  
  require_once("model/db_con.php");
    function check_login(){
       
        if(isset($_SESSION['Customer_id']))
        {
            $id=$_SESSION['Customer_id'];
            $query="select * from customer where Customer_id ='$id 'limit 1";
            $result=ruMySqlQuery($query);
            // $result=mysqli_query($con,$query);
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data=mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        //redirect to login
        
        header("Location: login.php");
        die;
    }
