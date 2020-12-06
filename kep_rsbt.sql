-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2020 at 06:19 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kep_rsbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `lama_cuti` int(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `jadwal_off` varchar(50) NOT NULL,
  `acc_kaunit` int(50) NOT NULL,
  `ket_kaunit` varchar(100) NOT NULL,
  `acc_kabid` int(50) NOT NULL,
  `ket_kabid` varchar(100) NOT NULL,
  `acc_kabid_sdm` int(50) NOT NULL,
  `ket_sdm` varchar(100) NOT NULL,
  `status` varchar(2) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `pegawai_input` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pegawai`
--

CREATE TABLE `detail_pegawai` (
  `nip` int(50) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `status_staff` varchar(100) NOT NULL,
  `no_bpjs_kes` int(50) NOT NULL,
  `no_bpjs_tker` int(50) NOT NULL,
  `tgl_masuk_kerja` date NOT NULL,
  `masa_kontrak` varchar(100) NOT NULL,
  `masa_kew_klis` varchar(100) NOT NULL,
  `masa_cuti` int(2) NOT NULL,
  `akhir_cuti` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pegawai`
--

INSERT INTO `detail_pegawai` (`nip`, `id_pegawai`, `jabatan`, `unit`, `bidang`, `status_staff`, `no_bpjs_kes`, `no_bpjs_tker`, `tgl_masuk_kerja`, `masa_kontrak`, `masa_kew_klis`, `masa_cuti`, `akhir_cuti`) VALUES
(1234, 'pegawai', 'Direktur', 'Cyber Crime', 'Kejahatan', 'Ada', 21678341, 234184112, '2020-12-05', '5 tahun', '1 tahun', 12, '2020-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id_izin` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `lama_izin` int(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `jadwal_off` varchar(100) NOT NULL,
  `acc_kaunit` int(50) NOT NULL,
  `ket_kaunit` varchar(100) NOT NULL,
  `acc_kabid` int(50) NOT NULL,
  `ket_kabid` varchar(100) NOT NULL,
  `acc_kabid_sdm` int(50) NOT NULL,
  `ket_sdm` varchar(100) NOT NULL,
  `bukti_izin` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `id_jenis_izin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `jadwal` varchar(20) NOT NULL,
  `jam_masuk` date NOT NULL,
  `jam_pulang` date NOT NULL,
  `bulan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dinas`
--

CREATE TABLE `jadwal_dinas` (
  `id_jadwal_dinas` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `jadwal` varchar(20) NOT NULL,
  `pegganti` varchar(100) NOT NULL,
  `id_jadwal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_izin`
--

CREATE TABLE `jenis_izin` (
  `id_jenis_izin` varchar(100) NOT NULL,
  `jenis_izin` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `lama_izin` int(3) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_izin`
--

INSERT INTO `jenis_izin` (`id_jenis_izin`, `jenis_izin`, `lokasi`, `lama_izin`, `status`) VALUES
('1', 'Normal', 'Rumah', 3, 1),
('2', 'Khusus', 'Rumah', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `leadership`
--

CREATE TABLE `leadership` (
  `id_leadership` varchar(100) NOT NULL,
  `planning` double NOT NULL,
  `decision` double NOT NULL,
  `developing` double NOT NULL,
  `change` double NOT NULL,
  `gaining` double NOT NULL,
  `coaching` double NOT NULL,
  `implementation` double NOT NULL,
  `delegation` double NOT NULL,
  `perfomance` double NOT NULL,
  `reward` double NOT NULL,
  `sub_d` double NOT NULL,
  `id_staff` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lembur`
--

CREATE TABLE `lembur` (
  `id_lembur` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tgl_lembur` date NOT NULL,
  `jam_mulai` datetime NOT NULL,
  `jam_selesai` datetime NOT NULL,
  `jumlah` datetime NOT NULL,
  `alasan` varchar(100) NOT NULL,
  `kabid` int(5) NOT NULL,
  `kabid_sdm` int(5) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `status` int(2) NOT NULL,
  `pegawai_input` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telpon` int(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat_ktp` varchar(100) NOT NULL,
  `alamat_dom` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `no_rek_bni` int(50) NOT NULL,
  `gol_dar` varchar(2) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `no_ktp` int(50) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `data_ortu` varchar(100) NOT NULL,
  `data_kel_inti` varchar(100) NOT NULL,
  `riwayat_pend` varchar(100) NOT NULL,
  `pelatihan` varchar(100) NOT NULL,
  `no_str` int(50) NOT NULL,
  `no_sip` int(50) NOT NULL,
  `masa_str` date NOT NULL,
  `masa_sip` date NOT NULL,
  `riwayat_pek` varchar(100) NOT NULL,
  `id_staff` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `tpt_lahir`, `tgl_lahir`, `telpon`, `email`, `alamat_ktp`, `alamat_dom`, `status`, `no_rek_bni`, `gol_dar`, `agama`, `no_ktp`, `nama_ibu`, `data_ortu`, `data_kel_inti`, `riwayat_pend`, `pelatihan`, `no_str`, `no_sip`, `masa_str`, `masa_sip`, `riwayat_pek`, `id_staff`) VALUES
('pegawai', 'M. Faiz Pratama Muliaa', 'Pekanbaru', '1998-03-15', 2147483647, 'faizpratama@hotmail.com', 'jalan kesana', 'jl kesana yuk', 'hidup', 91283814, 'B', 'Islam', 2147483647, 'keren', 'kerenkeren', 'kkkk', 'kkkkk', 'kkkkk', 1231241, 2147483647, '2021-12-03', '2021-12-05', 'kkkkkk', '1');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_kerja`
--

CREATE TABLE `penilaian_kerja` (
  `id_penilaian` varchar(100) NOT NULL,
  `id_pros_att` varchar(100) NOT NULL,
  `id_rel_dis` varchar(100) NOT NULL,
  `id_work_struk` varchar(100) NOT NULL,
  `id_work_non` varchar(100) NOT NULL,
  `id_leadership` varchar(100) NOT NULL,
  `periode` date NOT NULL,
  `komen_staff` varchar(1000) NOT NULL,
  `acc_kabid` varchar(2) NOT NULL,
  `komen_kabid` varchar(1000) NOT NULL,
  `acc_sdm` varchar(2) NOT NULL,
  `komen_sdm` varchar(1000) NOT NULL,
  `acc_direktur` varchar(2) NOT NULL,
  `komen_direktur` varchar(1000) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE `promosi` (
  `id_promosi` varchar(100) NOT NULL,
  `id_staff` varchar(100) NOT NULL,
  `unit_baru` varchar(100) NOT NULL,
  `tmt` varchar(100) NOT NULL,
  `alasan` varchar(5000) NOT NULL,
  `sk` varchar(100) NOT NULL,
  `sp` varchar(100) NOT NULL,
  `kronologi` varchar(100) NOT NULL,
  `bpi` varchar(100) NOT NULL,
  `pk` varchar(100) NOT NULL,
  `acc_kabid_ybs` varchar(2) NOT NULL,
  `acc_kabid_sdm` varchar(2) NOT NULL,
  `acc_direktur` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pros_att`
--

CREATE TABLE `pros_att` (
  `id_pros_att` varchar(100) NOT NULL,
  `loyal` double NOT NULL,
  `passion` double NOT NULL,
  `comm` double NOT NULL,
  `obedience` double NOT NULL,
  `teamwork` double NOT NULL,
  `emotional` double NOT NULL,
  `knowledge` double NOT NULL,
  `pdca` double NOT NULL,
  `initiative` double NOT NULL,
  `cso` double NOT NULL,
  `sub_c` double NOT NULL,
  `id_staff` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rel_dis`
--

CREATE TABLE `rel_dis` (
  `id_rel_dis` varchar(100) NOT NULL,
  `hadir_doa` double NOT NULL,
  `hadir_bina` double NOT NULL,
  `hadir_tahsin` double NOT NULL,
  `telat_hadir` double NOT NULL,
  `izin_pulang` double NOT NULL,
  `tidak_absen` double NOT NULL,
  `tidak_tegur` double NOT NULL,
  `sub_a` double NOT NULL,
  `id_staff` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `izin_akses` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nik_eklaim` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `username`, `password`, `nama`, `izin_akses`, `tipe`, `status`, `nik_eklaim`, `token`, `image`) VALUES
('05B5538EKB', 'utari', '676767', 'utari', 'input', 'apotik', 'aktif', '', '', ''),
('05B5538EKB1111', 'pemasaran', '123456780', 'pemasaran', 'admin', 'pemasaran', 'aktif', '-', '', ''),
('05B5538EKBCDE', 'sinta', '126831', 'sinta anggraini', 'input', 'apotik', 'aktif', '', '', ''),
('05B5538EKBqwqw', 'keuangan', '123456780', 'keuangan', 'admin', 'keuangan', 'aktif', '', '', ''),
('05B5538r', 'rinda', '231080', 'nurinda miarka', 'admin', 'pemasaran', 'aktif', '-', '', ''),
('05B55jj', 'baksos', '123456', 'baksos', 'input', 'baksos', 'aktif', '-', '', ''),
('05B5ggg', 'yulia', 'y070775', 'yulia nurmalasari', 'admin', 'keuangan', 'aktif', '-', '', ''),
('05qweq538EKBqwqw', 'erna', '123456', 'erna', 'input', 'keuangan', 'aktif', '', '', ''),
('05qweq538sa', 'uri', '210871', 'Sanisa Huri', 'input', 'keuangan', 'aktif', '-', '', ''),
('05uuuy', 'ditha', '260591', 'raja dwi paramitha', 'input', 'pemasaran', 'aktif', '-', '', ''),
('0G8G0J85OS', 'shintya', '123456', 'shintya sri rezeki', 'input', 'apotik', 'aktif', '', '', ''),
('0NUQ37LW11', 'ambari', '10011994', 'abdullah ambari', 'input', 'apotik', 'aktif', '', '', ''),
('0W48VQJX72', 'windy', '123456', 'wyndi agustina', 'admin', 'apelkes', 'aktif', '', '', ''),
('1', 'pegawai', '123456', 'pegawai', 'input', 'apotik', 'aktif', '', '', ''),
('12312123wqa', 'ratna', 'ribut', 'Ratnawati', 'admin', 'laundry', 'aktif', '-', '', ''),
('123123wqa', 'laundry', '1234560', 'laundry', 'admin', 'laundry', 'aktif', '-', '', ''),
('1234567', 'ambariigd', '10011994', 'abdullah ambari', 'input', 'igdapotik', 'aktif', '', '', ''),
('123456712', 'igdapotik', '1234560', 'igd apotik', 'input', 'igdapotik', 'aktif', '', '', ''),
('123qqe1', 'casemanager', '1234560', 'casemanager', 'admin', 'casemanager', 'aktif', '-', '', ''),
('123qw123w', 'kepegawaian', '123456', 'kepegawaian', 'admin', 'kepegawaian', 'aktif', '-', '', ''),
('123wasas', 'GTBC_501', 'oni ', 'roni pasla', 'admin', 'kepegawaian', 'aktif', '-', '', ''),
('12ffff', 'fikri', 'mubarok', 'fikri', 'admin', 'logistikumum', 'aktif', '-', '', ''),
('12qqw', 'desi ', '40478', 'Desi Juwita', 'admin', 'logistikumum', 'aktif', '-', '', ''),
('12qqwss', 'kelani', '456789', 'kelani', 'admin', 'logistikumum', 'aktif', '-', '', ''),
('12qqwssdd', 'fasa', '2006', 'rasenah', 'admin', 'logistikumum', 'aktif', '-', '', ''),
('12qwqaa', 'wadir', '123456780', 'wadir', 'admin', 'wadir', 'aktif', '-', '', ''),
('12qwqaa123', 'direktur', '1234560', 'direktur', 'admin', 'direktur', 'aktif', '-', '', ''),
('12qwqaa123gg', 'firman', 'firm131077', 'firmansyah', 'admin', 'direktur', 'aktif', '-', '', ''),
('12qwqasd', 'rsbtk02', '240359', 'Yuni Fitriani', 'admin', 'wadir', 'aktif', '-', '', ''),
('18A23993ZC', 'Ury', '123456', 'asmarizauri', 'input', 'rekam medis', 'aktif', '', '', ''),
('18A2ddxzsa', 'deni', '201091', 'deni eka putra', 'input', 'rawatjalan', 'aktif', '-', '', ''),
('1A34HM74HG', 'mozaa', 'moza25', 'regina moza nurdica', 'input', 'logistik farmasi', 'aktif', '', '', ''),
('1AJR043PRP', 'zainal', '12345678', 'zainal aripin hasibuan', 'input', 'radiologi', 'aktif', '', '', ''),
('1RSKZ7Q563', 'Irma', '123456', 'irma nirmala putri', 'input', 'rekam medis', 'aktif', '', '', ''),
('1se4rtgdfg', 'eddy', '1234560', 'Eddy Hartono', 'admin', 'edp', 'aktif', '-', '', ''),
('1SGKE8U13', 'ossy', 'bismillah', 'ossy natawijaya', 'admin', 'sekretariat', 'aktif', '-', '', ''),
('1SGKE8U13K', 'anty', '102030', 'riyanti', 'admin', 'logistik farmasi', 'aktif', '', '', ''),
('1SGKE8U13K121', 'sekretariat', '1234560', 'sekretariat', 'admin', 'sekretariat', 'aktif', '', '', ''),
('1svvvssawa', 'martha', '230915', 'martha dwi novalia', 'admin', 'rawatjalan', 'aktif', '-', '', ''),
('3315TBT22E', 'ezy', '123456', 'bw fraezie', 'input', 'apelkes', 'aktif', '', '', ''),
('34234af', 'sri', 'suci', 'sri idarsih', 'admin', 'akutansi', 'aktif', '-', '', ''),
('34234aqqsae2', 'akutansi', '1234560', 'akutansi', 'admin', 'akutansi', 'aktif', '-', '', ''),
('34234ff', 'uri', '10112006', 'sanisah huri', 'admin', 'akutansi', 'non-aktif', '-', '', ''),
('34234we2', 'upsrs', '1234560', 'upsrs', 'admin', 'upsrs', 'aktif', '-', '', ''),
('34234we2ff', 'supir', '1234560', 'supir', 'admin', 'supir', 'aktif', '-', '', ''),
('34234we2xx', 'riboet', 'iboetaja', 'awaluddin ribut', 'admin', 'upsrs', 'aktif', '-', '', ''),
('34234wedd', 'sopir', 'iboetaja', 'awalluddin ribut', 'admin', 'supir', 'aktif', '-', '', ''),
('342ewe', 'ppm', '1234560', 'ppm', 'admin', 'ppm', 'aktif', '-', '', ''),
('342ewe32', 'said', '1225', 'said sabirin', 'admin', 'ppm', 'aktif', '-', '', ''),
('342qqsae2', 'nicu', '1234560', 'nicu', 'admin', 'nicu', 'aktif', '-', '', ''),
('3NAHNX27EU', 'evi purnamasary', 'bismillah', 'evi purnamasary', 'input', 'apotik', 'aktif', '', '', ''),
('40J4Z996IJ', 'trisno', 'kasirrsbt', 'trisno tenang wibowo', 'input', 'kasir', 'aktif', '', '', ''),
('430I2HNW0F', 'Hilda', '123456', 'hidayatul fadhila', 'input', 'rekam medis', 'aktif', '', '', ''),
('4RJ5004ML5', 'ade', '123456', 'ade nurhusni', 'admin', 'ok', 'aktif', '', '', ''),
('4RJ5004ML51212', 'monev', '1234560', 'monev', 'admin', 'monev', 'aktif', '', '', ''),
('4RJ5004ML5121212123', 'direktur', '123456', 'dr. firmansyah', 'admin', 'monev', 'aktif', '', '', ''),
('510Y513170', 'Eca', '123456', 'fitra ginesa', 'input', 'rekam medis', 'aktif', '', '', ''),
('51P2PZ211T', 'dian', 'kasirrsbt', 'dian restuwinayah', 'input', 'kasir', 'aktif', '', '', ''),
('5g67erujse4h6se4rtgdfg', 'edp', '1234560', 'edp', 'admin', 'edp', 'aktif', '-', '', ''),
('5SR3Q8BB2S', 'tomi', 'juniarto', 'tomi juniarto', 'input', 'logistik farmasi', 'aktif', '', '', ''),
('5SR3Q8BB2Sqwqe', 'obatexpire', '123456', 'Obat Expire', 'input', 'obat expire', 'aktif', '', '', ''),
('5X0356VJ8B', 'yazit', 'pseudomonassolunacearum', 'muhammad yazit', 'admin', 'logistik farmasi', 'aktif', '', '', ''),
('630LFFJ3U8', 'Dini', '123456', 'dini safitri', 'input', 'rekam medis', 'aktif', '', '', ''),
('6506C61SXY', 'kartika', 'alikaabdielarie', 'kartika sari', 'admin', 'apotik', 'aktif', '', '', ''),
('678rj5t6y112erfgg', 'psdmp', '1234560', 'psdmp', 'admin', 'psdmp', 'aktif', '-', '', ''),
('678rj5t6yerfggsretsetr', 'pnm', '1234560', 'pnm', 'admin', 'pnm', 'aktif', '-', '', ''),
('678rjjj', 'sherly', 'arrumi', 'sherly marlysa', 'admin', 'psdmp', 'aktif', '-', '', ''),
('6Z13I49QL1', 'evirilya', '310386', 'evirilya wiguna', 'admin', 'apotik', 'aktif', '', '', ''),
('737YS6WO8V', 'septia', '00', 'septia asriani', 'input', 'apotik', 'aktif', '', '', ''),
('7FB4XV81OK', 'mona', '123456', 'mona noviyanti', 'input', 'apotik', 'aktif', '', '', ''),
('86fovoinylo8dljgl', 'aminuddin', 'ami0810', 'aminuddin', 'input', 'apotik', 'aktif', '', '', ''),
('8Cggf', 'Putri23', '010518', 'Putri Ramadhani', 'input', 'apelkes', 'aktif', '', '', ''),
('8CH5TJLG83', 'DIANA', '123456', 'diana', 'input', 'apelkes', 'aktif', '', '', ''),
('8R1157P3UO', 'sandra', '84508451', 'sandra kuswara', 'admin', 'radiologi', 'aktif', '', '', ''),
('A1V0815JEB', 'Nur', '123456', 'nuraini', 'input', 'rekam medis', 'aktif', '', '', ''),
('AGP161L385', 'EVAARSANOVA', '123456', 'eva arsanova', 'input', 'labor', 'aktif', '', '', ''),
('AGP161L38512', 'liya', '987654', 'liyanaviarista', 'input', 'apelkes', 'aktif', '', '', ''),
('asdasdqe', 'keperawatan', '1234560', 'keperawatan', 'admin', 'keperawatan', 'aktif', '-', '', ''),
('asdasdqe12', 'vidya', 'rava02', 'sri vidya santi', 'admin', 'keperawatan', 'aktif', '-', '', ''),
('bftre4', 'ade rahayu', '20073001', 'ade tati rahayu', 'admin', 'kebidanan', 'aktif', '', '', ''),
('bftre4123', 'kebidanan', '1234560', 'kebidanan', 'admin', 'kebidanan', 'aktif', '', '', ''),
('bftre4123gg', 'heckal', '858585', 'muhammad haikal', 'admin', 'security', 'aktif', '-', '', ''),
('bftre4123qwq', 'security', '1234560', 'security', 'admin', 'security', 'aktif', '', '', ''),
('bgdfre3', 'hepi', '646619', 'hepi', 'input', 'kebidanan', 'aktif', '', '', ''),
('bgftrr5466', 'reda', '123456', 'reda', 'input', 'kebidanan', 'aktif', '', '', ''),
('bngftr5', 'Arnela', '040491', 'arnela aprilia', 'input', 'kebidanan', 'aktif', '', '', ''),
('bvnfgrt65', 'maria susanti', '884397', 'maria susanti', 'input', 'kebidanan', 'aktif', '', '', ''),
('bvnmfr543', 'mona', '160814', 'mona', 'input', 'kebidanan', 'aktif', '', '', ''),
('cobacoba', 'tampil', '1234560', 'tampil', 'admin', 'tampildirektur', 'aktif', '', '', ''),
('D981KIL871', 'Deni', '123456', 'deni setiawan', 'input', 'rekam medis', 'aktif', '', '', ''),
('dssafdf', 'maria', 'november', 'maria', 'admin', 'rawatinap', 'aktif', '', '', ''),
('dyhgdntryhfcgjhnd', 'logistikumum', '123456780', 'logistikumum', 'admin', 'logistikumum', 'aktif', '-', '', ''),
('ewrwr3', 'yeni', 'november', 'lidra yeni', 'admin', 'icu', 'aktif', '', '', ''),
('ewrwr3wuww', 'almirad', 'november', 'Almirad', 'admin', 'icu', 'aktif', '', '', ''),
('F59EZ8X5HY', 'Suri', '123456', 'suriwati', 'input', 'rekam medis', 'aktif', '', '', ''),
('fdre3', 'tiara', 'november', 'dita tiara agnes', 'admin', 'nicu', 'aktif', '', '', ''),
('fdrey2', 'asmainar', 'november', 'asmainar', 'admin', 'vip', 'aktif', '', '', ''),
('fdrey212', 'kundur', 'kundur', 'Klinik Pratama Kundur', 'admin', 'Klinik Pratama Kundur', 'aktif', '', '', ''),
('fffdetr4', 'iin', '001317', 'iin', 'input', 'kebidanan', 'aktif', '', '', ''),
('fggsretsetr', 'zack', 'zack3006', 'Zakaria', 'admin', 'pnm', 'aktif', '-', '', ''),
('G067P968G1', 'LIJAYA', '123456', 'lijaya', 'admin', 'apelkes', 'aktif', '', '', ''),
('HCQ55X2XF1', 'mega', 'kasirrsbt', 'megawati', 'input', 'kasir', 'aktif', '', '', ''),
('I3FAZEDC9G', 'fetty', '170984', 'fetty kurnia sari', 'input', 'logistik farmasi', 'aktif', '', '', ''),
('I8P7KBWT8T', 'ZAHARAH', '123456', 'r. zaharah', 'input', 'apelkes', 'aktif', '', '', ''),
('ipcn1', 'ipcn', '1234560', 'ipcn', 'admin', 'ipcn', 'aktif', '-', '', ''),
('ipcn2', 'IPCN', '232425', 'Maya Marlinda', 'admin', 'ipcn', 'aktif', '-', '', ''),
('JC0WHARG8R', 'devi', '12345678', 'devi marliyasari', 'input', 'radiologi', 'aktif', '', '', ''),
('M2X322R440', 'Lony', '123456', 'lony sulistianti', 'input', 'rekam medis', 'aktif', '', '', ''),
('M3HWI6USNH', 'karisa', 'kasirrsbt', 'karisa oktaria', 'admin', 'kasir', 'aktif', '', '', ''),
('mnhgtr43', 'ramayanti', '123456', 'ramayanti', 'input', 'kebidanan', 'aktif', '', '', ''),
('N10KLW1T35', 'Suci', '123456', 'suci yulia syaputri', 'input', 'rekam medis', 'aktif', '', '', ''),
('NFVY5D7LI1', 'dee_minedee', '277727', 'dely', 'admin', 'labor', 'aktif', '', '', ''),
('P3AU92QS76', 'rahma', 'kasirrsbt', 'rahma fitri', 'input', 'kasir', 'aktif', '', '', ''),
('P3AU92QS761213', 'teresa', 'bendahara', 'teresa', 'admin', 'bendahara', 'aktif', '', '', ''),
('qwe12', 'icu', '1234560', 'icu', 'admin', 'icu', 'aktif', '-', '', ''),
('spi1', 'spi', '1234560', 'spi', 'admin', 'spi', 'aktif', '-', '', ''),
('spi11', 'dika', 'dika123', 'andika eko prianto', 'admin', 'spi', 'aktif', '-', '', ''),
('st-1', 'antrianrm', '1234560', 'antrianrm', 'input', 'antrianrm', 'aktif', '', '', ''),
('st-2', 'antrianpoli', '1234560', 'antrianpoli', 'input', 'antrianpoli', 'aktif', '', '', ''),
('st-3', 'antrianfarmasi', '1234560', 'antrianfarmasi', 'input', 'antrianfarmasi', 'aktif', '', '', ''),
('ST01', 'kasir', '123456780', 'kasir', 'admin', 'kasir', 'aktif', '', '', ''),
('st100', 'lisna', 'edelweis', 'LISNA KURNIAWATI', 'input', 'vip', 'aktif', '', '', ''),
('st1000', 'apelkesanak', '123456', 'polianak', 'input', 'polianak', 'aktif', '', '', ''),
('st1001', 'apelkesbedah', '123456', 'polibedah', 'input', 'polibedah', 'aktif', '', '', ''),
('st1002', 'apelkesfisio', '123456', 'polifisio', 'input', 'polifisio', 'aktif', '', '', ''),
('st1003', 'apelkesgigi', '123456', 'poligigi', 'input', 'poligigi', 'aktif', '', '', ''),
('st1004', 'apelkesinternis', '123456', 'poliinternis', 'input', 'poliinternis', 'aktif', '', '', ''),
('st1005', 'apelkesjantung', '123456', 'polijantung', 'input', 'polijantung', 'aktif', '', '', ''),
('st1006', 'apelkeskulit', '123456', 'polikulit', 'input', 'polikulit', 'aktif', '', '', ''),
('st1007', 'apelkesmata', '123456', 'polimata', 'input', 'polimata', 'aktif', '', '', ''),
('st1008', 'poliobgyne', '123456', 'apelkesobgyne', 'input', 'poliobgyne', 'aktif', '', '', ''),
('st1009', 'apelkestht', '123456', 'politht', 'input', 'politht', 'aktif', '', '', ''),
('st101', 'muh', 'edelweis', 'muh ridwan', 'input', 'vip', 'aktif', '', '', ''),
('st1010', 'poliumum', '123456', 'apelkesumum', 'input', 'poliumum', 'aktif', '', '', ''),
('st1011', 'apelkesigd', '123456', 'apelkes', 'input', 'igd', 'aktif', '', '', ''),
('st102', 'evelin', 'edelweis', 'evelina', 'input', 'vip', 'aktif', '', '', ''),
('st103', 'fitri', 'edelweis', 'norfitriani', 'input', 'vip', 'aktif', '', '', ''),
('st104', 'yuli', 'edelweis', 'yuliani', 'input', 'vip', 'aktif', '', '', ''),
('st105', 'dian', 'edelweis', 'dian gusriani', 'input', 'vip', 'aktif', '', '', ''),
('st106', 'putri', 'edelweis', 'putri oktavianti', 'input', 'vip', 'aktif', '', '', ''),
('st107', 'winda', 'edelweis', 'winda wulandari', 'input', 'vip', 'aktif', '', '', ''),
('st108', 'rika', 'kemuning', 'rika mayasari', 'input', 'vip', 'aktif', '', '', ''),
('st109', 'sona', 'kemuning', 'sonna ponika pratama', 'input', 'vip', 'aktif', '', '', ''),
('st11', 'apelkes', '1234560', 'apelkes', 'admin', 'apelkes', 'aktif', '', '', ''),
('st110', 'evita', 'kemuning', 'evita sitorus', 'input', 'vip', 'aktif', '', '', ''),
('st111', 'livia', 'kemuning', 'livia anggraini', 'input', 'vip', 'aktif', '', '', ''),
('st112', 'indah', 'kemuning', 'tengku indah', 'input', 'vip', 'aktif', '', '', ''),
('st113', 'heni', 'kemuning', 'heni afriani', 'input', 'vip', 'aktif', '', '', ''),
('st114', 'gysti', 'kemuning', 'tengku gysti ribizilia', 'input', 'vip', 'aktif', '', '', ''),
('st115', 'renta', 'nicu', 'renta uli nainggolan', 'input', 'nicu', 'aktif', '', '', ''),
('st116', 'friska', 'nicu', 'friska tampubolon', 'input', 'nicu', 'aktif', '', '', ''),
('st117', 'aisyah', 'nicu', 'siti aisyah', 'input', 'nicu', 'aktif', '', '', ''),
('st118', 'uyas', 'eggy', 'siti muyasaroh', 'input', 'nicu', 'aktif', '', '', ''),
('st119', 'putri', 'nicu', 'putri winasari', 'input', 'nicu', 'aktif', '', '', ''),
('st12', 'rm', '123456780', 'rekam medis', 'admin', 'rekam medis', 'aktif', '', '', ''),
('st120', 'desnita', 'nicu', 'desnita susanti', 'input', 'nicu', 'aktif', '', '', ''),
('st121', 'april', 'nicu', 'apriliani', 'input', 'nicu', 'aktif', '', '', ''),
('st122', 'vina', 'nicu', 'devina', 'input', 'nicu', 'aktif', '', '', ''),
('st123', 'mirad', 'icu', 'almirad', 'input', 'icu', 'aktif', '', '', ''),
('st124', 'daus', 'icu', 'muhammad firdaus', 'input', 'icu', 'aktif', '', '', ''),
('st125', 'agustin', 'icu', 'agustin malianti', 'input', 'icu', 'aktif', '', '', ''),
('st126', 'neny', 'icu', 'neny lyawati', 'input', 'icu', 'aktif', '', '', ''),
('st127', 'wewed', 'icu', 'wedri dwiva', 'input', 'icu', 'aktif', '', '', ''),
('st128', 'siti', 'icu', 'siti nurbala', 'input', 'icu', 'aktif', '', '', ''),
('st129', 'silvi', 'icu', 'silvi rahmadani', 'input', 'icu', 'aktif', '', '', ''),
('st13', 'farmasi', '123456780', 'farmasi', 'admin', 'apotik', 'aktif', '', '', ''),
('st130', 'murni', 'engku', 'murniana togatorup', 'input', 'rawatinap', 'aktif', '', '', ''),
('st131', 'rozi', 'engku', 'rozi fitriani', 'input', 'rawatinap', 'aktif', '', '', ''),
('st132', 'didit', 'engku', 'ahmad asmadi', 'input', 'rawatinap', 'aktif', '', '', ''),
('st133', 'desi', 'engku', 'desi arperianti', 'input', 'rawatinap', 'aktif', '', '', ''),
('st134', 'idah', 'engku', 'idah solihatin', 'input', 'rawatinap', 'aktif', '', '', ''),
('st135', 'nela', 'engku', 'monisa nella nasti', 'input', 'rawatinap', 'aktif', '', '', ''),
('st136', 'rini', 'engku', 'asrini br ginting', 'input', 'rawatinap', 'aktif', '', '', ''),
('st137', 'vannisw', 'aad66', 'vani selvia wati', 'admin', 'casemix', 'aktif', '1311016608930001', '', ''),
('st138', 'nunung', 'a1500046', 'nunung sulistyowati', 'input', 'casemix', 'aktif', '3309145112930001', '', ''),
('st139', 'noki', 'noki86', 'noki arianto', 'admin', 'casemix', 'aktif', '', '', ''),
('st14', 'logistik', '123456780', 'logistik farmasi', 'admin', 'logistik farmasi', 'aktif', '', '', ''),
('st140', 'nissa', 'kemuning', 'choirunissa', 'input', 'vip', 'aktif', '', '', ''),
('st141', 'fera', 'engku', 'fera novianti', 'input', 'rawatinap', 'aktif', '', '', ''),
('st142', 'putra', 'igd', 'wibawa fazli putra', 'input', 'igd', 'aktif', '', '', ''),
('st15', 'ok', '1234560', 'ok', 'admin', 'ok', 'aktif', '', '', ''),
('st16', 'radiologi', '123456780', 'radiologi', 'admin', 'radiologi', 'aktif', '', '', ''),
('st17', 'labor', '123456780', 'labor', 'admin', 'labor', 'aktif', '', '', ''),
('st18', 'casemix', '1234560', 'casemix', 'admin', 'casemix', 'aktif', '121212', '', ''),
('st19', 'polianak', '123456', 'polianak', 'input', 'polianak', 'aktif', '', '', ''),
('st20', 'polibedah', '123456', 'polibedah', 'input', 'polibedah', 'aktif', '', '', ''),
('st21', 'polifisio', '123456', 'polifisio', 'input', 'polifisio', 'aktif', '', '', ''),
('st22', 'poligigi', '123456', 'poligigi', 'input', 'poligigi', 'aktif', '', '', ''),
('st23', 'poliinternis', '123456', 'poliinternis', 'input', 'poliinternis', 'aktif', '', '', ''),
('st24', 'polijantung', '123456', 'polijantung', 'input', 'polijantung', 'aktif', '', '', ''),
('st25', 'polikulit', '123456', 'polikulit', 'input', 'polikulit', 'aktif', '', '', ''),
('st26', 'polimata', '123456', 'polimata', 'input', 'polimata', 'aktif', '', '', ''),
('st27', 'poliobgyne', '123456', 'poliobgyne', 'input', 'poliobgyne', 'aktif', '', '', ''),
('st28', 'politht', '123456', 'politht', 'input', 'politht', 'aktif', '', '', ''),
('st29', 'poliumum', '123456', 'poliumum', 'input', 'poliumum', 'aktif', '', '', ''),
('st30', 'igd', '1234560', 'igd', 'admin', 'igd', 'aktif', '', '', ''),
('st31', 'gizi', '123456', 'gizi', 'admin', 'gizi', 'aktif', '', '', ''),
('st32', 'rawatinap', '1234560', 'rawatinap', 'admin', 'rawatinap', 'aktif', '', '', ''),
('st33', 'rawatjalan', '1234560', 'rawatjalan', 'admin', 'rawatjalan', 'aktif', '', '', ''),
('st34', 'bpjs', '123456', 'bpjs', 'admin', 'bpjs', 'aktif', '', '', ''),
('st34121', 'returobat', '123456', 'Retur Obat', 'input', 'retur obat', 'aktif', '', '', ''),
('st3444', 'igdfarmasi', '123456', 'igd Farmasi', 'input', 'igdfarmasi', 'aktif', '', '', ''),
('st401', 'indri', 'november', 'Indri Astutik', 'admin', 'rawatinapltanak', 'aktif', '', '', ''),
('st4012', 'kebidananlt', 'november', 'kebidanan', 'admin', 'rawatinapltkebidanan', 'aktif', '', '', ''),
('st41', 'fery', 'irna', 'Ferry Ardianto', 'input', 'rawatinap', 'aktif', '', '', ''),
('st43', 'rama', 'irna', 'Rama Febriandini Putri', 'input', 'rawatinap', 'aktif', '', '', ''),
('st44', 'lena', 'irna', 'Lenaria Togatorup', 'input', 'rawatinap', 'aktif', '', '', ''),
('st45', 'otong', 'irna', 'Faturahman', 'input', 'rawatinap', 'aktif', '', '', ''),
('st46', 'iwan', 'irna', 'Muhammad Ridwan', 'input', 'rawatinap', 'aktif', '', '', ''),
('st47', 'jati', 'irna', 'Jati Luya', 'input', 'rawatinap', 'aktif', '', '', ''),
('st48', 'chan', 'irna', 'Arifin Chan', 'input', 'rawatinap', 'aktif', '', '', ''),
('st49', 'evita', 'irna', 'Evitasari', 'input', 'rawatinap', 'aktif', '', '', ''),
('st50', 'dian', 'irna', 'Raja Wisdiani', 'input', 'rawatinap', 'aktif', '', '', ''),
('st51', 'yuyun', 'november', 'Siti Sriwahyuni', 'admin', 'rawatinapltumum', 'non_aktif', '', '', ''),
('st52', 'murni', 'irna', 'Hikmah Murni', 'input', 'rawatinap', 'aktif', '', '', ''),
('st53', 'oja', 'irna', 'Siti Muhajaroh', 'input', 'rawatinap', 'aktif', '', '', ''),
('st54', 'razi', 'irna', 'Fachrur Razi', 'input', 'rawatinap', 'aktif', '', '', ''),
('st55', 'vera', 'irna', 'Norverawati', 'admin', 'rawatinapltumum', 'aktif', '', '', ''),
('st56', 'noni', 'irna', 'Noni Agustina', 'input', 'rawatinap', 'aktif', '', '', ''),
('st57', 'nando', 'irna', 'Fernando Sitohang', 'input', 'rawatinap', 'aktif', '', '', ''),
('st58', 'sinta', 'irna', 'Sinta Yolanda', 'input', 'rawatinap', 'aktif', '', '', ''),
('st60', 'syahrul', 'igd', 'Syahrul Nizam', 'admin', 'igd', 'aktif', '', '', ''),
('st61', 'roni', 'igd', 'Roni Kasito', 'input', 'igd', 'aktif', '', '', ''),
('st62', 'vivi', 'igd', 'Vivi Padang', 'input', 'igd', 'aktif', '', '', ''),
('st63', 'heri', 'igd', 'Heri Pebrianto', 'input', 'igd', 'aktif', '', '', ''),
('st64', 'silvia', 'igd', 'Silvia Wahyu', 'input', 'igd', 'aktif', '', '', ''),
('st65', 'rice', 'igd', 'Rice Febrina', 'input', 'igd', 'aktif', '', '', ''),
('st66', 'nola', 'igd', 'Nola Wardana', 'input', 'igd', 'aktif', '', '', ''),
('st67', 'el', 'igd', 'Fachrul El Rozi', 'input', 'igd', 'aktif', '', '', ''),
('st68', 'rindi', 'igd', 'Rindi Muviyani', 'input', 'igd', 'aktif', '', '', ''),
('st69', 'benny', 'igd', 'Benny Do Rasoki', 'input', 'igd', 'aktif', '', '', ''),
('st70', 'hanif', 'igd', 'Hanifsyah', 'input', 'igd', 'aktif', '', '', ''),
('st71', 'rosi', 'igd', 'Rosiana', 'input', 'igd', 'aktif', '', '', ''),
('st80', 'linda', 'linda', 'Maslinda', 'input', 'labor', 'aktif', '', '', ''),
('st81', 'hesti', 'eggy', 'Hesti Rianti Melsa', 'input', 'labor', 'aktif', '', '', ''),
('st82', 'yuni', 'labor', 'Yuni Neldawati', 'input', 'labor', 'aktif', '', '', ''),
('st83', 'bibah', 'lab', 'Nurhabibah', 'input', 'labor', 'aktif', '', '', ''),
('st85', 'ikhsan', 'labor', 'Muhammad Ikhsan', 'input', 'labor', 'aktif', '', '', ''),
('st86', 'desi', 'labor', 'Desi Prayuni', 'input', 'labor', 'aktif', '', '', ''),
('st87', 'tito', 'labor', 'Tito Saputra', 'input', 'labor', 'aktif', '', '', ''),
('st88', 'riana', 'labor', 'Riana Savi', 'input', 'labor', 'aktif', '', '', ''),
('staszfr', 'kartikalog', 'alika', 'logistik farmasi', 'input', 'logistik farmasi', 'aktif', '', '', ''),
('STXN9G2S0J', 'aina', 'kasirrsbt', 'aina frida', 'input', 'kasir', 'aktif', '', '', ''),
('T6R9345S76', 'Rio', '12345', 'rio herianda', 'admin', 'rekam medis', 'aktif', '', '', ''),
('tbe5rnygserff', 'dppsungairaya', 'dppsungairaya', 'DPP Sungai Raya', 'admin', 'sungairaya', 'aktif', '', '', ''),
('vbfgtr09', 'okta', '111094', 'okta', 'input', 'kebidanan', 'aktif', '', '', ''),
('VBXNY8496T', 'yogivan', '123456', 'yogi vebrin anda', 'input', 'apotik', 'aktif', '', '', ''),
('vfgdret78', 'endang', '261286', 'endang', 'input', 'kebidanan', 'aktif', '', '', ''),
('W0P0D7353G', 'Pandos', '123456', 'pandos prima indra', 'input', 'rekam medis', 'aktif', '', '', ''),
('W57EDD3W5D', 'sinta', '50893', 'sinta angraeni', 'input', 'apotik', 'aktif', '', '', ''),
('X4CQNY0J06', 'evayanang', 'tg', 'evy rosfianti', 'input', 'apotik', 'aktif', '', '', ''),
('Y3W74OD052', 'anes', '140990', 'syafranis', 'input', 'apotik', 'aktif', '', '', ''),
('yayadee34', 'yaya', '010894', 'yaya', 'input', 'kebidanan', 'aktif', '', '', ''),
('YHJ72RRP21', 'azzam', 'azam11', 'chairul zaman', 'input', 'apotik', 'aktif', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id_upload` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `file` varchar(100) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `pegawai_input` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work_non`
--

CREATE TABLE `work_non` (
  `id_work_non` varchar(100) NOT NULL,
  `diklat` double NOT NULL,
  `spd_setiap` double NOT NULL,
  `catat_pelaksanaan` double NOT NULL,
  `rekap_absen` double NOT NULL,
  `surat_keputusan` double NOT NULL,
  `perm_bulanan` double NOT NULL,
  `naskah_dinas` double NOT NULL,
  `arsip_data_staffa` double NOT NULL,
  `arsip_data_staffb` double NOT NULL,
  `sub_b_non` double NOT NULL,
  `id_staff` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work_struk`
--

CREATE TABLE `work_struk` (
  `id_work_struk` varchar(100) NOT NULL,
  `naskah_peraturan` double NOT NULL,
  `naskah_pedoman` double NOT NULL,
  `naskah_program` double NOT NULL,
  `panduan` double NOT NULL,
  `spo` double NOT NULL,
  `terbit_se` double NOT NULL,
  `terbit_sk` double NOT NULL,
  `terbit_sp` double NOT NULL,
  `terbit_st` double NOT NULL,
  `sub_b_struk` double NOT NULL,
  `id_staff` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `cuti` (`id_pegawai`);

--
-- Indexes for table `detail_pegawai`
--
ALTER TABLE `detail_pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `detail_pegawai` (`id_pegawai`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id_izin`),
  ADD KEY `izin` (`id_pegawai`),
  ADD KEY `jenis_izin` (`id_jenis_izin`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `jadwal` (`id_pegawai`);

--
-- Indexes for table `jadwal_dinas`
--
ALTER TABLE `jadwal_dinas`
  ADD PRIMARY KEY (`id_jadwal_dinas`),
  ADD KEY `jadwal_dinas_pegawai` (`id_pegawai`),
  ADD KEY `jadwal_dinas_jadwal` (`id_jadwal`);

--
-- Indexes for table `jenis_izin`
--
ALTER TABLE `jenis_izin`
  ADD PRIMARY KEY (`id_jenis_izin`);

--
-- Indexes for table `leadership`
--
ALTER TABLE `leadership`
  ADD PRIMARY KEY (`id_leadership`);

--
-- Indexes for table `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id_lembur`),
  ADD KEY `lembur` (`id_pegawai`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `pegawai_staff` (`id_staff`);

--
-- Indexes for table `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`id_promosi`);

--
-- Indexes for table `pros_att`
--
ALTER TABLE `pros_att`
  ADD PRIMARY KEY (`id_pros_att`);

--
-- Indexes for table `rel_dis`
--
ALTER TABLE `rel_dis`
  ADD PRIMARY KEY (`id_rel_dis`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_upload`),
  ADD KEY `upload_pegawai` (`id_pegawai`);

--
-- Indexes for table `work_non`
--
ALTER TABLE `work_non`
  ADD PRIMARY KEY (`id_work_non`);

--
-- Indexes for table `work_struk`
--
ALTER TABLE `work_struk`
  ADD PRIMARY KEY (`id_work_struk`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `detail_pegawai`
--
ALTER TABLE `detail_pegawai`
  ADD CONSTRAINT `detail_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `izin`
--
ALTER TABLE `izin`
  ADD CONSTRAINT `izin` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `jenis_izin` FOREIGN KEY (`id_jenis_izin`) REFERENCES `jenis_izin` (`id_jenis_izin`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `jadwal_dinas`
--
ALTER TABLE `jadwal_dinas`
  ADD CONSTRAINT `jadwal_dinas_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`),
  ADD CONSTRAINT `jadwal_dinas_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `lembur`
--
ALTER TABLE `lembur`
  ADD CONSTRAINT `lembur` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_staff` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`);

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `upload_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
