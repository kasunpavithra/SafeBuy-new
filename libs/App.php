<?php
session_start();
class App
{
    // private $_url = null;
    // private $_controller = null;


    // function __construct()
    // {
    //     $this->_getURL();
    //     if (empty($this->_url[0])) {
    //         $this->_loadDefaultController();
    //         return false;
    //     }

    //     if ($this->__loadController()) {
    //         $this->_loadControllerMethod();
    //     }
    // }  
    /* Add singleton logic for app.php*/
    private $_url = null;
    private $_controller = null;
    private static $App;

    private function __construct()
    {
    }
    public static function getInstance()
    {
        // echo("asdasd");
        if (self::$App == null) {
            self::$App = new App();
        }

        self::$App->_getURL();

        if (empty(self::$App->_url[0])) {
            self::$App->_loadDefaultController();
            return false;
        }
        if (self::$App->__loadController()) {
            self::$App->_loadControllerMethod();
        }
        return self::$App;
    }

    private function _getURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }
    private function _loadDefaultController()
    {
        require 'controllers/index.php';
        $this->_controller = new Index();
        $this->_controller->index();
    }

    private function __loadController()
    {
        $file = 'controllers/' . $this->_url[0] . '.php';
        if (file_exists($file)) {
            require $file;

            $urlLength = count($this->_url);
            if ($urlLength > 1) {
                switch ($this->_url[1]) {
                    case "con1":
                        $this->_controller = new $this->_url[0]($this->_url[2]);
                        array_splice($this->_url, 1, 2);
                        break;
                    case "con2":
                        $this->_controller = new $this->_url[0]($this->_url[2], $this->_url[3]);
                        array_splice($this->_url, 1, 3);
                        break;
                    default:
                        $this->_controller = new $this->_url[0];
                        break;
                }
            } else {
                $this->_controller = new $this->_url[0];
               
            }

            $this->_controller->loadModel($this->_url[0]);
            //$this->_controller->index();
            // print_r($this->_controller);

            return true;
        } else {
            echo "Sorry , page not found!!";
            return false;
        }
    }
    private function _loadControllerMethod()
    {
        $urlLength = count($this->_url);

        if ($urlLength > 1) {
            if (!method_exists($this->_controller, $this->_url[1])) {
                echo "Requested method not found!!";
                exit;
            }
        }

        switch ($urlLength) {
            case 6:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4], $this->_url[5]);
                break;
            case 5:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                break;
            case 4:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                break;
            case 3:
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;
            case 2:

                $this->_controller->{$this->_url[1]}();
                break;
            default:
                $this->_controller->index();
                break;
        }
    }
}
