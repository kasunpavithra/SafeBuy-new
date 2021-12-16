<?php
class Database extends PDO{
    function __construct($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASSWORD)
    {
        parent::__construct($DB_TYPE.':localhost='.$DB_HOST.';dbname='.$DB_NAME,$DB_USER,$DB_PASSWORD);
    }

    public function runQuery($query){
        $stmt=$this->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insertQuery($query){
        $stmt=$this->prepare($query);
      return  $stmt->execute();
        
    }

}


?>