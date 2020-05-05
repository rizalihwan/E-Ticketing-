-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Apr 2020 pada 12.33
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ticket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_boking`
--

CREATE TABLE `tb_boking` (
  `id_boking` int(50) NOT NULL,
  `nama_pelanggan` varchar(150) DEFAULT NULL,
  `kota_asal` varchar(50) DEFAULT NULL,
  `kota_tujuan` varchar(50) DEFAULT NULL,
  `penumpang` int(20) DEFAULT NULL,
  `harga_tiket` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_boking`
--

INSERT INTO `tb_boking` (`id_boking`, `nama_pelanggan`, `kota_asal`, `kota_tujuan`, `penumpang`, `harga_tiket`) VALUES
(14, 'Bot User', 'Jakarta', 'Bogor', 2, 40000),
(15, 'Saefulloh Akbar Maulana', 'Bogor', 'Depok', 2000, 400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `tanggal_berangkat` date DEFAULT NULL,
  `id_kendaraan` varchar(15) DEFAULT NULL,
  `id_sopir` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id`, `id_pelanggan`, `tanggal_berangkat`, `id_kendaraan`, `id_sopir`) VALUES
(13, 'Bot User', '2020-03-25', 'Bus Safari', 'Zhalun Namina'),
(15, 'Saefulloh Akbar Maulana', '2020-03-13', 'Bus Lenorderi', 'Fatir ilmal sueb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` varchar(11) NOT NULL,
  `nama_kendaraan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `nama_kendaraan`) VALUES
('K001', 'Bus Safari'),
('K002', 'Bus Leonardi '),
('K003', 'Bus Lorena'),
('K004', 'Bus Pelabuhan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama`, `username`, `password`) VALUES
(1, 'Rizal ihwan', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sopir`
--

CREATE TABLE `tb_sopir` (
  `id_sopir` varchar(30) NOT NULL,
  `nama_sopir` varchar(50) DEFAULT NULL,
  `umur` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sopir`
--

INSERT INTO `tb_sopir` (`id_sopir`, `nama_sopir`, `umur`) VALUES
('S001', 'Rizal ihwan ', '16'),
('S002', 'Fatir ilmal sueb', '13'),
('S003', 'Zhalun Namina ', '22'),
('S004', 'Erlan Pratama Surya', '29'),
('S005', 'Muhammad Jumroni', '21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(15) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama`, `alamat`, `no_telp`, `username`, `password`) VALUES
(2, 'Bot User', 'kp tenggek desa cimande hilir, kec caringin, kab bogor rt 01/ rw 04', '0857702454568', 'user', 'user123'),
(5, 'Saefulloh Akbar Maulana', 'Kp Baru kota Bogor', '087762625551', 'aku', 'kamu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_boking`
--
ALTER TABLE `tb_boking`
  ADD PRIMARY KEY (`id_boking`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tb_sopir`
--
ALTER TABLE `tb_sopir`
  ADD PRIMARY KEY (`id_sopir`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_boking`
--
ALTER TABLE `tb_boking`
  MODIFY `id_boking` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
