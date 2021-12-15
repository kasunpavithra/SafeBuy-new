<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <title>Document</title>
</head>

<body>
    <div>
        <form>
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
        </form>
    </div>
    <div>
        <form action="addCategory/" method="POST">
            <label for="category_name">Category Name</label>
            <input type="text" name="category_name" id="category_name" require>
            <label for="desciption">Description</label>
            <textarea name="description" id="description" cols="30" rows="1" require></textarea>
            <button type="submit" name="addCategory">Add a new Category</button>
        </form>
    </div>
    <?php
    foreach ($this->categories as $category) {
        print_r($category);
    ?>


        <div class="card" style="width: 18rem;">
            <form action="editItems/" method="POST">
                <div class="card-body">
                    <?php $_POST["a"]= $category["category_name"] ; ?>
                    <h5 class="card-title"><?php echo $category["category_name"] ?></h5>
                    <p class="card-text"><?php echo $category["Description"] ?></p>
                    <button class="btn btn-primary" type="submit" name="getItem">Edit Item Details</button>
                </div>
            </form>
        </div>


    <?php
        echo "</br>";
    }
    ?>

</body>

</html>