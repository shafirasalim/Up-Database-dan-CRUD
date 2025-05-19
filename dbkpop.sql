CREATE DATABASE dbkpop;
use dbkpop;

CREATE TABLE concerts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    lokasi VARCHAR(100) NOT NULL,
    tanggal DATE NOT NULL
);

INSERT INTO concerts (nama, lokasi, tanggal) VALUES
('IZ*ONE Concert', 'Jakarta', '2021-03-13'),
('SEVENTEEN World Tour', 'Jakarta', '2023-10-08'),
('IVE Showcase', 'Surabaya', '2023-06-15'),
('NMIXX Debut Showcase', 'Bandung', '2022-12-01'),
('EXO Planet #5', 'Yogyakarta', '2019-09-20'),
('Red Velvet 4th Concert', 'Bali', '2023-11-25');
