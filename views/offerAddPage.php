<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <h1>Add Offers Here</h1>
    <div class="input-group mb-3">
        <form action="AddNotification" method="post">
            <span class="input-group-text">Rs : </span>
            <input type="number" name="limitAmount" class="form-control" placeholder="Add the least amount of order that you are going to add offer" aria-label="Dollar amount (with dot and two decimal places)">
            <input type="number" class="form-control" name="offerPercent" placeholder="Amount of offer" aria-label="Dollar amount (with dot and two decimal places)">
            <input type="submit" value="Add Offer" name="offerAddBtn">
        </form>
    </div>




    </div>

</body>

</html>