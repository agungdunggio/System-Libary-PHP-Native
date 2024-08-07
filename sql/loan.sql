CREATE TABLE loans (
    id_peminjaman INT PRIMARY KEY AUTO_INCREMENT,
    nik_anggota VARCHAR(20) not null,
    id_buku INT not null,
    tanggal_pinjam DATE not NULL,
    batas_pinjam DATE not NULL,
    FOREIGN KEY (nik_anggota) REFERENCES members(nik),
    FOREIGN KEY (id_buku) REFERENCES books(id_buku)
)engine = innodb;
