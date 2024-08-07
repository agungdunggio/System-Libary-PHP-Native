<!-- views/add_member_form.php -->
<section class="section-form">
    <header>
        <h1>Tambah Anggota</h1>
    </header>
    
    <form id="add-member-form" action="add_member.php" method="post">
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
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
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
        <button type="submit" class="btn-add-member">Simpan</button>
    </form>
    <div id="response-message"></div>
</section>
