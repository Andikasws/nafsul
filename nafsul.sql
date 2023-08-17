-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Agu 2023 pada 15.35
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
-- Database: `nafsul`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kd_wilayah`
--

CREATE TABLE `kd_wilayah` (
  `id` int(10) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kd_wilayah`
--

INSERT INTO `kd_wilayah` (`id`, `kode`, `nama`) VALUES
(1, '001', ' Lain-Lain'),
(2, '101', ' Jakarta Pusat'),
(3, '102', ' Jakarta Utara'),
(4, '103', ' Jakarta Selatan'),
(5, '104', ' Jakarta Timur'),
(6, '105', ' Jakarta Barat'),
(7, '201', ' Bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketua`
--

CREATE TABLE `ketua` (
  `id` int(10) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ketua`
--

INSERT INTO `ketua` (`id`, `kode`, `nama`) VALUES
(1, 'KKL1208001', ' Pribadi'),
(2, 'KKL1411001', ' Suhama Sediana'),
(3, 'KKL1411002', ' Rumiyti'),
(4, 'KKL1411003', ' Witrati'),
(5, 'KKL1411004', ' Martinah'),
(6, 'KKL1412001', ' Syahreni Pasaribu'),
(7, 'KKL1501002', ' Siswadi. S.Ag'),
(8, 'KKL1501003', ' Hj.Rosni. D. Nazar.'),
(9, 'KKL1503001', ' Agung Budiyono'),
(10, 'KKL156001', ' Ustd. Sihabuddin Umar SE MM '),
(11, 'KKL1506002', ' Nurulhuda Tuib'),
(12, 'KKL1506003', ' Muslim'),
(13, 'KKL1510001', ' Sulantrah'),
(14, 'KKL1601001', ' Eli Murtini'),
(15, 'KKL1601002', ' Hj.Saodah'),
(16, 'KKL1602001', ' Siti Lestari'),
(17, 'KKL1603001', ' Ustd. Darmawan'),
(18, 'KKL1604001', ' Nurmantias'),
(19, 'KKL1605001', ' Sukmana Ditawidjaja'),
(20, 'KKL1607001', ' Moh. Sukito'),
(21, 'KKL1607001', ' Moh. Sukito'),
(22, 'KKL1612001', ' Siti Jawahirah / Bahar'),
(23, 'KKL1704001', ' Isani Mulyawati, AMK'),
(24, 'KKL1708001', ' Rusmanto'),
(25, 'KKL1708002', ' H. Achidat Adi Sobari. SE '),
(26, 'KKL1709001', ' Wahyudin'),
(27, 'KKL1712001', ' Cicih Setiasih Edi Hj'),
(28, 'KKL1802001', ' Sultoni'),
(29, 'KKL03001', ' Nurul'),
(30, 'KKL1804001', ' Djuwaryo / Mulyati'),
(31, 'KKL1804002', ' Gusweldi'),
(32, 'KKL1805001', ' Trikat Handoko'),
(33, 'KKL1806001', ' Haryono'),
(34, 'KKL1805001', ' Trikat Handoko'),
(35, 'KKL1806001', ' Haryono'),
(36, 'KKL1901001', ' Rusdiono'),
(47, 'KKL1903001', ' Vivi Violita / Retno'),
(48, 'KKL2001001', ' Achmad Zani Agusfarr'),
(49, 'KKL2002001', 'Hanifie'),
(50, 'KKL2004001', 'Drs. H. Jasin Ishak'),
(51, 'KKL2112001', ' Nurul Novina Zaman / Evi'),
(52, 'KKL2201001', ' Sutarsono'),
(53, 'KKL2201002', ' Purwaningsih '),
(54, 'KKL2202001', ' Hasan'),
(55, 'KKL2210001', ' Paidjo'),
(56, 'KKL2308001', ' Beh Riwayati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nma_kota`
--

CREATE TABLE `nma_kota` (
  `id` int(5) NOT NULL,
  `kota` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nma_kota`
--

INSERT INTO `nma_kota` (`id`, `kota`) VALUES
(1, 'Aceh'),
(2, 'Bali'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tenggah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Timur'),
(14, 'Kalimantan Selatan'),
(15, 'Kalimantan Tengah'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Bangka Belitung'),
(18, 'Kepulauan Riau'),
(19, 'Lampung'),
(20, 'Maluku'),
(21, 'Maluku Utara'),
(22, 'Nusa Tenggara Barat'),
(23, 'Nusa Tenggara Timur'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Utara');

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
(1, 'admin', 'admin123');

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
  `nonma_ketua` varchar(30) NOT NULL,
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
  `jmlh_iuran` varchar(100) NOT NULL,
  `p_anggota` int(10) NOT NULL,
  `kunjungan` enum('L','B') NOT NULL,
  `nama_keluarga` varchar(25) NOT NULL,
  `hubungan` varchar(25) NOT NULL,
  `alamat_keluarga` varchar(100) NOT NULL,
  `tlp_keluarga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `registrasi`
--

INSERT INTO `registrasi` (`id_registrasi`, `kd_wilayah`, `nonma_ketua`, `no_anggota`, `nama_anggota`, `nik`, `tgl_lhr`, `kota_lahir`, `nama_kota`, `jenis_kelamin`, `pendidikan`, `pekerjaan`, `status_nikah`, `no_ktp`, `alamat`, `tlp`, `tanggal_aktif`, `tanggal_non`, `status`, `jmlh_iuran`, `p_anggota`, `kunjungan`, `nama_keluarga`, `hubungan`, `alamat_keluarga`, `tlp_keluarga`) VALUES
(20, '12', '45', '55', 'Toni', '137601231001115577', '1885-02-01', 'Jakarta', 'Jakarta Tim', 'Laki-Laki', 'SMP', 'PNS', 'Menikah', '123494534533984', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319', '2023-08-01', '2024-08-01', 'STS1 (Aktif)', '16500000', 0, 'B', 'Gustian', 'Saudara Kandung', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319'),
(26, '234', '15', '100', 'Renaldi', '13760125499820001', '2000-02-01', 'Bekasi', 'Bekasi Kota', 'Laki-Laki', 'SMA', 'PNS', 'Menikah', '12345678910', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319', '2023-08-01', '2024-08-01', 'STS2 (Non Aktif)', '500000', 0, 'L', 'Gustian', 'Saudara Kandung', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319'),
(27, '12', '45', '55', 'Renaldi De Pamungkas', '1376012310010001289', '1991-02-01', 'Bekasi', 'Bekasi Timur', 'Laki-Laki', 'Sederajat', 'Wirausaha', 'Menikah', '12345678910', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319', '2023-08-01', '2024-08-01', 'STS1 (Aktif)', '760000', 7, 'L', 'Andika', 'Saudara Kandung', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319'),
(28, '12', '156', '21', 'Toro', '137601231001000222', '2001-01-08', 'Bekasi', 'Bekasi Kota', 'Laki-Laki', 'SD', 'PNS', 'Menikah', '12344567', 'Kp.Srengseng Rt.001/Rw.003 Desa sukamaju Kecamatan sukatani Kabupaten Bekasi 17631', '081965040801', '2023-08-08', '2024-08-08', 'STS1 (Aktif)', '560000', 0, 'L', 'Anton', 'Saudara Kandung', 'Kp.Srengseng Rt.001/Rw.003 Desa sukamaju Kecamatan sukatani Kabupaten Bekasi 17631', '036464464'),
(41, ' Jakarta Pusat', ' Martinah', '2', 'Tono', '13760123100100015', '1991-02-01', 'Bali', 'Kota Bekasi', 'Laki-Laki', 'SD', 'PNS', 'Menikah', '1234', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319', '2023-08-09', '2024-08-09', 'STS1 (Aktif)', '160000', 7, 'B', 'Gustian', 'Saudara Kandung', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319'),
(149, ' Jakarta Pusat', ' Pribadi', '12', 'Andika', '13760123100100045', '2001-08-04', 'Jawa Barat', 'Cimahi', 'Laki-Laki', 'SMA', 'PNS', 'Menikah', '12345678910', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319', '2023-08-15', '2001-08-15', 'STS1 (Aktif)', '5000000', 7, 'B', 'Bagus', 'Saudara Kandung', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319'),
(151, ' Lain-Lain', ' Martinah', '55', 'Agustiano', '13760123100100022', '2002-08-04', 'Bali', 'Kuta Bali', 'Laki-Laki', 'Diploma', 'PNS', 'Menikah', '1234543534643', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319', '2023-08-15', '2024-08-15', 'STS1 (Aktif)', '2000000', 7, 'L', 'Bagus', 'Saudara Kandung', 'BINTARA JAYA PERMAI A 59, RT/RW 001/011, Kel/Desa BINTARA JAYA, Kecamatan BEKASI BARAT', '085290047319'),
(160, '--Pilih--', '--Pilih--', '', '', '', '0000-00-00', '--Pilih--', '', '--Pilih--', '--Pilih--', '--Pilih--', '--Pilih--', '', '', '', '2023-08-16', '0000-00-00', '', '120000', 7, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kd_wilayah`
--
ALTER TABLE `kd_wilayah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ketua`
--
ALTER TABLE `ketua`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kd_wilayah`
--
ALTER TABLE `kd_wilayah`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ketua`
--
ALTER TABLE `ketua`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
  MODIFY `id_registrasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
