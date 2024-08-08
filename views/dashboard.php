<?php
require '../func/cnt_loans_returns.php'; // Memuat fungsi untuk query database
session_start();

// Query data dari database
$totalUsersQuery = "SELECT COUNT(*) AS total FROM members";
$totalUsersResult = mysqli_query($conn, $totalUsersQuery);
$totalUsers = mysqli_fetch_assoc($totalUsersResult)['total'];

$totalBooksQuery = "SELECT COUNT(*) AS total FROM books";
$totalBooksResult = mysqli_query($conn, $totalBooksQuery);
$totalBooks = mysqli_fetch_assoc($totalBooksResult)['total'];

$totalLoansQuery = "SELECT COUNT(*) AS total FROM loans";
$totalLoansResult = mysqli_query($conn, $totalLoansQuery);
$totalLoans = mysqli_fetch_assoc($totalLoansResult)['total'];

$totalReturnsQuery = "SELECT COUNT(*) AS total FROM returns WHERE tanggal_kembali IS NOT NULL";
$totalReturnsResult = mysqli_query($conn, $totalReturnsQuery);
$totalReturns = mysqli_fetch_assoc($totalReturnsResult)['total'];

// Get overdue books
$overdueBooksQuery = "
    SELECT m.nama AS member_name, b.judul_buku AS book_title, l.batas_pinjam AS due_date
    FROM loans AS l
    JOIN members AS m ON l.nik_anggota = m.nik
    JOIN books AS b ON l.id_buku = b.id_buku
    LEFT JOIN returns AS r ON l.id_peminjaman = r.id_peminjaman
    WHERE r.tanggal_kembali IS NULL 
      AND CURDATE() > l.batas_pinjam
";

$overdueBooksResult = mysqli_query($conn, $overdueBooksQuery);
?>


<header>
    <h1>Dashboard</h1>
</header>
<section class="overview">
    <div class="card">
        <h3>Total Pengguna</h3>
        <p><?= htmlspecialchars($totalUsers); ?></p>
    </div>
    <div class="card">
        <h3>Total Buku</h3>
        <p><?= htmlspecialchars($totalBooks); ?></p>
    </div>
    <div class="card">
        <h3>Peminjam Buku</h3>
        <p><?= htmlspecialchars($totalLoans); ?></p>
    </div>
    <div class="card">
        <h3>Buku Dikembalikan</h3>
        <p><?= htmlspecialchars($totalReturns); ?></p>
    </div>
</section>
<section class="recent-activities">
    <h2>Buku Terlambat</h2>
    <table id="overdue-books-table">
        <thead>
            <tr>
                <th class="sortable" data-sort="member_name">Pengguna</th>
                <th class="sortable" data-sort="book_title">Buku</th>
                <th class="sortable" data-sort="due_date">Batas Pinjam</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($overdueBook = mysqli_fetch_assoc($overdueBooksResult)) : ?>
                <tr>
                    <td><?= htmlspecialchars($overdueBook['member_name']); ?></td>
                    <td><?= htmlspecialchars($overdueBook['book_title']); ?></td>
                    <td><?= date('d F Y', strtotime($overdueBook['due_date'])); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const table = document.getElementById('overdue-books-table');
    const headers = table.querySelectorAll('th.sortable');

    headers.forEach(header => {
        header.addEventListener('click', () => {
            const index = Array.from(header.parentNode.children).indexOf(header);
            const rows = Array.from(table.querySelectorAll('tbody tr'));
            const isAscending = header.classList.contains('sorted-asc');
            
            rows.sort((rowA, rowB) => {
                const cellA = rowA.children[index].innerText.trim();
                const cellB = rowB.children[index].innerText.trim();

                if (header.dataset.sort === 'due_date') {
                    const dateA = new Date(cellA);
                    const dateB = new Date(cellB);
                    return isAscending ? dateA - dateB : dateB - dateA;
                } else {
                    return isAscending ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
                }
            });

            rows.forEach(row => table.querySelector('tbody').appendChild(row));

            headers.forEach(th => th.classList.remove('sorted-asc', 'sorted-desc'));
            header.classList.toggle('sorted-asc', !isAscending);
            header.classList.toggle('sorted-desc', isAscending);
        });
    });
});

</script>