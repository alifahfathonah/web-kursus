-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `db_kursus`;
CREATE DATABASE `db_kursus` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_kursus`;

DROP TABLE IF EXISTS `tbl_mbanner`;
CREATE TABLE `tbl_mbanner` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `text_banner` varchar(50) NOT NULL,
  `file_banner` text,
  `isactive` tinyint(1) NOT NULL,
  `createdate` datetime NOT NULL,
  `editdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_mbanner`;
INSERT INTO `tbl_mbanner` (`id_banner`, `text_banner`, `file_banner`, `isactive`, `createdate`, `editdate`) VALUES
(1,	'Red & White Course',	'banner1.png',	1,	'2018-04-08 00:00:00',	NULL),
(2,	'Mengubah Anak Biasa Menjadi Istimewa',	'banner2.jpg',	1,	'2018-04-08 00:00:00',	NULL),
(3,	'Bergabunglah bersama kami',	'banner3.jpg',	1,	'2018-04-08 00:00:00',	NULL);

DROP TABLE IF EXISTS `tbl_mblog`;
CREATE TABLE `tbl_mblog` (
  `id_blog` int(11) NOT NULL AUTO_INCREMENT,
  `judul_blog` varchar(100) DEFAULT NULL,
  `deskripsi_blog` text NOT NULL,
  `alamat_blog` text,
  `isactive` tinyint(1) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_blog`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_mblog`;
INSERT INTO `tbl_mblog` (`id_blog`, `judul_blog`, `deskripsi_blog`, `alamat_blog`, `isactive`, `createdate`, `editdate`) VALUES
(4,	'Blog 1',	'Deskripsi Blog 1<br>',	'http://www.google.com',	1,	'2018-04-15 07:00:27',	NULL);

DROP TABLE IF EXISTS `tbl_mconfigemail`;
CREATE TABLE `tbl_mconfigemail` (
  `id_config_email` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` text,
  `editdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_config_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_mconfigemail`;
INSERT INTO `tbl_mconfigemail` (`id_config_email`, `email`, `password`, `editdate`) VALUES
(1,	'rednwhite012@gmail.com',	'redandwhite123',	'2018-04-14 22:30:31');

DROP TABLE IF EXISTS `tbl_mgaleri`;
CREATE TABLE `tbl_mgaleri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `tipe_galeri` varchar(5) DEFAULT NULL,
  `nama_galeri` varchar(100) DEFAULT NULL,
  `deskripsi_galeri` text,
  `file_preview` text NOT NULL,
  `file_galeri` text,
  `isactive` tinyint(1) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_mgaleri`;
INSERT INTO `tbl_mgaleri` (`id_galeri`, `tipe_galeri`, `nama_galeri`, `deskripsi_galeri`, `file_preview`, `file_galeri`, `isactive`, `createdate`, `editdate`) VALUES
(8,	'foto',	'Foto 1',	'Deskripsi Foto 1<br>',	'Foto_12018-04-15_06:48:17.png',	'gFoto_12018-04-15_06:48:17.png',	1,	'2018-04-15 06:48:17',	NULL),
(9,	'video',	'Video 1',	'Deskripsi Video 1',	'Video_12018-04-15_06:55:47.png',	'gVideo_12018-04-15_06:55:47.MP4',	1,	'2018-04-15 06:55:47',	NULL),
(10,	'ebook',	'Ebook 1',	'Deskripsi Ebook 1',	'Ebook_12018-04-15_06:59:01.png',	'gEbook_12018-04-15_06:59:01.pdf',	1,	'2018-04-15 06:59:01',	NULL);

