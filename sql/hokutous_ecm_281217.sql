-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2017 at 07:16 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hokutous_ecm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `remember_token`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$nvmX4nYbEA.HZ5qvqNmUoeWSRJs8VGyWt8saJ/AMarjdxfJQ150vy', 'tBbgTgEnodFS8jfauok62L2UCftGkUSMZhzo2V46n2nSHvFIFmr4PxKvW2M1', 'admin', 'ACTIVE', '2017-12-28 11:44:48', '2017-12-29 01:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `audios_info`
--

CREATE TABLE `audios_info` (
  `id` int(11) NOT NULL,
  `content_page` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `audio_url` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `audios_info`
--

INSERT INTO `audios_info` (`id`, `content_page`, `user_id`, `title`, `audio_url`, `created_at`, `updated_at`) VALUES
(1, 'question_answer', 0, 'test', 'http://localhost/himitshu/assets/dist/audio_files/20171006042936_20170915100422_1：1万人の1人の逸材になれ.mp3', '2017-10-05 16:29:36', '2017-10-05 16:29:36'),
(2, 'question_answer', 0, '1234', 'http://localhost/himitshu/assets/dist/audio_files/20171006044331_20170915100422_1：1万人の1人の逸材になれ.mp3', '2017-10-05 16:43:31', '2017-10-05 16:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(11) NOT NULL,
  `parent_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `catagory_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `catagory_banner_url` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `catagory_thumbnail_url` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `catagory_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `parent_type`, `type`, `catagory_title`, `catagory_banner_url`, `catagory_thumbnail_url`, `catagory_description`, `created_at`, `updated_at`) VALUES
(0, 'main', 'main', 'すべての商品', '20171121121021_bancat.jpg', '20171013073408_banner01.jpg', '<p>北海道の魚貝販売コーナーや、各イベントコーナーなどを一覧で紹介しています</p>', '2017-11-21 12:10:21', '2017-11-21 17:10:21'),
(1, 'cat', 'cat_1', '蟹', '20171018055338_Banner3.png', '20171013113721_Banner02.jpg', '<p><strong>北海道といえばカニ！甘みが特徴のズワイガニ、味噌たっぷりの毛蟹、食べごたえ抜群のタラバガニあなたのお好みは？</strong>　</p>', '2017-12-25 13:40:47', '2017-12-26 03:40:47'),
(2, 'cat', 'cat_3', '魚', '20171018055531_Banner2.png', '20171013114244_Banner07.jpg', '<p><strong>北海道のおいしい魚　鮭やホッケなどをご案内</strong></p>', '2017-12-25 13:48:31', '2017-12-26 03:48:31'),
(3, 'cat', 'cat_2', '魚卵', '20171018055436_Banner4.png', '20171013114158_Banner06.jpg', '<p>新鮮な助宗鱈から取り出した卵を、 定温でじっくりと塩蔵し、出来上がっ た「塩たらこ」は、プチプチとした食 感と外皮の薄さで口あたりもよく、 あつあつのご飯にも酒の肴にもよく合 う一品です。 また、スパゲティーや、焼き魚卵に しても食感、味ともにお箸がすすみます。</p>', '2017-12-25 13:33:00', '2017-12-26 03:33:00'),
(4, '', '', 'その他', '20171026122206_01005.jpg', '', 'その他の水産物', '2017-11-09 11:09:58', '2017-10-26 06:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `content_detail`
--

CREATE TABLE `content_detail` (
  `id` int(11) NOT NULL,
  `title` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `content_page` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `content_detail`
--

INSERT INTO `content_detail` (`id`, `title`, `content_page`, `created_at`, `updated_at`) VALUES
(1, 'News & Events', 'news_events', '2017-08-03 23:50:59', '0000-00-00 00:00:00'),
(2, 'News & Events Detail', 'news_event_detail', '2017-08-03 23:51:27', '0000-00-00 00:00:00'),
(3, 'Membership Power', 'membership_power', '2017-08-03 23:52:10', '0000-00-00 00:00:00'),
(4, 'Membership Power Feedback', 'membership_power_feedback', '2017-08-03 23:54:27', '0000-00-00 00:00:00'),
(5, 'Membership Power Feedback Comment', 'membership_power_feedback_comment', '2017-08-03 23:55:08', '0000-00-00 00:00:00'),
(6, 'Ithopia Request', 'ithopia_request', '2017-08-03 23:57:29', '0000-00-00 00:00:00'),
(7, 'Give Business Idea', 'give_business_idea', '2017-08-03 23:58:19', '0000-00-00 00:00:00'),
(8, 'Question & Answer', 'question_answer', '2017-08-03 23:59:14', '0000-00-00 00:00:00'),
(9, 'Question & Answer Request', 'question_answer_request', '2017-08-04 00:01:14', '0000-00-00 00:00:00'),
(10, 'Mobile Application', 'mobile_application', '2017-08-04 00:02:07', '0000-00-00 00:00:00'),
(11, 'Mobile Application Video Comment', 'mobile_application_video_comment', '2017-08-04 00:02:48', '0000-00-00 00:00:00'),
(12, 'Mobile Application Video App Download', 'mobile_application_app_download', '2017-08-04 00:07:35', '0000-00-00 00:00:00'),
(13, 'Business Member Audition', 'business_member_audition', '2017-08-04 00:09:08', '0000-00-00 00:00:00'),
(14, 'Business Member Audition Request', 'business_member_audition_request', '2017-08-04 00:09:53', '0000-00-00 00:00:00'),
(15, 'Majime Terrorist', 'majime_terrorist', '2017-08-04 00:10:56', '0000-00-00 00:00:00'),
(16, 'Majime Terrorist Request', 'majime_terrorist_request', '2017-08-04 00:11:10', '0000-00-00 00:00:00'),
(17, 'Blockchain Related Lecture', 'blockchain_related_lecture', '2017-08-04 00:12:39', '0000-00-00 00:00:00'),
(18, 'Blockchain Related Lecture Request', 'blockchain_related_lecture_request', '2017-08-04 00:12:53', '0000-00-00 00:00:00'),
(19, 'Bitcoin Related Lecture Request', 'bitcoin_related_lecture_request', '2017-08-04 00:14:20', '0000-00-00 00:00:00'),
(20, 'Crazy Mindset test DB', 'crazy_mindset', '2017-10-05 23:43:03', '0000-00-00 00:00:00'),
(21, 'Realtime Earning', 'realtime_earning', '2017-08-04 00:16:28', '0000-00-00 00:00:00'),
(22, 'Secret Talk of World', 'wold_secret_talk', '2017-08-04 00:17:12', '0000-00-00 00:00:00'),
(23, 'Update User Profile', 'update_user_profile', '2017-08-04 00:17:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `control`
--

CREATE TABLE `control` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `perm` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(20) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `dial_code` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`, `dial_code`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', '+93', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(2, 'Albania', '+355', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(3, 'Algeria', '+213', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(4, 'American Samoa', '+684', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(5, 'Andorra', '+376', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(6, 'Angola', '+244', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(7, 'Anguilla', '+1-264', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(8, 'Antarctica', '+672', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(9, 'Antigua And Barbuda', '+1-268', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(10, 'Argentina', '+54', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(11, 'Armenia', '+374', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(12, 'Aruba', '+297', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(13, 'Australia', '+61', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(14, 'Austria', '+43', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(15, 'Azerbaijan', '+994', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(16, 'Bahamas', '+1-242', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(17, 'Bahrain', '+973', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(18, 'Bangladesh', '+880', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(19, 'Barbados', '+1-246', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(20, 'Belarus', '+375', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(21, 'Belgium', '+32', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(22, 'Belize', '+501', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(23, 'Benin', '+229', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(24, 'Bermuda', '+1-441', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(25, 'Bhutan', '+975', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(26, 'Bolivia', '+591', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(27, 'Bosnia and Herzegovina', '+387', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(28, 'Botswana', '+267', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(29, 'Bouvet Island', '', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(30, 'Brazil', '+55', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(31, 'British Indian Ocean Territory', '', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(32, 'Brunei', '+673', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(33, 'Bulgaria', '+359', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(34, 'Burkina Faso', '+226', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(35, 'Burundi', '+257', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(36, 'Cambodia', '+855', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(37, 'Cameroon', '+237', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(38, 'Canada', '+1', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(39, 'Cape verde', '+238', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(40, 'Cayman Islands', '+1-345', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(41, 'Central African Republic', '+236', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(42, 'Chad', '+235', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(43, 'Chile', '+56', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(44, 'China', '+86', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(45, 'Christmas Island', '+61', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(46, 'Cocos (keeling) Islands', '+61', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(47, 'Colombia', '+57', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(48, 'Comoros', '+269', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(49, 'Congo', '+242', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(50, 'Cook Islands', '+682', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(51, 'Costa Rica', '+506', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(52, 'Croatia', '+385', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(53, 'Cuba', '+53', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(54, 'Cyprus', '+357', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(55, 'Czech Republic', '+420', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(56, 'Dem Rep of Congo (Zaire)', '+243', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(57, 'Denmark', '+45', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(58, 'Djibouti', '+253', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(59, 'Dominica', '+1-767', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(60, 'Dominican Republic', '+1-809', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(61, 'East Timor', '+670', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(62, 'Ecuador', '+593', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(63, 'Egypt', '+20', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(64, 'El Salvador', '+503', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(65, 'England', '+689', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(66, 'Equatorial Guinea', '+240', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(67, 'Eritrea', '+291', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(68, 'Estonia', '+372', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(69, 'Ethiopia', '+251', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(70, 'Falkland Islands', '+500', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(71, 'Faroe Islands', '+298', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(72, 'Fiji', '+679', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(73, 'Finland', '+358', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(74, 'France', '+33', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(75, 'French Guiana', '+594', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(76, 'French Polynesia', '+689', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(77, 'French Southern Territories', '', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(78, 'Gabon', '+241', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(79, 'Gambia', '+220', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(80, 'Georgia', '+995', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(81, 'Germany', '+49', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(82, 'Ghana', '+233', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(83, 'Gibraltar', '+350', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(84, 'Greece', '+30', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(85, 'Greenland', '+299', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(86, 'Grenada', '+1-473', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(87, 'Guadeloupe', '+590', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(88, 'Guam', '+1-671', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(89, 'Guatemala', '+502', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(90, 'Guinea', '+224', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(91, 'Guinea-Bissau', '+245', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(92, 'Guyana', '+592', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(93, 'Haiti', '+509', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(94, 'Heard and McDonald Islands', '', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(95, 'Honduras', '+504', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(96, 'Hungary', '+36', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(97, 'Iceland', '+354', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(98, 'India', '+91', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(99, 'Indonesia', '+62', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(100, 'Iran', '+98', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(101, 'Iraq', '+964', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(102, 'Ireland', '+353', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(103, 'Israel', '+972', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(104, 'Italy', '+39', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(105, 'Ivory Coast', '+225', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(106, 'Jamaica', '+1-876', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(107, 'Japan', '+81', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(108, 'Jordan', '+962', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(109, 'Kazakhstan', '+7', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(110, 'Kenya', '+254', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(111, 'Kiribati', '+686', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(112, 'Korea', '+850', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(113, 'Korea (D.P.R.)', '+82', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(114, 'Kuwait', '+965', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(115, 'Kyrgyzstan', '+996', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(116, 'Lao', '+856', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(117, 'Latvia', '+371', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(118, 'Lebanon', '+961', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(119, 'Lesotho', '+266', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(120, 'Liberia', '+231', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(121, 'Libya', '+218', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(122, 'Liechtenstein', '+423', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(123, 'Lithuania', '+370', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(124, 'Luxembourg', '+352', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(125, 'Macedonia', '+389', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(126, 'Madagascar', '+261', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(127, 'Malawi', '+265', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(128, 'Malaysia', '+60', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(129, 'Maldives', '+960', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(130, 'Mali', '+223', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(131, 'Malta', '+356', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(132, 'Marshall Islands', '+692', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(133, 'Martinique', '+596', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(134, 'Mauritania', '+222', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(135, 'Mauritius', '+230', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(136, 'Mayotte', '+269', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(137, 'Mexico', '+52', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(138, 'Micronesia', '+691', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(139, 'Moldova', '+373', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(140, 'Monaco', '+377', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(141, 'Mongolia', '+976', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(142, 'Montserrat', '+1-664', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(143, 'Morocco', '+212', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(144, 'Mozambique', '+258', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(145, 'Myanmar', '+95', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(146, 'Namibia', '+264', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(147, 'Nauru', '+674', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(148, 'Nepal', '+977', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(149, 'Netherlands', '+31', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(153, 'Nicaragua', '+505', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(154, 'Niger', '+227', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(155, 'Nigeria', '+234', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(156, 'Niue', '+683', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(157, 'Norfolk Island', '+672', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(158, 'Northern Mariana Islands', '+1-670', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(159, 'Norway', '+47', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(160, 'Oman', '+968', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(161, 'Other', '', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(162, 'Pakistan', '+92', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(163, 'Palau', '+680', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(164, 'Palestinian Territory, Occupie', '+970', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(165, 'Panama', '+507', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(166, 'Papua new Guinea', '+675', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(167, 'Paraguay', '+595', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(168, 'Peru', '+51', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(169, 'Philippines', '+63', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(170, 'Pitcairn Island', '+872', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(171, 'Poland', '+48', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(172, 'Portugal', '+351', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(173, 'Puerto Rico', '+1-787', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(174, 'Qatar', '+974', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(175, 'Reunion', '+262', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(176, 'Romania', '+40', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(177, 'Russia', '+998', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(178, 'Rwanda', '+250', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(179, 'Saint Kitts And Nevis', '+1-869', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(180, 'Saint Lucia', '+1-758', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(181, 'Saint Vincent And The Grenadin', '+1-784', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(182, 'Samoa', '+685', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(183, 'San Marino', '+378', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(184, 'Sao Tome and Principe', '+239', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(185, 'Saudi Arabia', '+966', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(186, 'Scotland', '+44', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(187, 'Senegal', '+221', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(188, 'Seychelles', '+248', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(189, 'Sierra Leone', '+232', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(190, 'Singapore', '+65', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(191, 'Slovak Republic', '+421', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(192, 'Slovenia', '+386', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(193, 'Solomon Islands', '+677', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(194, 'Somalia', '+252', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(195, 'South Africa', '+27', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(196, 'South Georgia, Sth Sandwich Islands', '', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(197, 'Spain', '+34', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(198, 'Sri Lanka', '+94', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(199, 'St Helena', '+290', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(200, 'St Pierre and Miquelon', '+508', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(201, 'Sudan', '+249', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(202, 'Suriname', '+597', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(203, 'Svalbard And Jan Mayen Islands', '', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(204, 'Swaziland', '+268', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(205, 'Sweden', '+46', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(206, 'Switzerland', '+41', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(207, 'Syria', '+963', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(208, 'Taiwan', '+886', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(209, 'Tikistan', '+992', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(210, 'Tanzania', '+255', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(211, 'Thailand', '+66', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(212, 'Togo', '+228', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(213, 'Tokelau', '+690', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(214, 'Tonga', '+676', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(215, 'Trinidad And Tobago', '+1-868', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(216, 'Tunisia', '+216', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(217, 'Turkey', '+90', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(218, 'Turkmenistan', '+993', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(219, 'Turks And Caicos Islands', '+1-649', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(220, 'Tuvalu', '+688', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(221, 'Uganda', '+256', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(222, 'Ukraine', '+380', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(223, 'United Arab Emirates', '+971', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(224, 'United States', '+1', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(225, 'Uruguay', '+598', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(226, 'Uzbekistan', '+998', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(227, 'Vanuatu', '+678', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(228, 'Vatican City State (Holy See)', '+39', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(229, 'Venezuela', '+58', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(230, 'Vietnam', '+84', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(231, 'Virgin Islands (British)', '+1', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(232, 'Virgin Islands (US)', '+1-340', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(233, 'Wales', '+44', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(234, 'Wallis And Futuna Islands', '+681', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(235, 'Western Sahara', '+685', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(236, 'Yemen', '+967', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(237, 'Zambia', '+260', '2017-07-12 10:19:24', '2017-07-12 10:19:24'),
(238, 'Zimbabwe', '+263', '2017-07-12 10:19:24', '2017-07-12 10:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `event_table`
--

CREATE TABLE `event_table` (
  `id` int(11) NOT NULL,
  `event_title` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `event_date` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_table`
--

INSERT INTO `event_table` (`id`, `event_title`, `description`, `event_date`, `created_at`, `updated_at`) VALUES
(15, '俺達の秘密基地スタートします！', '<p>世界一ワクワクするコミュニティーを開始します！</p>', '2017-09-01', '2017-09-01 06:33:46', '2017-09-01 06:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `footer_portion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `footer_data` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `footer_portion`, `footer_data`, `created_at`, `updated_at`) VALUES
(1, 'Address', '<p><strong>株式会社マルフジ</strong></p>\r\n\r\n<p>〒000-0000　埼玉県いわき市正内町00-0　Tel. 0000-00-000 Fax. 0000-00-0000<br />\r\nフリーダイヤル 0000-000-000（通話料無料・09：00～17：00）<br />\r\n携帯電話からは0000-00-000まで</p>\r\n', '2017-10-18 01:18:38', '2017-10-18 05:18:38'),
(2, 'Footer Upper Left URL', 'http://gmail.com/', '2017-10-16 04:29:08', '2017-10-16 07:48:18'),
(3, 'Footer Upper Right URL', 'footer2.jpg', '2017-10-16 02:27:47', '2017-10-09 22:48:08'),
(4, 'Footer Lower Left URL', 'footer3.jpg', '2017-10-16 02:27:54', '0000-00-00 00:00:00'),
(5, 'Footer Upper Right URL', 'test', '2017-10-16 04:15:52', '2017-10-16 08:15:52'),
(6, 'Bottom Thumbnail', 'bottom_thumbnail.png', '2017-10-11 05:17:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `for_month`
--

CREATE TABLE `for_month` (
  `id` int(11) NOT NULL,
  `for_month` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `for_month`
--

INSERT INTO `for_month` (`id`, `for_month`, `created_at`, `updated_at`) VALUES
(2, '2017-10-01', NULL, NULL),
(3, '2017-11-01', NULL, NULL),
(4, '2017-12-01', NULL, NULL),
(5, '2018-01-01', NULL, NULL),
(6, '2018-02-01', NULL, NULL),
(7, '2018-03-01', NULL, NULL),
(8, '2018-04-01', NULL, NULL),
(9, '2018-05-01', NULL, NULL),
(10, '2018-06-01', NULL, NULL),
(11, '2018-07-01', NULL, NULL),
(12, '2018-08-01', NULL, NULL),
(13, '2018-09-01', NULL, NULL),
(14, '2018-10-01', NULL, NULL),
(15, '2018-11-01', NULL, NULL),
(16, '2018-12-01', NULL, NULL),
(17, '2019-01-01', NULL, NULL),
(18, '2019-02-01', NULL, NULL),
(19, '2019-03-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `logo_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `logo_url` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo_title`, `logo_url`, `created_at`, `updated_at`) VALUES
(1, 'Logo', 'logo.png', '2017-11-10 11:17:03', '2017-11-10 16:17:03'),
(2, 'Footer One', 'footer1.jpg', '2017-10-10 04:07:24', '0000-00-00 00:00:00'),
(3, 'Small Footer One', 'footer2.jpg', '2017-10-10 04:48:08', '2017-10-09 22:48:08'),
(4, 'Small Footer 2', 'footer3.jpg', '2017-10-10 04:12:10', '0000-00-00 00:00:00'),
(5, 'Top Thumbnail', 'top_thumbnail.png', '2017-10-17 04:19:46', '2017-10-17 08:19:46'),
(6, '<p><strong>ホクトウ水産</strong><br />\r\n東京都渋谷区幡ヶ谷2-7-6&nbsp; 3階<br />\r\n0120-55-3103</p>', 'shop.png', '2017-10-31 10:37:24', '2017-10-25 02:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `id` int(11) NOT NULL,
  `menu_title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`id`, `menu_title`, `created_at`, `updated_at`) VALUES
(1, 'ホーム ', '2017-07-13 06:02:21', '2017-10-09 11:49:48'),
(2, '会社について', '2017-07-13 08:19:03', '2017-10-12 12:04:13'),
(3, '商品カテゴリー ', '2017-07-17 04:31:44', '2017-10-09 11:52:43'),
(4, 'お問い合わせ', '2017-07-28 14:22:46', '2017-10-12 07:42:55'),
(5, 'マイページ', '2017-07-28 12:31:25', '2017-10-12 07:43:11'),
(6, 'カート', '2017-07-28 09:30:47', '2017-10-12 07:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `fname`, `email`, `mobile`, `message`, `created_at`, `updated_at`) VALUES
(1, 'riad', 'friad', 'rdhawladar@gmail.com', '1234', 'testmessag', '2017-10-24 05:32:51', '2017-10-24 05:32:51'),
(2, 'riad', 'friad', 'rdhawladar@gmail.com', '1234', 'testmessag', '2017-10-24 05:51:39', '2017-10-24 05:51:39'),
(3, 'riad', 'rd', 'rdhawladar@gmail.com', '1', 'test mesag', '2017-10-24 06:08:39', '2017-10-24 06:08:39'),
(4, 'riad', 'rd', 'rdhawladar@gmail.com', '1', 'test mesag', '2017-10-24 06:14:32', '2017-10-24 06:14:32'),
(5, 'riad', 'rd', 'rdhawladar@gmail.com', '1', 'test mesag', '2017-10-24 06:14:37', '2017-10-24 06:14:37'),
(6, 'riad', 'rd', 'rdhawladar@gmail.com', '1', 'test mesag', '2017-10-24 06:14:59', '2017-10-24 06:14:59'),
(7, 'riad', 'rd', 'rdhawladar@gmail.com', '1', 'test mesag', '2017-10-24 06:17:48', '2017-10-24 06:17:48'),
(11, 'my name mes', 'another my ', 'riad.excel@gmail.com', '465432165465465465', 'created_at', '2017-12-13 20:33:17', '2017-12-13 20:33:17'),
(12, 'my name mes', 'another my ', 'riad.excel@gmail.com', '465432165465465465', 'created_at', '2017-12-13 20:35:48', '2017-12-13 20:35:48'),
(13, 'my name mes', 'another my ', 'riad.excel@gmail.com', '465432165465465465', 'created_at created_atc reated_atcreated_atcre ated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_ atcreated_ atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_at created_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atcreated_atlkajsdfj laksdjflaksdfj aldsfkja dlsfkjadslf kajdf', '2017-12-13 20:38:55', '2017-12-13 20:38:55'),
(14, 'my name mes', 'another my ', 'riad.excel@gmail.com', '465432165465465465', 'messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina messag of mina', '2017-12-13 20:42:10', '2017-12-13 20:42:10'),
(15, 'test name my name', 'riad hawladar tes manae', 'rdhawladar@gmail.com', '012345678912364', 'test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message', '2017-12-13 20:58:48', '2017-12-13 20:58:48'),
(16, 'john humpty', 'ジョンハンプティ', 'john4apps27@gmail.com', '01767513121', 'TestTestTestTestTestTestTestTestTestTestTestTest\r\nTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTest\r\nTestTestTestTestTestTestTestTestTest\r\nTestTestTestTestTest', '2017-12-14 00:00:57', '2017-12-14 00:00:57'),
(17, 'sawaguti daisuke', 'さわぐちだいすけ', 'sa_0316@yahoo.co.jp', '09025228500', 'テスト2', '2017-12-15 20:04:48', '2017-12-15 20:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE `newsfeed` (
  `id` int(11) NOT NULL,
  `parent_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `newsfeed_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `newsfeed_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`id`, `parent_type`, `type`, `newsfeed_title`, `newsfeed_description`, `created_at`, `updated_at`) VALUES
(1, 'cat', 'cat_1', '毛がには他の蟹に比べ、味は濃厚で甘みがあり、たくさん入ったかにみそも人気のかにです。', '<p>毛蟹は他の蟹に比べ、味は濃厚で甘みがあり、たくさん入ったかにみそも人気のかにです</p>', '2017-12-12 04:45:03', '2017-12-12 18:45:03'),
(2, 'cat', 'cat_2', 'いくら醤油漬けを商品に追加', '<p>いくらを商品に追加しました</p>', '2017-12-12 04:32:58', '2017-12-12 18:32:58'),
(3, 'cat', 'cat_3', 'ズワイガニ脚を追加しました', '<p>ズワイ脚2ｋｇ商品に追加</p>', '2017-12-12 04:34:42', '2017-12-12 18:34:42'),
(4, '', '', 'かに3品を商品に追加', '<p>ズワイガニ、タラバガニ、毛蟹の食べ比べセットです</p>', '2017-12-12 04:37:35', '2017-12-12 18:37:35'),
(5, '', '', '糠サンマを商品に追加しました', '<p>ぬかにつけることで、なまぐささとれて、栄養価も上がります。ぬかを洗い流して弱火でじっくり焼いてください</p>', '2017-12-12 04:43:03', '2017-12-12 18:43:03'),
(6, '', '', 'ホクトウ水産　北海道海産物通販サイト', '<p>北海道のおいしい海産物の通販サイトです</p>', '2017-12-12 04:39:39', '2017-12-12 18:39:39'),
(7, '', '', '年末年始の休業日29年12月29日～30年1月5日', '<p>29年12月29日～30年1月5日まで休業日です</p>', '2017-12-26 03:59:12', '2017-12-26 03:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `news_feed`
--

CREATE TABLE `news_feed` (
  `id` int(11) NOT NULL,
  `title` varchar(550) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `yes_vote` int(11) NOT NULL,
  `no_vote` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_feed`
--

INSERT INTO `news_feed` (`id`, `title`, `description`, `yes_vote`, `no_vote`, `created_at`, `updated_at`) VALUES
(7, '俺達の秘密基地スタート！', '<p>楽しく毎日を過ごしましょう！</p>', 0, 0, '2017-08-31 02:49:02', '2017-08-30 20:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `news_poll`
--

CREATE TABLE `news_poll` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote_for` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_poll`
--

INSERT INTO `news_poll` (`id`, `news_id`, `user_id`, `vote_for`, `created_at`, `updated_at`) VALUES
(1, 6, 10, 'yes', '2017-08-02 02:42:50', '2017-08-02 02:42:50'),
(2, 6, 9, 'yes', '2017-08-04 05:22:36', '2017-08-04 05:22:36'),
(3, 7, 9, 'yes', '2017-08-04 05:25:24', '2017-08-04 05:25:24'),
(4, 8, 9, 'yes', '2017-08-04 05:28:10', '2017-08-04 05:28:10'),
(5, 8, 2, 'yes', '2017-08-04 05:44:03', '2017-08-04 05:44:03'),
(6, 6, 2, 'yes', '2017-08-04 05:50:03', '2017-08-04 05:50:03'),
(7, 9, 6, 'yes', '2017-08-04 05:56:35', '2017-08-04 05:56:35'),
(8, 9, 9, 'yes', '2017-08-04 09:35:50', '2017-08-04 09:35:50'),
(9, 10, 9, 'yes', '2017-08-04 10:36:00', '2017-08-04 10:36:00'),
(10, 2, 9, 'yes', '2017-08-04 10:40:32', '2017-08-04 10:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `order_date_range`
--

CREATE TABLE `order_date_range` (
  `id` int(11) NOT NULL,
  `min_delivery_date` int(11) NOT NULL,
  `max_delivery_date` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_date_range`
--

INSERT INTO `order_date_range` (`id`, `min_delivery_date`, `max_delivery_date`, `created_at`, `updated_at`) VALUES
(1, 7, 15, '2017-12-28 07:53:38', '2017-12-29 01:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `member_id`, `product_id`, `quantity`, `price`, `status`, `created_at`, `updated_at`) VALUES
(105, 22, 54, 4, 1, 6300, 0, '2017-12-13 07:53:17', '2017-11-30 19:29:41'),
(106, 23, 0, 9, 1, 1100, 0, '2017-11-30 19:31:13', '2017-11-30 19:31:13'),
(107, 24, 37, 1, 1, 4970, 0, '2017-12-13 07:52:40', '2017-11-30 19:34:23'),
(108, 25, 0, 1, 1, 4970, 0, '2017-12-01 22:10:16', '2017-12-01 22:10:16'),
(109, 26, 37, 1, 2, 9940, 0, '2017-12-13 07:52:34', '2017-12-04 12:06:55'),
(110, 27, 0, 417, 1, 1300, 0, '2017-12-05 13:30:22', '2017-12-05 13:30:22'),
(111, 30, 37, 1, 1, 4970, 0, '2017-12-13 07:52:28', '2017-12-07 12:41:53'),
(112, 33, 54, 1, 1, 4970, 0, '2017-12-13 07:53:04', '2017-12-08 04:12:47'),
(113, 34, 0, 9, 1, 1100, 0, '2017-12-08 04:14:15', '2017-12-08 04:14:15'),
(114, 35, 0, 3, 4, 47200, 0, '2017-12-08 21:11:29', '2017-12-08 21:11:29'),
(115, 36, 0, 12, 1, 8640, 0, '2017-12-08 23:02:00', '2017-12-08 23:02:00'),
(116, 37, 37, 1, 1, 4970, 0, '2017-12-13 07:52:47', '2017-12-11 19:19:39'),
(117, 38, 0, 3, 1, 11800, 0, '2017-12-11 19:26:37', '2017-12-11 19:26:37'),
(118, 39, 54, 12, 1, 8640, 0, '2017-12-13 07:53:10', '2017-12-11 23:19:30'),
(119, 40, 0, 9, 1, 1100, 0, '2017-12-12 19:58:26', '2017-12-12 19:58:26'),
(120, 40, 0, 24, 2, 760, 0, '2017-12-12 19:58:26', '2017-12-12 19:58:26'),
(121, 42, 0, 1, 1, 4850, 0, '2017-12-14 00:03:37', '2017-12-14 00:03:37'),
(122, 43, 0, 1, 1, 4850, 0, '2017-12-16 18:42:25', '2017-12-16 18:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `other_page`
--

CREATE TABLE `other_page` (
  `id` int(11) NOT NULL,
  `otherpage_type` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otherpage_title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otherpage_description` longtext COLLATE utf8_unicode_ci,
  `otherpage_banner_url` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `ordering` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `other_page`
--

INSERT INTO `other_page` (`id`, `otherpage_type`, `otherpage_title`, `otherpage_description`, `otherpage_banner_url`, `ordering`, `created_at`, `updated_at`) VALUES
(1, '', '株式会社ホクトウ水産とは？', '<p>会社組織による漁業企業体。日本の漁業経営体を大別すると，家族労働によって営まれる零細規模の漁家と雇用労働者を使用する漁業企業体に分類できる。漁業企業体はさらに個人経営と会社経営に分類されるが，個人経営が圧倒的に多く，会社経営は漁家を含めた全漁業経営体数の1％強を占めるにすぎない。しかし，会社経営体が日本全体の漁獲金額に占める比率は5割弱にも及び，経営体個々の生産規模は，漁家や個人企業体に比し著しく大きい</p>', '20171026111222_Aboutus.jpg', 1, '2017-07-13 06:02:21', '2017-10-26 11:12:22'),
(2, '', 'Contact Us', '<p>The Bdeshi n languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is.The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To <a href=\"http://google.com\">http://google.com</a></p>', '20171016075830_Screen Shot 2017-09-20 at 10.10.13 AM.png', 2, '2017-07-13 08:19:03', '2017-10-16 07:58:30'),
(14, '', 'ad', '<p>asdf</p>', '', 0, '2017-10-16 05:06:51', '2017-10-16 05:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prefectures`
--

CREATE TABLE `prefectures` (
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prefectures`
--

INSERT INTO `prefectures` (`name`, `id`) VALUES
('北海道', 1),
('青森県', 2),
('岩手県', 3),
('宮城県', 4),
('秋田県', 5),
('山形県', 6),
('福島県', 7),
('茨城県', 8),
('栃木県', 9),
('群馬県', 10),
('埼玉県', 11),
('千葉県', 12),
('東京(23区内)', 13),
('東京(23区外)', 14),
('神奈川県', 15),
('新潟県', 16),
('富山県', 17),
('石川県', 18),
('福井県', 19),
('山梨県', 20),
('長野県', 21),
('岐阜県', 22),
('静岡県', 23),
('愛知県', 24),
('三重県', 25),
('滋賀県', 26),
('京都府', 27),
('大阪府', 28),
('兵庫県', 29),
('奈良県', 30),
('和歌山県', 31),
('鳥取県', 32),
('島根県', 33),
('岡山県', 34),
('広島県', 35),
('山口県', 36),
('徳島県', 37),
('香川県', 38),
('愛媛県', 39),
('高知県', 40),
('福岡県', 41),
('佐賀県', 42),
('長崎県', 43),
('熊本県', 44),
('大分県', 45),
('宮崎県', 46),
('鹿児島県', 47),
('沖縄県', 48),
('離島部', 49);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `catagory_id` int(30) NOT NULL,
  `parent_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_banner_url` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `product_thumbnail_url` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `catagory_id`, `parent_type`, `type`, `product_title`, `price`, `quantity`, `product_banner_url`, `product_thumbnail_url`, `product_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'cat_1', 'sub_11', 'ズワイガニ 約800g', 4850, 100, '20171011095654_banner.jpg', '20171121110425_ズワイガニ.jpg', '<p>甘みが特徴のずわい蟹<br />\r\nズワイガニの長い足に詰まっている身は、繊細でほんのり甘く、食べるほどに深い味わいが楽しめます。</p>\r\n\r\n<p>■ 商品内容&nbsp;&nbsp;&nbsp;茹で上げズワイガニ</p>\r\n\r\n<p>■ 内容量　ズワイガニ約800ｇ　1尾</p>\r\n\r\n<p>※冷凍状態で計測した重量となります。 カニなどの商品は水分を多く含むため、解凍後は水分が抜けた分だけ重量が変動します。</p>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります</p>\r\n\r\n<p>※小指(一番下の小さい足)や足の先の一部が欠けている場合がございます。予めご了承下さい。</p>\r\n\r\n<p>■ お召し上がり方</p>\r\n\r\n<ul>\r\n	<li>冷蔵庫で12時間前後ゆっくり解凍してから、そのままお召し上がりください。</li>\r\n	<li>そのままの塩味でじゅうぶん美味しいですが、お好みで三杯酢やポン酢などをつけてお召し上がりください。</li>\r\n</ul>\r\n\r\n<p>■ 原材料原　ロシア</p>\r\n\r\n<p>■ 賞味期限　冷凍庫で一カ月以内</p>\r\n\r\n<p>■ 配送方法　クール冷凍便</p>\r\n\r\n<p>■ ご注意&nbsp;&nbsp;&nbsp;&nbsp;解凍後はお早めにお召し上がり下さい。　</p>\r\n\r\n<p>&nbsp;</p>', '2017-12-11 11:22:55', '2017-12-12 01:22:55'),
(2, 1, '', '', 'ズワイガニ 約1Kg', 5600, 100, '', '20171121110521_ズワイガニ.jpg', '<p>甘みが特徴のずわい蟹<br />\r\nズワイガニの長い足に詰まっている身は、繊細でほんのり甘く、食べるほどに深い味わいが楽しめます。</p>\r\n\r\n<p>■ 商品内容&nbsp;&nbsp;&nbsp;茹で上げズワイガニ</p>\r\n\r\n<p>■ 内容量　ズワイガニ約1kg　1尾</p>\r\n\r\n<p>※冷凍状態で計測した重量となります。 カニなどの商品は水分を多く含むため、解凍後は水分が抜けた分だけ重量が変動します。</p>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります</p>\r\n\r\n<p>※小指(一番下の小さい足)や足の先の一部が欠けている場合がございます。予めご了承下さい。</p>\r\n\r\n<p>■ お召し上がり方</p>\r\n\r\n<ul>\r\n	<li>冷蔵庫で12時間前後ゆっくり解凍してから、そのままお召し上がりください。</li>\r\n	<li>そのままの塩味でじゅうぶん美味しいですが、お好みで三杯酢やポン酢などをつけてお召し上がりください。</li>\r\n</ul>\r\n\r\n<p>■ 原材料原　ロシア</p>\r\n\r\n<p>■ 賞味期限　冷凍庫で一カ月以内</p>\r\n\r\n<p>■ 配送方法　クール冷凍便</p>\r\n\r\n<p>■ ご注意　　解凍後はお早めにお召し上がり下さい。　</p>', '2017-12-11 11:22:19', '2017-12-12 01:22:19'),
(3, 1, '', '', 'ズワイガニ脚 約2Kg', 11800, 100, '', '20171123075146_ズワイガニ2.jpg', '<p><strong>ズワイガニの長い足に詰まっている身は、繊細でほんのり甘く、食べるほどに深い味わいが楽しめます。<br />\r\n極上の美味しさを、ご自宅でお召し上がりください。食べたい分だけ解凍！</strong></p>\r\n\r\n<p>■ 商品内容&nbsp;&nbsp;&nbsp;茹で上げズワイガニ脚</p>\r\n\r\n<p>■ 内容量　ズワイガニ脚約2kg ５～６肩&nbsp;</p>\r\n\r\n<p>■ お召し上がり方</p>\r\n\r\n<ul>\r\n	<li>冷蔵庫で12時間前後ゆっくり解凍してから、そのままお召し上がりください。&nbsp;</li>\r\n	<li>そのままの塩味でじゅうぶん美味しいですが、お好みで三杯酢やポン酢などをつけてお召し上がりください。</li>\r\n</ul>\r\n\r\n<p>■ 原材料原産地　ロシア</p>\r\n\r\n<p>■ 賞味期限　冷凍庫で一カ月以内</p>\r\n\r\n<p>■ 配送方法　クール冷凍便</p>\r\n\r\n<p>■ ご注意　解凍後はお早めにお召し上がり下さい。</p>\r\n\r\n<p>※冷凍状態で計測した重量となります。 カニなどの商品は水分を多く含むため、解凍後は水分が抜けた分だけ重量が変動します。&nbsp;</p>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります。</p>\r\n\r\n<p>※小指(一番下の小さい足)や足の先の一部が欠けている場合がございます。予めご了承下さい。</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '2017-12-02 07:46:18', '2017-12-02 12:46:18'),
(4, 1, 'cat_1', 'sub_12', '毛蟹 約 650g', 5980, 100, '20171011095523_banner.jpg', '20171121113047_毛ガニ.jpg', '<p>甘みたっぷり、味噌たっぷり　毛蟹<br />\r\n茹で上げ　毛蟹（冷凍） 650ｇ　１尾<br />\r\n北海道を代表する味覚、毛ガニ<br />\r\n蟹味噌たっぷりで甘い最高級毛がにです</p>\r\n\r\n<p>■ 商品内容　茹で上げ毛蟹</p>\r\n\r\n<p>■ 内容量　毛蟹約650ｇ　1尾</p>\r\n\r\n<p>※冷凍状態で計測した重量となります。 カニなどの商品は水分を多く含むため、解凍後は水分が抜けた分だけ重量が変動します。</p>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります</p>\r\n\r\n<p>■ お召し上がり方冷蔵庫で12時間前後ゆっくり解凍してから、そのままお召し上がりください。</p>\r\n\r\n<ul>\r\n	<li>そのままの塩味でじゅうぶん美味しいですが、お好みで三杯酢やポン酢などをつけてお召し上がりください。</li>\r\n</ul>\r\n\r\n<p>■&nbsp;原材料原産地　北海道</p>\r\n\r\n<p>■ 賞味期限　冷凍庫で一カ月以内</p>\r\n\r\n<p>■ 配送方法　クール冷凍便</p>\r\n\r\n<p>■ ご注意 * 解凍後はお早めにお召し上がり下さい。　</p>', '2017-12-11 11:24:11', '2017-12-12 01:24:11'),
(5, 1, '', '', '毛蟹 約800g', 7650, 100, '', '20171123075255_毛ガニ2.jpg', '<p><strong>甘みたっぷり、味噌たっぷり、北海道を代表する味覚、毛ガニ、蟹味噌たっぷりで甘い最高級毛がにです</strong></p>\r\n\r\n<p>■ 商品内容　茹で上げ毛蟹</p>\r\n\r\n<p>■ 内容量　毛蟹 約800ｇ　1尾</p>\r\n\r\n<p>※冷凍状態で計測した重量となります。 カニなどの商品は水分を多く含むため、解凍後は水分が抜けた分だけ重量が変動します</p>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります</p>\r\n\r\n<p>■ お召し上がり方冷蔵庫で12時間前後ゆっくり解凍してから、そのままお召し上がりください。<br />\r\nそのままの塩味でじゅうぶん美味しいですが、お好みで三杯酢やポン酢などをつけてお召し上がりください。</p>\r\n\r\n<p>■ 原材料原産地　北海道</p>\r\n\r\n<p>■ 賞味期限　冷凍庫で一カ月以内</p>\r\n\r\n<p>■ 配送方法クール冷凍便</p>\r\n\r\n<p>■ ご注意* 解凍後はお早めにお召し上がり下さい。</p>', '2017-12-02 07:50:34', '2017-12-02 12:50:34'),
(6, 1, '', '', 'タラバガニ脚 約800ｇ', 7560, 100, '', '20171120064554_タラバ蟹.jpg', '<p>食べごたえ抜群、噛めば噛むほどにお口いっぱいに蟹の風味が広がります！<br />\r\n水揚げされた後、すぐ大釜で一気に茹で上げました茹でた手を急速冷凍しているものだからとてもジューシー</p>\r\n\r\n<p>■商品内容　茹で上げタラバガニ脚</p>\r\n\r\n<p>■内容量&nbsp;&nbsp;&nbsp;&nbsp; 約800ｇ　1肩</p>\r\n\r\n<p>■お召し上がり方&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;冷蔵庫で12時間前後ゆっくり解凍してから、そのままお召し上がりください<br />\r\nお好みで三杯酢やポン酢などをつけてお召し上がりください。<br />\r\n再度茹で上げるとか、レンジで温めるとかはしないで下さい。</p>\r\n\r\n<p>■原材料原産地&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;ロシア&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</p>\r\n\r\n<p>■賞味期限&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;冷凍庫で一カ月以内</p>\r\n\r\n<p>■配送方法&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;クール冷凍便&nbsp;</p>\r\n\r\n<p>■ご注意&nbsp;&nbsp;　　解凍後はお早めにお召し上がり下さい。&nbsp;</p>\r\n\r\n<p>※冷凍状態で計測した重量となります。 カニなどの商品は水分を多く含むため、解凍後は水分が抜けた分だけ重量が変動します。&nbsp;&nbsp; &nbsp;<br />\r\n※画像はイメージです。実際とは異なる場合があります&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '2017-12-02 08:54:05', '2017-12-02 13:54:05'),
(7, 2, 'cat_3', 'sub_34', '鮭切り身 時鮭・紅鮭', 0, 20, '20171011101430_banner.jpg', '20171108060709_時鮭紅鮭.jpg', '<p>鮭切り身 時鮭・紅鮭</p>\r\n\r\n<p>■ 商品内容<br />\r\n■ 内容量</p>\r\n\r\n<ul>\r\n	<li>※画像はイメージです。実際とは異なる場合があります</li>\r\n</ul>\r\n\r\n<p>■ 原材料原産地ロシア</p>\r\n\r\n<p>■ 賞味期限<br />\r\n■ 配送方法クール冷凍便</p>\r\n\r\n<p>■ ご注意* 解凍後はお早めにお召し上がり下さい。　　</p>\r\n\r\n<ul>\r\n	<li>お召し上がり方</li>\r\n	<li>鮭切り身　時鮭5切</li>\r\n	<li>鮭切り身　紅鮭5切</li>\r\n</ul>', '2017-11-22 10:47:07', '2017-11-22 15:47:07'),
(8, 2, 'cat_3', 'sub_35', '紅鮭姿切り身　約2ｋｇ', 8840, 0, '20171011101456_banner.jpg', '20171013120114_紅鮭.jpg', '<p>紅鮭の姿を切り身にしています、頭をいれて20切れになります、一切れ一切れパックになっています<br />\r\n■ 商品内容<br />\r\n■ 内容量　約2㎏</p>\r\n\r\n<ul>\r\n	<li>※画像はイメージです。実際とは異なる場合があります</li>\r\n</ul>\r\n\r\n<p>■ 原材料原産地　ロシア　紅鮭　食塩<br />\r\n■ 賞味期限　冷凍で1ヶ月<br />\r\n■ 配送方法クール冷凍便<br />\r\n■ ご注意* 解凍後はお早めにお召し上がり下さい。　　</p>', '2017-12-12 05:37:59', '2017-12-12 19:37:59'),
(9, 2, 'cat_3', 'sub_36', '縞ホッケ一夜干し', 1100, 100, '20171011101852_banner.jpg', '20171121113235_縞ホッケ.jpg', '<p><strong>北海道の代表的な干し魚、グリルや炭火で焼くと、外はカリっとこんがりこうばしく、身はふわっとやわらかく焼きあがります</strong>。</p>\r\n\r\n<p>■ 商品内容　縞ﾎｯｹ一夜干し</p>\r\n\r\n<p>■内容量　1尾</p>\r\n\r\n<ul>\r\n	<li>真空パック急速冷凍</li>\r\n	<li>約400ｇ　40ｃｍ前後</li>\r\n	<li>※画像はイメージです。実際とは異なる場合があります</li>\r\n</ul>\r\n\r\n<p>■ お召し上がり方　グリル、フライパンなどで焼いてお召し上がりください</p>\r\n\r\n<p>■ 原材料原産地　ロシア<br />\r\n■ 賞味期限　冷凍庫で一カ月以内<br />\r\n■ 配送方法　クール冷凍便<br />\r\n■ ご注意　　 解凍後はお早めにお召し上がり下さい。　</p>', '2017-12-02 07:52:32', '2017-12-02 12:52:32'),
(10, 2, '', '', 'ナメタカレイ　一夜干し', 1200, 100, '', '20171121113417_ナメタカレイ.jpg', '<p>ナメタカレイ　一夜干し<br />\r\n<br />\r\n■ 商品内容　ナメタカレイ一夜干し<br />\r\n■ 内容量　1尾</p>\r\n\r\n<ul>\r\n	<li>真空パック急速冷凍</li>\r\n	<li>約350ｇ　35ｃｍ前後</li>\r\n</ul>\r\n\r\n<p>■ お召し上がり方　グリル、フライパンなどで焼いてお召し上がりください</p>\r\n\r\n<p>■ 原材料原産地　北海道<br />\r\n■ 賞味期限　冷凍庫で一カ月以内<br />\r\n■ 配送方法　クール冷凍便<br />\r\n■ ご注意　　解凍後はお早めにお召し上がり下さい。</p>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります　</p>', '2017-12-02 07:54:19', '2017-12-02 12:54:19'),
(11, 3, 'cat_2', 'sub_24', '明太子2kg　訳あり', 8640, 100, '20171011101100_banner.jpg', '20171123075403_明太子2.jpg', '<p><strong>訳あり　明太子　<br />\r\nほどよい辛さ、ご飯にのせてそのまま召し上がったり、おにぎり、パスタ、いろんなメニューでどうぞ、大きさ、色、形、不揃いの商品になります　品質や味は変わりません。</strong></p>\r\n\r\n<p>■ 商品内容　訳あり明太子</p>\r\n\r\n<p>■ 内容量　2ｋｇ</p>\r\n\r\n<p>■ 原材料原産地</p>\r\n\r\n<ul>\r\n	<li>すけとうだらの卵（ロシア又はアメリカ）、米発酵調味料、食塩、唐辛子、かつお風味調味料、甘味料、醤油、調味料（アミノ酸等）、酸化防止剤（ビタミンC）、酵素、発色剤（亜硝酸Na）、香辛料</li>\r\n</ul>\r\n\r\n<p>■ 賞味期限　冷凍庫で一カ月以内</p>\r\n\r\n<p>■ 配送方法　クール冷凍便</p>\r\n\r\n<p>■ ご注意　解凍後はお早めにお召し上がり下さい。</p>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります</p>', '2017-12-02 07:56:41', '2017-12-02 12:56:41'),
(12, 3, 'cat_2', 'sub_23', 'たらこ2kg　訳あり', 8640, 100, '20171011065957_banner.jpg', '20171121114104_タラコ.jpg', '<p><strong>訳あり　たらこ<br />\r\n甘口の旨味、北海道で獲れる上質なスケソウダラ　美味しいタラコが食べたい方へ。大きさ、色、形、不揃いの商品になります　品質や味は変わりません。</strong></p>\r\n\r\n<p>■ 商品内容　訳ありたらこ</p>\r\n\r\n<p>■ 内容量&nbsp;&nbsp;&nbsp;&nbsp;2ｋｇ</p>\r\n\r\n<p>■ 原材料原産地</p>\r\n\r\n<ul>\r\n	<li>すけとうだらの卵（ロシア又はアメリカ）、発酵調味液、ソルビット、食塩、調味料（アミノ酸等）、酸化防止剤（ビタミンC）、酵素、発色剤（亜硝酸Na）</li>\r\n</ul>\r\n\r\n<p>■ 賞味期限　冷凍庫で一カ月以内</p>\r\n\r\n<p>■ 配送方法　クール冷凍便</p>\r\n\r\n<p>■ ご注意　解凍後はお早めにお召し上がり下さい。&nbsp;</p>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります</p>', '2017-12-02 07:59:10', '2017-12-02 12:59:10'),
(13, 3, 'cat_2', 'sub_21', '醤油いくら　500ｇ', 8800, 100, '20171012115324_Banner05.jpg', '20171121120101_イクラ1.jpg', '<p><strong>醤油いくら<br />\r\n北海道産の完熟卵使用！極上いくら醤油漬け、プチっと弾けてトロける極上の味<br />\r\n（500ｇ　いくら丼7～10杯分）</strong></p>\r\n\r\n<p>■商品内容 &nbsp;秋鮭醤油いくら&nbsp;</p>\r\n\r\n<p>■内容量 &nbsp;500ｇ</p>\r\n\r\n<p>■お召し上がり方 &nbsp;冷凍状態でお届けするので冷蔵庫で半日～1日かけてゆっくりと解凍してください&nbsp;</p>\r\n\r\n<p>■原材料原産地 &nbsp;北海道産<br />\r\n秋鮭卵、醤油（大豆、小麦を含む）米発酵調味料、食塩、酵母エキス/ソルビトール、調味料（アミノ酸等）、酒精、酸化防止剤（V.C)、ｐH調整剤&nbsp;<br />\r\n※画像はイメージです。実際とは異なる場合があります。</p>\r\n\r\n<p>■賞味期限 &nbsp;冷凍庫で一カ月以内</p>\r\n\r\n<p>■配送方法 &nbsp;クール冷凍便</p>\r\n\r\n<p>■ご注意&nbsp;&nbsp; 解凍後はお早めにお召し上がり下さい。</p>', '2017-12-02 08:01:23', '2017-12-02 13:01:23'),
(14, 3, 'cat_2', 'sub_26', '塩数の子　500ｇ', 3980, 100, '20171011101135_banner.jpg', '20171121114629_塩数の子.jpg', '<p><br />\r\n<strong>選び抜かれた数の子を一本一本心を込めて丁寧に仕上げました</strong></p>\r\n\r\n<p>■商品内容 &nbsp;塩数の子</p>\r\n\r\n<p>■内容量 &nbsp;500ｇ</p>\r\n\r\n<p>■お召し上がり方 &nbsp;塩抜きしてからお召し上がりください<br />\r\n塩抜きの方法<br />\r\n①水3リットルに対して小さじ2杯の食塩を入れて溶かし、500g数の子を3～4時間浸します&nbsp;<br />\r\n②再度、同じ要領で塩水を取替え2時間浸します<br />\r\n③数の子の薄い膜をきれいに取り、塩水を取替え、味を見ながら1～2時間浸します&nbsp;</p>\r\n\r\n<p>■原材料原産地 &nbsp;ニシンの卵巣（ロシア産）、食塩&nbsp;<br />\r\n※画像はイメージです。実際とは異なる場合があります。</p>\r\n\r\n<p>■賞味期限 &nbsp;冷凍庫で一カ月以内</p>\r\n\r\n<p>■配送方法 &nbsp;クール冷凍便</p>\r\n\r\n<p>■ご注意&nbsp;&nbsp;解凍後はお早めにお召し上がり下さい。</p>', '2017-12-02 08:03:12', '2017-12-02 13:03:12'),
(15, 3, 'cat_2', 'sub_25', '味付数の子', 0, 0, '20171011101122_banner.jpg', '20171121114234_味付け数の子.jpg', '<p>数の子の色を生かした、白だし仕立て 味付けは材料2つでシンプル&amp;簡単ですが、旨味たっぷりの味付けです。</p>', '2017-11-24 11:37:41', '2017-11-23 13:00:17'),
(24, 2, '', '', '糠サンマ　４尾', 760, 100, '', '20171110044232_のけさんま.jpg', '<p><strong>糠サンマ<br />\r\n脂ののった新鮮な根室産のさんま、本品を自然解凍後、糠サンマを洗い流し、弱火でじっくりと焼いてお召し上がりください。</strong></p>\r\n\r\n<p>■ 商品内容　糠サンマ<br />\r\n■ 内容量　4尾（２パック）<br />\r\n■ お召し上がり方　自然解凍後、米糠を洗い流し弱火で焼いてお召し上がりください</p>\r\n\r\n<p>■ 原材料原産地　秋刀魚（北海道根室産）、米糠、食塩、米発酵調味料、米糠エキス/調味料（有機酸等）</p>\r\n\r\n<p>■ 賞味期限　冷凍庫で1年<br />\r\n■ 配送方法　クール冷凍便<br />\r\n■ ご注意　　解凍後はお早めにお召し上がり下さい。</p>\r\n\r\n<p>&nbsp;※画像はイメージです。実際とは異なる場合があります</p>', '2017-12-12 05:42:47', '2017-12-12 19:42:47'),
(27, 1, 'cat_1', 'sub_13', 'タラバガニ脚  約1Kg', 9580, 100, '20171011095538_banner.jpg', '20171013114654_タラバ蟹.jpg', '<p><em>食べ応え抜群 噛めば噛むほどにお口いっぱいに蟹の風味が広がります！水揚げされた後、すぐ大釜で一気に茹で上げました<br />\r\n茹でたてを急速凍結しているものだからとてもジューシー&nbsp;</em></p>\r\n\r\n<p>■商品内容　茹で上げタラバガニ脚</p>\r\n\r\n<p>■内容量&nbsp;&nbsp;&nbsp;約1 Kg　1肩</p>\r\n\r\n<p>■お召し上がり方&nbsp;　&nbsp;冷蔵庫で12時間前後ゆっくり解凍してから、そのままお召し上がりください。&nbsp;&nbsp;<br />\r\nお好みで三杯酢やポン酢などをつけてお召し上がりください。&nbsp;<br />\r\n再度茹で上げるとか、レンジで温めるとかはしないで下さい&nbsp;</p>\r\n\r\n<p>■原材料原産地&nbsp;&nbsp;&nbsp;ロシア&nbsp;</p>\r\n\r\n<p>■賞味期限&nbsp;&nbsp;&nbsp;冷凍庫で一カ月以内</p>\r\n\r\n<p>■配送方法&nbsp;&nbsp;&nbsp;クール冷凍便&nbsp;</p>\r\n\r\n<p>■ご注意&nbsp;&nbsp;解凍後はお早めにお召し上がり下さい。</p>\r\n\r\n<p>※冷凍状態で計測した重量となります。 カニなどの商品は水分を多く含むため、解凍後は水分が抜けた分だけ重量が変動します。</p>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります&nbsp;</p>', '2017-12-02 08:54:46', '2017-12-02 13:54:46'),
(29, 1, '', '', 'ズワイガニ　毛蟹　タラバガニ　詰め合わせ', 17800, 1, '', '20171202083926_カニ3点.jpg', '<p><strong><tt><big><small>タラバガニの食べごたえを豪快に味わってください蟹の大様、その甲羅の中にはみずみずしくほくほくとした身が詰まっています、その味は淡泊だけど旨味が凝縮。</small></big></tt></strong></p>\r\n\r\n<p><strong><tt><big><small>ズワイガニの甘みと旨さを堪能<tt><big><small>上品で繊細なのは厳しいオホーツク海で磨かれたからでしょうか、甘みと旨味が調和された味わい</small></big></tt></small></big></tt></strong></p>\r\n\r\n<p><strong><tt><big><small>濃厚なのにすっきり、毛蟹の味を堪能してください、<tt><big><small>きめ細やかな肉質の身に、濃縮された甘みと旨味、ほのかに香る磯の香りも食欲をそそります</small></big></tt></small></big></tt></strong></p>\r\n\r\n<p>■ 商品内容&nbsp;&nbsp;&nbsp;茹で上げタラバガ二脚、茹で上げズワイガニ、茹で上げ毛蟹</p>\r\n\r\n<p>■内容量　タラバガニ脚 約800g1尾　ズワイガニ約800ｇ1尾　毛蟹約650ｇ1尾</p>\r\n\r\n<p>■原産地　タラバガニ ロシア　ズワイガニ ロシア　毛蟹 北海道　</p>\r\n\r\n<p>■賞味期限　冷凍庫で一カ月</p>\r\n\r\n<p>■配送方法　クール冷凍便</p>\r\n\r\n<p>■ご注意　解凍後はお早めにお召し上がりください</p>\r\n\r\n<p>※画像はイメージです、実際と異なる場合がございます</p>\r\n\r\n<p>※冷凍状態で計測した重量となります。カニなどの商品は水分が抜けた分だけ重量が変動します。足の先の一部が欠けている場合がございます。予めご了承ください。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '2017-12-03 15:15:12', '2017-12-03 20:15:12'),
(416, 4, '', '', '松前漬け 450g', 2200, 100, '', '20171027052016_松前漬け450ｇ.jpg', '<p><strong>北海道・道南産のスルメイカと真昆布を使用し、たっぷりの本数の子とあわせた贅沢な函館伝統の松前漬です。</strong></p>\r\n\r\n<p>■ 商品内容 本数の子黄金松前（醤油漬）</p>\r\n\r\n<p>■ 内容量　450ｇ<br />\r\n■ 原材料</p>\r\n\r\n<ul>\r\n	<li>数の子、しょうゆ、スルメ、砂糖、みりん、昆布、たん白加水分解物、食塩、赤唐辛子、風味原料（かつお節粉末、かつおエキス）、酵母エキス、ソルビット、調味料（アミノ酸等）、増粘多糖類、（原材料の一部に大豆および小麦を含む）</li>\r\n</ul>\r\n\r\n<p>■ 賞味期限　冷蔵２５日　開封後はお早めにお召し上がりください</p>\r\n\r\n<p>■ 配送方法　クール冷凍便</p>', '2017-12-02 08:07:44', '2017-12-02 13:07:44'),
(417, 4, '', '', '松前漬け 230g', 1300, 100, '', '20171027051726_松前漬け.jpg', '<p><strong>北海道・道南産のスルメイカと真昆布を使用し、たっぷりの本数の子とあわせた贅沢な函館伝統の松前漬です。</strong></p>\r\n\r\n<p>■ 商品内容 本数の子黄金松前（醤油漬）</p>\r\n\r\n<p>■ 内容量&nbsp;&nbsp;&nbsp;&nbsp;230ｇ<br />\r\n■ 原材料</p>\r\n\r\n<ul>\r\n	<li>数の子、しょうゆ、スルメ、砂糖、みりん、昆布、たん白加水分解物、食塩、赤唐辛子、風味原料（かつお節粉末、かつおエキス）、酵母エキス、ソルビット、調味料（アミノ酸等）、増粘多糖類、（原材料の一部に大豆および小麦を含む）</li>\r\n</ul>\r\n\r\n<p>■ 賞味期限　冷蔵２５日　開封後はお早めにお召し上がりください</p>\r\n\r\n<p>■ 配送方法　クール冷凍便</p>\r\n\r\n<p>■ご注意　解凍後はお早めにお召し上がり下さい。</p>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります</p>\r\n\r\n<p>&nbsp;</p>', '2017-12-02 08:09:35', '2017-12-02 13:09:35'),
(418, 4, '', '', '干し貝柱松前漬け200ｇ', 980, 100, '', '20171110102344_IMG_8273.PNG.png', '<p><strong>松前漬に大粒の干し貝柱を大胆に加えました。贅沢な味わいをお届けします。</strong></p>\r\n\r\n<p>■ 商品内容&nbsp;&nbsp; 干し貝柱松前漬</p>\r\n\r\n<p>■ 内容量&nbsp;&nbsp;&nbsp;200ｇ</p>\r\n\r\n<p>■ 原材料&nbsp;&nbsp;&nbsp;&nbsp;発酵調味料、帆立干し貝柱、いか加工品、しょうゆ、昆布、還元水飴、赤唐辛子、ソルビット、調味料（アミノ酸等）、増粘多糖類</p>\r\n\r\n<p>■ 賞味期限&nbsp;&nbsp;&nbsp;冷凍90日（解凍後、冷蔵保存時は30日）</p>\r\n\r\n<p>■ 配送方法&nbsp;&nbsp;&nbsp;クール冷凍便</p>\r\n\r\n<p>■ ご注意&nbsp;&nbsp;&nbsp;解凍後はお早めにお召し上がりください</p>\r\n\r\n<p>&nbsp;※画像はイメージです。実際とは異なる場合があります</p>', '2017-12-02 08:10:54', '2017-12-02 13:10:54'),
(419, 4, '', '', '社長の塩辛 250g', 860, 100, '', '20171027100013_社長の塩辛化粧箱.jpeg', '<p>北海道産の真いかを使用し、絶妙な味付けを施したイチオシのいか塩辛がこの「社長のいか塩辛」です。商品名はその昔、社長が得意先回りの際に、手土産として使用していたのがその由来です。<br />\r\nネーミングがとっても面白い『社長のいか塩辛』です。<br />\r\n函館近海の生いかと天然塩を使用した推薦の本格的な塩辛です。食べてみなけりゃ解らない！<br />\r\n国産の真いかを使用し、絶妙な味付けを施したいか塩辛です。<br />\r\n天然塩とゴロと呼ばれるいかの肝臓のまろやかで濃厚な味わいで、酒の肴にも、ごはんのお供にぴったり！<br />\r\n何倍でもおかわりしたくなる美味しさです。</p>\r\n\r\n<p><br />\r\n■ 商品内容 &nbsp; 社長の塩辛<br />\r\n■ 内容量　250g化粧箱</p>\r\n\r\n<p>■ 原材料原産地　いか、いか肝臓、食塩、砂糖、みりん、たん白水分解物、ソルビット、調味料（アミノ酸等）、増粘多糖類</p>\r\n\r\n<p>■ 賞味期限　解凍後は、2日以内に召し上がってください。</p>\r\n\r\n<ul>\r\n	<li>冷凍保存の場合は、冷凍庫で1ヶ月が目安です。</li>\r\n</ul>\r\n\r\n<p>■ 配送方法　クール冷凍便<br />\r\n■ ご注意　 解凍後はお早めにお召し上がり下さい。　</p>', '2017-12-02 08:14:04', '2017-12-02 13:14:04'),
(420, 4, '', '', '社長の塩辛 180g', 650, 100, '', '20171027090158_社長の塩辛カップ.jpg', '<p>北海道産の真いかを使用し、絶妙な味付けを施したイチオシのいか塩辛がこの「社長のいか塩辛」です。商品名はその昔、社長が得意先回りの際に、手土産として使用していたのがその由来です。<br />\r\nネーミングがとっても面白い『社長のいか塩辛』です。函館近海の生いかと天然塩を使用した推薦の本格的な塩辛です。食べてみなけりゃ解らない！国産の真いかを使用し、絶妙な味付けを施したいか塩辛です。<br />\r\n天然塩とゴロと呼ばれるいかの肝臓のまろやかで濃厚な味わいで、酒の肴にも、ごはんのお供にぴったり！何倍でもおかわりしたくなる美味しさです。</p>\r\n\r\n<p>■商品内容　社長のいか塩辛</p>\r\n\r\n<p>■内容量　180gカップ入り</p>\r\n\r\n<p>■原材料原産地　いか、いか肝臓、食塩、砂糖、みりん、たん白水分解物、ソルビット、調味料（アミノ酸等）、増粘多糖類</p>\r\n\r\n<p>■賞味期限　解凍後は、2日以内に召し上がってください。</p>\r\n\r\n<ul>\r\n	<li>冷凍保存の場合は、冷凍庫で1ヶ月が目安です。</li>\r\n</ul>\r\n\r\n<p>■配送方法　クール冷凍便<br />\r\n■ご注意　解凍後はお早めにお召し上がり下さい。</p>', '2017-12-02 08:16:07', '2017-12-02 13:16:07'),
(421, 4, '', '', 'イカの一夜干し', 900, 100, '', '20171027102003_イカの一夜干し.jpg', '<p>■ 商品内容イカの一夜干し<br />\r\n■ 内容量　２枚</p>\r\n\r\n<p>■ お召し上がり方　グリル、フライパンなどで焼いたり、さっとゆでたりしてください</p>\r\n\r\n<p>■ 原材料原産地　するめいか（国産）食塩<br />\r\n■ 賞味期限　冷凍庫で一カ月以内<br />\r\n■ 配送方法　クール冷凍便<br />\r\n■ ご注意* 解凍後はお早めにお召し上がり下さい。　</p>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります</p>', '2017-12-02 08:19:32', '2017-12-02 13:19:32'),
(422, 4, '', '', 'とろろ昆布 500g', 2400, 100, '', '20171121114826_とろろ昆布.jpg', '<p><strong>北海道産昆布を削ったおいしいとろろ昆布です。お吸い物、うどんなどに！</strong></p>\r\n\r\n<p><br />\r\n<strong>■ 商品内容　とろろ昆布<br />\r\n■ 内容量　500ｇ<br />\r\n■ 原材料原産地　昆布（北海道産）・醸造酢</strong></p>\r\n\r\n<p>■ 賞味期限　90日<br />\r\n■ 保存方法・ご注意　高温多湿をお避け下さい。</p>\r\n\r\n<ul>\r\n	<li>お召し上がり方お吸い物や、うどん、そばに入れてお召し上がりください。</li>\r\n	<li>卵焼きに昆布を加えて。</li>\r\n	<li>手軽に調理でき、出汁を入れなくても昆布の旨みが口にふわ～っと広がります。</li>\r\n</ul>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります</p>', '2017-12-02 08:21:33', '2017-12-02 13:21:33'),
(423, 4, '', '', '早煮昆布 200g', 1300, 100, '', '20171027052632_早煮昆布.jpeg', '<p>昆布の一番やわらかい春に採取した昆布です。短い時間で大変やわらかく煮上り、味も良くしみ、ご家庭料理には欠かせないこんぶです。<br />\r\n煮昆布専用として採ったもので煮しめ、昆布巻きの他野菜やお肉、お魚との煮合わせに最適です。<br />\r\n水だけでも簡単にやわらかくなるコンブ！ 柔らかく、火が通りやすく、煮昆布として最適。&nbsp;専用の棹を使い、通常より早く採取することから『棹前こんぶ』と呼ばれています。</p>\r\n\r\n<p><br />\r\n■ 商品内容　早煮昆布<br />\r\n■ 内容量　200ｇ<br />\r\n■ 原材料原産地　北海道産<br />\r\n■ 賞味期限　製造日より１年<br />\r\n■ 保管方法直射日光、高温多湿を避けて下さい<br />\r\n■ 注意事項　表面の白い粉や斑点は主としてマンニットという糖の一種の甘み成分でカビではありません</p>\r\n\r\n<ul>\r\n	<li>お召し上がり方昆布巻、結び昆布、お豆、お野菜等と煮合せてお召し上り下さい。</li>\r\n	<li>又、細く切り熱湯を通しやわらかくなった昆布を、サラダの中や五目ごはんの中に入れて</li>\r\n	<li>お召し上り下さい。昆布の味と色彩が加わりおいしくいただけます。</li>\r\n</ul>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります</p>', '2017-12-02 08:24:40', '2017-12-02 13:24:40'),
(424, 4, '', '', '利尻昆布 150g', 1800, 100, '', '20171121114921_利尻昆布.jpg', '<p>利尻昆布は澄んだ香りの良いだし汁がとれる高級昆布です。京都では千枚漬けや湯豆腐などに珍重されています。<br />\r\nだしをとった後は、つくだ煮や煮物に使う他、おぼろ昆布・とろろ昆布の加工用にも利用されています。<br />\r\n北海道道北産天然利尻昆布は粘りもあり適度な塩味を含み澄んだ上品なだしがとれます。うどん屋さんや料亭などで広く使われており、鍋物やお吸い物に最適です。</p>\r\n\r\n<p>■ 商品内容　利尻昆布<br />\r\n■ 内容量　150ｇ<br />\r\n■ 原材料原産地　北海道産<br />\r\n■ 賞味期限　製造日より１年<br />\r\n■ 保管方法直　射日光、高温多湿を避けて下さい<br />\r\n■ 注意事項　表面の白い粉や斑点は主としてマンニットという糖の一種の甘み成分でカビではありません　</p>\r\n\r\n<p>●お召し上がり方　</p>\r\n\r\n<p>昆布の表面を乾布でふき、お鍋に水５カップ（約１Ｌ）につき20ｇ前後を入れ中火にかけて沸騰したらすぐに昆布を引き上げてください。</p>\r\n\r\n<p>昆布は煮すぎてしまうと、臭みやとろみが出てしまいます。和風だしやそば汁用のだしの場合は、前の晩から水に漬けておき、</p>\r\n\r\n<p>火にかけたら沸騰直前に昆布をとりだすとよいでしょう。</p>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります</p>\r\n\r\n<p>&nbsp;</p>', '2017-12-02 08:27:05', '2017-12-02 13:27:05'),
(425, 4, '', '', '羅臼昆布 100g', 2600, 100, '', '20171122110504_羅臼昆布1.jpg', '<p>味か濃く、香りよい高級だし昆布<br />\r\nだしの良さで名高い羅臼昆布の最高級品。にごりがでないのでお吸い物やだし汁に最適です。<br />\r\n昆布の表面には白い粉がついている事がありますが、汚れやカビではなく「マンニット」という旨み成分です。美容食として最高の『自然食』です。 コンブは低カロリー、低脂肪でヘルシーな食品です。カロリー摂取の気になる方にうれしい食品です。<br />\r\n水洗いしますと旨み成分が流れてしまいますので、 乾いたふきん、又は固く絞った濡れふきんで表面を、汚れやゴミだけ落とす程度に軽く拭くようにして下さいね。</p>\r\n\r\n<p>■ 商品内容　羅臼昆布<br />\r\n■ 内容量　100ｇ<br />\r\n■ 原材料原産地　北海道羅臼産<br />\r\n■ 賞味期限　製造日より１年<br />\r\nお荷物が到着しましたらすぐに冷凍庫に保管し、賞味期限内にお召し上がりください。<br />\r\nまたお召し上がりの際は自然解凍し、解凍後はお早めにお召し上がりください。</p>\r\n\r\n<p>■ 保管方法直射日光、高温多湿を避けて下さい<br />\r\n■ 注意事項　表面の白い粉や斑点は主としてマンニットという糖の一種の甘み成分でカビではありません</p>\r\n\r\n<p>■お召し上がり方　</p>\r\n\r\n<p>羅臼昆布のだしをとって鍋物やお吸い物や煮物に。お味噌汁にも。&nbsp;</p>\r\n\r\n<p>&nbsp;だしをとったあとは捨てないで甘辛く煮て佃煮にしたり、 　きざんで浅漬けに入れても美味しく召し上がれます。</p>\r\n\r\n<p>&nbsp;鯛やひらめなどの白身魚のお刺身をはさんで昆布〆めに。 また、乾燥したままの昆布を小さく切ってそのまま 　</p>\r\n\r\n<p>&nbsp;おつまみ昆布として食べると自然な磯の味と塩分で昆布 　本来の味も楽しめます。</p>\r\n\r\n<p>※画像はイメージです。実際とは異なる場合があります</p>', '2017-12-02 08:29:35', '2017-12-02 13:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `pro_order`
--

CREATE TABLE `pro_order` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `session` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `sname1` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sname2` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `fname1` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `fname2` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code1` int(11) NOT NULL,
  `zip_code2` int(11) NOT NULL,
  `prefecture` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `municipality` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `shipping_cost` int(11) NOT NULL,
  `delivery_cost` int(11) NOT NULL,
  `order_date` text COLLATE utf8_unicode_ci NOT NULL,
  `order_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` int(100) NOT NULL,
  `step` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pro_order`
--

INSERT INTO `pro_order` (`id`, `order_id`, `member_id`, `session`, `product_id`, `sname1`, `sname2`, `fname1`, `fname2`, `email`, `zip_code1`, `zip_code2`, `prefecture`, `municipality`, `address`, `mobile`, `quantity`, `price`, `shipping_cost`, `delivery_cost`, `order_date`, `order_time`, `payment_method`, `step`, `status`, `created_at`, `updated_at`) VALUES
(164, 1, 48, '5838918a399356f3eba92fe7e389e97074856583', 0, '1', '1', '1', '1', 'riad.excel@gmail.com', 1, 1, '1', '1', '1\r\n1', '1', 3, 16420, 1000, 0, '0000-00-00', '00:00:00', 3, 6, 0, '2017-11-24 07:44:53', '2017-11-24 12:44:53'),
(165, 2, 48, '4bcf56d425dc93800e1072281ae0af75d009bf01', 0, '1', '1', '1', '1', 'riad.excel@gmail.com', 1, 1, '1', '1', '1\r\n1', '1', 3, 16420, 1000, 0, '0000-00-00', '00:00:00', 3, 6, 0, '2017-11-24 07:47:16', '2017-11-24 12:47:16'),
(167, 4, 48, 'fb8e55067c104b89cb25a47a0db5bcaa569dccf9', 0, 'rd hawladar', 'hawladar', '1', '1', 'riad.excel@gmail.com', 1, 1, '1', '1', 'rdhawladar address\r\n1\r\n1', '1', 3, 16420, 1000, 0, '0000-00-00', '13:00:00', 3, 6, 0, '2017-11-24 11:20:48', '2017-11-24 16:20:48'),
(168, 5, 37, 'f11e3d368b77e0751ec8104625befb337a8cef2c', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '4-21-21　301', '2147483647', 1, 2600, 1180, 0, '0000-00-00', '00:00:00', 2, 6, 0, '2017-11-25 01:46:51', '2017-12-13 07:55:45'),
(169, 6, 49, '65e2fdc707cda8eb44e35be2941b0acaf4817b4b', 0, '敏弘', '山田', 'としひろ', 'やまだ', 'john4apps27@gmail.co', 15, 1545, '17', '渋谷', 'スカイトリー015道', '2147483647', 1, 12000, 1180, 432, '0000-00-00', '00:00:00', 1, 6, 0, '2017-11-27 03:48:42', '2017-11-27 08:48:42'),
(170, 7, 49, 'd9f3dd5085199197ea40c998bcadde82fac93fe8', 0, '敏弘', '山田', 'としひろ', 'やまだ', 'john4apps27@gmail.co', 15, 1545, '17', '渋谷', 'スカイトリー015道', '2147483647', 2, 9940, 1180, 324, '0000-00-00', '13:00:00', 1, 6, 0, '2017-11-27 04:19:09', '2017-11-27 09:19:09'),
(174, 9, 54, 'af0760a307aea27cbed7f1dc3a9c7cd329d1a3d6', 0, 'john', 'test', 'john', 'test', 'john4apps27@gmail.com', 763, 8787, '9', 'test addres', 'more address', '908766334', 2, 11450, 1180, 432, '2017-12-04', '12:00:00', 1, 6, 0, '2017-11-27 11:11:56', '2017-11-27 11:12:34'),
(175, 10, 54, '3f035c1f536d1aadd48be0d10fd8ca6909a22e91', 0, 'john', 'test', 'john', 'test', 'john4apps27@gmail.com', 763, 8787, '9', 'test addres', 'more address', '908766334', 1, 4970, 1180, 0, '0-0-0', '00:00:00', 2, 6, 0, '2017-11-27 11:45:12', '2017-11-27 11:55:43'),
(176, 11, 36, 'f0d7763bb4be5ba03df8d8f04002ccc5698c2728', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '4-21-21　301', '2147483647', 2, 1480, 1180, 324, '0-0-0', '00:00:00', 1, 6, 1, '2017-11-28 15:11:05', '2017-11-30 05:45:39'),
(177, 12, 48, '01ed8ad02f835e36c50038dc3542b6813f2c3427', 0, 'rd hawladar', 'hawladar', '1', '1', 'riad.excel@gmail.com', 1, 1, '1', '1', 'rdhawladar address\r\n1\r\n1', '1', 2, 11270, 1000, 432, '2017-12-08', '13:00:00', 1, 6, 0, '2017-11-28 16:15:09', '2017-11-28 16:15:36'),
(178, 13, 48, 'a3bcdaef10a166a762e15732068626c3237930a0', 0, 'rd hawladar', 'hawladar', '1', '1', 'rdhawladar@gmail.com', 1, 1, '1', '1', 'rdhawladar address\r\n1\r\n1', '1', 1, 4970, 1000, 324, '2017-12-10', '12:00:00', 1, 6, 0, '2017-11-28 16:31:32', '2017-11-28 16:31:47'),
(179, 14, 48, '4e2873bc5272168a3bb4dc95c0622700271483fe', 0, 'rd hawladar', 'hawladar', '1', '1', 'riad.excel@gmail.com', 1, 1, '1', '1', 'rdhawladar address\r\n1\r\n1, 郵便番号: 1 1, 市区町村: 1, 都道府県: 北海道', '1', 3, 16420, 1000, 432, '2017-12-08', '12:00:00', 1, 6, 0, '2017-11-29 09:02:12', '2017-11-29 09:02:25'),
(180, 15, 54, '260744c84c5d831498e50bf0a5bd5c0b9570e51d', 0, 'john', 'test', 'john', 'test', 'john4apps27@gmail.com', 763, 8787, '9', 'test addres', 'more address', '908766334', 2, 17280, 1180, 432, '2017-12-07', '13:00:00', 1, 6, 0, '2017-11-29 09:15:43', '2017-11-29 09:16:02'),
(181, 16, 37, '7d680ba619352e87b4268db7241b1ce1981cc1e9', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '4-21-21　301', '2147483647', 2, 8660, 1180, 0, '0-0-0', '12:00:00', 2, 6, 0, '2017-11-29 09:48:07', '2017-12-13 07:55:52'),
(182, 17, 36, 'ac20d243f8aabf9c057fff8f339f5016b36c9e4d', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '4-21-21　301', '2147483647', 3, 4740, 1180, 324, '0-0-0', '00:00:00', 1, 6, 0, '2017-11-30 08:27:45', '2017-11-30 08:28:03'),
(183, 18, 54, '1a4b9b550f69c9893cdd8ede859eaa19c2b08d1c', 0, 'john', 'test', 'john', 'test', 'john4apps27@gmail.com', 763, 8787, '9', 'test addres', 'more address', '908766334', 1, 1100, 1180, 0, '2017-12-10', '00:00:00', 2, 6, 0, '2017-11-30 10:47:23', '2017-11-30 10:48:00'),
(185, 19, 48, 'f60123b6d2378377e772c3d32fc330c452efa7b0', 0, 'rd hawladar', 'hawladar', '1', '1', 'riad.excel@gmail.com', 1, 1, '1', '1', 'rdhawladar address\r\n1\r\n1, 郵便番号: 1 1, 市区町村: 1, 都道府県: 北海道', '1', 4, 22900, 1000, 432, '0-0-0', '00:00:00', 1, 6, 0, '2017-11-30 11:08:39', '2017-11-30 11:08:53'),
(186, 20, 48, '0f347359298c83c8418fb0e6794ae116401c681a', 0, 'rd hawladar', 'hawladar', '1', '1', 'riad.excel@gmail.com', 1, 1, '1', '1', 'rdhawladar address\r\n1\r\n1, 郵便番号: 1 1, 市区町村: 1, 都道府県: 北海道', '1', 1, 4970, 1000, 324, '0-0-0', '00:00:00', 1, 6, 0, '2017-11-30 11:40:17', '2017-11-30 11:40:32'),
(187, 21, 36, 'a103a150e450b3b091e8cd49635356a916457011', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '4-21-21　301', '2147483647', 2, 12380, 1180, 432, '0-0-0', '00:00:00', 1, 6, 0, '2017-11-30 18:54:58', '2017-11-30 18:55:11'),
(188, 22, 36, '0403ad6a3046f8ef1ea2d40a463fe88a7f4e3b7a', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '4-21-21　301', '2147483647', 1, 6300, 1180, 324, '0-0-0', '00:00:00', 1, 6, 0, '2017-11-30 19:29:24', '2017-11-30 19:29:41'),
(189, 23, 36, '30f46cafb50cb812cf2b6ecc730038be47096bde', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '4-21-21　301', '2147483647', 1, 1100, 1180, 324, '0-0-0', '00:00:00', 1, 6, 0, '2017-11-30 19:30:43', '2017-11-30 19:31:13'),
(190, 24, 0, 'fc4ed0be26db03c407d929b2d189440d51769870', 0, 'sawa', 'dai', 'sawa', 'sawa', 'sa_0316@yahoo.co.jp', 155, 22, '15', '横浜市青葉区', '4-5-6', '2147483647', 1, 4970, 1180, 324, '0-0-0', '00:00:00', 1, 6, 0, '2017-11-30 19:33:40', '2017-11-30 19:34:23'),
(191, 25, 36, '274a26cb4ff339a0d3728b6f1cc1b91d31de7768', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '156-0055　東京都世田谷区船橋4-21-21　301', '2147483647', 1, 4970, 1180, 324, '0-0-0', '00:00:00', 1, 6, 0, '2017-12-01 22:09:57', '2017-12-01 22:10:16'),
(192, 26, 36, 'bb3e49f1df3e2cca94f0a263f7a5f02ded34c5a7', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '156 55,  156 55,  ,  世田谷区船橋,4-21-21 東京(23区内)', '2147483647', 2, 9940, 1180, 0, '0-0-0', '00:00:00', 2, 6, 0, '2017-12-04 12:06:23', '2017-12-04 12:06:55'),
(193, 27, 36, '0740b48e5e3e2989ec47b10ba50471708aad4835', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '156 55,  世田谷区船橋,4-21-21 東京(23区内),', '2147483647', 1, 1300, 1180, 0, '0-0-0', '00:00:00', 2, 6, 0, '2017-12-05 13:29:56', '2017-12-05 13:30:22'),
(194, 28, 48, 'e0ba0a3f5397de4c8319f732ebef610d63c86bf0', 0, 'rd hawladar', 'hawladar', '1', '1', 'riad.excel@gmail.com', 123, 1234, '1', 'test', 'rdhawladar address', '1', 1, 4970, 0, 0, '', '00:00:00', 0, 3, 0, '2017-12-07 08:18:54', '2017-12-07 08:18:54'),
(198, 30, 54, '39b610e903889506d6c2d24bc50ca2db5644ac9c', 0, 'john', 'test', 'john', 'test', 'john4apps27@gmail.com', 123, 345, '1', 'kita machi  change', 'sky tree 300', '908766334', 1, 4970, 1000, 324, '2017-12-17', '12:00〜13:00', 1, 6, 0, '2017-12-07 12:30:01', '2017-12-07 12:41:53'),
(200, 31, 48, '9c8abd9f6e2e69542981fed452164d9bfc881f3a', 0, 'rd hawladar', 'hawladar', '1', '1', 'riad.excel@gmail.com', 123, 1234, '1', 'test', 'rdhawladar address', '1', 1, 4970, 0, 0, '', '', 0, 3, 0, '2017-12-07 12:42:35', '2017-12-07 12:42:35'),
(202, 32, 54, '46ba570744ea19bccb34394f637eeb647f93cd4a', 0, 'john', 'test', 'john', 'test', 'john4apps27@gmail.com', 123, 345, '12', 'kita machi', 'sky tree 300', '908766334', 1, 8640, 0, 0, '2017-12-15', '12:00〜13:00', 0, 4, 0, '2017-12-08 02:06:26', '2017-12-08 02:07:03'),
(203, 33, 36, '541fee71226e925e9e7de44e22c18b2ae2bd02aa', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '156 55,  世田谷区船橋,4-21-21 東京(23区内),', '2147483647', 1, 4970, 1180, 0, '0-0-0', '00:00〜00:00', 2, 6, 0, '2017-12-08 04:12:17', '2017-12-08 04:12:47'),
(204, 34, 36, '65986dbdd08f1d920605084482d197853ddcf810', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '156 55,  世田谷区船橋,4-21-21 東京(23区内),', '2147483647', 1, 1100, 1180, 0, '0-0-0', '00:00〜00:00', 2, 6, 0, '2017-12-08 04:14:03', '2017-12-08 04:14:15'),
(205, 35, 54, '4e175e7102e857e6dc5c091a27b5bfc6729c985f', 0, 'john', 'test', 'ジョーン', 'テスト', 'john4apps27@gmail.com', 345, 5827, '4', 'test delivery state', 'Sky tree 300', '908766334', 4, 47200, 1180, 0, '2017-12-15', '12:00〜13:00', 2, 6, 0, '2017-12-08 21:10:25', '2017-12-08 21:11:29'),
(206, 36, 36, 'cf4a6bd90383faaef16b8ae94edeeaf5343555df', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '4-21-21 301 大に', '2147483647', 1, 8640, 1180, 0, '2017-12-17', '12:00〜13:00', 2, 6, 0, '2017-12-08 23:00:59', '2017-12-08 23:02:00'),
(207, 37, 57, '6adc5b4ce788ceaa094b8b8d07ff91ae02aef330', 0, 'Mainul', 'Hossain', 'マイヌル', 'ホッセイン', 'hell2humpty@gmail.com', 111, 1234, '12', '南埼玉群　宮代町', 'ホンデン２−３−９　吉田荘201', '01767613121', 1, 4970, 1180, 0, '2017-12-18', '12:00〜13:00', 2, 6, 0, '2017-12-11 19:19:01', '2017-12-11 19:19:39'),
(208, 38, 57, '031e2d6a54b2732740dde3464e1e4171e69422c0', 0, 'Mainul', 'Hossain', 'マイヌル', 'ホッセイン', 'hell2humpty@gmail.com', 111, 1234, '49', '南埼玉群　宮代町', 'ホンデン２−３−９　吉田荘５０９', '01767613121', 1, 11800, 2800, 432, '2017-12-25', '14:00〜15:00', 1, 6, 0, '2017-12-11 19:25:38', '2017-12-11 19:26:37'),
(209, 39, 36, '293249d5fdfff2af0fdec6dad787d538202f6bfe', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '4-21-21', '2147483647', 1, 8640, 1180, 0, '2017-12-21', '14:00〜15:00', 2, 6, 0, '2017-12-11 23:19:03', '2017-12-11 23:19:30'),
(210, 40, 58, '3cae881ea86f8ff77524ade32d2ff52e805af60d', 0, '藤井', '正行', 'ふじい', 'まさゆき', 'marufuji1911@yahoo.co.jp', 179, 73, '48', '那覇市', '1-1-1', '0359671911', 3, 1860, 2800, 324, '2017-12-22', '14:00〜15:00', 1, 6, 0, '2017-12-12 19:54:23', '2017-12-12 19:58:26'),
(212, 41, 48, 'a0001f17b09e60cbabeab3d5f7ccef0daa74672d', 0, 'rd hawladar', 'hawladar', 'fname1', 'fname2', 'riad.excel@gmail.com', 123, 1234, '1', 'test', 'rdhawladar address', '0002147483647', 1, 4850, 0, 0, '', '', 0, 3, 0, '2017-12-13 18:54:47', '2017-12-13 18:54:47'),
(213, 42, 57, '857ed968efed191de7db126404be17e573c09958', 0, 'Mainul', 'Hossain', 'マイヌル', 'ホッセイン', 'hell2humpty@gmail.com', 111, 1234, '12', '南埼玉群　宮代町', 'ホンデン２−３−９　吉田荘５０９', '01767613121', 1, 4850, 1180, 0, '2017-12-23', '13:00〜14:00', 2, 6, 0, '2017-12-14 00:03:13', '2017-12-14 00:03:37'),
(214, 43, 36, 'fef1e5da54243a72289201e2a9830dd01ab7899f', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '4-21-21', '09025228500', 1, 4850, 1180, 0, '0-0-0', '00:00〜00:00', 2, 6, 0, '2017-12-16 18:41:51', '2017-12-16 18:42:25'),
(215, 44, 36, 'dbd7c7902b98b4323d419a590b8fdf7b9d0392f0', 0, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '4-21-21', '09025228500', 1, 8840, 0, 0, '', '', 0, 3, 0, '2017-12-25 19:32:47', '2017-12-25 19:32:47'),
(216, 45, 48, 'a3cf765cf91a0a03d2d294e15a5718fbc29434ae', 0, 'rd hawladar', 'hawladar', 'fname1', 'fname2', 'riad.excel@gmail.com', 123, 1234, '1', 'test', 'rdhawladar address', '0002147483647', 1, 4850, 0, 0, '', '', 0, 3, 0, '2017-12-28 20:46:53', '2017-12-28 20:46:53'),
(217, 46, 54, '1a037ed497d1566850c232e33cdc35c87f566acf', 0, 'john', 'test', 'ジョーン', 'テスト', 'john4apps27@gmail.com', 345, 5827, '11', 'kita machi', 'Sky tree 300', '908766334', 1, 4850, 0, 0, '', '', 0, 3, 0, '2017-12-29 01:15:48', '2017-12-29 01:15:48'),
(221, 47, 48, '5ca23426d3ba5660cefda886b71350c355bbdda6', 0, 'rd hawladar', 'hawladar', 'fname1', 'fname2', 'riad.excel@gmail.com', 123, 1234, '1', 'test', 'rdhawladar address', '0002147483647', 1, 5600, 0, 0, '', '', 0, 3, 0, '2017-12-29 01:43:50', '2017-12-29 01:43:50'),
(222, 48, 48, '1f578f9484b9a56c9c64e23166187659ba497eca', 0, 'rd hawladar', 'hawladar', 'fname1', 'fname2', 'riad.excel@gmail.com', 123, 1234, '1', 'test', 'rdhawladar address', '0002147483647', 1, 5600, 0, 0, '', '', 0, 3, 0, '2017-12-29 01:45:08', '2017-12-29 01:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(11) NOT NULL,
  `qualification` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `qualification`, `created_at`, `updated_at`) VALUES
(1, 'Businessman', '2017-07-13 11:33:46', '2017-07-13 11:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `question_answer_requests`
--

CREATE TABLE `question_answer_requests` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varbinary(500) DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  `chat_type` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`, `chat_type`) VALUES
('1a037ed497d1566850c232e33cdc35c87f566acf', 54, '114.134.91.94', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:57.0) Gecko/20100101 Firefox/57.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiNEJuN0VEWWs3VllQU1RleW90TzUzSkpra0htY2JIRUROcWg5bXExaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vaG9rdXRvdXN1aXNhbi5jb20vY2hlY2tvdXQvbW9iaWxlX21lbnUuY3NzIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cHM6Ly9ob2t1dG91c3Vpc2FuLmNvbS91c2VyL3BhbmVsIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTQ7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE1MTQ0NTk3NDk7czoxOiJjIjtpOjE1MTQ0NTkzODI7czoxOiJsIjtzOjE6IjAiO319', 1514459749, ''),
('1f578f9484b9a56c9c64e23166187659ba497eca', 48, '114.134.91.94', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoicERHOFBtQldNSHhkUEd4dTZoSDl4bDlmTUwxbE5aTVp5TVpLWkdwWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vaG9rdXRvdXN1aXNhbi5jb20vYWRtaW4vb3JkZXItZGF0ZS1yYW5nZSI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cHM6Ly9ob2t1dG91c3Vpc2FuLmNvbS91c2VyL3BhbmVsIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDg7czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNTE0NDYxODU0O3M6MToiYyI7aToxNTE0NDU1OTY0O3M6MToibCI7czoxOiIwIjt9fQ==', 1514461854, ''),
('254640cee6d72997017ab4273bef337cc92963a9', NULL, '126.254.74.8', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_1 like Mac OS X) AppleWebKit/604.4.7 (KHTML, like Gecko) Version/11.0 Mobile/15C153 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMDNyMXkwQ05pUkdYWXpaTVVTelRPQmZ0ME5aWTVUdGNMSHZaOGViUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vaG9rdXRvdXN1aXNhbi5jb20vcHJvZHVjdC1kZXNjcmlwdGlvbi8xIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTUxNDQ2MTAwNTtzOjE6ImMiO2k6MTUxNDQ2MTAwMztzOjE6ImwiO3M6MToiMCI7fX0=', 1514461005, ''),
('2fd902c3daf5a2ed005ce5037ee13509e2a32216', NULL, '114.134.91.94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicklPdDNUNnNkbnJzaVVraWRYYkRKZnJxcHRqdWozR2E1bXowV0MxRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vaG9rdXRvdXN1aXNhbi5jb20vaG9tZSI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE1MTQ0NTk2MjU7czoxOiJjIjtpOjE1MTQ0NTk2MjQ7czoxOiJsIjtzOjE6IjAiO319', 1514459625, ''),
('a5e967445f7efa8b2c59c3d6c598951b78b7e264', NULL, '122.29.159.152', 'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibUF0clpDUVJhM0QybW1xdllqOFA2bXhYdmtNUUt4RnBMUDVBakR6aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vaG9rdXRvdXN1aXNhbi5jb20vaG9tZSI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE1MTQ0NTUxNTA7czoxOiJjIjtpOjE1MTQ0NTUxNDY7czoxOiJsIjtzOjE6IjAiO319', 1514455151, '');

-- --------------------------------------------------------

--
-- Table structure for table `slider_image`
--

CREATE TABLE `slider_image` (
  `id` int(11) NOT NULL,
  `slider_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `slider_url` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider_image`
--

INSERT INTO `slider_image` (`id`, `slider_title`, `slider_url`, `created_at`, `updated_at`) VALUES
(15, 'Slider 1', '20171017121329_Slider1.png', '2017-10-17 10:13:29', '2017-10-17 10:13:29'),
(16, 'Slider 2', '20171017121347_Slider2.png', '2017-10-17 10:13:47', '2017-10-17 10:13:47'),
(17, 'Slider 3', '20171017121452_Slider3.png', '2017-10-17 10:14:52', '2017-10-17 10:14:52'),
(18, 'Slider 4', '20171017121514_Slider4.png', '2017-10-17 10:15:14', '2017-10-17 10:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `sub_catagory`
--

CREATE TABLE `sub_catagory` (
  `id` int(11) NOT NULL,
  `parent_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `catagory_id` int(30) NOT NULL,
  `subcatagory_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `subcatagory_banner_url` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `subcatagory_thumbnail_url` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `subcatagory_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_catagory`
--

INSERT INTO `sub_catagory` (`id`, `parent_type`, `type`, `catagory_id`, `subcatagory_title`, `subcatagory_banner_url`, `subcatagory_thumbnail_url`, `subcatagory_description`, `created_at`, `updated_at`) VALUES
(2, 'cat', 'cat_1', 0, 'TEST', '20171011095239_banner.jpg', '20171012094439_Banner02.jpg', 'TEST', '2017-10-12 05:29:46', '2017-10-12 09:29:46'),
(3, 'cat', 'cat_2', 0, 'Category Two', '20171011064617_banner.jpg', '20171011064617_20171010062529_Banner03.jpg', 'test catagory description 2 test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2', '2017-10-11 13:25:24', '2017-10-10 18:46:17'),
(4, 'cat', 'cat_3', 0, 'Category Three', '20171011064628_banner.jpg', '20171011064628_20171010062537_Banner04.jpg', 'test catagory description 2 test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2', '2017-10-11 13:25:35', '2017-10-10 18:46:28'),
(5, 'cat_1', 'sub_11', 0, 'Sub category 1_1', '20171011095654_banner.jpg', '20171011095654_20171010063040_banner01.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-10-11 13:25:39', '2017-10-10 21:56:54'),
(6, 'cat_1', 'sub_12', 0, 'Sub category 1_2', '20171011095523_banner.jpg', '20171011095523_20171010063040_banner01.jpg', 'catagory_thumbnail_urlLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-10-11 13:34:13', '2017-10-10 21:55:23'),
(7, 'cat_1', 'sub_13', 0, 'Sub category 1_3', '20171011095538_banner.jpg', '20171011095538_20171010062537_Banner04.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-10-11 13:34:18', '2017-10-10 21:55:38'),
(8, 'cat_1', 'sub_14', 0, 'Sub category 1_4', '20171011101037_banner.jpg', '20171011101037_20171010062548_Banner05.jpg', 'Sub category 1_4Sub category 1_4Sub category 1_4Sub category 1_4Sub category 1_4Su b category 1_4Sub category 1_4Sub category  1_4Sub category 1_4Sub category 1_4Sub category 1_4Sub cate gory 1_4Sub category 1_4Sub cate gory 1_4S ub category 1_4Su b category 1_4', '2017-10-11 13:34:28', '2017-10-10 22:10:37'),
(9, 'cat_2', 'sub_21', 0, 'Sub category 2_1', '20171011100247_banner.jpg', '20171011100247_20171010065205_Banner04.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. I', '2017-10-11 13:34:34', '2017-10-10 22:02:47'),
(10, 'cat_2', 'sub_22', 0, 'Sub category  2_2', '20171011100200_banner.jpg', '20171011100200_20171010062548_Banner05.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-10-11 13:34:38', '2017-10-10 22:02:00'),
(11, 'cat_2', 'sub_23', 0, 'Sub category 2_3', '20171011065957_banner.jpg', '20171011065957_20171010062548_Banner05.jpg', 'Sub category 1Sub category 1', '2017-10-11 13:34:53', '2017-10-10 18:59:57'),
(12, 'cat_2', 'sub_24', 0, 'Sub category  2_4', '20171011101100_banner.jpg', '20171011101100_20171010062548_Banner05.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-10-11 13:34:56', '2017-10-10 22:11:00'),
(13, 'cat_2', 'sub_25', 0, 'Sub category  2_5', '20171011101122_banner.jpg', '20171011101122_20171010062537_Banner04.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-10-11 13:34:59', '2017-10-10 22:11:22'),
(14, 'cat_2', 'sub_26', 0, 'Sub category  2_6', '20171011101135_banner.jpg', '20171011101135_20171010062513_banner01.jpg', 'test catagory description 2 test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2test catagory description 2', '2017-10-11 13:35:01', '2017-10-10 22:11:35'),
(15, 'cat_3', 'sub_31', 0, 'Sub category 3_1', '20171011194427_banner.jpg', '20171011194427_20171010062522_Banner02.jpg', 'Sub category 3_7	Sub category 3_7	Sub category 3_7	Sub category 3_7	Sub category 3_7	Sub category 3_7	Sub category 3_7	Sub category 3_7	Sub category 3_7	Sub category 3_7	Sub category 3_7	Sub category 3_7	Sub category 3_7	Sub category 3_7	Sub category 3_7', '2017-10-11 13:44:27', '2017-10-11 07:44:27'),
(16, 'cat_3', 'sub_32', 0, 'Sub category 3_2', '20171011194514_banner.jpg', '20171011194514_20171010065205_Banner04.jpg', 'Sub category 3_1 Sub category 3_1 Sub category 3_1 Sub category 3_1 Sub category 3_1 Sub category 3_1 Sub category 3_1 Sub category 3_1 Sub category 3_1', '2017-10-11 13:45:14', '2017-10-11 07:45:14'),
(17, 'cat_3', 'sub_33', 0, 'Sub category 3_3', '20171011204423_banner.jpg', '20171011204423_20171010062548_Banner05.jpg', 'test subcatagory test subcatagory test subcatagory test subcatagory test subcatagory test subcatagory test subcatagory   test subcatagory test subcatagory test subcatagory test subcatagory', '2017-10-11 14:44:23', '2017-10-11 08:44:23'),
(18, 'cat_3', 'sub_34', 0, 'Sub category 3_4', '20171011101430_banner.jpg', '20171011101430_20171010065205_Banner04.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-10-11 13:35:22', '2017-10-10 22:14:30'),
(19, 'cat_3', 'sub_35', 0, 'Sub category  3_5', '20171011101456_banner.jpg', '20171011101456_20171010062529_Banner03.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-10-11 13:35:28', '2017-10-10 22:14:56'),
(20, 'cat_3', 'sub_36', 0, 'Sub category  3_6', '20171011101852_banner.jpg', '20171011101852_20171010065205_Banner04.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting i 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-10-11 13:35:35', '2017-10-10 22:18:52'),
(21, 'cat_3', 'sub_37', 0, 'Sub category 3_7', '20171011101826_banner.jpg', '20171011101826_20171010062537_Banner04.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-10-11 13:35:39', '2017-10-10 22:18:26'),
(22, '', '', 0, '1', '20171011214408_20171010063040_banner01.jpg', '20171011214408_20171010065205_Banner04.jpg', '2', '2017-10-11 09:44:08', '2017-10-11 09:44:08'),
(23, '', '', 0, '1', '20171011214458_20171010063040_banner01.jpg', '20171011214458_20171010065205_Banner04.jpg', '2', '2017-10-11 09:44:58', '2017-10-11 09:44:58'),
(24, '', '', 0, '1', '20171011214613_20171010063040_banner01.jpg', '20171011214613_20171010065205_Banner04.jpg', '2', '2017-10-11 09:46:13', '2017-10-11 09:46:13'),
(25, '', '', 0, '1', '20171011214713_20171010063040_banner01.jpg', '20171011214713_20171010065205_Banner04.jpg', '2', '2017-10-11 09:47:13', '2017-10-11 09:47:13'),
(26, '', '', 0, '1', '20171011214759_20171010063040_banner01.jpg', '20171011214759_20171010065205_Banner04.jpg', '2', '2017-10-11 09:47:59', '2017-10-11 09:47:59'),
(27, '', '', 0, '1', '20171011214817_20171010063040_banner01.jpg', '20171011214817_20171010065205_Banner04.jpg', '2', '2017-10-11 09:48:17', '2017-10-11 09:48:17'),
(28, '', '', 0, '1', '20171011214850_20171010063040_banner01.jpg', '20171011214850_20171010065205_Banner04.jpg', '2', '2017-10-11 09:48:50', '2017-10-11 09:48:50'),
(29, '', '', 0, '111', '', '20171011230849_20171010065205_Banner04.jpg', '222', '2017-10-11 11:08:49', '2017-10-11 11:08:49'),
(30, '', '', 0, 'fff', '', '20171012083549_Banner05.jpg', 'fhhh', '2017-10-12 06:35:49', '2017-10-12 06:35:49'),
(31, '', '', 0, 'Tako test', '', '20171017152347_20171010062548_Banner05.jpg', 'Tako test description', '2017-10-17 13:23:47', '2017-10-17 13:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `test_cron`
--

CREATE TABLE `test_cron` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `cron_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test_cron`
--

INSERT INTO `test_cron` (`id`, `rid`, `cron_date`) VALUES
(1, 9266583, '2017-08-31 12:04:29'),
(2, 2606844, '2017-08-31 12:20:01'),
(3, 7259678, '2017-08-31 12:40:01'),
(4, 3975058, '2017-08-31 13:00:02'),
(5, 8915898, '2017-08-31 13:20:01'),
(6, 9461475, '2017-08-31 13:40:01'),
(7, 1955341, '2017-08-31 14:00:01'),
(8, 9909738, '2017-08-31 14:20:01'),
(9, 3032829, '2017-08-31 14:40:01'),
(10, 3658872, '2017-08-31 15:00:01'),
(11, 5976302, '2017-08-31 15:20:01'),
(12, 9690784, '2017-08-31 15:40:01'),
(13, 9634316, '2017-08-31 16:00:01'),
(14, 8319329, '2017-08-31 16:20:01'),
(15, 7788214, '2017-08-31 16:40:01'),
(16, 7095506, '2017-08-31 17:00:01'),
(17, 9508394, '2017-08-31 17:20:01'),
(18, 5253558, '2017-08-31 17:40:01'),
(19, 8874823, '2017-08-31 18:00:01'),
(20, 6350820, '2017-08-31 18:20:01'),
(21, 7824624, '2017-08-31 18:40:01'),
(22, 9895631, '2017-08-31 19:00:01'),
(23, 1980002, '2017-08-31 19:20:01'),
(24, 5415384, '2017-08-31 19:40:01'),
(25, 4620163, '2017-08-31 20:00:01'),
(26, 3204421, '2017-08-31 20:20:01'),
(27, 7196847, '2017-08-31 20:40:01'),
(28, 6834525, '2017-08-31 21:00:01'),
(29, 8426639, '2017-08-31 21:20:01'),
(30, 7568563, '2017-08-31 21:40:01'),
(31, 7167454, '2017-08-31 22:00:01'),
(32, 9564778, '2017-08-31 22:20:01'),
(33, 9444999, '2017-08-31 22:40:01'),
(34, 3705461, '2017-08-31 23:00:01'),
(35, 3140025, '2017-08-31 23:20:02'),
(36, 2781155, '2017-08-31 23:40:02'),
(37, 2157737, '2017-09-01 00:00:01'),
(38, 4949222, '2017-09-01 00:20:01'),
(39, 8492461, '2017-09-01 00:40:01'),
(40, 6052788, '2017-09-01 01:00:01'),
(41, 7044131, '2017-09-01 01:20:01'),
(42, 2797350, '2017-09-01 01:40:02'),
(43, 2265039, '2017-09-01 02:00:01'),
(44, 4938723, '2017-09-01 02:20:02'),
(45, 5490602, '2017-09-01 02:40:01'),
(46, 1289885, '2017-09-01 03:00:01'),
(47, 2328680, '2017-09-01 03:20:01'),
(48, 2269435, '2017-09-01 03:40:01'),
(49, 7241880, '2017-09-01 04:00:01'),
(50, 6523107, '2017-09-01 04:20:02'),
(51, 7682592, '2017-09-01 04:40:01'),
(52, 6361430, '2017-09-01 05:00:01'),
(53, 7241531, '2017-09-01 05:20:01'),
(54, 6350819, '2017-09-01 05:40:01'),
(55, 2233806, '2017-09-01 06:00:01'),
(56, 5430214, '2017-09-01 06:20:01'),
(57, 6206798, '2017-09-01 06:40:01'),
(58, 4590527, '2017-09-01 07:00:02'),
(59, 7272364, '2017-09-01 07:20:01'),
(60, 4411669, '2017-09-01 07:40:01'),
(61, 7065735, '2017-09-01 08:00:01'),
(62, 4755311, '2017-09-01 08:20:01'),
(63, 8813946, '2017-09-01 08:40:01'),
(64, 1464684, '2017-09-01 09:00:02'),
(65, 7406250, '2017-09-01 09:20:01'),
(66, 4981278, '2017-09-01 09:40:01'),
(67, 9031556, '2017-09-01 10:00:01'),
(68, 3701083, '2017-09-01 10:20:01'),
(69, 2761395, '2017-09-01 10:40:01'),
(70, 2988598, '2017-09-01 11:00:02'),
(71, 8241155, '2017-09-01 11:20:01'),
(72, 6854262, '2017-09-01 11:40:01'),
(73, 6217103, '2017-09-01 12:00:02'),
(74, 8499545, '2017-09-01 12:20:01'),
(75, 9648089, '2017-09-01 12:40:01'),
(76, 8569220, '2017-09-01 13:00:01'),
(77, 1923583, '2017-09-01 13:20:01'),
(78, 3117014, '2017-09-01 13:40:01'),
(79, 5202833, '2017-09-01 14:00:01'),
(80, 4762889, '2017-09-01 14:20:01'),
(81, 4179031, '2017-09-01 14:40:01'),
(82, 3114348, '2017-09-01 15:00:01'),
(83, 9473834, '2017-09-01 15:20:02'),
(84, 6198758, '2017-09-01 15:40:01'),
(85, 1716134, '2017-09-01 16:00:01'),
(86, 3261102, '2017-09-01 16:20:01'),
(87, 8763755, '2017-09-01 16:40:02'),
(88, 4426778, '2017-09-01 17:00:01'),
(89, 2174703, '2017-09-01 17:20:01'),
(90, 3737911, '2017-09-01 17:40:01'),
(91, 9015020, '2017-09-01 18:00:01'),
(92, 5362610, '2017-09-01 18:20:01'),
(93, 5325786, '2017-09-01 18:40:01'),
(94, 3657286, '2017-09-01 19:00:01'),
(95, 1652326, '2017-09-01 19:20:01'),
(96, 4756707, '2017-09-01 19:40:01'),
(97, 5716253, '2017-09-01 20:00:01'),
(98, 2814307, '2017-09-01 20:20:01'),
(99, 6508750, '2017-09-01 20:40:01'),
(100, 2354135, '2017-09-01 21:00:01'),
(101, 2943628, '2017-09-01 21:20:01'),
(102, 3329438, '2017-09-01 21:40:01'),
(103, 9805746, '2017-09-01 22:00:01'),
(104, 6237259, '2017-09-01 22:20:01'),
(105, 1293585, '2017-09-01 22:40:01'),
(106, 8898111, '2017-09-01 23:00:01'),
(107, 7861224, '2017-09-01 23:20:02'),
(108, 8013827, '2017-09-01 23:40:01'),
(109, 6542156, '2017-09-02 00:00:01'),
(110, 5940875, '2017-09-02 00:20:01'),
(111, 1973505, '2017-09-02 00:40:01'),
(112, 6010933, '2017-09-02 01:00:01'),
(113, 1980317, '2017-09-02 01:20:01'),
(114, 6519043, '2017-09-02 01:40:01'),
(115, 4268715, '2017-09-02 02:00:01'),
(116, 5598226, '2017-09-02 02:20:01'),
(117, 5586623, '2017-09-02 02:40:01'),
(118, 9420437, '2017-09-02 03:00:02'),
(119, 1590227, '2017-09-02 03:20:01'),
(120, 1249812, '2017-09-02 03:40:01'),
(121, 4975414, '2017-09-02 04:00:01'),
(122, 4332698, '2017-09-02 04:20:01'),
(123, 2556245, '2017-09-02 04:40:01'),
(124, 9591885, '2017-09-02 05:00:01'),
(125, 3860679, '2017-09-02 05:20:01'),
(126, 2220650, '2017-09-02 05:40:01'),
(127, 4140594, '2017-09-02 06:00:01'),
(128, 6804562, '2017-09-02 06:20:01'),
(129, 6478714, '2017-09-02 06:40:01'),
(130, 4854387, '2017-09-02 07:00:01'),
(131, 1491691, '2017-09-02 07:20:01'),
(132, 4288300, '2017-09-02 07:40:01'),
(133, 3338183, '2017-09-02 08:00:01'),
(134, 5174976, '2017-09-02 08:20:01'),
(135, 4026691, '2017-09-02 08:40:01'),
(136, 4989023, '2017-09-02 09:00:01'),
(137, 1373706, '2017-09-02 09:20:01'),
(138, 9773495, '2017-09-02 09:40:01'),
(139, 4175249, '2017-09-02 10:00:01'),
(140, 7639204, '2017-09-02 10:20:01'),
(141, 9543243, '2017-09-02 10:40:01'),
(142, 6279216, '2017-09-02 11:00:01'),
(143, 9307131, '2017-09-02 11:20:02'),
(144, 2437937, '2017-09-02 11:40:01'),
(145, 1422412, '2017-09-02 12:00:01'),
(146, 3139294, '2017-09-02 12:20:01'),
(147, 8294205, '2017-09-02 12:40:01'),
(148, 3580318, '2017-09-02 13:00:02'),
(149, 5278645, '2017-09-02 13:20:01'),
(150, 4624898, '2017-09-02 13:40:01'),
(151, 2139469, '2017-09-02 14:00:01'),
(152, 7031574, '2017-09-02 14:20:01'),
(153, 4027018, '2017-09-02 14:40:01'),
(154, 7587651, '2017-09-02 15:00:01'),
(155, 8312944, '2017-09-02 15:20:01'),
(156, 7914368, '2017-09-02 15:40:01'),
(157, 3324832, '2017-09-02 16:00:01'),
(158, 9487640, '2017-09-02 16:20:02'),
(159, 1948559, '2017-09-02 16:40:01'),
(160, 2045774, '2017-09-02 17:00:01'),
(161, 8587914, '2017-09-02 17:20:01'),
(162, 9286137, '2017-09-02 17:40:02'),
(163, 8733555, '2017-09-02 18:00:01'),
(164, 8159890, '2017-09-02 18:20:01'),
(165, 2576336, '2017-09-02 18:40:01'),
(166, 3371733, '2017-09-02 19:00:01'),
(167, 1159922, '2017-09-02 19:20:01'),
(168, 3383341, '2017-09-02 19:40:01'),
(169, 1734434, '2017-09-02 20:00:01'),
(170, 6313428, '2017-09-02 20:20:01'),
(171, 9345192, '2017-09-02 20:40:01'),
(172, 5525556, '2017-09-02 21:00:01'),
(173, 3840215, '2017-09-02 21:20:01'),
(174, 1990063, '2017-09-02 21:40:01'),
(175, 5751338, '2017-09-02 22:00:02'),
(176, 3830624, '2017-09-02 22:20:01'),
(177, 1119854, '2017-09-02 22:40:02'),
(178, 8770141, '2017-09-02 23:00:01'),
(179, 3385535, '2017-09-02 23:20:01'),
(180, 9243625, '2017-09-02 23:40:01'),
(181, 5133603, '2017-09-03 00:00:01'),
(182, 9017651, '2017-09-03 00:20:02'),
(183, 5025022, '2017-09-03 00:40:01'),
(184, 2642337, '2017-09-03 01:00:01'),
(185, 2808734, '2017-09-03 01:20:01'),
(186, 8348346, '2017-09-03 01:40:01'),
(187, 4510513, '2017-09-03 02:00:01'),
(188, 5261099, '2017-09-03 02:20:01'),
(189, 8541848, '2017-09-03 02:40:01'),
(190, 8235496, '2017-09-03 03:00:02'),
(191, 7716262, '2017-09-03 03:20:01'),
(192, 1882169, '2017-09-03 03:40:01'),
(193, 7803876, '2017-09-03 04:00:01'),
(194, 8313767, '2017-09-03 04:20:02'),
(195, 4670663, '2017-09-03 04:40:01'),
(196, 1127348, '2017-09-03 05:00:01'),
(197, 4937410, '2017-09-03 05:20:01'),
(198, 8506300, '2017-09-03 05:40:01'),
(199, 9517774, '2017-09-03 06:00:01'),
(200, 6896278, '2017-09-03 06:20:01'),
(201, 9732679, '2017-09-03 06:40:01'),
(202, 5168387, '2017-09-03 07:00:01'),
(203, 4380957, '2017-09-03 07:20:01'),
(204, 9687636, '2017-09-03 07:40:01'),
(205, 8361556, '2017-09-03 08:00:02'),
(206, 5803361, '2017-09-03 08:20:01'),
(207, 7550999, '2017-09-03 08:40:01'),
(208, 7139398, '2017-09-03 09:00:01'),
(209, 8801965, '2017-09-03 09:20:01'),
(210, 1687745, '2017-09-03 09:40:01'),
(211, 1952388, '2017-09-03 10:00:01'),
(212, 2477386, '2017-09-03 10:20:01'),
(213, 9967013, '2017-09-03 10:40:01'),
(214, 1400314, '2017-09-03 11:00:01'),
(215, 7123244, '2017-09-03 11:20:01'),
(216, 1397010, '2017-09-03 11:40:01'),
(217, 5148278, '2017-09-03 12:00:01'),
(218, 2808300, '2017-09-03 12:20:01'),
(219, 2721933, '2017-09-03 12:40:01'),
(220, 5020914, '2017-09-03 13:00:01'),
(221, 6714515, '2017-09-03 13:20:01'),
(222, 7669157, '2017-09-03 13:40:01'),
(223, 8649334, '2017-09-03 14:00:02'),
(224, 9729954, '2017-09-03 14:20:01'),
(225, 5005327, '2017-09-03 14:40:01'),
(226, 2813289, '2017-09-03 15:00:01'),
(227, 9733861, '2017-09-03 15:20:01'),
(228, 7035345, '2017-09-03 15:40:01'),
(229, 3006889, '2017-09-03 16:00:01'),
(230, 8559110, '2017-09-03 16:20:01'),
(231, 1702948, '2017-09-03 16:40:01'),
(232, 2382411, '2017-09-03 17:00:01'),
(233, 6315708, '2017-09-03 17:20:01'),
(234, 9586247, '2017-09-03 17:40:02'),
(235, 7527283, '2017-09-03 18:00:01'),
(236, 7900696, '2017-09-03 18:20:01'),
(237, 4862595, '2017-09-03 18:40:01'),
(238, 7320584, '2017-09-03 19:00:01'),
(239, 8441773, '2017-09-03 19:20:01'),
(240, 9512316, '2017-09-03 19:40:01'),
(241, 9620403, '2017-09-03 20:00:01'),
(242, 2885481, '2017-09-03 20:20:01'),
(243, 5579753, '2017-09-03 20:40:01'),
(244, 3539105, '2017-09-03 21:00:01'),
(245, 8755665, '2017-09-03 21:20:01'),
(246, 2437989, '2017-09-03 21:40:01'),
(247, 2132081, '2017-09-03 22:00:01'),
(248, 1684249, '2017-09-03 22:20:01'),
(249, 1999084, '2017-09-03 22:40:01'),
(250, 7973838, '2017-09-03 23:00:01'),
(251, 7576897, '2017-09-03 23:20:01'),
(252, 4520767, '2017-09-03 23:40:01'),
(253, 2798271, '2017-09-04 00:00:01'),
(254, 7841140, '2017-09-04 00:20:01'),
(255, 8104634, '2017-09-04 00:40:01'),
(256, 8143235, '2017-09-04 01:00:01'),
(257, 4105218, '2017-09-04 01:20:01'),
(258, 3421483, '2017-09-04 01:40:01'),
(259, 6435674, '2017-09-04 02:00:01'),
(260, 9345279, '2017-09-04 02:20:01'),
(261, 4792349, '2017-09-04 02:40:01'),
(262, 8267892, '2017-09-04 03:00:01'),
(263, 2895705, '2017-09-04 03:20:01'),
(264, 9593448, '2017-09-04 03:40:01'),
(265, 7226474, '2017-09-04 04:00:01'),
(266, 2697246, '2017-09-04 04:20:01'),
(267, 6669934, '2017-09-04 04:40:01'),
(268, 4335165, '2017-09-04 05:00:01'),
(269, 2951283, '2017-09-04 05:20:01'),
(270, 2247886, '2017-09-04 05:40:01'),
(271, 4937441, '2017-09-04 06:00:01'),
(272, 5964364, '2017-09-04 06:20:01'),
(273, 8630029, '2017-09-04 06:40:02'),
(274, 5531286, '2017-09-04 07:00:01'),
(275, 4892404, '2017-09-04 07:20:01'),
(276, 2922681, '2017-09-04 07:40:01'),
(277, 1543251, '2017-09-04 08:00:01'),
(278, 9022920, '2017-09-04 08:20:01'),
(279, 6500399, '2017-09-04 08:40:01'),
(280, 8938488, '2017-09-04 09:00:01'),
(281, 4194290, '2017-09-04 09:20:01'),
(282, 8802178, '2017-09-04 09:40:01'),
(283, 2499718, '2017-09-04 10:00:01'),
(284, 5190417, '2017-09-04 10:20:01'),
(285, 5094977, '2017-09-04 10:40:01'),
(286, 5293755, '2017-09-04 11:00:01'),
(287, 3601022, '2017-09-04 11:20:01'),
(288, 3661252, '2017-09-04 11:40:01'),
(289, 7713661, '2017-09-04 12:00:01'),
(290, 3382714, '2017-09-04 12:20:01'),
(291, 1554208, '2017-09-04 12:40:01'),
(292, 5098317, '2017-09-04 13:00:01'),
(293, 4470064, '2017-09-04 13:20:01'),
(294, 5128550, '2017-09-04 13:40:01'),
(295, 4096032, '2017-09-04 14:00:02'),
(296, 2275242, '2017-09-04 14:20:02'),
(297, 9825984, '2017-09-04 14:40:01'),
(298, 9727177, '2017-09-04 15:00:01'),
(299, 3041052, '2017-09-04 15:20:01'),
(300, 3760864, '2017-09-04 15:40:01'),
(301, 3737307, '2017-09-04 16:00:01'),
(302, 2009638, '2017-09-04 16:20:01'),
(303, 8595358, '2017-09-04 16:40:01'),
(304, 1668140, '2017-09-04 17:00:01'),
(305, 2022895, '2017-09-04 17:20:01'),
(306, 1547554, '2017-09-04 17:40:01'),
(307, 3729682, '2017-09-04 18:00:01'),
(308, 7290028, '2017-09-04 18:20:01'),
(309, 6398756, '2017-09-04 18:40:01'),
(310, 8180614, '2017-09-04 19:00:01'),
(311, 3276035, '2017-09-04 19:20:01'),
(312, 8415334, '2017-09-04 19:40:01'),
(313, 9426520, '2017-09-04 20:00:01'),
(314, 3760429, '2017-09-04 20:20:02'),
(315, 1696777, '2017-09-04 20:40:01'),
(316, 7016012, '2017-09-04 21:00:01'),
(317, 3174275, '2017-09-04 21:20:01'),
(318, 2394669, '2017-09-04 21:40:01'),
(319, 2001374, '2017-09-04 22:00:01'),
(320, 3396884, '2017-09-04 22:20:02'),
(321, 4822275, '2017-09-04 22:40:01'),
(322, 3401001, '2017-09-04 23:00:01'),
(323, 1667272, '2017-09-04 23:20:01'),
(324, 4352185, '2017-09-04 23:40:01'),
(325, 3340331, '2017-09-05 00:00:01'),
(326, 9262504, '2017-09-05 00:20:01'),
(327, 1844248, '2017-09-05 00:40:01'),
(328, 5671512, '2017-09-05 01:00:01'),
(329, 4206064, '2017-09-05 01:20:01'),
(330, 7517945, '2017-09-05 01:40:01'),
(331, 8492082, '2017-09-05 02:00:01'),
(332, 8355160, '2017-09-05 02:20:01'),
(333, 7923448, '2017-09-05 02:40:01'),
(334, 2466065, '2017-09-05 03:00:01'),
(335, 8471789, '2017-09-05 03:20:01'),
(336, 6222320, '2017-09-05 03:40:02'),
(337, 5259140, '2017-09-05 04:00:01'),
(338, 3726145, '2017-09-05 04:20:01'),
(339, 2365271, '2017-09-05 04:40:01'),
(340, 6073686, '2017-09-05 05:00:01'),
(341, 2004532, '2017-09-05 05:20:02'),
(342, 5577395, '2017-09-05 05:40:01'),
(343, 5447005, '2017-09-05 06:00:01'),
(344, 9359776, '2017-09-05 06:20:02'),
(345, 8681317, '2017-09-05 06:40:01'),
(346, 8110083, '2017-09-05 07:00:01'),
(347, 1153510, '2017-09-05 07:20:01'),
(348, 4491673, '2017-09-05 07:40:01'),
(349, 2036050, '2017-09-05 08:00:01'),
(350, 5126321, '2017-09-05 08:20:01'),
(351, 4592087, '2017-09-05 08:40:01'),
(352, 1164677, '2017-09-05 09:00:01'),
(353, 3209293, '2017-09-05 09:20:01'),
(354, 2846206, '2017-09-05 09:40:01'),
(355, 8390962, '2017-09-05 10:00:01'),
(356, 8820013, '2017-09-05 10:20:01'),
(357, 4326916, '2017-09-05 10:40:01'),
(358, 2584609, '2017-09-05 11:00:01'),
(359, 1702287, '2017-09-05 11:20:01'),
(360, 9391603, '2017-09-05 11:40:01'),
(361, 6574387, '2017-09-05 12:00:01'),
(362, 4384526, '2017-09-05 12:20:01'),
(363, 8151565, '2017-09-05 12:40:01'),
(364, 5056687, '2017-09-05 13:00:01'),
(365, 5285245, '2017-09-05 13:20:01'),
(366, 1117488, '2017-09-05 13:40:01'),
(367, 1235309, '2017-09-05 14:00:01'),
(368, 2411378, '2017-09-05 14:20:01'),
(369, 9419989, '2017-09-05 14:40:01'),
(370, 4040160, '2017-09-05 15:00:01'),
(371, 8187712, '2017-09-05 15:20:01'),
(372, 5784980, '2017-09-05 15:40:01'),
(373, 9994892, '2017-09-05 16:00:02'),
(374, 1605847, '2017-09-05 16:20:01'),
(375, 5583728, '2017-09-05 16:40:01'),
(376, 2958395, '2017-09-05 17:00:01'),
(377, 5866066, '2017-09-05 17:20:01'),
(378, 2359032, '2017-09-05 17:40:01'),
(379, 4574321, '2017-09-05 18:00:01'),
(380, 4794684, '2017-09-05 18:20:01'),
(381, 7261431, '2017-09-05 18:40:01'),
(382, 3364874, '2017-09-05 19:00:01'),
(383, 8069313, '2017-09-05 19:20:01'),
(384, 4474840, '2017-09-05 19:40:01'),
(385, 5432761, '2017-09-05 20:00:01'),
(386, 9407894, '2017-09-05 20:20:01'),
(387, 7578202, '2017-09-05 20:40:01'),
(388, 9688115, '2017-09-05 21:00:01'),
(389, 2260259, '2017-09-05 21:20:02'),
(390, 3284536, '2017-09-05 21:40:01'),
(391, 1505303, '2017-09-05 22:00:01'),
(392, 7631746, '2017-09-05 22:20:01'),
(393, 5761746, '2017-09-05 22:40:01'),
(394, 9994133, '2017-09-05 23:00:01'),
(395, 6431727, '2017-09-05 23:20:01'),
(396, 6238062, '2017-09-05 23:40:01'),
(397, 9192308, '2017-09-06 00:00:02'),
(398, 4006737, '2017-09-06 00:20:01'),
(399, 4130682, '2017-09-06 00:40:01'),
(400, 3938799, '2017-09-06 01:00:01'),
(401, 4531163, '2017-09-06 01:20:01'),
(402, 8409974, '2017-09-06 01:40:01'),
(403, 2136956, '2017-09-06 02:00:01'),
(404, 4170337, '2017-09-06 02:20:01'),
(405, 4877477, '2017-09-06 02:40:01'),
(406, 4411358, '2017-09-06 03:00:01'),
(407, 4741763, '2017-09-06 03:20:02'),
(408, 4223303, '2017-09-06 03:40:01'),
(409, 4119420, '2017-09-06 04:00:01'),
(410, 7622582, '2017-09-06 04:20:01'),
(411, 6079617, '2017-09-06 04:40:01'),
(412, 2848479, '2017-09-06 05:00:01'),
(413, 1558260, '2017-09-06 05:20:01'),
(414, 5392401, '2017-09-06 05:40:01'),
(415, 7609875, '2017-09-06 06:00:01'),
(416, 6106572, '2017-09-06 06:20:01'),
(417, 1363637, '2017-09-06 06:40:01'),
(418, 9767231, '2017-09-06 07:00:01'),
(419, 6473723, '2017-09-06 07:20:01'),
(420, 8754029, '2017-09-06 07:40:01'),
(421, 5391196, '2017-09-06 08:00:01'),
(422, 1285922, '2017-09-06 08:20:01'),
(423, 5474308, '2017-09-06 08:40:01'),
(424, 2359001, '2017-09-06 09:00:01'),
(425, 5275260, '2017-09-06 09:20:01'),
(426, 9689124, '2017-09-06 09:40:01'),
(427, 7004686, '2017-09-06 10:00:01'),
(428, 7121030, '2017-09-06 10:20:01'),
(429, 3117323, '2017-09-06 10:40:01'),
(430, 3800033, '2017-09-06 11:00:01'),
(431, 7480142, '2017-09-06 11:20:01'),
(432, 6044565, '2017-09-06 11:40:01'),
(433, 8306301, '2017-09-06 12:00:02'),
(434, 8766656, '2017-09-06 12:20:01'),
(435, 5664938, '2017-09-06 12:40:01'),
(436, 1372488, '2017-09-06 13:00:01'),
(437, 3759901, '2017-09-06 13:20:01'),
(438, 3010284, '2017-09-06 13:40:01'),
(439, 7114368, '2017-09-06 14:00:01'),
(440, 9512646, '2017-09-06 14:20:02'),
(441, 5796880, '2017-09-06 14:40:01'),
(442, 8088169, '2017-09-06 15:00:01'),
(443, 8742546, '2017-09-06 15:20:01'),
(444, 3074186, '2017-09-06 15:40:01'),
(445, 2932505, '2017-09-06 16:00:01'),
(446, 9341519, '2017-09-06 16:20:01'),
(447, 1281899, '2017-09-06 16:40:01'),
(448, 6883663, '2017-09-06 17:00:01'),
(449, 1230217, '2017-09-06 17:20:01'),
(450, 1419983, '2017-09-06 17:40:01'),
(451, 2785618, '2017-09-06 18:00:01'),
(452, 5443530, '2017-09-06 18:20:01'),
(453, 5451016, '2017-09-06 18:40:01'),
(454, 6713347, '2017-09-06 19:00:01'),
(455, 3687470, '2017-09-06 19:20:01'),
(456, 1785246, '2017-09-06 19:40:01'),
(457, 7331169, '2017-09-06 20:00:01'),
(458, 4173525, '2017-09-06 20:20:01'),
(459, 4399209, '2017-09-06 20:40:01'),
(460, 8461788, '2017-09-06 21:00:01'),
(461, 6358402, '2017-09-06 21:20:01'),
(462, 2120472, '2017-09-06 21:40:01'),
(463, 1303189, '2017-09-06 22:00:01'),
(464, 5764436, '2017-09-06 22:20:01'),
(465, 5824205, '2017-09-06 22:40:01'),
(466, 1637207, '2017-09-06 23:00:02'),
(467, 8526135, '2017-09-06 23:20:01'),
(468, 8659751, '2017-09-06 23:40:01'),
(469, 9609924, '2017-09-07 00:00:02'),
(470, 8199478, '2017-09-07 00:20:01'),
(471, 3284668, '2017-09-07 00:40:01'),
(472, 3864160, '2017-09-07 01:00:01'),
(473, 4147265, '2017-09-07 01:20:02'),
(474, 1902591, '2017-09-07 01:40:01'),
(475, 8554590, '2017-09-07 02:00:01'),
(476, 3885946, '2017-09-07 02:20:01'),
(477, 3355412, '2017-09-07 02:40:01'),
(478, 8495122, '2017-09-07 03:00:01'),
(479, 7598043, '2017-09-07 03:20:01'),
(480, 5767284, '2017-09-07 03:40:02'),
(481, 8804615, '2017-09-07 04:00:01'),
(482, 5700489, '2017-09-07 04:20:01'),
(483, 4956527, '2017-09-07 04:40:01'),
(484, 7638003, '2017-09-07 05:00:01'),
(485, 9657256, '2017-09-07 05:20:01'),
(486, 3170885, '2017-09-07 05:40:01'),
(487, 6886052, '2017-09-07 06:00:01'),
(488, 1566406, '2017-09-07 06:20:01'),
(489, 6564403, '2017-09-07 06:40:01'),
(490, 7716577, '2017-09-07 07:00:01'),
(491, 5717057, '2017-09-07 07:20:01'),
(492, 8989404, '2017-09-07 07:40:01'),
(493, 8581116, '2017-09-07 08:00:01'),
(494, 2837556, '2017-09-07 08:20:02'),
(495, 5920990, '2017-09-07 08:40:01'),
(496, 6747903, '2017-09-07 09:00:01'),
(497, 6200360, '2017-09-07 09:20:01'),
(498, 8293191, '2017-09-07 09:40:01'),
(499, 1224989, '2017-09-07 10:00:02'),
(500, 1269385, '2017-09-07 10:20:01'),
(501, 6639122, '2017-09-07 10:40:01'),
(502, 4560262, '2017-09-07 11:00:02'),
(503, 9944094, '2017-09-07 11:20:01'),
(504, 8928890, '2017-09-07 11:40:01'),
(505, 8341262, '2017-09-07 12:00:01'),
(506, 2909174, '2017-09-07 12:20:01'),
(507, 1701379, '2017-09-07 12:40:01'),
(508, 9820723, '2017-09-07 13:00:01'),
(509, 3083112, '2017-09-07 13:20:01'),
(510, 1973958, '2017-09-07 13:40:01'),
(511, 3815128, '2017-09-07 14:00:01'),
(512, 6912186, '2017-09-07 14:20:01'),
(513, 8604136, '2017-09-07 14:40:01'),
(514, 7844661, '2017-09-07 15:00:01'),
(515, 8732933, '2017-09-07 15:20:02'),
(516, 5847027, '2017-09-07 15:40:01'),
(517, 6539437, '2017-09-07 16:00:02'),
(518, 9166466, '2017-09-07 16:20:02'),
(519, 4235603, '2017-09-07 16:40:01'),
(520, 2150804, '2017-09-07 17:00:01'),
(521, 2839037, '2017-09-07 17:20:01'),
(522, 9130800, '2017-09-07 17:40:01'),
(523, 4339459, '2017-09-07 18:00:01'),
(524, 5023439, '2017-09-07 18:20:01'),
(525, 6974484, '2017-09-07 18:40:01'),
(526, 7912842, '2017-09-07 19:00:01'),
(527, 3001390, '2017-09-07 19:20:02'),
(528, 5162938, '2017-09-07 19:40:01'),
(529, 5239412, '2017-09-07 20:00:01'),
(530, 2173400, '2017-09-07 20:20:01'),
(531, 4656706, '2017-09-07 20:40:01'),
(532, 6955402, '2017-09-07 21:00:01'),
(533, 5336553, '2017-09-07 21:20:01'),
(534, 5848633, '2017-09-07 21:40:01'),
(535, 1294133, '2017-09-07 22:00:01'),
(536, 6877853, '2017-09-07 22:20:01'),
(537, 2729304, '2017-09-07 22:40:01'),
(538, 7991412, '2017-09-07 23:00:01'),
(539, 7591954, '2017-09-07 23:20:01'),
(540, 4021736, '2017-09-07 23:40:01'),
(541, 5717291, '2017-09-08 00:00:01'),
(542, 9425560, '2017-09-08 00:20:01'),
(543, 8319779, '2017-09-08 00:40:01'),
(544, 5406124, '2017-09-08 01:00:01'),
(545, 3881185, '2017-09-08 01:20:01'),
(546, 6774461, '2017-09-08 01:40:01'),
(547, 5046697, '2017-09-08 02:00:01'),
(548, 9558386, '2017-09-08 02:20:01'),
(549, 6248723, '2017-09-08 02:40:01'),
(550, 9089008, '2017-09-08 03:00:01'),
(551, 8408929, '2017-09-08 03:20:01'),
(552, 1466154, '2017-09-08 03:40:01'),
(553, 5253943, '2017-09-08 04:00:01'),
(554, 8384117, '2017-09-08 04:20:01'),
(555, 3426814, '2017-09-08 04:40:01'),
(556, 9872789, '2017-09-08 05:00:01'),
(557, 4436640, '2017-09-08 05:20:01'),
(558, 4182820, '2017-09-08 05:40:01'),
(559, 7130173, '2017-09-08 06:00:01'),
(560, 2186382, '2017-09-08 06:20:01'),
(561, 9669363, '2017-09-08 06:40:01'),
(562, 8956544, '2017-09-08 07:00:01'),
(563, 8006265, '2017-09-08 07:20:01'),
(564, 2488552, '2017-09-08 07:40:01'),
(565, 8465006, '2017-09-08 08:00:01'),
(566, 7905683, '2017-09-08 08:20:01'),
(567, 1843486, '2017-09-08 08:40:01'),
(568, 5898820, '2017-09-08 09:00:01'),
(569, 4185014, '2017-09-08 09:20:01'),
(570, 5348013, '2017-09-08 09:40:01'),
(571, 2981575, '2017-09-08 10:00:01'),
(572, 5124305, '2017-09-08 10:20:01'),
(573, 5701896, '2017-09-08 10:40:01'),
(574, 1514197, '2017-09-08 11:00:01'),
(575, 9602330, '2017-09-08 11:20:01'),
(576, 6194017, '2017-09-08 11:40:01'),
(577, 5880578, '2017-09-08 12:00:01'),
(578, 2747425, '2017-09-08 12:20:01'),
(579, 6334435, '2017-09-08 12:40:01'),
(580, 3475595, '2017-09-08 13:00:01'),
(581, 7931370, '2017-09-08 13:20:01'),
(582, 1728805, '2017-09-08 13:40:01'),
(583, 5622921, '2017-09-08 14:00:01'),
(584, 3834378, '2017-09-08 14:20:02'),
(585, 2459549, '2017-09-08 14:40:01'),
(586, 3513257, '2017-09-08 15:00:02'),
(587, 8067130, '2017-09-08 15:20:01'),
(588, 6469505, '2017-09-08 15:40:01'),
(589, 1922755, '2017-09-08 16:00:01'),
(590, 3657508, '2017-09-08 16:20:01'),
(591, 8802492, '2017-09-08 16:40:01'),
(592, 9125231, '2017-09-08 17:00:01'),
(593, 8408185, '2017-09-08 17:20:01'),
(594, 5749782, '2017-09-08 17:40:02'),
(595, 9314975, '2017-09-08 18:00:01'),
(596, 3516391, '2017-09-08 18:20:01'),
(597, 6893833, '2017-09-08 18:40:01'),
(598, 5338218, '2017-09-08 19:00:02'),
(599, 3930703, '2017-09-08 19:20:01'),
(600, 8190246, '2017-09-08 19:40:01'),
(601, 5243402, '2017-09-08 20:00:01'),
(602, 4668279, '2017-09-08 20:20:01'),
(603, 6880361, '2017-09-08 20:40:01'),
(604, 8205315, '2017-09-08 21:00:01'),
(605, 1839261, '2017-09-08 21:20:01'),
(606, 9402347, '2017-09-08 21:40:01'),
(607, 2680508, '2017-09-08 22:00:01'),
(608, 3924125, '2017-09-08 22:20:01'),
(609, 4178643, '2017-09-08 22:40:01'),
(610, 4552077, '2017-09-08 23:00:01'),
(611, 3086366, '2017-09-08 23:20:01'),
(612, 3412491, '2017-09-08 23:40:01'),
(613, 3386507, '2017-09-09 00:00:01'),
(614, 2358301, '2017-09-09 00:20:01'),
(615, 8357410, '2017-09-09 00:40:02'),
(616, 8634604, '2017-09-09 01:00:01'),
(617, 5592185, '2017-09-09 01:20:01'),
(618, 5574519, '2017-09-09 01:40:01'),
(619, 1584847, '2017-09-09 02:00:01'),
(620, 6561326, '2017-09-09 02:20:01'),
(621, 8924482, '2017-09-09 02:40:02'),
(622, 5915974, '2017-09-09 03:00:01'),
(623, 3344381, '2017-09-09 03:20:01'),
(624, 4304712, '2017-09-09 03:40:01'),
(625, 3618425, '2017-09-09 04:00:02'),
(626, 3678817, '2017-09-09 04:20:02'),
(627, 8086155, '2017-09-09 04:40:01'),
(628, 6445775, '2017-09-09 05:00:01'),
(629, 2532723, '2017-09-09 05:20:01'),
(630, 3607567, '2017-09-09 05:40:02'),
(631, 8476482, '2017-09-09 06:00:01'),
(632, 7242678, '2017-09-09 06:20:01'),
(633, 7627406, '2017-09-09 06:40:01'),
(634, 7248169, '2017-09-09 07:00:02'),
(635, 7250049, '2017-09-09 07:20:01'),
(636, 5665611, '2017-09-09 07:40:01'),
(637, 8328520, '2017-09-09 08:00:01'),
(638, 3247898, '2017-09-09 08:20:02'),
(639, 7583632, '2017-09-09 08:40:01'),
(640, 3568765, '2017-09-09 09:00:01'),
(641, 6451855, '2017-09-09 09:20:01'),
(642, 3851195, '2017-09-09 09:40:01'),
(643, 6746480, '2017-09-09 10:00:01'),
(644, 3075575, '2017-09-09 10:20:01'),
(645, 2355380, '2017-09-09 10:40:01'),
(646, 3575758, '2017-09-09 11:00:01'),
(647, 5815369, '2017-09-09 11:20:01'),
(648, 2600431, '2017-09-09 11:40:01'),
(649, 1179769, '2017-09-09 12:00:01'),
(650, 2968715, '2017-09-09 12:20:01'),
(651, 1572140, '2017-09-09 12:40:02'),
(652, 9893636, '2017-09-09 13:00:01'),
(653, 6001149, '2017-09-09 13:20:01'),
(654, 2959311, '2017-09-09 13:40:01'),
(655, 7966019, '2017-09-09 14:00:01'),
(656, 9260606, '2017-09-09 14:20:01'),
(657, 1443614, '2017-09-09 14:40:01'),
(658, 3336379, '2017-09-09 15:00:01'),
(659, 9297481, '2017-09-09 15:20:01'),
(660, 7219610, '2017-09-09 15:40:01'),
(661, 7940764, '2017-09-09 16:00:02'),
(662, 6435152, '2017-09-09 16:20:01'),
(663, 6073688, '2017-09-09 16:40:01'),
(664, 9861563, '2017-09-09 17:00:01'),
(665, 4342345, '2017-09-09 17:20:01'),
(666, 1229232, '2017-09-09 17:40:01'),
(667, 6586331, '2017-09-09 18:00:01'),
(668, 6920815, '2017-09-09 18:20:01'),
(669, 6299675, '2017-09-09 18:40:01'),
(670, 2859161, '2017-09-09 19:00:01'),
(671, 3120721, '2017-09-09 19:20:01'),
(672, 5294812, '2017-09-09 19:40:01'),
(673, 8063595, '2017-09-09 20:00:01'),
(674, 8319109, '2017-09-09 20:20:01'),
(675, 6484243, '2017-09-09 20:40:01'),
(676, 5678802, '2017-09-09 21:00:01'),
(677, 6903856, '2017-09-09 21:20:01'),
(678, 6520622, '2017-09-09 21:40:01'),
(679, 6112288, '2017-09-09 22:00:02'),
(680, 7603038, '2017-09-09 22:20:01'),
(681, 8527666, '2017-09-09 22:40:01'),
(682, 8011830, '2017-09-09 23:00:01'),
(683, 1649165, '2017-09-09 23:20:02'),
(684, 6597133, '2017-09-09 23:40:01'),
(685, 6172017, '2017-09-10 00:00:01'),
(686, 2130321, '2017-09-10 00:20:01'),
(687, 9316064, '2017-09-10 00:40:01'),
(688, 2262576, '2017-09-10 01:00:02'),
(689, 5430580, '2017-09-10 01:20:01'),
(690, 7004452, '2017-09-10 01:40:01'),
(691, 3886861, '2017-09-10 02:00:01'),
(692, 6300976, '2017-09-10 02:20:01'),
(693, 8089421, '2017-09-10 02:40:01'),
(694, 5987423, '2017-09-10 03:00:01'),
(695, 7079688, '2017-09-10 03:20:01'),
(696, 8438064, '2017-09-10 03:40:01'),
(697, 5613216, '2017-09-10 04:00:01'),
(698, 7860554, '2017-09-10 04:20:01'),
(699, 9540805, '2017-09-10 04:40:01'),
(700, 6015933, '2017-09-10 05:00:01'),
(701, 4190768, '2017-09-10 05:20:01'),
(702, 6740233, '2017-09-10 05:40:02'),
(703, 1169795, '2017-09-10 06:00:01'),
(704, 4733231, '2017-09-10 06:20:01'),
(705, 1852470, '2017-09-10 06:40:01'),
(706, 2336315, '2017-09-10 07:00:01'),
(707, 3432443, '2017-09-10 07:20:01'),
(708, 8833241, '2017-09-10 07:40:01'),
(709, 8114217, '2017-09-10 08:00:01'),
(710, 2351054, '2017-09-10 08:20:01'),
(711, 6763561, '2017-09-10 08:40:01'),
(712, 9136350, '2017-09-10 09:00:01'),
(713, 9810093, '2017-09-10 09:20:02'),
(714, 9041764, '2017-09-10 09:40:01'),
(715, 5700960, '2017-09-10 10:00:01'),
(716, 9223614, '2017-09-10 10:20:01'),
(717, 2723258, '2017-09-10 10:40:01'),
(718, 6951154, '2017-09-10 11:00:01'),
(719, 5336072, '2017-09-10 11:20:01'),
(720, 3641134, '2017-09-10 11:40:01'),
(721, 4503095, '2017-09-10 12:00:01'),
(722, 6086134, '2017-09-10 12:20:01'),
(723, 8306860, '2017-09-10 12:40:01'),
(724, 4596578, '2017-09-10 13:00:01'),
(725, 2971638, '2017-09-10 13:20:01'),
(726, 6939467, '2017-09-10 13:40:01'),
(727, 7681795, '2017-09-10 14:00:01'),
(728, 3952802, '2017-09-10 14:20:01'),
(729, 1736597, '2017-09-10 14:40:01'),
(730, 8904683, '2017-09-10 15:00:01'),
(731, 5755879, '2017-09-10 15:20:01'),
(732, 7495937, '2017-09-10 15:40:02'),
(733, 3567486, '2017-09-10 16:00:01'),
(734, 4657201, '2017-09-10 16:20:01'),
(735, 4574677, '2017-09-10 16:40:01'),
(736, 7325357, '2017-09-10 17:00:01'),
(737, 4874157, '2017-09-10 17:20:01'),
(738, 2816169, '2017-09-10 17:40:01'),
(739, 9444095, '2017-09-10 18:00:01'),
(740, 5737433, '2017-09-10 18:20:01'),
(741, 2222071, '2017-09-10 18:40:01'),
(742, 3283734, '2017-09-10 19:00:02'),
(743, 8079637, '2017-09-10 19:20:01'),
(744, 9871862, '2017-09-10 19:40:01'),
(745, 5412467, '2017-09-10 20:00:01'),
(746, 4989558, '2017-09-10 20:20:01'),
(747, 6175217, '2017-09-10 20:40:01'),
(748, 6992244, '2017-09-10 21:00:01'),
(749, 3486547, '2017-09-10 21:20:01'),
(750, 5294159, '2017-09-10 21:40:01'),
(751, 6745584, '2017-09-10 22:00:01'),
(752, 8955346, '2017-09-10 22:20:01'),
(753, 2919506, '2017-09-10 22:40:01'),
(754, 5059105, '2017-09-10 23:00:02'),
(755, 8856189, '2017-09-10 23:20:02'),
(756, 5061964, '2017-09-10 23:40:02'),
(757, 3931688, '2017-09-11 00:00:02'),
(758, 3985078, '2017-09-11 00:20:01'),
(759, 3597621, '2017-09-11 00:40:01'),
(760, 6324031, '2017-09-11 01:00:01'),
(761, 5034540, '2017-09-11 01:20:01'),
(762, 5769603, '2017-09-11 01:40:01'),
(763, 8515966, '2017-09-11 02:00:01'),
(764, 7796466, '2017-09-11 02:20:01'),
(765, 2696705, '2017-09-11 02:40:01'),
(766, 5026470, '2017-09-11 03:00:01'),
(767, 5781795, '2017-09-11 03:20:01'),
(768, 8539628, '2017-09-11 03:40:01'),
(769, 1275997, '2017-09-11 04:00:01'),
(770, 8862369, '2017-09-11 04:20:01'),
(771, 7142656, '2017-09-11 04:40:01'),
(772, 7477857, '2017-09-11 05:00:01'),
(773, 9226390, '2017-09-11 05:20:01'),
(774, 2981740, '2017-09-11 05:40:01'),
(775, 7946548, '2017-09-11 06:00:01'),
(776, 1900566, '2017-09-11 06:20:01'),
(777, 1847780, '2017-09-11 06:40:01'),
(778, 7486170, '2017-09-11 07:00:01'),
(779, 9841432, '2017-09-11 07:20:01'),
(780, 9552496, '2017-09-11 07:40:01'),
(781, 3383199, '2017-09-11 08:00:01'),
(782, 9022653, '2017-09-11 08:20:01'),
(783, 5250768, '2017-09-11 08:40:01'),
(784, 9314047, '2017-09-11 09:00:01'),
(785, 6521569, '2017-09-11 09:20:01'),
(786, 3378569, '2017-09-11 09:40:01'),
(787, 8869634, '2017-09-11 10:00:01'),
(788, 3231099, '2017-09-11 10:20:02'),
(789, 1430755, '2017-09-11 10:40:02'),
(790, 5578122, '2017-09-11 11:00:02'),
(791, 2212365, '2017-09-11 11:20:01'),
(792, 9749314, '2017-09-11 11:40:01'),
(793, 6947821, '2017-09-11 12:00:01'),
(794, 1417541, '2017-09-11 12:20:01'),
(795, 3877915, '2017-09-11 12:40:01'),
(796, 2165546, '2017-09-11 13:00:01'),
(797, 4421043, '2017-09-11 13:20:01'),
(798, 8273712, '2017-09-11 13:40:01'),
(799, 8037820, '2017-09-11 14:00:01'),
(800, 1668611, '2017-09-11 14:20:01'),
(801, 2593886, '2017-09-11 14:40:01'),
(802, 3224208, '2017-09-11 15:00:01'),
(803, 8796012, '2017-09-11 15:20:01'),
(804, 5622385, '2017-09-11 15:40:01'),
(805, 5848878, '2017-09-11 16:00:01'),
(806, 4729261, '2017-09-11 16:20:01'),
(807, 3233861, '2017-09-11 16:40:01'),
(808, 6478250, '2017-09-11 17:00:01'),
(809, 9220721, '2017-09-11 17:20:01'),
(810, 5402717, '2017-09-11 17:40:01'),
(811, 4961254, '2017-09-11 18:00:01'),
(812, 8189603, '2017-09-11 18:20:01'),
(813, 6714942, '2017-09-11 18:40:01'),
(814, 2119507, '2017-09-11 19:00:01'),
(815, 9098292, '2017-09-11 19:20:01'),
(816, 9998058, '2017-09-11 19:40:02'),
(817, 1906369, '2017-09-11 20:00:01'),
(818, 6550840, '2017-09-11 20:20:01'),
(819, 2026561, '2017-09-11 20:40:01'),
(820, 6778191, '2017-09-11 21:00:01'),
(821, 5803564, '2017-09-11 21:20:01'),
(822, 5681631, '2017-09-11 21:40:01'),
(823, 5430178, '2017-09-11 22:00:01'),
(824, 9617146, '2017-09-11 22:20:01'),
(825, 9336555, '2017-09-11 22:40:01'),
(826, 4246732, '2017-09-11 23:00:01'),
(827, 2066578, '2017-09-11 23:20:01'),
(828, 3081194, '2017-09-11 23:40:01'),
(829, 9052024, '2017-09-12 00:00:01'),
(830, 7757461, '2017-09-12 00:20:01'),
(831, 4338685, '2017-09-12 00:40:01'),
(832, 5022050, '2017-09-12 01:00:01'),
(833, 2535998, '2017-09-12 01:20:02'),
(834, 3147127, '2017-09-12 01:40:01'),
(835, 5385684, '2017-09-12 02:00:01'),
(836, 7055595, '2017-09-12 02:20:01'),
(837, 9460045, '2017-09-12 02:40:01'),
(838, 8098666, '2017-09-12 03:00:01'),
(839, 3616330, '2017-09-12 03:20:01'),
(840, 3232097, '2017-09-12 03:40:01'),
(841, 8989301, '2017-09-12 04:00:01'),
(842, 7022254, '2017-09-12 04:20:01'),
(843, 2893253, '2017-09-12 04:40:01'),
(844, 3371683, '2017-09-12 05:00:01'),
(845, 8457952, '2017-09-12 05:20:01'),
(846, 3335103, '2017-09-12 05:40:01'),
(847, 6225727, '2017-09-12 06:00:01'),
(848, 1274475, '2017-09-12 06:20:01'),
(849, 7153793, '2017-09-12 06:40:01'),
(850, 1268089, '2017-09-12 07:00:01'),
(851, 9428596, '2017-09-12 07:20:01'),
(852, 8531328, '2017-09-12 07:40:01'),
(853, 5948871, '2017-09-12 08:00:01'),
(854, 7744393, '2017-09-12 08:20:01'),
(855, 4659437, '2017-09-12 08:40:01'),
(856, 7258893, '2017-09-12 09:00:01'),
(857, 3927444, '2017-09-12 09:20:01'),
(858, 1739156, '2017-09-12 09:40:01'),
(859, 5567130, '2017-09-12 10:00:01'),
(860, 3093337, '2017-09-12 10:20:01'),
(861, 9673000, '2017-09-12 10:40:01'),
(862, 3234907, '2017-09-12 11:00:01'),
(863, 2421610, '2017-09-12 11:20:01'),
(864, 8592337, '2017-09-12 11:40:01'),
(865, 6829132, '2017-09-12 12:00:01'),
(866, 4830494, '2017-09-12 12:20:01'),
(867, 1691884, '2017-09-12 12:40:01'),
(868, 8796929, '2017-09-12 13:00:01'),
(869, 1946860, '2017-09-12 13:20:01'),
(870, 3829469, '2017-09-12 13:40:02'),
(871, 2038548, '2017-09-12 14:00:02'),
(872, 4505862, '2017-09-12 14:20:01'),
(873, 8000358, '2017-09-12 14:40:01'),
(874, 6916252, '2017-09-12 15:00:01'),
(875, 4938822, '2017-09-12 15:20:01'),
(876, 3502782, '2017-09-12 15:40:01'),
(877, 8715724, '2017-09-12 16:00:01'),
(878, 7784276, '2017-09-12 16:20:01'),
(879, 8248021, '2017-09-12 16:40:01'),
(880, 3392361, '2017-09-12 17:00:01'),
(881, 4658836, '2017-09-12 17:20:01'),
(882, 8929795, '2017-09-12 17:40:01'),
(883, 7747911, '2017-09-12 18:00:01'),
(884, 7202251, '2017-09-12 18:20:01'),
(885, 7758601, '2017-09-12 18:40:02'),
(886, 4585899, '2017-09-12 19:00:01'),
(887, 7180680, '2017-09-12 19:20:01'),
(888, 7872743, '2017-09-12 19:40:01'),
(889, 2227558, '2017-09-12 20:00:01'),
(890, 4638625, '2017-09-12 20:20:01'),
(891, 1696695, '2017-09-12 20:40:01'),
(892, 7365484, '2017-09-12 21:00:01'),
(893, 9799986, '2017-09-12 21:20:01'),
(894, 3733868, '2017-09-12 21:40:01'),
(895, 3522760, '2017-09-12 22:00:01'),
(896, 8440096, '2017-09-12 22:20:01'),
(897, 6815723, '2017-09-12 22:40:01'),
(898, 6237046, '2017-09-12 23:00:01'),
(899, 8186632, '2017-09-12 23:20:01'),
(900, 9078020, '2017-09-12 23:40:01'),
(901, 1861020, '2017-09-13 00:00:02'),
(902, 5456266, '2017-09-13 00:20:01'),
(903, 8127219, '2017-09-13 00:40:02'),
(904, 9302492, '2017-09-13 01:00:02'),
(905, 9717410, '2017-09-13 01:20:02'),
(906, 5422884, '2017-09-13 01:40:01'),
(907, 4963360, '2017-09-13 02:00:01'),
(908, 2032869, '2017-09-13 02:20:02'),
(909, 2686371, '2017-09-13 02:40:01'),
(910, 5183298, '2017-09-13 03:00:01'),
(911, 2936695, '2017-09-13 03:20:01'),
(912, 3158226, '2017-09-13 03:40:01'),
(913, 7133993, '2017-09-13 04:00:01'),
(914, 5464353, '2017-09-13 04:20:01'),
(915, 1911498, '2017-09-13 04:40:01'),
(916, 1308228, '2017-09-13 05:00:01'),
(917, 7288203, '2017-09-13 05:20:01'),
(918, 5168717, '2017-09-13 05:40:01'),
(919, 9583847, '2017-09-13 06:00:01'),
(920, 4868896, '2017-09-13 06:20:01'),
(921, 3305607, '2017-09-13 06:40:01'),
(922, 7953269, '2017-09-13 07:00:01'),
(923, 4092731, '2017-09-13 07:20:01'),
(924, 4786248, '2017-09-13 07:40:01'),
(925, 7840308, '2017-09-13 08:00:01'),
(926, 2730033, '2017-09-13 08:20:01'),
(927, 9741018, '2017-09-13 08:40:01'),
(928, 2738445, '2017-09-13 09:00:01'),
(929, 7037732, '2017-09-13 09:20:01'),
(930, 8806593, '2017-09-13 09:40:01'),
(931, 8237623, '2017-09-13 10:00:01'),
(932, 8880482, '2017-09-13 10:20:01'),
(933, 5768183, '2017-09-13 10:40:01'),
(934, 5031904, '2017-09-13 11:00:01'),
(935, 4233415, '2017-09-13 11:20:01'),
(936, 4071618, '2017-09-13 11:40:01'),
(937, 7892685, '2017-09-13 12:00:02'),
(938, 6782842, '2017-09-13 12:20:01'),
(939, 1407924, '2017-09-13 12:40:01'),
(940, 7500877, '2017-09-13 13:00:01'),
(941, 4622517, '2017-09-13 13:20:01'),
(942, 9287667, '2017-09-13 13:40:01'),
(943, 1525161, '2017-09-13 14:00:01'),
(944, 9582155, '2017-09-13 14:20:01'),
(945, 9943655, '2017-09-13 14:40:01'),
(946, 4567319, '2017-09-13 15:00:01'),
(947, 9530837, '2017-09-13 15:20:01'),
(948, 3996918, '2017-09-13 15:40:01'),
(949, 5150469, '2017-09-13 16:00:01'),
(950, 9390106, '2017-09-13 16:20:01'),
(951, 3774335, '2017-09-13 16:40:01'),
(952, 6369231, '2017-09-13 17:00:01'),
(953, 4017329, '2017-09-13 17:20:01'),
(954, 6814621, '2017-09-13 17:40:01'),
(955, 3786832, '2017-09-13 18:00:01'),
(956, 4756078, '2017-09-13 18:20:01'),
(957, 9731487, '2017-09-13 18:40:01'),
(958, 6491886, '2017-09-13 19:00:01'),
(959, 7016980, '2017-09-13 19:20:01'),
(960, 5531878, '2017-09-13 19:40:01'),
(961, 7373878, '2017-09-13 20:00:01'),
(962, 6546131, '2017-09-13 20:20:01'),
(963, 1196906, '2017-09-13 20:40:01'),
(964, 9692897, '2017-09-13 21:00:01'),
(965, 4381049, '2017-09-13 21:20:01'),
(966, 7638383, '2017-09-13 21:40:01'),
(967, 2397002, '2017-09-13 22:00:01'),
(968, 5326356, '2017-09-13 22:20:01'),
(969, 4385738, '2017-09-13 22:40:01'),
(970, 6163819, '2017-09-13 23:00:01'),
(971, 3901328, '2017-09-13 23:20:01'),
(972, 3826616, '2017-09-13 23:40:01'),
(973, 9236762, '2017-09-14 00:00:01'),
(974, 3838755, '2017-09-14 00:20:01'),
(975, 5038862, '2017-09-14 00:40:01'),
(976, 1189802, '2017-09-14 01:00:01'),
(977, 2547327, '2017-09-14 01:20:01'),
(978, 5857738, '2017-09-14 01:40:01'),
(979, 1998878, '2017-09-14 02:00:01'),
(980, 4511292, '2017-09-14 02:20:01'),
(981, 7491498, '2017-09-14 02:40:01'),
(982, 2299067, '2017-09-14 03:00:01'),
(983, 6789492, '2017-09-14 03:20:01'),
(984, 5904237, '2017-09-14 03:40:01'),
(985, 6442821, '2017-09-14 04:00:01'),
(986, 7892630, '2017-09-14 04:20:01'),
(987, 2898700, '2017-09-14 04:40:01'),
(988, 6893919, '2017-09-14 05:00:01'),
(989, 5735803, '2017-09-14 05:20:01'),
(990, 5633622, '2017-09-14 05:40:01'),
(991, 6577438, '2017-09-14 06:00:01'),
(992, 8419095, '2017-09-14 06:20:01'),
(993, 2848049, '2017-09-14 06:40:01'),
(994, 4724185, '2017-09-14 07:00:01'),
(995, 2285966, '2017-09-14 07:20:01'),
(996, 1167924, '2017-09-14 07:40:01'),
(997, 8744908, '2017-09-14 08:00:01'),
(998, 1765516, '2017-09-14 08:20:01'),
(999, 2699449, '2017-09-14 08:40:01'),
(1000, 1393680, '2017-09-14 09:00:01'),
(1001, 4341563, '2017-09-14 09:20:01'),
(1002, 8950081, '2017-09-14 09:40:02'),
(1003, 3976133, '2017-09-14 10:00:01'),
(1004, 6906926, '2017-09-14 10:20:01'),
(1005, 9434739, '2017-09-14 10:40:01'),
(1006, 4142690, '2017-09-14 11:00:01'),
(1007, 7989739, '2017-09-14 11:20:01'),
(1008, 3304048, '2017-09-14 11:40:01'),
(1009, 9362475, '2017-09-14 12:00:01'),
(1010, 2400509, '2017-09-14 12:20:01'),
(1011, 7677451, '2017-09-14 12:40:01'),
(1012, 1389611, '2017-09-14 13:00:01'),
(1013, 4001667, '2017-09-14 13:20:01'),
(1014, 8481486, '2017-09-14 13:40:01'),
(1015, 9197165, '2017-09-14 14:00:01'),
(1016, 7597829, '2017-09-14 14:20:01'),
(1017, 6437653, '2017-09-14 14:40:01'),
(1018, 3719921, '2017-09-14 15:00:01'),
(1019, 8854145, '2017-09-14 15:20:01'),
(1020, 4215913, '2017-09-14 15:40:01'),
(1021, 4578104, '2017-09-14 16:00:01'),
(1022, 6447142, '2017-09-14 16:20:01'),
(1023, 4982871, '2017-09-14 16:40:01'),
(1024, 2037741, '2017-09-14 17:00:01'),
(1025, 4854072, '2017-09-14 17:20:01'),
(1026, 7966948, '2017-09-14 17:40:01'),
(1027, 8842631, '2017-09-14 18:00:01'),
(1028, 9786750, '2017-09-14 18:20:01'),
(1029, 3700718, '2017-09-14 18:40:01'),
(1030, 1614236, '2017-09-14 19:00:02'),
(1031, 2039626, '2017-09-14 19:20:01'),
(1032, 3260473, '2017-09-14 19:40:01'),
(1033, 7474256, '2017-09-14 20:00:01'),
(1034, 2307412, '2017-09-14 20:20:01'),
(1035, 1294355, '2017-09-14 20:40:01'),
(1036, 2039151, '2017-09-14 21:00:01'),
(1037, 1873484, '2017-09-14 21:20:01'),
(1038, 1361839, '2017-09-14 21:40:01'),
(1039, 3636459, '2017-09-14 22:00:01'),
(1040, 5856155, '2017-09-14 22:20:01'),
(1041, 6982097, '2017-09-14 22:40:01'),
(1042, 7013612, '2017-09-14 23:00:02'),
(1043, 7861045, '2017-09-14 23:20:01'),
(1044, 7543636, '2017-09-14 23:40:01'),
(1045, 5785871, '2017-09-15 00:00:01'),
(1046, 4245046, '2017-09-15 00:20:01'),
(1047, 2700037, '2017-09-15 00:40:01'),
(1048, 9510393, '2017-09-15 01:00:01'),
(1049, 4106128, '2017-09-15 01:20:01'),
(1050, 8726418, '2017-09-15 01:40:01'),
(1051, 7263285, '2017-09-15 02:00:01'),
(1052, 1704920, '2017-09-15 02:20:01'),
(1053, 4126034, '2017-09-15 02:40:01'),
(1054, 8161393, '2017-09-15 03:00:01'),
(1055, 2379931, '2017-09-15 03:20:01'),
(1056, 5178720, '2017-09-15 03:40:01'),
(1057, 7048754, '2017-09-15 04:00:01'),
(1058, 4538738, '2017-09-15 04:20:01'),
(1059, 2569511, '2017-09-15 04:40:01'),
(1060, 2181339, '2017-09-15 05:00:01'),
(1061, 5626540, '2017-09-15 05:20:01'),
(1062, 2668848, '2017-09-15 05:40:01'),
(1063, 6933196, '2017-09-15 06:00:01'),
(1064, 9567995, '2017-09-15 06:20:01'),
(1065, 3533285, '2017-09-15 06:40:01'),
(1066, 5496043, '2017-09-15 07:00:01'),
(1067, 2852835, '2017-09-15 07:20:01'),
(1068, 9728343, '2017-09-15 07:40:01'),
(1069, 5265217, '2017-09-15 08:00:01'),
(1070, 8183787, '2017-09-15 08:20:01'),
(1071, 1615300, '2017-09-15 08:40:01'),
(1072, 4036979, '2017-09-15 09:00:01'),
(1073, 2078619, '2017-09-15 09:20:01'),
(1074, 4393985, '2017-09-15 09:40:01'),
(1075, 3723173, '2017-09-15 10:00:01'),
(1076, 5538843, '2017-09-15 10:20:01'),
(1077, 1400487, '2017-09-15 10:40:01'),
(1078, 4286317, '2017-09-15 11:00:01'),
(1079, 1445962, '2017-09-15 11:20:01'),
(1080, 5166594, '2017-09-15 11:40:01'),
(1081, 8999586, '2017-09-15 12:00:01'),
(1082, 8538311, '2017-09-15 12:20:01'),
(1083, 3003422, '2017-09-15 12:40:01'),
(1084, 5351520, '2017-09-15 13:00:01'),
(1085, 8636564, '2017-09-15 13:20:01'),
(1086, 1315852, '2017-09-15 13:40:01'),
(1087, 9611520, '2017-09-15 14:00:01'),
(1088, 2299849, '2017-09-15 14:20:01'),
(1089, 2958240, '2017-09-15 14:40:01'),
(1090, 5604768, '2017-09-15 15:00:01'),
(1091, 4211015, '2017-09-15 15:20:01'),
(1092, 1631583, '2017-09-15 15:40:01'),
(1093, 2189009, '2017-09-15 16:00:01'),
(1094, 5581167, '2017-09-15 16:20:01'),
(1095, 4880426, '2017-09-15 16:40:01'),
(1096, 4061724, '2017-09-15 17:00:01'),
(1097, 8610806, '2017-09-15 17:20:01'),
(1098, 2550403, '2017-09-15 17:40:01'),
(1099, 1677395, '2017-09-15 18:00:01'),
(1100, 2482973, '2017-09-15 18:20:01'),
(1101, 3098260, '2017-09-15 18:40:01'),
(1102, 8011825, '2017-09-15 19:00:01'),
(1103, 1957675, '2017-09-15 19:20:01'),
(1104, 5478486, '2017-09-15 19:40:01'),
(1105, 2409248, '2017-09-15 20:00:01'),
(1106, 4917488, '2017-09-15 20:20:01'),
(1107, 8801153, '2017-09-15 20:40:01'),
(1108, 4670005, '2017-09-15 21:00:01'),
(1109, 2588610, '2017-09-15 21:20:01'),
(1110, 8124883, '2017-09-15 21:40:01'),
(1111, 1365184, '2017-09-15 22:00:01'),
(1112, 1732586, '2017-09-15 22:20:01'),
(1113, 8558259, '2017-09-15 22:40:01'),
(1114, 9271587, '2017-09-15 23:00:01'),
(1115, 6205261, '2017-09-15 23:20:01'),
(1116, 9964589, '2017-09-15 23:40:01'),
(1117, 6279511, '2017-09-16 00:00:01'),
(1118, 6137950, '2017-09-16 00:20:01'),
(1119, 3290457, '2017-09-16 00:40:01'),
(1120, 1801943, '2017-09-16 01:00:01'),
(1121, 4724956, '2017-09-16 01:20:01'),
(1122, 6904894, '2017-09-16 01:40:01'),
(1123, 8245142, '2017-09-16 02:00:01'),
(1124, 2835617, '2017-09-16 02:20:01'),
(1125, 9851399, '2017-09-16 02:40:01'),
(1126, 1524418, '2017-09-16 03:00:01'),
(1127, 2805545, '2017-09-16 03:20:01'),
(1128, 2625520, '2017-09-16 03:40:01'),
(1129, 1280864, '2017-09-16 04:00:01'),
(1130, 2228368, '2017-09-16 04:20:01'),
(1131, 3781781, '2017-09-16 04:40:01'),
(1132, 2457446, '2017-09-16 05:00:01'),
(1133, 3625092, '2017-09-16 05:20:01'),
(1134, 1220362, '2017-09-16 05:40:01'),
(1135, 3105570, '2017-09-16 06:00:01'),
(1136, 7149847, '2017-09-16 06:20:01'),
(1137, 4525679, '2017-09-16 06:40:01'),
(1138, 6608795, '2017-09-16 07:00:01'),
(1139, 6878062, '2017-09-16 07:20:01'),
(1140, 1283264, '2017-09-16 07:40:01'),
(1141, 9975886, '2017-09-16 08:00:01'),
(1142, 2535736, '2017-09-16 08:20:01'),
(1143, 2043698, '2017-09-16 08:40:01'),
(1144, 7948798, '2017-09-16 09:00:01'),
(1145, 3724236, '2017-09-16 09:20:01'),
(1146, 5481073, '2017-09-16 09:40:01'),
(1147, 1412700, '2017-09-16 10:00:01'),
(1148, 3392632, '2017-09-16 10:20:01'),
(1149, 5186166, '2017-09-16 10:40:01'),
(1150, 4843925, '2017-09-16 11:00:02'),
(1151, 5403621, '2017-09-16 11:20:01'),
(1152, 1770025, '2017-09-16 11:40:01'),
(1153, 9450408, '2017-09-16 12:00:01'),
(1154, 6891127, '2017-09-16 12:20:02'),
(1155, 7472942, '2017-09-16 12:40:01'),
(1156, 5063314, '2017-09-16 13:00:01'),
(1157, 4801537, '2017-09-16 13:20:01'),
(1158, 5090375, '2017-09-16 13:40:01'),
(1159, 3350625, '2017-09-16 14:00:01'),
(1160, 1664845, '2017-09-16 14:20:02'),
(1161, 7865751, '2017-09-16 14:40:01'),
(1162, 7709860, '2017-09-16 15:00:01'),
(1163, 1573615, '2017-09-16 15:20:01'),
(1164, 3142475, '2017-09-16 15:40:01'),
(1165, 7290591, '2017-09-16 16:00:01'),
(1166, 6606768, '2017-09-16 16:20:01'),
(1167, 7638816, '2017-09-16 16:40:01'),
(1168, 7745807, '2017-09-16 17:00:01'),
(1169, 8609856, '2017-09-16 17:20:01'),
(1170, 7447323, '2017-09-16 17:40:01'),
(1171, 3345826, '2017-09-16 18:00:01'),
(1172, 2755719, '2017-09-16 18:20:01'),
(1173, 6093760, '2017-09-16 18:40:01'),
(1174, 8714110, '2017-09-16 19:00:01'),
(1175, 2181351, '2017-09-16 19:20:01'),
(1176, 7254889, '2017-09-16 19:40:01'),
(1177, 8004743, '2017-09-16 20:00:01'),
(1178, 7124763, '2017-09-16 20:20:01'),
(1179, 3825751, '2017-09-16 20:40:02'),
(1180, 3978092, '2017-09-16 21:00:01'),
(1181, 1439238, '2017-09-16 21:20:01'),
(1182, 8467254, '2017-09-16 21:40:01'),
(1183, 8775120, '2017-09-16 22:00:01'),
(1184, 4860108, '2017-09-16 22:20:01'),
(1185, 5657689, '2017-09-16 22:40:01'),
(1186, 8258085, '2017-09-16 23:00:01'),
(1187, 7285017, '2017-09-16 23:20:01'),
(1188, 7857876, '2017-09-16 23:40:01'),
(1189, 4919880, '2017-09-17 00:00:01'),
(1190, 3629286, '2017-09-17 00:20:01'),
(1191, 2090358, '2017-09-17 00:40:01'),
(1192, 3290216, '2017-09-17 01:00:02'),
(1193, 4834597, '2017-09-17 01:20:01'),
(1194, 1194668, '2017-09-17 01:40:01'),
(1195, 4539620, '2017-09-17 02:00:01'),
(1196, 2443285, '2017-09-17 02:20:01'),
(1197, 3560047, '2017-09-17 02:40:02'),
(1198, 1817768, '2017-09-17 03:00:01'),
(1199, 4856110, '2017-09-17 03:20:01'),
(1200, 8985320, '2017-09-17 03:40:01'),
(1201, 9772240, '2017-09-17 04:00:01'),
(1202, 3458303, '2017-09-17 04:20:02'),
(1203, 4668153, '2017-09-17 04:40:01'),
(1204, 5644792, '2017-09-17 05:00:01'),
(1205, 3263876, '2017-09-17 05:20:01'),
(1206, 5061590, '2017-09-17 05:40:01'),
(1207, 4464134, '2017-09-17 06:00:01'),
(1208, 6413751, '2017-09-17 06:20:02'),
(1209, 1823433, '2017-09-17 06:40:01'),
(1210, 2358233, '2017-09-17 07:00:01'),
(1211, 3340953, '2017-09-17 07:20:01'),
(1212, 3456740, '2017-09-17 07:40:01'),
(1213, 4864786, '2017-09-17 08:00:01'),
(1214, 3075099, '2017-09-17 08:20:02'),
(1215, 6061440, '2017-09-17 08:40:01'),
(1216, 9520655, '2017-09-17 09:00:01'),
(1217, 2493235, '2017-09-17 09:20:01'),
(1218, 9230267, '2017-09-17 09:40:01'),
(1219, 2125708, '2017-09-17 10:00:01'),
(1220, 3969241, '2017-09-17 10:20:01'),
(1221, 5994476, '2017-09-17 10:40:01'),
(1222, 7063871, '2017-09-17 11:00:01'),
(1223, 8459737, '2017-09-17 11:20:01'),
(1224, 9401905, '2017-09-17 11:40:01'),
(1225, 9361789, '2017-09-17 12:00:01'),
(1226, 7073247, '2017-09-17 12:20:01'),
(1227, 5145679, '2017-09-17 12:40:01'),
(1228, 6819978, '2017-09-17 13:00:01'),
(1229, 7803240, '2017-09-17 13:20:01'),
(1230, 9286798, '2017-09-17 13:40:01'),
(1231, 3847197, '2017-09-17 14:00:01'),
(1232, 6191912, '2017-09-17 14:20:01'),
(1233, 8680311, '2017-09-17 14:40:01'),
(1234, 9675877, '2017-09-17 15:00:01'),
(1235, 7467378, '2017-09-17 15:20:01'),
(1236, 7152756, '2017-09-17 15:40:01'),
(1237, 5200749, '2017-09-17 16:00:01'),
(1238, 6293966, '2017-09-17 16:20:01'),
(1239, 5499634, '2017-09-17 16:40:01'),
(1240, 4597533, '2017-09-17 17:00:01'),
(1241, 8017072, '2017-09-17 17:20:02'),
(1242, 7078175, '2017-09-17 17:40:01'),
(1243, 1354108, '2017-09-17 18:00:02'),
(1244, 6662115, '2017-09-17 18:20:01'),
(1245, 7633124, '2017-09-17 18:40:01'),
(1246, 3873588, '2017-09-17 19:00:01'),
(1247, 1586374, '2017-09-17 19:20:01'),
(1248, 2012577, '2017-09-17 19:40:01'),
(1249, 1520460, '2017-09-17 20:00:01'),
(1250, 6996431, '2017-09-17 20:20:01'),
(1251, 9788877, '2017-09-17 20:40:01'),
(1252, 5428274, '2017-09-17 21:00:01'),
(1253, 2609575, '2017-09-17 21:20:01'),
(1254, 8447753, '2017-09-17 21:40:01'),
(1255, 6070411, '2017-09-17 22:00:01'),
(1256, 6610489, '2017-09-17 22:20:01'),
(1257, 3929880, '2017-09-17 22:40:01'),
(1258, 8745672, '2017-09-17 23:00:01'),
(1259, 3753573, '2017-09-17 23:20:01'),
(1260, 2121401, '2017-09-17 23:40:01'),
(1261, 5874835, '2017-09-18 00:00:01'),
(1262, 8514965, '2017-09-18 00:20:01'),
(1263, 3056328, '2017-09-18 00:40:01'),
(1264, 5456035, '2017-09-18 01:00:01'),
(1265, 7253175, '2017-09-18 01:20:01'),
(1266, 3506449, '2017-09-18 01:40:01'),
(1267, 4900982, '2017-09-18 02:00:01'),
(1268, 4564966, '2017-09-18 02:20:01'),
(1269, 6685744, '2017-09-18 02:40:01'),
(1270, 7718329, '2017-09-18 03:00:01'),
(1271, 6374985, '2017-09-18 03:20:01'),
(1272, 1681847, '2017-09-18 03:40:01'),
(1273, 8111605, '2017-09-18 04:00:02'),
(1274, 2947995, '2017-09-18 04:20:01'),
(1275, 2268932, '2017-09-18 04:40:01'),
(1276, 6061123, '2017-09-18 05:00:01'),
(1277, 9725879, '2017-09-18 05:20:01'),
(1278, 9134911, '2017-09-18 05:40:01'),
(1279, 6048273, '2017-09-18 06:00:01'),
(1280, 4829238, '2017-09-18 06:20:01'),
(1281, 7753617, '2017-09-18 06:40:01'),
(1282, 7772419, '2017-09-18 07:00:01'),
(1283, 7412893, '2017-09-18 07:20:01'),
(1284, 4174449, '2017-09-18 07:40:01'),
(1285, 5311593, '2017-09-18 08:00:02'),
(1286, 3790162, '2017-09-18 08:20:01'),
(1287, 6981291, '2017-09-18 08:40:01'),
(1288, 7383157, '2017-09-18 09:00:01'),
(1289, 8778538, '2017-09-18 09:20:01'),
(1290, 5610679, '2017-09-18 09:40:01'),
(1291, 9926548, '2017-09-18 10:00:01'),
(1292, 9649840, '2017-09-18 10:20:01'),
(1293, 7515471, '2017-09-18 10:40:01'),
(1294, 3477052, '2017-09-18 11:00:01'),
(1295, 5108566, '2017-09-18 11:20:01'),
(1296, 3543272, '2017-09-18 11:40:01'),
(1297, 4357775, '2017-09-18 12:00:01'),
(1298, 8461766, '2017-09-18 12:20:02'),
(1299, 5658252, '2017-09-18 12:40:01'),
(1300, 4316896, '2017-09-18 13:00:01'),
(1301, 8243554, '2017-09-18 13:20:02'),
(1302, 6371396, '2017-09-18 13:40:02'),
(1303, 5624439, '2017-09-18 14:00:01'),
(1304, 4695571, '2017-09-18 14:20:01'),
(1305, 5604514, '2017-09-18 14:40:01'),
(1306, 1434584, '2017-09-18 15:00:01'),
(1307, 3462904, '2017-09-18 15:20:01'),
(1308, 1851421, '2017-09-18 15:40:01'),
(1309, 6524012, '2017-09-18 16:00:01'),
(1310, 2431813, '2017-09-18 16:20:01'),
(1311, 8935205, '2017-09-18 16:40:01'),
(1312, 8601340, '2017-09-18 17:00:01'),
(1313, 7885734, '2017-09-18 17:20:01'),
(1314, 5674425, '2017-09-18 17:40:01'),
(1315, 2488249, '2017-09-18 18:00:01'),
(1316, 9930978, '2017-09-18 18:20:01'),
(1317, 9809832, '2017-09-18 18:40:01'),
(1318, 8165561, '2017-09-18 19:00:01'),
(1319, 5776732, '2017-09-18 19:20:01'),
(1320, 6799403, '2017-09-18 19:40:01'),
(1321, 9121062, '2017-09-18 20:00:01'),
(1322, 8343590, '2017-09-18 20:20:01'),
(1323, 1853650, '2017-09-18 20:40:01'),
(1324, 7938911, '2017-09-18 21:00:01'),
(1325, 4504391, '2017-09-18 21:20:01'),
(1326, 6582318, '2017-09-18 21:40:01'),
(1327, 2356881, '2017-09-18 22:00:01'),
(1328, 2086404, '2017-09-18 22:20:01'),
(1329, 4341190, '2017-09-18 22:40:01'),
(1330, 1585535, '2017-09-18 23:00:01'),
(1331, 9952706, '2017-09-18 23:20:02'),
(1332, 3289425, '2017-09-18 23:40:01'),
(1333, 9219875, '2017-09-19 00:00:01'),
(1334, 8994456, '2017-09-19 00:20:01'),
(1335, 2451700, '2017-09-19 00:40:01'),
(1336, 6038987, '2017-09-19 01:00:01'),
(1337, 9271576, '2017-09-19 01:20:02'),
(1338, 6785851, '2017-09-19 01:40:01'),
(1339, 2947693, '2017-09-19 02:00:01'),
(1340, 4085216, '2017-09-19 02:20:01'),
(1341, 8099498, '2017-09-19 02:40:01'),
(1342, 8050489, '2017-09-19 03:00:01'),
(1343, 8500578, '2017-09-19 03:20:02');
INSERT INTO `test_cron` (`id`, `rid`, `cron_date`) VALUES
(1344, 8552601, '2017-09-19 03:40:01'),
(1345, 8144345, '2017-09-19 04:00:01'),
(1346, 4564957, '2017-09-19 04:20:02'),
(1347, 6535929, '2017-09-19 04:40:01'),
(1348, 5528147, '2017-09-19 05:00:02'),
(1349, 5939774, '2017-09-19 05:20:01'),
(1350, 7447442, '2017-09-19 05:40:01'),
(1351, 5948205, '2017-09-19 06:00:01'),
(1352, 2806841, '2017-09-19 06:20:01'),
(1353, 5733911, '2017-09-19 06:40:01'),
(1354, 9136302, '2017-09-19 07:00:01'),
(1355, 8879862, '2017-09-19 07:20:01'),
(1356, 5118430, '2017-09-19 07:40:02'),
(1357, 2190153, '2017-09-19 08:00:02'),
(1358, 9987694, '2017-09-19 08:20:01'),
(1359, 9013520, '2017-09-19 08:40:01'),
(1360, 8354305, '2017-09-19 09:00:01'),
(1361, 2001671, '2017-09-19 09:20:01'),
(1362, 1229773, '2017-09-19 09:40:01'),
(1363, 8846518, '2017-09-19 10:00:01'),
(1364, 7572332, '2017-09-19 10:20:01'),
(1365, 4797272, '2017-09-19 10:40:01'),
(1366, 1309047, '2017-09-19 11:00:01'),
(1367, 6976290, '2017-09-19 11:20:02'),
(1368, 2536298, '2017-09-19 11:40:01'),
(1369, 1585807, '2017-09-19 12:00:01'),
(1370, 6842357, '2017-09-19 12:20:01'),
(1371, 5490015, '2017-09-19 12:40:01'),
(1372, 3182511, '2017-09-19 13:00:01'),
(1373, 5512071, '2017-09-19 13:20:01'),
(1374, 8146236, '2017-09-19 13:40:01'),
(1375, 9554348, '2017-09-19 14:00:01'),
(1376, 3409507, '2017-09-19 14:20:01'),
(1377, 3542419, '2017-09-19 14:40:01'),
(1378, 2463078, '2017-09-19 15:00:01'),
(1379, 9958368, '2017-09-19 15:20:01'),
(1380, 4707491, '2017-09-19 15:40:01'),
(1381, 2277821, '2017-09-19 16:00:01'),
(1382, 7176575, '2017-09-19 16:20:01'),
(1383, 1505751, '2017-09-19 16:40:01'),
(1384, 9724620, '2017-09-19 17:00:01'),
(1385, 3345699, '2017-09-19 17:20:01'),
(1386, 2256994, '2017-09-19 17:40:01'),
(1387, 3446079, '2017-09-19 18:00:01'),
(1388, 2274519, '2017-09-19 18:20:01'),
(1389, 8981414, '2017-09-19 18:40:01'),
(1390, 8728968, '2017-09-19 19:00:01'),
(1391, 1674937, '2017-09-19 19:20:01'),
(1392, 3218804, '2017-09-19 19:40:01'),
(1393, 9013740, '2017-09-19 20:00:01'),
(1394, 6801332, '2017-09-19 20:20:01'),
(1395, 5162693, '2017-09-19 20:40:01'),
(1396, 5849044, '2017-09-19 21:00:01'),
(1397, 3213134, '2017-09-19 21:20:01'),
(1398, 4750867, '2017-09-19 21:40:02'),
(1399, 7828699, '2017-09-19 22:00:01'),
(1400, 2308992, '2017-09-19 22:20:01'),
(1401, 7869227, '2017-09-19 22:40:01'),
(1402, 9610827, '2017-09-19 23:00:01'),
(1403, 7009705, '2017-09-19 23:20:01'),
(1404, 2339683, '2017-09-19 23:40:01'),
(1405, 8977901, '2017-09-20 00:00:01'),
(1406, 5862510, '2017-09-20 00:20:01'),
(1407, 6920053, '2017-09-20 00:40:01'),
(1408, 3307226, '2017-09-20 01:00:01'),
(1409, 7570610, '2017-09-20 01:20:01'),
(1410, 4719536, '2017-09-20 01:40:01'),
(1411, 9983497, '2017-09-20 02:00:01'),
(1412, 9322219, '2017-09-20 02:20:01'),
(1413, 8711206, '2017-09-20 02:40:02'),
(1414, 7453686, '2017-09-20 03:00:01'),
(1415, 8257732, '2017-09-20 03:20:01'),
(1416, 2142476, '2017-09-20 03:40:01'),
(1417, 8294718, '2017-09-20 04:00:01'),
(1418, 3750945, '2017-09-20 04:20:01'),
(1419, 2919636, '2017-09-20 04:40:01'),
(1420, 4903243, '2017-09-20 05:00:01'),
(1421, 2445082, '2017-09-20 05:20:02'),
(1422, 3978195, '2017-09-20 05:40:01'),
(1423, 2852287, '2017-09-20 06:00:01'),
(1424, 5120656, '2017-09-20 06:20:01'),
(1425, 6621725, '2017-09-20 06:40:01'),
(1426, 2788902, '2017-09-20 07:00:01'),
(1427, 2999050, '2017-09-20 07:20:01'),
(1428, 6145404, '2017-09-20 07:40:01'),
(1429, 7575668, '2017-09-20 08:00:01'),
(1430, 4152339, '2017-09-20 08:20:01'),
(1431, 5739351, '2017-09-20 08:40:01'),
(1432, 6326619, '2017-09-20 09:00:01'),
(1433, 7303724, '2017-09-20 09:20:01'),
(1434, 3087968, '2017-09-20 09:40:01'),
(1435, 2759473, '2017-09-20 10:00:01'),
(1436, 5149879, '2017-09-20 10:20:02'),
(1437, 3333483, '2017-09-20 10:40:01'),
(1438, 6708365, '2017-09-20 11:00:01'),
(1439, 9260434, '2017-09-20 11:20:02'),
(1440, 6118994, '2017-09-20 11:40:01'),
(1441, 7953645, '2017-09-20 12:00:01'),
(1442, 6167944, '2017-09-20 12:20:01'),
(1443, 9556753, '2017-09-20 12:40:01'),
(1444, 5279987, '2017-09-20 13:00:01'),
(1445, 3269207, '2017-09-20 13:20:01'),
(1446, 2217274, '2017-09-20 13:40:01'),
(1447, 6513155, '2017-09-20 14:00:01'),
(1448, 3770516, '2017-09-20 14:20:01'),
(1449, 5246962, '2017-09-20 14:40:01'),
(1450, 6075923, '2017-09-20 15:00:01'),
(1451, 4396220, '2017-09-20 15:20:01'),
(1452, 8476517, '2017-09-20 15:40:01'),
(1453, 1760790, '2017-09-20 16:00:01'),
(1454, 2737254, '2017-09-20 16:20:01'),
(1455, 5541615, '2017-09-20 16:40:01'),
(1456, 6008230, '2017-09-20 17:00:01'),
(1457, 1828400, '2017-09-20 17:20:01'),
(1458, 8501804, '2017-09-20 17:40:01'),
(1459, 1349546, '2017-09-20 18:00:02'),
(1460, 3339377, '2017-09-20 18:20:01'),
(1461, 5709954, '2017-09-20 18:40:01'),
(1462, 1184234, '2017-09-20 19:00:01'),
(1463, 3199371, '2017-09-20 19:20:01'),
(1464, 9381044, '2017-09-20 19:40:01'),
(1465, 5907787, '2017-09-20 20:00:01'),
(1466, 5584144, '2017-09-20 20:20:01'),
(1467, 5036862, '2017-09-20 20:40:01'),
(1468, 4962533, '2017-09-20 21:00:01'),
(1469, 8015402, '2017-09-20 21:20:01'),
(1470, 2569490, '2017-09-20 21:40:01'),
(1471, 2466569, '2017-09-20 22:00:01'),
(1472, 1404321, '2017-09-20 22:20:01'),
(1473, 1424943, '2017-09-20 22:40:01'),
(1474, 5807506, '2017-09-20 23:00:01'),
(1475, 6512603, '2017-09-20 23:20:02'),
(1476, 4700577, '2017-09-20 23:40:01'),
(1477, 2903416, '2017-09-21 00:00:01'),
(1478, 3489789, '2017-09-21 00:20:01'),
(1479, 8307166, '2017-09-21 00:40:01'),
(1480, 6702629, '2017-09-21 01:00:01'),
(1481, 6597111, '2017-09-21 01:20:01'),
(1482, 1154340, '2017-09-21 01:40:01'),
(1483, 8001650, '2017-09-21 02:00:02'),
(1484, 3057756, '2017-09-21 02:20:01'),
(1485, 2868520, '2017-09-21 02:40:01'),
(1486, 1148045, '2017-09-21 03:00:01'),
(1487, 5429760, '2017-09-21 03:20:01'),
(1488, 2092069, '2017-09-21 03:40:01'),
(1489, 6237300, '2017-09-21 04:00:01'),
(1490, 1611753, '2017-09-21 04:20:01'),
(1491, 2476829, '2017-09-21 04:40:01'),
(1492, 1112145, '2017-09-21 05:00:01'),
(1493, 5602486, '2017-09-21 05:20:02'),
(1494, 8501611, '2017-09-21 05:40:01'),
(1495, 8789005, '2017-09-21 06:00:01'),
(1496, 7142631, '2017-09-21 06:20:02'),
(1497, 2916741, '2017-09-21 06:40:01'),
(1498, 3451500, '2017-09-21 07:00:01'),
(1499, 5625891, '2017-09-21 07:20:01'),
(1500, 2264315, '2017-09-21 07:40:01'),
(1501, 5957007, '2017-09-21 08:00:01'),
(1502, 7941798, '2017-09-21 08:20:01'),
(1503, 8247520, '2017-09-21 08:40:01'),
(1504, 4362069, '2017-09-21 09:00:01'),
(1505, 8440658, '2017-09-21 09:20:01'),
(1506, 3641267, '2017-09-21 09:40:01'),
(1507, 3615386, '2017-09-21 10:00:01'),
(1508, 7321042, '2017-09-21 10:20:01'),
(1509, 8732656, '2017-09-21 10:40:01'),
(1510, 8094339, '2017-09-21 11:00:01'),
(1511, 5042566, '2017-09-21 11:20:01'),
(1512, 4308414, '2017-09-21 11:40:01'),
(1513, 4320554, '2017-09-21 12:00:01'),
(1514, 9723717, '2017-09-21 12:20:01'),
(1515, 2326608, '2017-09-21 12:40:01'),
(1516, 1163497, '2017-09-21 13:00:01'),
(1517, 5328870, '2017-09-21 13:20:01'),
(1518, 6963515, '2017-09-21 13:40:01'),
(1519, 7242341, '2017-09-21 14:00:01'),
(1520, 4726818, '2017-09-21 14:20:01'),
(1521, 2244404, '2017-09-21 14:40:01'),
(1522, 3190229, '2017-09-21 15:00:01'),
(1523, 8093940, '2017-09-21 15:20:01'),
(1524, 2149282, '2017-09-21 15:40:01'),
(1525, 4431661, '2017-09-21 16:00:01'),
(1526, 9143855, '2017-09-21 16:20:01'),
(1527, 1363046, '2017-09-21 16:40:01'),
(1528, 8663738, '2017-09-21 17:00:01'),
(1529, 4138468, '2017-09-21 17:20:01'),
(1530, 6738685, '2017-09-21 17:40:01'),
(1531, 3506015, '2017-09-21 18:00:01'),
(1532, 4324426, '2017-09-21 18:20:02'),
(1533, 8026681, '2017-09-21 18:40:01'),
(1534, 9458742, '2017-09-21 19:00:01'),
(1535, 2379016, '2017-09-21 19:20:01'),
(1536, 3826747, '2017-09-21 19:40:01'),
(1537, 4772801, '2017-09-21 20:00:01'),
(1538, 6053646, '2017-09-21 20:20:01'),
(1539, 7625755, '2017-09-21 20:40:01'),
(1540, 2326285, '2017-09-21 21:00:01'),
(1541, 7906775, '2017-09-21 21:20:01'),
(1542, 1611235, '2017-09-21 21:40:01'),
(1543, 9863721, '2017-09-21 22:00:01'),
(1544, 7087719, '2017-09-21 22:20:01'),
(1545, 5175918, '2017-09-21 22:40:01'),
(1546, 3663484, '2017-09-21 23:00:02'),
(1547, 7193371, '2017-09-21 23:20:01'),
(1548, 1369641, '2017-09-21 23:40:01'),
(1549, 4848559, '2017-09-22 00:00:01'),
(1550, 5226281, '2017-09-22 00:20:01'),
(1551, 2253997, '2017-09-22 00:40:01'),
(1552, 7457394, '2017-09-22 01:00:01'),
(1553, 5309991, '2017-09-22 01:20:01'),
(1554, 4170042, '2017-09-22 01:40:01'),
(1555, 8427668, '2017-09-22 02:00:01'),
(1556, 6382757, '2017-09-22 02:20:01'),
(1557, 1811601, '2017-09-22 02:40:01'),
(1558, 6044083, '2017-09-22 03:00:01'),
(1559, 6527405, '2017-09-22 03:20:01'),
(1560, 3311120, '2017-09-22 03:40:01'),
(1561, 2564102, '2017-09-22 04:00:01'),
(1562, 4133395, '2017-09-22 04:20:01'),
(1563, 2559492, '2017-09-22 04:40:01'),
(1564, 4534272, '2017-09-22 05:00:01'),
(1565, 3611399, '2017-09-22 05:20:01'),
(1566, 5315340, '2017-09-22 05:40:01'),
(1567, 9194204, '2017-09-22 06:00:01'),
(1568, 1705699, '2017-09-22 06:20:02'),
(1569, 6239730, '2017-09-22 06:40:02'),
(1570, 7214605, '2017-09-22 07:00:01'),
(1571, 6370314, '2017-09-22 07:20:01'),
(1572, 8335025, '2017-09-22 07:40:01'),
(1573, 9268063, '2017-09-22 08:00:01'),
(1574, 3818892, '2017-09-22 08:20:01'),
(1575, 8733324, '2017-09-22 08:40:01'),
(1576, 8221504, '2017-09-22 09:00:01'),
(1577, 8833818, '2017-09-22 09:20:01'),
(1578, 8454296, '2017-09-22 09:40:01'),
(1579, 9587063, '2017-09-22 10:00:01'),
(1580, 1524796, '2017-09-22 10:20:01'),
(1581, 4295425, '2017-09-22 10:40:01'),
(1582, 2201832, '2017-09-22 11:00:01'),
(1583, 7143697, '2017-09-22 11:20:01'),
(1584, 7333988, '2017-09-22 11:40:02'),
(1585, 4406288, '2017-09-22 12:00:01'),
(1586, 4323912, '2017-09-22 12:20:01'),
(1587, 3789845, '2017-09-22 12:40:01'),
(1588, 5448318, '2017-09-22 13:00:01'),
(1589, 8865214, '2017-09-22 13:20:01'),
(1590, 8644301, '2017-09-22 13:40:01'),
(1591, 8967730, '2017-09-22 14:00:01'),
(1592, 5793827, '2017-09-22 14:20:01'),
(1593, 2546015, '2017-09-22 14:40:01'),
(1594, 5546597, '2017-09-22 15:00:01'),
(1595, 5338631, '2017-09-22 15:20:01'),
(1596, 3353971, '2017-09-22 15:40:01'),
(1597, 7557869, '2017-09-22 16:00:01'),
(1598, 5840526, '2017-09-22 16:20:02'),
(1599, 2090254, '2017-09-22 16:40:01'),
(1600, 6132327, '2017-09-22 17:00:01'),
(1601, 8802698, '2017-09-22 17:20:01'),
(1602, 8681954, '2017-09-22 17:40:01'),
(1603, 7508785, '2017-09-22 18:00:01'),
(1604, 6123555, '2017-09-22 18:20:01'),
(1605, 7171969, '2017-09-22 18:40:01'),
(1606, 1677410, '2017-09-22 19:00:01'),
(1607, 6200003, '2017-09-22 19:20:01'),
(1608, 6507078, '2017-09-22 19:40:01'),
(1609, 6718723, '2017-09-22 20:00:01'),
(1610, 2209557, '2017-09-22 20:20:01'),
(1611, 2797266, '2017-09-22 20:40:01'),
(1612, 3057007, '2017-09-22 21:00:01'),
(1613, 6106974, '2017-09-22 21:20:01'),
(1614, 4672192, '2017-09-22 21:40:02'),
(1615, 3694427, '2017-09-22 22:00:01'),
(1616, 2142627, '2017-09-22 22:20:01'),
(1617, 3634736, '2017-09-22 22:40:01'),
(1618, 2575072, '2017-09-22 23:00:01'),
(1619, 1901512, '2017-09-22 23:20:01'),
(1620, 3633262, '2017-09-22 23:40:01'),
(1621, 7199712, '2017-09-23 00:00:01'),
(1622, 3772587, '2017-09-23 00:20:01'),
(1623, 5421140, '2017-09-23 00:40:01'),
(1624, 2851940, '2017-09-23 01:00:01'),
(1625, 5071626, '2017-09-23 01:20:02'),
(1626, 7871018, '2017-09-23 01:40:02'),
(1627, 8303546, '2017-09-23 02:00:01'),
(1628, 9763130, '2017-09-23 02:20:01'),
(1629, 8246105, '2017-09-23 02:40:01'),
(1630, 2250060, '2017-09-23 03:00:01'),
(1631, 8763557, '2017-09-23 03:20:01'),
(1632, 9143044, '2017-09-23 03:40:01'),
(1633, 8897353, '2017-09-23 04:00:01'),
(1634, 6435727, '2017-09-23 04:20:01'),
(1635, 5603732, '2017-09-23 04:40:02'),
(1636, 9549058, '2017-09-23 05:00:01'),
(1637, 9917410, '2017-09-23 05:20:01'),
(1638, 3983593, '2017-09-23 05:40:01'),
(1639, 5351071, '2017-09-23 06:00:01'),
(1640, 4152931, '2017-09-23 06:20:01'),
(1641, 9617843, '2017-09-23 06:40:01'),
(1642, 5732679, '2017-09-23 07:00:01'),
(1643, 1776750, '2017-09-23 07:20:02'),
(1644, 9343583, '2017-09-23 07:40:01'),
(1645, 1174183, '2017-09-23 08:00:01'),
(1646, 1438770, '2017-09-23 08:20:02'),
(1647, 7301529, '2017-09-23 08:40:02'),
(1648, 1128118, '2017-09-23 09:00:01'),
(1649, 2412958, '2017-09-23 09:20:01'),
(1650, 6851832, '2017-09-23 09:40:01'),
(1651, 8431581, '2017-09-23 10:00:01'),
(1652, 6057526, '2017-09-23 10:20:01'),
(1653, 5054297, '2017-09-23 10:40:01'),
(1654, 1627996, '2017-09-23 11:00:01'),
(1655, 9882854, '2017-09-23 11:20:01'),
(1656, 2635126, '2017-09-23 11:40:01'),
(1657, 1379574, '2017-09-23 12:00:01'),
(1658, 4380293, '2017-09-23 12:20:01'),
(1659, 9469346, '2017-09-23 12:40:01'),
(1660, 5386594, '2017-09-23 13:00:01'),
(1661, 7789656, '2017-09-23 13:20:01'),
(1662, 6504290, '2017-09-23 13:40:01'),
(1663, 6802441, '2017-09-23 14:00:01'),
(1664, 5501003, '2017-09-23 14:20:01'),
(1665, 3175668, '2017-09-23 14:40:01'),
(1666, 2907364, '2017-09-23 15:00:01'),
(1667, 9835427, '2017-09-23 15:20:01'),
(1668, 7929943, '2017-09-23 15:40:01'),
(1669, 9699495, '2017-09-23 16:00:01'),
(1670, 1413427, '2017-09-23 16:20:01'),
(1671, 5011026, '2017-09-23 16:40:01'),
(1672, 3939681, '2017-09-23 17:00:01'),
(1673, 1154628, '2017-09-23 17:20:01'),
(1674, 8882009, '2017-09-23 17:40:01'),
(1675, 4184002, '2017-09-23 18:00:01'),
(1676, 7215761, '2017-09-23 18:20:01'),
(1677, 8578864, '2017-09-23 18:40:01'),
(1678, 1262566, '2017-09-23 19:00:01'),
(1679, 8897250, '2017-09-23 19:20:01'),
(1680, 4181024, '2017-09-23 19:40:02'),
(1681, 1290714, '2017-09-23 20:00:01'),
(1682, 4630471, '2017-09-23 20:20:01'),
(1683, 1703435, '2017-09-23 20:40:01'),
(1684, 9246417, '2017-09-23 21:00:02'),
(1685, 1334795, '2017-09-23 21:20:01'),
(1686, 5149582, '2017-09-23 21:40:02'),
(1687, 9678003, '2017-09-23 22:00:01'),
(1688, 9129947, '2017-09-23 22:20:01'),
(1689, 3809755, '2017-09-23 22:40:01'),
(1690, 5785049, '2017-09-23 23:00:01'),
(1691, 8766024, '2017-09-23 23:20:01'),
(1692, 4043872, '2017-09-23 23:40:01'),
(1693, 4607462, '2017-09-24 00:00:01'),
(1694, 6257597, '2017-09-24 00:20:02'),
(1695, 1386021, '2017-09-24 00:40:01'),
(1696, 4517602, '2017-09-24 01:00:01'),
(1697, 2935154, '2017-09-24 01:20:01'),
(1698, 4724145, '2017-09-24 01:40:01'),
(1699, 2479597, '2017-09-24 02:00:01'),
(1700, 9022524, '2017-09-24 02:20:01'),
(1701, 1709262, '2017-09-24 02:40:02'),
(1702, 4060917, '2017-09-24 03:00:01'),
(1703, 2192756, '2017-09-24 03:20:01'),
(1704, 4615138, '2017-09-24 03:40:01'),
(1705, 3334911, '2017-09-24 04:00:01'),
(1706, 3041310, '2017-09-24 04:20:01'),
(1707, 5221286, '2017-09-24 04:40:01'),
(1708, 2408475, '2017-09-24 05:00:01'),
(1709, 4261868, '2017-09-24 05:20:01'),
(1710, 9808376, '2017-09-24 05:40:01'),
(1711, 2562394, '2017-09-24 06:00:01'),
(1712, 7220817, '2017-09-24 06:20:01'),
(1713, 9848776, '2017-09-24 06:40:01'),
(1714, 6261544, '2017-09-24 07:00:01'),
(1715, 2182191, '2017-09-24 07:20:01'),
(1716, 3477838, '2017-09-24 07:40:01'),
(1717, 2461959, '2017-09-24 08:00:01'),
(1718, 2525141, '2017-09-24 08:20:01'),
(1719, 4535946, '2017-09-24 08:40:01'),
(1720, 2096031, '2017-09-24 09:00:02'),
(1721, 2662912, '2017-09-24 09:20:01'),
(1722, 4896805, '2017-09-24 09:40:01'),
(1723, 4292575, '2017-09-24 10:00:01'),
(1724, 5219088, '2017-09-24 10:20:01'),
(1725, 7217256, '2017-09-24 10:40:01'),
(1726, 2148930, '2017-09-24 11:00:01'),
(1727, 4066826, '2017-09-24 11:20:01'),
(1728, 5733000, '2017-09-24 11:40:01'),
(1729, 8235276, '2017-09-24 12:00:01'),
(1730, 4129687, '2017-09-24 12:20:01'),
(1731, 6377884, '2017-09-24 12:40:01'),
(1732, 2607088, '2017-09-24 13:00:01'),
(1733, 8717183, '2017-09-24 13:20:01'),
(1734, 2636965, '2017-09-24 13:40:01'),
(1735, 6852328, '2017-09-24 14:00:01'),
(1736, 3003246, '2017-09-24 14:20:01'),
(1737, 2681717, '2017-09-24 14:40:01'),
(1738, 2726474, '2017-09-24 15:00:01'),
(1739, 8820668, '2017-09-24 15:20:01'),
(1740, 6562521, '2017-09-24 15:40:01'),
(1741, 4702125, '2017-09-24 16:00:01'),
(1742, 5488970, '2017-09-24 16:20:01'),
(1743, 8978526, '2017-09-24 16:40:01'),
(1744, 1362792, '2017-09-24 17:00:01'),
(1745, 7106482, '2017-09-24 17:20:01'),
(1746, 6261153, '2017-09-24 17:40:01'),
(1747, 2905294, '2017-09-24 18:00:01'),
(1748, 8510185, '2017-09-24 18:20:01'),
(1749, 2221519, '2017-09-24 18:40:01'),
(1750, 8833610, '2017-09-24 19:00:01'),
(1751, 9188941, '2017-09-24 19:20:01'),
(1752, 7519924, '2017-09-24 19:40:02'),
(1753, 5858093, '2017-09-24 20:00:02'),
(1754, 3986219, '2017-09-24 20:20:01'),
(1755, 5273547, '2017-09-24 20:40:01'),
(1756, 7852997, '2017-09-24 21:00:01'),
(1757, 7821331, '2017-09-24 21:20:01'),
(1758, 2991242, '2017-09-24 21:40:01'),
(1759, 2694940, '2017-09-24 22:00:01'),
(1760, 2257224, '2017-09-24 22:20:01'),
(1761, 8073111, '2017-09-24 22:40:01'),
(1762, 8154997, '2017-09-24 23:00:01'),
(1763, 5316952, '2017-09-24 23:20:01'),
(1764, 5110559, '2017-09-24 23:40:01'),
(1765, 3944617, '2017-09-25 00:00:01'),
(1766, 2936490, '2017-09-25 00:20:01'),
(1767, 3872593, '2017-09-25 00:40:01'),
(1768, 5718457, '2017-09-25 01:00:01'),
(1769, 7613099, '2017-09-25 01:20:02'),
(1770, 9906456, '2017-09-25 01:40:01'),
(1771, 9806569, '2017-09-25 02:00:01'),
(1772, 4028767, '2017-09-25 02:20:01'),
(1773, 8869525, '2017-09-25 02:40:01'),
(1774, 7620172, '2017-09-25 03:00:02'),
(1775, 2274625, '2017-09-25 03:20:01'),
(1776, 5429189, '2017-09-25 03:40:01'),
(1777, 9326052, '2017-09-25 04:00:01'),
(1778, 1885382, '2017-09-25 04:20:01'),
(1779, 7609366, '2017-09-25 04:40:01'),
(1780, 5509176, '2017-09-25 05:00:02'),
(1781, 6308440, '2017-09-25 05:20:01'),
(1782, 6304397, '2017-09-25 05:40:01'),
(1783, 8524047, '2017-09-25 06:00:01'),
(1784, 1784568, '2017-09-25 06:20:01'),
(1785, 6996739, '2017-09-25 06:40:01'),
(1786, 3311803, '2017-09-25 07:00:01'),
(1787, 5753667, '2017-09-25 07:20:01'),
(1788, 5683763, '2017-09-25 07:40:01'),
(1789, 1633268, '2017-09-25 08:00:01'),
(1790, 4040204, '2017-09-25 08:20:01'),
(1791, 9201370, '2017-09-25 08:40:01'),
(1792, 4454194, '2017-09-25 09:00:01'),
(1793, 1814912, '2017-09-25 09:20:01'),
(1794, 3647243, '2017-09-25 09:40:01'),
(1795, 1189047, '2017-09-25 10:00:01'),
(1796, 6767445, '2017-09-25 10:20:01'),
(1797, 3516895, '2017-09-25 10:40:01'),
(1798, 8236841, '2017-09-25 11:00:01'),
(1799, 2106705, '2017-09-25 11:20:01'),
(1800, 6966071, '2017-09-25 11:40:01'),
(1801, 2732577, '2017-09-25 12:00:01'),
(1802, 7993034, '2017-09-25 12:20:02'),
(1803, 5311251, '2017-09-25 12:40:01'),
(1804, 9623470, '2017-09-25 13:00:01'),
(1805, 5307393, '2017-09-25 13:20:01'),
(1806, 2167722, '2017-09-25 13:40:01'),
(1807, 9539461, '2017-09-25 14:00:01'),
(1808, 4127278, '2017-09-25 14:20:02'),
(1809, 9035816, '2017-09-25 14:40:01'),
(1810, 8160591, '2017-09-25 15:00:01'),
(1811, 8041365, '2017-09-25 15:20:01'),
(1812, 9573192, '2017-09-25 15:40:02'),
(1813, 7391631, '2017-09-25 16:00:01'),
(1814, 4913150, '2017-09-25 16:20:01'),
(1815, 5856224, '2017-09-25 16:40:01'),
(1816, 2612680, '2017-09-25 17:00:01'),
(1817, 2102042, '2017-09-25 17:20:01'),
(1818, 1342912, '2017-09-25 17:40:01'),
(1819, 1840516, '2017-09-25 18:00:01'),
(1820, 3759296, '2017-09-25 18:20:01'),
(1821, 9601367, '2017-09-25 18:40:02'),
(1822, 5385539, '2017-09-25 19:00:01'),
(1823, 6766081, '2017-09-25 19:20:01'),
(1824, 8333327, '2017-09-25 19:40:01'),
(1825, 4471961, '2017-09-25 20:00:01'),
(1826, 4680519, '2017-09-25 20:20:01'),
(1827, 7950223, '2017-09-25 20:40:01'),
(1828, 2911422, '2017-09-25 21:00:02'),
(1829, 3519260, '2017-09-25 21:20:01'),
(1830, 4201795, '2017-09-25 21:40:01'),
(1831, 1431892, '2017-09-25 22:00:01'),
(1832, 3803482, '2017-09-25 22:20:01'),
(1833, 1690828, '2017-09-25 22:40:01'),
(1834, 3500293, '2017-09-25 23:00:01'),
(1835, 2707619, '2017-09-25 23:20:01'),
(1836, 5083445, '2017-09-25 23:40:01'),
(1837, 8818076, '2017-09-26 00:00:01'),
(1838, 3597765, '2017-09-26 00:20:01'),
(1839, 4613733, '2017-09-26 00:40:01'),
(1840, 9636418, '2017-09-26 01:00:01'),
(1841, 1518430, '2017-09-26 01:20:01'),
(1842, 3934748, '2017-09-26 01:40:01'),
(1843, 6703865, '2017-09-26 02:00:01'),
(1844, 6148704, '2017-09-26 02:20:01'),
(1845, 6014336, '2017-09-26 02:40:01'),
(1846, 8458654, '2017-09-26 03:00:01'),
(1847, 9674469, '2017-09-26 03:20:01'),
(1848, 2567505, '2017-09-26 03:40:01'),
(1849, 9121283, '2017-09-26 04:00:01'),
(1850, 6782640, '2017-09-26 04:20:01'),
(1851, 8753117, '2017-09-26 04:40:01'),
(1852, 5247085, '2017-09-26 05:00:01'),
(1853, 7015225, '2017-09-26 05:20:01'),
(1854, 6873082, '2017-09-26 05:40:02'),
(1855, 9742705, '2017-09-26 06:00:01'),
(1856, 7957229, '2017-09-26 06:20:01'),
(1857, 3239463, '2017-09-26 06:40:01'),
(1858, 2601824, '2017-09-26 07:00:01'),
(1859, 3614349, '2017-09-26 07:20:01'),
(1860, 5084816, '2017-09-26 07:40:01'),
(1861, 2891735, '2017-09-26 08:00:02'),
(1862, 7771713, '2017-09-26 08:20:01'),
(1863, 8316212, '2017-09-26 08:40:02'),
(1864, 8617659, '2017-09-26 09:00:01'),
(1865, 7806167, '2017-09-26 09:20:01'),
(1866, 7923957, '2017-09-26 09:40:01'),
(1867, 7064172, '2017-09-26 10:00:01'),
(1868, 3323131, '2017-09-26 10:20:01'),
(1869, 9800791, '2017-09-26 10:40:01'),
(1870, 7519250, '2017-09-26 11:00:01'),
(1871, 4179308, '2017-09-26 11:20:01'),
(1872, 4195585, '2017-09-26 11:40:01'),
(1873, 7691982, '2017-09-26 12:00:01'),
(1874, 6758784, '2017-09-26 12:20:01'),
(1875, 3083361, '2017-09-26 12:40:01'),
(1876, 2125813, '2017-09-26 13:00:01'),
(1877, 8304053, '2017-09-26 13:20:02'),
(1878, 2986344, '2017-09-26 13:40:01'),
(1879, 4928446, '2017-09-26 14:00:01'),
(1880, 7048922, '2017-09-26 14:20:01'),
(1881, 7775152, '2017-09-26 14:40:01'),
(1882, 5079078, '2017-09-26 15:00:01'),
(1883, 3744291, '2017-09-26 15:20:01'),
(1884, 9008550, '2017-09-26 15:40:01'),
(1885, 5714221, '2017-09-26 16:00:01'),
(1886, 6747607, '2017-09-26 16:20:01'),
(1887, 6329619, '2017-09-26 16:40:01'),
(1888, 5662286, '2017-09-26 17:00:01'),
(1889, 4026448, '2017-09-26 17:20:01'),
(1890, 8991175, '2017-09-26 17:40:01'),
(1891, 7445112, '2017-09-26 18:00:01'),
(1892, 5780917, '2017-09-26 18:20:01'),
(1893, 4756608, '2017-09-26 18:40:01'),
(1894, 9932743, '2017-09-26 19:00:01'),
(1895, 3332015, '2017-09-26 19:20:01'),
(1896, 2578005, '2017-09-26 19:40:01'),
(1897, 4381912, '2017-09-26 20:00:01'),
(1898, 6178803, '2017-09-26 20:20:01'),
(1899, 8646398, '2017-09-26 20:40:01'),
(1900, 1914340, '2017-09-26 21:00:01'),
(1901, 4760619, '2017-09-26 21:20:01'),
(1902, 2000551, '2017-09-26 21:40:01'),
(1903, 4875595, '2017-09-26 22:00:02'),
(1904, 2445530, '2017-09-26 22:20:01'),
(1905, 7111244, '2017-09-26 22:40:01'),
(1906, 9206578, '2017-09-26 23:00:01'),
(1907, 3827742, '2017-09-26 23:20:02'),
(1908, 7381280, '2017-09-26 23:40:01'),
(1909, 1730493, '2017-09-27 00:00:01'),
(1910, 5131035, '2017-09-27 00:20:01'),
(1911, 3677007, '2017-09-27 00:40:01'),
(1912, 8896813, '2017-09-27 01:00:02'),
(1913, 8268173, '2017-09-27 01:20:01'),
(1914, 7030426, '2017-09-27 01:40:01'),
(1915, 5241829, '2017-09-27 02:00:01'),
(1916, 3392473, '2017-09-27 02:20:01'),
(1917, 5832186, '2017-09-27 02:40:01'),
(1918, 1193836, '2017-09-27 03:00:01'),
(1919, 4864617, '2017-09-27 03:20:01'),
(1920, 4892224, '2017-09-27 03:40:02'),
(1921, 7906560, '2017-09-27 04:00:01'),
(1922, 3205448, '2017-09-27 04:20:01'),
(1923, 6441478, '2017-09-27 04:40:01'),
(1924, 4826839, '2017-09-27 05:00:01'),
(1925, 8684000, '2017-09-27 05:20:02'),
(1926, 9618181, '2017-09-27 05:40:01'),
(1927, 2443183, '2017-09-27 06:00:01'),
(1928, 3408619, '2017-09-27 06:20:01'),
(1929, 4509283, '2017-09-27 06:40:01'),
(1930, 8777918, '2017-09-27 07:00:01'),
(1931, 4318715, '2017-09-27 07:20:01'),
(1932, 9218630, '2017-09-27 07:40:01'),
(1933, 6325074, '2017-09-27 08:00:01'),
(1934, 1828245, '2017-09-27 08:20:01'),
(1935, 1122357, '2017-09-27 08:40:01'),
(1936, 5955004, '2017-09-27 09:00:01'),
(1937, 8433812, '2017-09-27 09:20:01'),
(1938, 9989623, '2017-09-27 09:40:01'),
(1939, 4630714, '2017-09-27 10:00:01'),
(1940, 4128857, '2017-09-27 10:20:01'),
(1941, 3086559, '2017-09-27 10:40:01'),
(1942, 2275228, '2017-09-27 11:00:01'),
(1943, 9619639, '2017-09-27 11:20:01'),
(1944, 3703615, '2017-09-27 11:40:01'),
(1945, 1374201, '2017-09-27 12:00:01'),
(1946, 4075240, '2017-09-27 12:20:01'),
(1947, 3711636, '2017-09-27 12:40:01'),
(1948, 2632258, '2017-09-27 13:00:01'),
(1949, 6521962, '2017-09-27 13:20:01'),
(1950, 7537302, '2017-09-27 13:40:01'),
(1951, 2310855, '2017-09-27 14:00:01'),
(1952, 3772906, '2017-09-27 14:20:01'),
(1953, 3907074, '2017-09-27 14:40:01'),
(1954, 1265666, '2017-09-27 15:00:01'),
(1955, 2368173, '2017-09-27 15:20:02'),
(1956, 5130474, '2017-09-27 15:40:01'),
(1957, 9393037, '2017-09-27 16:00:01'),
(1958, 9345705, '2017-09-27 16:20:01'),
(1959, 4643535, '2017-09-27 16:40:01'),
(1960, 2770185, '2017-09-27 17:00:01'),
(1961, 5352489, '2017-09-27 17:20:02'),
(1962, 1167785, '2017-09-27 17:40:01'),
(1963, 8941232, '2017-09-27 18:00:01'),
(1964, 8141568, '2017-09-27 18:20:01'),
(1965, 9463863, '2017-09-27 18:40:01'),
(1966, 5800591, '2017-09-27 19:00:01'),
(1967, 6531488, '2017-09-27 19:20:01'),
(1968, 4940425, '2017-09-27 19:40:01'),
(1969, 8488672, '2017-09-27 20:00:01'),
(1970, 4680061, '2017-09-27 20:20:01'),
(1971, 6320022, '2017-09-27 20:40:01'),
(1972, 6271607, '2017-09-27 21:00:01'),
(1973, 3960611, '2017-09-27 21:20:01'),
(1974, 6818850, '2017-09-27 21:40:02'),
(1975, 3149137, '2017-09-27 22:00:01'),
(1976, 6273165, '2017-09-27 22:20:01'),
(1977, 3282470, '2017-09-27 22:40:01'),
(1978, 8298597, '2017-09-27 23:00:01'),
(1979, 3218212, '2017-09-27 23:20:01'),
(1980, 2771316, '2017-09-27 23:40:01'),
(1981, 3157906, '2017-09-28 00:00:01'),
(1982, 4008461, '2017-09-28 00:20:01'),
(1983, 7356138, '2017-09-28 00:40:01'),
(1984, 5558145, '2017-09-28 01:00:01'),
(1985, 1785204, '2017-09-28 01:20:01'),
(1986, 9520108, '2017-09-28 01:40:01'),
(1987, 8721246, '2017-09-28 02:00:01'),
(1988, 5363161, '2017-09-28 02:20:01'),
(1989, 4202218, '2017-09-28 02:40:02'),
(1990, 7433248, '2017-09-28 03:00:01'),
(1991, 2876481, '2017-09-28 03:20:01'),
(1992, 9055934, '2017-09-28 03:40:01'),
(1993, 8987267, '2017-09-28 04:00:01'),
(1994, 2182303, '2017-09-28 04:20:01'),
(1995, 7939088, '2017-09-28 04:40:01'),
(1996, 6634416, '2017-09-28 05:00:01'),
(1997, 5951824, '2017-09-28 05:20:01'),
(1998, 4035267, '2017-09-28 05:40:02'),
(1999, 9024346, '2017-09-28 06:00:01'),
(2000, 7990252, '2017-09-28 06:20:01'),
(2001, 9579269, '2017-09-28 06:40:01'),
(2002, 8385902, '2017-09-28 07:00:01'),
(2003, 7098510, '2017-09-28 07:20:01'),
(2004, 5857686, '2017-09-28 07:40:01'),
(2005, 1837205, '2017-09-28 08:00:01'),
(2006, 9305318, '2017-09-28 08:20:01'),
(2007, 5894854, '2017-09-28 08:40:01'),
(2008, 6645609, '2017-09-28 09:00:01'),
(2009, 1445904, '2017-09-28 09:20:01'),
(2010, 1470015, '2017-09-28 09:40:01'),
(2011, 6358403, '2017-09-28 10:00:01'),
(2012, 5851616, '2017-09-28 10:20:01'),
(2013, 5522206, '2017-09-28 10:40:01'),
(2014, 7618634, '2017-09-28 11:00:01'),
(2015, 8537762, '2017-09-28 11:20:02'),
(2016, 4450245, '2017-09-28 11:40:01'),
(2017, 6211594, '2017-09-28 12:00:01'),
(2018, 2422129, '2017-09-28 12:20:01'),
(2019, 3281240, '2017-09-28 12:40:01'),
(2020, 4874346, '2017-09-28 13:00:02'),
(2021, 1889199, '2017-09-28 13:20:01'),
(2022, 4907155, '2017-09-28 13:40:01'),
(2023, 5302547, '2017-09-28 14:00:01'),
(2024, 5287840, '2017-09-28 14:20:01'),
(2025, 3045250, '2017-09-28 14:40:01'),
(2026, 7445085, '2017-09-28 15:00:01'),
(2027, 5533681, '2017-09-28 15:20:01'),
(2028, 9805153, '2017-09-28 15:40:02'),
(2029, 7887955, '2017-09-28 16:00:01'),
(2030, 1665221, '2017-09-28 16:20:02'),
(2031, 5804332, '2017-09-28 16:40:01'),
(2032, 9245424, '2017-09-28 17:00:01'),
(2033, 8349630, '2017-09-28 17:20:01'),
(2034, 8770858, '2017-09-28 17:40:01'),
(2035, 6673724, '2017-09-28 18:00:01'),
(2036, 4152118, '2017-09-28 18:20:01'),
(2037, 2606161, '2017-09-28 18:40:01'),
(2038, 8644819, '2017-09-28 19:00:01'),
(2039, 1918026, '2017-09-28 19:20:01'),
(2040, 3604093, '2017-09-28 19:40:01'),
(2041, 4848912, '2017-09-28 20:00:01'),
(2042, 8786216, '2017-09-28 20:20:01'),
(2043, 4339922, '2017-09-28 20:40:01'),
(2044, 8341722, '2017-09-28 21:00:01'),
(2045, 1796001, '2017-09-28 21:20:01'),
(2046, 5984435, '2017-09-28 21:40:01'),
(2047, 9888708, '2017-09-28 22:00:01'),
(2048, 3729914, '2017-09-28 22:20:01'),
(2049, 2577300, '2017-09-28 22:40:01'),
(2050, 8471590, '2017-09-28 23:00:01'),
(2051, 3999451, '2017-09-28 23:20:01'),
(2052, 1536741, '2017-09-28 23:40:01'),
(2053, 9228481, '2017-09-29 00:00:01'),
(2054, 3212682, '2017-09-29 00:20:01'),
(2055, 6022323, '2017-09-29 00:40:01'),
(2056, 6598609, '2017-09-29 01:00:01'),
(2057, 6681159, '2017-09-29 01:20:01'),
(2058, 7731172, '2017-09-29 01:40:01'),
(2059, 1193833, '2017-09-29 02:00:01'),
(2060, 5584197, '2017-09-29 02:20:01'),
(2061, 9089667, '2017-09-29 02:40:01'),
(2062, 6809493, '2017-09-29 03:00:01'),
(2063, 7050258, '2017-09-29 03:20:01'),
(2064, 9000995, '2017-09-29 03:40:01'),
(2065, 7295673, '2017-09-29 04:00:01'),
(2066, 3450621, '2017-09-29 04:20:01'),
(2067, 3228161, '2017-09-29 04:40:01'),
(2068, 3184739, '2017-09-29 05:00:01'),
(2069, 2712293, '2017-09-29 05:20:01'),
(2070, 7800604, '2017-09-29 05:40:02'),
(2071, 5923207, '2017-09-29 06:00:01'),
(2072, 9927076, '2017-09-29 06:20:01'),
(2073, 4705233, '2017-09-29 06:40:02'),
(2074, 4488949, '2017-09-29 07:00:01'),
(2075, 7624568, '2017-09-29 07:20:01'),
(2076, 8890636, '2017-09-29 07:40:01'),
(2077, 7833311, '2017-09-29 08:00:01'),
(2078, 5460918, '2017-09-29 08:20:01'),
(2079, 2133283, '2017-09-29 08:40:01'),
(2080, 8696185, '2017-09-29 09:00:01'),
(2081, 8009297, '2017-09-29 09:20:01'),
(2082, 1598163, '2017-09-29 09:40:01'),
(2083, 4193195, '2017-09-29 10:00:02'),
(2084, 8253978, '2017-09-29 10:20:01'),
(2085, 3768882, '2017-09-29 10:40:01'),
(2086, 3532400, '2017-09-29 11:00:01'),
(2087, 1857556, '2017-09-29 11:20:01'),
(2088, 5529126, '2017-09-29 11:40:01'),
(2089, 5324519, '2017-09-29 12:00:01'),
(2090, 7506710, '2017-09-29 12:20:01'),
(2091, 1880711, '2017-09-29 12:40:01'),
(2092, 8049322, '2017-09-29 13:00:01'),
(2093, 8978368, '2017-09-29 13:20:01'),
(2094, 2083029, '2017-09-29 13:40:01'),
(2095, 6706291, '2017-09-29 14:00:01'),
(2096, 2586980, '2017-09-29 14:20:01'),
(2097, 8880280, '2017-09-29 14:40:02'),
(2098, 6670777, '2017-09-29 15:00:01'),
(2099, 7119786, '2017-09-29 15:20:01'),
(2100, 6888561, '2017-09-29 15:40:01'),
(2101, 4066901, '2017-09-29 16:00:01'),
(2102, 8764885, '2017-09-29 16:20:01'),
(2103, 1725853, '2017-09-29 16:40:01'),
(2104, 7257866, '2017-09-29 17:00:01'),
(2105, 7149847, '2017-09-29 17:20:01'),
(2106, 8252612, '2017-09-29 17:40:02'),
(2107, 2997443, '2017-09-29 18:00:01'),
(2108, 7179453, '2017-09-29 18:20:01'),
(2109, 9714734, '2017-09-29 18:40:01'),
(2110, 8171378, '2017-09-29 19:00:01'),
(2111, 8339143, '2017-09-29 19:20:02'),
(2112, 1277872, '2017-09-29 19:40:01'),
(2113, 4692573, '2017-09-29 20:00:01'),
(2114, 4137141, '2017-09-29 20:20:01'),
(2115, 7610971, '2017-09-29 20:40:01'),
(2116, 5112611, '2017-09-29 21:00:01'),
(2117, 8805859, '2017-09-29 21:20:01'),
(2118, 9085506, '2017-09-29 21:40:01'),
(2119, 3626172, '2017-09-29 22:00:01'),
(2120, 9594244, '2017-09-29 22:20:01'),
(2121, 4811322, '2017-09-29 22:40:01'),
(2122, 6960350, '2017-09-29 23:00:02'),
(2123, 9213598, '2017-09-29 23:20:01'),
(2124, 6205304, '2017-09-29 23:40:01'),
(2125, 4056583, '2017-09-30 00:00:01'),
(2126, 4997706, '2017-09-30 00:20:01'),
(2127, 6444313, '2017-09-30 00:40:01'),
(2128, 6804585, '2017-09-30 01:00:02'),
(2129, 1246013, '2017-09-30 01:20:02'),
(2130, 4566253, '2017-09-30 01:40:01'),
(2131, 3525272, '2017-09-30 02:00:01'),
(2132, 4379180, '2017-09-30 02:20:01'),
(2133, 1481819, '2017-09-30 02:40:01'),
(2134, 1144787, '2017-09-30 03:00:02'),
(2135, 7237049, '2017-09-30 03:20:01'),
(2136, 7579652, '2017-09-30 03:40:01'),
(2137, 3194209, '2017-09-30 04:00:01'),
(2138, 1496614, '2017-09-30 04:20:01'),
(2139, 5052775, '2017-09-30 04:40:01'),
(2140, 3551290, '2017-09-30 05:00:01'),
(2141, 2776068, '2017-09-30 05:20:01'),
(2142, 5191691, '2017-09-30 05:40:01'),
(2143, 3280891, '2017-09-30 06:00:01'),
(2144, 9013756, '2017-09-30 06:20:01'),
(2145, 4117996, '2017-09-30 06:40:01'),
(2146, 7079614, '2017-09-30 07:00:01'),
(2147, 2352121, '2017-09-30 07:20:01'),
(2148, 1798618, '2017-09-30 07:40:01'),
(2149, 2582042, '2017-09-30 08:00:01'),
(2150, 3591707, '2017-09-30 08:20:01'),
(2151, 7910644, '2017-09-30 08:40:01'),
(2152, 4517105, '2017-09-30 09:00:01'),
(2153, 9450903, '2017-09-30 09:20:01'),
(2154, 2370403, '2017-09-30 09:40:01'),
(2155, 5774905, '2017-09-30 10:00:01'),
(2156, 4919619, '2017-09-30 10:20:01'),
(2157, 3420091, '2017-09-30 10:40:01'),
(2158, 6864777, '2017-09-30 11:00:01'),
(2159, 3008354, '2017-09-30 11:20:01'),
(2160, 9580518, '2017-09-30 11:40:01'),
(2161, 3883005, '2017-09-30 12:00:01'),
(2162, 8784764, '2017-09-30 12:20:01'),
(2163, 7704225, '2017-09-30 12:40:01'),
(2164, 2179772, '2017-09-30 13:00:02'),
(2165, 5149909, '2017-09-30 13:20:01'),
(2166, 1739923, '2017-09-30 13:40:01'),
(2167, 8979223, '2017-09-30 14:00:01'),
(2168, 7669842, '2017-09-30 14:20:01'),
(2169, 3907043, '2017-09-30 14:40:01'),
(2170, 3943567, '2017-09-30 15:00:01'),
(2171, 2304171, '2017-09-30 15:20:01'),
(2172, 3096217, '2017-09-30 15:40:01'),
(2173, 9478814, '2017-09-30 16:00:01'),
(2174, 9146445, '2017-09-30 16:20:01'),
(2175, 2865885, '2017-09-30 16:40:02'),
(2176, 7853328, '2017-09-30 17:00:01'),
(2177, 6230981, '2017-09-30 17:20:01'),
(2178, 6030256, '2017-09-30 17:40:02'),
(2179, 5462671, '2017-09-30 18:00:01'),
(2180, 3436708, '2017-09-30 18:20:01'),
(2181, 1346387, '2017-09-30 18:40:01'),
(2182, 7158124, '2017-09-30 19:00:01'),
(2183, 8223784, '2017-09-30 19:20:01'),
(2184, 9745757, '2017-09-30 19:40:01'),
(2185, 3409266, '2017-09-30 20:00:01'),
(2186, 6044163, '2017-09-30 20:20:01'),
(2187, 4808215, '2017-09-30 20:40:01'),
(2188, 9357768, '2017-09-30 21:00:01'),
(2189, 9457222, '2017-09-30 21:20:01'),
(2190, 7398579, '2017-09-30 21:40:01'),
(2191, 1785424, '2017-09-30 22:00:01'),
(2192, 4065654, '2017-09-30 22:20:01'),
(2193, 5918694, '2017-09-30 22:40:01'),
(2194, 9555298, '2017-09-30 23:00:01'),
(2195, 3553349, '2017-09-30 23:20:01'),
(2196, 7353610, '2017-09-30 23:40:01'),
(2197, 4082875, '2017-10-01 00:00:01'),
(2198, 4125095, '2017-10-01 00:20:01'),
(2199, 5845969, '2017-10-01 00:40:01'),
(2200, 3372359, '2017-10-01 01:00:01'),
(2201, 6912242, '2017-10-01 01:20:01'),
(2202, 9194964, '2017-10-01 01:40:01'),
(2203, 6381313, '2017-10-01 02:00:01'),
(2204, 8460092, '2017-10-01 02:20:01'),
(2205, 8076575, '2017-10-01 02:40:02'),
(2206, 6000586, '2017-10-01 03:00:01'),
(2207, 3073273, '2017-10-01 03:20:01'),
(2208, 8461141, '2017-10-01 03:40:01'),
(2209, 1379107, '2017-10-01 04:00:01'),
(2210, 3437326, '2017-10-01 04:20:01'),
(2211, 9236032, '2017-10-01 04:40:01'),
(2212, 3883825, '2017-10-01 05:00:02'),
(2213, 6920747, '2017-10-01 05:20:01'),
(2214, 5086680, '2017-10-01 05:40:01'),
(2215, 2986656, '2017-10-01 06:00:01'),
(2216, 1805884, '2017-10-01 06:20:01'),
(2217, 6571107, '2017-10-01 06:40:01'),
(2218, 2836921, '2017-10-01 07:00:01'),
(2219, 4892564, '2017-10-01 07:20:01'),
(2220, 5713220, '2017-10-01 07:40:01'),
(2221, 9375283, '2017-10-01 08:00:01'),
(2222, 6806853, '2017-10-01 08:20:01'),
(2223, 1193135, '2017-10-01 08:40:01'),
(2224, 6778093, '2017-10-01 09:00:01'),
(2225, 2685589, '2017-10-01 09:20:01'),
(2226, 5227474, '2017-10-01 09:40:01'),
(2227, 7994393, '2017-10-01 10:00:01'),
(2228, 6739461, '2017-10-01 10:20:01'),
(2229, 3435428, '2017-10-01 10:40:02'),
(2230, 3601094, '2017-10-01 11:00:01'),
(2231, 8849321, '2017-10-01 11:20:01'),
(2232, 4572052, '2017-10-01 11:40:01'),
(2233, 8342396, '2017-10-01 12:00:01'),
(2234, 2785776, '2017-10-01 12:20:01'),
(2235, 8000853, '2017-10-01 12:40:01'),
(2236, 1187609, '2017-10-01 13:00:01'),
(2237, 5546098, '2017-10-01 13:20:01'),
(2238, 9744552, '2017-10-01 13:40:01'),
(2239, 6012109, '2017-10-01 14:00:01'),
(2240, 7505499, '2017-10-01 14:20:01'),
(2241, 8226460, '2017-10-01 14:40:02'),
(2242, 5472229, '2017-10-01 15:00:01'),
(2243, 5513974, '2017-10-01 15:20:01'),
(2244, 3824049, '2017-10-01 15:40:01'),
(2245, 5315844, '2017-10-01 16:00:02'),
(2246, 1748688, '2017-10-01 16:20:01'),
(2247, 8146620, '2017-10-01 16:40:01'),
(2248, 5731619, '2017-10-01 17:00:01'),
(2249, 1688264, '2017-10-01 17:20:01'),
(2250, 2717214, '2017-10-01 17:40:01'),
(2251, 3850155, '2017-10-01 18:00:01'),
(2252, 6853018, '2017-10-01 18:20:01'),
(2253, 7240020, '2017-10-01 18:40:01'),
(2254, 5596838, '2017-10-01 19:00:01'),
(2255, 8864271, '2017-10-01 19:20:01'),
(2256, 3103615, '2017-10-01 19:40:01'),
(2257, 8248744, '2017-10-01 20:00:01'),
(2258, 2628767, '2017-10-01 20:20:01'),
(2259, 8038213, '2017-10-01 20:40:01'),
(2260, 3839389, '2017-10-01 21:00:01'),
(2261, 7650635, '2017-10-01 21:20:02'),
(2262, 9561114, '2017-10-01 21:40:01'),
(2263, 2192684, '2017-10-01 22:00:01'),
(2264, 5173776, '2017-10-01 22:20:01'),
(2265, 3885076, '2017-10-01 22:40:02'),
(2266, 2334991, '2017-10-01 23:00:01'),
(2267, 4156559, '2017-10-01 23:20:01'),
(2268, 3174840, '2017-10-01 23:40:01'),
(2269, 1766112, '2017-10-02 00:00:01'),
(2270, 9431600, '2017-10-02 00:20:02'),
(2271, 2557488, '2017-10-02 00:40:01'),
(2272, 4702052, '2017-10-02 01:00:01'),
(2273, 2154626, '2017-10-02 01:20:01'),
(2274, 5359293, '2017-10-02 01:40:01'),
(2275, 5478057, '2017-10-02 02:00:01'),
(2276, 1970281, '2017-10-02 02:20:01'),
(2277, 9562532, '2017-10-02 02:40:01'),
(2278, 9650110, '2017-10-02 03:00:01'),
(2279, 2024638, '2017-10-02 03:20:02'),
(2280, 8469629, '2017-10-02 03:40:01'),
(2281, 8248816, '2017-10-02 04:00:01'),
(2282, 2271349, '2017-10-02 04:20:01'),
(2283, 1481088, '2017-10-02 04:40:01'),
(2284, 3302953, '2017-10-02 05:00:02'),
(2285, 7615615, '2017-10-02 05:20:01'),
(2286, 2815581, '2017-10-02 05:40:01'),
(2287, 3456217, '2017-10-02 06:00:01'),
(2288, 5325001, '2017-10-02 06:20:01'),
(2289, 5603685, '2017-10-02 06:40:01'),
(2290, 3231015, '2017-10-02 07:00:01'),
(2291, 1512845, '2017-10-02 07:20:01'),
(2292, 9354360, '2017-10-02 07:40:01'),
(2293, 9393532, '2017-10-02 08:00:01'),
(2294, 8835542, '2017-10-02 08:20:01'),
(2295, 9772692, '2017-10-02 08:40:02'),
(2296, 4263845, '2017-10-02 09:00:01'),
(2297, 8008274, '2017-10-02 09:20:02'),
(2298, 7991848, '2017-10-02 09:40:01'),
(2299, 4482582, '2017-10-02 10:00:01'),
(2300, 7924057, '2017-10-02 10:20:01'),
(2301, 9516689, '2017-10-02 10:40:01'),
(2302, 4896561, '2017-10-02 11:00:01'),
(2303, 2161639, '2017-10-02 11:20:01'),
(2304, 3898826, '2017-10-02 11:40:02'),
(2305, 6675455, '2017-10-02 12:00:01'),
(2306, 6435829, '2017-10-02 12:20:01'),
(2307, 9409475, '2017-10-02 12:40:01'),
(2308, 3804905, '2017-10-02 13:00:01'),
(2309, 9806161, '2017-10-02 13:20:01'),
(2310, 2396517, '2017-10-02 13:40:01'),
(2311, 6827270, '2017-10-02 14:00:01'),
(2312, 5640816, '2017-10-02 14:20:01'),
(2313, 5350196, '2017-10-02 14:40:02'),
(2314, 1163811, '2017-10-02 15:00:01'),
(2315, 8914704, '2017-10-02 15:20:01'),
(2316, 5568178, '2017-10-02 15:40:01'),
(2317, 9100799, '2017-10-02 16:00:01'),
(2318, 3671879, '2017-10-02 16:20:01'),
(2319, 2470131, '2017-10-02 16:40:01'),
(2320, 6482645, '2017-10-02 17:00:02'),
(2321, 5629577, '2017-10-02 17:20:01'),
(2322, 3561653, '2017-10-02 17:40:01'),
(2323, 3777333, '2017-10-02 18:00:02'),
(2324, 7180994, '2017-10-02 18:20:01'),
(2325, 1841973, '2017-10-02 18:40:01'),
(2326, 9046473, '2017-10-02 19:00:01'),
(2327, 7066790, '2017-10-02 19:20:01'),
(2328, 6418454, '2017-10-02 19:40:01'),
(2329, 9954944, '2017-10-02 20:00:01'),
(2330, 1527830, '2017-10-02 20:20:01'),
(2331, 4534573, '2017-10-02 20:40:01'),
(2332, 2421626, '2017-10-02 21:00:01'),
(2333, 5708131, '2017-10-02 21:20:01'),
(2334, 5550460, '2017-10-02 21:40:01'),
(2335, 8849919, '2017-10-02 22:00:01'),
(2336, 9793565, '2017-10-02 22:20:01'),
(2337, 8367832, '2017-10-02 22:40:01'),
(2338, 8007144, '2017-10-02 23:00:01'),
(2339, 8938654, '2017-10-02 23:20:01'),
(2340, 4570989, '2017-10-02 23:40:01'),
(2341, 1903589, '2017-10-03 00:00:01'),
(2342, 1353376, '2017-10-03 00:20:02'),
(2343, 4926807, '2017-10-03 00:40:01'),
(2344, 7925305, '2017-10-03 01:00:01'),
(2345, 9297690, '2017-10-03 01:20:01'),
(2346, 8018458, '2017-10-03 01:40:01'),
(2347, 1420616, '2017-10-03 02:00:01'),
(2348, 1948071, '2017-10-03 02:20:01'),
(2349, 9112720, '2017-10-03 02:40:01'),
(2350, 6888248, '2017-10-03 03:00:01'),
(2351, 7966823, '2017-10-03 03:20:01'),
(2352, 1576157, '2017-10-03 03:40:01'),
(2353, 5937243, '2017-10-03 04:00:01'),
(2354, 3337671, '2017-10-03 04:20:01'),
(2355, 7005382, '2017-10-03 04:40:02'),
(2356, 4863965, '2017-10-03 05:00:01'),
(2357, 5334682, '2017-10-03 05:20:01'),
(2358, 1113836, '2017-10-03 05:40:01'),
(2359, 6992128, '2017-10-03 06:00:01'),
(2360, 1426620, '2017-10-03 06:20:01'),
(2361, 9774452, '2017-10-03 06:40:01'),
(2362, 4876230, '2017-10-03 07:00:01'),
(2363, 1976736, '2017-10-03 07:20:01'),
(2364, 7411491, '2017-10-03 07:40:01'),
(2365, 7285136, '2017-10-03 08:00:02'),
(2366, 8065557, '2017-10-03 08:20:01'),
(2367, 7139955, '2017-10-03 08:40:01'),
(2368, 1317676, '2017-10-03 09:00:02'),
(2369, 1696357, '2017-10-03 09:20:01'),
(2370, 5950853, '2017-10-03 09:40:01'),
(2371, 4793169, '2017-10-03 10:00:01'),
(2372, 3375044, '2017-10-03 10:20:01'),
(2373, 4024836, '2017-10-03 10:40:01'),
(2374, 1967728, '2017-10-03 11:00:01'),
(2375, 1620081, '2017-10-03 11:20:01'),
(2376, 6669790, '2017-10-03 11:40:01'),
(2377, 7399932, '2017-10-03 12:00:01'),
(2378, 8021763, '2017-10-03 12:20:01'),
(2379, 1741711, '2017-10-03 12:40:01'),
(2380, 3541134, '2017-10-03 13:00:01'),
(2381, 8011808, '2017-10-03 13:20:01'),
(2382, 3329696, '2017-10-03 13:40:01'),
(2383, 2496184, '2017-10-03 14:00:01'),
(2384, 5191162, '2017-10-03 14:20:01'),
(2385, 7528039, '2017-10-03 14:40:01'),
(2386, 3420338, '2017-10-03 15:00:01'),
(2387, 5025397, '2017-10-03 15:20:01'),
(2388, 5842670, '2017-10-03 15:40:01'),
(2389, 4555498, '2017-10-03 16:00:01'),
(2390, 1133198, '2017-10-03 16:20:01'),
(2391, 3231929, '2017-10-03 16:40:01'),
(2392, 9799317, '2017-10-03 17:00:01'),
(2393, 3773297, '2017-10-03 17:20:01'),
(2394, 9844949, '2017-10-03 17:40:01'),
(2395, 2960356, '2017-10-03 18:00:01'),
(2396, 8524490, '2017-10-03 18:20:01'),
(2397, 2733668, '2017-10-03 18:40:01'),
(2398, 2374713, '2017-10-03 19:00:01'),
(2399, 2550062, '2017-10-03 19:20:01'),
(2400, 9054865, '2017-10-03 19:40:01'),
(2401, 7836539, '2017-10-03 20:00:01'),
(2402, 7149337, '2017-10-03 20:20:01'),
(2403, 6015628, '2017-10-03 20:40:01'),
(2404, 1860637, '2017-10-03 21:00:01'),
(2405, 3172627, '2017-10-03 21:20:02'),
(2406, 4332892, '2017-10-03 21:40:01'),
(2407, 5271106, '2017-10-03 22:00:01'),
(2408, 6618829, '2017-10-03 22:20:01'),
(2409, 1764576, '2017-10-03 22:40:01'),
(2410, 3469260, '2017-10-03 23:00:01'),
(2411, 8925492, '2017-10-03 23:20:01'),
(2412, 9015057, '2017-10-03 23:40:01'),
(2413, 5353071, '2017-10-04 00:00:01'),
(2414, 4983857, '2017-10-04 00:20:01'),
(2415, 4187854, '2017-10-04 00:40:01'),
(2416, 4141995, '2017-10-04 01:00:01'),
(2417, 9618192, '2017-10-04 01:20:01'),
(2418, 2463762, '2017-10-04 01:40:01'),
(2419, 4187923, '2017-10-04 02:00:01'),
(2420, 1370422, '2017-10-04 02:20:01'),
(2421, 9967800, '2017-10-04 02:40:01'),
(2422, 9225102, '2017-10-04 03:00:01'),
(2423, 4170850, '2017-10-04 03:20:01'),
(2424, 4920650, '2017-10-04 03:40:01'),
(2425, 8937543, '2017-10-04 04:00:02'),
(2426, 6514147, '2017-10-04 04:20:01'),
(2427, 7069806, '2017-10-04 04:40:01'),
(2428, 5500520, '2017-10-04 05:00:01'),
(2429, 7987836, '2017-10-04 05:20:01'),
(2430, 5383726, '2017-10-04 05:40:01'),
(2431, 7244264, '2017-10-04 06:00:01'),
(2432, 5120816, '2017-10-04 06:20:01'),
(2433, 5840437, '2017-10-04 06:40:01'),
(2434, 9012588, '2017-10-04 07:00:02'),
(2435, 5753146, '2017-10-04 07:20:01'),
(2436, 3838555, '2017-10-04 07:40:01'),
(2437, 8303293, '2017-10-04 08:00:01'),
(2438, 7088436, '2017-10-04 08:20:01'),
(2439, 6863639, '2017-10-04 08:40:01'),
(2440, 1809806, '2017-10-04 09:00:01'),
(2441, 7139258, '2017-10-04 09:20:02'),
(2442, 6885123, '2017-10-04 09:40:01'),
(2443, 5734468, '2017-10-04 10:00:01'),
(2444, 2286042, '2017-10-04 10:20:01'),
(2445, 2492162, '2017-10-04 10:40:01'),
(2446, 2544075, '2017-10-04 11:00:01'),
(2447, 3881315, '2017-10-04 11:20:01'),
(2448, 8142287, '2017-10-04 11:40:01'),
(2449, 4647965, '2017-10-04 12:00:01'),
(2450, 7650859, '2017-10-04 12:20:01'),
(2451, 6784317, '2017-10-04 12:40:01'),
(2452, 4206006, '2017-10-04 13:00:02'),
(2453, 1202151, '2017-10-04 13:20:01'),
(2454, 1595156, '2017-10-04 13:40:01'),
(2455, 3179545, '2017-10-04 14:00:01'),
(2456, 2220202, '2017-10-04 14:20:01'),
(2457, 7549841, '2017-10-04 14:40:01'),
(2458, 3094289, '2017-10-04 15:00:01'),
(2459, 7042414, '2017-10-04 15:20:01'),
(2460, 3798770, '2017-10-04 15:40:02'),
(2461, 6509687, '2017-10-04 16:00:01'),
(2462, 5277114, '2017-10-04 16:20:01'),
(2463, 8594056, '2017-10-04 16:40:01'),
(2464, 6118972, '2017-10-04 17:00:01'),
(2465, 2540816, '2017-10-04 17:20:01'),
(2466, 5299936, '2017-10-04 17:40:01'),
(2467, 9647029, '2017-10-04 18:00:01'),
(2468, 9934083, '2017-10-04 18:20:01'),
(2469, 6552655, '2017-10-04 18:40:01'),
(2470, 6808632, '2017-10-04 19:00:01'),
(2471, 4790332, '2017-10-04 19:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `test_upload`
--

CREATE TABLE `test_upload` (
  `id` int(11) NOT NULL,
  `for_month` date NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `rid` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `audio_url` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `publish_date` datetime NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'DEACTIVE',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test_upload`
--

INSERT INTO `test_upload` (`id`, `for_month`, `title`, `rid`, `audio_url`, `publish_date`, `status`, `created_at`, `updated_at`) VALUES
(3, '2017-01-01', 'ad', '531055541', '20171005124121_20170915100422_1：1万人の1人の逸材になれ.mp3', '2017-01-01 01:00:00', 'DEACTIVE', '2017-10-05 00:41:21', '2017-10-05 00:41:21'),
(4, '2017-01-01', 'asdfasdf', '684338744', '20171005124131_20170915100422_1：1万人の1人の逸材になれ.mp3', '2017-01-01 01:00:00', 'DEACTIVE', '2017-10-05 22:04:41', '2017-10-05 16:04:41'),
(5, '2017-10-01', 'ssssssssa', '180256333', '20171006045848_20170915100422_1：1万人の1人の逸材になれ.mp3', '2019-10-03 01:00:00', 'DEACTIVE', '2017-10-08 22:03:57', '2017-10-08 16:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `nick_name` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `readable_password` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `premium_password` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `premium_amount` float(10,2) NOT NULL,
  `remember_token` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `line_id` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `hobby` text COLLATE utf8_unicode_ci NOT NULL,
  `special_skill` text COLLATE utf8_unicode_ci NOT NULL,
  `gender_type` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `future_dream` text COLLATE utf8_unicode_ci NOT NULL,
  `self_introduction` text COLLATE utf8_unicode_ci NOT NULL,
  `profile_picture` varchar(550) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user4-128x128.jpg',
  `status` varchar(450) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'DEACTIVE',
  `last_login_time` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email_perm` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `line_id_perm` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `dob_year_perm` varchar(450) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `nick_name`, `email`, `readable_password`, `password`, `premium_password`, `premium_amount`, `remember_token`, `line_id`, `dob`, `hobby`, `special_skill`, `gender_type`, `future_dream`, `self_introduction`, `profile_picture`, `status`, `last_login_time`, `created_at`, `updated_at`, `email_perm`, `line_id_perm`, `dob_year_perm`) VALUES
(1, 'Samer', 'Sarker', 'khokon', 'samerseu@gmail.com', 'khokon2015', '$2y$10$4t4tD9C7pGg0RHMff6TOQ.QobcXodQEMujYnn0hSPo/CVw9cE09zm', '1234', 0.00, 'xduWe4OnqR8lY1n3r7ScMJ4mZ5Pabvpcy9F87pkLPJtYRTNjIx5HmXMRUCni', 'samerseu', '1987-11-10', 'hi', 'hi how', 'Female', 'hi man', 'hello', 'user4-128x128.jpg', 'ACTIVE', '0000-00-00 00:00:00', '2017-10-05 23:52:43', '2017-10-05 17:52:43', 'public', 'private', 'private'),
(23, 'masaya', 'kato', 'kato', 'roppongi.katou@gmail.com', 'marlboro1217', '$2y$10$8FlrDy5MgooOJAWSRAWiIO1o7yxf71hvhYLmOMXDUOiLd2BxDTp2C', '', 0.00, '', 'ktmsy1217', '1986-12-17', '読書／写真／映画鑑賞／仮面ライダー', '写真／映像編集', '綺麗なおでこの優しい人', '幸せな家庭を築く\r\n海外を含めた芸術製作活動', '加藤と申します。\r\nクリエイターとして俺たちの秘密基地に参加することを嬉しく、誇りに思います。\r\n製作者としての視点で、人生を豊かにしていくことを目標に\r\n秘密基地の仲間とクリエイティビティを高めていければと思います。\r\nよろしくお願いいたします。', '20171003094904_IMG_1453.JPG', 'ACTIVE', '0000-00-00 00:00:00', '2017-10-03 04:04:08', '2017-10-02 22:04:08', 'private', 'private', 'private'),
(24, '', '', 'かみむら', 'kamimura_sho@yahoo.co.jp', '123231', '$2y$10$QCVi7VmEuc8q3CZV.fw5Qu05LTgiSHacZiuUOV/cu57ulhATZVS8C', '', 0.00, '', '', '1986-08-14', '寝ること。', '寝ること。', '可愛い子。', '世界征服。', 'よろしくお願いします。', '20171001174818_IMG_9910.JPG', 'ACTIVE', '0000-00-00 00:00:00', '2017-10-03 02:02:31', '2017-10-02 20:02:31', 'private', 'private', 'public'),
(25, 'むねつぐ', '村上', 'つぐ', 'munetsugu.murakami@gmail.com', '1234', '$2y$10$rxsg5TuRowEs7ZtSjWmdU.pjCKXeIvpYYAfEfRfk3HuNxi2k6UYA6', '', 0.00, 'VXQOUHWFUnBiKdqUd9gCGYJXyPBR7LdamJpsLPM1xTLCIZtN17GhcSwEP9x8', '', '1978-01-10', '人身売買', '悪徳商法', '毎日性行為が出来る人', 'おくまんちょうじゃ〜', '「最も神に近い男」と呼ばれたい男、村上宗嗣です。\r\n\r\n『俺達の秘密基地』が「世界で一番バカな企画」と言われるように\r\nみんなと一緒にバカになりたいと思っています。\r\n\r\n一緒に楽しみましょう！', '20171002041557_IMG_1076.jpg', 'ACTIVE', '0000-00-00 00:00:00', '2017-10-01 22:16:09', '2017-10-01 16:16:09', 'private', 'private', 'public'),
(26, '圭', '七尾', '', '78graphic@gmail.com', '1234', '$2y$10$MONdjiIROGY.bOYXZM2yluYINaS5WZq7G/N.w4wL0bXDN0ZczOr8S', '', 0.00, '', '', '0000-00-00', 'my hobby', 'special skill test', '', '', '', 'user4-128x128.jpg', 'ACTIVE', '0000-00-00 00:00:00', '2017-09-29 01:51:07', '2017-09-26 00:15:44', 'public', 'public', 'public'),
(27, '俊晴　', '中', '', '06l1145@gmail.com', '1234', '$2y$10$iFj32k8sjyDQPPWZzRHsOOlbvzL8SEOWsHbUdiUPxBw7vJSXIalKC', '', 0.00, '', '', '0000-00-00', 'my hobby', 'special skill test', '', '', '', 'user4-128x128.jpg', 'ACTIVE', '0000-00-00 00:00:00', '2017-09-29 01:51:08', '2017-09-26 00:16:15', 'public', 'public', 'public'),
(28, 'Masaki', 'K', 'マサキ', 'msk.k.power@gmail.com', 'msk8msk', '$2y$10$6p/k2CpJVIsUIVVcIT/XFON57yjffKvldAQjtT1BtFcqr34CE8JBG', 'msk8msk', 0.00, 'iuG2KKJhQNUfnBFuOYHmpHfH87tP7wjt15ruKxRFrvR2YW4WuNRluO9dBCXv', '', '2017-12-16', '世の中のキーワード探し', 'キーワードからの想像力', 'おっさん以外w', '悪魔の実を栽培すること', 'ワクワクドキドキするような毎日を皆さんと一緒に作って、楽しく遊びたいので、よろしくお願いしまーす！', '20170926123619_12345.png', 'ACTIVE', '0000-00-00 00:00:00', '2017-10-05 00:08:47', '2017-10-04 18:08:47', 'private', 'private', 'private'),
(29, '', 'クニー', 'Z', 'surf920@gmail.com', 'hippop920', '$2y$10$u2RP./lKtiNTAMHcL./VkexTtIQRviT3JDsqh8dlscfFHmODjOJ3e', 'hippop920', 0.00, 'tf1POu2jpywNoOglsv0GlW9MqqlFlI1SlSQQGWb43eVXJpII8TOL71IzyZYI', '', '1981-03-21', '自分を進化させること。', 'あなたの時間を増やす、ツールを開発すること。', '好みはコロコロ変わるんですが、ケツがプリッとして、手足が長めの、身長160cm〜166cmの、健康的な食事が好きな、透明感のある女の子が好みです。', 'エコな社会を作ること。', 'こんにちはZです。俺達の秘密基地は今後何度かバージョンアップしていきます。何か追加して欲しい機能があればドシドシご連絡して下さい。', '20170927145447_20170803_141033.jpg', 'ACTIVE', '0000-00-00 00:00:00', '2017-10-05 22:24:27', '2017-10-05 16:24:27', 'private', 'private', 'private');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `sname1` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `sname2` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `fname1` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `fname2` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code1` int(11) NOT NULL,
  `zip_code2` int(11) NOT NULL,
  `prefecture` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `municipality` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `redable_pass` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `sname1`, `sname2`, `fname1`, `fname2`, `email`, `zip_code1`, `zip_code2`, `prefecture`, `municipality`, `password`, `redable_pass`, `address`, `mobile`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(32, 's', 's', 's', 's', 'xsamerseu@gmail.com', 3, 3, '1', '3', '$2y$10$4t4tD9C7pGg0RHMff6TOQ.QobcXodQEMujYnn0hSPo/CVw9cE09zm', '', '3', '3', 'DEACTIVE', 'kOwYcOts06T6s2UfB4VagX8Dmgkx1bavuweMSS76G06DXS1euzJJAoclzCvW', '2017-11-23 08:43:59', '2017-11-27 11:13:36'),
(34, 's', 's', 'd', 'd', 'ssamerseu@gmail.com', 3, 3, '1', '3', '$2y$10$IQU0G9M0kiGLnCy1x0n72eOglXINAYGwWH7Iro3WKrrW0obEZNcBC', 'test', '3\r\n3', '3', 'ACTIVE', 'o15KjRmSs55fFFbcie5Wu1doMJz2x2duQx8w2wYUTHAs77gCIbpBlYv6dIuz', '2017-11-23 08:41:20', '2017-12-13 21:41:05'),
(36, '澤口', '大輔', 'さわぐち', 'だいすけ', 'sa_0316@yahoo.co.jp', 156, 55, '13', '世田谷区船橋', '$2y$10$5nHyjKKbhY/fyas.osUduu42nWL0Hj0agMyh6uq6N8FijdW703vQy', 'sawa316', '4-21-21', '09025228500', 'ACTIVE', 'A4AIUwEe16DoPaOmlSJexk9yO19JI8iC99mEMvI2BtUKo1mulQbPbudLHVWs', '2017-11-23 03:47:16', '2017-12-13 21:42:45'),
(37, 'Kamiyama', 'Taiki', 'カミヤマ', 'タイキ', 'diostaiki@yahoo.co.j', 104, 78, '13', 'Azabu', '$2y$10$vLsOsTRqgO4GGL58bwKFQubqwWdUArIeAyDyVyPeAdWZ6SCSyg1WO', '1234567', '543', '908909887', 'ACTIVE', 'QopddzRznqmTcyqn6zdNqk6QKVkiQkhjOvJv1hBYe4eEoHKalsPFjzAnbj3q', '2017-11-24 10:16:46', '2017-12-13 22:50:30'),
(48, 'rd hawladar', 'hawladar', 'fname1', 'fname2', 'riad.excel@gmail.com', 123, 1234, '1', 'test', '$2y$10$tXez8VNTrHnM6E5VYWWYyeyXmLcxsS0xIp9iPLvcUz1icZfajrYji', '1', 'rdhawladar address', '0002147483647', 'ACTIVE', 'gmnatfwA196hxN6ZEpLbpqJmkDw7u5FcDjpDek4w8f4T0vHSoBExJUl68Lhw', '2017-11-23 13:01:35', '2017-12-13 21:54:05'),
(50, 'k', 'k', 'k', 'k', 'samerseu@gmail.com', 2, 2, '2', 'dfa', '$2y$10$Mit7jma.uqk/newYvdSQSuyhpc23GKHOPXFZGTemr93XDC14yn.pa', '123456', 'fadfa', '232', 'ACTIVE', 'RBvUnomNTaUbMuFf9MGez4SRRif9DQOQ2GmWjSsqUHbSO8QSSE1HfjvlRHGu', '2017-11-23 13:31:35', '2017-11-23 18:31:35'),
(51, 'john', 'Basha', 'ジョン', 'バシャ', 'bashar@excelcobd.com', 12, 7733, '11', 'minami sait', '$2y$10$PE8yr3mgiw0N.J5K5a0wMOfGeW7mfzHknojGh8x/zoZBH4o9Rchi2', '123456', 'kawaguchi 3-3-4', '907736321', 'ACTIVE', 'E0gPe2y9WT6ME07Muc8x61cXlAmdZJuMcfKXdFVvbEtO4ZLiwmiqQijElckv', '2017-11-24 13:49:49', '2017-12-13 21:43:37'),
(54, 'john', 'test', 'ジョーン', 'テスト', 'john4apps27@gmail.com', 345, 5827, '11', 'kita machi', '$2y$10$VfT0I3XYADXCE9sDUqc0lefszQr9v54Gs1I8BHZvekV02X7Izs4Gy', '567890', 'Sky tree 300', '908766334', 'ACTIVE', 'yQaXJn0DHXaPI4j6jTzH7CTVyzgdEXU1VwE2jFQh2LhtALmiS7MwW3iRSKP1', '2017-11-27 11:04:48', '2017-12-11 18:30:39'),
(55, 'riad', 'hawladar', '1', '1', 'rdhawladar@gmail.com', 1, 1, '1', '1', '$2y$10$kESOM77gGqgRWphh0gTFX.xePhbjhPXvZqDnvH.7mIpXwxh14G7YO', '1', '1', '1', 'ACTIVE', '', '2017-11-28 16:44:22', '2017-11-28 16:44:22'),
(57, 'Mainul', 'Hossain', 'マイヌル', 'ホッセイン', 'hell2humpty@gmail.com', 111, 1234, '12', '南埼玉群　宮代町', '$2y$10$T//MafvJpSshid5KqA35XeBRjMQamLqfsgjpRI9MlBDXc0Bfxe4RK', '1234', 'ホンデン２−３−９　吉田荘５０９', '01767613121', 'ACTIVE', '', '2017-12-11 19:17:36', '2017-12-11 19:17:36'),
(58, '藤井', '正行', 'ふじい', 'まさゆき', 'marufuji1911@yahoo.co.jp', 179, 73, '48', '那覇市', '$2y$10$H5p.SXIV6NHh32bjNDebQ.e.POb45eg0e0PKmRa12L.KUqOigzE5i', 'kanikani', '1-1-1', '0359671911', 'ACTIVE', 'KrlzqLYnVlSmoTkGDi4mswGcRm7wAOlw1YIaMwJJudzWMASWPmFqzCxpxadD', '2017-12-12 19:47:52', '2017-12-12 20:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `users_old`
--

CREATE TABLE `users_old` (
  `id` int(11) NOT NULL,
  `first_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `readable_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `premium_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `premium_amount` float(10,2) NOT NULL,
  `country` varchar(450) COLLATE utf8_unicode_ci DEFAULT NULL,
  `present_address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parmanent_address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hobby` varchar(450) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profession` varchar(450) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about_yourself` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(550) COLLATE utf8_unicode_ci DEFAULT 'user4-128x128.jpg',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(400) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'DEACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_old`
--

INSERT INTO `users_old` (`id`, `first_name`, `last_name`, `email`, `readable_password`, `password`, `premium_password`, `premium_amount`, `country`, `present_address`, `parmanent_address`, `phone`, `skype`, `facebook`, `hobby`, `profession`, `about_yourself`, `profile_picture`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ed', 'sys', 'edsys@gmail.com', 'khokon2015', '$2y$10$k38G/Kto95Nqh1Eci.fjdui3ltNRNyOYKEze2nSm.HPrMvZD9onUS', '12345', 200.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', 'edpXi3vkd5KxC2AUWrGac9paEsWa5LIQV0cAJsSUOQfeKpJWmVFfIUzd77e0', 'ACTIVE', '2017-06-12 20:23:53', '2017-07-24 07:13:51'),
(2, 'samer', 'sarker', 'samerseu@gmail.com', 'khokon2015', '$2y$10$8cfkPH9xPubnyLMXieS01Ouz55j.lHKItuCXbocJcETlHdQ66G3A6', '12345', 3000.00, 'Bangladesh', 'Basundhara R/A,Dhaka', 'Rangpur,Bangladesh', '+880+8801719347580', 'khokon_samer_sarker', 'Samer Khokon Sarker', 'Watching Movie,Listening Music', 'Software Development', '', '20170712105555_avatar2.png', 'MrwvtfyiSwyIOLqDpSufmMWsa4BZHf8Luf5Op01M2X6CQeSXZKsYK7Hfu8dE', 'ACTIVE', '2017-06-20 13:17:34', '2017-08-10 01:52:18'),
(5, 'Abul', 'Maal', 'abul_maal@gmail.com', 'abul2017', '$2y$10$U7PRQhCkPspXxIFJwDDLbuatpgoqFJpfJbrgXUj2740z5F9Z45Hx.', '12345', 100.00, 'Bangladesh', 'Dhaka', 'Dhaka', '+880+880+61+61', '', '', NULL, NULL, NULL, '20170712065559_avatar04.png', 'D1hxu2diIgg9Tss6F88yTvdWmZNWNccN08clFfYQcbyfsjVy0wxACnKWcavO', 'ACTIVE', '2017-07-12 08:51:17', '2017-08-04 08:56:02'),
(6, 'basic', 'ali', 'basic_ali@gmail.com', 'basic@2017', '$2y$10$3iq7vayIP3HKIEET.knxge4wY6df3Q6dnHsBeJqBtzIMLA.K9FjI6', '12345', 300.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', 'FJcjKnJK2qnMm6jGaCovYu1aeKrvEr2sbr8GJ8oCCfBZSNmWeHCh0snYoHvv', 'ACTIVE', '2017-07-17 06:01:44', '2017-08-09 09:34:06'),
(7, 'Sbk', 'Mart', 'sbkmart17@gmail.com', '567890', '$2y$10$n8diypCC8QJ8vU8GYIZSEeebXw6rSmEquAib/T7ZA1Xl88p5Jv5ZG', '12345', 100.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', 'qrubQ1bBlgOEWuvaJ9gPZjgt8CGSk3Ar0eqKQIDedqjWIlrALlvXITX104WZ', 'ACTIVE', '2017-07-21 12:57:21', '2017-07-27 08:52:52'),
(8, 'shiblu', 'bhai', 'shiblu@gmail.com', '1234', '$2y$10$1QpBEhjpJyKDkHzoS6l7eOfat/6P213Q5YUQHWGq8dW9bgWYItYqO', '12345', 1000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', 'VHfzi6EC2zisAt9cDfQXnZ6Vw52QvowRJtSuoHFAszCK9vc0Hn9luSfgeltM', 'ACTIVE', '2017-07-24 14:22:51', '2017-08-01 05:26:22'),
(9, 'faruk', 'bhai', 'faruk@gmail.com', '1234', '$2y$10$FrJNsi8mve.QiciLTTGfmuzJugt0CIpIfOUw.bHq4urW9sRuMRTQ.', '12345', 500.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20170810035131_logoh.png', 'iDe5fsxavgxGSJmeNqlsPX7bfqVim7o6XEscbp8eVPJX7P7RNvi6pkixydJr', 'ACTIVE', '2017-07-24 14:23:31', '2017-08-10 02:17:47'),
(10, 'rakib', 'mia', 'rakib@gmail.com', '1234', '$2y$10$BDOJkriQo8dItp6ZiO5G/.wv.x9QDZafCvsaZUu5DCAulbH/VM/9G', '12345', 300.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', 'XYDXC1Q19PHbUc3NBH2e6qf8tgb7D1T4my0pM8LOWFfB1V1AZMUJG1FuwTZR', 'ACTIVE', '2017-07-24 14:23:57', '2017-08-04 08:46:22'),
(11, 'mokha', 'alamgir', 'mokha@gmail.com', 'mokha@2017', '$2y$10$mvEycc00vItuzJjcXtMc5eYpxtBaJxm/Lfg4lGMMv/s3ewExFROAy', '12345', 1000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', 'h7RbYWoouPCN0XRnRyUEUTVwRnuc0EEETyhAM3XvnxJg7RxGlHsW5GFljP5o', 'ACTIVE', '2017-07-27 12:35:30', '2017-08-03 04:39:45'),
(12, 'sasaki', '1', 'bitcoinab-1@yahoo.co.jp', '1234', '$2y$10$KvibwSmIaSnkaCsATRLqzesr.UQNPxfqQ.W295gkTKXjje2KRhLGG', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20170808074718_akira_jiko.jpg', NULL, 'ACTIVE', '2017-08-07 06:33:46', '2017-08-08 05:47:18'),
(13, 'sasaki', '2', 'bitcoinab-2@yahoo.co.jp', '1234', '$2y$10$gbB5VUxyn7K/rLpQo5IOeuVMwfbz9jQ/BquvIVYpY8FZb8odjLcQC', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', NULL, 'ACTIVE', '2017-08-07 06:34:13', '2017-08-07 06:34:13'),
(14, 'sasaki', '3', 'bitcoinab-3@yahoo.co.jp', '1234', '$2y$10$hKy9jm8MYPqdetBhg2GVq.ZJ6L0MJaht7RnsvbOuaUFMfApjX1ewa', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', NULL, 'ACTIVE', '2017-08-07 06:35:09', '2017-08-07 06:35:09'),
(15, 'sasaki', '4', 'bitcoinab-4@yahoo.co.jp', '1234', '$2y$10$mft7TYD8fal7jF52f5Wld.jB7JddeksOjzzU4oFsQBaL1lPRIuQnK', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', NULL, 'ACTIVE', '2017-08-07 06:35:26', '2017-08-07 06:35:26'),
(16, 'sasaki', '5', 'bitcoinab-5@yahoo.co.jp', '1234', '$2y$10$vPGifGSdhljSDFPCVc52nODBpImW.fEOciF0IzUo5tUR6erJlj3Mu', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', NULL, 'ACTIVE', '2017-08-07 06:35:46', '2017-08-07 06:35:46'),
(17, 'sasaki', '6', 'bitcoinab-6@yahoo.co.jp', '1234', '$2y$10$XBkVrEmzWAUazTgUBrX3f.hVBiMPnMzI5KMx63VmHvHlm/8M8RaUy', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', '2PwaZm64pMjMdxXtOitnZziZt3C4l1CL79KxYYZEIK4oGmwi4NukUvoFa0l6', 'ACTIVE', '2017-08-07 06:36:05', '2017-08-08 03:27:18'),
(18, 'sasaki', '7', 'bitcoinab-7@yahoo.co.jp', '1234', '$2y$10$XDhhd1lzSeEkm3HTSMysZeW5Dgbsyd/pENbfGVT61vwAvheI9xkdy', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', NULL, 'ACTIVE', '2017-08-07 06:36:25', '2017-08-07 06:36:25'),
(19, 'sasaki', '8', 'bitcoinab-8@yahoo.co.jp', '1234', '$2y$10$5a27PqDEEgjB6qrJofedBe3EwETK.tVqpS6QjhdeuSSzH36OzQz.C', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20170807091031_オダナンバ160800.png', NULL, 'ACTIVE', '2017-08-07 06:36:42', '2017-08-07 07:10:34'),
(20, 'sasaki', '9', 'bitcoinab-9@yahoo.co.jp', '1234', '$2y$10$Zh8j52eqQJ6q4vJNdBVi7ebFVHX8d1HJ/EjRoAJGz/HpJMzXL5IsK', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', NULL, 'ACTIVE', '2017-08-07 06:37:12', '2017-08-07 06:37:12'),
(21, 'sasaki', '10', 'bitcoinab-10@yahoo.co.jp', '1234', '$2y$10$U1VqFK/BvIh9dHOQZB/oeeTCGrpT6/85lRsX6IRGe7PrHVUe22yq6', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', 'g5D5PJJPFPv5y3iHxrKvhhdBqiWMXB0698LjcSbwTNKmy3ky2KKrXCaqs7l7', 'ACTIVE', '2017-08-07 06:37:30', '2017-08-07 07:28:02'),
(22, 'habijabi', 'hasan', 'habijabi@gmail.com', 'habijabi@2015', '$2y$10$EBLkECS5zPadLp.FFaPM5O5b.c2Re7dgUQNulr5Fgx9DeCJSJQKCC', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user4-128x128.jpg', 'bRxGxPbb6sLoD4HcDrzZ4tRmB2o36W4Cz4Ay6ykJBSSieEfh5aNMuLzvbMDd', 'ACTIVE', '2017-08-07 06:53:34', '2017-08-07 06:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_point_distribution`
--

CREATE TABLE `user_point_distribution` (
  `id` int(11) NOT NULL,
  `content_page` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `gpoint` float(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_point_distribution`
--

INSERT INTO `user_point_distribution` (`id`, `content_page`, `gpoint`, `created_at`, `updated_at`) VALUES
(1, 'news_events', 2.00, '2017-08-04 04:27:45', '2017-08-04 04:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `videos_info`
--

CREATE TABLE `videos_info` (
  `id` int(11) NOT NULL,
  `content_page` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` int(11) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `title` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vdo_id` varchar(450) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos_info`
--

INSERT INTO `videos_info` (`id`, `content_page`, `reference`, `owner`, `title`, `vdo_id`, `created_at`, `updated_at`) VALUES
(5, 'bitcoin_related_lecture', 7, 5, 'ビットコインせどり(アービトラージ)全体像', '229945594', '2017-08-17 02:06:45', '2017-08-17 06:06:45'),
(6, 'bitcoin_related_lecture', 6, 7, '1-1.bitflyerアカウント開設方法(本人確認)', '229945698', '2017-08-17 02:07:24', '2017-08-17 06:07:24'),
(17, 'bitcoin_related_lecture', 12, 1, '1-2.coincheckアカウント開設方法(本人確認)', '229945979', '2017-08-17 02:07:55', '2017-08-17 06:07:55'),
(44, 'bitcoin_related_lecture', 0, 0, '1-3.quoinexアカウント開設方法(本人確認)', '229963026', '2017-08-17 06:08:25', '2017-08-17 06:08:25'),
(45, 'bitcoin_related_lecture', 0, 0, '1-4.zaifアカウント開設方法(本人確認)', '229963126', '2017-08-17 06:09:05', '2017-08-17 06:09:05'),
(68, 'bitcoin_related_lecture', 0, 0, '1-5 btcboxアカウント開設方法本人確認', '233594398', '2017-09-14 17:32:42', '2017-09-14 17:32:42'),
(69, 'bitcoin_related_lecture', 0, 0, '2-1.bitflyer操作方法(入出金など)', '229963349', '2017-09-14 17:33:16', '2017-09-14 17:33:16'),
(70, 'bitcoin_related_lecture', 0, 0, '2-2.coincheck操作方法(入出金など)', '229963617', '2017-09-14 17:33:46', '2017-09-14 17:33:46'),
(71, 'bitcoin_related_lecture', 0, 0, '2-3.quoinex操作方法(入出金など)', '229963756', '2017-09-14 17:34:13', '2017-09-14 17:34:13'),
(72, 'bitcoin_related_lecture', 0, 0, '2-4.zaif操作方法(入出金など)', '229964820', '2017-09-14 17:34:40', '2017-09-14 17:34:40'),
(73, 'bitcoin_related_lecture', 0, 0, '2-5 btcbox操作方法入出金など', '233594459', '2017-09-14 17:35:13', '2017-09-14 17:35:13'),
(74, 'bitcoin_related_lecture', 0, 0, '3-1.ビットコインの送受信方法', '229965104', '2017-09-14 17:35:41', '2017-09-14 17:35:41'),
(75, 'bitcoin_related_lecture', 0, 0, '3-2.ビットコインの売り板と買い板の確認方法', '229965165', '2017-09-14 17:36:05', '2017-09-14 17:36:05'),
(76, 'bitcoin_related_lecture', 0, 0, '4-1.アービトラージの初め方', '229965351', '2017-09-14 17:36:33', '2017-09-14 17:36:33'),
(77, 'bitcoin_related_lecture', 0, 0, '4-2.アービトラージの取引方法', '229965473', '2017-09-14 17:36:58', '2017-09-14 17:36:58'),
(78, 'bitcoin_related_lecture', 0, 0, '4-3.アービトラージの最終確認', '229965612', '2017-09-14 17:37:22', '2017-09-14 17:37:22'),
(79, 'bitcoin_related_lecture', 0, 0, '4-4 アービトラージ高額取り引き方法', '229965685', '2017-09-14 17:37:43', '2017-09-14 17:37:43'),
(80, 'bitcoin_related_lecture', 0, 0, '4-5 複利運用とボーナス取引', '229965931', '2017-09-14 17:38:06', '2017-09-14 17:38:06'),
(81, 'bitcoin_related_lecture', 0, 0, '5-0 アルトコインせどり進み方', '229966148', '2017-09-14 17:38:32', '2017-09-14 17:38:32'),
(82, 'bitcoin_related_lecture', 0, 0, '5-1 Bittrexアカウント登録方法', '229966225', '2017-09-14 17:38:56', '2017-09-14 17:38:56'),
(83, 'bitcoin_related_lecture', 0, 0, '5-2 Bittrex操作方法', '229966301', '2017-09-14 17:39:18', '2017-09-14 17:39:18'),
(84, 'bitcoin_related_lecture', 0, 0, '5-3 アルトコインせどり準備編', '229966418', '2017-09-14 17:39:40', '2017-09-14 17:39:40'),
(85, 'bitcoin_related_lecture', 0, 0, '5-4 アルトコインせどり実践編', '229966551', '2017-09-14 17:40:03', '2017-09-14 17:40:03'),
(86, 'mobile_application', 0, 0, 'そこそこの達人１', '229966745', '2017-09-14 17:40:26', '2017-09-14 17:40:26'),
(87, 'bitcoin_related_lecture', 0, 0, 'ブロックチェーン講義１asdfggh', '232270770', '2017-10-04 06:28:37', '2017-10-04 00:28:37'),
(88, 'membership_power', 1, 1, 'tets', '364682', '2017-09-15 04:01:59', '0000-00-00 00:00:00'),
(89, 'majime_terrorist', 1, 1, 'teste', '32434', '2017-09-15 04:06:24', '0000-00-00 00:00:00'),
(90, 'bitcoin_related_lecture', 0, 0, 'aaaaaaa', '11112222', '2017-10-04 00:37:32', '2017-10-04 00:37:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audios_info`
--
ALTER TABLE `audios_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_detail`
--
ALTER TABLE `content_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_table`
--
ALTER TABLE `event_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `for_month`
--
ALTER TABLE `for_month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsfeed`
--
ALTER TABLE `newsfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_feed`
--
ALTER TABLE `news_feed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_poll`
--
ALTER TABLE `news_poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_date_range`
--
ALTER TABLE `order_date_range`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_page`
--
ALTER TABLE `other_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefectures`
--
ALTER TABLE `prefectures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_order`
--
ALTER TABLE `pro_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_answer_requests`
--
ALTER TABLE `question_answer_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_image`
--
ALTER TABLE `slider_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_catagory`
--
ALTER TABLE `sub_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_cron`
--
ALTER TABLE `test_cron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_upload`
--
ALTER TABLE `test_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_old`
--
ALTER TABLE `users_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_point_distribution`
--
ALTER TABLE `user_point_distribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos_info`
--
ALTER TABLE `videos_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audios_info`
--
ALTER TABLE `audios_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `content_detail`
--
ALTER TABLE `content_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `control`
--
ALTER TABLE `control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;
--
-- AUTO_INCREMENT for table `event_table`
--
ALTER TABLE `event_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `for_month`
--
ALTER TABLE `for_month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `news_feed`
--
ALTER TABLE `news_feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `news_poll`
--
ALTER TABLE `news_poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `order_date_range`
--
ALTER TABLE `order_date_range`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `other_page`
--
ALTER TABLE `other_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `prefectures`
--
ALTER TABLE `prefectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `pro_order`
--
ALTER TABLE `pro_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `question_answer_requests`
--
ALTER TABLE `question_answer_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slider_image`
--
ALTER TABLE `slider_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `sub_catagory`
--
ALTER TABLE `sub_catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `test_cron`
--
ALTER TABLE `test_cron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2472;
--
-- AUTO_INCREMENT for table `test_upload`
--
ALTER TABLE `test_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `users_old`
--
ALTER TABLE `users_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user_point_distribution`
--
ALTER TABLE `user_point_distribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `videos_info`
--
ALTER TABLE `videos_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
