<?php
  session_start();
    require("model/db_con.php");
    
    if($_SERVER['REQUEST_METHOD']== "POST")
    {
      //SOMETHING GOT POSTED
      $username=$_POST['username'];
      $password=$_POST['password'];
      
      // $name=$_POST['name'];
      // $email=$_POST['email'];
      // $houseno=$_POST['houseno'];
      // $street=$_POST['street'];
      // $city=$_POST['city'];
      // $district=$_POST['district'];
      // $zipcode=$_POST['zipcode'];
      // $mobileno=$_POST['mobileno'];

      if(!empty($username) && !empty($password) )
      {
        //read to database
        
        $query ="select * from customer where username = '$username' limit 1";
        $result=ruMySqlQuery($query);
        // $result=mysqli_query($con,$query);
        if ($result)
        {
          if($result && mysqli_num_rows($result)>0)
            {
                $user_data=mysqli_fetch_assoc($result);
                if($user_data['Password']=== $password)
                {
                  $_SESSION['Customer_id']= $user_data['Customer_id'];
                  header("Location: home.php");
                  die;
                }else{
                  echo "Wrong password";
                }
            }
        }
        echo "Wrong username or password";
      } else
      {
        echo "Please enter valid information";
      }
      
      

    }

?>
