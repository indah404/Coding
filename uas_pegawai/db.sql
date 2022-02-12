/*
SQLyog Professional v12.5.1 (32 bit)
MySQL - 10.4.18-MariaDB : Database - pegawai
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pegawai` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `pegawai`;

/*Table structure for table `data_pegawai` */

DROP TABLE IF EXISTS `data_pegawai`;

CREATE TABLE `data_pegawai` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `golongan` int(11) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `data_pegawai` */

insert  into `data_pegawai`(`nip`,`nama`,`golongan`) values 
('0099990','llllllll',1),
('1212','KKKKKKK',1),
('1212121212','12121212',2),
('123123','kakala',2),
('12345','ucup',3);

/*Table structure for table `mst_gaji` */

DROP TABLE IF EXISTS `mst_gaji`;

CREATE TABLE `mst_gaji` (
  `Id` int(11) NOT NULL,
  `golongan` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_gaji` */

insert  into `mst_gaji`(`Id`,`golongan`,`gaji`) values 
(1,1,1000000),
(2,2,800000),
(3,3,600000);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nip` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`nip`) values 
(1,'admin','0192023a7bbd73250516f069df18b500','12345');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
