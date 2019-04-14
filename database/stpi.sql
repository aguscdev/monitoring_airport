-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Apr 2019 pada 16.34
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stpi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `amc`
--

CREATE TABLE `amc` (
  `amc_id` int(11) NOT NULL,
  `amc_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `amc`
--

INSERT INTO `amc` (`amc_id`, `amc_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'sepatu', '2019-04-05 07:20:18', '2019-04-05 07:20:18', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bangland`
--

CREATE TABLE `bangland` (
  `bangland_id` int(11) NOT NULL,
  `bangland_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `bangland`
--

INSERT INTO `bangland` (`bangland_id`, `bangland_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'kursi', '2019-04-05 07:19:57', '2019-04-05 07:19:57', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `elband`
--

CREATE TABLE `elband` (
  `elband_id` int(11) NOT NULL,
  `elband_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `elband`
--

INSERT INTO `elband` (`elband_id`, `elband_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'kunci', '2019-04-05 06:41:35', '2019-04-05 15:15:37', 1, 2, 1),
(2, 'meja', '2019-04-05 15:42:33', '2019-04-05 15:42:33', 2, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `listrik`
--

CREATE TABLE `listrik` (
  `listrik_id` int(11) NOT NULL,
  `listrik_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `listrik`
--

INSERT INTO `listrik` (`listrik_id`, `listrik_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'kabel', '2019-04-05 06:41:46', '2019-04-05 06:41:46', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring`
--

CREATE TABLE `monitoring` (
  `monitoring_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mon_amc`
--

CREATE TABLE `mon_amc` (
  `amc_id` int(11) NOT NULL,
  `amc_personil` int(5) NOT NULL,
  `amc_status` varchar(20) NOT NULL,
  `monitoring_id` varchar(20) NOT NULL,
  `amc_keterangan` varchar(55) NOT NULL,
  `teknisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mon_bangland`
--

CREATE TABLE `mon_bangland` (
  `bangland_id` int(11) NOT NULL,
  `monitoring_id` int(5) NOT NULL,
  `bangland_personil` int(10) NOT NULL,
  `bangland_status` varchar(20) NOT NULL,
  `bangland_keterangan` varchar(55) NOT NULL,
  `teknisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mon_elband`
--

CREATE TABLE `mon_elband` (
  `monitoring_id` int(5) NOT NULL,
  `elband_id` int(11) NOT NULL,
  `elband_personil` int(20) NOT NULL,
  `elband_status` varchar(20) NOT NULL,
  `elband_keterangan` varchar(55) NOT NULL,
  `teknisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mon_listrik`
--

CREATE TABLE `mon_listrik` (
  `listrik_id` int(11) NOT NULL,
  `monitoring_id` int(5) NOT NULL,
  `listrik_personil` int(10) NOT NULL,
  `listrik_status` varchar(20) NOT NULL,
  `listrik_keterangan` varchar(55) NOT NULL,
  `teknisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mon_pkppk`
--

CREATE TABLE `mon_pkppk` (
  `pkppk_id` int(11) NOT NULL,
  `monitoring_id` int(5) NOT NULL,
  `pkppk_personil` int(11) NOT NULL,
  `pkppk_status` varchar(20) NOT NULL,
  `pkppk_keterangan` varchar(55) NOT NULL,
  `teknisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pkppk`
--

CREATE TABLE `pkppk` (
  `pkppk_id` int(11) NOT NULL,
  `pkppk_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pkppk`
--

INSERT INTO `pkppk` (`pkppk_id`, `pkppk_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'motor', '2019-04-05 07:20:09', '2019-04-05 07:20:09', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknisi`
--

CREATE TABLE `teknisi` (
  `teknisi_id` int(11) NOT NULL,
  `teknisi_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `teknisi`
--

INSERT INTO `teknisi` (`teknisi_id`, `teknisi_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'Agus', '2019-04-05 06:44:05', '2019-04-05 06:44:05', 1, 1, 1),
(2, 'ekoAs', '2019-04-05 06:44:14', '2019-04-06 17:00:13', 1, 2, 0),
(3, 'Idham', '2019-04-05 06:44:22', '2019-04-05 06:44:22', 1, 1, 1),
(4, 'Tiar', '2019-04-06 16:59:58', '2019-04-06 17:00:08', 2, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `level`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'agus ', 'agus ', '827ccb0eea8a706c4c34a16891f84e7b', 'ADMIN', '2019-03-31 00:00:00', '2019-03-31 00:00:00', 1, 1, 1),
(2, 'ekoaulian', 'ekoaulian', '44edb474cee3520fae0b03556e796a3f', 'ADMIN', '2019-04-05 00:00:00', '2019-04-05 00:00:00', 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `amc`
--
ALTER TABLE `amc`
  ADD PRIMARY KEY (`amc_id`);

--
-- Indeks untuk tabel `bangland`
--
ALTER TABLE `bangland`
  ADD PRIMARY KEY (`bangland_id`);

--
-- Indeks untuk tabel `elband`
--
ALTER TABLE `elband`
  ADD PRIMARY KEY (`elband_id`);

--
-- Indeks untuk tabel `listrik`
--
ALTER TABLE `listrik`
  ADD PRIMARY KEY (`listrik_id`);

--
-- Indeks untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`monitoring_id`);

--
-- Indeks untuk tabel `mon_amc`
--
ALTER TABLE `mon_amc`
  ADD PRIMARY KEY (`amc_id`,`amc_personil`);

--
-- Indeks untuk tabel `mon_bangland`
--
ALTER TABLE `mon_bangland`
  ADD PRIMARY KEY (`bangland_id`,`monitoring_id`);

--
-- Indeks untuk tabel `mon_elband`
--
ALTER TABLE `mon_elband`
  ADD PRIMARY KEY (`monitoring_id`,`elband_id`);

--
-- Indeks untuk tabel `mon_listrik`
--
ALTER TABLE `mon_listrik`
  ADD PRIMARY KEY (`listrik_id`,`monitoring_id`);

--
-- Indeks untuk tabel `mon_pkppk`
--
ALTER TABLE `mon_pkppk`
  ADD PRIMARY KEY (`pkppk_id`,`monitoring_id`);

--
-- Indeks untuk tabel `pkppk`
--
ALTER TABLE `pkppk`
  ADD PRIMARY KEY (`pkppk_id`);

--
-- Indeks untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`teknisi_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
