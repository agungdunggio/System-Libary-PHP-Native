<?php 
require './func/cnt_books.php';

if (isset($_POST["submit"])) {
    if (insert($_POST) > 0) {
        $flashMessage = "Data Berhasil dimasukan";
        $flashMessageType = "success";
    } else {
        $flashMessage = "Data Gagal dimasukan";
        $flashMessageType = "error";
    }
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
                <h1>Tambah Buku</h1>
            </header>

            <form id="add-book-form" action="add_book.php" method="post">
                <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <input type="text" id="judul" name="judul_buku" required>
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input type="text" id="penulis" name="penulis" required>
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" id="penerbit" name="penerbit" required>
                </div>
                <div class="form-group">
                    <label for="tahun_terbit">Tahun Terbit</label>
                    <input type="number" id="tahun_terbit" name="tahun" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_hal">Jumlah Eksemplar</label>
                    <input type="number" id="jumlah_hal" name="jumlah_eksampler" required>
                </div>
                <div class="form-group">
                    <label for="no_panggil">No Panggil</label>
                    <input type="text" id="no_panggil" name="no_panggil" required>
                </div>
                <button type="submit" class="btn-add-member">Simpan</button>
            </form>
            <div id="response-message"></div>
        </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="asset/js/ajax.js"></script>
</body>

</html>