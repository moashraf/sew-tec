-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2016 at 03:27 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zztestzz`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
`ac_id` int(11) NOT NULL,
  `ac_name` varchar(255) DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL,
  `ac_type` varchar(45) DEFAULT NULL,
  `ac_status` varchar(45) DEFAULT NULL,
  `ac_rate` varchar(45) DEFAULT NULL,
  `time_t_id` int(11) NOT NULL,
  `semester` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `cat_time` varchar(100) DEFAULT NULL,
  `profit_pr_id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `coust` varchar(45) DEFAULT NULL,
  `link` text,
  `view1` varchar(50) DEFAULT NULL,
  `view2` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `notes` text,
  `hidden` int(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `actions_has_d_goal`
--

CREATE TABLE IF NOT EXISTS `actions_has_d_goal` (
  `actions_ac_id` int(11) NOT NULL,
  `d_goal_dg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `actions_has_requirement`
--

CREATE TABLE IF NOT EXISTS `actions_has_requirement` (
  `actions_ac_id` int(11) NOT NULL,
  `requirement_re_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `actions_has_responsible`
--

CREATE TABLE IF NOT EXISTS `actions_has_responsible` (
  `actions_ac_id` int(11) NOT NULL,
  `responsible_rs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `actions_has_responsible1`
--

CREATE TABLE IF NOT EXISTS `actions_has_responsible1` (
  `actions_ac_id` int(11) NOT NULL,
  `responsible_rs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `actions_has_support`
--

CREATE TABLE IF NOT EXISTS `actions_has_support` (
  `actions_ac_id` int(11) NOT NULL,
  `support_su_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin_count`
--

CREATE TABLE IF NOT EXISTS `admin_count` (
`ca_id` int(11) NOT NULL,
  `ca_name` varchar(45) DEFAULT NULL,
  `ca_num` varchar(45) DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
`an_id` int(11) NOT NULL,
  `an_name` varchar(45) DEFAULT NULL,
  `an_h_date` varchar(45) DEFAULT NULL,
  `an_m_date` date DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE IF NOT EXISTS `backup` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `buliding_count`
--

CREATE TABLE IF NOT EXISTS `buliding_count` (
`bu_id` int(11) NOT NULL,
  `bu_elm` varchar(45) DEFAULT NULL,
  `bu_status` varchar(45) DEFAULT NULL,
  `bu_num` int(11) DEFAULT NULL,
  `bu_notes` text,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category_time`
--

CREATE TABLE IF NOT EXISTS `category_time` (
`ct_id` int(11) NOT NULL,
  `ct_name` varchar(45) DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `class_count`
--

CREATE TABLE IF NOT EXISTS `class_count` (
`cc_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `class_num` int(11) DEFAULT NULL,
  `ksa_students_num` int(11) DEFAULT NULL,
  `other_students_num` int(11) DEFAULT NULL,
  `all_students_num` int(11) DEFAULT NULL,
  `special_class_num` int(11) DEFAULT NULL,
  `special_studentes_num` int(11) DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
`d_id` int(11) NOT NULL,
  `d_elm` varchar(255) DEFAULT NULL,
  `d_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `schools_sch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `d_goal`
--

CREATE TABLE IF NOT EXISTS `d_goal` (
`dg_id` int(11) NOT NULL,
  `dg_name` varchar(255) DEFAULT NULL,
  `dg_cursor` varchar(45) DEFAULT NULL,
  `g_goal_g_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`ev_id` int(11) NOT NULL,
  `ev_name` varchar(255) DEFAULT NULL,
  `ev_start` date DEFAULT NULL,
  `ev_end` date DEFAULT NULL,
  `suport` varchar(45) DEFAULT NULL,
  `ev_status` varchar(45) DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events_has_responsible`
--

CREATE TABLE IF NOT EXISTS `events_has_responsible` (
  `events_ev_id` int(11) NOT NULL,
  `responsible_rs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events_has_responsible1`
--

CREATE TABLE IF NOT EXISTS `events_has_responsible1` (
  `events_ev_id` int(11) NOT NULL,
  `responsible_rs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE IF NOT EXISTS `fields` (
`f_id` int(11) NOT NULL,
  `f_name` varchar(45) DEFAULT NULL,
  `f_order` int(11) DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `g_goal`
--

CREATE TABLE IF NOT EXISTS `g_goal` (
`g_id` int(11) NOT NULL,
  `g_name` varchar(255) DEFAULT NULL,
  `fields_f_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leaders_team`
--

CREATE TABLE IF NOT EXISTS `leaders_team` (
`l_id` int(11) NOT NULL,
  `l_name` varchar(45) DEFAULT NULL,
  `l_order` int(11) DEFAULT NULL,
  `l_kind_work` varchar(100) DEFAULT NULL,
  `l_start_ser` date DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `last_qualified` varchar(45) DEFAULT NULL,
  `last_qualified_d` date DEFAULT NULL,
  `spec` varchar(45) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  `class` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `years_teacher` int(11) DEFAULT NULL,
  `years_agent` int(11) DEFAULT NULL,
  `years_dir` int(11) DEFAULT NULL,
  `years_other` int(11) DEFAULT NULL,
  `years_total` int(11) DEFAULT NULL,
  `director_date` date DEFAULT NULL,
  `course_date` date DEFAULT NULL,
  `school_start` date DEFAULT NULL,
  `address` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) CHARACTER SET utf8 NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE IF NOT EXISTS `periods` (
`pe_id` int(11) NOT NULL,
  `pe_name` varchar(100) DEFAULT NULL,
  `pe_from` date DEFAULT NULL,
  `pe_to` date DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
`p_id` int(11) NOT NULL,
  `p_order` int(11) DEFAULT NULL,
  `p_m_year` year(4) DEFAULT NULL,
  `p_h_year` varchar(45) DEFAULT NULL,
  `d_from` date DEFAULT NULL,
  `d_to` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `schools_sch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plan_team`
--

CREATE TABLE IF NOT EXISTS `plan_team` (
`pl_id` int(11) NOT NULL,
  `pl_name` varchar(45) DEFAULT NULL,
  `pl_jop` varchar(45) DEFAULT NULL,
  `comm_work` varchar(45) DEFAULT NULL,
  `comm_role` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profit`
--

CREATE TABLE IF NOT EXISTS `profit` (
`pr_id` int(11) NOT NULL,
  `pr_name` varchar(100) DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `range`
--

CREATE TABLE IF NOT EXISTS `range` (
`r_id` int(11) NOT NULL,
  `r_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `requirement`
--

CREATE TABLE IF NOT EXISTS `requirement` (
`re_id` int(11) NOT NULL,
  `re_name` varchar(100) DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `responsible`
--

CREATE TABLE IF NOT EXISTS `responsible` (
`rs_id` int(11) NOT NULL,
  `rs_name` varchar(45) DEFAULT NULL,
  `rs_order` int(45) DEFAULT NULL,
  `rs_email` varchar(100) DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
`sch_id` int(11) NOT NULL,
  `sch_name` varchar(45) DEFAULT NULL,
  `sch_phone` varchar(45) DEFAULT NULL,
  `sch_email` varchar(45) DEFAULT NULL,
  `sch_status` varchar(45) DEFAULT NULL,
  `system_logo` varchar(255) DEFAULT NULL,
  `reports_logo` varchar(255) DEFAULT NULL,
  `cover_logo` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `zoom` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`sch_id`, `sch_name`, `sch_phone`, `sch_email`, `sch_status`, `system_logo`, `reports_logo`, `cover_logo`, `lat`, `long`, `zoom`, `created_at`, `updated_at`) VALUES
(8, 'replace_name', '0556686866', 'replace_email', 'مفعل', 'avatar-3.jpg', 'avatar-3.jpg', 'avatar-3.jpg', '24.01220110675591', '38.192906379990745', 17, '2016-10-05 10:08:53', '2016-11-05 21:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8,
  `payload` text CHARACTER SET utf8 NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0466437f98c673ae9e9ebe64b2224e0eff53330e', 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', 'YTo4OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cDovL2xvY2FsaG9zdC9maW5hbC9pbnN0YXR1dGlvbiI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IlhZYWM5VEVqRnNmRW52dmJRZ0Z4Wk1EUkJqZFI4UGp3Q3ZzTGNJMmQiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7czo5OiJwbGFuX25hbWUiO3M6Mzc6IiDZhdmK2YTYp9iv2Yo6IDIwMTcgfCAg2YfYrNix2Yo6IDE0MzgiO3M6NzoicGxhbl9pZCI7aToxNTtzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjIyOiJodHRwOi8vbG9jYWxob3N0L2ZpbmFsIjt9czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NzkxMjkyNTA7czoxOiJjIjtpOjE0NzkxMjcyMzg7czoxOiJsIjtzOjE6IjAiO319', 1479129250),
('08a3b090e3a90d364986c5db0d2011166455045f', 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiOElGc2FZRXdyWGpDR2RUNXJDVVNzYXdTcmx5Q09lVmUyUXg5R2tEbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly9sb2NhbGhvc3QvZmluYWwvaW5zdGF0dXRpb24vcmVwb3J0cy9yZXNwb25zaWJsZXJlcG9ydCI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjk6InBsYW5fbmFtZSI7czozNzoiINmF2YrZhNin2K/ZijogMjAxNyB8ICDZh9is2LHZijogMTQzOCI7czo3OiJwbGFuX2lkIjtpOjE1O3M6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDc4OTYwNjY2O3M6MToiYyI7aToxNDc4OTU4NzIwO3M6MToibCI7czoxOiIwIjt9fQ==', 1478960666),
('1113d01e912dcaeff57fbcdf9813ddf9b6e4cf46', 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', 'YToxOntzOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1479133190),
('4805f2ee6c6921a7b90e6d2895afb313766d0bce', 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiaDhuOTdQT3dKWWRsRjVhbGV6QTlTaG1oM2ZxR2VtbUh0NVRTV3FSYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3QvZmluYWwvaW5zdGF0dXRpb24iO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7czo5OiJwbGFuX25hbWUiO3M6Mzc6IiDZhdmK2YTYp9iv2Yo6IDIwMTcgfCAg2YfYrNix2Yo6IDE0MzgiO3M6NzoicGxhbl9pZCI7aToxNTtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ3ODc4OTA3MDtzOjE6ImMiO2k6MTQ3ODc3MzcyMztzOjE6ImwiO3M6MToiMCI7fX0=', 1478789071),
('8bd6a085217c94a6b9cfa925b53a5d6d57af944c', 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', 'YToxOntzOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1479133196),
('8daf86537fce8d2cecc751496d2a3d6811c5ee65', 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', 'YToxOntzOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1479133201),
('9b3882dce99ac0c16810ce6043eaf7db15fdf56f', 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiWndOd2dlenRKWllUM21wNVZ1MzNNdmJybHZleldkdnpNSkRra1pQSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3QvZmluYWwvaW5zdGF0dXRpb24iO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7czo5OiJwbGFuX25hbWUiO3M6Mzc6IiDZhdmK2YTYp9iv2Yo6IDIwMTcgfCAg2YfYrNix2Yo6IDE0MzgiO3M6NzoicGxhbl9pZCI7aToxNTtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ3ODk0NzAyOTtzOjE6ImMiO2k6MTQ3ODk0NjkzMDtzOjE6ImwiO3M6MToiMCI7fX0=', 1478947030),
('f73f4c306ebe7db307e9ca08668f7dc95a1bf925', 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoieXU1UW9LajkyZ0psZUI1NHJUc2F3amd4Qkp4WTJINUZ5TGg4YTNLTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3QvZmluYWwvaW5zdGF0dXRpb24vYWRkc2Nob29sIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6OToicGxhbl9uYW1lIjtzOjM3OiIg2YXZitmE2KfYr9mKOiAyMDE3IHwgINmH2KzYsdmKOiAxNDM4IjtzOjc6InBsYW5faWQiO2k6MTU7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NzkwNDA3MTI7czoxOiJjIjtpOjE0NzkwNDA2NjU7czoxOiJsIjtzOjE6IjAiO319', 1479040712);

-- --------------------------------------------------------

--
-- Table structure for table `subject_plan`
--

CREATE TABLE IF NOT EXISTS `subject_plan` (
`sp_id` int(11) NOT NULL,
  `sub_name` varchar(45) DEFAULT NULL,
  `spec` varchar(45) DEFAULT NULL,
  `class_sub_num` int(11) DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
`su_id` int(11) NOT NULL,
  `su_name` varchar(45) DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `swot_elm`
--

CREATE TABLE IF NOT EXISTS `swot_elm` (
`se_id` int(11) NOT NULL,
  `elm_name` varchar(100) DEFAULT NULL,
  `point_type` varchar(45) DEFAULT NULL,
  `fields_f_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `swot_strategy`
--

CREATE TABLE IF NOT EXISTS `swot_strategy` (
`sg_id` int(11) NOT NULL,
  `sg_order` int(11) DEFAULT NULL,
  `sg_point` int(100) DEFAULT NULL,
  `what_can` text,
  `plans_p_id` int(11) NOT NULL,
  `first` varchar(255) DEFAULT NULL,
  `second` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_count`
--

CREATE TABLE IF NOT EXISTS `tec_count` (
`tc_id` int(11) NOT NULL,
  `tc_name` varchar(45) DEFAULT NULL,
  `tc_num` varchar(45) DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
`t_id` int(11) NOT NULL,
  `t_name` varchar(45) DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `time_day`
--

CREATE TABLE IF NOT EXISTS `time_day` (
`tm_id` int(11) NOT NULL,
  `start_morning` varchar(45) DEFAULT NULL,
  `end_morning` varchar(45) DEFAULT NULL,
  `notes_morning` varchar(45) DEFAULT NULL,
  `start_1` varchar(45) DEFAULT NULL,
  `end_1` varchar(45) DEFAULT NULL,
  `notes_1` varchar(45) DEFAULT NULL,
  `start_2` varchar(45) DEFAULT NULL,
  `end_2` varchar(45) DEFAULT NULL,
  `notes_2` varchar(45) DEFAULT NULL,
  `start_3` varchar(45) DEFAULT NULL,
  `end_3` varchar(45) DEFAULT NULL,
  `notes_3` varchar(45) DEFAULT NULL,
  `start_4` varchar(45) DEFAULT NULL,
  `end_4` varchar(45) DEFAULT NULL,
  `notes_4` varchar(45) DEFAULT NULL,
  `start_5` varchar(45) DEFAULT NULL,
  `end_5` varchar(45) DEFAULT NULL,
  `notes_5` varchar(45) DEFAULT NULL,
  `start_6` varchar(45) DEFAULT NULL,
  `end_6` varchar(45) DEFAULT NULL,
  `notes_6` varchar(45) DEFAULT NULL,
  `start_7` varchar(45) DEFAULT NULL,
  `end_7` varchar(45) DEFAULT NULL,
  `notes_7` varchar(45) DEFAULT NULL,
  `start_8` varchar(45) DEFAULT NULL,
  `end_8` varchar(45) DEFAULT NULL,
  `notes_8` varchar(45) DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `operations` int(11) DEFAULT NULL,
  `maindata` int(11) DEFAULT NULL,
  `strategy` int(11) DEFAULT NULL,
  `swat` int(11) DEFAULT NULL,
  `plansetting` int(11) DEFAULT NULL,
  `systemsetting` int(11) DEFAULT NULL,
  `reports` int(11) DEFAULT NULL,
  `schools_sch_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `phone`, `type`, `status`, `logo`, `remember_token`, `created_at`, `updated_at`, `operations`, `maindata`, `strategy`, `swat`, `plansetting`, `systemsetting`, `reports`, `schools_sch_id`) VALUES
(4, 'replace_username', 'replace_email', 'replace_password', '0556686866', 'admin', NULL, 'avatar-3.jpg', 'xgdAhd2k5rkJjWH3Ka5TeodSxdg7Xb5520WmsbxlvmxRmGuWDheZ5cLocgkm', '2016-10-05 10:08:54', '2016-11-15 08:11:31', 1, 1, 1, 1, 1, 1, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `values`
--

CREATE TABLE IF NOT EXISTS `values` (
`vl_id` int(11) NOT NULL,
  `vl_name` varchar(100) DEFAULT NULL,
  `vl_value` text,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vms`
--

CREATE TABLE IF NOT EXISTS `vms` (
`vm_id` int(11) NOT NULL,
  `vission` text,
  `mession` text,
  `slogan` text,
  `start` text,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_team`
--

CREATE TABLE IF NOT EXISTS `work_team` (
`w_id` int(11) NOT NULL,
  `w_name` varchar(45) DEFAULT NULL,
  `w_spec` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `plans_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
 ADD PRIMARY KEY (`ac_id`), ADD KEY `fk_actions_plans1_idx` (`plans_p_id`), ADD KEY `fk_actions_time1_idx` (`time_t_id`), ADD KEY `fk_actions_profit1_idx` (`profit_pr_id`);

--
-- Indexes for table `actions_has_d_goal`
--
ALTER TABLE `actions_has_d_goal`
 ADD PRIMARY KEY (`actions_ac_id`,`d_goal_dg_id`), ADD KEY `fk_actions_has_d_goal_d_goal1_idx` (`d_goal_dg_id`), ADD KEY `fk_actions_has_d_goal_actions1_idx` (`actions_ac_id`);

--
-- Indexes for table `actions_has_requirement`
--
ALTER TABLE `actions_has_requirement`
 ADD PRIMARY KEY (`actions_ac_id`,`requirement_re_id`), ADD KEY `fk_actions_has_requirement_requirement1_idx` (`requirement_re_id`), ADD KEY `fk_actions_has_requirement_actions1_idx` (`actions_ac_id`);

--
-- Indexes for table `actions_has_responsible`
--
ALTER TABLE `actions_has_responsible`
 ADD PRIMARY KEY (`actions_ac_id`,`responsible_rs_id`), ADD KEY `fk_actions_has_responsible_responsible1_idx` (`responsible_rs_id`), ADD KEY `fk_actions_has_responsible_actions1_idx` (`actions_ac_id`);

--
-- Indexes for table `actions_has_responsible1`
--
ALTER TABLE `actions_has_responsible1`
 ADD PRIMARY KEY (`actions_ac_id`,`responsible_rs_id`), ADD KEY `fk_actions_has_responsible1_responsible1_idx` (`responsible_rs_id`), ADD KEY `fk_actions_has_responsible1_actions1_idx` (`actions_ac_id`);

--
-- Indexes for table `actions_has_support`
--
ALTER TABLE `actions_has_support`
 ADD PRIMARY KEY (`actions_ac_id`,`support_su_id`), ADD KEY `fk_actions_has_support_support1_idx` (`support_su_id`), ADD KEY `fk_actions_has_support_actions1_idx` (`actions_ac_id`);

--
-- Indexes for table `admin_count`
--
ALTER TABLE `admin_count`
 ADD PRIMARY KEY (`ca_id`), ADD KEY `fk_count_admin_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
 ADD PRIMARY KEY (`an_id`), ADD KEY `fk_announcement_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `backup`
--
ALTER TABLE `backup`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buliding_count`
--
ALTER TABLE `buliding_count`
 ADD PRIMARY KEY (`bu_id`), ADD KEY `fk_buliding_count_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `category_time`
--
ALTER TABLE `category_time`
 ADD PRIMARY KEY (`ct_id`), ADD KEY `fk_category_time_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `class_count`
--
ALTER TABLE `class_count`
 ADD PRIMARY KEY (`cc_id`), ADD KEY `fk_class_count_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
 ADD PRIMARY KEY (`d_id`), ADD KEY `fk_data_schools1_idx` (`schools_sch_id`);

--
-- Indexes for table `d_goal`
--
ALTER TABLE `d_goal`
 ADD PRIMARY KEY (`dg_id`), ADD KEY `fk_d_goal_g_goal1_idx` (`g_goal_g_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`ev_id`), ADD KEY `fk_events_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `events_has_responsible`
--
ALTER TABLE `events_has_responsible`
 ADD PRIMARY KEY (`events_ev_id`,`responsible_rs_id`), ADD KEY `fk_events_has_responsible_responsible1_idx` (`responsible_rs_id`), ADD KEY `fk_events_has_responsible_events1_idx` (`events_ev_id`);

--
-- Indexes for table `events_has_responsible1`
--
ALTER TABLE `events_has_responsible1`
 ADD PRIMARY KEY (`events_ev_id`,`responsible_rs_id`), ADD KEY `fk_events_has_responsible1_responsible1_idx` (`responsible_rs_id`), ADD KEY `fk_events_has_responsible1_events1_idx` (`events_ev_id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
 ADD PRIMARY KEY (`f_id`), ADD KEY `fk_fields_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `g_goal`
--
ALTER TABLE `g_goal`
 ADD PRIMARY KEY (`g_id`), ADD KEY `fk_g_goal_fields1_idx` (`fields_f_id`);

--
-- Indexes for table `leaders_team`
--
ALTER TABLE `leaders_team`
 ADD PRIMARY KEY (`l_id`), ADD KEY `fk_leaders_team_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
 ADD PRIMARY KEY (`pe_id`), ADD KEY `fk_periods_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
 ADD PRIMARY KEY (`p_id`), ADD KEY `fk_plans_schools1_idx` (`schools_sch_id`);

--
-- Indexes for table `plan_team`
--
ALTER TABLE `plan_team`
 ADD PRIMARY KEY (`pl_id`), ADD KEY `fk_plan_team_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `profit`
--
ALTER TABLE `profit`
 ADD PRIMARY KEY (`pr_id`), ADD KEY `fk_profit_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `range`
--
ALTER TABLE `range`
 ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `requirement`
--
ALTER TABLE `requirement`
 ADD PRIMARY KEY (`re_id`), ADD KEY `fk_requirement_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `responsible`
--
ALTER TABLE `responsible`
 ADD PRIMARY KEY (`rs_id`), ADD KEY `fk_responsible_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
 ADD PRIMARY KEY (`sch_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
 ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `subject_plan`
--
ALTER TABLE `subject_plan`
 ADD PRIMARY KEY (`sp_id`), ADD KEY `fk_subject_plan_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
 ADD PRIMARY KEY (`su_id`), ADD KEY `fk_support_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `swot_elm`
--
ALTER TABLE `swot_elm`
 ADD PRIMARY KEY (`se_id`), ADD KEY `fk_swot_elm_fields1_idx` (`fields_f_id`);

--
-- Indexes for table `swot_strategy`
--
ALTER TABLE `swot_strategy`
 ADD PRIMARY KEY (`sg_id`), ADD KEY `fk_swot_strategy_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `tec_count`
--
ALTER TABLE `tec_count`
 ADD PRIMARY KEY (`tc_id`), ADD KEY `fk_tec_count_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
 ADD PRIMARY KEY (`t_id`), ADD KEY `fk_time_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `time_day`
--
ALTER TABLE `time_day`
 ADD PRIMARY KEY (`tm_id`), ADD KEY `fk_time_day_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_users_schools_idx` (`schools_sch_id`);

--
-- Indexes for table `values`
--
ALTER TABLE `values`
 ADD PRIMARY KEY (`vl_id`), ADD KEY `fk_values_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `vms`
--
ALTER TABLE `vms`
 ADD PRIMARY KEY (`vm_id`), ADD KEY `fk_vms_plans1_idx` (`plans_p_id`);

--
-- Indexes for table `work_team`
--
ALTER TABLE `work_team`
 ADD PRIMARY KEY (`w_id`), ADD KEY `fk_work_team_plans1_idx` (`plans_p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin_count`
--
ALTER TABLE `admin_count`
MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
MODIFY `an_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `backup`
--
ALTER TABLE `backup`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `buliding_count`
--
ALTER TABLE `buliding_count`
MODIFY `bu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category_time`
--
ALTER TABLE `category_time`
MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_count`
--
ALTER TABLE `class_count`
MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `d_goal`
--
ALTER TABLE `d_goal`
MODIFY `dg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `ev_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `g_goal`
--
ALTER TABLE `g_goal`
MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leaders_team`
--
ALTER TABLE `leaders_team`
MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
MODIFY `pe_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plan_team`
--
ALTER TABLE `plan_team`
MODIFY `pl_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profit`
--
ALTER TABLE `profit`
MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `range`
--
ALTER TABLE `range`
MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requirement`
--
ALTER TABLE `requirement`
MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `responsible`
--
ALTER TABLE `responsible`
MODIFY `rs_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subject_plan`
--
ALTER TABLE `subject_plan`
MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `swot_elm`
--
ALTER TABLE `swot_elm`
MODIFY `se_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `swot_strategy`
--
ALTER TABLE `swot_strategy`
MODIFY `sg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tec_count`
--
ALTER TABLE `tec_count`
MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `time_day`
--
ALTER TABLE `time_day`
MODIFY `tm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `values`
--
ALTER TABLE `values`
MODIFY `vl_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vms`
--
ALTER TABLE `vms`
MODIFY `vm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_team`
--
ALTER TABLE `work_team`
MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `actions`
--
ALTER TABLE `actions`
ADD CONSTRAINT `fk_actions_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_actions_profit1` FOREIGN KEY (`profit_pr_id`) REFERENCES `profit` (`pr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_actions_time1` FOREIGN KEY (`time_t_id`) REFERENCES `time` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `actions_has_d_goal`
--
ALTER TABLE `actions_has_d_goal`
ADD CONSTRAINT `fk_actions_has_d_goal_actions1` FOREIGN KEY (`actions_ac_id`) REFERENCES `actions` (`ac_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_actions_has_d_goal_d_goal1` FOREIGN KEY (`d_goal_dg_id`) REFERENCES `d_goal` (`dg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `actions_has_requirement`
--
ALTER TABLE `actions_has_requirement`
ADD CONSTRAINT `fk_actions_has_requirement_actions1` FOREIGN KEY (`actions_ac_id`) REFERENCES `actions` (`ac_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_actions_has_requirement_requirement1` FOREIGN KEY (`requirement_re_id`) REFERENCES `requirement` (`re_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `actions_has_responsible`
--
ALTER TABLE `actions_has_responsible`
ADD CONSTRAINT `fk_actions_has_responsible_actions1` FOREIGN KEY (`actions_ac_id`) REFERENCES `actions` (`ac_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_actions_has_responsible_responsible1` FOREIGN KEY (`responsible_rs_id`) REFERENCES `responsible` (`rs_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `actions_has_responsible1`
--
ALTER TABLE `actions_has_responsible1`
ADD CONSTRAINT `fk_actions_has_responsible1_actions1` FOREIGN KEY (`actions_ac_id`) REFERENCES `actions` (`ac_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_actions_has_responsible1_responsible1` FOREIGN KEY (`responsible_rs_id`) REFERENCES `responsible` (`rs_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `actions_has_support`
--
ALTER TABLE `actions_has_support`
ADD CONSTRAINT `fk_actions_has_support_actions1` FOREIGN KEY (`actions_ac_id`) REFERENCES `actions` (`ac_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_actions_has_support_support1` FOREIGN KEY (`support_su_id`) REFERENCES `support` (`su_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_count`
--
ALTER TABLE `admin_count`
ADD CONSTRAINT `fk_count_admin_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
ADD CONSTRAINT `fk_announcement_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buliding_count`
--
ALTER TABLE `buliding_count`
ADD CONSTRAINT `fk_buliding_count_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_time`
--
ALTER TABLE `category_time`
ADD CONSTRAINT `fk_category_time_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_count`
--
ALTER TABLE `class_count`
ADD CONSTRAINT `fk_class_count_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data`
--
ALTER TABLE `data`
ADD CONSTRAINT `fk_data_schools1` FOREIGN KEY (`schools_sch_id`) REFERENCES `schools` (`sch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `d_goal`
--
ALTER TABLE `d_goal`
ADD CONSTRAINT `fk_d_goal_g_goal1` FOREIGN KEY (`g_goal_g_id`) REFERENCES `g_goal` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
ADD CONSTRAINT `fk_events_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events_has_responsible`
--
ALTER TABLE `events_has_responsible`
ADD CONSTRAINT `fk_events_has_responsible_events1` FOREIGN KEY (`events_ev_id`) REFERENCES `events` (`ev_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_events_has_responsible_responsible1` FOREIGN KEY (`responsible_rs_id`) REFERENCES `responsible` (`rs_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events_has_responsible1`
--
ALTER TABLE `events_has_responsible1`
ADD CONSTRAINT `fk_events_has_responsible1_events1` FOREIGN KEY (`events_ev_id`) REFERENCES `events` (`ev_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_events_has_responsible1_responsible1` FOREIGN KEY (`responsible_rs_id`) REFERENCES `responsible` (`rs_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fields`
--
ALTER TABLE `fields`
ADD CONSTRAINT `fk_fields_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `g_goal`
--
ALTER TABLE `g_goal`
ADD CONSTRAINT `fk_g_goal_fields1` FOREIGN KEY (`fields_f_id`) REFERENCES `fields` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leaders_team`
--
ALTER TABLE `leaders_team`
ADD CONSTRAINT `fk_leaders_team_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `periods`
--
ALTER TABLE `periods`
ADD CONSTRAINT `fk_periods_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plans`
--
ALTER TABLE `plans`
ADD CONSTRAINT `fk_plans_schools1` FOREIGN KEY (`schools_sch_id`) REFERENCES `schools` (`sch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan_team`
--
ALTER TABLE `plan_team`
ADD CONSTRAINT `fk_plan_team_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profit`
--
ALTER TABLE `profit`
ADD CONSTRAINT `fk_profit_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requirement`
--
ALTER TABLE `requirement`
ADD CONSTRAINT `fk_requirement_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `responsible`
--
ALTER TABLE `responsible`
ADD CONSTRAINT `fk_responsible_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_plan`
--
ALTER TABLE `subject_plan`
ADD CONSTRAINT `fk_subject_plan_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `support`
--
ALTER TABLE `support`
ADD CONSTRAINT `fk_support_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `swot_elm`
--
ALTER TABLE `swot_elm`
ADD CONSTRAINT `fk_swot_elm_fields1` FOREIGN KEY (`fields_f_id`) REFERENCES `fields` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `swot_strategy`
--
ALTER TABLE `swot_strategy`
ADD CONSTRAINT `fk_swot_strategy_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tec_count`
--
ALTER TABLE `tec_count`
ADD CONSTRAINT `fk_tec_count_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time`
--
ALTER TABLE `time`
ADD CONSTRAINT `fk_time_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_day`
--
ALTER TABLE `time_day`
ADD CONSTRAINT `fk_time_day_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `fk_users_schools` FOREIGN KEY (`schools_sch_id`) REFERENCES `schools` (`sch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `values`
--
ALTER TABLE `values`
ADD CONSTRAINT `fk_values_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vms`
--
ALTER TABLE `vms`
ADD CONSTRAINT `fk_vms_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_team`
--
ALTER TABLE `work_team`
ADD CONSTRAINT `fk_work_team_plans1` FOREIGN KEY (`plans_p_id`) REFERENCES `plans` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
