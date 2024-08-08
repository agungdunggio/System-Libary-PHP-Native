<?php
require './func/cnt_books.php';
session_start();
$id = $_GET["id"];
$book = query("SELECT * FROM books where id_buku = $id")[0];
if (isset($_POST["submit"])) {
    if (update($_POST) > 0) {
        $_SESSION['flash_message'] = 'Data Buku berhasil Diubah.';
        $_SESSION['flash_message_type'] = 'success'; // Mengatur tipe pesan
    } else {
        $_SESSION['flash_message'] = 'Gagal mengubah data Buku.';
        $_SESSION['flash_message_type'] = 'error';
    }
    header('Location: admin.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="sidebar">
        <img src="asset/img/logo.webp" alt="Logo" class="logo">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="#dashboard" id="dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="#member"><i class="fas fa-users"></i> Member</a></li>
            <li><a href="#book"><i class="fas fa-book"></i> Book</a></li>
            <li><a href="#transaction"><i class="fas fa-exchange-alt"></i> Loans & Returns</a></li>
            <li><a href="#logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <section class="section-form">
            <header>
                <h1>Update Buku</h1>
            </header>

            <form id="add-book-form" action="" method="post">
                <input type="hidden" name="id_buku" value="<?= htmlspecialchars($book["id_buku"]); ?>">
                <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <input type="text" id="judul" name="judul_buku" required value="<?= htmlspecialchars($book["judul_buku"]); ?>">
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input type="text" id="penulis" name="penulis" required value="<?= htmlspecialchars($book["penulis"]); ?>">
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" id="penerbit" name="penerbit" required value="<?= htmlspecialchars($book["penerbit"]); ?>">
                </div>
                <div class="form-group">
                    <label for="tahun_terbit">Tahun Terbit</label>
                    <input type="number" id="tahun_terbit" name="tahun" required value="<?= htmlspecialchars($book["tahun"]); ?>">
                </div>
                <div class="form-group">
                    <label for="jumlah_hal">Jumlah Eksemplar</label>
                    <input type="number" id="jumlah_hal" name="jumlah_eksemplar" required value="<?= htmlspecialchars($book["jumlah_eksemplar"]); ?>">
                </div>
                <div class="form-group">
                    <label for="no_panggil">No Panggil</label>
                    <input type="text" id="no_panggil" name="no_panggil" required value="<?= htmlspecialchars($book["no_panggil"]); ?>">
                </div>
                <button type="submit" name="submit" class="btn-add-member">Update</button>
            </form>

        </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="asset/js/ajax.js"></script>
</body>

</html>