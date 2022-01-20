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
<style>
    body {
        background-image: url('https://png.pngtree.com/thumb_back/fw800/back_our/20190617/ourmid/pngtree-today-s-special-offer-limited-time-to-buy-poster-background-template-image_127084.jpg');
    }

    * {
        width: 100%;

    }
</style>

<body>
    <!-- <a href="dashboard">Dashboard</a> -->
    <a style="width: 20%; margin-left: 40%;" class="btn btn-primary" href="dashboard">Dashboard</a>
    <div class="input-group mb-3">
        <form action="AddNotification" method="post">
            <div class="card">
                <div class="card-header">
                    Add Offers Here
                </div>
                <div class="card-body">
                    <h5 class="card-title">Least Amount for offer : </h5>
                    <input type="number" name="limitAmount" class="form-control" min="1" placeholder="Add the least amount of order that you are going to add offer" aria-label="Dollar amount (with dot and two decimal places)">
                    <p class="card-text">Offer Percentage : </p>
                    <input type="number" class="form-control" name="offerPercent" min="0" max="1" step="0.01" placeholder="Amount of offer" aria-label="Dollar amount (with dot and two decimal places)">
                    <br>
                    <input class="btn btn-primary" type="submit" value="Add Offer" name="offerAddBtn">
                </div>
            </div>
        </form>
    </div>


</body>

</html>