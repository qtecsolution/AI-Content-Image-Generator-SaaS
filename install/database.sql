-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2023 at 11:58 AM
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
-- Database: `creaify_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `ai_chat_histories`
--

CREATE TABLE `ai_chat_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_request` longtext NOT NULL,
  `chat_response` longtext NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'Use Case Template', 'use-case-template', 'AI development,\r\n- Use case template\r\n- Business objectives\r\n- User requirements\r\n- Technical constraints', 'assets/uploads/blogs/2023/04/26/16825020518347.png', 'Use case templates are a powerful tool for AI development teams.', '<p>                                                           Artificial Intelligence (AI) has transformed the way we do business, interact with technology, and live our lives. As AI applications have become increasingly popular, the use of use case templates has emerged as an essential tool for AI practitioners to articulate and communicate their ideas. Use case templates are a powerful tool for AI development teams to design and implement AI applications effectively. </p><p><br></p><p>In this blog post, we will explore the use of use case templates in AI development.What is a Use Case Template?A use case template is a pre-defined format that outlines the functionality, interactions, and objectives of an AI application. </p><p><br></p><p>The template usually includes a brief overview of the AI system\'s purpose, key stakeholders, user requirements, business objectives, and technical constraints. Use case templates are commonly used in the early stages of AI development to define the scope of the project and help stakeholders understand the expected outcomes.Why Use Use Case Templates?Use case templates are an excellent tool for AI development teams for several reasons. First, they provide a structured approach to developing an AI application, helping teams to focus on essential features and requirements. </p><p><br></p><p>Second, they help to communicate the project scope and objectives to stakeholders in a clear and concise manner. Third, they provide a basis for testing and evaluating the AI system once it is developed.Types of Use Case TemplatesThere are various types of use case templates that can be used in AI development. Some of the most commonly used templates include:</p><p><br></p><p>1. Problem Use Case TemplateThis template focuses on defining the problem that the AI system will solve. It outlines the business objectives, user requirements, and constraints that the AI system will need to address.</p><p><br></p><p>2. Functional Use Case TemplateThis template focuses on defining the functional requirements of the AI system. It outlines the user actions, system responses, and system behaviors that the AI system will need to implement.</p><p><br></p><p>3. Non-Functional Use Case TemplateThis template focuses on defining the non-functional requirements of the AI system. It outlines the performance, scalability, reliability, and security requirements that the AI system will need to meet.</p><p><br></p><p>4. Process Use Case TemplateThis template focuses on defining the processes and workflows that the AI system will need to implement. It outlines the steps, activities, and interactions that the AI system will need to execute.ConclusionUse case templates are a powerful tool for AI development teams to design and implement AI applications effectively. </p><p><br></p><p>They provide a structured approach to developing an AI application, help to communicate project scope and objectives, and provide a basis for testing and evaluating the AI system once it is developed. By using use case templates, AI development teams can improve the efficiency and effectiveness of their projects, leading to better outcomes for stakeholders and end-users.\r\n                                                        </p>', 1, 2, 1, '2023-04-26 20:40:52', '2023-04-28 00:02:30'),
(3, 'Image generation', 'image-generation', 'Image generation', 'assets/uploads/blogs/2023/04/26/16825024722237.png', 'Image generation', '<p>Image generation is the process of creating new, unique images using computer algorithms. This technology has become increasingly popular in recent years due to its many applications, including art, advertising, and entertainment.</p><p><br></p><p>There are several different methods used for image generation, each with its own advantages and limitations. One popular method is called generative adversarial networks (GANs). GANs consist of two neural networks that work together to generate images. One network, called the generator, creates images that are intended to resemble real images, while the other network, called the discriminator, tries to distinguish between real and fake images. As the two networks compete against each other, the generator becomes better at creating realistic images.</p><p><br></p><p>Another popular method for image generation is called variational autoencoders (VAEs). VAEs use a similar approach to GANs, but instead of two competing networks, they use one network that is trained to encode and decode images. The encoder learns to compress images into a low-dimensional space, while the decoder learns to generate new images from that space. VAEs are useful for generating images that have specific features, such as images of faces with different expressions.</p><p><br></p><p>There are many applications for image generation technology. For example, artists can use it to create unique pieces of art that would be difficult or impossible to create by hand. Advertisers can use it to create eye-catching images for their products or services. And entertainment companies can use it to create special effects for movies and TV shows.</p><p><br></p><p>However, there are also concerns about the ethical implications of image generation technology. For example, it could be used to create fake images of people or events, which could be used for malicious purposes. It is important for researchers and developers to consider these ethical implications as they continue to develop and refine image generation technology.</p><p><br></p><p>In conclusion, image generation is a fascinating field that has the potential to revolutionize many industries. With continued research and development, we can expect to see even more impressive applications of this technology in the future. However, it is important to approach image generation with caution and to consider its potential ethical implications.</p>', 1, 3, 1, '2023-04-26 20:47:54', '2023-04-26 20:47:54'),
(4, 'Coding', 'coding', 'Coding', 'assets/uploads/blogs/2023/04/26/1682503157313.png', 'Coding', '<p>Coding is the process of writing instructions in a programming language to create software, applications, websites, and more. It is an essential skill in today\'s technology-driven world, and its importance is only increasing. In this blog, we will explore why coding is important, the benefits of learning to code, and the different types of coding languages.</p><p><br></p><p>Why is coding important?</p><p><br></p><p>In today\'s digital age, technology is everywhere. From smartphones to social media, computers to cars, and even appliances like refrigerators, technology is an integral part of our daily lives. It is no surprise that the demand for coders is growing, with the Bureau of Labor Statistics predicting a 22% increase in software developer jobs between 2019 and 2029.</p><p><br></p><p>The importance of coding goes beyond the job market, however. Coding allows people to create and shape the technology around them, giving them the power to bring their ideas to life. Whether it is creating an app that simplifies daily tasks or developing a website that reaches a global audience, coding has the potential to make a significant impact.</p><p><br></p><p>Benefits of learning to code</p><p><br></p><p>Learning to code offers a range of benefits, regardless of whether one chooses to pursue it as a career or not. Here are a few:</p><p><br></p><p>1. Problem-solving skills: Coding requires breaking down complex problems into smaller, more manageable parts, and finding solutions to them. This skill is useful in any field, as it helps individuals become better at identifying problems and coming up with innovative solutions.</p><p><br></p><p>2. Creativity: Coding involves creativity and encourages individuals to think outside the box to create something unique.</p><p><br></p><p>3. Career opportunities: As mentioned earlier, the job market for coders is rapidly expanding, providing a wide range of career opportunities and higher earning potential.</p><p><br></p><p>Types of coding languages</p><p><br></p><p>There are many different programming languages used for coding, each with its own strengths and weaknesses. Some of the most popular coding languages include:</p><p><br></p><p>1. Python: Python is a versatile language used for web development, data analysis, artificial intelligence, and more.</p><p><br></p><p>2. JavaScript: JavaScript is primarily used for web development and is essential for creating interactive websites and web applications.</p><p><br></p><p>3. C++: C++ is a powerful language used for developing software, games, and operating systems.</p><p><br></p><p>4. Java: Java is used for creating desktop applications, mobile apps, and web applications.</p><p><br></p><p>In conclusion, coding is a valuable skill with a wide range of benefits. Whether one is interested in pursuing it as a career or not, learning to code can help individuals become better problem solvers, more creative thinkers, and more proficient in the technology-driven world. With so many different programming languages to choose from, there is something for everyone in the world of coding.</p>', 1, 4, 1, '2023-04-26 20:59:17', '2023-04-26 20:59:17'),
(5, 'Chatting with artificial intelligence (AI)', 'chatting-with-artificial-intelligence-ai', 'Chatting with artificial intelligence (AI)', 'assets/uploads/blogs/2023/04/26/16825033578768.png', 'Chatting with artificial intelligence (AI)', '<p><br></p><p><span style=\"font-size: 1rem; text-align: var(--bs-body-text-align);\">Chatting with artificial intelligence (AI) is no longer a futuristic fantasy but a present-day reality. AI-powered chatbots and virtual assistants have become ubiquitous, and they are transforming the way we interact with technology. Whether you want to book a flight, order food, or get weather updates, you can now do it effortlessly by chatting with AI.</span><br></p><p><br></p><p>So, what exactly is AI-powered chat, and how does it work? Simply put, AI-powered chat refers to the use of machine learning and natural language processing (NLP) to enable computers to understand and respond to human language. These technologies allow AI-powered chatbots to interpret the intent behind our words and respond in a way that feels natural and human-like.</p><p><br></p><p>The benefits of AI-powered chat are numerous. For one, it is incredibly convenient. Instead of navigating complex menus and filling out forms, you can simply chat with an AI-powered bot and get the information you need. This saves time and reduces frustration, making the experience of using technology much more pleasant.</p><p><br></p><p>Moreover, AI-powered chat can be personalized and adaptive. Chatbots can learn from their interactions with users, becoming more adept at understanding their needs and preferences over time. This means that the more you use an AI-powered chatbot, the better it becomes at providing you with accurate and relevant information.</p><p><br></p><p>AI-powered chat also has the potential to be transformative in fields like customer service and healthcare. In customer service, for example, chatbots can provide instant support to customers, reducing wait times and improving customer satisfaction. In healthcare, chatbots can assist doctors and nurses by providing patient information and alerts, allowing them to provide better care.</p><p><br></p><p>However, as with any technology, AI-powered chat also has its limitations. Chatbots can only understand and respond to the information they have been programmed to recognize. They cannot provide the level of nuance and empathy that a human conversation can provide. Moreover, there is always the risk of miscommunication, especially when it comes to complex or sensitive topics.</p><p><br></p><p>Despite these limitations, AI-powered chat is a powerful tool that has the potential to revolutionize the way we interact with technology. As machine learning and NLP continue to advance, we can expect chatbots and virtual assistants to become even more human-like and sophisticated, making our interactions with them even more natural and intuitive.</p><p><br></p><p>In conclusion, chatting with AI is no longer a novelty but a necessity in today\'s digital age. Whether you are ordering a pizza or scheduling a meeting, AI-powered chatbots and virtual assistants can make the process much easier and more efficient. As we continue to explore the potential of AI, we can expect to see more innovative and exciting developments in the world of chat with AI.</p>', 1, 5, 1, '2023-04-26 21:02:39', '2023-04-26 21:02:39');

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
(2, 'Use Case Templates', 'use-case-templates', 'Use Case', 1, 'Use Case', 1, '2023-04-26 16:19:24', '2023-04-26 20:43:52'),
(3, 'Image Generate', 'image-generate', 'Image Generate', 1, 'Image Generate', 1, '2023-04-26 16:22:08', '2023-04-26 16:22:08'),
(4, 'Coding', 'coding', 'Coding', 1, 'Coding', 1, '2023-04-26 16:22:59', '2023-04-26 16:22:59'),
(5, 'Chat', 'chat', 'Chat', 1, 'Chat', 1, '2023-04-26 21:00:58', '2023-04-26 21:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `content_histories`
--

CREATE TABLE `content_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `use_case_id` bigint(20) UNSIGNED DEFAULT NULL,
  `temperature` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `prompt` text NOT NULL,
  `generated_content` longtext NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('content','code') NOT NULL DEFAULT 'content',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `min_purchase` int(11) NOT NULL,
  `max_discount` int(11) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `discount_value` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_published` tinyint(4) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Should we be afraid of AI?', 'Don\'t know, I suggest you to reach out to Elon Must. That \"alien\" for sure knows something.', 1, 1, 1, '2023-04-11 21:16:36', '2023-04-11 21:16:36'),
(2, 'Do I have to pay for OpenAI services?', 'Yes you do. Upon exceeding their free 18$, you will be charged based on your usage at the end of each month.', 2, 1, 1, '2023-04-11 21:17:02', '2023-04-11 21:17:02'),
(3, 'What Creaify uses behind?', 'Creaify is fully powered by OpenAI GPT3 and DALLE services.', 3, 1, 1, '2023-04-11 21:17:21', '2023-05-03 23:59:22'),
(4, 'What kind of payment gateways does Creaify supports?', 'Creaify supports 4 different payment gateways.', 4, 1, 1, '2023-04-11 21:19:06', '2023-05-04 00:02:44');

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
(1, 'Arabic', 'ar-AE', '/img/flags/ae.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(2, 'Chinese (Mandarin)', 'cmn-CN', '/img/flags/cn.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(3, 'Croatian (Croatia)', 'hr-HR', '/img/flags/hr.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(4, 'Czech (Czech Republic)', 'cs-CZ', '/img/flags/cz.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(5, 'Danish (Denmark)', 'da-DK', '/img/flags/dk.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(6, 'Dutch (Belgium)', 'nl-BE', '/img/flags/be.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(7, 'English (USA)', 'en-US', '/img/flags/us.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(8, 'Estonian (Estonia)', 'et-EE', '/img/flags/ee.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(9, 'Finnish (Finland)', 'fi-FI', '/img/flags/fi.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(10, 'French (France)', 'fr-FR', '/img/flags/fr.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(11, 'German (Germany)', 'de-DE', '/img/flags/de.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(12, 'Greek (Greece)', 'el-GR', '/img/flags/gr.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(13, 'Hebrew (Israel)', 'he-IL', '/img/flags/il.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(14, 'Hindi (India)', 'hi-IN', '/img/flags/in.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(15, 'Hungarian (Hungary)', 'hu-HU', '/img/flags/hu.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(16, 'Icelandic (Iceland)', 'is-IS', '/img/flags/is.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(17, 'Indonesian (Indonesia)', 'id-ID', '/img/flags/id.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(18, 'Italian (Italy)', 'it-IT', '/img/flags/it.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(19, 'Japanese (Japan)', 'ja-JP', '/img/flags/jp.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(20, 'Korean (South Korea)', 'ko-KR', '/img/flags/kr.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(21, 'Malay (Malaysia)', 'ms-MY', '/img/flags/my.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(22, 'Norwegian (Norway)', 'nb-NO', '/img/flags/no.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(23, 'Polish (Poland)', 'pl-PL', '/img/flags/pl.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(24, 'Portuguese (Portugal)', 'pt-PT', '/img/flags/pt.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(25, 'Russian (Russia)', 'ru-RU', '/img/flags/ru.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(26, 'Spanish (Spain)', 'es-ES', '/img/flags/es.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(27, 'Swedish (Sweden)', 'sv-SE', '/img/flags/se.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(28, 'Turkish (Turkey)', 'tr-TR', '/img/flags/tr.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19'),
(29, 'Bengali', 'Ban', '/img/flags/ban.svg', 1, '2023-04-10 04:37:19', '2023-04-10 04:37:19');

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
(10, '2023_02_22_075705_create_plan_expenses_table', 1),
(11, '2023_02_22_080053_create_use_case_categories_table', 1),
(12, '2023_02_22_085004_create_use_cases_table', 1),
(13, '2023_02_22_085952_create_user_documents_table', 1),
(14, '2023_02_26_160830_create_images_table', 1),
(15, '2023_02_27_135429_create_content_histories_table', 1),
(16, '2023_03_01_172545_create_blog_categories_table', 1),
(17, '2023_03_01_172546_create_blogs_table', 1),
(18, '2023_03_02_122318_create_faqs_table', 1),
(19, '2023_03_06_190539_create_languages_table', 1),
(20, '2023_04_10_150053_create_ai_chat_histories_table', 2),
(21, '2023_05_07_125835_create_coupons_table', 3);

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
  `payment_id` varchar(255) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1,
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

INSERT INTO `orders` (`id`, `invoice`, `user_id`, `plan_id`, `is_paid`, `total`, `payment_method`, `payment_id`, `type`, `other`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, '1686823062-11864', 1, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Admin', 'admin@gmail.com', '01811951215', '', '2023-06-15 09:57:42', '2023-06-15 09:57:42');

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
(1, 'Terms & Condition', 'terms-condition', 0, 1, 'Terms & Condition', NULL, NULL, 'Terms Condition', '2023-04-09 06:25:53', '2023-04-09 06:25:53'),
(2, 'Privacy Policy', 'privacy-policy', 0, 1, NULL, NULL, NULL, NULL, '2023-04-11 21:05:27', '2023-04-11 21:05:27');

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
(1, 'Terms & Condition', 1, '<p>Terms &amp; Condition<br></p>', 1, NULL, NULL, NULL, 0, '2023-04-09 06:26:02', '2023-04-09 06:26:02'),
(2, 'Terms conditions', 1, '<ol><li style=\"list-style-type:decimal\"><span style=\"font-size:11pt\"><span style=\"font-family:Poppins,sans-serif\"><strong>Terms of use for Creaify are as follows</strong></span></span></li><li style=\"list-style-type:decimal\"><p><font color=\"#333333\" face=\"Calibri, Verdana, Helvetica, sans-serif\">1. <b>Scope of Work:</b> This section defines the project scope, including the deliverables, timelines, and milestones.</font></p><p><font color=\"#333333\" face=\"Calibri, Verdana, Helvetica, sans-serif\"><br></font></p><p><font color=\"#333333\" face=\"Calibri, Verdana, Helvetica, sans-serif\">2. <b>Ownership</b> of Intellectual Property: This section clarifies who owns the intellectual property rights to the AI technology and any data generated during the project.</font></p><p><font color=\"#333333\" face=\"Calibri, Verdana, Helvetica, sans-serif\"><br></font></p><p><font color=\"#333333\" face=\"Calibri, Verdana, Helvetica, sans-serif\">3.&nbsp;</font><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\"><b>Confidentiality: </b>This section outlines the confidentiality obligations of the parties involved, including any non-disclosure requirements.</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\">4. <b>Liability: </b>This section outlines the liability of each party, including any indemnification requirements.</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\">5. <b>Termination:</b> This section outlines the conditions under which the project may be terminated, including any fees or penalties that may apply.</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\">6. <b>Warranties:</b> This section outlines the warranties provided by each party, including any guarantees related to the quality or functionality of the AI technology.</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\">7. <b>Payment Terms:</b> This section outlines the payment terms for the project, including any milestones or invoicing schedules.</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\">8. <b>Governing Law:</b> This section specifies the governing law of the agreement and the jurisdiction in which disputes will be resolved.</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\">It\'s important to have a qualified legal professional review and draft any agreements related to an AI project to ensure that all necessary terms and conditions are included and enforceable.</span></p></li></ol>', 1, NULL, NULL, NULL, 0, '2023-04-11 21:12:03', '2023-04-11 21:12:03'),
(3, 'Privacy Policy', 2, '1. Types of Personal Data Collected: This section should outline the types of personal data that the AI project will collect, such as names, email addresses, and browsing history. 2. How Data is Collected: This section should explain how the personal data will be collected, such as through forms or cookies.3. Purpose of Data Collection: This section should state the purposes for which the personal data will be used, such as to improve the AI algorithm or to personalize recommendations. 4. Legal Basis for Data Processing: This section should explain the legal basis for processing the personal data, such as consent or legitimate interest. 5. Data Sharing: This section should explain whether the personal data will be shared with any third parties, such as service providers or advertisers. 6. Data Security: This section should outline the measures in place to ensure the security and confidentiality of the personal data. 7. Data Retention: This section should explain how long the personal data will be retained and the criteria used to determine retention periods. 8. User Rights: This section should explain the rights that users have regarding their personal data, such as the right to access, rectify, or delete their data.', 1, NULL, NULL, NULL, 0, '2023-04-11 21:16:00', '2023-04-27 23:59:21');

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

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('likhonuzzamanapon02@gmail.com', '$2y$10$GSuPvMI0K2GsMGcLsakwueusZn2FlpIcXX8wprApSrh7NgcroaxH.', '2023-04-29 01:28:07');

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
  `max_words` int(11) NOT NULL DEFAULT 0,
  `document_count` int(11) NOT NULL DEFAULT 0,
  `image_count` int(11) NOT NULL DEFAULT 0,
  `support_enabled` tinyint(4) NOT NULL DEFAULT 0,
  `code_generate_enabled` tinyint(4) NOT NULL DEFAULT 0,
  `chat_enabled` tinyint(4) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `yearly_price` double(10,2) DEFAULT NULL,
  `templates` varchar(20) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `user_id`, `name`, `word_count`, `max_words`, `document_count`, `image_count`, `support_enabled`, `code_generate_enabled`, `chat_enabled`, `is_published`, `price`, `yearly_price`, `templates`, `created_at`, `updated_at`) VALUES
(1, 1, 'Free', 2000, 200, 10, 5, 1, 0, 0, 1, 0.00, 0.00, '1', '2023-04-08 09:24:30', '2023-05-03 23:37:51'),
(2, 1, 'Basic', 10000, 400, 150, 20, 1, 1, 0, 1, 5.00, 50.00, '0', '2023-04-08 09:24:53', '2023-05-03 23:36:59'),
(3, 1, 'Gold', 30000, 600, 300, 40, 1, 1, 1, 1, 10.00, 100.00, '0', '2023-04-27 18:13:29', '2023-05-03 23:40:04');

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
  `current_word_count` int(11) NOT NULL DEFAULT 0,
  `document_count` int(11) NOT NULL DEFAULT 0,
  `current_document_count` int(11) NOT NULL DEFAULT 0,
  `image_count` int(11) NOT NULL DEFAULT 0,
  `current_image_count` int(11) NOT NULL DEFAULT 0,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `activated_at` datetime DEFAULT NULL,
  `expire_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_expenses`
--

INSERT INTO `plan_expenses` (`id`, `user_id`, `order_id`, `plan_id`, `word_count`, `current_word_count`, `document_count`, `current_document_count`, `image_count`, `current_image_count`, `type`, `activated_at`, `expire_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2000, 0, 0, 0, 5, 0, 1, '2023-06-15 15:57:42', '2023-07-15 15:57:42', '2023-06-15 09:57:42', '2023-06-15 09:57:42');

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
  `google_id` varchar(255) DEFAULT NULL,
  `plan_expense_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `pass_changed` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `avatar`, `type`, `plan_id`, `order_id`, `google_id`, `plan_expense_id`, `password`, `pass_changed`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '01811951215', NULL, 'assets/uploads/user/2023/04/11/admin9853.png', 'admin', 1, NULL, NULL, 1, '$2y$10$iMR5f7RSUFWJHh95UZU87eg.QvJF3r8N1ojAdOIcOHWUx7qkdDMdu', 1, NULL, 's27vZWLYLCaO8g4ovL0ddJbJyLB79eIGfJv1dQtmZSwedYNEp8hweCWAdgbD', '2023-04-08 09:23:34', '2023-06-15 09:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE `user_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `generated_content` longtext NOT NULL,
  `use_case_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('content','code') NOT NULL DEFAULT 'content',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `use_case_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_popular` tinyint(4) NOT NULL DEFAULT 1,
  `title_label` varchar(150) DEFAULT NULL,
  `short_description_label` varchar(150) DEFAULT NULL,
  `description_label` varchar(150) DEFAULT NULL,
  `title_placeholder` varchar(255) DEFAULT 'Write here',
  `short_description_placeholder` varchar(255) DEFAULT 'Write short description here',
  `description_placeholder` varchar(255) DEFAULT 'Write description here',
  `type` int(11) NOT NULL DEFAULT 1,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `use_cases`
--

INSERT INTO `use_cases` (`id`, `title`, `icon`, `details`, `prompt`, `use_case_category_id`, `is_popular`, `title_label`, `short_description_label`, `description_label`, `title_placeholder`, `short_description_placeholder`, `description_placeholder`, `type`, `is_published`, `created_at`, `updated_at`) VALUES
(2, 'Blog Conclusion', 'assets/uploads/useCase/2023/04/11/blog-conclusion8563.png', 'Your blog content should conclude with a captivating paragraph.', 'I\'m writing a blog on [title]. In short The blog is about[description]. Suggest me a conlcusion for this blog?', 2, 1, 'Blog Title', '', 'Blog Description', 'Write your blog title here', 'Write short description here', 'Describe your blog post', 2, 1, '2023-04-08 10:08:06', '2023-04-17 20:48:36'),
(3, 'Blog Intros', 'assets/uploads/useCase/2023/04/11/blog-intros9398.png', 'Create an introduction that will encourage readers to continue to reads your content.', 'I\'m writing a blog on [title]. In short The blog is about[description]. Suggest me the intro for this blog?', 2, 1, 'Blog Title', '', 'Blog Description', 'Write your blog title here', 'Write short description here', 'Describe your blog post', 1, 1, '2023-04-08 10:33:25', '2023-04-17 20:47:12'),
(4, 'Blog Ideas', 'assets/uploads/useCase/2023/04/11/blog-ideas5487.png', 'The ideal instrument for beginning to write excellent articles. Develop unique thoughts for your upcoming post.', 'I want to write a blog on [title]. Give me 3 ideas on how can I write the blog with outlines.', 2, 1, 'Description', '', '', 'Describe your blog post', 'Write short description here', 'Write description here', 1, 1, '2023-04-08 12:04:12', '2023-04-17 20:46:19'),
(5, 'Blog Section', 'assets/uploads/useCase/2023/04/11/blog-section8294.png', 'Describe in detail a subheading from your article in a blog section (a few paragraphs).', 'Write me a blog which title is [title] and the blog subheadings are [short_description]', 2, 1, 'Blog Title', 'Sub Headings', '', 'Write your blog title here', 'Technology, Artificial intelligence', 'Write description here', 1, 1, '2023-04-08 12:13:58', '2023-04-17 20:44:49'),
(6, 'Blog Titles', 'assets/uploads/useCase/2023/04/11/blog-titles3143.png', 'Compose a complete blog piece (a few paragraphs) about one of your article\'s subheadings.', 'Write me 5 blog titles about [title]', 2, 1, 'Keywords', '', '', 'Technology, Artificial intelligence', 'Write short description here', 'Write description here', 1, 1, '2023-04-09 04:18:46', '2023-04-17 20:45:26'),
(7, 'Facebook Ads', 'assets/uploads/useCase/2023/04/11/facebook-ads2159.png', 'Creating Facebook ads using your target market in mind will increase your conversion rate.', 'Give me Facebook Ads ideas for my product[title] The product is [short_description]', 4, 1, 'Input product name', 'Inputs products short description', '', 'Input product name', 'nputs products short description', 'Write description here', 1, 1, '2023-04-11 15:48:54', '2023-04-17 20:49:33'),
(8, 'Article Generator', 'assets/uploads/useCase/2023/04/11/article-generator1535.png', 'Write an article of the best quality using a title and an outline in a short amount of time.', 'Write me an Article that includes the given keywords [short_description]. The title of the Article is \"[title]\", and here\'s a little bit about the article, [description].', 5, 1, 'Article Title', 'Given keywords', 'Description', 'Write your article title here', 'Technology, Artificial intelligence, Machine Learning', 'escribe your article', 1, 1, '2023-04-11 15:55:53', '2023-04-17 20:50:30'),
(9, 'Content Rewriter', 'assets/uploads/useCase/2023/04/11/content-rewriter3696.png', 'Rewrite a piece of material to make it more intriguing, original, and compelling.', '[description] Rewrite this content to make it more intriguing, original, and compelling.', 5, 1, '', '', 'Description', 'Write here', 'Write short description here', 'Enter your content to rewrite', 1, 1, '2023-04-11 16:02:46', '2023-04-17 20:51:10'),
(10, 'Paragraph Generator', 'assets/uploads/useCase/2023/04/11/paragraph-generator4672.png', 'Create sentences on any subject, with a keyword, and in a certain voice.', 'Write me a Paragraph that includes the given keywords [short_description]. The title of the Paragraph is \"[title]\",', 6, 1, 'Title of the Paragraph', 'Given keywords', '', 'Write your Paragraph title here', 'Technology, Artificial intelligence, Machine Learning', 'Write description here', 1, 1, '2023-04-11 16:05:28', '2023-04-17 20:52:27'),
(11, 'Talking Points', 'assets/uploads/useCase/2023/04/11/talking-points3467.png', 'For your article\'s subheadings, create bullet points that are brief, clear, and instructive.', '\"Provide me with Talking Points that include the given keywords [short_description]. The title of the Talking Points\r\nshould be \"\"[title]\"\", and the description should be \"\"[description]\"\".', 6, 1, 'Title', 'Keywords', 'Description', 'Write your title here', 'Technology, Artificial intelligence, Machine Learning', 'Describe your talking points', 1, 1, '2023-04-11 16:06:40', '2023-04-17 20:53:58'),
(12, 'Pros & Cons for blogs', 'assets/uploads/useCase/2023/04/11/pros-cons-for-blogs2323.png', 'For your blog piece, list the pros and cons of a service, goods, or website.', 'Write me the pros and cons of [title]', 2, 1, 'Title', '', '', 'Write your title here', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 16:08:04', '2023-04-17 20:54:59'),
(13, 'Summarize Text', 'assets/uploads/useCase/2023/04/11/summarize-text2947.png', 'Summarize any text in a clear, succinct, and understandable manner.', 'Summarize this paragraph [title].', 6, 1, 'Description', '', '', 'Enter your text to summarize', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 16:09:18', '2023-04-17 20:57:34'),
(14, 'Product Description', 'assets/uploads/useCase/2023/04/11/product-description1481.png', 'Create a description of your product that explains its value.', 'Write me a product description for [title]. The category of the product is [short_description]. The description of the product is [description]', 5, 1, 'Title', 'Category of the product', 'Keywords', 'Write your title here', 'Write your product category', 'Describe your products briefly', 1, 1, '2023-04-11 16:11:36', '2023-04-17 20:58:32'),
(15, 'Startup Name Generator', 'assets/uploads/useCase/2023/04/11/startup-name-generator3465.png', 'Create interesting, original, and memorable names for your startup in a matter of seconds.', 'Generate some cool, creative, and catchy names for a startup business. The type/sector of business is [description]. Give me the response in [description] language.', 5, 1, '', '', 'Description', 'Write here', 'Write short description here', 'Explain what your startup idea is about', 1, 1, '2023-04-11 16:13:01', '2023-04-17 20:59:18'),
(16, 'Product Name Generator', 'assets/uploads/useCase/2023/04/11/product-name-generator566.png', 'Using illustrative words, come up with inventive product names', 'Create creative product names that include the given keywords [title]. The description of the product is  \" [description]\".', 5, 1, 'Keywords', '', 'Product Description', 'Mobile phone, Android, Flagship', 'Write short description here', 'Describe your product', 1, 1, '2023-04-11 16:16:11', '2023-04-17 21:00:13'),
(17, 'SEO Meta Description', 'assets/uploads/useCase/2023/04/11/seo-meta-description2754.png', 'Based on the description, create a meta description that is SEO-friendly.', 'Provide me with SEO-friendly Meta Description for my product/service named [title]The description of my product/service is  [description]', 7, 1, 'Product/Service Name', '', 'Description', 'Name of your product/service', 'Write short description here', 'Describe your product/service', 1, 1, '2023-04-11 16:19:26', '2023-04-17 21:01:00'),
(18, 'FAQs', 'assets/uploads/useCase/2023/04/11/faqs6625.png', 'Create commonly asked questions based on the description of your product.', 'Generate some Frequently asked questions for [title]. Here\'s some brief about the FAQ: [description]', 7, 1, 'Title', '', 'Description', 'Product/service Name', 'Write short description here', 'Describe briefly about your Product/service', 1, 1, '2023-04-11 16:20:35', '2023-04-17 21:01:50'),
(19, 'FAQ Answers', 'assets/uploads/useCase/2023/04/11/faq-answers4103.png', 'Generate creative answers to questions (FAQs) about your business or website.', 'Generate some Frequently asked questions and answers for [title]. Here\'s some brief about the FAQ:[description]', 7, 1, 'Title', '', 'Description', 'Product/service Name', 'Write short description here', 'What is the question you are generationg answers for', 1, 1, '2023-04-11 16:22:18', '2023-04-17 21:03:59'),
(20, 'Testimonials/Reviews', 'assets/uploads/useCase/2023/04/11/testimonialsreviews4719.png', 'User testimonials will give your website social evidence.', 'Write a testimonial/review for a product named [title]. The description of the product is [description]', 7, 1, 'Product Name', '', 'Description', 'Product/service Name', 'Write short description here', 'Describe briefly about the Product/service', 1, 1, '2023-04-11 16:23:24', '2023-04-17 21:04:45'),
(21, 'YouTube Video Descriptions', 'assets/uploads/useCase/2023/04/11/youtube-video-descriptions8377.png', 'Catchy and persuasive YouTube descriptions that help your videos rank higher.', '\"Write me a Video Description for my youtube video titled as\r\n[title], and the video is about[description]', 8, 1, 'Title', '', 'Description', 'Write your video title', 'Write short description here', 'Briefly describe what the video is about', 1, 1, '2023-04-11 16:25:30', '2023-04-17 21:05:21'),
(22, 'Video Titles', 'assets/uploads/useCase/2023/04/11/video-titles5742.png', 'To get everyone\'s attention, create a catchy title for your video.', 'Write me some catchy Video title for my video. The video is about [title]', 8, 1, 'Description', '', '', 'Briefly describe what the video is about', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 16:26:20', '2023-04-17 21:06:03'),
(23, 'Youtube Tags Generator', 'assets/uploads/useCase/2023/04/11/youtube-tags-generator3861.png', 'Create YouTube tags and phrases that are ideal for SEO.', 'Generate Youtube Tag for a video named [title] The video is about [description][Description]\".', 8, 1, 'Title', NULL, 'Description', 'Write here', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 16:27:03', '2023-04-11 16:27:03'),
(24, 'Youtube Caption', 'assets/uploads/useCase/2023/04/11/youtube-captionstitles5787.png', 'Create engaging YouTube captions to get viewers to your video.', 'Write me some Video caption for a Youtube video. The video is about [title]', 8, 1, 'Title', '', 'Description', 'Write your video title', 'Write short description here', 'Briefly describe what the video is about', 1, 1, '2023-04-11 16:27:55', '2023-04-17 21:07:46'),
(25, 'Youtube Hashtag Generator', 'assets/uploads/useCase/2023/04/11/youtube-hashtag-generator4367.png', 'Create YouTube tags and phrases that are ideal for SEO.', 'Generate Youtube Hashtags for a video named [title] The video is about [description]', 8, 1, 'Title', '', 'Description', 'Write your video title', 'Write short description here', 'Briefly describe what the video is about', 1, 1, '2023-04-11 16:28:36', '2023-04-17 21:08:27'),
(26, 'Instagram Captions', 'assets/uploads/useCase/2023/04/11/instagram-captions4684.png', 'Create engaging Instagram Captions to get viewers to your video.', 'Generate an attracting Instagram caption for a post about [description]', 4, 1, '', '', 'Description', 'Write Description Here', 'Write short description here', 'Briefly describe what the post is about', 1, 1, '2023-04-11 16:29:43', '2023-05-04 19:09:26'),
(27, 'Instagram Hashtags Generator', 'assets/uploads/useCase/2023/04/11/instagram-hashtags-generator5549.png', 'Create Instagram tags and phrases that are ideal for SEO.', 'Generate some Instagram hashtags for a post about [title]', 4, 1, 'Description', '', '', 'Briefly describe what the post is about', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 16:30:20', '2023-04-17 21:10:41'),
(28, 'Social Media Post (Personal)', 'assets/uploads/useCase/2023/04/11/social-media-post-personal3044.png', 'Create a personal social media post that will appear on any platform.', 'Generate some Social Media Post for my personal account. The post is about [title]', 4, 1, 'Description', '', '', 'Briefly describe what the post is about', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 16:31:05', '2023-04-17 21:11:09'),
(29, 'Social Media Post (Business)', 'assets/uploads/useCase/2023/04/11/social-media-post-business1153.png', 'Create a business social media post that will appear on any platform.', 'Generate some Social Media Post for my Business named [title] The post is about [description] Here is additional information about the Company[short_description]', 4, 1, 'Business Name', 'Keywords', 'Description', 'Write your business name here', 'Briefly describe what the post is about', 'Mobile phone, Android, Flagship', 1, 1, '2023-04-11 16:33:33', '2023-04-17 21:11:53'),
(30, 'Facebook Ads Headlines', 'assets/uploads/useCase/2023/04/11/facebook-ads-headlines4450.png', 'To make your Facebook ads stand out, create intriguing and persuasive headlines.', 'Provide me with few Facebook Ads headline for my product/service named [title]  The description of my product/service is [description]', 4, 1, 'Title', '', 'Description', 'Write your product/service name', 'Write short description here', 'Briefly describe about your product/service', 1, 1, '2023-04-11 16:34:39', '2023-04-17 21:12:30'),
(31, 'Facebook Caption Generator', 'assets/uploads/useCase/2023/04/11/facebook-caption-generator5633.png', 'Create engaging Facebook Captions to get viewers to your video.', 'Write me few caption for a Facebook post. The post is about [title]', 4, 1, 'Description', '', '', 'Briefly describe what the post is about', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 16:36:39', '2023-04-17 21:13:01'),
(32, 'Facebook Hashtag Generator', 'assets/uploads/useCase/2023/04/11/facebook-hashtag-generator5311.png', 'Create Facebook tags and phrases that are ideal for SEO.', 'Generate some Hashtags for a Facebook post. The Post is about [title]', 4, 1, 'Description', '', '', 'Briefly describe what the post is about', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 16:37:29', '2023-04-17 21:13:35'),
(33, 'Google Ads Headlines', 'assets/uploads/useCase/2023/04/11/google-ads-headlines8890.png', 'Create intriguing 30-character headlines to use in Google AdWords to market your goods.', 'Provide me few Google Ads headline for my product/service named [title]. The description of my product/service is [description].', 4, 1, 'Title', '', 'Description', 'Write your product/service name', 'Write short description here', 'Briefly describe about your product/service', 1, 1, '2023-04-11 16:38:36', '2023-04-17 21:14:14'),
(34, 'Google Ads Description', 'assets/uploads/useCase/2023/04/11/google-ads-description1592.png', 'Create a Google AdWords description that distinguishes your ad and produces leads.', 'Provide me some Google Ads description for my product/service named [title]. The keywords for the Ad are [short_description]', 4, 1, 'Keywords', 'Short Description', '', 'Write your product/service name', 'Mobile phone, Android, Flagship', 'Write description here', 1, 1, '2023-04-11 16:39:20', '2023-04-17 21:18:06'),
(35, 'Academic Essay', 'assets/uploads/useCase/2023/04/11/academic-essay4524.png', 'Write original academic essays for a variety of subjects in a flash.', '\"Write an academic essay on the [title] topic\r\nThe keywords for the essay are [short_description]', 5, 1, 'Essay Title', 'Short Description', '', 'Write your essay title here', 'Mobile phone, Android, Flagship', 'Write description here', 1, 1, '2023-04-11 16:40:54', '2023-04-17 21:18:41'),
(36, 'Welcome Email', 'assets/uploads/useCase/2023/04/11/welcome-email1286.png', 'Send out welcome emails to your clients.', 'Generate an Welcome email for my client named [title]. My client\'s position Must include these details [description]', 3, 1, 'Recipient Name', '', 'Description', 'Write the name of the person receiving the Email', 'Write short description here', 'Briefly describe what the email is about', 1, 1, '2023-04-11 16:41:59', '2023-04-17 21:19:17'),
(37, 'Email', 'assets/uploads/useCase/2023/04/11/email7333.png', 'Make effective emails with the help of AI.', 'Generate an email for my client named [title] with a beautiful subject. The email is about [description][Description].', 3, 1, 'Recipient Name', '', 'Description', 'Write the name of the person receiving the Email', 'Write short description here', 'Briefly describe what the email is about', 1, 1, '2023-04-11 16:42:41', '2023-04-17 21:20:01'),
(38, 'Email Subject Lines', 'assets/uploads/useCase/2023/04/11/email-subject-lines561.png', 'With a few clicks, create professional email subject lines', 'Generate 10 email subject lines for my product/service named [title]. Must include these details [description]', 3, 1, 'Product/service name', '', 'Description', 'Write your product/service name', 'Write short description here', 'Briefly describe about your product/service', 1, 1, '2023-04-11 16:43:24', '2023-04-17 21:20:49'),
(39, 'Creative Stories', 'assets/uploads/useCase/2023/04/11/creative-stories6453.png', 'Give AI the freedom to create stories for you based on text you provide.', '\"Provide me with Creative Stories that include the given keywords [keywords]. The title of the Creative Stories\r\nshould be [title], and the description should be [description]', 5, 1, 'Title', 'Keywords', 'Description', 'Title of your story', 'Mobile phone, Android, Flagship', 'Briefly describe about your story', 1, 1, '2023-04-11 16:44:39', '2023-04-17 21:21:32'),
(40, 'Grammar Checker', 'assets/uploads/useCase/2023/04/11/grammar-checker591.png', 'Make sure your content is free of mistakes.', 'Check the grammar for the following paragraph: [description]. Also mark the mistakes.', 5, 1, '', '', 'Description', 'Write here', 'Write short description here', 'Write tour content here', 1, 1, '2023-04-11 16:45:40', '2023-04-17 21:22:06'),
(41, 'Summarize for 2nd Grader', 'assets/uploads/useCase/2023/04/11/summarize-for-2nd-grader3267.png', 'Summarize any difficult material for a child in 2nd grade.', 'Summarize this following content for 2nd grader child :[description]', 5, 1, '', '', 'Description', 'Write here', 'Write short description here', 'Write tour content here', 1, 1, '2023-04-11 16:46:35', '2023-04-17 21:22:41'),
(42, 'Video Scripts', 'assets/uploads/useCase/2023/04/11/video-scripts8200.png', 'Make your video scripts as soon as possible, then begin filming.', 'write me a Video Script for a video [title].', 8, 1, '', '', 'Description', 'Write here', 'Write short description here', 'Briefly describe what the story is about', 1, 1, '2023-04-11 16:47:18', '2023-04-17 21:23:10'),
(43, 'Amazon Product Description', 'assets/uploads/useCase/2023/04/11/amazon-product-description7525.png', 'Construct a compelling Amazon product description.', 'Write me an Amazon product description for my product/service named[title]. The keywords for the ad are [short_description]', 6, 1, 'Product/Service Name', 'Short Description', '', 'Write your product/service name', 'Briefly describe about your product/service', 'Write description here', 1, 1, '2023-04-11 16:48:55', '2023-04-17 21:24:16'),
(44, 'Linkedln Caption Generator', 'assets/uploads/useCase/2023/04/11/linkedln-caption-generator6433.png', 'Design and build a powerful Linkedln Caption Generator', 'Write me few captions for my LinkedIn post. The post is about[title]', 4, 1, 'Description', '', '', 'Briefly describe what the post is about', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 16:50:06', '2023-04-17 21:24:45'),
(45, 'Linkedln Hashtag Generator', 'assets/uploads/useCase/2023/04/11/linkedln-hashtag-generator2815.png', 'Design and build a powerful LinkedIn Hashtag Generator', 'Generate Hashtags for my LinkedIn post. The Post is about [title]', 4, 1, 'Description', '', '', 'Briefly describe what the post is about', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 16:50:53', '2023-04-17 21:25:09'),
(46, 'Twitter Caption', 'assets/uploads/useCase/2023/04/11/twitter-caption3523.png', 'Create engaging Twitter captions to get viewers to your video.', 'Generate a Twitter caption for my tweet about [title]', 4, 1, 'Description', '', '', 'Briefly describe what the post is about', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 16:53:28', '2023-04-17 21:25:40'),
(47, 'Twitter Hashtag', 'assets/uploads/useCase/2023/04/11/twitter-hashtag689.png', 'Create Twitter tags and phrases that are ideal for SEO.', 'Generate some Twitter hashtags for my tweet about [title].', 4, 1, '', '', 'Description', 'Write here', 'Write short description here', 'Briefly describe what the post is about', 1, 1, '2023-04-11 16:55:11', '2023-04-17 21:26:47'),
(48, 'TikTok Caption', 'assets/uploads/useCase/2023/04/11/tiktok-caption7995.png', 'Create engaging TikTok captions to get viewers to your video.', 'Generate a TikTok caption for a post about [title]', 4, 1, 'Description', '', '', 'Briefly describe what the post is about', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 16:56:10', '2023-04-17 21:27:15'),
(49, 'Tiktok Hashtag Generator', 'assets/uploads/useCase/2023/04/11/tiktok-hashtag-generator3541.png', 'Create TikTok Hashtag Generator and phrases that are ideal for SEO.', 'Generate Hashtag for my Tiktok post. The Tiktok is about[title]', 4, 1, 'Description', '', '', 'Briefly describe what the post is about', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 16:56:52', '2023-04-17 21:27:41'),
(50, 'Email Body Generator', 'assets/uploads/useCase/2023/04/11/email-body-generator7235.png', 'To attract viewers to your email, create interesting email body generator.', 'Generate an email body for the email named [title]. Must include these details [description]', 3, 1, 'Subject', '', 'Description', 'Write your email subject here', 'Write short description here', 'Briefly describe what the email is about', 1, 1, '2023-04-11 16:57:34', '2023-04-17 21:28:10'),
(51, 'Web Content Generator', 'assets/uploads/useCase/2023/04/11/web-content-generator8024.png', 'Create interesting Web Content Generator to draw readers to your email.', 'Generate the Web Content named [title], The description of the content is  [description]', 5, 1, 'Title', '', 'Description', 'Write your title here', 'Write short description here', 'Briefly describe what the content is about', 1, 1, '2023-04-11 16:58:25', '2023-04-17 21:28:46'),
(52, 'Blog Meta Description', 'assets/uploads/useCase/2023/04/11/blog-meta-description6399.png', 'Create your blog\'s meta description.', 'Generate a blog meta description for my blog [description]', 2, 1, '', '', 'Description', 'Write here', 'Write short description here', 'Briefly describe what the blog is about', 1, 1, '2023-04-11 16:59:46', '2023-04-17 21:29:11'),
(53, 'Blog Tag Generator', 'assets/uploads/useCase/2023/04/11/blog-tag-generator1398.png', 'Create Blog tags Generator that are ideal for SEO.', 'Generate some blog tags for my blog post about [title]', 2, 1, 'Description', '', '', 'Briefly describe what the blog is about', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 17:00:22', '2023-04-17 21:29:36'),
(54, 'Blog ALT Text Generator', 'assets/uploads/useCase/2023/04/11/blog-alt-text-generator7454.png', 'Create Blog Alt Tags Generators that are ideal for SEO.', 'Generate my blog  Image ALT Text for an image about [title]', 2, 1, 'Description', '', '', 'Briefly describe what the blog is about', 'Write short description here', 'Write description here', 1, 1, '2023-04-11 17:00:57', '2023-04-17 21:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `use_case_categories`
--

CREATE TABLE `use_case_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `use_case_categories`
--

