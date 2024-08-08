<?php
require 'functions.php';


function insert($data): int
{
    global $conn;
    $judul_buku = htmlspecialchars($data['judul_buku']);
    $penulis = htmlspecialchars($data['penulis']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $tahun = htmlspecialchars($data['tahun']);
    $jumlah_eksemplar = htmlspecialchars($data['jumlah_eksemplar']);
    $no_panggil = htmlspecialchars($data['no_panggil']);

    $query = "INSERT INTO books (judul_buku, penulis, penerbit, tahun, jumlah_eksemplar, no_panggil ) VALUES ('$judul_buku', '$penulis', '$penerbit', '$tahun', '$jumlah_eksemplar', '$no_panggil')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id): int
{
    global $conn;
    mysqli_query($conn, "DELETE from books where id_buku = $id");
    return mysqli_affected_rows($conn);
}

function update($data): int
{
    global $conn;
    $id = htmlspecialchars($data["id_buku"]);
    $judul_buku = htmlspecialchars($data['judul_buku']);
    $penulis = htmlspecialchars($data['penulis']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $tahun = htmlspecialchars($data['tahun']);
    $jumlah_eksemplar = htmlspecialchars($data['jumlah_eksemplar']);
    $no_panggil = htmlspecialchars($data['no_panggil']);

    $query = "UPDATE books 
          SET judul_buku = '$judul_buku', 
              penulis = '$penulis', 
              penerbit = '$penerbit', 
              tahun = '$tahun', 
              jumlah_eksemplar = '$jumlah_eksemplar', 
              no_panggil = '$no_panggil' 
          WHERE id_buku = '$id';";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
