<?php
require './func/cnt_members.php';
session_start();
$id = $_GET["nik"];
$member = query("SELECT * FROM members where nik = '$id'")[0];
if (isset($_POST["submit"])) {
    if (update($_POST) > 0) {
        $_SESSION['flash_message'] = 'Data Anggota berhasil Diubah.';
        $_SESSION['flash_message_type'] = 'success'; // Mengatur tipe pesan
    } else {
        $_SESSION['flash_message'] = 'Gagal mengubah data Anggota.';
        $_SESSION['flash_message_type'] = 'error';
    }
    header('Location: admin.php');
    exit;
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
        <section class="section-form">
            <header>
                <h1>Update Anggota</h1>
            </header>

            <form id="add-member-form" action="" method="post">
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" id="nik" name="nik" required value="<?= htmlspecialchars($member["nik"]); ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" required value="<?= htmlspecialchars($member["nama"]); ?>">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="L" <?= $member["jenis_kelamin"] == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                        <option value="P" <?= $member["jenis_kelamin"] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required value="<?= htmlspecialchars($member["tanggal_lahir"]); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required value="<?= htmlspecialchars($member["email"]); ?>">
                </div>
                <div class="form-group">
                    <label for="no_hp">No Hp</label>
                    <input type="text" id="no_hp" name="no_hp" required value="<?= htmlspecialchars($member["no_hp"]); ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" required><?= htmlspecialchars($member["alamat"]); ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn-add-member">Update</button>
            </form>
        </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="asset/js/ajax.js"></script>
</body>

</html>