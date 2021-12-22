<?php
include_once('Person.php');
class Customer extends Person
{
    private $customer_id;
    private $name;
    private $street;
    private $house_no;
    private $city;
    private $zip_code;
    private $district;
    private $mobile_no;
    private $username;
    private $email;
    private $profile_pic;

    private $orders;
    private $shop;
    function __construct($id)
    {
        parent::__construct();
        $this->setDetails($id);
      
    }
    function setDetails($id)
    {
        $this->loadModel("Customer");
        $details = $this->model->getDetails($id)[0];
      
        $this->customer_id = $details["Customer_id"];
        $this->name = $details["Name"];
        $this->street = $details["Street"];
        $this->house_no = $details["House_no"];
        $this->city = $details["City"];
        $this->zip_code = $details["Zip_code"];
        $this->district = $details["District"];
        $this->mobile_no = $details["Mobile_no"];
        $this->username = $details["Username"];
        $this->email = $details["Email"];
        $this->profile_pic = $details["Profile_pic"];

        echo $this->username;
        echo $this->mobile_no;
    }
    function customerProfile()
    {
        $this->view->row = $this->getDataRow();
        $this->view->render("customerProfile");
    }
    function getDataRow()
    {
        $row = array();
        $row["customer_id"] = $this->getCustomer_id();
        $orw["name"] = $this->getName();
        $row["street"] = $this->getStreet();
        $row["house_no"] = $this->getHouse_no();
        $row["city"] = $this->getCity();
        $row["zip_code"] = $this->getZip_code();
        $row["district"] = $this->getDistrict();
        $row["mobile_no"] = $this->getMobile_no();
        $row["username"] = $this->getUsername();
        $row["email"] = $this->getEmail();
        $row["profile_pic"] = $this->getProfile_pic();
        return $row;
    }
    function saveInfo()
    {
        if (isset($_POST["save"])) {
            $name = "'" . $_POST["name"] . "'";
            $userName = "'" . $_POST["username"] . "'";
            $addr = "'" . $_POST["inputAddress"] . "'";
            $homeNum = "'" . $_POST["houseNumber"] . "'";
            $mobNum = "'" . $_POST["mobileNumber"] . "'";
            $city = "'" . $_POST["inputCity"] . "'";
            $district = "'" . $_POST["District"] . "'";
            $zip = "'" . $_POST["inputZip"] . "'";

            $sql = "UPDATE CUSTOMER SET Name=$name , Username=$userName , Street=$addr , House_no=$homeNum , Mobile_no=$mobNum , City=$city , District=$district ,Zip_code=$zip where Customer_id='" . $_SESSION['userID'] . "'";
            $result = $this->model->saveInfo($sql);
            header("Location: customerProfile/");
            // $this->loadDefault();
        }
    }
    function saveImage()
    {
        if (isset($_POST["submit"])) {
            if (!empty($_FILES["image"]["name"])) {
                $fileName = basename($_FILES["image"]["name"]);
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {
                    $image = $_FILES['image']['tmp_name'];
                    $imgContent = "'" . addslashes(file_get_contents($image)) . "'";

                    $insert = $this->model->saveImage("UPDATE CUSTOMER SET Profile_pic=$imgContent WHERE Customer_id='" . $_SESSION['userID'] . "'");

                    if ($insert) {
                        header("Location: customerProfile/");
                    } else {
                    }
                } else {
                    echo "<script>alert('Please upload an image file here')</script>";
                }
            } else {
                echo "<script>alert('Please upload an image file here')</script>";
            }
        }
    }

    function saveEmail()
    {
        if (isset($_POST["saveEmail"])) {
            $email = "'" . $_POST["email"] . "'";
            
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sql = "UPDATE CUSTOMER SET email=$email where Customer_id='" . $_SESSION['userID'] . "'";
                echo $sql;
                if ($this->model->saveEmail($sql)) {
                    header("Location: customerProfile/");
                } else {
                    
                }
            } else {
                echo "<script>alert('Invalid Email')</script>";
            }
            $this->index();
        }
    }

    function savePassword()
    {
        $currentPassword = "'" . $_POST["currentPassword"] . "'";
        $newPassword = "'" . $_POST["newPassword"] . "'";
        if ($_POST["currentPassword"] == $this->model->getPassword($_SESSION["userID"])) {
            $sql = "UPDATE CUSTOMER SET Password=$newPassword where Customer_id='" . $_SESSION['userID'] . "'";
            if ($this->model->savePassword($sql)) {
                header("Location: customerProfile/");
            } else {
            }
        } else {
            echo "<script>alert('Please enter your correct password')</script>";
        }
    }
    function dashboard()
    {
        if (!isset($_SESSION['userID'])) {

            header("Location: ../../login/");
            die();
        }
        // $this->view->categories = $this->getCategories();
        // foreach ($this->view->categories as $key => $value) {
        //     $this->view->categories[$key]["items"] = $this->getItems($this->view->categories[$key][0]);
        // }
        // foreach ($this->orderList as $key => $value) {
        //     if ($_SESSION["userID"] == $value["Customer_id"]) {
        //         print_r($value);
        //         echo "<br>";
        //         echo "<br>";
        //         echo "<br>";
        //     }
        // }
        $this->view->render('CustomerHome');
    }
    function logout()
    {
        if (isset($_SESSION['userID'])) {
            session_destroy();
        }
        header("Location: ../../../../login/");
    }

    /**
     * Get the value of customer_id
     */
    public function getCustomer_id()
    {
        return $this->customer_id;
    }

    /**
     * Set the value of customer_id
     *
     * @return  self
     */
    public function setCustomer_id($customer_id)
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set the value of street
     *
     * @return  self
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get the value of house_no
     */
    public function getHouse_no()
    {
        return $this->house_no;
    }

    /**
     * Set the value of house_no
     *
     * @return  self
     */
    public function setHouse_no($house_no)
    {
        $this->house_no = $house_no;

        return $this;
    }

    /**
     * Get the value of city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of zip_code
     */
    public function getZip_code()
    {
        return $this->zip_code;
    }

    /**
     * Set the value of zip_code
     *
     * @return  self
     */
    public function setZip_code($zip_code)
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    /**
     * Get the value of district
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set the value of district
     *
     * @return  self
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get the value of mobile_no
     */
    public function getMobile_no()
    {
        return $this->mobile_no;
    }

    /**
     * Set the value of mobile_no
     *
     * @return  self
     */
    public function setMobile_no($mobile_no)
    {
        $this->mobile_no = $mobile_no;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of profile_pic
     */
    public function getProfile_pic()
    {
        return $this->profile_pic;
    }

    /**
     * Set the value of profile_pic
     *
     * @return  self
     */
    public function setProfile_pic($profile_pic)
    {
        $this->profile_pic = $profile_pic;

        return $this;
    }
}
