-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.18 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5702
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table mydb.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_content` text,
  `comment_author` int(11) NOT NULL,
  `comment_post` int(11) NOT NULL,
  `comment_validation` tinyint(1) NOT NULL DEFAULT '0',
  `comment_date` datetime DEFAULT NULL,
  `comment_vali_date` datetime DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `fk_comments_users1_idx` (`comment_author`),
  KEY `fk_comments_posts1_idx` (`comment_post`),
  CONSTRAINT `fk_comments_posts1` FOREIGN KEY (`comment_post`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_comments_users1` FOREIGN KEY (`comment_author`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.comments: ~2 rows (approximately)
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`comment_id`, `comment_content`, `comment_author`, `comment_post`, `comment_validation`, `comment_date`, `comment_vali_date`) VALUES
	(1, 'I never had this issue, when using a Framework. I guess it\'s automatically done', 3, 1, 1, '2020-09-18 09:27:11', '2020-09-18 09:27:38');
INSERT INTO `comments` (`comment_id`, `comment_content`, `comment_author`, `comment_post`, `comment_validation`, `comment_date`, `comment_vali_date`) VALUES
	(2, 'This doesn\'t look that good mate. Get better', 3, 2, 1, '2020-09-18 09:27:27', '2020-09-18 09:27:38');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table mydb.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post_subtitle` varchar(255) DEFAULT NULL,
  `post_content` longtext,
  `post_image` varchar(255) DEFAULT NULL,
  `post_image_descr` varchar(255) DEFAULT NULL,
  `post_crea_date` datetime DEFAULT NULL,
  `post_edit_date` datetime DEFAULT NULL,
  `post_author` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `fk_posts_users_idx` (`post_author`),
  CONSTRAINT `fk_posts_users` FOREIGN KEY (`post_author`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.posts: ~2 rows (approximately)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`post_id`, `post_title`, `post_subtitle`, `post_content`, `post_image`, `post_image_descr`, `post_crea_date`, `post_edit_date`, `post_author`) VALUES
	(1, 'Un/Serializing an object', 'Getting rid of the __PHP_Incomplete_Class !', '<h3>__PHP_Incomplete_Class</h3><p>This problem comes up when directly passing an Object through the session.</p><p>When using models though, you might want to keep the same syntax everywhere so turning your Object into an array is a bad idea.</p><p>How can you then manage to go around this Incomplete Class and successfully get your Object back after a dip into the $_SESSION ?</p><p>&nbsp;</p><h3>The Serializable Interface</h3><p>This Interface makes you implement both serialize and unserialize methods.</p><p>You can use these methods to respectively turn your Object into a PHP string that won\'t be altered by the $_SESSION superglobal. And then turn back that string into a fully working Object that you can use methods on !</p><p>You can check out the official docs about this Interface and those two methods <a href="https://www.php.net/manual/en/class.serializable.php">here</a>.</p><p>&nbsp;</p><p>Hoping it was useful !</p>', 'image5f647901e234b.jpg', 'Dev Background Image', '2020-09-18 09:08:17', '2020-09-18 09:08:17', 1);
INSERT INTO `posts` (`post_id`, `post_title`, `post_subtitle`, `post_content`, `post_image`, `post_image_descr`, `post_crea_date`, `post_edit_date`, `post_author`) VALUES
	(2, 'Creating an iRacing Paint Scheme', 'Photoshop is a pretty nice tool', '<h3>A car to fulfill my weeb needs</h3><p>Racing with people is nice, whether you win or loose. However this feeling of achieving a good result is something that can\'t be matched by a lot of other games.<br>Achieving this result while you\'re representing something you like using your car livery makes it even better, and that\'s why I had to make one for myself.</p><p>&nbsp;</p><h3>Discovering the software</h3><p>Photoshop menus are fine, but there is so much things you can that it\'s easy to get lost, so I spent an hour or so exploring menus and making small tests on the base paint template.<br>After I was ready I went to hunt every useful PNG I could find, Super GT Sponsors Stickers, Saekano logos and Images, etc.</p><p>&nbsp;</p><h3>Actually doing the paint</h3><p>Using one of the available patterns as a base, I changed to colors to match Saekano\'s. Once the base was there, I started by doing the numbers stickers first, and then placed the character.<br>Then I placed the sponsors I liked and try to stay symmetrical all the way, the car was starting to look good and I finished it by adding little round rectangles of various Saekano colors to break a bit the base pattern.</p><p>&nbsp;</p><h3>Die and Retry</h3><p>Even if you\'re painting outside of your rig, you\'ll still want to have iRacing installed. In fact it is even mandatory. Big part of the job is actually exporting the paint and loading it in game to make sure your stickers are placed where you want them to, as well as making sure there are no aberrations you missed when seeing the flat template.</p><p>To do so, you can just load up a session with the car and then export your paint in .tga using this pattern : Documents/iRacing/paints/<i>carname</i>/car_<i>yourID</i>.tga and hit Ctrl+R in game to refresh the paint.</p><p>&nbsp;</p><h3>Light after tunnel</h3><p>After what were long 7 hours of work (Anyone with PS experience would have it done in 3h max :c). I finally got my paint, I like it, I\'m proud to race my own paint and super happy about finally representing Saekano\'s color on the track !<br>You can check out the paint <a href="https://www.tradingpaints.com/showroom/view/305711/SaeKano-P217">here</a>.</p>', 'image5f647d0f9d6ed.png', 'Saekano Dallara P217', '2020-09-18 09:25:35', '2020-09-18 09:25:35', 1);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table mydb.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.roles: ~2 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`role_id`, `role_name`) VALUES
	(1, 'User');
INSERT INTO `roles` (`role_id`, `role_name`) VALUES
	(2, 'Admin');
INSERT INTO `roles` (`role_id`, `role_name`) VALUES
	(3, 'Owner');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table mydb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(45) NOT NULL,
  `password` char(60) NOT NULL,
  `name` varchar(100) NOT NULL,
  `registration_date` datetime DEFAULT NULL,
  `verif_token` char(32) DEFAULT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`mail`),
  KEY `fk_users_roles1_idx` (`role`),
  CONSTRAINT `fk_users_roles1` FOREIGN KEY (`role`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.users: ~3 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `mail`, `password`, `name`, `registration_date`, `verif_token`, `role`) VALUES
	(1, 'owen.jolivet@gmail.com', '$2y$10$G1uxpX/rRESHi1Jqa2AdNere12nKRJFTOaOgxmAQHAfwKZ.GdHW0i', 'Owen Jolivet', '2020-08-20 18:58:13', NULL, 3);
INSERT INTO `users` (`id`, `mail`, `password`, `name`, `registration_date`, `verif_token`, `role`) VALUES
	(2, 'admin@admin.blog', '$2y$10$afaRGgG3ChNxd5D2baPdte3iA0nBb1DZFYIDrbyPt58EIKVYqvlTe', 'Default Admin', '2020-09-18 08:11:54', NULL, 2);
INSERT INTO `users` (`id`, `mail`, `password`, `name`, `registration_date`, `verif_token`, `role`) VALUES
	(3, 'user@user.blog', '$2y$10$tWHQKSn604JaN/mvcEsujeVrnJosMV.IEfPR128HSQmTqLpPlaPNy', 'Default User', '2020-09-18 09:26:22', NULL, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
