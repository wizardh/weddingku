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
  `address` varchar(255) DEFAULT NULL,
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

insert  into `guest`(`id`,`title`,`name`,`email`,`phone`,`address`,`notes`,`invitation_code`,`invited_by`,`is_attending`,`attendee`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Sdr','Keluarga & Kerabat',NULL,'','Cirebon & Jakarta','','gPD0r','Groom',1,1,'2022-03-15 12:29:36','2022-03-16 06:52:33',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `guestbook` */

insert  into `guestbook`(`id`,`guest_id`,`message`,`created_at`,`approved`,`approved_by`,`approved_at`) values 
(1,1,'Ini adalah komentar pesan pertama, selamat ya!','2022-03-15 12:38:09',0,'Groom','2022-03-15 12:45:30');

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
(1,'aya','$2y$10$4wD.m67lvuK7D05FhD1fBuzJTN2oi5Y7H0u30jw3z5QypXP/WYf6C','Groom','2022-03-16 06:52:10','127.0.0.1'),
(2,'niken','$2y$10$K8WiqbwNcPtxzDb60HrswulVx.3mAugs283LJX7ITpj8kK3hGUJNq','Bride',NULL,NULL);

/*Table structure for table `login_attempt` */

DROP TABLE IF EXISTS `login_attempt`;

CREATE TABLE `login_attempt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  `attempt_no` int(11) DEFAULT '0',
  `is_blocked` tinyint(1) DEFAULT '0',
  `first_attempt` datetime DEFAULT NULL,
  `last_attempt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `login_attempt` */

/*Table structure for table `wedding_settings` */

DROP TABLE IF EXISTS `wedding_settings`;

CREATE TABLE `wedding_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groom_name` varchar(100) DEFAULT NULL,
  `groom_nickname` varchar(50) DEFAULT NULL,
  `bride_name` varchar(100) DEFAULT NULL,
  `bride_nickname` varchar(50) DEFAULT NULL,
  `groom_parents` varchar(100) DEFAULT NULL,
  `bride_parents` varchar(100) DEFAULT NULL,
  `wedding_date` date DEFAULT NULL,
  `wedding_time` varchar(50) DEFAULT NULL,
  `akad_date` date DEFAULT NULL,
  `akad_time` varchar(50) DEFAULT NULL,
  `wedding_address` varchar(300) DEFAULT NULL,
  `akad_address` varchar(300) DEFAULT NULL,
  `health_protocol` tinyint(1) DEFAULT '1',
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wedding_settings` */

insert  into `wedding_settings`(`id`,`groom_name`,`groom_nickname`,`bride_name`,`bride_nickname`,`groom_parents`,`bride_parents`,`wedding_date`,`wedding_time`,`akad_date`,`akad_time`,`wedding_address`,`akad_address`,`health_protocol`,`updated_by`,`updated_at`) values 
(1,'M. N. Adhi Wiradharma','Aya','Niken Paramita','Niken','Bpk. Ir. Slamet A. Wirawan & Ibu Ira Puspasari (Alm.)','Bpk. Andri Amir (Alm.) & Ibu Asih','2022-08-20','10:00 - 13:00','2022-08-20','08:00 - 09:00','IS PLAZA Ballroom, Pramuka, Jakarta Timur','IS PLAZA Ballroom, Pramuka, Jakarta Timur',1,'Groom','2022-03-14 00:44:14');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
