-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2023 at 12:25 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webinin_wales`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `image_attribute` text COLLATE utf8_unicode_ci,
  `count` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mission_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mission_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mission_image_meta_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mission` longtext COLLATE utf8_unicode_ci NOT NULL,
  `vision_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vision_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vision_image_meta_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vision` longtext COLLATE utf8_unicode_ci NOT NULL,
  `values_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `values_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `values_image_meta_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `values` longtext COLLATE utf8_unicode_ci NOT NULL,
  `goal_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goal_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goal_image_meta_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goal` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `description`, `image`, `image_attribute`, `count`, `mission_title`, `mission_image`, `mission_image_meta_tag`, `mission`, `vision_title`, `vision_image`, `vision_image_meta_tag`, `vision`, `values_title`, `values_image`, `values_image_meta_tag`, `values`, `goal_title`, `goal_image`, `goal_image_meta_tag`, `goal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Welcome To Adline Media: <br/> Your Ideal Branding Partner', '<p>We are ultimately the top-rated event and exhibition company in Saudi Arabia, along with 360-degree marketing services. We provide disparate services like podium designing, mall activation campaigns, exhibition booth construction, display stand manufacturing, sticker printing services, advertising, experiential marketing, etc. As the leading exhibition and event company in Saudi Arabia, we have a team of professionals with good experience. They provide comprehensive services considering the actual needs of the clients.</p>\r\n<p>At ADLINE MEDIA, we are committed to delivering quality services that exceed expectations. Our approach to the customers is very unique and kind. That is why ADLINE MEDIA remains well-known all around Saudi Arabia. Customer satisfaction is our priority, and we strive to understand every need of the customers and provide personalized solutions.</p>\r\n<p>Quality is not a standard for us. It is a commitment for us. From the materials we use to the services we provide, excellence is a must in everything we do. We assure you that every service that we provide has excellent quality.&nbsp;</p>\r\n<p>Beyond everything, we consider social responsibilities and are committed to being socially responsible in everything we do.<br />As we continue to grow and evolve, we invite you to be a part of our journey. Whether you\'re a valued customer, a prospective partner, or a future team member, we welcome you to connect with us.</p>', 'uploads/about_us/image/about-us-1.jpg', 'alt=\"About-us\"', '7+', 'Our Mission', 'uploads/about_us/mission_image/mission-image-2.png', 'alt=\'Our Mission\'', '<p>Our mission is to empower positive change through relentless innovation and impressive strategies. We strive to understand the needs of the clients and make the journey of every client with a brighter future.</p>', 'Our Vision', 'uploads/about_us/vision_image/vision-image-1.png', 'alt=\'Our Vision\'', '<p>Our vision is to elevate brands across Saudi Arabia, crafting compelling identities through innovative solutions, ensuring our clients\' success in a dynamic market.</p>', 'Our Values', 'uploads/about_us/values_image/values-image.png', 'alt=\'Our Values\'', '<p>We focus on dedication, precision, and client success. We prioritise understanding every unique need, delivering top-tier services, fostering lasting partnerships in the dynamic business landscape.</p>', 'Our Goals', 'uploads/about_us/goal_image/goal-image.png', 'alt=\'Our Goals\'', '<p>As a leading event and exhibition company with 360-degree marketing services in Saudi Arabia, we handle everything from events and advertising to printing and marketing. Our goal is simple, to make your brand vision come to life with creativity, precision, and a sense of wonder.</p>', '2023-02-12 15:28:37', '2023-11-28 00:47:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `token` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone_number`, `email`, `username`, `password`, `profile_image`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '919656141830', 'projects@pentacodes.com', 'admin', '$2y$10$xktdrky6XYc63wdufvOZOuQuUu2QoJiDRzcAIjoZgqZ9Un5qw/g.G', NULL, 'Active', NULL, '2021-01-29 05:01:24', '2023-11-20 10:36:46'),
