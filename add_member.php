<?php 
require './func/cnt_members.php';

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
    <?php if (isset($flashMessage)): ?>
    <div id="flash-message" class="flash-message flash-<?php echo htmlspecialchars($flashMessageType); ?>">
        <p><?php echo htmlspecialchars($flashMessage); ?></p>
    </div>
    <?php endif; ?>
    <section class="section-form">
    <header>
        <h1>Tambah Anggota</h1>
    </header>
    
    <form id="add-member-form" action="" method="post">
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" id="nik" name="nik" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="no_hp">No Hp</label>
            <input type="text" id="no_hp" name="no_hp" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" required></textarea>
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

