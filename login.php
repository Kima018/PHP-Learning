<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT sifra FROM korisnici_podaci WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['sifra'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['ulogovan'] = true;
            header('location:index.php');
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            exit();
        } else {
            echo "Pogresna lozinka";
        }
    } else {
        echo "Nema korisnika sa tim mejlom";
    }
    mysqli_close($conn);
    exit();
}
?>