(6, 'Test Penta', '919656141830', 'penta@gmail.com', 'Penta', '$2y$10$.1bs.q9Er5d/OkCKD2BTt.x8BjhAlkQPmAyQzffqoe18wWETdlVoS', NULL, 'Active', NULL, '2023-11-20 10:48:14', '2023-11-20 10:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `type` enum('About','Portfolio','Blog','Contact','Privacy','Terms') NOT NULL DEFAULT 'About',
  `title` text NOT NULL,
  `banner` varchar(255) NOT NULL,
  `banner_meta_tag` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `type`, `title`, `banner`, `banner_meta_tag`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'About', 'About us', 'uploads/banner/about/banner/about.jpg', 'alt=\"Adline Media\"', 'Active', '2023-11-06 06:44:39', '2023-11-06 06:44:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image_meta_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `posted_date` date NOT NULL,
  `list_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `banner` text COLLATE utf8_unicode_ci,
  `banner_attribute` text COLLATE utf8_unicode_ci,
  `meta_title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keyword` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `other_meta_tag` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `short_url`, `image`, `image_meta_tag`, `description`, `posted_date`, `list_description`, `banner`, `banner_attribute`, `meta_title`, `meta_description`, `meta_keyword`, `other_meta_tag`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Exploring the Latest Trends in the Exhibition Industry', 'exploring-the-latest-trends-in-the-exhibition-industry', 'uploads/blog/image/blog-2.png', 'alt=\"Tech Master\"', '<h1><strong>Exploring the Latest Trends in the Exhibition Industry</strong></h1>\r\n<p>The exhibition industry has undergone a significant transformation in recent years. With advancements in technology, changing consumer preferences, and evolving marketing strategies, the world of exhibitions remains a promising marketing strategy. Let\'s delve into the latest trends shaping the exhibition industry in 2023.</p>\r\n<h2><strong>Emphasising Excellence Over Quantity</strong></h2>\r\n<p>Exhibitors and organisers are shifting their focus from sheer numbers to the depth of engagement and value exchanged in exhibitions. This approach prioritises meaningful connections over superficial interactions, resulting in more engaging, memorable experiences for attendees. Exhibitors invest in booth designs, content, and interactions that leave a lasting impact.&nbsp;</p>\r\n<h3><span style=\"font-size: 14pt;\"><strong>Virtual and Hybrid Exhibitions</strong></span></h3>\r\n<p>The COVID-19 pandemic accelerated the adoption of virtual and hybrid exhibitions. While in-person events remain essential, the digital space has proven to be a valuable alternative. Virtual and hybrid exhibitions offer the convenience of attending events from anywhere in the world. This trend is expected to continue, providing organisers and exhibitors a broader reach.</p>\r\n<h3><span style=\"font-size: 14pt;\"><strong>Sustainability and Eco-Friendly Exhibitions</strong></span></h3>\r\n<p>Sustainability has become a focal point in the exhibition industry. Exhibitors are increasingly conscious of their environmental impact and are seeking ways to reduce waste and energy consumption. Sustainable booth designs, eco-friendly materials, and recycling initiatives are rising, reflecting a commitment to responsible event management.</p>\r\n<h4><strong><span style=\"font-size: 14pt;\">Immersive Technologies</span></strong></h4>\r\n<p>Immersive technologies, such as augmented reality (AR) and virtual reality (VR), are changing how people engage with exhibitions. These technologies allow attendees to explore products and experiences more interactively and engagingly. Exhibitors are leveraging AR and VR to create memorable and immersive experiences, enhancing attendee engagement.</p>\r\n<h4><br /><span style=\"font-size: 14pt;\"><strong>Data-Driven Decision-Making</strong></span></h4>\r\n<p>Data analytics and AI-driven insights play a crucial role in the exhibition industry. Organisers use data to understand attendee behaviour, preferences, and engagement levels. This data-driven approach helps in making informed decisions and customising the exhibition experience to meet the needs and expectations of attendees.</p>\r\n<h5><br /><span style=\"font-size: 14pt;\"><strong>Personalisation and Customisation</strong></span></h5>\r\n<p>Exhibitors are increasingly focusing on personalising their offerings to cater to specific audience segments. This trend includes tailoring marketing materials, product demonstrations, and interactions to individual preferences. Personalisation enhances attendee engagement and creates a more memorable experience.</p>\r\n<h4><br /><span style=\"font-size: 14pt;\"><strong>Contactless and Digital Solutions</strong></span></h4>\r\n<p>The need for contactless interactions has accelerated the adoption of digital solutions. From contactless registration and ticketing to mobile apps for navigation and networking, event organisers are integrating technology to minimise physical contact, providing a safer and more convenient experience.</p>\r\n<h3><span style=\"font-size: 14pt;\"><strong>Content-Driven Exhibitions</strong></span></h3>\r\n<p>Content has become a significant driver of exhibition success. Exhibitors are investing in high-quality, informative content to attract and engage attendees. This includes expert panels, workshops, keynote speakers, and interactive sessions that add value to the exhibition experience.</p>\r\n<h3><br /><span style=\"font-size: 14pt;\"><strong>Niche and Specialised Exhibitions</strong></span></h3>\r\n<p>Niche and specialised exhibitions are gaining popularity. These events cater to specific industries, interests, or communities, allowing for a more targeted and focused experience. This trend is reflective of the growing demand for highly relevant and specialised content.</p>\r\n<p><br />The exhibition industry is evolving to meet the changing needs and expectations of attendees and exhibitors. To stay competitive and relevant, industry professionals like ADLINE MEDIA constantly adapt to these trends and harness the power of innovation and technology. Contact us to create exhibitions that embrace these trends. Let\'s make more engaging, memorable, and successful exhibitions together.</p>', '2023-10-24', '<p>The exhibition industry has undergone a significant transformation in recent years. With advancements in technology, changing consumer preferences, and evolving marketing strategies, the world of exhibitions remains a promising marketing strategy. Let\'s delve into the latest trends shaping the exhibition industry in 2023.</p>', 'uploads/blog/banner/blog.jpg', 'alt=\"Eco Plus\"', 'Exploring the Latest Trends in the Exhibition Industry-Adline Media', 'The exhibition industry is evolving to meet the changing needs and expectations of attendees and exhibitors.', 'Adline', '<meta name=\"other meta\">', 'Active', NULL, '2022-05-27 23:50:16', '2023-11-27 06:51:12'),
(2, 'The Necessary Factors Businesses Should Consider For Excellent Visibility In Signage Designing', 'factors-consider-for-excellent-visibility-in-signage-designing', 'uploads/blog/image/blog-3.png', 'alt=\"signages\"', '<h1><strong>The Necessary Factors Businesses Should Consider For Excellent Visibility In Signage Designing</strong></h1>\r\n<p>In today\'s competitive business landscape, attracting customer&rsquo;s attention and making a lasting impression is crucial for success. One powerful tool that businesses use to achieve this is custom signage. Custom signage not only conveys your brand identity but also serves as a silent salesperson, drawing potential customers to your establishment. It\'s important to consider some factors in the signage design process.&nbsp;</p>\r\n<h3><span style=\"font-size: 14pt;\"><strong>Location And Placement</strong></span></h3>\r\n<p>The first consideration for custom signage design is its location and placement. The effectiveness of your signage depends on the position. We should think about whether it will be indoors or outdoors, at eye level or overhead, near a road, or in a shopping center. Understanding the environment and the eye-catching point of your target audience is crucial to determining the best location and placement for your signage.</p>\r\n<h3><span style=\"font-size: 14pt;\"><strong>Size And Scale</strong></span></h3>\r\n<p>The size of the signage matters significantly. A sign that is too small might go unnoticed, while one that is too large may overwhelm the viewer. It\'s essential to strike the right balance to ensure optimal visibility. Consider the viewing distance and how it fits into the surrounding architecture or landscape.</p>\r\n<h2><span style=\"font-size: 14pt;\"><strong>Branding And Messaging</strong></span></h2>\r\n<p>Custom signage design is an extension of your brand, and it should be consistent with your overall branding strategy. The colors, fonts, and logo used in your signage should align with your brand identity. Your messaging should also be in line with your business objectives and be clear and concise. People frequently only have a few seconds to process the information on your sign, so make it count.</p>\r\n<h3><span style=\"font-size: 14pt;\"><strong>Visibility Under All Circumstances&nbsp;</strong></span></h3>\r\n<p>Your signage design should stand out in all lighting conditions and weather. It may involve using appropriate lighting, such as LED or neon signs, and considering how it will look in direct sunlight, rain, or even snow. High-contrast colors and bright signage are crucial for maintaining visibility around the clock.</p>\r\n<h4><br /><strong><span style=\"font-size: 14pt;\">Precise Material And Durability</span></strong></h4>\r\n<p>Selecting the precise materials for the custom signage is essential for ensuring longevity and impact. Weather-resistant materials like aluminum, acrylic, or vinyl are perfect for outdoor signage. Consider the local climate and potential wear and tear to choose materials that will withstand the elements and remain visually appealing.</p>\r\n<h4><br /><span style=\"font-size: 14pt;\"><strong>Typography And Readability</strong></span></h4>\r\n<p>The choice of fonts and the typography of the signage design can affect its readability. Use legible fonts and ensure that the text is in actual size. Avoid overly complex or decorative fonts that may be difficult to read from a distance. Test the readability of the signage from various distances and angles to ensure understandability.</p>\r\n<h2><span style=\"font-size: 14pt;\"><strong>Signage Regulations</strong></span></h2>\r\n<p>Before finalizing your custom signage design, it\'s vital to research and comply with local signage regulations and zoning laws. There may be restrictions on size, illumination, and placement. If you are unaware of these regulations, it leads to paying fines and removal of your signage.</p>\r\n<h3><span style=\"font-size: 14pt;\"><strong>Professionalism In Signage Design And Printing</strong></span></h3>\r\n<p>Investing in professional graphic design and printing services can make a significant difference in the quality and impact of your custom signage. Experienced designers understand the nuances of creating signage that is visually striking and effective, while professional printers can ensure the highest quality output.</p>\r\n<p>Designing custom signage for optimal visibility and impact requires careful consideration of various factors, from location and size to branding, durability, and readability. At ADLINE MEDIA, we design custom signage to attract and engage the target audience.&nbsp;</p>\r\n<p>When executed effectively, it can help set your business apart from the competition. By paying attention to these crucial elements, you can create custom signage that leaves a lasting impression and drives success for your business.</p>', '2023-11-24', '<p>In today\'s competitive business landscape, attracting customer&rsquo;s attention and making a lasting impression is crucial for success. One powerful tool that businesses use to achieve this is custom signage. Custom signage not only conveys your brand identity but also serves as a silent salesperson, drawing potential customers to your establishment. It\'s important to consider some factors in the signage design process.</p>', NULL, 'alt=\"Tech Master\"', 'The Necessary Factors Businesses Should Consider For Excellent Visibility In Signage Designing', 'Designing custom signage for optimal visibility and impact requires careful consideration of various factors, from location and size to branding, durability, and readability. At ADLINE MEDIA, we design custom signage to attract and engage the target audience. ', '', '', 'Active', NULL, '2022-05-27 23:53:21', '2023-12-05 03:28:34'),
(3, 'Where does it come from?', 'where-does-it-come-from', NULL, 'alt=\"Tech Master\"', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '2022-05-30', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text</p>', NULL, 'alt=\"Tech Master\"', '', '', '', '', 'Inactive', NULL, '2022-05-28 04:28:14', '2023-11-23 23:41:09'),
(4, 'Where can I get some?', 'where-can-i-get-some', NULL, 'alt=\"Tech Master\"', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2022-05-30', '<p>There are many variations of passages of Lorem Ipsum available,</p>', NULL, 'alt=\"Tech Master\"', '', '', '', '', 'Inactive', NULL, '2022-05-28 04:29:23', '2023-11-23 23:41:09'),
(5, 'The standard Lorem Ipsum passage, used since the 1500s', 'the-standard-lorem-ipsum-passage-used-since-the-1500s', NULL, 'alt=\"Tech Master\"', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '2022-05-30', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>', NULL, 'alt=\"Tech Master\"', '', '', '', '', 'Inactive', NULL, '2022-05-28 04:31:10', '2023-11-23 23:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_meta_tag` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `title`, `image`, `image_meta_tag`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'STC', 'uploads/client/image/client-1.png', 'alt=\"STC\"', 'Active', '2023-02-12 15:28:38', '2023-11-27 12:39:24', NULL),
(2, 'NOON', 'uploads/client/image/client-2.png', 'alt=\"noon\"', 'Active', '2023-02-12 15:28:38', '2023-11-27 12:39:44', NULL),
(3, 'HUNGER STATION', 'uploads/client/image/client-3.png', 'alt=\"HUNGER STATION\"', 'Active', '2023-02-12 15:28:38', '2023-11-27 12:40:15', NULL),
(4, '3M', 'uploads/client/image/client-4.png', 'alt=\"3M\"', 'Active', '2023-02-12 15:28:38', '2023-11-27 12:40:30', NULL),
(5, 'SAUDI ARAMCO', 'uploads/client/image/client-7.png', 'alt=\"SAUDI ARAMCO\"', 'Active', '2023-02-12 15:28:38', '2023-11-27 12:52:36', NULL),
(6, 'Client-06', 'uploads/client/image/client-06.png', 'alt=\"Tech Master\"', 'Active', '2023-02-12 15:28:38', '2023-11-04 06:38:49', '2023-11-04 06:38:49'),
(7, 'ITHRA', 'uploads/client/image/client-8.png', 'alt=\"ITHRA\"', 'Active', '2023-11-27 12:53:18', '2023-11-27 12:53:18', NULL),
(8, 'Neom', 'uploads/client/image/client-9.png', 'alt=\"Neom\"', 'Active', '2023-11-27 12:53:39', '2023-11-27 12:53:39', NULL),
(9, 'Saudi Electricity', 'uploads/client/image/client-10.png', 'alt=\"Saudi Electricity\"', 'Active', '2023-11-27 12:54:05', '2023-11-27 12:54:05', NULL),
(10, 'Sabic', 'uploads/client/image/client-11.png', 'alt=\"Sabic\"', 'Active', '2023-11-27 12:54:24', '2023-11-27 12:54:24', NULL),
(11, 'Sa talke', 'uploads/client/image/client-12.png', 'alt=\"Sa talke\"', 'Active', '2023-11-27 12:54:41', '2023-11-27 12:54:41', NULL),
(12, 'Samyang', 'uploads/client/image/client-13.png', 'alt=\"Samyang\"', 'Active', '2023-11-27 12:55:04', '2023-11-27 12:55:04', NULL),
(13, 'ABB', 'uploads/client/image/client-14.png', 'alt=\"ABB\"', 'Active', '2023-11-28 04:38:30', '2023-11-28 04:38:30', NULL),
(14, 'Riyad Season', 'uploads/client/image/client-15.png', 'alt=\"Riyad Season\"', 'Active', '2023-11-28 04:39:00', '2023-11-28 04:39:00', NULL),
(15, 'Amazon', 'uploads/client/image/client-16.png', 'alt=\"Amazon\"', 'Active', '2023-11-28 04:39:22', '2023-11-28 04:39:22', NULL),
(16, 'Disney+', 'uploads/client/image/client-17.png', 'alt=\"Disney+\"', 'Active', '2023-11-28 04:39:56', '2023-11-28 04:39:56', NULL),
(17, 'Flynas', 'uploads/client/image/client-18.png', 'alt=\"Flynas\"', 'Active', '2023-11-28 04:40:21', '2023-11-28 04:40:21', NULL),
(18, 'Alula', 'uploads/client/image/client-19.png', 'alt=\"Alula\"', 'Active', '2023-11-28 04:40:39', '2023-11-28 04:40:39', NULL),
(19, 'Petro Rabigh', 'uploads/client/image/client-20.png', 'alt=\"Petro Rabigh\"', 'Active', '2023-11-28 04:41:51', '2023-11-28 04:41:51', NULL),
(20, 'Lenovo', 'uploads/client/image/client-21.png', 'alt=\"Lenovo\"', 'Active', '2023-11-28 04:42:23', '2023-11-28 04:42:23', NULL),
(21, 'Maaden', 'uploads/client/image/client-22.png', 'alt=\"Maaden\"', 'Active', '2023-11-28 04:42:50', '2023-11-28 04:42:50', NULL),
(22, 'MBC Group', 'uploads/client/image/client-23.png', 'alt=\"MBC Group\"', 'Active', '2023-11-28 04:43:17', '2023-11-28 04:43:17', NULL),
(23, 'WWE', 'uploads/client/image/client-24.png', 'alt=\"WWE\"', 'Active', '2023-11-28 04:44:12', '2023-11-28 04:44:12', NULL),
(24, 'Ministry of Health', 'uploads/client/image/client-25.png', 'alt=\"Ministry of Health\"', 'Active', '2023-11-28 04:45:02', '2023-11-28 04:45:02', NULL),
(25, 'Apple', 'uploads/client/image/client-26.png', 'alt=\"Apple\"', 'Active', '2023-11-28 04:45:35', '2023-11-28 04:45:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `email_recepient` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `google_map` text,
  `facebook_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `contact_form_title` varchar(255) DEFAULT NULL,
  `terms_conditions` longtext,
  `privacy_policy` longtext,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email_id`, `email_recepient`, `whatsapp_number`, `phone_number`, `google_map`, `facebook_url`, `instagram_url`, `twitter_url`, `linkedin_url`, `contact_form_title`, `terms_conditions`, `privacy_policy`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'info@adlinemedia.me', 'Adline Media', '+966 540326022', '+966 540326022', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.194046393334!2d50.18503387541597!3d26.222883777065068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49c3d4af68be7f%3A0xa4e7af1d5b0a57f4!2sAdline%20Media%20Exhibitions%20Company!5e0!3m2!1sen!2sin!4v1700204624447!5m2!1sen!2sin', 'https://www.facebook.com/adlinemediasaudi/', 'https://instagram.com/adlinemedia.me?igshid=MWZjMTM2ODFkZg==', '', 'https://www.linkedin.com/company/adlinemedia/', 'Get Support from our Team', '<p><span data-sheets-root=\"1\" data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;By using the website of AD LINE MEDIA, you are committed to agreeing to the terms and conditions. Website users must lawfully use the website. All content on the website, including text, graphics, and logos, is the property of AD LINE MEDIA. Users may not use or distribute without permission. AD LINE MEDIA is not liable for any direct, indirect, or consequential damages arising from the use of our website. \\n\\nWe have the right to terminate the access for those who violate these terms and conditions.\\n&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:957,&quot;3&quot;:{&quot;1&quot;:0},&quot;5&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;6&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;7&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;8&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0}\">By using the website of ADLINE MEDIA, you are committed to agreeing to the terms and conditions. Website users must lawfully use the website. All content on the website, including text, graphics, and logos, is the property of ADLINE MEDIA. Users may not use or distribute without permission. ADLINE MEDIA is not liable for any direct, indirect, or consequential damages arising from the use of our website. <br /><br />We have the right to terminate the access for those who violate these terms and conditions.<br /></span></p>', '<p>ADLINE MEDIA is committed to protecting the privacy and integrity of your personal information. Our Privacy Policy is to gather, use, and protect your data when you engage with our events, exhibitions, and related services.&nbsp;</p>\r\n<p>At ADLINE MEDIA, we may collect your personal information, including name, contact information, work title, etc., by our Privacy Policy. We also collect non-personal information such as browser type, IP address, and device information for analytics and improving our services.</p>', '2023-02-12 15:28:38', '2023-11-24 09:59:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_form_requests`
--

CREATE TABLE `contact_form_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `replay` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `replay_date` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_form_requests`
--

INSERT INTO `contact_form_requests` (`id`, `name`, `email`, `phone`, `comments`, `replay`, `replay_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@mail.com', '234567890', 'test message', NULL, NULL, '2023-11-10 05:10:04', '2023-11-10 05:08:58', '2023-11-10 05:10:04'),
(2, 'test', 'test@mail.com', '234567890', 'test message', NULL, NULL, '2023-11-10 05:09:54', '2023-11-10 05:09:39', '2023-11-10 05:09:54'),
(3, 'Jobin', 'Jobin@pentacodes.in', '12345667', 'Test', NULL, NULL, '2023-11-20 10:58:42', '2023-11-20 10:58:17', '2023-11-20 10:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `extra_tags`
--

CREATE TABLE `extra_tags` (
  `id` int(11) NOT NULL,
  `header_tag` text NOT NULL,
  `footer_tag` text NOT NULL,
  `body_tag` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_tags`
--

INSERT INTO `extra_tags` (`id`, `header_tag`, `footer_tag`, `body_tag`, `created_at`, `updated_at`) VALUES
(1, '<meta name=\"robots\" content=\"noindex, nofollow\">', '', '', '2023-11-16 08:59:37', '2023-11-27 10:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `get_quotes`
--

CREATE TABLE `get_quotes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reply` longtext COLLATE utf8_unicode_ci,
  `reply_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `get_quotes`
--

INSERT INTO `get_quotes` (`id`, `name`, `email`, `phone`, `company`, `city`, `subject`, `message`, `reply`, `reply_date`, `created_at`, `updated_at`) VALUES
(4, 'test', 'test@gmail.com', '7137183828', 'abc', 'alkobbar', 'test', 'test', NULL, NULL, '2023-12-06 07:49:41', '2023-12-06 07:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_meta_tag` text NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `title`, `sub_title`, `image`, `image_meta_tag`, `sort_order`, `button_text`, `button_url`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'OUR IMPRESSIVE<br/> BRAND ACTIVATION', 'As a brand activation agency, we have exceptional marketing strategies to promote your brand to new heights and create positive connections with your target audience.', 'uploads/home/slider/image/home-slider.jpg', 'alt=\"Adline Media\"', 1, 'Contact Us', '/contact-us', 'Active', '2023-10-30 02:00:55', '2023-11-22 06:11:49', NULL),
(4, 'EXCELLENCE IN <br/>EXHIBITION', 'We showcase excellent exhibition booth designs and stands to publicize your brand to the audience. Our excellence in exhibition booth manufacturing remains the best in Saudi Arabia.', 'uploads/home/slider/image/home-slider-1.png', 'alt=\"EXHIBITION\"', 2, 'Contact Us', 'service/exhibition', 'Active', '2023-11-05 10:23:22', '2023-11-24 04:55:39', NULL),
(5, 'ARTISTRY IN OUR <br/>DISPLAY STANDS', 'We design well-structured display stands to promote and showcase your brand’s product. Our product display stands are in various sizes, designs, shapes, and materials catering to your needs.', 'uploads/home/slider/image/home-slider-2.png', 'alt=\"display-satnds-banner\"', 3, 'Contact us', 'service/display-stands', 'Active', '2023-11-22 06:29:28', '2023-11-24 05:04:38', NULL),
(6, 'PERFECTLY CRAFTED<br/> PREMIUM PODIUMS', 'We make premium podiums perfectly and precisely. Our podium designs are very modernistic and unique in look.', 'uploads/home/slider/image/home-slider-3.png', 'alt=\" PREMIUM PODIUMS\"', 4, 'Contact us', 'service/premium-podiums', 'Active', '2023-11-22 06:31:04', '2023-11-24 05:10:02', NULL),
(7, 'CUSTOMIZED <br/>CORPORATE GIFTS', 'We design customized corporate gifts in Saudi Arabia with excellent quality. Our corporate gifts express gratitude and strengthen relationships very authentically.', 'uploads/home/slider/image/home-slider-4.png', 'alt=\"CORPORATE GIFTS\"', 5, 'Contact us', 'service/corporate-gifts', 'Active', '2023-11-22 06:32:20', '2023-11-24 05:14:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `key_features`
--

CREATE TABLE `key_features` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `count` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `key_features`
--

INSERT INTO `key_features` (`id`, `title`, `created_at`, `updated_at`, `count`, `image`, `image_attribute`, `sort_order`, `status`) VALUES
(1, 'Clients', '2023-02-12 15:28:38', '2023-11-23 07:25:36', '60+', 'uploads/key_feature/image/keyfeature-1.jpg', '', 3, 'Active'),
(2, 'Projects', '2023-02-12 15:28:38', '2023-11-27 06:46:21', '1000+', 'uploads/key_feature/image/keyfeature-2.png', '', 2, 'Active'),
(3, 'Countries', '2023-02-12 15:28:38', '2023-11-27 06:47:22', '3', 'uploads/key_feature/image/keyfeature-3.png', '', 4, 'Active'),
(4, 'Experience', '2023-02-12 15:28:38', '2023-11-23 07:25:19', '7+', 'uploads/key_feature/image/keyfeature-4.jpg', '', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `meta_tags`
--

CREATE TABLE `meta_tags` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keyword` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `other_meta_tag` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meta_tags`
--

INSERT INTO `meta_tags` (`id`, `page_name`, `meta_title`, `meta_description`, `meta_keyword`, `other_meta_tag`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'Home Meta Tag', 'Home Meta Description', 'Home Meta Keyword', '<meta name=\"other meta tag\">', '2022-05-27 23:13:47', '2022-05-27 23:13:47'),
(2, 'Contact', 'Contact us', '', '', '', '2023-11-17 01:42:40', '2023-11-17 01:43:14'),
(3, 'About', 'About Us', 'ADLINE MEDIA is well established in Saudi Arabia as one of the growing independent event and exhibition company along with 360 -degree marketing services.', '', '', '2023-11-23 00:33:46', '2023-11-23 00:34:18'),
(4, 'Portfolio', 'Portfolio', 'Business Portfolio', '', '', '2023-12-05 03:45:39', '2023-12-05 03:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `office_address`
--

CREATE TABLE `office_address` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `office_address`
--

INSERT INTO `office_address` (`id`, `title`, `mobile`, `address`, `status`, `sort_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Landon', 'info@markinternational.com, sales@markinternational.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.388422071134!2d-0.09471160660111023!3d51.52443523679846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761ca8b325619b%3A0x8dee6cc6a4ae7e8!2s49%20Featherstone%20St%2C%20London%20EC1Y%208SL%2C%20UK!5e0!3m2!1sen!2sae!4v1691145585819!5m2!1sen!2sae', 'Inactive', 1, '2022-09-04 21:49:08', '2023-11-06 01:51:27', '2023-11-06 01:51:27'),
(2, 'Saudi Arabia', '+966 540326022', 'Building # 6946, Al Taawun Dist, Al Sakhaa Street 34632, Alkhobar, KSA', 'Active', 1, '2022-09-04 21:53:12', '2023-11-27 06:43:07', NULL),
(3, 'Bahrine', '+973 33418630', 'Office : 1446 Building # 470,\r\nSanabis, Bahrian', 'Active', 2, '2022-09-04 21:59:32', '2023-11-27 06:24:01', NULL),
(4, 'India', '+91 9037151516', 'Palm arcade\r\nKerala , India , 682021', 'Active', 3, '2023-08-31 11:53:29', '2023-11-27 06:43:10', NULL),
(5, 'Test', '123555', '123333', 'Active', 5, '2023-11-20 10:56:10', '2023-11-20 10:56:36', '2023-11-20 10:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `our_client_headings`
--

CREATE TABLE `our_client_headings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `our_client_headings`
--

INSERT INTO `our_client_headings` (`id`, `title`, `sub_title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Together We Work, Stronger We Achieve', 'Our Partners', '<p><span data-sheets-root=\"1\" data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;We are glad to work with these outstanding partners and believe in the power of collaboration. We strive to achieve more together and hope that our hard work and trust make us conquer different heights.\\r&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:959,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16776960},&quot;5&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;6&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;7&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;8&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0}\">We are glad to work with these outstanding partners and believe in the power of collaboration. We strive to achieve more together and hope that our hard work and trust make us conquer different heights. </span></p>', '2023-11-05 22:00:31', '2023-11-27 06:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `our_teams`
--

CREATE TABLE `our_teams` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `our_teams`
--

INSERT INTO `our_teams` (`id`, `title`, `designation`, `image`, `image_attribute`, `sort_order`, `status`, `created_at`, `updated_at`, `count`) VALUES
(1, 'James Anderson', 'CEO', 'uploads/our-team/list/image/list.jpg', '', 1, 'Active', '2023-02-12 15:28:38', '2023-11-05 22:22:55', 0),
(2, 'Flintoff', 'MD', '', '', 2, 'Active', '2023-02-12 15:28:38', '2023-11-05 22:17:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `our_team_headings`
--

CREATE TABLE `our_team_headings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `our_team_headings`
--

INSERT INTO `our_team_headings` (`id`, `title`, `sub_title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Meet the Faces Behind Ad Line Media', 'Our Team', '<p><span data-sheets-root=\"1\" data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;\\nOur Team\\nComprising dedicated professionals with a passion for creativity and innovation, we work seamlessly to bring your brand vision to life. Get to know the faces behind Ad Line Media and discover the people who make your brand shine!&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:959,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16776960},&quot;5&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;6&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;7&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;8&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0}\">Comprising dedicated professionals with a passion for creativity and innovation, we work seamlessly to bring your brand vision to life. Get to know the faces behind Ad Line Media and discover the people who make your brand shine!</span></p>', '2023-11-05 22:00:31', '2023-11-27 06:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attendees` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `category_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `display_to_home` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other_meta_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `short_url`, `location`, `type`, `attendees`, `description`, `status`, `category_id`, `display_to_home`, `banner`, `banner_attribute`, `sort_order`, `meta_title`, `meta_keyword`, `meta_description`, `other_meta_tag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DMG- Big 5 Constructions Saudi Arabia', 'dmg-big-5-constructions-saudi-arabia', 'Saudi Arabia', 'Exhibition', '15000+', '<p>Big 5 Constructions Saudi Arabia</p>', 'Active', '9', 'Yes', 'uploads/portfolio/banner/dmg-big-5-constructions-saudi-arabia.png', 'alt=\"Adline Media\"', 1, 'DMG- Big 5 Constructions Saudi Arabia', '', 'DMG- Big 5 Constructions Saudi Arabia', '', '2023-11-04 09:10:43', '2023-12-05 03:26:15', NULL),
(2, 'Riyadh Boulevard', 'riyadh-boulevard', 'Riyad', 'Festival', '400K+', '<p>Ceremony Riyadh Boulevard world</p>', 'Active', '9', 'Yes', 'uploads/portfolio/banner/riyadh-boulevard.png', 'alt=\"Adline Media\"', 2, 'Riyadh Boulevard-Ceremony Riyadh Boulevard world', '', 'Riyadh Boulevard-Ceremony Riyadh Boulevard world', '', '2023-11-06 00:49:07', '2023-12-05 03:31:03', NULL),
(7, 'Euro Money', 'euro-money', 'Saudi Arabia', 'Conference', '300+', '<p>THE INSTITUTIONALISATION OF INVESTMENT AND FINANCE</p>', 'Active', '9', 'Yes', 'uploads/portfolio/banner/euro-money.png', 'alt=\"Adline Media\"', 3, 'Euro Money - THE INSTITUTIONALISATION OF INVESTMENT AND FINANCE', '', 'Euro Money - THE INSTITUTIONALISATION OF INVESTMENT AND FINANCE', '', '2023-12-05 01:08:58', '2023-12-05 03:31:20', NULL),
(8, 'Saudi Aramco', 'saudi-aramco', 'Saudi Arabia', 'Conference', '200+', '<p>HR &amp; CS Award Ceremony</p>', 'Active', '9', 'Yes', 'uploads/portfolio/banner/saudi-aramco.png', 'alt=\"Adline Media\"', 4, 'HR & CS Award Ceremony - Saudi Aramco', '', 'HR & CS Award Ceremony - Saudi Aramco', '', '2023-12-05 01:19:24', '2023-12-05 03:31:44', NULL),
(9, 'Ministry of Education', 'ministry-of-education', 'Saudi Arabia', 'Conference', '300+', '<p>The International conference and exhibition for education</p>', 'Active', '9', 'Yes', 'uploads/portfolio/banner/ministry-of-education.png', 'alt=\"Adline Media\"', 5, 'Ministry of Education - International conference and exhibition for education', '', 'Ministry of Education - International conference and exhibition for education', '', '2023-12-05 01:27:45', '2023-12-05 03:32:06', NULL),
(10, 'Ministry of Energy', 'ministry-of-energy', 'Saudi Arabia', 'Conference', '700K+', '<p>International conference and exhibition for science</p>', 'Active', '9', 'Yes', 'uploads/portfolio/banner/ministry-of-energy.png', 'alt=\"Adline Media\"', 6, 'Ministry of Energy - International conference and exhibition for science', '', 'Ministry of Energy - International conference and exhibition for science', '', '2023-12-05 01:35:55', '2023-12-05 03:32:23', NULL),
(11, 'Loud MBC FM Launch', 'loud-mbc-fm-launch', 'Saudi Arabia', 'Ceremony Launch', '800+', '<p>MBC - Loud MBC FM Ceremony Launch</p>', 'Active', '9', 'Yes', 'uploads/portfolio/banner/loud-mbc-fm-launch.png', 'alt=\"Adline Media\"', 7, 'MBC - Loud MBC FM Ceremony Launch', '', 'MBC - Loud MBC FM Ceremony Launch', '', '2023-12-05 01:48:36', '2023-12-05 03:32:41', NULL),
(12, 'MDLBEAST', 'mdlbeast', 'Riyad', 'Music Festival', '700K+', '<p>The Region\'s Biggest &amp; Loudest Music Festival - MDLBEAST</p>', 'Active', '9', 'Yes', 'uploads/portfolio/banner/mdlbeast.png', 'alt=\"Adline Media\"', 8, 'The Region\'s Biggest & Loudest Music Festival - MDLBEAST', '', 'The Region\'s Biggest & Loudest Music Festival - MDLBEAST', '', '2023-12-05 01:53:50', '2023-12-05 03:32:55', NULL),
(13, 'Netflix', 'netflix', 'Saudi Arabia', 'Engagement Camapign', '8K+', '<p>Nurture young talents in Saudi arabia</p>', 'Active', '9', 'Yes', 'uploads/portfolio/banner/netflix.png', 'alt=\"Adline Media\"', 9, 'Netflix - Nurture young talents in Saudi Arabia', '', 'Netflix - Nurture young talents in Saudi Arabia', '', '2023-12-05 01:59:50', '2023-12-05 03:33:06', NULL),
(14, 'Red Sea Film Festival', 'red-sea-film-festival', 'Saudi Arabia', 'Film Festival', '30000+', '<p>The Region\'s Biggest Film Festival</p>', 'Active', '9', 'Yes', 'uploads/portfolio/banner/red-sea-film-festival.png', 'alt=\"Adline Media\"', 10, 'The Region\'s Biggest Red Film Festival', '', 'The Region\'s Biggest Red Film Festival', '', '2023-12-05 02:42:58', '2023-12-05 03:33:43', NULL),
(15, 'Saudi Global Ports', 'saudi-global-ports', 'Saudi Arabia', 'Ceremony', '65K+', '<p>Saudi Global Ports</p>', 'Active', '9', 'Yes', 'uploads/portfolio/banner/saudi-global-ports.png', 'alt=\"Adline Media\"', 11, 'Saudi Global Ports', '', 'Saudi Global Ports', '', '2023-12-05 02:54:27', '2023-12-05 03:34:53', NULL),
(16, 'Crown Jewel WWE', 'crown-jewel-wwe', 'Riyad, Saudi Arabia', 'Competition', '35K+', '<p>King and queen of the ring- Crown Jewel WWE</p>', 'Active', '9', 'Yes', 'uploads/portfolio/banner/crown-jewel-wwe.png', 'alt=\"Adline Media\"', 12, 'King and queen of the ring- Crown Jewel WWE', '', 'King and queen of the ring- Crown Jewel WWE', '', '2023-12-05 03:00:40', '2023-12-05 03:36:03', NULL),
(17, 'Zahra Association', 'zahra-association', 'Saudi Arabia', 'Awareness Campaign', '20K+', '<p>Pink Finger Prints - Zahra Association</p>', 'Active', '9', 'Yes', 'uploads/portfolio/banner/zahra-association.png', 'alt=\"Adline Media\"', 13, 'Pink Finger Prints - Zahra Association ', '', 'Pink Finger Prints - Zahra Association ', '', '2023-12-05 03:09:16', '2023-12-05 03:36:30', NULL),
(19, 'Alfanar', 'alfanar', 'Saudi Arabia', 'Exhibitions', '10K+', '', 'Active', '2', 'Yes', NULL, 'alt=\"Adline Media\"', 14, 'Alfanar', '', 'Alfanar - Exhibition', '', '2023-12-05 04:41:50', '2023-12-05 05:11:52', NULL),
(20, 'STC', 'stc', 'Saudi Arabia', 'Exhibition', '25K+', '', 'Active', '2', 'Yes', 'uploads/portfolio/banner/stc.png', 'alt=\"Adline Media\"', 15, 'STC', '', 'STC', '', '2023-12-05 05:41:22', '2023-12-04 19:47:39', NULL),
(21, 'Posh', 'posh', 'Saudi Arabia', 'Exhibition', '15K+', '', 'Active', '2', 'Yes', 'uploads/portfolio/banner/posh.png', 'alt=\"Adline Media\"', 16, 'Posh - Exhibition', '', 'Posh - Exhibition', '', '2023-12-05 05:46:36', '2023-12-05 05:46:36', NULL),
(22, 'Alfred Talke', 'alfred-talke', 'Saudi Arabia', 'Exhibitions', '5K+', '', 'Active', '2', 'Yes', 'uploads/portfolio/banner/alfred-talke.png', 'alt=\"Adline Media\"', 17, 'Alfred Talke - Exhibitions', '', 'Alfred Talke - Exhibitions', '', '2023-12-05 05:49:35', '2023-12-05 05:49:35', NULL),
(23, 'Arab housing', 'arab-housing', 'Saudi Arabia', 'Exhibition', '10K+', '', 'Active', '2', 'Yes', 'uploads/portfolio/banner/arab-housing.png', 'alt=\"Adline Media\"', 18, 'Arab housing - Exhibition', '', 'Arab housing - Exhibition', '', '2023-12-05 05:51:22', '2023-12-05 05:51:22', NULL),
(24, 'Butterfly & Co', 'butterfly--co', 'Saudi Arabia', 'EXHIBITION', '2K+', '', 'Active', '2', 'Yes', NULL, 'alt=\"Adline Media\"', 19, 'Butterfly & Co - EXHIBITION', '', 'Butterfly & Co - EXHIBITION', '', '2023-12-05 05:56:11', '2023-12-05 05:58:54', NULL),
(25, 'Endress Hauser', 'endress-hauser', 'Saudi Arabia', 'Exhibition', '5K+', '', 'Active', '2', 'Yes', NULL, 'alt=\"Adline Media\"', 20, 'Endress Hauser - Exhibition', '', 'Endress Hauser - Exhibition', '', '2023-12-05 05:58:27', '2023-12-05 05:58:27', NULL),
(26, 'Ministry of Housing', 'ministry-of-housing', 'Saudi Arabia', '', '', '', 'Active', '2', 'Yes', 'uploads/portfolio/banner/ministry-of-housing.png', 'alt=\"Adline Media\"', 21, 'Ministry of Housing - Exhibition', '', 'Ministry of Housing - Exhibition', '', '2023-12-05 06:01:28', '2023-12-05 06:01:28', NULL),
(27, 'Virgin', 'virgin', 'Saudi Arabia', 'Exhibition', '3K+', '', 'Active', '2', 'Yes', 'uploads/portfolio/banner/virgin.png', 'alt=\"Adline Media\"', 22, 'Virgin - Exhibition', '', 'Virgin - Exhibition', '', '2023-12-05 06:04:20', '2023-12-05 06:04:20', NULL),
(28, 'Yokogawa', 'yokogawa', 'Saudi Arabia', 'Exhibition', '3K+', '', 'Active', '2', 'Yes', 'uploads/portfolio/banner/yokogawa.png', 'alt=\"Adline Media\"', 23, 'Yokogawa -  Exhibition', '', 'Yokogawa -  Exhibition', '', '2023-12-05 06:07:11', '2023-12-05 06:14:26', NULL),
(29, 'Coca-Cola', 'cocacola', 'Saudi Arabia', 'Display Stands', '25K+', '', 'Active', '5', 'Yes', 'uploads/portfolio/banner/coca-cola.png', 'alt=\"Adline Media\"', 24, 'Coca-Cola - Display Stands', '', 'Coca-Cola - Display Stands', '', '2023-12-05 06:30:53', '2023-12-05 06:30:53', NULL),
(30, 'Mountain Dew', 'mountain-dew', 'Saudi Arabia', 'Display Stands', '50K+', '', 'Active', '5', 'Yes', 'uploads/portfolio/banner/mountain-dew.png', 'alt=\"Adline Media\"', 25, 'Mountain Dew - Display Stands', '', 'Mountain Dew - Display Stands', '', '2023-12-05 06:38:09', '2023-12-05 07:27:07', NULL),
(31, 'Pepsi', 'pepsi', 'Saudi Arabia', 'Display Stands', '20K+', '', 'Active', '5', 'Yes', 'uploads/portfolio/banner/pepsi.png', 'alt=\"Adline Media\"', 26, 'Pepsi-Display Stands', '', 'Pepsi-Display Stands', '', '2023-12-05 06:40:13', '2023-12-05 06:40:13', NULL),
(32, 'Shakalawa', 'shakalawa', 'Saudi Arabia', 'Display Stands', '10K+', '', 'Active', '5', 'Yes', 'uploads/portfolio/banner/shakalawa.png', 'alt=\"Adline Media\"', 27, 'Shakalawa - Display Stands', '', 'Shakalawa - Display Stands', '', '2023-12-05 06:46:53', '2023-12-04 19:30:20', NULL),
(33, 'Lays', 'lays', 'Saudi Arabia', 'Display Stands', '30K+', '', 'Active', '5', 'Yes', 'uploads/portfolio/banner/lays.png', 'alt=\"Adline Media\"', 28, 'Lays - Display Stands', '', 'Lays - Display Stands', '', '2023-12-05 06:56:16', '2023-12-05 06:56:16', NULL),
(34, 'Philips', 'philips', 'Saudi Arabia', 'Display Stands', '30K+', '', 'Active', '5', 'Yes', 'uploads/portfolio/banner/philips.png', 'alt=\"Adline Media\"', 29, 'Philips - Display Stands', '', 'Philips - Display Stands', '', '2023-12-05 07:02:50', '2023-12-05 07:02:50', NULL),
(35, 'EZ Expo', 'ez-expo', 'Saudi Arabia', 'Display Stands', '20K+', '', 'Active', '5', 'Yes', 'uploads/portfolio/banner/ez-expo.png', 'alt=\"Adline Media\"', 30, 'EZ Expo -  Display Stands', '', 'EZ Expo -  Display Stands', '', '2023-12-05 07:04:59', '2023-12-05 07:04:59', NULL),
(36, 'HHY', 'hhy', 'Saudi Arabia', 'Display Stands', '15K+', '', 'Active', '5', 'Yes', NULL, 'alt=\"Adline Media\"', 31, 'HHY - Display Stands', '', 'HHY - Display Stands', '', '2023-12-05 07:13:29', '2023-12-05 07:13:29', NULL),
(37, 'Faber Castell', 'faber-castell', 'Saudi Arabia', 'Display Stands', '30K+', '', 'Active', '5', 'Yes', 'uploads/portfolio/banner/faber-castell.png', 'alt=\"Adline Media\"', 32, 'Faber Castell - Display Stands', '', 'Faber Castell - Display Stands', '', '2023-12-05 07:15:23', '2023-12-05 07:15:23', NULL),
(38, 'Assorted Dates', 'assorted-dates', 'Saudi Arabia', 'Display Stands', '30K+', '', 'Active', '5', 'Yes', 'uploads/portfolio/banner/assorted-dates.png', 'alt=\"Adline Media\"', 33, 'Assorted Dates - Display Stands', '', 'Assorted Dates - Display Stands', '', '2023-12-05 07:17:59', '2023-12-05 07:17:59', NULL),
(39, 'Premium Podium', 'premium-podium', 'Saudi Arabia', 'Premium Podium', '25K+', '', 'Active', '3', 'Yes', 'uploads/portfolio/banner/premium-podium.png', 'alt=\"Adline Media\"', 34, 'Premium Podium', '', 'Premium Podium', '', '2023-12-05 07:45:57', '2023-12-05 07:45:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_categories`
--

CREATE TABLE `portfolio_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portfolio_categories`
--

INSERT INTO `portfolio_categories` (`id`, `title`, `short_url`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Exhibitions', 'exhibitions', 'Active', '2023-11-04 05:07:59', '2023-11-04 05:08:08', '2023-11-04 05:08:08'),
(2, 'Exhibitions', 'exhibitions', 'Active', '2023-11-04 09:08:00', '2023-11-04 09:08:00', NULL),
(3, 'Premium Podium', 'premium-podium', 'Active', '2023-11-06 00:44:17', '2023-11-06 00:44:17', NULL),
(4, 'kashakh', 'kashakh', 'Inactive', '2023-11-06 00:44:25', '2023-11-06 00:46:01', '2023-11-06 00:46:01'),
(5, 'Display Stands', 'display-stands', 'Active', '2023-11-06 00:46:15', '2023-11-06 00:46:15', NULL),
(6, 'Corporate Gifts', 'corporate-gifts', 'Inactive', '2023-11-06 00:46:58', '2023-12-05 07:23:24', NULL),
(7, 'Festival', 'festival', 'Inactive', '2023-12-05 00:51:34', '2023-12-05 07:27:07', '2023-12-05 07:27:07'),
(8, 'Conference', 'conference', 'Inactive', '2023-12-05 01:09:23', '2023-12-05 03:36:54', NULL),
(9, 'Events', 'events', 'Active', '2023-12-05 03:25:52', '2023-12-05 03:25:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_galleries`
--

CREATE TABLE `portfolio_galleries` (
  `id` int(11) NOT NULL,
  `type` enum('Photo','Video') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Photo',
  `portfolio_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_attribute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portfolio_galleries`
--

INSERT INTO `portfolio_galleries` (`id`, `type`, `portfolio_id`, `image`, `image_attribute`, `video_url`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Photo', 1, 'uploads/portfolio/1/gallery/services-04.jpg', 'alt=\"Adline Media\"', NULL, 'Inactive', '2023-12-05 10:17:44', '2023-12-05 10:47:59', '2023-12-05 10:47:59'),
(2, 'Video', 1, 'uploads/portfolio/1/gallery/services-04.jpg', 'alt=\"Adline Media\"', 'https://youtu.be/CGLdH5ORX-Y', 'Inactive', '2023-12-05 10:21:52', '2023-12-06 06:47:33', NULL),
(3, 'Photo', 1, 'uploads/portfolio/1/gallery/portfolio-gallery.jpg', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 03:41:49', '2023-12-06 04:33:00', '2023-12-06 04:33:00'),
(4, 'Photo', 2, 'uploads/portfolio/2/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 03:44:21', '2023-12-06 06:49:53', NULL),
(5, 'Photo', 1, 'uploads/portfolio/1/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 04:56:35', '2023-12-06 05:11:13', NULL),
(6, 'Photo', 1, 'uploads/portfolio/1/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 06:45:11', '2023-12-06 06:45:11', NULL),
(7, 'Photo', 1, 'uploads/portfolio/1/gallery/portfolio-gallery-2.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 06:46:55', '2023-12-06 06:46:55', NULL),
(8, 'Photo', 2, 'uploads/portfolio/2/gallery/portfolio-gallery-1-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 06:50:13', '2023-12-06 06:50:13', NULL),
(9, 'Photo', 2, 'uploads/portfolio/2/gallery/portfolio-gallery-2.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 06:50:38', '2023-12-06 06:50:38', NULL),
(10, 'Photo', 7, 'uploads/portfolio/7/gallery/portfolio-gallery-2.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 06:52:47', '2023-12-06 06:52:47', NULL),
(11, 'Photo', 7, 'uploads/portfolio/7/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 06:53:07', '2023-12-06 06:53:07', NULL),
(12, 'Photo', 8, 'uploads/portfolio/8/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 06:55:58', '2023-12-06 06:55:58', NULL),
(13, 'Photo', 8, 'uploads/portfolio/8/gallery/portfolio-gallery-2.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 06:56:14', '2023-12-06 06:56:14', NULL),
(14, 'Photo', 8, 'uploads/portfolio/8/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 06:56:27', '2023-12-06 06:56:27', NULL),
(15, 'Photo', 9, 'uploads/portfolio/9/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:04:23', '2023-12-06 07:04:23', NULL),
(16, 'Photo', 9, 'uploads/portfolio/9/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:04:40', '2023-12-06 07:04:40', NULL),
(17, 'Photo', 9, 'uploads/portfolio/9/gallery/portfolio-gallery-2.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:06:51', '2023-12-06 07:06:51', NULL),
(18, 'Photo', 10, 'uploads/portfolio/10/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:07:39', '2023-12-06 07:07:39', NULL),
(19, 'Photo', 10, 'uploads/portfolio/10/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:07:54', '2023-12-06 07:07:54', NULL),
(20, 'Photo', 10, 'uploads/portfolio/10/gallery/portfolio-gallery-2.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:09:09', '2023-12-06 07:09:09', NULL),
(21, 'Photo', 11, 'uploads/portfolio/11/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:10:02', '2023-12-06 07:10:02', NULL),
(22, 'Photo', 11, 'uploads/portfolio/11/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:10:25', '2023-12-06 07:10:25', NULL),
(23, 'Photo', 11, 'uploads/portfolio/11/gallery/portfolio-gallery-2.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:10:47', '2023-12-06 07:10:47', NULL),
(24, 'Photo', 12, 'uploads/portfolio/12/gallery/portfolio-gallery-1-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:11:28', '2023-12-06 07:15:05', NULL),
(25, 'Photo', 12, 'uploads/portfolio/12/gallery/portfolio-gallery-3.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:11:45', '2023-12-06 07:15:36', NULL),
(26, 'Photo', 12, 'uploads/portfolio/12/gallery/portfolio-gallery-2-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:12:28', '2023-12-06 07:16:40', NULL),
(27, 'Photo', 13, 'uploads/portfolio/13/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:17:27', '2023-12-06 07:17:27', NULL),
(28, 'Photo', 13, 'uploads/portfolio/13/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:17:48', '2023-12-06 07:17:48', NULL),
(29, 'Photo', 13, 'uploads/portfolio/13/gallery/portfolio-gallery-2.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:18:04', '2023-12-06 07:18:04', NULL),
(30, 'Photo', 14, 'uploads/portfolio/14/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:18:51', '2023-12-06 07:18:51', NULL),
(31, 'Photo', 14, 'uploads/portfolio/14/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:19:10', '2023-12-06 07:19:10', NULL),
(32, 'Photo', 14, 'uploads/portfolio/14/gallery/portfolio-gallery-2.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:19:26', '2023-12-06 07:19:26', NULL),
(33, 'Photo', 15, 'uploads/portfolio/15/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:20:52', '2023-12-06 07:20:52', NULL),
(34, 'Photo', 15, 'uploads/portfolio/15/gallery/portfolio-gallery-2.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:21:11', '2023-12-06 07:21:11', NULL),
(35, 'Photo', 15, 'uploads/portfolio/15/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:21:28', '2023-12-06 07:21:28', NULL),
(36, 'Photo', 16, 'uploads/portfolio/16/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:22:19', '2023-12-06 07:22:19', NULL),
(37, 'Photo', 16, 'uploads/portfolio/16/gallery/portfolio-gallery-2.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:22:39', '2023-12-06 07:22:39', NULL),
(38, 'Photo', 16, 'uploads/portfolio/16/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:23:01', '2023-12-06 07:23:01', NULL),
(39, 'Photo', 17, 'uploads/portfolio/17/gallery/portfolio-gallery-2.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:23:49', '2023-12-06 07:23:49', NULL),
(40, 'Photo', 17, 'uploads/portfolio/17/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:24:27', '2023-12-06 07:24:27', NULL),
(41, 'Photo', 17, 'uploads/portfolio/17/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:25:12', '2023-12-06 07:25:12', NULL),
(42, 'Photo', 19, 'uploads/portfolio/19/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:27:14', '2023-12-06 07:27:14', NULL),
(43, 'Photo', 19, 'uploads/portfolio/19/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:27:30', '2023-12-06 07:27:30', NULL),
(44, 'Photo', 20, 'uploads/portfolio/20/gallery/portfolio-gallery-2.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:28:27', '2023-12-06 07:28:27', NULL),
(45, 'Photo', 20, 'uploads/portfolio/20/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:28:44', '2023-12-06 07:28:44', NULL),
(46, 'Photo', 20, 'uploads/portfolio/20/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:29:02', '2023-12-06 07:29:02', NULL),
(47, 'Photo', 21, 'uploads/portfolio/21/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:29:34', '2023-12-06 07:29:34', NULL),
(48, 'Photo', 21, 'uploads/portfolio/21/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:29:58', '2023-12-06 07:29:58', NULL),
(49, 'Photo', 22, 'uploads/portfolio/22/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:31:06', '2023-12-06 07:31:06', NULL),
(50, 'Photo', 23, 'uploads/portfolio/23/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:31:47', '2023-12-06 07:31:47', NULL),
(51, 'Photo', 24, 'uploads/portfolio/24/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:32:31', '2023-12-06 07:32:31', NULL),
(52, 'Photo', 25, 'uploads/portfolio/25/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:33:31', '2023-12-06 07:33:31', NULL),
(53, 'Photo', 26, 'uploads/portfolio/26/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:34:07', '2023-12-06 07:34:07', NULL),
(54, 'Photo', 27, 'uploads/portfolio/27/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:34:49', '2023-12-06 07:34:49', NULL),
(55, 'Photo', 28, 'uploads/portfolio/28/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:35:56', '2023-12-06 07:35:56', NULL),
(56, 'Photo', 29, 'uploads/portfolio/29/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:36:39', '2023-12-06 07:36:39', NULL),
(57, 'Photo', 29, 'uploads/portfolio/29/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:36:59', '2023-12-06 07:36:59', NULL),
(58, 'Photo', 30, 'uploads/portfolio/30/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:37:38', '2023-12-06 07:37:38', NULL),
(59, 'Photo', 31, 'uploads/portfolio/31/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:38:11', '2023-12-06 07:38:11', NULL),
(60, 'Photo', 32, 'uploads/portfolio/32/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:38:42', '2023-12-06 07:38:42', NULL),
(61, 'Photo', 33, 'uploads/portfolio/33/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:39:10', '2023-12-06 07:39:10', NULL),
(62, 'Photo', 34, 'uploads/portfolio/34/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:39:40', '2023-12-06 07:39:40', NULL),
(63, 'Photo', 35, 'uploads/portfolio/35/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:40:12', '2023-12-06 07:40:12', NULL),
(64, 'Photo', 36, 'uploads/portfolio/36/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:40:45', '2023-12-06 07:40:45', NULL),
(65, 'Photo', 37, 'uploads/portfolio/37/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:41:09', '2023-12-06 07:41:09', NULL),
(66, 'Photo', 38, 'uploads/portfolio/38/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:41:38', '2023-12-06 07:41:38', NULL),
(67, 'Photo', 39, 'uploads/portfolio/39/gallery/portfolio-gallery.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:42:17', '2023-12-06 07:42:17', NULL),
(68, 'Photo', 39, 'uploads/portfolio/39/gallery/portfolio-gallery-1.png', 'alt=\"Adline Media\"', NULL, 'Active', '2023-12-06 07:43:10', '2023-12-06 07:43:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_description` longtext COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `display_to_home` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `thumbnail_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail_image_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keyword` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `other_meta_tag` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `sort_order` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `parent_id`, `title`, `short_url`, `home_description`, `description`, `display_to_home`, `thumbnail_image`, `thumbnail_image_meta_tag`, `image`, `image_meta_tag`, `banner`, `banner_meta_tag`, `meta_title`, `meta_description`, `meta_keyword`, `other_meta_tag`, `status`, `sort_order`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 0, 'Experiential Marketing', 'experiential-marketing', '<p>Adline Media connected with all malls and In Mall Agencies in KSA whereby we can get Exclusive price and serving to client with one point of person until execution.</p>', '<p><span style=\"font-weight: 400;\">Experiential marketing, also known as engagement marketing or event marketing, is a promotional strategy that involves creating immersive experiences to engage and connect with a target audience. At AD LINE MEDIA, we focus on creating immersive and memorable experiences that allow consumers to interact with the brand distinctly through experiential marketing. Compared to traditional marketing, experiential marketing coveys messages through advertising that aims to involve consumers directly in the brand experience.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">As the top-rated branding and advertising company in Saudi Arabia, we bring physical and virtual experiences through experiential marketing. Experiential marketing takes place at various locations, events, and online platforms. The active participation and interaction of the consumers are the core of experiential marketing. This immersive involvement of consumers can include product demonstrations, sampling, interactive games, and other activities. Rather than consumer participation, our experiential marketing focuses on aspects such as brand activation, storytelling, social media integration, product launches and activations, community building, and so on.</span></p>\r\n<p><span style=\"font-weight: 400;\">Being the best branding company in Saudi Arabia, our experiential marketing is adaptable and ensures brands tailor their campaigns to suit various demographics and marketing objectives. It has become increasingly popular as consumers seek more meaningful and engaging interactions with the brands they support.</span></p>', 'Yes', 'uploads/service/thumbnail_image/service-thumbnail-image-2.png', 'alt=\"Adline Media\"', 'uploads/service/image/service-image-4.png', 'alt=\"Adline Media\"', 'uploads/service/banner/service-banner-17.png', 'alt=\"Adline Media\"', 'Best In-mall Activation Company in Saudi Arabia - Adline Media', 'Adline Media connected with all malls and In Mall Agencies in KSA whereby we can get Exclusive price and serving to client with one point of person until execution.', '', '', 'Active', 3, NULL, '2023-02-12 15:28:38', '2023-11-28 04:52:48'),
(4, 0, 'Exhibition', 'exhibition', '<p>We are well-experienced manufacturers, designing reliable exhibition booths for precise branding. As one of the best exhibition booth manufacturers in Saudi Arabia, our experts craft exhibition booths with quality materials and good-looking designs.&nbsp;</p>', '<h1>EXCELLENCE IN EXHIBITION BOOTH DESIGN</h1>\r\n<p>AD LINE MEDIA is a one-stop solution for fabricating and installing exhibition booth designs in Saudi Arabia. We choose the preferable and highest quality materials for booth construction. We are synchronizing cutting-edge technology, modern design &amp; build practices with the construction of the exhibition booth designs. We are a reputed exhibit company in Saudi Arabia. We provide extraordinary exhibition booth designs considering the client&rsquo;s needs and requirements. ADLINE MEDIA&nbsp; is a full-service event designer and exhibitor known for its creativity and ability to create immersive brand experiences at trade shows and events.&nbsp;</p>\r\n<h3>&nbsp;</h3>\r\n<h4><span style=\"font-size: 12pt;\"><strong>We can create and execute themes based on brand concepts.</strong></span></h4>\r\n<h2>&nbsp;</h2>\r\n<h2><strong>PURE AND POLISHED BOOTH DESIGN FOR YOUR BRAND</strong></h2>\r\n<p>As the best exhibition stall design company in Saudi Arabia, we create incredible exhibition stalls with perfect finishing and polishing. An exhibition stall can attract people and engage them with its eye-catching structure. We recognize that an exhibitor may require unique exhibit demands. We have professionals with great innovation and brilliant ideas. They design 3D exhibition stalls to match the expectations of the clients. Our proactive workers have consistently outperformed the expected outcomes. We have witnessed the repetition of happy customers through well-defined exhibit needs provision. We can promise you our distinct approach towards 3D stall design for exhibition before counting on our services. Being the top exhibition stall design company in Saudi Arabia, customer satisfaction and retention through best performance is the superior objective of ADLINE MEDIA. We visualize your ideas for producing a colorful display booth.</p>\r\n<h3>&nbsp;</h3>\r\n<h4><span style=\"font-size: 12pt;\"><strong>CRAFTING SPECTACULAR EXHIBITS</strong></span></h4>\r\n<p>As the leading exhibition booth design company in Saudi Arabia, we construct igniting exhibitions to promote your brand in an impactful way.</p>\r\n<p>Team ADLINE MEDIA is known for its 360&deg; bespoke exhibition stand design &amp; build solutions. We focus on every aspect that can impact the outcome. Our considerable vision has been to evaluate the market growth and scope of 3D exhibition stand design. Our well-equipped staff, project managers, visualizers, designers, and fabricators promptly address the concerns in the step-by-step process of creating enigmatic designs. We offer customized exhibition booth design and production services. At AD LINE MEDIA, we focus on creating visually appealing and functional exhibits. Our exhibition booth design company is well-known for its creative and strategic approach to booth design. We work closely with clients to develop unique and impactful exhibitions. As the best exhibition booth manufacturer in Saudi Arabia, our unique and captivating exhibition booth designs are well-recognized. We focus on creating memorable brand experiences for clients.</p>\r\n<h4><span style=\"font-size: 12pt;\"><strong>MANUFACTURING MIND-BLOWING EXHIBITION BOOTHS</strong></span></h4>\r\n<h3>&nbsp;</h3>\r\n<h3><strong>We are specialists in the industry and well-experienced in the Art of Exhibition Booth Manufacturing.</strong></h3>\r\n<p>AD LINE MEDIA is a one-stop shop for designing, fabricating, and installing exhibition booths. To install the booth in a calculative way, we focus on exhibition booth construction as reliability. With its contemporary style, our company is famous for its bespoke exhibit booth construction, design, and building. As the best exhibition booth manufacturer in Saudi Arabia, we add an extra impact to your exhibition with agile solutions. The exhibition stalls incorporate all the modern facilities. At ADLINE MEDIA, our experts choose the preferable and highest quality materials for exhibition booth manufacturing. Considering the requirements of the clients in exhibition booth manufacturing, we provide cutting-edge technology and modern designs according to our manufacturing excellence.</p>\r\n<h4>&nbsp;</h4>\r\n<h3><span style=\"font-size: 14pt;\"><strong>What Makes Us the Most Dedicated and Reliable Exhibition Booth Manufacturer in Saudi Arabia?</strong></span></h3>\r\n<p>Being the best exhibition stall design company in Saudi Arabia, we have a dedicated team to make your project extraordinary and excellent. Seek advice or clarification for the exhibition booth design with our experts.</p>\r\n<p>At AD LINE MEDIA, we deliver quick and efficient exhibition booth manufacturing results. Project completion takes place with precision. We don&rsquo;t differentiate any project as small or big.&nbsp; Every client is ready to showcase their services through an exhibition stand. Our exhibition stand manufacturers strive to create a niche for every exhibitor in the market with their creative outlook.</p>\r\n<p>Get up and ready for a reliable solution for comprehensive needs! We know that maintaining exhibit services may be exhausting. You need to find one source where exhibition stand builders play a superior role. At&nbsp; AD LINE MEDIA, we have seen consistent growth by serving clients according to their customized exhibit needs under one roof. In Saudi Arabia, we have been in the industry for a long and consistently providing the best services.&nbsp;AD LINE MEDIA&nbsp;is known for its custom booth designs and personalized approach to meeting clients&rsquo; specific trade show needs. Elevate your brand with our terrific and eye-catching exhibition booth designs. Maximize your brand&rsquo;s visibility with our high-impact display solutions and show-stealing exhibitions. Being the most remarkable and best exhibition booth manufacturer in Saudi Arabia, we serve the exact way of branding that you are thinking with its fullest and finest excellence.</p>', 'Yes', NULL, 'alt=\"Adline Media\"', 'uploads/service/image/service-image-2.png', 'alt=\"Adline Media\"', 'uploads/service/banner/service-banner.png', 'alt=\"Banner-service\"', 'Best Exhibition Stall Design-Booth Manufacturer Company in Saudi', 'Adline Media is the Leading Exhibition Booth Design and Manufacturing Company in Saudi Arabia. Create a Lasting Impression With Our Expertly Crafted Exhibition Stalls', '', '', 'Active', 1, NULL, '2023-02-12 15:28:38', '2023-12-04 03:08:11'),
(5, 0, 'Premium Podiums', 'premium-podiums', '<p>Our stunning podiums with premium looks define all about your brand. We design premium podiums accurately with quality materials. We are the best premium podium designers in Saudi, and our modern podiums with high standard creates a visual impression.</p>', '<h1><strong>DEFINING YOUR BRAND WITH MODERN PODIUM DESIGNING</strong></h1>\r\n<p>At ADLINE MEDIA, we craft captivating modern podium designs to uplift your brand into a wider audience. Designing a premium podium is crucial in creating a capable visual impression at events, conferences, or presentations. Premium podium designs often incorporate high-quality materials, elegant aesthetics, and functional features. Designing a premium podium is the art of creating brand awareness with high impact. As the best podium design company in Saudi Arabia, we make excellent podiums that speak more about your brand. We define your brand to the audience by designing premium podiums.</p>\r\n<p>ADLINE MEDIA has been at the forefront of podium design in Saudi Arabia for several years. Our dedication to craftsmanship, attention to detail, and commitment to customer satisfaction have earned the reputation of being the best in the business.</p>\r\n<p><strong>With a legacy of excellence, a commitment to customization, and a portfolio of elegance, we are the best podium-designing company in Saudi Arabia.</strong></p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 14pt;\"><strong>The Mastery Of Podium Design</strong></span></h3>\r\n<p>As a modern podium-designing company in Saudi Arabia, we set an unwavering commitment to creativity and innovation. Our team of skilled designers and craftsmen understands that a podium isn&rsquo;t just a piece of furniture. It&rsquo;s a symbol of authority, expertise, and prestige. They approach each project as a work of art, blending functionality with aesthetics to create podiums that make a statement. It will define your brand differently. Whether you&rsquo;re looking for a traditional wooden podium, a sleek modern design, or something unique, our professionals can bring your vision to life.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 12pt;\"><strong>OUR PODIUMS WILL GLOW AT FIRST GLANCE</strong>&nbsp;</span></h4>\r\n<h3><span style=\"font-size: 12pt;\">We are sourcing from Across the world and bringing it to Saudi Arabia to make your podium look more premium.</span></h3>\r\n<p>We create a perfect environment for you to promote your brand with our modern podium design. We design premium podiums functionally and finish to an exceptionally high standard. Our stands are custom-built to meet your exact specifications. Our team makes podiums budget-friendly, works within your deadlines, and creates the perfect sales environment for your business.</p>\r\n<p>You can work closely with designers and manufacturers to ensure that the sourced materials and designs align with your vision for the premium podium. Consider mock-ups or prototypes to validate the final design.&nbsp;</p>\r\n<h4><span style=\"font-size: 12pt;\"><strong>For a perfectly crafted premium podium design, you should consider some factors.</strong></span><br />&nbsp;</h4>\r\n<h3><strong>Requirements &amp; Considerations</strong></h3>\r\n<p>Clearly define the specifications and design elements you want for your premium podium. Consider materials, finishes, measurements, and unique design elements that complement your brand or event concept. You can choose the perfect podium design according to your requirements.</p>\r\n<p>Be aware of cultural differences in design preferences and aesthetics. Ensure that the podium design resonates with your Saudi Arabian audience.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 12pt;\"><strong>Material Selection</strong>&nbsp;</span></h4>\r\n<p>We provide different materials for crafting your podium with modern podium designs.</p>\r\n<p>Selecting the exact materials for constructing a podium is crucial for achieving the desired aesthetics, functionality, and durability. The choice of materials depends on factors like the intended use, design style, budget, and location.</p>\r\n<p>Choose premium materials such as high-quality wood, polished metal, glass, or acrylic for the podium&rsquo;s construction. These materials not only convey a sense of luxury but also provide durability.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><span style=\"font-size: 12pt;\"><strong>Quality Assurance &amp; Customization</strong></span>&nbsp;</span></h4>\r\n<p>Establish strict quality assurance standards to ensure that the materials and products you source meet the desired premium quality. It includes inspections, certifications, and testing. Being the leading podium designing company in Saudi Arabia, we assure you that our Modern Podiums are very rich in quality.</p>\r\n<p>Make sure that your podium design matches your brand identity. We work closely with suppliers to customize materials or components to match your definite design requirements. It involves choosing unique finishes, colors, or textures that align with your podium&rsquo;s premium aesthetic.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>PRECISE AND PERFECT PODIUM DESIGNING</strong></span></h4>\r\n<p>If you&rsquo;re looking for a company specializing in designing and manufacturing podiums, ADLINE MEDIA is the best in the industry. We make modern podium designs with absolute precision and perfection. In the ever-evolving world of design, ADLINE MEDIA stays ahead of the curve. Our team keeps in line with the latest trends, materials, and technologies to continually innovate and bring fresh ideas to the podium design landscape in Saudi Arabia.&nbsp;</p>\r\n<p>In the kingdom known for its grandeur and elegance, ADLINE MEDIA has emerged as the best podium-designing company, capturing the essence of Saudi Arabia&rsquo;s rich culture and modern aspirations. With a commitment to quality, a portfolio that speaks volumes, and a passion for innovation, ADLINE MEDIA is the top choice for those who demand nothing but the best.</p>\r\n<p>When you choose us, you&rsquo;re not only just getting a podium. You&rsquo;re getting a piece of art that will elevate your event to a new level. It&rsquo;s a symbol of excellence, a fusion of tradition and innovation, and a testament to the beauty of Saudi Arabia&rsquo;s design landscape.</p>\r\n<p><strong>Uplift your event at most. Choose AD LINE MEDIA, the best modern podium-designing company in Saudi Arabia.</strong></p>', 'Yes', 'uploads/service/thumbnail_image/service-thumbnail-image-1.png', 'alt=\"Adline Media\"', 'uploads/service/image/service-image-3.png', 'alt=\"Adline Media\"', 'uploads/service/banner/service-banner-19.png', 'alt=\"Adline Media\"', 'Premium & Modern Podium Design Solutions - Adline Media', 'Elevate your space with modern podium design solutions by Adline Media. Our innovative designs blend style and functionality, making a lasting impression', '', '', 'Active', 12, NULL, '2023-02-12 15:28:38', '2023-12-04 03:17:01'),
(6, 0, 'Display Stands', 'display-stands', '<p>We design captivating display stands that speak about your brand in trade shows and exhibitions. Our perfect structure and design of display stands make your brand unique and eye-catching. We are the first-rate display stand manufacturers in Saudi Arabia.</p>', '<h1><strong>DISPLAY OUR STANDS, DESIGN YOUR FUTURE</strong></h1>\r\n<p>In the dynamic world of business, making a memorable impression at trade shows and exhibitions is predominant. Your exhibition display stands can either make or break the success of your participation. ADLINE MEDIA is the best company in Saudi Arabia that creates captivating exhibition stands.&nbsp;</p>\r\n<p>ADLINE MEDIA has earned a stellar reputation as the premier exhibition stand contractor in Saudi Arabia. With a track record of delivering innovative, eye-catching, and functional exhibition display stands, we consistently help businesses and organizations shine on the exhibition floor.</p>\r\n<p>&nbsp;</p>\r\n<h2>THE ART OF DESIGNING EXHIBITION DISPLAY STANDS</h2>\r\n<p>Designing an exhibition stand is more than just constructing a physical space. It is about storytelling, branding, and creating an immersive experience. ADLINE MEDIA understands this art like no other. Our professional designers possess the creativity and expertise to transform your vision into a captivating reality. Whether you&rsquo;re looking for a minimalist, high-tech, or elaborate design, they have the skills and experience to deliver beyond expectations.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 12pt;\"><strong>CUSTOMIZATION UNLEASHED</strong></span></h4>\r\n<p>As the best display stand manufacturer in Saudi Arabia, we are committed to customization. ADLINE MEDIA recognizes that each business is unique, and our exhibition stand should reflect that individuality.</p>\r\n<p>With our innovative retail display stands you can increase your sales and communication. We are experts at producing point of sale (POS), wired display stands, display products, merchandising and promotional magazine stands, brochure holders, and brochure display stands for businesses across the markets.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 14pt;\"><strong>We craft various product display stands for exhibitions.</strong></span><br />&nbsp;</h3>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Gondolas</strong></span></h4>\r\n<p>Gondolas have evolved with the technology. Therefore, our company brings Product display Stands to you for use in both advertisement and storing products for either sampling or selling. Gondola display stands are versatile fixtures commonly used in retail stores to showcase and organize a wide range of products. These stands are typically double-sided. It consists of shelves or pegs for displaying merchandise. Gondola display stands offer several benefits.</p>\r\n<p>There are two types of Gondola display stands. They are Metallic Stand and MDF Stand. They are stable in measurements, and their installation and functionality are perfect. These exhibition Display Stands are very impactful in height and attract customers from far distances. They also have LED lights that illuminate during the nighttime.</p>\r\n<p>Gondola display stands are adaptable and can be customized to display various types of products, from clothing and accessories to food items and electronics. This flexibility allows retailers to change their product displays easily. Customers can easily access and browse products on both sides of the gondolas. &nbsp;Gondola display stands provide ample surface area for promotional displays, signage, and branding, allowing retailers to showcase featured products or promotions.</p>\r\n<h5>&nbsp;</h5>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Tailor-Made Stand&nbsp;</strong></span></h4>\r\n<p>Regarding the product display stands for exhibitions, we make tailor-made stands.</p>\r\n<p>Each brand has specific merchandising and display needs. The primary advantage of this stand is the ability to customize the display stand to match your exact specifications. It allows you to incorporate your branding elements seamlessly. It includes your logo, color scheme, fonts, and other brand-specific details. You can design stands that are versatile and adaptable, allowing you to use them for various events or promotions in the future.&nbsp;</p>\r\n<h5>&nbsp;</h5>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Counter Display</strong></span></h4>\r\n<p>Counter displays are in supermarkets, stores, shops, or as a part of the exhibition system. We approach each project and execution separately, based on the customer&rsquo;s guidelines and needs. All elements are cut using a CNC machine and printed with UV technology. Counter displays are typically compact and designed to sit on countertops, cash registers, or other flat surfaces. It makes them highly visible to customers during the checkout process. Being the best display stand manufacturer in Saudi Arabia, we craft visually appealing counter display stands with attention-grabbing graphics, colors, and branding to entice customers to make last-minute purchases.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Flexible Shelf Branding</strong></span>&nbsp;</h4>\r\n<p><strong>Highlight your shelf with Flexible Shelf Dressing.</strong></p>\r\n<p>As the best exhibition stand contractors, we provide flexible shelf branding.</p>\r\n<p>The main Advantages of flexible shelf branding are,</p>\r\n<ul>\r\n<li>Made from durable materials</li>\r\n<li>Easy to install for anyone</li>\r\n<li>Foldable and flexible in size</li>\r\n<li>For immediate attention and ease</li>\r\n<li>Size-Flexible Shelf Strips<br />&nbsp;</li>\r\n</ul>\r\n<h4><strong><span style=\"font-size: 14pt;\">Promotional Tables&nbsp;</span></strong></h4>\r\n<p>Promo tables are widely used for promotional and display advertising purposes and in seminars, colleges, product launches, promotional events, branding, and more. Throughout the region, we offer superior yet affordable Promotional tables.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong><span style=\"font-size: 14pt;\">Roll-Ups</span></strong></h4>\r\n<p>We provide durable roll-up stands, including advertising, standees, and banners in different sizes and specifications. This display stand finds extensive application in various commercial places for advertisement and promotion purposes. Roll-up stands have a lightweight design that makes it easy to be transported. It is available in PVC and polypropylene versions. As an exhibition display stand, roll-up stands are best for exhibitions, seminars, product promotion meetings, press conferences, etc. It is mainly kept in the entrance areas to attract people to display products and services.</p>\r\n<h4>&nbsp;</h4>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Exhibition Portable Kits And Backdrops</strong></span></h4>\r\n<p>Being the best display stand manufacturer in Saudi Arabia, AD LINE MEDIA offers Portable Exhibition Kit such as modular exhibition stands and advertising exhibitions at affordable prices. It has high demand in Stalls, Exhibitions, Airports, Shopping Malls, and many other places for advertisement applications. Along with this, portability, sturdiness, storage, and impact resistance are some of the unique features of this Portable Exhibition Kit that make it appreciated in the market.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 14pt;\"><strong>CREATING IMPRESSIONS AT EXHIBITIONS</strong>&nbsp;</span></h3>\r\n<p>We are the perfect Exhibition Stand Contractors in Saudi Arabia, crafting eye-catching display stands.</p>\r\n<p>At ADLINE MEDIA, we showcase your brand&rsquo;s style through extraordinary display stands. We design excellent display stands depending on your specific goals, budget, and design preferences. We have several years of experience in crafting exhibitions and events. Our portfolio denotes the excellence of our work. As a reputed company in Saudi Arabia, we deliver the best services that bring your brand to new heights.&nbsp;</p>\r\n<p>ADLINE MEDIA provides high-quality display stands, exceptional customer service, innovative design options, and competitive pricing.</p>\r\n<p><strong>Captivate, Communicate and Conquer with our Compelling Display Stands.</strong></p>', 'Yes', 'uploads/service/thumbnail_image/service-thumbnail-image-3.png', 'alt=\"display-stands\"', 'uploads/service/image/service-image-5.png', 'alt=\"display-stands\"', 'uploads/service/banner/service-banner-20.png', 'alt=\"Adline Media\"', 'Exhibition Product Display Stands Manufacturer- Marketing Materials', 'Elevate your brand with innovative exhibition product display stands and marketing materials from Trusted Contractors & manufacturer in Saudi - Adline Media', '', '', 'Active', 9, NULL, '2023-02-12 15:28:38', '2023-12-04 03:19:33'),
(7, 0, 'Signages', 'signages', '<p>Our perfect signage design is unique in style and has a stunning structure. We have an experienced team to design effective signage. We collaborate with clients to understand their target audience and provide professional signage according to their needs.</p>', '<h1>CREATING SIGNATURES IN ICONIC SIGNAGE DESIGNS</h1>\r\n<h2><span style=\"font-size: 14pt;\">We design &amp; create professional signages for your branded environments.&nbsp;</span></h2>\r\n<p>In the bustling world of advertising and marketing, signage plays a pivotal role in catching the eye and conveying messages in a matter of seconds. As the best Signage designing company in Saudi Arabia, we provide comprehensive signage design and production solutions for businesses and organizations. A well-designed sign can be a game-changer for businesses, guiding customers, building brand identity, and leaving a lasting impression. The first impression is often the last impression when it comes to signage.&nbsp;</p>\r\n<p>Our art of signage design includes&nbsp; Visual Aesthetics, Brand Identity, Message Clarity, Size and Placement. Being the best Signage manufacturer in Saudi Arabia, we make signage with vibrant colors, an appealing layout, and typography that complements the message. Signage should seamlessly integrate with a brand&rsquo;s identity.&nbsp;</p>\r\n<p>We are a designer and manufacturer of architectural signages like LED&nbsp; Cladding, 3D, and Neon Signages.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong><span style=\"font-size: 14pt;\">DISPARATE SIGNAGES THAT DEFINE YOUR BRAND</span></strong>&nbsp;</h3>\r\n<p>As a signage designing company, ADLINE MEDIA makes different types of Signage.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Acrylic Signage</strong></span></h4>\r\n<p>Acrylic signage refers to signs made using acrylic material, which is a type of plastic known for its durability, transparency, and versatility. Acrylic signs apply to various business settings, offices, and public spaces for storefront signs, office nameplates, and interior branding.</p>\r\n<p>Acrylic signs are resistant to weather, UV rays, and moisture, making them suitable for both indoor and outdoor use. &nbsp;Despite its durability, acrylic is relatively lightweight, making it easy to install and move when necessary. According to the various signages, It conveys a modern and professional image.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>LED Acrylic Sign Boards ( 3D Glow Sign Boards )</strong></span></h4>\r\n<ul>\r\n<li>Acrylic has a Huge range of colors.</li>\r\n<li>Depth Material consists of Acrylic, Aluminium, Steel, Golden, Metal, Brass etc.</li>\r\n<li>The light source is LED to illuminate the signage.</li>\r\n<li>Operation power is 12V DC.</li>\r\n<li>1 to 2 years of onsite warranty.<br />&nbsp;</li>\r\n</ul>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Neon Signage</strong></span></h4>\r\n<p>We make Neon Signs from Lead glass tubing in external diameters ranging from &nbsp;8-15 mm. As a leading signage manufacturer in Saudi Arabia, AD LINE MEDIA &nbsp;manufactures Neon Sign Board for different cafes. We design Neon Signs using quality raw materials sourced from certified vendors in the market. It provides good visibility and can withstand any weather. We make it for both indoor and outdoor advertising purposes. Neon is available in a wide range of colors, from blazing red to icy blue.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>ACP Signage</strong></span></h4>\r\n<p>Our signage designing Company designs extraordinary ACP sign boards for several brands in Saudi Arabia.</p>\r\n<p>ACP (Aluminum Composite Panel) sign boards are suitable for outdoor and indoor signage due to their durability, versatility, and aesthetic appeal. These sign boards are made by sandwiching a core layer of polyethylene between two thin layers of aluminum, resulting in a lightweight yet sturdy material. ACP sign boards are highly durable and can withstand specific weather conditions, including rain, sunlight, and temperature fluctuations. It makes them suitable for outdoor use. Versatility is a feature of ACP Sign Boards. ACP sign boards provide a flat and smooth surface, making them ideal for printing graphics, text, and images with high-resolution clarity. &nbsp;The aluminum surface of ACP sign boards is rust-resistant and does not corrode, ensuring a long lifespan. Despite their durability, ACP sign boards are lightweight, making them easy to transport and install. As a leading Signage manufacturer in Saudi, we provide ACP sign boards with the exact size, shape, and design.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Metal Letters</strong></span></h4>\r\n<p>We are offering a Various array of Metal Letters. We manufacture this letter using high-quality raw materials and the latest technology following industry-defined guidelines. Our Professional experts check this letter on diverse parameters to guarantee its quality. We provide this letter available in different sizes and designs according to the specific needs of our clients.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Internal Signage</strong></span></h4>\r\n<p>Being the top signage design company, ADLINE MEDIA gained name and fame in offering Internal Signage to clients. We manufacture Internal signages using quality-checked material and the latest technology under the guidance of professionals. ADLINE MEDIA designs this signboard according to the specifications briefed by the customers. Here, we offer Emergency Exit Signs, Wayfinding Signs, Hospital Signs, Hotel Signs, Traffic Signs, Edge LED signs, etc.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Way Finding Signage</strong></span></h4>\r\n<p>Wayfinding signage conveys clear direction and ambiance of the buildings and value to end users. Our project managers work closely with building owners, architects, and designers to determine natural visitor flows, Navigation demands, and health and safety requirements. Being the best Signage manufacturer in Saudi Arabia, We design and manufacture way-finding signs that enhance interior spaces using a wide range of materials, finishes, styles, and graphics.</p>\r\n<p>We create way-finding signs with low maintenance, cost-effectiveness, and durability.</p>\r\n<p>Our way of finding signage is to blend seamlessly with their environment. The main objective of way-finding systems is to fulfill the accessibility needs of particular user groups, including those with varying degrees of visual impairment.</p>\r\n<p>Wayfinding systems assist users in navigating all types of places like hospitals, schools, downtown areas, public spaces, and shopping centers. We design Eye-catching sign boards with flexibility, superior functionality, and attractive appearance to provide lasting way-finding and signage solutions.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Reception Signage</strong></span></h4>\r\n<p>As an appealing Signage design company, We manufacture a wide range of Reception Signage considering the specifications of our clients. The eye-catching designs, colors, and patterns of our reception signages increase the beauty of the reception. We craft accurate reception signages that add a professional touch to the reception. To manufacture the signage, we employ the latest machines and advanced technology. We customize the signage as per the customer&rsquo;s requirements.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Digital Signage</strong></span>&nbsp;</h4>\r\n<p>Digital signage is electronic displays applicable in public places such as Retail shops, quick service &amp; dining in restaurants, hotels, shopping malls, and hospitals. Digital signs entertain and engage the audience, inform, or advertise. The benefits of digital signage over traditional static signs are that digital sign boards can adapt to the context and audience and even interactive touch displays. Digital signage is the most cost-effective way to boost sales and company image.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>LED Signage</strong></span></h4>\r\n<p>According to our Signage manufacturing services, we supply a qualitative array of LED Display boards in Saudi Arabia. To ensure that the offered signage stands are perfect on international quality parameters, we manufacture them by utilizing modernistic technology. We have many specifications of LED sign boards for supply to the customers as per their precise requirements.</p>\r\n<p>We offer the best Quality imported LED Display Walls in Various Sizes and Specifications like P10, P6, and P4 for Outdoor and Indoor Use. We also provide 100% waterproof IP 65 cases for maximum Durability and Life.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\">Video Walls</span></h4>\r\n<p>We have expertise in supplying a wide assortment of LED Video walls. We craft Video Walls using the best quality components and advanced technology with the aid of our adept professionals. We offer the video walls checked on various parameters in line with the industry-accepted standards. Clients may also get this video wall from us at industry-leading costs.&nbsp;</p>\r\n<p>As an experienced signage design company in Saudi, our experts in display technology design large-scale display systems. Our best-in-class video walls enclose a wide range of various sizes, resolutions, and technologies. &nbsp;It features the narrowest bezels, the most flexible mounting systems, and the slimmest installation depths.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>DISCOVERING EXCELLENCE IN SIGNAGE DESIGNING</strong></span></h3>\r\n<h4><span style=\"font-size: 12pt;\">Being the finest signage design company in Saudi Arabia, we bring creativity beyond conformity.</span></h4>\r\n<p>We don&rsquo;t just follow the trends, we set it. We have a team of creative designers who can think outside the box to conceptualize unique and eye-catching signage solutions. We design captivating and attention-grabbing signage to make your brand stand out from the crowd. Experience is priceless in the signage industry. We have a portfolio of diverse projects, from short business signs to large-scale corporate installations. Our designers and technicians have the knowledge and skills to handle any signage challenge, no matter how complex.</p>\r\n<p><strong>ADLINE MEDIA can transform your signage ideas into a remarkable reality.</strong></p>', 'Yes', 'uploads/service/thumbnail_image/service-thumbnail-image-4.png', 'alt=\"Adline Media\"', 'uploads/service/image/service-image.png', 'alt=\"Adline Media\"', 'uploads/service/banner/service-banner-22.png', 'alt=\"Adline Media\"', 'Best Signages Manufacturer & Design Company-Adline Media', 'Adline Media specializes in creating impactful signages. As a top signages manufacturer and design company, we transform your vision into stunning visual communication.', '', '', 'Active', 4, NULL, '2023-02-12 15:28:38', '2023-12-04 03:31:52'),
(11, 3, 'Virtual Reality', 'virtual-reality', NULL, '<p>Virtual Reality (VR) is a computer-generated environment that simulates a realistic experience. This experience is often created using a combination of computer hardware and software, providing users with an immersive and interactive environment. In a virtual reality setting, users can explore and interact with the virtual world in a way that mimics real-world experiences.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Virtual reality includes several key components:</strong></span></h3>\r\n<h2><strong><span style=\"font-size: 18pt;\">Head Mounted Display</span></strong></h2>\r\n<p>HMD is a device worn on the head that typically includes a pair of screens (one for each eye) to display the virtual environment. HMDs may also have sensors to track head movements, allowing users to look around and feel like they are present in the virtual space.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong><span style=\"font-size: 18pt;\">Input Devices</span></strong></h3>\r\n<p>Users interact with the virtual environment using input devices such as motion controllers, gloves, or other tools that enable them to manipulate objects and navigate within the virtual world.</p>\r\n<p>&nbsp;</p>\r\n<h6><span style=\"font-size: 18pt;\"><strong>Computer Hardware</strong></span></h6>\r\n<p>Powerful computers or gaming consoles are often required to generate high-quality graphics and perform the calculations necessary for a smooth and realistic VR experience.</p>\r\n<p>&nbsp;</p>\r\n<h6><span style=\"font-size: 18pt;\"><strong>Sensors</strong></span></h6>\r\n<p>Sensors are for tracking the user\'s movements and gestures, enhancing the sense of presence in the virtual world. There are different sensors, including accelerometers, gyroscopes, and external cameras.<br />Software</p>\r\n<p>We create VR experiences using specialized software and applications. It can range from games and simulations to training programs and educational content.</p>\r\n<p>By providing a realistic experience using a computer-generated environment, virtual reality can be applicable in various fields, including gaming, education, healthcare, architecture, and more.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-13.png', 'alt=\"Virtual Reality\"', 'uploads/service/banner/service-banner-38.png', 'alt=\"Banner-service\"', 'Virtual Reality', 'Virtual Reality', '', '', 'Active', 0, NULL, '2023-11-06 00:40:24', '2023-11-28 05:04:40'),
(12, 3, 'Hologram', 'hologram', NULL, '<p>A hologram is a three-dimensional image generated by light beam interference. Unlike traditional photographs or images, holograms capture both the intensity and phase of light waves, allowing them to recreate a realistic 3D representation of an object or scene. The process of making holograms is called holography.</p>\r\n<h2><span style=\"font-size: 18pt;\">Capturing of Light Information</span></h2>\r\n<p>Unlike 2D images, which capture only the intensity of light, holograms capture both the amplitude and phase of light waves. It allows them to store more information about the light field, enabling the creation of a more realistic 3D image.</p>\r\n<h2><span style=\"font-size: 18pt;\"><strong>Patterns of Interference</strong></span></h2>\r\n<p>Holograms are created by recording the interference pattern between two coherent light sources. One beam, the reference beam, remains unchanged, while the other beam, the object beam, interacts with the recording of the object. The interference pattern is recorded on a photosensitive surface, such as a holographic film or a digital sensor.</p>\r\n<p><span style=\"font-size: 18pt;\"><strong>Reconstruction of 3D Image</strong></span></p>\r\n<p>When illuminated with light similar to that used during the recording, the hologram can recreate a three-dimensional image of the original object. The viewer perceives depth, parallax, and other visual cues that contribute to a realistic 3D experience.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>There are two types of Holograms:</strong></span></h3>\r\n<h4>&nbsp;</h4>\r\n<h4><span style=\"font-size: 18pt;\"><strong>Transmission Holograms</strong></span></h4>\r\n<p>These holograms allow light to be transmitted through them, and the 3D image is visible from the side where the light is coming through.</p>\r\n<h4><span style=\"font-size: 18pt;\"><strong>Reflection Holograms</strong></span></h4>\r\n<p>These holograms are viewed by reflecting light off the holographic surface.</p>\r\n<p>Holograms can be applicable for various purposes, including arts and entertainment, security, medical imaging, and scientific visualization.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-14.png', 'alt=\"Hologram\"', 'uploads/service/banner/service-banner-37.png', 'alt=\"Banner-service\"', 'Hologram', 'Hologram', '', '', 'Active', 0, NULL, '2023-11-06 00:40:55', '2023-11-28 05:03:26'),
(13, 0, 'Corporate Gifts', 'corporate-gifts', '<p>We deliver exceptional corporate gifts as we understand the eternal beauty of exchanging gifts. As the best provider of corporate gifts in Saudi Arabia, our meticulously crafted corporate gifts tell stories about clients, employees, and partners.</p>', '<h1><strong>Strengthening Relationships, Corporate Gifts</strong></h1>\r\n<p>Building and maintaining strong relationships is crucial to success in today&rsquo;s dynamic business landscape. Businesses are constantly seeking ways to connect with their valued business partners, dedicated employees, and loyal customers. One effective strategy that transcends traditional marketing is the art of corporate gifting. A well-chosen gift not only promotes your brand but also establishes a lasting bond with those who matter most to your business.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 14pt;\"><strong>Tailored to Perfection</strong></span></h3>\r\n<p>We are among the leading providers of customized corporate gifts in Saudi Arabia and understand the significance of corporate gifting. We offer a wide array of customized gift items designed to align seamlessly with your unique requirements, budget constraints, and even the changing seasons. Our commitment to excellence extends to global sourcing, ensuring that we can fulfill orders of any size, sourced from around the world.</p>\r\n<p>In the competitive world of business, companies are continually in pursuit of fresh and innovative ways to engage their customers and clients. This quest for novelty leads to the need for an agency that not only suggests relevant products but also understands the intricacies of your brand guidelines. We pride ourselves on being that agency.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong><span style=\"font-size: 14pt;\">Why Choose Us?</span>&nbsp;</strong></h3>\r\n<p>As one of the foremost providers of bespoke corporate gifts in Saudi Arabia, we deeply comprehend the importance of corporate gifting within the Saudi market.</p>\r\n<h3>&nbsp;</h3>\r\n<h4><span style=\"font-size: 14pt;\"><strong>1. Product Expertise:&nbsp;</strong></span></h4>\r\n<p>Our team&rsquo;s deep knowledge of the corporate gifting landscape allows us to recommend products that not only represent your brand but also resonate with your audience. Whether you&rsquo;re aiming for a classic, timeless look or something that reflects the latest trends, our extensive range of options has you covered.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>2. Budget-Friendly Solutions: </strong></span>&nbsp;</h4>\r\n<p>We understand that every company operates within a specific budget. Our team excels at crafting solutions that align with your financial parameters, ensuring that your investment delivers maximum value.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>3. Seasonal Relevance:</strong>&nbsp;</span></h4>\r\n<p>The seasons and holidays provide unique opportunities for gifting. Whether it&rsquo;s a summer promotion, a festive year-end gift, or something in between, we tailor our recommendations to ensure your gifts remain relevant and impactful.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>4. Global Sourcing Network:</strong></span></h4>\r\n<p>Our extensive global network enables us to source products from every corner of the world. This not only guarantees diversity in your gifting options but also allows us to secure high-quality items at competitive prices.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>5. Quality Assurance:&nbsp;</strong></span></h4>\r\n<p>Quality is at the core of everything we do. From the products we recommend to the customization process and the final delivery, we maintain stringent quality control standards to guarantee your satisfaction.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>6. Prompt Turnaround:&nbsp;</strong></span></h4>\r\n<p>In the fast-paced business world, timing is often of the essence. We take pride in our ability to meet tight deadlines without compromising on quality. You can rely on us to deliver your corporate gifts promptly and efficiently.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Elevate Your Gifting Game: Discover Our Hottest Picks!</strong></span></h3>\r\n<p>Wondering what&rsquo;s popular in the world of corporate gifting? Here are some of our fast-moving items:</p>\r\n<ul>\r\n<li><strong>Customized Corporate Stationery: </strong>Timeless and sophisticated, personalized stationery items leave a lasting impression and serve as exceptional gifts for your corporate partners and clients in Saudi Arabia.</li>\r\n<li><strong>Branded Workwear: </strong>Utilizing wearable branding is a potent strategy. Branded apparel not only promotes your corporate identity but also fosters a sense of unity and professionalism among your Saudi employees.</li>\r\n<li><strong>Sustainable Promotional Merchandise: </strong>In an era of heightened environmental awareness, eco-friendly gifts are highly appreciated. Consider options such as reusable bags, bamboo products, or items made from recycled materials to underscore your commitment to sustainability.</li>\r\n<li><strong>Cutting-Edge Technology Accessories: </strong>Stay at the forefront of innovation with state-of-the-art tech gadgets. From wireless chargers to stylish smart speakers, these items seamlessly blend functionality with style, making them ideal corporate gifts for the Saudi market.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Elevate Your Brand, Strengthen Your Bonds</strong></span></h4>\r\n<p>Corporate gifting is an artful endeavour that allows businesses to transcend traditional marketing boundaries and make lasting impressions. It provides a unique platform to not only enhance your brand&rsquo;s image but also to cultivate and fortify valuable relationships. At Adline Media, as a prominent provider of tailor-made corporate gifts in Saudi Arabia, we are dedicated to being your trusted companion on this journey.</p>\r\n<p>Whether you seek the enduring charm of timeless classics or the innovative allure of cutting-edge creations, we possess the knowledge, creativity, and resources to meet your corporate gifting requirements with precision. Our extensive selection of gifts spans a spectrum of tastes and preferences, offering you a diverse canvas from which to choose the perfect items that align seamlessly with your brand.</p>\r\n<p>In a world where connections are paramount, let your corporate gifts be the bridge that forges deeper connections with your clients, partners, and employees. Let them be a tangible embodiment of your brand&rsquo;s values and an enduring testament to your unwavering commitment to excellence.</p>\r\n<p>Elevate your brand, and strengthen your bonds &ndash; at Adline Media, this is not just a promise, but a commitment we uphold. Contact us today, and together, we&rsquo;ll unlock the immense potential of corporate gifting at its finest.</p>', 'Yes', 'uploads/service/thumbnail_image/service-thumbnail-image-5.png', 'alt=\"corporate-gifts\"', 'uploads/service/image/service-image-6.png', 'alt=\"corporate-gifts\"', 'uploads/service/banner/service-banner-15.png', 'alt=\"Adline Media\"', 'Customized Corporate Gifts in Saudi Arabia - Adline Media', 'Adline Media offers an exquisite range of customized corporate gifts in Saudi Arabia. Elevate your brand with customized corporate gifts that leave a lasting impression.', '', '', 'Active', 7, NULL, '2023-11-16 05:15:20', '2023-12-04 03:45:12');
INSERT INTO `services` (`id`, `parent_id`, `title`, `short_url`, `home_description`, `description`, `display_to_home`, `thumbnail_image`, `thumbnail_image_meta_tag`, `image`, `image_meta_tag`, `banner`, `banner_meta_tag`, `meta_title`, `meta_description`, `meta_keyword`, `other_meta_tag`, `status`, `sort_order`, `deleted_at`, `created_at`, `updated_at`) VALUES
(14, 0, '3D Printing', '3d-printing', '<p>We bring your creative and informative ideas to life through several layers of 3D printing. We ensure the best 3D printing journey with all technical aspects. Our skilled designers transform your concepts into digital models through excellent 3D works.</p>', '<h1><strong>Unlocking Imagination: Crafting Tomorrow with 3D Printing Today</strong></h1>\r\n<p>Experience the forefront of innovation and creativity at Adline Media. Our 3D Printing Services are not just about printing objects; they&rsquo;re about bringing your imagination to life, revolutionizing industries, and sparking endless possibilities.</p>\r\n<p>As a premier provider of 3D Printing in Saudi Arabia, Our journey begins with your vision. Whether you&rsquo;re an artist, engineer, designer, or an individual with a unique idea, we are here to bring your concepts to life. With a fusion of your imagination and our technical expertise, we take your ideas from the drawing board to the tangible realm.</p>\r\n<p>Our services extend beyond the conventional realm of 3D printing. We offer a comprehensive suite of solutions, including design support, prototyping, and more, because we understand that true innovation requires a holistic approach.</p>\r\n<p>At Adline Media, affordability meets ingenuity. We believe that innovation should be accessible to all, and our cost-effective solutions reflect that belief.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>Why Choose Us &ndash; Your Trusted 3D Printing Partner in Saudi Arabia</strong></h2>\r\n<p>When it comes to 3D printing companies in Saudi Arabia, we stand out as your premier choice for innovation, quality, and excellence. At Adline Media, we bring expertise and dedication to the forefront of 3D printing technology.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>1. Your Vision, Our Expertise&nbsp;</strong></span></h4>\r\n<p>At Ad Line Media, we are passionate about turning your ideas into reality. Whether you&rsquo;re an artist, engineer, designer, or visionary, we&rsquo;re here to bridge the gap between imagination and creation. Our team of skilled professionals collaborates closely with you, taking your vision and enhancing it with our technical expertise. We understand that every project is unique, and we tailor our approach to meet your specific needs, ensuring that your concepts are transformed into tangible, high-quality objects.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>2. Beyond Printing</strong></span></h4>\r\n<p>Quality is paramount in our partnership. We have a dedicated team of design experts who meticulously review and fine-tune your concepts, ensuring they meet the highest standards of precision and excellence. Our expertise in 3D Printing in Saudi Arabia means that your designs are not just printed; they are transformed into works of art.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>3. Speed Meets Precision:&nbsp;</strong></span></h4>\r\n<p>Today&rsquo;s world is fast-paced, and we understand that time is of the essence. That&rsquo;s why we&rsquo;ve invested in cutting-edge technology to deliver results quickly without compromising on precision or quality. Our state-of-the-art equipment and streamlined processes ensure that your projects are completed with utmost accuracy, meeting your deadlines and exceeding your expectations.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>4. Affordable Excellence:</strong></span></h4>\r\n<p>Quality should never be out of reach. At Ad Line Media, we firmly believe that innovation should be accessible to all, regardless of budget constraints. Our cost-effective solutions make 3D printing services affordable without compromising on excellence. You can trust us to deliver outstanding results that exceed your expectations and elevate your projects to the highest level of excellence.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>5. Comprehensive Solutions</strong></span></h4>\r\n<p>To meet the diverse requirements of various industries, we offer a wide range of 3D printing services. Whether you&rsquo;re looking for rapid prototyping, intricate model production, or design support, our comprehensive range of solutions has got you covered. Depending on your project requirements, we will tailor our services accordingly.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>6. Rapid Prototyping</strong></span></h4>\r\n<p>We understand that innovation often thrives through experimentation. Therefore, we offer efficient prototyping services that enable you to test, iterate, and perfect your designs swiftly. Our rapid prototyping solutions accelerate your development process, ensuring that your final creations meet your exact specifications.</p>\r\n<p>With us as your 3D printing partner in Saudi Arabia, you gain access to local expertise, global quality, comprehensive solutions, innovation support, speed, affordability, and efficient prototyping. We&rsquo;re not just a service provider; we&rsquo;re your partner in turning your ideas into reality with precision and excellence.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Unleash Imagination, Forge Innovation: Your 3D Printing Journey Awaits!</strong></span></h3>\r\n<p>As we draw the curtain on our journey through the dynamic world of 3D printing, we invite you to explore new horizons with Ad Line Media, your steadfast partner in 3D printing companies in Saudi Arabia.</p>\r\n<p>In this era of innovation, where imagination knows no bounds, we&rsquo;ve been honoured to be your guiding star, illuminating the path from concept to creation. Our commitment to excellence has been the driving force behind our every endeavour, and our dedication to you, our valued clients, has been unwavering.</p>\r\n<p>We are not content with the status quo. Innovation is our constant pursuit, and we invite you to join us on this journey of continuous improvement. With our state-of-the-art technology and cost-effective solutions, we ensure that 3D printing remains accessible to all, breaking down barriers and opening up endless possibilities.</p>\r\n<p>AD Line Media is not just a name; it&rsquo;s a promise-a promise of quality, creativity, and partnership. We are your trusted ally in the world of 3D Printing in Saudi Arabia, and together, we will continue to shape the future.</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Connect with Us For More Information. Your dreams are our canvas and together, we will paint a vibrant, three-dimensional future.</strong></span></h4>', 'Yes', 'uploads/service/thumbnail_image/service-thumbnail-image-6.png', 'alt=\"3D-printing\"', 'uploads/service/image/service-image-7.png', 'alt=\"3D-printing\"', 'uploads/service/banner/service-banner-13.png', 'alt=\"Adline Media\"', 'Best 3D Printing Company in Saudi Arabia - Adline Media', 'Adline Media offers advanced 3D printing in Saudi Arabia. As one of the top 3D printing companies, we bring your ideas to life with precision and innovation.', '', '', 'Active', 5, NULL, '2023-11-17 00:28:13', '2023-12-04 03:47:36'),
(15, 0, 'Visual Effects', 'visual-effects', '<p>We have a team of experts who tell stories through outstanding visual effects. We provide visual effects with high technology and make the audience escape from reality. Our VFX artists seamlessly integrate computer graphics to enhance visual narrative.</p>', '<p>We are backed by a team of passionate and talented professionals who want to deliver nothing but outstanding visual effects utilizing high end technology &nbsp;to enhanced visual impact of your contents.</p>\r\n<p>Visual effects is the process by which imagery is created or manipulated outside the context of a live action shot in filmmaking and video production. The integration of live action footage and CG elements to create realistic imagery.</p>\r\n<p>&nbsp;</p>\r\n<h2>Motion</h2>\r\n<p>Animation or digital footage creating the illusion of motion</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>2D &amp; 3 D Animation</strong></h2>\r\n<p>We make animation &nbsp;videos for &nbsp;Advertising and Marketing</p>', 'No', NULL, 'alt=\"Adline Media\"', NULL, 'alt=\"Adline Media\"', 'uploads/service/banner/service-banner-11.png', 'alt=\"Adline Media\"', 'Best Visual Effects for Advertising and Marketing- Adline media', 'We’re a team of creatives who are excited about unique ideas and help businesses to create amazing identity by crafting top-notch Advertisements.', '', '', 'Inactive', 0, NULL, '2023-11-17 00:33:47', '2023-11-28 04:51:37'),
(16, 0, 'Printing Service', 'printing-service', '<p>As the top-rate sticker printing service in Saudi Arabia, we provide extensive sticker printing service with quality and precision. As a part of vehicle branding through sticker printing, our experts deliver quality stickers to promote your brand.</p>', '<h1><strong>THE ART OF IDEAL STICKER PRINTING IN SAUDI ARABIA</strong></h1>\r\n<p>ADLINE MEDIA offers sticker printing in Saudi Arabia for different purposes, including branding, promotional materials, labeling, and more. We provide a wide range of sticker printing services to meet all your branding and personal needs. At ADLINE MEDIA, we deliver sticker printing services with top-quality stickers. We specialize in turning ordinary vehicles into attention-grabbing brands through our excellent sticker printing services.</p>\r\n<p>We are providing vehicle branding with sticker printing in Saudi Arabia. We promote your brand by attaching stickers of your logo or brand identity on products, packaging, and promotional materials. Vehicle branding is the best way to promote your brand. We provide vehicle branding in Saudi Arabia to promote your business. Vehicle branding is one of the versatile marketing strategies that allows businesses to thrive. As a leading printing company in Saudi Arabia, we help to increase your brand recognition and improve your business through vehicle branding.</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>REDEFINE YOUR BRAND THROUGH VEHICLE BRANDING</strong></h2>\r\n<p>Many business firms use vehicle branding in Saudi Arabia to promote their products and services. Vehicle branding is a powerful way to increase brand visibility and recognition. We make your brand more stunning with vehicle branding through high-quality sticker printing techniques. We provide the best sticker printing services and vehicle branding in Saudi Arabia. Uplift your brand with dynamic vehicle branding using sticker printing.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\">Diverse Range of Stickers</span></h4>\r\n<p>We have a diverse range of stickers according to your choice. You can select the perfect sticker printing for your vehicle branding. Choose from various sticker types, including labels, decals, and unique application stickers.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\">Customization</span></h4>\r\n<p>Customize every aspect of your stickers, from design to material, shape, size, and finish. Ensure that the sticker matches your vehicle branding. Every project is customized to suit your specific vehicle type in vehicle branding.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\">Eye-Catching Designs</span></h4>\r\n<p>We have skilled designers who work closely with you to create captivating graphics that align with your brand identity and messaging. Our professional graphic designer creates eye-catching and memorable designs that represent your brand effectively. Embrace your inner artist with our easy-to-use design tools, or collaborate with our skilled designers for professional guidance.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\">Quality that Matters</span></h4>\r\n<p>When you choose vehicle branding with sticker printing, you must be concerned about the quality. We ensure quality with precision and color vibrancy, delivering stickers with cutting-edge printing techniques.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\">Material Excellence</span></h4>\r\n<p>We use top-tier vinyl and printing materials that withstand the elements, ensuring your vehicle branding remains vibrant and intact. Select from a curated collection of premium materials, each chosen for its durability, aesthetics, and suitability for your purpose.</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>TYPES OF VEHICLE BRANDING</strong></h2>\r\n<h4>&nbsp;</h4>\r\n<h4><strong><span style=\"font-size: 14pt;\">Vinyl decals</span>&nbsp;</strong></h4>\r\n<p>Vinyl decals are custom-designed stickers that adhere to the vehicle&rsquo;s surface. They can cover specific areas or the entire vehicle. These are smaller graphics or logos applied to different parts.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong><span style=\"font-size: 14pt;\">Partial Wraps</span>&nbsp;</strong></h4>\r\n<p>Partial wraps cover a significant portion of the vehicle, combining printed graphics with the vehicle&rsquo;s color.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Full Wraps</strong></span>&nbsp;</h4>\r\n<p>Completely cover the vehicle with printed graphics, creating a visually striking effect. It transforms the vehicle&rsquo;s appearance very effectively.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong><span style=\"font-size: 14pt;\">Window Perfs</span></strong></h4>\r\n<p>Special perforated vinyl for windows allows visibility from the inside while displaying graphics on the outside.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 14pt;\"><strong>BENEFITS OF VEHICLE BRANDING WITH STICKER PRINTING</strong></span></h3>\r\n<p>Vehicle branding with sticker printing is very much impactful in business. We provide unique and excellent sticker printing for vehicle branding in Saudi Arabia. It consists of so many benefits.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Cost &ndash; Effective</strong></span></h4>\r\n<p>Compared to traditional advertising methods, vehicle branding offers a cost-effective, long-term solution with a broad reach.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong><span style=\"font-size: 14pt;\">Professionalism</span></strong></h4>\r\n<p>A branded vehicle exudes professionalism and credibility, boosting customer trust and confidence in your brand.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Mobile Exposure</strong></span></h4>\r\n<p>Your branded vehicles become mobile billboards, reaching a diverse audience across different locations and demographics.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Local Impact</strong></span>&nbsp;</h4>\r\n<p>Local audiences are more likely to remember and engage with your brand when they see it on vehicles within their community.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong><span style=\"font-size: 14pt;\">Versatility</span>&nbsp;</strong></h4>\r\n<p>Vehicle branding isn&rsquo;t limited to just company cars. Personal vehicles can also apply vehicle branding for promotional events.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>PROCESS OF APPLICATION</strong></span></h4>\r\n<p>We start by understanding your brand, goals, and vision for the vehicle branding.<br />Clean and arrange the vehicle&rsquo;s surface thoroughly to ensure proper grip of the printing stickers, then apply the stickers to ensure a smooth and seamless finish. Vehicle wraps and decals prevent the elements, including UV rays, rain, and road debris.</p>', 'Yes', 'uploads/service/thumbnail_image/service-thumbnail-image-7.png', 'alt=\"printing-service\"', 'uploads/service/image/service-image-11.png', 'alt=\"Printing Service\"', 'uploads/service/banner/service-banner-9.png', 'alt=\"Adline Media\"', 'Best Sticker Printing & Vehicle Branding in Saudi - Adline', 'Boost your brand visibility with top-notch sticker printing & vehicle branding by Adline Media in Saudi Arabia. Discover our creative solutions.', '', '', 'Active', 6, NULL, '2023-11-17 00:44:01', '2023-12-04 03:55:28'),
(17, 0, 'Advertising', 'advertising', '<div class=\"row\">\r\n<div class=\"col s9 content-description\">We bring strategic brilliance and creative excellence through our perfect advertising campaigns. Our professional advertising and digital marketing strategists analyze market trends and provide cohesive advertising campaigns for the best branding.&nbsp;</div>\r\n</div>', '<h1>ADVERTISING AGENCY IN SAUDI ARABIA&nbsp;</h1>\r\n<p>As the best advertising agency in Saudi Arabia, ADLINE MEDIA offers a wide range of services like market research, strategic planning, creative services, digital marketing, branding, public relations, campaign monitoring analysis, and more. We develop innovative concepts, advertisements, and marketing materials that capture consumer&rsquo;s attention and effectively convey the client&rsquo;s message. We work closely with clients to understand their goals, preferences, and brand identity. At ADLINE MEDIA, we are building strong client relationships to deliver successful campaigns. We stay alert to the latest industry trends, including digital marketing innovations, data-driven advertising, and emerging technologies. Our advertising agency in Saudi Arabia determines the most suitable media for your business to reach the target audience.</p>\r\n<p>&nbsp;</p>\r\n<h2><strong><span style=\"font-size: 18pt;\">SERVICES WE PROVIDE </span></strong></h2>\r\n<h3>&nbsp;</h3>\r\n<h3><span style=\"font-size: 14pt;\"><strong>DIGITAL MARKETING&nbsp;</strong></span></h3>\r\n<p>ADLINE MEDIA is one of the best digital marketing agencies in Saudi Arabia. We provide proper digital marketing services to thrive in your business. Digital marketing is the finest way to bring your business to the audience and market your product efficiently. We offer different services in Saudi Arabia according to the client&rsquo;s needs. We have a professional team with expertise in several areas of digital marketing. We have SEO specialists, Content Writers, Social Media Managers, Graphic Designers, Web Developers, and Data Analysts. We work intently with clients to understand their business ideas, target audience, and competitive landscape. We can work with businesses of various sizes and industries, making them a scalable solution for companies looking to expand their online presence. Digital marketing is a rapidly evolving field with constant changes in algorithms, platforms, and consumer behavior. As the top advertising agency in Saudi Arabia, we stay updated with the latest trends and best practices to ensure our clients remain competitive.</p>\r\n<p>As the best advertising agency in Saudi Arabia, we provide digital marketing services like Search Engine Optimization (SEO), Social Media Marketing, Paid Advertisements, and Website Development.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>SEARCH ENGINE OPTIMIZATION (SEO)</strong></span></h3>\r\n<p>We are the best Digital Marketing agency in Saudi Arabia that provides SEO services. Search Engine Optimization (SEO) is a marketing method for optimizing a website or online content to improve its visibility in search engine results pages. The main objective of SEO is to increase organic (non-paid) traffic to a website by improving its ranking for relevant search queries.</p>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>Keyword Research&nbsp;</strong></h4>\r\n<p>The base of Search Engine Optimization (SEO) is Keyword Research. It involves identifying the search terms and phrases (keywords) that potential users are likely to enter into search engines when looking for information related to your website or business.</p>\r\n<h4>&nbsp;</h4>\r\n<h4><strong>On-Page SEO</strong>&nbsp;</h4>\r\n<p>On-page SEO involves optimizing specific website pages to make them more search engine-friendly. It includes optimizing title tags, meta descriptions, header tags, and URL structures.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Content Creation</strong></h4>\r\n<p>High-quality, relevant, and valuable content is a critical component of SEO. Regularly publishing fresh and informative content can help improve your website&rsquo;s ranking.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Technical SEO</strong></h4>\r\n<p>Technical SEO focuses on the technical aspects of a website, ensuring that it is easy for search engines to crawl and index. It includes optimizing website speed and mobile-friendliness, fixing broken links, and ensuring proper use of HTML tags.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Local SEO</strong></h4>\r\n<p>Local SEO involves creating and optimizing a Google My Business profile, getting customer reviews, and ensuring consistent NAP (Name, Address, Phone) information across online directories.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Analytics &amp; Monitoring</strong></h4>\r\n<p>Regularly monitoring your website&rsquo;s performance through tools like Google Analytics allows you to track the impact of your SEO efforts. You can measure organic traffic, click-through rates, and conversion rates.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Algorithm Updates</strong></h4>\r\n<p>Search engines like Google frequently update their algorithms. Our SEO professionals stay up-to-date with these changes to adapt their strategies accordingly.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Long-Term Strategy&nbsp;</strong></h4>\r\n<p>SEO often takes time to see significant improvements in search rankings. A long-term strategy and commitment to providing value to users are essential for success.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>SOCIAL MEDIA MARKETING</strong></span></h3>\r\n<p>Social Media Marketing is a digital marketing method that involves using social media platforms to connect with your audience, build brand awareness, drive website traffic, and ultimately achieve your business goals. As the best Social Media Marketing agency in Saudi Arabia, we provide a variety of tactics and activities to promote your brand on social media and improve your marketing strategy. At AD LINE MEDIA, we aim to create and share content on Social Media networks to engage with customers to promote the brand and product.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Platform Selection</strong></h4>\r\n<p>Choosing the right social media platforms for your business is essential in Social Media Marketing. Different platforms denote different demographics and industries. The platforms include Facebook, Instagram, Twitter, LinkedIn and more.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Content Creation</strong></h4>\r\n<p>Our professionals develop high-quality content, including text, images, videos, infographics, and more. Content should resonate with your audience and align with your brand&rsquo;s identity.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Analytics and Insights</strong></h4>\r\n<p>Use analytics tools provided by social media platforms or third-party tools to track the performance of your content and campaigns. Analyze key metrics like reach, engagement, click-through rates, and conversions to refine your strategy.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Adapting Capability</strong>&nbsp;</h4>\r\n<p>We stay up-to-date with the evolving social media landscape. Platforms and algorithms change frequently, so we are prepared to adapt the strategy accordingly.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Hashtags</strong></h4>\r\n<p>Using relevant hashtags is very important to increase the discoverability of the content. Research popular and trending hashtags.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Compliance &amp; Ethics</strong></h4>\r\n<p>Be aware of the legal and ethical guidelines for social media marketing, including disclosure of sponsored content and data privacy regulations.</p>\r\n<p>In Social Media Marketing, Paid advertising is an important marketing strategy to build your brand to new heights. AD LINE MEDIA is one of the best Paid Advertising agencies in Saudi Arabia. We promote your brand&rsquo;s identity and market your product and services through comprehensive Paid Advertising services.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\">PAID ADVERTISING&nbsp;</span></h3>\r\n<p>Most social media platforms offer advertising options that allow businesses to reach a wider audience through paid promotions. There are various types of Paid Ads.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Social Media Advertising</strong></h4>\r\n<p>Social Media Advertising involves promoting content, products, or services on social media platforms like Facebook, Instagram, Twitter, LinkedIn, Pinterest, and Snapchat. These platforms offer highly targeted advertising options and sponsored posts.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Search Engine Advertising</strong>&nbsp;</h4>\r\n<p>Search Engine Advertising includes paid search ads on search engines like Google (Google Ads) and Bing (Bing Ads). These ads appear at the top of search engine results pages (SERPs).</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Display Advertising</strong>&nbsp;</h4>\r\n<p>Display ads appear on websites and apps in the form of banners, images, text, or multimedia. Google Display Network and social media advertising platforms like Facebook and Instagram Ads offer display advertising options.</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Video Advertising</strong></h4>\r\n<p>Video advertising is a method of displaying video content through the platforms like YouTube. It is an effective type of advertising in Paid ads.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong><span style=\"font-size: 18pt;\">BUILDING YOUR BRAND WITH PERFECTION</span></strong></h3>\r\n<p>We empower your brand&rsquo;s journey with innovative and impressive advertising strategies. Our ultimate vision is to build your brand with great success.</p>\r\n<p>As an advertising agency in Saudi Arabia, ADLINE MEDIA provides various advertising methods to promote your brand with the exact way of marketing. Our beneficial marketing services will digitally drive your brand to a different level. According to your needs and specifications, we will give you the best services to reach your brand to a large audience. As the leading advertising agency in Saudi Arabia, we promote several brands with innovative advertising strategies. We have a professional team with high capability and infinite ideas to promote your brand extraordinarily. We create impactful advertising campaigns for your business. Our excellent services in advertising will give you a great result in your business growth.</p>', 'No', 'uploads/service/thumbnail_image/service-thumbnail-image-9.png', 'alt=\"ADVERTISING\"', 'uploads/service/image/service-image-12.png', 'alt=\"ADVERTISING\"', 'uploads/service/banner/service-banner-6.png', 'alt=\"Adline Media\"', 'Best Advertising agency in Saudi Arabia-Adline Media', 'Adline Media, the top advertising firm in Saudi Arabia, can help clarify the impact of strategic marketing. By our new ideas, you can boost your brand reach new heights.', '', '', 'Active', 8, NULL, '2023-11-17 00:58:06', '2023-12-04 03:59:40'),
(18, 0, 'Audio Visual Engineering', 'audio-visual-engineering', '<p>We deliver accurate and highly creative media solutions in Saudi Arabia, considering the actual needs of our clients. We have an experienced and passionate team to transform your ideas and stories into extraordinary visual and auditory experiences.</p>', '<p><span style=\"font-weight: 400;\">ADLINE MEDIA provides Audio Visual Engineering, which creates immersive and engaging experiences. Audio-visual engineering involves film production, media production, casting, sound engineering, etc. This field encompasses a wide range of technologies and applications, from designing audio-visual systems for entertainment and events to creating complex setups for corporate environments, education, healthcare, arts and entertainment, and more.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">At ADLINE MEDIA, our audio-visual engineers are responsible for designing systems that integrate audio and visual components to meet specific requirements. It includes considering the acoustics of a space, selecting appropriate display technologies, designing sound systems, and determining the overall layout of the equipment. As the best media production company in Saudi Arabia, we provide integral audio-visual engineering to various film and media production, from capturing high-quality visuals and sound on set to post-production editing and the creation of immersive VR and AR experiences.</span></p>\r\n<p><span style=\"font-weight: 400;\">We have professionals in this field who work in various industries, including entertainment, education, corporate environments, healthcare, and more, contributing to the creation of extensive and effective audio-visual experiences. By providing the best experiences through audio-visual engineering, AD LINE MEDIA brings spectacular excellence in the fields of film production, media production, digital marketing, media buying, hard productions, and more around Saudi Arabia.</span></p>', 'Yes', 'uploads/service/thumbnail_image/service-thumbnail-image.png', 'alt=\"Media-Production\"', 'uploads/service/image/service-image-1.png', 'alt=\"Adline Media\"', 'uploads/service/banner/service-banner-4.png', 'alt=\"Adline Media\"', 'Audio Visual Engineering - adlinemedia', 'At Ad Line Media, we are your partners in bringing your cinematic dreams to life. As a leading film production service provider, we offer a comprehensive', '', '', 'Active', 2, NULL, '2023-11-22 23:54:48', '2023-11-28 04:48:56'),
(19, 3, 'Augmented Reality', 'augmented-reality', NULL, '<p>Augmented Reality (AR) is a technology that overlays digital information in the real world, such as images, sounds, or text. Unlike virtual reality, which immerses users in a completely artificial environment, augmented reality enhances the real-world experience by adding computer-generated elements. AR is available on a variety of devices, including smartphones, tablets, smart glasses, and heads-up displays.</p>\r\n<h2><span style=\"font-size: 14pt;\"><strong>Features and Components of Augmented Reality May Include:</strong></span></h2>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Sensors and Cameras</strong></span></h3>\r\n<p>Sensors such as GPS, accelerometers, gyroscopes, and cameras are frequently utilized in AR devices to help users understand real-world surroundings.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Display Devices</strong></span></h3>\r\n<p>AR content is frequently seen through a device\'s display, such as a smartphone screen or a set of smart glasses. Some Augmented Reality experiences can also be projected onto surfaces or built into specialized glasses.</p>\r\n<h6>&nbsp;</h6>\r\n<h6><span style=\"font-size: 18pt;\"><strong>Computer Processing &amp; Software</strong></span></h6>\r\n<p>AR applications rely on powerful processors to analyze the real-world environment and generate relevant digital information in real-time. AR software is in charge of recognizing and monitoring physical objects or characteristics and combining digital content on top of them.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h6><span style=\"font-size: 18pt;\"><strong>User Interface</strong></span></h6>\r\n<p>Interaction with AR content is typically through touchscreens, gestures, voice commands, or other intuitive input methods.</p>\r\n<p>Augmented reality can apply to various industries like gaming, healthcare, education, retail, marketing, advertising, and more. Augmented reality continues to evolve, and as technology advances, it plays an increasingly significant role in various sectors, enhancing the way people interact with and perceive the world around them.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-15.png', 'alt=\"augmented reality\"', 'uploads/service/banner/service-banner-36.png', 'alt=\"Banner-service\"', 'Augmented Reality', 'Augmented reality', '', '', 'Active', 0, NULL, '2023-11-23 05:32:35', '2023-11-28 05:02:38'),
(20, 4, 'Booth Design', 'booth-design', NULL, '<p>We provide outstanding booth designs for creating an exhibition booth or stand for events, trade shows, conferences, and other promotional activities. Our effective and stunning booth designs attract attention, communicate the brand&rsquo;s message, engage the visitors, and create a memorable experience.</p>\r\n<p>Our booth designs clearly define the objectives and goals of the booth. Whether it\'s brand awareness, lead generation, product showcase, or networking, the design should align with these goals. We observe and examine your brand to provide the precise booth design for your brand. As of that, we ensure that our booth design reflects the brand identity. We use eye-catching visuals to grab attention. High-quality graphics, signage, and multimedia displays can effectively communicate the key messages and draw visitors into the booth. We use the maximum technology to enhance the perfect booth experience.</p>\r\n<p>By considering sustainable booth design practices, we use eco-friendly materials, minimize waste, and explore options for reusable or recyclable components. Our effective booth design combines creativity, strategic thinking, and a deep understanding of the brand and its target audience. AD LINE MEDIA provides well-designed booths for successful and eventful exhibitions.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-8.png', 'alt=\"Booth Design\"', 'uploads/service/banner/service-banner-35.png', 'alt=\"Banner-service\"', 'Booth Design', 'Booth Design', '', '', 'Active', 1, NULL, '2023-11-23 05:37:56', '2023-11-28 05:02:03'),
(21, 4, 'Exhibition Booth Manufacturer', 'exhibition-booth-manufacturer', NULL, '<p><span style=\"font-weight: 400;\">Our reliable exhibition booth is well known in Saudi Arabia. We craft exhibition booths with excellent professionalism and precision. We provide a variety of exhibition booth services, designs, and solutions for businesses participating in trade shows, conferences, and other events. As the first-rate exhibition booth manufacturer in Saudi Arabia, we design exhibition booths considering the requirements of clients, such as booth size, design preferences, and budget.</span></p>\r\n<p><span style=\"font-weight: 400;\">The manufacturing of exhibition booths is a specialized field that consists of design, engineering, and construction. We have professionals in booth manufacturing who craft stunning booths considering every manufacturing aspect. The process typically begins with a consultation between the exhibition booth manufacturer and the client. As a manufacturer, we gather information about the client\'s goals, branding requirements, budget constraints, and any specific design preferences. After that, we design the concept and rendering, then material selection, fabrication, and construction.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Choosing the right exhibition booth manufacturer is crucial for the success of an event. At ADLINE MEDIA, we make your exhibition booth manufacturing successful.</span></p>', 'No', NULL, NULL, 'uploads/service/image/service-image-9.png', 'alt=\"Exhibition Booth Manufacturer\"', 'uploads/service/banner/service-banner-34.png', 'alt=\"Banner-service\"', 'Exhibition Booth Manufacturer', 'Exhibition Booth Manufacturer', '', '', 'Active', 2, NULL, '2023-11-23 05:39:05', '2023-11-28 05:01:29'),
(22, 4, 'In Mall Activation', 'in-mall-activation', NULL, '<p><span style=\"font-weight: 400;\">In-mall activation refers to promotional activities or events that take place within a shopping mall or retail center. These activations are designed to engage with shoppers, promote products or brands, and create a memorable experience within the mall environment. In-mall activations can take various forms, from pop-up shops and product demonstrations to interactive displays and promotional events. We provide in-mall activation and demand-generation campaigns to create brand awareness among customers and present new products or services to them.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">As we provide comprehensive in-mall activation campaigns, we choose the right location within the mall for the success of the activation. High-traffic areas, such as near entrances, escalators, or popular stores, can maximize visibility and foot traffic. During in-mall activation, we provide an opportunity to collect valuable data. It includes customer feedback, contact information for follow-up, and insights.</span></p>\r\n<p><span style=\"font-weight: 400;\">In-mall activations are effective for increasing brand visibility, driving foot traffic, and directly engaging with potential customers in a high-traffic retail environment. We offer successful in-mall activations with creative design, strategic planning, and effective execution to leave a positive and lasting impression on mall visitors.</span></p>', 'No', NULL, NULL, 'uploads/service/image/service-image-10.png', 'alt=\"In Mall Activation\"', 'uploads/service/banner/service-banner-33.png', 'alt=\"Banner-service\"', 'In Mall Activation', 'In Mall Activation', '', '', 'Active', 3, NULL, '2023-11-23 05:40:54', '2023-11-28 05:00:18'),
(23, 0, 'Large Format & Digital Prints', 'large-format-digital-prints', '<p>Large-format printing and digital prints refer to the production of printed materials on a larger scale than standard printing formats.</p>', '<p>Large-format printing and digital prints refer to the production of printed materials on a larger scale than standard printing formats. These formats are commonly used for various applications, including advertising, marketing, events, and decorative purposes. At ADLINE MEDIA, we provide beneficial large printing and digital printing services for your every business needs.</p>\r\n<p>As the leading printing company in Saudi Arabia, we provide disparate large printing services with advanced technology.</p>\r\n<p>We use inkjet printing and wide-format printers for large printing services.<br />Inkjet printing can produce high-quality prints with vibrant colors. This technology is versatile and suitable for various materials, including paper, vinyl, fabric, and more. Wide-format printers are designed to handle larger paper sizes and rolls. They are capable of printing banners, posters, signage, and other large-scale materials.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>Applications of Large Format Printing</strong></h3>\r\n<ul>\r\n<li>Outdoor Advertising</li>\r\n<li>Indoor Signage</li>\r\n<li>Vehicle Wraps</li>\r\n<li>Trade Show Graphics</li>\r\n<li>Wall Murals &amp; Decorations</li>\r\n</ul>\r\n<p>We use materials like vinyl, canvas, fabric, and paper for large-format printings. We provide digital prints with advanced digital printing technologies, such as UV printing and latex printing, which have improved the durability, speed, and versatility of large-format prints.</p>\r\n<p>Large-format printing plays a significant role in modern marketing and visual communication strategies, offering a versatile and impactful way to convey messages across various industries and applications.</p>', 'No', 'uploads/service/thumbnail_image/service-thumbnail-image-10.png', 'alt=\"Large Format & Digital Prints\"', 'uploads/service/image/service-image-32.png', 'alt=\"Large Format & Digital Prints\"', 'uploads/service/banner/service-banner-3.png', 'alt=\"Adline Media\"', 'Large Format & Digital Prints', 'Large Format & Digital Prints', '', '', 'Active', 11, NULL, '2023-11-23 05:44:16', '2023-11-28 04:48:39'),
(24, 23, 'Flag Printing', 'flag-printing', NULL, '<p><span style=\"font-weight: 400;\">Flag printing involves producing flags with specific designs, graphics, or branding. Flags serve various purposes, including national representation, advertising, decoration, and identification. ADLINE MEDIA provides flag printing using different techniques and materials, depending on the intended use and design requirements.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<h2><span style=\"font-size: 18pt;\"><strong>Digital Printing</strong></span></h2>\r\n<p><span style=\"font-weight: 400;\">Digital printing is a common and versatile method for flag production. It allows for full-color printing with intricate details and is suitable for shorter print runs.</span></p>\r\n<p>&nbsp;</p>\r\n<h2><span style=\"font-size: 18pt;\"><strong>Screen Printing</strong></span></h2>\r\n<p><span style=\"font-weight: 400;\">Screen printing is another popular technique for flag printing. It is often used for large quantities and is cost-effective for simple designs with fewer colors.</span></p>\r\n<p><span style=\"font-weight: 400;\">We use materials like polyester fabric, nylon fabric, and cotton for flag printing. We provide single-sided and double-sided flag printing. Single-sided flags have the design printed on one side, and the reverse side may be visible but faded. Double-sided flags have a design that is visible correctly on both sides. It is achieved by printing on two separate pieces of fabric sewn together with a block-out layer in between.</span></p>\r\n<p><span style=\"font-weight: 400;\">ADLINE MEDIA provides disparate flag printing with perfect finishing, weather resistance, and considering every requirement of the clients.</span></p>', 'No', NULL, NULL, 'uploads/service/image/service-image-33.png', 'alt=\"Flag Printing\"', 'uploads/service/banner/service-banner-32.png', 'alt=\"Banner-service\"', 'Flag Printing', 'Flag Printing', 'Flag Printing', '', 'Active', 0, NULL, '2023-11-23 05:47:44', '2023-11-28 04:59:50'),
(25, 23, 'Fabric Displays/ Prints', 'fabric-displays-prints', NULL, '<p><span style=\"font-weight: 400;\">AD LINE MEDIA provides fabric displays and printing services for every business and commercial need. Fabric displays and prints refer to visual representations or graphics that are printed on fabric materials. This form of printing is commonly used for a variety of applications, including trade show displays, event backdrops, retail signage, and interior decor. Fabric prints offer several advantages, including lightweight portability, vibrant color reproduction, and versatility in terms of size and shape.</span></p>\r\n<p>&nbsp;</p>\r\n<h3><strong><span style=\"font-size: 18pt;\">Dye Sublimation Printing</span></strong></h3>\r\n<p><span style=\"font-weight: 400;\">This technique involves transferring dye onto fabric using heat. Dye sublimation produces vibrant colors and allows for full-color printing with high detail. It is commonly used for polyester fabrics.</span></p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Direct-to-Fabric Printing</strong></span></h3>\r\n<p><span style=\"font-weight: 400;\">In this method, we directly apply ink to the fabric. It is suitable for various fabric types and allows for excellent color saturation.</span></p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Screen Printing</strong></span></h3>\r\n<p><span style=\"font-weight: 400;\">While more commonly used for other materials, screen printing can also be applied to fabric. It involves pressing ink through a mesh screen onto the fabric to create the desired image.</span></p>\r\n<p><span style=\"font-weight: 400;\">We use fabric types such as polyester, stretch fabric, and canvas in the procedure of fabric printing. Fabric prints have advantages such as durability, portability, versatility, and echo-friendly.</span></p>\r\n<p><span style=\"font-weight: 400;\">We choose the appropriate printing technique and fabric type based on the intended use and desired visual characteristics.</span></p>', 'No', NULL, NULL, 'uploads/service/image/service-image-34.png', 'alt=\"Fabric Displays Prints\"', 'uploads/service/banner/service-banner-31.png', 'alt=\"Banner-service\"', 'Fabric Displays/ Prints', 'Fabric Displays Prints', '', '', 'Active', 0, NULL, '2023-11-23 05:49:29', '2023-11-28 04:59:14'),
(26, 23, 'Tents & Umbrellas', 'tents-umbrellas', NULL, '<p>ADLINE MEDIA crafts custom-printed advertising tents and umbrellas, considering all the requirements of the customers. Custom printing on advertising tents and umbrellas is a popular and effective way to enhance brand visibility, promote products or services, and create a cohesive and professional look for outdoor events and spaces.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>Custom Printing on Advertising Tents:</strong></h2>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Brand Logos and Graphics</strong></span></h4>\r\n<p>Incorporate your brand logos, graphics, and key messages into the tent fabric. It is a prime space for increasing brand recognition and visibility at events.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Color Consistency</strong></span></h4>\r\n<p>Ensure that the colors used in the custom printing are consistent with your brand\'s color palette.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Full-Color Printing</strong></span></h4>\r\n<p>Take advantage of full-color printing capabilities to create eye-catching and vibrant designs. It is particularly important for grabbing attention at events and trade shows.</p>\r\n<p>&nbsp;</p>\r\n<h2><span style=\"font-size: 18pt;\"><strong>Custom Printing on Advertising Umbrellas:</strong></span></h2>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Logo Placement</strong></span></h4>\r\n<p>Strategically place your logo on the umbrella canopy, considering whether the logo should be visible when the umbrella is open or closed and whether it should be on one or multiple panels.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Brand Colors</strong></span></h4>\r\n<p>We choose umbrella colors that align with your brand colors. It creates a cohesive and visually appealing look, reinforcing brand identity.</p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Multiple Panels and Printing Areas</strong></span></h4>\r\n<p>Depending on the umbrella design, you may have multiple panels available for printing. We utilize these areas to showcase different aspects of your brand, such as taglines or product images.</p>\r\n<p>We provide custom printing on advertising tents and umbrellas by offering a powerful way to communicate your brand message and create a strong visual impact in outdoor settings.&nbsp;</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-35.png', 'alt=\"Tents & Umbrellas\"', 'uploads/service/banner/service-banner-30.png', 'alt=\"Banner-service\"', 'Tents & Umbrellas', 'Tents & Umbrellas', 'Tents & Umbrellas', '', 'Active', 0, NULL, '2023-11-23 05:50:26', '2023-11-28 04:58:43'),
(27, 23, 'Flex Banners', 'flex-banners', NULL, '<p><span style=\"font-weight: 400;\">At ADLINE MEDIA, we print and install the best quality flex banners. Flex banners are versatile, cost-effective, and widely used in the field of outdoor advertising. Whether you\'re promoting an event, business, product, or service, flex banners can be an effective outdoor advertising tool.</span></p>\r\n<p>&nbsp;</p>\r\n<h2><strong>Features of Our Flex Banners</strong></h2>\r\n<ul>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Eye-catching Graphics</strong></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Clear Messaging</strong></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Attaching Branding Elements</strong></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Provides Contact Information Attractively</strong></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Maintenance and Longevity of Flex Banners:</strong></span></h3>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Regular Inspection</strong></span></h4>\r\n<p><span style=\"font-weight: 400;\">Periodically inspect the condition of the flex banner. Check for signs of wear, tear, or fading. Replace banners that show significant signs of deterioration.</span></p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Storage:</strong></span></h4>\r\n<p><span style=\"font-weight: 400;\">If banners are not in use, store them properly in a dry and cool environment. Avoid prolonged exposure to direct sunlight when not in use.</span></p>\r\n<p>&nbsp;</p>\r\n<h4><span style=\"font-size: 14pt;\"><strong>Replace Timely:</strong></span></h4>\r\n<p><span style=\"font-weight: 400;\">Consider the duration for which the advertising campaign will run, and plan to replace banners as needed. Fresh, well-maintained banners are more effective.</span><br /><br /></p>\r\n<p><span style=\"font-weight: 400;\">We use high-quality printing materials for designing flex banners. Our professional graphic designers deliver exceptional designs and make the flex banners look stunning. We use precise weather-resistant materials to ensure the best quality of the flex banners. Whether used for short-term promotions or long-term brand awareness, careful planning and attention to design details contribute to the effectiveness of flex banner advertising. As the best branding company in Saudi Arabia, we provide the best flex banners for every branding.</span></p>', 'No', NULL, NULL, 'uploads/service/image/service-image-36.png', 'alt=\"Flex Banners\"', 'uploads/service/banner/service-banner-29.png', 'alt=\"Banner-service\"', 'Flex Banners', 'Flex Banners', 'Flex Banners', '', 'Active', 0, NULL, '2023-11-23 05:51:13', '2023-11-28 04:58:11');
INSERT INTO `services` (`id`, `parent_id`, `title`, `short_url`, `home_description`, `description`, `display_to_home`, `thumbnail_image`, `thumbnail_image_meta_tag`, `image`, `image_meta_tag`, `banner`, `banner_meta_tag`, `meta_title`, `meta_description`, `meta_keyword`, `other_meta_tag`, `status`, `sort_order`, `deleted_at`, `created_at`, `updated_at`) VALUES
(28, 23, 'Wall Vinyl', 'wall-vinyl', NULL, '<p>AdLine Media transforms spaces with high-quality custom-printed Wall Vinyl, ensuring a captivating visual experience tailored to your brand.&nbsp;</p>\r\n<h2><strong>Custom Printing on Wall Vinyl:</strong></h2>\r\n<ul>\r\n<li><strong>Branding Integration: Seamlessly incorporate your brand logos, graphics, and key messages into the wall vinyl, transforming your space into a powerful brand showcase.</strong></li>\r\n<li><strong>Color Precision: Ensure the colors used in custom printing align precisely with your brand\'s color palette, maintaining consistency for a professional and cohesive appearance.</strong></li>\r\n<li><strong>High-Resolution Imaging: Leverage our high-resolution printing capabilities to create stunning, detailed designs that leave a lasting impression on anyone entering the space.</strong></li>\r\n<li><strong>Custom Size Options: Tailor the size of the wall vinyl to fit your specific space requirements, allowing for flexibility and adaptability in various environments.</strong></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 14pt;\"><strong>Visual Impact:</strong></span></h3>\r\n<p>Make a statement with our Wall Vinyl Printing services, turning ordinary walls into extraordinary brand canvases. Whether it\'s retail spaces, offices, or event venues, our custom prints elevate the ambiance and reinforce brand identity.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 14pt;\"><strong>Cohesive Brand Environments:</strong></span></h3>\r\n<p>Achieve a cohesive and visually striking environment by seamlessly integrating Wall Vinyls that reflect your brand aesthetics. Trust Ad Line Media to transform your spaces into captivating brand narratives.</p>\r\n<p>Enhance your surroundings, captivate your audience, and amplify your brand presence with Ad Line Media\'s Wall Vinyl Printing services.&nbsp;</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-37.png', 'alt=\"Wall Vinyl\"', 'uploads/service/banner/service-banner-28.png', 'alt=\"Banner-service\"', 'Wall Vinyl', 'Wall Vinyl', 'Wall Vinyl', '', 'Active', 0, NULL, '2023-11-23 05:52:15', '2023-11-28 04:57:46'),
(29, 18, 'Film Production', 'film-production', NULL, '<p>At Adline Media, we are your partners in bringing your cinematic dreams to life. As a leading film production service provider, we offer a comprehensive range of creative and technical solutions tailored to meet your unique vision. We specialize in guiding you through each distinct phase of filmmaking, from the initial spark of an idea, scriptwriting, casting, shooting, editing, sound design, and all the way to screening the finished masterpiece before a captivated audience.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-19.png', 'alt=\"Film Production\"', 'uploads/service/banner/service-banner-27.png', 'alt=\"Banner-service\"', 'Film Production', 'Film Production', '', '', 'Active', 0, NULL, '2023-11-23 05:54:14', '2023-11-28 04:57:18'),
(30, 18, 'Media Production', 'media-production', NULL, '<p>We are your perfect ally in media production excellence. Our full production suite encompasses a diverse range of services to meet your every media need. From captivating video production, event coverage that leaves a lasting impression, and stunning aerial cinematography to striking photography, dynamic 2D/3D animation, and mesmerizing motion graphics, we&rsquo;ve got it all covered. With our team of skilled professionals and cutting-edge technology, your brand&rsquo;s story comes to life like never before.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-20.png', 'alt=\"Media Production\"', 'uploads/service/banner/service-banner-26.png', 'alt=\"Banner-service\"', 'Media Production', 'Media Production', '', '', 'Active', 0, NULL, '2023-11-23 05:54:50', '2023-11-28 04:56:49'),
(31, 18, '2D/3D Animation', '2d-3d-animation', NULL, '<p>Discover the limitless possibilities of animation and elevate your project with our expert team. With our expertise, we craft realistic scenes that capture the imagination and captivate the audience in 2D and 3D. The magic of 2D and 3D modelling transcends industries, finding applications in engineering, architecture, entertainment, film, VR, AR, special effects, game development, and commercial advertising. At Adline Media, we harness this magic to bring your visions to life.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-21.png', 'alt=\"2D-3D Animation\"', 'uploads/service/banner/service-banner-25.png', 'alt=\"Banner-service\"', '2D/3D Animation', '2D/3D Animation', '', '', 'Active', 0, NULL, '2023-11-23 06:17:33', '2023-11-28 04:56:19'),
(32, 18, 'VR & AR', 'vr-ar', NULL, '<p>We offer end-to-end strategy, design, and development services for Virtual Reality (VR) and Augmented Reality (AR) experiences, transforming your ideas into unforgettable realities. Whether you seek to engage your audience, educate, or create immersive experiences, we have the expertise to make it happen. Discover the limitless potential of VR and AR with Adline Media.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-22.png', 'alt=\"VR & AR\"', 'uploads/service/banner/service-banner-24.png', 'alt=\"Banner-service\"', 'VR & AR', 'VR & AR', '', '', 'Active', 0, NULL, '2023-11-23 06:18:08', '2023-11-28 04:55:44'),
(33, 18, 'Sound Engineering', 'sound-engineering', NULL, '<p>At Adline Media, we are the maestros behind the magic of sound, providing expert location sound and audio post-production for commercials, feature films, television, and documentaries. Our services encompass every aspect of audio production, from ADR and voiceovers to Foley and 5.1 surround mixing. With a focus on modern equipment that meets the highest quality standards available, we ensure that every auditory nuance is captured and crafted to perfection.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-23.png', 'alt=\"Sound Engineering\"', 'uploads/service/banner/service-banner-23.png', 'alt=\"Banner-service\"', 'Sound Engineering', 'Sound Engineering', '', '', 'Active', 0, NULL, '2023-11-23 06:18:28', '2023-11-28 04:55:17'),
(34, 18, 'Hard Productions', 'hard-productions', NULL, '<p>We make your creative vision a reality. At Adline Media, we&rsquo;re your dedicated partners in simplifying and enhancing the production process, no matter the scale or phase of your project &ndash; from development to post-production. We offer a comprehensive suite of services, including printings, signage, gift items, booths, special effects, screens, sounds, lights, equipment, and more.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-24.png', 'alt=\"Hard Productions\"', 'uploads/service/banner/service-banner-21.png', 'alt=\"Banner-service\"', 'Hard Productions', 'Hard Productions', '', '', 'Active', 0, NULL, '2023-11-23 06:19:02', '2023-11-28 04:54:37'),
(35, 18, 'Event Management', 'event-management', NULL, '<p>We are your trusted partners in crafting remarkable events that leave a lasting impression. Our full-service event management covers a diverse spectrum of occasions, including exhibitions, conferences, corporate events, carnivals, artist management, virtual and live events. Let us handle every aspect of your event so you can enjoy it without worrying.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-25.png', 'alt=\"Event Management\"', 'uploads/service/banner/service-banner-18.png', 'alt=\"Banner-service\"', 'Event Management', 'Event Management', '', '', 'Active', 0, NULL, '2023-11-23 06:19:27', '2023-11-28 04:53:09'),
(36, 18, 'Social Media', 'social-media', NULL, '<p>Let&rsquo;s shape the future of your online presence together. At Adline Media, we take your brand&rsquo;s digital presence to the next level. Our dedicated social media team works in perfect harmony to craft and manage your online persona across various platforms. We meticulously monitor, analyze, and report on your digital footprint, allowing us to adapt and develop your digital strategy in real time.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-26.png', 'alt=\"Social Media\"', 'uploads/service/banner/service-banner-16.png', 'alt=\"Banner-service\"', 'Social Media', 'Social Media', '', '', 'Active', 0, NULL, '2023-11-23 06:19:52', '2023-11-28 04:52:45'),
(37, 18, 'Digital Marketing', 'digital-marketing', NULL, '<p>Let Adline Media &nbsp;be your catalyst for success through transformative Digital Marketing. From optimizing your online presence to crafting compelling content, we&rsquo;ve got your digital marketing needs covered. We&rsquo;re here to help your business evolve in this dynamic digital landscape and thrive in an age of constant change.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-27.png', 'alt=\"Digital Marketing\"', 'uploads/service/banner/service-banner-14.png', 'alt=\"Banner-service\"', 'Digital Marketing', 'Digital Marketing', '', '', 'Active', 0, NULL, '2023-11-23 06:20:20', '2023-11-28 04:52:17'),
(38, 18, 'Media Buying', 'media-buying', NULL, '<p>With Adline Media, your brand&rsquo;s message finds its way to the right audience, achieving extraordinary results. We tailor your media plan based on your customer profiles and consumer behaviour, driving up your ROI, boosting brand awareness, and generating an abundance of leads. Our goal is to power your success in the digital landscape.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-28.png', 'alt=\"Media Buying\"', 'uploads/service/banner/service-banner-12.png', 'alt=\"Banner-service\"', 'Media Buying', 'Media Buying', 'Media Buying', '', 'Active', 0, NULL, '2023-11-23 06:20:51', '2023-11-28 04:51:52'),
(39, 18, 'Branding', 'branding', NULL, '<p>We are your partner in shaping your brand identity and personality. We offer a complete design service marked by high-end quality, where we create creative concept campaigns and essential visual elements to enhance your brand presence. With a meticulous eye for detail and a passion for creativity, we transform your brand into a compelling visual story that resonates.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-29.png', 'alt=\"Branding\"', 'uploads/service/banner/service-banner-10.png', 'alt=\"Banner-service\"', 'Branding', 'Branding', 'Branding', '', 'Active', 0, NULL, '2023-11-23 06:21:27', '2023-11-28 04:51:28'),
(40, 18, 'Website & Mobile App Development', 'website-mobile-app-development', NULL, '<p>In a bustling digital landscape, we are your beacon of uniqueness. At Adline Media, we excel in building distinctive, SEO-friendly websites and mobile apps, leaving a lasting impression on your audience. Our expertise spans the entire spectrum, from design, user experience (UX), and front-end development to back-end development.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-30.png', 'alt=\"Website & Mobile App Development\"', 'uploads/service/banner/service-banner-8.png', 'alt=\"Banner-service\"', 'Website & Mobile App Development', 'Website & Mobile App Development', 'Website & Mobile App Development', '', 'Active', 0, NULL, '2023-11-23 06:21:58', '2023-11-28 04:50:58'),
(41, 18, 'Casting', 'casting', NULL, '<p>We understand the vital role that talent plays in representing your brand with professionalism and authenticity. Our commitment is to work closely with our clients, ensuring that we provide the best talents to breathe life into your brand&rsquo;s narrative. Whether you require a talented actor, model, or VO, we can provide a wide range of talent.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-31.png', 'alt=\"Casting\"', 'uploads/service/banner/service-banner-7.png', 'alt=\"Banner-service\"', 'Casting', 'Casting', 'Casting', '', 'Active', 0, NULL, '2023-11-23 06:22:18', '2023-11-28 04:49:22'),
(42, 3, 'Launches and Activations', 'launches-and-activations', NULL, '<p>It refers to events or campaigns designed to introduce or promote a new product, service, brand, or initiative. These events aim to create a memorable and impactful experience that captures the attention of the audience and generates interest and excitement.</p>\r\n<h2><span style=\"font-size: 18pt;\"><strong>Some Key Aspects Related to Launches and Activations:</strong></span></h2>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Product Launches</strong></span></h3>\r\n<p>It is a typical event where a new product is introduced to the market. Product launches often involve showcasing the features and benefits of the product, and they may include live demonstrations, interactive experiences, and opportunities for attendees to try or sample the product.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong><span style=\"font-size: 18pt;\">Brand Activations</span></strong></h3>\r\n<p>Brand activations are events or campaigns that focus on engaging consumers with a brand. These activations go beyond traditional advertising by creating interactive experiences that allow consumers to connect with the brand on a personal level.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Event Planning</strong></span></h3>\r\n<p>Launches and activations require careful planning to ensure a seamless and memorable experience. It includes choosing an appropriate venue, coordinating logistics, designing engaging content, and creating a timeline for the event.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Story Telling</strong></span></h3>\r\n<p>Effective launches and activations often tell a compelling story about the product, brand, or initiative. This narrative helps create an emotional connection with the audience.<br />Sustainability &amp; Social Responsibility</p>\r\n<p>Incorporating sustainable and socially responsible elements into launches and activations is becoming increasingly important. Brands are recognizing the value of aligning with environmental and social causes to enhance their image and connect with socially conscious consumers.</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-16.png', 'alt=\"Launches and Activations\"', 'uploads/service/banner/service-banner-5.png', 'alt=\"Banner-service\"', 'Launches and Activations', 'Launches and Activations', '', '', 'Active', 0, NULL, '2023-11-23 06:55:07', '2023-11-28 04:48:57'),
(43, 3, 'Projection Mapping', 'projection-mapping', NULL, '<p>Projection mapping, also known as spatial augmented reality or video mapping, is a technology that involves projecting images or videos onto surfaces, objects, or architectural elements to create dynamic visual displays. This technique allows for the transformation of ordinary surfaces into interactive and visually captivating displays. Projection mapping is widely used in various fields, including art, entertainment, advertising, and events.</p>\r\n<h2><strong>Important Aspects of Projection-Mapping</strong></h2>\r\n<h3>&nbsp;</h3>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Surface Mapping</strong></span></h3>\r\n<p>Projection mapping involves precisely mapping a projected image or video onto the surfaces of physical objects, buildings, or structures. The mapping process aligns the virtual content with the physical geometry of the target surface, ensuring that the projected visuals fit seamlessly.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>3D Projection Mapping</strong></span></h3>\r\n<p>While traditional projection mapping often involves flat surfaces, 3D projection mapping takes it by projecting onto irregular or three-dimensional shapes.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Architectural Mapping</strong></span></h3>\r\n<p>Projection mapping is often used to enhance the architectural features of buildings during special events or as a form of public art.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Software and Content Creation</strong></span></h3>\r\n<p>Projection mapping relies on specialized software to create and manipulate content for projection. Artists and designers use these tools to develop visuals that align with the physical features of the chosen surfaces.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3><strong><span style=\"font-size: 18pt;\">Advertising and Branding</span></strong></h3>\r\n<p>Projection mapping is employed in advertising campaigns and brand promotions to create attention-grabbing and memorable experiences. It can involve projecting onto buildings, landmarks, or product displays.</p>\r\n<p>&nbsp;</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-17.png', 'alt=\"Projection-Mapping\"', 'uploads/service/banner/service-banner-2.png', 'alt=\"Banner-service\"', 'Projection Mapping', 'Projection Mapping', '', '', 'Active', 0, NULL, '2023-11-23 06:56:37', '2023-11-28 04:48:32'),
(44, 3, 'Permanent Interactive Installations', 'permanent-interactive-installations', NULL, '<p>Permanent interactive installations refer to art, exhibits, or displays that are designed to engage and involve audiences dynamically and interactively. These installations are typically intended for long-term or permanent placement in public spaces, museums, galleries, or other cultural institutions. The goal is to create immersive experiences that encourage participation, exploration, and a sense of connection with the audience.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"font-size: 18pt;\"><strong>Characteristics and Considerations for Permanent Interactive Installations:</strong></span></h3>\r\n<ul>\r\n<li>\r\n<h4>Sensory Engagement</h4>\r\n</li>\r\n<li>\r\n<h4>User Participation</h4>\r\n</li>\r\n<li>\r\n<h4>Integration in Technology</h4>\r\n</li>\r\n<li>\r\n<h4>Adaptability &amp; Sustainability</h4>\r\n</li>\r\n<li>\r\n<h4>Artistic &amp; Conceptual Integrity</h4>\r\n</li>\r\n<li>\r\n<h4>Accessibility</h4>\r\n</li>\r\n<li>\r\n<h4>Educational Value</h4>\r\n</li>\r\n<li>\r\n<h4>Public Space Integration</h4>\r\n</li>\r\n<li>\r\n<h4>Community Engagement</h4>\r\n</li>\r\n</ul>\r\n<p>Examples of permanent interactive installations include interactive sculptures, digital art installations, and immersive environments that blend art and technology to create unique and participatory experiences. These installations contribute to the evolving landscape of public art and cultural experiences, fostering a deeper connection between art and the audience.&nbsp;</p>', 'No', NULL, NULL, 'uploads/service/image/service-image-18.png', 'alt=\"Permanent Interactive Installations\"', 'uploads/service/banner/service-banner-1.png', 'alt=\"Banner-service\"', 'Permanent Interactive Installations', 'Permanent Interactive Installations', '', '', 'Active', 10, NULL, '2023-11-23 06:57:13', '2023-11-28 04:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `designation`, `message`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jessica Brawn', 'Co-Founder', '<p>Our experience working with ADLINE MEDIA was exceptional. Their immersive and engaging exhibition for boosting our brand was awesome. They provided the best accessories and facilities for the exhibitions. They delivered seamless exhibitions innovatively and creatively. ADLINE remains the top exhibition-conducting company in Saudi Arabia. Their extraordinary work was very satisfying. We want to collaborate with them for future events.&nbsp;</p>', 1, 'Active', '2023-02-12 15:28:38', '2023-11-23 00:13:32', NULL),
(4, 'James Anderson', 'CEO', '<p>The versatility of the display stands from ADLINE MEDIA was a game-changer in our product launch. They showcased the products beautifully and added a professional touch through their customized display stands. Our product stood out in the trade show and got attracted from the audience. Their stands were aesthetically pleasing and impressive. Undoubtedly, they were the best display stand manufacturer in Saudi Arabia.&nbsp;</p>', 3, 'Active', '2023-11-05 11:12:46', '2023-11-23 00:13:55', NULL),
(5, 'Smith', 'Manager', '<p>As a public speaker, I got a terrific premium podium from ADLINE MEDIA. The built quality in their premium podium is immersive. The premium look and incredible finishing by the podium made me confident and very comfortable during the speech. I delivered my speech at that conference beautifully because of that sleekly and slightly designed podium.&nbsp;</p>', 4, 'Active', '2023-11-22 06:51:55', '2023-11-23 00:14:24', NULL),
(6, 'Anzon', 'MD', '<p>We chose ADLINE MEDIA for the corporate gifts to appreciate our employees. It was a great decision because of the exceptional quality and stunning design of the corporate gifts they provided. Their team was quite responsive and ensured a great delivery of the gifts. We are very satisfied because our employees gave us fantastic feedback after they unboxed the gifts. Our employees are delighted with the gifts, and we highly recommend AD LINE MEDIA for delightful corporate gifts.&nbsp;</p>', 5, 'Active', '2023-11-22 06:52:38', '2023-11-23 00:14:53', NULL),
(7, 'GEORGE', 'Manager', '<p>I have been using their printing service for my business needs. They provided extraordinary services in sticker printing, signage, and more. The precision of their printing service was so attractive. Their advanced printing technology ensures the best quality. They have highly creative and innovative professionals to do the service very effectively. ADLINE MEDIA has become a crucial partner in the success of my business.</p>', 6, 'Active', '2023-11-22 06:53:15', '2023-11-23 00:15:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `what_we_do`
--

CREATE TABLE `what_we_do` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_attribute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `what_we_do`
--

INSERT INTO `what_we_do` (`id`, `title`, `sub_title`, `description`, `image`, `image_attribute`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'What We Do', 'Our Services', '<p>We are a dedicated team of professionals who bring new horizons to your disparate branding needs. We exist to promote your brand among the targeted audience by providing comprehensive services. At ADLINE MEDIA, we intend to make your brand recognized all around Saudi Arabia through precise and professional branding strategies.&nbsp;</p>\r\n<p>We provide disparate services for your brand promotion. Our services include media production, exhibitions, mall activations, experiential marketing, printing services, advertising, and more. We carefully understand your every need and help to drive your business through the proper way of branding. We strongly believe that every customer is valuable, and their needs are demandable. We give the very best of us to make our clients successful.</p>', 'uploads/home/what_we_do/what-we-do.png', '', 'Active', '2023-11-05 10:45:04', '2023-11-22 23:43:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `who_we_are`
--

CREATE TABLE `who_we_are` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `count` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `image_attribute` text COLLATE utf8_unicode_ci,
  `button_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `button_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `who_we_are`
--

INSERT INTO `who_we_are` (`id`, `title`, `sub_title`, `description`, `count`, `image`, `image_attribute`, `button_text`, `button_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Who We Are', 'Your Better Expectation,  <br/>We Execute It With Perfection', '<p>We are one of the best exhibition and event companies in Saudi Arabia, providing comprehensive branding services for every business. At ADLINE MEDIA, we provide disparate services, including exhibition and event hosting.</p>\r\n<p>We remain to bring your every dream into reality. We have an extraordinary team of professionals capable of designing podiums, making exhibition stands, executing events, and other services. Our long-term experience in designing premium podiums and conducting excellent exhibitions for branding made us unique and well-known in Saudi Arabia. As the leading branding company in Saudi Arabia, we also provide advertising, printing services, experiential marketing, and more. We intend to provide prominent and perfect branding services for every client. Our reliable exhibition booth designs are well known in Saudi Arabia. Our excellence and experience in advertising and branding will make your business successful according to your expectations. We let your businesses thrive everywhere through the best marketing services. We bring your ideas into real life and make them perfect for your branding. ADLINE MEDIA always acts to make every bit of our services excellent beyond your expectations.</p>', '7+', 'uploads/who-we-are/image/list-2.jpg', NULL, 'Read More', '/about-us', '2023-11-05 11:01:48', '2023-11-23 07:26:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_headings`
--

CREATE TABLE `why_choose_headings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `why_choose_headings`
--

INSERT INTO `why_choose_headings` (`id`, `title`, `sub_title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Let\'s go with us', 'Why choose us', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.</p>', '2023-11-05 10:47:58', '2023-11-05 10:47:58'),
(4, 'Let\'s go with us', 'Why choose us', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.</p>', '2023-11-05 10:53:07', '2023-11-05 10:53:07'),
(5, 'Let\'s go with us', 'Why choose us', '<p>vsvjnvjvk</p>', '2023-11-15 00:41:03', '2023-11-15 00:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `why_choose_us`
--

INSERT INTO `why_choose_us` (`id`, `title`, `description`, `image`, `image_attribute`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'STRATEGY', '<p>With careful planning and execution, we develop accurate strategies considering the brand&rsquo;s goals. Our dynamic strategies make every brand to conquer heights.&nbsp;</p>', 'uploads/why-choose-us/list/image/list-1.png', '', 1, 'Active', '2023-02-12 15:28:38', '2023-11-22 06:39:12'),
(2, 'ON TIME DELIVERABLES', '<p>We build trust among the clients and satisfy them by ensuring every project is completed within the deadlines. We are very consistent in delivering projects on time.&nbsp;</p>', 'uploads/why-choose-us/list/image/list-2.png', '', 2, 'Active', '2023-02-12 15:28:38', '2023-11-23 00:07:14'),
(3, 'PRODUCTION FACILITIES', '<p>We ensure thorough facilities for exhibitions, mall activation campaigns, and all other services without compromising the production quality.&nbsp;</p>', 'uploads/why-choose-us/list/image/list-3.png', '', 3, 'Active', '2023-02-12 15:28:38', '2023-11-22 06:41:02'),
(4, 'CONTENT', '<p>Our brilliant team of content writers, concept developers, and creative heads delivers engaging and exceptional content. Our contents are innovative, informative, creative, and tailored to the client&rsquo;s needs.&nbsp;</p>', 'uploads/why-choose-us/list/image/list-4.png', '', 4, 'Active', '2023-02-12 15:28:38', '2023-11-23 00:09:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form_requests`
--
ALTER TABLE `contact_form_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_tags`
--
ALTER TABLE `extra_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `get_quotes`
--
ALTER TABLE `get_quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_features`
--
ALTER TABLE `key_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_tags`
--
ALTER TABLE `meta_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_address`
--
ALTER TABLE `office_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_client_headings`
--
ALTER TABLE `our_client_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_teams`
--
ALTER TABLE `our_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_team_headings`
--
ALTER TABLE `our_team_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_galleries`
--
ALTER TABLE `portfolio_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `what_we_do`
--
ALTER TABLE `what_we_do`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `who_we_are`
--
ALTER TABLE `who_we_are`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_choose_headings`
--
ALTER TABLE `why_choose_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_form_requests`
--
ALTER TABLE `contact_form_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `extra_tags`
--
ALTER TABLE `extra_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `get_quotes`
--
ALTER TABLE `get_quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `key_features`
--
ALTER TABLE `key_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meta_tags`
--
ALTER TABLE `meta_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `office_address`
--
ALTER TABLE `office_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `our_client_headings`
--
ALTER TABLE `our_client_headings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `our_teams`
--
ALTER TABLE `our_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `our_team_headings`
--
ALTER TABLE `our_team_headings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `portfolio_galleries`
--
ALTER TABLE `portfolio_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `what_we_do`
--
ALTER TABLE `what_we_do`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `who_we_are`
--
ALTER TABLE `who_we_are`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `why_choose_headings`
--
ALTER TABLE `why_choose_headings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
