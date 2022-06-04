-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2022 pada 10.28
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal_mapel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_pengajar`
--

CREATE TABLE `guru_pengajar` (
  `IDGURU` varchar(15) NOT NULL,
  `NAMAGURU` varchar(25) NOT NULL,
  `GELARDEPAN` varchar(15) DEFAULT NULL,
  `GELARBELAKANG` varchar(15) DEFAULT NULL,
  `JKGURU` char(1) DEFAULT NULL,
  `AGAMAGURU` varchar(10) DEFAULT NULL,
  `ALAMATGURU` varchar(100) DEFAULT NULL,
  `KOTA_LAHIR` varchar(20) DEFAULT NULL,
  `TGLLAHIRGURU` date DEFAULT NULL,
  `NOHPGURU` varchar(20) DEFAULT NULL,
  `NOWAGURU` varchar(20) DEFAULT NULL,
  `IDTELEGRAMGURU` varchar(20) DEFAULT NULL,
  `IDLINEGURU` varchar(20) DEFAULT NULL,
  `IDFACEBOOKGURU` varchar(20) DEFAULT NULL,
  `IDINSTAGRAMGURU` varchar(20) DEFAULT NULL,
  `IDTWITTERGURU` varchar(20) DEFAULT NULL,
  `IDYOUTUBEGURU` varchar(20) DEFAULT NULL,
  `EMAILGURU` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru_pengajar`
--

