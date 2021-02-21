-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2021 pada 01.09
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spkrs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumahsakit`
--

CREATE TABLE `rumahsakit` (
  `id` int(11) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `jarak` double NOT NULL,
  `biaya_normal` bigint(20) NOT NULL,
  `biaya_normal2` bigint(20) NOT NULL,
  `biaya_caesar` bigint(20) NOT NULL,
  `biaya_caesar2` bigint(20) NOT NULL,
  `pelayanan` int(11) NOT NULL,
  `fasilitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rumahsakit`
--

INSERT INTO `rumahsakit` (`id`, `nama`, `jarak`, `biaya_normal`, `biaya_normal2`, `biaya_caesar`, `biaya_caesar2`, `pelayanan`, `fasilitas`) VALUES
(1, 'RSIA Tambak', 5, 8700000, 17900000, 17000000, 35000000, 6, 9),
(2, 'RSIA Bunda Jakarta', 1.9, 14609450, 36406230, 29822570, 61203870, 7, 12),
(3, 'RSIA YPK MANDIRI', 0.7, 12750000, 24800000, 12750000, 45000000, 3, 11),
(4, 'BUDI KEMULIAN', 2.4, 4636000, 12832000, 6622000, 22922000, 3, 6),
(5, 'RS Awal Bros Evasari', 4, 6437000, 17910000, 12039105, 31851760, 10, 6),
(6, 'RS Islam Jakarta', 8.3, 3500000, 11500000, 14500000, 25500000, 11, 4),
(7, 'Rs St.Carolus', 3.7, 3000000, 12000000, 15000000, 28000000, 9, 4),
(8, 'RSPAD Gatot Subroto', 2.6, 7000000, 12000000, 13000000, 21000000, 12, 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rumahsakit`
--
ALTER TABLE `rumahsakit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rumahsakit`
--
ALTER TABLE `rumahsakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
