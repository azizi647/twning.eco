-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Hazırlanma Vaxtı: 13 Fev, 2017 saat 06:09
-- Server versiyası: 10.1.13-MariaDB
-- PHP Versiyası: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Verilənlər Bazası: `azizli_db`
--

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `about`
--

CREATE TABLE `about` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_hompage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` enum('az','en') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `about`
--

INSERT INTO `about` (`id`, `post_id`, `title`, `about_hompage`, `home_picture`, `about`, `lang`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'AURO ARCHITECT MMC Design  Architecture', '“AURO ARCHITECT” MMC şirkəti 2012-ci ildə yaradılmış və istedadlı memarların, konstruktorların, zövqlü dizaynerlərin, təcrübəli inşaat mühəndislərinin səyi nəticəsində uğurla fəaliyyət göstərir. Hal-hazırda biz “AURO ARCHITECT” MMC şirkəti olaraq Bakı şəhərində fəaliyyət göstəririk və məqsədimiz layihələndirmə, dizayn, təmir və tikinti işlərinizdə sizlərə köməklik göstərmək və bu sahədəki yeniliklərlə sizləri yaxından tanış etməkdir. Daim inkişafda olan şirkətimiz, zövqləri oxşayan memarlıq və dizayn işləri ilə əhaliyə milli və müasir dünya memarlığı təklif edir.', 'test.jpg', 'INTRODUCTION Project Purpose: To strengthen environmental monitoring system ensuring provision of the high quality information that does support strategic environmental policy planning and compliance control.\r\nImplementation Period: November 2016 – January 2019 TWINNING: CO-OPERATION BETWEEN THE EU AND ITS NEIGHBORHOOD Twinning in a nutshell Twinning is an instrument created in order to develop and strengthen the administrative and judicial capacity of the candidate countries and the pre-candidate countries and the countries that are covered by the European Neighbourhood Policy (ENP). \r\nTwinning can be seen as a means to export valuable know-how. It assists and prepares the candidate countries prior to their accession and supports the stability of the economical and societal circumstances and development of the countries at a larger scale. Twinning activities are financed through the Instrument for Preaccession Assistance II (IPA II) and the European Neighbourhood Instrument (ENI', 'az', 1, NULL, NULL),
(2, 1, 'AURO ARCHITECT MMC Design  Architecture', '“AURO ARCHITECT” MMC şirkəti 2012-ci ildə yaradılmış və istedadlı memarların, konstruktorların, zövqlü dizaynerlərin, təcrübəli inşaat mühəndislərinin səyi nəticəsində uğurla fəaliyyət göstərir. Hal-hazırda biz “AURO ARCHITECT” MMC şirkəti olaraq Bakı şəhərində fəaliyyət göstəririk və məqsədimiz layihələndirmə, dizayn, təmir və tikinti işlərinizdə sizlərə köməklik göstərmək və bu sahədəki yeniliklərlə sizləri yaxından tanış etməkdir. Daim inkişafda olan şirkətimiz, zövqləri oxşayan memarlıq və dizayn işləri ilə əhaliyə milli və müasir dünya memarlığı təklif edir.', 'test.jpg', 'INTRODUCTION Project Purpose: To strengthen environmental monitoring system ensuring provision of the high quality information that does support strategic environmental policy planning and compliance control.\r\n            Implementation Period: November 2016 – January 2019 TWINNING: CO-OPERATION BETWEEN THE EU AND ITS NEIGHBORHOOD Twinning in a nutshell Twinning is an instrument created in order to develop and strengthen the administrative and judicial capacity of the candidate countries and the pre-candidate countries and the countries that are covered by the European Neighbourhood Policy (ENP). \r\n            Twinning can be seen as a means to export valuable know-how. It assists and prepares the candidate countries prior to their accession and supports the stability of the economical and societal circumstances and development of the countries at a larger scale. Twinning activities are financed through the Instrument for Preaccession Assistance II (IPA II) and the European Neighbourhood Instrument (ENI', 'en', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `show` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  `menu_type` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('top','left','bottom') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` enum('az','en') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `menus`
--

INSERT INTO `menus` (`id`, `menu_id`, `parent_id`, `order`, `menu_type`, `status`, `title`, `description`, `type`, `lang`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 0, 1, 'Haqqinda', 'Haqqinda menyusu', 'top', 'az', '2017-02-12 08:50:17', '2017-02-12 08:50:17'),
(2, 1, 0, 1, 0, 1, 'About', 'About Menu', 'top', 'en', '2017-02-12 08:50:17', '2017-02-12 08:50:17');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_10_25_062954_create_contact_messages_table', 1),
(4, '2016_10_27_065043_create_slider_table', 1),
(5, '2016_11_17_162727_create_table_about', 1),
(6, '2016_11_18_192719_create_table_settings', 1),
(7, '2017_02_09_125923_create_pages_table', 1),
(8, '2017_02_09_130102_create_menus_table', 1),
(9, '2017_02_09_131016_create_translations_table', 1),
(10, '2017_02_09_143542_create_partners_table', 1);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `lang` enum('az','en') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `show_index` tinyint(4) NOT NULL DEFAULT '0',
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `partner_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` enum('az','en') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `partners`
--