DROP TABLE IF EXISTS `tbl_mhubungi_kami`;
CREATE TABLE `tbl_mhubungi_kami` (
  `id_hubungi_kami` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` text,
  `no_telepon` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `maps` text,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `googleplus` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_hubungi_kami`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_mhubungi_kami`;
INSERT INTO `tbl_mhubungi_kami` (`id_hubungi_kami`, `alamat`, `no_telepon`, `email`, `maps`, `facebook`, `twitter`, `googleplus`, `linkedin`, `createdate`, `editdate`) VALUES
(1,	'Jl. K.H. Amin Jasuta No.29 Kaloran Brimob, Serang',	'628212341234',	'cs@rednwhite.com',	'<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.1134017993854!2d106.1393030641252!3d-6.1154330116731535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e418b274c64a1e3%3A0x2268f748801fb7ae!2sJl.+KH.+Amin+Jasuta+No.29%2C+Kec.+Serang%2C+Kota+Serang%2C+Banten+42115!5e0!3m2!1sen!2sid!4v1447764153926\" width=\"100%\" height=\"100%\" frameborder=\"0\" style=\"border:0\" allowfullscreen class=\"wow fadeInUp\"></iframe>',	'http:///www.facebook.com/rednwhite',	'http:///www.twitter.com/rednwhite',	'http:///www.googleplus.com/rednwhite',	'http:///www.linkedin.com/rednwhite',	'2018-04-08 00:00:00',	'2018-04-14 19:17:08');

DROP TABLE IF EXISTS `tbl_mpengajar`;
CREATE TABLE `tbl_mpengajar` (
  `id_pengajar` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `no_telepon` varchar(13) DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pengajar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_mpengajar`;
INSERT INTO `tbl_mpengajar` (`id_pengajar`, `nama`, `alamat`, `jenis_kelamin`, `no_telepon`, `isactive`, `createdate`, `editdate`) VALUES
(1,	'Izni juga',	'Jl. jakarta izni',	'P',	'081212341234',	1,	'2018-04-08 00:00:00',	NULL);

DROP TABLE IF EXISTS `tbl_mprogram`;
CREATE TABLE `tbl_mprogram` (
  `id_program` int(11) NOT NULL AUTO_INCREMENT,
  `kode_program` varchar(10) DEFAULT NULL,
  `nama_program` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `biaya` int(11) DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_program`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_mprogram`;
INSERT INTO `tbl_mprogram` (`id_program`, `kode_program`, `nama_program`, `deskripsi`, `biaya`, `isactive`, `createdate`, `editdate`) VALUES
(1,	'PROG0001',	'TOEFL Preparation',	'TOEFL Preparation',	200000,	1,	'2018-04-08 00:00:00',	NULL),
(2,	'PROG0002',	'English Special Purpose',	'Belajar bahasa Inggris dengan grammar yang biasa dipakai orang British',	500000,	1,	'2018-04-08 00:00:00',	NULL),
(3,	'PROG0003',	'In House Training',	'Belajar bahasa Inggris di tiap-tiap perusahaan untuk melatih para karyawan yang bekerja',	5000000,	1,	'2018-04-08 00:00:00',	NULL),
(4,	'PROG0004',	'Private',	'Kursus pribadi bisa panggilan atau langsung datang ke tempat',	3000000,	1,	'2018-04-08 00:00:00',	NULL);

DROP TABLE IF EXISTS `tbl_mquotes`;
CREATE TABLE `tbl_mquotes` (
  `id_quotes` int(11) NOT NULL AUTO_INCREMENT,
  `isi_quotes` varchar(200) DEFAULT NULL,
  `penulis_quotes` varchar(100) DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_quotes`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_mquotes`;
INSERT INTO `tbl_mquotes` (`id_quotes`, `isi_quotes`, `penulis_quotes`, `isactive`, `createdate`, `editdate`) VALUES
(1,	'IF YOU CAN NOT DO GREAT THINGS, DO SMALL THINGS IN A GREAT WAY',	'Napoleon Hill',	0,	'2018-04-08 00:00:00',	NULL),
(2,	'TIDAK ADA PEKERJAAN YANG SULIT BILA TIDAK DIKERJAKAN',	'MARIO TELER',	1,	'2018-04-08 00:00:00',	NULL);

DROP TABLE IF EXISTS `tbl_msiswa`;
CREATE TABLE `tbl_msiswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `kode_siswa` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `no_telepon` varchar(13) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `isactive` tinyint(1) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_msiswa`;
INSERT INTO `tbl_msiswa` (`id_siswa`, `kode_siswa`, `nama`, `alamat`, `jenis_kelamin`, `no_telepon`, `tanggal_lahir`, `email`, `isactive`, `createdate`, `editdate`) VALUES
(3,	'S000000001',	'Dermawan Suprihatin',	'Jl. Jakarta',	'L',	'082298811904',	'1993-03-22',	'dermawan.suprihatin@gmail.com',	1,	'2018-04-15 06:40:01',	NULL),
(4,	'S000000002',	'Izni Andriyani Maulida',	'Komp. Kramatwatu Serang, Banten',	'P',	'089687264995',	'1994-08-22',	'izniandriyanimaulida@gmail.com',	1,	'2018-04-15 11:20:38',	NULL);

DROP TABLE IF EXISTS `tbl_mtentang_kami`;
CREATE TABLE `tbl_mtentang_kami` (
  `id_tentang_kami` int(11) NOT NULL AUTO_INCREMENT,
  `text_tentang_kami` text,
  `text_visi` text,
  `text_misi` text,
  `createdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tentang_kami`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_mtentang_kami`;
INSERT INTO `tbl_mtentang_kami` (`id_tentang_kami`, `text_tentang_kami`, `text_visi`, `text_misi`, `createdate`, `editdate`) VALUES
(1,	'Red &amp; White Course adalah sebuah lembaga pendidikan non formal yang bertujuan memberikan pembekalan kemampuan bahasa inggris dengan metode mutakhir untuk mempercepat capaian kemampuan tanpa membuang waktu lama dan efektif. Menjawab tantangan jaman yang sangat cepat berubah baik dari segi kebutuhan maupun tuntutan.<br>&nbsp;<br>\r\nRed &amp; White English Course memberikan solusi bagi siswa yang tidak suka Bahasa Inggris untuk belajar sambil bermain dengan focus pada otak kanan melalui gambar, video, alat peraga yang dapat meningkatkan kecerdasan otak kanan, meningkatkan konsentrasi serta kejelian siswa',	'Visi.<br>Keep away from people who try to belittle your ambitions. Small people always do that but the really great.',	'Misi.<br>Keep away from people who try to belittle your ambitions. Small people always do that but the really great.',	'2018-04-08 00:00:00',	'2018-04-14 11:31:47');

DROP TABLE IF EXISTS `tbl_muser`;
CREATE TABLE `tbl_muser` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `kode_siswa` varchar(10) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` text,
  `level_role` int(11) NOT NULL,
  `isactive` tinyint(1) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_muser`;
INSERT INTO `tbl_muser` (`id_user`, `kode_siswa`, `username`, `password`, `level_role`, `isactive`, `createdate`, `editdate`) VALUES
(1,	NULL,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	1,	1,	'2018-04-08 00:00:00',	'2018-04-14 21:22:35'),
(9,	'S000000001',	'dermawan',	'e10adc3949ba59abbe56e057f20f883e',	3,	1,	'2018-04-15 06:40:01',	NULL),
(10,	NULL,	'akuntan',	'5acc540c98fc1ca5aeaaa9d5c69771c8',	2,	1,	'2018-04-15 07:00:45',	NULL),
(11,	'S000000002',	'iznindriy',	'9b4d0e5f8ec0bc2b75ea9c66c4e3f495',	3,	1,	'2018-04-15 11:20:38',	NULL);

DROP TABLE IF EXISTS `tbl_muserrole`;
CREATE TABLE `tbl_muserrole` (
  `id_userrole` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(20) DEFAULT NULL,
  `level_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_userrole`),
  UNIQUE KEY `level_role` (`level_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_muserrole`;
INSERT INTO `tbl_muserrole` (`id_userrole`, `nama_role`, `level_role`) VALUES
(1,	'Admin',	1),
(2,	'Akuntan',	2),
(3,	'Siswa',	3);

DROP TABLE IF EXISTS `tbl_mweb_config`;
CREATE TABLE `tbl_mweb_config` (
  `id_web_config` int(11) NOT NULL AUTO_INCREMENT,
  `nama_web` varchar(50) DEFAULT NULL,
  `file_logo` text,
  `merchant_id` varchar(10) NOT NULL,
  `client_key` varchar(100) NOT NULL,
  `server_key` varchar(100) NOT NULL,
  `createdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_web_config`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_mweb_config`;
INSERT INTO `tbl_mweb_config` (`id_web_config`, `nama_web`, `file_logo`, `merchant_id`, `client_key`, `server_key`, `createdate`, `editdate`) VALUES
(1,	'Red And White',	'logo.png',	'M129418',	'SB-Mid-client-7RhJhOZwLFa4KcQI',	'SB-Mid-server-aV7QpBITpsHP-BgQVOhKJkWd',	'2018-04-14 00:00:00',	'2018-04-14 21:58:39');

DROP TABLE IF EXISTS `tbl_ttransaction`;
CREATE TABLE `tbl_ttransaction` (
  `id_transaction` int(11) NOT NULL AUTO_INCREMENT,
  `payment_id` varchar(50) DEFAULT NULL,
  `payment_amount` int(11) DEFAULT NULL,
  `id_siswa` varchar(10) DEFAULT NULL,
  `id_program` varchar(10) DEFAULT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `nama_program` varchar(50) NOT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL,
  `status_transaksi` varchar(30) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `editdate` datetime NOT NULL,
  PRIMARY KEY (`id_transaction`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_ttransaction`;
INSERT INTO `tbl_ttransaction` (`id_transaction`, `payment_id`, `payment_amount`, `id_siswa`, `id_program`, `nama_siswa`, `nama_program`, `tanggal_transaksi`, `status_transaksi`, `createdate`, `editdate`) VALUES
(14,	'T000000001',	200000,	'S000000001',	'PROG0001',	'Dermawan Suprihatin',	'TOEFL Preparation',	'2018-04-15 08:12:12',	'Pending',	'2018-04-15 08:12:12',	'0000-00-00 00:00:00'),
(15,	'T000000002',	500000,	'S000000001',	'PROG0002',	'Dermawan Suprihatin',	'English Special Purpose',	'2018-04-15 08:32:25',	'Pending',	'2018-04-15 08:32:25',	'0000-00-00 00:00:00'),
(16,	'T000000003',	3000000,	'S000000001',	'PROG0004',	'Dermawan Suprihatin',	'Private',	'2018-04-15 10:06:27',	'Pending',	'2018-04-15 10:06:27',	'0000-00-00 00:00:00'),
(17,	'T000000004',	5000000,	'S000000001',	'PROG0003',	'Dermawan Suprihatin',	'In House Training',	'2018-04-15 10:17:14',	'Pending',	'2018-04-15 10:17:14',	'0000-00-00 00:00:00'),
(18,	'T000000005',	200000,	'S000000001',	'PROG0001',	'Dermawan Suprihatin',	'TOEFL Preparation',	'2018-04-15 10:28:52',	'Pending',	'2018-04-15 10:28:52',	'0000-00-00 00:00:00'),
(19,	'T000000006',	5000000,	'S000000001',	'PROG0003',	'Dermawan Suprihatin',	'In House Training',	'2018-04-15 10:41:25',	'capture',	'2018-04-15 10:41:25',	'2018-04-15 10:43:09'),
(20,	'T000000007',	3000000,	'S000000001',	'PROG0004',	'Dermawan Suprihatin',	'Private',	'2018-04-15 10:44:41',	'capture',	'2018-04-15 10:44:41',	'2018-04-15 10:45:46'),
(21,	'T000000008',	200000,	'S000000001',	'PROG0001',	'Dermawan Suprihatin',	'TOEFL Preparation',	'2018-04-15 10:47:38',	'settlement',	'2018-04-15 10:47:38',	'2018-04-15 10:48:25'),
(22,	'T000000009',	200000,	'S000000001',	'PROG0001',	'Dermawan Suprihatin',	'TOEFL Preparation',	'2018-04-15 10:49:35',	'settlement',	'2018-04-15 10:49:35',	'2018-04-15 10:51:09'),
(23,	'T000000010',	200000,	'S000000002',	'PROG0001',	'Izni Andriyani Maulida',	'TOEFL Preparation',	'2018-04-15 12:10:26',	'Pending',	'2018-04-15 12:10:26',	'0000-00-00 00:00:00');

-- 2018-04-16 03:50:30
