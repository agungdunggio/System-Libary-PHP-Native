<?php
require './func/cnt_loans_returns.php';

if (isset($_POST["submit"])) {
    if (insert($_POST) > 0) {
        $flashMessage = "Data Berhasil dimasukan";
        $flashMessageType = "success";
    } else {
        $flashMessage = "Data Gagal dimasukan";
        $flashMessageType = "error";
    }
}


// Ambil data NIK dari tabel members
$query = "SELECT nik FROM members";
$result = mysqli_query($conn, $query);

// Ambil data ID, Judul buku dari tabel books
$queryBook = "SELECT id_buku, judul_buku FROM books";
$resultBook = mysqli_query($conn, $queryBook);

$idBukuOptions = '';
while ($row = mysqli_fetch_assoc($resultBook)) {
    $idBukuOptions .= '<option value="' . htmlspecialchars($row['id_buku']) . '">' . htmlspecialchars($row['judul_buku']) . '</option>';
}

$nikOptions = '';
while ($row = mysqli_fetch_assoc($result)) {
    $nikOptions .= '<option value="' . htmlspecialchars($row['nik']) . '">' . htmlspecialchars($row['nik']) . '</option>';
}

?>

<!-- views/add_member_form.php -->
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
        <?php if (isset($flashMessage)) : ?>
            <div id="flash-message" class="flash-message flash-<?php echo htmlspecialchars($flashMessageType); ?>">
                <p><?php echo htmlspecialchars($flashMessage); ?></p>
            </div>
        <?php endif; ?>
        <section class="section-form">
            <header>
                <h1>Tambah Peminjaman</h1>
            </header>

            <form id="add-member-form" action="" method="post">
                <div class="form-group">
                    <label for="nik_anggota">NIK Anggota</label>
                    <select id="nik_anggota" name="nik_anggota" required>
                        <option value="">Pilih NIK Anggota</option>
                        <?php echo $nikOptions; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_buku">Judul Buku</label>
                    <select id="id_buku" name="id_buku" required>
                        <option value="">Pilih Judul Buku</option>
                        <?php echo $idBukuOptions; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_pinjam">Tanggal Peminjaman</label>
                    <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" required>
                </div>
                <div class="form-group">
                    <label for="batas_pinjam">Batas Peminjaman</label>
                    <input type="date" id="batas_pinjam" name="batas_pinjam" required>
                </div>
                <button type="submit" name="submit" class="btn-add-member">Simpan</button>
            </form>
        </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="asset/js/ajax.js"></script>
    <script>
        $(document).ready(function() {
            var flashMessage = $('#flash-message');
            if (flashMessage.length) {
                setTimeout(function() {
                    flashMessage.fadeOut();
                }, 5000); // 5000 ms = 5 detik
            }
        });
    </script>
</body>

</html>