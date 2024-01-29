/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.7.33 : Database - kegiatan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `kegiatan` */

DROP TABLE IF EXISTS `kegiatan`;

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kegiatan` varchar(100) NOT NULL,
  `tgl_mulai` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `kegiatan` */

insert  into `kegiatan`(`id`,`kegiatan`,`tgl_mulai`) values 
(3,'Kegiatan 1','2022-03-29'),
(4,'Kegiatan 2','2022-04-02');

/*Table structure for table `kegiatan_dok` */

DROP TABLE IF EXISTS `kegiatan_dok`;

CREATE TABLE `kegiatan_dok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kegiatan_id` int(11) NOT NULL,
  `namafile` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kegiatan_dok` */

/*Table structure for table `laporan` */

DROP TABLE IF EXISTS `laporan`;

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kegiatan_id` int(100) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `laporan` */

/*Table structure for table `lpj` */

DROP TABLE IF EXISTS `lpj`;

CREATE TABLE `lpj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `laporan_id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jumlah` double NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `lpj` */

/*Table structure for table `panitia` */

DROP TABLE IF EXISTS `panitia`;

CREATE TABLE `panitia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kegiatan_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `jabatan` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `panitia` */

insert  into `panitia`(`id`,`kegiatan_id`,`tutor_id`,`jabatan`) values 
(1,3,1,'1'),
(2,4,1,'2');

/*Table structure for table `proposal` */

DROP TABLE IF EXISTS `proposal`;

CREATE TABLE `proposal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kegiatan_id` int(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tujuan` text NOT NULL,
  `acc_kpnt` int(11) DEFAULT NULL,
  `acc_kpkbm` int(11) DEFAULT NULL,
  `acc_bpkbm` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `proposal` */

insert  into `proposal`(`id`,`kegiatan_id`,`judul`,`tgl_mulai`,`tgl_selesai`,`tujuan`,`acc_kpnt`,`acc_kpkbm`,`acc_bpkbm`) values 
(3,4,'Proposal Kegiatan 2','2022-04-14','2022-03-31','<div id=\"lipsum\">\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ipsum \r\nenim, condimentum at sodales eu, consequat ac diam. Nullam egestas \r\nvarius metus ultrices scelerisque. Donec at dapibus elit. Quis<span style=\"text-decoration: underline;\">que nibh \r\nmagna, aliquet quis mi in, rutrum egestas libero. Curabitur ac sodales \r\nvelit. Cras lobortis gravida mi eget laoreet. Suspendisse convallis \r\nmollis ex vulputate aliquam. Ut facilisis tempor interdum. Maecenas ac \r\npo</span>suere velit. Nam dignissim euismod nisi, id hendrerit purus tincidunt \r\nat. Duis sagittis ante in pellentesque hendrerit.\r\n</p>\r\n<p>\r\nCras mattis, tellus in suscipit eleifend, velit nunc efficitur ex, et \r\nfringilla dui enim sed tellus. Morbi leo odio, vulputate sit amet nisl \r\neu, tincidunt ornare neque. Sed nec convallis lacus. Sed nec magna id \r\nurna dapibus porttitor. Aliquam eget nunc auctor, tincidunt metus \r\nfermentum, lacinia lorem. In elit magna, pretium eu erat vel, dignissim \r\ncursus libero. Maecenas eleifend lacus eget eros sollicitudin, a laoreet\r\n erat iaculis. Suspendisse at magna semper, vulputate neque ut, \r\nconvallis felis. Ut dapibus malesuada augue.\r\n</p>\r\n<p>\r\nNullam sed lacinia ante, vel pellentesque massa. Phasellus porttitor \r\nvolutpat nisl, vitae blandit elit. Nunc ut quam eget mauris volutpat \r\nvolutpat. Praesent quis iaculis mauris, iaculis semper mi. Pellentesque \r\nat nisi ipsum. Sed eleifend velit at nisl finibus condimentum. Cras \r\nfermentum, dui vitae luctus cursus, mi orci volutpat ligula, vitae \r\naliquet urna tellus at purus.\r\n</p>\r\n<p>\r\nUt finibus, orci eu ultricies vehicula, erat orci cursus augue, quis \r\nlaoreet odio lorem eget ante. Nulla in sollicitudin justo. Morbi dapibus\r\n ante magna, ac egestas dolor viverra et. Vivamus eget magna dui. \r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere\r\n cubilia curae; Praesent augue nisi, rutrum in placerat eget, \r\npellentesque sed ex. Praesent interdum, nunc dignissim suscipit la<span style=\"font-style: italic;\">cinia,\r\n mi tortor imperdiet turpis, lacinia congue odio dolor quis dui. \r\nVestibulum sollicitudin ligula eget condimentum rutrum. Ut nec finibus \r\ndiam, ut posuere orci. Cras vel ipsum suscipit, luctus purus ut, \r\nconsectetur lorem. Vestibulum eu elit eros. Maecenas rutrum ullamcorper \r\nvarius. Cu</span>rabitur tempus sollicitudin rhoncus. Sed quis ultrices quam.\r\n</p>\r\n<p>\r\nDonec erat l<span style=\"font-weight: bold;\">igula, facilisis sit amet dolor quis, rutrum lacinia sapien.\r\n Ut elementum nisl vel sem laoreet consequat. Curabitur sodales accumsan\r\n tempor. Proin volutpat mollis turpis quis placerat. Maecenas tristique \r\neget nulla in sagittis. In ullamcorper lectus sed sem rutrum, ac cursus \r\nlibero ultricies. Cras ultricies odio et tristique ultricies. Quisque \r\nmaximus, tortor et molestie pellentesque, velit mi gravida magna, at \r\neuismod ante risus ut velit. Nullam id mattis dui, non molestie diam. \r\nEtiam pretium libero dapibus magna mattis, id rutrum urna ullamcorper. \r\nMorbi rhoncus pretium augue vel sodales. Donec molestie purus dapibus \r\ncongue ornare.\r\n</span></p></div><p></p>',1,NULL,NULL);

