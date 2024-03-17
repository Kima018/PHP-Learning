<?php
include "../models/products.php";
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Form method is not POST!");
};

if (!isset($_POST['product_name'], $_POST['product_color'], $_POST['product_category'], $_POST['product_price'],$_POST['product_id'])) {
    die("Something got wrong!");
};
$id = $_POST['product_id'];
$name = $_POST['product_name'];
$color = $_POST['product_color'];
$category = $_POST['product_category'];
$price = $_POST['product_price'];

$result = editItemById($id,$name,$color,$category,$price);

header("location: ../pages/products.php");
exit;
?>