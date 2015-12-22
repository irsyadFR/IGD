-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Des 2015 pada 17.05
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `igd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Id` int(5) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `NoHP` int(13) NOT NULL,
  `Alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`Id`, `Nama`, `Username`, `Password`, `NoHP`, `Alamat`) VALUES
(11123, 'ADMIN IGD DR OEN SURAKARTA', 'anapersismenpro', 'anapersismenpro', 12345679, 'Jl. Melati no 3 Gg. 2 Blok C5, Fajar Indah, Surakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `Id` int(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `JenisKelamin` text NOT NULL,
  `NoTelpon` int(14) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`Id`, `Nama`, `Alamat`, `JenisKelamin`, `NoTelpon`, `Password`) VALUES
(11111, 'dr. Zainal Arifin', 'Jalan Kenangan, Gg. Durian Blok C3, Laweyan, Surakarta', 'Laki laki', 2147483647, '11111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwaljagadokter`
--

CREATE TABLE IF NOT EXISTS `jadwaljagadokter` (
`Id` int(10) NOT NULL,
  `namaDokter` varchar(50) NOT NULL,
  `noTelpon` int(14) NOT NULL,
  `hariJaga` varchar(30) NOT NULL,
  `waktuJaga` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11120 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwaljagadokter`
--

INSERT INTO `jadwaljagadokter` (`Id`, `namaDokter`, `noTelpon`, `hariJaga`, `waktuJaga`) VALUES
(11111, 'dr. Zaenal Arifin', 12345678, 'aaaa', '09:00-20:00'),
(11112, 'dr. Subagio', 2147483647, 'Jumat', '20:00-08:00'),
(11113, 'haha', 271732344, 'sabtu', '20:00-21:00'),
(11114, 'jaja', 2147483647, 'minggu', '20:00-21:00'),
(11115, 'raka', 2147483647, 'selasa', '20:00-21:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwalruangoperasi`
--

CREATE TABLE IF NOT EXISTS `jadwalruangoperasi` (
`Id` int(10) NOT NULL,
  `namaRuang` varchar(30) NOT NULL,
  `waktuOperasi` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwalruangoperasi`
--

INSERT INTO `jadwalruangoperasi` (`Id`, `namaRuang`, `waktuOperasi`, `keterangan`) VALUES
(1, 'ruang operasi gigi', 'Sabtu, 15-11-2015, pukul 15:00-19:00', 'belum dilaksanakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketersediaanigd`
--

CREATE TABLE IF NOT EXISTS `ketersediaanigd` (
`Id` int(4) NOT NULL,
  `totalIGD` int(2) NOT NULL,
  `jumlahPasien` int(3) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ketersediaanigd`
--

INSERT INTO `ketersediaanigd` (`Id`, `totalIGD`, `jumlahPasien`, `keterangan`) VALUES
(1, 5, 3, '2 ruang kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketersediaanrawatinap`
--

CREATE TABLE IF NOT EXISTS `ketersediaanrawatinap` (
`Id` int(10) NOT NULL,
  `namaRuang` varchar(30) NOT NULL,
  `noRuang` int(5) NOT NULL,
  `Kelas` varchar(10) NOT NULL,
  `jumlahBed` int(2) NOT NULL,
  `jumlahPasien` int(3) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `waktuMasuk` varchar(50) NOT NULL,
  `waktuKeluar` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ketersediaanrawatinap`
--

INSERT INTO `ketersediaanrawatinap` (`Id`, `namaRuang`, `noRuang`, `Kelas`, `jumlahBed`, `jumlahPasien`, `keterangan`, `waktuMasuk`, `waktuKeluar`) VALUES
(1, 'Melati', 1, 'VIP', 1, 1, 'Isi', 'Selasa, 27 oktober 2015', 'Minggu, 1 November 2015');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekammedispasien`
--

CREATE TABLE IF NOT EXISTS `rekammedispasien` (
  `Id` int(10) NOT NULL,
  `namaPasien` varchar(50) NOT NULL,
  `namaWali` varchar(50) NOT NULL,
  `tempatLahir` varchar(30) NOT NULL,
  `tanggalLahir` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenisKelamin` varchar(15) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `golonganDarah` text NOT NULL,
  `umur` int(3) NOT NULL,
  `hasilAmnesis` varchar(50) NOT NULL,
  `kondisiPasien` varchar(50) NOT NULL,
  `waktuDatang` varchar(50) NOT NULL,
  `waktuPergi` varchar(50) NOT NULL,
  `diagnosa` varchar(50) NOT NULL,
  `tindakan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekammedispasien`
--

INSERT INTO `rekammedispasien` (`Id`, `namaPasien`, `namaWali`, `tempatLahir`, `tanggalLahir`, `alamat`, `jenisKelamin`, `agama`, `pekerjaan`, `golonganDarah`, `umur`, `hasilAmnesis`, `kondisiPasien`, `waktuDatang`, `waktuPergi`, `diagnosa`, `tindakan`) VALUES
(1, 'Irsyad', 'Fanani', 'Wonogiri', '25 Juli 1995', 'widororejo', 'laki', 'islam', 'swasta', 'A', 20, 'entahlah', 'sehat wal afiat', '08:00', '09:00', 'batuk', 'bbb'),
(2, 'Roji', '', 'Wonogiri', '20 Juni 1995', 'Makamhaji', 'Laki', 'Konghucu', 'Buruh', 'B', 3, '', '', '', '', '', ''),
(3, 'Dita', '', 'Sleman', '30 Februari ', 'Kartasura', 'Perempuan', 'Hindu', 'Petani', 'AB', 25, '', '', '', '', '', ''),
(4, 'Nurma', 'wigati', 'Surakarta', '8 Juli 1995', 'Solo', 'perempuan', 'Islam', 'Swasta`', 'O', 21, 'aaa', 'sehat', '09:00', '10:00', 'gpp', 'ga ada'),
(5, 'Fembi', '', 'Malang', '1995-02-21', 'Jalan malang', 'Laki Laki', 'Islam', 'mahasiswa', 'B', 21, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokobat`
--

CREATE TABLE IF NOT EXISTS `stokobat` (
`id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `produsen` varchar(40) NOT NULL,
  `banyak` int(4) NOT NULL,
  `kadaluarsa` date NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=111111137 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stokobat`
--

INSERT INTO `stokobat` (`id`, `nama`, `jenis`, `produsen`, `banyak`, `kadaluarsa`, `keterangan`) VALUES
(111111111, 'OBH', 'Obat batuk', 'Combi farma', 50, '2016-07-30', 'bbbb'),
(111111114, 'aaaaa', 'obat dingin', 'gatau', 90, '0000-00-00', ''),
(111111122, 'paracetamol', 'obat panas', 'PT pc', 40, '0000-00-00', 'OK'),
(111111133, 'Antangin', 'Obat masuk angin', 'Kimia Farma', 100, '0000-00-00', 'Blablabla'),
(111111136, 'kkkk', 'kkkk', 'kkkk', 95, '2016-07-28', 'kkkk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `jadwaljagadokter`
--
ALTER TABLE `jadwaljagadokter`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `jadwalruangoperasi`
--
ALTER TABLE `jadwalruangoperasi`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ketersediaanigd`
--
ALTER TABLE `ketersediaanigd`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ketersediaanrawatinap`
--
ALTER TABLE `ketersediaanrawatinap`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `rekammedispasien`
--
ALTER TABLE `rekammedispasien`
 ADD PRIMARY KEY (`Id`), ADD UNIQUE KEY `Id` (`Id`);

--
-- Indexes for table `stokobat`
--
ALTER TABLE `stokobat`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwaljagadokter`
--
ALTER TABLE `jadwaljagadokter`
MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11120;
--
-- AUTO_INCREMENT for table `jadwalruangoperasi`
--
ALTER TABLE `jadwalruangoperasi`
MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ketersediaanigd`
--
ALTER TABLE `ketersediaanigd`
MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ketersediaanrawatinap`
--
ALTER TABLE `ketersediaanrawatinap`
MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stokobat`
--
ALTER TABLE `stokobat`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111111137;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
