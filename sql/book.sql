CREATE TABLE books (
    id_buku INT PRIMARY KEY AUTO_INCREMENT,
    judul_buku VARCHAR(200) NOT NULL,
    tahun INT not null,
    jumlah_eksemplar INT NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    penerbit VARCHAR(100) NOT NULL,
    no_panggil VARCHAR(20) UNIQUE
) engine = innodb;
