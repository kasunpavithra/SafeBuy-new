<?php
class Controller{

    function __construct()
    {   
        if(!isset($_SESSION["userID"])){
            // header("Location:../login/");
            // exit;
        }
        $this->view=new View();

    }
    public function loadModel($modelName){
       
        $path='models/'.$modelName.'_Model.php';
        // echo $path;
        if(file_exists(($path))){
           require $path;
           $className=$modelName.'_Model';
           $this->model= new $className();
        }
    }

}


?>