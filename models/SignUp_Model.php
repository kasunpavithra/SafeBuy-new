<?php
class SignUp_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function printSomething()
    {
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
