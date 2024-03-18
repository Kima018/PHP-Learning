<?php
require_once "../models/user.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Form method is not POST!");
};
if (!isset($_POST['name'],$_POST['email'],$_POST['password'])){
    die("Something got wrong!");
};

session_start();
$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];


if (userExists($email)) {
    header("location:../index.php?message=korisnik-postoji");
    die();
};

if (userRegister($username, $email, $password)) {
    $_SESSION["registered"]=true;
    header("location:../index.php?message=registered");
    exit();
};

