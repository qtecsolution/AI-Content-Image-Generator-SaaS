-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2023 at 01:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ai_writer_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_description` tinytext DEFAULT NULL,
  `description` longtext NOT NULL,
  `is_published` tinyint(4) NOT NULL DEFAULT 1,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `tags`, `image`, `meta_description`, `description`, `is_published`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum', 'lorem-ipsum', 'Lorem ipsum', 'assets/uploads/blogs/2023/03/30/16801697871791.jpg', 'Lorem ipsum', '\"Lorem ipsum\" is a placeholder text used in the publishing and graphic design industries to demonstrate the visual effects of different typefaces and layouts without using meaningful content. The text is derived from Cicero\'s \"De Finibus Bonorum et Malorum\" (On the Ends of Good and Evil), a philosophical treatise on ethics and morality. The words themselves are essentially meaningless, but they have been scrambled and altered to create a passage of text that resembles Latin.', 1, 1, 1, '2023-03-30 09:40:13', '2023-03-30 09:49:47'),
(2, 'A new era of transparency for Twitter', 'a-new-era-of-transparency-for-twitter', 'test, test 2', 'assets/uploads/blogs/2023/04/01/16803271573959.png', 'A new era of transparency for Twitter', '<p style=\"background-repeat: no-repeat; padding-bottom: 1.5rem; font-family: &quot;Helvetica Neue LT&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 0.9975rem; line-height: 1.5rem; letter-spacing: 0.025rem; color: rgb(101, 119, 134);\">At&nbsp;<a href=\"https://blog.twitter.com/en_us/topics/company/2022/twitter-2-0-our-continued-commitment-to-the-public-conversation\" style=\"background-repeat: no-repeat; text-decoration: none; color: rgb(29, 161, 242); transition: color 0.3s ease-in-out 0s;\">Twitter 2.0</a>, we believe that we have a responsibility, as the town square of the internet, to make our platform transparent. So today we are taking the first step in a new era of transparency and opening much of our source code to the global community.</p><p style=\"background-repeat: no-repeat; padding-bottom: 1.5rem; font-family: &quot;Helvetica Neue LT&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 0.9975rem; line-height: 1.5rem; letter-spacing: 0.025rem; color: rgb(101, 119, 134);\">On&nbsp;<a href=\"https://github.com/twitter/\" style=\"background-repeat: no-repeat; text-decoration: none; color: rgb(29, 161, 242); transition: color 0.3s ease-in-out 0s;\">GitHub</a>, you’ll find two new repositories (<a href=\"https://github.com/twitter/the-algorithm/\" style=\"background-repeat: no-repeat; text-decoration: none; color: rgb(29, 161, 242); transition: color 0.3s ease-in-out 0s;\">main repo</a>,&nbsp;<a href=\"https://github.com/twitter/the-algorithm-ml\" style=\"background-repeat: no-repeat; text-decoration: none; color: rgb(29, 161, 242); transition: color 0.3s ease-in-out 0s;\">ml repo</a>) containing the source code for many parts of Twitter, including our recommendations algorithm, which controls the Tweets you see on the For You timeline. We’re also sharing more information on our recommendation algorithm in&nbsp;<a href=\"https://blog.twitter.com/engineering/en_us/topics/open-source/2023/twitter-recommendation-algorithm\" style=\"background-repeat: no-repeat; text-decoration: none; color: rgb(29, 161, 242); transition: color 0.3s ease-in-out 0s;\">this post</a>&nbsp;on our Engineering Blog. For this release, we aimed for the highest possible degree of transparency, while excluding any code that would compromise user safety and privacy or the ability to protect our platform from bad actors, including undermining our efforts at combating child sexual exploitation and manipulation. Today’s release also does not include the code that powers our ad recommendations.</p><p style=\"background-repeat: no-repeat; padding-bottom: 1.5rem; font-family: &quot;Helvetica Neue LT&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 0.9975rem; line-height: 1.5rem; letter-spacing: 0.025rem; color: rgb(101, 119, 134);\">We also took additional steps to ensure that user safety and privacy would be protected, including our decision not to release training data or model weights associated with the Twitter algorithm at this point.</p>', 1, 1, 1, '2023-04-01 05:32:37', '2023-04-01 05:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `is_published` tinyint(4) NOT NULL DEFAULT 1,
  `meta_description` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `tags`, `is_published`, `meta_description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'test', 'Test', 1, 'Test', 1, '2023-03-30 09:19:56', '2023-03-30 09:19:56'),