INSERT INTO `partners` (`id`, `partner_id`, `image`, `order`, `status`, `title`, `lang`, `created_at`, `updated_at`) VALUES
(3, 2, '24.jpg', 2, 1, 'Makara.Az', 'az', '2017-02-12 18:39:16', '2017-02-12 18:39:16'),
(4, 2, '24.jpg', 2, 1, 'Makara.Az', 'en', '2017-02-12 18:39:16', '2017-02-12 18:39:16');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` enum('az','en') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `translations`
--

INSERT INTO `translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'az', 'cms_words', 'home', 'Ana Səhifə', '2017-02-12 20:12:31', '2017-02-12 20:12:31'),
(2, 1, 'az', 'cms_words', 'dashboard', 'Görüntü tablosu', '2017-02-12 20:12:32', '2017-02-12 20:12:32'),
(3, 1, 'az', 'cms_words', 'users', 'İstifadəçilər', '2017-02-12 20:12:32', '2017-02-12 20:12:32'),
(4, 1, 'az', 'cms_words', 'add_user', 'Yeni İstifadəçi', '2017-02-12 20:12:32', '2017-02-12 20:12:32'),
(5, 1, 'az', 'cms_words', 'edit_user', 'İstifadəçi Redaktəsi', '2017-02-12 20:12:32', '2017-02-12 20:12:32'),
(6, 1, 'az', 'cms_words', 'delete_role', 'Rütbəni Sil', '2017-02-12 20:12:32', '2017-02-12 20:12:32'),
(7, 1, 'az', 'cms_words', 'control_panel', 'İdarə Paneli', '2017-02-12 20:12:32', '2017-02-12 20:12:32'),
(8, 1, 'az', 'cms_words', 'online', 'Aktiv', '2017-02-12 20:12:32', '2017-02-12 20:12:32'),
(9, 1, 'az', 'cms_words', 'language', 'Dillər ', '2017-02-12 20:12:32', '2017-02-12 20:12:32'),
(10, 1, 'az', 'cms_words', 'roles', 'Rütbələr', '2017-02-12 20:12:32', '2017-02-12 20:12:32'),
(11, 1, 'az', 'cms_words', 'add_role', 'Yeni Rütbə', '2017-02-12 20:12:32', '2017-02-12 20:12:32'),
(12, 1, 'az', 'cms_words', 'all_roles', 'Bütün Rütbələr', '2017-02-12 20:12:33', '2017-02-12 20:12:33'),
(13, 1, 'az', 'cms_words', 'edit_role', 'Rütbə Redaktəsi', '2017-02-12 20:12:33', '2017-02-12 20:12:33'),
(14, 1, 'az', 'cms_words', 'pages', 'Səhifələr', '2017-02-12 20:12:33', '2017-02-12 20:12:33'),
(15, 1, 'az', 'cms_words', 'add_pages', 'Yeni Səhifə', '2017-02-12 20:12:33', '2017-02-12 20:12:33'),
(16, 1, 'az', 'cms_words', 'all_pages', 'Bütün Səhifələr', '2017-02-12 20:12:33', '2017-02-12 20:12:33'),
(17, 1, 'az', 'cms_words', 'edit_page', 'Səhifə Redaktəsi', '2017-02-12 20:12:33', '2017-02-12 20:12:33'),
(18, 1, 'az', 'cms_words', 'delete_page', 'Səhifəni Sil', '2017-02-12 20:12:33', '2017-02-12 20:12:33'),
(19, 1, 'az', 'cms_words', 'menus', 'Menyular', '2017-02-12 20:12:33', '2017-02-12 20:12:33'),
(20, 1, 'az', 'cms_words', 'add_menu', 'Yeni Menyu', '2017-02-12 20:12:33', '2017-02-12 20:12:33'),
(21, 1, 'az', 'cms_words', 'all_menus', 'Bütün Menyu', '2017-02-12 20:12:33', '2017-02-12 20:12:33'),
(22, 1, 'az', 'cms_words', 'edit_menu', 'Menyu Redaktəsi', '2017-02-12 20:12:33', '2017-02-12 20:12:33'),
(23, 1, 'az', 'cms_words', 'delete_menu', 'Menyunu Sil', '2017-02-12 20:12:33', '2017-02-12 20:12:33'),
(24, 1, 'az', 'cms_words', 'cv', 'CV-lər', '2017-02-12 20:12:33', '2017-02-12 20:12:33'),
(25, 1, 'az', 'cms_words', 'gallery', 'Qalereyya', '2017-02-12 20:12:33', '2017-02-12 20:12:33'),
(26, 1, 'az', 'cms_words', 'add_gallery', 'Yeni Qalereya', '2017-02-12 20:12:34', '2017-02-12 20:12:34'),
(27, 1, 'az', 'cms_words', 'all_gallery', 'Bütün Qalereya', '2017-02-12 20:12:34', '2017-02-12 20:12:34'),
(28, 1, 'az', 'cms_words', 'translation', 'Tərcümə', '2017-02-12 20:12:34', '2017-02-12 20:12:34'),
(29, 1, 'az', 'cms_words', 'settings', 'Tənzimləmələr', '2017-02-12 20:12:34', '2017-02-12 20:12:34'),
(30, 1, 'az', 'cms_words', 'copyright', 'Copyright', '2017-02-12 20:12:34', '2017-02-12 20:12:34'),
(31, 1, 'az', 'cms_words', 'all_rights_reserved', 'Bütün hüquqlar qorunur', '2017-02-12 20:12:34', '2017-02-12 20:12:34'),
(32, 1, 'az', 'cms_words', 'anything_you_want', 'Makara Team', '2017-02-12 20:12:34', '2017-02-12 20:12:34'),
(33, 1, 'az', 'cms_words', 'manager', 'Yönətici', '2017-02-12 20:12:34', '2017-02-12 20:12:34'),
(34, 1, 'az', 'cms_words', 'email', 'E-poçt', '2017-02-12 20:12:34', '2017-02-12 20:12:34'),
(35, 1, 'az', 'cms_words', 'date', 'Tarix', '2017-02-12 20:12:34', '2017-02-12 20:12:34'),
(36, 1, 'az', 'cms_words', 'action', 'Fəaliyyət', '2017-02-12 20:12:34', '2017-02-12 20:12:34'),
(37, 1, 'az', 'cms_words', 'username', 'İstifadəçi adı', '2017-02-12 20:12:34', '2017-02-12 20:12:34'),
(38, 1, 'az', 'cms_words', 'password', 'Parol', '2017-02-12 20:12:34', '2017-02-12 20:12:34'),
(39, 1, 'az', 'cms_words', 'confirm_password', 'Parolu təsdiq edin', '2017-02-12 20:12:35', '2017-02-12 20:12:35'),
(40, 1, 'az', 'cms_words', 'site_settings', 'Site Ayarları', '2017-02-12 20:12:35', '2017-02-12 20:12:35'),
(41, 1, 'az', 'cms_words', 'email_settings', 'E-poçt Ayarları', '2017-02-12 20:12:35', '2017-02-12 20:12:35'),
(42, 1, 'az', 'cms_words', 'title', 'Başlıq', '2017-02-12 20:12:35', '2017-02-12 20:12:35'),
(43, 1, 'az', 'cms_words', 'slug', 'Slug', '2017-02-12 20:12:35', '2017-02-12 20:12:35'),
(44, 1, 'az', 'cms_words', 'permissions', 'İcazələr', '2017-02-12 20:12:35', '2017-02-12 20:12:35'),
(45, 1, 'az', 'cms_words', 'pages_list', 'Səhifələr siyahısı', '2017-02-12 20:12:35', '2017-02-12 20:12:35'),
(46, 1, 'az', 'cms_words', 'main_navigation', 'Əsas naviqasiyaya', '2017-02-12 20:12:35', '2017-02-12 20:12:35'),
(47, 1, 'az', 'cms_words', 'all_users', 'Bütün İstifadəçilər', '2017-02-12 20:12:35', '2017-02-12 20:12:35'),
(48, 1, 'az', 'cms_words', 'reservation', 'Reservation', '2017-02-12 20:12:35', '2017-02-12 20:12:35'),
(49, 1, 'az', 'cms_words', 'partners', 'Partnyorlar', '2017-02-12 20:12:36', '2017-02-12 20:12:36'),
(50, 1, 'az', 'cms_words', 'add_partner', 'Yeni Partnyor ə/e.', '2017-02-12 20:12:36', '2017-02-12 20:12:36'),
(51, 1, 'az', 'cms_words', 'all_partners', 'Bütün Partnyorlar', '2017-02-12 20:12:36', '2017-02-12 20:12:36'),
(52, 1, 'az', 'cms_words', 'edit_partner', 'Partnyor Redaktəsi', '2017-02-12 20:12:36', '2017-02-12 20:12:36'),
(53, 1, 'az', 'cms_words', 'delete_partner', 'Partnyoru Sil', '2017-02-12 20:12:36', '2017-02-12 20:12:36'),
(54, 1, 'az', 'frontmenu', 'recomended', 'Meslehetli »', '2017-02-12 20:12:36', '2017-02-12 20:12:36'),
(55, 1, 'az', 'frontmenu', 'new', 'Vusal', '2017-02-12 20:12:36', '2017-02-12 20:12:36'),
(56, 1, 'az', 'frontmenu', 'chef_recomented', 'Chef Recommended', '2017-02-12 20:12:36', '2017-02-12 20:12:36'),
(57, 1, 'az', 'frontmenu', 'signature_sub_title', 'İmzalar yeməklər bizim aşbaz tərəfindən tövsiyə', '2017-02-12 20:12:36', '2017-02-12 20:12:36'),
(58, 1, 'az', 'pagination', 'previous', '&laquo; eeeePrevious', '2017-02-12 20:12:36', '2017-02-12 20:12:36'),
(59, 1, 'az', 'pagination', 'next', 'Sonraki »', '2017-02-12 20:12:36', '2017-02-12 20:12:36'),
(60, 1, 'az', 'passwords', 'password', 'Passwords must be at least six characters and match the confirmation.', '2017-02-12 20:12:36', '2017-02-12 20:12:36'),
(61, 1, 'az', 'passwords', 'user', 'We can''t find a user with that e-mail address.', '2017-02-12 20:12:37', '2017-02-12 20:12:37'),
(62, 1, 'az', 'passwords', 'token', 'This password reset token is invalid.', '2017-02-12 20:12:37', '2017-02-12 20:12:37'),
(63, 1, 'az', 'passwords', 'sent', 'We have e-mailed your password reset link!', '2017-02-12 20:12:37', '2017-02-12 20:12:37'),
(64, 1, 'az', 'passwords', 'reset', 'Your password has been reset!', '2017-02-12 20:12:37', '2017-02-12 20:12:37'),
(65, 1, 'az', 'validation', 'accepted', 'The :attribute must be accepted.', '2017-02-12 20:12:37', '2017-02-12 20:12:37'),
(66, 1, 'az', 'validation', 'active_url', 'The :attribute is not a valid URL.', '2017-02-12 20:12:37', '2017-02-12 20:12:37'),
(67, 1, 'az', 'validation', 'after', 'The :attribute must be a date after :date.', '2017-02-12 20:12:37', '2017-02-12 20:12:37'),
(68, 1, 'az', 'validation', 'alpha', 'The :attribute may only contain letters.', '2017-02-12 20:12:38', '2017-02-12 20:12:38'),
(69, 1, 'az', 'validation', 'alpha_dash', 'The :attribute may only contain letters, numbers, and dashes.', '2017-02-12 20:12:38', '2017-02-12 20:12:38'),
(70, 1, 'az', 'validation', 'alpha_num', 'The :attribute may only contain letters and numbers.', '2017-02-12 20:12:38', '2017-02-12 20:12:38'),
(71, 1, 'az', 'validation', 'array', 'The :attribute must be an array.', '2017-02-12 20:12:38', '2017-02-12 20:12:38'),
(72, 1, 'az', 'validation', 'before', 'The :attribute must be a date before :date.', '2017-02-12 20:12:38', '2017-02-12 20:12:38'),
(73, 1, 'az', 'validation', 'between.numeric', 'The :attribute must be between :min and :max.', '2017-02-12 20:12:38', '2017-02-12 20:12:38'),
(74, 1, 'az', 'validation', 'between.file', 'The :attribute must be between :min and :max kilobytes.', '2017-02-12 20:12:38', '2017-02-12 20:12:38'),
(75, 1, 'az', 'validation', 'between.string', 'The :attribute must be between :min and :max characters.', '2017-02-12 20:12:38', '2017-02-12 20:12:38'),
(76, 1, 'az', 'validation', 'between.array', 'The :attribute must have between :min and :max items.', '2017-02-12 20:12:39', '2017-02-12 20:12:39'),
(77, 1, 'az', 'validation', 'boolean', 'The :attribute field must be true or false.', '2017-02-12 20:12:39', '2017-02-12 20:12:39'),
(78, 1, 'az', 'validation', 'confirmed', 'The :attribute confirmation does not match.', '2017-02-12 20:12:39', '2017-02-12 20:12:39'),
(79, 1, 'az', 'validation', 'date', 'The :attribute is not a valid date.', '2017-02-12 20:12:39', '2017-02-12 20:12:39'),
(80, 1, 'az', 'validation', 'date_format', 'The :attribute does not match the format :format.', '2017-02-12 20:12:39', '2017-02-12 20:12:39'),
(81, 1, 'az', 'validation', 'different', 'The :attribute and :other must be different.', '2017-02-12 20:12:39', '2017-02-12 20:12:39'),
(82, 1, 'az', 'validation', 'digits', 'The :attribute must be :digits digits.', '2017-02-12 20:12:39', '2017-02-12 20:12:39'),
(83, 1, 'az', 'validation', 'digits_between', 'The :attribute must be between :min and :max digits.', '2017-02-12 20:12:39', '2017-02-12 20:12:39'),
(84, 1, 'az', 'validation', 'email', 'The :attribute must be a valid email address.', '2017-02-12 20:12:39', '2017-02-12 20:12:39'),
(85, 1, 'az', 'validation', 'filled', 'The :attribute field is required.', '2017-02-12 20:12:39', '2017-02-12 20:12:39'),
(86, 1, 'az', 'validation', 'exists', 'The selected :attribute is invalid.', '2017-02-12 20:12:39', '2017-02-12 20:12:39'),
(87, 1, 'az', 'validation', 'image', 'The :attribute must be an image.', '2017-02-12 20:12:40', '2017-02-12 20:12:40'),
(88, 1, 'az', 'validation', 'in', 'The selected :attribute is invalid.', '2017-02-12 20:12:40', '2017-02-12 20:12:40'),
(89, 1, 'az', 'validation', 'integer', 'The :attribute must be an integer.', '2017-02-12 20:12:40', '2017-02-12 20:12:40'),
(90, 1, 'az', 'validation', 'ip', 'The :attribute must be a valid IP address.', '2017-02-12 20:12:40', '2017-02-12 20:12:40'),
(91, 1, 'az', 'validation', 'max.numeric', 'The :attribute may not be greater than :max.', '2017-02-12 20:12:40', '2017-02-12 20:12:40'),
(92, 1, 'az', 'validation', 'max.file', 'The :attribute may not be greater than :max kilobytes.', '2017-02-12 20:12:41', '2017-02-12 20:12:41'),
(93, 1, 'az', 'validation', 'max.string', 'The :attribute may not be greater than :max characters.', '2017-02-12 20:12:41', '2017-02-12 20:12:41'),
(94, 1, 'az', 'validation', 'max.array', 'The :attribute may not have more than :max items.', '2017-02-12 20:12:41', '2017-02-12 20:12:41'),
(95, 1, 'az', 'validation', 'mimes', 'The :attribute must be a file of type: :values.', '2017-02-12 20:12:41', '2017-02-12 20:12:41'),
(96, 1, 'az', 'validation', 'min.numeric', 'The :attribute must be at least :min.', '2017-02-12 20:12:41', '2017-02-12 20:12:41'),
(97, 1, 'az', 'validation', 'min.file', 'The :attribute must be at least :min kilobytes.', '2017-02-12 20:12:41', '2017-02-12 20:12:41'),
(98, 1, 'az', 'validation', 'min.string', 'The :attribute must be at least :min characters.', '2017-02-12 20:12:41', '2017-02-12 20:12:41'),
(99, 1, 'az', 'validation', 'min.array', 'The :attribute must have at least :min items.', '2017-02-12 20:12:41', '2017-02-12 20:12:41'),
(100, 1, 'az', 'validation', 'not_in', 'The selected :attribute is invalid.', '2017-02-12 20:12:41', '2017-02-12 20:12:41'),
(101, 1, 'az', 'validation', 'numeric', 'The :attribute must be a number.', '2017-02-12 20:12:41', '2017-02-12 20:12:41'),
(102, 1, 'az', 'validation', 'regex', 'The :attribute format is invalid.', '2017-02-12 20:12:41', '2017-02-12 20:12:41'),
(103, 1, 'az', 'validation', 'required', 'The :attribute field is required.', '2017-02-12 20:12:42', '2017-02-12 20:12:42'),
(104, 1, 'az', 'validation', 'required_if', 'The :attribute field is required when :other is :value.', '2017-02-12 20:12:42', '2017-02-12 20:12:42'),
(105, 1, 'az', 'validation', 'required_with', 'The :attribute field is required when :values is present.', '2017-02-12 20:12:42', '2017-02-12 20:12:42'),
(106, 1, 'az', 'validation', 'required_with_all', 'The :attribute field is required when :values is present.', '2017-02-12 20:12:42', '2017-02-12 20:12:42'),
(107, 1, 'az', 'validation', 'required_without', 'The :attribute field is required when :values is not present.', '2017-02-12 20:12:42', '2017-02-12 20:12:42'),
(108, 1, 'az', 'validation', 'required_without_all', 'The :attribute field is required when none of :values are present.', '2017-02-12 20:12:42', '2017-02-12 20:12:42'),
(109, 1, 'az', 'validation', 'same', 'The :attribute and :other must match.', '2017-02-12 20:12:42', '2017-02-12 20:12:42'),
(110, 1, 'az', 'validation', 'size.numeric', 'The :attribute must be :size.', '2017-02-12 20:12:42', '2017-02-12 20:12:42'),
(111, 1, 'az', 'validation', 'size.file', 'The :attribute must be :size kilobytes.', '2017-02-12 20:12:43', '2017-02-12 20:12:43'),
(112, 1, 'az', 'validation', 'size.string', 'The :attribute must be :size characters.', '2017-02-12 20:12:43', '2017-02-12 20:12:43'),
(113, 1, 'az', 'validation', 'size.array', 'The :attribute must contain :size items.', '2017-02-12 20:12:43', '2017-02-12 20:12:43'),
(114, 1, 'az', 'validation', 'unique', 'The :attribute has already been taken.', '2017-02-12 20:12:43', '2017-02-12 20:12:43'),
(115, 1, 'az', 'validation', 'url', 'The :attribute format is invalid.', '2017-02-12 20:12:43', '2017-02-12 20:12:43'),
(116, 1, 'az', 'validation', 'timezone', 'The :attribute must be a valid zone.', '2017-02-12 20:12:43', '2017-02-12 20:12:43'),
(117, 1, 'az', 'validation', 'custom.attribute-name.rule-name', 'custom-message', '2017-02-12 20:12:43', '2017-02-12 20:12:43'),
(118, 1, 'en', 'cms_words', 'home', 'Home', '2017-02-12 20:12:43', '2017-02-12 20:12:43'),
(119, 1, 'en', 'cms_words', 'dashboard', 'Dashboard', '2017-02-12 20:12:43', '2017-02-12 20:12:43'),
(120, 1, 'en', 'cms_words', 'users', 'Users', '2017-02-12 20:12:43', '2017-02-12 20:12:43'),
(121, 1, 'en', 'cms_words', 'add_user', 'Add User', '2017-02-12 20:12:43', '2017-02-12 20:12:43'),
(122, 1, 'en', 'cms_words', 'edit_user', 'Edit User', '2017-02-12 20:12:43', '2017-02-12 20:12:43'),
(123, 1, 'en', 'cms_words', 'delete_role', 'Delete Role', '2017-02-12 20:12:43', '2017-02-12 20:12:43'),
(124, 1, 'en', 'cms_words', 'control_panel', 'Control Panel', '2017-02-12 20:12:44', '2017-02-12 20:12:44'),
(125, 1, 'en', 'cms_words', 'online', 'Online', '2017-02-12 20:12:44', '2017-02-12 20:12:44'),
(126, 1, 'en', 'cms_words', 'language', 'Languages', '2017-02-12 20:12:44', '2017-02-12 20:12:44'),
(127, 1, 'en', 'cms_words', 'roles', 'Roles', '2017-02-12 20:12:44', '2017-02-12 20:12:44'),
(128, 1, 'en', 'cms_words', 'add_role', 'Add Role', '2017-02-12 20:12:44', '2017-02-12 20:12:44'),
(129, 1, 'en', 'cms_words', 'all_roles', 'All Roles', '2017-02-12 20:12:44', '2017-02-12 20:12:44'),
(130, 1, 'en', 'cms_words', 'edit_role', 'Edit Role', '2017-02-12 20:12:44', '2017-02-12 20:12:44'),
(131, 1, 'en', 'cms_words', 'pages', 'Pages', '2017-02-12 20:12:44', '2017-02-12 20:12:44'),
(132, 1, 'en', 'cms_words', 'add_pages', 'Add Page', '2017-02-12 20:12:44', '2017-02-12 20:12:44'),
(133, 1, 'en', 'cms_words', 'all_pages', 'All Pages', '2017-02-12 20:12:44', '2017-02-12 20:12:44'),
(134, 1, 'en', 'cms_words', 'edit_page', 'Edit Page', '2017-02-12 20:12:44', '2017-02-12 20:12:44'),
(135, 1, 'en', 'cms_words', 'delete_page', 'Delete Page', '2017-02-12 20:12:45', '2017-02-12 20:12:45'),
(136, 1, 'en', 'cms_words', 'menus', 'Menus', '2017-02-12 20:12:45', '2017-02-12 20:12:45'),
(137, 1, 'en', 'cms_words', 'add_menu', 'Add Menu', '2017-02-12 20:12:45', '2017-02-12 20:12:45'),
(138, 1, 'en', 'cms_words', 'all_menus', 'All Menus', '2017-02-12 20:12:45', '2017-02-12 20:12:45'),
(139, 1, 'en', 'cms_words', 'edit_menu', 'Edit Menu', '2017-02-12 20:12:45', '2017-02-12 20:12:45'),
(140, 1, 'en', 'cms_words', 'delete_menu', 'Delete menu', '2017-02-12 20:12:45', '2017-02-12 20:12:45'),
(141, 1, 'en', 'cms_words', 'cv', 'CV''s', '2017-02-12 20:12:45', '2017-02-12 20:12:45'),
(142, 1, 'en', 'cms_words', 'gallery', 'Gallery', '2017-02-12 20:12:45', '2017-02-12 20:12:45'),
(143, 1, 'en', 'cms_words', 'add_gallery', 'Add Gallery', '2017-02-12 20:12:45', '2017-02-12 20:12:45'),
(144, 1, 'en', 'cms_words', 'all_gallery', 'All Gallery', '2017-02-12 20:12:45', '2017-02-12 20:12:45'),
(145, 1, 'en', 'cms_words', 'translation', 'Translation', '2017-02-12 20:12:45', '2017-02-12 20:12:45'),
(146, 1, 'en', 'cms_words', 'settings', 'Settings', '2017-02-12 20:12:45', '2017-02-12 20:12:45'),
(147, 1, 'en', 'cms_words', 'copyright', 'Copyright', '2017-02-12 20:12:45', '2017-02-12 20:12:45'),
(148, 1, 'en', 'cms_words', 'all_rights_reserved', 'All Rights Reserved', '2017-02-12 20:12:45', '2017-02-12 20:12:45'),
(149, 1, 'en', 'cms_words', 'anything_you_want', 'Makara Team', '2017-02-12 20:12:46', '2017-02-12 20:12:46'),
(150, 1, 'en', 'cms_words', 'manager', 'Manager', '2017-02-12 20:12:46', '2017-02-12 20:12:46'),
(151, 1, 'en', 'cms_words', 'email', 'Email', '2017-02-12 20:12:46', '2017-02-12 20:12:46'),
(152, 1, 'en', 'cms_words', 'date', 'Date', '2017-02-12 20:12:46', '2017-02-12 20:12:46'),
(153, 1, 'en', 'cms_words', 'action', 'Action', '2017-02-12 20:12:46', '2017-02-12 20:12:46'),
(154, 1, 'en', 'cms_words', 'username', 'Username', '2017-02-12 20:12:46', '2017-02-12 20:12:46'),
(155, 1, 'en', 'cms_words', 'password', 'Password', '2017-02-12 20:12:46', '2017-02-12 20:12:46'),
(156, 1, 'en', 'cms_words', 'confirm_password', 'Confirm Password', '2017-02-12 20:12:46', '2017-02-12 20:12:46'),
(157, 1, 'en', 'cms_words', 'site_settings', 'Site Settings', '2017-02-12 20:12:46', '2017-02-12 20:12:46'),
(158, 1, 'en', 'cms_words', 'email_settings', 'Email Settings', '2017-02-12 20:12:46', '2017-02-12 20:12:46'),
(159, 1, 'en', 'cms_words', 'title', 'Title', '2017-02-12 20:12:46', '2017-02-12 20:12:46'),
(160, 1, 'en', 'cms_words', 'slug', 'Slug', '2017-02-12 20:12:47', '2017-02-12 20:12:47'),
(161, 1, 'en', 'cms_words', 'permissions', 'Permissions', '2017-02-12 20:12:47', '2017-02-12 20:12:47'),
(162, 1, 'en', 'cms_words', 'pages_list', 'Pages list', '2017-02-12 20:12:47', '2017-02-12 20:12:47'),
(163, 1, 'en', 'cms_words', 'main_navigation', 'Main Navigation', '2017-02-12 20:12:47', '2017-02-12 20:12:47'),
(164, 1, 'en', 'cms_words', 'all_users', 'All Users', '2017-02-12 20:12:47', '2017-02-12 20:12:47'),
(165, 1, 'en', 'cms_words', 'reservation', 'Reservation', '2017-02-12 20:12:47', '2017-02-12 20:12:47'),
(166, 1, 'en', 'cms_words', 'partners', 'Partners', '2017-02-12 20:12:47', '2017-02-12 20:12:47'),
(167, 1, 'en', 'cms_words', 'add_partner', 'Add Partner', '2017-02-12 20:12:47', '2017-02-12 20:12:47'),
(168, 1, 'en', 'cms_words', 'all_partners', 'All Partners', '2017-02-12 20:12:47', '2017-02-12 20:12:47'),
(169, 1, 'en', 'cms_words', 'edit_partner', 'Edit Partner', '2017-02-12 20:12:48', '2017-02-12 20:12:48'),
(170, 1, 'en', 'cms_words', 'delete_partner', 'Delete Partner', '2017-02-12 20:12:48', '2017-02-12 20:12:48'),
(171, 1, 'en', 'frontmenu', 'recomended', 'Meslehetli »', '2017-02-12 20:12:48', '2017-02-12 20:12:48'),
(172, 1, 'en', 'frontmenu', 'new', 'Vusal', '2017-02-12 20:12:48', '2017-02-12 20:12:48'),
(173, 1, 'en', 'frontmenu', 'chef_recomented', 'Chef Recommended', '2017-02-12 20:12:48', '2017-02-12 20:12:48'),
(174, 1, 'en', 'frontmenu', 'signature_sub_title', 'Signatures dishes recommend by our chef', '2017-02-12 20:12:48', '2017-02-12 20:12:48'),
(175, 1, 'en', 'pagination', 'previous', '« Previous', '2017-02-12 20:12:48', '2017-02-12 20:12:48'),
(176, 1, 'en', 'pagination', 'next', 'Next &raquo;', '2017-02-12 20:12:48', '2017-02-12 20:12:48'),
(177, 1, 'en', 'passwords', 'password', 'Passwords must be at least six characters and match the confirmation.', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(178, 1, 'en', 'passwords', 'user', 'We can''t find a user with that e-mail address.', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(179, 1, 'en', 'passwords', 'token', 'This password reset token is invalid.', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(180, 1, 'en', 'passwords', 'sent', 'We have e-mailed your password reset link!', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(181, 1, 'en', 'passwords', 'reset', 'Your password has been reset!', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(182, 1, 'en', 'validation', 'accepted', 'The :attribute must be accepted.', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(183, 1, 'en', 'validation', 'active_url', 'The :attribute is not a valid URL.', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(184, 1, 'en', 'validation', 'after', 'The :attribute must be a date after :date.', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(185, 1, 'en', 'validation', 'alpha', 'The :attribute may only contain letters.', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(186, 1, 'en', 'validation', 'alpha_dash', 'The :attribute may only contain letters, numbers, and dashes.', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(187, 1, 'en', 'validation', 'alpha_num', 'The :attribute may only contain letters and numbers.', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(188, 1, 'en', 'validation', 'array', 'The :attribute must be an array.', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(189, 1, 'en', 'validation', 'before', 'The :attribute must be a date before :date.', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(190, 1, 'en', 'validation', 'between.numeric', 'The :attribute must be between :min and :max.', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(191, 1, 'en', 'validation', 'between.file', 'The :attribute must be between :min and :max kilobytes.', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(192, 1, 'en', 'validation', 'between.string', 'The :attribute must be between :min and :max characters.', '2017-02-12 20:12:49', '2017-02-12 20:12:49'),
(193, 1, 'en', 'validation', 'between.array', 'The :attribute must have between :min and :max items.', '2017-02-12 20:12:50', '2017-02-12 20:12:50'),
(194, 1, 'en', 'validation', 'boolean', 'The :attribute field must be true or false.', '2017-02-12 20:12:50', '2017-02-12 20:12:50'),
(195, 1, 'en', 'validation', 'confirmed', 'The :attribute confirmation does not match.', '2017-02-12 20:12:50', '2017-02-12 20:12:50'),
(196, 1, 'en', 'validation', 'date', 'The :attribute is not a valid date.', '2017-02-12 20:12:50', '2017-02-12 20:12:50'),
(197, 1, 'en', 'validation', 'date_format', 'The :attribute does not match the format :format.', '2017-02-12 20:12:50', '2017-02-12 20:12:50'),
(198, 1, 'en', 'validation', 'different', 'The :attribute and :other must be different.', '2017-02-12 20:12:50', '2017-02-12 20:12:50'),
(199, 1, 'en', 'validation', 'digits', 'The :attribute must be :digits digits.', '2017-02-12 20:12:50', '2017-02-12 20:12:50'),
(200, 1, 'en', 'validation', 'digits_between', 'The :attribute must be between :min and :max digits.', '2017-02-12 20:12:50', '2017-02-12 20:12:50'),
(201, 1, 'en', 'validation', 'email', 'The :attribute must be a valid email address.', '2017-02-12 20:12:50', '2017-02-12 20:12:50'),
(202, 1, 'en', 'validation', 'filled', 'The :attribute field is required.', '2017-02-12 20:12:50', '2017-02-12 20:12:50'),
(203, 1, 'en', 'validation', 'exists', 'The selected :attribute is invalid.', '2017-02-12 20:12:51', '2017-02-12 20:12:51'),
(204, 1, 'en', 'validation', 'image', 'The :attribute must be an image.', '2017-02-12 20:12:51', '2017-02-12 20:12:51'),
(205, 1, 'en', 'validation', 'in', 'The selected :attribute is invalid.', '2017-02-12 20:12:51', '2017-02-12 20:12:51'),
(206, 1, 'en', 'validation', 'integer', 'The :attribute must be an integer.', '2017-02-12 20:12:51', '2017-02-12 20:12:51'),
(207, 1, 'en', 'validation', 'ip', 'The :attribute must be a valid IP address.', '2017-02-12 20:12:51', '2017-02-12 20:12:51'),
(208, 1, 'en', 'validation', 'max.numeric', 'The :attribute may not be greater than :max.', '2017-02-12 20:12:51', '2017-02-12 20:12:51'),
(209, 1, 'en', 'validation', 'max.file', 'The :attribute may not be greater than :max kilobytes.', '2017-02-12 20:12:51', '2017-02-12 20:12:51'),
(210, 1, 'en', 'validation', 'max.string', 'The :attribute may not be greater than :max characters.', '2017-02-12 20:12:51', '2017-02-12 20:12:51'),
(211, 1, 'en', 'validation', 'max.array', 'The :attribute may not have more than :max items.', '2017-02-12 20:12:51', '2017-02-12 20:12:51'),
(212, 1, 'en', 'validation', 'mimes', 'The :attribute must be a file of type: :values.', '2017-02-12 20:12:51', '2017-02-12 20:12:51'),
(213, 1, 'en', 'validation', 'min.numeric', 'The :attribute must be at least :min.', '2017-02-12 20:12:51', '2017-02-12 20:12:51'),
(214, 1, 'en', 'validation', 'min.file', 'The :attribute must be at least :min kilobytes.', '2017-02-12 20:12:51', '2017-02-12 20:12:51'),
(215, 1, 'en', 'validation', 'min.string', 'The :attribute must be at least :min characters.', '2017-02-12 20:12:51', '2017-02-12 20:12:51'),
(216, 1, 'en', 'validation', 'min.array', 'The :attribute must have at least :min items.', '2017-02-12 20:12:52', '2017-02-12 20:12:52'),
(217, 1, 'en', 'validation', 'not_in', 'The selected :attribute is invalid.', '2017-02-12 20:12:52', '2017-02-12 20:12:52'),
(218, 1, 'en', 'validation', 'numeric', 'The :attribute must be a number.', '2017-02-12 20:12:52', '2017-02-12 20:12:52'),
(219, 1, 'en', 'validation', 'regex', 'The :attribute format is invalid.', '2017-02-12 20:12:52', '2017-02-12 20:12:52'),
(220, 1, 'en', 'validation', 'required', 'The :attribute field is required.', '2017-02-12 20:12:52', '2017-02-12 20:12:52'),
(221, 1, 'en', 'validation', 'required_if', 'The :attribute field is required when :other is :value.', '2017-02-12 20:12:52', '2017-02-12 20:12:52'),
(222, 1, 'en', 'validation', 'required_with', 'The :attribute field is required when :values is present.', '2017-02-12 20:12:53', '2017-02-12 20:12:53'),
(223, 1, 'en', 'validation', 'required_with_all', 'The :attribute field is required when :values is present.', '2017-02-12 20:12:53', '2017-02-12 20:12:53'),
(224, 1, 'en', 'validation', 'required_without', 'The :attribute field is required when :values is not present.', '2017-02-12 20:12:53', '2017-02-12 20:12:53'),
(225, 1, 'en', 'validation', 'required_without_all', 'The :attribute field is required when none of :values are present.', '2017-02-12 20:12:53', '2017-02-12 20:12:53'),
(226, 1, 'en', 'validation', 'same', 'The :attribute and :other must match.', '2017-02-12 20:12:53', '2017-02-12 20:12:53'),
(227, 1, 'en', 'validation', 'size.numeric', 'The :attribute must be :size.', '2017-02-12 20:12:53', '2017-02-12 20:12:53'),
(228, 1, 'en', 'validation', 'size.file', 'The :attribute must be :size kilobytes.', '2017-02-12 20:12:53', '2017-02-12 20:12:53'),
(229, 1, 'en', 'validation', 'size.string', 'The :attribute must be :size characters.', '2017-02-12 20:12:53', '2017-02-12 20:12:53'),
(230, 1, 'en', 'validation', 'size.array', 'The :attribute must contain :size items.', '2017-02-12 20:12:54', '2017-02-12 20:12:54'),
(231, 1, 'en', 'validation', 'unique', 'The :attribute has already been taken.', '2017-02-12 20:12:54', '2017-02-12 20:12:54'),
(232, 1, 'en', 'validation', 'url', 'The :attribute format is invalid.', '2017-02-12 20:12:54', '2017-02-12 20:12:54'),
(233, 1, 'en', 'validation', 'timezone', 'The :attribute must be a valid zone.', '2017-02-12 20:12:54', '2017-02-12 20:12:54'),
(234, 1, 'en', 'validation', 'custom.attribute-name.rule-name', 'custom-message', '2017-02-12 20:12:55', '2017-02-12 20:12:55');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `users`
--

INSERT INTO `users` (`id`, `role_id`, `email`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'vusaltrue@gmail.com', 'Vusal Orujov', '$2y$10$mUTNJf0c1hrx0G1IvE8MK.VjTaTyphgZho4RA2ToMMr75PFToYT/i', NULL, '2017-02-12 08:45:23', '2017-02-12 08:45:23'),
(2, 1, 'aziz@azizli.com', 'Aziz Azizli', '$2y$10$xiw4XRAOKRsK9kMbPzveye6cK6IcHmG4ouYj7awucOoWXVKa9PYE.', NULL, '2017-02-12 08:45:24', '2017-02-12 08:45:24');

--
-- Indexes for dumped tables
--

--
-- Cədvəl üçün indekslər `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Cədvəl üçün indekslər `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- Cədvəl üçün AUTO_INCREMENT `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Cədvəl üçün AUTO_INCREMENT `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Cədvəl üçün AUTO_INCREMENT `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Cədvəl üçün AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Cədvəl üçün AUTO_INCREMENT `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Cədvəl üçün AUTO_INCREMENT `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Cədvəl üçün AUTO_INCREMENT `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Cədvəl üçün AUTO_INCREMENT `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;
--
-- Cədvəl üçün AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
