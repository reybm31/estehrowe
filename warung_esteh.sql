-- sql_script.sql
CREATE DATABASE warung_esteh;

USE warung_esteh;

CREATE TABLE pesanan (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama_pemesan VARCHAR(100),
    nomor_hp VARCHAR(15),
    alamat VARCHAR(255),
    jenis_minuman VARCHAR(50),
    jumlah INT(11),
    total_harga DECIMAL(10,2),
    tanggal_pesanan TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);