<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "safebuy";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$db = $con;
if(isset($_POST["show"]))
{
    global $db;
    $query = "SELECT DESCRIPTION,TYPE,STATUS from `notifacation`";
    $result = mysqli_query($db, $query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // echo "id: " . $row["description"] . " - Name: " . $row["type"] . " " . $row["status"] . "<br>";
        }
    } else {
        echo "0 results";
    }
    echo "Ad";
}


// $fetchData = fetch_data();
// show_data($fetchData);
// function show_data($fetchData)
// {

//     if (count($fetchData) > 0) {
//         $sn = 1;
//         foreach ($fetchData as $data) {
//             echo "<tr>
//           <td>" . $sn . "</td>
//           <td>" . $data['notification_id'] . "</td>
//           <td>" . $data['description'] . "</td>
//           <td>" . $data['type'] . "</td>
//           <td>" . $data['status'] . "</td>
         
//    </tr>";

//             $sn++;
//         }
//     } else {

//         echo "<tr>
//         <td colspan='7'>No Data Found</td>
//        </tr>";
//     }
//     echo "</table>";
// }
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <button id="showData" type="submit" name="show">Show User Data</button>
    <div id="table-container"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>





    <script>
        $(document).on('click', '#showData', function(e) {
            $.ajax({
                type: "GET",
                url: "fetch.php",
                dataType: "html",
                success: function(data) {
                    $("#table-container").html(data);

                }
            });
        });
    </script>


</body>

</html>