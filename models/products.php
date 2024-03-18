<?php

include "../controllers/db.php";

function selectItems()
{
    global $conn;
    $sql = "SELECT id,naziv,boja,kategorija,cena FROM proizvodi";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

;


function getItemById($id)
{
    global $conn;
    $sql = "SELECT naziv,boja,kategorija,cena FROM proizvodi WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

;

function editItemById($id, $naziv, $boja, $kategorija, $cena)
{
    global $conn;
    $sql = "UPDATE proizvodi SET naziv = ?,boja=?, kategorija=?,cena=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssii", $naziv, $boja, $kategorija, $cena, $id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

;

function deleteItemById($id)
{
    global $conn;
    $sql = "DELETE FROM `proizvodi` WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}

;

function addNewItem($naziv, $boja, $kategorija, $cena)
{
    global $conn;
    $sql = "INSERT INTO proizvodi(naziv,boja,kategorija,cena)  VALUES (?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $naziv, $boja, $kategorija, $cena);
    mysqli_stmt_execute($stmt);
}

;
