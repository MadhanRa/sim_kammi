-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2022 pada 16.05
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_kammi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_admin`
--

CREATE TABLE `data_admin` (
  `id_admin` char(6) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_agenda`
--

CREATE TABLE `data_agenda` (
  `id_agenda` int(11) NOT NULL,
  `id_petugas` char(6) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `pelaksanaan` enum('Sehari','Lebih dari sehari') NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_petugas`
--

CREATE TABLE `data_petugas` (
  `id_petugas` char(6) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `username_petugas` varchar(50) NOT NULL,
  `password_petugas` varchar(50) NOT NULL,
  `id_admin` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_publikasi`
--

CREATE TABLE `data_publikasi` (
  `id_publikasi` char(6) NOT NULL,
  `id_petugas` char(6) NOT NULL,
  `judul_publikasi` varchar(50) NOT NULL,
  `nama_penulis` varchar(50) NOT NULL,
  `isi_publikasi` text NOT NULL,
  `id_kategori` char(10) NOT NULL,
  `tgl_unggah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id_user` char(6) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` char(20) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `data_agenda`
--
ALTER TABLE `data_agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `data_petugas`
--
ALTER TABLE `data_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `data_publikasi`
--
ALTER TABLE `data_publikasi`
  ADD PRIMARY KEY (`id_publikasi`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_agenda`
--
ALTER TABLE `data_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_agenda`
--
ALTER TABLE `data_agenda`
  ADD CONSTRAINT `data_agenda_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `data_petugas` (`id_petugas`);

--
-- Ketidakleluasaan untuk tabel `data_petugas`
--
ALTER TABLE `data_petugas`
  ADD CONSTRAINT `data_petugas_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `data_admin` (`id_admin`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_publikasi`
--
ALTER TABLE `data_publikasi`
  ADD CONSTRAINT `data_publikasi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `data_publikasi_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `data_petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
