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
  `title` varchar(20) DEFAULT 'Sdr.',
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `guest` */

insert  into `guest`(`id`,`title`,`name`,`email`,`phone`,`address`,`notes`,`invitation_code`,`invited_by`,`is_attending`,`attendee`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Sdr','Saudari Sekeluarga',NULL,'','Kelompok',NULL,'o7CnN','Groom',0,0,'2022-03-13 03:48:16','2022-03-13 09:07:04',NULL),
(2,'Bpk','Desa ',NULL,'','Desa Deso',NULL,'SW1nR','Groom',0,0,'2022-03-13 03:48:52','2022-03-13 06:13:52',NULL),
(3,'Dll','Dan Lain-Lain',NULL,'','haha hihi',NULL,'we1LV','Groom',0,0,'2022-03-13 03:49:36','2022-03-13 06:14:07',NULL),
(4,'','Salah Ketik Bro',NULL,'','Alamat Opsional',NULL,'MctQT','Groom',0,0,'2022-03-13 06:14:29','2022-03-13 06:23:33',NULL),
(5,'','U Wot M8',NULL,'','Dimensi Enam Dua',NULL,'N4q5d','Groom',0,0,'2022-03-13 06:15:28','2022-03-13 07:31:46',NULL),
(6,'','Tersesat Bersama',NULL,'','',NULL,'s97fH','Groom',0,0,'2022-03-13 06:18:54','2022-03-14 10:30:44',NULL),
(7,'','12312312321',NULL,'','sadasda',NULL,'sGa4t','Groom',0,0,'2022-03-14 10:18:55',NULL,NULL);

/*Table structure for table `guestbook` */

DROP TABLE IF EXISTS `guestbook`;

CREATE TABLE `guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_id` int(11) DEFAULT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  `approved` tinyint(1) DEFAULT '0',
  `approved_by` varchar(100) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `guestbook` */

insert  into `guestbook`(`id`,`guest_id`,`message`,`created_at`,`approved`,`approved_by`,`approved_at`) values 
(1,1,'Selamat ulang tahun ya!','2022-03-11 21:18:33',1,'Groom','2022-03-14 11:28:38'),
(2,1,'Eh sori, bukan selamat ulang tahun...','2022-03-11 21:18:51',1,'Groom','2022-03-13 12:16:54'),
(3,1,'Biarin deh, asal komentar aja yang penting guestbook-nya keisi','2022-03-11 21:53:09',1,'Groom','2022-03-13 11:44:58'),
(4,1,'Masih kurang, tambah lagi komentarnya biar bisa nge-scroll','2022-03-11 22:04:06',1,'Groom','2022-03-13 12:16:57'),
(5,1,'Tambah terus~','2022-03-11 22:04:47',1,'Groom','2022-03-13 11:45:01'),
(6,4,'Test input langsung dari sini','2022-03-13 12:00:57',1,'Groom','2022-03-13 12:16:59'),
(7,5,'yuwot met?','2022-03-14 11:17:46',0,NULL,NULL),
(8,5,'el mao wkwkwk','2022-03-14 11:22:05',1,'Groom','2022-03-14 11:28:58'),
(9,5,'semoga sudah bener','2022-03-14 11:22:35',0,NULL,NULL);

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT 'Groom',
  `last_login` datetime DEFAULT NULL,
  `last_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`id`,`username`,`password`,`user_type`,`last_login`,`last_ip`) values 
(1,'aya','$2y$10$eC2zusxWF9k.hoaagXGKN.2ez8yhsw7/hiG/KYlBYi20e2ENyRS1W','Groom',NULL,NULL),
(2,'niken','$2y$10$K8WiqbwNcPtxzDb60HrswulVx.3mAugs283LJX7ITpj8kK3hGUJNq','Bride',NULL,NULL);

/*Table structure for table `login_attemp` */

DROP TABLE IF EXISTS `login_attemp`;

CREATE TABLE `login_attemp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  `attempt_no` int(11) DEFAULT '0',
  `is_blocked` tinyint(1) DEFAULT '0',
  `first_attempt` datetime DEFAULT NULL,
  `last_attempt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `login_attemp` */

/*Table structure for table `wedding_settings` */

DROP TABLE IF EXISTS `wedding_settings`;

CREATE TABLE `wedding_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groom_name` varchar(100) DEFAULT NULL,
  `bride_name` varchar(100) DEFAULT NULL,
  `groom_parents` varchar(100) DEFAULT NULL,
  `bride_parents` varchar(100) DEFAULT NULL,
  `wedding_date` date DEFAULT NULL,
  `wedding_time` varchar(50) DEFAULT NULL,
  `akad_date` date DEFAULT NULL,
  `akad_time` varchar(50) DEFAULT NULL,
  `wedding_address` varchar(300) DEFAULT NULL,
  `akad_address` varchar(300) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wedding_settings` */

insert  into `wedding_settings`(`id`,`groom_name`,`bride_name`,`groom_parents`,`bride_parents`,`wedding_date`,`wedding_time`,`akad_date`,`akad_time`,`wedding_address`,`akad_address`,`updated_by`,`updated_at`) values 
(1,'M. N. Adhi Wiradharma (Aya)','Niken Paramita','Bpk. Ir. Slamet A. Wirawan & Ibu Ira Puspasari (Alm.)','Bpk. Andri Amir (Alm.) & Ibu Asih','2022-08-20','10:00 - 13:00','2022-08-20','08:00 - 09:00','IS PLAZA Ballroom, Pramuka, Jakarta Timur','IS PLAZA Ballroom, Pramuka, Jakarta Timur','Groom','2022-03-14 00:44:14');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
