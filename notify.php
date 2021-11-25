<?php
include("model/db_con.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>  src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"    </script> 
 
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

</head>

<body>
  
    <form id="message_form" method="POST">
        <div class="form-group">
            <label>Enter title</label>
            <input type="text" name="title" id="title" class="form-cotrol">
        </div>
        <div class="form-group">
            <label>Enter status</label>
            <input type="number" name="status" id="status" class="form-cotrol">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="post" class="btn btn-primary" value="Submit message">
        </div>
    </form>


    <script>
        $(document).ready(function() {
            $('#message_form').on('submit', function(event) {
                event.preventDefault();
                if ($('#title').val() != '' && $('#status').val() != '') {
                    
                   
                    $.ajax({
                        type: "POST",
                        url: 'insert.php',
                        data: $(this).serialize(),
                        success: function(res) {
                            console.log(res);
                          
                        }
                    });
                    
                } else {
                    alert('Hey you need to fill both fields');
                }
            });
        })
    </script>
</body>

</html>