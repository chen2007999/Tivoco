/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.24-log : Database - tivoco
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `ts_ci_sessions` */

DROP TABLE IF EXISTS `ts_ci_sessions`;

CREATE TABLE `ts_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ts_ci_sessions` */

insert  into `ts_ci_sessions`(`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) values ('4174f4bae076896dedf249c3a21d99c6','::1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0',1388082697,'a:2:{s:9:\"user_data\";s:0:\"\";s:11:\"member_data\";O:8:\"stdClass\":20:{s:2:\"id\";s:2:\"15\";s:10:\"first_name\";s:3:\"Nav\";s:9:\"last_name\";s:3:\"Jav\";s:9:\"user_name\";s:4:\"njav\";s:5:\"email\";s:19:\"navjav786@gmail.com\";s:8:\"password\";s:6:\"123456\";s:5:\"photo\";s:36:\"dfb4effbb96da21f4a4c9d23c6d6839c.jpg\";s:9:\"mobile_no\";s:0:\"\";s:10:\"university\";s:4:\"RIIU\";s:5:\"major\";s:14:\"Tets,test,test\";s:11:\"description\";s:17:\"<p>Testing...</p>\";s:18:\"registeration_date\";s:19:\"2013-12-15 10:56:40\";s:13:\"last_modified\";s:19:\"2013-12-15 04:19:19\";s:10:\"last_login\";s:19:\"2013-12-26 06:37:20\";s:2:\"ip\";s:3:\"::1\";s:6:\"visits\";s:2:\"23\";s:6:\"status\";s:6:\"Active\";s:19:\"is_profile_complete\";s:3:\"Yes\";s:15:\"activation_code\";s:20:\"ffdb28fbb154fbc789cd\";s:6:\"online\";s:2:\"No\";}}'),('4e03656e65a898b051002899909ee1d0','::1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0 FirePHP/0.7.4',1388084143,''),('604dfd709ed01d1bb752b1764e64a626','::1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0 FirePHP/0.7.4',1388084142,''),('6bde6c3a4f7fa1a956d5332470035fa5','::1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0 FirePHP/0.7.4',1388085044,''),('7e507f5242af455d84dd39d1be2c25ea','::1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0 FirePHP/0.7.4',1388085044,''),('b75b31902658c6bfacab627e42f2ee23','::1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0',1388084089,'a:1:{s:9:\"user_data\";s:0:\"\";}'),('c1808cec418e346e62e312a9a2d199f6','::1','Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36',1388082689,'a:2:{s:9:\"user_data\";s:0:\"\";s:11:\"member_data\";O:8:\"stdClass\":20:{s:2:\"id\";s:2:\"13\";s:10:\"first_name\";s:6:\"Naveed\";s:9:\"last_name\";s:5:\"Javed\";s:9:\"user_name\";s:11:\"njavhotmail\";s:5:\"email\";s:27:\"naveed_javed786@hotmail.com\";s:8:\"password\";s:6:\"123456\";s:5:\"photo\";s:11:\"big-img.png\";s:9:\"mobile_no\";s:0:\"\";s:10:\"university\";s:4:\"Fast\";s:5:\"major\";s:23:\"Science, Maths, Biology\";s:11:\"description\";s:69:\"Aenean ac vehicula augue. Proin risus diam, laoreet eget dapibus eget\";s:18:\"registeration_date\";s:19:\"2013-11-20 07:08:00\";s:13:\"last_modified\";s:19:\"2013-11-20 07:10:00\";s:10:\"last_login\";s:19:\"2013-11-23 11:43:16\";s:2:\"ip\";s:9:\"127.0.0.1\";s:6:\"visits\";s:1:\"2\";s:6:\"status\";s:6:\"Active\";s:19:\"is_profile_complete\";s:2:\"No\";s:15:\"activation_code\";s:20:\"549bffc14221664999e4\";s:6:\"online\";s:2:\"No\";}}'),('dd9410b63fc6a9e22b746d12b8c8ba5e','::1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0 FirePHP/0.7.4',1388085044,'a:2:{s:9:\"user_data\";s:0:\"\";s:11:\"member_data\";O:8:\"stdClass\":20:{s:2:\"id\";s:2:\"11\";s:10:\"first_name\";s:6:\"Naveed\";s:9:\"last_name\";s:6:\"Javaid\";s:9:\"user_name\";s:9:\"njavgmail\";s:5:\"email\";s:24:\"naveedjaved786@gmail.com\";s:8:\"password\";s:6:\"123456\";s:5:\"photo\";s:36:\"4fe1447ba733bc25b4e38d5a9d0f362f.jpg\";s:9:\"mobile_no\";s:0:\"\";s:10:\"university\";s:4:\"RIIU\";s:5:\"major\";s:26:\"Computer, Stats, Economics\";s:11:\"description\";s:649:\"<p>Nunc at est vel est placerat tempus. Suspendisse sit amet turpis bibendum, rhoncus ligula sit amet, adipiscing velit. Donec ullamcorper quis massa a feugiat. In pellentesque vestibulum varius. Mauris suscipit purus eu tristique scelerisque. Etiam in justo a ligula blandit sagittis in sed dolor.</p>\r\n<ul>\r\n<li>Nunc at est vel est placerat tempus.</li>\r\n<li>Suspendisse sit amet turpis bibendum.</li>\r\n<li>Rhoncus ligula sit amet, adipiscing velit.</li>\r\n</ul>\r\n<p>Donec ullamcorper quis massa a feugiat. In pellentesque vestibulum varius. Mauris suscipit purus eu tristique scelerisque. Etiam in justo a ligula blandit sagittis in sed dolor.</p>\";s:18:\"registeration_date\";s:19:\"2013-11-19 08:28:48\";s:13:\"last_modified\";s:19:\"2013-12-17 11:54:18\";s:10:\"last_login\";s:19:\"2013-12-26 07:02:44\";s:2:\"ip\";s:3:\"::1\";s:6:\"visits\";s:3:\"108\";s:6:\"status\";s:6:\"Active\";s:19:\"is_profile_complete\";s:3:\"Yes\";s:15:\"activation_code\";s:20:\"f46b0a4c552db4c15e3b\";s:6:\"online\";s:3:\"Yes\";}}'),('f5f098bd55c9f6049fd36adc298cc202','::1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0',1388084195,'a:2:{s:9:\"user_data\";s:0:\"\";s:11:\"member_data\";O:8:\"stdClass\":20:{s:2:\"id\";s:2:\"11\";s:10:\"first_name\";s:6:\"Naveed\";s:9:\"last_name\";s:6:\"Javaid\";s:9:\"user_name\";s:9:\"njavgmail\";s:5:\"email\";s:24:\"naveedjaved786@gmail.com\";s:8:\"password\";s:6:\"123456\";s:5:\"photo\";s:36:\"4fe1447ba733bc25b4e38d5a9d0f362f.jpg\";s:9:\"mobile_no\";s:0:\"\";s:10:\"university\";s:4:\"RIIU\";s:5:\"major\";s:26:\"Computer, Stats, Economics\";s:11:\"description\";s:649:\"<p>Nunc at est vel est placerat tempus. Suspendisse sit amet turpis bibendum, rhoncus ligula sit amet, adipiscing velit. Donec ullamcorper quis massa a feugiat. In pellentesque vestibulum varius. Mauris suscipit purus eu tristique scelerisque. Etiam in justo a ligula blandit sagittis in sed dolor.</p>\r\n<ul>\r\n<li>Nunc at est vel est placerat tempus.</li>\r\n<li>Suspendisse sit amet turpis bibendum.</li>\r\n<li>Rhoncus ligula sit amet, adipiscing velit.</li>\r\n</ul>\r\n<p>Donec ullamcorper quis massa a feugiat. In pellentesque vestibulum varius. Mauris suscipit purus eu tristique scelerisque. Etiam in justo a ligula blandit sagittis in sed dolor.</p>\";s:18:\"registeration_date\";s:19:\"2013-11-19 08:28:48\";s:13:\"last_modified\";s:19:\"2013-12-17 11:54:18\";s:10:\"last_login\";s:19:\"2013-12-26 06:54:56\";s:2:\"ip\";s:3:\"::1\";s:6:\"visits\";s:3:\"107\";s:6:\"status\";s:6:\"Active\";s:19:\"is_profile_complete\";s:3:\"Yes\";s:15:\"activation_code\";s:20:\"f46b0a4c552db4c15e3b\";s:6:\"online\";s:2:\"No\";}}'),('f81296893fd2429f774370beb9239d82','::1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0 FirePHP/0.7.4',1388084142,'');

/*Table structure for table `ts_content` */

DROP TABLE IF EXISTS `ts_content`;

CREATE TABLE `ts_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text,
  `metas` text,
  `display_in_cms` enum('Yes','No') DEFAULT 'Yes',
  `date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

/*Data for the table `ts_content` */

insert  into `ts_content`(`id`,`title`,`slug`,`content`,`metas`,`display_in_cms`,`date_modified`) values (146,'About Us','about-us','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dapibus posuere sem, eu sagittis nisl lacinia id. Donec consectetur vel orci eget bibendum. Aenean eu ipsum pellentesque, tincidunt dolor in, ultrices odio.</p>\r\n<p>In mollis mollis sapien quis tincidunt. Ut pellentesque, augue eget sodales tincidunt, enim mi mollis neque, eget gravida mauris quam et sem. Proin varius mollis nunc ut mattis. Phasellus gravida malesuada urna, sed tempus nisi condimentum vitae. Etiam commodo erat arcu. Donec sit amet mauris fermentum mi mollis rhoncus ut sed arcu. Pellentesque et ipsum ligula. Mauris consequat vestibulum posuere. Fusce luctus malesuada eleifend. Fusce posuere lorem vel augue tempor, id ullamcorper mi gravida. Morbi bibendum dui eu lectus molestie, nec vestibulum lacus bibendum.</p>','','Yes','2013-11-26 07:23:07'),(148,'Privacy Policy','privacy-policy','<p>Quisque sed nisl sed ligula porttitor gravida. Quisque orci turpis, pharetra non turpis sit amet, tristique porta ligula. Donec auctor, neque ac laoreet rhoncus, mi lorem posuere augue, sed dictum lacus purus et urna. Maecenas eu dui metus. Integer sed sapien dolor. Duis placerat laoreet nisi, nec posuere arcu cursus eu. Proin gravida, risus quis convallis tempor, magna ipsum tristique ante, ac eleifend magna mi quis dolor. Phasellus id viverra mauris. Mauris sed eleifend magna, ac viverra nunc. Praesent aliquam magna ut nisl dictum accumsan. Proin tempor, lectus nec viverra consectetur, sapien dolor pretium mi, et cursus dui nibh vel velit. Sed tristique sed nulla a dapibus.</p>\r\n<p>Sed semper sapien at nisl porttitor malesuada. Curabitur volutpat velit interdum adipiscing ornare. In pulvinar pharetra tellus, in placerat libero ultrices vel. Suspendisse at purus dolor. Etiam rhoncus lacinia neque, eu posuere metus lobortis a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur vel dolor a mi dignissim ultrices. Nullam orci leo, eleifend sed porttitor a, gravida tempus ligula. Sed ac ipsum consequat, lobortis mi id, sagittis lectus. Nulla quis ultricies libero. Ut vitae pellentesque nisl. Nunc placerat nisi ac ultrices viverra.</p>','','Yes','2013-12-04 07:54:42'),(149,'Terms','terms','<p>Sed semper sapien at nisl porttitor malesuada. Curabitur volutpat velit interdum adipiscing ornare. In pulvinar pharetra tellus, in placerat libero ultrices vel. Suspendisse at purus dolor. Etiam rhoncus lacinia neque, eu posuere metus lobortis a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur vel dolor a mi dignissim ultrices. Nullam orci leo, eleifend sed porttitor a, gravida tempus ligula. Sed ac ipsum consequat, lobortis mi id, sagittis lectus. Nulla quis ultricies libero. Ut vitae pellentesque nisl. Nunc placerat nisi ac ultrices viverra.</p>\r\n<p>Praesent suscipit arcu ut lacinia consectetur. Suspendisse potenti. Proin a mi ligula. Nunc convallis turpis a tortor rhoncus, ut ullamcorper nibh suscipit. Fusce molestie dolor sem, ac scelerisque libero fringilla vitae. Nulla id magna metus. Donec sem libero, tempus ac purus a, rhoncus lobortis justo. Ut vel pulvinar urna. Vivamus commodo libero in justo egestas interdum at laoreet est. Etiam sagittis rhoncus augue, vitae cursus turpis pulvinar a. Phasellus sed porttitor neque. Cras a nisl eros.</p>','','Yes','2013-12-04 07:55:12'),(150,'Welcome to Ticovo.com','welcome-to-ticovocom','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac turpis porttitor, sagittis purus quis, posuere libero. Cras pulvinar, sem id tincidunt bibendum, metus sapien varius leo, eu consequat velit est a arcu. Proin pharetra arcu ut purus vehicula convallis. Curabitur id elementum diam, quis rutrum tortor. Donec consectetur tincidunt dolor, eget cursus neque imperdiet sit amet. Maecenas bibendum non dui vel tempus. Aliquam erat volutpat. Cras vehicula arcu elit, quis vulputate dolor laoreet at. Vivamus gravida ligula dolor, in cursus erat semper ac. Proin fermentum elit id gravida gravida. Pellentesque ut commodo tortor. Nam lorem tortor, placerat in iaculis quis, pellentesque a sem.</p>\r\n<p>Vivamus sapien enim, gravida ac magna at, tincidunt faucibus mauris. Suspendisse placerat neque nec metus ullamcorper, et tincidunt lacus iaculis. Sed ut felis gravida, tempor ante vel, rhoncus est. Vestibulum dignissim leo lectus, id auctor mi sollicitudin eu. Duis sed ante molestie, mattis dolor quis, faucibus nunc. Vivamus semper ligula ac dignissim aliquet. Pellentesque sollicitudin lacinia ipsum eget blandit. Praesent mattis urna ac lacinia iaculis. Aenean euismod, felis in mollis vulputate, eros tellus ornare nunc, ut interdum urna lorem id enim. Mauris lectus ante, semper eu odio vitae, congue tincidunt neque. Sed vestibulum tellus velit, vel tempor tellus hendrerit eget. Integer rhoncus posuere lacus eget aliquet. Sed quis mollis magna. Curabitur tempus odio sit amet mattis hendrerit. Aliquam porttitor consectetur ipsum vel posuere.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac turpis porttitor, sagittis purus quis, posuere libero. Cras pulvinar, sem id tincidunt bibendum, metus sapien varius leo, eu consequat velit est a arcu. Proin pharetra arcu ut purus vehicula convallis. Curabitur id elementum diam, quis rutrum tortor. Donec consectetur tincidunt dolor, eget cursus neque imperdiet sit amet. Maecenas bibendum non dui vel tempus. Aliquam erat volutpat. Cras vehicula arcu elit, quis vulputate dolor laoreet at. Vivamus gravida ligula dolor, in cursus erat semper ac. Proin fermentum elit id gravida gravida. Pellentesque ut commodo tortor. Nam lorem tortor, placerat in iaculis quis, pellentesque a sem.</p>\r\n<p>Vivamus sapien enim, gravida ac magna at, tincidunt faucibus mauris. Suspendisse placerat neque nec metus ullamcorper, et tincidunt lacus iaculis. Sed ut felis gravida, tempor ante vel, rhoncus est. Vestibulum dignissim leo lectus, id auctor mi sollicitudin eu. Duis sed ante molestie, mattis dolor quis, faucibus nunc. Vivamus semper ligula ac dignissim aliquet. Pellentesque sollicitudin lacinia ipsum eget blandit. Praesent mattis urna ac lacinia iaculis. Aenean euismod, felis in mollis vulputate, eros tellus ornare nunc, ut interdum urna lorem id enim. Mauris lectus ante, semper eu odio vitae, congue tincidunt neque. Sed vestibulum tellus velit, vel tempor tellus hendrerit eget. Integer rhoncus posuere lacus eget aliquet. Sed quis mollis magna. Curabitur tempus odio sit amet mattis hendrerit. Aliquam porttitor consectetur ipsum vel posuere.</p>','','Yes','2013-11-19 01:21:17');

/*Table structure for table `ts_email_templates` */

DROP TABLE IF EXISTS `ts_email_templates`;

CREATE TABLE `ts_email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(175) DEFAULT NULL,
  `subject` varchar(175) DEFAULT NULL,
  `content` text,
  `last_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ts_email_templates` */

insert  into `ts_email_templates`(`id`,`template_name`,`subject`,`content`,`last_modified`) values (1,'Registration Confirmation','Account Confirmation','<p>Dear {first_name},</p>\r\n<p>Thankyou for registering on Tivoco...</p>\r\n<p>Please click at url below to activate your account...</p>\r\n<p>{activation_url}</p>\r\n<p>Praesent suscipit arcu ut lacinia consectetur. Suspendisse potenti. Proin a mi ligula. Nunc convallis turpis a tortor rhoncus, ut ullamcorper nibh suscipit. Fusce molestie dolor sem, ac scelerisque libero fringilla vitae. Nulla id magna metus. Donec sem libero, tempus ac purus a, rhoncus lobortis justo. Ut vel pulvinar urna. Vivamus commodo libero in justo egestas interdum at laoreet est. Etiam sagittis rhoncus augue, vitae cursus turpis pulvinar a. Phasellus sed porttitor neque. Cras a nisl eros.</p>\r\n<p>--</p>\r\n<p>Regards,</p>\r\n<p>Tivoco Team</p>','2013-11-19 08:17:33'),(2,'User Password Recovery','Password Recovery','<p>Dear {first_name} {last_name},</p>\r\n<p>Your <strong>User Name</strong> is: {user_name}</p>\r\n<p>Your <strong>email</strong> is : {email}</p>\r\n<p>Your <strong>password</strong> is : {password}</p>\r\n<p></p>\r\n<p>--</p>\r\n<p>Regards,</p>\r\n<p>Tivoco Team</p>','2013-11-23 02:14:34'),(3,'Welcome to Tivoco.com','Welcome to Tivoco.com','<p>Dear {first_name},<br /><br />You have successfully activated your account with us.<br /><br />Nunc at est vel est placerat tempus. Suspendisse sit amet turpis bibendum, rhoncus ligula sit amet, adipiscing velit. Donec ullamcorper quis massa a feugiat. In pellentesque vestibulum varius. Mauris suscipit purus eu tristique scelerisque. Etiam in justo a ligula blandit sagittis in sed dolor.<br /><br />--<br /><br />Regards,<br /><br />Tivoco.com</p>','2013-11-19 08:55:02');

/*Table structure for table `ts_feedback` */

DROP TABLE IF EXISTS `ts_feedback`;

CREATE TABLE `ts_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comments` text,
  `date_posted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ts_feedback` */

insert  into `ts_feedback`(`id`,`first_name`,`last_name`,`email`,`comments`,`date_posted`) values (1,'Naveed','Javed','naveedjaved786@gmail.com','<p>Aenean in risus in mi consequat dignissim. Nunc aliquet lacus at urna elementum, id facilisis nulla semper. Ut dapibus odio vitae tortor consequat, in auctor purus lacinia.</p>','2013-11-13 07:58:47'),(2,'Javed','Naveed','naveed_javed786@yahoo.com','<p>Cras pretium rhoncus purus sed faucibus. Nulla nec libero placerat, blandit sapien non, pharetra velit. Cras at tempor lorem, vitae pharetra odio. Mauris nisl tortor, malesuada quis nulla ac, mollis ullamcorper dolor.</p>','2013-11-13 08:00:07'),(3,'Naveed','Javed','naveedjaved786@gmail.com','<p>Testing..</p>','2013-11-26 07:45:44');

/*Table structure for table `ts_friends` */

DROP TABLE IF EXISTS `ts_friends`;

CREATE TABLE `ts_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `friend_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `status` enum('Accept','Reject','Pending') DEFAULT 'Pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `ts_friends` */

insert  into `ts_friends`(`id`,`friend_id`,`member_id`,`request_date`,`status`) values (6,13,15,'2013-12-16 11:05:36','Pending'),(7,12,15,'2013-12-16 11:08:21','Accept'),(8,12,11,'2013-12-16 01:40:17','Accept'),(9,13,11,'2013-12-16 02:06:06','Accept'),(11,11,15,'2013-12-17 20:23:26','Accept'),(14,15,11,'2013-12-26 10:31:41','Accept');

/*Table structure for table `ts_members` */

DROP TABLE IF EXISTS `ts_members`;

CREATE TABLE `ts_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(70) DEFAULT NULL,
  `last_name` varchar(75) DEFAULT NULL,
  `user_name` varchar(75) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL,
  `mobile_no` varchar(25) DEFAULT NULL,
  `university` varchar(225) DEFAULT NULL,
  `major` varchar(175) DEFAULT NULL,
  `description` text,
  `registeration_date` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `visits` int(11) DEFAULT '0',
  `status` enum('Active','Suspended','Pending Confirmation') DEFAULT 'Pending Confirmation',
  `is_profile_complete` enum('Yes','No') DEFAULT 'No',
  `activation_code` varchar(25) DEFAULT NULL,
  `online` enum('Yes','No') DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `ts_members` */

insert  into `ts_members`(`id`,`first_name`,`last_name`,`user_name`,`email`,`password`,`photo`,`mobile_no`,`university`,`major`,`description`,`registeration_date`,`last_modified`,`last_login`,`ip`,`visits`,`status`,`is_profile_complete`,`activation_code`,`online`) values (11,'Naveed','Javaid','njavgmail','naveedjaved786@gmail.com','123456','4fe1447ba733bc25b4e38d5a9d0f362f.jpg','','RIIU','Computer, Stats, Economics','<p>Nunc at est vel est placerat tempus. Suspendisse sit amet turpis bibendum, rhoncus ligula sit amet, adipiscing velit. Donec ullamcorper quis massa a feugiat. In pellentesque vestibulum varius. Mauris suscipit purus eu tristique scelerisque. Etiam in justo a ligula blandit sagittis in sed dolor.</p>\r\n<ul>\r\n<li>Nunc at est vel est placerat tempus.</li>\r\n<li>Suspendisse sit amet turpis bibendum.</li>\r\n<li>Rhoncus ligula sit amet, adipiscing velit.</li>\r\n</ul>\r\n<p>Donec ullamcorper quis massa a feugiat. In pellentesque vestibulum varius. Mauris suscipit purus eu tristique scelerisque. Etiam in justo a ligula blandit sagittis in sed dolor.</p>','2013-11-19 08:28:48','2013-12-17 11:54:18','2013-12-26 07:12:36','::1',109,'Active','Yes','f46b0a4c552db4c15e3b','Yes'),(12,'Javed','Naveed','njavyahoo','naveed_javed786@yahoo.com','123456','efdcd32da0bf0465a453c0a83003376f.jpg','','VU','English, Drawing, Arts','Lorem ipsum dolor sit amet, consectetur adipiscing elit.','2013-11-19 08:37:46','2013-11-19 10:08:08','2013-12-26 01:43:38','::1',3,'Active','No','0bf805519dcd331c4f1b','Yes'),(13,'Naveed','Javed','njavhotmail','naveed_javed786@hotmail.com','123456','big-img.png','','Fast','Science, Maths, Biology','<p>Aenean ac vehicula augue. Proin risus diam, laoreet eget dapibus eget</p>','2013-11-20 07:08:00','2013-12-26 07:51:26','2013-12-26 07:49:46','::1',3,'Active','Yes','549bffc14221664999e4','Yes'),(15,'Nav','Jav','njav','navjav786@gmail.com','123456','dfb4effbb96da21f4a4c9d23c6d6839c.jpg','','RIIU','Tets,test,test','<p>Testing...</p>','2013-12-15 10:56:40','2013-12-15 04:19:19','2013-12-26 07:02:56','::1',25,'Active','Yes','ffdb28fbb154fbc789cd','No');

/*Table structure for table `ts_messages` */

DROP TABLE IF EXISTS `ts_messages`;

CREATE TABLE `ts_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `subject` varchar(225) DEFAULT NULL,
  `message` text,
  `date_posted` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `ts_messages` */

insert  into `ts_messages`(`id`,`from`,`to`,`subject`,`message`,`date_posted`,`status`) values (4,12,11,'test 3','test 3\r\n','2013-12-16 15:42:02',0),(7,11,15,'Testing 123...','Testing 123...','2013-12-16 17:15:27',0),(10,12,11,'test','test','2013-12-19 15:55:31',1),(11,12,11,'test','test','2013-12-19 15:55:31',1),(14,12,11,'test 3','test 3\r\n','2013-12-16 15:42:02',0),(32,15,11,'Test 4','test 4','2013-12-15 12:59:32',1),(33,15,11,'Test 4','test 4','2013-12-15 12:59:32',1),(34,11,15,'Test','test','2013-12-26 02:56:05',0),(36,11,12,'hello Brother how are you?','Testing the message system...','2013-12-26 02:59:33',0),(37,11,15,'Hey dude how are you?','Is testing done?','2013-12-26 03:07:17',1),(39,11,15,'Yes getting your messages','Are you getting mine?','2013-12-26 03:12:09',1),(40,11,15,'Testing...','Testing...','2013-12-26 07:06:03',1),(41,15,11,'testing ok...','testing ok...','2013-12-26 07:08:00',1);

/*Table structure for table `ts_settings` */

DROP TABLE IF EXISTS `ts_settings`;

CREATE TABLE `ts_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(225) DEFAULT NULL,
  `module` enum('Google Analytics & SEO','General','Social Media','Footer','Filtering','Feedback') DEFAULT NULL,
  `key` varchar(125) DEFAULT NULL,
  `value` text,
  `field_type` enum('text','textarea','select') DEFAULT 'text',
  `status` enum('Enabled','Disabled') DEFAULT 'Enabled',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `ts_settings` */

insert  into `ts_settings`(`id`,`label`,`module`,`key`,`value`,`field_type`,`status`) values (1,'Global Metas & Descriptions','Google Analytics & SEO','metas','<meta name=\"description\" content=\"Creatives provides digital and traditional marketing services, business intelligence, eCommerce & mobile solutions.\">\r\n\r\n\r\n<meta name=\"keywords\" content=\"las vegas marketing,la web design,shopping cart website,las vegas ecommerce,website design las vegas,las vegas web design,vegas web design,web design in las vegas,best websites,seo las vegas,los angeles web design,los angeles ecommerce,online marketing solutions,la ecommerce,los angeles seo,online marketing tools,responsive web design\">\r\n\r\n\r\n<meta name=\"revisit-after\" content=\"15 days\">\r\n<meta name=\"robots\" content=\"all\">\r\n<meta name=\"distribution\" content=\"Global\" />\r\n<meta name=\"resource-type\" content=\"document\" />\r\n<meta name=\"robots\" content=\"index, follow\" />\r\n<meta name=\"googlebot\" content=\"all,index,follow\" />\r\n<meta name=\"category\" content=\"Web Design\" />\r\n<meta name=\"author\" content=\"Creatives\" />\r\n<META name=\"Reply To\" content=\"contact@creatives-usa.com\">\r\n<META name=\"netinsert\" content=\"0.0.1.7.1.1.1\">','textarea','Enabled'),(3,'Facebook','Social Media','facebook','https://www.facebook.com','text','Enabled'),(4,'Twitter','Social Media','twitter','https://www.twitter.com','text','Enabled'),(5,'Email','Social Media','email','contact@tivoco.com','text','Enabled'),(6,'Google Analytic Code','Google Analytics & SEO','google_analytic_code','<!-- Google analytic code goes here -->','textarea','Enabled'),(7,'Footer Text','Footer','footer_text','Copyright © tivoco.com 2013','text','Enabled'),(8,'Footer Script','Footer','footer_script','<!-- Footer Script Code Goes here, it could be some tracking code from google -->','textarea','Enabled'),(9,'Blocked IP List (enter IP per line)','Filtering','blocked_ip','127.0.0.1\r\n130.0.0.0\r\n123.1.2.3','textarea','Enabled'),(11,'Popup open after (mins)','Feedback','popup_open','15','text','Enabled'),(12,'Popup Interval (no of days)','Feedback','popup_interval','7','text','Enabled'),(13,'Site Title','Google Analytics & SEO','site_title','Tivoco','text','Enabled');

/*Table structure for table `ts_universities` */

DROP TABLE IF EXISTS `ts_universities`;

CREATE TABLE `ts_universities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uni_name` varchar(255) DEFAULT NULL,
  `domain` varchar(175) DEFAULT NULL,
  `phone_no` varchar(75) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `notes` text,
  `status` enum('Active','In Active') DEFAULT 'Active',
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `ts_universities` */

insert  into `ts_universities`(`id`,`uni_name`,`domain`,`phone_no`,`address`,`notes`,`status`,`date_added`,`last_modified`) values (1,'Riphah International University','riphah.edu.pk','123-123-1234','This can be blank','<p>These notes are just for admin...</p>','Active','2013-11-23 07:09:43','2013-11-23 07:26:52'),(2,'Virtual University','vu.edu.pk','123-123-1234','','','Active','2013-11-23 07:26:18','2013-11-23 07:27:18'),(4,'Gmail','gmail.com','321-321-3214','','','Active','2013-11-23 08:09:19','2013-11-23 08:09:19'),(5,'Hotmail','hotmail.com','987-878-7894','','','Active','2013-11-23 08:09:36','2013-11-23 08:09:36'),(6,'Yahoo','yahoo.com','123-123-1234','','','Active','2013-11-23 08:09:54','2013-11-23 08:09:54');

/*Table structure for table `ts_user_roles` */

DROP TABLE IF EXISTS `ts_user_roles`;

CREATE TABLE `ts_user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ts_user_roles` */

insert  into `ts_user_roles`(`id`,`role`) values (1,'Master Admin'),(2,'Admin');

/*Table structure for table `ts_users` */

DROP TABLE IF EXISTS `ts_users`;

CREATE TABLE `ts_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `useremail` varchar(45) NOT NULL,
  `notes` text,
  `status` tinyint(1) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1' COMMENT 'user_roles.id',
  `dateadded` datetime DEFAULT NULL,
  `lastmodified` datetime DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `visits` int(11) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ts_users` */

insert  into `ts_users`(`id`,`username`,`password`,`useremail`,`notes`,`status`,`role_id`,`dateadded`,`lastmodified`,`ip`,`visits`,`last_login`) values (5,'admin','admin','admin@tivoco.com','Master Admin....',1,1,'2012-08-03 00:00:00','2012-12-06 02:19:36','127.0.0.1',32,'2013-12-15 11:01:20'),(6,'navjav','123456','naveedjaved786@gmail.com','<p>This is a data entry operator...</p>',1,2,'2013-10-26 09:29:49','2013-11-12 08:33:19','127.0.0.1',1,'2013-11-12 10:31:27'),(8,'javnav','123456','naveed_javed786@yahoo.com','',0,2,NULL,'2013-11-12 09:29:49',NULL,0,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
