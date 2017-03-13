-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Mar 2017 pada 13.38
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shipnet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_adm` varchar(10) NOT NULL,
  `username_adm` varchar(15) NOT NULL,
  `password_adm` text NOT NULL,
  `nama_adm` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `id_skl` varchar(25) NOT NULL,
  `id_al` varchar(25) NOT NULL,
  `username_al` varchar(25) NOT NULL,
  `password_al` text NOT NULL,
  `nama_al` varchar(40) NOT NULL,
  `alamat_al` text NOT NULL,
  `cp_al` varchar(14) NOT NULL,
  `email_al` varchar(25) NOT NULL,
  `alker_al` text NOT NULL,
  `lng_al` varchar(25) NOT NULL,
  `lat_al` varchar(25) NOT NULL,
  `foto_al` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `feed`
--

CREATE TABLE `feed` (
  `id_feed` varchar(25) NOT NULL,
  `id_alumni` varchar(25) NOT NULL,
  `id_sklh` varchar(25) NOT NULL,
  `isi_feed` text NOT NULL,
  `time_feed` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `loker`
--

CREATE TABLE `loker` (
  `id_lok` varchar(25) NOT NULL,
  `id_pengirim_lok` varchar(25) NOT NULL,
  `judul_lok` varchar(50) NOT NULL,
  `isi_lok` text NOT NULL,
  `foto_lok` text NOT NULL,
  `lng_lok` text NOT NULL,
  `lat_lok` text NOT NULL,
  `alamat_lok` text NOT NULL,
  `time_lok` text NOT NULL,
  `verifikasi_lok` varchar(25) NOT NULL,
  `verifikasi_by_lok` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_per` varchar(15) NOT NULL,
  `nama_per` varchar(50) NOT NULL,
  `username_per` varchar(15) NOT NULL,
  `password_per` text NOT NULL,
  `cp_per` varchar(14) NOT NULL,
  `email_per` varchar(50) NOT NULL,
  `fax_per` varchar(50) NOT NULL,
  `web_per` varchar(80) NOT NULL,
  `logo_per` text NOT NULL,
  `add_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sklh` varchar(25) NOT NULL,
  `nama_sklh` varchar(40) NOT NULL,
  `username_sklh` varchar(40) NOT NULL,
  `password_sklh` tinytext NOT NULL,
  `alamat_sklh` text NOT NULL,
  `cp_sklh` varchar(14) NOT NULL,
  `email_sklh` varchar(25) NOT NULL,
  `fax_sklh` varchar(30) NOT NULL,
  `web_sklh` varchar(30) NOT NULL,
  `level_sklh` enum('kuliah','sma','smk') NOT NULL,
  `logo_sklh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`),
  ADD UNIQUE KEY `username_adm` (`username_adm`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_al`),
  ADD UNIQUE KEY `username_al` (`username_al`);

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`id_feed`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id_lok`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_per`),
  ADD UNIQUE KEY `username_per` (`username_per`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sklh`),
  ADD UNIQUE KEY `username_sklh` (`username_sklh`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
