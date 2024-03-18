<?php
require_once "../models/products.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    die("Forma nije u post metodi!");
};

if (!isset($_POST['product_id'])) {
    die("Proizvod nije poronadjen!");
};
deleteItemById($_POST['product_id']);

header('location:localhost/pages/products');
exit();

?>
