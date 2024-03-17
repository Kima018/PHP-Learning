<?php


include "../controllers/db.php";


function getUser($email)
{
    global $conn;
    $sql = "SELECT email,sifra FROM korisnik WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        return "Greska pri pripremi upita" . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    $success = mysqli_stmt_execute($stmt);
    if (!$success) {
        return "Greska pri izvrsavanju upita " . mysqli_stmt_error($stmt);
    }

    return mysqli_stmt_get_result($stmt);
}

;

function userExists($email)
{
    $result = getUser($email);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

;

function userRegister($username, $email, $password)
{
    global $conn;
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO korisnik(ime,email,sifra) VALUES (?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        return "Greska pri pripremi upita" . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
    $success = mysqli_stmt_execute($stmt);
    if (!$success) {
        return "Greska pri izvrsavanju upita " . mysqli_stmt_error($stmt);
    };
    if (mysqli_stmt_affected_rows($stmt) === 0) {

        return "Nema dodatih redova u bazi";
    }
    return "Uspesna registracija ";

}

;
?>
