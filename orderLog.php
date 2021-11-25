<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderLog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <style>
        input[type=radio] {
        border: 0px;
        width: 100%;
        height: 2em;
}
    </style>
</head>
<body>
     <div class="newOrders">
         <h1>New Orders</h1>
     </div>
    <table class="table table-dark">
        <thead>
        <tr>
            <th>OrderID</th>
            <th>Init Date of Order</th>
            <th>To Delivery</th>

            <th>Approve</th>
            <th>Reject</th>
            <th>Amount SLR Rs:</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td><input type="button" value="Click"></td>
               
                <td><input type="radio" class="radio" name="check1"></td>
                <td><input type="radio" class="radio" name="check1"></td>
             
                <td>5000</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td><input type="button" value="Click"></td>
                <td><input type="radio" class="radio" name="check1"></td>
                <td><input type="radio" class="radio" name="check1"></td>
                <td>5000</td>
            </tr>
        </tbody>
    </table>
    
</body>
</html>