/*Table structure for table `rab` */

DROP TABLE IF EXISTS `rab`;

CREATE TABLE `rab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jumlah` double NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rab` */

/*Table structure for table `rapat` */

DROP TABLE IF EXISTS `rapat`;

CREATE TABLE `rapat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kegiatan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `notulen` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `rapat` */

insert  into `rapat`(`id`,`kegiatan_id`,`tanggal`,`jam_mulai`,`lokasi`,`notulen`) values 
(1,1,'2022-04-07','12:22:00','aa',NULL),
(2,3,'2022-04-11','11:11:00','Los','');

/*Table structure for table `rapat_dok` */

DROP TABLE IF EXISTS `rapat_dok`;

CREATE TABLE `rapat_dok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rapat_id` int(11) NOT NULL,
  `namafile` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rapat_dok` */

/*Table structure for table `rapat_hadir` */

DROP TABLE IF EXISTS `rapat_hadir`;

CREATE TABLE `rapat_hadir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rapat_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rapat_hadir` */

/*Table structure for table `tutor` */

DROP TABLE IF EXISTS `tutor`;

CREATE TABLE `tutor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tutor` */

insert  into `tutor`(`id`,`nama`,`username`,`password`,`jabatan`) values 
(1,'plafound','plafound','$2y$10$rGv/Xd6BYofWrj4ZX1WgaONmUKOvU4stqER8lqnsKvadFZmZk6/2C','3'),
(2,'adminpla','admin','$2y$10$7mIFlP7SONUNUlQfDsOGt.PIfl8xguqWQNUlKOA0Qm0CrW3N2CB.m','1'),
(5,'ketuapkbm','ketuapkbm','$2y$10$ydzmfHgBBXr96TTVN3uPy.rTYRKQPjxOA0aISEztaBpYQaTTbZ662','1'),
(6,'Sekretaris PKBM','sekrepkbm','$2y$10$.nLqkja5u5b/O.TLEoFYremnI7cd4uLQYygt5awtSQdbY7pyrpjPy','2'),
(7,'Bendahar PKBM','bendapkbm','$2y$10$NwBDtXBMkIUu913Sn4HivuyEFn7bVdvtXVhtl.7Mrnz/t5GXy7.tG','2');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
