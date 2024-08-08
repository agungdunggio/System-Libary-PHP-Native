<?php
require '../func/cnt_loans_returns.php';

// Ambil data pinjaman dengan LEFT JOIN ke tabel pengembalian
$loans = query("SELECT l.id_peminjaman, l.nik_anggota, l.id_buku, l.tanggal_pinjam, l.batas_pinjam, r.tanggal_kembali, r.denda 
                 FROM loans as l
                 LEFT JOIN returns as r ON l.id_peminjaman = r.id_peminjaman");



?>

<section class="section-member">

    <header>
        <h1>Data Transaksi</h1>
    </header>

    <a href="add_loan_return.php" class="btn-add-member">Tambah Transaksi</a>

    <table class="member-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Batas Pinjam</th>
                <th>Status</th>
                <th>Denda</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($loans as $loan) : ?>
                <?php
                $member = query("SELECT nama FROM members WHERE nik = ?", [$loan['nik_anggota']])[0]['nama'];
                $book = query("SELECT judul_buku FROM books WHERE id_buku = ?", [$loan['id_buku']])[0]['judul_buku'];

                $status = $loan['tanggal_kembali'] ? 'Kembali' : (date('Y-m-d') > $loan['batas_pinjam'] ? 'Terlambat' : 'Dipinjam');

                if (!$loan['tanggal_kembali'] && date('Y-m-d') > $loan['batas_pinjam']) {
                    $batas_pinjam = new DateTime($loan['batas_pinjam']);
                    $today = new DateTime();
                    $interval = $batas_pinjam->diff($today);
                    $days_late = $interval->days;

                    $denda = ($days_late > 3) ? ($days_late - 3) * 1000 : 0;
                } else {
                    $denda = $loan['denda'] ?? 0;
                }
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($member); ?></td>
                    <td><?= htmlspecialchars($book); ?></td>
                    <td><?= htmlspecialchars(date('d-m-Y', strtotime($loan['tanggal_pinjam']))); ?></td>
                    <td><?= htmlspecialchars(date('d-m-Y', strtotime($loan['batas_pinjam']))); ?></td>
                    <td><?= htmlspecialchars($status); ?></td>
                    <td>Rp. <?= htmlspecialchars(number_format($denda, 0, ',', '.')); ?></td>
                    <td>
                        <?php if (!$loan['tanggal_kembali']) : ?>
                            <form action="req_return.php" method="post" style="display:inline;">
                                <input type="hidden" name="id_peminjaman" value="<?= htmlspecialchars($loan['id_peminjaman']); ?>">
                                <input type="hidden" name="tanggal_kembali" value="<?= htmlspecialchars(date('Y-m-d')); ?>">
                                <input type="hidden" name="denda" value="<?= htmlspecialchars($denda); ?>">
                                <button type="submit" onclick="return confirm('Sudah Dikembalikan?');" name="book_return" class="btn-add-member book-return">Mengembalikan Buku</button>
                            </form>
                        <?php endif; ?>
                        <a href="edit_loan_return.php?id=<?= htmlspecialchars($loan['id_peminjaman']); ?>" class="btn-add-member">Edit</a>
                        <a href="delete_loan_return.php?id=<?= htmlspecialchars($loan['id_peminjaman']); ?>" onclick="return confirm('Yakin Hapus Data?');" class="btn-add-member delete">Hapus</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>