INSERT INTO `use_case_categories` (`id`, `name`, `slug`, `is_published`, `created_at`, `updated_at`) VALUES
(2, 'Blog', 'blog', 1, '2023-04-08 09:45:43', '2023-04-08 09:45:43'),
(3, 'Email', 'email', 1, '2023-04-08 09:45:47', '2023-04-08 09:45:47'),
(4, 'Social Media', 'social-media', 1, '2023-04-11 15:46:54', '2023-04-11 15:46:54'),
(5, 'Content', 'content', 1, '2023-04-11 15:56:49', '2023-04-11 15:56:49'),
(6, 'Other', 'other', 1, '2023-04-11 16:03:44', '2023-04-11 16:03:44'),
(7, 'Website', 'website', 1, '2023-04-11 16:17:38', '2023-04-11 16:17:38'),
(8, 'Video', 'video', 1, '2023-04-11 16:24:09', '2023-04-11 16:24:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ai_chat_histories`
--
ALTER TABLE `ai_chat_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ai_chat_histories_user_id_foreign` (`user_id`);

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
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_user_id_foreign` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `use_cases_use_case_category_id_foreign` (`use_case_category_id`);

--
-- Indexes for table `use_case_categories`
--
ALTER TABLE `use_case_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ai_chat_histories`
--
ALTER TABLE `ai_chat_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `content_histories`
--
ALTER TABLE `content_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plan_expenses`
--
ALTER TABLE `plan_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `use_cases`
--
ALTER TABLE `use_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `use_case_categories`
--
ALTER TABLE `use_case_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ai_chat_histories`
--
ALTER TABLE `ai_chat_histories`
  ADD CONSTRAINT `ai_chat_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `use_cases`
--
ALTER TABLE `use_cases`
  ADD CONSTRAINT `use_cases_use_case_category_id_foreign` FOREIGN KEY (`use_case_category_id`) REFERENCES `use_case_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
