<?php
include "db.php";

function selectItems(): mysqli_result
{
    global $conn;
    $stmt = mysqli_prepare($conn, "SELECT id,naziv,boja,kategorija,cena FROM proizvodi");
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}


function getItemById($id): mysqli_result
{
    global $conn;
    $stmt = mysqli_prepare($conn, "SELECT naziv,boja,kategorija,cena FROM proizvodi WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}


function editItemById($id, string $naziv, string $boja, string $kategorija, string $cena): mysqli_result
{
    global $conn;
    $stmt = mysqli_prepare($conn, "UPDATE proizvodi SET naziv = ?,boja=?, kategorija=?,cena=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "sssii", $naziv, $boja, $kategorija, $cena, $id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}


function deleteItemById($id): void
{
    global $conn;
    $stmt = mysqli_prepare($conn, "DELETE FROM `proizvodi` WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}


function addNewItem(string $naziv, string $boja, string $kategorija, string $cena): void
{
    global $conn;
    $stmt = mysqli_prepare($conn, "INSERT INTO proizvodi(naziv,boja,kategorija,cena)  VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "sssi", $naziv, $boja, $kategorija, $cena);
    mysqli_stmt_execute($stmt);
}
