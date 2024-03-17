<?php
require_once "../models/user.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Form method is not POST!");
};
$email = $_POST['email'];
$password = $_POST['password'];

$result = getUser($email);
if ($result->num_rows === 0) {
    die("Ne postoji korisnik sa tom mejl adresom");
};

$row = mysqli_fetch_assoc($result);

if (!password_verify($password, $row['sifra'])) {
    die("Sifra nije tacna");
};

$_SESSION['registered'] = true;
header("location:../index.php");
exit();
?>