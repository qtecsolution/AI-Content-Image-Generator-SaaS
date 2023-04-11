-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2023 at 05:42 AM
-- Server version: 5.7.35
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qtecsol1_creaify`
--

-- --------------------------------------------------------

--
-- Table structure for table `ai_chat_histories`
--

CREATE TABLE `ai_chat_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_request` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat_response` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ai_chat_histories`
--

INSERT INTO `ai_chat_histories` (`id`, `chat_request`, `chat_response`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'hello', 'Hello! How can I assist you today?', 1, '2023-04-10 09:12:11', '2023-04-10 09:12:11'),
(2, 'how are you?', 'As an AI, I don\'t have feelings like humans. But I\'m functioning well, thank you. How can I assist you?', 1, '2023-04-10 09:12:28', '2023-04-10 09:12:28'),
(3, 'give me a html sample code', '<!DOCTYPE html>\n<html>\n<head>\n	<title>Sample HTML Code</title>\n</head>\n<body>\n	<header>\n		<h1>Welcome to my Website</h1>\n		<nav>\n			<ul>\n				<li><a href=\"#\">Home</a></li>\n				<li><a href=\"#\">About Us</a></li>\n				<li><a href=\"#\">Contact Us</a></li>\n			</ul>\n		</nav>\n	</header>\n	<main>\n		<h2>About Us</h2>\n		<p>We are a group of passionate individuals who are dedicated to providing the best services to our clients. Our team consists of highly skilled professionals who are constantly learning and adapting to new technologies and trends.</p>\n		<h2>Contact Us</h2>\n		<form>\n			<label for=\"name\">Name:</label><br>\n			<input type=\"text\" id=\"name\" name=\"name\"><br>\n', 1, '2023-04-10 09:13:51', '2023-04-10 09:13:51'),
(4, 'give me a js script sample', 'Here is an example of a JavaScript function that calculates the factorial of a number:\n\n```\nfunction factorial(num) {\n  if (num === 0 || num === 1) {\n    return 1;\n  } else {\n    return num * factorial(num - 1);\n  }\n}\n\nconsole.log(factorial(5)); // Output: 120\n```\n\nThis function takes a number `num` as input and recursively calculates its factorial. The base case is when `num` is 0 or 1, in which case the function returns 1. Otherwise, it multiplies `num` by the factorial of `num-1`. We then call the function with `factorial(5)` and print the result to the console.', 1, '2023-04-10 09:14:15', '2023-04-10 09:14:15'),
(5, 'hello', 'Hello! How can I assist you today?', 1, '2023-04-10 09:31:17', '2023-04-10 09:31:17'),
(6, 'hi', 'Hello! How may I assist you today?', 1, '2023-04-10 09:31:57', '2023-04-10 09:31:57'),
(7, 'My Name is NM Babor\ni work at qtec solution ltd. \ndo you know my boss name?', 'As an AI language model, I do not have access to information about specific companies or their employees. Therefore, I am unable to provide you with the name of your boss at Qtec Solution Ltd.', 1, '2023-04-10 09:32:55', '2023-04-10 09:32:55'),
(8, 'my boss name mosarrof rubel\nfrom noakhali', 'That\'s great to know! Is there anything else you would like to share about your boss or Noakhali? As an AI language model, I am always here to listen and assist you with your queries.', 1, '2023-04-10 09:36:10', '2023-04-10 09:36:10'),
(9, 'who is my boss?', 'As an AI language model, I am not authorized to have knowledge of your workplace or employment status. Please refer to your contract or HR department to find out who your boss is.', 1, '2023-04-10 09:36:35', '2023-04-10 09:36:35'),
(10, 'hi', 'Hello, how can I assist you today?', 1, '2023-04-10 09:55:44', '2023-04-10 09:55:44'),
(11, 'hi', 'Hello! How can I assist you today?', 3, '2023-04-10 09:58:50', '2023-04-10 09:58:50'),
(12, 'hello', 'Hello! How can I assist you today?', 3, '2023-04-10 09:59:03', '2023-04-10 09:59:03'),
(13, 'hello', 'Hello there! How may I assist you today?', 3, '2023-04-10 10:00:43', '2023-04-10 10:00:43'),
(14, 'what is your name', 'As an AI language model, I don\'t have a name, but you can refer to me as OpenAI.', 3, '2023-04-10 10:00:58', '2023-04-10 10:00:58'),
(15, 'Meaning of GPT', 'GPT stands for \"Generative Pre-trained Transformer\". It is a type of deep learning language model used for natural language processing tasks like language translation, text completion, and text summarization. GPT is based on a transformer architecture and is trained on massive amounts of data to improve its performance. The most popular versions of GPT include GPT-2 and GPT-3.', 3, '2023-04-10 10:01:39', '2023-04-10 10:01:39'),
(16, 'if i use a function in form submit, how can i use evenet.preventDefault', 'To use `event.preventDefault()` in a form submit function, you can pass the event object as a parameter in the function and call `preventDefault()` on it.\n\nHere\'s an example:\n\n```\n<form id=\"my-form\">\n  <input type=\"text\" name=\"text-input\">\n  <button type=\"submit\" id=\"submit-btn\">Submit</button>\n</form>\n\n<script>\n  const form = document.getElementById(\"my-form\");\n  const submitBtn = document.getElementById(\"submit-btn\");\n  \n  form.addEventListener(\"submit\", handleSubmit);\n  \n  function handleSubmit(event) {\n    event.preventDefault();\n    // Do something here\n  }\n</script>\n```\n\nIn the above example, the `handleSubmit` function is called when the form is submitted. It prevents the default form submit behavior using `event.preventDefault()`. You can add your own custom code here to handle the form submission.', 3, '2023-04-10 10:02:48', '2023-04-10 10:02:48'),
(17, 'hello', 'Hello! How may I assist you today?', 1, '2023-04-10 11:29:59', '2023-04-10 11:29:59'),
(18, 'hello', 'Hello! How may I assist you today?', 3, '2023-04-10 22:37:07', '2023-04-10 22:37:07'),
(19, 'hello', 'Hi there, how may I assist you today?', 1, '2023-04-11 14:24:04', '2023-04-11 14:24:04'),
(20, 'how are you', 'I\'m an AI language model, so I don\'t have feelings or emotions, but I\'m functioning normally. How can I assist you today?', 1, '2023-04-11 14:24:21', '2023-04-11 14:24:21'),
(21, 'gime me weather update in banglades', 'As an AI language model, I do not have access to real-time information, but according to recent reports, Bangladesh is currently experiencing hot and humid weather with occasional rain showers in some parts. The average temperature in the capital city of Dhaka is around 32°C (90°F) during the day and 24°C (75°F) at night. It is recommended to stay hydrated and avoid prolonged exposure to the sun. Residents should also keep an eye out for any potential natural disasters, such as cyclones or floods, during this monsoon season.', 1, '2023-04-11 14:24:59', '2023-04-11 14:24:59'),
(22, 'how to center a dive in html ?', 'To center a div in HTML, you can use the CSS property called \"margin\" and set it to \"auto\". Here\'s an example:\n\n```html\n<div style=\"width: 50%; margin: 0 auto;\">\n  <p>This is a centered div!</p>\n</div>\n```\n\nIn this example, the \"width\" property is set to 50% of the parent container and the \"margin\" property is set to 0 (top and bottom margins) and \"auto\" (left and right margins). This will center the div horizontally within the parent container.', 1, '2023-04-11 15:23:38', '2023-04-11 15:23:38'),
(23, 'Hello', 'Hello! How may I assist you today?', 4, '2023-04-11 18:16:57', '2023-04-11 18:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` tinytext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(4) NOT NULL DEFAULT '1',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `tags`, `image`, `meta_description`, `description`, `is_published`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', NULL, 'assets/uploads/blogs/2023/04/09/16810192623853.png', NULL, '<p>asa asd asd</p>', 1, 1, 1, '2023-04-09 05:47:42', '2023-04-09 05:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(4) NOT NULL DEFAULT '1',
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `tags`, `is_published`, `meta_description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Blog Category', 'blog-category', 'Blog Category', 1, 'Blog Category', 1, '2023-04-08 09:37:56', '2023-04-08 09:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `content_histories`
--

CREATE TABLE `content_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `use_case_id` bigint(20) UNSIGNED DEFAULT NULL,
  `temperature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `prompt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `generated_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('content','code') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'content',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_histories`
--

INSERT INTO `content_histories` (`id`, `use_case_id`, `temperature`, `title`, `short_description`, `description`, `prompt`, `generated_content`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(1, NULL, '1', 'Javascript Alert', NULL, 'Javascript Alert', 'You are a helpful assistant that writes code.', 'The `alert()` method is a function in JavaScript that displays a message box with a specified message and an OK button. Its syntax is as follows:\n\n```\nalert(\"Your message here\");\n```\n\nFor example, if you want to display a message \"Hello, World!\" using an alert box, the code would be:\n\n```\nalert(\"Hello, World!\");\n```\n\nWhen this code is executed, a message box displaying \"Hello, World!\" will pop up on the screen with an OK button. Clicking the OK button will close the message box.', 1, 'code', '2023-04-09 06:55:36', '2023-04-09 06:55:36'),
(2, NULL, '1', 'Laravel file storage system', NULL, 'Laravel file storage system', 'You are a helpful assistant that writes code.', 'Laravel is a powerful PHP framework that simplifies web development. One of the most important features of Laravel is its built-in file storage system, which makes it straightforward to upload, store, and retrieve files from your web application.\n\nHere\'s a brief overview of how the Laravel file storage system works:\n\n1. Configuration: To start using file storage in Laravel, you\'ll need to configure your application\'s settings. You can define the file system type, disk, and other settings in your `config/filesystems.php` file.\n\n2. Storage Drivers: Laravel supports several storage drivers such as local, FTP, S3, and Google Cloud storage. You can easily configure and switch between them in your application.\n\n3. Uploading Files: Laravel provides an easy way to upload files using the `store()` method. This method takes care of converting the file, setting permissions, and storing it in the location specified.\n\n4. Retrieving Files: Once you have uploaded the files, you can retrieve them using the `url()` method. This method returns the public URL of the file.\n\n5. File System Operations: Laravel\'s file storage system provides many powerful operations such as moving, copying, deleting, and renaming files. You can use these methods to manage your files seamlessly.\n\nOverall, Laravel\'s file storage system is a robust and easy-to-use solution for managing files in your web application.', 1, 'code', '2023-04-09 08:32:52', '2023-04-09 08:32:52'),
(3, NULL, '1', 'php file upload code', NULL, 'php file upload code', 'You are a helpful assistant that writes code.', 'Here\'s an example of how to upload a file using PHP:\n\nHTML form:\n```\n<form method=\"post\" enctype=\"multipart/form-data\">\n    <input type=\"file\" name=\"file\">\n    <input type=\"submit\" name=\"submit\" value=\"Upload\">\n</form>\n```\n\nPHP code to handle the file upload:\n```\nif (isset($_POST[\'submit\'])) {\n    $file = $_FILES[\'file\'];\n\n    $fileName = $_FILES[\'file\'][\'name\'];\n    $fileTmpName = $_FILES[\'file\'][\'tmp_name\'];\n    $fileSize = $_FILES[\'file\'][\'size\'];\n    $fileError = $_FILES[\'file\'][\'error\'];\n    $fileType = $_FILES[\'file\'][\'type\'];\n\n    $fileExt = explode(\'.\', $fileName);\n    $fileActualExt = strtolower(end($fileExt));\n\n    $allowed = array(\'jpg\', \'jpeg\', \'png\', \'pdf\'); // allowed file extensions\n\n    if (in_array($fileActualExt, $allowed)) {\n        if ($fileError === 0) {\n            if ($fileSize < 1000000) { // max file size\n                $fileNameNew = uniqid(\'\', true).\".\".$fileActualExt;\n                $fileDestination = \'uploads/\'.$fileNameNew;\n                move_uploaded_file($fileTmpName, $fileDestination);\n                echo \"File uploaded successfully.\";\n            } else {\n                echo \"File is too big.\";\n            }\n        } else {\n            echo \"Error uploading the file.\";\n        }\n    } else {\n        echo \"Invalid file type.\";\n    }\n}\n```\n\nThis code checks if a file has been uploaded, validates its extension, size and, if everything is correct, moves it to a folder named \"uploads\". You can modify the code to suit your specific needs.', 1, 'code', '2023-04-09 08:33:37', '2023-04-09 08:33:37'),
(4, NULL, '1', 'html login form code', NULL, 'html login form code', 'You are a helpful assistant that writes code.', 'Here\'s a basic HTML login form code:\n\n```\n<form>\n  <label for=\"username\">Username:</label>\n  <input type=\"text\" id=\"username\" name=\"username\">\n\n  <label for=\"password\">Password:</label>\n  <input type=\"password\" id=\"password\" name=\"password\">\n\n  <input type=\"submit\" value=\"Login\">\n</form>\n```\n\nThis form includes two input fields, \"Username\" and \"Password\", and a submit button with the text \"Login\". When the form is submitted, it will send the values of the two fields to the server for further processing. Note that this is just a basic example, and a real login form would require much more security measures.', 1, 'code', '2023-04-09 08:34:53', '2023-04-09 08:34:53'),
(5, 5, '0.7', 'Android Phone', '', 'Android Phone with 40 mega pixel camera.', 'Write me content with this title \"Android Phone\"  and the description: Android Phone with 40 mega pixel camera. The tone of voice must be casual. Give me the response in English (USA) language.', '\n\nAre you looking for a smartphone that has it all? Look no further than an Android phone with a 40 mega pixel camera! This smartphone has all the latest features, along with an incredibly powerful camera. With 40 mega pixels, you can capture every moment in stunning detail. The phone also has plenty of other features, from a long-lasting battery and a water-resistant body to an intuitive interface and an array of apps. Plus, you can customize this phone to fit your lifestyle and preferences. Get an Android phone with a 40 mega pixel camera today and start capturing the world around you in incredible detail.', 1, 'content', '2023-04-10 04:39:51', '2023-04-10 04:39:51'),
(6, NULL, '1', 'Write a javascript code for image preview for input', NULL, 'Write a javascript code for image preview for input', 'You are a helpful assistant that writes code.', 'Here\'s an example code for creating an image preview for input using JavaScript:\n\nHTML:\n```html\n<input type=\"file\" id=\"inputImage\"/>\n<img id=\"preview\"/>\n```\n\nJavaScript:\n```javascript\nconst inputImage = document.querySelector(\'#inputImage\');\nconst preview = document.querySelector(\'#preview\');\n\ninputImage.addEventListener(\'change\', () => {\n  const file = inputImage.files[0];\n  const reader = new FileReader();\n\n  reader.addEventListener(\'load\', () => {\n    preview.src = reader.result;\n  });\n\n  if (file) {\n    reader.readAsDataURL(file);\n  }\n});\n```\n\nThis code listens for a file input change event and uses FileReader to read the selected file. Once the file has been read, it sets the image preview\'s source to the read result.', 1, 'code', '2023-04-10 05:37:49', '2023-04-10 05:37:49'),
(7, 6, '0.7', 'Cover Latter', '', 'Cover Latter', 'Write me content with this title \"Cover Latter\" and the description: Cover Latter The tone of voice must be casual. Give me the response in English (USA) language.', '\n\nWriting a cover letter can be a daunting task, especially if you\'ve never done it before. But don\'t worry! A cover letter is simply a short introduction to the employer about who you are and why you\'re the right person for the job.\n\nWhen crafting your cover letter, it\'s important to keep a few things in mind. Start by making sure you have the employer\'s name, job title, and contact information. Then, use a conversational but professional tone as you explain why you\'re the perfect candidate for the job. Highlight your relevant skills and qualifications, and make sure to include any relevant experiences or achievements.\n\nFinally, be sure to thank the employer for taking the time to read your application. Closing your letter on a positive note is sure to leave a good impression.\n\nGood luck!', 1, 'content', '2023-04-10 05:41:50', '2023-04-10 05:41:50'),
(8, 5, '0.7', 'Laptop', '', 'A second hand laptop, brand HP, ram 8 gb, processor core i5, storage 256 gb ssd', 'Write me content with this title \"Laptop\"  and the description: A second hand laptop, brand HP, ram 8 gb, processor core i5, storage 256 gb ssd The tone of voice must be casual. Give me the response in English (USA) language.', '<br>\n<br>\nAre you looking for a laptop that can handle all of your computing needs? Look no further than this second-hand HP laptop. With 8GB of RAM, a Core i5 processor and 256GB SSD storage, you\'ll have plenty of power and storage to take care of your workload. Whether you\'re surfing the web, editing photos or playing games, this laptop is up to the task. Get yours today and enjoy the power of a second-hand HP laptop.', 1, 'content', '2023-04-10 05:56:11', '2023-04-10 05:56:11'),
(9, 5, '0.7', 'A Second Hand Laptop', '', 'I have laptop with charger. Now i want sell it. ram 8 gb, storage 256 gb ssd. Brand HP, Processor core i5', 'Write me product description with this title \"A Second Hand Laptop\" and the description: I have laptop with charger. Now i want sell it. ram 8 gb, storage 256 gb ssd. Brand HP, Processor core i5 The tone of voice must be casual. Give me the response in English (USA) language.', '<br>\n<br>\nLooking for a reliable laptop? Look no further! I\'m selling this pre-loved HP laptop with 8GB RAM and 256GB SSD storage. It has a Core i5 processor, so you can count on it to handle all your computing needs. Plus, it comes with a charger. Get it now before it\'s gone!', 1, 'content', '2023-04-10 05:59:51', '2023-04-10 05:59:51'),
(10, 5, '0.7', 'A Second Hand Laptop', '', 'I have laptop with charger. Now i want sell it. ram 8 gb, storage 256 gb ssd. Brand HP, Processor core i5. Looking so nice', 'Write me product description with this title \"A Second Hand Laptop\" and the description: I have laptop with charger. Now i want sell it. ram 8 gb, storage 256 gb ssd. Brand HP, Processor core i5. Looking so nice The tone of voice must be casual. Give me the response in English (USA) language.', '\n\nAre you looking for a powerful laptop without breaking the bank? Look no further! This second hand HP laptop is perfect for all your computing needs. It comes with a powerful 8GB of RAM and 256GB of SSD storage, plus an Intel Core i5 processor. The laptop looks great and is sure to be a great addition to your workspace. Plus, the charger is included, so you won\'t have to worry about buying any extra charging cables. Get the performance you need at an unbeatable price.', 1, 'content', '2023-04-10 06:01:01', '2023-04-10 06:01:01'),
(11, 5, '0.7', 'A Second Hand Laptop', '', 'I have laptop with charger. Now i want sell it. ram 8 gb, storage 256 gb ssd. Brand HP, Processor core i5. Looking so nice', 'Write me product description with this title \"A Second Hand Laptop\" and the description: I have laptop with charger. Now i want sell it. ram 8 gb, storage 256 gb ssd. Brand HP, Processor core i5. Looking so nice The tone of voice must be casual. Give me the response in English (USA) language.', '\n\nThis is a great deal for anyone looking for a second hand laptop! This HP laptop has 8GB of RAM and a 256GB SSD, which is plenty of storage space to store all of your documents, pictures and videos. Plus, it has a powerful Intel Core i5 processor, so you know this laptop will perform well. And it looks great too - it\'s in excellent condition and ready to go. Don\'t miss out on this great opportunity - grab it while you can!', 1, 'content', '2023-04-10 06:01:20', '2023-04-10 06:01:20'),
(12, 5, '0.7', 'A Second Hand Laptop', '', 'I have laptop with charger. Now i want sell it. ram 8 gb, storage 256 gb ssd. Brand HP, Processor core i5. Looking so nice', 'Write me product description with this title \"A Second Hand Laptop\" and the description: I have laptop with charger. Now i want sell it. ram 8 gb, storage 256 gb ssd. Brand HP, Processor core i5. Looking so nice The tone of voice must be casual. Give me the response in English (USA) language.', '\n\nAre you in the market for a great laptop? Look no further! I have a second hand HP laptop with 8 GB RAM and 256 GB SSD storage. It\'s powered by a Core i5 processor and looks great! It also comes with a charger. Don\'t miss out on this amazing opportunity - get it while it lasts!', 1, 'content', '2023-04-10 06:01:45', '2023-04-10 06:01:45'),
(13, 6, '0.7', 'Cover Latter', '', 'Cover Latter', 'Write me content with this title \"Cover Latter\" and the description: Cover Latter The tone of voice must be casual. Give me the response in English (USA) language.', '<br>\n<br>\nA cover letter is a great way to introduce yourself to someone who may not have met you before. It is your chance to show off your personality and make a great first impression.<br>\n<br>\nA cover letter should be written in a casual, conversational tone. This is your chance to stand out from the crowd and make a connection with the person you are sending it to. Make sure not to be overly formal or too stiff.<br>\n<br>\nMake sure to include information about why you are writing in the cover letter. You can mention something specific about the company or position that made you interested in applying. Show the employer that you have done your research and understand the job.<br>\n<br>\nAt the end of your cover letter, make sure to thank the employer for their time and consideration. This small gesture can really make a difference.<br>\n<br>\nWriting a cover letter can be intimidating, but with a little creativity and effort, it can be a great way to make a great impression and stand out from', 1, 'content', '2023-04-10 06:02:50', '2023-04-10 06:02:50'),
(14, 6, '0.7', 'Cover Letter', '', 'Cover Letter', 'Write me content with this title \"Cover Letter\" and the description: Cover Letter The tone of voice must be casual. Give me the response in English (USA) language.', '\n\nDear [Hiring Manager],\n\nI am writing to apply for the [Position] at [Company], and I am confident that I am a great fit for the role. With my [number] years of experience in [field], I believe I can bring a valuable perspective to the team.\n\nI am passionate about the work I do and I am eager to learn and grow in my career. I am highly organized, reliable, and have a strong attention to detail. I am able to work both independently, and as part of a team in order to ensure that projects are completed on-time and to the highest standard.\n\nI am confident that I have the skills and experience you are looking for in a candidate. I am excited to have the opportunity to discuss this role in further detail with you and I look forward to hearing from you soon.\n\nSincerely, \n[Your Name]', 1, 'content', '2023-04-10 06:03:30', '2023-04-10 06:03:30'),
(15, 6, '0.7', 'Cover Letter', '', 'Cover Letter', 'Write me content with this title \"Cover Letter\" and the description: Cover Letter The tone of voice must be casual. Give me the response in English (USA) language.', '', 1, 'content', '2023-04-10 06:04:55', '2023-04-10 06:04:55'),
(16, 6, '0.7', 'Cover Letter', '', 'Cover Letter', 'Write me content with this title \"Cover Letter\" and the description: Cover Letter The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nWhen you\'re applying for a job, a cover letter can help you make a great first impression. It\'s an opportunity to show your personality and how you\'ll fit into the company\'s culture. A cover letter should highlight your qualifications and provide a sense of what kind of employee you\'ll be.<br>\n<br>\nWriting a good cover letter can be challenging, so it\'s important to take your time and write it carefully. Here are some tips to help you craft the perfect cover letter:<br>\n<br>\n• Start by introducing yourself. Include your name, the job you\'re applying for, and why you\'re the right person for the job.<br>\n<br>\n• Explain why you\'re interested in the company and what makes you a good fit. Show that you\'ve done your research and have a genuine interest in the company.<br>\n<br>\n• Focus on your qualifications. Highlight the experiences, skills, and accomplishments that make you the right person for the job.<br>\n<br>\n• Conclude your letter by expressing your', 1, 'content', '2023-04-10 06:05:31', '2023-04-10 06:05:31'),
(17, 6, '0.7', 'Cover Letter', '', 'Cover Letter', 'Write me content with this title \"Cover Letter\" and the description: Cover Letter The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nA cover letter is an important part of any job application, as it will introduce you to the employer and provide them with an insight into your experience and qualifications.<br>\n<br>\nAs such, it’s important to create a well-crafted cover letter that will help you stand out from the competition.<br>\n<br>\nMy name is [Name], and I am applying for the [Position Title] position at [Company Name].<br>\n<br>\nI believe that my background in [Field] and my passion for [Industry] make me an ideal candidate for this role. I have [Years] of experience in [Field], and I am confident that I can quickly and effectively hit the ground running.<br>\n<br>\nI am highly organized, detail-oriented, and committed to exceeding expectations. I have a strong work ethic and an eagerness to learn and grow in the role.<br>\n<br>\nI am excited to share my enthusiasm and knowledge with your team and contribute to the success of [Company Name].<br>\n', 1, 'content', '2023-04-10 06:09:40', '2023-04-10 06:09:40'),
(18, NULL, '1', 'write a js code for file upload', NULL, 'write a js code for file upload', 'You are a helpful assistant that writes code.', '<pre class=\'pre-line\'> Here&#039;s a code snippet for uploading files using JavaScript:\n\nHTML:\n<code>html\n&lt;form&gt;\n  &lt;input type=&quot;file&quot; id=&quot;fileInput&quot;&gt;\n  &lt;button type=&quot;button&quot; onclick=&quot;uploadFile()&quot;&gt;Upload&lt;/button&gt;\n&lt;/form&gt;\n</code>\n\nJS:\n<code>javascript\nfunction uploadFile() {\n  const input = document.getElementById(&#039;fileInput&#039;);\n  const file = input.files[0];\n  const url = &#039;your_upload_url_here&#039;;\n\n  const xhr = new XMLHttpRequest();\n  const formData = new FormData();\n\n  formData.append(&#039;file&#039;, file);\n\n  xhr.onreadystatechange = function () {\n    if (xhr.readyState === XMLHttpRequest.DONE) {\n      if (xhr.status === 200) {\n        console.log(xhr.responseText);\n      } else {\n        console.error(&#039;There was a problem uploading the file.&#039;);\n      }\n    }\n  };\n\n  xhr.open(&#039;POST&#039;, url, true);\n  xhr.send(formData);\n}\n</code>\nNote: Replace `&#039;your_upload_url_here&#039;` with the URL where you want to upload the file. </pre>', 1, 'code', '2023-04-10 06:11:21', '2023-04-10 06:11:21'),
(19, NULL, '1', 'write a code for file upload in js', NULL, 'write a code for file upload in js', 'You are a helpful assistant that writes code.', '<pre class=\'pre-line\'> Sure, here&#039;s a sample code for file upload in JavaScript:\n\n<code>html\n&lt;form method=&quot;post&quot; enctype=&quot;multipart/form-data&quot;&gt;\n  &lt;input type=&quot;file&quot; name=&quot;file&quot;&gt;\n  &lt;button type=&quot;submit&quot;&gt;Upload&lt;/button&gt;\n&lt;/form&gt;\n\n&lt;script&gt;\n  const form = document.querySelector(&#039;form&#039;);\n  form.addEventListener(&#039;submit&#039;, (e) =&gt; {\n    e.preventDefault();\n    const formData = new FormData(form);\n    fetch(&#039;/your-upload-endpoint&#039;, {\n      method: &#039;POST&#039;,\n      body: formData\n    })\n    .then(response =&gt; response.json())\n    .then(data =&gt; console.log(data))\n    .catch(error =&gt; console.error(error))\n  });\n&lt;/script&gt;\n</code>\n\nIn the above code, we have a basic HTML form that includes a file input and a submit button. When this form gets submitted, we prevent the default behavior using `e.preventDefault()`, and then we create a new instance of `FormData` from the form element. Finally, we use `fetch` to make a POST request to a server endpoint that handles the file upload. Once the upload is complete, we log the response data to the console. </pre>', 1, 'code', '2023-04-10 06:12:27', '2023-04-10 06:12:27'),
(20, NULL, '1', 'write a code for file upload in php', NULL, 'write a code for file upload in php', 'You are a helpful assistant that writes code.', '<pre class=\'pre-line\'> Here&#039;s an example code for file upload in PHP:\n\n<code>\n&lt;form action=&quot;upload.php&quot; method=&quot;post&quot; enctype=&quot;multipart/form-data&quot;&gt;\n  &lt;input type=&quot;file&quot; name=&quot;fileToUpload&quot; id=&quot;fileToUpload&quot;&gt;\n  &lt;input type=&quot;submit&quot; value=&quot;Upload&quot; name=&quot;submit&quot;&gt;\n&lt;/form&gt;\n\n&lt;?php\nif(isset($_POST[&quot;submit&quot;])){\n  $target_dir = &quot;uploads/&quot;;\n  $target_file = $target_dir . basename($_FILES[&quot;fileToUpload&quot;][&quot;name&quot;]);\n  $uploadOk = 1;\n  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));\n  \n  // Check if file already exists\n  if (file_exists($target_file)) {\n    echo &quot;Sorry, file already exists.&quot;;\n    $uploadOk = 0;\n  }\n  \n  // Check file size\n  if ($_FILES[&quot;fileToUpload&quot;][&quot;size&quot;] &gt; 500000) {\n    echo &quot;Sorry, your file is too large.&quot;;\n    $uploadOk = 0;\n  }\n  \n  // Allow only certain file formats\n  if($imageFileType != &quot;jpg&quot; &amp;&amp; $imageFileType != &quot;png&quot; &amp;&amp; $imageFileType != &quot;jpeg&quot; &amp;&amp; $imageFileType != &quot;gif&quot;) {\n    echo &quot;Sorry, only JPG, JPEG, PNG &amp; GIF files are allowed.&quot;;\n    $uploadOk = 0;\n  }\n  \n  // Check if $uploadOk is set to 0 by an error\n  if ($uploadOk == 0) {\n    echo &quot;Sorry, your file was not uploaded.&quot;;\n  } else {\n    if (move_uploaded_file($_FILES[&quot;fileToUpload&quot;][&quot;tmp_name&quot;], $target_file)) {\n      echo &quot;The file &quot;. htmlspecialchars( basename( $_FILES[&quot;fileToUpload&quot;][&quot;name&quot;])). &quot; has been uploaded.&quot;;\n    } else {\n      echo &quot;Sorry, there was an error uploading your file.&quot;;\n    }\n  }\n}\n?&gt;\n</code>\n\nPlease note that you should create a &quot;uploads&quot; folder in your root directory, and make sure it has write permission (e.g. 755 or 777, depending on your server configuration). </pre>', 1, 'code', '2023-04-10 06:13:22', '2023-04-10 06:13:22'),
(21, NULL, '1', 'Write a php upload file code', NULL, 'Write a php upload file code', 'You are a helpful assistant that writes code.', '<pre class=\'pre-line\'> Sure, here is an example PHP code to upload a file:\n\n```php\n&lt;?php\n// Check if a file was uploaded\nif(isset($_FILES[&#039;file&#039;])) {\n   $errors = array();\n   $file_name = $_FILES[&#039;file&#039;][&#039;name&#039;];\n   $file_size = $_FILES[&#039;file&#039;][&#039;size&#039;];\n   $file_tmp = $_FILES[&#039;file&#039;][&#039;tmp_name&#039;];\n   $file_type = $_FILES[&#039;file&#039;][&#039;type&#039;];\n   \n   // Allow only certain file types\n   $allowed_file_types = array(&#039;jpg&#039;, &#039;jpeg&#039;, &#039;png&#039;, &#039;pdf&#039;);\n   $file_ext = strtolower(end(explode(&#039;.&#039;,$_FILES[&#039;file&#039;][&#039;name&#039;])));\n   \n   if(!in_array($file_ext,$allowed_file_types)) {\n      $errors[] = &quot;File type not allowed. Only JPG, JPEG, PNG and PDF files are allowed.&quot;;\n   }\n   \n   if($file_size &gt; 2097152) {\n      $errors[] = &#039;File size cannot exceed  </pre>', 2, 'code', '2023-04-10 09:47:09', '2023-04-10 09:47:09'),
(22, NULL, '1', 'write html sample code', NULL, 'write html sample code', 'You are a helpful assistant that writes code.', '<pre class=\'pre-line\'> Sure, here is an example of basic HTML code:\n\n<code>html\n&lt;!DOCTYPE html&gt;\n&lt;html&gt;\n  &lt;head&gt;\n    &lt;title&gt;My Website&lt;/title&gt;\n  &lt;/head&gt;\n  &lt;body&gt;\n    &lt;h1&gt;Welcome to my website!&lt;/h1&gt;\n    &lt;p&gt;This is some sample text.&lt;/p&gt;\n    &lt;ul&gt;\n      &lt;li&gt;List item 1&lt;/li&gt;\n      &lt;li&gt;List item 2&lt;/li&gt;\n      &lt;li&gt;List item 3&lt;/li&gt;\n    &lt;/ul&gt;\n  &lt;/body&gt;\n&lt;/html&gt;\n</code>\n\nIn this example, we have a basic HTML document with a title, header, and a simple list. The `&lt;!DOCTYPE html&gt;` declaration at the beginning of the document lets the web browser know that this is an HTML5 document. The `&lt;html&gt;` tag represents the root element of the page, and all other elements should be within it. The `&lt;head&gt;` section contains metadata about the document, such as the title of the page. The </pre>', 1, 'code', '2023-04-10 11:30:19', '2023-04-10 11:30:19'),
(24, NULL, '1', 'fgh', NULL, 'fgh', 'You are a helpful assistant that writes code.', '<pre class=\'pre-line\'> I&#039;m sorry, could you please provide more information or context for what you need help with? </pre>', 1, 'code', '2023-04-11 14:21:55', '2023-04-11 14:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `is_published` tinyint(4) NOT NULL DEFAULT '1',
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
(3, 'What Davinci uses behind?', 'Davinci is fully powered by OpenAI GPT3 and DALLE services.', 3, 1, 1, '2023-04-11 21:17:21', '2023-04-11 21:17:21'),
(4, 'What kind of payment gateways does Davinci supports?', 'Davinci supports 8 different payment gateways, 6 can be used for both Prepaid and Subscription plans. Refer to the description to get the exact list.', 4, 1, 1, '2023-04-11 21:19:06', '2023-04-11 21:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prompt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `prompt`, `size`, `image_path`, `old_image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', '256x256', 'assets/uploads/ai_images//2023/04/11/202304112449.png', NULL, 1, '2023-04-11 14:25:26', '2023-04-11 14:25:26'),
(2, 'nature', '256x256', 'assets/uploads/ai_images//2023/04/11/202304115326.png', NULL, 1, '2023-04-11 14:25:56', '2023-04-11 14:25:56'),
(3, 'nature', '256x256', 'assets/uploads/ai_images//2023/04/11/202304111304.png', NULL, 1, '2023-04-11 14:26:07', '2023-04-11 14:26:07'),
(4, 'nature', '256x256', 'assets/uploads/ai_images//2023/04/11/202304116504.png', NULL, 1, '2023-04-11 14:26:08', '2023-04-11 14:26:08'),
(5, 'nature', '256x256', 'assets/uploads/ai_images//2023/04/11/202304112181.png', NULL, 1, '2023-04-11 14:26:21', '2023-04-11 14:26:21'),
(6, 'Nature', '256x256', 'assets/uploads/ai_images//2023/04/11/202304115371.png', NULL, 1, '2023-04-11 14:50:35', '2023-04-11 14:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(20, '2023_04_10_150053_create_ai_chat_histories_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `total` double(10,2) DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice`, `user_id`, `plan_id`, `is_paid`, `total`, `payment_method`, `payment_id`, `type`, `other`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, '1680945910-11514', 1, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Admin', 'admin@gmail.com', NULL, NULL, '2023-04-08 09:25:10', '2023-04-08 09:25:10'),
(2, '1681119922-44057', 2, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Rhona French', 'zubilub@mailinator.com', NULL, NULL, '2023-04-10 09:45:22', '2023-04-10 09:45:22'),
(3, '1681120618-10084', 3, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Ria Berg', 'luri@mailinator.com', NULL, NULL, '2023-04-10 09:56:58', '2023-04-10 09:56:58'),
(4, '1681183597-17080', 1, 2, 0, 5.00, 'bank', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-04-11 14:26:37', '2023-04-11 14:26:37'),
(5, '1681185011-25832', 1, 2, 1, 5.00, 'bank', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-04-11 14:50:11', '2023-04-11 14:50:17'),
(6, '1681197401-58264', 4, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Likhon Uz Zaman', 'likhonuzzamanapon02@gmail.com', NULL, NULL, '2023-04-11 18:16:41', '2023-04-11 18:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_authorize` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `meta_keys` mediumtext COLLATE utf8mb4_unicode_ci,
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci,
  `meta_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` longtext COLLATE utf8mb4_unicode_ci,
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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `meta_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keys` longtext COLLATE utf8mb4_unicode_ci,
  `meta_desc` longtext COLLATE utf8mb4_unicode_ci,
  `sorting` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contents`
--

INSERT INTO `page_contents` (`id`, `title`, `page_id`, `body`, `active`, `meta_image`, `meta_keys`, `meta_desc`, `sorting`, `created_at`, `updated_at`) VALUES
(1, 'Terms & Condition', 1, '<p>Terms &amp; Condition<br></p>', 1, NULL, NULL, NULL, 0, '2023-04-09 06:26:02', '2023-04-09 06:26:02'),
(2, 'Terms conditions', 1, '<ol><li style=\"list-style-type:decimal\"><span style=\"font-size:11pt\"><span style=\"font-family:Poppins,sans-serif\"><strong>Terms of use for Creaify are as follows</strong></span></span></li><li style=\"list-style-type:decimal\"><p><font color=\"#333333\" face=\"Calibri, Verdana, Helvetica, sans-serif\">1. <b>Scope of Work:</b> This section defines the project scope, including the deliverables, timelines, and milestones.</font></p><p><font color=\"#333333\" face=\"Calibri, Verdana, Helvetica, sans-serif\"><br></font></p><p><font color=\"#333333\" face=\"Calibri, Verdana, Helvetica, sans-serif\">2. <b>Ownership</b> of Intellectual Property: This section clarifies who owns the intellectual property rights to the AI technology and any data generated during the project.</font></p><p><font color=\"#333333\" face=\"Calibri, Verdana, Helvetica, sans-serif\"><br></font></p><p><font color=\"#333333\" face=\"Calibri, Verdana, Helvetica, sans-serif\">3.&nbsp;</font><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\"><b>Confidentiality: </b>This section outlines the confidentiality obligations of the parties involved, including any non-disclosure requirements.</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\">4. <b>Liability: </b>This section outlines the liability of each party, including any indemnification requirements.</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\">5. <b>Termination:</b> This section outlines the conditions under which the project may be terminated, including any fees or penalties that may apply.</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\">6. <b>Warranties:</b> This section outlines the warranties provided by each party, including any guarantees related to the quality or functionality of the AI technology.</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\">7. <b>Payment Terms:</b> This section outlines the payment terms for the project, including any milestones or invoicing schedules.</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\">8. <b>Governing Law:</b> This section specifies the governing law of the agreement and the jurisdiction in which disputes will be resolved.</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Calibri, Verdana, Helvetica, sans-serif; font-size: 1rem; text-align: var(--bs-body-text-align);\">It\'s important to have a qualified legal professional review and draft any agreements related to an AI project to ensure that all necessary terms and conditions are included and enforceable.</span></p></li></ol>', 1, NULL, NULL, NULL, 0, '2023-04-11 21:12:03', '2023-04-11 21:12:03'),
(3, 'Privacy Policy', 2, '<p><b><span style=\"font-size: 24px;\">Privacy Policy</span></b></p><p><b><span style=\"font-size: 24px;\"><br></span></b><br></p><p>1. Types of Personal Data Collected: This section should outline the types of personal data that the AI project will collect, such as names, email addresses, and browsing history.</p><p><br></p><p> </p><p>2. How Data is Collected: This section should explain how the personal data will be collected, such as through forms or cookies.</p><p><br></p><p>3. Purpose of Data Collection: This section should state the purposes for which the personal data will be used, such as to improve the AI algorithm or to personalize recommendations. </p><p><br></p><p>4. Legal Basis for Data Processing: This section should explain the legal basis for processing the personal data, such as consent or legitimate interest. </p><p><br></p><p>5. Data Sharing: This section should explain whether the personal data will be shared with any third parties, such as service providers or advertisers. </p><p><br></p><p>6. Data Security: This section should outline the measures in place to ensure the security and confidentiality of the personal data. </p><p><br></p><p>7. Data Retention: This section should explain how long the personal data will be retained and the criteria used to determine retention periods. </p><p><br></p><p>8. User Rights: This section should explain the rights that users have regarding their personal data, such as the right to access, rectify, or delete their data.<br></p>', 1, NULL, NULL, NULL, 0, '2023-04-11 21:16:00', '2023-04-11 21:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `word_count` int(11) NOT NULL DEFAULT '0',
  `call_api_count` int(11) NOT NULL DEFAULT '0',
  `documet_count` int(11) NOT NULL DEFAULT '0',
  `lang` enum('all','english') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'english',
  `image_count` int(11) NOT NULL DEFAULT '0',
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `yearly_price` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `user_id`, `name`, `word_count`, `call_api_count`, `documet_count`, `lang`, `image_count`, `is_published`, `price`, `yearly_price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Free', 200, 100, 10, 'english', 5, 1, 0.00, 0.00, '2023-04-08 09:24:30', '2023-04-11 20:38:04'),
(2, 1, 'Basic', 400, 200, 150, 'english', 20, 1, 5.00, 50.00, '2023-04-08 09:24:53', '2023-04-11 20:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `plan_expenses`
--

CREATE TABLE `plan_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `word_count` int(11) NOT NULL DEFAULT '0',
  `call_api_count` int(11) NOT NULL DEFAULT '0',
  `current_api_count` int(11) NOT NULL DEFAULT '0',
  `documet_count` int(11) NOT NULL DEFAULT '0',
  `current_documet_count` int(11) NOT NULL DEFAULT '0',
  `lang` enum('all','english') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'english',
  `image_count` int(11) NOT NULL DEFAULT '0',
  `current_image_count` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `activated_at` datetime DEFAULT NULL,
  `expire_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_expenses`
--

INSERT INTO `plan_expenses` (`id`, `user_id`, `order_id`, `plan_id`, `word_count`, `call_api_count`, `current_api_count`, `documet_count`, `current_documet_count`, `lang`, `image_count`, `current_image_count`, `type`, `activated_at`, `expire_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 200, 100, 47, 10, 10, 'english', 5, 5, 1, '2023-04-08 15:25:10', '2023-05-08 15:25:10', '2023-04-08 09:25:10', '2023-04-11 14:26:21'),
(2, 2, 2, 1, 200, 100, 1, 10, 1, 'english', 5, 0, 1, '2023-04-10 15:45:22', '2023-05-10 15:45:22', '2023-04-10 09:45:22', '2023-04-10 09:47:24'),
(3, 3, 3, 1, 200, 100, 7, 10, 0, 'english', 5, 0, 1, '2023-04-10 15:56:58', '2023-05-10 15:56:58', '2023-04-10 09:56:58', '2023-04-10 22:37:07'),
(4, 1, 5, 2, 400, 253, 1, 150, 0, 'english', 20, 1, 1, '2023-04-11 09:50:17', '2023-05-11 09:50:17', '2023-04-11 14:50:17', '2023-04-11 15:23:38'),
(5, 4, 6, 1, 200, 100, 1, 10, 0, 'english', 5, 0, 1, '2023-04-11 13:16:41', '2023-05-11 13:16:41', '2023-04-11 18:16:41', '2023-04-11 18:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_expense_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_changed` tinyint(4) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `avatar`, `type`, `plan_id`, `order_id`, `google_id`, `plan_expense_id`, `password`, `pass_changed`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, NULL, NULL, 'admin', 2, NULL, NULL, 4, '$2y$10$1SDiVdRA5peWo5CEQr8yG.vFGatkoZZ8BB8R9n7bWy0NfNsedB4ty', 0, NULL, NULL, '2023-04-08 09:23:34', '2023-04-11 14:50:17'),
(2, 'Rhona French', 'zubilub@mailinator.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 2, '$2y$10$ELM1fN0y6ahxJNXtSK0EGuaXaGTEjT2YWu95026C6Fn1LEDcBWzS.', 0, NULL, NULL, '2023-04-10 09:45:22', '2023-04-10 09:45:22'),
(3, 'Ria Berg', 'luri@mailinator.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 3, '$2y$10$59XXoeOLgStspvf3eA7qzug2UiaoVod.kAOI1QfagaPZMaBB.Necq', 0, NULL, NULL, '2023-04-10 09:56:58', '2023-04-10 09:56:58'),
(4, 'Likhon Uz Zaman', 'likhonuzzamanapon02@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 5, '$2y$10$Ub9KI.e8bR/ZxhtrDJmVOu1GviP6oiqwCPC51nXDPYUAuZMTRT/IO', 0, NULL, NULL, '2023-04-11 18:16:40', '2023-04-11 18:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE `user_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `generated_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `use_case_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('content','code') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'content',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_documents`
--

INSERT INTO `user_documents` (`id`, `title`, `short_description`, `description`, `generated_content`, `use_case_id`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Javascript Alerts', NULL, 'Javascript Alert', 'The `alert()` method is a function in JavaScript that displays a message box with a specified message and an OK button. Its syntax is as follows:\n\n```\nalert(\"Your message here\");\n```\n\nFor example, if you want to display a message \"Hello, World!\" using an alert box, the code would be:\n\n```\nalert(\"Hello, World!\");\n```\nHere\'s a basic HTML login form code:\n\n```\n<form>\n  <label for=\"username\">Username:</label>\n  <input type=\"text\" id=\"username\" name=\"username\">\n\n  <label for=\"password\">Password:</label>\n  <input type=\"password\" id=\"password\" name=\"password\">\n\n  <input type=\"submit\" value=\"Login\">\n</form>\n\n```\n\nThis form includes two input fields, \"Username\" and \"Password\", and a submit button with the text \"Login\". When the form is submitted, it will send the values of the two fields to the server for further processing. Note that this is just a basic example, and a real login form would require much more security measures.\nHere\'s an example of how to upload a file using PHP:\n\nHTML form:\n```\n<form method=\"post\" enctype=\"multipart/form-data\">\n    <input type=\"file\" name=\"file\">\n    <input type=\"submit\" name=\"submit\" value=\"Upload\">\n</form>\n```\n\nPHP code to handle the file upload:\n```\nif (isset($_POST[\'submit\'])) {\n    $file = $_FILES[\'file\'];\n\n    $fileName = $_FILES[\'file\'][\'name\'];\n    $fileTmpName = $_FILES[\'file\'][\'tmp_name\'];\n    $fileSize = $_FILES[\'file\'][\'size\'];\n    $fileError = $_FILES[\'file\'][\'error\'];\n    $fileType = $_FILES[\'file\'][\'type\'];\n\n    $fileExt = explode(\'.\', $fileName);\n    $fileActualExt = strtolower(end($fileExt));\n\n    $allowed = array(\'jpg\', \'jpeg\', \'png\', \'pdf\'); // allowed file extensions\n\n    if (in_array($fileActualExt, $allowed)) {\n        if ($fileError === 0) {\n            if ($fileSize < 1000000) { // max file size\n                $fileNameNew = uniqid(\'\', true).\".\".$fileActualExt;\n                $fileDestination = \'uploads/\'.$fileNameNew;\n                move_uploaded_file($fileTmpName, $fileDestination);\n                echo \"File uploaded successfully.\";\n            } else {\n                echo \"File is too big.\";\n            }\n        } else {\n            echo \"Error uploading the file.\";\n        }\n    } else {\n        echo \"Invalid file type.\";\n    }\n}\n```\n\nThis code checks if a file has been uploaded, validates its extension, size and, if everything is correct, moves it to a folder named \"uploads\". You can modify the code to suit your specific needs.', NULL, 1, 'code', '2023-04-09 06:55:43', '2023-04-10 04:18:42'),
(2, 'Android Phone', NULL, 'Android Phone with 40 mega pixel camera.', 'Are you looking for a smartphone that has it all? Look no further than an Android phone with a 40 mega pixel camera! This smartphone has all the latest features, along with an incredibly powerful camera. With 40 mega pixels, you can capture every moment in stunning detail. The phone also has plenty of other features, from a long-lasting battery and a water-resistant body to an intuitive interface and an array of apps. Plus, you can customize this phone to fit your lifestyle and preferences. Get an Android phone with a 40 mega pixel camera today and start capturing the world around you in incredible detail.', 5, 1, 'content', '2023-04-10 04:39:57', '2023-04-10 04:39:57'),
(3, 'Write a javascript code for image preview for input', NULL, 'Write a javascript code for image preview for input', '<pre class=\"pre-line\"> Here\'s an example code for creating an image preview for input using JavaScript:<br>\n<br>\nHTML:<br>\n<code>html<br>\n&lt;input type=\"file\" id=\"inputImage\"/&gt;<br>\n&lt;img id=\"preview\"/&gt;<br>\n</code><br>\n<br>\nJavaScript:<br>\n<code>javascript<br>\nconst inputImage = document.querySelector(\'#inputImage\');<br>\nconst preview = document.querySelector(\'#preview\');<br>\n<br>\ninputImage.addEventListener(\'change\', () =&gt; {<br>\n  const file = inputImage.files[0];<br>\n  const reader = new FileReader();<br>\n<br>\n  reader.addEventListener(\'load\', () =&gt; {<br>\n    preview.src = reader.result;<br>\n  });<br>\n<br>\n  if (file) {<br>\n    reader.readAsDataURL(file);<br>\n  }<br>\n});<br>\n</code><br>\n<br>\nThis code listens for a file input change event and uses FileReader to read the selected file. Once the file has been read, it sets the image preview\'s source to the read result. </pre>', NULL, 1, 'code', '2023-04-10 05:38:15', '2023-04-10 05:38:15'),
(4, 'Cover Latter', 'Cover Latter', 'Cover Latter', '<br>\r\n<br>\r\nWriting a cover letter can be a daunting task, especially if you\'ve never done it before. But don\'t worry! A cover letter is simply a short introduction to the employer about who you are and why you\'re the right person for the job.<br>\r\n<br>\r\nWhen crafting your cover letter, it\'s important to keep a few things in mind. Start by making sure you have the employer\'s name, job title, and contact information. Then, use a conversational but professional tone as you explain why you\'re the perfect candidate for the job. Highlight your relevant skills and qualifications, and make sure to include any relevant experiences or achievements.<br>\r\n<br>\r\nFinally, be sure to thank the employer for taking the time to read your application. Closing your letter on a positive note is sure to leave a good impression.<br>\r\n<br>\r\nGood luck!', 6, 1, 'content', '2023-04-10 05:42:00', '2023-04-10 05:42:00'),
(5, 'Laptop', NULL, 'A second hand laptop, brand HP, ram 8 gb, processor core i5, storage 256 gb ssd', '<br><br>\r\n<br><br>\r\nAre you looking for a laptop that can handle all of your computing needs? Look no further than this second-hand HP laptop. With 8GB of RAM, a Core i5 processor and 256GB SSD storage, you\'ll have plenty of power and storage to take care of your workload. Whether you\'re surfing the web, editing photos or playing games, this laptop is up to the task. Get yours today and enjoy the power of a second-hand HP laptop.', 5, 1, 'content', '2023-04-10 05:56:29', '2023-04-10 05:56:29'),
(6, 'A Second Hand Laptop', NULL, 'I have laptop with charger. Now i want sell it. ram 8 gb, storage 256 gb ssd. Brand HP, Processor core i5', '<br>\r\n<br>\r\nLooking for a reliable laptop? Look no further! I\'m selling this pre-loved HP laptop with 8GB RAM and 256GB SSD storage. It has a Core i5 processor, so you can count on it to handle all your computing needs. Plus, it comes with a charger. Get it now before it\'s gone!', 5, 1, 'content', '2023-04-10 06:00:09', '2023-04-10 06:00:09'),
(7, 'Cover Latter', 'Cover Latter', 'Cover Latter', '<br>\r\n<br>\r\nA cover letter is a great way to introduce yourself to someone who may not have met you before. It is your chance to show off your personality and make a great first impression.<br>\r\n<br>\r\nA cover letter should be written in a casual, conversational tone. This is your chance to stand out from the crowd and make a connection with the person you are sending it to. Make sure not to be overly formal or too stiff.<br>\r\n<br>\r\nMake sure to include information about why you are writing in the cover letter. You can mention something specific about the company or position that made you interested in applying. Show the employer that you have done your research and understand the job.<br>\r\n<br>\r\nAt the end of your cover letter, make sure to thank the employer for their time and consideration. This small gesture can really make a difference.<br>\r\n<br>\r\nWriting a cover letter can be intimidating, but with a little creativity and effort, it can be a great way to make a great impression and stand out from', 6, 1, 'content', '2023-04-10 06:02:57', '2023-04-10 06:02:57'),
(8, 'Cover Letter', 'Cover Letter', 'Cover Letter', '<br>\r\n<br>\r\nDear [Hiring Manager],<br>\r\n<br>\r\nI am writing to apply for the [Position] at [Company], and I am confident that I am a great fit for the role. With my [number] years of experience in [field], I believe I can bring a valuable perspective to the team.<br>\r\n<br>\r\nI am passionate about the work I do and I am eager to learn and grow in my career. I am highly organized, reliable, and have a strong attention to detail. I am able to work both independently, and as part of a team in order to ensure that projects are completed on-time and to the highest standard.<br>\r\n<br>\r\nI am confident that I have the skills and experience you are looking for in a candidate. I am excited to have the opportunity to discuss this role in further detail with you and I look forward to hearing from you soon.<br>\r\n<br>\r\nSincerely, <br>\r\n[Your Name]', 6, 1, 'content', '2023-04-10 06:03:41', '2023-04-10 06:03:41'),
(9, 'Cover Letter', 'Cover Letter', 'Cover Letter', '<br>\r\nWhen you\'re applying for a job, a cover letter can help you make a great first impression. It\'s an opportunity to show your personality and how you\'ll fit into the company\'s culture. A cover letter should highlight your qualifications and provide a sense of what kind of employee you\'ll be.<br>\r\n<br>\r\nWriting a good cover letter can be challenging, so it\'s important to take your time and write it carefully. Here are some tips to help you craft the perfect cover letter:<br>\r\n<br>\r\n• Start by introducing yourself. Include your name, the job you\'re applying for, and why you\'re the right person for the job.<br>\r\n<br>\r\n• Explain why you\'re interested in the company and what makes you a good fit. Show that you\'ve done your research and have a genuine interest in the company.<br>\r\n<br>\r\n• Focus on your qualifications. Highlight the experiences, skills, and accomplishments that make you the right person for the job.<br>\r\n<br>\r\n• Conclude your letter by expressing your', 6, 1, 'content', '2023-04-10 06:05:48', '2023-04-10 06:05:48'),
(10, 'Cover Letter', 'Cover Letter', 'Cover Letter', '<br>\r\nA cover letter is an important part of any job application, as it will introduce you to the employer and provide them with an insight into your experience and qualifications.<br>\r\n<br>\r\nAs such, it’s important to create a well-crafted cover letter that will help you stand out from the competition.<br>\r\n<br>\r\nMy name is [Name], and I am applying for the [Position Title] position at [Company Name].<br>\r\n<br>\r\nI believe that my background in [Field] and my passion for [Industry] make me an ideal candidate for this role. I have [Years] of experience in [Field], and I am confident that I can quickly and effectively hit the ground running.<br>\r\n<br>\r\nI am highly organized, detail-oriented, and committed to exceeding expectations. I have a strong work ethic and an eagerness to learn and grow in the role.<br>\r\n<br>\r\nI am excited to share my enthusiasm and knowledge with your team and contribute to the success of [Company Name].<br>', 6, 1, 'content', '2023-04-10 06:10:45', '2023-04-10 06:10:45'),
(11, 'write a js code for file upload', NULL, 'write a js code for file upload', '<pre class=\"pre-line\"> Here\'s a code snippet for uploading files using JavaScript:<br>\r\n<br>\r\nHTML:<br>\r\n<code>html<br>\r\n&lt;form&gt;<br>\r\n  &lt;input type=\"file\" id=\"fileInput\"&gt;<br>\r\n  &lt;button type=\"button\" onclick=\"uploadFile()\"&gt;Upload&lt;/button&gt;<br>\r\n&lt;/form&gt;<br>\r\n</code><br>\r\n<br>\r\nJS:<br>\r\n<code>javascript<br>\r\nfunction uploadFile() {<br>\r\n  const input = document.getElementById(\'fileInput\');<br>\r\n  const file = input.files[0];<br>\r\n  const url = \'your_upload_url_here\';<br>\r\n<br>\r\n  const xhr = new XMLHttpRequest();<br>\r\n  const formData = new FormData();<br>\r\n<br>\r\n  formData.append(\'file\', file);<br>\r\n<br>\r\n  xhr.onreadystatechange = function () {<br>\r\n    if (xhr.readyState === XMLHttpRequest.DONE) {<br>\r\n      if (xhr.status === 200) {<br>\r\n        console.log(xhr.responseText);<br>\r\n      } else {<br>\r\n        console.error(\'There was a problem uploading the file.\');<br>\r\n      }<br>\r\n    }<br>\r\n  };<br>\r\n<br>\r\n  xhr.open(\'POST\', url, true);<br>\r\n  xhr.send(formData);<br>\r\n}<br>\r\n</code><br>\r\nNote: Replace `\'your_upload_url_here\'` with the URL where you want to upload the file. </pre>', NULL, 1, 'code', '2023-04-10 06:11:30', '2023-04-10 06:11:30'),
(12, 'write a code for file upload in js', NULL, 'write a code for file upload in js', '<pre class=\"pre-line\"> Sure, here\'s a sample code for file upload in JavaScript:\r\n\r\n<code>html\r\n&lt;form method=\"post\" enctype=\"multipart/form-data\"&gt;\r\n  &lt;input type=\"file\" name=\"file\"&gt;\r\n  &lt;button type=\"submit\"&gt;Upload&lt;/button&gt;\r\n&lt;/form&gt;\r\n\r\n&lt;script&gt;\r\n  const form = document.querySelector(\'form\');\r\n  form.addEventListener(\'submit\', (e) =&gt; {\r\n    e.preventDefault();\r\n    const formData = new FormData(form);\r\n    fetch(\'/your-upload-endpoint\', {\r\n      method: \'POST\',\r\n      body: formData\r\n    })\r\n    .then(response =&gt; response.json())\r\n    .then(data =&gt; console.log(data))\r\n    .catch(error =&gt; console.error(error))\r\n  });\r\n&lt;/script&gt;\r\n</code>\r\n\r\nIn the above code, we have a basic HTML form that includes a file input and a submit button. When this form gets submitted, we prevent the default behavior using `e.preventDefault()`, and then we create a new instance of `FormData` from the form element. Finally, we use `fetch` to make a POST request to a server endpoint that handles the file upload. Once the upload is complete, we log the response data to the console. </pre>', NULL, 1, 'code', '2023-04-10 06:12:50', '2023-04-10 06:12:50'),
(13, 'write a code for file upload in php', NULL, 'write a code for file upload in php', '<pre class=\"pre-line\"> Here\'s an example code for file upload in PHP:\r\n\r\n<code>\r\n&lt;form action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\"&gt;\r\n  &lt;input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\"&gt;\r\n  &lt;input type=\"submit\" value=\"Upload\" name=\"submit\"&gt;\r\n&lt;/form&gt;\r\n\r\n&lt;?php\r\nif(isset($_POST[\"submit\"])){\r\n  $target_dir = \"uploads/\";\r\n  $target_file = $target_dir . basename($_FILES[\"fileToUpload\"][\"name\"]);\r\n  $uploadOk = 1;\r\n  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));\r\n  \r\n  // Check if file already exists\r\n  if (file_exists($target_file)) {\r\n    echo \"Sorry, file already exists.\";\r\n    $uploadOk = 0;\r\n  }\r\n  \r\n  // Check file size\r\n  if ($_FILES[\"fileToUpload\"][\"size\"] &gt; 500000) {\r\n    echo \"Sorry, your file is too large.\";\r\n    $uploadOk = 0;\r\n  }\r\n  \r\n  // Allow only certain file formats\r\n  if($imageFileType != \"jpg\" &amp;&amp; $imageFileType != \"png\" &amp;&amp; $imageFileType != \"jpeg\" &amp;&amp; $imageFileType != \"gif\") {\r\n    echo \"Sorry, only JPG, JPEG, PNG &amp; GIF files are allowed.\";\r\n    $uploadOk = 0;\r\n  }\r\n  \r\n  // Check if $uploadOk is set to 0 by an error\r\n  if ($uploadOk == 0) {\r\n    echo \"Sorry, your file was not uploaded.\";\r\n  } else {\r\n    if (move_uploaded_file($_FILES[\"fileToUpload\"][\"tmp_name\"], $target_file)) {\r\n      echo \"The file \". htmlspecialchars( basename( $_FILES[\"fileToUpload\"][\"name\"])). \" has been uploaded.\";\r\n    } else {\r\n      echo \"Sorry, there was an error uploading your file.\";\r\n    }\r\n  }\r\n}\r\n?&gt;\r\n</code>\r\n\r\nPlease note that you should create a \"uploads\" folder in your root directory, and make sure it has write permission (e.g. 755 or 777, depending on your server configuration). </pre>', NULL, 1, 'code', '2023-04-10 06:13:34', '2023-04-10 06:13:34'),
(14, 'Write a php upload file code', NULL, 'Write a php upload file code', '<pre class=\"pre-line\"> Sure, here is an example PHP code to upload a file:\r\n\r\n```php\r\n&lt;?php\r\n// Check if a file was uploaded\r\nif(isset($_FILES[\'file\'])) {\r\n   $errors = array();\r\n   $file_name = $_FILES[\'file\'][\'name\'];\r\n   $file_size = $_FILES[\'file\'][\'size\'];\r\n   $file_tmp = $_FILES[\'file\'][\'tmp_name\'];\r\n   $file_type = $_FILES[\'file\'][\'type\'];\r\n   \r\n   // Allow only certain file types\r\n   $allowed_file_types = array(\'jpg\', \'jpeg\', \'png\', \'pdf\');\r\n   $file_ext = strtolower(end(explode(\'.\',$_FILES[\'file\'][\'name\'])));\r\n   \r\n   if(!in_array($file_ext,$allowed_file_types)) {\r\n      $errors[] = \"File type not allowed. Only JPG, JPEG, PNG and PDF files are allowed.\";\r\n   }\r\n   \r\n   if($file_size &gt; 2097152) {\r\n      $errors[] = \'File size cannot exceed  </pre>', NULL, 2, 'code', '2023-04-10 09:47:24', '2023-04-10 09:47:24'),
(15, 'write html sample code', NULL, 'write html sample code', '<pre class=\"pre-line\"> Sure, here is an example of basic HTML code:\r\n\r\n<code>html\r\n&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n  &lt;head&gt;\r\n    &lt;title&gt;My Website&lt;/title&gt;\r\n  &lt;/head&gt;\r\n  &lt;body&gt;\r\n    &lt;h1&gt;Welcome to my website!&lt;/h1&gt;\r\n    &lt;p&gt;This is some sample text.&lt;/p&gt;\r\n    &lt;ul&gt;\r\n      &lt;li&gt;List item 1&lt;/li&gt;\r\n      &lt;li&gt;List item 2&lt;/li&gt;\r\n      &lt;li&gt;List item 3&lt;/li&gt;\r\n    &lt;/ul&gt;\r\n  &lt;/body&gt;\r\n&lt;/html&gt;\r\n</code>\r\n\r\nIn this example, we have a basic HTML document with a title, header, and a simple list. The `&lt;!DOCTYPE html&gt;` declaration at the beginning of the document lets the web browser know that this is an HTML5 document. The `&lt;html&gt;` tag represents the root element of the page, and all other elements should be within it. The `&lt;head&gt;` section contains metadata about the document, such as the title of the page. The </pre>', NULL, 1, 'code', '2023-04-10 11:30:22', '2023-04-10 11:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `use_cases`
--

CREATE TABLE `use_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prompt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `use_case_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_popular` tinyint(4) NOT NULL DEFAULT '1',
  `title_label` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description_label` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_label` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `use_cases`
--

INSERT INTO `use_cases` (`id`, `title`, `icon`, `details`, `prompt`, `use_case_category_id`, `is_popular`, `title_label`, `short_description_label`, `description_label`, `is_published`, `created_at`, `updated_at`) VALUES
(2, 'Blog Conclusion', 'assets/uploads/useCase/2023/04/11/blog-conclusion8563.png', 'Your blog content should conclude with a captivating paragraph.', 'I\'m writing a blog on [title]. In short The blog is about[description]. Suggest me a conlcusion for this blog?', 2, 1, 'Blog Title', '', 'Blog Description', 1, '2023-04-08 10:08:06', '2023-04-11 15:44:29'),
(3, 'Blog Intros', 'assets/uploads/useCase/2023/04/11/blog-intros9398.png', 'Create an introduction that will encourage readers to continue to reads your content.', 'I\'m writing a blog on [title]. In short The blog is about[description]. Suggest me the intro for this blog?', 2, 1, 'Blog Title', '', 'Blog Description', 1, '2023-04-08 10:33:25', '2023-04-11 15:41:30'),
(4, 'Blog Ideas', 'assets/uploads/useCase/2023/04/11/blog-ideas5487.png', 'The ideal instrument for beginning to write excellent articles. Develop unique thoughts for your upcoming post.', 'I want to write a blog on [title]. Give me 3 ideas on how can I write the blog with outlines.', 2, 1, 'Blog Title', '', '', 1, '2023-04-08 12:04:12', '2023-04-11 15:37:15'),
(5, 'Blog Section', 'assets/uploads/useCase/2023/04/11/blog-section8294.png', 'Describe in detail a subheading from your article in a blog section (a few paragraphs).', 'Write me a blog which title is [title] and the blog subheadings are [short_description]', 2, 1, 'Blog Title', 'Sub Headings', '', 1, '2023-04-08 12:13:58', '2023-04-11 15:34:46'),
(6, 'Blog Titles', 'assets/uploads/useCase/2023/04/11/blog-titles3143.png', 'Compose a complete blog piece (a few paragraphs) about one of your article\'s subheadings.', 'Write me 5 blog titles about [title]', 2, 1, 'Title', '', '', 1, '2023-04-09 04:18:46', '2023-04-11 15:34:03'),
(7, 'Facebook Ads', 'assets/uploads/useCase/2023/04/11/facebook-ads2159.png', 'Creating Facebook ads using your target market in mind will increase your conversion rate.', 'Give me Facebook Ads ideas for my product[title] The product is [short_description]', 4, 1, 'Input product name', 'Inputs products short description', NULL, 1, '2023-04-11 15:48:54', '2023-04-11 15:48:54'),
(8, 'Article Generator', 'assets/uploads/useCase/2023/04/11/article-generator1535.png', 'Write an article of the best quality using a title and an outline in a short amount of time.', 'Write me an Article that includes the given keywords [short_description]. The title of the Article is \"[title]\", and here\'s a little bit about the article, [description].', 5, 1, 'Article Title', 'Given keywords', 'Description', 1, '2023-04-11 15:55:53', '2023-04-11 17:02:51'),
(9, 'Content Rewriter', 'assets/uploads/useCase/2023/04/11/content-rewriter3696.png', 'Rewrite a piece of material to make it more intriguing, original, and compelling.', '[description] Rewrite this content to make it more intriguing, original, and compelling.', 5, 1, NULL, NULL, 'Description', 1, '2023-04-11 16:02:46', '2023-04-11 16:02:46'),
(10, 'Paragraph Generator', 'assets/uploads/useCase/2023/04/11/paragraph-generator4672.png', 'Create sentences on any subject, with a keyword, and in a certain voice.', 'Write me a Paragraph that includes the given keywords [short_description]. The title of the Paragraph is \"[title]\",', 6, 1, 'Title of the Paragraph', 'Given keywords', NULL, 1, '2023-04-11 16:05:28', '2023-04-11 16:05:28'),
(11, 'Talking Points', 'assets/uploads/useCase/2023/04/11/talking-points3467.png', 'For your article\'s subheadings, create bullet points that are brief, clear, and instructive.', '\"Provide me with Talking Points that include the given keywords [short_description]. The title of the Talking Points\r\nshould be \"\"[title]\"\", and the description should be \"\"[description]\"\".', 6, 1, 'Title', 'Short Description', 'Description', 1, '2023-04-11 16:06:40', '2023-04-11 16:06:40'),
(12, 'Pros & Cons for blogs', 'assets/uploads/useCase/2023/04/11/pros-cons-for-blogs2323.png', 'For your blog piece, list the pros and cons of a service, goods, or website.', 'Write me the pros and cons of [title]', 2, 1, 'Title', NULL, NULL, 1, '2023-04-11 16:08:04', '2023-04-11 16:08:04'),
(13, 'Summarize Text', 'assets/uploads/useCase/2023/04/11/summarize-text2947.png', 'Summarize any text in a clear, succinct, and understandable manner.', 'Summarize this paragraph [title].', 6, 1, 'Title', NULL, NULL, 1, '2023-04-11 16:09:18', '2023-04-11 16:09:18'),
(14, 'Product Description', 'assets/uploads/useCase/2023/04/11/product-description1481.png', 'Create a description of your product that explains its value.', 'Write me a product description for [title]. The category of the product is [short_description]. The description of the product is [description]', 5, 1, 'Title', 'Category of the product', 'Description', 1, '2023-04-11 16:11:36', '2023-04-11 16:11:36'),
(15, 'Startup Name Generator', 'assets/uploads/useCase/2023/04/11/startup-name-generator3465.png', 'Create interesting, original, and memorable names for your startup in a matter of seconds.', 'Generate some cool, creative, and catchy names for a startup business. The type/sector of business is [description]. Give me the response in [description] language.', 5, 1, NULL, 'Short Description', 'Description', 1, '2023-04-11 16:13:01', '2023-04-11 16:13:01'),
(16, 'Product Name Generator', 'assets/uploads/useCase/2023/04/11/product-name-generator566.png', 'Using illustrative words, come up with inventive product names', 'Create creative product names that include the given keywords [title]. The description of the product is  \" [description]\".', 5, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:16:11', '2023-04-11 16:16:11'),
(17, 'SEO Meta Description', 'assets/uploads/useCase/2023/04/11/seo-meta-description2754.png', 'Based on the description, create a meta description that is SEO-friendly.', 'Provide me with SEO-friendly Meta Description for my product/service named [title]The description of my product/service is  [description]', 7, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:19:26', '2023-04-11 16:19:26'),
(18, 'FAQs', 'assets/uploads/useCase/2023/04/11/faqs6625.png', 'Create commonly asked questions based on the description of your product.', 'Generate some Frequently asked questions for [title]. Here\'s some brief about the FAQ: [description]', 7, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:20:35', '2023-04-11 16:20:35'),
(19, 'FAQ Answers', 'assets/uploads/useCase/2023/04/11/faq-answers4103.png', 'Generate creative answers to questions (FAQs) about your business or website.', 'Generate some Frequently asked questions and answers for [title]. Here\'s some brief about the FAQ:[description]', 7, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:22:18', '2023-04-11 16:22:18'),
(20, 'Testimonials/Reviews', 'assets/uploads/useCase/2023/04/11/testimonialsreviews4719.png', 'User testimonials will give your website social evidence.', 'Write a testimonial/review for a product named [title]. The description of the product is [description]', 7, 1, 'Product Name', NULL, 'Description', 1, '2023-04-11 16:23:24', '2023-04-11 16:23:24'),
(21, 'YouTube Video Descriptions', 'assets/uploads/useCase/2023/04/11/youtube-video-descriptions8377.png', 'Catchy and persuasive YouTube descriptions that help your videos rank higher.', '\"Write me a Video Description for my youtube video titled as\r\n[title], and the video is about[description]', 8, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:25:30', '2023-04-11 16:25:30'),
(22, 'Video Titles', 'assets/uploads/useCase/2023/04/11/video-titles5742.png', 'To get everyone\'s attention, create a catchy title for your video.', 'Write me some catchy Video title for my video. The video is about [title]', 8, 1, 'Title', NULL, NULL, 1, '2023-04-11 16:26:20', '2023-04-11 16:26:20'),
(23, 'Youtube Tags Generator', 'assets/uploads/useCase/2023/04/11/youtube-tags-generator3861.png', 'Create YouTube tags and phrases that are ideal for SEO.', 'Generate Youtube Tag for a video named [title] The video is about [description][Description]\".', 8, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:27:03', '2023-04-11 16:27:03'),
(24, 'Youtube Captions/Titles', 'assets/uploads/useCase/2023/04/11/youtube-captionstitles5787.png', 'Create engaging YouTube captions to get viewers to your video.', 'Write me some Video caption for a Youtube video. The video is about [title]', 8, 1, 'Title', NULL, NULL, 1, '2023-04-11 16:27:55', '2023-04-11 16:27:55'),
(25, 'Youtube Hashtag Generator', 'assets/uploads/useCase/2023/04/11/youtube-hashtag-generator4367.png', 'Create YouTube tags and phrases that are ideal for SEO.', 'Generate Youtube Hashtags for a video named [title] The video is about [description]', 8, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:28:36', '2023-04-11 16:28:36'),
(26, 'Instagram Captions', 'assets/uploads/useCase/2023/04/11/instagram-captions4684.png', 'Create engaging Instagram Captions to get viewers to your video.', 'Generate an attracting Instagram caption for a post about [title]', 4, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:29:43', '2023-04-11 16:29:43'),
(27, 'Instagram Hashtags Generator', 'assets/uploads/useCase/2023/04/11/instagram-hashtags-generator5549.png', 'Create Instagram tags and phrases that are ideal for SEO.', 'Generate some Instagram hashtags for a post about [title]', 4, 1, 'Title', NULL, NULL, 1, '2023-04-11 16:30:20', '2023-04-11 16:30:20'),
(28, 'Social Media Post (Personal)', 'assets/uploads/useCase/2023/04/11/social-media-post-personal3044.png', 'Create a personal social media post that will appear on any platform.', 'Generate some Social Media Post for my personal account. The post is about [title]', 4, 1, 'Title', NULL, NULL, 1, '2023-04-11 16:31:05', '2023-04-11 16:31:05'),
(29, 'Social Media Post (Business)', 'assets/uploads/useCase/2023/04/11/social-media-post-business1153.png', 'Create a business social media post that will appear on any platform.', 'Generate some Social Media Post for my Business named [title] The post is about [description] Here is additional information about the Company[short_description]', 4, 1, 'Title', 'Short Description', 'Description', 1, '2023-04-11 16:33:33', '2023-04-11 16:33:33'),
(30, 'Facebook Ads Headlines', 'assets/uploads/useCase/2023/04/11/facebook-ads-headlines4450.png', 'To make your Facebook ads stand out, create intriguing and persuasive headlines.', 'Provide me with few Facebook Ads headline for my product/service named [title]  The description of my product/service is [description]', 4, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:34:39', '2023-04-11 16:34:39'),
(31, 'Facebook Caption Generator', 'assets/uploads/useCase/2023/04/11/facebook-caption-generator5633.png', 'Create engaging Facebook Captions to get viewers to your video.', 'Write me few caption for a Facebook post. The post is about [title]', 4, 1, 'Title', NULL, NULL, 1, '2023-04-11 16:36:39', '2023-04-11 16:36:39'),
(32, 'Facebook Hashtag Generator', 'assets/uploads/useCase/2023/04/11/facebook-hashtag-generator5311.png', 'Create Facebook tags and phrases that are ideal for SEO.', 'Generate some Hashtags for a Facebook post. The Post is about [title]', 4, 1, 'Title', '', '', 1, '2023-04-11 16:37:29', '2023-04-11 16:37:44'),
(33, 'Google Ads Headlines', 'assets/uploads/useCase/2023/04/11/google-ads-headlines8890.png', 'Create intriguing 30-character headlines to use in Google AdWords to market your goods.', 'Provide me few Google Ads headline for my product/service named [title]. The description of my product/service is [description].', 4, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:38:36', '2023-04-11 16:38:36'),
(34, 'Google Ads Description', 'assets/uploads/useCase/2023/04/11/google-ads-description1592.png', 'Create a Google AdWords description that distinguishes your ad and produces leads.', 'Provide me some Google Ads description for my product/service named [title]. The keywords for the Ad are [short_description]', 4, 1, 'Title', 'Short Description', NULL, 1, '2023-04-11 16:39:20', '2023-04-11 16:39:20'),
(35, 'Academic Essay', 'assets/uploads/useCase/2023/04/11/academic-essay4524.png', 'Write original academic essays for a variety of subjects in a flash.', '\"Write an academic essay on the [title] topic\r\nThe keywords for the essay are [short_description]', 5, 1, 'Essay Title', 'Short Description', NULL, 1, '2023-04-11 16:40:54', '2023-04-11 16:40:54'),
(36, 'Welcome Email', 'assets/uploads/useCase/2023/04/11/welcome-email1286.png', 'Send out welcome emails to your clients.', 'Generate an Welcome email for my client named [title]. My client\'s position Must include these details [description]', 3, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:41:59', '2023-04-11 16:41:59'),
(37, 'Email', 'assets/uploads/useCase/2023/04/11/email7333.png', 'Make effective emails with the help of AI.', 'Generate an email for my client named [title] with a beautiful subject. The email is about [description][Description].', 3, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:42:41', '2023-04-11 16:42:41'),
(38, 'Email Subject Lines', 'assets/uploads/useCase/2023/04/11/email-subject-lines561.png', 'With a few clicks, create professional email subject lines', 'Generate 10 email subject lines for my product/service named [title]. Must include these details [description]', 3, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:43:24', '2023-04-11 16:43:24'),
(39, 'Creative Stories', 'assets/uploads/useCase/2023/04/11/creative-stories6453.png', 'Give AI the freedom to create stories for you based on text you provide.', '\"Provide me with Creative Stories that include the given keywords [keywords]. The title of the Creative Stories\r\nshould be [title], and the description should be [description]', 5, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:44:39', '2023-04-11 16:44:39'),
(40, 'Grammar Checker', 'assets/uploads/useCase/2023/04/11/grammar-checker591.png', 'Make sure your content is free of mistakes.', 'Check the grammar for the following paragraph: [description]. Also mark the mistakes.', 5, 1, '', '', 'Description', 1, '2023-04-11 16:45:40', '2023-04-11 20:16:03'),
(41, 'Summarize for 2nd Grader', 'assets/uploads/useCase/2023/04/11/summarize-for-2nd-grader3267.png', 'Summarize any difficult material for a child in 2nd grade.', 'Summarize this following content for 2nd grader child :[description]', 5, 1, NULL, NULL, 'Description', 1, '2023-04-11 16:46:35', '2023-04-11 16:46:35'),
(42, 'Video Scripts', 'assets/uploads/useCase/2023/04/11/video-scripts8200.png', 'Make your video scripts as soon as possible, then begin filming.', 'write me a Video Script for a video [title].', 8, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:47:18', '2023-04-11 16:47:18'),
(43, 'Amazon Product Description', 'assets/uploads/useCase/2023/04/11/amazon-product-description7525.png', 'Construct a compelling Amazon product description.', 'Write me an Amazon product description for my product/service named[title]. The keywords for the ad are [short_description]', 6, 1, 'Product/Service Name', 'Short Description', NULL, 1, '2023-04-11 16:48:55', '2023-04-11 16:48:55'),
(44, 'Linkedln Caption Generator', 'assets/uploads/useCase/2023/04/11/linkedln-caption-generator6433.png', 'Design and build a powerful Linkedln Caption Generator', 'Write me few captions for my LinkedIn post. The post is about[title]', 4, 1, 'Title', NULL, NULL, 1, '2023-04-11 16:50:06', '2023-04-11 16:50:06'),
(45, 'Linkedln Hashtag Generator', 'assets/uploads/useCase/2023/04/11/linkedln-hashtag-generator2815.png', 'Design and build a powerful LinkedIn Hashtag Generator', 'Generate Hashtags for my LinkedIn post. The Post is about [title]', 4, 1, 'Title', NULL, NULL, 1, '2023-04-11 16:50:53', '2023-04-11 16:50:53'),
(46, 'Twitter Caption', 'assets/uploads/useCase/2023/04/11/twitter-caption3523.png', 'Create engaging Twitter captions to get viewers to your video.', 'Generate a Twitter caption for my tweet about [title]', 4, 1, 'Title', NULL, NULL, 1, '2023-04-11 16:53:28', '2023-04-11 16:53:28'),
(47, 'Twitter Hashtag', 'assets/uploads/useCase/2023/04/11/twitter-hashtag689.png', 'Create Twitter tags and phrases that are ideal for SEO.', 'Generate some Twitter hashtags for my tweet about [title].', 4, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:55:11', '2023-04-11 16:55:11'),
(48, 'TikTok Caption', 'assets/uploads/useCase/2023/04/11/tiktok-caption7995.png', 'Create engaging TikTok captions to get viewers to your video.', 'Generate a TikTok caption for a post about [title]', 4, 1, 'Title', NULL, NULL, 1, '2023-04-11 16:56:10', '2023-04-11 16:56:10'),
(49, 'Tiktok Hashtag Generator', 'assets/uploads/useCase/2023/04/11/tiktok-hashtag-generator3541.png', 'Create TikTok Hashtag Generator and phrases that are ideal for SEO.', 'Generate Hashtag for my Tiktok post. The Tiktok is about[title]', 4, 1, 'Title', NULL, NULL, 1, '2023-04-11 16:56:52', '2023-04-11 16:56:52'),
(50, 'Email Body Generator', 'assets/uploads/useCase/2023/04/11/email-body-generator7235.png', 'To attract viewers to your email, create interesting email body generator.', 'Generate an email body for the email named [title]. Must include these details [description]', 3, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:57:34', '2023-04-11 16:57:34'),
(51, 'Web Content Generator', 'assets/uploads/useCase/2023/04/11/web-content-generator8024.png', 'Create interesting Web Content Generator to draw readers to your email.', 'Generate the Web Content named [title], The description of the content is  [description]', 5, 1, 'Title', NULL, 'Description', 1, '2023-04-11 16:58:25', '2023-04-11 16:58:25'),
(52, 'Blog Meta Description', 'assets/uploads/useCase/2023/04/11/blog-meta-description6399.png', 'Create your blog\'s meta description.', 'Generate a blog meta description for my blog [description]', 2, 1, NULL, NULL, 'Description', 1, '2023-04-11 16:59:46', '2023-04-11 16:59:46'),
(53, 'Blog Tag Generator', 'assets/uploads/useCase/2023/04/11/blog-tag-generator1398.png', 'Create Blog tags Generator that are ideal for SEO.', 'Generate some blog tags for my blog post about [title]', 2, 1, 'Title', NULL, NULL, 1, '2023-04-11 17:00:22', '2023-04-11 17:00:22'),
(54, 'Blog ALT Text Generator', 'assets/uploads/useCase/2023/04/11/blog-alt-text-generator7454.png', 'Create Blog Alt Tags Generators that are ideal for SEO.', 'Generate my blog  Image ALT Text for an image about [title]', 2, 1, 'Title', NULL, NULL, 1, '2023-04-11 17:00:57', '2023-04-11 17:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `use_case_categories`
--

CREATE TABLE `use_case_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content_histories`
--
ALTER TABLE `content_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plan_expenses`
--
ALTER TABLE `plan_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
