<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h1>Add Product</h1>
                <a href="index.php" type="button" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="Input1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="Input1" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label for="Input2" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="Input2" placeholder="Price">
                    </div>
                    <div class="mb-3">
                        <label for="Input3" class="form-label">Count</label>
                        <input type="number" name="count" class="form-control" id="Input3" placeholder="Count">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="ok" class="btn btn-outline-warning">Save</button>
                    </div>
                </form>
                <?php
                include "Product.php";
                if(isset($_POST['ok'])){
                    if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['count'])){

                        $data = [
                            'name' => $_POST['name'],
                            'price' => $_POST['price'],
                            'count' => $_POST['count']
                        ];

                        Product::create($data);
                        header("Location: index.php");
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>