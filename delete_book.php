<?php
session_start(); 
require 'func/cnt_books.php';
$id = $_GET["id"];

if (delete($id) > 0) {
    $_SESSION['flash_message'] = 'Data Buku berhasil Dihapus.';
    $_SESSION['flash_message_type'] = 'success'; // Mengatur tipe pesan
} else {
    $_SESSION['flash_message'] = 'Gagal menghapus data buku.';
    $_SESSION['flash_message_type'] = 'error';
}

// Redirect to the same page to prevent form resubmission
header('Location: admin.php');
exit;