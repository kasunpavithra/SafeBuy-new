<?php
$categories = $this->categories;
$items = $this->items;

?>
<script>
    $itemList = [];
    <?php
    $x = 0;
    foreach ($items as $key => $value) { ?>
        $itemList[<?php echo $x++; ?>] = <?php echo ($value->getName()); ?>;

    <?php }
    ?>
    console.log($itemList);
</script>
<!DOCTYPE html>
<html lang="en">
<!-- <html> -->

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="../public/CSS/shopManagerHome.css">
    <link rel="stylesheet" href="../public/CSS/login.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <title>Document</title>
</head>
<style>
    body {
        background-color: #F45B5B;
        font-family: 'Ubuntu', sans-serif;

    }

    #addBtn {
        width: 100px;
    }

    #chatBtn {
        width: 100px;
    }

    h2.orders {
        text-align: center;
    }

    .categoriesDropdown {
        text-align: left;
        width: 160px;
        padding: 5px;
        /* margin: 0px 5px 0px 5px; */
        /* padding: 0px 32px; */
        height: auto;
    }

    .dropdown-menu {
        padding: 0px
    }

    .btn {
        width: 160px;
    }

    .container {
        width: 110px;
    }

    #addNew {
        width: 100px;

    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .close1 {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close1:hover,
    .close1:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .chatClose {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .chatClose:hover,
    .chatClose:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    table {
        table-layout: auto;
        /* width: 50%;   */
    }

    td {
        margin-left: 5px;
        padding-left: 10px;
    }

    td.a {

        width: 100%;
        text-align: left;
        padding-left: 40px;
    }

    td.c {
        width: fit-content;
    }

    td.d {
        padding-left: 20px;
        width: 150px;
        text-align: center;
    }

    td.e {

        width: 100%;
        text-align: right;
        padding-right: 10px;
    }

    /* td.d{
        margin-left: 5px;
        padding-left: 5px;
    } */
    #categoryBtn {
        width: 100px;
    }





    /* login.css 
    
    
    
    
    */
    .main {
        margin: 5px 10px 5px 10px;
    }

    .containerOrders {
        background-color: #ffffffdc;
        backdrop-filter: blur(10px);
        width: 100%;
        height: auto;
        /* margin: 7em auto; */

        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }


    form.form1 {
        /* padding-top: 200px; */
        padding-left: 10px;
        /* width: 100%; */
        /* height:auto; */
    }

    p.sender {
        text-align: left;
    }

    .chatbox {
        padding-top: 50px;
    }

    #chatboxpadding {
        padding-top: 5px;
    }
</style>

