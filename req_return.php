<?php
session_start();
require 'func/cnt_loans_returns.php';

if (returns($_POST) > 0) {
    $_SESSION['flash_message'] = 'Berhasil Mengupdate Data pengembalian.';
    $_SESSION['flash_message_type'] = 'success';
} else {
    $_SESSION['flash_message'] = 'Gagal Mengupdate Data pengembalian.';
    $_SESSION['flash_message_type'] = 'error';
}
header('Location: admin.php');
exit;
