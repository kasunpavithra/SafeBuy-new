<?php
class StaffLogin_Model extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function printSomething(){
  
    }
    function getData(){
      return $this->db->runQuery("SELECT * from users");
    }
    function islogin($username,$password){
      if(!empty($username) && !empty($password) )
      {
        $query ="select * from staff where Username = '$username' limit 1";
        $result= $this->db->runQuery($query);
        if ($result)
        { 
         
           if($result[0]['Password']=== $password){
              return [$result[0]['Staff_id'],$result[0]['Type']];
            }
          
        }
        return false;
      }
    }

}

?>