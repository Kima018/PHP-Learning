<?php
require_once "../models/user.php";
if (session_status()==PHP_SESSION_NONE){
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Form method is not POST!");
}

if (!isset($_POST['email'], $_POST['password'])) {
    die("Something got wrong!");
}

$email = $_POST['email'];
$password = $_POST['password'];

$result = getUser($email);
if ($result->num_rows === 0) {
    die("Ne postoji korisnik sa tom mejl adresom");
}

$user = mysqli_fetch_assoc($result);

if (!password_verify($password, $user['sifra'])) {
    die("Sifra nije tacna");
}

$_SESSION['registered'];
header("location:../index.php");
exit();
?>