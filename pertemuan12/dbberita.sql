CREATE TABLE tblkategori (
    idKategori INT(50) NOT NULL,
    nama_Kategori VARCHAR(50) NOT NULL,
    PRIMARY KEY (idKategori)
);
CREATE TABLE tblberita (
    idBerita INT(50) NOT NULL,
    idKategori INT(50) NOT NULL,
    judulberita VARCHAR(100) NOT NULL,
    isiberita TEXT NOT NULL,
    penulis VARCHAR(50) NOT NULL,
    tgldipublish DATE NOT NULL,
    PRIMARY KEY (idBerita),
    FOREIGN KEY (idKategori) REFERENCES tblKategori(idKategori)
);