INSERT INTO `guru_pengajar` (`IDGURU`, `NAMAGURU`, `GELARDEPAN`, `GELARBELAKANG`, `JKGURU`, `AGAMAGURU`, `ALAMATGURU`, `KOTA_LAHIR`, `TGLLAHIRGURU`, `NOHPGURU`, `NOWAGURU`, `IDTELEGRAMGURU`, `IDLINEGURU`, `IDFACEBOOKGURU`, `IDINSTAGRAMGURU`, `IDTWITTERGURU`, `IDYOUTUBEGURU`, `EMAILGURU`) VALUES
('guru001', 'Abil', 'Drs', 'S.Kom', 'L', 'Islam', 'Jl. Balongsari 6B/13-14', 'Surabaya', '1997-08-04', '081234567800', '081234567800', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik@gmail.com'),
('guru002', 'Julio', 'Drs', 'S.Kom', 'L', 'Islam', 'Jl. Rungkut Madya No.17', 'Sidoarjo', '1991-12-09', '081234567801', '081234567801', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik@gmail.com'),
('guru003', 'syaugi syahab', 'Sri', 'S.kom', 'L', 'Islam', 'Citra Land', '', '2022-05-12', '088888888', '08888888', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik@gmail.com'),
('guru004', 'Fahrul', 'Drs', 'S.kom', 'L', 'Islam', 'Citra Land', 'Surabaya', '2022-05-04', '0888888888', '0888888888', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik@gmail.com'),
('guru005', 'dor', 'B.J.', 'S.Kom', 'L', 'Islam', 'Jl. Tambak Wedi 17B', 'Surabaya', '2022-05-07', '0888888888', '0888888888', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik', 'guruterbaik@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `IDJADWAL` varchar(15) NOT NULL,
  `NO_INDUK` varchar(10) DEFAULT NULL,
  `KODE_MAPEL` varchar(10) DEFAULT NULL,
  `IDGURU` varchar(15) DEFAULT NULL,
  `IDRUANG` varchar(10) DEFAULT NULL,
  `HARIJADWAL` varchar(6) DEFAULT NULL,
  `SESIJADWAL` char(1) DEFAULT NULL,
  `WAKTU_MULAI` time DEFAULT NULL,
  `WAKTU_SELESAI` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`IDJADWAL`, `NO_INDUK`, `KODE_MAPEL`, `IDGURU`, `IDRUANG`, `HARIJADWAL`, `SESIJADWAL`, `WAKTU_MULAI`, `WAKTU_SELESAI`) VALUES
('jadwal001', '357814031', 'M001', 'guru004', 'R01A', 'Jumat', '1', '07:00:00', '09:00:00'),
('jadwal002', '357814028', 'M002', 'guru003', 'R01A', 'Rabu', '2', '09:30:00', '11:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `KODE_MAPEL` varchar(10) NOT NULL,
  `NAMA_MAPEL` varchar(30) DEFAULT NULL,
  `BIDANG_MAPEL` varchar(10) DEFAULT NULL,
  `JENIS_MAPEL` varchar(10) DEFAULT NULL,
  `TIPE_MAPEL` varchar(10) DEFAULT NULL,
  `JUMLAH_PERTEMUAN` decimal(2,0) DEFAULT NULL,
  `DURASI_MAPEL` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`KODE_MAPEL`, `NAMA_MAPEL`, `BIDANG_MAPEL`, `JENIS_MAPEL`, `TIPE_MAPEL`, `JUMLAH_PERTEMUAN`, `DURASI_MAPEL`) VALUES
('M001', 'Pendidikan Agama Islam', 'Wajib', 'Umum', 'Reguler', '20', '02:00:00'),
('M002', 'Pendidikan Pancasila', 'Wajib', 'Umum', 'Regular', '20', '02:00:00'),
('M003', 'Bahasa Indonesia', 'Wajib', 'Umum', 'Regular', '20', '02:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `murid`
--

CREATE TABLE `murid` (
  `NO_INDUK` varchar(10) NOT NULL,
  `NAMA_MURID` varchar(25) NOT NULL,
  `JEN_KEL` char(1) DEFAULT NULL,
  `AGAMA_MURID` varchar(10) DEFAULT NULL,
  `ALAMAT_RUMAH` varchar(50) DEFAULT NULL,
  `TEMPATLAHIR` varchar(25) DEFAULT NULL,
  `TGL_LAHIR` date DEFAULT NULL,
  `NOHP` varchar(14) DEFAULT NULL,
  `NOWA` varchar(14) DEFAULT NULL,
  `IDTELEGRAM` varchar(20) DEFAULT NULL,
  `IDLINE` varchar(20) DEFAULT NULL,
  `IDFACEBOOK` varchar(20) DEFAULT NULL,
  `IDINSTAGRAM` varchar(20) DEFAULT NULL,
  `IDTWITTER` varchar(20) DEFAULT NULL,
  `IDYOUTUBE` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `murid`
--

INSERT INTO `murid` (`NO_INDUK`, `NAMA_MURID`, `JEN_KEL`, `AGAMA_MURID`, `ALAMAT_RUMAH`, `TEMPATLAHIR`, `TGL_LAHIR`, `NOHP`, `NOWA`, `IDTELEGRAM`, `IDLINE`, `IDFACEBOOK`, `IDINSTAGRAM`, `IDTWITTER`, `IDYOUTUBE`, `EMAIL`) VALUES
('357814025', 'Adi', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '2022-05-03', '0812321344515', '0812321344515', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur@gmail.com'),
('357814026', 'Eko', 'L', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '0812321344526', '0812321344526', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur26@gmail.com'),
('357814027', 'Nurul', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321344627', '812321344627', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur27@gmail.com'),
('357814028', 'Putra', 'L', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321344728', '812321344728', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur28@gmail.com'),
('357814029', 'Ni', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321344829', '812321344829', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur29@gmail.com'),
('357814030', 'Arif', 'L', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321344930', '812321344930', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur30@gmail.com'),
('357814031', 'Puspita', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321345031', '812321345031', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur31@gmail.com'),
('357814032', 'Ari', 'L', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321345132', '812321345132', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur32@gmail.com'),
('357814033', 'Indra', 'L', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321345233', '812321345233', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur33@gmail.com'),
('357814034', 'Dyah', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321345334', '812321345334', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur34@gmail.com'),
('357814035', 'Rizki', 'L', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321345435', '812321345435', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur35@gmail.com'),
('357814036', 'Maria', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321345536', '812321345536', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur36@gmail.com'),
('357814037', 'Ratih', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321345637', '812321345637', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur37@gmail.com'),
('357814038', 'Pratiwi', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321345738', '812321345738', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur38@gmail.com'),
('357814039', 'Kartika', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321345839', '812321345839', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur39@gmail.com'),
('357814040', 'Wulandari', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321345940', '812321345940', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur40@gmail.com'),
('357814041', 'Fajar', 'L', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321346041', '812321346041', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur41@gmail.com'),
('357814042', 'Bayu', 'L', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321346142', '812321346142', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur42@gmail.com'),
('357814043', 'Lestari', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321346243', '812321346243', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur43@gmail.com'),
('357814044', 'Anita', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321346344', '812321346344', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur44@gmail.com'),
('357814045', 'Muhammad', 'L', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321346445', '812321346445', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur45@gmail.com'),
('357814046', 'Kusuma', 'L', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321346546', '812321346546', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur46@gmail.com'),
('357814047', 'Rahmawati', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321346647', '812321346647', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur47@gmail.com'),
('357814048', 'Fitria', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321346748', '812321346748', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur48@gmail.com'),
('357814049', 'Retno', 'P', 'Islam', 'Jl. Gedangan No.14', 'Sidoarjo', '0000-00-00', '812321346849', '812321346849', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur', 'sangpenghibur49@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang_kelas`
--

CREATE TABLE `ruang_kelas` (
  `IDRUANG` varchar(10) NOT NULL,
  `NAMA_RUANG` varchar(15) NOT NULL,
  `TIPE_RUANG` varchar(10) DEFAULT NULL,
  `UKURAN_RUANG` varchar(10) DEFAULT NULL,
  `KAPASITAS_RUANG` decimal(3,0) DEFAULT NULL,
  `JUMLAH_MEJA` decimal(3,0) DEFAULT NULL,
  `JUMLAH_KURSI` decimal(3,0) DEFAULT NULL,
  `KETERANGAN_RUANG` varchar(200) DEFAULT NULL,
  `KELENGKAPAN_ALAT` varchar(200) DEFAULT NULL,
  `RENOVASI_TERAKHIR` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruang_kelas`
--

INSERT INTO `ruang_kelas` (`IDRUANG`, `NAMA_RUANG`, `TIPE_RUANG`, `UKURAN_RUANG`, `KAPASITAS_RUANG`, `JUMLAH_MEJA`, `JUMLAH_KURSI`, `KETERANGAN_RUANG`, `KELENGKAPAN_ALAT`, `RENOVASI_TERAKHIR`) VALUES
('L001', 'Lab TIK', 'Lab', '100 m2', '60', '41', '81', 'Ruang Laboratorium', 'Meja, Kursi, Komputer, AC', '2012-05-01'),
('R01A', 'Kelas A', 'Kelas', '64 m2', '20', '21', '41', 'Ruang Kelas', 'Meja, Kursi, AC', '2012-05-01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru_pengajar`
--
ALTER TABLE `guru_pengajar`
  ADD PRIMARY KEY (`IDGURU`);

--
-- Indeks untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`IDJADWAL`),
  ADD KEY `FK_MENERIMA_MATERI` (`NO_INDUK`),
  ADD KEY `FK_MENGAJAR` (`IDGURU`),
  ADD KEY `FK_TEMPAT_KBM` (`IDRUANG`),
  ADD KEY `FK_MAPEL_DIAJARKAN` (`KODE_MAPEL`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`KODE_MAPEL`);

--
-- Indeks untuk tabel `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`NO_INDUK`);

--
-- Indeks untuk tabel `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  ADD PRIMARY KEY (`IDRUANG`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD CONSTRAINT `FK_MAPEL_DIAJARKAN` FOREIGN KEY (`KODE_MAPEL`) REFERENCES `mata_pelajaran` (`KODE_MAPEL`),
  ADD CONSTRAINT `FK_MENERIMA_MATERI` FOREIGN KEY (`NO_INDUK`) REFERENCES `murid` (`NO_INDUK`),
  ADD CONSTRAINT `FK_MENGAJAR` FOREIGN KEY (`IDGURU`) REFERENCES `guru_pengajar` (`IDGURU`),
  ADD CONSTRAINT `FK_TEMPAT_KBM` FOREIGN KEY (`IDRUANG`) REFERENCES `ruang_kelas` (`IDRUANG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
