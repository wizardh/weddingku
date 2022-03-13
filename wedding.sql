/*
SQLyog Community v13.1.5  (32 bit)
MySQL - 10.1.10-MariaDB : Database - wedding
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wedding` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `wedding`;

/*Table structure for table `guest` */

DROP TABLE IF EXISTS `guest`;

CREATE TABLE `guest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(18) DEFAULT NULL,
  `address` text,
  `notes` varchar(100) DEFAULT NULL,
  `invitation_code` varchar(100) DEFAULT NULL,
  `invited_by` enum('Groom','Bride') DEFAULT NULL,
  `is_attending` tinyint(1) DEFAULT '0',
  `attendee` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `guest` */

insert  into `guest`(`id`,`name`,`email`,`phone`,`address`,`notes`,`invitation_code`,`invited_by`,`is_attending`,`attendee`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Sahabat dan Keluarga',NULL,NULL,'Kelompok 4 Desa 5',NULL,'abcde21','Groom',0,0,'2022-03-11 10:09:55',NULL,NULL);

/*Table structure for table `guestbook` */

DROP TABLE IF EXISTS `guestbook`;

CREATE TABLE `guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_id` int(11) DEFAULT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `guestbook` */

insert  into `guestbook`(`id`,`guest_id`,`message`,`created_at`) values 
(1,1,'Selamat ulang tahun ya!','2022-03-11 21:18:33'),
(2,1,'Eh sori, bukan selamat ulang tahun...','2022-03-11 21:18:51'),
(3,1,'Biarin deh, asal komentar aja yang penting guestbook-nya keisi','2022-03-11 21:53:09'),
(4,1,'Masih kurang, tambah lagi komentarnya biar bisa nge-scroll','2022-03-11 22:04:06'),
(5,1,'Tambah terus~','2022-03-11 22:04:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
