<section class="section-member">

    <header>
        <h1>Data Transaksi</h1>
    </header>
    
    <a href="#add_transaction" class="btn-add-member">Tambah Transaksi</a>
    
    <table class="member-table">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <!-- Contoh baris data transaksi -->
        <tr>
            <td>1</td>
            <td>TXN001</td>
            <td>Jane Doe</td>
            <td>Belajar HTML</td>
            <td>01-08-2024</td>
            <td>15-08-2024</td>
            <td>Dipinjam</td>
            <td>
                <a href="edit_transaction.php?id=TXN001" class="btn-add-member">Edit</a>
                <a href="delete_transaction.php?id=TXN001" class="btn-add-member" style="background-color: #dc3545;">Hapus</a>
            </td>
        </tr>
        <!-- Baris data lainnya -->
    </tbody>
</table>
</section>
