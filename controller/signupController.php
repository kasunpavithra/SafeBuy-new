<?php
  session_start();
    include ("model/db_con.php");
    include ("functions.php");
    
    if($_SERVER['REQUEST_METHOD']== "POST")
    {
      //SOMETHING GOT POSTED
      $username=$_POST['username'];
      $password=$_POST['password'];
      $name=$_POST['name'];
      $email=$_POST['email'];
      $houseno=$_POST['houseno'];
      $street=$_POST['street'];
      $city=$_POST['city'];
      $district=$_POST['district'];
      $zipcode=$_POST['zipcode'];
      $mobileno=$_POST['mobileno'];
      //check whether user already exists
      
      $query1 ="select * from customer where username = '$username'  ";
      //  echo $query1;
      $query2 ="select * from customer where password = '$password'  ";
      // echo $query2;
      $result1=ruMySqlQuery($query1);
      $result2=ruMySqlQuery($query2);
      // $result1=$con->query($query1);
      // $result2=$con->query($query2);
      
      
      // if ( mysqli_num_rows($result1)>0 &&  mysqli_num_rows($result2)>0)
      if ( (mysqli_num_rows($result1)>0 )||(mysqli_num_rows($result1)>0 &&  mysqli_num_rows($result2)>0))

     
      {
        
      
        echo '<script>alert( "User already exists. Please log in")</script>';
        echo "<script>setTimeout(\"location.href = 'login.php';\",10);</script>";
        
        
        die;
      }


      if(!empty($username) && !empty($password) )
      {

        //save to database
        
        $query ="insert into customer (Name,Street,House_no,City,Zip_code,District,Mobile_no,Username,Password,Email) values ('$name','$street','$houseno','$city','$zipcode','$district','$mobileno','$username','$password','$email')";
        $result1=ruMySqlQuery($query);
        header("Location: login.php");
        die;
      } else
      {
        echo "Please enter valid information";
      }
      
      

     }

?>
