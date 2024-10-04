<?php

include 'Product.php';

if(isset($_GET['product_id']) && gettype((int)$_GET['product_id']) == 'integer'){
    $id = $_GET['product_id'];
    Product::delete($id);
    header("Location: index.php");
}

?>