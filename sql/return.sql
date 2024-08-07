CREATE TABLE returns (
    id_pengembalian INT PRIMARY KEY AUTO_INCREMENT,
    id_peminjaman INT unique not null,
    tanggal_kembali DATE,
    denda INT DEFAULT 0,
    FOREIGN KEY (id_peminjaman) REFERENCES loans(id_peminjaman)
)engine = innodb;
