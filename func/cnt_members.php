<?php
require 'functions.php';


function insert($data): int
{
    global $conn;
    $nik = htmlspecialchars($data['nik']);
    $nama = htmlspecialchars($data['nama']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
    $email = htmlspecialchars($data['email']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $alamat = htmlspecialchars($data['alamat']);


    $query = "INSERT INTO members (nik, nama, jenis_kelamin, tanggal_lahir, email, no_hp, alamat) VALUES ('$nik', '$nama', '$jenis_kelamin', '$tanggal_lahir', '$email', '$no_hp', '$alamat')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id): int
{
    global $conn;
    mysqli_query($conn, "DELETE from members where nik = $id");
    return mysqli_affected_rows($conn);
}

function update($data): int
{
    global $conn;
    $nik = htmlspecialchars($data['nik']);
    $nama = htmlspecialchars($data['nama']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
    $email = htmlspecialchars($data['email']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $alamat = htmlspecialchars($data['alamat']);


    $query = "UPDATE members SET 
    nama = '$nama',
    jenis_kelamin = '$jenis_kelamin',
    tanggal_lahir = '$tanggal_lahir',
    email = '$email',
    no_hp = '$no_hp',
    alamat = '$alamat'
    WHERE nik = '$nik'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
