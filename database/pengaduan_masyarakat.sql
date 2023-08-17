-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Agu 2023 pada 13.46
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kd_wilayah`
--

CREATE TABLE `kd_wilayah` (
  `id` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kd_wilayah`
--

INSERT INTO `kd_wilayah` (`id`, `nama`) VALUES
(12, 'KD Wilayah 1'),
(13, 'KD Wilayah 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nma_kota`
--

CREATE TABLE `nma_kota` (
  `id` int(5) NOT NULL,
  `kota` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nma_kota`
--

INSERT INTO `nma_kota` (`id`, `kota`) VALUES
(1, 'KAmbon'),
(2, 'Balikpapan'),
(3, 'Bandung'),
(4, 'Bekasi'),
(5, 'Bandar Lam'),
(6, 'Banda Aceh'),
(7, 'Banjar'),
(8, 'Banjarbaru'),
(9, 'Banjarmasi'),
(10, 'Batam'),
(11, 'Batu'),
(12, 'Baubau'),
(13, 'Bengkulu'),
(14, 'Bima'),
(15, 'Bima'),
(16, 'Binjai'),
(17, 'Bitung'),
(18, 'Blitar'),
(19, 'Bogor'),
(20, 'Bontang'),
(21, 'Bukittingg'),
(22, 'Cilegon'),
(23, 'Cimahi'),
(24, 'Cirebon'),
(25, 'Denpasar'),
(26, 'Depok'),
(27, 'Dumai'),
(28, 'Gorontalo'),
(29, 'Gunugsitol'),
(30, 'Jakarta'),
(31, 'Jambi'),
(32, 'Jayapura'),
(33, 'Kediri'),
(34, 'Kendari'),
(35, 'Kotamobagu'),
(37, 'Kupang'),
(38, 'Langsa'),
(39, 'Lhokseumaw'),
(40, 'Lubuklingg'),
(41, 'Madiun'),
(42, 'Magelang'),
(43, 'Makassar'),
(44, 'Malang'),
(45, 'Manado'),
(46, 'Mataram'),
(47, 'Medan'),
(48, 'Metro'),
(49, 'Mojokerto'),
(50, 'Padang'),
(51, 'Padang Pan'),
(52, 'Padang Sid'),
(53, 'Pagar Alam'),
(54, 'Palangkara'),
(55, 'Palembang'),
(56, 'Palopo'),
(57, 'Palu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(5) NOT NULL,
  `pndkn` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `pndkn`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA'),
(4, 'Diploma'),
(5, 'Sederajat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pkrjaan`
--

CREATE TABLE `pkrjaan` (
  `id` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pkrjaan`
--

INSERT INTO `pkrjaan` (`id`, `nama`) VALUES
(1, 'PNS'),
(2, 'Wirausaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi`
--

CREATE TABLE `registrasi` (
  `id_registrasi` int(5) NOT NULL,
  `kd_wilayah` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `no_ketua` int(30) NOT NULL,
  `nama_ketua` varchar(40) NOT NULL,
  `no_anggota` varchar(35) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `kota_lahir` varchar(20) NOT NULL,
  `nama_kota` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `status_nikah` varchar(20) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `tanggal_aktif` date NOT NULL,
  `tanggal_non` date NOT NULL,
  `status` enum('STS1 (Aktif)','STS2 (Non Aktif)','STS3 (Mengundurkan Diri)') NOT NULL,
  `nama_keluarga` varchar(25) NOT NULL,
  `hubungan` varchar(25) NOT NULL,
  `alamat_keluarga` varchar(100) NOT NULL,
  `tlp_keluarga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `registrasi`
--

INSERT INTO `registrasi` (`id_registrasi`, `kd_wilayah`, `nama`, `no_ketua`, `nama_ketua`, `no_anggota`, `nama_anggota`, `nik`, `tgl_lhr`, `kota_lahir`, `nama_kota`, `jenis_kelamin`, `pendidikan`, `pekerjaan`, `status_nikah`, `no_ktp`, `alamat`, `tlp`, `tanggal_aktif`, `tanggal_non`, `status`, `nama_keluarga`, `hubungan`, `alamat_keluarga`, `tlp_keluarga`) VALUES
(20, '12', 'Budi', 45, 'Faris', '55', 'Toni', '137601231001115577', '1885-02-01', 'Jakarta', 'Jakarta Tim', 'Laki-Laki', 'SMP', 'PNS', 'Menikah', '123494534533984', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319', '2023-08-01', '2024-08-01', 'STS3 (Mengundurkan Diri)', 'Gustian', 'Saudara Kandung', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319'),
(26, '234', 'Dani', 15, 'Agung Sulaksono', '100', 'Renaldi', '13760125499820001', '2000-02-01', 'Bekasi', 'Bekasi Kota', 'Laki-Laki', 'SMA', 'PNS', 'Menikah', '12345678910', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319', '2023-08-01', '2024-08-01', 'STS2 (Non Aktif)', 'Gustian', 'Saudara Kandung', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319'),
(27, '12', 'Adrian', 45, 'Toni Sucipto', '55', 'Renaldi De Pamungkas', '1376012310010001289', '1991-02-01', 'Bekasi', 'Bekasi Timur', 'Laki-Laki', 'Sederajat', 'Wirausaha', 'Menikah', '12345678910', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319', '2023-08-01', '2024-08-01', 'STS1 (Aktif)', 'Andika', 'Saudara Kandung', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sts`
--

CREATE TABLE `sts` (
  `id` int(5) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sts`
--

INSERT INTO `sts` (`id`, `status`) VALUES
(1, 'STS1 (Aktif)'),
(2, 'STS2 (Non Aktif)');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `nma_kota`
--
ALTER TABLE `nma_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `pkrjaan`
--
ALTER TABLE `pkrjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id_registrasi`);

--
-- Indeks untuk tabel `sts`
--
ALTER TABLE `sts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nma_kota`
--
ALTER TABLE `nma_kota`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pkrjaan`
--
ALTER TABLE `pkrjaan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_registrasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `sts`
--
ALTER TABLE `sts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
