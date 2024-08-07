CREATE TABLE members (
    nik VARCHAR(20) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    jenis_kelamin CHAR(1) CHECK (Jenis_Kelamin IN ('L', 'P')) not NULL,
    tanggal_lahir DATE NOT NULL,
    email VARCHAR(100) not NULL,
    no_hp VARCHAR(15) not NULL,
    alamat TEXT not NULL
) engine = innodb;
