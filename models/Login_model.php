<?php
class Login_Model extends Model
{
  function __construct()
  {
    parent::__construct();
  }

  function printSomething()
  {
  }
  function getData()
  {
    // return $this->db->runQuery("SELECT * from users");
    return false;
  }
  function islogin($username, $password)
  {
    if (!empty($username) && !empty($password)) {
      $query = "select * from customer where username = '$username' limit 1";
      $result = $this->db->runQuery($query);
      if ($result) {

        if ($result[0]['Password'] === $password && $result[0]["account_availability"] == 0) {
          return $result[0]['Customer_id'];
        }
      }
      return false;
    }
  }
  function getUserAlreadyExist($username)
  {
    return $this->db->runQuery("SELECT * FROM CUSTOMER WHERE USERNAME='$username'");
  }
  function registerNewCustomer(
    $username,
    $password,
    $name,
    $email,
    $houseno,
    $street,
    $city,
    $district,
    $zipcode,
    $mobileno
  ) {
    $query = "insert into customer (Name,Street,House_no,City,Zip_code,District,Mobile_no,Username,Password,Email) values ('$name','$street','$houseno','$city','$zipcode','$district','$mobileno','$username','$password','$email')";
    return $this->db->insertQuery($query);
  }
}
