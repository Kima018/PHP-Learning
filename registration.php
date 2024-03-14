<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkbox = $_POST['checkbox'];


    $already_registered = "SELECT email FROM korisnici_podaci WHERE email=?";
    $stmt = mysqli_prepare($conn, $already_registered);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        die("Vec postoji nalog sa tom mejl adresom");
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        session_abort();
    };


    $password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO korisnici_podaci(ime,email,sifra) VALUES (?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
    mysqli_stmt_execute($stmt);

    echo "uspesno ste se registrovali!";
//    $_SESSION['ulogovan'] = true;

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

header('location:index.php');
exit();