<body>
    <table>
        <tr>
            <td class="a">
                <h2>Manager </h2>
            </td>
            <!-- <td><button id="chatBtn"  class="btn btn-primary dropdown-toggle"type="button" >Chat
                </button>
                <div id="myChatModal" class="modal">

                    
                    <div class="modal-content">
                        <span class="chatClose">&times;</span>

                        <form action="addItem" method="post">
                            <br><p>HIIIIIIIIIi</p>
                        </form>

                    </div>

                </div>
                <script>
                    
                    // Get the modal
                    var chatModal = document.getElementById("myChatModal");

                    // Get the button that opens the modal
                    var chatBtn = document.getElementById("chatBtn");

                    // Get the <span> element that closes the modal
                    var chatSpan = document.getElementsByClassName("chatClose")[0];

                    // When the user clicks the button, open the modal 
                    chatBtn.onclick = function() {
                        chatModal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    chatSpan.onclick = function() {
                        chatModal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == chatModal) {
                            chatModal.style.display = "none";
                        }
                    }
                </script> -->



            </td>
            <td>
                <div class="container">

                    <div class="dropdown">
                        <button id="addBtn" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">+ Add
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu" id="addNewDropdown">

                            <li><button id="myBtn2">Item</button>
                                <div id="myModal2" class="modal">

                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <span class="close1">&times;</span>

                                        <form action="addItem" method="post">
                                            <label for="category">Categories</label>
                                            <select name="category" id="categories">
                                                <?php
                                                foreach ($categories as $key => $value) { ?>
                                                    <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                                <?php }

                                                ?>
                                            </select>
                                            <!-- <label for="category">Category Name</label>
                                            <input type="text" name="category" id="category"> -->
                                            <br>
                                            <div class="ui-widget">
                                                <label for="item">Item Name</label>
                                                <input type="text" name="item" id="item" required>
                                            </div>
                                            <br>
                                            <label for="quantity">Quantity</label>
                                            <input type="number" name="quantity" id="quantity" min="1" required>
                                            <br>
                                            <input class="addItem" type="submit" value="Add an Item" name="addItemBtn">
                                        </form>

                                    </div>

                                </div>
                                <script>
                                    var dropdown = document.getElementById("addNewDropdown");
                                    dropdown.onclick = function(event) {
                                        event.stopPropagation();
                                    };
                                    // Get the modal
                                    var modal2 = document.getElementById("myModal2");

                                    // Get the button that opens the modal
                                    var btn2 = document.getElementById("myBtn2");

                                    // Get the <span> element that closes the modal
                                    var span2 = document.getElementsByClassName("close1")[0];

                                    // When the user clicks the button, open the modal 
                                    btn2.onclick = function() {
                                        modal2.style.display = "block";
                                    }

                                    // When the user clicks on <span> (x), close the modal
                                    span2.onclick = function() {
                                        modal2.style.display = "none";
                                    }

                                    // When the user clicks anywhere outside of the modal, close it
                                    window.onclick = function(event) {
                                        if (event.target == modal2) {
                                            modal2.style.display = "none";
                                        }
                                    }
                                </script>

                            </li>

                            <!-- <li id="addNew" ><a href="#">Item</a></li> -->
                            <!-- <li id="addNew"><a href="#">Category</a></li> -->
                            <li><button id="myBtn">Category</button>
                                <div id="myModal" class="modal">

                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <span class="close">&times;</span>

                                        <form action="addCategory" method="post">
                                            <!-- <label for="categories">Categories</label>
        <select name="categories" id="categories">
            <?php
            foreach ($categories as $key => $value) { ?>
                <option value="<?php echo $value ?>"><?php echo $value ?></option>
            <?php }

            ?>
        </select> -->
                                            <label for="category">Category Name</label>
                                            <input type="text" name="category" id="category" required>
                                            <br>
                                            <label for="categoryDesc">Category description</label>
                                            <input type="text" name="categoryDesc" id="categoryDesc" required>
                                            <br>


                                            <input class="addItem" type="submit" value="Add Catergory" name="addItemBtn">
                                        </form>

                                    </div>

                                </div>
                                <script>
                                    var dropdown = document.getElementById("addNewDropdown");
                                    dropdown.onclick = function(event) {
                                        event.stopPropagation();
                                    };
                                    // Get the modal
                                    var modal = document.getElementById("myModal");

                                    // Get the button that opens the modal
                                    var btn = document.getElementById("myBtn");

                                    // Get the <span> element that closes the modal
                                    var span = document.getElementsByClassName("close")[0];

                                    // When the user clicks the button, open the modal 
                                    btn.onclick = function() {
                                        modal.style.display = "block";
                                    }

                                    // When the user clicks on <span> (x), close the modal
                                    span.onclick = function() {
                                        modal.style.display = "none";
                                    }

                                    // When the user clicks anywhere outside of the modal, close it
                                    window.onclick = function(event) {
                                        if (event.target == modal) {
                                            modal.style.display = "none";
                                        }
                                    }
                                </script>
                        </ul>
            </td>
            <td>
                <div class="container">

                    <div class="dropdown">
                        <!-- <button id="addBtn" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">- Remove
                            <span class="caret"></span></button> -->
                        <ul class="dropdown-menu" id="addNewDropdown">

                            <li><button id="myBtn2">Item</button>
                                <div id="myModal2" class="modal">

                                    <!-- Modal content -->
                                    <!-- <div class="modal-content">
                                        <span class="close1">&times;</span>

                                        <form action="addItem" method="post">
                                            <label for="category">Categories</label>
                                            <select name="category" id="categories">
                                                <?php
                                                foreach ($categories as $key => $value) { ?>
                                                    <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                                <?php }

                                                ?>
                                            </select>
                                            <label for="category">Category Name</label>
                                            <input type="text" name="category" id="category">
                                            <br>
                                            <label for="item">Item Name</label>
                                            <input type="text" name="item" id="item">
                                            <br>
                                            <label for="quantity">Quantity</label>
                                            <input type="number" name="quantity" id="quantity">
                                            <br>
                                            <input class="addItem" type="submit" value="Add an Item" name="addItemBtn">
                                        </form>

                                    </div> -->

                                </div>
                                <script>
                                    var dropdown = document.getElementById("addNewDropdown");
                                    dropdown.onclick = function(event) {
                                        event.stopPropagation();
                                    };
                                    // Get the modal
                                    var modal2 = document.getElementById("myModal2");

                                    // Get the button that opens the modal
                                    var btn2 = document.getElementById("myBtn2");

                                    // Get the <span> element that closes the modal
                                    var span2 = document.getElementsByClassName("close1")[0];

                                    // When the user clicks the button, open the modal 
                                    btn2.onclick = function() {
                                        modal2.style.display = "block";
                                    }

                                    // When the user clicks on <span> (x), close the modal
                                    span2.onclick = function() {
                                        modal2.style.display = "none";
                                    }

                                    // When the user clicks anywhere outside of the modal, close it
                                    window.onclick = function(event) {
                                        if (event.target == modal2) {
                                            modal2.style.display = "none";
                                        }
                                    }
                                </script>

                            </li>

                            <!-- <li id="addNew" ><a href="#">Item</a></li> -->
                            <!-- <li id="addNew"><a href="#">Category</a></li> -->
                            <li><button id="myBtn">Category</button>
                                <div id="myModal" class="modal">

                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <span class="close">&times;</span>

                                        <form action="addItem" method="post">
                                            <!-- <label for="categories">Categories</label>
        <select name="categories" id="categories">
            <?php
            foreach ($categories as $key => $value) { ?>
                <option value="<?php echo $value ?>"><?php echo $value ?></option>
            <?php }

            ?>
        </select> -->
                                            <label for="category">Category Name</label>
                                            <input type="text" name="category" id="category">
                                            <br>


                                            <input class="addItem" type="submit" value="Add Catergory" name="addItemBtn">
                                        </form>

                                    </div>

                                </div>
                                <script>
                                    var dropdown = document.getElementById("addNewDropdown");
                                    dropdown.onclick = function(event) {
                                        event.stopPropagation();
                                    };
                                    // Get the modal
                                    var modal = document.getElementById("myModal");

                                    // Get the button that opens the modal
                                    var btn = document.getElementById("myBtn");

                                    // Get the <span> element that closes the modal
                                    var span = document.getElementsByClassName("close")[0];

                                    // When the user clicks the button, open the modal 
                                    btn.onclick = function() {
                                        modal.style.display = "block";
                                    }

                                    // When the user clicks on <span> (x), close the modal
                                    span.onclick = function() {
                                        modal.style.display = "none";
                                    }

                                    // When the user clicks anywhere outside of the modal, close it
                                    window.onclick = function(event) {
                                        if (event.target == modal) {
                                            modal.style.display = "none";
                                        }
                                    }
                                </script>
                        </ul>
            </td>
            <td class="c">
                <div class="container">

                    <div class="dropdown">
                        <button id="categoryBtn" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Categories
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <!-- <li><a href="#">HTML</a></li>
                                               <li><a href="#">CSS</a></li>
                                               <li><a href="#">JavaScript</a></li> -->
                            <?php

                            foreach ($categories as $cat) { ?>
                                <form action="categoryItems" method="get">
                                    <!-- <li  name="category" ><?php echo $cat;  ?></li> -->
                                    <li class="categoriesDropdownContainer"><input class="categoriesDropdown" type="submit" name="category" value="<?php echo $cat;  ?>"></li>
                                    <!-- <li><a href="#"><?php echo $cat;  ?></a></li> -->
                                </form>
                            <?php }


                            ?>

                        </ul>
                    </div>
                </div>
            </td>
            <td class="d">
                <h4> Profile </h4>
            </td>
            <td class="e"><a href="logout">
                    <h4>LogOut</h4>
                </a></td>

        </tr>
    </table>
    <h1><a href="addOffers">Add Offers</a></h1>
    <div class="main">
        <div class="containerOrders">
            <form class="form1" method="post" action="loginProfile">
                <h2 class="orders">Orders</h2>
                <div class="chatBtn" style="text-align:right; padding:5px">
                    <button id="chatBtn" class="btn btn-primary dropdown-toggle" type="button">Chat
                    </button>
                    <div id="myChatModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content" id="chatboxpadding">
                            <span class="chatClose">&times;</span>

                            <form action="addItem" method="post">
                                <div class="chatbox">
                                    <p class="sender">Sender HIIII</p>
                                    <p class="reciever">Reciever HIIII</p>
                                    <div class="panel-footer">
                                        <div class="input-group">
                                            <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                    <script>
                        // Get the modal
                        var chatModal = document.getElementById("myChatModal");

                        // Get the button that opens the modal
                        var chatBtn = document.getElementById("chatBtn");

                        // Get the <span> element that closes the modal
                        var chatSpan = document.getElementsByClassName("chatClose")[0];

                        // When the user clicks the button, open the modal 
                        chatBtn.onclick = function() {
                            chatModal.style.display = "block";
                        }

                        // When the user clicks on <span> (x), close the modal
                        chatSpan.onclick = function() {
                            chatModal.style.display = "none";
                        }

                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function(event) {
                            if (event.target == chatModal) {
                                chatModal.style.display = "none";
                            }
                        }
                    </script>
                </div>
                <br><br><br><br><br>
                <br><br><br><br><br>
                <br><br><br><br><br>
            </form>
        </div>



    </div>







</body>
<script>
    $(function() {
        var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];
        $("#item").autocomplete({
            source: availableTags
        });
    });
</script>

</html>