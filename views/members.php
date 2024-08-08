<?php

require '../func/functions.php';
$members = query("Select * from members");

?>

<section class="section-member">

    <header>
        <h1>Data Anggota</h1>
    </header>

    <a href="add_member.php" class="btn-add-member">Tambah Anggota</a>

    <table class="member-table">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Email</th>
                <th>No Hp</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Contoh baris data anggota -->
            <?php foreach ($members as $member) : ?>
                <tr>
                    <td><?= $member["nik"]; ?></td>
                    <td><?= $member["nama"]; ?></td>
                    <td>
                        <?php
                        if ($member["jenis_kelamin"] == 'L') {
                            echo 'Laki-laki';
                        } elseif ($member["jenis_kelamin"] == 'P') {
                            echo 'Perempuan';
                        } else {
                            echo 'Tidak Diketahui'; 
                        }
                        ?>
                    </td>
                    <td><?= $member["tanggal_lahir"]; ?></td>
                    <td><?= $member["email"]; ?></td>
                    <td><?= $member["no_hp"]; ?></td>
                    <td><?= $member["alamat"]; ?></td>
                    <td>
                        <a href="edit_member.php?nik=<?= $member["nik"]; ?>" class="btn-add-member">Edit</a>
                        <a href="delete_member.php?nik=<?= $member["nik"]; ?>" class="btn-add-member" style="background-color: #dc3545;">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <!-- Baris data lainnya -->
        </tbody>
    </table>
</section>