(2, 'Test 2', 'test-2', 'Test 2', 1, 'Test 2', 1, '2023-03-30 09:20:03', '2023-03-30 09:20:03'),
(3, 'Test 3', 'test-3', 'Test 3', 1, 'Test 3', 1, '2023-03-30 09:20:09', '2023-03-30 09:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `content_histories`
--

CREATE TABLE `content_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `use_case_id` bigint(20) UNSIGNED NOT NULL,
  `temperature` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `prompt` text NOT NULL,
  `generated_content` longtext NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_histories`
--

INSERT INTO `content_histories` (`id`, `use_case_id`, `temperature`, `title`, `keywords`, `description`, `prompt`, `generated_content`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '0.7', 'test content', 'test content', 'test content', 'Write me product description with keywords test content. The title of product is \"test content\" and the description: test content', '\n\nTest Content is an innovative solution for managing and testing your content. Featuring powerful tools for testing, analysis, and optimization, Test Content makes it easy to ensure your content is up to date and accurate. With Test Content, you can quickly identify errors, gaps, and inconsistencies in your content and make necessary adjustments to ensure a consistent and quality user experience. Test Content is designed to help you stay on top of changes to your content and ensure that your content is always accurate and up to date. With its intuitive interface and powerful tools, Test Content makes it easy to test and manage your content.', 2, '2023-03-12 07:20:26', '2023-03-12 07:20:26'),
(2, 1, '0.7', 'test content', 'test content', 'test content', 'Write me product description with keywords test content. The title of product is \"test content\" and the description: test content', '\n\nThis amazing test content is a must-have for any serious tester! It provides an easy-to-use interface that allows you to quickly and accurately test your content. With its intuitive design, you can quickly run tests to check for errors, typos, and other discrepancies. Plus, you can use it to create a range of different test scenarios to make sure your content meets the highest quality standards. With test content, you can rest assured that your content will be up to the mark every time. Get test content today and take your testing to the next level!', 2, '2023-03-12 07:21:28', '2023-03-12 07:21:28'),
(3, 1, '0.7', 'About Bangladesh', 'bangladesh', 'About bangladesh politics.', 'Write me product description with keywords bangladesh. The title of product is \"About Bangladesh\" and the description: About bangladesh politics.', '\n\nWelcome to \"About Bangladesh,\" your one-stop source for all the latest news and information about the politics of this South Asian country. Bangladesh is a rapidly developing nation with a unique history and culture. This vibrant country is made up of a diverse population, with a range of different political ideologies and parties vying for power in the country\'s democratic institutions. Here you will find comprehensive coverage of Bangladesh\'s political landscape, including news on major political events, elections, and government policies. Our mission is to provide you with the latest and most up-to-date information on the country\'s political scene so you can stay informed and engaged. So, if you\'re looking for an in-depth look at the politics of Bangladesh, you\'ve come to the right place.', 2, '2023-03-12 07:23:20', '2023-03-12 07:23:20'),
(6, 50, '0.7', 'Appointment Letter', 'Laravel, PHP, Javascript', 'Job position laravel developer. Joining date 2 april 2023. Salary 30k. Probational period 4 month. Salary will increment after probational period.', 'Provide me with Email Body Generator that includes the given keywords Laravel, PHP, Javascript. The title of the Email Body Generator\nshould be\"Appointment Letter\", and the description should be \" Job position laravel developer. Joining date 2 april 2023. Salary 30k. Probational period 4 month. Salary will increment after probational period.\". The tone of voice should be casual, and the language used should be English (USA). Please provide me with the details for each element.', '\n\nSubject Line: Appointment Letter\n\nDear [Name],\n\nWe are delighted to offer you the position of Laravel Developer with us. Your joining date will be 2 April 2023.\n\nYour annual gross salary will be 30K. You will be placed on a probationary period of 4 months, after which your salary will be incrementally reviewed.\n\nYou will be expected to be proficient in Laravel, PHP, and Javascript. Your technical skills will be put to the test and you must be able to demonstrate your expertise in these languages.\n\nWe look forward to your contribution to the team and the successful completion of your probationary period.\n\nWarm regards,\n[Company Name]', 1, '2023-04-01 08:30:27', '2023-04-01 08:30:27'),
(7, 50, '0.7', 'Appointment Letter', 'Laravel, PHP, Javascript', 'Job position laravel developer. Joining date 2 april 2023. Salary 30k. Probational period 4 month. Salary will increment after probational period.', 'Provide me with Email Body Generator that includes the given keywords Laravel, PHP, Javascript. The title of the Email Body Generator\nshould be\"Appointment Letter\", and the description should be \" Job position laravel developer. Joining date 2 april 2023. Salary 30k. Probational period 4 month. Salary will increment after probational period.\". The tone of voice should be casual, and the language used should be English (USA). Please provide me with the details for each element.', '\n\nSubject Line: Appointment as a Laravel Developer\n\nEmail Body:\n\nDear [Name], \n\nWe are delighted to offer you the position of Laravel Developer at our company.\n\nYou will be joining us on April 2nd, 2023. The salary for the position is 30k and the probation period is 4 months. After the probation period, the salary will increase.\n\nWe are looking forward to having you onboard, and we will provide you with the necessary training for the job. You will be working with a team of experienced professionals, using the latest technologies such as Laravel, PHP, and JavaScript.\n\nIf you have any questions, please do not hesitate to contact us.\n\nWe are excited to welcome you to our team!\n\nRegards, \n[Company Name]', 1, '2023-04-01 08:35:52', '2023-04-01 08:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `priority` int(11) NOT NULL,
  `is_published` tinyint(4) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `priority`, `is_published`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'asdf', 'asdfasd', 1, 1, 1, '2023-04-02 11:00:30', '2023-04-02 11:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prompt` varchar(255) DEFAULT NULL,
  `size` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `old_image` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `prompt`, `size`, `image_path`, `old_image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'A muslim man wear punjabi & tupi', '512x512', 'assets/uploads/ai_images//2023/03/30/202303307515.png', NULL, 1, '2023-03-30 10:16:41', '2023-03-30 10:16:41'),
(2, 'A muslim man wear punjabi & tupi', '512x512', 'assets/uploads/ai_images//2023/03/30/202303307819.png', NULL, 1, '2023-03-30 10:16:43', '2023-03-30 10:16:43'),
(3, 'A muslim man wear punjabi & tupi', '512x512', 'assets/uploads/ai_images//2023/03/30/202303309608.png', NULL, 1, '2023-03-30 10:19:32', '2023-03-30 10:19:32'),
(4, 'A muslim man wear punjabi & tupi', '512x512', 'assets/uploads/ai_images//2023/03/30/20230330671.png', NULL, 1, '2023-03-30 10:19:55', '2023-03-30 10:19:55'),
(5, 'A men use perfume', '256x256', 'assets/uploads/ai_images//2023/03/30/20230330726.png', NULL, 1, '2023-03-30 10:23:11', '2023-03-30 10:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(255) NOT NULL,
  `language_code` varchar(255) NOT NULL,
  `language_flag` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `language_code`, `language_flag`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Arabic', 'ar-AE', '/img/flags/ae.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(2, 'Chinese (Mandarin)', 'cmn-CN', '/img/flags/cn.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(3, 'Croatian (Croatia)', 'hr-HR', '/img/flags/hr.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(4, 'Czech (Czech Republic)', 'cs-CZ', '/img/flags/cz.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(5, 'Danish (Denmark)', 'da-DK', '/img/flags/dk.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(6, 'Dutch (Belgium)', 'nl-BE', '/img/flags/be.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(7, 'English (USA)', 'en-US', '/img/flags/us.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(8, 'Estonian (Estonia)', 'et-EE', '/img/flags/ee.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(9, 'Finnish (Finland)', 'fi-FI', '/img/flags/fi.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(10, 'French (France)', 'fr-FR', '/img/flags/fr.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(11, 'German (Germany)', 'de-DE', '/img/flags/de.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(12, 'Greek (Greece)', 'el-GR', '/img/flags/gr.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(13, 'Hebrew (Israel)', 'he-IL', '/img/flags/il.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(14, 'Hindi (India)', 'hi-IN', '/img/flags/in.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(15, 'Hungarian (Hungary)', 'hu-HU', '/img/flags/hu.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(16, 'Icelandic (Iceland)', 'is-IS', '/img/flags/is.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(17, 'Indonesian (Indonesia)', 'id-ID', '/img/flags/id.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(18, 'Italian (Italy)', 'it-IT', '/img/flags/it.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(19, 'Japanese (Japan)', 'ja-JP', '/img/flags/jp.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(20, 'Korean (South Korea)', 'ko-KR', '/img/flags/kr.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(21, 'Malay (Malaysia)', 'ms-MY', '/img/flags/my.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(22, 'Norwegian (Norway)', 'nb-NO', '/img/flags/no.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(23, 'Polish (Poland)', 'pl-PL', '/img/flags/pl.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(24, 'Portuguese (Portugal)', 'pt-PT', '/img/flags/pt.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(25, 'Russian (Russia)', 'ru-RU', '/img/flags/ru.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(26, 'Spanish (Spain)', 'es-ES', '/img/flags/es.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(27, 'Swedish (Sweden)', 'sv-SE', '/img/flags/se.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(28, 'Turkish (Turkey)', 'tr-TR', '/img/flags/tr.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45'),
(29, 'Bengali', 'Ban', '/img/flags/ban.svg', 1, '2023-03-07 12:35:45', '2023-03-07 12:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_203324_create_pages_table', 1),
(7, '2020_05_21_203341_create_page_contents_table', 1),
(8, '2023_02_22_061202_create_plans_table', 1),
(9, '2023_02_22_075651_create_orders_table', 1),
(10, '2023_02_22_075705_create_plan_expanses_table', 1),
(11, '2023_02_22_085004_create_use_cases_table', 1),
(12, '2023_02_22_085952_create_user_documents_table', 1),
(13, '2023_02_26_160830_create_images_table', 1),
(14, '2023_02_27_135429_create_content_histories_table', 1),
(15, '2023_03_01_172545_create_blog_categories_table', 1),
(16, '2023_03_01_172546_create_blogs_table', 1),
(17, '2023_03_02_122318_create_faqs_table', 1),
(18, '2023_03_06_190539_create_languages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `total` double(10,2) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice`, `user_id`, `plan_id`, `is_paid`, `total`, `payment_method`, `other`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, '1678193209-12775', 1, 1, 1, 0.00, 'Free', NULL, 'Admin', 'admin@gmail.com', NULL, NULL, '2023-03-07 12:46:49', '2023-03-07 12:46:49'),
(2, '1678600859-60153', 1, 1, 1, 0.00, 'Free', NULL, 'Admin', 'admin@gmail.com', NULL, NULL, '2023-03-12 06:00:59', '2023-03-12 06:00:59'),
(3, '1678602552-73413', 2, 1, 1, 0.00, 'Free', NULL, 'New User', 'new@gmail.com', NULL, NULL, '2023-03-12 06:29:12', '2023-03-12 06:29:12'),
(4, '1680159317-26536', 1, 2, 0, 10.00, 'bank', NULL, NULL, NULL, NULL, NULL, '2023-03-30 06:55:17', '2023-03-30 06:55:17'),
(5, '1680326664-56817', 1, 1, 1, 0.00, 'Free', NULL, 'Admin', 'admin@gmail.com', NULL, NULL, '2023-04-01 05:24:24', '2023-04-01 05:24:24'),
(6, '1680340610-59742', 1, 1, 1, 0.00, 'Free', NULL, 'Admin', 'admin@gmail.com', '018119581215', 'Dhaka, Bangladesh', '2023-04-01 09:16:50', '2023-04-01 09:16:50'),
(7, '1680341236-17910', 1, 1, 1, 0.00, 'Free', NULL, 'Admin', 'admin@gmail.com', '018119581215', 'Dhaka, Bangladesh', '2023-04-01 09:27:16', '2023-04-01 09:27:16'),
(8, '1680341260-38775', 1, 1, 1, 0.00, 'Free', NULL, 'Admin', 'admin@gmail.com', '018119581215', 'Dhaka, Bangladesh', '2023-04-01 09:27:40', '2023-04-01 09:27:40'),
(9, '1680344538-73028', 1, 2, 1, 10.00, 'bank', NULL, NULL, NULL, NULL, NULL, '2023-04-01 10:22:18', '2023-04-01 10:23:50'),
(10, '1680347262-49175', 3, 1, 1, 0.00, 'Free', NULL, 'NM Babor', 'nmbabor501@gmail.com', NULL, NULL, '2023-04-01 11:07:42', '2023-04-01 11:07:42'),
(11, '1680411533-11880', 4, 1, 1, 0.00, 'Free', NULL, 'NM Babor 1', 'nmbabor150@gmail.com', NULL, NULL, '2023-04-02 04:58:53', '2023-04-02 04:58:53'),
(12, '1680411575-57623', 5, 1, 1, 0.00, 'Free', NULL, 'New User', 'new50@gmail.com', NULL, NULL, '2023-04-02 04:59:35', '2023-04-02 04:59:35'),
(13, '1680414303-15567', 6, 1, 1, 0.00, 'Free', NULL, 'Blake Mullen', 'pywik@mailinator.com', NULL, NULL, '2023-04-02 05:45:03', '2023-04-02 05:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_authorize` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `meta_keys` mediumtext DEFAULT NULL,
  `meta_title` mediumtext DEFAULT NULL,
  `meta_image` varchar(255) DEFAULT NULL,
  `meta_desc` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `is_authorize`, `active`, `meta_keys`, `meta_title`, `meta_image`, `meta_desc`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', 'privacy-policy', 0, 1, 'Privacy Policy', 'Privacy Policy', NULL, 'Privacy Policy', '2023-03-07 12:45:51', '2023-03-07 12:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `page_contents`
--

CREATE TABLE `page_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `body` longtext DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `meta_image` varchar(255) DEFAULT NULL,
  `meta_keys` longtext DEFAULT NULL,
  `meta_desc` longtext DEFAULT NULL,
  `sorting` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contents`
--

INSERT INTO `page_contents` (`id`, `title`, `page_id`, `body`, `active`, `meta_image`, `meta_keys`, `meta_desc`, `sorting`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy 1', 1, '<p>Privacy Policy&nbsp;Privacy Policy&nbsp;Privacy Policy<br></p>', 1, NULL, NULL, NULL, 0, '2023-03-07 12:46:06', '2023-03-07 12:46:06'),
(2, 'test', 1, '<p>test</p>', 1, NULL, NULL, NULL, 0, '2023-03-30 06:28:26', '2023-03-30 06:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `word_count` int(11) NOT NULL DEFAULT 0,
  `call_api_count` int(11) NOT NULL DEFAULT 0,
  `documet_count` int(11) NOT NULL DEFAULT 0,
  `lang` enum('all','english') NOT NULL DEFAULT 'english',
  `image_count` int(11) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `user_id`, `name`, `word_count`, `call_api_count`, `documet_count`, `lang`, `image_count`, `is_published`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Free Plan', 200, 200, 10, 'english', 5, 1, 0.00, '2023-03-07 12:42:04', '2023-03-07 12:44:52'),
(2, 1, 'Basic Plan', 100, 100, 10, 'english', 5, 1, 10.00, '2023-03-12 06:11:21', '2023-03-12 06:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `plan_expenses`
--

CREATE TABLE `plan_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `word_count` int(11) NOT NULL DEFAULT 0,
  `call_api_count` int(11) NOT NULL DEFAULT 0,
  `current_api_count` int(11) NOT NULL DEFAULT 0,
  `documet_count` int(11) NOT NULL DEFAULT 0,
  `current_documet_count` int(11) NOT NULL DEFAULT 0,
  `lang` enum('all','english') NOT NULL DEFAULT 'english',
  `image_count` int(11) NOT NULL DEFAULT 0,
  `current_image_count` int(11) NOT NULL DEFAULT 0,
  `activated_at` datetime DEFAULT NULL,
  `expire_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_expenses`
--

INSERT INTO `plan_expenses` (`id`, `user_id`, `order_id`, `plan_id`, `word_count`, `call_api_count`, `current_api_count`, `documet_count`, `current_documet_count`, `lang`, `image_count`, `current_image_count`, `activated_at`, `expire_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 200, 200, 0, 10, 0, 'english', 5, 0, '2023-03-07 18:46:49', '2023-04-06 18:46:49', '2023-03-07 12:46:49', '2023-03-07 12:46:49'),
(2, 1, 2, 1, 200, 400, 2, 20, 2, 'english', 10, 5, '2023-03-12 12:00:59', '2023-04-11 12:00:59', '2023-03-12 06:00:59', '2023-03-30 10:23:11'),
(3, 2, 3, 1, 200, 200, 1, 10, 1, 'english', 5, 0, '2023-03-12 12:29:12', '2023-04-11 12:29:12', '2023-03-12 06:29:12', '2023-03-12 07:23:53'),
(4, 1, 5, 1, 200, 598, 2, 28, 1, 'english', 10, 0, '2023-04-01 11:24:24', '2023-05-01 11:24:24', '2023-04-01 05:24:24', '2023-04-01 08:35:52'),
(5, 1, 6, 1, 200, 796, 0, 37, 0, 'english', 15, 0, '2023-04-01 15:16:50', '2023-05-01 15:16:50', '2023-04-01 09:16:50', '2023-04-01 09:16:50'),
(6, 1, 7, 1, 200, 996, 0, 47, 0, 'english', 20, 0, '2023-04-01 15:27:16', '2023-05-01 15:27:16', '2023-04-01 09:27:16', '2023-04-01 09:27:16'),
(7, 1, 8, 1, 200, 1196, 0, 57, 0, 'english', 25, 0, '2023-04-01 15:27:40', '2023-05-01 15:27:40', '2023-04-01 09:27:40', '2023-04-01 09:27:40'),
(8, 1, 9, 2, 100, 1296, 0, 67, 0, 'english', 30, 0, '2023-04-01 16:23:50', '2023-05-01 16:23:50', '2023-04-01 10:23:50', '2023-04-01 10:23:50'),
(9, 3, 10, 1, 200, 200, 0, 10, 0, 'english', 5, 0, '2023-04-01 17:07:42', '2023-05-01 17:07:42', '2023-04-01 11:07:42', '2023-04-01 11:07:42'),
(10, 4, 11, 1, 200, 200, 0, 10, 0, 'english', 5, 0, '2023-04-02 10:58:53', '2023-05-02 10:58:53', '2023-04-02 04:58:53', '2023-04-02 04:58:53'),
(11, 5, 12, 1, 200, 200, 0, 10, 0, 'english', 5, 0, '2023-04-02 10:59:35', '2023-05-02 10:59:35', '2023-04-02 04:59:35', '2023-04-02 04:59:35'),
(12, 6, 13, 1, 500, 10, 0, 5, 0, 'english', 5, 0, '2023-04-02 11:45:03', '2023-05-02 11:45:03', '2023-04-02 05:45:03', '2023-04-02 05:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `type` enum('admin','user') NOT NULL DEFAULT 'user',
  `plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `google_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_expense_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `avatar`, `type`, `plan_id`, `order_id`, `google_id`, `plan_expense_id`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '018119581215', 'Dhaka, Bangladesh', 'assets/uploads/user/2023/04/01/admin4935.jpg', 'admin', 2, NULL, NULL, 8, '$2y$10$z4XTOWUoJJg7QxVbECp0webSOF2WKUzfqOeehFOVFp0WH4QuBDmAq', NULL, NULL, '2023-03-07 12:36:44', '2023-04-01 10:23:50'),
(2, 'New User', 'new@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 3, '$2y$10$kAMNxVB7zoHjXJOkrs2ADuAg.EfK7MGmkGldy64G0f7q0r5AKb39K', NULL, NULL, '2023-03-12 06:17:47', '2023-03-12 06:29:12'),
(3, 'NM Babor', 'nmbabor501@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 9, '$2y$10$5w3e9Wz6keIg1QQEGDjHF.AdDPWp9L.jWGWK/3iBRhwArrgIduVh6', NULL, NULL, '2023-04-01 11:07:25', '2023-04-01 11:07:42'),
(4, 'NM Babor 1', 'nmbabor150@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 10, '$2y$10$VBPLd1RVip3WvShiNe98w.dP9rbgQrIn1BBCfLS6..EEqZW1FRAdi', NULL, NULL, '2023-04-02 04:23:15', '2023-04-02 04:58:53'),
(5, 'New User', 'new50@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 11, '$2y$10$/W5eqa1TroZcQc.l/aupZuTy9v80D0TJJrV6GzfXppUjQvqb/jgjG', NULL, NULL, '2023-04-02 04:59:35', '2023-04-02 04:59:35'),
(6, 'Blake Mullen', 'pywik@mailinator.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 12, '$2y$10$pn2Ui/DgNIZiWerPFHb1muLpE.Cf2ighxBXTPYOCF6.HZuCOzFice', NULL, NULL, '2023-04-02 05:45:03', '2023-04-02 05:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE `user_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `generated_content` longtext NOT NULL,
  `use_case_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_documents`
--

INSERT INTO `user_documents` (`id`, `title`, `keywords`, `description`, `generated_content`, `use_case_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Appointment Letter', 'Laravel, PHP, Javascript', 'Job position laravel developer. Joining date 2 april 2023. Salary 30k. Probational period 4 month. Salary will increment after probational period.', 'Subject Line: Appointment Letter\r\n\r\nDear [Name],\r\n\r\nWe are delighted to offer you the position of Laravel Developer with us. Your joining date will be 2 April 2023.\r\n\r\nYour annual gross salary will be 30K. You will be placed on a probationary period of 4 months, after which your salary will be incrementally reviewed.\r\n\r\nYou will be expected to be proficient in Laravel, PHP, and Javascript. Your technical skills will be put to the test and you must be able to demonstrate your expertise in these languages.\r\n\r\nWe look forward to your contribution to the team and the successful completion of your probationary period.\r\n\r\nWarm regards,\r\n[Company Name]', 50, 1, '2023-04-01 08:35:50', '2023-04-01 08:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `use_cases`
--

CREATE TABLE `use_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `prompt` text NOT NULL,
  `input_fields` varchar(255) NOT NULL DEFAULT '1,2,3',
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `use_cases`
--

INSERT INTO `use_cases` (`id`, `title`, `icon`, `details`, `prompt`, `input_fields`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'Blog Titles', 'assets/uploads/useCases/BlogTitles.png', 'Compose a complete blog piece (a few paragraphs) about one of your article\'s subheadings.', 'Write me a blog title with keywords [keywords] and the description: is [description]. The tone of voice must be: [tone]. Give me the response in [language] language.', '2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(2, 'Blog Section', 'assets/uploads/useCases/BlogSection.png', 'Describe in detail a subheading from your article in a blog section (a few paragraphs).', 'Write me a blog section with keywords [keywords]. The title of the blog is \"[title]\".The tone of voice must be: [tone]. Give me the response in [language] language.', '1,2', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(3, 'Blog Ideas', 'assets/uploads/useCases/BlogIdeas.png', 'The ideal instrument for beginning to write excellent articles. Develop unique thoughts for your upcoming post.', 'Write me some blog ideas with these keywords [keywords]. The title of the blog is \"[title]\" and the description: is [description]. The tone of voice must be: [tone]. Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(4, 'Blog Intros', 'assets/uploads/useCases/BlogIntros.png', 'Create an introduction that will encourage readers to continue to reads your content.', 'Write me blog intros with these keywords [keywords]. The title of the blog is \"[title]\" and the description: is [description]. The tone of voice must be: [tone]. Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(5, 'Blog Conclusion', 'assets/uploads/useCases/BlogConclusion.png', 'Your blog content should conclude with a captivating paragraph.', 'Provide me with a blog conclusion that includes the given keywords [keywords]. The title of the blog is \"[title]\". The tone of voice should be [tone],  Give me the response in [language] language.', '1,2', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(6, 'Facebook Ads', 'assets/uploads/useCases/FacebookAds.png', 'Creating Facebook ads using your target market in mind will increase your conversion rate.', 'Provide me with Facebook Ads ideas for my  [title]. The description of my product/service is [description]. The tone of voice should be [tone], Give me the response in [language] language.', '1,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(7, 'Article Generator', 'assets/uploads/useCases/ArticleGenerator.png', 'Write an article of the best quality using a title and an outline in a short amount of time.', 'Write me an Article that includes the given keywords [keywords]. The title of the Article is \"[title]\", and the description should be \"[description]\". The tone of voice should be [tone],  Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(8, 'Content Rewriter', 'assets/uploads/useCases/ContentRewriter.png', 'Rewrite a piece of material to make it more intriguing, original, and compelling.', '[Description] Rewrite this content to make it more intriguing, original, and compelling. The tone of voice should be [tone], Give me the response in [language] language.', '3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(9, 'Paragraph Generator', 'assets/uploads/useCases/ParagraphGenerator.png', 'Create sentences on any subject, with a keyword, and in a certain voice.', 'Write me a Paragraph that includes the given keywords [keywords]. The title of the Paragraph is \"[title]\", The tone of voice should be [tone], Give me the response in [language] language.', '1,2', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(10, 'Talking Points', 'assets/uploads/useCases/TalkingPoints.png', 'For your article\'s subheadings, create bullet points that are brief, clear, and instructive.', 'Provide me with Talking Points that include the given keywords [keywords]. The title of the Talking Points\nshould be \"[title]\", and the description should be \"[description]\". The tone of voice should be [tone], Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(11, 'Pros & Cons for blogs', 'assets/uploads/useCases/Pros&Cons.png', 'For your blog piece, list the pros and cons of a service, goods, or website.', 'Write me the pros and cons of [title] The tone of voice should be [tone], and Give me the response in [language] language.', '1', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(12, 'Summarize Text', 'assets/uploads/useCases/SummarizeText.png', 'Summarize any text in a clear, succinct, and understandable manner.', 'Summarize this paragraph [title]. The tone of voice should be [tone], Give me the response in [language] language.', '3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(13, 'Product Description', 'assets/uploads/useCases/ProductDescription.png', 'Create a description of your product that explains its value.', 'Write me a product description for [title]. The category of the product is [keyword]. The description of the product is [Description] The tone of voice should be [tone],  Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(14, 'Startup Name Generator', 'assets/uploads/useCases/StartupNameGenerator.png', 'Create interesting, original, and memorable names for your startup in a matter of seconds.', 'Generate some cool, creative, and catchy names for a startup business. The type/sector of business is [ Description]. Give me the response in [language] language.', '3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(15, 'Product Name Generator', 'assets/uploads/useCases/ProductNameGenerator.png', 'Using illustrative words, come up with inventive product names', 'Create creative product names that include the given keywords [keywords]\". The description of the product is  \" [description]\". The tone of voice should be [tone],  Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(16, 'SEO Meta Description', 'assets/uploads/useCases/MetaDescription.png', 'Based on the description, create a meta description that is SEO-friendly.', 'Provide me with SEO-friendly Meta Description for my product/service named [title] The description of my product/service is \" [description]\". The tone of voice should be [tone], Give me the response in [language] language.', '1,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(17, 'FAQs', 'assets/uploads/useCases/FAQs.png', 'Create commonly asked questions based on the description of your product.', 'Generate some Frequently asked questions for my product named [title]. The product description is \" [description]\". The tone of voice should be [tone], Give me the response in [language] language.', '1,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(18, 'FAQ Answers', 'assets/uploads/useCases/FAQAnswers.png', 'Generate creative answers to questions (FAQs) about your business or website.', 'Generate creative answers to this Frequently Asked Question [title]. The tone of voice should be [tone], and the language used should be [language]. Give me the response in [language] language.', '1', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(19, 'Testimonials/Reviews', 'assets/uploads/useCases/TestimonialsReviews.png', 'User testimonials will give your website social evidence.', 'Write a testimonial/review for a product named [title]. The description of the product is [Description]. The tone of voice should be [tone], Give me the response in [language] language.', '1,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(20, 'YouTube Video Descriptions', 'assets/uploads/useCases/VideoDescriptions.png', 'Catchy and persuasive YouTube descriptions that help your videos rank higher.', 'Write me a Video Description for a Youtube video. The title of the Video is\n\"[title]\", and the video is about [Description]. The tone of voice should be [tone], Give me the response in [language] language.', '1,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(21, 'Video Titles', 'assets/uploads/useCases/VideoTitles.png', 'To get everyone\'s attention, create a catchy title for your video.', 'Write me a catchy Video title for my video. The video is about [title]. The tone of voice should be [tone], Give me the response in [language] language.', '1', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(22, 'Youtube Tags Generator', 'assets/uploads/useCases/YoutubeTagsGenerator.png', 'Create YouTube tags and phrases that are ideal for SEO.', 'Generate Youtube Tag for a video named [Title]. The video is about [Description]\". The tone of voice should be [tone], Give me the response in [language] language.', '1,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(23, 'Youtube Captions/Titles', 'assets/uploads/useCases/YoutubeCaptions.png', 'Create engaging YouTube captions to get viewers to your video.', 'Write me a Video caption for a Youtube video. The video is about [title]. The tone of voice should be [tone], Give me the response in [language] language.', '1', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(24, 'Youtube Hashtag Generator', 'assets/uploads/useCases/YoutubeHashtagGenerator.png', 'Create YouTube tags and phrases that are ideal for SEO.', 'Generate Youtube Hashtag for a video named [Title]. The video is about [Description]\". The tone of voice should be [tone], Give me the response in [language] language.', '1,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(25, 'Instagram Captions', 'assets/uploads/useCases/InstagramCaptions.png', 'Create engaging Instagram Captions to get viewers to your video.', 'Generate an Instagram caption for a post about [title] The tone of voice should be [tone], Give me the response in [language] language.', '1', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(26, 'Instagram Hashtags Generator', 'assets/uploads/useCases/InstagramHashtagsGenerator.png', 'Create Instagram tags and phrases that are ideal for SEO.', 'Generate an Instagram hashtag for a post about [title] The tone of voice should be [tone], Give me the response in [language] language.', '1', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(27, 'Social Media Post (Personal)', 'assets/uploads/useCases/SocialMediaPost(Personal).png', 'Create a personal social media post that will appear on any platform.', 'Generate a Social Media Post for my personal account. The post is about [title] The tone of voice should be [tone], Give me the response in [language] language.', '1', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(28, 'Social Media Post (Business)', 'assets/uploads/useCases/SocialMediaPost(Business).png', 'Create a business social media post that will appear on any platform.', 'Generate a Social Media Post for my Business named [title]. The post is about [Description] Here is additional information about the Company [keyword] The tone of voice should be [tone], Give me the response in [language] language.', '1,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(29, 'Facebook Ads Headlines', 'assets/uploads/useCases/FacebookHeadlines.png', 'To make your Facebook ads stand out, create intriguing and persuasive headlines.', 'Provide me with a Facebook Ads headline for my product/service named [title].  The description of my product/service is [description]. The tone of voice should be [tone], Give me the response in [language] language.', '1,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(30, 'Facebook Caption Generator', 'assets/uploads/useCases/FacebookCaptionGenerator.png', 'Create engaging Facebook Captions to get viewers to your video.', 'Write me a caption for a Facebook post. The post is about [title]. The tone of voice should be [tone], Give me the response in [language] language.', '1', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(31, 'Facebook Hashtag Generator', 'assets/uploads/useCases/FacebookHashtagGenerator.png', 'Create Facebook tags and phrases that are ideal for SEO.', 'Generate Hashtag for a Facebook post. The Post is about [title]\". The tone of voice should be [tone], Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(32, 'Google Ads Headlines', 'assets/uploads/useCases/GoogleAdsHeadlines.png', 'Create intriguing 30-character headlines to use in Google AdWords to market your goods.', 'Provide me with a Google Ads headline for my product/service named [title]. The description of my product/service is [description]. The tone of voice should be [tone], Give me the response in [language] language.', '1,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(33, 'Google Ads Description', 'assets/uploads/useCases/GoogleAdsDescription.png', 'Create a Google AdWords description that distinguishes your ad and produces leads.', 'Provide me with a Google Ads description for my product/service named [title]. The keywords for the ad are [Keywords]. The tone of voice should be [tone], Give me the response in [language] language.', '1,2', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(34, 'Academic Essay', 'assets/uploads/useCases/AcademicEssay.png', 'Write original academic essays for a variety of subjects in a flash.', 'Write an academic essay on the [Title] topic\nThe keywords for the essay is [Keywords]. The tone of voice should be [tone], Give me the response in [language] language.', '1', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(35, 'Welcome Email', 'assets/uploads/useCases/WelcomeEmail.png', 'Send out welcome emails to your clients.', 'Generate a Welcome email for my client named [titlet]. My client\'s position Must include these details [Description]. The tone of voice should be [tone], Give me the response in [language] language.', '1,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(36, 'Email', 'assets/uploads/useCases/Email.png', 'Make effective emails with the help of AI.', 'Generate an email for my client named [ticket]. My client\'s position Must include these details [Description]. The tone of voice should be [tone], Give me the response in [language] language.', '3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(37, 'Email Subject Lines', 'assets/uploads/useCases/EmailSubjectLines.png', 'With a few clicks, create professional email subject lines', 'Generate an email subject line for my product/service named [title]. Must include these details [Description]. The tone of voice should be [tone], Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(38, 'Creative Stories', 'assets/uploads/useCases/CreativeStories.png', 'Give AI the freedom to create stories for you based on text you provide.', 'Provide me with Creative Stories that include the given keywords [keywords]. The title of the Creative Stories\nshould be\"[title]\", and the description should be \" [description]\". The tone of voice should be [tone], and the language used should be [language]. Please provide me with the details for each element.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(39, 'Grammar Checker', 'assets/uploads/useCases/GrammarChecker.png', 'Make sure your content is free of mistakes.', 'Check the grammar of this paragraph [title], and the description should be \" [description]\". The tone of voice should be [tone], and the language used should be [language]. Please provide me with the details for each element.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(40, 'Summarize for 2nd Grader', 'assets/uploads/useCases/Summarizefor2ndGrader.png', 'Summarize any difficult material for a child in 2nd grade.', 'Summarize this content for 2nd grader [title], and the description should be \" [description]\". The tone of voice should be [tone], and the language used should be [language]. Please provide me with the details for each element.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(41, 'Video Scripts', 'assets/uploads/useCases/VideoScripts.png', 'Make your video scripts as soon as possible, then begin filming.', 'write me a Video Script for a video [title]. The tone of voice should be [tone], and the language used should be [language]. Please provide me with the details for each element.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(42, 'Amazon Product Description', 'assets/uploads/useCases/AmazonProductDescription.png', 'Construct a compelling Amazon product description.', 'Provide me with an Amazon product description for my product/service named [title]. The keywords for the ad are [Keywords], and the description should be [description]. The tone of voice should be [tone], Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(43, 'Linkedln Caption Generator', 'assets/uploads/useCases/LinkedlnCaptionGenerator.png', 'Design and build a powerful Linkedln Caption Generator', 'Write me a caption for a LinkedIn post. The post is about [title]. The tone of voice should be [tone], Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(44, 'Linkedln Hashtag Generator', 'assets/uploads/useCases/LinkedlnHashtagGenerator.png', 'Design and build a powerful LinkedIn Hashtag Generator', 'Generate Hashtag for a LinkedIn post. The Post is about [title]\". The tone of voice should be [tone], Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(45, 'Twitter Caption', 'assets/uploads/useCases/TwitterCaption.png', 'Create engaging Twitter captions to get viewers to your video.', 'Generate a Twitter caption for a post about [title] The tone of voice should be [tone], Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(46, 'Twitter Hashtag', 'assets/uploads/useCases/TwitterHashtag.png', 'Create Twitter tags and phrases that are ideal for SEO.', 'Generate a Twitter hashtag for a post about [title] The tone of voice should be [tone], Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(47, 'TikTok Caption', 'assets/uploads/useCases/TikTokCaption.png', 'Create engaging TikTok captions to get viewers to your video.', 'Generate a TikTok caption for a post about [title] The tone of voice should be [tone], Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(48, 'Tiktok Hashtag Generator', 'assets/uploads/useCases/TiktokHashtagGenerator.png', 'Create TikTok Hashtag Generator and phrases that are ideal for SEO.', 'Generate Hashtag for a Tiktok post. The Post is about [title]\". The tone of voice should be [tone], Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(49, 'Email Body Generator', 'assets/uploads/useCases/EmailBodyGenerator.png', 'To attract viewers to your email, create interesting email body generator.', 'Generate an email body for the email named [title]. Must include these details [Description]. The tone of voice should be [tone], Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(50, 'Web Content Generator', 'assets/uploads/useCases/WebContentGenerator.png', 'Create interesting Web Content Generator to draw readers to your email.', 'Generate the Web Content named [title], The description of the content is  \" [description]\".  The tone of voice should be [tone], and the language used should be [language]. Please provide me with the details for each element.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(51, 'Blog Meta Description', 'assets/uploads/useCases/BlogMetaDescription.png', 'Create your blog\'s meta description.', 'Generate the blog meta description as \" [description]\".   The tone of voice should be [tone], and the language used should be [language]. Please provide me with the details for each element.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(52, 'Blog Tag Generator', 'assets/uploads/useCases/BlogTagGenerator.png', 'Create Blog tags Generator that are ideal for SEO.', 'Generate a blog tag for a post about [title] The tone of voice should be [tone], Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50'),
(53, 'Blog ALT Text Generator', 'assets/uploads/useCases/BlogALTTextGenerator.png', 'Create Blog Alt Tags Generators that are ideal for SEO.', 'Generate a blog ALT Text for a post about [title] The tone of voice should be [tone], Give me the response in [language] language.', '1,2,3', 1, '2023-04-02 11:38:50', '2023-04-02 11:38:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_title_unique` (`title`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_category_id_foreign` (`category_id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_name_unique` (`name`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`),
  ADD KEY `blog_categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `content_histories`
--
ALTER TABLE `content_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_user_id_foreign` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_user_id_foreign` (`user_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_language_code_unique` (`language_code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_title_unique` (`title`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `page_contents`
--
ALTER TABLE `page_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_expenses`
--
ALTER TABLE `plan_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_documents_use_case_id_foreign` (`use_case_id`),
  ADD KEY `user_documents_user_id_foreign` (`user_id`);

--
-- Indexes for table `use_cases`
--
ALTER TABLE `use_cases`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `content_histories`
--
ALTER TABLE `content_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plan_expenses`
--
ALTER TABLE `plan_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `use_cases`
--
ALTER TABLE `use_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD CONSTRAINT `blog_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `content_histories`
--
ALTER TABLE `content_histories`
  ADD CONSTRAINT `content_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD CONSTRAINT `user_documents_use_case_id_foreign` FOREIGN KEY (`use_case_id`) REFERENCES `use_cases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
