<?php
include "db.php";

function getUser(string $email)
{
    global $conn;
    $stmt = mysqli_prepare($conn, "SELECT email,sifra FROM korisnik WHERE email=?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function userExists(string $email)
{
    $result = getUser($email);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function userRegister(string $username,string $email,string $password)
{
    global $conn;
    $password = password_hash($password, PASSWORD_BCRYPT);
    $stmt = mysqli_prepare($conn, "INSERT INTO korisnik(ime,email,sifra) VALUES (?,?,?)");
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
    mysqli_stmt_execute($stmt);
}


?>
