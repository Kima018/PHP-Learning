<?php
require_once "../models/products.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
    die("Metoda nije post");
};

if (!isset($_POST['product_name'], $_POST['product_color'], $_POST['product_category'], $_POST['product_price'])) {
    die("Something got wrong!");
};

$name = $_POST['product_name'];
$color = $_POST['product_color'];
$category = $_POST['product_category'];
$price = $_POST['product_price'];

addNewItem($name, $color, $category, $price);

header("location: ../pages/products.php?message=DONE");
exit;
?>
