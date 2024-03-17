<?php
include "../models/products.php";
if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    die("Form method is not POST!");
};
$name= $_POST['product_name'];
$color= $_POST['product_color'];
$category= $_POST['product_category'];
$price= $_POST['product_price'];

?>