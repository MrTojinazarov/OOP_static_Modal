<?php
include 'Product.php';

if (isset($_GET['product_id'])) {

    $id = $_GET['product_id'];

    $product = Product::getProductByID($id);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h1>Edit Product</h1>
                <a href="index.php" type="button" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="mb-3">
                        <label for="Input1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="Input1" placeholder="Name" value="<?php echo $product->name; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Input2" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="Input2" placeholder="Price" value="<?php echo $product->price; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Input3" class="form-label">Count</label>
                        <input type="number" name="count" class="form-control" id="Input3" placeholder="Count" value="<?php echo $product->count; ?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="ok" class="btn btn-outline-warning">Save</button>
                    </div>
                </form>

                <?php
                if (isset($_POST['ok'])) {

                    if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['count'])) {

                        $data = [
                            'name' => $_POST['name'],
                            'price' => $_POST['price'],
                            'count' => $_POST['count']
                        ];

                        Product::update($data, $id);
                        header("Location: index.php");
                    }
                }
                ?>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>