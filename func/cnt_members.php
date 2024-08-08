<?php 
require 'functions.php';


function insert($data): int {
    global $conn;
    $nik = $data['nik'];
    $nama = $data['nama'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $tanggal_lahir = $data['tanggal_lahir'];
    $email = $data['email'];
    $no_hp = $data['no_hp'];
    $alamat = $data['alamat'];

    $query = "INSERT INTO members (nik, nama, jenis_kelamin, tanggal_lahir, email, no_hp, alamat) VALUES ('$nik', '$nama', '$jenis_kelamin', '$tanggal_lahir', '$email', '$no_hp', '$alamat')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}