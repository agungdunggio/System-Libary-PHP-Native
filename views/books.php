<?php

require '../func/functions.php';
$books = query("Select * from books");
?>
<section class="section-member">

    <header>
        <h1>Data Buku</h1>
    </header>
    
    <a href="add_book.php" class="btn-add-member">Tambah Buku</a>
    
    <table class="member-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Jumlah Eksemplar</th>
                <th>No Panggil</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <!-- Contoh baris data buku -->
         <?php $i = 1; ?>
         <?php foreach ($books as $book) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $book["judul_buku"]; ?></td>
            <td><?= $book["penulis"]; ?></td>
            <td><?= $book["penerbit"]; ?></td>
            <td><?= $book["tahun"]; ?></td>
            <td><?= $book["jumlah_eksemplar"]; ?></td>
            <td><?= $book["no_panggil"]; ?></td>
            <td>
                <a href="edit_book.php?id=<?= $book["id_buku"]; ?>" class="btn-add-member">Edit</a>
                <a href="delete_book.php?id=<?= $book["id_buku"]; ?>" onclick="return confirm('Yakin Hapus Data?');" class="btn-add-member delete">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <!-- Baris data lainnya -->
    </tbody>
</table>
</section>
