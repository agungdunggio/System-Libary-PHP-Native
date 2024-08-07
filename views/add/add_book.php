<section class="section-form">
    <header>
        <h1>Tambah Buku</h1>
    </header>
    
    <form id="add-book-form" action="add_book.php" method="post">
        <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" id="judul" name="judul" required>
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
            <input type="number" id="tahun_terbit" name="tahun_terbit" required>
        </div>
        <div class="form-group">
            <label for="jumlah_hal">Jumlah Eksemplar</label>
            <input type="number" id="jumlah_hal" name="jumlah_hal" required>
        </div>
        <div class="form-group">
            <label for="no_panggil">No Panggil</label>
            <input type="text" id="no_panggil" name="no_panggil" required>
        </div>
        <button type="submit" class="btn-add-member">Simpan</button>
    </form>
    <div id="response-message"></div>
</section>
