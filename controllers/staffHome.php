<?php
class StaffHome extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        if (!isset($_SESSION['userID'])) {

            header("Location: ../login/");
            die();
        }

        $this->view->categories = $this->getCategories();
        $this->view->render('StaffHome');
    }

    function logout()
    {
        if (isset($_SESSION['userID'])) {

            session_destroy();
        }
        header("Location: ../../login/");
    }
    function getCategories()
    {

        return $this->model->getCategory();
    }
    function editItems()
    {
        if (isset($_POST["getItem"])) {

            // $categoryID = $_GET["categoryid"];
            // $items = $this->model->getItems($categoryID);
            // $this->items = $items;
            // return true;
            // foreach ($items as $key) {
            //    foreach ($key as $data) {
            //        echo $data;
            //        echo "<br>";

            //    }
            // }
            print_r($_POST);
        }
    }
    function addCategory()
    {
        if (isset($_POST["addCategory"])) {
            $name = $_POST["category_name"];
            $desc = $_POST["description"];
            $isAdd = $this->model->addCategory($name, $desc);
            if ($isAdd) {
                header("Location:../");
            }
        }
    }
}
