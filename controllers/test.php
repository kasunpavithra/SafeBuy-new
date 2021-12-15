<?php
class Test extends Controller{
    private $staffHome;
    function __construct()
    {
        parent::__construct();
        $this->staffHome=new StaffHome();
    }
    function index(){
        $this->view->users=$this->model->getData();
        $this->view->render('Test');
    }
}

?>
