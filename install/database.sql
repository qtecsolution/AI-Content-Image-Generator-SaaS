-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2023 at 01:41 AM
-- Server version: 10.3.38-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `chat_request` longtext NOT NULL,
  `chat_response` longtext NOT NULL,
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
(23, 'Hello', 'Hello! How may I assist you today?', 4, '2023-04-11 18:16:57', '2023-04-11 18:16:57'),
(24, 'hi', 'Hello, how can I assist you today?', 8, '2023-04-29 01:53:10', '2023-04-29 01:53:10'),
(25, 'hello', 'Hello! How can I help you today?', 10, '2023-04-30 16:52:38', '2023-04-30 16:52:38'),
(26, 'hello', 'Hello! How can I assist you today?', 1, '2023-05-03 23:55:51', '2023-05-03 23:55:51'),
(27, 'Hi', 'Hello! How can I assist you today?', 1, '2023-05-13 04:48:12', '2023-05-13 04:48:12'),
(28, 'What\'s the model of this chatbot?', 'As an AI language model, I don\'t have access to the chatbot you are referring to, so it is impossible for me to identify its model without any information. Can you please provide more details or context about the chatbot you are referring to?', 1, '2023-05-13 17:51:02', '2023-05-13 17:51:02'),
(29, 'I mean chatgpt version', 'As an AI language model, I am not capable of using a specific version or edition of ChatGPT. However, I am designed to continuously learn and improve my responses based on the interactions with users. So, feel free to ask me any question or engage me in a conversation and I will do my best to provide you with accurate and helpful answers.', 1, '2023-05-13 17:51:39', '2023-05-13 17:51:39');

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
(24, NULL, '1', 'fgh', NULL, 'fgh', 'You are a helpful assistant that writes code.', '<pre class=\'pre-line\'> I&#039;m sorry, could you please provide more information or context for what you need help with? </pre>', 1, 'code', '2023-04-11 14:21:55', '2023-04-11 14:21:55'),
(25, 14, '0.7', 'Air Condition', '', 'I have a ac. i want to sell it. The brand of ac is Gree.', 'Write me a product description for Air Condition. The category of the product is . The description of the product is I have a ac. i want to sell it. The brand of ac is Gree. The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nStay cool and comfortable in your home with the Gree air conditioner! This powerful unit has a cooling capacity of 24,000 BTU and can cover an area of up to 1,500 square feet. It features a high-efficiency air filter to keep your air clean and fresh, as well as an adjustable thermostat for personalized cooling. With its easy installation and energy-saving design, the Gree air conditioner is the perfect solution for your home cooling needs.', 1, 'content', '2023-04-12 20:59:53', '2023-04-12 20:59:53'),
(26, 3, '0.7', 'test blog', '', '', 'I\'m writing a blog on test blog. In short The blog is about. Suggest me the intro for this blog? The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nTest blog is a great way to explore the many possibilities of technology and stay up-to-date on the latest trends. Whether you\'re a tech enthusiast or a novice, this blog will help you stay informed and on top of the ever-evolving world of technology. From the newest gadgets to the most advanced software, this blog has it all. Dive in and explore the exciting world of technology with us!', 10, 'content', '2023-04-30 16:53:17', '2023-04-30 16:53:17'),
(27, 3, '0.7', '', '', '', 'I\'m writing a blog on . In short The blog is about. Suggest me the intro for this blog? The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nAre you looking for ways to make your life easier? Have you been feeling overwhelmed lately with work and other obligations? We all have times when we need a break from the everyday stress and chaos. In this blog, I will share tips and tricks on how to simplify your life and make it more manageable. I\'ll provide practical advice on how to prioritize tasks and manage your time, as well as how to create a better work-life balance. Let\'s dive in and get started on the path to a simpler and more organized life!', 6, 'content', '2023-04-30 17:20:01', '2023-04-30 17:20:01'),
(28, 2, '0.7', 'test blog', '', '', 'I\'m writing a blog on test blog. In short The blog is about. Suggest me a conlcusion for this blog? The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nIn conclusion, testing has become an increasingly important part of our lives. It helps us to identify and fix any problems that arise in our projects. With the right tools and processes, testing can ensure that our projects are successful. Testing is an essential part of any project and should not be overlooked.', 1, 'content', '2023-05-03 23:56:24', '2023-05-03 23:56:24'),
(29, 2, '0.7', 'test blog', '', '', 'I\'m writing a blog on test blog. In short The blog is about. Suggest me a conlcusion for this blog? The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nIn conclusion, testing is an important part of the development process for any project. Whether it is a blog, website, or any other type of project, testing is essential for ensuring quality, reliability, and performance. Testing can be done manually or with automated tools, but either way it is an important step in the development process.', 1, 'content', '2023-05-03 23:56:24', '2023-05-03 23:56:24'),
(30, 4, '0.7', 'Visiting Spain', '', '', 'I want to write a blog on Visiting Spain. Give me 3 ideas on how can I write the blog with outlines. The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n1. A Guide to Visiting Spain: Outline a comprehensive guide on how to plan a trip to Spain, including the best places to visit, tips on transportation and accommodation, and advice on budgeting.<br>\n<br>\n2. Exploring the Culture of Spain: Talk about the unique and interesting culture of Spain, such as its food, art, music, and language. Outline interesting places to visit that can help you experience the culture first-hand.<br>\n<br>\n3. An Insider\'s Look at Spain: Share stories and experiences from traveling to Spain, such as the people you\'ve met, the places you\'ve visited, and the things you\'ve seen. Talk about what makes Spain a great place to visit and provide tips for those looking to explore the country.', 1, 'content', '2023-05-04 17:42:28', '2023-05-04 17:42:28'),
(31, 4, '0.7', 'Visiting Spain', '', '', 'I want to write a blog on Visiting Spain. Give me 3 ideas on how can I write the blog with outlines. The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n1. Exploring the Beauty of Spain - Outline:<br>\n  - Introduction to Spain and its culture<br>\n  - Overview of the country\'s biggest cities, attractions and activities<br>\n  - Tips and advice on making the most out of your visit to Spain<br>\n<br>\n2. Savoring Spain\'s Culinary Delights - Outline:<br>\n  - Introduction to Spanish cuisine<br>\n  - Overview of traditional Spanish dishes and ingredients<br>\n  - Tips and advice on where to get the best meals in Spain<br>\n<br>\n3. Uncovering Spain\'s Hidden Treasures - Outline:<br>\n  - Introduction to Spain\'s hidden gems<br>\n  - Overview of off-the-beaten-path destinations and activities<br>\n  - Tips and advice on getting the most out of your visit to lesser-known places in Spain', 1, 'content', '2023-05-04 17:42:48', '2023-05-04 17:42:48'),
(32, 26, '0.7', '', '', 'Went to visit Paris with friends', 'Generate an attracting Instagram caption for a post about  The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n\"Make every moment count! Life is too short to waste time worrying about the little things.\"', 1, 'content', '2023-05-04 18:21:45', '2023-05-04 18:21:45'),
(33, 26, '0.7', '', '', 'Went to visit Paris with friends', 'Generate an attracting Instagram caption for a post about  The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n\"Loving life and all its little moments - so grateful for it all!\"', 1, 'content', '2023-05-04 18:22:13', '2023-05-04 18:22:13'),
(34, 26, '0.7', '', '', 'Went to visit Paris with friends', 'Generate an attracting Instagram caption for a post about  The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n\"Take a break from the hustle and bustle and enjoy some well-deserved me-time!\" #selfcare #relaxation', 1, 'content', '2023-05-04 18:22:40', '2023-05-04 18:22:40'),
(35, 6, '0.7', 'Technology', '', '', 'Write me 5 blog titles about Technology The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n1. Exploring the Latest in Technology: What You Need to Know <br>\n2. What Does the Future of Technology Hold? <br>\n3. A Beginner\'s Guide to Tech: Tips and Tricks <br>\n4. How Technology is Changing the Way We Live <br>\n5. Staying Ahead of the Curve: What\'s New in Technology', 1, 'content', '2023-05-04 19:18:04', '2023-05-04 19:18:04'),
(36, 6, '0.7', 'Technology', '', '', 'Write me 5 blog titles about Technology The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n1. Exploring the Latest and Greatest Technology Trends<br>\n2. Keeping Up with the Rapid Pace of Tech Innovations<br>\n3. Harnessing the Power of Technology for Your Business<br>\n4. What You Need to Know About the Latest Tech Gadgets<br>\n5. Surprising Ways Technology is Changing Everyday Life', 1, 'content', '2023-05-04 19:18:28', '2023-05-04 19:18:28'),
(37, 26, '0.7', 'Nature', '', '', 'Generate an attracting Instagram caption for a post about  The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n\"Lookin\' good, feelin\' good - time to show off my style!\"', 1, 'content', '2023-05-04 19:20:46', '2023-05-04 19:20:46'),
(38, 2, '0.7', '', '', '', 'I\'m writing a blog on . In short The blog is about. Suggest me a conlcusion for this blog? The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nThe conclusion of this blog is that whatever we do, we should always keep our focus on the future and strive to make the best of it. We should embrace the opportunities that come our way and strive to create a better tomorrow for ourselves and for future generations. With the right attitude, dedication, and commitment, we can achieve great things.', 1, 'content', '2023-05-04 19:21:16', '2023-05-04 19:21:16'),
(39, 26, '0.7', '', '', 'Went to visit Paris with friends', 'Generate an attracting Instagram caption for a post about Went to visit Paris with friends The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n\"Bonjour Paris! Exploring the City of Lights with my besties - it doesn\'t get better than this 🇫🇷 #Paris #Friends #Vacation', 1, 'content', '2023-05-04 19:22:28', '2023-05-04 19:22:28'),
(40, 26, '0.7', '', '', 'test', 'Generate an attracting Instagram caption for a post about test The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n\"Testing, testing...is this thing on? Taking a break from studying to make sure I\'m up to date! #TestTime', 1, 'content', '2023-05-04 19:23:24', '2023-05-04 19:23:24'),
(41, 26, '0.7', '', '', 'nature', 'Generate an attracting Instagram caption for a post about nature The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n\"Sometimes all you need is a little nature time to clear your head and reset 🌿\"', 1, 'content', '2023-05-04 19:24:48', '2023-05-04 19:24:48'),
(42, 26, '0.7', '', '', 'Nature', 'Generate an attracting Instagram caption for a post about Nature The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nTake a break from your day and reconnect with nature - it\'s the perfect way to refresh and reset! #nature #refresh #reset', 1, 'content', '2023-05-04 19:25:43', '2023-05-04 19:25:43'),
(43, NULL, '1', 'Write me python code for connecting with postgreqsl database', NULL, 'Write me python code for connecting with postgreqsl database', 'You are a helpful assistant that writes code.', '<pre class=\'pre-line\'> Sure! Here&#039;s a basic example of how to connect to a PostgreSQL database using Python:\n\n<code>python\nimport psycopg2\n\ntry:\n    # establish a connection to the database\n    conn = psycopg2.connect(\n        dbname=&quot;your_database_name&quot;,\n        user=&quot;your_database_username&quot;,\n        password=&quot;your_database_password&quot;,\n        host=&quot;your_database_host&quot;,\n        port=&quot;your_database_port&quot;\n    )\n    \n    # create a cursor\n    cur = conn.cursor()\n    \n    # execute a query\n    cur.execute(&quot;SELECT * FROM your_table_name&quot;)\n    \n    # fetch the results\n    results = cur.fetchall()\n    \n    # print the results\n    for row in results:\n        print(row)\n    \n    # close the cursor and connection\n    cur.close()\n    conn.close()\n\nexcept psycopg2.Error as e:\n    print(&quot;Error connecting to PostgreSQL database: &quot;, e)\n</code>\n\nOf course, you&#039;ll need to replace the placeholders with the actual values for your database, username, password, host, and port. This code will attempt to establish a connection to the specified PostgreSQL database and execute a simple query, printing the results to the console. If an error occurs, it will be caught and printed to the console as well. </pre>', 11, 'code', '2023-05-06 04:45:46', '2023-05-06 04:45:46'),
(44, 30, '0.7', 'এবার সহজেই ডিজিটাল হবে দেশের সকল শিক্ষা প্রতিষ্ঠান', '', 'সময়ের সাথে শিক্ষার মান উন্নয়নে এবার বাংলাদেশের সকল শিক্ষা প্রতিষ্ঠানের জন্য তথ্য প্রযুক্তি নির্ভর ব্যবস্থাপনার মাধ্যমে কার্যক্রম সম্পন্ন করা অত্যন্ত জরুরী হয়ে পড়েছে।', 'Provide me with few Facebook Ads headline for my product/service named এবার সহজেই ডিজিটাল হবে দেশের সকল শিক্ষা প্রতিষ্ঠান  The description of my product/service is সময়ের সাথে শিক্ষার মান উন্নয়নে এবার বাংলাদেশের সকল শিক্ষা প্রতিষ্ঠানের জন্য তথ্য প্রযুক্তি নির্ভর ব্যবস্থাপনার মাধ্যমে কার্যক্রম সম্পন্ন করা অত্যন্ত জরুরী হয়ে পড়েছে। The tone of voice must be casual. Give me the response in Bengali language.', '\n<br>\n1. এবার আপনার দেশের সকল শিক্ষা প্রতিষ্ঠান সহজে ডিজিটাল হবে! <br>\n2. শিক্ষা প্রতিষ্ঠান পুনরুদ্ধারে এবার সহজ', 13, 'content', '2023-05-06 17:46:18', '2023-05-06 17:46:18'),
(45, 4, '0.7', 'Education management systems', '', '', 'I want to write a blog on Education management systems. Give me 3 ideas on how can I write the blog with outlines. The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nIdea 1:<br>\n<br>\nTitle: The Benefits of an Education Management System<br>\n<br>\nOutline: <br>\n1. Introduction: What is an Education Management System and why is it important<br>\n2. Benefits of an Education Management System: Streamlined administration, improved communication, and better organization<br>\n3. Examples of Education Management Systems: Commonly used and successful systems<br>\n4. Conclusion: How an Education Management System can help improve your institution<br>\n<br>\nIdea 2:<br>\n<br>\nTitle: How to Choose the Right Education Management System<br>\n<br>\nOutline: <br>\n1. Introduction: What is an Education Management System and the importance of choosing the right one<br>\n2. What to Look for When Choosing an Education Management System: Features, compatibility, and scalability<br>\n3. Examples of Education Management Systems: Popular and successful systems<br>\n4. Conclusion: How to make sure you select the right Education Management System for your institution<br>\n<br>\nIdea 3:<br>\n<br>\nTitle: Best Practices for Implement', 13, 'content', '2023-05-06 17:49:05', '2023-05-06 17:49:05'),
(46, 36, '0.7', 'Mr. Sakib', '', 'Further queries for the project.', 'Generate an Welcome email for my client named Mr. Sakib. My client\'s position Must include these details Further queries for the project. The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nDear Mr. Sakib,<br>\n<br>\nWelcome to the team! We are excited to have you join us and look forward to working together.<br>\n<br>\nWe are here to answer any questions you may have about the project. Please feel free to reach out to us if you need any help. We are more than happy to provide assistance in any way we can.<br>\n<br>\nWe look forward to a successful partnership with you.<br>\n<br>\nSincerely,<br>\n<br>\n[Your Name]', 13, 'content', '2023-05-06 17:56:46', '2023-05-06 17:56:46'),
(47, 10, '0.7', 'Prospect of digital Bangladesh', '', '', 'Write me a Paragraph that includes the given keywords . The title of the Paragraph is \"Prospect of digital Bangladesh\", The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nThe prospect of digital Bangladesh is very exciting. With the right investments and initiatives, the country can make great strides towards connecting more people to digital services and solutions. This will open up new opportunities for businesses, create jobs, and drive economic growth. Moreover, digital Bangladesh could potentially bring forth a new era of innovation and creativity, allowing individuals to pursue their dreams and reach their full potential. To make this happen, the government must continue to invest in infrastructure, reduce internet costs, and create an enabling environment for digital solutions. With the right steps taken, digital Bangladesh could be a reality sooner rather than later.', 13, 'content', '2023-05-06 18:31:55', '2023-05-06 18:31:55'),
(48, 11, '0.7', 'ডিজিটাল শিক্ষা প্রতিষ্ঠান', '', 'Transform all all educational institutes in to digital.', '\"Provide me with Talking Points that include the given keywords . The title of the Talking Points\r\nshould be \"\"ডিজিটাল শিক্ষা প্রতিষ্ঠান\"\", and the description should be \"\"Transform all all educational institutes in to digital.\"\". The tone of voice must be casual. Give me the response in Bengali language.', '\n<br>\nশিরোনাম: ডিজিটাল শিক্ষা প্রতিষ্ঠান<br>\n<br>\nবর্ণনা: সমস্ত শিক্ষাপ্রতিষ্ঠানগুলোকে ডিজিটাল রূপে পরিবর্তন কর', 13, 'content', '2023-05-06 18:47:43', '2023-05-06 18:47:43'),
(49, 11, '0.7', 'Digital Education', '', 'Transform all all educational institutes in to digital.', '\"Provide me with Talking Points that include the given keywords . The title of the Talking Points\r\nshould be \"\"Digital Education\"\", and the description should be \"\"Transform all all educational institutes in to digital.\"\". The tone of voice must be casual. Give me the response in Bengali language.', '\n<br>\nশিরোনাম: ডিজিটাল শিক্ষা <br>\n<br>\nবর্ণনা: সমস্ত শিক্ষাগত প্রতিষ্ঠান ডিজিটালে রূপান্তর করুন।<br>\n<br>\nকথোপকথন: <br>\n1. ডিজিট', 13, 'content', '2023-05-06 18:49:30', '2023-05-06 18:49:30'),
(50, 11, '0.7', 'Digital Education', '', 'Transform all all educational institutes in to digital.', '\"Provide me with Talking Points that include the given keywords . The title of the Talking Points\r\nshould be \"\"Digital Education\"\", and the description should be \"\"Transform all all educational institutes in to digital.\"\". The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nTitle: Digital Education <br>\nDescription: Transform all educational institutes into digital<br>\n<br>\nTalking Points: <br>\n1. Digital education can provide students with anytime, anywhere access to course materials and educational resources. <br>\n2. Digital education can help make learning more engaging by providing dynamic visuals and interactive multimedia. <br>\n3. Digital education provides teachers and administrators with an efficient way to track student progress and measure academic performance. <br>\n4. Digital education can reduce the cost of textbooks, supplies, and other educational materials. <br>\n5. Digital education can help bridge the digital divide by providing access to educational resources to students in underserved areas. <br>\n6. Digital education can help create an interconnected learning environment where students from diverse backgrounds can collaborate and learn from each other.', 13, 'content', '2023-05-06 18:50:04', '2023-05-06 18:50:04'),
(51, 3, '0.7', 'Webflow speed optimization', '', 'a blog to explain how to make your webflow site optimized for speed', 'I\'m writing a blog on Webflow speed optimization. In short The blog is abouta blog to explain how to make your webflow site optimized for speed. Suggest me the intro for this blog? The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nAre you looking for ways to make your Webflow site faster? You\'re not alone! Speed is critical for any website, but it\'s especially important for Webflow sites since they rely on a lot of code and resources to function. In this blog, I\'m going to share my top tips for optimizing the speed of your Webflow site, so you can get the most out of it. Let\'s get started!', 1, 'content', '2023-05-13 02:39:12', '2023-05-13 02:39:12'),
(52, 3, '0.7', 'Webflow speed optimization', '', 'a blog to explain how to make your webflow site optimized for speed', 'I\'m writing a blog on Webflow speed optimization. In short The blog is abouta blog to explain how to make your webflow site optimized for speed. Suggest me the intro for this blog? The tone of voice must be casual. Give me the response in English (USA) language.', '(1). Are you struggling to make your Webflow site fast and efficient? If so, you\'ve come to the right place! In this blog, we\'ll discuss how to optimize your Webflow site for speed. We\'ll cover everything from minifying code to leveraging content delivery networks. By the end, you\'ll have the tools you need to make your Webflow site faster and more efficient. So let\'s get started!<br>\r\n<br>\r\n<br>\r\n(2). Are you looking to make your Webflow site run faster? You\'re in the right place! In this blog, we\'ll be discussing the best ways to optimize your website for speed and ensure that it\'s running as quickly and efficiently as possible. We\'ll be looking at some of the key factors that influence website speed, and suggest some practical steps you can take to get the best performance out of your Webflow site. So, let\'s get started!<br>\r\n<br>\r\n<br>\r\n', 1, 'content', '2023-05-13 02:39:47', '2023-05-13 02:39:47'),
(53, 19, '0.7', 'Qui omnis ea velit', '', 'Aute fugit odio sed', 'Generate some Frequently asked questions and answers for Qui omnis ea velit. Here\'s some brief about the FAQ:Aute fugit odio sed The tone of voice must be witty. Give me the response in Turkish (Turkey) language.', '(1). Q: Qui omnis ea velit?<br>\nKim her şeyi ister?<br>\nA: Dediğinizi anlamıyorum. Ne istiyorsunuz?<br>\r\n<br>\r\n<br>\r\n(2). Q: Qui omnis ea velit?<br>\nKim her şeyi ister?<br>\n<br>\nA: Haha, hayır! Bizim tek istediğimiz, mutlu olmak ve kendimizi gerçekten özgür hissetmek.<br>\r\n<br>\r\n<br>\r\n(3). Q: Qui omnis ea velit?<br>\nKim her şeyi istiyor?<br>\nA: Kimseye her şeyi vermek mümkün olmayabilir, ama herkesin arzuladığı şeyleri elde etmek mümkündür.<br>\r\n<br>\r\n<br>\r\n(4). Q: Qui omnis ea velit?<br>\nKim her şeyi ister?<br>\n<br>\nA: Ne olursa olsun, her şeyin bir fiyatı vardır. Size her şeyi isteme şansını vermemek için, fiyatınızı ödemelisiniz!<br>\r\n<br>\r\n<br>\r\n(5). Q:Qui omnis ea velit?<br>\nKim her şeyi ister?<br>\nA:Hakikaten her şeyi istemek veya arzu etmek çok güzel bir şey. Ancak, her şeyi elde etmek mümkün değil. İdeal olarak, düşündüğünüz her ş<br>\r\n<br>\r\n<br>\r\n', 16, 'content', '2023-05-13 02:42:12', '2023-05-13 02:42:12'),
(54, 22, '1', 'Dolorum reprehenderi', '', 'Aliqua Dolor odio a', 'Write me some catchy Video title for my video. The video is about Dolorum reprehenderi The tone of voice must be sarcastic. Give me the response in Chinese (Mandarin) language.', '(1). 「萬般痛苦<br>\r\n<br>\r\n<br>\r\n(2). \"看看！这Dolorum rep<br>\r\n<br>\r\n<br>\r\n(3). 【讽刺的辛辣<br>\r\n<br>\r\n<br>\r\n(4). \"了解Dolorum reprehenderi<br>\r\n<br>\r\n<br>\r\n', 15, 'content', '2023-05-13 02:42:52', '2023-05-13 02:42:52'),
(55, 22, '1', 'Dolorum reprehenderi', '', 'Aliqua Dolor odio a', 'Write me some catchy Video title for my video. The video is about Dolorum reprehenderi The tone of voice must be sarcastic. Give me the response in Chinese (Mandarin) language.', '(1). 「得償其罪的多<br>\r\n<br>\r\n<br>\r\n(2). \"讓我們一起<br>\r\n<br>\r\n<br>\r\n(3). \"不惩罚就不怕<br>\r\n<br>\r\n<br>\r\n(4). 「抓住困境,<br>\r\n<br>\r\n<br>\r\n', 15, 'content', '2023-05-13 02:43:02', '2023-05-13 02:43:02'),
(56, 22, '1', 'how to hack laravel site', '', 'Aliqua Dolor odio a', 'Write me some catchy Video title for my video. The video is about how to hack laravel site The tone of voice must be sarcastic. Give me the response in Chinese (Mandarin) language.', '(1). \"一步一步教你如<br>\r\n<br>\r\n<br>\r\n(2). 「欺騙 Laravel 網站<br>\r\n<br>\r\n<br>\r\n(3). 破解Laravel网站<br>\r\n<br>\r\n<br>\r\n(4). \"就只有專家才<br>\r\n<br>\r\n<br>\r\n', 15, 'content', '2023-05-13 02:43:30', '2023-05-13 02:43:30'),
(57, 18, '1', 'how to hack laravel site', '', 'how to hack laravel site', 'Generate some Frequently asked questions for how to hack laravel site. Here\'s some brief about the FAQ: how to hack laravel site The tone of voice must be sarcastic. Give me the response in English (USA) language.', '(1). Q: Is it possible to hack a Laravel website?<br>\nA<br>\r\n<br>\r\n<br>\r\n(2). Q: How do I hack a Laravel site? <br>\nA<br>\r\n<br>\r\n<br>\r\n(3). Q1: What magical spell should I chant to hack a Lara<br>\r\n<br>\r\n<br>\r\n(4). Q: Is hacking a Laravel site easy?<br>\nA: Sure<br>\r\n<br>\r\n<br>\r\n', 15, 'content', '2023-05-13 02:43:58', '2023-05-13 02:43:58'),
(58, 3, '1', 'Welcome', '', 'About medical profession', 'I\'m writing a blog on Welcome. In short The blog is aboutAbout medical profession. Suggest me the intro for this blog? The tone of voice must be excited. Give me the response in English (USA) language.', '\n<br>\nWelcome to my blog! I\'m excited to be talking about the medical profession, discussing the challenges, opportunities, and rewards it brings. I have always been fascinated by the human body and what medical professionals can accomplish. I\'m excited to dive into this topic and explore all that this incredible field has to offer.', 19, 'content', '2023-05-13 02:50:03', '2023-05-13 02:50:03');
INSERT INTO `content_histories` (`id`, `use_case_id`, `temperature`, `title`, `short_description`, `description`, `prompt`, `generated_content`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(59, 7, '0.7', 'দুদু', '', '', 'Give me Facebook Ads ideas for my productদুদু The product is  The tone of voice must be casual. Give me the response in Bengali language.', '\n<br>\nআপনার পণ্যটি সম্পর্কে একটি আকর্ষণীয় ক্লিকবিতর্ক প্রচার করুন। উদাহরণস্বরূপ, আপনি যেসমস্ত বিষয়ক সুবিধা আপনার পণ্যের সাথে যুক্ত করেছেন, তা প্রচার করুন। আপনি আরো একটি সাধারণ বিজ্ঞাপন করতে পারেন যেখানে আপনার পণ্য বিশেষ করে ক্রেতাদের আগ্রহী করতে সহায়তা করছে। আপনি আরো একটি প্রচার করতে পারেন যেখানে আপনি ', 1, 'content', '2023-05-13 02:55:14', '2023-05-13 02:55:14'),
(60, 7, '0.7', 'mango', '', '', 'Give me Facebook Ads ideas for my productmango The product is  The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n1. Get summer ready with Mango! Make your backyard the perfect spot for summer parties and BBQs with Mango - now available in stores and online! <br>\n2. Refresh your outdoor space with Mango! From outdoor furniture to outdoor decor, spruce up your outdoor living space with Mango! <br>\n3. Create an outdoor oasis with Mango! Add a touch of style and sophistication to your outdoor living space with Mango! <br>\n4. Step up your summer style with Mango! Make your backyard the envy of the neighborhood with Mango\'s stylish outdoor furniture and decor! <br>\n5. Get the perfect outdoor look with Mango! From furniture to decor, find everything you need to create the perfect outdoor look with Mango! <br>\n6. Make your backyard the place to be this summer with Mango! Transform your backyard into the perfect spot for summer gatherings with Mango! <br>\n7. Summer\'s not complete without Mango! Create an outdoor living space that\'s perfect for summer with Mango\'s stylish outdoor furniture and decor! <br>\n8. Get your outdoor space ready for summer with Mango! From furniture to decor, Mango has everything you need to get your outdoor space ready for summer!', 1, 'content', '2023-05-13 02:56:13', '2023-05-13 02:56:13'),
(61, 7, '0.7', 'mango', '', '', 'Give me Facebook Ads ideas for my productmango The product is  The tone of voice must be casual. Give me the response in Bengali language.', '\n<br>\nআপনি আপনার ম্যাঙ্গো পণ্য জন্য একটি আকর্ষণীয় ফেসবুক বিজ্ঞাপন তৈরি করতে পারেন:<br>\n<br>\n• আপনি আপনার ম্যাঙ্গো পণ্যটির সাথে একটি সুন্দর ছবি ব্যবহার করে আপনার অনুসন্ধানের জন্য একটি আকর্ষণীয় বিজ্ঞাপন তৈরি করুন।<br>\n<br>\n• আপনি আপনার ম্যাঙ্গো পণ্যটির সুবিধাবিন্যাস উল্লেখ করে একটি আকর্ষণীয় বিজ্ঞাপন তৈরি করুন।<br>\n<br>\n• আপনি আপনা', 1, 'content', '2023-05-13 02:57:21', '2023-05-13 02:57:21'),
(62, 3, '0.7', 'Best Rice cocker', '', '', 'I\'m writing a blog on Best Rice cocker. In short The blog is about. Suggest me the intro for this blog? The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nAre you ready to cook the perfect pot of rice every single time? Whether you’re a seasoned chef or a novice cook, a good rice cooker can make a big difference in the quality of your meals. In this blog, we’ll be discussing the best rice cookers on the market, so you can find the perfect one for your kitchen.', 20, 'content', '2023-05-13 03:18:05', '2023-05-13 03:18:05'),
(63, 22, '0.7', 'video is related to laptop', '', '', 'Write me some catchy Video title for my video. The video is about video is related to laptop The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n1. \"Maximize Your Laptop Power: Get the Most Out of Your Machine!\"<br>\n2. \"Revolutionize Your Laptop Experience: Unlock Its Full Potential!\"<br>\n3. \"Your Laptop, Your Rules: Unleash Its True Power!\"<br>\n4. \"Discover the Hidden Power of Your Laptop and Make It Work For You!\"<br>\n5. \"Make Your Laptop Work For You: Get the Most Out Of It!\"<br>\n6. \"Upgrade Your Laptop Game: Unlock Its True Potential!\"<br>\n7. \"Unlock Your Laptop\'s Hidden Potential: Get the Most Out of It!\"<br>\n8. \"Go Beyond the Basics: Take Your Laptop to the Next Level!\"<br>\n9. \"Transform Your Laptop Experience: Unlock Its Full Power!\"<br>\n10. \"Reimagine Your Laptop Experience: Get the Most Out of It!\"', 21, 'content', '2023-05-13 03:21:05', '2023-05-13 03:21:05'),
(64, 15, '1', 'AI-based service', '', 'AI-based service', 'Generate some cool, creative, and catchy names for a startup business. The type/sector of business is AI-based service. Give me the response in AI-based service language. The tone of voice must be casual. Give me the response in English (USA) language.', '(1). 1. MindSurf Technologies <br>\n2. ThinkingMinds <br>\n3. AI System Solutions <br>\n4. Robotech Solutions <br>\n5. BotWorks <br>\n6. Artificial Insight<br>\n7. Ingenius Software <br>\n8. LogicaX Solutions <br>\n9. Change.AI <br>\n10. BrainyTech Systems<br>\r\n<br>\r\n<br>\r\n(2). 1. Perception Ninja<br>\n2. CleverCore<br>\n3. AI Shakeup<br>\n4. NeuralDrone<br>\n5. CognitiveX<br>\n6. Brain Boosters<br>\n7. Neural Stacks<br>\n8. SUPER-A-I<br>\n9. AI Whiz<br>\n10. Artificial Aid<br>\r\n<br>\r\n<br>\r\n(3). 1. CogSmart Solutions <br>\n2. AI Genie <br>\n3. Educaid AI <br>\n4. The A.I.brainTrust <br>\n5. CleverConnect AI <br>\n6. IngeniAIze <br>\n7. MasterMinds AI <br>\n8. neuronIQ <br>\n9. CognitiveClue <br>\n10. NeuralLogic<br>\r\n<br>\r\n<br>\r\n(4). 1. HI-ting The Mark: AI-Based Services <br>\n2. Intelli-Smarts to Help the Heart <br>\n3. AI-Minded Group <br>\n4. AI Benefits Now <br>\n5. The AI-vators <br>\n6. AI Dynamo <br>\n7. Innovative AI Solutions <br>\n8. AI On-Demand <br>\n9. AI For The Win <br>\n10. AIOptimizers <br>\n11. AIIntegrating <br>\n12. AI Assistance Pro <br>\n13. AI-Based Solutions Inc. <br>\n14. AI Incentives Plus <br>\n15. Brain-Child AI Services <br>\n16. AI Juice <br>\n17. AI Support Heroes <br>\n18. AI Plus Solutions <br>\n19. AI The Edge <br>\n20. Advance AI Now<br>\r\n<br>\r\n<br>\r\n(5). 1. Intuition Revolution <br>\n2. Cortex Company <br>\n3. Thinkbot Technologies <br>\n4. Brainiac IT<br>\n5. Automata Hotspot <br>\n6. AI-Squared Solutions <br>\n7. Machine Minds <br>\n8. The Logic Lab<br>\n9. CleverCircuits <br>\n10. Erudite Solutions<br>\r\n<br>\r\n<br>\r\n', 23, 'content', '2023-05-13 03:38:39', '2023-05-13 03:38:39'),
(65, 13, '0.7', '', '', '', 'Summarize this paragraph . The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nThis paragraph discusses the advantages of a healthy lifestyle. It explains that eating nutritious foods, exercising regularly, and getting enough rest are all important components of a healthy lifestyle.<br>\n<br>\nHaving a healthy lifestyle is beneficial in many ways. Eating nutritious foods, exercising regularly, and getting enough rest can lead to improved physical and mental health. These activities can help reduce the risk of disease, boost energy levels, and improve mood.', 25, 'content', '2023-05-13 03:45:23', '2023-05-13 03:45:23'),
(66, 4, '0.7', 'programming', '', '', 'I want to write a blog on programming. Give me 3 ideas on how can I write the blog with outlines. The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nIdea 1:<br>\n<br>\nBlog Outline: Introduction to Programming <br>\n<br>\n1. What is Programming?<br>\n2. Popular Programming Languages<br>\n3. Tips for Getting Started with Programming<br>\n<br>\nTone: Casual<br>\n<br>\nIdea 2: <br>\n<br>\nBlog Outline: Programming for Beginners<br>\n<br>\n1. Benefits of Learning to Program<br>\n2. Common Mistakes to Avoid<br>\n3. How to Find Resources and Support<br>\n<br>\nTone: Casual<br>\n<br>\nIdea 3:<br>\n<br>\nBlog Outline: The Future of Programming<br>\n<br>\n1. Popular Programming Languages of the Future<br>\n2. What Skills Will be Needed?<br>\n3. Preparing for a Career in Programming<br>\n<br>\nTone: Casual', 22, 'content', '2023-05-13 03:53:49', '2023-05-13 03:53:49'),
(67, 7, '0.7', 'programming', '', '', 'Give me Facebook Ads ideas for my productprogramming The product is  The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n1. Offer a free trial of your programming product to attract new customers.<br>\n2. Showcase the benefits of using your programming product in a video ad.<br>\n3. Highlight the features of your programming product with an interactive ad.<br>\n4. Create a carousel ad to show off different features of your programming product.<br>\n5. Run an ad showcasing customer testimonials on your programming product.<br>\n6. Show off the time-savings offered by your programming product in an ad.<br>\n7. Create a lookalike audience to reach people similar to your existing customers.<br>\n8. Use a lead generation ad to collect contact information from potential customers.<br>\n9. Promote discounts or specials on your programming product.<br>\n10. Use dynamic product ads to show relevant products to people who have recently visited your website.', 22, 'content', '2023-05-13 03:55:15', '2023-05-13 03:55:15'),
(68, 3, '0.7', 'Is AWS good?', '', '', 'I\'m writing a blog on Is AWS good?. In short The blog is about. Suggest me the intro for this blog? The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nThe cloud has revolutionized the way businesses store, manage, and use data. Amazon Web Services (AWS) is the leading cloud platform in the industry, and it has become indispensable for businesses of all sizes. But is AWS really good? In this blog, we\'ll explore the pros and cons of using AWS and help you decide if it\'s the right solution for your needs.', 1, 'content', '2023-05-13 04:02:54', '2023-05-13 04:02:54'),
(69, 6, '0.7', '', '', '', 'Write me 5 blog titles about  The tone of voice must be casual. Give me the response in Arabic language.', '\n<br>\n1. كيف تحدد نحو الصوت المرغوب فيه؟<br>\n2. الصوت المختلط في العلاقات الإنسانية<br>\n3. مدخل إلى عالم الصوت المرغوب فيه<br>\n4. اعتبار الصوت عند التواصل: الاستعانة بتكوين الصوت المرغوب فيه<br>\n5. أهمية الصوت المرغوب فيه في المجتمع العصري', 1, 'content', '2023-05-13 04:05:25', '2023-05-13 04:05:25'),
(70, 7, '0.7', 'iphone pro 4', '', '', 'Give me Facebook Ads ideas for my productiphone pro 4 The product is  The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n1. Get the latest and greatest - Get the iPhone Pro 4 today and be the envy of your friends!<br>\n2. Get the best of both worlds – Get the iPhone Pro 4 and enjoy the latest features and top performance.<br>\n3. Get the power you need - Get the iPhone Pro 4 and experience the power and speed you need for any task.<br>\n4. Get your hands on the newest technology - Get the iPhone Pro 4 and be the first to experience the latest in mobile technology.<br>\n5. Get the ultimate mobile experience - Get the iPhone Pro 4 and enjoy the ultimate mobile experience.<br>\n6. Get the best of both worlds - Get the iPhone Pro 4 and get the best of both worlds - sleek design and powerful performance.<br>\n7. Get the perfect companion - Get the iPhone Pro 4 and make it your perfect companion for any task or activity.<br>\n8. Get the latest features - Get the iPhone Pro 4 and get access to the latest features and advancements in mobile technology.<br>\n9. Get the most out of your phone - Get the iPhone Pro 4 and get the most out of your phone with advanced features and performance.<br>\n10. Get the best experience - Get the iPhone Pro 4 and get the best experience with its top-of-the-line features and performance.', 1, 'content', '2023-05-13 04:14:18', '2023-05-13 04:14:18'),
(71, 4, '0.7', 'about test', '', '', 'I want to write a blog on about test. Give me 3 ideas on how can I write the blog with outlines. The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n1. Introduction to Testing: Outline <br>\na. What is testing?<br>\nb. What types of testing are there?<br>\nc. What is the importance of testing?<br>\n<br>\n2. Benefits of Testing: Outline <br>\na. How does testing help to prevent errors?<br>\nb. What are the benefits of testing?<br>\nc. What are the best practices for testing?<br>\n<br>\n3. Strategies for Testing: Outline<br>\na. What strategies should be used for testing?<br>\nb. What techniques should be used for testing?<br>\nc. What tools can be used for testing?', 1, 'content', '2023-05-13 04:22:09', '2023-05-13 04:22:09'),
(72, NULL, '1', 'write a python code', NULL, 'write a python code', 'You are a helpful assistant that writes code.', '<pre class=\'pre-line\'> Sure, here&#039;s an example:\n\n<code>\n# This program will print the sum of two numbers\n\nnum1 = 5\nnum2 = 7\n\nsum = num1 + num2\n\nprint(&quot;The sum of&quot;, num1, &quot;and&quot;, num2, &quot;is&quot;, sum)\n</code>\n\nThis code defines two variables `num1` and `num2` with the values 5 and 7. It then calculates their sum and stores it in another variable `sum`. Finally, it uses the `print()` function to output a message with the sum of the numbers included. </pre>', 1, 'code', '2023-05-13 04:22:55', '2023-05-13 04:22:55'),
(73, 8, '0.7', 'How to use recumbent bike', '', 'How to use recumbent exercise bike', 'Write me an Article that includes the given keywords . The title of the Article is \"How to use recumbent bike\", and here\'s a little bit about the article, How to use recumbent exercise bike. The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nAre you looking to lose weight and tone your body? Then a recumbent exercise bike might be the right choice for you! Recumbent bikes offer an effective and low-impact workout that can help you reach your fitness goals. But before you take your new bike for a spin, it\'s important to understand how to use it correctly. In this article, we\'ll explain the basics of using a recumbent bike and provide some helpful tips for getting the most out of your workout.<br>\n<br>\nThe first step in using a recumbent bike is to adjust the seat. Make sure the seat is at a comfortable height for your legs so that you can easily reach the pedals. You should also adjust the backrest so that it supports your lower and mid-back. Finally, make sure the handlebars are at a height that allows you to maintain a good posture.<br>\n<br>\nOnce you\'re in position, you can begin your workout. You can adjust the intensity of your exercise by changing the resistance setting. A higher resistance will make the workout more challenging and burn more calories, while a lower resistance will be easier on your muscles. If you\'re a beginner, start with a low resistance and gradually increase it as your fitness level improves.<br>\n<br>\nYou can also use a recumbent bike to track your progress. Many bikes have a built-in computer that will display your speed, time, distance, and calories burned. This can help you stay motivated and monitor your progress over time.<br>\n<br>\nWhen you\'re finished with your workout, make sure you cool down and stretch. This will help your muscles recover faster and prevent injury.<br>\n<br>\nUsing a recumbent bike is a great way to get an effective and low-impact workout. Remember to adjust the seat, backrest, and handlebars before you begin, and adjust the resistance setting to suit your fitness level. You can also use the bike\'s computer to track your progress and stay motivated. Finally, make sure to cool down and stretch after your workout to help your muscles recover. Follow these tips and you\'ll be on your way to a healthier and happier life!', 1, 'content', '2023-05-13 04:23:51', '2023-05-13 04:23:51'),
(74, NULL, '1', 'Write Python ai blog post generator. User just input keyword and script make write complte article including intro, headings, conclusion', NULL, 'Write Python ai blog post generator. User just input keyword and script make write complte article including intro, headings, conclusion', 'You are a helpful assistant that writes code.', '<pre class=\'pre-line\'> Sure, here&#039;s a Python script that generates an AI blog post based on a given keyword:\n\n``` python\nimport requests\nfrom bs4 import BeautifulSoup\nimport random\nimport re\n\ndef get_page_url(keyword):\n    &#039;&#039;&#039;\n    Returns page URL for the given keyword using Google search\n    &#039;&#039;&#039;\n    query = keyword + &quot; ai blog&quot;\n    url = f&quot;https://www.google.com/search?q={query}&quot;\n    user_agent = {&quot;User-agent&quot;: &quot;Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3&quot;}\n    html_page = requests.get(url, headers=user_agent)\n    soup = BeautifulSoup(html_page.content, &#039;html.parser&#039;)\n    for link in soup.findAll(&#039;a&#039;):\n        href = link.get(&#039;href&#039;)\n        if &quot;url?q=&quot; in href:\n            return href.split(&quot;?q=&quot;)[1]\n\ndef get_article_text(url):\n    &#039;&#039;&#039;\n    Returns the article text from the given URL\n    &#039;&#039;&#039;\n    html_page = requests.get(url)\n    soup = BeautifulSoup(html_page.content, &#039;html.parser&#039;)\n    article = soup.find(&#039;article&#039;)\n    article_text = [p.get_text() for p in article.find_all(&#039;p&#039;)]\n    return article_text\n\ndef clean_article_text(article_text):\n    &#039;&#039;&#039;\n    Cleans up the article text to remove unwanted characters and HTML tags\n    &#039;&#039;&#039;\n    clean_text = []\n    for paragraph in article_text:\n        # Remove HTML tags\n        clean_paragraph = re.sub(&#039;&lt;.*?&gt;&#039;, &#039;&#039;, paragraph)\n        # Remove unwanted characters\n        clean_paragraph = clean_paragraph.replace(&#039;&amp;nbsp;&#039;, &#039; &#039;)\n        # Remove double quotes\n        clean_paragraph = clean_paragraph.replace(&#039;&quot;&#039;, &#039;&#039;)\n        clean_text.append(clean_paragraph)\n    return clean_text\n\ndef generate_intro(keyword):\n    &#039;&#039;&#039;\n    Generates the introduction for the article\n    &#039;&#039;&#039;\n    intro_templates = [\n        f&quot;Welcome to this AI blog post on {keyword}! Artificial Intelligence is rapidly transforming our world and {keyword} is no exception.&quot;,\n        f&quot;Are you curious about how AI is changing {keyword}? Then you&#039;re in the right place! In this post, we&#039;ll explore the impact of AI on {keyword}.&quot;,\n        f&quot;Hello and welcome to this AI blog post on {keyword}! AI is playing an increasingly important role in {keyword}, and we&#039;re excited to dive into the details with you.&quot;\n    ]\n    return random.choice(intro_templates)\n\ndef generate_headings(article_text):\n    &#039;&#039;&#039;\n    Generates the headings for the article based on the major topics\n    &#039;&#039;&#039;\n    headings = []\n    topics = [&quot;Text Analysis&quot;, &quot;Image Recognition&quot;, &quot;Natural Language Processing&quot;, &quot;Predictive Analytics&quot;]\n    for topic in topics:\n        for i, paragraph in enumerate(article_text):\n            if topic in paragraph:\n                heading = re.search(fr&#039;\\b{topic}\\b&#039;, paragraph).group(0)\n                if </pre>', 1, 'code', '2023-05-13 04:29:38', '2023-05-13 04:29:38'),
(75, 7, '1', 'IPhone 14 pro max', '', '', 'Give me Facebook Ads ideas for my productIPhone 14 pro max The product is  The tone of voice must be professional. Give me the response in English (USA) language.', '\n<br>\n1. Introduce the New iPhone 14 Pro Max: Showcase the latest features, beautiful design, and secure technology of this innovative device.<br>\n      <br>\n2. Upgrade Now and Save: Offer special discounts or incentives for customers who upgrade to the iPhone 14 Pro Max.<br>\n      <br>\n3. Automated Photography: Showcase the incredible photography performance of the iPhone 14 Pro Max, from its improved low-light camera lens to its automated features.<br>\n      <br>\n4. Life Made Easier: Highlight how the iPhone 14 Pro Max makes everyday tasks simple, fast and effortless.<br>\n      <br>\n5. Speed Meets Style: Showcase the performance power and style of the iPhone 14 Pro Max, with its A14 Bionic chip, 5G capability and improved design.<br>\n      <br>\n6. Secure & Private: Stress the importance of privacy and security with the iPhone 14 Pro Max, a device dedicated to protecting the user’s digital life.', 1, 'content', '2023-05-13 04:30:01', '2023-05-13 04:30:01'),
(76, 2, '0.7', '', '', '', 'I\'m writing a blog on . In short The blog is about. Suggest me a conlcusion for this blog? The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nIn conclusion, it is clear that (topic of the blog) is an important subject that deserves attention and consideration. It is essential that we understand the implications of (topic of the blog) and take action to ensure its proper management and the best possible outcomes for all those affected.', 1, 'content', '2023-05-13 04:31:18', '2023-05-13 04:31:18'),
(77, 54, '0.7', 'How to use recumbent exercise bike', '', '', 'Generate my blog  Image ALT Text for an image about How to use recumbent exercise bike The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nImage ALT Text: \"Getting in shape with a recumbent exercise bike - an easy and fun way to stay fit!\"', 1, 'content', '2023-05-13 04:36:01', '2023-05-13 04:36:01'),
(78, 4, '1', 'How DocTime telemedicine app works', '', '', 'I want to write a blog on How DocTime telemedicine app works. Give me 3 ideas on how can I write the blog with outlines. The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n1. Introduction to the DocTime Telemedicine App: What services does it offer and how it makes medical appointments easier<br>\n<br>\nOutline:<br>\n<br>\n- Introduction to DocTime telemedicine app<br>\n- Overview of services offered -  appointment making, online consultations, online prescription charges, etc. <br>\n- Advantages of using the app for medical appointments- convenience, cost savings, simplicity.<br>\n<br>\n2. How to Get Started with the DocTime Telemedicine App: Step-by-Step Tutorial<br>\n<br>\nOutline:<br>\n- Introduction of how to get started with DocTime telemedicine app <br>\n- Step-by-step look at how to set up an account and get connected with a doctor. <br>\n- Benefits of using DocTime telemedicine app and how it simplifies the entire process.<br>\n<br>\n3. The Benefits of Using the DocTime Telemedicine App: Why Patients Prefer This Solution<br>\n<br>\nOutline:<br>\n- Summarizing the benefits of using DocTime telemedicine app- convenience, cost savings, simpler process, etc. <br>\n- Examples of how patients have been able to benefit from DocTime telemedicine app - timely access to care, greater availability of doctors, quicker diagnosis, etc. <br>\n- Conclusion – why the DocTime telemedicine app is the most preferred solution for medical appointments.', 1, 'content', '2023-05-13 06:04:16', '2023-05-13 06:04:16'),
(79, 7, '1', 'Doctime', '', '', 'Give me Facebook Ads ideas for my productDoctime The product is  The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n1. Reach new customers and increase engagement with targeted Facebook Ads for Doctime! <br>\n2. Head over to Doctime for an easier way to manage your business! <br>\n3. Get organized with Doctime! Make your life easier and more efficient. <br>\n4. Forget the hassle of paperwork! Get Doctime and make business management easier. <br>\n5. Reach more customers and grow your business with Doctime <br>\n6. Get more control over your business with Doctime <br>\n7. Make things easier with Doctime! Let us do the heavy lifting for you. <br>\n8. Streamline your business and get more organized with Doctime <br>\n9. Say goodbye to chaos by switching to Doctime <br>\n10. Get an easier way to manage your business with Doctime', 1, 'content', '2023-05-13 06:06:43', '2023-05-13 06:06:43'),
(80, 7, '1', 'Portable small fan', '', '', 'Give me Facebook Ads ideas for my productPortable small fan The product is  The tone of voice must be excited. Give me the response in English (USA) language.', '(1). 1. Cool off with this portable small fan! Get yours today for unbeatable comfort. <br>\n2. Beat the heat when you take this portable small fan on the go. Enjoy anytime, anywhere!<br>\n3. Get instant relief with this handy and compact portable small fan. Never be too hot again!<br>\n4. Take the portable small fan with you! Enjoy the power of a breeze, no matter where you are. <br>\n5. Take a break from the summer heat with this portable small fan – perfect for home or on the go. <br>\n6. Keep your cool in the heat of summer. Try this convenient and portable small fan today. <br>\n7. Beat the heat with this portable small fan. You\'ll be so glad you did! <br>\n8. Keep your cool all summer long with this portable small fan! Get yours today for unbeatable comfort.<br>\r\n<br>\r\n<br>\r\n(2). 1. Make your summer cooler with our lightweight and portable small fan - perfect for every home! <br>\n2. Beat the summer heat with our portable small fan - now available! <br>\n3. Get cool and comfortable this summer with our small and portable fan. <br>\n4. Get relief from those summer days with our portable fan - ideal for any home! <br>\n5. Stay cool and refreshed wherever you go with our compact and small fan. <br>\n6. Stay comfortable in the summer with our small and portable fan - ideal for all homes! <br>\n7. Get the perfect air-flow anywhere and anytime with our lightweight and portable small fan. <br>\n8. Beat the heat and stay fresh all summer long with our small fan - perfect for any home. <br>\n9. Keep cool wherever you go with our portable small fan - take it anywhere and stay refreshed! <br>\n10. Enjoy powerful cooling this summer with our lightweight and portable fan - no home should be<br>\r\n<br>\r\n<br>\r\n(3). 1. Beat the heat with our newest addition - our Portable Small Fan! Keep cool on the go with this lightweight and portable fan!<br>\n1. Get a burst of cool air wherever you are with our Portable Small Fan! The perfect way to stay cool no matter where you are!<br>\n1. Enjoy a cool breeze from your pocket with our Portable Small Fan! Small and lightweight, it\'s the perfect way to stay cool on hot days! <br>\n2. Keep the heat at bay with our Portable Small Fan! Enjoy a cool breeze wherever you go with this small, lightweight fan!<br>\n3. Get some relief from the summer heat with our Portable Small Fan! Keep cool on hot days with this convenient, lightweight fan!<br>\n4. Stay cool on the hottest days with our Portable Small Fan! Lightweight and portable, it\'s the perfect way to get a cool breeze on the go!<br>\n5. Beat the heat in style with our Portable Small Fan! Enjoy a cool breeze<br>\r\n<br>\r\n<br>\r\n', 29, 'content', '2023-05-13 06:13:11', '2023-05-13 06:13:11'),
(81, 7, '0.7', 'apple', '', '', 'Give me Facebook Ads ideas for my productapple The product is  The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n1. Reach your target audience with an engaging ad featuring your Apple product!<br>\n2. Create an eye-catching promotion to drive sales of your Apple product!<br>\n3. Introduce your Apple product to new customers with an exciting ad campaign!<br>\n4. Showcase the unique features of your Apple product in a creative ad!<br>\n5. Connect with potential customers and promote your Apple product!<br>\n6. Boost your sales with a customized ad featuring your Apple product!<br>\n7. Reach out to new customers with an engaging ad featuring your Apple product!<br>\n8. Get noticed with an ad that highlights the best features of your Apple product!<br>\n9. Make your Apple product stand out with a captivating ad campaign!<br>\n10. Show off your Apple product with an eye-catching ad that grabs attention!', 1, 'content', '2023-05-13 06:26:17', '2023-05-13 06:26:17'),
(82, 7, '0.7', 'apple', '', '', 'Give me Facebook Ads ideas for my productapple The product is  The tone of voice must be casual. Give me the response in Bengali language.', '\n<br>\nআপনার পণ্যের জন্য ফেসবুক এডসের আইডিয়াস:<br>\n<br>\n1. আপনার পণ্যটির অনুভূতি বাড়ানোর জন্য আপনার গ্রাহকদের সাথে একটি অনুরোধ করুন।<br>\n<br>\n2. আপনার পণ্যটির আদর্শগুলির বিস্তারিত বিবরণ প্রদান করুন।<br>\n<br>\n3. আপনার পণ্যের সম্পূর্ন উপহার প্রদান করুন, যেমন ডিসকাউন্ট বা বিনামূল্যের শুরুতে।<br>\n<br>\n4. আপনার পণ্যটির সবচেয়ে সুন্দর গুণ তুলে ধরু', 1, 'content', '2023-05-13 06:27:08', '2023-05-13 06:27:08'),
(83, 4, '1', 'Health', '', '', 'I want to write a blog on Health. Give me 3 ideas on how can I write the blog with outlines. The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nIdea 1: <br>\n1. Outline: <br>\n    - Introduction on importance of staying healthy and the benefits of having a healthy lifestyle<br>\n    - Explanation of various factors that can come into play when striving for a healthy lifestyle, such as diet and exercise<br>\n    - Examples of healthy habits that are easy to do and can be incorporated into a daily routine<br>\n    - Strategies for maintaining motivation to keep up with healthy habits<br>\n    - Conclusion<br>\n2. Tone of Voice: Casual <br>\n3. Language: English (USA) <br>\n<br>\nIdea 2: <br>\n1. Outline: <br>\n    - Introduction on the importance of mental health and how it can impact physical health<br>\n    - Explanation of the benefits of positive thinking and how it can help in improving overall health<br>\n    - Overview of different techniques to help manage stress and increase mental wellbeing<br>\n    - Explanation of how getting enough sleep is essential to maintaining overall health<br>\n    - Conclusion<br>\n2. Tone of Voice: Casual <br>\n3. Language: English (USA) <br>\n<br>\nIdea 3: <br>\n1. Outline: <br>\n    - Introduction on how improving your nutrition can have a big impact on your health<br>\n    - Explanation of the importance of having a balanced diet and what essential nutrients make up a balanced diet<br>\n    - Discussion of alternative diets and how they can benefit your health<br>\n    - Strategies for making healthy food choices when eating out and grocery shopping<br>\n    - Conclusion<br>\n2. Tone of Voice: Casual <br>\n3. Language: English (USA)', 1, 'content', '2023-05-13 06:42:28', '2023-05-13 06:42:28'),
(84, 50, '0.7', 'Welcome new employee', '', 'Welcome new employee To the company X', 'Generate an email body for the email named Welcome new employee. Must include these details Welcome new employee To the company X The tone of voice must be professional. Give me the response in English (USA) language.', '\n<br>\nDear [Name],<br>\n<br>\nWelcome to Company X! We are so excited to have you join our team.<br>\n<br>\nWe believe that you will be a valuable asset to our organization and we look forward to seeing your contributions. We want to ensure that your transition is as smooth as possible, so please don\'t hesitate to reach out to any of our team members for assistance.<br>\n<br>\nWe are confident that you will be able to make a lasting impact on our organization and we look forward to your positive energy.<br>\n<br>\nSincerely,<br>\n<br>\n[Name]<br>\n<br>\nCompany X', 11, 'content', '2023-05-13 09:03:59', '2023-05-13 09:03:59'),
(85, 5, '1', 'AI Content Generate', '', '', 'Write me a blog which title is AI Content Generate and the blog subheadings are  The tone of voice must be professional. Give me the response in English (USA) language.', '\n<br>\nAI Content Generation: Unlocking the Power of Automated Content Creation <br>\n<br>\nIn the ever-evolving world of technology, automated content is quickly becoming an essential tool for businesses looking to maximize their efficiency. AI content generation allows companies to create content that is streamlined and engaging, on a much more efficient timeline.<br>\n<br>\nUnderstanding the Basics <br>\n<br>\nAI content generation is the process of creating content with the help of a program or machine, rather than a human. AI-generated content can range from simple blog posts to entire website copy, and can essentially be customized and tailored to each company’s needs. This means that businesses can create content that is both on-brand and highly targeted, without the need for continuous human intervention.<br>\n<br>\nThe Advantages of Automated Content <br>\n<br>\nFrom the perspective of the business owner, the advantages of automated content are undeniable. AI-generated blog posts, articles, and website content can generally be created faster and with fewer resources', 30, 'content', '2023-05-13 10:29:55', '2023-05-13 10:29:55'),
(86, 49, '0.7', 'Enjoying the day', '', '', 'Generate Hashtag for my Tiktok post. The Tiktok is aboutEnjoying the day The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n#EnjoyingTheDay #ChillVibes #RelaxingTime', 11, 'content', '2023-05-13 10:52:45', '2023-05-13 10:52:45'),
(87, 7, '0.7', 'water bottle', '', '', 'Give me Facebook Ads ideas for my productwater bottle The product is  The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n1. Keep your hydration on-the-go with our stylish and durable water bottles! <br>\n2. Staying hydrated has never been easier with our convenient water bottles. <br>\n3. Show off your unique style with our customizable water bottles! <br>\n4. Stay cool and refreshed all day with our water bottles. <br>\n5. Quench your thirst with our leak-proof and easy-to-carry water bottles. <br>\n6. Look great and stay hydrated with our colorful water bottles. <br>\n7. Take your hydration with you wherever you go with our water bottles. <br>\n8. Keep your drinks cold and fresh with our insulated water bottles. <br>\n9. Get the perfect water bottle for your active lifestyle. <br>\n10. Reach your hydration goals with our reusable water bottles.', 11, 'content', '2023-05-13 14:15:19', '2023-05-13 14:15:19'),
(88, 26, '1', 'Branding with', '', 'The post would be about importants of branding. Why we should focus on branding...', 'Generate an attracting Instagram caption for a post about The post would be about importants of branding. Why we should focus on branding... The tone of voice must be professional. Give me the response in English (USA) language.', '\n<br>\n\"Branding is the key to success - without it, there is no identity or way to differentiate your business from competitors. Investing in good branding is essential for any business to succeed in today\'s competitive landscape.\" #branding #success #investing', 1, 'content', '2023-05-13 18:00:56', '2023-05-13 18:00:56'),
(89, 26, '1', 'Branding with', '', 'The post would be about importants of branding. Why we should focus on branding...', 'Generate an attracting Instagram caption for a post about The post would be about importants of branding. Why we should focus on branding... The tone of voice must be professional. Give me the response in English (USA) language.', '(1). \"The success of any business is directly related to how well you brand yourself. Effective branding engages customers and helps differentiate your business from the competition. Focus on developing a strong brand to ensure long-term success!\" #BrandStrategy #BusinessSuccess #BrandingMatters<br>\r\n<br>\r\n<br>\r\n(2). \"Your brand is the first impression that you make on your customers. Invest time and energy into refining your brand identity and you will reap long-term rewards. #brandingmatters\"<br>\r\n<br>\r\n<br>\r\n(3). \"Branding is more than just a logo and a tagline. It\'s how you build relationships and establish trust. Put in the effort now to build a strong brand identity and watch your success take off!\"<br>\r\n<br>\r\n<br>\r\n', 1, 'content', '2023-05-13 18:01:35', '2023-05-13 18:01:35'),
(90, 46, '1', 'Branding', '', 'The post would be about importants of branding. Why we should focus on branding...', 'Generate a Twitter caption for my tweet about Branding The tone of voice must be professional. Give me the response in English (USA) language.', '(1). \"The power of strong branding is undeniable. Investing in a professional brand is essential for businesses looking for long-term success.\" #Branding<br>\r\n<br>\r\n<br>\r\n(2). \"Successful branding increases ROI and enhances team credibility. Tap into the power of #branding and see the positive impact it has on your business!\"<br>\r\n<br>\r\n<br>\r\n(3). \"Gain a competitive edge with a comprehensive branding strategy. Utilize our services and create a distinct identity that stands out from the competition. #branding\"<br>\r\n<br>\r\n<br>\r\n', 1, 'content', '2023-05-13 18:02:25', '2023-05-13 18:02:25'),
(91, 38, '1', 'Branding', '', 'The post would be about importants of branding. Why we should focus on branding...', 'Generate 10 email subject lines for my product/service named Branding. Must include these details The post would be about importants of branding. Why we should focus on branding... The tone of voice must be professional. Give me the response in English (USA) language.', '(1). 1. Leverage the Importance of Branding: Earn More with Professional Impact<br>\n2. Make Branding a Top Priority: Optimize Your Success Now<br>\n3. Unlock the Power of Branding: Revenue-Boosting Strategies<br>\n4. Get Ahead with Strategic Branding: Truly Stand Out from the Competition<br>\n5. The Transformative Power of Branding: Uncover Your True Potential <br>\n6. Unlock Unmatched Success with Quality Branding<br>\n7. Put Branding in the Spotlight: Maximize Your Potential and Profits<br>\n8. See Unparalleled Results with Professional Branding <br>\n9. Harness the Benefits of Branding for Unrivaled Success<br>\n10. Master the Strategies of Branding: A Guide to Ultimate Achievement<br>\r\n<br>\r\n<br>\r\n(2). 1. \"The Power of Branding - Why We Should Prioritize Its Significance\"<br>\n2. \"Promote Your Business with an Effective Branding Strategy\"<br>\n3. \"The Value of Branding for Modern Businesses\"<br>\n4. \"Grow Your Business with a Thoughtful Branding Strategy\"<br>\n5. \"The Benefits of Branding - Why It Matters Now More Than Ever\"<br>\n6. \"Highlight Your Brand with a Carefully Crafted Branding Plan\"<br>\n7. \"Maximizing the Impact of Branding - What You Need to Know\"<br>\n8. \"Strengthen Your Business through Effectual Branding\"<br>\n9. \"Unlock Your Business Potential with Professional Branding\"<br>\n10. \"The Secrets to Making Your Brand Stand Out - why Focus on Branding\"<br>\r\n<br>\r\n<br>\r\n(3). 1. Unlock the Power of Branding for Your Business<br>\n2. Capture Attention with Power Branding Strategies<br>\n3. Put Branding at the Forefront of Your Business Plan<br>\n4. Optimize Your Branding for Maximum Competitive Edge<br>\n5. How Investing in Impactful Branding Strategies Pays Off<br>\n6. Make the Most of Your Branding to Increase Your Visibility<br>\n7. Captivate Your Audience with Strategic Branding<br>\n8. Maximize Your Brand\'s Potential with These Proven Strategies<br>\n9. Establish your Branding: A Must for Maximum Growth<br>\n10. Leverage the Benefits of Intelligent Branding Practices<br>\r\n<br>\r\n<br>\r\n(4). 1. The Power of Branding: Why You Should Focus On It<br>\n2. Learn How Smart Brands get Ahead With Strategic Branding<br>\n3. Make Branding Part of Your Business Strategy<br>\n4. Enhancing Your Brand Through Effective Branding<br>\n5. Branding: Unlocking the Promise of Your Business<br>\n6. Crafting Your Brand Story: It Starts With Branding<br>\n7. Discover the Benefits of Branding Your Business<br>\n8. How Your Brand Can Win With Strategic Branding<br>\n9. Realizing Your Branding Potential: It\'s All in the Details<br>\n10. Reap the Rewards of Goal-Oriented Branding  Now<br>\r\n<br>\r\n<br>\r\n(5). 1. How Branding Can Help You Achieve Your Business Goals <br>\n2. Uncovering the Benefits of Investing in Branding <br>\n3. You Can\'t Afford to Overlook the Power of Branding <br>\n4. Gaining a Competitive Edge Through Proper Branding <br>\n5. The Guide to Crafting the Perfect Brand <br>\n6. Leveraging Branding Strategies to Enhance Your Brand <br>\n7. Take Advantage of Branding to Increase Your ROI <br>\n8. The Essential Steps to Effective Branding <br>\n9. Take Control of Your Brand with Strategic Branding <br>\n10. Learn How to Build Brand Recognition Through Branding<br>\r\n<br>\r\n<br>\r\n', 1, 'content', '2023-05-13 18:06:37', '2023-05-13 18:06:37'),
(92, 10, '0.7', 'Life of a village boy', '', '', 'Write me a Paragraph that includes the given keywords . The title of the Paragraph is \"Life of a village boy\", The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\nLife of a village boy can be both fun and challenging. Growing up in a small, rural town can provide a sense of community and security that\'s hard to find in a big city. There\'s plenty of fresh air, open spaces, and the chance to experience nature in its purest form. On the other hand, there can be limited job opportunities, access to information, and other resources that city dwellers take for granted. Fortunately, village boys often have a strong work ethic and take advantage of the knowledge and skills they have. They learn to be self-reliant, resourceful, and creative in order to overcome the challenges they face. Life in a village can be difficult, but the rewards are worth it.', 1, 'content', '2023-05-17 01:14:53', '2023-05-17 01:14:53'),
(93, 3, '1', 'how to make wordpress theme', '', 'make WordPress theme gridline step by step', 'I\'m writing a blog on how to make wordpress theme. In short The blog is aboutmake WordPress theme gridline step by step. Suggest me the intro for this blog? The tone of voice must be professional. Give me the response in English (USA) language.', '\n<br>\nCreating a custom WordPress theme can be an overwhelming task for many web designers. However, if you break it down into manageable steps, you can create an aesthetically pleasing and functionally sound theme with relative ease. In this blog, we will take you through the step-by-step process of creating a grid-based WordPress theme. We will cover key topics such as HTML and CSS coding, implementing grid systems, and best practices for responsive design. So let’s start creating your own unique theme!', 38, 'content', '2023-05-20 04:40:29', '2023-05-20 04:40:29'),
(94, 4, '0.7', 'Tell me an idea about perfume brand case study', '', '', 'I want to write a blog on Tell me an idea about perfume brand case study. Give me 3 ideas on how can I write the blog with outlines. The tone of voice must be casual. Give me the response in English (USA) language.', '\n<br>\n1. Crafting an Effective Perfume Brand Case Study: A Guide for Beginners – This blog could provide an overview of the steps that people need to take when creating a case study for a perfume brand. It could cover topics such as how to determine an effective research topic, how to conduct market research and how to create a compelling narrative. <br>\n<br>\n2. The Power of Storytelling in Perfume Brand Case Studies – This blog could explore how storytelling can be used to create an effective perfume brand case study. It could cover topics such as the importance of selecting a compelling narrative, the impact of emotionally evoking stories and how to use storytelling to capture an audience. <br>\n<br>\n3. Leveraging Data to Make Your Perfume Brand Case Study Stand Out – This blog could focus on how to incorporate data into a case study. It could cover topics such as how to select the right metrics, how to incorporate data into the narrative and the impact of data visualizations.', 11, 'content', '2023-05-23 04:48:59', '2023-05-23 04:48:59');

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

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `prompt`, `size`, `image_path`, `old_image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', '256x256', 'assets/uploads/ai_images//2023/04/11/202304112449.png', NULL, 1, '2023-04-11 14:25:26', '2023-04-11 14:25:26'),
(2, 'nature', '256x256', 'assets/uploads/ai_images//2023/04/11/202304115326.png', NULL, 1, '2023-04-11 14:25:56', '2023-04-11 14:25:56'),
(3, 'nature', '256x256', 'assets/uploads/ai_images//2023/04/11/202304111304.png', NULL, 1, '2023-04-11 14:26:07', '2023-04-11 14:26:07'),
(4, 'nature', '256x256', 'assets/uploads/ai_images//2023/04/11/202304116504.png', NULL, 1, '2023-04-11 14:26:08', '2023-04-11 14:26:08'),
(5, 'nature', '256x256', 'assets/uploads/ai_images//2023/04/11/202304112181.png', NULL, 1, '2023-04-11 14:26:21', '2023-04-11 14:26:21'),
(6, 'Nature', '256x256', 'assets/uploads/ai_images//2023/04/11/202304115371.png', NULL, 1, '2023-04-11 14:50:35', '2023-04-11 14:50:35'),
(7, 'Use case Templates image', '256x256', 'assets/uploads/ai_images//2023/04/26/202304267818.png', NULL, 1, '2023-04-26 16:36:38', '2023-04-26 16:36:38'),
(8, 'generate image of china village sun rising and farmers working in field', '512x512', 'assets/uploads/ai_images//2023/05/04/202305041745.png', NULL, 1, '2023-05-04 17:53:48', '2023-05-04 17:53:48'),
(9, 'generate image of china village sun rising and farmers working in field', '512x512', 'assets/uploads/ai_images//2023/05/04/202305049003.png', NULL, 1, '2023-05-04 17:53:48', '2023-05-04 17:53:48'),
(10, 'Bangladeshi Software company owner winning award and celebrating in NY times square', '256x256', 'assets/uploads/ai_images//2023/05/04/202305042769.png', NULL, 1, '2023-05-04 18:40:46', '2023-05-04 18:40:46'),
(11, 'Create a vector for software company website hero section', '256x256', 'assets/uploads/ai_images//2023/05/04/202305046023.png', NULL, 1, '2023-05-04 18:44:23', '2023-05-04 18:44:23'),
(12, 'Create a vector for software company website hero section', '256x256', 'assets/uploads/ai_images//2023/05/04/202305047400.png', NULL, 1, '2023-05-04 18:44:23', '2023-05-04 18:44:23'),
(13, 'software company website hero section vector', '512x512', 'assets/uploads/ai_images//2023/05/04/202305049792.png', NULL, 1, '2023-05-04 18:48:19', '2023-05-04 18:48:19'),
(14, 'software company website hero section vector', '512x512', 'assets/uploads/ai_images//2023/05/04/202305042724.png', NULL, 1, '2023-05-04 18:48:19', '2023-05-04 18:48:19'),
(15, 'nature', '256x256', 'assets/uploads/ai_images//2023/05/04/202305041054.png', NULL, 1, '2023-05-04 19:37:58', '2023-05-04 19:37:58'),
(16, NULL, '256x256', 'assets/uploads/ai_images//2023/05/04/20230504939.png', 'assets/uploads/ai_images/local/2023/05/04/202305045328.png', 1, '2023-05-04 19:38:35', '2023-05-04 19:38:35'),
(17, 'Education for all', '256x256', 'assets/uploads/ai_images//2023/05/06/202305066204.png', NULL, 13, '2023-05-06 17:52:07', '2023-05-06 17:52:07'),
(18, 'Education for all', '256x256', 'assets/uploads/ai_images//2023/05/06/202305063213.png', NULL, 13, '2023-05-06 17:52:30', '2023-05-06 17:52:30'),
(19, 'Education for all', '256x256', 'assets/uploads/ai_images//2023/05/06/202305063220.png', NULL, 13, '2023-05-06 17:52:35', '2023-05-06 17:52:35'),
(20, 'sofware service company logo', '256x256', 'assets/uploads/ai_images//2023/05/06/202305063435.png', NULL, 13, '2023-05-06 17:53:52', '2023-05-06 17:53:52'),
(24, 'roaster saluting with hand and saying good morning', '1024x1024', 'assets/uploads/ai_images//2023/05/12/202305121584.png', NULL, 15, '2023-05-13 02:41:07', '2023-05-13 02:41:07'),
(25, 'roaster saluting with hand and saying good morning', '1024x1024', 'assets/uploads/ai_images//2023/05/12/202305124395.png', NULL, 15, '2023-05-13 02:41:24', '2023-05-13 02:41:24'),
(26, 'roaster saluting with hand and saying good morning ultra photorealistic', '256x256', 'assets/uploads/ai_images//2023/05/12/202305125541.png', NULL, 15, '2023-05-13 02:42:04', '2023-05-13 02:42:04'),
(27, 'roaster saluting with hand and saying good morning ultra photorealistic', '256x256', 'assets/uploads/ai_images//2023/05/12/202305129724.png', NULL, 15, '2023-05-13 02:42:21', '2023-05-13 02:42:21'),
(28, 'Roberr Pattinson Batman chasing the latest joker from 2022 movie', '1024x1024', 'assets/uploads/ai_images//2023/05/12/202305129718.png', NULL, 18, '2023-05-13 02:49:27', '2023-05-13 02:49:27'),
(29, 'programming', '256x256', 'assets/uploads/ai_images//2023/05/12/202305122506.png', NULL, 22, '2023-05-13 03:35:19', '2023-05-13 03:35:19'),
(30, 'programming', '256x256', 'assets/uploads/ai_images//2023/05/12/202305129640.png', NULL, 22, '2023-05-13 03:35:50', '2023-05-13 03:35:50'),
(31, 'programming', '256x256', 'assets/uploads/ai_images//2023/05/12/202305126846.png', NULL, 22, '2023-05-13 03:35:51', '2023-05-13 03:35:51'),
(32, 'programming', '256x256', 'assets/uploads/ai_images//2023/05/12/202305126873.png', NULL, 22, '2023-05-13 03:35:51', '2023-05-13 03:35:51'),
(33, 'a mid age man with RR bike yoyo', '256x256', 'assets/uploads/ai_images//2023/05/12/202305125231.png', NULL, 23, '2023-05-13 03:40:57', '2023-05-13 03:40:57'),
(34, 'a mid age man with RR bike yoyo', '256x256', 'assets/uploads/ai_images//2023/05/12/202305126724.png', NULL, 23, '2023-05-13 03:40:58', '2023-05-13 03:40:58'),
(35, 'mohki', '256x256', 'assets/uploads/ai_images//2023/05/13/202305136505.png', NULL, 1, '2023-05-13 04:14:46', '2023-05-13 04:14:46'),
(36, 'one man see the ochan side', '256x256', 'assets/uploads/ai_images//2023/05/13/202305131057.png', NULL, 1, '2023-05-13 04:15:20', '2023-05-13 04:15:20'),
(37, 'A boy is connected with his inner self', '1024x1024', 'assets/uploads/ai_images//2023/05/13/202305134494.png', NULL, 27, '2023-05-13 05:03:06', '2023-05-13 05:03:06'),
(38, 'Create an image where an user is getting relaxed with a small portable fan in very hot summer. weather should be sunny and user should be in the road.', '256x256', 'assets/uploads/ai_images//2023/05/13/202305134663.png', NULL, 29, '2023-05-13 06:15:50', '2023-05-13 06:15:50'),
(39, 'create an image where an asian girl model is holding a small portable fan', '1024x1024', 'assets/uploads/ai_images//2023/05/13/202305131652.png', NULL, 29, '2023-05-13 06:17:02', '2023-05-13 06:17:02'),
(40, 'create an image where an indian girl model is holding a small portable fan', '256x256', 'assets/uploads/ai_images//2023/05/13/20230513400.png', NULL, 29, '2023-05-13 06:17:35', '2023-05-13 06:17:35'),
(41, 'make a mango tree image where children is taking mango from road. image will be water art', '512x512', 'assets/uploads/ai_images//2023/05/13/20230513268.png', NULL, 32, '2023-05-13 12:33:47', '2023-05-13 12:33:47'),
(42, 'make a baby carton charecter riding bicycle in city', '1024x1024', 'assets/uploads/ai_images//2023/05/13/202305136546.png', NULL, 32, '2023-05-13 12:35:37', '2023-05-13 12:35:37'),
(43, 'A blog post image about lead prospecting', '512x512', 'assets/uploads/ai_images//2023/05/13/202305138129.png', NULL, 1, '2023-05-13 18:13:10', '2023-05-13 18:13:10'),
(44, 'A blog post image about lead prospecting', '512x512', 'assets/uploads/ai_images//2023/05/13/202305131848.png', NULL, 1, '2023-05-13 18:13:10', '2023-05-13 18:13:10'),
(45, 'Branding image with necessary tool icon', '1024x1024', 'assets/uploads/ai_images//2023/05/13/202305139902.png', NULL, 1, '2023-05-13 18:14:17', '2023-05-13 18:14:17'),
(46, 'Branding image with necessary tool icon', '1024x1024', 'assets/uploads/ai_images//2023/05/13/202305134952.png', NULL, 1, '2023-05-13 18:14:17', '2023-05-13 18:14:17'),
(47, 'Branding image with necessary tool icon', '1024x1024', 'assets/uploads/ai_images//2023/05/13/202305139875.png', NULL, 1, '2023-05-13 18:14:18', '2023-05-13 18:14:18'),
(48, 'Branding image with necessary tool icon', '1024x1024', 'assets/uploads/ai_images//2023/05/13/202305137701.png', NULL, 1, '2023-05-13 18:16:15', '2023-05-13 18:16:15'),
(49, 'A yellow color elephant laughing at a gray banana tree', '256x256', 'assets/uploads/ai_images//2023/05/13/202305137132.png', NULL, 33, '2023-05-13 20:09:49', '2023-05-13 20:09:49'),
(50, 'A yellow color elephant laughing at a gray banana tree', '256x256', 'assets/uploads/ai_images//2023/05/13/202305138998.png', NULL, 33, '2023-05-13 20:10:12', '2023-05-13 20:10:12'),
(51, 'A yellow color elephant laughing at a gray banana tree', '256x256', 'assets/uploads/ai_images//2023/05/13/202305137534.png', NULL, 33, '2023-05-13 20:10:18', '2023-05-13 20:10:18'),
(52, 'An angry snake playing soccer game', '256x256', 'assets/uploads/ai_images//2023/05/13/202305137703.png', NULL, 33, '2023-05-13 20:11:08', '2023-05-13 20:11:08'),
(53, 'An angry snake playing soccer game', '256x256', 'assets/uploads/ai_images//2023/05/13/20230513980.png', NULL, 33, '2023-05-13 20:11:26', '2023-05-13 20:11:26'),
(54, 'Two friend sit on banch.', '256x256', 'assets/uploads/ai_images//2023/05/16/202305166934.png', NULL, 1, '2023-05-17 01:10:50', '2023-05-17 01:10:50'),
(55, 'A cow in a field', '256x256', 'assets/uploads/ai_images//2023/05/16/202305161790.png', NULL, 1, '2023-05-17 01:11:43', '2023-05-17 01:11:43'),
(56, 'i bangladeshi with captain america tshirt and big smiling', '256x256', 'assets/uploads/ai_images//2023/05/21/202305219565.png', NULL, 1, '2023-05-22 03:26:27', '2023-05-22 03:26:27'),
(57, 'Perfume brand product design with posh look', '256x256', 'assets/uploads/ai_images//2023/05/23/202305237669.png', NULL, 11, '2023-05-23 04:49:54', '2023-05-23 04:49:54'),
(58, 'Female perfume brand product posh look', '1024x1024', 'assets/uploads/ai_images//2023/05/23/202305233692.png', NULL, 11, '2023-05-23 04:50:47', '2023-05-23 04:50:47'),
(59, 'Female perfume brand product posh look', '1024x1024', 'assets/uploads/ai_images//2023/05/23/202305239071.png', NULL, 11, '2023-05-23 04:50:48', '2023-05-23 04:50:48'),
(60, 'Celetia', '256x256', 'assets/uploads/ai_images//2023/05/23/202305235820.png', NULL, 11, '2023-05-23 04:51:39', '2023-05-23 04:51:39'),
(61, 'pirate', '256x256', 'assets/uploads/ai_images//2023/05/24/202305241238.png', NULL, 39, '2023-05-24 06:50:01', '2023-05-24 06:50:01');

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
(20, '2023_04_10_150053_create_ai_chat_histories_table', 2);

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
(1, '1680945910-11514', 1, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Admin', 'admin@gmail.com', NULL, NULL, '2023-04-08 09:25:10', '2023-04-08 09:25:10'),
(2, '1681119922-44057', 2, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Rhona French', 'zubilub@mailinator.com', NULL, NULL, '2023-04-10 09:45:22', '2023-04-10 09:45:22'),
(3, '1681120618-10084', 3, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Ria Berg', 'luri@mailinator.com', NULL, NULL, '2023-04-10 09:56:58', '2023-04-10 09:56:58'),
(4, '1681183597-17080', 1, 2, 0, 5.00, 'bank', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-04-11 14:26:37', '2023-04-11 14:26:37'),
(5, '1681185011-25832', 1, 2, 1, 5.00, 'bank', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-04-11 14:50:11', '2023-04-11 14:50:17'),
(6, '1681197401-58264', 4, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Likhon Uz Zaman', 'likhonuzzamanapon02@gmail.com', NULL, NULL, '2023-04-11 18:16:41', '2023-04-11 18:16:41'),
(7, '1682575728-31946', 5, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'kawsar ahmed', 'kawsar.qtec@gmail.com', NULL, '', '2023-04-27 17:08:48', '2023-04-27 17:08:48'),
(8, '1682589428-16748', 6, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Md Likhon Uz Zaman', 'likhon.qtec@gmail.com', NULL, '', '2023-04-27 20:57:08', '2023-04-27 20:57:08'),
(9, '1682594328-42800', 7, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'NM Babor', 'nmbabor50@gmail.com', NULL, '', '2023-04-27 22:18:48', '2023-04-27 22:18:48'),
(10, '1682692198-12476', 8, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'MD LIKHON UZ ZAMAN', 'm.likhonzaman2@gmail.com', NULL, '', '2023-04-29 01:29:58', '2023-04-29 01:29:58'),
(11, '1682693035-19265', 8, 2, 1, 5.00, 'aamarpay', 'AAM1682693038672822', 1, NULL, 'MD LIKHON UZ ZAMAN', 'm.likhonzaman2@gmail.com', NULL, '', '2023-04-29 01:44:08', '2023-04-29 01:44:08'),
(12, '1682833942-75259', 10, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'nTech Bangla', 'ntechbangla21@gmail.com', NULL, '', '2023-04-30 16:52:22', '2023-04-30 16:52:22'),
(13, '1682856987-96269', 11, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Demo User', 'demo@qtecsolution.net', NULL, '', '2023-04-30 23:16:27', '2023-04-30 23:16:27'),
(14, '1683118528-93130', 1, 3, 1, 10.00, 'aamarpay', 'AAM1683118529672451', 1, NULL, 'Admin', 'admin@qtecsolution.net', '01811951215', '', '2023-05-03 23:55:33', '2023-05-03 23:55:33'),
(15, '1683193176-68603', 11, 2, 1, 5.00, 'aamarpay', 'AAM1683193179104672', 1, NULL, 'Demo User', 'demo@qtecsolution.net', NULL, '', '2023-05-04 19:40:09', '2023-05-04 19:40:09'),
(16, '1683358165-48441', 13, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Music Bay TV', 'musicbay.tv@gmail.com', NULL, '', '2023-05-06 17:29:25', '2023-05-06 17:29:25'),
(17, '1683909050-51858', 14, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Silver Shine', 'buzzard351@gmail.com', NULL, '', '2023-05-13 02:30:50', '2023-05-13 02:30:50'),
(18, '1683909569-18811', 15, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Buffy Mcpherson', 'kytol@fakemail.com', NULL, '', '2023-05-13 02:39:29', '2023-05-13 02:39:29'),
(19, '1683909640-72121', 16, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Yardley Bentley', 'vuqek@mailinator.com', NULL, '', '2023-05-13 02:40:40', '2023-05-13 02:40:40'),
(20, '1683909869-55335', 17, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Uriel Dominguez', 'dymefylezy@fakemail.com', NULL, '', '2023-05-13 02:44:29', '2023-05-13 02:44:29'),
(21, '1683910050-47002', 18, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Nishan Paul', 'nishanpaul12011996se@gmail.com', NULL, '', '2023-05-13 02:47:30', '2023-05-13 02:47:30'),
(22, '1683910103-16088', 19, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'hello', 'okthanks@wel.come', NULL, '', '2023-05-13 02:48:23', '2023-05-13 02:48:23'),
(23, '1683911775-48353', 20, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'sohag hossen', 'sohaghossen217@gmail.com', NULL, '', '2023-05-13 03:16:15', '2023-05-13 03:16:15'),
(24, '1683911914-36271', 21, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Morshed Islam', 'morshedislam20@gmail.com', NULL, '', '2023-05-13 03:18:34', '2023-05-13 03:18:34'),
(25, '1683912850-29175', 22, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'md al emran eman', 'emon199227@gmail.com', NULL, '', '2023-05-13 03:34:10', '2023-05-13 03:34:10'),
(26, '1683913032-92526', 23, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'tester', 'test@test.com', NULL, '', '2023-05-13 03:37:12', '2023-05-13 03:37:12'),
(27, '1683913275-12634', 24, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Creative Mind', 'hdnatok02@gmail.com', NULL, '', '2023-05-13 03:41:15', '2023-05-13 03:41:15'),
(28, '1683913426-75995', 25, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Mohammad Repon', 'md.repon56655@gmail.com', NULL, '', '2023-05-13 03:43:46', '2023-05-13 03:43:46'),
(29, '1683914669-81822', 26, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Mofazzul', 'mofazzulmd@gmail.com', NULL, '', '2023-05-13 04:04:29', '2023-05-13 04:04:29'),
(30, '1683918084-57094', 27, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'MD Kashfin', 'xkashfin@gmail.com', NULL, '', '2023-05-13 05:01:24', '2023-05-13 05:01:24'),
(31, '1683918232-51846', 28, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'MD AKASH AHMED', 'akash.pst11@gmail.com', NULL, '', '2023-05-13 05:03:52', '2023-05-13 05:03:52'),
(32, '1683922253-33107', 29, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Tarek Greeens', 'tarekgreens20@gmail.com', NULL, '', '2023-05-13 06:10:53', '2023-05-13 06:10:53'),
(33, '1683937677-65483', 30, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Mohammad Asif', 'kmasif25@gmail.com', NULL, '', '2023-05-13 10:27:57', '2023-05-13 10:27:57'),
(34, '1683945008-83788', 31, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Pascale Foreman', 'jwyzbdcxmw@bugfoo.com', NULL, '', '2023-05-13 12:30:08', '2023-05-13 12:30:08'),
(35, '1683945157-63585', 32, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Md Mahbub Alam', 'mahubtuto@gmail.com', NULL, '', '2023-05-13 12:32:37', '2023-05-13 12:32:37'),
(36, '1683972407-64760', 33, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Bx', 'bxf89881@nezid.com', NULL, '', '2023-05-13 20:06:47', '2023-05-13 20:06:47'),
(37, '1683975605-32859', 34, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Mazharul Islam Sumon', 'miconnect94@gmail.com', NULL, '', '2023-05-13 21:00:05', '2023-05-13 21:00:05'),
(38, '1684045497-48548', 35, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Solaiman Badshah', 'imnmbabor@gmail.com', NULL, '', '2023-05-14 16:24:57', '2023-05-14 16:24:57'),
(39, '1684131768-57959', 36, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'milon Mahmod', 'bd.milonmahmod@gmail.com', NULL, '', '2023-05-15 16:22:48', '2023-05-15 16:22:48'),
(40, '1684304362-23896', 37, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Md. Asaduzzaman', 'asd.qtec@gmail.com', NULL, '', '2023-05-17 16:19:22', '2023-05-17 16:19:22'),
(41, '1684521534-12651', 38, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'choto vaia', 'chotovaia@gmail.com', NULL, '', '2023-05-20 04:38:54', '2023-05-20 04:38:54'),
(42, '1684690099-28203', 1, 2, 1, 5.00, 'stripe', 'tok_1NAG3KHkdL4grcnR6zjetsYn', 1, NULL, 'Admin', 'admin@qtecsolution.net', '01811951215', '', '2023-05-22 03:28:19', '2023-05-22 03:28:20'),
(43, '1684874964-97694', 39, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'Mh Zoy', 'mhjoy547@gmail.com', NULL, '', '2023-05-24 06:49:24', '2023-05-24 06:49:24'),
(44, '1685270486-10481', 7, 1, 1, 0.00, 'Free', NULL, 1, NULL, 'NM Babor', 'nmbabor50@gmail.com', NULL, '', '2023-05-28 20:41:26', '2023-05-28 20:41:26');

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
(1, 1, 1, 1, 200, 100, 10, 10, 5, 5, 1, '2023-04-08 15:25:10', '2023-05-08 15:25:10', '2023-04-08 09:25:10', '2023-04-11 14:26:21'),
(2, 2, 2, 1, 200, 100, 10, 1, 5, 0, 1, '2023-04-10 15:45:22', '2023-05-10 15:45:22', '2023-04-10 09:45:22', '2023-04-10 09:47:24'),
(3, 3, 3, 1, 200, 100, 10, 0, 5, 0, 1, '2023-04-10 15:56:58', '2023-05-10 15:56:58', '2023-04-10 09:56:58', '2023-04-10 22:37:07'),
(4, 1, 5, 2, 400, 253, 150, 0, 20, 2, 1, '2023-04-11 09:50:17', '2023-05-11 09:50:17', '2023-04-11 14:50:17', '2023-04-26 16:36:38'),
(5, 4, 6, 1, 200, 100, 10, 0, 5, 0, 1, '2023-04-11 13:16:41', '2023-05-11 13:16:41', '2023-04-11 18:16:41', '2023-04-11 18:16:57'),
(6, 5, 7, 1, 200, 100, 10, 0, 5, 0, 1, '2023-04-27 12:08:48', '2023-05-27 12:08:48', '2023-04-27 17:08:48', '2023-04-27 17:08:48'),
(7, 6, 8, 1, 200, 100, 10, 1, 5, 0, 1, '2023-04-27 15:57:08', '2023-05-27 15:57:08', '2023-04-27 20:57:08', '2023-04-30 17:20:04'),
(8, 7, 9, 1, 200, 100, 10, 0, 5, 0, 1, '2023-04-27 17:18:48', '2023-05-27 17:18:48', '2023-04-27 22:18:48', '2023-04-27 22:18:48'),
(9, 8, 10, 1, 200, 100, 10, 0, 5, 0, 1, '2023-04-28 20:29:58', '2023-05-28 20:29:58', '2023-04-29 01:29:58', '2023-04-29 01:29:58'),
(10, 8, 11, 2, 400, 300, 160, 0, 25, 0, 1, '2023-04-28 20:44:08', '2023-06-27 20:44:08', '2023-04-29 01:44:08', '2023-04-29 01:53:10'),
(11, 10, 12, 1, 200, 100, 10, 1, 5, 0, 1, '2023-04-30 11:52:22', '2023-05-30 11:52:22', '2023-04-30 16:52:22', '2023-04-30 16:53:22'),
(12, 11, 13, 1, 200, 100, 10, 0, 5, 0, 1, '2023-04-30 18:16:27', '2023-05-30 18:16:27', '2023-04-30 23:16:27', '2023-04-30 23:16:27'),
(13, 1, 14, 3, 30147, 3854, 0, 0, 58, 20, 1, '2023-05-03 18:55:33', '2023-07-02 18:55:33', '2023-05-03 23:55:33', '2023-05-22 03:26:27'),
(14, 11, 15, 2, 10100, 518, 0, 0, 25, 4, 1, '2023-05-04 15:40:09', '2023-07-03 15:40:09', '2023-05-04 19:40:09', '2023-05-23 04:51:39'),
(15, 13, 16, 1, 2000, 417, 0, 0, 5, 4, 1, '2023-05-06 13:29:25', '2023-06-05 13:29:25', '2023-05-06 17:29:25', '2023-05-06 18:50:04'),
(16, 14, 17, 1, 2000, 0, 0, 0, 5, 2, 1, '2023-05-12 22:30:50', '2023-06-11 22:30:50', '2023-05-13 02:30:50', '2023-05-13 02:31:54'),
(17, 15, 18, 1, 2000, 45, 0, 0, 5, 5, 1, '2023-05-12 22:39:29', '2023-06-11 22:39:29', '2023-05-13 02:39:29', '2023-05-13 02:43:58'),
(18, 16, 19, 1, 2000, 141, 0, 0, 5, 0, 1, '2023-05-12 22:40:40', '2023-06-11 22:40:40', '2023-05-13 02:40:40', '2023-05-13 02:42:12'),
(19, 17, 20, 1, 2000, 0, 0, 0, 5, 0, 1, '2023-05-12 22:44:29', '2023-06-11 22:44:29', '2023-05-13 02:44:29', '2023-05-13 02:44:29'),
(20, 18, 21, 1, 2000, 0, 0, 0, 5, 1, 1, '2023-05-12 22:47:30', '2023-06-11 22:47:30', '2023-05-13 02:47:30', '2023-05-13 02:49:27'),
(21, 19, 22, 1, 2000, 53, 0, 0, 5, 0, 1, '2023-05-12 22:48:23', '2023-06-11 22:48:23', '2023-05-13 02:48:23', '2023-05-13 02:50:03'),
(22, 20, 23, 1, 2000, 62, 0, 0, 5, 0, 1, '2023-05-12 23:16:15', '2023-06-11 23:16:15', '2023-05-13 03:16:15', '2023-05-13 03:18:05'),
(23, 21, 24, 1, 2000, 100, 0, 0, 5, 0, 1, '2023-05-12 23:18:34', '2023-06-11 23:18:34', '2023-05-13 03:18:34', '2023-05-13 03:21:05'),
(24, 22, 25, 1, 2000, 187, 0, 0, 5, 4, 1, '2023-05-12 23:34:10', '2023-06-11 23:34:10', '2023-05-13 03:34:10', '2023-05-13 03:55:15'),
(25, 23, 26, 1, 2000, 129, 0, 0, 5, 2, 1, '2023-05-12 23:37:12', '2023-06-11 23:37:12', '2023-05-13 03:37:12', '2023-05-13 03:40:58'),
(26, 24, 27, 1, 2000, 0, 0, 0, 5, 0, 1, '2023-05-12 23:41:15', '2023-06-11 23:41:15', '2023-05-13 03:41:15', '2023-05-13 03:41:15'),
(27, 25, 28, 1, 2000, 70, 0, 0, 5, 0, 1, '2023-05-12 23:43:46', '2023-06-11 23:43:46', '2023-05-13 03:43:46', '2023-05-13 03:45:23'),
(28, 26, 29, 1, 2000, 0, 0, 0, 5, 0, 1, '2023-05-13 00:04:29', '2023-06-12 00:04:29', '2023-05-13 04:04:29', '2023-05-13 04:04:29'),
(29, 27, 30, 1, 2000, 0, 0, 0, 5, 1, 1, '2023-05-13 01:01:24', '2023-06-12 01:01:24', '2023-05-13 05:01:24', '2023-05-13 05:03:06'),
(30, 28, 31, 1, 2000, 0, 0, 0, 5, 0, 1, '2023-05-13 01:03:52', '2023-06-12 01:03:52', '2023-05-13 05:03:52', '2023-05-13 05:03:52'),
(31, 29, 32, 1, 2000, 435, 0, 0, 5, 3, 1, '2023-05-13 02:10:53', '2023-06-12 02:10:53', '2023-05-13 06:10:53', '2023-05-13 06:17:35'),
(32, 30, 33, 1, 2000, 154, 0, 0, 5, 0, 1, '2023-05-13 06:27:57', '2023-06-12 06:27:57', '2023-05-13 10:27:57', '2023-05-13 10:29:55'),
(33, 31, 34, 1, 2000, 0, 0, 0, 5, 0, 1, '2023-05-13 08:30:08', '2023-06-12 08:30:08', '2023-05-13 12:30:08', '2023-05-13 12:30:08'),
(34, 32, 35, 1, 2000, 0, 0, 0, 5, 2, 1, '2023-05-13 08:32:37', '2023-06-12 08:32:37', '2023-05-13 12:32:37', '2023-05-13 12:35:37'),
(35, 33, 36, 1, 2000, 0, 0, 0, 5, 5, 1, '2023-05-13 16:06:47', '2023-06-12 16:06:47', '2023-05-13 20:06:47', '2023-05-13 20:11:26'),
(36, 34, 37, 1, 2000, 0, 0, 0, 5, 0, 1, '2023-05-13 17:00:05', '2023-06-12 17:00:05', '2023-05-13 21:00:05', '2023-05-13 21:00:05'),
(37, 35, 38, 1, 2000, 0, 0, 0, 5, 0, 1, '2023-05-14 12:24:57', '2023-06-13 12:24:57', '2023-05-14 16:24:57', '2023-05-14 16:24:57'),
(38, 36, 39, 1, 2000, 0, 0, 0, 5, 0, 1, '2023-05-15 12:22:48', '2023-06-14 12:22:48', '2023-05-15 16:22:48', '2023-05-15 16:22:48'),
(39, 37, 40, 1, 2000, 0, 0, 0, 5, 0, 1, '2023-05-17 12:19:22', '2023-06-16 12:19:22', '2023-05-17 16:19:22', '2023-05-17 16:19:22'),
(40, 38, 41, 1, 2000, 82, 0, 0, 5, 0, 1, '2023-05-20 00:38:54', '2023-06-19 00:38:54', '2023-05-20 04:38:54', '2023-05-20 04:40:29'),
(41, 1, 42, 2, 36293, 0, 0, 0, 58, 0, 1, '2023-05-21 23:28:20', '2023-08-19 23:28:20', '2023-05-22 03:28:20', '2023-05-22 03:28:20'),
(42, 39, 43, 1, 2000, 0, 0, 0, 5, 1, 1, '2023-05-24 02:49:24', '2023-06-23 02:49:24', '2023-05-24 06:49:24', '2023-05-24 06:50:01'),
(43, 7, 44, 1, 2000, 0, 0, 0, 5, 0, 1, '2023-05-28 16:41:26', '2023-06-27 16:41:26', '2023-05-28 20:41:26', '2023-05-28 20:41:26');

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
(1, 'Admin', 'admin@qtecsolution.net', '01811951215', NULL, 'assets/uploads/user/2023/04/11/admin9853.png', 'admin', 2, NULL, NULL, 41, '$2y$10$hzeZz.Oj3NSn2X5ZSakVouKQMX9ZcuVfyENeJFNb.5GJ4X0Bke/eG', 1, NULL, 'xlSLyKzT2yYZgQ51yHDS7ltvKsmTxPwlkV2BnWdeZ2GCcBZOytbWVoruhpKU', '2023-04-08 09:23:34', '2023-05-22 03:28:20'),
(2, 'Rhona French', 'zubilub@mailinator.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 2, '$2y$10$ELM1fN0y6ahxJNXtSK0EGuaXaGTEjT2YWu95026C6Fn1LEDcBWzS.', 0, NULL, NULL, '2023-04-10 09:45:22', '2023-04-10 09:45:22'),
(3, 'Ria Berg', 'luri@mailinator.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 3, '$2y$10$59XXoeOLgStspvf3eA7qzug2UiaoVod.kAOI1QfagaPZMaBB.Necq', 0, NULL, NULL, '2023-04-10 09:56:58', '2023-04-10 09:56:58'),
(4, 'Likhon Uz Zaman', 'likhonuzzamanapon02@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 5, '$2y$10$Ub9KI.e8bR/ZxhtrDJmVOu1GviP6oiqwCPC51nXDPYUAuZMTRT/IO', 0, NULL, NULL, '2023-04-11 18:16:40', '2023-04-11 18:16:41'),
(5, 'kawsar ahmed', 'kawsar.qtec@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '118151146567838160319', 6, '$2y$10$PC25r2z.Unb03tAXutGGf.PD6m.IyE/nsKkIU4FGRIBjrgvmxUCy2', 0, NULL, NULL, '2023-04-27 17:02:39', '2023-04-27 17:08:48'),
(6, 'Md Likhon Uz Zaman', 'likhon.qtec@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '101538057543828608657', 7, '$2y$10$LgqlpZu9syYYHViAwLVaFeEFzn1O8PfysLIR7l23ehsTDKCSOlVki', 0, NULL, NULL, '2023-04-27 20:56:57', '2023-04-27 20:57:08'),
(7, 'NM Babor', 'nmbabor50@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '100381050673462921866', 43, '$2y$10$nYEeSXGLCvV95cHig09utOIg.D9FqJe5MFDxghvBfhrC2ihwOaDcu', 0, NULL, '2lNh2ahtn0CTpWNsaMM7jpI8s2s9eJ0IUQiOQ2FptBzDiEvuswg4rdWsYQNG', '2023-04-27 22:18:47', '2023-05-28 20:41:26'),
(8, 'MD LIKHON UZ ZAMAN', 'm.likhonzaman2@gmail.com', NULL, NULL, NULL, 'user', 2, NULL, NULL, 10, '$2y$10$6DGro96dZh132YFMqJNZcONKskA6pGvqi9b75A0b6reCVVM/V9mxO', 0, NULL, NULL, '2023-04-29 01:29:43', '2023-04-29 01:44:08'),
(10, 'nTech Bangla', 'ntechbangla21@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '100739619824964249400', 11, '$2y$10$nP/lzCBeXT0IedRq7Dir6.x3JfwYUAXGtkdIqPYV4RhktDF3yyl/a', 0, NULL, NULL, '2023-04-30 16:52:20', '2023-04-30 16:52:22'),
(11, 'Demo User', 'demo@qtecsolution.net', NULL, NULL, NULL, 'user', 2, NULL, NULL, 14, '$2y$10$A0bzXWysiWoqkJptHcafgOlN5nXY9brK2.a8zWlSU2Qb2dWX4mT/a', 0, NULL, NULL, '2023-04-30 23:16:25', '2023-05-04 19:40:09'),
(12, 'Mosharrof rubel', 'mrubel.ad@gmail.com', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL, '$2y$10$Cu9KAS94g9JT3.fYVYAcd.JT4gjZE0yzJN9bflMd696FFSOwVHj96', 0, NULL, NULL, '2023-05-04 19:35:24', '2023-05-04 19:35:24'),
(13, 'Music Bay TV', 'musicbay.tv@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '102211343919335574510', 15, '$2y$10$MI3rimj1nVZ/xhjSo67Gzuw6sqcTRO2JMaaAbVv.l8MuNu/SFcLeW', 0, NULL, NULL, '2023-05-06 17:29:24', '2023-05-06 17:29:25'),
(14, 'Silver Shine', 'buzzard351@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '104384014516279271548', 16, '$2y$10$jnEkTd1O3zTgBtmcSqdE2.tew3U1gdFuuyw88qEJVODEns8GmBv9m', 0, NULL, NULL, '2023-05-13 02:30:49', '2023-05-13 02:30:50'),
(15, 'Buffy Mcpherson', 'kytol@fakemail.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 17, '$2y$10$Pxak.cBGlYkXhYxLMAoRKeQXNwSWwXQ.L3gx7ycxT0v.tL0ko6PjK', 0, NULL, NULL, '2023-05-13 02:39:26', '2023-05-13 02:39:29'),
(16, 'Yardley Bentley', 'vuqek@mailinator.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 18, '$2y$10$BFwddB7End16eiKgsgzC4uteTp314RUmriZ91kRKR5T5QUr9RuOE2', 0, NULL, NULL, '2023-05-13 02:40:36', '2023-05-13 02:40:40'),
(17, 'Uriel Dominguez', 'dymefylezy@fakemail.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 19, '$2y$10$ztHYRfNcOjlOjV.oUj.HsephdLFfSNY000LTKPbM738V8MvBkfBhu', 0, NULL, NULL, '2023-05-13 02:44:28', '2023-05-13 02:44:29'),
(18, 'Nishan Paul', 'nishanpaul12011996se@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 20, '$2y$10$/seN3TWUuA0kLr4bIPX3rewypTcaFZu4cxn9qf.pD4TT1zrI6RZAy', 0, NULL, NULL, '2023-05-13 02:47:26', '2023-05-13 02:47:30'),
(19, 'hello', 'okthanks@wel.come', NULL, NULL, NULL, 'user', 1, NULL, NULL, 21, '$2y$10$gM1wVqmppZjqCOpGMzeUseBdtLg3X0FylbBrYWXk88Fiyma87arPq', 0, NULL, NULL, '2023-05-13 02:48:21', '2023-05-13 02:48:23'),
(20, 'sohag hossen', 'sohaghossen217@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '102310350908646309057', 22, '$2y$10$BnGQ2fRUwVBVyVcQ/pM0Jet8OnMm08L2yNf/yI4vVzPL9xnY/qQt.', 0, NULL, NULL, '2023-05-13 03:16:13', '2023-05-13 03:16:15'),
(21, 'Morshed Islam', 'morshedislam20@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '100641607615718279669', 23, '$2y$10$Uu7lM0fqUwoNVNbLA9.0YO79obNPVQy8M93bjYZk.5rWkelxTi96G', 0, NULL, NULL, '2023-05-13 03:18:32', '2023-05-13 03:18:34'),
(22, 'md al emran eman', 'emon199227@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 24, '$2y$10$EhvbTN.wv/0upN6ISkUFIenWwFAK9OQ7HaFs1Znti.d9Fd3h3dWWS', 0, NULL, NULL, '2023-05-13 03:34:07', '2023-05-13 03:34:10'),
(23, 'tester', 'test@test.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 25, '$2y$10$Sx2ypDXmxFs9D28UjgMSKOR9I5QfnWtcs4rej3QLsa31N6dVIpUM2', 0, NULL, NULL, '2023-05-13 03:37:09', '2023-05-13 03:37:12'),
(24, 'Creative Mind', 'hdnatok02@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '106070047087018795566', 26, '$2y$10$ZyAYoxVxMSdixhwGPmNVBeLXThWTDIQ3dSlTQfgau/uDd0Ar9gV02', 0, NULL, NULL, '2023-05-13 03:41:13', '2023-05-13 03:41:15'),
(25, 'Mohammad Repon', 'md.repon56655@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '101497292402015689061', 27, '$2y$10$zS83ZeCWLcWcokR0G47CSOla5n7iMM9xDUJdPk4B/DqMX2jKi/MoO', 0, NULL, NULL, '2023-05-13 03:43:33', '2023-05-13 03:43:46'),
(26, 'Mofazzul', 'mofazzulmd@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 28, '$2y$10$0/KzpFZzj8Ye4bCUyi1U5eMH8EJPkCr0K3usK6/5XGByPuKfYkzE6', 0, NULL, NULL, '2023-05-13 04:04:27', '2023-05-13 04:04:29'),
(27, 'MD Kashfin', 'xkashfin@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '102986867813261803781', 29, '$2y$10$nMk.SvkSRb1RhN4Mjf8e8OZCFyXSt8kjhUMW1Z1d15Vqqwn.odA7m', 0, NULL, NULL, '2023-05-13 05:01:22', '2023-05-13 05:01:24'),
(28, 'MD AKASH AHMED', 'akash.pst11@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 30, '$2y$10$HebuarwsY/2mnkvfRaW8F.1/0DjexOTrZ5KfOlzY.qf1JrFSoq4Ca', 0, NULL, NULL, '2023-05-13 05:03:50', '2023-05-13 05:03:52'),
(29, 'Tarek Greeens', 'tarekgreens20@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '114712711879632312663', 31, '$2y$10$eyZFWx23gfrcoKE8jEAdF./A3nm5Qc2K9bsmPArzqYtFL6S/6gWXC', 0, NULL, NULL, '2023-05-13 06:10:52', '2023-05-13 06:10:53'),
(30, 'Mohammad Asif', 'kmasif25@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 32, '$2y$10$mkQMp.I8onGl5NeedOpxf.Y4X9b4uW21H9Bt1UjswN.J9SYBet0.K', 0, NULL, NULL, '2023-05-13 10:27:56', '2023-05-13 10:27:58'),
(31, 'Pascale Foreman', 'jwyzbdcxmw@bugfoo.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 33, '$2y$10$Su4zJsYSD03LUMDv/lGL0u2RHcKbv/mtG4iTK.E./szATQM3QU/46', 0, NULL, NULL, '2023-05-13 12:30:05', '2023-05-13 12:30:08'),
(32, 'Md Mahbub Alam', 'mahubtuto@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '103132460540772863833', 34, '$2y$10$JYse.ovVWiIt2r81k9P9VOawMUqgI2NacDZNi3u61b6uAW3PJi9/C', 0, NULL, NULL, '2023-05-13 12:32:35', '2023-05-13 12:32:37'),
(33, 'Bx', 'bxf89881@nezid.com', NULL, NULL, NULL, 'user', 1, NULL, NULL, 35, '$2y$10$ZK2LlOWwazw6zM5YdC94Q.xot39cogXSekcBLQoxCCFZvVrCP4fyu', 0, NULL, NULL, '2023-05-13 20:06:42', '2023-05-13 20:06:47'),
(34, 'Mazharul Islam Sumon', 'miconnect94@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '109640075420014052035', 36, '$2y$10$kfk7f3UaUXDsSCyvVseEAeQv12lGveZHBOSvrxgo8/E2NR6oWzf4W', 0, NULL, NULL, '2023-05-13 21:00:00', '2023-05-13 21:00:05'),
(35, 'Solaiman Badshah', 'imnmbabor@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '117685134469161041673', 37, '$2y$10$0CXvbjOWPrmnsRHGVTuuW.I2anBJ0pa2FXdqthm8ZGdr2QAZN88C6', 0, NULL, NULL, '2023-05-14 16:24:51', '2023-05-14 16:24:57'),
(36, 'milon Mahmod', 'bd.milonmahmod@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '108407947919326343454', 38, '$2y$10$BdfNFYjU3PqAzr82cp3UHeTwwMDJ5Ae5XlmO0Y.wEp/q0uXTPflL2', 0, NULL, NULL, '2023-05-15 16:22:45', '2023-05-15 16:22:48'),
(37, 'Md. Asaduzzaman', 'asd.qtec@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '102961428911210522493', 39, '$2y$10$m2jEb26ICkq5ZiTHblTqtuZMgZ8cg12QpuQifWzkUkI8ff/SZhVbe', 1, NULL, NULL, '2023-05-17 16:19:20', '2023-05-17 16:20:32'),
(38, 'choto vaia', 'chotovaia@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '113723707540574113142', 40, '$2y$10$PiTQ2NoSv7Q6WToNViCqZOKDxGTfk5M.uioo1CMv1krX9pWcwE5Py', 0, NULL, NULL, '2023-05-20 04:38:52', '2023-05-20 04:38:54'),
(39, 'Mh Zoy', 'mhjoy547@gmail.com', NULL, NULL, NULL, 'user', 1, NULL, '113821905064025699964', 42, '$2y$10$U0xjnk3VilKxZG4SSr.Kl.JzLgxNyB73vZ0F/7e00zqVqlcnyzr2y', 0, NULL, NULL, '2023-05-24 06:49:22', '2023-05-24 06:49:24');

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
(15, 'write html sample code', NULL, 'write html sample code', '<pre class=\"pre-line\"> Sure, here is an example of basic HTML code:\r\n\r\n<code>html\r\n&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n  &lt;head&gt;\r\n    &lt;title&gt;My Website&lt;/title&gt;\r\n  &lt;/head&gt;\r\n  &lt;body&gt;\r\n    &lt;h1&gt;Welcome to my website!&lt;/h1&gt;\r\n    &lt;p&gt;This is some sample text.&lt;/p&gt;\r\n    &lt;ul&gt;\r\n      &lt;li&gt;List item 1&lt;/li&gt;\r\n      &lt;li&gt;List item 2&lt;/li&gt;\r\n      &lt;li&gt;List item 3&lt;/li&gt;\r\n    &lt;/ul&gt;\r\n  &lt;/body&gt;\r\n&lt;/html&gt;\r\n</code>\r\n\r\nIn this example, we have a basic HTML document with a title, header, and a simple list. The `&lt;!DOCTYPE html&gt;` declaration at the beginning of the document lets the web browser know that this is an HTML5 document. The `&lt;html&gt;` tag represents the root element of the page, and all other elements should be within it. The `&lt;head&gt;` section contains metadata about the document, such as the title of the page. The </pre>', NULL, 1, 'code', '2023-04-10 11:30:22', '2023-04-10 11:30:22'),
(16, 'test blog', NULL, NULL, '<br>\r\nTest blog is a great way to explore the many possibilities of technology and stay up-to-date on the latest trends. Whether you\'re a tech enthusiast or a novice, this blog will help you stay informed and on top of the ever-evolving world of technology. From the newest gadgets to the most advanced software, this blog has it all. Dive in and explore the exciting world of technology with us!', 3, 10, 'content', '2023-04-30 16:53:22', '2023-04-30 16:53:22'),
(17, NULL, NULL, NULL, '<br>\r\nAre you looking for ways to make your life easier? Have you been feeling overwhelmed lately with work and other obligations? We all have times when we need a break from the everyday stress and chaos. In this blog, I will share tips and tricks on how to simplify your life and make it more manageable. I\'ll provide practical advice on how to prioritize tasks and manage your time, as well as how to create a better work-life balance. Let\'s dive in and get started on the path to a simpler and more organized life!', 3, 6, 'content', '2023-04-30 17:20:04', '2023-04-30 17:20:04'),
(18, 'test blog', NULL, NULL, '<br>\r\nIn conclusion, testing is an important part of the development process for any project. Whether it is a blog, website, or any other type of project, testing is essential for ensuring quality, reliability, and performance. Testing can be done manually or with automated tools, but either way it is an important step in the development process.', 2, 1, 'content', '2023-05-03 23:56:34', '2023-05-03 23:56:34'),
(19, NULL, NULL, 'Went to visit Paris with friends', '<br>\r\n\"Take a break from the hustle and bustle and enjoy some well-deserved me-time!\" #selfcare #relaxation', 26, 1, 'content', '2023-05-04 18:23:39', '2023-05-04 18:23:39'),
(20, 'Nature', NULL, NULL, '<br>\r\n\"Lookin\' good, feelin\' good - time to show off my style!\"', 26, 1, 'content', '2023-05-04 19:20:57', '2023-05-04 19:20:57'),
(21, 'Nature', NULL, NULL, '<br>\r\n\"Lookin\' good, feelin\' good - time to show off my style!\"', 26, 1, 'content', '2023-05-04 19:20:58', '2023-05-04 19:20:58'),
(22, NULL, NULL, 'Went to visit Paris with friends', '<br>\r\n\"Bonjour Paris! Exploring the City of Lights with my besties - it doesn\'t get better than this 🇫🇷 #Paris #Friends #Vacation', 26, 1, 'content', '2023-05-04 19:22:35', '2023-05-04 19:22:35'),
(23, NULL, NULL, 'test', '<br>\r\n\"Testing, testing...is this thing on? Taking a break from studying to make sure I\'m up to date! #TestTime', 26, 1, 'content', '2023-05-04 19:23:34', '2023-05-04 19:23:34'),
(24, NULL, NULL, 'nature', '<br>\r\n\"Sometimes all you need is a little nature time to clear your head and reset 🌿\"', 26, 1, 'content', '2023-05-04 19:25:00', '2023-05-04 19:25:00'),
(25, NULL, NULL, 'Nature', '<br>\r\nTake a break from your day and reconnect with nature - it\'s the perfect way to refresh and reset! #nature #refresh #reset', 26, 1, 'content', '2023-05-04 19:25:57', '2023-05-04 19:25:57'),
(26, 'Qui omnis ea velit', NULL, 'Aute fugit odio sed', '(1). Q: Qui omnis ea velit?<br>\r\nKim her şeyi ister?<br>\r\nA: Dediğinizi anlamıyorum. Ne istiyorsunuz?<br>\r\n<br>\r\n<br>\r\n(2). Q: Qui omnis ea velit?<br>\r\nKim her şeyi ister?<br>\r\n<br>\r\nA: Haha, hayır! Bizim tek istediğimiz, mutlu olmak ve kendimizi gerçekten özgür hissetmek.<br>\r\n<br>\r\n<br>\r\n(3). Q: Qui omnis ea velit?<br>\r\nKim her şeyi istiyor?<br>\r\nA: Kimseye her şeyi vermek mümkün olmayabilir, ama herkesin arzuladığı şeyleri elde etmek mümkündür.<br>\r\n<br>\r\n<br>\r\n(4). Q: Qui omnis ea velit?<br>\r\nKim her şeyi ister?<br>\r\n<br>\r\nA: Ne olursa olsun, her şeyin bir fiyatı vardır. Size her şeyi isteme şansını vermemek için, fiyatınızı ödemelisiniz!<br>\r\n<br>\r\n<br>\r\n(5). Q:Qui omnis ea velit?<br>\r\nKim her şeyi ister?<br>\r\nA:Hakikaten her şeyi istemek veya arzu etmek çok güzel bir şey. Ancak, her şeyi elde etmek mümkün değil. İdeal olarak, düşündüğünüz her ş<br>\r\n<br>\r\n<br>', 19, 16, 'content', '2023-05-13 02:42:36', '2023-05-13 02:42:36'),
(27, 'Portable small fan', 'Useful in this summer. Powerful air circulation', NULL, '(1). 1. Cool off with this portable small fan! Get yours today for unbeatable comfort. <br>\r\n2. Beat the heat when you take this portable small fan on the go. Enjoy anytime, anywhere!<br>\r\n3. Get instant relief with this handy and compact portable small fan. Never be too hot again!<br>\r\n4. Take the portable small fan with you! Enjoy the power of a breeze, no matter where you are. <br>\r\n5. Take a break from the summer heat with this portable small fan – perfect for home or on the go. <br>\r\n6. Keep your cool in the heat of summer. Try this convenient and portable small fan today. <br>\r\n7. Beat the heat with this portable small fan. You\'ll be so glad you did! <br>\r\n8. Keep your cool all summer long with this portable small fan! Get yours today for unbeatable comfort.<br>\r\n<br>\r\n<br>\r\n(2). 1. Make your summer cooler with our lightweight and portable small fan - perfect for every home! <br>\r\n2. Beat the summer heat with our portable small fan - now available! <br>\r\n3. Get cool and comfortable this summer with our small and portable fan. <br>\r\n4. Get relief from those summer days with our portable fan - ideal for any home! <br>\r\n5. Stay cool and refreshed wherever you go with our compact and small fan. <br>\r\n6. Stay comfortable in the summer with our small and portable fan - ideal for all homes! <br>\r\n7. Get the perfect air-flow anywhere and anytime with our lightweight and portable small fan. <br>\r\n8. Beat the heat and stay fresh all summer long with our small fan - perfect for any home. <br>\r\n9. Keep cool wherever you go with our portable small fan - take it anywhere and stay refreshed! <br>\r\n10. Enjoy powerful cooling this summer with our lightweight and portable fan - no home should be<br>\r\n<br>\r\n<br>\r\n(3). 1. Beat the heat with our newest addition - our Portable Small Fan! Keep cool on the go with this lightweight and portable fan!<br>\r\n1. Get a burst of cool air wherever you are with our Portable Small Fan! The perfect way to stay cool no matter where you are!<br>\r\n1. Enjoy a cool breeze from your pocket with our Portable Small Fan! Small and lightweight, it\'s the perfect way to stay cool on hot days! <br>\r\n2. Keep the heat at bay with our Portable Small Fan! Enjoy a cool breeze wherever you go with this small, lightweight fan!<br>\r\n3. Get some relief from the summer heat with our Portable Small Fan! Keep cool on hot days with this convenient, lightweight fan!<br>\r\n4. Stay cool on the hottest days with our Portable Small Fan! Lightweight and portable, it\'s the perfect way to get a cool breeze on the go!<br>\r\n5. Beat the heat in style with our Portable Small Fan! Enjoy a cool breeze<br>\r\n<br>\r\n<br>', 7, 29, 'content', '2023-05-13 06:14:24', '2023-05-13 06:14:24'),
(28, 'Life of a village boy', 'Rural family, straggle life', NULL, '<br>\r\nLife of a village boy can be both fun and challenging. Growing up in a small, rural town can provide a sense of community and security that\'s hard to find in a big city. There\'s plenty of fresh air, open spaces, and the chance to experience nature in its purest form. On the other hand, there can be limited job opportunities, access to information, and other resources that city dwellers take for granted. Fortunately, village boys often have a strong work ethic and take advantage of the knowledge and skills they have. They learn to be self-reliant, resourceful, and creative in order to overcome the challenges they face. Life in a village can be difficult, but the rewards are worth it.', 10, 1, 'content', '2023-05-17 01:17:39', '2023-05-17 01:17:39');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
