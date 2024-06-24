-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 30, 2024 at 06:47 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtocarts`
--

CREATE TABLE `addtocarts` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `description` longtext,
  `document` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8_unicode_ci,
  `is_popular` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `check` int(11) DEFAULT NULL,
  `comment` longtext COLLATE utf8_unicode_ci,
  `likes` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_likes`
--

CREATE TABLE `blog_likes` (
  `id` int(255) NOT NULL,
  `blog_id` int(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `builder_blocks`
--

CREATE TABLE `builder_blocks` (
  `id` int(11) NOT NULL,
  `identifier` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `html` longtext,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `builder_blocks`
--

INSERT INTO `builder_blocks` (`id`, `identifier`, `title`, `html`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'topbar', 'Topbar', '<span class=\"topbar\">\n    <div class=\"sub-header\">\n        <div class=\"container\">\n            <div class=\"row\">\n                <div class=\"col-lg-6 col-md-6\">\n                    <div class=\"sub-header-left\">\n                        <ul class=\"d-flex\">\n                            <li>\n                                <a href=\"tel:+143-52-9933631\">\n                                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\"\n                                        xmlns=\"http://www.w3.org/2000/svg\">\n                                        <path\n                                            d=\"M18.3018 15.2734C18.3018 15.5734 18.2352 15.8817 18.0935 16.1817C17.9518 16.4817 17.7685 16.765 17.5268 17.0317C17.1185 17.4817 16.6685 17.8067 16.1602 18.015C15.6602 18.2234 15.1185 18.3317 14.5352 18.3317C13.6852 18.3317 12.7768 18.1317 11.8185 17.7234C10.8602 17.315 9.90182 16.765 8.95182 16.0734C7.99349 15.3734 7.08516 14.5984 6.21849 13.74C5.36016 12.8734 4.58516 11.965 3.89349 11.015C3.21016 10.065 2.66016 9.11504 2.26016 8.17337C1.86016 7.22337 1.66016 6.31504 1.66016 5.44837C1.66016 4.88171 1.76016 4.34004 1.96016 3.84004C2.16016 3.33171 2.47682 2.86504 2.91849 2.44837C3.45182 1.92337 4.03516 1.66504 4.65182 1.66504C4.88516 1.66504 5.11849 1.71504 5.32682 1.81504C5.54349 1.91504 5.73516 2.06504 5.88516 2.28171L7.81849 5.00671C7.96849 5.21504 8.07682 5.40671 8.15182 5.59004C8.22682 5.76504 8.26849 5.94004 8.26849 6.09837C8.26849 6.29837 8.21016 6.49837 8.09349 6.69004C7.98516 6.8817 7.82682 7.0817 7.62682 7.2817L6.99349 7.94004C6.90182 8.0317 6.86016 8.14004 6.86016 8.27337C6.86016 8.34004 6.86849 8.39837 6.88516 8.46504C6.91016 8.5317 6.93516 8.5817 6.95182 8.6317C7.10182 8.9067 7.36016 9.26504 7.72682 9.69837C8.10182 10.1317 8.50182 10.5734 8.93516 11.015C9.38516 11.4567 9.81849 11.865 10.2602 12.24C10.6935 12.6067 11.0518 12.8567 11.3352 13.0067C11.3768 13.0234 11.4268 13.0484 11.4852 13.0734C11.5518 13.0984 11.6185 13.1067 11.6935 13.1067C11.8352 13.1067 11.9435 13.0567 12.0352 12.965L12.6685 12.34C12.8768 12.1317 13.0768 11.9734 13.2685 11.8734C13.4602 11.7567 13.6518 11.6984 13.8602 11.6984C14.0185 11.6984 14.1852 11.7317 14.3685 11.8067C14.5518 11.8817 14.7435 11.99 14.9518 12.1317L17.7102 14.09C17.9268 14.24 18.0768 14.415 18.1685 14.6234C18.2518 14.8317 18.3018 15.04 18.3018 15.2734Z\"\n                                            stroke=\"#192335\" stroke-width=\"1.25\" stroke-miterlimit=\"10\"></path>\n                                    </svg>\n                                    +143-52-9933631\n                                </a>\n                            </li>\n                            <li>\n                                <a href=\"#\"><svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\"\n                                        xmlns=\"http://www.w3.org/2000/svg\">\n                                        <path\n                                            d=\"M9.99453 11.1912C11.4305 11.1912 12.5945 10.0272 12.5945 8.59121C12.5945 7.15527 11.4305 5.99121 9.99453 5.99121C8.55859 5.99121 7.39453 7.15527 7.39453 8.59121C7.39453 10.0272 8.55859 11.1912 9.99453 11.1912Z\"\n                                            stroke=\"#192335\" stroke-width=\"1.25\"></path>\n                                        <path\n                                            d=\"M3.0187 7.0763C4.66037 -0.140363 15.352 -0.132029 16.9854 7.08464C17.9437 11.318 15.3104 14.9013 13.002 17.118C11.327 18.7346 8.67704 18.7346 6.9937 17.118C4.6937 14.9013 2.06037 11.3096 3.0187 7.0763Z\"\n                                            stroke=\"#192335\" stroke-width=\"1.25\"></path>\n                                    </svg>\n                                    Sydney, Australia\n                                </a>\n                            </li>\n                        </ul>\n                    </div>\n                </div>\n                <div class=\"col-lg-6 col-md-6\">\n                    <div class=\"sub-header-left right-sub\">\n\n                        <ul class=\"d-flex\">\n                            <li>\n                                <a href=\"https://twitter.com\">\n                                    <i class=\"fa-brands fa-twitter\"></i>\n                                </a>\n                            </li>\n                            <li>\n                                <a href=\"https://linkedin.com\">\n                                    <i class=\"fa-brands fa-linkedin\"></i>\n                                </a>\n                            </li>\n                            <li>\n                                <a href=\"https://facebook.com\">\n                                    <i class=\"fa-brands fa-square-facebook\"></i>\n                                </a>\n                            </li>\n                        </ul>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</span>', '', NULL, NULL),
(2, 'menu', 'Menu', '<header class=\"header-area\">\n    <div class=\"container\">\n        <div class=\"row align-items-center\">\n            <div class=\"col-lg-3 col-md-4 col-sm-4 col-6\">\n                <!-- logo Area -->\n                <div class=\"logo-image\">\n                    <a href=\"#\">\n                        <span class=\"builder_image parent\" content_type=\"image\" id=\"placeholder_id\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/logo.png\" alt=\"...\">\n                        </span>\n                    </a>\n                </div>\n            </div>\n            <div class=\"col-lg-9 col-md-8 col-sm-8 col-6\">\n                <span class=\"header-menu\">\n                    <div class=\"header-menu d-flex justify-content-end\">\n                    <div class=\"nav-menu\">\n                            <ul class=\"primary-menu main-menu-ul d-flex align-items-center\">\n                                <li><a href=\"#\" class=\"active\">Home</a></li>\n                                <li><a href=\"#\">About</a></li>\n                                <li class=\"have-mega-menu\"><a class=\"menu-parent-a\" href=\"#\">Courses</a>\n                                <ul class=\"mega-dropdown-menu mega main-mega-menu\">\n                                    <div class=\"row\">\n                                        <div class=\"col-lg-4\">\n                                            <div class=\"mega-menu-items\">\n                                                <h4>All Courses</h4>\n                                                <ul class=\"mega_list\">\n                                                    <li><a href=\"\">Web Development</a></li>\n                                                    <li><a href=\"\">Graphics Design</a></li>\n                                                    <li><a href=\"\">Video Editing</a></li>\n                                                    <li><a href=\"\">Graphics Design</a></li>\n                                                    <li><a href=\"\">Content Writing</a></li>\n                                                    <li><a href=\"\">Data Science</a></li>\n                                                    <li><a href=\"\">Digital Marketing</a></li>\n                                                </ul>\n                                            </div>\n                                        </div>\n                                        <div class=\"col-lg-4\">\n                                            <div class=\"mega-menu-items\">\n                                                <h4>All Courses</h4>\n                                                <ul class=\"mega_list\">\n                                                    <li><a href=\"\">Web Development</a></li>\n                                                    <li><a href=\"\">Graphics Design</a></li>\n                                                    <li><a href=\"\">Video Editing</a></li>\n                                                    <li><a href=\"\">Graphics Design</a></li>\n                                                    <li><a href=\"\">Content Writing</a></li>\n                                                    <li><a href=\"\">Data Science</a></li>\n                                                    <li><a href=\"\">Digital Marketing</a></li>\n                                                </ul>\n                                            </div>\n                                        </div>\n                                        <div class=\"col-lg-4\">\n                                            <div class=\"mega-menu-items\">\n                                                <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/mega.png\" alt=\"...\">\n                                            </div>\n                                        </div>\n                                    </div>\n                                </ul>\n                                </li>\n                                <li><a href=\"#\">Contact</a></li>\n                                <li class=\"Esearch\">\n                                    <form action=\"\" method=\"post\" class=\"Esearch_entry\">\n                                        <input type=\"text\" class=\"form-control\" placeholder=\"Search...\">\n                                        <button type=\"submit\"><i class=\"fa-solid fa-magnifying-glass\"></i></button>\n                                    </form>\n                                </li>\n                            </ul>\n                    </div>\n                        <div class=\"primary-end d-flex align-items-center\"> \n                            <select name=\"\" id=\"\" class=\"form-select nice-control\">\n                                <option value=\"en\">en</option>\n                                <option value=\"Bn\">Bn</option>\n                            </select>\n                            <a href=\"#\" class=\"eBtn btn gradient\">login</a>\n                            <span class=\"toggle-bar gradient\"  data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasWithBothOptions\" aria-controls=\"offcanvasWithBothOptions\"><i class=\"fa-sharp fa-solid fa-bars\"></i></span>\n                        </div>\n                    </div>\n                </span>\n            </div>\n        </div>\n\n         <!-- Off Canves Menu -->\n         <div class=\"offcanvas offcanvas-start\" data-bs-scroll=\"true\" tabindex=\"-1\" id=\"offcanvasWithBothOptions\" aria-labelledby=\"offcanvasWithBothOptionsLabel\">\n            <div class=\"offcanvas-header\">\n              <h5 class=\"offcanvas-title\" id=\"offcanvasWithBothOptionsLabel\"></h5>\n              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>\n            </div>\n            <div class=\"offcanvas-body\">\n              <div class=\"off-menu\">\n                <div class=\"logo-image\">\n                    <a href=\"#\">\n                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/logo.png\" alt=\"...\">\n                    </a>\n                </div>\n                <div class=\"btn-off\">\n                    <a href=\"#\" class=\"eBtn btn gradient mb-3\">login</a>\n                    <a href=\"#\" class=\"eBtn btn gradient sign\">Sign Up</a>\n                </div>\n                  <ul class=\"primary-menu main-menu-ul\">\n                      <li><a href=\"#\" class=\"active\">Home</a></li>\n                      <li><a href=\"#\">About</a></li>\n                      <li><a href=\"#\" class=\"has-menu\">Courses <i class=\"fa-solid fa-angle-down\"></i></a>\n                       <ul class=\"droup-menu\">\n                           <div class=\"row\">\n                              <div class=\"col-sm-12\">\n                                  <div class=\"mega-menu-items\">\n                                      <h4>All Courses</h4>\n                                      <ul class=\"mega_list\">\n                                          <li><a href=\"\">Web Development</a></li>\n                                          <li><a href=\"\">Graphics Design</a></li>\n                                          <li><a href=\"\">Video Editing</a></li>\n                                          <li><a href=\"\">Graphics Design</a></li>\n                                          <li><a href=\"\">Content Writing</a></li>\n                                          <li><a href=\"\">Data Science</a></li>\n                                          <li><a href=\"\">Digital Marketing</a></li>\n                                      </ul>\n                                  </div>\n                              </div>\n                              <div class=\"col-sm-12\">\n                                  <div class=\"mega-menu-items\">\n                                      <h4>All Courses</h4>\n                                      <ul class=\"mega_list\">\n                                          <li><a href=\"\">Web Development</a></li>\n                                          <li><a href=\"\">Graphics Design</a></li>\n                                          <li><a href=\"\">Video Editing</a></li>\n                                          <li><a href=\"\">Graphics Design</a></li>\n                                          <li><a href=\"\">Content Writing</a></li>\n                                          <li><a href=\"\">Data Science</a></li>\n                                          <li><a href=\"\">Digital Marketing</a></li>\n                                      </ul>\n                                  </div>\n                              </div>\n                              <div class=\"col-sm-12\">\n                                  <div class=\"mega-menu-items\">\n                                      <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/mega.png\" alt=\"...\">\n                                  </div>\n                              </div>\n                           </div>\n                       </ul>\n                      </li>\n                      <li><a href=\"#\">Contact</a></li>\n                  </ul>\n              </div>\n            </div>\n          </div>\n\n    </div>\n</header>', '', NULL, NULL),
(3, 'hero', 'Hero', '<section class=\"banner-wraper\">\n    <div class=\"container\">\n        <div class=\"row\">\n            <div class=\"col-lg-5 col-md-5\">\n                <div class=\"banner-content\">\n                    <h5 class=\"d-flex builder_text parent\" content_type=\"text\" id=\"placeholder_id\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/roket.svg\" alt=\"...\"> The Leader in online learning</h5>\n                    <h1 class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Start learning from the world’s pro \n                        <span class=\"gradient color shadow-none builder_text parent\" content_type=\"text\" id=\"placeholder_id\">instructors</span></h1>\n                    <p class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>\n                    <span class=\"hero-button\">\n                        <div class=\"banner-btn\">\n                            <a href=\"#\" class=\"eBtn gradient\">Get Started</a>\n                            <a href=\"#\" class=\"eBtn learn-btn\"><i class=\"fa-solid fa-play\"></i>Learn More</a>\n                        </div>\n                    </span>\n                    \n                </div>\n            </div>\n            <div class=\"col-lg-7 col-md-7\">\n                <span class=\"hero-banner\">\n                    <div class=\"banner-image\">\n                        <img class=\"large-img\" src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/banner.png\" alt=\"...\">\n                        <div class=\"over-text\">\n                            <span>\n                                <svg width=\"30\" height=\"30\" viewBox=\"0 0 30 30\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                <g clip-path=\"url(#clip0_47_63)\">\n                                <mask id=\"mask0_47_63\" style=\"mask-type:luminance\" maskUnits=\"userSpaceOnUse\" x=\"0\" y=\"0\" width=\"30\" height=\"30\">\n                                <path d=\"M0 1.90735e-06H30V30H0V1.90735e-06Z\" fill=\"white\"/>\n                                </mask>\n                                <g mask=\"url(#mask0_47_63)\">\n                                <path d=\"M7.36816 27.2279V29.5615\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                <path d=\"M22.6289 27.2279V29.5615\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                </g>\n                                <path d=\"M5.94995 4.26311V7.34473\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                <mask id=\"mask1_47_63\" style=\"mask-type:luminance\" maskUnits=\"userSpaceOnUse\" x=\"0\" y=\"0\" width=\"30\" height=\"30\">\n                                <path d=\"M0 1.90735e-06H30V30H0V1.90735e-06Z\" fill=\"white\"/>\n                                </mask>\n                                <g mask=\"url(#mask1_47_63)\">\n                                <path d=\"M3.56714 27.2547V28.1348C3.56714 28.9227 4.20587 29.5615 4.9939 29.5615H25.0054C25.7933 29.5615 26.4321 28.9227 26.4321 28.1348V23.8904C26.4321 22.1012 25.2529 20.5261 23.5362 20.0221L21.7134 19.487L14.9996 23.4764L8.28622 19.4872L6.46331 20.0222C4.74646 20.5261 3.56714 22.1013 3.56714 23.8906V25.2003\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                <path d=\"M21.7133 19.4871L17.6291 16.8194C17.6291 18.5262 17.1336 20.1963 16.2029 21.6269L14.9995 23.4766\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                <path d=\"M8.28589 19.4871L12.3702 16.8194C12.3702 18.5262 12.8656 20.1963 13.7963 21.6269L14.9997 23.4766\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                <path d=\"M11.2968 7.40565V8.73256C11.2968 9.26494 10.8652 9.6966 10.3328 9.6966H9.37549V11.273C9.37549 11.6758 9.70203 12.0024 10.1049 12.0024C10.232 12.0024 10.3354 12.1019 10.3434 12.2288C10.4972 14.6673 12.5224 16.5977 14.9996 16.5977C17.4769 16.5977 19.5021 14.6673 19.6559 12.2288C19.664 12.1019 19.7673 12.0024 19.8944 12.0024C20.2972 12.0024 20.6238 11.6758 20.6238 11.273V9.6966H19.6665C19.1341 9.6966 18.7025 9.26494 18.7025 8.73256V7.40565\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                <path d=\"M12.3682 15.7837V16.8203L12.3701 16.8191\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                <path d=\"M17.6292 16.8193V15.7851\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                <path d=\"M17.7716 4.37924L16.0506 4.16631C15.352 4.07994 14.6455 4.07994 13.947 4.16637L10.0603 4.6473L9.01416 4.77674V6.975C9.01416 7.18898 9.1702 7.36611 9.37457 7.39998C9.39771 7.40379 9.42121 7.40625 9.44541 7.40625H20.5539C20.5775 7.40625 20.6004 7.40385 20.6229 7.40027C20.8282 7.36711 20.9853 7.18963 20.9853 6.975V4.77674L19.9371 4.64707L19.8139 4.63189\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                <path d=\"M20.6228 9.69629V7.39936\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                <path d=\"M9.37451 7.39906L9.37545 9.69629\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                <path d=\"M20.984 4.77625L23.9943 4.26355C24.5087 4.17596 24.5588 3.45666 24.0616 3.29857L15.1495 0.463867C15.0513 0.432637 14.9459 0.432637 14.8477 0.463867L5.93555 3.29857C5.43838 3.45666 5.48854 4.17596 6.00288 4.26355L9.01401 4.77637\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                <path d=\"M5.01803 9.03922L4.4243 12.5241C4.36823 12.8531 4.62165 13.1533 4.9554 13.1533H6.9446C7.27823 13.1533 7.53165 12.8531 7.47563 12.5241L6.88196 9.03922\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                <path d=\"M6.88199 7.81557C6.88199 7.55559 6.67123 7.34482 6.41125 7.34482H5.48881C5.22883 7.34482 5.01807 7.55559 5.01807 7.81557V9.03906H6.88199V7.81557Z\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                <path d=\"M17.2406 19.4043C16.5501 19.5564 15.7935 19.6406 14.9996 19.6406C14.2056 19.6406 13.449 19.5564 12.7585 19.4043\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                </g>\n                                </g>\n                                <defs>\n                                <clipPath id=\"clip0_47_63\">\n                                <rect width=\"30\" height=\"30\" fill=\"white\"/>\n                                </clipPath>\n                                </defs>\n                                </svg>\n                            </span>\n                            <div class=\"b-text\">\n                                <h5>250k +</h5>\n                                <p>Students has Enrolled</p>\n                            </div>\n                        </div>\n                    </div>\n                </span>\n            </div>\n        </div>\n    </div>\n</section>', '', NULL, NULL),
(4, 'features', 'Features', '<section class=\"performance-wrapper section-padding\">\n    <div class=\"container\">\n        <div class=\"pr-wrap\">\n            <div class=\"row\">\n                <div class=\"col-lg-3 col-md-6 col-sm-6  ps-border\">\n                    <div class=\"ps-single-wrap\">\n                        <span class=\"builder_image parent\" content_type=\"image\" id=\"placeholder_id\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/p1.png\" alt=\"...\">\n                        </span>\n                        <h4>\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">\n                                Fast Performance\n                            </span>\n                        </h4>\n\n                        <p class=\"description\">\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">\n                                It is a long established fact that a reader will be distracted.</span>\n                        </p>\n                    </div>\n                </div>\n                <div class=\"col-lg-3 col-md-6 col-sm-6 ps-border\">\n                    <div class=\"ps-single-wrap\">\n                        <span class=\"builder_image parent\" content_type=\"image\" id=\"placeholder_id\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/p2.png\" alt=\"...\">\n                        </span>\n                        <h4>\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">\n                                Perfect Responsive\n                            </span>\n                        </h4>\n                        <p class=\"description\">\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">\n                                It is a long established fact that a reader will be distracted.\n                            </span>\n                        </p>\n                    </div>\n                </div>\n                <div class=\"col-lg-3 col-md-6 col-sm-6 ps-border\">\n                    <div class=\"ps-single-wrap\">\n                        <span class=\"builder_image parent\" content_type=\"image\" id=\"placeholder_id\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/p3.png\" alt=\"...\">\n                        </span>\n                        <h4>\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">\n                                Fast & Friendly Support\n                            </span>\n                        </h4>\n                        <p class=\"description\">\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">\n                                It is a long established fact that a reader will be distracted.\n                            </span>\n                        </p>\n                    </div>\n                </div>\n                <div class=\"col-lg-3 col-md-6 col-sm-6 ps-border\">\n                    <div class=\"ps-single-wrap\">\n                        <span class=\"builder_image parent\" content_type=\"image\" id=\"placeholder_id\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/p4.png\" alt=\"...\">\n                        </span>\n                        <h4>\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">\n                                Easy to Use\n                            </span>\n                        </h4>\n                        <p class=\"description\">\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">\n                                It is a long established fact that a reader will be distracted.\n                            </span>\n                        </p>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</section>', '', NULL, NULL),
(5, 'category', 'Category', '<section class=\"category-wrapper section-padding\">\n    <div class=\"container\">\n        <div class=\"row\">\n            <div class=\"col-lg-12\">\n                <div class=\"section-title text-center\">\n                    <span class=\"title-head builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Categories</span>\n                    <h2 class=\"title builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Explore Top Courses Caterories</h2>\n                </div>\n            </div>\n        </div>\n        <span class=\"category\">\n            <div class=\"row\">\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 36.svg\" alt=\"\">\n                        </span>\n                        <h4>Web Design</h4>\n                        <p>04 Courses</p>\n                    </a>\n                </div>\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>\n                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 37.svg\" alt=\"\">\n                        </span>\n                        <h4>Graphic Design</h4>\n                        <p>12 Courses</p>\n                    </a>\n                </div>\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>\n                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 38.svg\" alt=\"\">\n                        </span>\n                        <h4>Web Development</h4>\n                        <p>10 Courses</p>\n                    </a>\n                </div>\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>\n                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 39.svg\" alt=\"\">   \n                        </span>\n                        <h4>Digital Marketing</h4>\n                        <p>11 Courses</p>\n                    </a>\n                </div>\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>\n                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 40.svg\" alt=\"\">   \n                        </span>\n                        <h4>Art & Humanities</h4>\n                        <p>9 Courses</p>\n                    </a>\n                </div>\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>  \n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 41.svg\" alt=\"\">  \n                        </span>\n                        <h4>Color Theory</h4>\n                        <p>10 Courses</p>\n                    </a>\n                </div>\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 42.svg\" alt=\"...\">   \n                        </span>\n                        <h4>Motion Graphic</h4>\n                        <p>8 Courses</p>\n                    </a>\n                </div>\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 43.svg\" alt=\"...\">    \n                        </span>\n                        <h4>Blander 3D</h4>\n                        <p>12 Courses</p>\n                    </a>\n                </div>\n            </div>\n        </span>\n    </div>\n</section>', '', NULL, NULL);
INSERT INTO `builder_blocks` (`id`, `identifier`, `title`, `html`, `thumbnail`, `created_at`, `updated_at`) VALUES
(6, 'featured-course', 'featured course', '<section class=\"feature-wrapper section-padding\">\n    <div class=\"container\">\n        <div class=\"row\">\n            <div class=\"col-lg-12\">\n                <div class=\"res-control d-flex align-items-center justify-content-between\">\n                    <div class=\"section-title mb-0\">\n                        <span class=\"title-head builder_text parent\" content_type=\"text\"\n                            id=\"placeholder_id\">Courses</span>\n                        <h2 class=\"title builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Featured Courses\n                        </h2>\n                    </div>\n                    <span class=\"featured-course-all-button\">\n                        <a href=\"#\" class=\"eBtn gradient\">View All Courses</a>\n                    </span>\n                </div>\n            </div>\n        </div>\n        <span class=\"featured-course\">\n            <div class=\"row mt-50\">\n                <div class=\"col-lg-6 col-md-12 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-feature\">\n                        <div class=\"row\">\n                            <div class=\"col-lg-4 col-md-4\">\n                                <div class=\"courses-img\">\n                                    <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/course-1.png\"\n                                        alt=\"...\">\n                                    <div class=\"cText d-flex\">\n                                        <h4>$60.00</h4>\n                                        <del>$30.00</del>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"col-lg-8 col-md-8\">\n                                <div class=\"entry-details\">\n                                    <div class=\"entry-title\">\n                                        <h3>Complete Blender Creator : Learn 3D Modelling</h3>\n                                        <span class=\"heart\"><i class=\"fa-regular fa-heart\"></i></span>\n                                    </div>\n                                    <ul>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\"\n                                                xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path\n                                                    d=\"M12.6521 9.54004L14.8477 8.27081C14.9758 8.19549 15.0399 8.08879 15.0399 7.95071C15.0399 7.81263 14.9758 7.70458 14.8477 7.62658L12.6521 6.35735C12.5395 6.29326 12.4144 6.26121 12.2768 6.26121C12.1392 6.26121 12.0133 6.29326 11.8989 6.35735L9.70344 7.62658C9.57523 7.7019 9.51113 7.8086 9.51113 7.94669C9.51113 8.08479 9.57523 8.19283 9.70344 8.27081L11.8989 9.54004C12.0115 9.60414 12.1366 9.63619 12.2743 9.63619C12.4119 9.63619 12.5378 9.60414 12.6521 9.54004ZM12.6521 11.9968L14.1265 11.1554C14.2395 11.0928 14.3305 11.0021 14.3995 10.8832C14.4686 10.7643 14.5031 10.636 14.5031 10.4984V9.32371L12.6521 10.399C12.5392 10.4685 12.4136 10.5032 12.2755 10.5032C12.1374 10.5032 12.0119 10.4685 11.8989 10.399L10.048 9.32371V10.4984C10.048 10.636 10.0825 10.7643 10.1515 10.8832C10.2206 11.0021 10.3116 11.0928 10.4246 11.1554L11.8989 11.9968C12.0115 12.0609 12.1366 12.0929 12.2743 12.0929C12.4119 12.0929 12.5378 12.0609 12.6521 11.9968ZM16.4101 16.25H12.2755C12.2755 16.0416 12.2684 15.8333 12.2543 15.625C12.2401 15.4166 12.2189 15.2083 12.1906 15H16.4101C16.4849 15 16.5464 14.9759 16.5944 14.9279C16.6425 14.8798 16.6666 14.8183 16.6666 14.7435V5.25642C16.6666 5.18163 16.6425 5.12019 16.5944 5.0721C16.5464 5.02402 16.4849 4.99998 16.4101 4.99998H3.58967C3.51488 4.99998 3.45344 5.02402 3.40536 5.0721C3.35727 5.12019 3.33323 5.18163 3.33323 5.25642V6.14263C3.1249 6.11431 2.91657 6.09307 2.70825 6.07892C2.49992 6.06476 2.29159 6.05769 2.08325 6.05769V5.25642C2.08325 4.84215 2.23076 4.48752 2.52577 4.19252C2.82077 3.89751 3.17541 3.75 3.58967 3.75H16.4101C16.8244 3.75 17.179 3.89751 17.474 4.19252C17.769 4.48752 17.9165 4.84215 17.9165 5.25642V14.7435C17.9165 15.1578 17.769 15.5124 17.474 15.8074C17.179 16.1025 16.8244 16.25 16.4101 16.25ZM6.58498 16.25C6.41715 16.25 6.27127 16.1973 6.14734 16.0921C6.02341 15.9869 5.94595 15.8498 5.91498 15.681C5.79425 14.8274 5.42592 14.1017 4.81 13.504C4.19409 12.9062 3.45664 12.5443 2.59767 12.4182C2.43692 12.3974 2.31099 12.3219 2.2199 12.1917C2.1288 12.0615 2.08325 11.913 2.08325 11.7464C2.08325 11.5693 2.14362 11.4209 2.26436 11.3013C2.38508 11.1816 2.52556 11.133 2.68581 11.1555C3.8685 11.2901 4.87623 11.7759 5.70902 12.613C6.54181 13.45 7.02712 14.4599 7.16494 15.6426C7.18737 15.8114 7.1409 15.9548 7.02552 16.0729C6.91013 16.1909 6.76329 16.25 6.58498 16.25ZM9.82361 16.25C9.64091 16.25 9.49107 16.1869 9.37409 16.0609C9.25711 15.9348 9.18741 15.7777 9.16496 15.5897C9.00257 13.86 8.31027 12.3918 7.08804 11.1851C5.86582 9.97834 4.3872 9.3034 2.65217 9.16023C2.48336 9.14313 2.34634 9.07206 2.24111 8.94702C2.13587 8.82197 2.08325 8.67607 2.08325 8.50933C2.08325 8.33217 2.14148 8.18162 2.25794 8.05769C2.37438 7.93377 2.5154 7.88035 2.681 7.89744C4.7622 8.0406 6.53275 8.84135 7.99267 10.2997C9.4526 11.758 10.2627 13.5235 10.4229 15.5961C10.44 15.7788 10.3887 15.9334 10.2689 16.06C10.1491 16.1867 10.0007 16.25 9.82361 16.25ZM2.93215 16.25C2.6942 16.25 2.49324 16.1678 2.32925 16.0035C2.16525 15.8392 2.08325 15.6381 2.08325 15.4001C2.08325 15.1622 2.1654 14.9612 2.32971 14.7972C2.494 14.6332 2.69512 14.5512 2.93306 14.5512C3.17101 14.5512 3.37197 14.6334 3.53596 14.7977C3.69996 14.962 3.78196 15.1631 3.78196 15.4011C3.78196 15.639 3.69981 15.84 3.5355 16.004C3.37121 16.168 3.17009 16.25 2.93215 16.25Z\"\n                                                    fill=\"#6B7385\" />\n                                            </svg>\n                                            12 lesson\n                                        </li>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\"\n                                                xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path\n                                                    d=\"M2.25174 16.0896C2.03834 16.0896 1.85945 16.0174 1.71508 15.873C1.57072 15.7287 1.49854 15.5498 1.49854 15.3364V14.237C1.49854 13.8075 1.60938 13.4243 1.83108 13.0872C2.05276 12.7501 2.34881 12.4879 2.71924 12.3005C3.5112 11.9131 4.30755 11.6145 5.10828 11.4045C5.90904 11.1946 6.78911 11.0896 7.74852 11.0896C8.70792 11.0896 9.58799 11.1946 10.3887 11.4045C11.1895 11.6145 11.9858 11.9131 12.7778 12.3005C13.1482 12.4879 13.4443 12.7501 13.666 13.0872C13.8876 13.4243 13.9985 13.8075 13.9985 14.237V15.3364C13.9985 15.5498 13.9263 15.7287 13.7819 15.873C13.6376 16.0174 13.4587 16.0896 13.2453 16.0896H2.25174ZM15.3414 16.0896C15.4437 16.0024 15.5232 15.8934 15.58 15.7626C15.6367 15.6318 15.6651 15.4855 15.6651 15.3236V14.1345C15.6651 13.5875 15.5312 13.0662 15.2633 12.5705C14.9955 12.0749 14.6155 11.6497 14.1235 11.2948C14.6823 11.3781 15.2127 11.5071 15.7148 11.6818C16.217 11.8565 16.6961 12.0629 17.1523 12.3012C17.5829 12.5309 17.9154 12.8016 18.1499 13.1133C18.3844 13.4251 18.5017 13.7655 18.5017 14.1345V15.3364C18.5017 15.5498 18.4295 15.7287 18.2851 15.873C18.1407 16.0174 17.9619 16.0896 17.7485 16.0896H15.3414ZM7.74852 9.74343C6.94645 9.74343 6.25982 9.45784 5.68864 8.88668C5.11746 8.3155 4.83187 7.62887 4.83187 6.8268C4.83187 6.02472 5.11746 5.33809 5.68864 4.76693C6.25982 4.19575 6.94645 3.91016 7.74852 3.91016C8.55058 3.91016 9.23721 4.19575 9.80839 4.76693C10.3796 5.33809 10.6651 6.02472 10.6651 6.8268C10.6651 7.62887 10.3796 8.3155 9.80839 8.88668C9.23721 9.45784 8.55058 9.74343 7.74852 9.74343ZM14.944 6.8268C14.944 7.62887 14.6584 8.3155 14.0872 8.88668C13.516 9.45784 12.8294 9.74343 12.0273 9.74343C11.9333 9.74343 11.8136 9.73275 11.6683 9.71139C11.5231 9.69003 11.4034 9.66653 11.3094 9.64089C11.638 9.24579 11.8906 8.80748 12.0671 8.32595C12.2436 7.84442 12.3318 7.34437 12.3318 6.8258C12.3318 6.30725 12.2418 5.80918 12.0618 5.33162C11.8818 4.85406 11.631 4.41443 11.3094 4.01272C11.429 3.96998 11.5487 3.94221 11.6683 3.92939C11.788 3.91657 11.9077 3.91016 12.0273 3.91016C12.8294 3.91016 13.516 4.19575 14.0872 4.76693C14.6584 5.33809 14.944 6.02472 14.944 6.8268ZM2.74851 14.8396H12.7485V14.237C12.7485 14.0629 12.705 13.908 12.6179 13.7723C12.5308 13.6366 12.3927 13.518 12.2036 13.4165C11.5177 13.0629 10.8115 12.795 10.0851 12.6128C9.35856 12.4307 8.57971 12.3396 7.74852 12.3396C6.91732 12.3396 6.13847 12.4307 5.41197 12.6128C4.68549 12.795 3.97929 13.0629 3.29339 13.4165C3.10429 13.518 2.9662 13.6366 2.87912 13.7723C2.79205 13.908 2.74851 14.0629 2.74851 14.237V14.8396ZM7.74852 8.49347C8.20685 8.49347 8.59921 8.33028 8.9256 8.00389C9.25199 7.6775 9.41518 7.28514 9.41518 6.8268C9.41518 6.36847 9.25199 5.97611 8.9256 5.64972C8.59921 5.32333 8.20685 5.16014 7.74852 5.16014C7.29018 5.16014 6.89782 5.32333 6.57143 5.64972C6.24504 5.97611 6.08185 6.36847 6.08185 6.8268C6.08185 7.28514 6.24504 7.6775 6.57143 8.00389C6.89782 8.33028 7.29018 8.49347 7.74852 8.49347Z\"\n                                                    fill=\"#6B7385\" />\n                                            </svg>\n                                            50 Students\n                                        </li>\n                                    </ul>\n                                    <p class=\"description\">It is a long established fact that a reader will be\n                                        distracted by the readable...</p>\n                                    <div class=\"creator\">\n                                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/profile.png\"\n                                            alt=\"...\">\n                                        <p>by <span>Angelina Ross</span> in <span>Design</span></p>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class=\"col-lg-6 col-md-12 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-feature\">\n                        <div class=\"row\">\n                            <div class=\"col-lg-4 col-md-4\">\n                                <div class=\"courses-img\">\n                                    <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/course-2.png\"\n                                        alt=\"...\">\n                                    <div class=\"cText d-flex\">\n                                        <h4>$60.00</h4>\n                                        <del>$30.00</del>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"col-lg-8 col-md-8\">\n                                <div class=\"entry-details\">\n                                    <div class=\"entry-title\">\n                                        <h3>The Complete Digital Marketing Guide</h3>\n                                        <span class=\"heart\"><i class=\"fa-regular fa-heart\"></i></span>\n                                    </div>\n                                    <ul>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\"\n                                                xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path\n                                                    d=\"M12.6521 9.54004L14.8477 8.27081C14.9758 8.19549 15.0399 8.08879 15.0399 7.95071C15.0399 7.81263 14.9758 7.70458 14.8477 7.62658L12.6521 6.35735C12.5395 6.29326 12.4144 6.26121 12.2768 6.26121C12.1392 6.26121 12.0133 6.29326 11.8989 6.35735L9.70344 7.62658C9.57523 7.7019 9.51113 7.8086 9.51113 7.94669C9.51113 8.08479 9.57523 8.19283 9.70344 8.27081L11.8989 9.54004C12.0115 9.60414 12.1366 9.63619 12.2743 9.63619C12.4119 9.63619 12.5378 9.60414 12.6521 9.54004ZM12.6521 11.9968L14.1265 11.1554C14.2395 11.0928 14.3305 11.0021 14.3995 10.8832C14.4686 10.7643 14.5031 10.636 14.5031 10.4984V9.32371L12.6521 10.399C12.5392 10.4685 12.4136 10.5032 12.2755 10.5032C12.1374 10.5032 12.0119 10.4685 11.8989 10.399L10.048 9.32371V10.4984C10.048 10.636 10.0825 10.7643 10.1515 10.8832C10.2206 11.0021 10.3116 11.0928 10.4246 11.1554L11.8989 11.9968C12.0115 12.0609 12.1366 12.0929 12.2743 12.0929C12.4119 12.0929 12.5378 12.0609 12.6521 11.9968ZM16.4101 16.25H12.2755C12.2755 16.0416 12.2684 15.8333 12.2543 15.625C12.2401 15.4166 12.2189 15.2083 12.1906 15H16.4101C16.4849 15 16.5464 14.9759 16.5944 14.9279C16.6425 14.8798 16.6666 14.8183 16.6666 14.7435V5.25642C16.6666 5.18163 16.6425 5.12019 16.5944 5.0721C16.5464 5.02402 16.4849 4.99998 16.4101 4.99998H3.58967C3.51488 4.99998 3.45344 5.02402 3.40536 5.0721C3.35727 5.12019 3.33323 5.18163 3.33323 5.25642V6.14263C3.1249 6.11431 2.91657 6.09307 2.70825 6.07892C2.49992 6.06476 2.29159 6.05769 2.08325 6.05769V5.25642C2.08325 4.84215 2.23076 4.48752 2.52577 4.19252C2.82077 3.89751 3.17541 3.75 3.58967 3.75H16.4101C16.8244 3.75 17.179 3.89751 17.474 4.19252C17.769 4.48752 17.9165 4.84215 17.9165 5.25642V14.7435C17.9165 15.1578 17.769 15.5124 17.474 15.8074C17.179 16.1025 16.8244 16.25 16.4101 16.25ZM6.58498 16.25C6.41715 16.25 6.27127 16.1973 6.14734 16.0921C6.02341 15.9869 5.94595 15.8498 5.91498 15.681C5.79425 14.8274 5.42592 14.1017 4.81 13.504C4.19409 12.9062 3.45664 12.5443 2.59767 12.4182C2.43692 12.3974 2.31099 12.3219 2.2199 12.1917C2.1288 12.0615 2.08325 11.913 2.08325 11.7464C2.08325 11.5693 2.14362 11.4209 2.26436 11.3013C2.38508 11.1816 2.52556 11.133 2.68581 11.1555C3.8685 11.2901 4.87623 11.7759 5.70902 12.613C6.54181 13.45 7.02712 14.4599 7.16494 15.6426C7.18737 15.8114 7.1409 15.9548 7.02552 16.0729C6.91013 16.1909 6.76329 16.25 6.58498 16.25ZM9.82361 16.25C9.64091 16.25 9.49107 16.1869 9.37409 16.0609C9.25711 15.9348 9.18741 15.7777 9.16496 15.5897C9.00257 13.86 8.31027 12.3918 7.08804 11.1851C5.86582 9.97834 4.3872 9.3034 2.65217 9.16023C2.48336 9.14313 2.34634 9.07206 2.24111 8.94702C2.13587 8.82197 2.08325 8.67607 2.08325 8.50933C2.08325 8.33217 2.14148 8.18162 2.25794 8.05769C2.37438 7.93377 2.5154 7.88035 2.681 7.89744C4.7622 8.0406 6.53275 8.84135 7.99267 10.2997C9.4526 11.758 10.2627 13.5235 10.4229 15.5961C10.44 15.7788 10.3887 15.9334 10.2689 16.06C10.1491 16.1867 10.0007 16.25 9.82361 16.25ZM2.93215 16.25C2.6942 16.25 2.49324 16.1678 2.32925 16.0035C2.16525 15.8392 2.08325 15.6381 2.08325 15.4001C2.08325 15.1622 2.1654 14.9612 2.32971 14.7972C2.494 14.6332 2.69512 14.5512 2.93306 14.5512C3.17101 14.5512 3.37197 14.6334 3.53596 14.7977C3.69996 14.962 3.78196 15.1631 3.78196 15.4011C3.78196 15.639 3.69981 15.84 3.5355 16.004C3.37121 16.168 3.17009 16.25 2.93215 16.25Z\"\n                                                    fill=\"#6B7385\" />\n                                            </svg>\n                                            12 lesson\n                                        </li>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\"\n                                                xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path\n                                                    d=\"M2.25174 16.0896C2.03834 16.0896 1.85945 16.0174 1.71508 15.873C1.57072 15.7287 1.49854 15.5498 1.49854 15.3364V14.237C1.49854 13.8075 1.60938 13.4243 1.83108 13.0872C2.05276 12.7501 2.34881 12.4879 2.71924 12.3005C3.5112 11.9131 4.30755 11.6145 5.10828 11.4045C5.90904 11.1946 6.78911 11.0896 7.74852 11.0896C8.70792 11.0896 9.58799 11.1946 10.3887 11.4045C11.1895 11.6145 11.9858 11.9131 12.7778 12.3005C13.1482 12.4879 13.4443 12.7501 13.666 13.0872C13.8876 13.4243 13.9985 13.8075 13.9985 14.237V15.3364C13.9985 15.5498 13.9263 15.7287 13.7819 15.873C13.6376 16.0174 13.4587 16.0896 13.2453 16.0896H2.25174ZM15.3414 16.0896C15.4437 16.0024 15.5232 15.8934 15.58 15.7626C15.6367 15.6318 15.6651 15.4855 15.6651 15.3236V14.1345C15.6651 13.5875 15.5312 13.0662 15.2633 12.5705C14.9955 12.0749 14.6155 11.6497 14.1235 11.2948C14.6823 11.3781 15.2127 11.5071 15.7148 11.6818C16.217 11.8565 16.6961 12.0629 17.1523 12.3012C17.5829 12.5309 17.9154 12.8016 18.1499 13.1133C18.3844 13.4251 18.5017 13.7655 18.5017 14.1345V15.3364C18.5017 15.5498 18.4295 15.7287 18.2851 15.873C18.1407 16.0174 17.9619 16.0896 17.7485 16.0896H15.3414ZM7.74852 9.74343C6.94645 9.74343 6.25982 9.45784 5.68864 8.88668C5.11746 8.3155 4.83187 7.62887 4.83187 6.8268C4.83187 6.02472 5.11746 5.33809 5.68864 4.76693C6.25982 4.19575 6.94645 3.91016 7.74852 3.91016C8.55058 3.91016 9.23721 4.19575 9.80839 4.76693C10.3796 5.33809 10.6651 6.02472 10.6651 6.8268C10.6651 7.62887 10.3796 8.3155 9.80839 8.88668C9.23721 9.45784 8.55058 9.74343 7.74852 9.74343ZM14.944 6.8268C14.944 7.62887 14.6584 8.3155 14.0872 8.88668C13.516 9.45784 12.8294 9.74343 12.0273 9.74343C11.9333 9.74343 11.8136 9.73275 11.6683 9.71139C11.5231 9.69003 11.4034 9.66653 11.3094 9.64089C11.638 9.24579 11.8906 8.80748 12.0671 8.32595C12.2436 7.84442 12.3318 7.34437 12.3318 6.8258C12.3318 6.30725 12.2418 5.80918 12.0618 5.33162C11.8818 4.85406 11.631 4.41443 11.3094 4.01272C11.429 3.96998 11.5487 3.94221 11.6683 3.92939C11.788 3.91657 11.9077 3.91016 12.0273 3.91016C12.8294 3.91016 13.516 4.19575 14.0872 4.76693C14.6584 5.33809 14.944 6.02472 14.944 6.8268ZM2.74851 14.8396H12.7485V14.237C12.7485 14.0629 12.705 13.908 12.6179 13.7723C12.5308 13.6366 12.3927 13.518 12.2036 13.4165C11.5177 13.0629 10.8115 12.795 10.0851 12.6128C9.35856 12.4307 8.57971 12.3396 7.74852 12.3396C6.91732 12.3396 6.13847 12.4307 5.41197 12.6128C4.68549 12.795 3.97929 13.0629 3.29339 13.4165C3.10429 13.518 2.9662 13.6366 2.87912 13.7723C2.79205 13.908 2.74851 14.0629 2.74851 14.237V14.8396ZM7.74852 8.49347C8.20685 8.49347 8.59921 8.33028 8.9256 8.00389C9.25199 7.6775 9.41518 7.28514 9.41518 6.8268C9.41518 6.36847 9.25199 5.97611 8.9256 5.64972C8.59921 5.32333 8.20685 5.16014 7.74852 5.16014C7.29018 5.16014 6.89782 5.32333 6.57143 5.64972C6.24504 5.97611 6.08185 6.36847 6.08185 6.8268C6.08185 7.28514 6.24504 7.6775 6.57143 8.00389C6.89782 8.33028 7.29018 8.49347 7.74852 8.49347Z\"\n                                                    fill=\"#6B7385\" />\n                                            </svg>\n                                            50 Students\n                                        </li>\n                                    </ul>\n                                    <p class=\"description\">It is a long established fact that a reader will be\n                                        distracted by the readable...</p>\n                                    <div class=\"creator\">\n                                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/profile.png\"\n                                            alt=\"...\">\n                                        <p>by <span>Angelina Ross</span> in <span>Design</span></p>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class=\"col-lg-6 col-md-12 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-feature\">\n                        <div class=\"row\">\n                            <div class=\"col-lg-4 col-md-4\">\n                                <div class=\"courses-img\">\n                                    <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/course-3.png\"\n                                        alt=\"...\">\n                                    <div class=\"cText d-flex\">\n                                        <h4>$60.00</h4>\n                                        <del>$30.00</del>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"col-lg-8 col-md-8\">\n                                <div class=\"entry-details\">\n                                    <div class=\"entry-title\">\n                                        <h3>After Effect 2023 Complete Course</h3>\n                                        <span class=\"heart\"><i class=\"fa-regular fa-heart\"></i></span>\n                                    </div>\n                                    <ul>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\"\n                                                xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path\n                                                    d=\"M12.6521 9.54004L14.8477 8.27081C14.9758 8.19549 15.0399 8.08879 15.0399 7.95071C15.0399 7.81263 14.9758 7.70458 14.8477 7.62658L12.6521 6.35735C12.5395 6.29326 12.4144 6.26121 12.2768 6.26121C12.1392 6.26121 12.0133 6.29326 11.8989 6.35735L9.70344 7.62658C9.57523 7.7019 9.51113 7.8086 9.51113 7.94669C9.51113 8.08479 9.57523 8.19283 9.70344 8.27081L11.8989 9.54004C12.0115 9.60414 12.1366 9.63619 12.2743 9.63619C12.4119 9.63619 12.5378 9.60414 12.6521 9.54004ZM12.6521 11.9968L14.1265 11.1554C14.2395 11.0928 14.3305 11.0021 14.3995 10.8832C14.4686 10.7643 14.5031 10.636 14.5031 10.4984V9.32371L12.6521 10.399C12.5392 10.4685 12.4136 10.5032 12.2755 10.5032C12.1374 10.5032 12.0119 10.4685 11.8989 10.399L10.048 9.32371V10.4984C10.048 10.636 10.0825 10.7643 10.1515 10.8832C10.2206 11.0021 10.3116 11.0928 10.4246 11.1554L11.8989 11.9968C12.0115 12.0609 12.1366 12.0929 12.2743 12.0929C12.4119 12.0929 12.5378 12.0609 12.6521 11.9968ZM16.4101 16.25H12.2755C12.2755 16.0416 12.2684 15.8333 12.2543 15.625C12.2401 15.4166 12.2189 15.2083 12.1906 15H16.4101C16.4849 15 16.5464 14.9759 16.5944 14.9279C16.6425 14.8798 16.6666 14.8183 16.6666 14.7435V5.25642C16.6666 5.18163 16.6425 5.12019 16.5944 5.0721C16.5464 5.02402 16.4849 4.99998 16.4101 4.99998H3.58967C3.51488 4.99998 3.45344 5.02402 3.40536 5.0721C3.35727 5.12019 3.33323 5.18163 3.33323 5.25642V6.14263C3.1249 6.11431 2.91657 6.09307 2.70825 6.07892C2.49992 6.06476 2.29159 6.05769 2.08325 6.05769V5.25642C2.08325 4.84215 2.23076 4.48752 2.52577 4.19252C2.82077 3.89751 3.17541 3.75 3.58967 3.75H16.4101C16.8244 3.75 17.179 3.89751 17.474 4.19252C17.769 4.48752 17.9165 4.84215 17.9165 5.25642V14.7435C17.9165 15.1578 17.769 15.5124 17.474 15.8074C17.179 16.1025 16.8244 16.25 16.4101 16.25ZM6.58498 16.25C6.41715 16.25 6.27127 16.1973 6.14734 16.0921C6.02341 15.9869 5.94595 15.8498 5.91498 15.681C5.79425 14.8274 5.42592 14.1017 4.81 13.504C4.19409 12.9062 3.45664 12.5443 2.59767 12.4182C2.43692 12.3974 2.31099 12.3219 2.2199 12.1917C2.1288 12.0615 2.08325 11.913 2.08325 11.7464C2.08325 11.5693 2.14362 11.4209 2.26436 11.3013C2.38508 11.1816 2.52556 11.133 2.68581 11.1555C3.8685 11.2901 4.87623 11.7759 5.70902 12.613C6.54181 13.45 7.02712 14.4599 7.16494 15.6426C7.18737 15.8114 7.1409 15.9548 7.02552 16.0729C6.91013 16.1909 6.76329 16.25 6.58498 16.25ZM9.82361 16.25C9.64091 16.25 9.49107 16.1869 9.37409 16.0609C9.25711 15.9348 9.18741 15.7777 9.16496 15.5897C9.00257 13.86 8.31027 12.3918 7.08804 11.1851C5.86582 9.97834 4.3872 9.3034 2.65217 9.16023C2.48336 9.14313 2.34634 9.07206 2.24111 8.94702C2.13587 8.82197 2.08325 8.67607 2.08325 8.50933C2.08325 8.33217 2.14148 8.18162 2.25794 8.05769C2.37438 7.93377 2.5154 7.88035 2.681 7.89744C4.7622 8.0406 6.53275 8.84135 7.99267 10.2997C9.4526 11.758 10.2627 13.5235 10.4229 15.5961C10.44 15.7788 10.3887 15.9334 10.2689 16.06C10.1491 16.1867 10.0007 16.25 9.82361 16.25ZM2.93215 16.25C2.6942 16.25 2.49324 16.1678 2.32925 16.0035C2.16525 15.8392 2.08325 15.6381 2.08325 15.4001C2.08325 15.1622 2.1654 14.9612 2.32971 14.7972C2.494 14.6332 2.69512 14.5512 2.93306 14.5512C3.17101 14.5512 3.37197 14.6334 3.53596 14.7977C3.69996 14.962 3.78196 15.1631 3.78196 15.4011C3.78196 15.639 3.69981 15.84 3.5355 16.004C3.37121 16.168 3.17009 16.25 2.93215 16.25Z\"\n                                                    fill=\"#6B7385\" />\n                                            </svg>\n                                            12 lesson\n                                        </li>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\"\n                                                xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path\n                                                    d=\"M2.25174 16.0896C2.03834 16.0896 1.85945 16.0174 1.71508 15.873C1.57072 15.7287 1.49854 15.5498 1.49854 15.3364V14.237C1.49854 13.8075 1.60938 13.4243 1.83108 13.0872C2.05276 12.7501 2.34881 12.4879 2.71924 12.3005C3.5112 11.9131 4.30755 11.6145 5.10828 11.4045C5.90904 11.1946 6.78911 11.0896 7.74852 11.0896C8.70792 11.0896 9.58799 11.1946 10.3887 11.4045C11.1895 11.6145 11.9858 11.9131 12.7778 12.3005C13.1482 12.4879 13.4443 12.7501 13.666 13.0872C13.8876 13.4243 13.9985 13.8075 13.9985 14.237V15.3364C13.9985 15.5498 13.9263 15.7287 13.7819 15.873C13.6376 16.0174 13.4587 16.0896 13.2453 16.0896H2.25174ZM15.3414 16.0896C15.4437 16.0024 15.5232 15.8934 15.58 15.7626C15.6367 15.6318 15.6651 15.4855 15.6651 15.3236V14.1345C15.6651 13.5875 15.5312 13.0662 15.2633 12.5705C14.9955 12.0749 14.6155 11.6497 14.1235 11.2948C14.6823 11.3781 15.2127 11.5071 15.7148 11.6818C16.217 11.8565 16.6961 12.0629 17.1523 12.3012C17.5829 12.5309 17.9154 12.8016 18.1499 13.1133C18.3844 13.4251 18.5017 13.7655 18.5017 14.1345V15.3364C18.5017 15.5498 18.4295 15.7287 18.2851 15.873C18.1407 16.0174 17.9619 16.0896 17.7485 16.0896H15.3414ZM7.74852 9.74343C6.94645 9.74343 6.25982 9.45784 5.68864 8.88668C5.11746 8.3155 4.83187 7.62887 4.83187 6.8268C4.83187 6.02472 5.11746 5.33809 5.68864 4.76693C6.25982 4.19575 6.94645 3.91016 7.74852 3.91016C8.55058 3.91016 9.23721 4.19575 9.80839 4.76693C10.3796 5.33809 10.6651 6.02472 10.6651 6.8268C10.6651 7.62887 10.3796 8.3155 9.80839 8.88668C9.23721 9.45784 8.55058 9.74343 7.74852 9.74343ZM14.944 6.8268C14.944 7.62887 14.6584 8.3155 14.0872 8.88668C13.516 9.45784 12.8294 9.74343 12.0273 9.74343C11.9333 9.74343 11.8136 9.73275 11.6683 9.71139C11.5231 9.69003 11.4034 9.66653 11.3094 9.64089C11.638 9.24579 11.8906 8.80748 12.0671 8.32595C12.2436 7.84442 12.3318 7.34437 12.3318 6.8258C12.3318 6.30725 12.2418 5.80918 12.0618 5.33162C11.8818 4.85406 11.631 4.41443 11.3094 4.01272C11.429 3.96998 11.5487 3.94221 11.6683 3.92939C11.788 3.91657 11.9077 3.91016 12.0273 3.91016C12.8294 3.91016 13.516 4.19575 14.0872 4.76693C14.6584 5.33809 14.944 6.02472 14.944 6.8268ZM2.74851 14.8396H12.7485V14.237C12.7485 14.0629 12.705 13.908 12.6179 13.7723C12.5308 13.6366 12.3927 13.518 12.2036 13.4165C11.5177 13.0629 10.8115 12.795 10.0851 12.6128C9.35856 12.4307 8.57971 12.3396 7.74852 12.3396C6.91732 12.3396 6.13847 12.4307 5.41197 12.6128C4.68549 12.795 3.97929 13.0629 3.29339 13.4165C3.10429 13.518 2.9662 13.6366 2.87912 13.7723C2.79205 13.908 2.74851 14.0629 2.74851 14.237V14.8396ZM7.74852 8.49347C8.20685 8.49347 8.59921 8.33028 8.9256 8.00389C9.25199 7.6775 9.41518 7.28514 9.41518 6.8268C9.41518 6.36847 9.25199 5.97611 8.9256 5.64972C8.59921 5.32333 8.20685 5.16014 7.74852 5.16014C7.29018 5.16014 6.89782 5.32333 6.57143 5.64972C6.24504 5.97611 6.08185 6.36847 6.08185 6.8268C6.08185 7.28514 6.24504 7.6775 6.57143 8.00389C6.89782 8.33028 7.29018 8.49347 7.74852 8.49347Z\"\n                                                    fill=\"#6B7385\" />\n                                            </svg>\n                                            50 Students\n                                        </li>\n                                    </ul>\n                                    <p class=\"description\">It is a long established fact that a reader will be\n                                        distracted by the readable...</p>\n                                    <div class=\"creator\">\n                                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/profile.png\"\n                                            alt=\"...\">\n                                        <p>by <span>Angelina Ross</span> in <span>Design</span></p>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class=\"col-lg-6 col-md-12 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-feature\">\n                        <div class=\"row\">\n                            <div class=\"col-lg-4 col-md-4\">\n                                <div class=\"courses-img\">\n                                    <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/course-4.png\"\n                                        alt=\"...\">\n                                    <div class=\"cText d-flex\">\n                                        <h4>$60.00</h4>\n                                        <del>$30.00</del>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"col-lg-8 col-md-8\">\n                                <div class=\"entry-details\">\n                                    <div class=\"entry-title\">\n                                        <h3>The Complete Graphic Design Theory</h3>\n                                        <span class=\"heart\"><i class=\"fa-regular fa-heart\"></i></span>\n                                    </div>\n                                    <ul>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\"\n                                                xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path\n                                                    d=\"M12.6521 9.54004L14.8477 8.27081C14.9758 8.19549 15.0399 8.08879 15.0399 7.95071C15.0399 7.81263 14.9758 7.70458 14.8477 7.62658L12.6521 6.35735C12.5395 6.29326 12.4144 6.26121 12.2768 6.26121C12.1392 6.26121 12.0133 6.29326 11.8989 6.35735L9.70344 7.62658C9.57523 7.7019 9.51113 7.8086 9.51113 7.94669C9.51113 8.08479 9.57523 8.19283 9.70344 8.27081L11.8989 9.54004C12.0115 9.60414 12.1366 9.63619 12.2743 9.63619C12.4119 9.63619 12.5378 9.60414 12.6521 9.54004ZM12.6521 11.9968L14.1265 11.1554C14.2395 11.0928 14.3305 11.0021 14.3995 10.8832C14.4686 10.7643 14.5031 10.636 14.5031 10.4984V9.32371L12.6521 10.399C12.5392 10.4685 12.4136 10.5032 12.2755 10.5032C12.1374 10.5032 12.0119 10.4685 11.8989 10.399L10.048 9.32371V10.4984C10.048 10.636 10.0825 10.7643 10.1515 10.8832C10.2206 11.0021 10.3116 11.0928 10.4246 11.1554L11.8989 11.9968C12.0115 12.0609 12.1366 12.0929 12.2743 12.0929C12.4119 12.0929 12.5378 12.0609 12.6521 11.9968ZM16.4101 16.25H12.2755C12.2755 16.0416 12.2684 15.8333 12.2543 15.625C12.2401 15.4166 12.2189 15.2083 12.1906 15H16.4101C16.4849 15 16.5464 14.9759 16.5944 14.9279C16.6425 14.8798 16.6666 14.8183 16.6666 14.7435V5.25642C16.6666 5.18163 16.6425 5.12019 16.5944 5.0721C16.5464 5.02402 16.4849 4.99998 16.4101 4.99998H3.58967C3.51488 4.99998 3.45344 5.02402 3.40536 5.0721C3.35727 5.12019 3.33323 5.18163 3.33323 5.25642V6.14263C3.1249 6.11431 2.91657 6.09307 2.70825 6.07892C2.49992 6.06476 2.29159 6.05769 2.08325 6.05769V5.25642C2.08325 4.84215 2.23076 4.48752 2.52577 4.19252C2.82077 3.89751 3.17541 3.75 3.58967 3.75H16.4101C16.8244 3.75 17.179 3.89751 17.474 4.19252C17.769 4.48752 17.9165 4.84215 17.9165 5.25642V14.7435C17.9165 15.1578 17.769 15.5124 17.474 15.8074C17.179 16.1025 16.8244 16.25 16.4101 16.25ZM6.58498 16.25C6.41715 16.25 6.27127 16.1973 6.14734 16.0921C6.02341 15.9869 5.94595 15.8498 5.91498 15.681C5.79425 14.8274 5.42592 14.1017 4.81 13.504C4.19409 12.9062 3.45664 12.5443 2.59767 12.4182C2.43692 12.3974 2.31099 12.3219 2.2199 12.1917C2.1288 12.0615 2.08325 11.913 2.08325 11.7464C2.08325 11.5693 2.14362 11.4209 2.26436 11.3013C2.38508 11.1816 2.52556 11.133 2.68581 11.1555C3.8685 11.2901 4.87623 11.7759 5.70902 12.613C6.54181 13.45 7.02712 14.4599 7.16494 15.6426C7.18737 15.8114 7.1409 15.9548 7.02552 16.0729C6.91013 16.1909 6.76329 16.25 6.58498 16.25ZM9.82361 16.25C9.64091 16.25 9.49107 16.1869 9.37409 16.0609C9.25711 15.9348 9.18741 15.7777 9.16496 15.5897C9.00257 13.86 8.31027 12.3918 7.08804 11.1851C5.86582 9.97834 4.3872 9.3034 2.65217 9.16023C2.48336 9.14313 2.34634 9.07206 2.24111 8.94702C2.13587 8.82197 2.08325 8.67607 2.08325 8.50933C2.08325 8.33217 2.14148 8.18162 2.25794 8.05769C2.37438 7.93377 2.5154 7.88035 2.681 7.89744C4.7622 8.0406 6.53275 8.84135 7.99267 10.2997C9.4526 11.758 10.2627 13.5235 10.4229 15.5961C10.44 15.7788 10.3887 15.9334 10.2689 16.06C10.1491 16.1867 10.0007 16.25 9.82361 16.25ZM2.93215 16.25C2.6942 16.25 2.49324 16.1678 2.32925 16.0035C2.16525 15.8392 2.08325 15.6381 2.08325 15.4001C2.08325 15.1622 2.1654 14.9612 2.32971 14.7972C2.494 14.6332 2.69512 14.5512 2.93306 14.5512C3.17101 14.5512 3.37197 14.6334 3.53596 14.7977C3.69996 14.962 3.78196 15.1631 3.78196 15.4011C3.78196 15.639 3.69981 15.84 3.5355 16.004C3.37121 16.168 3.17009 16.25 2.93215 16.25Z\"\n                                                    fill=\"#6B7385\" />\n                                            </svg>\n                                            12 lesson\n                                        </li>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\"\n                                                xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path\n                                                    d=\"M2.25174 16.0896C2.03834 16.0896 1.85945 16.0174 1.71508 15.873C1.57072 15.7287 1.49854 15.5498 1.49854 15.3364V14.237C1.49854 13.8075 1.60938 13.4243 1.83108 13.0872C2.05276 12.7501 2.34881 12.4879 2.71924 12.3005C3.5112 11.9131 4.30755 11.6145 5.10828 11.4045C5.90904 11.1946 6.78911 11.0896 7.74852 11.0896C8.70792 11.0896 9.58799 11.1946 10.3887 11.4045C11.1895 11.6145 11.9858 11.9131 12.7778 12.3005C13.1482 12.4879 13.4443 12.7501 13.666 13.0872C13.8876 13.4243 13.9985 13.8075 13.9985 14.237V15.3364C13.9985 15.5498 13.9263 15.7287 13.7819 15.873C13.6376 16.0174 13.4587 16.0896 13.2453 16.0896H2.25174ZM15.3414 16.0896C15.4437 16.0024 15.5232 15.8934 15.58 15.7626C15.6367 15.6318 15.6651 15.4855 15.6651 15.3236V14.1345C15.6651 13.5875 15.5312 13.0662 15.2633 12.5705C14.9955 12.0749 14.6155 11.6497 14.1235 11.2948C14.6823 11.3781 15.2127 11.5071 15.7148 11.6818C16.217 11.8565 16.6961 12.0629 17.1523 12.3012C17.5829 12.5309 17.9154 12.8016 18.1499 13.1133C18.3844 13.4251 18.5017 13.7655 18.5017 14.1345V15.3364C18.5017 15.5498 18.4295 15.7287 18.2851 15.873C18.1407 16.0174 17.9619 16.0896 17.7485 16.0896H15.3414ZM7.74852 9.74343C6.94645 9.74343 6.25982 9.45784 5.68864 8.88668C5.11746 8.3155 4.83187 7.62887 4.83187 6.8268C4.83187 6.02472 5.11746 5.33809 5.68864 4.76693C6.25982 4.19575 6.94645 3.91016 7.74852 3.91016C8.55058 3.91016 9.23721 4.19575 9.80839 4.76693C10.3796 5.33809 10.6651 6.02472 10.6651 6.8268C10.6651 7.62887 10.3796 8.3155 9.80839 8.88668C9.23721 9.45784 8.55058 9.74343 7.74852 9.74343ZM14.944 6.8268C14.944 7.62887 14.6584 8.3155 14.0872 8.88668C13.516 9.45784 12.8294 9.74343 12.0273 9.74343C11.9333 9.74343 11.8136 9.73275 11.6683 9.71139C11.5231 9.69003 11.4034 9.66653 11.3094 9.64089C11.638 9.24579 11.8906 8.80748 12.0671 8.32595C12.2436 7.84442 12.3318 7.34437 12.3318 6.8258C12.3318 6.30725 12.2418 5.80918 12.0618 5.33162C11.8818 4.85406 11.631 4.41443 11.3094 4.01272C11.429 3.96998 11.5487 3.94221 11.6683 3.92939C11.788 3.91657 11.9077 3.91016 12.0273 3.91016C12.8294 3.91016 13.516 4.19575 14.0872 4.76693C14.6584 5.33809 14.944 6.02472 14.944 6.8268ZM2.74851 14.8396H12.7485V14.237C12.7485 14.0629 12.705 13.908 12.6179 13.7723C12.5308 13.6366 12.3927 13.518 12.2036 13.4165C11.5177 13.0629 10.8115 12.795 10.0851 12.6128C9.35856 12.4307 8.57971 12.3396 7.74852 12.3396C6.91732 12.3396 6.13847 12.4307 5.41197 12.6128C4.68549 12.795 3.97929 13.0629 3.29339 13.4165C3.10429 13.518 2.9662 13.6366 2.87912 13.7723C2.79205 13.908 2.74851 14.0629 2.74851 14.237V14.8396ZM7.74852 8.49347C8.20685 8.49347 8.59921 8.33028 8.9256 8.00389C9.25199 7.6775 9.41518 7.28514 9.41518 6.8268C9.41518 6.36847 9.25199 5.97611 8.9256 5.64972C8.59921 5.32333 8.20685 5.16014 7.74852 5.16014C7.29018 5.16014 6.89782 5.32333 6.57143 5.64972C6.24504 5.97611 6.08185 6.36847 6.08185 6.8268C6.08185 7.28514 6.24504 7.6775 6.57143 8.00389C6.89782 8.33028 7.29018 8.49347 7.74852 8.49347Z\"\n                                                    fill=\"#6B7385\" />\n                                            </svg>\n                                            50 Students\n                                        </li>\n                                    </ul>\n                                    <p class=\"description\">It is a long established fact that a reader will be\n                                        distracted by the readable...</p>\n                                    <div class=\"creator\">\n                                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/profile.png\"\n                                            alt=\"...\">\n                                        <p>by <span>Angelina Ross</span> in <span>Design</span></p>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n            </div>\n        </span>\n    </div>\n</section>', '', NULL, NULL);
INSERT INTO `builder_blocks` (`id`, `identifier`, `title`, `html`, `thumbnail`, `created_at`, `updated_at`) VALUES
(7, 'promo', 'Promo', '<section class=\"skill-wrapper section-padding\">\n    <div class=\"container\">\n        <div class=\"row align-items-center\">\n            <div class=\"col-lg-5 col-md-6\">\n                <div class=\"skill-image position-relative\">\n                    <span class=\"builder_image parent\" content_type=\"image\" id=\"placeholder_id\">\n                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/skill-image.png\" alt=\"...\">\n                    </span>\n                    <div class=\"over-text\">\n                        <span>\n                            <svg width=\"30\" height=\"30\" viewBox=\"0 0 30 30\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                <path d=\"M8.12494 20.0241C9.16021 20.0241 10.1674 20.1415 11.1466 20.3763C12.1258 20.6111 13.0977 20.9793 14.0625 21.4809V9.19239C13.1843 8.62028 12.2339 8.1912 11.2115 7.90514C10.1891 7.61907 9.16021 7.47604 8.12494 7.47604C7.37494 7.47604 6.67422 7.53493 6.02278 7.6527C5.37134 7.77049 4.70188 7.9632 4.01438 8.23082C3.91821 8.26289 3.85009 8.30897 3.81003 8.36907C3.76997 8.42918 3.74994 8.49528 3.74994 8.56739V20.3895C3.74994 20.5017 3.79 20.5838 3.87013 20.6359C3.95027 20.688 4.03843 20.694 4.13459 20.6539C4.72753 20.452 5.35332 20.2966 6.01197 20.1876C6.67061 20.0786 7.37494 20.0241 8.12494 20.0241ZM15.9374 21.4809C16.9022 20.9793 17.8741 20.6111 18.8533 20.3763C19.8324 20.1415 20.8397 20.0241 21.8749 20.0241C22.6249 20.0241 23.3293 20.0786 23.9879 20.1876C24.6466 20.2966 25.2723 20.452 25.8653 20.6539C25.9614 20.694 26.0496 20.688 26.1297 20.6359C26.2099 20.5838 26.2499 20.5017 26.2499 20.3895V8.56739C26.2499 8.49528 26.2299 8.43118 26.1898 8.37507C26.1498 8.31897 26.0817 8.27089 25.9855 8.23082C25.298 7.9632 24.6285 7.77049 23.9771 7.6527C23.3257 7.53493 22.6249 7.47604 21.8749 7.47604C20.8397 7.47604 19.8108 7.61907 18.7884 7.90514C17.7659 8.1912 16.8156 8.62028 15.9374 9.19239V21.4809ZM14.9999 23.7068C14.7564 23.7068 14.5284 23.6763 14.3161 23.6154C14.1037 23.5545 13.903 23.4736 13.7139 23.3726C12.8533 22.8854 11.9531 22.5181 11.0132 22.2704C10.0733 22.0229 9.11052 21.8991 8.12494 21.8991C7.36212 21.8991 6.61294 21.9836 5.87738 22.1527C5.14179 22.3217 4.43266 22.5705 3.74997 22.899C3.30447 23.1042 2.88059 23.0717 2.47834 22.8017C2.07611 22.5317 1.875 22.149 1.875 21.6539V8.08183C1.875 7.8126 1.9443 7.55979 2.08291 7.32342C2.22153 7.08704 2.42146 6.91677 2.68269 6.8126C3.52883 6.40075 4.41064 6.09587 5.32809 5.89795C6.24555 5.70003 7.17783 5.60107 8.12494 5.60107C9.34129 5.60107 10.5296 5.76734 11.6898 6.09989C12.8501 6.43241 13.9535 6.92319 14.9999 7.57223C16.0464 6.92319 17.1498 6.43241 18.31 6.09989C19.4703 5.76734 20.6586 5.60107 21.8749 5.60107C22.822 5.60107 23.7543 5.70003 24.6718 5.89795C25.5892 6.09587 26.471 6.40075 27.3172 6.8126C27.5784 6.91677 27.7783 7.08704 27.917 7.32342C28.0556 7.55979 28.1249 7.8126 28.1249 8.08183V21.6539C28.1249 22.149 27.9158 22.5276 27.4975 22.7897C27.0792 23.0517 26.6393 23.0801 26.1778 22.875C25.5031 22.5545 24.804 22.3117 24.0804 22.1467C23.3569 21.9816 22.6217 21.8991 21.8749 21.8991C20.8894 21.8991 19.9266 22.0229 18.9867 22.2704C18.0468 22.5181 17.1466 22.8854 16.286 23.3726C16.0969 23.4736 15.8961 23.5545 15.6838 23.6154C15.4715 23.6763 15.2435 23.7068 14.9999 23.7068ZM17.4278 11.077C17.4278 10.9376 17.4775 10.795 17.5768 10.6491C17.6762 10.5033 17.7892 10.4031 17.9158 10.3487C18.536 10.1003 19.1742 9.91195 19.8305 9.78376C20.4867 9.65555 21.1682 9.59145 21.8749 9.59145C22.2836 9.59145 22.679 9.61548 23.0612 9.66354C23.4434 9.71163 23.8284 9.77733 24.2163 9.86067C24.3637 9.89431 24.4911 9.97444 24.5985 10.101C24.7058 10.2276 24.7595 10.3751 24.7595 10.5434C24.7595 10.8254 24.671 11.0317 24.4939 11.1623C24.3168 11.2929 24.0873 11.3246 23.8052 11.2573C23.5056 11.1948 23.1943 11.1499 22.8713 11.1227C22.5484 11.0954 22.2163 11.0818 21.8749 11.0818C21.2692 11.0818 20.6758 11.1399 20.0949 11.2561C19.5139 11.3723 18.9598 11.5297 18.4326 11.7284C18.1377 11.8422 17.8966 11.8358 17.7091 11.7092C17.5216 11.5826 17.4278 11.3719 17.4278 11.077ZM17.4278 17.9039C17.4278 17.7645 17.4775 17.6199 17.5768 17.47C17.6762 17.3202 17.7892 17.218 17.9158 17.1635C18.5199 16.9151 19.1582 16.7289 19.8305 16.6047C20.5027 16.4805 21.1842 16.4184 21.8749 16.4184C22.2836 16.4184 22.679 16.4424 23.0612 16.4905C23.4434 16.5385 23.8284 16.6042 24.2163 16.6876C24.3637 16.7212 24.4911 16.8014 24.5985 16.928C24.7058 17.0546 24.7595 17.202 24.7595 17.3703C24.7595 17.6523 24.671 17.8586 24.4939 17.9892C24.3168 18.1198 24.0873 18.1515 23.8052 18.0842C23.5056 18.0217 23.1943 17.9768 22.8713 17.9496C22.5484 17.9223 22.2163 17.9087 21.8749 17.9087C21.2772 17.9087 20.6898 17.9656 20.1129 18.0794C19.536 18.1932 18.9839 18.3534 18.4567 18.5602C18.1618 18.682 17.9166 18.6788 17.7211 18.5505C17.5256 18.4223 17.4278 18.2068 17.4278 17.9039ZM17.4278 14.5025C17.4278 14.3631 17.4775 14.2204 17.5768 14.0746C17.6762 13.9288 17.7892 13.8286 17.9158 13.7741C18.536 13.5257 19.1742 13.3374 19.8305 13.2092C20.4867 13.081 21.1682 13.0169 21.8749 13.0169C22.2836 13.0169 22.679 13.041 23.0612 13.089C23.4434 13.1371 23.8284 13.2028 24.2163 13.2861C24.3637 13.3198 24.4911 13.3999 24.5985 13.5265C24.7058 13.6531 24.7595 13.8006 24.7595 13.9688C24.7595 14.2509 24.671 14.4572 24.4939 14.5878C24.3168 14.7184 24.0873 14.7501 23.8052 14.6828C23.5056 14.6203 23.1943 14.5754 22.8713 14.5481C22.5484 14.5209 22.2163 14.5073 21.8749 14.5073C21.2692 14.5073 20.6758 14.5654 20.0949 14.6815C19.5139 14.7977 18.9598 14.9552 18.4326 15.1539C18.1377 15.2677 17.8966 15.2613 17.7091 15.1347C17.5216 15.0081 17.4278 14.7974 17.4278 14.5025Z\" fill=\"white\"/>\n                                </svg>\n                                \n                        </span>\n                        <div class=\"b-text\">\n                            <h5>150k +</h5>\n                            <p>Top rated Courses</p>\n                        </div>\n                    </div>\n                </div>\n            </div>\n            <div class=\"col-lg-7 col-md-6\">\n                <div class=\"skil-content\">\n                    <span class=\"title-head builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Know About Us</span>\n                    <h2 class=\"title builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Learn & Grow Your Skills From <span class=\"gradient shadow-none color\">Educate</span></h2>\n                    <p class=\"description mt-5 builder_text parent\" content_type=\"text\" id=\"placeholder_id\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>\n                    <ul>\n                        <li>\n                            <div class=\"svg\">\n                                <svg width=\"28\" height=\"28\" viewBox=\"0 0 28 28\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                    <path d=\"M21.4083 16.3111L24.8186 12.8896C24.9709 12.7356 25.1492 12.6585 25.3535 12.6585C25.5578 12.6585 25.7407 12.7356 25.9022 12.8896C26.0638 13.0437 26.1427 13.224 26.1389 13.4307C26.1352 13.6373 26.0563 13.8144 25.9022 13.962L22.059 17.7761C21.874 17.9676 21.6539 18.0633 21.3986 18.0633C21.1434 18.0633 20.92 17.9676 20.7286 17.7761L18.8978 15.9274C18.7437 15.7804 18.6648 15.6083 18.6611 15.4111C18.6573 15.2138 18.7362 15.0345 18.8978 14.8729C19.0518 14.7189 19.2324 14.64 19.4396 14.6362C19.6468 14.6325 19.8274 14.7114 19.9814 14.8729L21.4083 16.3111ZM10.628 21.9694C8.90488 20.4288 7.48318 19.0886 6.36289 17.9489C5.24258 16.8091 4.36009 15.7924 3.71543 14.8987C3.07077 14.005 2.62092 13.1891 2.36589 12.4509C2.1109 11.7128 1.9834 10.9653 1.9834 10.2085C1.9834 8.64995 2.51737 7.32997 3.58532 6.24857C4.65325 5.16717 5.95675 4.62646 7.49584 4.62646C8.47555 4.62646 9.41374 4.85495 10.3104 5.31191C11.2071 5.76885 11.9703 6.42286 12.6 7.27392C13.2355 6.42101 13.9837 5.76654 14.8444 5.31051C15.7051 4.85448 16.6195 4.62646 17.5875 4.62646C18.992 4.62646 20.2312 5.07706 21.3051 5.97825C22.379 6.87942 23.0072 8.01729 23.1897 9.39186H21.6417C21.4517 8.48544 20.9918 7.71737 20.2619 7.08766C19.532 6.45796 18.6405 6.1431 17.5875 6.1431C16.5016 6.1431 15.6491 6.42018 15.0298 6.97435C14.4106 7.52852 13.7614 8.23712 13.0824 9.10016H12.1176C11.4042 8.21019 10.7393 7.49486 10.1231 6.95417C9.50685 6.41346 8.6311 6.1431 7.49584 6.1431C6.37255 6.1431 5.42576 6.53386 4.65544 7.31537C3.88515 8.0969 3.50001 9.06128 3.50001 10.2085C3.50001 10.8259 3.62153 11.4525 3.86459 12.0883C4.10765 12.7242 4.56459 13.4688 5.23542 14.3221C5.90626 15.1754 6.82987 16.188 8.00626 17.3599C9.18265 18.5318 10.7139 19.9689 12.6 21.671C13.131 21.1983 13.8418 20.5589 14.7325 19.7527C15.6232 18.9465 16.2743 18.3475 16.6856 17.9556L16.8531 18.1232L17.2218 18.4918L17.5904 18.8605L17.758 19.028C17.3347 19.4393 16.9043 19.8421 16.4668 20.2362C16.0293 20.6303 15.6363 20.9859 15.2878 21.303L13.2215 23.1697C13.03 23.3222 12.8229 23.3985 12.6 23.3985C12.3772 23.3985 12.17 23.3222 11.9786 23.1697L10.628 21.9694Z\" fill=\"#F81163\"/>\n                                    </svg>\n                            </div>\n                            <div class=\"skill-text\">\n                                <span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Life time Access</span>\n                                <p class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>\n                            </div>\n                        </li>\n                        <li>\n                            <div class=\"svg color-dash\">\n                                <svg width=\"28\" height=\"28\" viewBox=\"0 0 28 28\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                    <path d=\"M6.31752 20.0083C4.63719 20.0083 3.21281 19.4264 2.04437 18.2627C0.875956 17.0989 0.291748 15.6806 0.291748 14.0077C0.291748 12.3349 0.875995 10.914 2.04449 9.74505C3.213 8.57615 4.63712 7.9917 6.31685 7.9917C6.98557 7.9917 7.62746 8.10762 8.24252 8.33945C8.85757 8.57129 9.41637 8.90932 9.91894 9.35355L12.4699 11.5814L11.3212 12.5776L8.952 10.4798C8.59152 10.1672 8.18948 9.92712 7.74587 9.75961C7.30225 9.59207 6.84178 9.50831 6.36448 9.50831C5.10613 9.50831 4.03219 9.94615 3.14264 10.8218C2.25312 11.6975 1.80836 12.7584 1.80836 14.0044C1.80836 15.2504 2.25312 16.3147 3.14264 17.1971C4.03219 18.0796 5.10613 18.5209 6.36448 18.5209C6.84178 18.5209 7.30225 18.4371 7.74587 18.2696C8.18948 18.1021 8.59152 17.862 8.952 17.5494L18.0812 9.35355C18.5762 8.92128 19.1323 8.58623 19.7493 8.34841C20.3664 8.1106 21.0106 7.9917 21.6821 7.9917C23.3622 7.9917 24.7865 8.57532 25.9553 9.74255C27.124 10.9098 27.7084 12.3286 27.7084 13.999C27.7084 15.6868 27.1201 17.1104 25.9435 18.2695C24.767 19.4287 23.333 20.0083 21.6417 20.0083C20.9734 20.0083 20.3355 19.8905 19.7281 19.655C19.1207 19.4194 18.562 19.0832 18.052 18.6465L15.4943 16.3894L16.6789 15.4112L19.0481 17.5202C19.4086 17.8418 19.8106 18.0841 20.2542 18.2471C20.6979 18.4102 21.1583 18.4917 21.6356 18.4917C22.894 18.4917 23.9679 18.0539 24.8575 17.1782C25.747 16.3025 26.1917 15.2416 26.1917 13.9956C26.1917 12.7496 25.747 11.6854 24.8575 10.8029C23.9679 9.92038 22.894 9.47914 21.6356 9.47914C21.1583 9.47914 20.6979 9.56291 20.2542 9.73044C19.8106 9.89796 19.4086 10.138 19.0481 10.4506L9.92596 18.6442C9.4262 19.0974 8.86775 19.4381 8.2506 19.6662C7.63347 19.8943 6.98911 20.0083 6.31752 20.0083Z\" fill=\"#2F57EF\"/>\n                                    </svg>\n                            </div>\n                                <div class=\"skill-text\">\n                                    <span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Learn from Anywhere</span>\n                                    <p class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p> \n                             </div>\n                        </li>\n                    </ul>\n                    <span class=\"promo-more-button\">\n                        <a href=\"#\" class=\"eBtn gradient mt-50\">More about us <i class=\"fa-solid fa-arrow-right-long ms-2\"></i></a>\n                    </span>\n                </div>\n            </div>\n        </div>\n    </div>\n</section>', '', NULL, NULL),
(8, 'testimonial', 'Testimonial', '<section class=\"testimonials-wrapper section-padding\">\n    <span class=\"elips left-elips\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/Ellipse 8.png\" alt=\"...\"></span>\n    <span class=\"elips right-elips\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/Ellipse 9.png\" alt=\"...\"></span>\n    <div class=\"container\">\n        <div class=\"row\">\n            <div class=\"col-lg-4 col-md-4\">\n                <div class=\"section-title \">\n                    <span class=\"title-head builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Testimonial</span>\n                    <h2 class=\"title builder_text parent\" content_type=\"text\" id=\"placeholder_id\">What our clients says about us</h2>\n                    <p class=\"description mt-5 builder_text parent\" content_type=\"text\" id=\"placeholder_id\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>\n                </div>\n            </div>\n            <div class=\"col-lg-8 col-md-8\">\n                <div class=\"user-slider owl-carousel owl-theme\">\n                    <!-- Single User Opinion -->\n                    <div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"placeholder_id\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\">\n                                    <span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span>\n                                </p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div>\n                    <!-- Single User Opinion -->\n                    <div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"placeholder_id\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div>\n                    <!-- Single User Opinion -->\n                    <div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"placeholder_id\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <span class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                    <div class=\"user-info d-flex\">\n                                        <div>\n                                            <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Linchon Philips</span></h4>\n                                            <p><span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">CEO @ Yahoo</span></p>\n                                        </div>\n                                        <ul class=\"d-flex align-items-center\">\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                        </ul>\n                                    </div>\n                            </div>\n                        </div>\n                    </div>\n                    <!-- Single User Opinion -->\n                    <div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"placeholder_id\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div>\n                    <!-- Single User Opinion -->\n                    <div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"placeholder_id\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div>\n                    <!-- Single User Opinion -->\n                </div>\n            </div>\n        </div>\n    </div>\n</section>\n', '', NULL, NULL),
(9, 'blog', 'Blog', '<section class=\"blog-wrapper section-padding\">\n    <div class=\"container\">\n        <div class=\"row\">\n            <div class=\"col-lg-12\">\n                <div class=\"res-control d-flex align-items-center justify-content-between\">\n                    <div class=\"section-title mb-0\">\n                        <span class=\"title-head mb-10 builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Our Blog</span>\n                        <h2 class=\"title builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Have a look on our news</h2>\n                    </div>\n                    <span class=\"blog-view-all-button\">\n                        <a href=\"#\" class=\"eBtn gradient\">View All Blogs</a>\n                    </span>\n               </div>\n            </div>\n        </div>\n        <span class=\'blog\'>\n            <div class=\"row justify-content-center mt-50\">\n                <div class=\"col-lg-4 col-md-6 col-sm-6 mb-20\">\n                    <div class=\"Ecard card b-card\">\n                        <div class=\"card-head\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/blog1.png\" alt=\"...\">\n                            <span>Bussiness</span>\n                        </div>\n                        <div class=\"card-body\">\n                            <h4>Skills That You Can Learn From Education</h4>\n                            <p class=\"description\">It is a long established fact that a reader will be distracted by the readable...</p>\n                            <div class=\"b_bottom d-flex justify-content-between\">\n                                <a href=\"#\" class=\"read-text mt-0 stretched-link\">Read More<i class=\"fa-solid fa-arrow-right-long ms-2\"></i></a>\n                            <span>01 Jan, 2024</span>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n                <div class=\"col-lg-4 col-md-6 col-sm-6 mb-20\">\n                    <div class=\"Ecard card b-card\">\n                        <div class=\"card-head\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/blog2.png\" alt=\"...\">\n                            <span>Bussiness</span>\n                        </div>\n                        <div class=\"card-body\">\n                            <h4>Skills That You Can Learn From Education</h4>\n                            <p class=\"description\">It is a long established fact that a reader will be distracted by the readable...</p>\n                            <div class=\"b_bottom d-flex justify-content-between\">\n                                <a href=\"#\" class=\"read-text mt-0 stretched-link\">Read More<i class=\"fa-solid fa-arrow-right-long ms-2\"></i></a>\n                            <span>01 Jan, 2024</span>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n                <div class=\"col-lg-4 col-md-6 col-sm-6 mb-20\">\n                    <div class=\"Ecard card b-card\">\n                        <div class=\"card-head\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/blog3.png\" alt=\"...\">\n                            <span>Bussiness</span>\n                        </div>\n                        <div class=\"card-body\">\n                            <h4>Skills That You Can Learn From Education</h4>\n                            <p class=\"description\">It is a long established fact that a reader will be distracted by the readable...</p>\n                            <div class=\"b_bottom d-flex justify-content-between\">\n                                <a href=\"#\" class=\"read-text mt-0 stretched-link\">Read More<i class=\"fa-solid fa-arrow-right-long ms-2\"></i></a>\n                            <span>01 Jan, 2024</span>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n            </div>\n        </span>\n    </div>\n</section>', '', NULL, NULL),
(10, 'footer', 'Footer', '<footer class=\"footer-area\">\n    <div class=\"container\">\n        <div class=\"row\">\n            <div class=\"col-lg-4 col-md-4\">\n                <div class=\"footer-content\">\n                    <span class=\"builder_image parent\" content_type=\"image\" id=\"placeholder_id\" >\n                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/footer-logo.png\" alt=\"...\">\n                    </span>\n                    <p class=\"description builder_text parent\" content_type=\"text\" id=\"placeholder_id\">It is a long established fact that a reader will be the distract by the read content of a page  layout.</p>\n\n                    <span class=\"footer-social-contact\">\n                        <ul class=\"f-socials d-flex\">\n                            <li><a href=\"#\"><i class=\"fa-brands fa-twitter\"></i></a></li>\n                            <li><a href=\"#\"><i class=\"fa-brands fa-facebook-f\"></i></a></li>\n                            <li><a href=\"#\"><i class=\"fa-brands fa-linkedin-in\"></i></a></li>\n                            <li><a href=\"#\"><i class=\"fa-brands fa-instagram\"></i></a></li>\n                        </ul>\n                        <div class=\"gradient-border2\">\n                            <a href=\"#\" class=\"gradient-border-btn\">Contact with Us <i class=\"fa-solid fa-arrow-right-long ms-2\"></i></a>\n                        </div>\n                    </span>\n                </div>\n            </div>\n            <div class=\"col-lg-8 col-md-8\">\n                <div class=\"row\">\n                    <div class=\"col-lg-3 col-md-6\">\n                        <span class=\"footer-widget-1\">\n                            <div class=\"footer-widget\">\n                                <h4>Resources</h4>\n                                <ul>\n                                    <li><a href=\"#\">Academy</a></li>\n                                    <li><a href=\"#\">Blog</a></li>\n                                    <li><a href=\"#\">Themes</a></li>\n                                    <li><a href=\"#\">Hosting</a></li>\n                                    <li><a href=\"#\">Developer</a></li>\n                                </ul>\n                            </div>\n                        </span>\n                    </div>\n                    <div class=\"col-lg-3 col-md-6\">\n                        <span class=\"footer-widget-2\">\n                            <div class=\"footer-widget\">\n                                <h4>Company</h4>\n                                <ul>\n                                    <li><a href=\"#\">About Us</a></li>\n                                    <li><a href=\"#\">Careers</a></li>\n                                    <li><a href=\"#\">FAQs</a></li>\n                                    <li><a href=\"#\">Teams</a></li>\n                                    <li><a href=\"#\">Contact Us</a></li>\n                                </ul>\n                            </div>\n                        </span>\n                    </div>\n                    <div class=\"col-lg-6 col-md-6\">\n                        <div class=\"footer-widget\">\n                            <span class=\"footer-widget-3\">\n                                <h4>Company</h4>\n                                <ul>\n                                    <li><a href=\"#\">Phone : +76 398 380 422</a></li>\n                                    <li><a href=\"#\">Email : companyname@gmail.com</a></li>\n                                </ul>\n                            </span>\n                           <div class=\"newslater-bottom\">\n                                <h4 class=\"builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Newsletter</h4>\n                                <p class=\"description builder_text parent\" content_type=\"text\" id=\"placeholder_id\">Subscribe to stay tuned for new web design and latest updates. Let\'s do it! </p>\n                                <span class=\"footer-subscription-form\"><form action=\"#\" class=\"newslater-form\">\n                                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter your email here\">\n                                    <button class=\"eBtn gradient\">Submit</button>\n                                </form></span>\n                           </div>\n                        </div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n    <span class=\"footer-bottom\">\n        <div class=\"footer-bottom\">\n            <div class=\"container\">\n                <div class=\"row\">\n                    <div class=\"col-lg-8\">\n                        <ul class=\"footer-policy\">\n                            <li><a href=\"#\">Privacy Policy</a></li>\n                            <li><a href=\"#\">Terms And Use</a></li>\n                            <li><a href=\"#\">Sales and Refunds</a></li>\n                            <li><a href=\"#\">Legal</a></li>\n                            <li><a href=\"#\">Site Map</a></li>\n                        </ul>\n                    </div>\n                    <div class=\"col-lg-4\">\n                        <div class=\"copyright-text\">\n                            <p>© 2023 All Rights Reserved</p>\n                        </div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </span>\n</footer>', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `builder_pages`
--

CREATE TABLE `builder_pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `html` longtext,
  `identifier` varchar(255) DEFAULT NULL,
  `is_permanent` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `edit_home_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `builder_pages`
--

INSERT INTO `builder_pages` (`id`, `name`, `html`, `identifier`, `is_permanent`, `status`, `edit_home_id`, `created_at`, `updated_at`) VALUES
(12, 'Elegant', '', 'elegant', 1, 0, NULL, '2024-03-18 06:15:40', '2024-05-29 23:14:06'),
(13, 'Kindergarden', '', 'kindergarden', 1, 0, 1, '2024-03-18 06:15:40', '2024-05-29 23:14:06'),
(14, 'Cooking', '', 'cooking', 1, 0, 1, '2024-03-18 06:15:40', '2024-05-29 23:14:06'),
(15, 'University', '', 'university', 1, 0, 1, '2024-03-18 06:15:40', '2024-05-29 23:14:06'),
(16, 'Language', '', 'language', 1, 0, NULL, '2024-03-18 06:15:40', '2024-05-29 23:14:06'),
(17, 'Development', '', 'development', 1, 0, 1, '2024-03-18 06:15:40', '2024-05-29 23:14:06'),
(18, 'Marketplace', '', 'marketplace', 1, 0, 1, '2024-03-18 06:15:40', '2024-05-29 23:14:06'),
(19, 'Meditation', '', 'meditation', 1, 0, 1, '2024-03-18 06:15:40', '2024-05-29 23:14:06');
INSERT INTO `builder_pages` (`id`, `name`, `html`, `identifier`, `is_permanent`, `status`, `edit_home_id`, `created_at`, `updated_at`) VALUES
(20, 'Default', '<div class=\"section parent ui-sortable-handle\" id=\"932\">\n        <span class=\"topbar\">\n    <div class=\"sub-header\">\n        <div class=\"container\">\n            <div class=\"row\">\n                <div class=\"col-lg-6 col-md-6\">\n                    <div class=\"sub-header-left\">\n                        <ul class=\"d-flex\">\n                            <li>\n                                <a href=\"tel:+143-52-9933631\">\n                                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                        <path d=\"M18.3018 15.2734C18.3018 15.5734 18.2352 15.8817 18.0935 16.1817C17.9518 16.4817 17.7685 16.765 17.5268 17.0317C17.1185 17.4817 16.6685 17.8067 16.1602 18.015C15.6602 18.2234 15.1185 18.3317 14.5352 18.3317C13.6852 18.3317 12.7768 18.1317 11.8185 17.7234C10.8602 17.315 9.90182 16.765 8.95182 16.0734C7.99349 15.3734 7.08516 14.5984 6.21849 13.74C5.36016 12.8734 4.58516 11.965 3.89349 11.015C3.21016 10.065 2.66016 9.11504 2.26016 8.17337C1.86016 7.22337 1.66016 6.31504 1.66016 5.44837C1.66016 4.88171 1.76016 4.34004 1.96016 3.84004C2.16016 3.33171 2.47682 2.86504 2.91849 2.44837C3.45182 1.92337 4.03516 1.66504 4.65182 1.66504C4.88516 1.66504 5.11849 1.71504 5.32682 1.81504C5.54349 1.91504 5.73516 2.06504 5.88516 2.28171L7.81849 5.00671C7.96849 5.21504 8.07682 5.40671 8.15182 5.59004C8.22682 5.76504 8.26849 5.94004 8.26849 6.09837C8.26849 6.29837 8.21016 6.49837 8.09349 6.69004C7.98516 6.8817 7.82682 7.0817 7.62682 7.2817L6.99349 7.94004C6.90182 8.0317 6.86016 8.14004 6.86016 8.27337C6.86016 8.34004 6.86849 8.39837 6.88516 8.46504C6.91016 8.5317 6.93516 8.5817 6.95182 8.6317C7.10182 8.9067 7.36016 9.26504 7.72682 9.69837C8.10182 10.1317 8.50182 10.5734 8.93516 11.015C9.38516 11.4567 9.81849 11.865 10.2602 12.24C10.6935 12.6067 11.0518 12.8567 11.3352 13.0067C11.3768 13.0234 11.4268 13.0484 11.4852 13.0734C11.5518 13.0984 11.6185 13.1067 11.6935 13.1067C11.8352 13.1067 11.9435 13.0567 12.0352 12.965L12.6685 12.34C12.8768 12.1317 13.0768 11.9734 13.2685 11.8734C13.4602 11.7567 13.6518 11.6984 13.8602 11.6984C14.0185 11.6984 14.1852 11.7317 14.3685 11.8067C14.5518 11.8817 14.7435 11.99 14.9518 12.1317L17.7102 14.09C17.9268 14.24 18.0768 14.415 18.1685 14.6234C18.2518 14.8317 18.3018 15.04 18.3018 15.2734Z\" stroke=\"#192335\" stroke-width=\"1.25\" stroke-miterlimit=\"10\"></path>\n                                    </svg>\n                                    +143-52-9933631\n                                </a>\n                            </li>\n                            <li>\n                                <a href=\"#\"><svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                        <path d=\"M9.99453 11.1912C11.4305 11.1912 12.5945 10.0272 12.5945 8.59121C12.5945 7.15527 11.4305 5.99121 9.99453 5.99121C8.55859 5.99121 7.39453 7.15527 7.39453 8.59121C7.39453 10.0272 8.55859 11.1912 9.99453 11.1912Z\" stroke=\"#192335\" stroke-width=\"1.25\"></path>\n                                        <path d=\"M3.0187 7.0763C4.66037 -0.140363 15.352 -0.132029 16.9854 7.08464C17.9437 11.318 15.3104 14.9013 13.002 17.118C11.327 18.7346 8.67704 18.7346 6.9937 17.118C4.6937 14.9013 2.06037 11.3096 3.0187 7.0763Z\" stroke=\"#192335\" stroke-width=\"1.25\"></path>\n                                    </svg>\n                                    Sydney, Australia\n                                </a>\n                            </li>\n                        </ul>\n                    </div>\n                </div>\n                <div class=\"col-lg-6 col-md-6\">\n                    <div class=\"sub-header-left right-sub\">\n\n                        <ul class=\"d-flex\">\n                            <li>\n                                <a href=\"https://twitter.com\">\n                                    <i class=\"fa-brands fa-twitter\"></i>\n                                </a>\n                            </li>\n                            <li>\n                                <a href=\"https://linkedin.com\">\n                                    <i class=\"fa-brands fa-linkedin\"></i>\n                                </a>\n                            </li>\n                            <li>\n                                <a href=\"https://facebook.com\">\n                                    <i class=\"fa-brands fa-square-facebook\"></i>\n                                </a>\n                            </li>\n                        </ul>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</span>\n    </div><div class=\"section parent ui-sortable-handle\" id=\"354\">\n        <header class=\"header-area\">\n    <div class=\"container\">\n        <div class=\"row align-items-center\">\n            <div class=\"col-lg-3 col-md-4 col-sm-4 col-6\">\n                <!-- logo Area -->\n                <div class=\"logo-image\">\n                    <a href=\"#\">\n                        <span class=\"builder_image parent\" content_type=\"image\" id=\"273\">\n                            <img src=\"/academy/academy-laravel-11/public/uploads/home-page-builder/1716289348-0vBU4AdXWEpDGuYMZ7wasLRtqmIy2x.png\" alt=\"...\">\n                        </span>\n                    </a>\n                </div>\n            </div>\n            <div class=\"col-lg-9 col-md-8 col-sm-8 col-6\">\n                <span class=\"header-menu\">\n                    <div class=\"header-menu d-flex justify-content-end\">\n                    <div class=\"nav-menu\">\n                            <ul class=\"primary-menu main-menu-ul d-flex align-items-center\">\n                                <li><a href=\"#\" class=\"active\">Home</a></li>\n                                <li><a href=\"#\">About</a></li>\n                                <li class=\"have-mega-menu\"><a class=\"menu-parent-a\" href=\"#\">Courses</a>\n                                <ul class=\"mega-dropdown-menu mega main-mega-menu\">\n                                    <div class=\"row\">\n                                        <div class=\"col-lg-4\">\n                                            <div class=\"mega-menu-items\">\n                                                <h4>All Courses</h4>\n                                                <ul class=\"mega_list\">\n                                                    <li><a href=\"\">Web Development</a></li>\n                                                    <li><a href=\"\">Graphics Design</a></li>\n                                                    <li><a href=\"\">Video Editing</a></li>\n                                                    <li><a href=\"\">Graphics Design</a></li>\n                                                    <li><a href=\"\">Content Writing</a></li>\n                                                    <li><a href=\"\">Data Science</a></li>\n                                                    <li><a href=\"\">Digital Marketing</a></li>\n                                                </ul>\n                                            </div>\n                                        </div>\n                                        <div class=\"col-lg-4\">\n                                            <div class=\"mega-menu-items\">\n                                                <h4>All Courses</h4>\n                                                <ul class=\"mega_list\">\n                                                    <li><a href=\"\">Web Development</a></li>\n                                                    <li><a href=\"\">Graphics Design</a></li>\n                                                    <li><a href=\"\">Video Editing</a></li>\n                                                    <li><a href=\"\">Graphics Design</a></li>\n                                                    <li><a href=\"\">Content Writing</a></li>\n                                                    <li><a href=\"\">Data Science</a></li>\n                                                    <li><a href=\"\">Digital Marketing</a></li>\n                                                </ul>\n                                            </div>\n                                        </div>\n                                        <div class=\"col-lg-4\">\n                                            <div class=\"mega-menu-items\">\n                                                <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/mega.png\" alt=\"...\">\n                                            </div>\n                                        </div>\n                                    </div>\n                                </ul>\n                                </li>\n                                <li><a href=\"#\">Contact</a></li>\n                                <li class=\"Esearch\">\n                                    <form action=\"\" method=\"post\" class=\"Esearch_entry\">\n                                        <input type=\"text\" class=\"form-control\" placeholder=\"Search...\">\n                                        <button type=\"submit\"><i class=\"fa-solid fa-magnifying-glass\"></i></button>\n                                    </form>\n                                </li>\n                            </ul>\n                    </div>\n                        <div class=\"primary-end d-flex align-items-center\"> \n                            <select name=\"\" id=\"\" class=\"form-select nice-control\" style=\"display: none;\">\n                                <option value=\"en\">en</option>\n                                <option value=\"Bn\">Bn</option>\n                            </select><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\">en</span><ul class=\"list\"><li data-value=\"en\" class=\"option selected\">en</li><li data-value=\"Bn\" class=\"option\">Bn</li></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\"></span><ul class=\"list\"></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\"></span><ul class=\"list\"></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\"></span><ul class=\"list\"></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\"></span><ul class=\"list\"></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\"></span><ul class=\"list\"></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\"></span><ul class=\"list\"></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\"></span><ul class=\"list\"></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\"></span><ul class=\"list\"></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\"></span><ul class=\"list\"></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\"></span><ul class=\"list\"></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\"></span><ul class=\"list\"></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\"></span><ul class=\"list\"></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\"></span><ul class=\"list\"></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\" style=\"display: none;\"><span class=\"current\"></span><ul class=\"list\"></ul></div><div class=\"nice-select form-select nice-control\" tabindex=\"0\"><span class=\"current\"></span><ul class=\"list\"></ul></div>\n                            <a href=\"#\" class=\"eBtn btn gradient\">login</a>\n                            <span class=\"toggle-bar gradient\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasWithBothOptions\" aria-controls=\"offcanvasWithBothOptions\"><i class=\"fa-sharp fa-solid fa-bars\"></i></span>\n                        </div>\n                    </div>\n                </span>\n            </div>\n        </div>\n\n         <!-- Off Canves Menu -->\n         <div class=\"offcanvas offcanvas-start\" data-bs-scroll=\"true\" tabindex=\"-1\" id=\"offcanvasWithBothOptions\" aria-labelledby=\"offcanvasWithBothOptionsLabel\">\n            <div class=\"offcanvas-header\">\n              <h5 class=\"offcanvas-title\" id=\"offcanvasWithBothOptionsLabel\"></h5>\n              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>\n            </div>\n            <div class=\"offcanvas-body\">\n              <div class=\"off-menu\">\n                <div class=\"logo-image\">\n                    <a href=\"#\">\n                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/logo.png\" alt=\"...\">\n                    </a>\n                </div>\n                <div class=\"btn-off\">\n                    <a href=\"#\" class=\"eBtn btn gradient mb-3\">login</a>\n                    <a href=\"#\" class=\"eBtn btn gradient sign\">Sign Up</a>\n                </div>\n                  <ul class=\"primary-menu main-menu-ul\">\n                      <li><a href=\"#\" class=\"active\">Home</a></li>\n                      <li><a href=\"#\">About</a></li>\n                      <li><a href=\"#\" class=\"has-menu\">Courses <i class=\"fa-solid fa-angle-down\"></i></a>\n                       <ul class=\"droup-menu\">\n                           <div class=\"row\">\n                              <div class=\"col-sm-12\">\n                                  <div class=\"mega-menu-items\">\n                                      <h4>All Courses</h4>\n                                      <ul class=\"mega_list\">\n                                          <li><a href=\"\">Web Development</a></li>\n                                          <li><a href=\"\">Graphics Design</a></li>\n                                          <li><a href=\"\">Video Editing</a></li>\n                                          <li><a href=\"\">Graphics Design</a></li>\n                                          <li><a href=\"\">Content Writing</a></li>\n                                          <li><a href=\"\">Data Science</a></li>\n                                          <li><a href=\"\">Digital Marketing</a></li>\n                                      </ul>\n                                  </div>\n                              </div>\n                              <div class=\"col-sm-12\">\n                                  <div class=\"mega-menu-items\">\n                                      <h4>All Courses</h4>\n                                      <ul class=\"mega_list\">\n                                          <li><a href=\"\">Web Development</a></li>\n                                          <li><a href=\"\">Graphics Design</a></li>\n                                          <li><a href=\"\">Video Editing</a></li>\n                                          <li><a href=\"\">Graphics Design</a></li>\n                                          <li><a href=\"\">Content Writing</a></li>\n                                          <li><a href=\"\">Data Science</a></li>\n                                          <li><a href=\"\">Digital Marketing</a></li>\n                                      </ul>\n                                  </div>\n                              </div>\n                              <div class=\"col-sm-12\">\n                                  <div class=\"mega-menu-items\">\n                                      <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/mega.png\" alt=\"...\">\n                                  </div>\n                              </div>\n                           </div>\n                       </ul>\n                      </li>\n                      <li><a href=\"#\">Contact</a></li>\n                  </ul>\n              </div>\n            </div>\n          </div>\n\n    </div>\n</header>\n    </div><div class=\"section parent ui-sortable-handle\" id=\"239\">\n        <section class=\"banner-wraper\">\n    <div class=\"container\">\n        <div class=\"row\">\n            <div class=\"col-lg-5 col-md-5\">\n                <div class=\"banner-content\">\n                    <h5 class=\"d-flex builder_text parent\" content_type=\"text\" id=\"832\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/roket.svg\" alt=\"...\"> The Leader in online learning</h5>\n                    <h1 class=\"builder_text parent\" content_type=\"text\" id=\"739\" style=\"color: rgb(25, 35, 53);\">Start learning from the world\'s pro \n                        <span class=\"gradient color shadow-none builder_text parent\" content_type=\"text\" id=\"604\">instructors</span></h1>\n                    <p class=\"builder_text parent\" content_type=\"text\" id=\"162\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>\n                    <span class=\"hero-button\">\n                        <div class=\"banner-btn\">\n                            <a href=\"#\" class=\"eBtn gradient\">Get Started</a>\n                            <a href=\"#\" class=\"eBtn learn-btn\"><i class=\"fa-solid fa-play\"></i>Learn More</a>\n                        </div>\n                    </span>\n                    \n                </div>\n            </div>\n            <div class=\"col-lg-7 col-md-7\">\n                <span class=\"hero-banner\">\n                    <div class=\"banner-image\">\n                        <img class=\"large-img\" src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/banner.png\" alt=\"...\">\n                        <div class=\"over-text\">\n                            <span>\n                                <svg width=\"30\" height=\"30\" viewBox=\"0 0 30 30\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                <g clip-path=\"url(#clip0_47_63)\">\n                                <mask id=\"mask0_47_63\" style=\"mask-type:luminance\" maskUnits=\"userSpaceOnUse\" x=\"0\" y=\"0\" width=\"30\" height=\"30\">\n                                <path d=\"M0 1.90735e-06H30V30H0V1.90735e-06Z\" fill=\"white\"></path>\n                                </mask>\n                                <g mask=\"url(#mask0_47_63)\">\n                                <path d=\"M7.36816 27.2279V29.5615\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                <path d=\"M22.6289 27.2279V29.5615\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                </g>\n                                <path d=\"M5.94995 4.26311V7.34473\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                <mask id=\"mask1_47_63\" style=\"mask-type:luminance\" maskUnits=\"userSpaceOnUse\" x=\"0\" y=\"0\" width=\"30\" height=\"30\">\n                                <path d=\"M0 1.90735e-06H30V30H0V1.90735e-06Z\" fill=\"white\"></path>\n                                </mask>\n                                <g mask=\"url(#mask1_47_63)\">\n                                <path d=\"M3.56714 27.2547V28.1348C3.56714 28.9227 4.20587 29.5615 4.9939 29.5615H25.0054C25.7933 29.5615 26.4321 28.9227 26.4321 28.1348V23.8904C26.4321 22.1012 25.2529 20.5261 23.5362 20.0221L21.7134 19.487L14.9996 23.4764L8.28622 19.4872L6.46331 20.0222C4.74646 20.5261 3.56714 22.1013 3.56714 23.8906V25.2003\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                <path d=\"M21.7133 19.4871L17.6291 16.8194C17.6291 18.5262 17.1336 20.1963 16.2029 21.6269L14.9995 23.4766\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                <path d=\"M8.28589 19.4871L12.3702 16.8194C12.3702 18.5262 12.8656 20.1963 13.7963 21.6269L14.9997 23.4766\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                <path d=\"M11.2968 7.40565V8.73256C11.2968 9.26494 10.8652 9.6966 10.3328 9.6966H9.37549V11.273C9.37549 11.6758 9.70203 12.0024 10.1049 12.0024C10.232 12.0024 10.3354 12.1019 10.3434 12.2288C10.4972 14.6673 12.5224 16.5977 14.9996 16.5977C17.4769 16.5977 19.5021 14.6673 19.6559 12.2288C19.664 12.1019 19.7673 12.0024 19.8944 12.0024C20.2972 12.0024 20.6238 11.6758 20.6238 11.273V9.6966H19.6665C19.1341 9.6966 18.7025 9.26494 18.7025 8.73256V7.40565\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                <path d=\"M12.3682 15.7837V16.8203L12.3701 16.8191\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                <path d=\"M17.6292 16.8193V15.7851\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                <path d=\"M17.7716 4.37924L16.0506 4.16631C15.352 4.07994 14.6455 4.07994 13.947 4.16637L10.0603 4.6473L9.01416 4.77674V6.975C9.01416 7.18898 9.1702 7.36611 9.37457 7.39998C9.39771 7.40379 9.42121 7.40625 9.44541 7.40625H20.5539C20.5775 7.40625 20.6004 7.40385 20.6229 7.40027C20.8282 7.36711 20.9853 7.18963 20.9853 6.975V4.77674L19.9371 4.64707L19.8139 4.63189\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                <path d=\"M20.6228 9.69629V7.39936\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                <path d=\"M9.37451 7.39906L9.37545 9.69629\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                <path d=\"M20.984 4.77625L23.9943 4.26355C24.5087 4.17596 24.5588 3.45666 24.0616 3.29857L15.1495 0.463867C15.0513 0.432637 14.9459 0.432637 14.8477 0.463867L5.93555 3.29857C5.43838 3.45666 5.48854 4.17596 6.00288 4.26355L9.01401 4.77637\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                <path d=\"M5.01803 9.03922L4.4243 12.5241C4.36823 12.8531 4.62165 13.1533 4.9554 13.1533H6.9446C7.27823 13.1533 7.53165 12.8531 7.47563 12.5241L6.88196 9.03922\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                <path d=\"M6.88199 7.81557C6.88199 7.55559 6.67123 7.34482 6.41125 7.34482H5.48881C5.22883 7.34482 5.01807 7.55559 5.01807 7.81557V9.03906H6.88199V7.81557Z\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                <path d=\"M17.2406 19.4043C16.5501 19.5564 15.7935 19.6406 14.9996 19.6406C14.2056 19.6406 13.449 19.5564 12.7585 19.4043\" stroke=\"white\" stroke-width=\"0.878906\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n                                </g>\n                                </g>\n                                <defs>\n                                <clipPath id=\"clip0_47_63\">\n                                <rect width=\"30\" height=\"30\" fill=\"white\"></rect>\n                                </clipPath>\n                                </defs>\n                                </svg>\n                            </span>\n                            <div class=\"b-text\">\n                                <h5>250k +</h5>\n                                <p>Students has Enrolled</p>\n                            </div>\n                        </div>\n                    </div>\n                </span>\n            </div>\n        </div>\n    </div>\n</section>\n    </div><div class=\"section parent ui-sortable-handle\" id=\"710\">\n        <section class=\"performance-wrapper section-padding\">\n    <div class=\"container\">\n        <div class=\"pr-wrap\">\n            <div class=\"row\">\n                <div class=\"col-lg-3 col-md-6 col-sm-6  ps-border\">\n                    <div class=\"ps-single-wrap\">\n                        <span class=\"builder_image parent\" content_type=\"image\" id=\"739\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/p1.png\" alt=\"...\">\n                        </span>\n                        <h4>\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"821\" style=\"color: rgb(255, 255, 255);\">Learn, Grow, Achieve</span>\n                        </h4>\n\n                        <p class=\"description\">\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"971\" style=\"color: rgb(255, 255, 255);\">Emphasizes continuous improvement and success through education</span>\n                        </p>\n                    </div>\n                </div>\n                <div class=\"col-lg-3 col-md-6 col-sm-6 ps-border\">\n                    <div class=\"ps-single-wrap\">\n                        <span class=\"builder_image parent\" content_type=\"image\" id=\"897\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/p2.png\" alt=\"...\">\n                        </span>\n                        <h4>\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"389\" style=\"color: rgb(255, 255, 255);\">Unlock Your Potential</span>\n                        </h4>\n                        <p class=\"description\">\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"974\" style=\"color: rgb(255, 255, 255);\">Encourages learners to realize their capabilities and excel</span>\n                        </p>\n                    </div>\n                </div>\n                <div class=\"col-lg-3 col-md-6 col-sm-6 ps-border\">\n                    <div class=\"ps-single-wrap\">\n                        <span class=\"builder_image parent\" content_type=\"image\" id=\"710\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/p3.png\" alt=\"...\">\n                        </span>\n                        <h4>\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"308\" style=\"color: rgb(255, 255, 255);\">Knowledge is power</span>\n                        </h4>\n                        <p class=\"description\">\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"918\" style=\"color: rgb(255, 255, 255);\">Draws attention to the way that education can change a persons life</span>\n                        </p>\n                    </div>\n                </div>\n                <div class=\"col-lg-3 col-md-6 col-sm-6 ps-border\">\n                    <div class=\"ps-single-wrap\">\n                        <span class=\"builder_image parent\" content_type=\"image\" id=\"319\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/p4.png\" alt=\"...\">\n                        </span>\n                        <h4>\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"509\" style=\"color: rgb(255, 255, 255);\">Expand Your Horizons</span>\n                        </h4>\n                        <p class=\"description\">\n                            <span class=\"builder_text parent\" content_type=\"text\" id=\"65\" style=\"color: rgb(255, 255, 255);\">Inspires exploration and broadening of perspectives through learning</span>\n                        </p>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</section>\n    </div><div class=\"section parent ui-sortable-handle\" id=\"730\">\n        <section class=\"category-wrapper section-padding\">\n    <div class=\"container\">\n        <div class=\"row\">\n            <div class=\"col-lg-12\">\n                <div class=\"section-title text-center\">\n                    <span class=\"title-head builder_text parent\" content_type=\"text\" id=\"954\">Categories</span>\n                    <h2 class=\"title builder_text parent\" content_type=\"text\" id=\"731\">Explore Top Courses Caterories</h2>\n                </div>\n            </div>\n        </div>\n        <span class=\"category\">\n            <div class=\"row\">\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 36.svg\" alt=\"\">\n                        </span>\n                        <h4>Web Design</h4>\n                        <p>04 Courses</p>\n                    </a>\n                </div>\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>\n                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 37.svg\" alt=\"\">\n                        </span>\n                        <h4>Graphic Design</h4>\n                        <p>12 Courses</p>\n                    </a>\n                </div>\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>\n                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 38.svg\" alt=\"\">\n                        </span>\n                        <h4>Web Development</h4>\n                        <p>10 Courses</p>\n                    </a>\n                </div>\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>\n                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 39.svg\" alt=\"\">   \n                        </span>\n                        <h4>Digital Marketing</h4>\n                        <p>11 Courses</p>\n                    </a>\n                </div>\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>\n                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 40.svg\" alt=\"\">   \n                        </span>\n                        <h4>Art &amp; Humanities</h4>\n                        <p>9 Courses</p>\n                    </a>\n                </div>\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>  \n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 41.svg\" alt=\"\">  \n                        </span>\n                        <h4>Color Theory</h4>\n                        <p>10 Courses</p>\n                    </a>\n                </div>\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 42.svg\" alt=\"...\">   \n                        </span>\n                        <h4>Motion Graphic</h4>\n                        <p>8 Courses</p>\n                    </a>\n                </div>\n                <div class=\"col-lg-3 col-md-4 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-category\">\n                        <span>\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/image 43.svg\" alt=\"...\">    \n                        </span>\n                        <h4>Blander 3D</h4>\n                        <p>12 Courses</p>\n                    </a>\n                </div>\n            </div>\n        </span>\n    </div>\n</section>\n    </div><div class=\"section parent ui-sortable-handle\" id=\"445\">\n        <section class=\"feature-wrapper section-padding\">\n    <div class=\"container\">\n        <div class=\"row\">\n            <div class=\"col-lg-12\">\n                <div class=\"res-control d-flex align-items-center justify-content-between\">\n                    <div class=\"section-title mb-0\">\n                        <span class=\"title-head builder_text parent\" content_type=\"text\" id=\"625\">Courses</span>\n                        <h2 class=\"title builder_text parent\" content_type=\"text\" id=\"84\">Featured Courses\n                        </h2>\n                    </div>\n                    <span class=\"featured-course-all-button\">\n                        <a href=\"#\" class=\"eBtn gradient\">View All Courses</a>\n                    </span>\n                </div>\n            </div>\n        </div>\n        <span class=\"featured-course\">\n            <div class=\"row mt-50\">\n                <div class=\"col-lg-6 col-md-12 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-feature\">\n                        <div class=\"row\">\n                            <div class=\"col-lg-4 col-md-4\">\n                                <div class=\"courses-img\">\n                                    <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/course-1.png\" alt=\"...\">\n                                    <div class=\"cText d-flex\">\n                                        <h4>$60.00</h4>\n                                        <del>$30.00</del>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"col-lg-8 col-md-8\">\n                                <div class=\"entry-details\">\n                                    <div class=\"entry-title\">\n                                        <h3>Complete Blender Creator : Learn 3D Modelling</h3>\n                                        <span class=\"heart\"><i class=\"fa-regular fa-heart\"></i></span>\n                                    </div>\n                                    <ul>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path d=\"M12.6521 9.54004L14.8477 8.27081C14.9758 8.19549 15.0399 8.08879 15.0399 7.95071C15.0399 7.81263 14.9758 7.70458 14.8477 7.62658L12.6521 6.35735C12.5395 6.29326 12.4144 6.26121 12.2768 6.26121C12.1392 6.26121 12.0133 6.29326 11.8989 6.35735L9.70344 7.62658C9.57523 7.7019 9.51113 7.8086 9.51113 7.94669C9.51113 8.08479 9.57523 8.19283 9.70344 8.27081L11.8989 9.54004C12.0115 9.60414 12.1366 9.63619 12.2743 9.63619C12.4119 9.63619 12.5378 9.60414 12.6521 9.54004ZM12.6521 11.9968L14.1265 11.1554C14.2395 11.0928 14.3305 11.0021 14.3995 10.8832C14.4686 10.7643 14.5031 10.636 14.5031 10.4984V9.32371L12.6521 10.399C12.5392 10.4685 12.4136 10.5032 12.2755 10.5032C12.1374 10.5032 12.0119 10.4685 11.8989 10.399L10.048 9.32371V10.4984C10.048 10.636 10.0825 10.7643 10.1515 10.8832C10.2206 11.0021 10.3116 11.0928 10.4246 11.1554L11.8989 11.9968C12.0115 12.0609 12.1366 12.0929 12.2743 12.0929C12.4119 12.0929 12.5378 12.0609 12.6521 11.9968ZM16.4101 16.25H12.2755C12.2755 16.0416 12.2684 15.8333 12.2543 15.625C12.2401 15.4166 12.2189 15.2083 12.1906 15H16.4101C16.4849 15 16.5464 14.9759 16.5944 14.9279C16.6425 14.8798 16.6666 14.8183 16.6666 14.7435V5.25642C16.6666 5.18163 16.6425 5.12019 16.5944 5.0721C16.5464 5.02402 16.4849 4.99998 16.4101 4.99998H3.58967C3.51488 4.99998 3.45344 5.02402 3.40536 5.0721C3.35727 5.12019 3.33323 5.18163 3.33323 5.25642V6.14263C3.1249 6.11431 2.91657 6.09307 2.70825 6.07892C2.49992 6.06476 2.29159 6.05769 2.08325 6.05769V5.25642C2.08325 4.84215 2.23076 4.48752 2.52577 4.19252C2.82077 3.89751 3.17541 3.75 3.58967 3.75H16.4101C16.8244 3.75 17.179 3.89751 17.474 4.19252C17.769 4.48752 17.9165 4.84215 17.9165 5.25642V14.7435C17.9165 15.1578 17.769 15.5124 17.474 15.8074C17.179 16.1025 16.8244 16.25 16.4101 16.25ZM6.58498 16.25C6.41715 16.25 6.27127 16.1973 6.14734 16.0921C6.02341 15.9869 5.94595 15.8498 5.91498 15.681C5.79425 14.8274 5.42592 14.1017 4.81 13.504C4.19409 12.9062 3.45664 12.5443 2.59767 12.4182C2.43692 12.3974 2.31099 12.3219 2.2199 12.1917C2.1288 12.0615 2.08325 11.913 2.08325 11.7464C2.08325 11.5693 2.14362 11.4209 2.26436 11.3013C2.38508 11.1816 2.52556 11.133 2.68581 11.1555C3.8685 11.2901 4.87623 11.7759 5.70902 12.613C6.54181 13.45 7.02712 14.4599 7.16494 15.6426C7.18737 15.8114 7.1409 15.9548 7.02552 16.0729C6.91013 16.1909 6.76329 16.25 6.58498 16.25ZM9.82361 16.25C9.64091 16.25 9.49107 16.1869 9.37409 16.0609C9.25711 15.9348 9.18741 15.7777 9.16496 15.5897C9.00257 13.86 8.31027 12.3918 7.08804 11.1851C5.86582 9.97834 4.3872 9.3034 2.65217 9.16023C2.48336 9.14313 2.34634 9.07206 2.24111 8.94702C2.13587 8.82197 2.08325 8.67607 2.08325 8.50933C2.08325 8.33217 2.14148 8.18162 2.25794 8.05769C2.37438 7.93377 2.5154 7.88035 2.681 7.89744C4.7622 8.0406 6.53275 8.84135 7.99267 10.2997C9.4526 11.758 10.2627 13.5235 10.4229 15.5961C10.44 15.7788 10.3887 15.9334 10.2689 16.06C10.1491 16.1867 10.0007 16.25 9.82361 16.25ZM2.93215 16.25C2.6942 16.25 2.49324 16.1678 2.32925 16.0035C2.16525 15.8392 2.08325 15.6381 2.08325 15.4001C2.08325 15.1622 2.1654 14.9612 2.32971 14.7972C2.494 14.6332 2.69512 14.5512 2.93306 14.5512C3.17101 14.5512 3.37197 14.6334 3.53596 14.7977C3.69996 14.962 3.78196 15.1631 3.78196 15.4011C3.78196 15.639 3.69981 15.84 3.5355 16.004C3.37121 16.168 3.17009 16.25 2.93215 16.25Z\" fill=\"#6B7385\"></path>\n                                            </svg>\n                                            12 lesson\n                                        </li>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path d=\"M2.25174 16.0896C2.03834 16.0896 1.85945 16.0174 1.71508 15.873C1.57072 15.7287 1.49854 15.5498 1.49854 15.3364V14.237C1.49854 13.8075 1.60938 13.4243 1.83108 13.0872C2.05276 12.7501 2.34881 12.4879 2.71924 12.3005C3.5112 11.9131 4.30755 11.6145 5.10828 11.4045C5.90904 11.1946 6.78911 11.0896 7.74852 11.0896C8.70792 11.0896 9.58799 11.1946 10.3887 11.4045C11.1895 11.6145 11.9858 11.9131 12.7778 12.3005C13.1482 12.4879 13.4443 12.7501 13.666 13.0872C13.8876 13.4243 13.9985 13.8075 13.9985 14.237V15.3364C13.9985 15.5498 13.9263 15.7287 13.7819 15.873C13.6376 16.0174 13.4587 16.0896 13.2453 16.0896H2.25174ZM15.3414 16.0896C15.4437 16.0024 15.5232 15.8934 15.58 15.7626C15.6367 15.6318 15.6651 15.4855 15.6651 15.3236V14.1345C15.6651 13.5875 15.5312 13.0662 15.2633 12.5705C14.9955 12.0749 14.6155 11.6497 14.1235 11.2948C14.6823 11.3781 15.2127 11.5071 15.7148 11.6818C16.217 11.8565 16.6961 12.0629 17.1523 12.3012C17.5829 12.5309 17.9154 12.8016 18.1499 13.1133C18.3844 13.4251 18.5017 13.7655 18.5017 14.1345V15.3364C18.5017 15.5498 18.4295 15.7287 18.2851 15.873C18.1407 16.0174 17.9619 16.0896 17.7485 16.0896H15.3414ZM7.74852 9.74343C6.94645 9.74343 6.25982 9.45784 5.68864 8.88668C5.11746 8.3155 4.83187 7.62887 4.83187 6.8268C4.83187 6.02472 5.11746 5.33809 5.68864 4.76693C6.25982 4.19575 6.94645 3.91016 7.74852 3.91016C8.55058 3.91016 9.23721 4.19575 9.80839 4.76693C10.3796 5.33809 10.6651 6.02472 10.6651 6.8268C10.6651 7.62887 10.3796 8.3155 9.80839 8.88668C9.23721 9.45784 8.55058 9.74343 7.74852 9.74343ZM14.944 6.8268C14.944 7.62887 14.6584 8.3155 14.0872 8.88668C13.516 9.45784 12.8294 9.74343 12.0273 9.74343C11.9333 9.74343 11.8136 9.73275 11.6683 9.71139C11.5231 9.69003 11.4034 9.66653 11.3094 9.64089C11.638 9.24579 11.8906 8.80748 12.0671 8.32595C12.2436 7.84442 12.3318 7.34437 12.3318 6.8258C12.3318 6.30725 12.2418 5.80918 12.0618 5.33162C11.8818 4.85406 11.631 4.41443 11.3094 4.01272C11.429 3.96998 11.5487 3.94221 11.6683 3.92939C11.788 3.91657 11.9077 3.91016 12.0273 3.91016C12.8294 3.91016 13.516 4.19575 14.0872 4.76693C14.6584 5.33809 14.944 6.02472 14.944 6.8268ZM2.74851 14.8396H12.7485V14.237C12.7485 14.0629 12.705 13.908 12.6179 13.7723C12.5308 13.6366 12.3927 13.518 12.2036 13.4165C11.5177 13.0629 10.8115 12.795 10.0851 12.6128C9.35856 12.4307 8.57971 12.3396 7.74852 12.3396C6.91732 12.3396 6.13847 12.4307 5.41197 12.6128C4.68549 12.795 3.97929 13.0629 3.29339 13.4165C3.10429 13.518 2.9662 13.6366 2.87912 13.7723C2.79205 13.908 2.74851 14.0629 2.74851 14.237V14.8396ZM7.74852 8.49347C8.20685 8.49347 8.59921 8.33028 8.9256 8.00389C9.25199 7.6775 9.41518 7.28514 9.41518 6.8268C9.41518 6.36847 9.25199 5.97611 8.9256 5.64972C8.59921 5.32333 8.20685 5.16014 7.74852 5.16014C7.29018 5.16014 6.89782 5.32333 6.57143 5.64972C6.24504 5.97611 6.08185 6.36847 6.08185 6.8268C6.08185 7.28514 6.24504 7.6775 6.57143 8.00389C6.89782 8.33028 7.29018 8.49347 7.74852 8.49347Z\" fill=\"#6B7385\"></path>\n                                            </svg>\n                                            50 Students\n                                        </li>\n                                    </ul>\n                                    <p class=\"description\">It is a long established fact that a reader will be\n                                        distracted by the readable...</p>\n                                    <div class=\"creator\">\n                                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/profile.png\" alt=\"...\">\n                                        <p>by <span>Angelina Ross</span> in <span>Design</span></p>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class=\"col-lg-6 col-md-12 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-feature\">\n                        <div class=\"row\">\n                            <div class=\"col-lg-4 col-md-4\">\n                                <div class=\"courses-img\">\n                                    <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/course-2.png\" alt=\"...\">\n                                    <div class=\"cText d-flex\">\n                                        <h4>$60.00</h4>\n                                        <del>$30.00</del>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"col-lg-8 col-md-8\">\n                                <div class=\"entry-details\">\n                                    <div class=\"entry-title\">\n                                        <h3>The Complete Digital Marketing Guide</h3>\n                                        <span class=\"heart\"><i class=\"fa-regular fa-heart\"></i></span>\n                                    </div>\n                                    <ul>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path d=\"M12.6521 9.54004L14.8477 8.27081C14.9758 8.19549 15.0399 8.08879 15.0399 7.95071C15.0399 7.81263 14.9758 7.70458 14.8477 7.62658L12.6521 6.35735C12.5395 6.29326 12.4144 6.26121 12.2768 6.26121C12.1392 6.26121 12.0133 6.29326 11.8989 6.35735L9.70344 7.62658C9.57523 7.7019 9.51113 7.8086 9.51113 7.94669C9.51113 8.08479 9.57523 8.19283 9.70344 8.27081L11.8989 9.54004C12.0115 9.60414 12.1366 9.63619 12.2743 9.63619C12.4119 9.63619 12.5378 9.60414 12.6521 9.54004ZM12.6521 11.9968L14.1265 11.1554C14.2395 11.0928 14.3305 11.0021 14.3995 10.8832C14.4686 10.7643 14.5031 10.636 14.5031 10.4984V9.32371L12.6521 10.399C12.5392 10.4685 12.4136 10.5032 12.2755 10.5032C12.1374 10.5032 12.0119 10.4685 11.8989 10.399L10.048 9.32371V10.4984C10.048 10.636 10.0825 10.7643 10.1515 10.8832C10.2206 11.0021 10.3116 11.0928 10.4246 11.1554L11.8989 11.9968C12.0115 12.0609 12.1366 12.0929 12.2743 12.0929C12.4119 12.0929 12.5378 12.0609 12.6521 11.9968ZM16.4101 16.25H12.2755C12.2755 16.0416 12.2684 15.8333 12.2543 15.625C12.2401 15.4166 12.2189 15.2083 12.1906 15H16.4101C16.4849 15 16.5464 14.9759 16.5944 14.9279C16.6425 14.8798 16.6666 14.8183 16.6666 14.7435V5.25642C16.6666 5.18163 16.6425 5.12019 16.5944 5.0721C16.5464 5.02402 16.4849 4.99998 16.4101 4.99998H3.58967C3.51488 4.99998 3.45344 5.02402 3.40536 5.0721C3.35727 5.12019 3.33323 5.18163 3.33323 5.25642V6.14263C3.1249 6.11431 2.91657 6.09307 2.70825 6.07892C2.49992 6.06476 2.29159 6.05769 2.08325 6.05769V5.25642C2.08325 4.84215 2.23076 4.48752 2.52577 4.19252C2.82077 3.89751 3.17541 3.75 3.58967 3.75H16.4101C16.8244 3.75 17.179 3.89751 17.474 4.19252C17.769 4.48752 17.9165 4.84215 17.9165 5.25642V14.7435C17.9165 15.1578 17.769 15.5124 17.474 15.8074C17.179 16.1025 16.8244 16.25 16.4101 16.25ZM6.58498 16.25C6.41715 16.25 6.27127 16.1973 6.14734 16.0921C6.02341 15.9869 5.94595 15.8498 5.91498 15.681C5.79425 14.8274 5.42592 14.1017 4.81 13.504C4.19409 12.9062 3.45664 12.5443 2.59767 12.4182C2.43692 12.3974 2.31099 12.3219 2.2199 12.1917C2.1288 12.0615 2.08325 11.913 2.08325 11.7464C2.08325 11.5693 2.14362 11.4209 2.26436 11.3013C2.38508 11.1816 2.52556 11.133 2.68581 11.1555C3.8685 11.2901 4.87623 11.7759 5.70902 12.613C6.54181 13.45 7.02712 14.4599 7.16494 15.6426C7.18737 15.8114 7.1409 15.9548 7.02552 16.0729C6.91013 16.1909 6.76329 16.25 6.58498 16.25ZM9.82361 16.25C9.64091 16.25 9.49107 16.1869 9.37409 16.0609C9.25711 15.9348 9.18741 15.7777 9.16496 15.5897C9.00257 13.86 8.31027 12.3918 7.08804 11.1851C5.86582 9.97834 4.3872 9.3034 2.65217 9.16023C2.48336 9.14313 2.34634 9.07206 2.24111 8.94702C2.13587 8.82197 2.08325 8.67607 2.08325 8.50933C2.08325 8.33217 2.14148 8.18162 2.25794 8.05769C2.37438 7.93377 2.5154 7.88035 2.681 7.89744C4.7622 8.0406 6.53275 8.84135 7.99267 10.2997C9.4526 11.758 10.2627 13.5235 10.4229 15.5961C10.44 15.7788 10.3887 15.9334 10.2689 16.06C10.1491 16.1867 10.0007 16.25 9.82361 16.25ZM2.93215 16.25C2.6942 16.25 2.49324 16.1678 2.32925 16.0035C2.16525 15.8392 2.08325 15.6381 2.08325 15.4001C2.08325 15.1622 2.1654 14.9612 2.32971 14.7972C2.494 14.6332 2.69512 14.5512 2.93306 14.5512C3.17101 14.5512 3.37197 14.6334 3.53596 14.7977C3.69996 14.962 3.78196 15.1631 3.78196 15.4011C3.78196 15.639 3.69981 15.84 3.5355 16.004C3.37121 16.168 3.17009 16.25 2.93215 16.25Z\" fill=\"#6B7385\"></path>\n                                            </svg>\n                                            12 lesson\n                                        </li>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path d=\"M2.25174 16.0896C2.03834 16.0896 1.85945 16.0174 1.71508 15.873C1.57072 15.7287 1.49854 15.5498 1.49854 15.3364V14.237C1.49854 13.8075 1.60938 13.4243 1.83108 13.0872C2.05276 12.7501 2.34881 12.4879 2.71924 12.3005C3.5112 11.9131 4.30755 11.6145 5.10828 11.4045C5.90904 11.1946 6.78911 11.0896 7.74852 11.0896C8.70792 11.0896 9.58799 11.1946 10.3887 11.4045C11.1895 11.6145 11.9858 11.9131 12.7778 12.3005C13.1482 12.4879 13.4443 12.7501 13.666 13.0872C13.8876 13.4243 13.9985 13.8075 13.9985 14.237V15.3364C13.9985 15.5498 13.9263 15.7287 13.7819 15.873C13.6376 16.0174 13.4587 16.0896 13.2453 16.0896H2.25174ZM15.3414 16.0896C15.4437 16.0024 15.5232 15.8934 15.58 15.7626C15.6367 15.6318 15.6651 15.4855 15.6651 15.3236V14.1345C15.6651 13.5875 15.5312 13.0662 15.2633 12.5705C14.9955 12.0749 14.6155 11.6497 14.1235 11.2948C14.6823 11.3781 15.2127 11.5071 15.7148 11.6818C16.217 11.8565 16.6961 12.0629 17.1523 12.3012C17.5829 12.5309 17.9154 12.8016 18.1499 13.1133C18.3844 13.4251 18.5017 13.7655 18.5017 14.1345V15.3364C18.5017 15.5498 18.4295 15.7287 18.2851 15.873C18.1407 16.0174 17.9619 16.0896 17.7485 16.0896H15.3414ZM7.74852 9.74343C6.94645 9.74343 6.25982 9.45784 5.68864 8.88668C5.11746 8.3155 4.83187 7.62887 4.83187 6.8268C4.83187 6.02472 5.11746 5.33809 5.68864 4.76693C6.25982 4.19575 6.94645 3.91016 7.74852 3.91016C8.55058 3.91016 9.23721 4.19575 9.80839 4.76693C10.3796 5.33809 10.6651 6.02472 10.6651 6.8268C10.6651 7.62887 10.3796 8.3155 9.80839 8.88668C9.23721 9.45784 8.55058 9.74343 7.74852 9.74343ZM14.944 6.8268C14.944 7.62887 14.6584 8.3155 14.0872 8.88668C13.516 9.45784 12.8294 9.74343 12.0273 9.74343C11.9333 9.74343 11.8136 9.73275 11.6683 9.71139C11.5231 9.69003 11.4034 9.66653 11.3094 9.64089C11.638 9.24579 11.8906 8.80748 12.0671 8.32595C12.2436 7.84442 12.3318 7.34437 12.3318 6.8258C12.3318 6.30725 12.2418 5.80918 12.0618 5.33162C11.8818 4.85406 11.631 4.41443 11.3094 4.01272C11.429 3.96998 11.5487 3.94221 11.6683 3.92939C11.788 3.91657 11.9077 3.91016 12.0273 3.91016C12.8294 3.91016 13.516 4.19575 14.0872 4.76693C14.6584 5.33809 14.944 6.02472 14.944 6.8268ZM2.74851 14.8396H12.7485V14.237C12.7485 14.0629 12.705 13.908 12.6179 13.7723C12.5308 13.6366 12.3927 13.518 12.2036 13.4165C11.5177 13.0629 10.8115 12.795 10.0851 12.6128C9.35856 12.4307 8.57971 12.3396 7.74852 12.3396C6.91732 12.3396 6.13847 12.4307 5.41197 12.6128C4.68549 12.795 3.97929 13.0629 3.29339 13.4165C3.10429 13.518 2.9662 13.6366 2.87912 13.7723C2.79205 13.908 2.74851 14.0629 2.74851 14.237V14.8396ZM7.74852 8.49347C8.20685 8.49347 8.59921 8.33028 8.9256 8.00389C9.25199 7.6775 9.41518 7.28514 9.41518 6.8268C9.41518 6.36847 9.25199 5.97611 8.9256 5.64972C8.59921 5.32333 8.20685 5.16014 7.74852 5.16014C7.29018 5.16014 6.89782 5.32333 6.57143 5.64972C6.24504 5.97611 6.08185 6.36847 6.08185 6.8268C6.08185 7.28514 6.24504 7.6775 6.57143 8.00389C6.89782 8.33028 7.29018 8.49347 7.74852 8.49347Z\" fill=\"#6B7385\"></path>\n                                            </svg>\n                                            50 Students\n                                        </li>\n                                    </ul>\n                                    <p class=\"description\">It is a long established fact that a reader will be\n                                        distracted by the readable...</p>\n                                    <div class=\"creator\">\n                                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/profile.png\" alt=\"...\">\n                                        <p>by <span>Angelina Ross</span> in <span>Design</span></p>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class=\"col-lg-6 col-md-12 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-feature\">\n                        <div class=\"row\">\n                            <div class=\"col-lg-4 col-md-4\">\n                                <div class=\"courses-img\">\n                                    <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/course-3.png\" alt=\"...\">\n                                    <div class=\"cText d-flex\">\n                                        <h4>$60.00</h4>\n                                        <del>$30.00</del>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"col-lg-8 col-md-8\">\n                                <div class=\"entry-details\">\n                                    <div class=\"entry-title\">\n                                        <h3>After Effect 2023 Complete Course</h3>\n                                        <span class=\"heart\"><i class=\"fa-regular fa-heart\"></i></span>\n                                    </div>\n                                    <ul>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path d=\"M12.6521 9.54004L14.8477 8.27081C14.9758 8.19549 15.0399 8.08879 15.0399 7.95071C15.0399 7.81263 14.9758 7.70458 14.8477 7.62658L12.6521 6.35735C12.5395 6.29326 12.4144 6.26121 12.2768 6.26121C12.1392 6.26121 12.0133 6.29326 11.8989 6.35735L9.70344 7.62658C9.57523 7.7019 9.51113 7.8086 9.51113 7.94669C9.51113 8.08479 9.57523 8.19283 9.70344 8.27081L11.8989 9.54004C12.0115 9.60414 12.1366 9.63619 12.2743 9.63619C12.4119 9.63619 12.5378 9.60414 12.6521 9.54004ZM12.6521 11.9968L14.1265 11.1554C14.2395 11.0928 14.3305 11.0021 14.3995 10.8832C14.4686 10.7643 14.5031 10.636 14.5031 10.4984V9.32371L12.6521 10.399C12.5392 10.4685 12.4136 10.5032 12.2755 10.5032C12.1374 10.5032 12.0119 10.4685 11.8989 10.399L10.048 9.32371V10.4984C10.048 10.636 10.0825 10.7643 10.1515 10.8832C10.2206 11.0021 10.3116 11.0928 10.4246 11.1554L11.8989 11.9968C12.0115 12.0609 12.1366 12.0929 12.2743 12.0929C12.4119 12.0929 12.5378 12.0609 12.6521 11.9968ZM16.4101 16.25H12.2755C12.2755 16.0416 12.2684 15.8333 12.2543 15.625C12.2401 15.4166 12.2189 15.2083 12.1906 15H16.4101C16.4849 15 16.5464 14.9759 16.5944 14.9279C16.6425 14.8798 16.6666 14.8183 16.6666 14.7435V5.25642C16.6666 5.18163 16.6425 5.12019 16.5944 5.0721C16.5464 5.02402 16.4849 4.99998 16.4101 4.99998H3.58967C3.51488 4.99998 3.45344 5.02402 3.40536 5.0721C3.35727 5.12019 3.33323 5.18163 3.33323 5.25642V6.14263C3.1249 6.11431 2.91657 6.09307 2.70825 6.07892C2.49992 6.06476 2.29159 6.05769 2.08325 6.05769V5.25642C2.08325 4.84215 2.23076 4.48752 2.52577 4.19252C2.82077 3.89751 3.17541 3.75 3.58967 3.75H16.4101C16.8244 3.75 17.179 3.89751 17.474 4.19252C17.769 4.48752 17.9165 4.84215 17.9165 5.25642V14.7435C17.9165 15.1578 17.769 15.5124 17.474 15.8074C17.179 16.1025 16.8244 16.25 16.4101 16.25ZM6.58498 16.25C6.41715 16.25 6.27127 16.1973 6.14734 16.0921C6.02341 15.9869 5.94595 15.8498 5.91498 15.681C5.79425 14.8274 5.42592 14.1017 4.81 13.504C4.19409 12.9062 3.45664 12.5443 2.59767 12.4182C2.43692 12.3974 2.31099 12.3219 2.2199 12.1917C2.1288 12.0615 2.08325 11.913 2.08325 11.7464C2.08325 11.5693 2.14362 11.4209 2.26436 11.3013C2.38508 11.1816 2.52556 11.133 2.68581 11.1555C3.8685 11.2901 4.87623 11.7759 5.70902 12.613C6.54181 13.45 7.02712 14.4599 7.16494 15.6426C7.18737 15.8114 7.1409 15.9548 7.02552 16.0729C6.91013 16.1909 6.76329 16.25 6.58498 16.25ZM9.82361 16.25C9.64091 16.25 9.49107 16.1869 9.37409 16.0609C9.25711 15.9348 9.18741 15.7777 9.16496 15.5897C9.00257 13.86 8.31027 12.3918 7.08804 11.1851C5.86582 9.97834 4.3872 9.3034 2.65217 9.16023C2.48336 9.14313 2.34634 9.07206 2.24111 8.94702C2.13587 8.82197 2.08325 8.67607 2.08325 8.50933C2.08325 8.33217 2.14148 8.18162 2.25794 8.05769C2.37438 7.93377 2.5154 7.88035 2.681 7.89744C4.7622 8.0406 6.53275 8.84135 7.99267 10.2997C9.4526 11.758 10.2627 13.5235 10.4229 15.5961C10.44 15.7788 10.3887 15.9334 10.2689 16.06C10.1491 16.1867 10.0007 16.25 9.82361 16.25ZM2.93215 16.25C2.6942 16.25 2.49324 16.1678 2.32925 16.0035C2.16525 15.8392 2.08325 15.6381 2.08325 15.4001C2.08325 15.1622 2.1654 14.9612 2.32971 14.7972C2.494 14.6332 2.69512 14.5512 2.93306 14.5512C3.17101 14.5512 3.37197 14.6334 3.53596 14.7977C3.69996 14.962 3.78196 15.1631 3.78196 15.4011C3.78196 15.639 3.69981 15.84 3.5355 16.004C3.37121 16.168 3.17009 16.25 2.93215 16.25Z\" fill=\"#6B7385\"></path>\n                                            </svg>\n                                            12 lesson\n                                        </li>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path d=\"M2.25174 16.0896C2.03834 16.0896 1.85945 16.0174 1.71508 15.873C1.57072 15.7287 1.49854 15.5498 1.49854 15.3364V14.237C1.49854 13.8075 1.60938 13.4243 1.83108 13.0872C2.05276 12.7501 2.34881 12.4879 2.71924 12.3005C3.5112 11.9131 4.30755 11.6145 5.10828 11.4045C5.90904 11.1946 6.78911 11.0896 7.74852 11.0896C8.70792 11.0896 9.58799 11.1946 10.3887 11.4045C11.1895 11.6145 11.9858 11.9131 12.7778 12.3005C13.1482 12.4879 13.4443 12.7501 13.666 13.0872C13.8876 13.4243 13.9985 13.8075 13.9985 14.237V15.3364C13.9985 15.5498 13.9263 15.7287 13.7819 15.873C13.6376 16.0174 13.4587 16.0896 13.2453 16.0896H2.25174ZM15.3414 16.0896C15.4437 16.0024 15.5232 15.8934 15.58 15.7626C15.6367 15.6318 15.6651 15.4855 15.6651 15.3236V14.1345C15.6651 13.5875 15.5312 13.0662 15.2633 12.5705C14.9955 12.0749 14.6155 11.6497 14.1235 11.2948C14.6823 11.3781 15.2127 11.5071 15.7148 11.6818C16.217 11.8565 16.6961 12.0629 17.1523 12.3012C17.5829 12.5309 17.9154 12.8016 18.1499 13.1133C18.3844 13.4251 18.5017 13.7655 18.5017 14.1345V15.3364C18.5017 15.5498 18.4295 15.7287 18.2851 15.873C18.1407 16.0174 17.9619 16.0896 17.7485 16.0896H15.3414ZM7.74852 9.74343C6.94645 9.74343 6.25982 9.45784 5.68864 8.88668C5.11746 8.3155 4.83187 7.62887 4.83187 6.8268C4.83187 6.02472 5.11746 5.33809 5.68864 4.76693C6.25982 4.19575 6.94645 3.91016 7.74852 3.91016C8.55058 3.91016 9.23721 4.19575 9.80839 4.76693C10.3796 5.33809 10.6651 6.02472 10.6651 6.8268C10.6651 7.62887 10.3796 8.3155 9.80839 8.88668C9.23721 9.45784 8.55058 9.74343 7.74852 9.74343ZM14.944 6.8268C14.944 7.62887 14.6584 8.3155 14.0872 8.88668C13.516 9.45784 12.8294 9.74343 12.0273 9.74343C11.9333 9.74343 11.8136 9.73275 11.6683 9.71139C11.5231 9.69003 11.4034 9.66653 11.3094 9.64089C11.638 9.24579 11.8906 8.80748 12.0671 8.32595C12.2436 7.84442 12.3318 7.34437 12.3318 6.8258C12.3318 6.30725 12.2418 5.80918 12.0618 5.33162C11.8818 4.85406 11.631 4.41443 11.3094 4.01272C11.429 3.96998 11.5487 3.94221 11.6683 3.92939C11.788 3.91657 11.9077 3.91016 12.0273 3.91016C12.8294 3.91016 13.516 4.19575 14.0872 4.76693C14.6584 5.33809 14.944 6.02472 14.944 6.8268ZM2.74851 14.8396H12.7485V14.237C12.7485 14.0629 12.705 13.908 12.6179 13.7723C12.5308 13.6366 12.3927 13.518 12.2036 13.4165C11.5177 13.0629 10.8115 12.795 10.0851 12.6128C9.35856 12.4307 8.57971 12.3396 7.74852 12.3396C6.91732 12.3396 6.13847 12.4307 5.41197 12.6128C4.68549 12.795 3.97929 13.0629 3.29339 13.4165C3.10429 13.518 2.9662 13.6366 2.87912 13.7723C2.79205 13.908 2.74851 14.0629 2.74851 14.237V14.8396ZM7.74852 8.49347C8.20685 8.49347 8.59921 8.33028 8.9256 8.00389C9.25199 7.6775 9.41518 7.28514 9.41518 6.8268C9.41518 6.36847 9.25199 5.97611 8.9256 5.64972C8.59921 5.32333 8.20685 5.16014 7.74852 5.16014C7.29018 5.16014 6.89782 5.32333 6.57143 5.64972C6.24504 5.97611 6.08185 6.36847 6.08185 6.8268C6.08185 7.28514 6.24504 7.6775 6.57143 8.00389C6.89782 8.33028 7.29018 8.49347 7.74852 8.49347Z\" fill=\"#6B7385\"></path>\n                                            </svg>\n                                            50 Students\n                                        </li>\n                                    </ul>\n                                    <p class=\"description\">It is a long established fact that a reader will be\n                                        distracted by the readable...</p>\n                                    <div class=\"creator\">\n                                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/profile.png\" alt=\"...\">\n                                        <p>by <span>Angelina Ross</span> in <span>Design</span></p>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class=\"col-lg-6 col-md-12 col-sm-6 mb-30\">\n                    <a href=\"#\" class=\"single-feature\">\n                        <div class=\"row\">\n                            <div class=\"col-lg-4 col-md-4\">\n                                <div class=\"courses-img\">\n                                    <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/course-4.png\" alt=\"...\">\n                                    <div class=\"cText d-flex\">\n                                        <h4>$60.00</h4>\n                                        <del>$30.00</del>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"col-lg-8 col-md-8\">\n                                <div class=\"entry-details\">\n                                    <div class=\"entry-title\">\n                                        <h3>The Complete Graphic Design Theory</h3>\n                                        <span class=\"heart\"><i class=\"fa-regular fa-heart\"></i></span>\n                                    </div>\n                                    <ul>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path d=\"M12.6521 9.54004L14.8477 8.27081C14.9758 8.19549 15.0399 8.08879 15.0399 7.95071C15.0399 7.81263 14.9758 7.70458 14.8477 7.62658L12.6521 6.35735C12.5395 6.29326 12.4144 6.26121 12.2768 6.26121C12.1392 6.26121 12.0133 6.29326 11.8989 6.35735L9.70344 7.62658C9.57523 7.7019 9.51113 7.8086 9.51113 7.94669C9.51113 8.08479 9.57523 8.19283 9.70344 8.27081L11.8989 9.54004C12.0115 9.60414 12.1366 9.63619 12.2743 9.63619C12.4119 9.63619 12.5378 9.60414 12.6521 9.54004ZM12.6521 11.9968L14.1265 11.1554C14.2395 11.0928 14.3305 11.0021 14.3995 10.8832C14.4686 10.7643 14.5031 10.636 14.5031 10.4984V9.32371L12.6521 10.399C12.5392 10.4685 12.4136 10.5032 12.2755 10.5032C12.1374 10.5032 12.0119 10.4685 11.8989 10.399L10.048 9.32371V10.4984C10.048 10.636 10.0825 10.7643 10.1515 10.8832C10.2206 11.0021 10.3116 11.0928 10.4246 11.1554L11.8989 11.9968C12.0115 12.0609 12.1366 12.0929 12.2743 12.0929C12.4119 12.0929 12.5378 12.0609 12.6521 11.9968ZM16.4101 16.25H12.2755C12.2755 16.0416 12.2684 15.8333 12.2543 15.625C12.2401 15.4166 12.2189 15.2083 12.1906 15H16.4101C16.4849 15 16.5464 14.9759 16.5944 14.9279C16.6425 14.8798 16.6666 14.8183 16.6666 14.7435V5.25642C16.6666 5.18163 16.6425 5.12019 16.5944 5.0721C16.5464 5.02402 16.4849 4.99998 16.4101 4.99998H3.58967C3.51488 4.99998 3.45344 5.02402 3.40536 5.0721C3.35727 5.12019 3.33323 5.18163 3.33323 5.25642V6.14263C3.1249 6.11431 2.91657 6.09307 2.70825 6.07892C2.49992 6.06476 2.29159 6.05769 2.08325 6.05769V5.25642C2.08325 4.84215 2.23076 4.48752 2.52577 4.19252C2.82077 3.89751 3.17541 3.75 3.58967 3.75H16.4101C16.8244 3.75 17.179 3.89751 17.474 4.19252C17.769 4.48752 17.9165 4.84215 17.9165 5.25642V14.7435C17.9165 15.1578 17.769 15.5124 17.474 15.8074C17.179 16.1025 16.8244 16.25 16.4101 16.25ZM6.58498 16.25C6.41715 16.25 6.27127 16.1973 6.14734 16.0921C6.02341 15.9869 5.94595 15.8498 5.91498 15.681C5.79425 14.8274 5.42592 14.1017 4.81 13.504C4.19409 12.9062 3.45664 12.5443 2.59767 12.4182C2.43692 12.3974 2.31099 12.3219 2.2199 12.1917C2.1288 12.0615 2.08325 11.913 2.08325 11.7464C2.08325 11.5693 2.14362 11.4209 2.26436 11.3013C2.38508 11.1816 2.52556 11.133 2.68581 11.1555C3.8685 11.2901 4.87623 11.7759 5.70902 12.613C6.54181 13.45 7.02712 14.4599 7.16494 15.6426C7.18737 15.8114 7.1409 15.9548 7.02552 16.0729C6.91013 16.1909 6.76329 16.25 6.58498 16.25ZM9.82361 16.25C9.64091 16.25 9.49107 16.1869 9.37409 16.0609C9.25711 15.9348 9.18741 15.7777 9.16496 15.5897C9.00257 13.86 8.31027 12.3918 7.08804 11.1851C5.86582 9.97834 4.3872 9.3034 2.65217 9.16023C2.48336 9.14313 2.34634 9.07206 2.24111 8.94702C2.13587 8.82197 2.08325 8.67607 2.08325 8.50933C2.08325 8.33217 2.14148 8.18162 2.25794 8.05769C2.37438 7.93377 2.5154 7.88035 2.681 7.89744C4.7622 8.0406 6.53275 8.84135 7.99267 10.2997C9.4526 11.758 10.2627 13.5235 10.4229 15.5961C10.44 15.7788 10.3887 15.9334 10.2689 16.06C10.1491 16.1867 10.0007 16.25 9.82361 16.25ZM2.93215 16.25C2.6942 16.25 2.49324 16.1678 2.32925 16.0035C2.16525 15.8392 2.08325 15.6381 2.08325 15.4001C2.08325 15.1622 2.1654 14.9612 2.32971 14.7972C2.494 14.6332 2.69512 14.5512 2.93306 14.5512C3.17101 14.5512 3.37197 14.6334 3.53596 14.7977C3.69996 14.962 3.78196 15.1631 3.78196 15.4011C3.78196 15.639 3.69981 15.84 3.5355 16.004C3.37121 16.168 3.17009 16.25 2.93215 16.25Z\" fill=\"#6B7385\"></path>\n                                            </svg>\n                                            12 lesson\n                                        </li>\n                                        <li>\n                                            <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path d=\"M2.25174 16.0896C2.03834 16.0896 1.85945 16.0174 1.71508 15.873C1.57072 15.7287 1.49854 15.5498 1.49854 15.3364V14.237C1.49854 13.8075 1.60938 13.4243 1.83108 13.0872C2.05276 12.7501 2.34881 12.4879 2.71924 12.3005C3.5112 11.9131 4.30755 11.6145 5.10828 11.4045C5.90904 11.1946 6.78911 11.0896 7.74852 11.0896C8.70792 11.0896 9.58799 11.1946 10.3887 11.4045C11.1895 11.6145 11.9858 11.9131 12.7778 12.3005C13.1482 12.4879 13.4443 12.7501 13.666 13.0872C13.8876 13.4243 13.9985 13.8075 13.9985 14.237V15.3364C13.9985 15.5498 13.9263 15.7287 13.7819 15.873C13.6376 16.0174 13.4587 16.0896 13.2453 16.0896H2.25174ZM15.3414 16.0896C15.4437 16.0024 15.5232 15.8934 15.58 15.7626C15.6367 15.6318 15.6651 15.4855 15.6651 15.3236V14.1345C15.6651 13.5875 15.5312 13.0662 15.2633 12.5705C14.9955 12.0749 14.6155 11.6497 14.1235 11.2948C14.6823 11.3781 15.2127 11.5071 15.7148 11.6818C16.217 11.8565 16.6961 12.0629 17.1523 12.3012C17.5829 12.5309 17.9154 12.8016 18.1499 13.1133C18.3844 13.4251 18.5017 13.7655 18.5017 14.1345V15.3364C18.5017 15.5498 18.4295 15.7287 18.2851 15.873C18.1407 16.0174 17.9619 16.0896 17.7485 16.0896H15.3414ZM7.74852 9.74343C6.94645 9.74343 6.25982 9.45784 5.68864 8.88668C5.11746 8.3155 4.83187 7.62887 4.83187 6.8268C4.83187 6.02472 5.11746 5.33809 5.68864 4.76693C6.25982 4.19575 6.94645 3.91016 7.74852 3.91016C8.55058 3.91016 9.23721 4.19575 9.80839 4.76693C10.3796 5.33809 10.6651 6.02472 10.6651 6.8268C10.6651 7.62887 10.3796 8.3155 9.80839 8.88668C9.23721 9.45784 8.55058 9.74343 7.74852 9.74343ZM14.944 6.8268C14.944 7.62887 14.6584 8.3155 14.0872 8.88668C13.516 9.45784 12.8294 9.74343 12.0273 9.74343C11.9333 9.74343 11.8136 9.73275 11.6683 9.71139C11.5231 9.69003 11.4034 9.66653 11.3094 9.64089C11.638 9.24579 11.8906 8.80748 12.0671 8.32595C12.2436 7.84442 12.3318 7.34437 12.3318 6.8258C12.3318 6.30725 12.2418 5.80918 12.0618 5.33162C11.8818 4.85406 11.631 4.41443 11.3094 4.01272C11.429 3.96998 11.5487 3.94221 11.6683 3.92939C11.788 3.91657 11.9077 3.91016 12.0273 3.91016C12.8294 3.91016 13.516 4.19575 14.0872 4.76693C14.6584 5.33809 14.944 6.02472 14.944 6.8268ZM2.74851 14.8396H12.7485V14.237C12.7485 14.0629 12.705 13.908 12.6179 13.7723C12.5308 13.6366 12.3927 13.518 12.2036 13.4165C11.5177 13.0629 10.8115 12.795 10.0851 12.6128C9.35856 12.4307 8.57971 12.3396 7.74852 12.3396C6.91732 12.3396 6.13847 12.4307 5.41197 12.6128C4.68549 12.795 3.97929 13.0629 3.29339 13.4165C3.10429 13.518 2.9662 13.6366 2.87912 13.7723C2.79205 13.908 2.74851 14.0629 2.74851 14.237V14.8396ZM7.74852 8.49347C8.20685 8.49347 8.59921 8.33028 8.9256 8.00389C9.25199 7.6775 9.41518 7.28514 9.41518 6.8268C9.41518 6.36847 9.25199 5.97611 8.9256 5.64972C8.59921 5.32333 8.20685 5.16014 7.74852 5.16014C7.29018 5.16014 6.89782 5.32333 6.57143 5.64972C6.24504 5.97611 6.08185 6.36847 6.08185 6.8268C6.08185 7.28514 6.24504 7.6775 6.57143 8.00389C6.89782 8.33028 7.29018 8.49347 7.74852 8.49347Z\" fill=\"#6B7385\"></path>\n                                            </svg>\n                                            50 Students\n                                        </li>\n                                    </ul>\n                                    <p class=\"description\">It is a long established fact that a reader will be\n                                        distracted by the readable...</p>\n                                    <div class=\"creator\">\n                                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/profile.png\" alt=\"...\">\n                                        <p>by <span>Angelina Ross</span> in <span>Design</span></p>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n            </div>\n        </span>\n    </div>\n</section>\n    </div><div class=\"section parent ui-sortable-handle\" id=\"45\">\n        <section class=\"skill-wrapper section-padding\">\n    <div class=\"container\">\n        <div class=\"row align-items-center\">\n            <div class=\"col-lg-5 col-md-6\">\n                <div class=\"skill-image position-relative\">\n                    <span class=\"builder_image parent\" content_type=\"image\" id=\"239\">\n                        <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/skill-image.png\" alt=\"...\">\n                    </span>\n                    <div class=\"over-text\">\n                        <span>\n                            <svg width=\"30\" height=\"30\" viewBox=\"0 0 30 30\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                <path d=\"M8.12494 20.0241C9.16021 20.0241 10.1674 20.1415 11.1466 20.3763C12.1258 20.6111 13.0977 20.9793 14.0625 21.4809V9.19239C13.1843 8.62028 12.2339 8.1912 11.2115 7.90514C10.1891 7.61907 9.16021 7.47604 8.12494 7.47604C7.37494 7.47604 6.67422 7.53493 6.02278 7.6527C5.37134 7.77049 4.70188 7.9632 4.01438 8.23082C3.91821 8.26289 3.85009 8.30897 3.81003 8.36907C3.76997 8.42918 3.74994 8.49528 3.74994 8.56739V20.3895C3.74994 20.5017 3.79 20.5838 3.87013 20.6359C3.95027 20.688 4.03843 20.694 4.13459 20.6539C4.72753 20.452 5.35332 20.2966 6.01197 20.1876C6.67061 20.0786 7.37494 20.0241 8.12494 20.0241ZM15.9374 21.4809C16.9022 20.9793 17.8741 20.6111 18.8533 20.3763C19.8324 20.1415 20.8397 20.0241 21.8749 20.0241C22.6249 20.0241 23.3293 20.0786 23.9879 20.1876C24.6466 20.2966 25.2723 20.452 25.8653 20.6539C25.9614 20.694 26.0496 20.688 26.1297 20.6359C26.2099 20.5838 26.2499 20.5017 26.2499 20.3895V8.56739C26.2499 8.49528 26.2299 8.43118 26.1898 8.37507C26.1498 8.31897 26.0817 8.27089 25.9855 8.23082C25.298 7.9632 24.6285 7.77049 23.9771 7.6527C23.3257 7.53493 22.6249 7.47604 21.8749 7.47604C20.8397 7.47604 19.8108 7.61907 18.7884 7.90514C17.7659 8.1912 16.8156 8.62028 15.9374 9.19239V21.4809ZM14.9999 23.7068C14.7564 23.7068 14.5284 23.6763 14.3161 23.6154C14.1037 23.5545 13.903 23.4736 13.7139 23.3726C12.8533 22.8854 11.9531 22.5181 11.0132 22.2704C10.0733 22.0229 9.11052 21.8991 8.12494 21.8991C7.36212 21.8991 6.61294 21.9836 5.87738 22.1527C5.14179 22.3217 4.43266 22.5705 3.74997 22.899C3.30447 23.1042 2.88059 23.0717 2.47834 22.8017C2.07611 22.5317 1.875 22.149 1.875 21.6539V8.08183C1.875 7.8126 1.9443 7.55979 2.08291 7.32342C2.22153 7.08704 2.42146 6.91677 2.68269 6.8126C3.52883 6.40075 4.41064 6.09587 5.32809 5.89795C6.24555 5.70003 7.17783 5.60107 8.12494 5.60107C9.34129 5.60107 10.5296 5.76734 11.6898 6.09989C12.8501 6.43241 13.9535 6.92319 14.9999 7.57223C16.0464 6.92319 17.1498 6.43241 18.31 6.09989C19.4703 5.76734 20.6586 5.60107 21.8749 5.60107C22.822 5.60107 23.7543 5.70003 24.6718 5.89795C25.5892 6.09587 26.471 6.40075 27.3172 6.8126C27.5784 6.91677 27.7783 7.08704 27.917 7.32342C28.0556 7.55979 28.1249 7.8126 28.1249 8.08183V21.6539C28.1249 22.149 27.9158 22.5276 27.4975 22.7897C27.0792 23.0517 26.6393 23.0801 26.1778 22.875C25.5031 22.5545 24.804 22.3117 24.0804 22.1467C23.3569 21.9816 22.6217 21.8991 21.8749 21.8991C20.8894 21.8991 19.9266 22.0229 18.9867 22.2704C18.0468 22.5181 17.1466 22.8854 16.286 23.3726C16.0969 23.4736 15.8961 23.5545 15.6838 23.6154C15.4715 23.6763 15.2435 23.7068 14.9999 23.7068ZM17.4278 11.077C17.4278 10.9376 17.4775 10.795 17.5768 10.6491C17.6762 10.5033 17.7892 10.4031 17.9158 10.3487C18.536 10.1003 19.1742 9.91195 19.8305 9.78376C20.4867 9.65555 21.1682 9.59145 21.8749 9.59145C22.2836 9.59145 22.679 9.61548 23.0612 9.66354C23.4434 9.71163 23.8284 9.77733 24.2163 9.86067C24.3637 9.89431 24.4911 9.97444 24.5985 10.101C24.7058 10.2276 24.7595 10.3751 24.7595 10.5434C24.7595 10.8254 24.671 11.0317 24.4939 11.1623C24.3168 11.2929 24.0873 11.3246 23.8052 11.2573C23.5056 11.1948 23.1943 11.1499 22.8713 11.1227C22.5484 11.0954 22.2163 11.0818 21.8749 11.0818C21.2692 11.0818 20.6758 11.1399 20.0949 11.2561C19.5139 11.3723 18.9598 11.5297 18.4326 11.7284C18.1377 11.8422 17.8966 11.8358 17.7091 11.7092C17.5216 11.5826 17.4278 11.3719 17.4278 11.077ZM17.4278 17.9039C17.4278 17.7645 17.4775 17.6199 17.5768 17.47C17.6762 17.3202 17.7892 17.218 17.9158 17.1635C18.5199 16.9151 19.1582 16.7289 19.8305 16.6047C20.5027 16.4805 21.1842 16.4184 21.8749 16.4184C22.2836 16.4184 22.679 16.4424 23.0612 16.4905C23.4434 16.5385 23.8284 16.6042 24.2163 16.6876C24.3637 16.7212 24.4911 16.8014 24.5985 16.928C24.7058 17.0546 24.7595 17.202 24.7595 17.3703C24.7595 17.6523 24.671 17.8586 24.4939 17.9892C24.3168 18.1198 24.0873 18.1515 23.8052 18.0842C23.5056 18.0217 23.1943 17.9768 22.8713 17.9496C22.5484 17.9223 22.2163 17.9087 21.8749 17.9087C21.2772 17.9087 20.6898 17.9656 20.1129 18.0794C19.536 18.1932 18.9839 18.3534 18.4567 18.5602C18.1618 18.682 17.9166 18.6788 17.7211 18.5505C17.5256 18.4223 17.4278 18.2068 17.4278 17.9039ZM17.4278 14.5025C17.4278 14.3631 17.4775 14.2204 17.5768 14.0746C17.6762 13.9288 17.7892 13.8286 17.9158 13.7741C18.536 13.5257 19.1742 13.3374 19.8305 13.2092C20.4867 13.081 21.1682 13.0169 21.8749 13.0169C22.2836 13.0169 22.679 13.041 23.0612 13.089C23.4434 13.1371 23.8284 13.2028 24.2163 13.2861C24.3637 13.3198 24.4911 13.3999 24.5985 13.5265C24.7058 13.6531 24.7595 13.8006 24.7595 13.9688C24.7595 14.2509 24.671 14.4572 24.4939 14.5878C24.3168 14.7184 24.0873 14.7501 23.8052 14.6828C23.5056 14.6203 23.1943 14.5754 22.8713 14.5481C22.5484 14.5209 22.2163 14.5073 21.8749 14.5073C21.2692 14.5073 20.6758 14.5654 20.0949 14.6815C19.5139 14.7977 18.9598 14.9552 18.4326 15.1539C18.1377 15.2677 17.8966 15.2613 17.7091 15.1347C17.5216 15.0081 17.4278 14.7974 17.4278 14.5025Z\" fill=\"white\"></path>\n                                </svg>\n                                \n                        </span>\n                        <div class=\"b-text\">\n                            <h5>150k +</h5>\n                            <p>Top rated Courses</p>\n                        </div>\n                    </div>\n                </div>\n            </div>\n            <div class=\"col-lg-7 col-md-6\">\n                <div class=\"skil-content\">\n                    <span class=\"title-head builder_text parent\" content_type=\"text\" id=\"126\">Know About Us</span>\n                    <h2 class=\"title builder_text parent\" content_type=\"text\" id=\"238\">Learn &amp; Grow Your Skills From <span class=\"gradient shadow-none color\">Educate</span></h2>\n                    <p class=\"description mt-5 builder_text parent\" content_type=\"text\" id=\"326\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>\n                    <ul>\n                        <li>\n                            <div class=\"svg\">\n                                <svg width=\"28\" height=\"28\" viewBox=\"0 0 28 28\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                    <path d=\"M21.4083 16.3111L24.8186 12.8896C24.9709 12.7356 25.1492 12.6585 25.3535 12.6585C25.5578 12.6585 25.7407 12.7356 25.9022 12.8896C26.0638 13.0437 26.1427 13.224 26.1389 13.4307C26.1352 13.6373 26.0563 13.8144 25.9022 13.962L22.059 17.7761C21.874 17.9676 21.6539 18.0633 21.3986 18.0633C21.1434 18.0633 20.92 17.9676 20.7286 17.7761L18.8978 15.9274C18.7437 15.7804 18.6648 15.6083 18.6611 15.4111C18.6573 15.2138 18.7362 15.0345 18.8978 14.8729C19.0518 14.7189 19.2324 14.64 19.4396 14.6362C19.6468 14.6325 19.8274 14.7114 19.9814 14.8729L21.4083 16.3111ZM10.628 21.9694C8.90488 20.4288 7.48318 19.0886 6.36289 17.9489C5.24258 16.8091 4.36009 15.7924 3.71543 14.8987C3.07077 14.005 2.62092 13.1891 2.36589 12.4509C2.1109 11.7128 1.9834 10.9653 1.9834 10.2085C1.9834 8.64995 2.51737 7.32997 3.58532 6.24857C4.65325 5.16717 5.95675 4.62646 7.49584 4.62646C8.47555 4.62646 9.41374 4.85495 10.3104 5.31191C11.2071 5.76885 11.9703 6.42286 12.6 7.27392C13.2355 6.42101 13.9837 5.76654 14.8444 5.31051C15.7051 4.85448 16.6195 4.62646 17.5875 4.62646C18.992 4.62646 20.2312 5.07706 21.3051 5.97825C22.379 6.87942 23.0072 8.01729 23.1897 9.39186H21.6417C21.4517 8.48544 20.9918 7.71737 20.2619 7.08766C19.532 6.45796 18.6405 6.1431 17.5875 6.1431C16.5016 6.1431 15.6491 6.42018 15.0298 6.97435C14.4106 7.52852 13.7614 8.23712 13.0824 9.10016H12.1176C11.4042 8.21019 10.7393 7.49486 10.1231 6.95417C9.50685 6.41346 8.6311 6.1431 7.49584 6.1431C6.37255 6.1431 5.42576 6.53386 4.65544 7.31537C3.88515 8.0969 3.50001 9.06128 3.50001 10.2085C3.50001 10.8259 3.62153 11.4525 3.86459 12.0883C4.10765 12.7242 4.56459 13.4688 5.23542 14.3221C5.90626 15.1754 6.82987 16.188 8.00626 17.3599C9.18265 18.5318 10.7139 19.9689 12.6 21.671C13.131 21.1983 13.8418 20.5589 14.7325 19.7527C15.6232 18.9465 16.2743 18.3475 16.6856 17.9556L16.8531 18.1232L17.2218 18.4918L17.5904 18.8605L17.758 19.028C17.3347 19.4393 16.9043 19.8421 16.4668 20.2362C16.0293 20.6303 15.6363 20.9859 15.2878 21.303L13.2215 23.1697C13.03 23.3222 12.8229 23.3985 12.6 23.3985C12.3772 23.3985 12.17 23.3222 11.9786 23.1697L10.628 21.9694Z\" fill=\"#F81163\"></path>\n                                    </svg>\n                            </div>\n                            <div class=\"skill-text\">\n                                <span class=\"builder_text parent\" content_type=\"text\" id=\"804\">Life time Access</span>\n                                <p class=\"builder_text parent\" content_type=\"text\" id=\"118\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>\n                            </div>\n                        </li>\n                        <li>\n                            <div class=\"svg color-dash\">\n                                <svg width=\"28\" height=\"28\" viewBox=\"0 0 28 28\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                    <path d=\"M6.31752 20.0083C4.63719 20.0083 3.21281 19.4264 2.04437 18.2627C0.875956 17.0989 0.291748 15.6806 0.291748 14.0077C0.291748 12.3349 0.875995 10.914 2.04449 9.74505C3.213 8.57615 4.63712 7.9917 6.31685 7.9917C6.98557 7.9917 7.62746 8.10762 8.24252 8.33945C8.85757 8.57129 9.41637 8.90932 9.91894 9.35355L12.4699 11.5814L11.3212 12.5776L8.952 10.4798C8.59152 10.1672 8.18948 9.92712 7.74587 9.75961C7.30225 9.59207 6.84178 9.50831 6.36448 9.50831C5.10613 9.50831 4.03219 9.94615 3.14264 10.8218C2.25312 11.6975 1.80836 12.7584 1.80836 14.0044C1.80836 15.2504 2.25312 16.3147 3.14264 17.1971C4.03219 18.0796 5.10613 18.5209 6.36448 18.5209C6.84178 18.5209 7.30225 18.4371 7.74587 18.2696C8.18948 18.1021 8.59152 17.862 8.952 17.5494L18.0812 9.35355C18.5762 8.92128 19.1323 8.58623 19.7493 8.34841C20.3664 8.1106 21.0106 7.9917 21.6821 7.9917C23.3622 7.9917 24.7865 8.57532 25.9553 9.74255C27.124 10.9098 27.7084 12.3286 27.7084 13.999C27.7084 15.6868 27.1201 17.1104 25.9435 18.2695C24.767 19.4287 23.333 20.0083 21.6417 20.0083C20.9734 20.0083 20.3355 19.8905 19.7281 19.655C19.1207 19.4194 18.562 19.0832 18.052 18.6465L15.4943 16.3894L16.6789 15.4112L19.0481 17.5202C19.4086 17.8418 19.8106 18.0841 20.2542 18.2471C20.6979 18.4102 21.1583 18.4917 21.6356 18.4917C22.894 18.4917 23.9679 18.0539 24.8575 17.1782C25.747 16.3025 26.1917 15.2416 26.1917 13.9956C26.1917 12.7496 25.747 11.6854 24.8575 10.8029C23.9679 9.92038 22.894 9.47914 21.6356 9.47914C21.1583 9.47914 20.6979 9.56291 20.2542 9.73044C19.8106 9.89796 19.4086 10.138 19.0481 10.4506L9.92596 18.6442C9.4262 19.0974 8.86775 19.4381 8.2506 19.6662C7.63347 19.8943 6.98911 20.0083 6.31752 20.0083Z\" fill=\"#2F57EF\"></path>\n                                    </svg>\n                            </div>\n                                <div class=\"skill-text\">\n                                    <span class=\"builder_text parent\" content_type=\"text\" id=\"474\">Learn from Anywhere</span>\n                                    <p class=\"builder_text parent\" content_type=\"text\" id=\"226\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p> \n                             </div>\n                        </li>\n                    </ul>\n                    <span class=\"promo-more-button\">\n                        <a href=\"#\" class=\"eBtn gradient mt-50\">More about us <i class=\"fa-solid fa-arrow-right-long ms-2\"></i></a>\n                    </span>\n                </div>\n            </div>\n        </div>\n    </div>\n</section>\n    </div><div class=\"section parent ui-sortable-handle\" id=\"752\">\n        <section class=\"testimonials-wrapper section-padding\">\n    <span class=\"elips left-elips\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/Ellipse 8.png\" alt=\"...\"></span>\n    <span class=\"elips right-elips\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/Ellipse 9.png\" alt=\"...\"></span>\n    <div class=\"container\">\n        <div class=\"row\">\n            <div class=\"col-lg-4 col-md-4\">\n                <div class=\"section-title \">\n                    <span class=\"title-head builder_text parent\" content_type=\"text\" id=\"436\">Testimonial</span>\n                    <h2 class=\"title builder_text parent\" content_type=\"text\" id=\"329\">What our clients says about us</h2>\n                    <p class=\"description mt-5 builder_text parent\" content_type=\"text\" id=\"815\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>\n                </div>\n            </div>\n            <div class=\"col-lg-8 col-md-8\">\n                <div class=\"user-slider owl-carousel owl-theme owl-loaded owl-drag\">\n                    <!-- Single User Opinion -->\n                    \n                    <!-- Single User Opinion -->\n                    \n                    <!-- Single User Opinion -->\n                    \n                    <!-- Single User Opinion -->\n                    \n                    <!-- Single User Opinion -->\n                    \n                    <!-- Single User Opinion -->\n                <div class=\"owl-stage-outer\"><div class=\"owl-stage\" style=\"transform: translate3d(-9379px, 0px, 0px); transition: all 0s ease 0s; width: 36739px;\"><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"46\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <span class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"609\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span><p></p>\n                                    <div class=\"user-info d-flex\">\n                                        <div>\n                                            <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"845\">Linchon Philips</span></h4>\n                                            <p><span class=\"builder_text parent\" content_type=\"text\" id=\"415\">CEO @ Yahoo</span></p>\n                                        </div>\n                                        <ul class=\"d-flex align-items-center\">\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                        </ul>\n                                    </div>\n                            </span></div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"910\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"753\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"169\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"519\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"816\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"694\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"696\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"301\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"46\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <span class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"609\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span><p></p>\n                                    <div class=\"user-info d-flex\">\n                                        <div>\n                                            <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"845\">Linchon Philips</span></h4>\n                                            <p><span class=\"builder_text parent\" content_type=\"text\" id=\"415\">CEO @ Yahoo</span></p>\n                                        </div>\n                                        <ul class=\"d-flex align-items-center\">\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                        </ul>\n                                    </div>\n                            </span></div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"910\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"753\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"169\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"519\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"816\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"694\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"696\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"301\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"618\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\">\n                                    <span class=\"builder_text parent\" content_type=\"text\" id=\"154\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span>\n                                </p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"345\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"908\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"982\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"694\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"783\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"118\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"46\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <span class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"609\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span><p></p>\n                                    <div class=\"user-info d-flex\">\n                                        <div>\n                                            <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"845\">Linchon Philips</span></h4>\n                                            <p><span class=\"builder_text parent\" content_type=\"text\" id=\"415\">CEO @ Yahoo</span></p>\n                                        </div>\n                                        <ul class=\"d-flex align-items-center\">\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                        </ul>\n                                    </div>\n                            </span></div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"618\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\">\n                                    <span class=\"builder_text parent\" content_type=\"text\" id=\"154\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span>\n                                </p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"345\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"908\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"982\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"694\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"783\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"118\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"46\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <span class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"609\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span><p></p>\n                                    <div class=\"user-info d-flex\">\n                                        <div>\n                                            <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"845\">Linchon Philips</span></h4>\n                                            <p><span class=\"builder_text parent\" content_type=\"text\" id=\"415\">CEO @ Yahoo</span></p>\n                                        </div>\n                                        <ul class=\"d-flex align-items-center\">\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                        </ul>\n                                    </div>\n                            </span></div>\n                        </div>\n                    </div></div><div class=\"owl-item active\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"618\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\">\n                                    <span class=\"builder_text parent\" content_type=\"text\" id=\"154\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span>\n                                </p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"345\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"908\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"982\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"694\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"783\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"118\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"46\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <span class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"609\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span><p></p>\n                                    <div class=\"user-info d-flex\">\n                                        <div>\n                                            <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"845\">Linchon Philips</span></h4>\n                                            <p><span class=\"builder_text parent\" content_type=\"text\" id=\"415\">CEO @ Yahoo</span></p>\n                                        </div>\n                                        <ul class=\"d-flex align-items-center\">\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                        </ul>\n                                    </div>\n                            </span></div>\n                        </div>\n                    </div></div><div class=\"owl-item\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"910\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"753\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"169\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"519\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"816\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"694\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"696\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"301\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"46\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <span class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"609\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span><p></p>\n                                    <div class=\"user-info d-flex\">\n                                        <div>\n                                            <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"845\">Linchon Philips</span></h4>\n                                            <p><span class=\"builder_text parent\" content_type=\"text\" id=\"415\">CEO @ Yahoo</span></p>\n                                        </div>\n                                        <ul class=\"d-flex align-items-center\">\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                        </ul>\n                                    </div>\n                            </span></div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"910\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"753\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"169\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"519\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"816\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"694\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"696\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"301\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"46\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <span class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"609\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span><p></p>\n                                    <div class=\"user-info d-flex\">\n                                        <div>\n                                            <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"845\">Linchon Philips</span></h4>\n                                            <p><span class=\"builder_text parent\" content_type=\"text\" id=\"415\">CEO @ Yahoo</span></p>\n                                        </div>\n                                        <ul class=\"d-flex align-items-center\">\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                        </ul>\n                                    </div>\n                            </span></div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"910\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"753\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"169\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"519\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"816\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"694\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"696\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"301\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"618\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\">\n                                    <span class=\"builder_text parent\" content_type=\"text\" id=\"154\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span>\n                                </p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"345\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"908\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"982\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"694\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"783\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"118\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"46\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <span class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"609\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span><p></p>\n                                    <div class=\"user-info d-flex\">\n                                        <div>\n                                            <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"845\">Linchon Philips</span></h4>\n                                            <p><span class=\"builder_text parent\" content_type=\"text\" id=\"415\">CEO @ Yahoo</span></p>\n                                        </div>\n                                        <ul class=\"d-flex align-items-center\">\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                        </ul>\n                                    </div>\n                            </span></div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"618\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\">\n                                    <span class=\"builder_text parent\" content_type=\"text\" id=\"154\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span>\n                                </p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"345\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"908\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"982\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <p class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"694\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span></p>\n                                <div class=\"user-info d-flex\">\n                                    <div>\n                                        <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"783\">Linchon Philips</span></h4>\n                                        <p><span class=\"builder_text parent\" content_type=\"text\" id=\"118\">CEO @ Yahoo</span></p>\n                                    </div>\n                                    <ul class=\"d-flex align-items-center\">\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                        <li><i class=\"fa fa-star\"></i></li>\n                                    </ul>\n                                </div>\n                            </div>\n                        </div>\n                    </div></div><div class=\"owl-item cloned\" style=\"width: 771.664px; margin-right: 10px;\"><div class=\"single-opinion\">\n                        <div class=\"user-image\">\n                            <span class=\"builder_image parent\" content_type=\"image\" id=\"46\"><img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/test-image.png\" alt=\"\"></span>\n                        </div>\n                        <div class=\"testimonial-border\">\n                            <div class=\"testimonial-des\">\n                                <span class=\"description\"><span class=\"builder_text parent\" content_type=\"text\" id=\"609\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.</span><p></p>\n                                    <div class=\"user-info d-flex\">\n                                        <div>\n                                            <h4><span class=\"builder_text parent\" content_type=\"text\" id=\"845\">Linchon Philips</span></h4>\n                                            <p><span class=\"builder_text parent\" content_type=\"text\" id=\"415\">CEO @ Yahoo</span></p>\n                                        </div>\n                                        <ul class=\"d-flex align-items-center\">\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                            <li><i class=\"fa fa-star\"></i></li>\n                                        </ul>\n                                    </div>\n                            </span></div>\n                        </div>\n                    </div></div></div></div><div class=\"owl-nav\"><button type=\"button\" role=\"presentation\" class=\"owl-prev\"><i class=\"fa-solid fa-chevron-left\"></i></button><button type=\"button\" role=\"presentation\" class=\"owl-next\"><i class=\"fa-solid fa-chevron-right\"></i></button></div><div class=\"owl-dots disabled\"></div><div class=\"owl-nav\"><button type=\"button\" role=\"presentation\" class=\"owl-prev\"><i class=\"fa-solid fa-chevron-left\"></i></button><button type=\"button\" role=\"presentation\" class=\"owl-next\"><i class=\"fa-solid fa-chevron-right\"></i></button></div><div class=\"owl-dots disabled\"></div><div class=\"owl-nav\"><button type=\"button\" role=\"presentation\" class=\"owl-prev\"><i class=\"fa-solid fa-chevron-left\"></i></button><button type=\"button\" role=\"presentation\" class=\"owl-next\"><i class=\"fa-solid fa-chevron-right\"></i></button></div><div class=\"owl-dots disabled\"></div><div class=\"owl-nav\"><button type=\"button\" role=\"presentation\" class=\"owl-prev\"><i class=\"fa-solid fa-chevron-left\"></i></button><button type=\"button\" role=\"presentation\" class=\"owl-next\"><i class=\"fa-solid fa-chevron-right\"></i></button></div><div class=\"owl-dots disabled\"></div><div class=\"owl-nav\"><button type=\"button\" role=\"presentation\" class=\"owl-prev\"><i class=\"fa-solid fa-chevron-left\"></i></button><button type=\"button\" role=\"presentation\" class=\"owl-next\"><i class=\"fa-solid fa-chevron-right\"></i></button></div><div class=\"owl-dots disabled\"></div></div>\n            </div>\n        </div>\n    </div>\n</section>\n    </div><div class=\"section parent ui-sortable-handle\" id=\"244\">\n        <section class=\"blog-wrapper section-padding\">\n    <div class=\"container\">\n        <div class=\"row\">\n            <div class=\"col-lg-12\">\n                <div class=\"res-control d-flex align-items-center justify-content-between\">\n                    <div class=\"section-title mb-0\">\n                        <span class=\"title-head mb-10 builder_text parent\" content_type=\"text\" id=\"173\">Our Blog</span>\n                        <h2 class=\"title builder_text parent\" content_type=\"text\" id=\"983\">Have a look on our news</h2>\n                    </div>\n                    <span class=\"blog-view-all-button\">\n                        <a href=\"#\" class=\"eBtn gradient\">View All Blogs</a>\n                    </span>\n               </div>\n            </div>\n        </div>\n        <span class=\"blog\">\n            <div class=\"row justify-content-center mt-50\">\n                <div class=\"col-lg-4 col-md-6 col-sm-6 mb-20\">\n                    <div class=\"Ecard card b-card\">\n                        <div class=\"card-head\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/blog1.png\" alt=\"...\">\n                            <span>Bussiness</span>\n                        </div>\n                        <div class=\"card-body\">\n                            <h4>Skills That You Can Learn From Education</h4>\n                            <p class=\"description\">It is a long established fact that a reader will be distracted by the readable...</p>\n                            <div class=\"b_bottom d-flex justify-content-between\">\n                                <a href=\"#\" class=\"read-text mt-0 stretched-link\">Read More<i class=\"fa-solid fa-arrow-right-long ms-2\"></i></a>\n                            <span>01 Jan, 2024</span>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n                <div class=\"col-lg-4 col-md-6 col-sm-6 mb-20\">\n                    <div class=\"Ecard card b-card\">\n                        <div class=\"card-head\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/blog2.png\" alt=\"...\">\n                            <span>Bussiness</span>\n                        </div>\n                        <div class=\"card-body\">\n                            <h4>Skills That You Can Learn From Education</h4>\n                            <p class=\"description\">It is a long established fact that a reader will be distracted by the readable...</p>\n                            <div class=\"b_bottom d-flex justify-content-between\">\n                                <a href=\"#\" class=\"read-text mt-0 stretched-link\">Read More<i class=\"fa-solid fa-arrow-right-long ms-2\"></i></a>\n                            <span>01 Jan, 2024</span>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n                <div class=\"col-lg-4 col-md-6 col-sm-6 mb-20\">\n                    <div class=\"Ecard card b-card\">\n                        <div class=\"card-head\">\n                            <img src=\"..\\..\\..\\..\\public/assets/page-builder/block-image/blog3.png\" alt=\"...\">\n                            <span>Bussiness</span>\n                        </div>\n                        <div class=\"card-body\">\n                            <h4>Skills That You Can Learn From Education</h4>\n                            <p class=\"description\">It is a long established fact that a reader will be distracted by the readable...</p>\n                            <div class=\"b_bottom d-flex justify-content-between\">\n                                <a href=\"#\" class=\"read-text mt-0 stretched-link\">Read More<i class=\"fa-solid fa-arrow-right-long ms-2\"></i></a>\n                            <span>01 Jan, 2024</span>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n            </div>\n        </span>\n    </div>\n</section>\n    </div><div class=\"section parent ui-sortable-handle\" id=\"526\">\n        <footer class=\"footer-area\">\n    <div class=\"container\">\n        <div class=\"row\">\n            <div class=\"col-lg-4 col-md-4\">\n                <div class=\"footer-content\">\n                    <span class=\"builder_image parent\" content_type=\"image\" id=\"805\">\n                        <img src=\"/academy/academy-laravel-11/public/uploads/home-page-builder/1716289370-64L1Akcy5a8GJSjBHmYfZgWseqxRrD.png\" alt=\"...\">\n                    </span>\n                    <p class=\"description builder_text parent\" content_type=\"text\" id=\"117\">It is a long established fact that a reader will be the distract by the read content of a page  layout.</p>\n\n                    <span class=\"footer-social-contact\">\n                        <ul class=\"f-socials d-flex\">\n                            <li><a href=\"#\"><i class=\"fa-brands fa-twitter\"></i></a></li>\n                            <li><a href=\"#\"><i class=\"fa-brands fa-facebook-f\"></i></a></li>\n                            <li><a href=\"#\"><i class=\"fa-brands fa-linkedin-in\"></i></a></li>\n                            <li><a href=\"#\"><i class=\"fa-brands fa-instagram\"></i></a></li>\n                        </ul>\n                        <div class=\"gradient-border2\">\n                            <a href=\"#\" class=\"gradient-border-btn\">Contact with Us <i class=\"fa-solid fa-arrow-right-long ms-2\"></i></a>\n                        </div>\n                    </span>\n                </div>\n            </div>\n            <div class=\"col-lg-8 col-md-8\">\n                <div class=\"row\">\n                    <div class=\"col-lg-3 col-md-6\">\n                        <span class=\"footer-widget-1\">\n                            <div class=\"footer-widget\">\n                                <h4>Resources</h4>\n                                <ul>\n                                    <li><a href=\"#\">Academy</a></li>\n                                    <li><a href=\"#\">Blog</a></li>\n                                    <li><a href=\"#\">Themes</a></li>\n                                    <li><a href=\"#\">Hosting</a></li>\n                                    <li><a href=\"#\">Developer</a></li>\n                                </ul>\n                            </div>\n                        </span>\n                    </div>\n                    <div class=\"col-lg-3 col-md-6\">\n                        <span class=\"footer-widget-2\">\n                            <div class=\"footer-widget\">\n                                <h4>Company</h4>\n                                <ul>\n                                    <li><a href=\"#\">About Us</a></li>\n                                    <li><a href=\"#\">Careers</a></li>\n                                    <li><a href=\"#\">FAQs</a></li>\n                                    <li><a href=\"#\">Teams</a></li>\n                                    <li><a href=\"#\">Contact Us</a></li>\n                                </ul>\n                            </div>\n                        </span>\n                    </div>\n                    <div class=\"col-lg-6 col-md-6\">\n                        <div class=\"footer-widget\">\n                            <span class=\"footer-widget-3\">\n                                <h4>Company</h4>\n                                <ul>\n                                    <li><a href=\"#\">Phone : +76 398 380 422</a></li>\n                                    <li><a href=\"#\">Email : companyname@gmail.com</a></li>\n                                </ul>\n                            </span>\n                           <div class=\"newslater-bottom\">\n                                <h4 class=\"builder_text parent\" content_type=\"text\" id=\"89\">Newsletter</h4>\n                                <p class=\"description builder_text parent\" content_type=\"text\" id=\"74\">Subscribe to stay tuned for new web design and latest updates. Let\'s do it! </p>\n                                <span class=\"footer-subscription-form\"><form action=\"#\" class=\"newslater-form\">\n                                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter your email here\">\n                                    <button class=\"eBtn gradient\">Submit</button>\n                                </form></span>\n                           </div>\n                        </div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n    <span class=\"footer-bottom\">\n        <div class=\"footer-bottom\">\n            <div class=\"container\">\n                <div class=\"row\">\n                    <div class=\"col-lg-8\">\n                        <ul class=\"footer-policy\">\n                            <li><a href=\"#\">Privacy Policy</a></li>\n                            <li><a href=\"#\">Terms And Use</a></li>\n                            <li><a href=\"#\">Sales and Refunds</a></li>\n                            <li><a href=\"#\">Legal</a></li>\n                            <li><a href=\"#\">Site Map</a></li>\n                        </ul>\n                    </div>\n                    <div class=\"col-lg-4\">\n                        <div class=\"copyright-text\">\n                            <p>© 2023 All Rights Reserved</p>\n                        </div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </span>\n</footer>\n    </div>', NULL, NULL, 1, NULL, '2024-05-21 04:52:30', '2024-05-29 23:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `course_id` int(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `keywords` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(21) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `message` text COLLATE utf8_unicode_ci,
  `has_read` int(11) DEFAULT '0',
  `replied` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `discount` float(10,2) DEFAULT NULL,
  `expiry` varchar(255) DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` int(11) DEFAULT NULL,
  `is_best` int(11) NOT NULL DEFAULT '0',
  `price` double(10,2) DEFAULT NULL,
  `discounted_price` double(10,2) DEFAULT NULL,
  `discount_flag` int(11) DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preview` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `requirements` mediumtext COLLATE utf8mb4_unicode_ci,
  `outcomes` mediumtext COLLATE utf8mb4_unicode_ci,
  `faqs` mediumtext COLLATE utf8mb4_unicode_ci,
  `instructors` text COLLATE utf8mb4_unicode_ci,
  `average_rating` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `paypal_supported` int(11) DEFAULT NULL,
  `stripe_supported` int(11) DEFAULT NULL,
  `ccavenue_supported` int(11) DEFAULT '0',
  `iyzico_supported` int(11) DEFAULT '0',
  `paystack_supported` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `paypal_supported`, `stripe_supported`, `ccavenue_supported`, `iyzico_supported`, `paystack_supported`) VALUES
(1, 'US Dollar', 'USD', '$', 1, 1, 0, 0, 0),
(2, 'Albanian Lek', 'ALL', 'Lek', 0, 1, 0, 0, 0),
(3, 'Algerian Dinar', 'DZD', 'دج', 1, 1, 0, 0, 0),
(4, 'Angolan Kwanza', 'AOA', 'Kz', 1, 1, 0, 0, 0),
(5, 'Argentine Peso', 'ARS', '$', 1, 1, 0, 0, 0),
(6, 'Armenian Dram', 'AMD', '֏', 1, 1, 0, 0, 0),
(7, 'Aruban Florin', 'AWG', 'ƒ', 1, 1, 0, 0, 0),
(8, 'Australian Dollar', 'AUD', '$', 1, 1, 0, 0, 0),
(9, 'Azerbaijani Manat', 'AZN', 'm', 1, 1, 0, 0, 0),
(10, 'Bahamian Dollar', 'BSD', 'B$', 1, 1, 0, 0, 0),
(11, 'Bahraini Dinar', 'BHD', '.د.ب', 1, 1, 0, 0, 0),
(12, 'Bangladeshi Taka', 'BDT', '৳', 1, 1, 0, 0, 0),
(13, 'Barbadian Dollar', 'BBD', 'Bds$', 1, 1, 0, 0, 0),
(14, 'Belarusian Ruble', 'BYR', 'Br', 0, 0, 0, 0, 0),
(15, 'Belgian Franc', 'BEF', 'fr', 1, 1, 0, 0, 0),
(16, 'Belize Dollar', 'BZD', '$', 1, 1, 0, 0, 0),
(17, 'Bermudan Dollar', 'BMD', '$', 1, 1, 0, 0, 0),
(18, 'Bhutanese Ngultrum', 'BTN', 'Nu.', 1, 1, 0, 0, 0),
(19, 'Bitcoin', 'BTC', '฿', 1, 1, 0, 0, 0),
(20, 'Bolivian Boliviano', 'BOB', 'Bs.', 1, 1, 0, 0, 0),
(21, 'Bosnia', 'BAM', 'KM', 1, 1, 0, 0, 0),
(22, 'Botswanan Pula', 'BWP', 'P', 1, 1, 0, 0, 0),
(23, 'Brazilian Real', 'BRL', 'R$', 1, 1, 0, 0, 0),
(24, 'British Pound Sterling', 'GBP', '£', 1, 1, 0, 0, 0),
(25, 'Brunei Dollar', 'BND', 'B$', 1, 1, 0, 0, 0),
(26, 'Bulgarian Lev', 'BGN', 'Лв.', 1, 1, 0, 0, 0),
(27, 'Burundian Franc', 'BIF', 'FBu', 1, 1, 0, 0, 0),
(28, 'Cambodian Riel', 'KHR', 'KHR', 1, 1, 0, 0, 0),
(29, 'Canadian Dollar', 'CAD', '$', 1, 1, 0, 0, 0),
(30, 'Cape Verdean Escudo', 'CVE', '$', 1, 1, 0, 0, 0),
(31, 'Cayman Islands Dollar', 'KYD', '$', 1, 1, 0, 0, 0),
(32, 'CFA Franc BCEAO', 'XOF', 'CFA', 1, 1, 0, 0, 0),
(33, 'CFA Franc BEAC', 'XAF', 'FCFA', 1, 1, 0, 0, 0),
(34, 'CFP Franc', 'XPF', '₣', 1, 1, 0, 0, 0),
(35, 'Chilean Peso', 'CLP', '$', 1, 1, 0, 0, 0),
(36, 'Chinese Yuan', 'CNY', '¥', 1, 1, 0, 0, 0),
(37, 'Colombian Peso', 'COP', '$', 1, 1, 0, 0, 0),
(38, 'Comorian Franc', 'KMF', 'CF', 1, 1, 0, 0, 0),
(39, 'Congolese Franc', 'CDF', 'FC', 1, 1, 0, 0, 0),
(40, 'Costa Rican ColÃ³n', 'CRC', '₡', 1, 1, 0, 0, 0),
(41, 'Croatian Kuna', 'HRK', 'kn', 1, 1, 0, 0, 0),
(42, 'Cuban Convertible Peso', 'CUC', '$, CUC', 1, 1, 0, 0, 0),
(43, 'Czech Republic Koruna', 'CZK', 'Kč', 1, 1, 0, 0, 0),
(44, 'Danish Krone', 'DKK', 'Kr.', 1, 1, 0, 0, 0),
(45, 'Djiboutian Franc', 'DJF', 'Fdj', 1, 1, 0, 0, 0),
(46, 'Dominican Peso', 'DOP', '$', 1, 1, 0, 0, 0),
(47, 'East Caribbean Dollar', 'XCD', '$', 1, 1, 0, 0, 0),
(48, 'Egyptian Pound', 'EGP', 'ج.م', 1, 1, 0, 0, 0),
(49, 'Eritrean Nakfa', 'ERN', 'Nfk', 1, 1, 0, 0, 0),
(50, 'Estonian Kroon', 'EEK', 'kr', 1, 1, 0, 0, 0),
(51, 'Ethiopian Birr', 'ETB', 'Nkf', 1, 1, 0, 0, 0),
(52, 'Euro', 'EUR', '€', 1, 1, 0, 0, 0),
(53, 'Falkland Islands Pound', 'FKP', '£', 1, 1, 0, 0, 0),
(54, 'Fijian Dollar', 'FJD', 'FJ$', 1, 1, 0, 0, 0),
(55, 'Gambian Dalasi', 'GMD', 'D', 1, 1, 0, 0, 0),
(56, 'Georgian Lari', 'GEL', 'ლ', 1, 1, 0, 0, 0),
(57, 'German Mark', 'DEM', 'DM', 1, 1, 0, 0, 0),
(58, 'Ghanaian Cedi', 'GHS', 'GH₵', 1, 1, 0, 0, 0),
(59, 'Gibraltar Pound', 'GIP', '£', 1, 1, 0, 0, 0),
(60, 'Greek Drachma', 'GRD', '₯, Δρχ, Δρ', 1, 1, 0, 0, 0),
(61, 'Guatemalan Quetzal', 'GTQ', 'Q', 1, 1, 0, 0, 0),
(62, 'Guinean Franc', 'GNF', 'FG', 1, 1, 0, 0, 0),
(63, 'Guyanaese Dollar', 'GYD', '$', 1, 1, 0, 0, 0),
(64, 'Haitian Gourde', 'HTG', 'G', 1, 1, 0, 0, 0),
(65, 'Honduran Lempira', 'HNL', 'L', 1, 1, 0, 0, 0),
(66, 'Hong Kong Dollar', 'HKD', '$', 1, 1, 0, 0, 0),
(67, 'Hungarian Forint', 'HUF', 'Ft', 1, 1, 0, 0, 0),
(68, 'Icelandic KrÃ³na', 'ISK', 'kr', 1, 1, 0, 0, 0),
(69, 'Indian Rupee', 'INR', '₹', 1, 1, 1, 0, 0),
(70, 'Indonesian Rupiah', 'IDR', 'Rp', 1, 1, 0, 0, 0),
(71, 'Iranian Rial', 'IRR', '﷼', 1, 1, 0, 0, 0),
(72, 'Iraqi Dinar', 'IQD', 'د.ع', 1, 1, 0, 0, 0),
(73, 'Israeli New Sheqel', 'ILS', '₪', 1, 1, 0, 0, 0),
(74, 'Italian Lira', 'ITL', 'L,£', 1, 1, 0, 0, 0),
(75, 'Jamaican Dollar', 'JMD', 'J$', 1, 1, 0, 0, 0),
(76, 'Japanese Yen', 'JPY', '¥', 1, 1, 0, 0, 0),
(77, 'Jordanian Dinar', 'JOD', 'ا.د', 1, 1, 0, 0, 0),
(78, 'Kazakhstani Tenge', 'KZT', 'лв', 1, 1, 0, 0, 0),
(79, 'Kenyan Shilling', 'KES', 'KSh', 1, 1, 0, 0, 0),
(80, 'Kuwaiti Dinar', 'KWD', 'ك.د', 1, 1, 0, 0, 0),
(81, 'Kyrgystani Som', 'KGS', 'лв', 1, 1, 0, 0, 0),
(82, 'Laotian Kip', 'LAK', '₭', 1, 1, 0, 0, 0),
(83, 'Latvian Lats', 'LVL', 'Ls', 0, 0, 0, 0, 0),
(84, 'Lebanese Pound', 'LBP', '£', 1, 1, 0, 0, 0),
(85, 'Lesotho Loti', 'LSL', 'L', 1, 1, 0, 0, 0),
(86, 'Liberian Dollar', 'LRD', '$', 1, 1, 0, 0, 0),
(87, 'Libyan Dinar', 'LYD', 'د.ل', 1, 1, 0, 0, 0),
(88, 'Lithuanian Litas', 'LTL', 'Lt', 0, 0, 0, 0, 0),
(89, 'Macanese Pataca', 'MOP', '$', 1, 1, 0, 0, 0),
(90, 'Macedonian Denar', 'MKD', 'ден', 1, 1, 0, 0, 0),
(91, 'Malagasy Ariary', 'MGA', 'Ar', 1, 1, 0, 0, 0),
(92, 'Malawian Kwacha', 'MWK', 'MK', 1, 1, 0, 0, 0),
(93, 'Malaysian Ringgit', 'MYR', 'RM', 1, 1, 0, 0, 0),
(94, 'Maldivian Rufiyaa', 'MVR', 'Rf', 1, 1, 0, 0, 0),
(95, 'Mauritanian Ouguiya', 'MRO', 'MRU', 1, 1, 0, 0, 0),
(96, 'Mauritian Rupee', 'MUR', '₨', 1, 1, 0, 0, 0),
(97, 'Mexican Peso', 'MXN', '$', 1, 1, 0, 0, 0),
(98, 'Moldovan Leu', 'MDL', 'L', 1, 1, 0, 0, 0),
(99, 'Mongolian Tugrik', 'MNT', '₮', 1, 1, 0, 0, 0),
(100, 'Moroccan Dirham', 'MAD', 'MAD', 1, 1, 0, 0, 0),
(101, 'Mozambican Metical', 'MZM', 'MT', 1, 1, 0, 0, 0),
(102, 'Myanmar Kyat', 'MMK', 'K', 1, 1, 0, 0, 0),
(103, 'Namibian Dollar', 'NAD', '$', 1, 1, 0, 0, 0),
(104, 'Nepalese Rupee', 'NPR', '₨', 1, 1, 0, 0, 0),
(105, 'Netherlands Antillean Guilder', 'ANG', 'ƒ', 1, 1, 0, 0, 0),
(106, 'New Taiwan Dollar', 'TWD', '$', 1, 1, 0, 0, 0),
(107, 'New Zealand Dollar', 'NZD', '$', 1, 1, 0, 0, 0),
(108, 'Nicaraguan CÃ³rdoba', 'NIO', 'C$', 1, 1, 0, 0, 0),
(109, 'Nigerian Naira', 'NGN', '₦', 1, 1, 0, 0, 1),
(110, 'North Korean Won', 'KPW', '₩', 0, 0, 0, 0, 0),
(111, 'Norwegian Krone', 'NOK', 'kr', 1, 1, 0, 0, 0),
(112, 'Omani Rial', 'OMR', '.ع.ر', 0, 0, 0, 0, 0),
(113, 'Pakistani Rupee', 'PKR', '₨', 1, 1, 0, 0, 0),
(114, 'Panamanian Balboa', 'PAB', 'B/.', 1, 1, 0, 0, 0),
(115, 'Papua New Guinean Kina', 'PGK', 'K', 1, 1, 0, 0, 0),
(116, 'Paraguayan Guarani', 'PYG', '₲', 1, 1, 0, 0, 0),
(117, 'Peruvian Nuevo Sol', 'PEN', 'S/.', 1, 1, 0, 0, 0),
(118, 'Philippine Peso', 'PHP', '₱', 1, 1, 0, 0, 0),
(119, 'Polish Zloty', 'PLN', 'zł', 1, 1, 0, 0, 0),
(120, 'Qatari Rial', 'QAR', 'ق.ر', 1, 1, 0, 0, 0),
(121, 'Romanian Leu', 'RON', 'lei', 1, 1, 0, 0, 0),
(122, 'Russian Ruble', 'RUB', '₽', 1, 1, 0, 0, 0),
(123, 'Rwandan Franc', 'RWF', 'FRw', 1, 1, 0, 0, 0),
(124, 'Salvadoran ColÃ³n', 'SVC', '₡', 0, 0, 0, 0, 0),
(125, 'Samoan Tala', 'WST', 'SAT', 1, 1, 0, 0, 0),
(126, 'Saudi Riyal', 'SAR', '﷼', 1, 1, 0, 0, 0),
(127, 'Serbian Dinar', 'RSD', 'din', 1, 1, 0, 0, 0),
(128, 'Seychellois Rupee', 'SCR', 'SRe', 1, 1, 0, 0, 0),
(129, 'Sierra Leonean Leone', 'SLL', 'Le', 1, 1, 0, 0, 0),
(130, 'Singapore Dollar', 'SGD', '$', 1, 1, 0, 0, 0),
(131, 'Slovak Koruna', 'SKK', 'Sk', 1, 1, 0, 0, 0),
(132, 'Solomon Islands Dollar', 'SBD', 'Si$', 1, 1, 0, 0, 0),
(133, 'Somali Shilling', 'SOS', 'Sh.so.', 1, 1, 0, 0, 0),
(134, 'South African Rand', 'ZAR', 'R', 1, 1, 0, 0, 0),
(135, 'South Korean Won', 'KRW', '₩', 1, 1, 0, 0, 0),
(136, 'Special Drawing Rights', 'XDR', 'SDR', 1, 1, 0, 0, 0),
(137, 'Sri Lankan Rupee', 'LKR', 'Rs', 1, 1, 0, 0, 0),
(138, 'St. Helena Pound', 'SHP', '£', 1, 1, 0, 0, 0),
(139, 'Sudanese Pound', 'SDG', '.س.ج', 1, 1, 0, 0, 0),
(140, 'Surinamese Dollar', 'SRD', '$', 1, 1, 0, 0, 0),
(141, 'Swazi Lilangeni', 'SZL', 'E', 1, 1, 0, 0, 0),
(142, 'Swedish Krona', 'SEK', 'kr', 1, 1, 0, 0, 0),
(143, 'Swiss Franc', 'CHF', 'CHf', 1, 1, 0, 0, 0),
(144, 'Syrian Pound', 'SYP', 'LS', 0, 0, 0, 0, 0),
(145, 'São Tomé and Príncipe Dobra', 'STD', 'Db', 1, 1, 0, 0, 0),
(146, 'Tajikistani Somoni', 'TJS', 'SM', 1, 1, 0, 0, 0),
(147, 'Tanzanian Shilling', 'TZS', 'TSh', 1, 1, 0, 0, 0),
(148, 'Thai Baht', 'THB', '฿', 1, 1, 0, 0, 0),
(149, 'Tongan pa\'anga', 'TOP', '$', 1, 1, 0, 0, 0),
(150, 'Trinidad & Tobago Dollar', 'TTD', '$', 1, 1, 0, 0, 0),
(151, 'Tunisian Dinar', 'TND', 'ت.د', 1, 1, 0, 0, 0),
(152, 'Turkish Lira', 'TRY', '₺', 1, 1, 0, 1, 0),
(153, 'Turkmenistani Manat', 'TMT', 'T', 1, 1, 0, 0, 0),
(154, 'Ugandan Shilling', 'UGX', 'USh', 1, 1, 0, 0, 0),
(155, 'Ukrainian Hryvnia', 'UAH', '₴', 1, 1, 0, 0, 0),
(156, 'United Arab Emirates Dirham', 'AED', 'إ.د', 1, 1, 0, 0, 0),
(157, 'Uruguayan Peso', 'UYU', '$', 1, 1, 0, 0, 0),
(158, 'Afghan Afghani', 'AFA', '؋', 1, 1, 0, 0, 0),
(159, 'Uzbekistan Som', 'UZS', 'лв', 1, 1, 0, 0, 0),
(160, 'Vanuatu Vatu', 'VUV', 'VT', 1, 1, 0, 0, 0),
(161, 'Venezuelan BolÃvar', 'VEF', 'Bs', 0, 0, 0, 0, 0),
(162, 'Vietnamese Dong', 'VND', '₫', 1, 1, 0, 0, 0),
(163, 'Yemeni Rial', 'YER', '﷼', 1, 1, 0, 0, 0),
(164, 'Zambian Kwacha', 'ZMK', 'ZK', 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `enrollment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_date` int(255) DEFAULT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `course_id` int(255) DEFAULT NULL,
  `parent_id` int(255) NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `description` longtext,
  `likes` longtext,
  `dislikes` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_settings`
--

CREATE TABLE `frontend_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `frontend_settings`
--

INSERT INTO `frontend_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'banner_title', 'Start learning from the world’s pro Instructors', '2023-10-31 11:08:12', '2024-05-13 05:51:22'),
(2, 'banner_sub_title', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.', '2023-10-31 11:08:12', '2024-05-13 05:51:22'),
(4, 'about_us', '<div>Limitless learning at your fingertips</div><div><br></div><div>Limitless learning at your fingertipsAdvertising a busines online includes assembling the they awesome site. Having the most well-planned on to the our SEO services keep you on the top a business Having the moston to the online.</div><div><br></div><div><br></div><div><br></div><div>Advertising a busines online includes assembling the they awesome site.</div><div><br></div><div><br></div><div>Range including technical skills</div><div>Range including technical skills</div><div>Range including technical skills</div><div><br></div>', '2023-10-31 11:08:12', '2024-05-13 05:51:22'),
(10, 'terms_and_condition', '<h2>Terms and Condition</h2>', '2023-10-31 11:08:12', '2024-05-13 05:51:22'),
(11, 'privacy_policy', '<p></p><p></p><h2><span xss=\"removed\">Privacy Policy</span></h2>', '2023-10-31 11:08:12', '2024-05-13 05:51:22'),
(13, 'theme', 'default', '2023-10-31 11:08:12', '2023-10-31 11:08:12'),
(14, 'cookie_note', 'This website uses cookies to personalize content and analyse traffic in order to offer you a better experience.', '2023-10-31 11:08:12', '2024-05-13 05:51:22'),
(15, 'cookie_status', 'active', '2023-10-31 11:08:12', '2024-05-13 05:51:22'),
(16, 'cookie_policy', '<h2 class=\"\">Cookie policy</h2><ol><li>Cookies are small text files that can be used by websites to make a user\'s experience more efficient.</li><li>The law states that we can store cookies on your device if they are strictly necessary for the operation of this site. For all other types of cookies we need your permission.</li><li>This site uses different types of cookies. Some cookies are placed by third party services that appear on our pages.</li></ol>', '2023-10-31 11:08:12', '2024-05-13 05:51:22'),
(17, 'banner_image', 'assets/upload/banner_image/banner-image-1717045923.png', '2023-10-31 11:08:12', '2024-05-29 23:12:03'),
(18, 'light_logo', 'assets/upload/light_logo/light-logo-1716985414.png', '2023-10-31 11:08:12', '2024-05-29 06:23:34'),
(19, 'dark_logo', 'assets/upload/dark_logo/dark-logo-1716985438.png', '2023-10-31 11:08:12', '2024-05-29 06:23:58'),
(20, 'small_logo', 'assets/upload/small_logo/small-logo-1712661659.jpg', '2023-10-31 11:08:12', '2024-04-09 05:20:59'),
(21, 'favicon', 'assets/upload/favicon/favicon-1716985458.png', '2023-10-31 11:08:12', '2024-05-29 06:24:18'),
(22, 'recaptcha_status', '0', '2023-10-31 11:08:12', '2023-11-01 23:27:24'),
(23, 'recaptcha_secretkey', 'Valid-secret-key', '2023-10-31 11:08:12', '2023-11-01 23:27:24'),
(24, 'recaptcha_sitekey', 'Valid-site-key', '2023-10-31 11:08:12', '2023-11-01 23:27:24'),
(25, 'refund_policy', '<h2><span xss=\"removed\">Refund Policy</span></h2>', '2023-10-31 11:08:12', '2024-05-13 05:51:22'),
(26, 'facebook', 'https://facebook.com', '2023-10-31 11:08:12', '2024-05-13 05:51:22'),
(27, 'twitter', 'https://twitter.com', '2023-10-31 11:08:12', '2024-05-13 05:51:22'),
(28, 'linkedin', 'https://linkedin.com', '2023-10-31 11:08:12', '2024-05-13 05:51:22'),
(31, 'blog_page_title', 'Where possibilities begin', '2023-10-31 11:08:12', '2023-10-31 11:08:12'),
(32, 'blog_page_subtitle', 'We’re a leading marketplace platform for learning and teaching online. Explore some of our most popular content and learn something new.', '2023-10-31 11:08:12', '2023-10-31 11:08:12'),
(33, 'blog_page_banner', 'blog-page.png', '2023-10-31 11:08:12', '2023-10-31 11:08:12'),
(34, 'instructors_blog_permission', '1', '2023-10-31 11:08:12', '2023-12-07 00:28:58'),
(35, 'blog_visibility_on_the_home_page', '1', '2023-10-31 11:08:12', '2023-12-07 00:28:58'),
(37, 'website_faqs', '[{\"question\":\"How to create an account?\",\"answer\":\"Interactively procrastinate high-payoff content without backward-compatible data. Quickly to cultivate optimal processes and tactical architectures. For The Completely iterate covalent strategic.\"},{\"question\":\"Do you provide any support for this kit?\",\"answer\":\"Interactively procrastinate high-payoff content without backward-compatible data. Quickly to cultivate optimal processes and tactical architectures. For The Completely iterate covalent strategic.\"},{\"question\":\"How to create an account?\",\"answer\":\"Interactively procrastinate high-payoff content without backward-compatible data. Quickly to cultivate optimal processes and tactical architectures. For The Completely iterate covalent strategic.\"},{\"question\":\"How long do you provide support?\",\"answer\":\"Interactively procrastinate high-payoff content without backward-compatible data. Quickly to cultivate optimal processes and tactical architectures. For The Completely iterate covalent strategic.\"}]', '2023-10-31 11:08:12', '2023-12-03 23:40:04'),
(38, 'motivational_speech', '{\"0\":{\"title\":\"Jenny Murtagh\",\"designation\":\"Graphic Design\",\"description\":\"Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even for slightly believable randomised words.\",\"image\":\"I6zvV1Mr30YUhLfJgwje.png\"},\"1\":{\"title\":\"Jenny Murtagh\",\"designation\":\"Graphic Design\",\"description\":\"Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even for slightly believable randomised words.\",\"image\":\"ZLfkhGame7sYQvqKxD0J.png\"},\"3\":{\"title\":\"Jenny Murtagh\",\"designation\":\"Graphic Design\",\"description\":\"Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even for slightly believable randomised words.\",\"image\":\"xBYkXnfvmPiU3j0CzME1.png\"}}', '2023-10-31 11:08:12', '2023-11-12 23:46:29'),
(39, 'home_page', NULL, '2023-10-31 11:08:12', '2024-05-29 23:14:06'),
(40, 'contact_info', '{\"email\":\"creativeitem@example.com\",\"phone\":\"67564345676\",\"address\":\"629 12th St, Modesto\",\"office_hours\":\"8\",\"location\":\"40.689880, -74.045203\"}', '2023-10-31 11:08:12', '2024-05-28 05:22:21'),
(41, 'promo_video_provider', 'youtube', '2023-10-31 11:08:12', '2024-05-13 05:51:22'),
(42, 'promo_video_link', 'https://youtu.be/4QCaXTOwigw?si=NsFeBQhWNZC859-l', '2023-10-31 11:08:12', '2024-05-13 05:51:22'),
(43, 'mobile_app_link', '', '2023-10-31 11:08:12', '2023-12-07 00:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_settings`
--

CREATE TABLE `home_page_settings` (
  `id` int(11) NOT NULL,
  `home_page_id` int(11) DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_page_settings`
--

INSERT INTO `home_page_settings` (`id`, `home_page_id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 14, 'cooking', '{\"title\":\"Become An Instructor\",\"description\":\"Training programs can bring you a super exciting experience of learning through online! You never face any negative experience while enjoying your classes.\\r\\n\\r\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate ad litora torquent Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate ad litora torquent per conubi himenaeos Awesome site Lorem Ipsum has been the industry\'s standard dummy text ever since the unknown printer took a galley of type and scrambled.\\r\\n\\r\\nConsectetur adipiscing elit. Nunc vulputate ad litora torquent per conubi himenaeos Awesome site Lorem Ipsum has been the industry\'s standard dummy text ever since.\",\"video_url\":\"https:\\\\\\/\\\\\\/www.youtube.com\\\\\\/watch?v=i-rv4VQiBko\",\"image\":\"instructor_image.jpg\"}', '2024-05-15 09:43:54', '2024-05-18 05:41:24'),
(3, 15, 'university', '{\"image\":\"6645d6bfb089f.webp\",\"faq_image\":\"6645d6dde24a8.webp\"}', '2024-05-16 02:31:00', '2024-05-20 00:49:13'),
(4, 17, 'development', '{\"title\":\"Leading the Way in Software Development\",\"description\":\"Far far away, behind the word mountains, far from the away countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.\\r\\nTraining programs can bring you a super exciting experience of learning through online! You never face any negative experience while enjoying your classes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate ad litora torquent\",\"video_url\":null,\"image\":\"664896388fa23.soft-dev-banner.webp\"}', '2024-05-18 05:40:13', '2024-05-18 08:08:06'),
(5, 13, 'kindergarden', '{\"title\":\"Creating A Community Of Life Long Learners\",\"description\":\"Training programs can bring you a super exciting experience of learning through online! You never face any negative experience while enjoying your classes.\\r\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate ad litora torquent\\r\\nTraining programs can bring you a super exciting experience of learning through online! You never face any negative experience while enjoying your classes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate ad litora torquent\",\"video_url\":null,\"image\":\"6648b505c1c03.community-banner.webp\"}', '2024-05-18 08:02:45', '2024-05-18 08:07:59'),
(6, 18, 'marketplace', '{\"instructor\":{\"title\":\"Become An Instructors\",\"description\":\"Training programs can bring you a super exciting experience of learning through online! You never face any negative experience while enjoying your classes.\\r\\n\\r\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate ad litora torquent Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate ad litora torquent per conubi himenaeos Awesome site Lorem Ipsum has been the industry\'s standard dummy text ever since the unknown printer took a galley of type and scrambled.\\r\\n\\r\\nConsectetur adipiscing elit. Nunc vulputate ad litora torquent per conubi himenaeos Awesome site Lorem Ipsum has been the industry\'s standard dummy text ever sinces.\",\"video_url\":\"https:\\/\\/www.youtube.com\\/watch?v=i-rv4VQiBko\",\"image\":\"6649b445b3b52.video-area-banner1.webp\"},\"slider\":[{\"banner_title\":\"LEARN FROM TODAY\",\"banner_description\":\"Academy Starter is a community for creative people\"},{\"banner_title\":\"LEARN FROM TODAY\",\"banner_description\":\"Academy Starter is a community for creative people\"},{\"banner_title\":\"LEARN FROM TODAY\",\"banner_description\":\"Academy Starter is a community for creative people\"},{\"banner_title\":\"LEARN FROM TODAY\",\"banner_description\":\"Academy Starter is a community for creative people\"}]}', '2024-05-18 22:55:44', '2024-05-20 01:22:25'),
(7, 19, 'meditation', '{\"big_image\":\"664b020ed2bbb.png\",\"meditation\":[{\"banner_title\":\"Balance Body & Mind\",\"image\":\"664b07fa650dd.yoga-benefit-1.svg\",\"banner_description\":\"It is a long established fact that a reader will be distracted by the readable content.\"},{\"banner_title\":\"Balance Body & Minds\",\"image\":\"664b08157c7ed.yoga-benefit-2.svg\",\"banner_description\":\"It is a long established fact that a reader will be distracted by the readable content.\"},{\"banner_title\":\"Balance Body & Mind\",\"image\":\"664b08157cab8.yoga-benefit-3.svg\",\"banner_description\":\"It is a long established fact that a reader will be distracted by the readable content.\"},{\"banner_title\":\"Balance Body & Mind\",\"image\":\"664b08157d2be.yoga-benefit-4.svg\",\"banner_description\":\"It is a long established fact that a reader will be distracted by the readable content.\"},{\"banner_title\":\"Balance Body & Mind\",\"image\":\"664b08263ba18.yoga-benefit-5.svg\",\"banner_description\":\"It is a long established fact that a reader will be distracted by the readable content.\"},{\"banner_title\":\"Balance Body & Minddf\",\"image\":\"664b08263bcca.yoga-benefit-6.svg\",\"banner_description\":\"It is a long established fact that a reader will be distracted by the readable content.\"}]}', '2024-05-19 23:54:56', '2024-05-20 02:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_reviews`
--

CREATE TABLE `instructor_reviews` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `instructor_id` int(255) DEFAULT NULL,
  `rating` varchar(244) DEFAULT NULL,
  `review` longtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `direction`, `created_at`, `updated_at`) VALUES
(3, 'English', 'ltr', '2024-04-08 10:42:26', '2024-04-09 01:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `language_phrases`
--

CREATE TABLE `language_phrases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phrase` text COLLATE utf8mb4_unicode_ci,
  `translated` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_phrases`
--

INSERT INTO `language_phrases` (`id`, `language_id`, `phrase`, `translated`, `created_at`, `updated_at`) VALUES
(1, 3, 'Multi language setting', 'Multi language setting', '2024-04-09 04:58:22', NULL),
(2, 3, 'Edit Phrase to ____', 'Edit Phrase to ____', '2024-04-09 04:58:22', NULL),
(3, 3, 'Import all phrases from english', 'Import all phrases from english', '2024-04-09 04:58:22', NULL),
(4, 3, 'Back', 'Back', '2024-04-09 04:58:22', NULL),
(5, 3, 'Phrase updated', 'Phrase updated', '2024-04-09 04:58:22', NULL),
(6, 3, 'Main Menu', 'Main Menu', '2024-04-09 04:58:22', NULL),
(7, 3, 'Dashboard', 'Dashboard', '2024-04-09 04:58:22', NULL),
(8, 3, 'Category', 'Category', '2024-04-09 04:58:22', NULL),
(9, 3, 'Course', 'Course', '2024-04-09 04:58:22', NULL),
(10, 3, 'Manage Courses', 'Manage Courses', '2024-04-09 04:58:22', '2024-05-22 00:21:15'),
(11, 3, 'Add New Course', 'Add New Course', '2024-04-09 04:58:22', NULL),
(12, 3, 'Student enrollment', 'Student enrollment', '2024-04-09 04:58:22', NULL),
(13, 3, 'Course enrollment', 'Course enrollment', '2024-04-09 04:58:22', '2024-05-22 00:21:12'),
(14, 3, 'Enrollments', 'Enrollments', '2024-04-09 04:58:22', '2024-05-22 00:21:06'),
(15, 3, 'Enroll student', 'Enroll student', '2024-04-09 04:58:22', '2024-05-22 00:21:10'),
(16, 3, 'Payment Report', 'Payment Report', '2024-04-09 04:58:22', NULL),
(17, 3, 'Admin Revenue', 'Admin Revenue', '2024-04-09 04:58:22', NULL),
(18, 3, 'Instructor Revenue', 'Instructor Revenue', '2024-04-09 04:58:22', NULL),
(19, 3, 'Payment History', 'Payment History', '2024-04-09 04:58:22', NULL),
(20, 3, 'Users', 'Users', '2024-04-09 04:58:22', NULL),
(21, 3, 'Admin', 'Admin', '2024-04-09 04:58:22', NULL),
(22, 3, 'Manage Admin', 'Manage Admin', '2024-04-09 04:58:22', NULL),
(23, 3, 'Add New Admin', 'Add New Admin', '2024-04-09 04:58:22', NULL),
(24, 3, 'Instructor', 'Instructor', '2024-04-09 04:58:22', NULL),
(25, 3, 'Manage Instructors', 'Manage Instructors', '2024-04-09 04:58:22', NULL),
(26, 3, 'Add new Instructor', 'Add new Instructor', '2024-04-09 04:58:22', NULL),
(27, 3, 'Instructor Payout', 'Instructor Payout', '2024-04-09 04:58:23', NULL),
(28, 3, 'Instructor Setting', 'Instructor Setting', '2024-04-09 04:58:23', NULL),
(29, 3, 'Application', 'Application', '2024-04-09 04:58:23', NULL),
(30, 3, 'Student', 'Student', '2024-04-09 04:58:23', NULL),
(31, 3, 'Manage Students', 'Manage Students', '2024-04-09 04:58:23', NULL),
(32, 3, 'Add new Student', 'Add new Student', '2024-04-09 04:58:23', NULL),
(33, 3, 'Message', 'Message', '2024-04-09 04:58:23', NULL),
(34, 3, 'Newsletter', 'Newsletter', '2024-04-09 04:58:23', NULL),
(35, 3, 'All', 'All', '2024-04-09 04:58:23', NULL),
(36, 3, 'Subscribed user', 'Subscribed user', '2024-04-09 04:58:23', NULL),
(37, 3, 'Contacts', 'Contacts', '2024-04-09 04:58:23', NULL),
(38, 3, 'Offline payments', 'Offline payments', '2024-04-09 04:58:23', NULL),
(39, 3, 'Coupons', 'Coupons', '2024-04-09 04:58:23', NULL),
(40, 3, 'Blogs', 'Blogs', '2024-04-09 04:58:23', NULL),
(41, 3, 'Blog', 'Blog', '2024-04-09 04:58:23', NULL),
(42, 3, 'Pending blogs', 'Pending blogs', '2024-04-09 04:58:23', NULL),
(43, 3, 'Blog category', 'Blog category', '2024-04-09 04:58:23', NULL),
(44, 3, 'Blog settings', 'Blog settings', '2024-04-09 04:58:23', NULL),
(45, 3, 'Settings', 'Settings', '2024-04-09 04:58:23', NULL),
(46, 3, 'System Settings', 'System Settings', '2024-04-09 04:58:23', NULL),
(47, 3, 'Website Settings', 'Website Settings', '2024-04-09 04:58:23', NULL),
(48, 3, 'Payment Settings', 'Payment Settings', '2024-04-09 04:58:23', NULL),
(49, 3, 'Manage Language', 'Manage Language', '2024-04-09 04:58:23', NULL),
(50, 3, 'Live Class Settings', 'Live Class Settings', '2024-04-09 04:58:23', NULL),
(51, 3, 'SMTP Settings', 'SMTP Settings', '2024-04-09 04:58:23', NULL),
(52, 3, 'Certificate Settings', 'Certificate Settings', '2024-04-09 04:58:23', NULL),
(53, 3, 'Open AI Settings', 'Open AI Settings', '2024-04-09 04:58:23', NULL),
(54, 3, 'Home Page Builder', 'Home Page Builder', '2024-04-09 04:58:23', NULL),
(55, 3, 'SEO Settings', 'SEO Settings', '2024-04-09 04:58:23', NULL),
(56, 3, 'About', 'About', '2024-04-09 04:58:23', NULL),
(57, 3, 'Manage Profile', 'Manage Profile', '2024-04-09 04:58:23', NULL),
(58, 3, 'Close', 'Close', '2024-04-09 04:58:23', NULL),
(59, 3, 'Are you sure?', 'Are you sure?', '2024-04-09 04:58:23', NULL),
(60, 3, 'You can\'t bring it back!', 'You can\'t bring it back!', '2024-04-09 04:58:23', NULL),
(61, 3, 'Cancel', 'Cancel', '2024-04-09 04:58:23', NULL),
(62, 3, 'Confirm', 'Confirm', '2024-04-09 04:58:23', NULL),
(63, 3, 'Loading', 'Loading', '2024-04-09 04:58:23', NULL),
(64, 3, 'AI Assistant', 'AI Assistant', '2024-04-09 04:58:23', NULL),
(65, 3, 'Select your service', 'Select your service', '2024-04-09 04:58:23', NULL),
(66, 3, 'Course title', 'Course title', '2024-04-09 04:58:23', NULL),
(67, 3, 'Course short description', 'Course short description', '2024-04-09 04:58:23', NULL),
(68, 3, 'Course long description', 'Course long description', '2024-04-09 04:58:23', NULL),
(69, 3, 'Course requirements', 'Course requirements', '2024-04-09 04:58:23', NULL),
(70, 3, 'Course outcomes', 'Course outcomes', '2024-04-09 04:58:23', NULL),
(71, 3, 'Course faq', 'Course faq', '2024-04-09 04:58:23', NULL),
(72, 3, 'Course seo tags', 'Course seo tags', '2024-04-09 04:58:23', NULL),
(73, 3, 'Course lesson text', 'Course lesson text', '2024-04-09 04:58:23', NULL),
(74, 3, 'Course certificate text', 'Course certificate text', '2024-04-09 04:58:23', NULL),
(75, 3, 'Course quiz text', 'Course quiz text', '2024-04-09 04:58:23', NULL),
(76, 3, 'Course blog title', 'Course blog title', '2024-04-09 04:58:23', NULL),
(77, 3, 'Course blog post', 'Course blog post', '2024-04-09 04:58:23', NULL),
(78, 3, 'Course thumbnail', 'Course thumbnail', '2024-04-09 04:58:23', NULL),
(79, 3, 'Enter your keyword', 'Enter your keyword', '2024-04-09 04:58:23', NULL),
(80, 3, 'Language', 'Language', '2024-04-09 04:58:23', NULL),
(81, 3, 'Generate', 'Generate', '2024-04-09 04:58:23', NULL),
(82, 3, 'Generating', 'Generating', '2024-04-09 04:58:23', NULL),
(83, 3, 'Your images', 'Your images', '2024-04-09 04:58:23', NULL),
(84, 3, 'Generated text', 'Generated text', '2024-04-09 04:58:23', NULL),
(85, 3, 'Copy', 'Copy', '2024-04-09 04:58:23', NULL),
(86, 3, 'Copied', 'Copied', '2024-04-09 04:58:23', NULL),
(87, 3, 'Just Now', 'Just Now', '2024-04-09 04:58:23', NULL),
(88, 3, 'Success !', 'Success !', '2024-04-09 04:58:23', NULL),
(89, 3, 'Attention !', 'Attention !', '2024-04-09 04:58:23', NULL),
(90, 3, 'An Error Occurred !', 'An Error Occurred !', '2024-04-09 04:58:23', NULL),
(91, 3, 'Enter your keywords', 'Enter your keywords', '2024-04-09 04:58:23', NULL),
(92, 4, 'Multi language setting', 'Multi language setting', '2024-04-09 04:58:24', NULL),
(93, 4, 'Edit Phrase to ____', 'Edit Phrase to ____', '2024-04-09 04:58:24', '2024-04-10 03:42:41'),
(94, 4, 'Import all phrases from english', 'Import all phrases from english', '2024-04-09 04:58:24', NULL),
(95, 4, 'Back', 'Back', '2024-04-09 04:58:24', NULL),
(96, 4, 'Phrase updated', 'Phrase updated', '2024-04-09 04:58:24', NULL),
(97, 4, 'Main Menu', 'Main Menu', '2024-04-09 04:58:24', NULL),
(98, 4, 'Dashboard', 'Dashboard', '2024-04-09 04:58:24', NULL),
(99, 4, 'Category', 'Category', '2024-04-09 04:58:24', NULL),
(100, 4, 'Course', 'Course', '2024-04-09 04:58:24', NULL),
(101, 4, 'Manage Courses', 'Manage Courses', '2024-04-09 04:58:24', NULL),
(102, 4, 'Add New Course', 'Add New Course', '2024-04-09 04:58:24', NULL),
(103, 4, 'Student enrollment', 'Student enrollment', '2024-04-09 04:58:24', NULL),
(104, 4, 'Course enrollment', 'Course enrollment', '2024-04-09 04:58:24', NULL),
(105, 4, 'Enrollments', 'Enrollments', '2024-04-09 04:58:24', NULL),
(106, 4, 'Enroll student', 'Enroll student', '2024-04-09 04:58:24', NULL),
(107, 4, 'Payment Report', 'Payment Report', '2024-04-09 04:58:24', NULL),
(108, 4, 'Admin Revenue', 'Admin Revenue', '2024-04-09 04:58:24', NULL),
(109, 4, 'Instructor Revenue', 'Instructor Revenue', '2024-04-09 04:58:24', NULL),
(110, 4, 'Payment History', 'Payment History', '2024-04-09 04:58:24', NULL),
(111, 4, 'Users', 'Users', '2024-04-09 04:58:24', NULL),
(112, 4, 'Admin', 'Admin', '2024-04-09 04:58:24', NULL),
(113, 4, 'Manage Admin', 'Manage Admin', '2024-04-09 04:58:24', NULL),
(114, 4, 'Add New Admin', 'Add New Admin', '2024-04-09 04:58:24', NULL),
(115, 4, 'Instructor', 'Instructor', '2024-04-09 04:58:24', NULL),
(116, 4, 'Manage Instructors', 'Manage Instructors', '2024-04-09 04:58:24', NULL),
(117, 4, 'Add new Instructor', 'Add new Instructor', '2024-04-09 04:58:24', NULL),
(118, 4, 'Instructor Payout', 'Instructor Payout', '2024-04-09 04:58:24', NULL),
(119, 4, 'Instructor Setting', 'Instructor Setting', '2024-04-09 04:58:24', NULL),
(120, 4, 'Application', 'Application', '2024-04-09 04:58:24', '2024-04-09 04:58:29'),
(121, 4, 'Student', 'Student', '2024-04-09 04:58:24', NULL),
(122, 4, 'Manage Students', 'Manage Students', '2024-04-09 04:58:24', NULL),
(123, 4, 'Add new Student', 'Add new Student', '2024-04-09 04:58:24', NULL),
(124, 4, 'Message', 'Message', '2024-04-09 04:58:24', NULL),
(125, 4, 'Newsletter', 'Newsletter', '2024-04-09 04:58:24', NULL),
(126, 4, 'All', 'All', '2024-04-09 04:58:24', NULL),
(127, 4, 'Subscribed user', 'Subscribed user', '2024-04-09 04:58:24', NULL),
(128, 4, 'Contacts', 'Contacts', '2024-04-09 04:58:24', NULL),
(129, 4, 'Offline payments', 'Offline payments', '2024-04-09 04:58:24', NULL),
(130, 4, 'Coupons', 'Coupons', '2024-04-09 04:58:24', NULL),
(131, 4, 'Blogs', 'Blogs', '2024-04-09 04:58:24', NULL),
(132, 4, 'Blog', 'Blog', '2024-04-09 04:58:24', NULL),
(133, 4, 'Pending blogs', 'Pending blogs', '2024-04-09 04:58:24', NULL),
(134, 4, 'Blog category', 'Blog category', '2024-04-09 04:58:24', NULL),
(135, 4, 'Blog settings', 'Blog settings', '2024-04-09 04:58:24', NULL),
(136, 4, 'Settings', 'Settings', '2024-04-09 04:58:24', NULL),
(137, 4, 'System Settings', 'System Settings', '2024-04-09 04:58:24', NULL),
(138, 4, 'Website Settings', 'Website Settings', '2024-04-09 04:58:24', NULL),
(139, 4, 'Payment Settings', 'Payment Settings', '2024-04-09 04:58:24', NULL),
(140, 4, 'Manage Language', 'Manage Language', '2024-04-09 04:58:24', NULL),
(141, 4, 'Live Class Settings', 'Live Class Settings', '2024-04-09 04:58:24', NULL),
(142, 4, 'SMTP Settings', 'SMTP Settings', '2024-04-09 04:58:24', NULL),
(143, 4, 'Certificate Settings', 'Certificate Settings', '2024-04-09 04:58:24', NULL),
(144, 4, 'Open AI Settings', 'Open AI Settings', '2024-04-09 04:58:24', NULL),
(145, 4, 'Home Page Builder', 'Home Page Builder', '2024-04-09 04:58:24', NULL),
(146, 4, 'SEO Settings', 'SEO Settings', '2024-04-09 04:58:24', NULL),
(147, 4, 'About', 'About', '2024-04-09 04:58:24', NULL),
(148, 4, 'Manage Profile', 'Manage Profile', '2024-04-09 04:58:24', NULL),
(149, 4, 'Close', 'Close', '2024-04-09 04:58:24', NULL),
(150, 4, 'Are you sure?', 'Are you sure?', '2024-04-09 04:58:24', NULL),
(151, 4, 'You can\'t bring it back!', 'You can\'t bring it back!', '2024-04-09 04:58:24', NULL),
(152, 4, 'Cancel', 'Cancel', '2024-04-09 04:58:24', NULL),
(153, 4, 'Confirm', 'Confirm', '2024-04-09 04:58:24', NULL),
(154, 4, 'Loading', 'Loading', '2024-04-09 04:58:24', NULL),
(155, 4, 'AI Assistant', 'AI Assistant', '2024-04-09 04:58:24', NULL),
(156, 4, 'Select your service', 'Select your service', '2024-04-09 04:58:24', NULL),
(157, 4, 'Course title', 'Course title', '2024-04-09 04:58:24', NULL),
(158, 4, 'Course short description', 'Course short description', '2024-04-09 04:58:24', NULL),
(159, 4, 'Course long description', 'Course long description', '2024-04-09 04:58:24', NULL),
(160, 4, 'Course requirements', 'Course requirements', '2024-04-09 04:58:24', NULL),
(161, 4, 'Course outcomes', 'Course outcomes', '2024-04-09 04:58:24', NULL),
(162, 4, 'Course faq', 'Course faq', '2024-04-09 04:58:24', NULL),
(163, 4, 'Course seo tags', 'Course seo tags', '2024-04-09 04:58:24', NULL),
(164, 4, 'Course lesson text', 'Course lesson text', '2024-04-09 04:58:24', NULL),
(165, 4, 'Course certificate text', 'Course certificate text', '2024-04-09 04:58:24', NULL),
(166, 4, 'Course quiz text', 'Course quiz text', '2024-04-09 04:58:24', NULL),
(167, 4, 'Course blog title', 'Course blog title', '2024-04-09 04:58:24', NULL),
(168, 4, 'Course blog post', 'Course blog post', '2024-04-09 04:58:24', NULL),
(169, 4, 'Course thumbnail', 'Course thumbnail', '2024-04-09 04:58:24', NULL),
(170, 4, 'Enter your keyword', 'Enter your keyword', '2024-04-09 04:58:24', NULL),
(171, 4, 'Language', 'Language', '2024-04-09 04:58:24', NULL),
(172, 4, 'Generate', 'Generate', '2024-04-09 04:58:24', NULL),
(173, 4, 'Generating', 'Generating', '2024-04-09 04:58:24', NULL),
(174, 4, 'Your images', 'Your images', '2024-04-09 04:58:24', NULL),
(175, 4, 'Generated text', 'Generated text', '2024-04-09 04:58:24', NULL),
(176, 4, 'Copy', 'Copy', '2024-04-09 04:58:24', NULL),
(177, 4, 'Copied', 'Copied', '2024-04-09 04:58:24', NULL),
(178, 4, 'Just Now', 'Just Now', '2024-04-09 04:58:24', NULL),
(179, 4, 'Success !', 'Success !', '2024-04-09 04:58:24', NULL),
(180, 4, 'Attention !', 'Attention !', '2024-04-09 04:58:24', NULL),
(181, 4, 'An Error Occurred !', 'An Error Occurred !', '2024-04-09 04:58:24', NULL),
(182, 4, 'Enter your keywords', 'Enter your keywords', '2024-04-09 04:58:24', NULL),
(183, 3, 'Update', 'Update', '2024-04-09 04:58:25', NULL),
(184, 3, 'Number of Courses', 'Number of Courses', '2024-04-09 04:58:34', NULL),
(185, 3, 'Number of Lessons', 'Number of Lessons', '2024-04-09 04:58:34', NULL),
(186, 3, 'Number of Enrollment', 'Number of Enrollment', '2024-04-09 04:58:34', NULL),
(187, 3, 'Number of Students', 'Number of Students', '2024-04-09 04:58:34', NULL),
(188, 3, 'Number of Instructor', 'Number of Instructor', '2024-04-09 04:58:34', NULL),
(189, 3, 'Admin Revenue This Year', 'Admin Revenue This Year', '2024-04-09 04:58:34', NULL),
(190, 3, 'Course Status', 'Course Status', '2024-04-09 04:58:34', NULL),
(191, 3, 'Active', 'Active', '2024-04-09 04:58:34', NULL),
(192, 3, 'Upcoming', 'Upcoming', '2024-04-09 04:58:34', NULL),
(193, 3, 'Pending', 'Pending', '2024-04-09 04:58:34', NULL),
(194, 3, 'Private', 'Private', '2024-04-09 04:58:34', NULL),
(195, 3, 'Draft', 'Draft', '2024-04-09 04:58:34', NULL),
(196, 3, 'Deactive', 'Deactive', '2024-04-09 04:58:34', NULL),
(197, 3, 'Pending Requested withdrawal', 'Pending Requested withdrawal', '2024-04-09 04:58:34', NULL),
(198, 3, 'Name', 'Name', '2024-04-09 04:58:34', NULL),
(199, 3, 'Email', 'Email', '2024-04-09 04:58:34', NULL),
(200, 3, 'Requested withdrawal amount', 'Requested withdrawal amount', '2024-04-09 04:58:34', NULL),
(201, 3, 'Courses', 'Courses', '2024-04-09 04:58:34', NULL),
(202, 3, 'Categories', 'Categories', '2024-04-09 04:58:40', NULL),
(203, 3, 'All Category', 'All Category', '2024-04-09 04:58:40', NULL),
(204, 3, 'Add new category', 'Add new category', '2024-04-09 04:58:40', NULL),
(205, 3, 'Edit category', 'Edit category', '2024-04-09 04:58:40', NULL),
(206, 3, 'Edit', 'Edit', '2024-04-09 04:58:40', NULL),
(207, 3, 'Delete', 'Delete', '2024-04-09 04:58:40', NULL),
(208, 3, 'Add', 'Add', '2024-04-09 04:58:40', NULL),
(209, 3, 'Home', 'Home', '2024-04-09 04:58:56', NULL),
(210, 3, 'Manage SEO Settings', 'Manage SEO Settings', '2024-04-09 04:58:56', NULL),
(211, 3, 'Meta Title', 'Meta Title', '2024-04-09 04:58:56', NULL),
(212, 3, 'Meta Keywords', 'Meta Keywords', '2024-04-09 04:58:56', NULL),
(213, 3, 'Click the enter button after writing your keyword', 'Click the enter button after writing your keyword', '2024-04-09 04:58:56', NULL),
(214, 3, 'Meta Description', 'Meta Description', '2024-04-09 04:58:56', NULL),
(215, 3, 'Meta Robot', 'Meta Robot', '2024-04-09 04:58:56', NULL),
(216, 3, ' Canonical Url', ' Canonical Url', '2024-04-09 04:58:56', NULL),
(217, 3, ' Custom Url', ' Custom Url', '2024-04-09 04:58:56', NULL),
(218, 3, 'Og Title', 'Og Title', '2024-04-09 04:58:56', NULL),
(219, 3, 'Og Description', 'Og Description', '2024-04-09 04:58:56', NULL),
(220, 3, 'Og Image', 'Og Image', '2024-04-09 04:58:56', NULL),
(221, 3, 'Json Id', 'Json Id', '2024-04-09 04:58:56', NULL),
(222, 3, 'Submit', 'Submit', '2024-04-09 04:58:56', NULL),
(223, 3, 'Not found', 'Not found', '2024-04-09 04:59:14', NULL),
(224, 3, 'About This Application', 'About This Application', '2024-04-09 04:59:17', NULL),
(225, 3, 'Software version', 'Software version', '2024-04-09 04:59:17', NULL),
(226, 3, 'Check update', 'Check update', '2024-04-09 04:59:17', NULL),
(227, 3, 'Php version', 'Php version', '2024-04-09 04:59:17', NULL),
(228, 3, 'Curl enable', 'Curl enable', '2024-04-09 04:59:17', NULL),
(229, 3, 'enabled', 'enabled', '2024-04-09 04:59:17', NULL),
(230, 3, 'Purchase code', 'Purchase code', '2024-04-09 04:59:17', NULL),
(231, 3, 'Product license', 'Product license', '2024-04-09 04:59:17', NULL),
(232, 3, 'Enter valid purchase code', 'Enter valid purchase code', '2024-04-09 04:59:17', NULL),
(233, 3, 'Customer support status', 'Customer support status', '2024-04-09 04:59:17', NULL),
(234, 3, 'Support expiry date', 'Support expiry date', '2024-04-09 04:59:17', NULL),
(235, 3, 'Customer name', 'Customer name', '2024-04-09 04:59:17', NULL),
(236, 3, 'Get customer support', 'Get customer support', '2024-04-09 04:59:17', NULL),
(237, 3, 'Customer support', 'Customer support', '2024-04-09 04:59:17', NULL),
(238, 3, 'website setting', 'website setting', '2024-04-09 04:59:45', NULL),
(239, 3, 'Frontend Settings', 'Frontend Settings', '2024-04-09 04:59:45', NULL),
(240, 3, 'Home page layout', 'Home page layout', '2024-04-09 04:59:45', NULL),
(241, 3, 'Motivational Speech', 'Motivational Speech', '2024-04-09 04:59:45', NULL),
(242, 3, 'Website FAQS', 'Website FAQS', '2024-04-09 04:59:45', NULL),
(243, 3, 'Contact Information', 'Contact Information', '2024-04-09 04:59:45', NULL),
(244, 3, 'Logo & Images', 'Logo & Images', '2024-04-09 04:59:45', NULL),
(245, 3, 'Frontend website settings', 'Frontend website settings', '2024-04-09 04:59:45', NULL),
(246, 3, 'Banner title', 'Banner title', '2024-04-09 04:59:45', NULL),
(247, 3, 'Banner sub title', 'Banner sub title', '2024-04-09 04:59:45', NULL),
(248, 3, 'Cookie status', 'Cookie status', '2024-04-09 04:59:45', NULL),
(249, 3, 'Inactive', 'Inactive', '2024-04-09 04:59:45', NULL),
(250, 3, 'Cookie note', 'Cookie note', '2024-04-09 04:59:45', NULL),
(251, 3, 'Facebook', 'Facebook', '2024-04-09 04:59:45', NULL),
(252, 3, 'Twitter', 'Twitter', '2024-04-09 04:59:45', NULL),
(253, 3, 'Linkedin', 'Linkedin', '2024-04-09 04:59:45', NULL),
(254, 3, 'Cookie policy', 'Cookie policy', '2024-04-09 04:59:45', NULL),
(255, 3, 'About us', 'About us', '2024-04-09 04:59:45', NULL),
(256, 3, 'Terms and condition', 'Terms and condition', '2024-04-09 04:59:45', NULL),
(257, 3, 'Privacy policy', 'Privacy policy', '2024-04-09 04:59:45', NULL),
(258, 3, 'Refund policy', 'Refund policy', '2024-04-09 04:59:45', NULL),
(259, 3, 'Update Settings', 'Update Settings', '2024-04-09 04:59:45', NULL),
(260, 3, 'Activated', 'Activated', '2024-04-09 04:59:45', NULL),
(261, 3, 'Title', 'Title', '2024-04-09 04:59:45', NULL),
(262, 3, 'designation', 'designation', '2024-04-09 04:59:45', NULL),
(263, 3, 'Description', 'Description', '2024-04-09 04:59:45', NULL),
(264, 3, 'Image', 'Image', '2024-04-09 04:59:45', NULL),
(265, 3, 'Save changes', 'Save changes', '2024-04-09 04:59:45', NULL),
(266, 3, 'Question', 'Question', '2024-04-09 04:59:45', NULL),
(267, 3, 'Write a question', 'Write a question', '2024-04-09 04:59:45', NULL),
(268, 3, 'Answer', 'Answer', '2024-04-09 04:59:45', NULL),
(269, 3, 'Write a question answer', 'Write a question answer', '2024-04-09 04:59:45', NULL),
(270, 3, 'Contact Email', 'Contact Email', '2024-04-09 04:59:45', NULL),
(271, 3, 'Phone Number', 'Phone Number', '2024-04-09 04:59:45', NULL),
(272, 3, 'Address', 'Address', '2024-04-09 04:59:45', NULL),
(273, 3, 'Office Hours', 'Office Hours', '2024-04-09 04:59:45', NULL),
(274, 3, 'Recaptcha settings', 'Recaptcha settings', '2024-04-09 04:59:45', NULL),
(275, 3, 'Recaptcha status', 'Recaptcha status', '2024-04-09 04:59:45', NULL),
(276, 3, 'Recaptcha sitekey', 'Recaptcha sitekey', '2024-04-09 04:59:45', NULL),
(277, 3, 'Recaptcha secretkey', 'Recaptcha secretkey', '2024-04-09 04:59:45', NULL),
(278, 3, 'Update recaptcha settings', 'Update recaptcha settings', '2024-04-09 04:59:45', NULL),
(279, 3, 'Update banner image', 'Update banner image', '2024-04-09 04:59:45', NULL),
(280, 3, 'Upload banner image', 'Upload banner image', '2024-04-09 04:59:45', NULL),
(281, 3, 'Update light logo', 'Update light logo', '2024-04-09 04:59:45', NULL),
(282, 3, 'upload light logo', 'upload light logo', '2024-04-09 04:59:45', NULL),
(283, 3, 'Update dark logo', 'Update dark logo', '2024-04-09 04:59:45', NULL),
(284, 3, ' Upload dark logo', ' Upload dark logo', '2024-04-09 04:59:45', NULL),
(285, 3, 'Upload dark logo', 'Upload dark logo', '2024-04-09 04:59:45', NULL),
(286, 3, 'Update small logo', 'Update small logo', '2024-04-09 04:59:45', NULL),
(287, 3, 'Upload small logo', 'Upload small logo', '2024-04-09 04:59:45', NULL),
(288, 3, 'Update favicon', 'Update favicon', '2024-04-09 04:59:45', NULL),
(289, 3, 'upload_favicon', 'upload_favicon', '2024-04-09 04:59:45', NULL),
(290, 3, 'Upload favicon', 'Upload favicon', '2024-04-09 04:59:45', NULL),
(291, 3, 'Banner image update successfully', 'Banner image update successfully', '2024-04-09 05:11:57', NULL),
(292, 3, 'Light logo update successfully', 'Light logo update successfully', '2024-04-09 05:20:30', NULL),
(293, 3, 'Small logo update successfully', 'Small logo update successfully', '2024-04-09 05:20:44', NULL),
(294, 3, 'All Courses', 'All Courses', '2024-04-10 02:30:03', NULL),
(295, 3, 'Search...', 'Search...', '2024-04-10 02:30:03', NULL),
(296, 3, 'en', 'en', '2024-04-10 02:30:03', NULL),
(297, 3, 'Bn', 'Bn', '2024-04-10 02:30:03', NULL),
(298, 3, 'Login', 'Login', '2024-04-10 02:30:03', NULL),
(299, 3, 'Get Started', 'Get Started', '2024-04-10 02:30:03', NULL),
(300, 3, 'Learn More', 'Learn More', '2024-04-10 02:30:03', NULL),
(301, 3, 'Students has Enrolled', 'Students has Enrolled', '2024-04-10 02:30:03', NULL),
(302, 3, 'Free', 'Free', '2024-04-10 02:30:03', NULL),
(303, 3, 'lesson', 'lesson', '2024-04-10 02:30:03', NULL),
(304, 3, 'Students', 'Students', '2024-04-10 02:30:03', NULL),
(305, 3, 'by', 'by', '2024-04-10 02:30:03', NULL),
(306, 3, 'View All Courses', 'View All Courses', '2024-04-10 02:30:03', NULL),
(307, 3, 'More about us', 'More about us', '2024-04-10 02:30:03', NULL),
(308, 3, 'View All Blogs', 'View All Blogs', '2024-04-10 02:30:03', NULL),
(309, 3, 'Read More', 'Read More', '2024-04-10 02:30:03', NULL),
(310, 3, 'Contact with Us', 'Contact with Us', '2024-04-10 02:30:03', NULL),
(311, 3, 'Resources', 'Resources', '2024-04-10 02:30:03', NULL),
(312, 3, 'Company', 'Company', '2024-04-10 02:30:03', NULL),
(313, 3, 'Careers', 'Careers', '2024-04-10 02:30:03', NULL),
(314, 3, 'FAQs', 'FAQs', '2024-04-10 02:30:03', NULL),
(315, 3, 'Teams', 'Teams', '2024-04-10 02:30:03', NULL),
(316, 3, 'Contact Us', 'Contact Us', '2024-04-10 02:30:03', NULL),
(317, 3, 'Phone : ', 'Phone : ', '2024-04-10 02:30:03', NULL),
(318, 3, 'Email : ', 'Email : ', '2024-04-10 02:30:03', NULL),
(319, 3, 'Enter your email here', 'Enter your email here', '2024-04-10 02:30:03', NULL),
(320, 3, 'Terms And Use', 'Terms And Use', '2024-04-10 02:30:03', NULL),
(321, 3, 'Sales and Refunds', 'Sales and Refunds', '2024-04-10 02:30:03', NULL),
(322, 3, 'Legal', 'Legal', '2024-04-10 02:30:03', NULL),
(323, 3, 'Site Map', 'Site Map', '2024-04-10 02:30:03', NULL),
(324, 3, '© 2023 All Rights Reserved', '© 2023 All Rights Reserved', '2024-04-10 02:30:03', NULL),
(325, 3, 'Log In', 'Log In', '2024-04-10 02:30:09', NULL),
(326, 3, 'See your growth and get consulting support!', 'See your growth and get consulting support!', '2024-04-10 02:30:09', NULL),
(327, 3, 'Your Email', 'Your Email', '2024-04-10 02:30:09', NULL),
(328, 3, 'Password', 'Password', '2024-04-10 02:30:09', NULL),
(329, 3, 'Remember Me', 'Remember Me', '2024-04-10 02:30:09', NULL),
(330, 3, 'Forget Password?', 'Forget Password?', '2024-04-10 02:30:09', NULL),
(331, 3, 'Or sign in with Email', 'Or sign in with Email', '2024-04-10 02:30:09', NULL),
(332, 3, 'Sign in with Google', 'Sign in with Google', '2024-04-10 02:30:09', NULL),
(333, 3, 'Not have an account yet?', 'Not have an account yet?', '2024-04-10 02:30:09', NULL),
(334, 3, 'Create Account', 'Create Account', '2024-04-10 02:30:09', NULL),
(335, 3, 'Contact', 'Contact', '2024-04-10 02:30:09', NULL),
(336, 3, 'Sign Up', 'Sign Up', '2024-04-10 02:30:09', NULL),
(337, 3, 'It is a long established fact that a reader will be the distract by the read content of a page layout.', 'It is a long established fact that a reader will be the distract by the read content of a page layout.', '2024-04-10 02:30:09', NULL),
(338, 3, 'Top Categories', 'Top Categories', '2024-04-10 02:30:09', NULL),
(339, 3, 'Subscribe to stay tuned for new web design and latest updates. Let\'s do it!', 'Subscribe to stay tuned for new web design and latest updates. Let\'s do it!', '2024-04-10 02:30:10', NULL),
(340, 3, 'Yes, I\'m sure', 'Yes, I\'m sure', '2024-04-10 02:30:10', NULL),
(341, 3, 'Language list', 'Language list', '2024-04-10 02:30:35', NULL),
(342, 3, 'Add Language', 'Add Language', '2024-04-10 02:30:35', NULL),
(343, 3, 'Import Language', 'Import Language', '2024-04-10 02:30:35', NULL),
(344, 3, 'Direction', 'Direction', '2024-04-10 02:30:35', NULL),
(345, 3, 'Option', 'Option', '2024-04-10 02:30:35', NULL),
(346, 3, 'LTR', 'LTR', '2024-04-10 02:30:35', NULL),
(347, 3, 'RTL', 'RTL', '2024-04-10 02:30:35', NULL),
(348, 3, 'Edit phrase', 'Edit phrase', '2024-04-10 02:30:35', NULL),
(349, 3, 'Delete language', 'Delete language', '2024-04-10 02:30:35', NULL),
(350, 3, 'Add new language', 'Add new language', '2024-04-10 02:30:35', NULL),
(351, 3, 'No special character or space is allowed. Valid examples: French, Spanish, Bengali etc', 'No special character or space is allowed. Valid examples: French, Spanish, Bengali etc', '2024-04-10 02:30:35', NULL),
(352, 3, 'Save', 'Save', '2024-04-10 02:30:35', NULL),
(353, 3, 'Import your language files from here. (Ex: english.json)', 'Import your language files from here. (Ex: english.json)', '2024-04-10 02:30:35', NULL),
(354, 3, 'Import', 'Import', '2024-04-10 02:30:35', NULL),
(355, 3, 'phrase_updated', 'phrase_updated', '2024-04-10 02:30:35', NULL),
(356, 3, 'Direction has been updated', 'Direction has been updated', '2024-04-10 02:30:35', NULL),
(357, 4, 'Update', 'Update', '2024-04-10 02:31:37', NULL),
(358, 4, 'Number of Courses', 'Number of Courses', '2024-04-10 02:31:37', NULL),
(359, 4, 'Number of Lessons', 'Number of Lessons', '2024-04-10 02:31:37', NULL),
(360, 4, 'Number of Enrollment', 'Number of Enrollment', '2024-04-10 02:31:37', NULL),
(361, 4, 'Number of Students', 'Number of Students', '2024-04-10 02:31:37', NULL),
(362, 4, 'Number of Instructor', 'Number of Instructor', '2024-04-10 02:31:37', NULL),
(363, 4, 'Admin Revenue This Year', 'Admin Revenue This Year', '2024-04-10 02:31:37', NULL),
(364, 4, 'Course Status', 'Course Status', '2024-04-10 02:31:37', NULL),
(365, 4, 'Active', 'Active', '2024-04-10 02:31:37', NULL),
(366, 4, 'Upcoming', 'Upcoming', '2024-04-10 02:31:37', NULL),
(367, 4, 'Pending', 'Pending', '2024-04-10 02:31:37', NULL),
(368, 4, 'Private', 'Private', '2024-04-10 02:31:37', NULL),
(369, 4, 'Draft', 'Draft', '2024-04-10 02:31:37', NULL),
(370, 4, 'Deactive', 'Deactive', '2024-04-10 02:31:37', NULL),
(371, 4, 'Pending Requested withdrawal', 'Pending Requested withdrawal', '2024-04-10 02:31:37', NULL),
(372, 4, 'Name', 'Name', '2024-04-10 02:31:37', NULL),
(373, 4, 'Email', 'Email', '2024-04-10 02:31:37', NULL),
(374, 4, 'Requested withdrawal amount', 'Requested withdrawal amount', '2024-04-10 02:31:37', NULL),
(375, 4, 'Courses', 'Courses', '2024-04-10 02:31:37', NULL),
(376, 4, 'Categories', 'Categories', '2024-04-10 02:31:37', NULL),
(377, 4, 'All Category', 'All Category', '2024-04-10 02:31:37', NULL),
(378, 4, 'Add new category', 'Add new category', '2024-04-10 02:31:37', NULL),
(379, 4, 'Edit category', 'Edit category', '2024-04-10 02:31:37', NULL),
(380, 4, 'Edit', 'Edit', '2024-04-10 02:31:37', NULL),
(381, 4, 'Delete', 'Delete', '2024-04-10 02:31:37', NULL),
(382, 4, 'Add', 'Add', '2024-04-10 02:31:37', NULL),
(383, 4, 'Home', 'Home', '2024-04-10 02:31:37', NULL),
(384, 4, 'Manage SEO Settings', 'Manage SEO Settings', '2024-04-10 02:31:37', NULL),
(385, 4, 'Meta Title', 'Meta Title', '2024-04-10 02:31:37', NULL),
(386, 4, 'Meta Keywords', 'Meta Keywords', '2024-04-10 02:31:37', NULL),
(387, 4, 'Click the enter button after writing your keyword', 'Click the enter button after writing your keyword', '2024-04-10 02:31:37', NULL),
(388, 4, 'Meta Description', 'Meta Description', '2024-04-10 02:31:37', NULL),
(389, 4, 'Meta Robot', 'Meta Robot', '2024-04-10 02:31:37', NULL),
(390, 4, ' Canonical Url', ' Canonical Url', '2024-04-10 02:31:37', NULL),
(391, 4, ' Custom Url', ' Custom Url', '2024-04-10 02:31:37', NULL),
(392, 4, 'Og Title', 'Og Title', '2024-04-10 02:31:37', NULL),
(393, 4, 'Og Description', 'Og Description', '2024-04-10 02:31:37', NULL),
(394, 4, 'Og Image', 'Og Image', '2024-04-10 02:31:37', NULL),
(395, 4, 'Json Id', 'Json Id', '2024-04-10 02:31:37', NULL),
(396, 4, 'Submit', 'Submit', '2024-04-10 02:31:37', NULL),
(397, 4, 'Not found', 'Not found', '2024-04-10 02:31:37', NULL),
(398, 4, 'About This Application', 'About This Application', '2024-04-10 02:31:37', NULL),
(399, 4, 'Software version', 'Software version', '2024-04-10 02:31:37', NULL),
(400, 4, 'Check update', 'Check update', '2024-04-10 02:31:37', NULL),
(401, 4, 'Php version', 'Php version', '2024-04-10 02:31:37', NULL),
(402, 4, 'Curl enable', 'Curl enable', '2024-04-10 02:31:37', NULL),
(403, 4, 'enabled', 'enabled', '2024-04-10 02:31:37', NULL),
(404, 4, 'Purchase code', 'Purchase code', '2024-04-10 02:31:37', NULL),
(405, 4, 'Product license', 'Product license', '2024-04-10 02:31:37', NULL),
(406, 4, 'Enter valid purchase code', 'Enter valid purchase code', '2024-04-10 02:31:37', NULL),
(407, 4, 'Customer support status', 'Customer support status', '2024-04-10 02:31:37', NULL),
(408, 4, 'Support expiry date', 'Support expiry date', '2024-04-10 02:31:37', NULL),
(409, 4, 'Customer name', 'Customer name', '2024-04-10 02:31:37', NULL),
(410, 4, 'Get customer support', 'Get customer support', '2024-04-10 02:31:37', NULL),
(411, 4, 'Customer support', 'Customer support', '2024-04-10 02:31:37', NULL),
(412, 4, 'website setting', 'website setting', '2024-04-10 02:31:37', NULL),
(413, 4, 'Frontend Settings', 'Frontend Settings', '2024-04-10 02:31:37', NULL),
(414, 4, 'Home page layout', 'Home page layout', '2024-04-10 02:31:37', NULL),
(415, 4, 'Motivational Speech', 'Motivational Speech', '2024-04-10 02:31:37', NULL),
(416, 4, 'Website FAQS', 'Website FAQS', '2024-04-10 02:31:37', NULL),
(417, 4, 'Contact Information', 'Contact Information', '2024-04-10 02:31:37', NULL),
(418, 4, 'Logo & Images', 'Logo & Images', '2024-04-10 02:31:37', NULL),
(419, 4, 'Frontend website settings', 'Frontend website settings', '2024-04-10 02:31:37', NULL),
(420, 4, 'Banner title', 'Banner title', '2024-04-10 02:31:37', NULL),
(421, 4, 'Banner sub title', 'Banner sub title', '2024-04-10 02:31:37', NULL),
(422, 4, 'Cookie status', 'Cookie status', '2024-04-10 02:31:37', NULL),
(423, 4, 'Inactive', 'Inactive', '2024-04-10 02:31:37', NULL),
(424, 4, 'Cookie note', 'Cookie note', '2024-04-10 02:31:37', NULL),
(425, 4, 'Facebook', 'Facebook', '2024-04-10 02:31:37', NULL),
(426, 4, 'Twitter', 'Twitter', '2024-04-10 02:31:37', NULL),
(427, 4, 'Linkedin', 'Linkedin', '2024-04-10 02:31:37', NULL),
(428, 4, 'Cookie policy', 'Cookie policy', '2024-04-10 02:31:37', NULL),
(429, 4, 'About us', 'About us', '2024-04-10 02:31:37', NULL),
(430, 4, 'Terms and condition', 'Terms and condition', '2024-04-10 02:31:37', NULL),
(431, 4, 'Privacy policy', 'Privacy policy', '2024-04-10 02:31:37', NULL),
(432, 4, 'Refund policy', 'Refund policy', '2024-04-10 02:31:37', NULL),
(433, 4, 'Update Settings', 'Update Settings', '2024-04-10 02:31:37', NULL),
(434, 4, 'Activated', 'Activated', '2024-04-10 02:31:37', NULL),
(435, 4, 'Title', 'Title', '2024-04-10 02:31:37', NULL),
(436, 4, 'designation', 'designation', '2024-04-10 02:31:37', NULL),
(437, 4, 'Description', 'Description', '2024-04-10 02:31:37', NULL),
(438, 4, 'Image', 'Image', '2024-04-10 02:31:37', NULL),
(439, 4, 'Save changes', 'Save changes', '2024-04-10 02:31:37', NULL),
(440, 4, 'Question', 'Question', '2024-04-10 02:31:37', NULL),
(441, 4, 'Write a question', 'Write a question', '2024-04-10 02:31:37', NULL),
(442, 4, 'Answer', 'Answer', '2024-04-10 02:31:37', NULL),
(443, 4, 'Write a question answer', 'Write a question answer', '2024-04-10 02:31:37', NULL),
(444, 4, 'Contact Email', 'Contact Email', '2024-04-10 02:31:37', NULL),
(445, 4, 'Phone Number', 'Phone Number', '2024-04-10 02:31:37', NULL),
(446, 4, 'Address', 'Address', '2024-04-10 02:31:37', NULL),
(447, 4, 'Office Hours', 'Office Hours', '2024-04-10 02:31:37', NULL),
(448, 4, 'Recaptcha settings', 'Recaptcha settings', '2024-04-10 02:31:37', NULL),
(449, 4, 'Recaptcha status', 'Recaptcha status', '2024-04-10 02:31:37', NULL),
(450, 4, 'Recaptcha sitekey', 'Recaptcha sitekey', '2024-04-10 02:31:37', NULL),
(451, 4, 'Recaptcha secretkey', 'Recaptcha secretkey', '2024-04-10 02:31:37', NULL),
(452, 4, 'Update recaptcha settings', 'Update recaptcha settings', '2024-04-10 02:31:37', NULL),
(453, 4, 'Update banner image', 'Update banner image', '2024-04-10 02:31:37', NULL),
(454, 4, 'Upload banner image', 'Upload banner image', '2024-04-10 02:31:37', NULL),
(455, 4, 'Update light logo', 'Update light logo', '2024-04-10 02:31:37', NULL),
(456, 4, 'upload light logo', 'upload light logo', '2024-04-10 02:31:37', NULL),
(457, 4, 'Update dark logo', 'Update dark logo', '2024-04-10 02:31:37', NULL),
(458, 4, ' Upload dark logo', ' Upload dark logo', '2024-04-10 02:31:37', NULL),
(459, 4, 'Upload dark logo', 'Upload dark logo', '2024-04-10 02:31:37', NULL),
(460, 4, 'Update small logo', 'Update small logo', '2024-04-10 02:31:37', NULL),
(461, 4, 'Upload small logo', 'Upload small logo', '2024-04-10 02:31:37', NULL),
(462, 4, 'Update favicon', 'Update favicon', '2024-04-10 02:31:37', NULL),
(463, 4, 'upload_favicon', 'upload_favicon', '2024-04-10 02:31:37', NULL),
(464, 4, 'Upload favicon', 'Upload favicon', '2024-04-10 02:31:37', NULL),
(465, 4, 'Banner image update successfully', 'Banner image update successfully', '2024-04-10 02:31:37', NULL),
(466, 4, 'Light logo update successfully', 'Light logo update successfully', '2024-04-10 02:31:37', NULL),
(467, 4, 'Small logo update successfully', 'Small logo update successfully', '2024-04-10 02:31:37', NULL),
(468, 4, 'All Courses', 'All Courses', '2024-04-10 02:31:37', NULL),
(469, 4, 'Search...', 'Search...', '2024-04-10 02:31:37', NULL),
(470, 4, 'en', 'en', '2024-04-10 02:31:37', NULL),
(471, 4, 'Bn', 'Bn', '2024-04-10 02:31:37', NULL),
(472, 4, 'Login', 'Login', '2024-04-10 02:31:37', NULL),
(473, 4, 'Get Started', 'Get Started', '2024-04-10 02:31:37', NULL),
(474, 4, 'Learn More', 'Learn More', '2024-04-10 02:31:37', NULL),
(475, 4, 'Students has Enrolled', 'Students has Enrolled', '2024-04-10 02:31:37', NULL),
(476, 4, 'Free', 'Free', '2024-04-10 02:31:37', NULL),
(477, 4, 'lesson', 'lesson', '2024-04-10 02:31:37', NULL),
(478, 4, 'Students', 'Students', '2024-04-10 02:31:37', NULL),
(479, 4, 'by', 'by', '2024-04-10 02:31:37', NULL),
(480, 4, 'View All Courses', 'View All Courses', '2024-04-10 02:31:37', NULL),
(481, 4, 'More about us', 'More about us', '2024-04-10 02:31:37', NULL),
(482, 4, 'View All Blogs', 'View All Blogs', '2024-04-10 02:31:37', NULL),
(483, 4, 'Read More', 'Read More', '2024-04-10 02:31:37', NULL),
(484, 4, 'Contact with Us', 'Contact with Us', '2024-04-10 02:31:37', NULL),
(485, 4, 'Resources', 'Resources', '2024-04-10 02:31:37', NULL),
(486, 4, 'Company', 'Company', '2024-04-10 02:31:37', NULL),
(487, 4, 'Careers', 'Careers', '2024-04-10 02:31:37', NULL),
(488, 4, 'FAQs', 'FAQs', '2024-04-10 02:31:37', NULL),
(489, 4, 'Teams', 'Teams', '2024-04-10 02:31:37', NULL),
(490, 4, 'Contact Us', 'Contact Us', '2024-04-10 02:31:37', NULL),
(491, 4, 'Phone : ', 'Phone : ', '2024-04-10 02:31:37', NULL),
(492, 4, 'Email : ', 'Email : ', '2024-04-10 02:31:37', NULL),
(493, 4, 'Enter your email here', 'Enter your email here', '2024-04-10 02:31:37', NULL),
(494, 4, 'Terms And Use', 'Terms And Use', '2024-04-10 02:31:37', NULL),
(495, 4, 'Sales and Refunds', 'Sales and Refunds', '2024-04-10 02:31:37', NULL),
(496, 4, 'Legal', 'Legal', '2024-04-10 02:31:37', NULL),
(497, 4, 'Site Map', 'Site Map', '2024-04-10 02:31:37', NULL),
(498, 4, '© 2023 All Rights Reserved', '© 2023 All Rights Reserved', '2024-04-10 02:31:37', NULL),
(499, 4, 'Log In', 'Log In', '2024-04-10 02:31:37', NULL),
(500, 4, 'See your growth and get consulting support!', 'See your growth and get consulting support!', '2024-04-10 02:31:37', NULL),
(501, 4, 'Your Email', 'Your Email', '2024-04-10 02:31:37', NULL),
(502, 4, 'Password', 'Password', '2024-04-10 02:31:37', NULL),
(503, 4, 'Remember Me', 'Remember Me', '2024-04-10 02:31:37', NULL),
(504, 4, 'Forget Password?', 'Forget Password?', '2024-04-10 02:31:37', NULL),
(505, 4, 'Or sign in with Email', 'Or sign in with Email', '2024-04-10 02:31:37', NULL),
(506, 4, 'Sign in with Google', 'Sign in with Google', '2024-04-10 02:31:37', NULL),
(507, 4, 'Not have an account yet?', 'Not have an account yet?', '2024-04-10 02:31:37', NULL),
(508, 4, 'Create Account', 'Create Account', '2024-04-10 02:31:37', NULL),
(509, 4, 'Contact', 'Contact', '2024-04-10 02:31:37', NULL),
(510, 4, 'Sign Up', 'Sign Up', '2024-04-10 02:31:37', NULL),
(511, 4, 'It is a long established fact that a reader will be the distract by the read content of a page layout.', 'It is a long established fact that a reader will be the distract by the read content of a page layout.', '2024-04-10 02:31:37', NULL),
(512, 4, 'Top Categories', 'Top Categories', '2024-04-10 02:31:37', NULL),
(513, 4, 'Subscribe to stay tuned for new web design and latest updates. Let\'s do it!', 'Subscribe to stay tuned for new web design and latest updates. Let\'s do it!', '2024-04-10 02:31:37', NULL),
(514, 4, 'Yes, I\'m sure', 'Yes, I\'m sure', '2024-04-10 02:31:37', NULL),
(515, 4, 'Language list', 'Language list', '2024-04-10 02:31:37', NULL),
(516, 4, 'Add Language', 'Add Language', '2024-04-10 02:31:37', NULL),
(517, 4, 'Import Language', 'Import Language', '2024-04-10 02:31:37', NULL),
(518, 4, 'Direction', 'Direction', '2024-04-10 02:31:37', NULL),
(519, 4, 'Option', 'Option', '2024-04-10 02:31:37', NULL),
(520, 4, 'LTR', 'LTR', '2024-04-10 02:31:37', NULL),
(521, 4, 'RTL', 'RTL', '2024-04-10 02:31:37', NULL),
(522, 4, 'Edit phrase', 'Edit phrase', '2024-04-10 02:31:37', NULL),
(523, 4, 'Delete language', 'Delete language', '2024-04-10 02:31:37', NULL),
(524, 4, 'Add new language', 'Add new language', '2024-04-10 02:31:37', NULL),
(525, 4, 'No special character or space is allowed. Valid examples: French, Spanish, Bengali etc', 'No special character or space is allowed. Valid examples: French, Spanish, Bengali etc', '2024-04-10 02:31:37', NULL),
(526, 4, 'Save', 'Save', '2024-04-10 02:31:37', NULL),
(527, 4, 'Import your language files from here. (Ex: english.json)', 'Import your language files from here. (Ex: english.json)', '2024-04-10 02:31:37', NULL),
(528, 4, 'Import', 'Import', '2024-04-10 02:31:37', NULL),
(529, 4, 'phrase_updated', 'phrase_updated', '2024-04-10 02:31:37', NULL),
(530, 4, 'Direction has been updated', 'Direction has been updated', '2024-04-10 02:31:37', NULL),
(531, 3, 'Log Out', 'Log Out', '2024-04-10 02:33:38', NULL),
(532, 3, 'Course Details', 'Course Details', '2024-04-10 02:34:20', NULL),
(533, 3, 'Course Detials', 'Course Detials', '2024-04-10 02:34:20', NULL),
(534, 3, 'Bestseller', 'Bestseller', '2024-04-10 02:34:20', NULL),
(535, 3, 'Certificate Course', 'Certificate Course', '2024-04-10 02:34:20', NULL),
(536, 3, 'Wishlist', 'Wishlist', '2024-04-10 02:38:07', NULL),
(537, 3, 'Upload picture', 'Upload picture', '2024-04-10 02:38:07', NULL),
(538, 3, 'Upload new', 'Upload new', '2024-04-10 02:38:07', NULL),
(539, 3, 'Course Enrolled', 'Course Enrolled', '2024-04-10 02:38:07', NULL),
(540, 3, 'certificate', 'certificate', '2024-04-10 02:38:07', NULL),
(541, 3, 'WELCOME,', 'WELCOME,', '2024-04-10 02:38:07', NULL),
(542, 3, 'My Profile', 'My Profile', '2024-04-10 02:38:07', NULL),
(543, 3, 'My Courses', 'My Courses', '2024-04-10 02:38:07', NULL),
(544, 3, 'Purchase History', 'Purchase History', '2024-04-10 02:38:07', NULL),
(545, 3, 'Logout', 'Logout', '2024-04-10 02:38:07', NULL),
(546, 3, 'There\'s currently nothing available to display.', 'There\'s currently nothing available to display.', '2024-04-10 02:38:07', NULL),
(547, 3, 'Cart', 'Cart', '2024-04-10 02:38:14', NULL),
(548, 3, 'Shopping cart', 'Shopping cart', '2024-04-10 02:38:14', NULL),
(549, 3, 'We\'re always here to help you.', 'We\'re always here to help you.', '2024-04-10 02:38:14', NULL),
(550, 3, 'Cart items', 'Cart items', '2024-04-10 02:38:14', NULL),
(551, 3, 'Showing', 'Showing', '2024-04-10 02:39:10', NULL),
(552, 3, 'of', 'of', '2024-04-10 02:39:10', NULL),
(553, 3, 'data', 'data', '2024-04-10 02:39:10', NULL),
(554, 3, 'Grid', 'Grid', '2024-04-10 02:39:10', NULL),
(555, 3, 'List', 'List', '2024-04-10 02:39:10', NULL),
(556, 3, 'Show More', 'Show More', '2024-04-10 02:39:11', NULL),
(557, 3, 'Price', 'Price', '2024-04-10 02:39:11', NULL),
(558, 3, 'Paid', 'Paid', '2024-04-10 02:39:11', NULL),
(559, 3, 'Discount', 'Discount', '2024-04-10 02:39:11', NULL),
(560, 3, 'Level', 'Level', '2024-04-10 02:39:11', NULL),
(561, 3, 'Beginner', 'Beginner', '2024-04-10 02:39:11', NULL),
(562, 3, 'Intermediate', 'Intermediate', '2024-04-10 02:39:11', NULL),
(563, 3, 'Advanced', 'Advanced', '2024-04-10 02:39:11', NULL),
(564, 3, 'English', 'English', '2024-04-10 02:39:11', NULL),
(565, 3, 'Spanish', 'Spanish', '2024-04-10 02:39:11', NULL),
(566, 3, 'Italic', 'Italic', '2024-04-10 02:39:11', NULL),
(567, 3, 'German', 'German', '2024-04-10 02:39:11', NULL),
(568, 3, 'Ratings', 'Ratings', '2024-04-10 02:39:11', NULL),
(569, 3, 'Show Less', 'Show Less', '2024-04-10 02:39:11', NULL),
(570, 3, 'Overview', 'Overview', '2024-04-10 02:44:02', NULL),
(571, 3, 'Course Content', 'Course Content', '2024-04-10 02:44:02', NULL),
(572, 3, 'Details', 'Details', '2024-04-10 02:44:02', NULL),
(573, 3, 'Reviews', 'Reviews', '2024-04-10 02:44:02', NULL),
(574, 3, 'Course Overview', 'Course Overview', '2024-04-10 02:44:02', NULL),
(575, 3, 'See more', 'See more', '2024-04-10 02:44:02', NULL),
(576, 3, 'Course Content Empty', 'Course Content Empty', '2024-04-10 02:44:02', NULL),
(577, 3, 'FAQ', 'FAQ', '2024-04-10 02:44:02', NULL),
(578, 3, 'Requirment', 'Requirment', '2024-04-10 02:45:17', NULL),
(579, 3, 'Outcomes', 'Outcomes', '2024-04-10 02:45:17', NULL),
(580, 3, 'review', 'review', '2024-04-10 02:45:17', NULL),
(581, 3, 'View Details', 'View Details', '2024-04-10 02:45:17', NULL),
(582, 3, 'Rate this course : ', 'Rate this course : ', '2024-04-10 02:45:17', NULL),
(583, 3, 'Remove all', 'Remove all', '2024-04-10 02:45:17', NULL),
(584, 3, 'Write a reveiw ...', 'Write a reveiw ...', '2024-04-10 02:45:17', NULL),
(585, 3, 'Enroll a Course', 'Enroll a Course', '2024-04-10 02:45:17', NULL),
(586, 3, 'Add to cart', 'Add to cart', '2024-04-10 02:45:17', NULL),
(587, 3, 'Duration', 'Duration', '2024-04-10 02:45:17', NULL),
(588, 3, 'Contact Instructor', 'Contact Instructor', '2024-04-10 02:45:17', NULL),
(589, 3, 'Share on Facebook', 'Share on Facebook', '2024-04-10 02:45:17', NULL),
(590, 3, 'Share on Twitter', 'Share on Twitter', '2024-04-10 02:45:17', NULL),
(591, 3, 'Share on Whatsapp', 'Share on Whatsapp', '2024-04-10 02:45:17', NULL),
(592, 3, 'Share on Linkedin', 'Share on Linkedin', '2024-04-10 02:45:17', NULL),
(593, 3, 'Item added to the cart.', 'Item added to the cart.', '2024-04-10 02:51:09', NULL),
(594, 3, 'Remove from cart', 'Remove from cart', '2024-04-10 02:51:10', NULL),
(595, 3, 'Items', 'Items', '2024-04-10 02:51:14', NULL),
(596, 3, 'Action', 'Action', '2024-04-10 02:51:14', NULL),
(597, 3, 'Total', 'Total', '2024-04-10 02:51:14', NULL),
(598, 3, 'Sub total', 'Sub total', '2024-04-10 02:51:14', NULL),
(599, 3, '%', '%', '2024-04-10 02:51:14', NULL),
(600, 3, 'Tax', 'Tax', '2024-04-10 02:51:14', NULL),
(601, 3, 'Apply coupon', 'Apply coupon', '2024-04-10 02:51:14', NULL),
(602, 3, 'Apply', 'Apply', '2024-04-10 02:51:14', NULL),
(603, 3, 'Send as a gift', 'Send as a gift', '2024-04-10 02:51:14', NULL),
(604, 3, 'Enter user email', 'Enter user email', '2024-04-10 02:51:14', NULL),
(605, 3, 'Continue to payment', 'Continue to payment', '2024-04-10 02:51:14', NULL),
(606, 3, 'Data not found.', 'Data not found.', '2024-04-10 02:51:19', NULL),
(607, 3, 'This is coupon is not valid.', 'This is coupon is not valid.', '2024-04-10 02:52:15', NULL),
(608, 3, 'User email doesn\'t exists.', 'User email doesn\'t exists.', '2024-04-10 02:52:23', NULL),
(609, 3, 'Instructor details', 'Instructor details', '2024-04-10 02:56:55', NULL),
(610, 3, 'Hi, I’m', 'Hi, I’m', '2024-04-10 02:56:55', NULL),
(611, 3, 'Experience', 'Experience', '2024-04-10 02:56:55', NULL),
(612, 3, 'Phone', 'Phone', '2024-04-10 02:56:55', NULL),
(613, 3, 'N/A', 'N/A', '2024-04-10 02:56:55', NULL),
(614, 3, 'Location', 'Location', '2024-04-10 02:56:55', NULL),
(615, 3, 'Instructor Revenue This Year', 'Instructor Revenue This Year', '2024-04-10 03:01:04', NULL),
(616, 3, 'Active Courses', 'Active Courses', '2024-04-10 03:01:04', NULL),
(617, 3, 'Pending Courses', 'Pending Courses', '2024-04-10 03:01:04', NULL),
(618, 3, 'Withdraw Request', 'Withdraw Request', '2024-04-10 03:01:04', NULL),
(619, 3, 'Payout Date', 'Payout Date', '2024-04-10 03:01:04', NULL),
(620, 3, 'Amount', 'Amount', '2024-04-10 03:01:04', NULL),
(621, 3, 'ekattor', 'ekattor', '2024-04-10 03:01:04', NULL),
(622, 3, 'Sales report', 'Sales report', '2024-04-10 03:01:04', NULL),
(623, 3, 'Payout report', 'Payout report', '2024-04-10 03:01:04', NULL),
(624, 3, 'Payout setting', 'Payout setting', '2024-04-10 03:01:04', NULL),
(625, 3, 'All blogs', 'All blogs', '2024-04-10 03:01:04', NULL),
(626, 3, 'Pending blog', 'Pending blog', '2024-04-10 03:01:04', NULL),
(627, 3, 'Visit website', 'Visit website', '2024-04-10 03:01:04', NULL),
(628, 3, 'My Account', 'My Account', '2024-04-10 03:01:04', NULL),
(629, 3, 'Heads up!', 'Heads up!', '2024-04-10 03:01:04', NULL),
(630, 3, 'Continue', 'Continue', '2024-04-10 03:01:04', NULL),
(631, 3, 'heads_up', 'heads_up', '2024-04-10 03:01:04', NULL),
(632, 3, 'congratulations', 'congratulations', '2024-04-10 03:01:04', NULL),
(633, 3, 'oh_snap', 'oh_snap', '2024-04-10 03:01:04', NULL),
(634, 3, 'please_fill_all_the_required_fields', 'please_fill_all_the_required_fields', '2024-04-10 03:01:04', NULL),
(635, 3, 'successfully', 'successfully', '2024-04-10 03:01:04', NULL),
(636, 3, 'Div added to bottom ', 'Div added to bottom ', '2024-04-10 03:01:04', NULL),
(637, 3, 'Div has been deleted ', 'Div has been deleted ', '2024-04-10 03:01:04', NULL),
(638, 3, 'Personal Information', 'Personal Information', '2024-04-10 03:01:13', NULL),
(639, 3, 'Full Name', 'Full Name', '2024-04-10 03:01:13', NULL),
(640, 3, 'Email Address', 'Email Address', '2024-04-10 03:01:13', NULL),
(641, 3, 'Website', 'Website', '2024-04-10 03:01:13', NULL),
(642, 3, 'Skills', 'Skills', '2024-04-10 03:01:13', NULL),
(643, 3, 'Biography', 'Biography', '2024-04-10 03:01:13', NULL),
(644, 3, 'Search user email...', 'Search user email...', '2024-04-10 09:01:34', NULL),
(645, 3, 'Message someone and chat right now!', 'Message someone and chat right now!', '2024-04-10 09:01:35', NULL),
(646, 3, 'Type something ...', 'Type something ...', '2024-04-10 09:01:39', NULL),
(647, 3, 'Message sent successfully.', 'Message sent successfully.', '2024-04-10 09:02:01', NULL),
(648, 3, '@attachment...', '@attachment...', '2024-04-10 09:02:01', NULL),
(649, 3, 'Search not found...', 'Search not found...', '2024-04-10 09:05:57', NULL),
(650, 3, 'Opps! You don\'t have any messages.', 'Opps! You don\'t have any messages.', '2024-04-10 09:07:21', NULL),
(651, 3, 'Course Name', 'Course Name', '2024-04-10 03:08:11', NULL),
(652, 3, 'Date', 'Date', '2024-04-10 03:08:11', NULL),
(653, 3, 'Payment Method', 'Payment Method', '2024-04-10 03:08:11', NULL),
(654, 3, 'Invoice', 'Invoice', '2024-04-10 03:08:11', NULL),
(655, 3, 'For details about the course', 'For details about the course', '2024-04-10 03:09:57', NULL),
(656, 3, 'Call Us', 'Call Us', '2024-04-10 03:09:57', NULL),
(657, 3, 'Progress', 'Progress', '2024-04-10 03:10:03', NULL),
(658, 3, 'Continue Courses', 'Continue Courses', '2024-04-10 03:10:03', NULL),
(659, 3, 'Course Playing Page', 'Course Playing Page', '2024-04-10 03:10:17', NULL),
(660, 3, 'Completed', 'Completed', '2024-04-10 03:10:17', NULL),
(661, 3, 'Summary', 'Summary', '2024-04-10 03:10:17', NULL),
(662, 3, 'Live class', 'Live class', '2024-04-10 03:10:17', NULL),
(663, 3, 'Class Schedules', 'Class Schedules', '2024-04-10 03:10:17', NULL),
(664, 3, 'Topic', 'Topic', '2024-04-10 03:10:17', NULL),
(665, 3, 'Date & time', 'Date & time', '2024-04-10 03:10:17', NULL),
(666, 3, 'Keep up the great work!', 'Keep up the great work!', '2024-04-10 03:10:17', NULL),
(667, 3, 'Your dedication to ongoing progress is inspiring.', 'Your dedication to ongoing progress is inspiring.', '2024-04-10 03:10:17', NULL),
(668, 3, 'Every step forward is a testament to your commitment to growth and excellence.', 'Every step forward is a testament to your commitment to growth and excellence.', '2024-04-10 03:10:17', NULL),
(669, 3, 'Stay focused, stay determined, and continue to push yourself to new heights.', 'Stay focused, stay determined, and continue to push yourself to new heights.', '2024-04-10 03:10:17', NULL),
(670, 3, 'You have got this!', 'You have got this!', '2024-04-10 03:10:17', NULL),
(671, 3, 'Order summary', 'Order summary', '2024-04-10 03:11:05', NULL),
(672, 3, 'Select payment gateway', 'Select payment gateway', '2024-04-10 03:11:05', NULL),
(673, 3, 'Item List', 'Item List', '2024-04-10 03:11:05', NULL),
(674, 3, '+', '+', '2024-04-10 03:11:05', NULL),
(675, 3, 'Grand Total', 'Grand Total', '2024-04-10 03:11:05', NULL),
(676, 3, 'Pay by Stripe', 'Pay by Stripe', '2024-04-10 03:11:35', NULL),
(677, 3, 'Purchasing', 'Purchasing', '2024-04-10 03:11:37', NULL),
(678, 3, 'Blog Details', 'Blog Details', '2024-04-10 03:13:28', NULL),
(679, 3, 'comment', 'comment', '2024-04-10 03:13:28', NULL),
(680, 3, 'comments', 'comments', '2024-04-10 03:13:28', NULL),
(681, 3, 'K', 'K', '2024-04-10 03:13:28', NULL),
(682, 3, 'like', 'like', '2024-04-10 03:13:28', NULL),
(683, 3, 'likes', 'likes', '2024-04-10 03:13:28', NULL),
(684, 3, 'Blog Detials', 'Blog Detials', '2024-04-10 03:13:28', NULL);
INSERT INTO `language_phrases` (`id`, `language_id`, `phrase`, `translated`, `created_at`, `updated_at`) VALUES
(685, 3, 'Post A Comment', 'Post A Comment', '2024-04-10 03:13:28', NULL),
(686, 3, 'Write your comment ...', 'Write your comment ...', '2024-04-10 03:13:28', NULL),
(687, 3, 'Post Comment', 'Post Comment', '2024-04-10 03:13:28', NULL),
(688, 3, 'at', 'at', '2024-04-10 03:13:28', NULL),
(689, 3, 'Reply', 'Reply', '2024-04-10 03:13:28', NULL),
(690, 3, 'Replay to the comment ...', 'Replay to the comment ...', '2024-04-10 03:13:28', NULL),
(691, 3, 'Our Blog', 'Our Blog', '2024-04-10 03:13:28', NULL),
(692, 3, 'Have a look on our news', 'Have a look on our news', '2024-04-10 03:13:28', NULL),
(693, 3, 'Your comment has been saved.', 'Your comment has been saved.', '2024-04-10 03:14:11', NULL),
(694, 3, 'Edit comment', 'Edit comment', '2024-04-10 03:14:12', NULL),
(695, 3, 'Your comment has been updated.', 'Your comment has been updated.', '2024-04-10 03:14:34', NULL),
(696, 3, 'Your comment has been deleted.', 'Your comment has been deleted.', '2024-04-10 03:14:42', NULL),
(697, 3, 'Online courses built for everyone', 'Online courses built for everyone', '2024-04-10 03:15:21', NULL),
(698, 3, 'Your vision, our', 'Your vision, our', '2024-04-10 03:15:21', NULL),
(699, 3, 'Expertise.', 'Expertise.', '2024-04-10 03:15:21', NULL),
(700, 3, 'Creativeitem is committed to protecting your information and privacy. We will\n                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                describe how we collect, use, and publish your personal information or data when you visit,\n                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                subscribe, register, or purchase from Creativeitem in our privacy policy.', 'Creativeitem is committed to protecting your information and privacy. We will\n                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                describe how we collect, use, and publish your personal information or data when you visit,\n                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                subscribe, register, or purchase from Creativeitem in our privacy policy.', '2024-04-10 03:15:21', NULL),
(701, 3, '220k', '220k', '2024-04-10 03:15:21', NULL),
(702, 3, 'Online Students', 'Online Students', '2024-04-10 03:15:21', NULL),
(703, 3, '15k', '15k', '2024-04-10 03:15:21', NULL),
(704, 3, 'Expert Instructors', 'Expert Instructors', '2024-04-10 03:15:21', NULL),
(705, 3, '22k', '22k', '2024-04-10 03:15:21', NULL),
(706, 3, 'Certified Courses', 'Certified Courses', '2024-04-10 03:15:21', NULL),
(707, 3, '20k', '20k', '2024-04-10 03:15:21', NULL),
(708, 3, 'Online Courses', 'Online Courses', '2024-04-10 03:15:21', NULL),
(709, 3, 'Know About Us', 'Know About Us', '2024-04-10 03:15:21', NULL),
(710, 3, 'Learn & know about educate learning', 'Learn & know about educate learning', '2024-04-10 03:15:21', NULL),
(711, 3, 'platform', 'platform', '2024-04-10 03:15:21', NULL),
(712, 3, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.', '2024-04-10 03:15:21', NULL),
(713, 3, 'Life time Access', 'Life time Access', '2024-04-10 03:15:21', NULL),
(714, 3, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2024-04-10 03:15:21', NULL),
(715, 3, 'Learn from Anywhere', 'Learn from Anywhere', '2024-04-10 03:15:21', NULL),
(716, 3, 'Experienced Teachers Services', 'Experienced Teachers Services', '2024-04-10 03:15:21', NULL),
(717, 3, 'Testimonial', 'Testimonial', '2024-04-10 03:15:21', NULL),
(718, 3, 'What our clients says about us', 'What our clients says about us', '2024-04-10 03:15:21', NULL),
(719, 3, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of use Lorem Ipsum.', '2024-04-10 03:15:21', NULL),
(720, 3, 'Our Instructor', 'Our Instructor', '2024-04-10 03:15:21', NULL),
(721, 3, 'Expert Instructor', 'Expert Instructor', '2024-04-10 03:15:21', NULL),
(722, 3, 'View All Instructor', 'View All Instructor', '2024-04-10 03:15:21', NULL),
(723, 3, 'Our Address', 'Our Address', '2024-04-10 03:15:49', NULL),
(724, 3, 'Our location', 'Our location', '2024-04-10 03:15:49', NULL),
(725, 3, 'Contact Info', 'Contact Info', '2024-04-10 03:15:49', NULL),
(726, 3, 'Open a chat or give us call at', 'Open a chat or give us call at', '2024-04-10 03:15:49', NULL),
(727, 3, 'Live Support', 'Live Support', '2024-04-10 03:15:49', NULL),
(728, 3, 'Live chat service', 'Live chat service', '2024-04-10 03:15:49', NULL),
(729, 3, 'Send Message', 'Send Message', '2024-04-10 03:15:49', NULL),
(730, 3, 'Your record has been saved.', 'Your record has been saved.', '2024-04-10 03:16:12', NULL),
(731, 3, 'Terms', 'Terms', '2024-04-10 03:16:26', NULL),
(732, 3, 'Course Manager', 'Course Manager', '2024-04-10 03:20:37', NULL),
(733, 3, 'Upcoming courses', 'Upcoming courses', '2024-04-10 03:20:37', NULL),
(734, 3, 'Free courses', 'Free courses', '2024-04-10 03:20:37', NULL),
(735, 3, 'Paid courses', 'Paid courses', '2024-04-10 03:20:37', NULL),
(736, 3, 'Search Title', 'Search Title', '2024-04-10 03:20:37', NULL),
(737, 3, 'Search', 'Search', '2024-04-10 03:20:37', NULL),
(738, 3, 'Filter', 'Filter', '2024-04-10 03:20:37', NULL),
(739, 3, 'Status', 'Status', '2024-04-10 03:20:37', NULL),
(740, 3, 'Export', 'Export', '2024-04-10 03:22:29', NULL),
(741, 3, 'Print', 'Print', '2024-04-10 03:22:29', NULL),
(742, 3, 'Lesson & Section', 'Lesson & Section', '2024-04-10 03:22:29', NULL),
(743, 3, 'Enrolled Student', 'Enrolled Student', '2024-04-10 03:22:29', NULL),
(744, 3, 'Options', 'Options', '2024-04-10 03:22:29', NULL),
(745, 3, 'Sesson', 'Sesson', '2024-04-10 03:22:29', NULL),
(746, 3, 'Actions', 'Actions', '2024-04-10 03:22:29', NULL),
(747, 3, 'View Course On Frontend', 'View Course On Frontend', '2024-04-10 03:22:29', NULL),
(748, 3, 'Go To Course Playing Page', 'Go To Course Playing Page', '2024-04-10 03:22:29', NULL),
(749, 3, 'Edit Course', 'Edit Course', '2024-04-10 03:22:29', NULL),
(750, 3, 'Make As Pending', 'Make As Pending', '2024-04-10 03:22:29', NULL),
(751, 3, 'Delete Course', 'Delete Course', '2024-04-10 03:22:29', NULL),
(752, 3, 'Make As Active', 'Make As Active', '2024-04-10 03:22:29', NULL),
(753, 3, 'No data found', 'No data found', '2024-04-10 03:24:03', NULL),
(754, 3, 'Create course', 'Create course', '2024-04-10 03:24:24', NULL),
(755, 3, 'Add Course', 'Add Course', '2024-04-10 03:24:24', NULL),
(756, 3, 'Enter Course Title', 'Enter Course Title', '2024-04-10 03:24:24', NULL),
(757, 3, 'Short Description', 'Short Description', '2024-04-10 03:24:24', NULL),
(758, 3, 'Enter Short Description', 'Enter Short Description', '2024-04-10 03:24:24', NULL),
(759, 3, 'Enter Description', 'Enter Description', '2024-04-10 03:24:24', NULL),
(760, 3, 'Create as', 'Create as', '2024-04-10 03:24:24', NULL),
(761, 3, 'Select a category', 'Select a category', '2024-04-10 03:24:24', NULL),
(762, 3, 'Course level', 'Course level', '2024-04-10 03:24:24', NULL),
(763, 3, 'Select your course level', 'Select your course level', '2024-04-10 03:24:24', NULL),
(764, 3, 'Made in', 'Made in', '2024-04-10 03:24:24', NULL),
(765, 3, 'Select your course language', 'Select your course language', '2024-04-10 03:24:24', NULL),
(766, 3, 'Pricing type', 'Pricing type', '2024-04-10 03:24:24', NULL),
(767, 3, 'Enter your course price', 'Enter your course price', '2024-04-10 03:24:24', NULL),
(768, 3, 'Check if this course has discount', 'Check if this course has discount', '2024-04-10 03:24:24', NULL),
(769, 3, 'Discounted price', 'Discounted price', '2024-04-10 03:24:24', NULL),
(770, 3, 'Enter your discount price', 'Enter your discount price', '2024-04-10 03:24:24', NULL),
(771, 3, 'Thumbnail', 'Thumbnail', '2024-04-10 03:24:24', NULL),
(772, 3, 'Finish!', 'Finish!', '2024-04-10 03:24:24', NULL),
(773, 3, 'Enrol History', 'Enrol History', '2024-04-10 03:26:17', NULL),
(774, 3, 'Enroll History', 'Enroll History', '2024-04-10 03:26:17', NULL),
(775, 3, 'Enrolled Course', 'Enrolled Course', '2024-04-10 03:26:17', NULL),
(776, 3, 'Enrolled Date', 'Enrolled Date', '2024-04-10 03:26:17', NULL),
(777, 3, 'Expiry Date', 'Expiry Date', '2024-04-10 03:26:17', NULL),
(778, 3, 'Lifetime access', 'Lifetime access', '2024-04-10 03:26:17', NULL),
(779, 3, 'Enroll Students', 'Enroll Students', '2024-04-10 03:27:30', NULL),
(780, 3, 'Course to enrol', 'Course to enrol', '2024-04-10 03:27:30', NULL),
(781, 3, 'Select a course', 'Select a course', '2024-04-10 03:27:30', NULL),
(782, 3, 'Enrol student', 'Enrol student', '2024-04-10 03:27:30', NULL),
(783, 3, 'Search here', 'Search here', '2024-04-10 03:27:30', NULL),
(784, 3, 'Admins', 'Admins', '2024-04-10 03:27:55', NULL),
(785, 3, 'Admin List', 'Admin List', '2024-04-10 03:27:55', NULL),
(786, 3, 'Search user', 'Search user', '2024-04-10 03:27:55', NULL),
(787, 3, 'Number Of Course', 'Number Of Course', '2024-04-10 03:27:55', NULL),
(788, 3, 'Root Admin', 'Root Admin', '2024-04-10 03:27:55', NULL),
(789, 3, 'Assign permission', 'Assign permission', '2024-04-10 03:27:55', NULL),
(790, 3, 'Create Admin', 'Create Admin', '2024-04-10 03:28:00', NULL),
(791, 3, 'Admin Info', 'Admin Info', '2024-04-10 03:28:00', NULL),
(792, 3, 'Basic', 'Basic', '2024-04-10 03:28:00', NULL),
(793, 3, 'Login Credentials', 'Login Credentials', '2024-04-10 03:28:00', NULL),
(794, 3, 'Payment Information', 'Payment Information', '2024-04-10 03:28:00', NULL),
(795, 3, 'Social Links', 'Social Links', '2024-04-10 03:28:00', NULL),
(796, 3, 'User image', 'User image', '2024-04-10 03:28:00', NULL),
(797, 3, 'sandbox client id', 'sandbox client id', '2024-04-10 03:28:00', NULL),
(798, 3, 'sandbox secret key', 'sandbox secret key', '2024-04-10 03:28:00', NULL),
(799, 3, 'production client id', 'production client id', '2024-04-10 03:28:00', NULL),
(800, 3, 'production secret key', 'production secret key', '2024-04-10 03:28:00', NULL),
(801, 3, 'public key', 'public key', '2024-04-10 03:28:00', NULL),
(802, 3, 'secret key', 'secret key', '2024-04-10 03:28:00', NULL),
(803, 3, 'public live key', 'public live key', '2024-04-10 03:28:00', NULL),
(804, 3, 'secret live key', 'secret live key', '2024-04-10 03:28:00', NULL),
(805, 3, 'Instructor List', 'Instructor List', '2024-04-10 03:28:10', NULL),
(806, 3, 'View courses', 'View courses', '2024-04-10 03:28:10', NULL),
(807, 3, 'Create Instructor', 'Create Instructor', '2024-04-10 03:28:17', NULL),
(808, 3, 'Instructor Info', 'Instructor Info', '2024-04-10 03:28:17', NULL),
(809, 3, 'Pending payouts', 'Pending payouts', '2024-04-10 03:28:20', NULL),
(810, 3, 'Completed payouts', 'Completed payouts', '2024-04-10 03:28:20', NULL),
(811, 3, 'Payout amount', 'Payout amount', '2024-04-10 03:28:20', NULL),
(812, 3, '	Payout date', '	Payout date', '2024-04-10 03:28:20', NULL),
(813, 3, 'Pay', 'Pay', '2024-04-10 03:28:20', NULL),
(814, 3, 'Public Instructor Settings', 'Public Instructor Settings', '2024-04-10 03:28:30', NULL),
(815, 3, 'Instructor settings', 'Instructor settings', '2024-04-10 03:28:30', NULL),
(816, 3, 'Allow public instructor', 'Allow public instructor', '2024-04-10 03:28:30', NULL),
(817, 3, 'Yes', 'Yes', '2024-04-10 03:28:30', NULL),
(818, 3, 'No', 'No', '2024-04-10 03:28:30', NULL),
(819, 3, 'Instructor application note', 'Instructor application note', '2024-04-10 03:28:30', NULL),
(820, 3, 'Revenue settings', 'Revenue settings', '2024-04-10 03:28:30', NULL),
(821, 3, 'Instructor revenue percentage', 'Instructor revenue percentage', '2024-04-10 03:28:30', NULL),
(822, 3, 'Admin revenue percentage', 'Admin revenue percentage', '2024-04-10 03:28:30', NULL),
(823, 3, 'Instructor Applicationss', 'Instructor Applicationss', '2024-04-10 03:28:40', NULL),
(824, 3, 'Instructor Applications', 'Instructor Applications', '2024-04-10 03:28:40', NULL),
(825, 3, 'Pending applications', 'Pending applications', '2024-04-10 03:28:40', NULL),
(826, 3, 'Approved applications', 'Approved applications', '2024-04-10 03:28:40', NULL),
(827, 3, 'Document', 'Document', '2024-04-10 03:28:40', NULL),
(828, 3, 'Applicant details', 'Applicant details', '2024-04-10 03:28:40', NULL),
(829, 3, 'Application details', 'Application details', '2024-04-10 03:28:40', NULL),
(830, 3, 'Approve', 'Approve', '2024-04-10 03:28:40', NULL),
(831, 3, 'Approved', 'Approved', '2024-04-10 03:28:40', NULL),
(832, 3, 'Student List', 'Student List', '2024-04-10 03:28:49', NULL),
(833, 3, 'Create Student', 'Create Student', '2024-04-10 03:28:55', NULL),
(834, 3, 'Student Info', 'Student Info', '2024-04-10 03:28:55', NULL),
(835, 3, 'Private Message', 'Private Message', '2024-04-10 03:30:35', NULL),
(836, 3, 'Chat List', 'Chat List', '2024-04-10 03:30:35', NULL),
(837, 3, 'Create a new thread', 'Create a new thread', '2024-04-10 03:30:35', NULL),
(838, 3, 'Sent', 'Sent', '2024-04-10 03:30:46', NULL),
(839, 3, 'Your message successfully has been sent', 'Your message successfully has been sent', '2024-04-10 03:31:37', NULL),
(840, 3, 'Create a new conversation with a new user', 'Create a new conversation with a new user', '2024-04-10 03:31:45', NULL),
(841, 3, 'Select a new user', 'Select a new user', '2024-04-10 03:31:45', NULL),
(842, 3, 'Select a user', 'Select a user', '2024-04-10 03:31:45', NULL),
(843, 3, 'Next', 'Next', '2024-04-10 03:31:46', NULL),
(844, 3, 'Add Newsletter', 'Add Newsletter', '2024-04-10 03:31:54', NULL),
(845, 3, 'Send newsletter', 'Send newsletter', '2024-04-10 03:31:54', NULL),
(846, 3, 'Update Newsletter', 'Update Newsletter', '2024-04-10 03:31:54', NULL),
(847, 3, 'Send To', 'Send To', '2024-04-10 03:32:04', NULL),
(848, 3, 'Selected user', 'Selected user', '2024-04-10 03:32:04', NULL),
(849, 3, 'All user', 'All user', '2024-04-10 03:32:04', NULL),
(850, 3, 'All student', 'All student', '2024-04-10 03:32:04', NULL),
(851, 3, 'All instructor', 'All instructor', '2024-04-10 03:32:04', NULL),
(852, 3, 'Newsletter subscriber', 'Newsletter subscriber', '2024-04-10 03:32:04', NULL),
(853, 3, 'All subscriber', 'All subscriber', '2024-04-10 03:32:04', NULL),
(854, 3, 'Registered user', 'Registered user', '2024-04-10 03:32:04', NULL),
(855, 3, 'Non registered user', 'Non registered user', '2024-04-10 03:32:04', NULL),
(856, 3, 'Subject', 'Subject', '2024-04-10 03:32:04', NULL),
(857, 3, 'Send', 'Send', '2024-04-10 03:32:04', NULL),
(858, 3, 'Newsletter created successfully', 'Newsletter created successfully', '2024-04-10 03:33:26', NULL),
(859, 3, 'Newsletter deleted successfully.', 'Newsletter deleted successfully.', '2024-04-10 03:33:41', NULL),
(860, 3, 'Subscriber', 'Subscriber', '2024-04-10 03:33:47', NULL),
(861, 3, 'Subscribers', 'Subscribers', '2024-04-10 03:33:47', NULL),
(862, 3, 'User status', 'User status', '2024-04-10 03:33:47', NULL),
(863, 3, 'Not registered', 'Not registered', '2024-04-10 03:33:47', NULL),
(864, 3, 'Message Reply', 'Message Reply', '2024-04-10 03:33:56', NULL),
(865, 3, 'Coupon', 'Coupon', '2024-04-10 03:34:11', NULL),
(866, 3, 'Add Coupon', 'Add Coupon', '2024-04-10 03:34:11', NULL),
(867, 3, 'Code', 'Code', '2024-04-10 03:34:16', NULL),
(868, 3, 'Enter coupon code', 'Enter coupon code', '2024-04-10 03:34:16', NULL),
(869, 3, 'Discount (%)', 'Discount (%)', '2024-04-10 03:34:16', NULL),
(870, 3, 'Enter coupon discount', 'Enter coupon discount', '2024-04-10 03:34:16', NULL),
(871, 3, 'Expiry', 'Expiry', '2024-04-10 03:34:16', NULL),
(872, 3, 'Enter coupon expiry', 'Enter coupon expiry', '2024-04-10 03:34:16', NULL),
(873, 3, 'Choose status ...', 'Choose status ...', '2024-04-10 03:34:16', NULL),
(874, 3, 'Add new blog', 'Add new blog', '2024-04-10 03:35:59', NULL),
(875, 3, 'Creator', 'Creator', '2024-04-10 03:35:59', NULL),
(876, 3, 'Deactivate', 'Deactivate', '2024-04-10 03:35:59', NULL),
(877, 3, 'Activate', 'Activate', '2024-04-10 03:35:59', NULL),
(878, 3, 'Add Blog', 'Add Blog', '2024-04-10 03:36:28', NULL),
(879, 3, 'Enter blog title', 'Enter blog title', '2024-04-10 03:36:28', NULL),
(880, 3, 'Keywords', 'Keywords', '2024-04-10 03:36:28', NULL),
(881, 3, 'Blog banner', 'Blog banner', '2024-04-10 03:36:28', NULL),
(882, 3, 'Blog thumbnail', 'Blog thumbnail', '2024-04-10 03:36:28', NULL),
(883, 3, 'Would you like to designate it as popular?', 'Would you like to designate it as popular?', '2024-04-10 03:36:28', NULL),
(884, 3, 'Add Category', 'Add Category', '2024-04-10 03:37:29', NULL),
(885, 3, 'Blog : ', 'Blog : ', '2024-04-10 03:37:29', NULL),
(886, 3, 'Subtitle', 'Subtitle', '2024-04-10 03:37:36', NULL),
(887, 3, '(80  Character)', '(80  Character)', '2024-04-10 03:37:36', NULL),
(888, 3, 'Update category', 'Update category', '2024-04-10 03:37:36', NULL),
(889, 3, 'Category update successfully', 'Category update successfully', '2024-04-10 03:37:41', NULL),
(890, 3, 'Category Delete successfully', 'Category Delete successfully', '2024-04-10 03:38:00', NULL),
(891, 3, 'Blog Setting', 'Blog Setting', '2024-04-10 03:38:06', NULL),
(892, 3, 'Instructor permission', 'Instructor permission', '2024-04-10 03:38:06', NULL),
(893, 3, 'Select an option', 'Select an option', '2024-04-10 03:38:06', NULL),
(894, 3, 'Provide access', 'Provide access', '2024-04-10 03:38:06', NULL),
(895, 3, 'Decline access', 'Decline access', '2024-04-10 03:38:06', NULL),
(896, 3, 'Visibility on homepage', 'Visibility on homepage', '2024-04-10 03:38:06', NULL),
(897, 3, 'Visible', 'Visible', '2024-04-10 03:38:06', NULL),
(898, 3, 'Hidden', 'Hidden', '2024-04-10 03:38:06', NULL),
(899, 3, 'system setting', 'system setting', '2024-04-10 03:40:16', NULL),
(900, 3, 'Website name', 'Website name', '2024-04-10 03:40:16', NULL),
(901, 3, 'Website title', 'Website title', '2024-04-10 03:40:16', NULL),
(902, 3, 'Website keywords', 'Website keywords', '2024-04-10 03:40:17', NULL),
(903, 3, 'Website description', 'Website description', '2024-04-10 03:40:17', NULL),
(904, 3, 'Author', 'Author', '2024-04-10 03:40:17', NULL),
(905, 3, 'Slogan', 'Slogan', '2024-04-10 03:40:17', NULL),
(906, 3, 'System email', 'System email', '2024-04-10 03:40:17', NULL),
(907, 3, 'Youtube API key', 'Youtube API key', '2024-04-10 03:40:17', NULL),
(908, 3, 'Get YouTube API key', 'Get YouTube API key', '2024-04-10 03:40:17', NULL),
(909, 3, 'If you want to use Google Drive video, you need to enable the Google Drive service in this API', 'If you want to use Google Drive video, you need to enable the Google Drive service in this API', '2024-04-10 03:40:17', NULL),
(910, 3, 'Vimeo API key', 'Vimeo API key', '2024-04-10 03:40:17', NULL),
(911, 3, 'get Vimeo API key', 'get Vimeo API key', '2024-04-10 03:40:17', NULL),
(912, 3, 'System language', 'System language', '2024-04-10 03:40:17', NULL),
(913, 3, 'Course selling tax', 'Course selling tax', '2024-04-10 03:40:17', NULL),
(914, 3, 'Enter 0 if you want to disable the tax option', 'Enter 0 if you want to disable the tax option', '2024-04-10 03:40:17', NULL),
(915, 3, 'Footer text', 'Footer text', '2024-04-10 03:40:17', NULL),
(916, 3, 'Footer link', 'Footer link', '2024-04-10 03:40:17', NULL),
(917, 3, 'Update Product', 'Update Product', '2024-04-10 03:40:17', NULL),
(918, 3, 'File', 'File', '2024-04-10 03:40:17', NULL),
(919, 3, 'payment setting', 'payment setting', '2024-04-10 03:40:57', NULL),
(920, 3, 'Setup Payment Informations', 'Setup Payment Informations', '2024-04-10 03:40:57', NULL),
(921, 3, 'Select currency', 'Select currency', '2024-04-10 03:40:57', NULL),
(922, 3, 'Currency position', 'Currency position', '2024-04-10 03:40:57', NULL),
(923, 3, 'Left', 'Left', '2024-04-10 03:40:57', NULL),
(924, 3, 'Right', 'Right', '2024-04-10 03:40:57', NULL),
(925, 3, 'Left with a space', 'Left with a space', '2024-04-10 03:40:57', NULL),
(926, 3, 'Right with a space', 'Right with a space', '2024-04-10 03:40:57', NULL),
(927, 3, 'Want to keep test mode enabled', 'Want to keep test mode enabled', '2024-04-10 03:40:57', NULL),
(928, 3, 'setting', 'setting', '2024-04-10 03:40:57', NULL),
(929, 3, 'Heads up', 'Heads up', '2024-04-10 03:40:57', NULL),
(930, 3, 'Ensure that the system currency and all active payment gateway currencies are same', 'Ensure that the system currency and all active payment gateway currencies are same', '2024-04-10 03:40:57', NULL),
(931, 3, 'Configure ZOOM server-to-server-oauth credentials', 'Configure ZOOM server-to-server-oauth credentials', '2024-04-10 03:44:22', NULL),
(932, 3, 'Account Email', 'Account Email', '2024-04-10 03:44:22', NULL),
(933, 3, 'Account ID', 'Account ID', '2024-04-10 03:44:22', NULL),
(934, 3, 'Client ID', 'Client ID', '2024-04-10 03:44:22', NULL),
(935, 3, 'Client Secret', 'Client Secret', '2024-04-10 03:44:22', NULL),
(936, 3, 'Do you want to use Web SDK for your live class?', 'Do you want to use Web SDK for your live class?', '2024-04-10 03:44:23', NULL),
(937, 3, 'Meeting SDK Client ID', 'Meeting SDK Client ID', '2024-04-10 03:44:23', NULL),
(938, 3, 'Meeting SDK Client Secret', 'Meeting SDK Client Secret', '2024-04-10 03:44:23', NULL),
(939, 3, 'Notification settings', 'Notification settings', '2024-04-10 03:44:29', NULL),
(940, 3, 'Protocol', 'Protocol', '2024-04-10 03:44:29', NULL),
(941, 3, 'Smtp crypto', 'Smtp crypto', '2024-04-10 03:44:29', NULL),
(942, 3, 'Smtp host', 'Smtp host', '2024-04-10 03:44:29', NULL),
(943, 3, 'Smtp port', 'Smtp port', '2024-04-10 03:44:29', NULL),
(944, 3, 'Smtp from email', 'Smtp from email', '2024-04-10 03:44:29', NULL),
(945, 3, 'Smtp username', 'Smtp username', '2024-04-10 03:44:29', NULL),
(946, 3, 'Smtp password', 'Smtp password', '2024-04-10 03:44:29', NULL),
(947, 3, 'Certificate template', 'Certificate template', '2024-04-10 03:44:35', NULL),
(948, 3, 'Build your certificate', 'Build your certificate', '2024-04-10 03:44:35', NULL),
(949, 3, 'Upload your certificate template', 'Upload your certificate template', '2024-04-10 03:44:35', NULL),
(950, 3, 'Upload', 'Upload', '2024-04-10 03:44:35', NULL),
(951, 3, 'Certificate elements', 'Certificate elements', '2024-04-10 03:44:39', NULL),
(952, 3, 'Available Variable Data', 'Available Variable Data', '2024-04-10 03:44:39', NULL),
(953, 3, 'Add a new element', 'Add a new element', '2024-04-10 03:44:39', NULL),
(954, 3, 'Enter Text with variable data', 'Enter Text with variable data', '2024-04-10 03:44:39', NULL),
(955, 3, 'Total Lesson', 'Total Lesson', '2024-04-10 03:44:39', NULL),
(956, 3, 'Choice a font-family', 'Choice a font-family', '2024-04-10 03:44:39', NULL),
(957, 3, 'Default', 'Default', '2024-04-10 03:44:39', NULL),
(958, 3, 'Pinyon Script', 'Pinyon Script', '2024-04-10 03:44:39', NULL),
(959, 3, 'Font Size', 'Font Size', '2024-04-10 03:44:39', NULL),
(960, 3, 'Save Template', 'Save Template', '2024-04-10 03:44:39', NULL),
(961, 3, 'Manage your open ai settings', 'Manage your open ai settings', '2024-04-10 03:44:51', NULL),
(962, 3, 'Select ai model', 'Select ai model', '2024-04-10 03:44:51', NULL),
(963, 3, 'Required premium account', 'Required premium account', '2024-04-10 03:44:51', NULL),
(964, 3, 'Max tokens', 'Max tokens', '2024-04-10 03:44:51', NULL),
(965, 3, 'Page Builder', 'Page Builder', '2024-04-10 03:44:56', NULL),
(966, 3, 'Create Page', 'Create Page', '2024-04-10 03:44:56', NULL),
(967, 3, '#', '#', '2024-04-10 03:44:56', NULL),
(968, 3, 'Page Name', 'Page Name', '2024-04-10 03:44:56', NULL),
(969, 3, 'Preview', 'Preview', '2024-04-10 03:44:56', NULL),
(970, 3, 'Edit Layout', 'Edit Layout', '2024-04-10 03:44:56', NULL),
(971, 3, 'Edit Page', 'Edit Page', '2024-04-10 03:44:56', NULL),
(972, 3, 'Home page deactivated', 'Home page deactivated', '2024-04-10 03:45:00', NULL),
(973, 3, 'Enter your page name', 'Enter your page name', '2024-04-10 03:45:07', NULL),
(974, 3, 'Home page name has been updated', 'Home page name has been updated', '2024-04-10 03:45:10', NULL),
(975, 3, 'Invalid purchase code', 'Invalid purchase code', '2024-04-10 03:46:05', NULL),
(976, 3, 'Purchase code has been updated', 'Purchase code has been updated', '2024-04-10 03:46:12', NULL),
(977, 3, 'Renew support', 'Renew support', '2024-04-10 03:46:13', NULL),
(978, 3, 'Facebook link', 'Facebook link', '2024-04-10 03:47:14', NULL),
(979, 3, 'Twitter link', 'Twitter link', '2024-04-10 03:47:14', NULL),
(980, 3, 'Linkedin link', 'Linkedin link', '2024-04-10 03:47:14', NULL),
(981, 3, 'A short title about yourself', 'A short title about yourself', '2024-04-10 03:47:14', NULL),
(982, 3, 'Write your skill and click the enter button', 'Write your skill and click the enter button', '2024-04-10 03:47:14', NULL),
(983, 3, 'Photo', 'Photo', '2024-04-10 03:47:14', NULL),
(984, 3, 'The image size should be any square image', 'The image size should be any square image', '2024-04-10 03:47:14', NULL),
(985, 3, 'Update profile', 'Update profile', '2024-04-10 03:47:14', NULL),
(986, 3, 'Current password', 'Current password', '2024-04-10 03:47:14', NULL),
(987, 3, 'New password', 'New password', '2024-04-10 03:47:14', NULL),
(988, 3, 'Confirm password', 'Confirm password', '2024-04-10 03:47:14', NULL),
(989, 3, 'Update password', 'Update password', '2024-04-10 03:47:14', NULL),
(990, 3, 'The Leader in online learning', 'The Leader in online learning', '2024-04-10 05:22:16', NULL),
(991, 3, 'Fast Performance', 'Fast Performance', '2024-04-10 05:22:16', NULL),
(992, 3, 'It is a long established fact that a reader will be distracted.', 'It is a long established fact that a reader will be distracted.', '2024-04-10 05:22:16', NULL),
(993, 3, 'Perfect Responsive', 'Perfect Responsive', '2024-04-10 05:22:16', NULL),
(994, 3, 'Fast & Friendly Support', 'Fast & Friendly Support', '2024-04-10 05:22:16', NULL),
(995, 3, 'Easy to Use', 'Easy to Use', '2024-04-10 05:22:16', NULL),
(996, 3, 'Explore Top Courses Categories', 'Explore Top Courses Categories', '2024-04-10 05:22:17', NULL),
(997, 3, 'Featured Courses', 'Featured Courses', '2024-04-10 05:22:17', NULL),
(998, 3, '150k +', '150k +', '2024-04-10 05:22:17', NULL),
(999, 3, 'Top rated Courses', 'Top rated Courses', '2024-04-10 05:22:17', NULL),
(1000, 3, 'Learn & Grow Your Skills From ', 'Learn & Grow Your Skills From ', '2024-04-10 05:22:17', NULL),
(1001, 3, 'Educate', 'Educate', '2024-04-10 05:22:17', NULL),
(1002, 3, 'Have a look on our blogs', 'Have a look on our blogs', '2024-04-10 05:22:17', NULL),
(1003, 3, 'Writing your keyword and hit the enter', 'Writing your keyword and hit the enter', '2024-04-10 05:22:28', NULL),
(1004, 3, 'Home page activated', 'Home page activated', '2024-04-17 23:26:52', NULL),
(1005, 3, 'Application language has been changed.', 'Application language has been changed.', '2024-04-19 23:46:10', NULL),
(1006, 3, 'View site', 'View site', '2024-04-20 03:04:58', NULL),
(1007, 3, 'Sign Out', 'Sign Out', '2024-04-20 03:04:58', NULL),
(1008, 3, 'Best course', 'Best course', '2024-04-20 03:27:14', NULL),
(1009, 3, 'Status has been updated.', 'Status has been updated.', '2024-04-20 03:30:59', NULL),
(1010, 3, 'Curriculum', 'Curriculum', '2024-04-20 03:31:57', NULL),
(1011, 3, 'Pricing', 'Pricing', '2024-04-20 03:31:57', NULL),
(1012, 3, 'Info', 'Info', '2024-04-20 03:31:57', NULL),
(1013, 3, 'Media', 'Media', '2024-04-20 03:31:57', NULL),
(1014, 3, 'SEO', 'SEO', '2024-04-20 03:31:57', NULL),
(1015, 3, 'Finish', 'Finish', '2024-04-20 03:31:57', NULL),
(1016, 3, 'Add new section', 'Add new section', '2024-04-20 03:31:57', NULL),
(1017, 3, 'Add section', 'Add section', '2024-04-20 03:31:57', NULL),
(1018, 3, 'Add new lesson', 'Add new lesson', '2024-04-20 03:31:57', NULL),
(1019, 3, 'Add lesson', 'Add lesson', '2024-04-20 03:31:57', NULL),
(1020, 3, 'Add new quiz', 'Add new quiz', '2024-04-20 03:31:57', NULL),
(1021, 3, 'Add quiz', 'Add quiz', '2024-04-20 03:31:57', NULL),
(1022, 3, 'Sort sections', 'Sort sections', '2024-04-20 03:31:57', NULL),
(1023, 3, 'Short section', 'Short section', '2024-04-20 03:31:57', NULL),
(1024, 3, 'Go to courses', 'Go to courses', '2024-04-20 04:57:05', NULL),
(1025, 3, 'Become An Instructors', 'Become An Instructors', '2024-04-20 04:58:34', NULL),
(1026, 3, 'Buy Course', 'Buy Course', '2024-04-20 04:58:45', NULL),
(1027, 3, 'Add wishlist', 'Add wishlist', '2024-04-20 04:58:45', NULL),
(1028, 3, 'User is already enrolled in this course.', 'User is already enrolled in this course.', '2024-04-20 05:03:38', NULL),
(1029, 3, 'Item added to wishlist.', 'Item added to wishlist.', '2024-04-20 05:04:39', NULL),
(1030, 3, 'Remove wishlist', 'Remove wishlist', '2024-04-20 05:04:39', NULL),
(1031, 3, 'Item removed from wishlist.', 'Item removed from wishlist.', '2024-04-20 05:04:42', NULL),
(1032, 3, 'Course Cnrollment', 'Course Cnrollment', NULL, NULL),
(1033, 3, 'Manage Blog', 'Manage Blog', NULL, NULL),
(1034, 3, 'Help center', 'Help center', NULL, NULL),
(1035, 3, 'Read documentation', 'Read documentation', NULL, NULL),
(1036, 3, 'Watch video tutorial', 'Watch video tutorial', NULL, NULL),
(1037, 3, 'Order customization', 'Order customization', NULL, NULL),
(1038, 3, 'Request a new feature', 'Request a new feature', NULL, NULL),
(1039, 3, 'Get Services', 'Get Services', NULL, NULL),
(1040, 3, 'Section', 'Section', NULL, NULL),
(1041, 3, 'Sales', 'Sales', NULL, NULL),
(1042, 3, 'Payout', 'Payout', NULL, NULL),
(1043, 3, 'Withdraw', 'Withdraw', NULL, NULL),
(1044, 3, 'Manage Blogs', 'Manage Blogs', NULL, NULL),
(1045, 3, 'Sort Section', 'Sort Section', NULL, NULL),
(1046, 3, 'Sort lessons', 'Sort lessons', NULL, NULL),
(1047, 3, 'Edit section', 'Edit section', NULL, NULL),
(1048, 3, 'Edit lesson', 'Edit lesson', NULL, NULL),
(1049, 3, 'Add a new live class', 'Add a new live class', NULL, NULL),
(1050, 3, 'Schedule a new live class', 'Schedule a new live class', NULL, NULL),
(1051, 3, 'Class topic', 'Class topic', NULL, NULL),
(1052, 3, 'Class Schedule', 'Class Schedule', NULL, NULL),
(1053, 3, 'Start live class', 'Start live class', NULL, NULL),
(1054, 3, 'Edit live class', 'Edit live class', NULL, NULL),
(1055, 3, 'Discount type', 'Discount type', NULL, NULL),
(1056, 3, 'FAQ question', 'FAQ question', NULL, NULL),
(1057, 3, 'Requirements', 'Requirements', NULL, NULL),
(1058, 3, 'Provide requirements', 'Provide requirements', NULL, NULL),
(1059, 3, 'Provide outcomes', 'Provide outcomes', NULL, NULL),
(1060, 3, 'Banner', 'Banner', NULL, NULL),
(1061, 3, 'Preview Video', 'Preview Video', NULL, NULL),
(1062, 3, 'Thank you !', 'Thank you !', NULL, NULL),
(1063, 3, 'You are just one click away', 'You are just one click away', NULL, NULL),
(1064, 3, 'Message thread successfully created', 'Message thread successfully created', NULL, NULL),
(1065, 3, 'User', 'User', NULL, NULL),
(1066, 3, 'Item', 'Item', NULL, NULL),
(1067, 3, 'Paid amount', 'Paid amount', NULL, NULL),
(1068, 3, 'Purchased date', 'Purchased date', NULL, NULL),
(1069, 3, 'Billed To', 'Billed To', NULL, NULL),
(1070, 3, 'Issue Date', 'Issue Date', NULL, NULL),
(1071, 3, 'Qty/Hr Rate', 'Qty/Hr Rate', NULL, NULL),
(1072, 3, 'Subtotal', 'Subtotal', NULL, NULL),
(1073, 3, 'Student add successfully', 'Student add successfully', NULL, NULL),
(1074, 3, 'Add new enrollment', 'Add new enrollment', NULL, NULL),
(1075, 3, 'Class date and time', 'Class date and time', NULL, NULL),
(1076, 3, 'Note for your student', 'Note for your student', NULL, NULL),
(1077, 3, 'Create', 'Create', NULL, NULL),
(1078, 3, 'System settings update successfully', 'System settings update successfully', NULL, NULL),
(1079, 3, 'Help', 'Help', NULL, NULL),
(1080, 3, 'Sections sorted successfully', 'Sections sorted successfully', NULL, NULL),
(1081, 3, 'Select lesson type', 'Select lesson type', NULL, NULL),
(1082, 3, 'YouTube Video', 'YouTube Video', NULL, NULL),
(1083, 3, 'Vimeo Video', 'Vimeo Video', NULL, NULL),
(1084, 3, 'Video file', 'Video file', NULL, NULL),
(1085, 3, 'Video url [ .mp4 ]', 'Video url [ .mp4 ]', NULL, NULL),
(1086, 3, 'Google drive video', 'Google drive video', NULL, NULL),
(1087, 3, 'Document file', 'Document file', NULL, NULL),
(1088, 3, 'Text', 'Text', NULL, NULL),
(1089, 3, 'Iframe embed', 'Iframe embed', NULL, NULL),
(1090, 3, 'Lesson type', 'Lesson type', NULL, NULL),
(1091, 3, 'youtube', 'youtube', NULL, NULL),
(1092, 3, 'Video', 'Video', NULL, NULL),
(1093, 3, 'Change', 'Change', NULL, NULL),
(1094, 3, 'Video url', 'Video url', NULL, NULL),
(1095, 3, 'Invalid url', 'Invalid url', NULL, NULL),
(1096, 3, 'Your video source has to be either YouTube', 'Your video source has to be either YouTube', NULL, NULL),
(1097, 3, 'Analyzing', 'Analyzing', NULL, NULL),
(1098, 3, 'Do you want to keep it free as a preview lesson', 'Do you want to keep it free as a preview lesson', NULL, NULL),
(1099, 3, 'Mark as free lesson', 'Mark as free lesson', NULL, NULL),
(1100, 3, 'Enter your text', 'Enter your text', NULL, NULL),
(1101, 3, 'lesson added successfully', 'lesson added successfully', NULL, NULL),
(1102, 3, 'Course Edit', 'Course Edit', NULL, NULL),
(1103, 3, 'Editing', 'Editing', NULL, NULL),
(1104, 3, 'Enter title', 'Enter title', NULL, NULL),
(1105, 3, 'Upload system video file', 'Upload system video file', NULL, NULL),
(1106, 3, 'Caption', 'Caption', NULL, NULL),
(1107, 3, '.vtt', '.vtt', NULL, NULL),
(1108, 3, 'vimeo', 'vimeo', NULL, NULL),
(1109, 3, 'Your video source has to be either Vimeo', 'Your video source has to be either Vimeo', NULL, NULL),
(1110, 3, 'Clear', 'Clear', NULL, NULL),
(1111, 3, 'PDF', 'PDF', NULL, NULL),
(1112, 3, 'CSV', 'CSV', NULL, NULL),
(1113, 3, 'Total amount', 'Total amount', NULL, NULL),
(1114, 3, 'Enrolled', 'Enrolled', NULL, NULL),
(1115, 3, 'Enrolled: ', 'Enrolled: ', NULL, NULL),
(1116, 3, 'Coupon code', 'Coupon code', NULL, NULL),
(1117, 3, 'Edit Coupon', 'Edit Coupon', NULL, NULL),
(1118, 3, 'Search coupon', 'Search coupon', NULL, NULL),
(1119, 3, 'Total number of blog', 'Total number of blog', NULL, NULL),
(1120, 3, 'Search email', 'Search email', NULL, NULL),
(1121, 3, 'Search Contact', 'Search Contact', NULL, NULL),
(1122, 3, 'Edit Newsletter', 'Edit Newsletter', NULL, NULL),
(1123, 3, 'Duplicate Course', 'Duplicate Course', NULL, NULL),
(1124, 3, 'Course updated successfully', 'Course updated successfully', NULL, NULL),
(1125, 3, 'Add a new Section', 'Add a new Section', NULL, NULL),
(1126, 3, 'Payouts', 'Payouts', NULL, NULL),
(1127, 3, 'Request a new withdrawal', 'Request a new withdrawal', NULL, NULL),
(1128, 3, 'Request withdrawal', 'Request withdrawal', NULL, NULL),
(1129, 3, 'Available', 'Available', NULL, NULL),
(1130, 3, 'Total payout', 'Total payout', NULL, NULL),
(1131, 3, 'Requested', 'Requested', NULL, NULL),
(1132, 3, 'Be careful !!', 'Be careful !!', NULL, NULL),
(1133, 3, 'Just configure the payment gateway you want to use, leave the rest blank.', 'Just configure the payment gateway you want to use, leave the rest blank.', NULL, NULL),
(1134, 3, 'Also, make sure that you have configured your payment settings correctly', 'Also, make sure that you have configured your payment settings correctly', NULL, NULL),
(1135, 3, 'Category Name', 'Category Name', NULL, NULL),
(1136, 3, 'Enter your category name', 'Enter your category name', NULL, NULL),
(1137, 3, 'Enter your unique category name', 'Enter your unique category name', NULL, NULL),
(1138, 3, 'Pick Your Icon', 'Pick Your Icon', NULL, NULL),
(1139, 3, 'Pick your category icon', 'Pick your category icon', NULL, NULL),
(1140, 3, 'optional', 'optional', NULL, NULL),
(1141, 3, 'Category Description', 'Category Description', NULL, NULL),
(1142, 3, 'Enter your description', 'Enter your description', NULL, NULL),
(1143, 3, 'Parent category', 'Parent category', NULL, NULL),
(1144, 3, '- Mark it as parent -', '- Mark it as parent -', NULL, NULL),
(1145, 3, 'Choose category thumbnail', 'Choose category thumbnail', NULL, NULL),
(1146, 3, 'Writing your keyword and hit htw enter button', 'Writing your keyword and hit htw enter button', NULL, NULL),
(1147, 3, 'Update Blog', 'Update Blog', NULL, NULL),
(1148, 3, 'Blog that help beginner designers become true unicorns.', 'Blog that help beginner designers become true unicorns.', NULL, NULL),
(1149, 3, 'Popular Post', 'Popular Post', NULL, NULL),
(1150, 3, 'Tags', 'Tags', NULL, NULL),
(1151, 3, 'SEO Fields', 'SEO Fields', NULL, NULL),
(1152, 3, 'Blog update successfully', 'Blog update successfully', NULL, NULL),
(1153, 3, 'Application language updated.', 'Application language updated.', NULL, NULL),
(1154, 3, 'Add new', 'Add new', NULL, NULL),
(1155, 3, 'Remove', 'Remove', NULL, NULL),
(1156, 3, 'Delete section', 'Delete section', NULL, NULL),
(1157, 3, 'Delete lesson', 'Delete lesson', NULL, NULL),
(1158, 3, 'Download', 'Download', NULL, NULL),
(1159, 3, 'Applicant', 'Applicant', NULL, NULL),
(1160, 3, 'File does not exists', 'File does not exists', NULL, NULL),
(1161, 3, 'Update Student', 'Update Student', NULL, NULL),
(1162, 3, 'New message', 'New message', NULL, NULL),
(1163, 3, 'Your changes has been saved.', 'Your changes has been saved.', NULL, NULL),
(1164, 3, 'Update coupon', 'Update coupon', NULL, NULL),
(1165, 3, 'Category updated successfully', 'Category updated successfully', NULL, NULL),
(1166, 3, 'course_thumbnail', 'course_thumbnail', NULL, NULL),
(1167, 3, 'user_photo', 'user_photo', NULL, NULL),
(1168, 3, 'Item removed from cart.', 'Item removed from cart.', NULL, NULL),
(1169, 3, 'Promo Video Provider', 'Promo Video Provider', NULL, NULL),
(1170, 3, 'Youtube Video Link', 'Youtube Video Link', NULL, NULL),
(1171, 3, 'Vimeo Video Link', 'Vimeo Video Link', NULL, NULL),
(1172, 3, 'HTML5 Video link', 'HTML5 Video link', NULL, NULL),
(1173, 3, 'Promo video link', 'Promo video link', NULL, NULL),
(1174, 3, 'Frontend settings update successfully', 'Frontend settings update successfully', NULL, NULL),
(1175, 3, 'Creativeitem is committed to protecting your information and privacy. We will describe how we collect, use, and publish your personal information or data when you visit, subscribe, register, or purchase from Creativeitem in our privacy policy.', 'Creativeitem is committed to protecting your information and privacy. We will describe how we collect, use, and publish your personal information or data when you visit, subscribe, register, or purchase from Creativeitem in our privacy policy.', NULL, NULL),
(1176, 3, 'Explore Courses', 'Explore Courses', NULL, NULL),
(1177, 3, 'Manage Newsletters', 'Manage Newsletters', NULL, NULL),
(1178, 3, 'Learn, Grow, Achieve', 'Learn, Grow, Achieve', NULL, NULL),
(1179, 3, 'Emphasizes continuous improvement and success through education', 'Emphasizes continuous improvement and success through education', NULL, NULL),
(1180, 3, 'Unlock Your Potential', 'Unlock Your Potential', NULL, NULL),
(1181, 3, 'Encourages learners to realize their capabilities and excel', 'Encourages learners to realize their capabilities and excel', NULL, NULL),
(1182, 3, 'Knowledge Empowers You', 'Knowledge Empowers You', NULL, NULL),
(1183, 3, 'Highlights the transformative power of education in personal development', 'Highlights the transformative power of education in personal development', NULL, NULL),
(1184, 3, 'Expand Your Horizons', 'Expand Your Horizons', NULL, NULL),
(1185, 3, 'Inspires exploration and broadening of perspectives through learning', 'Inspires exploration and broadening of perspectives through learning', NULL, NULL),
(1186, 3, 'Knowledge is power', 'Knowledge is power', NULL, NULL),
(1187, 3, 'Draws attention to the way that education can change a persons life', 'Draws attention to the way that education can change a persons life', NULL, NULL),
(1188, 3, 'Course added successfully', 'Course added successfully', NULL, NULL),
(1189, 3, 'Frontent View', 'Frontent View', NULL, NULL),
(1190, 3, 'Course Player', 'Course Player', NULL, NULL),
(1191, 3, 'Admin add successfully', 'Admin add successfully', NULL, NULL),
(1192, 3, 'Payment type', 'Payment type', NULL, NULL),
(1193, 3, 'Pay for instructor payout', 'Pay for instructor payout', NULL, NULL),
(1194, 3, '', '', NULL, NULL),
(1195, 3, 'View on frontend', 'View on frontend', NULL, NULL),
(1196, 3, 'Heads up !!', 'Heads up !!', NULL, NULL),
(1197, 3, 'Edit ____ phrases', 'Edit ____ phrases', NULL, NULL),
(1198, 3, 'Certificate template has been updated', 'Certificate template has been updated', NULL, NULL),
(1199, 3, 'Certificate builder template has been updated', 'Certificate builder template has been updated', NULL, NULL),
(1200, 3, 'Page layout has been updated', 'Page layout has been updated', NULL, NULL),
(1201, 3, 'Top course', 'Top course', NULL, NULL),
(1202, 3, 'FAQ area empty', 'FAQ area empty', NULL, NULL),
(1203, 3, 'You have successfully subscribed.', 'You have successfully subscribed.', NULL, NULL),
(1204, 3, 'Already purchased the course.', 'Already purchased the course.', NULL, NULL),
(1205, 3, 'Start Now', 'Start Now', NULL, NULL),
(1206, 3, 'Enroll Now', 'Enroll Now', NULL, NULL),
(1207, 3, 'Add to wishlist', 'Add to wishlist', NULL, NULL),
(1208, 3, 'Buy Now', 'Buy Now', NULL, NULL),
(1209, 3, 'Remove from wishlist', 'Remove from wishlist', NULL, NULL),
(1210, 3, 'Wishlisted courses', 'Wishlisted courses', NULL, NULL),
(1211, 3, 'Date of issue', 'Date of issue', NULL, NULL),
(1212, 3, 'Builed to :', 'Builed to :', NULL, NULL),
(1213, 3, 'Become an instructor', 'Become an instructor', NULL, NULL),
(1214, 3, '+0 (123) 456 - 7890', '+0 (123) 456 - 7890', NULL, NULL),
(1215, 3, 'Documents of qualification. Max-size : 3MB (DOC, DOCX, PDF, TXT, PNG, JPG, JPEG)', 'Documents of qualification. Max-size : 3MB (DOC, DOCX, PDF, TXT, PNG, JPG, JPEG)', NULL, NULL),
(1216, 3, 'Your description here...', 'Your description here...', NULL, NULL),
(1217, 3, 'Apply for instructor', 'Apply for instructor', NULL, NULL),
(1218, 3, 'Forum', 'Forum', NULL, NULL),
(1219, 3, 'Search your courses...', 'Search your courses...', NULL, NULL),
(1220, 3, 'Questions in this course', 'Questions in this course', NULL, NULL),
(1221, 3, 'Ask question', 'Ask question', NULL, NULL),
(1222, 3, 'Live class added successfully', 'Live class added successfully', NULL, NULL),
(1223, 3, 'Section added successfully', 'Section added successfully', NULL, NULL),
(1224, 3, 'No lessons are available.', 'No lessons are available.', NULL, NULL),
(1225, 3, 'Update lesson', 'Update lesson', NULL, NULL),
(1226, 3, 'Frontend View', 'Frontend View', NULL, NULL),
(1227, 3, 'Join Now', 'Join Now', NULL, NULL),
(1228, 3, 'Not registered for this course.', 'Not registered for this course.', NULL, NULL),
(1229, 3, 'Title or summary', 'Title or summary', NULL, NULL),
(1230, 3, 'Publish', 'Publish', NULL, NULL),
(1231, 3, 'Question added successfully.', 'Question added successfully.', NULL, NULL),
(1232, 3, 'Report', 'Report', NULL, NULL),
(1233, 3, 'Dislike', 'Dislike', NULL, NULL),
(1234, 3, 'Your like has been added.', 'Your like has been added.', NULL, NULL),
(1235, 3, 'Question updated successfully.', 'Question updated successfully.', NULL, NULL),
(1236, 3, 'Reply added successfully.', 'Reply added successfully.', NULL, NULL),
(1237, 3, 'Reply updated successfully.', 'Reply updated successfully.', NULL, NULL),
(1238, 3, 'Question deleted successfully.', 'Question deleted successfully.', NULL, NULL),
(1239, 3, 'Search queations', 'Search queations', NULL, NULL),
(1240, 3, 'Search for answers from other users', 'Search for answers from other users', NULL, NULL),
(1241, 3, 'Search answers here', 'Search answers here', NULL, NULL),
(1242, 3, 'Manage Course', 'Manage Course', NULL, NULL),
(1243, 3, 'Useful links', 'Useful links', NULL, NULL),
(1244, 3, 'Ops! coupon is expired.', 'Ops! coupon is expired.', NULL, NULL),
(1245, 3, 'Purchase Course', 'Purchase Course', NULL, NULL),
(1246, 3, 'Payment for course purchase.', 'Payment for course purchase.', NULL, NULL),
(1247, 3, 'No data found !', 'No data found !', NULL, NULL),
(1248, 3, 'Ops! You own this course.', 'Ops! You own this course.', NULL, NULL),
(1249, 3, 'This course added to your wishlist', 'This course added to your wishlist', NULL, NULL),
(1250, 3, 'This course removed from your wishlist', 'This course removed from your wishlist', NULL, NULL),
(1251, 3, 'Cancel Payment', 'Cancel Payment', NULL, NULL),
(1252, 3, 'Applyed', 'Applyed', NULL, NULL),
(1253, 3, 'This coupon is not valid.', 'This coupon is not valid.', NULL, NULL),
(1254, 3, '-', '-', NULL, NULL),
(1255, 3, 'Status has been updated', 'Status has been updated', NULL, NULL),
(1256, 3, 'Payable amount', 'Payable amount', NULL, NULL),
(1257, 3, 'Bank info', 'Bank info', NULL, NULL),
(1258, 3, 'Payment Document', 'Payment Document', NULL, NULL),
(1259, 3, '(jpg, pdf, txt, png, docx)', '(jpg, pdf, txt, png, docx)', NULL, NULL),
(1260, 3, 'Pay offline', 'Pay offline', NULL, NULL),
(1261, 3, 'Invalid amount.', 'Invalid amount.', NULL, NULL),
(1262, 3, 'Your request is in process.', 'Your request is in process.', NULL, NULL),
(1263, 3, 'Payment info', 'Payment info', NULL, NULL),
(1264, 3, 'Tax : ', 'Tax : ', NULL, NULL),
(1265, 3, 'Bank : ', 'Bank : ', NULL, NULL),
(1266, 3, 'Accept', 'Accept', NULL, NULL),
(1267, 3, 'Decline', 'Decline', NULL, NULL),
(1268, 3, 'Paid amount : ', 'Paid amount : ', NULL, NULL),
(1269, 3, 'Suspended', 'Suspended', NULL, NULL),
(1270, 3, 'Accepted', 'Accepted', NULL, NULL),
(1271, 3, 'Enrollment', 'Enrollment', NULL, NULL),
(1272, 3, 'Enrolled user : ', 'Enrolled user : ', NULL, NULL),
(1273, 3, 'Enroled date : ', 'Enroled date : ', NULL, NULL),
(1274, 3, 'Revenue : ', 'Revenue : ', NULL, NULL),
(1275, 3, 'Course price : ', 'Course price : ', NULL, NULL),
(1276, 3, 'Withdrawal amount', 'Withdrawal amount', NULL, NULL),
(1277, 3, 'The amount should not be more than', 'The amount should not be more than', NULL, NULL),
(1278, 3, 'Request', 'Request', NULL, NULL),
(1279, 3, 'Your request has been submitted.', 'Your request has been submitted.', NULL, NULL),
(1280, 3, 'Delete request', 'Delete request', NULL, NULL),
(1281, 3, 'Date processed', 'Date processed', NULL, NULL),
(1282, 3, 'Your request has been deleted.', 'Your request has been deleted.', NULL, NULL),
(1283, 3, 'Bootcamps', 'Bootcamps', NULL, NULL),
(1284, 3, 'Bootcamp', 'Bootcamp', NULL, NULL),
(1285, 3, 'Manage Bootcamps', 'Manage Bootcamps', NULL, NULL),
(1286, 3, 'Pending Bootcamps', 'Pending Bootcamps', NULL, NULL),
(1287, 3, 'Add New Bootcamp', 'Add New Bootcamp', NULL, NULL),
(1288, 3, 'Admin Panel', 'Admin Panel', NULL, NULL),
(1289, 3, 'Make As Inactive', 'Make As Inactive', NULL, NULL),
(1290, 3, 'Instructor Panel', 'Instructor Panel', NULL, NULL),
(1291, 3, 'Dark logo update successfully', 'Dark logo update successfully', NULL, NULL),
(1292, 3, 'Favicon logo update successfully', 'Favicon logo update successfully', NULL, NULL),
(1293, 3, 'Buy The Course', 'Buy The Course', NULL, NULL),
(1294, 3, 'Special Featured Course.', 'Special Featured Course.', NULL, NULL),
(1295, 3, 'Lorem Ipsum has been the industry\'s standard dummy text ever since the  unknown printer took a galley of type and scrambled', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the  unknown printer took a galley of type and scrambled', NULL, NULL),
(1296, 3, 'View More', 'View More', NULL, NULL),
(1297, 3, 'Why Choose Us', 'Why Choose Us', NULL, NULL),
(1298, 3, 'Happy student', 'Happy student', NULL, NULL),
(1299, 3, 'Quality educators', 'Quality educators', NULL, NULL),
(1300, 3, 'Premium courses', 'Premium courses', NULL, NULL),
(1301, 3, 'Cost-free course', 'Cost-free course', NULL, NULL),
(1302, 3, 'Top Rated Course', 'Top Rated Course', NULL, NULL);
INSERT INTO `language_phrases` (`id`, `language_id`, `phrase`, `translated`, `created_at`, `updated_at`) VALUES
(1303, 3, 'What the people Thinks About Us', 'What the people Thinks About Us', NULL, NULL),
(1304, 3, 'Frequently Asked Questions', 'Frequently Asked Questions', NULL, NULL),
(1305, 3, 'Our Latest Blog', 'Our Latest Blog', NULL, NULL),
(1306, 3, 'Edit Home Page', 'Edit Home Page', NULL, NULL),
(1307, 3, 'Edit Home', 'Edit Home', NULL, NULL),
(1308, 3, 'About Us Image', 'About Us Image', NULL, NULL),
(1309, 3, 'Faq  Image', 'Faq  Image', NULL, NULL),
(1310, 3, 'Faq Image', 'Faq Image', NULL, NULL),
(1311, 3, 'Meditation Big  Image', 'Meditation Big  Image', NULL, NULL),
(1312, 3, 'Big Image', 'Big Image', NULL, NULL),
(1313, 3, 'Meditation Featured', 'Meditation Featured', NULL, NULL),
(1314, 3, 'LEARN FROM TODAY', 'LEARN FROM TODAY', NULL, NULL),
(1315, 3, 'Watch Demo', 'Watch Demo', NULL, NULL),
(1316, 3, 'Enrolled Learners', 'Enrolled Learners', NULL, NULL),
(1317, 3, 'Online Instructors', 'Online Instructors', NULL, NULL),
(1318, 3, 'Video title', 'Video title', NULL, NULL),
(1319, 3, 'Expert Mentors', 'Expert Mentors', NULL, NULL),
(1320, 3, 'Students Globally', 'Students Globally', NULL, NULL),
(1321, 3, 'Cost Free Course', 'Cost Free Course', NULL, NULL),
(1322, 3, 'Top Courses', 'Top Courses', NULL, NULL),
(1323, 3, 'Awesome  site. on the top advertising a business online includes assembling Having the most keep.', 'Awesome  site. on the top advertising a business online includes assembling Having the most keep.', NULL, NULL),
(1324, 3, 'lessons', 'lessons', NULL, NULL),
(1325, 3, 'What they’re saying about our courses', 'What they’re saying about our courses', NULL, NULL),
(1326, 3, 'Having enjoyed a breathlessly successful 2015, there can be no DJ  dynamic set of teaching tools built to be deployed.', 'Having enjoyed a breathlessly successful 2015, there can be no DJ  dynamic set of teaching tools built to be deployed.', NULL, NULL),
(1327, 3, 'User Reviews', 'User Reviews', NULL, NULL),
(1328, 3, 'Mobile App download Link', 'Mobile App download Link', NULL, NULL),
(1329, 3, 'Add new Review', 'Add new Review', NULL, NULL),
(1330, 3, 'Rating', 'Rating', NULL, NULL),
(1331, 3, 'The page name has been updated', 'The page name has been updated', NULL, NULL),
(1332, 3, 'WELLCOME TO CHEF', 'WELLCOME TO CHEF', NULL, NULL),
(1333, 3, 'Get Courses', 'Get Courses', NULL, NULL),
(1334, 3, 'Latest Top Skills', 'Latest Top Skills', NULL, NULL),
(1335, 3, 'Awesome  site the top advertising been business.', 'Awesome  site the top advertising been business.', NULL, NULL),
(1336, 3, 'Industry Experts', 'Industry Experts', NULL, NULL),
(1337, 3, 'Learning From Anywhere', 'Learning From Anywhere', NULL, NULL),
(1338, 3, 'Think more clearly', 'Think more clearly', NULL, NULL),
(1339, 3, 'Our Popular Instructor', 'Our Popular Instructor', NULL, NULL),
(1340, 3, 'Frequently Asked Questions?', 'Frequently Asked Questions?', NULL, NULL),
(1341, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate ad litora torquent per conubi himenaeos Awesome  site Lorem Ipsum has been the industry\'s standard dummy text ever since.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate ad litora torquent per conubi himenaeos Awesome  site Lorem Ipsum has been the industry\'s standard dummy text ever since.', NULL, NULL),
(1342, 3, 'Follow The Latest News', 'Follow The Latest News', NULL, NULL),
(1343, 3, 'Creating A Community Of Life Long Learners', 'Creating A Community Of Life Long Learners', NULL, NULL),
(1344, 3, 'Training programs can bring you a super exciting experience of learning through online! You never face any negative experience while enjoying your classes.', 'Training programs can bring you a super exciting experience of learning through online! You never face any negative experience while enjoying your classes.', NULL, NULL),
(1345, 3, 'Our Online Courses', 'Our Online Courses', NULL, NULL),
(1346, 3, 'Education For Eeveryone', 'Education For Eeveryone', NULL, NULL),
(1347, 3, 'User already register and signing up for using it', 'User already register and signing up for using it', NULL, NULL),
(1348, 3, 'Online Instructor have a new ideas every week.', 'Online Instructor have a new ideas every week.', NULL, NULL),
(1349, 3, 'Know About Academy LMS Learning Platform', 'Know About Academy LMS Learning Platform', NULL, NULL),
(1350, 3, 'Far far away, behind the word mountains, far from the away countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.', 'Far far away, behind the word mountains, far from the away countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.', NULL, NULL),
(1351, 3, 'Online Instructor', 'Online Instructor', NULL, NULL),
(1352, 3, 'Awesome  site. on the top advertising a business online includes assembling Having services.', 'Awesome  site. on the top advertising a business online includes assembling Having services.', NULL, NULL),
(1353, 3, 'Flexible Classes', 'Flexible Classes', NULL, NULL),
(1354, 3, 'Free Resources Learning English for Beginner', 'Free Resources Learning English for Beginner', NULL, NULL),
(1355, 3, 'Instructor have a new ideas every week.', 'Instructor have a new ideas every week.', NULL, NULL),
(1356, 3, 'Meet Our Team', 'Meet Our Team', NULL, NULL),
(1357, 3, 'Watch Video', 'Watch Video', NULL, NULL),
(1358, 3, 'Get Free Book', 'Get Free Book', NULL, NULL),
(1359, 3, 'Start Learning', 'Start Learning', NULL, NULL),
(1360, 3, 'Coding', 'Coding', NULL, NULL),
(1361, 3, 'Languages', 'Languages', NULL, NULL),
(1362, 3, 'The industry\'s standard dummy text ever since the  unknown printer took a galley of type and scrambled', 'The industry\'s standard dummy text ever since the  unknown printer took a galley of type and scrambled', NULL, NULL),
(1363, 3, 'Top Instructors', 'Top Instructors', NULL, NULL),
(1364, 3, 'Online Certificates', 'Online Certificates', NULL, NULL),
(1365, 3, 'Pick A Course To', 'Pick A Course To', NULL, NULL),
(1366, 3, 'Frequently Asked', 'Frequently Asked', NULL, NULL),
(1367, 3, 'Questions', 'Questions', NULL, NULL),
(1368, 3, 'What Our', 'What Our', NULL, NULL),
(1369, 3, 'Have To Say', 'Have To Say', NULL, NULL),
(1370, 3, 'Get News with', 'Get News with', NULL, NULL),
(1371, 3, 'Academy', 'Academy', NULL, NULL),
(1372, 3, 'Subscribe', 'Subscribe', NULL, NULL),
(1373, 3, 'Participant', 'Participant', NULL, NULL),
(1374, 3, 'Online Free Courses', 'Online Free Courses', NULL, NULL),
(1375, 3, '10%', '10%', NULL, NULL),
(1376, 3, 'Lessons for beginner', 'Lessons for beginner', NULL, NULL),
(1377, 3, 'See All Courses', 'See All Courses', NULL, NULL),
(1378, 3, 'The benefit of Yoga Expedition', 'The benefit of Yoga Expedition', NULL, NULL),
(1379, 3, 'See All Blogs', 'See All Blogs', NULL, NULL),
(1380, 3, 'New home page layout has been added', 'New home page layout has been added', NULL, NULL),
(1381, 3, 'No Course Description', 'No Course Description', NULL, NULL),
(1382, 3, 'Choose category Logo', 'Choose category Logo', NULL, NULL),
(1383, 3, '© 2024 All Rights Reserved', '© 2024 All Rights Reserved', NULL, NULL),
(1384, 3, 'Special Featured Course', 'Special Featured Course', NULL, NULL),
(1385, 3, 'Visit Courses', 'Visit Courses', NULL, NULL),
(1386, 3, 'Blog added successfully', 'Blog added successfully', NULL, NULL),
(1387, 3, 'Edit Blog', 'Edit Blog', NULL, NULL),
(1388, 3, 'Blog updated successfully', 'Blog updated successfully', NULL, NULL),
(1389, 3, 'Share', 'Share', NULL, NULL),
(1390, 3, 'Video Link', 'Video Link', NULL, NULL),
(1391, 3, 'Supported URL', 'Supported URL', NULL, NULL),
(1392, 3, 'HTML 5 Video link', 'HTML 5 Video link', NULL, NULL),
(1393, 3, 'or', 'or', NULL, NULL),
(1394, 3, 'Supported Video file', 'Supported Video file', NULL, NULL),
(1395, 3, 'mp4', 'mp4', NULL, NULL),
(1396, 3, 'webm', 'webm', NULL, NULL),
(1397, 3, 'ogg', 'ogg', NULL, NULL),
(1398, 3, 'Preview Video File', 'Preview Video File', NULL, NULL),
(1399, 3, 'HTML5', 'HTML5', NULL, NULL),
(1400, 3, 'Far far away, behind the word mountains, far from the away countries Vokalia and Consonantia, there live the blind texts.', 'Far far away, behind the word mountains, far from the away countries Vokalia and Consonantia, there live the blind texts.', NULL, NULL),
(1401, 3, 'Our latest Blogs', 'Our latest Blogs', NULL, NULL),
(1402, 3, 'Banner Information', 'Banner Information', NULL, NULL),
(1403, 3, 'Search courses', 'Search courses', NULL, NULL),
(1404, 3, 'Text editor', 'Text editor', NULL, NULL),
(1405, 3, 'Text color', 'Text color', NULL, NULL),
(1406, 3, 'Padding', 'Padding', NULL, NULL),
(1407, 3, 'Margin', 'Margin', NULL, NULL),
(1408, 3, 'Border', 'Border', NULL, NULL),
(1409, 3, 'none', 'none', NULL, NULL),
(1410, 3, 'dashed', 'dashed', NULL, NULL),
(1411, 3, 'dotted', 'dotted', NULL, NULL),
(1412, 3, 'Border roundness', 'Border roundness', NULL, NULL),
(1413, 3, 'Border color', 'Border color', NULL, NULL),
(1414, 3, 'Background color', 'Background color', NULL, NULL),
(1415, 3, 'Latitude', 'Latitude', NULL, NULL),
(1416, 3, 'Longitude', 'Longitude', NULL, NULL),
(1417, 3, 'Contact information update successfully', 'Contact information update successfully', NULL, NULL),
(1418, 3, 'Send your message', 'Send your message', NULL, NULL),
(1419, 3, '404 not found', '404 not found', NULL, NULL),
(1420, 3, 'The page you requested could not be found', 'The page you requested could not be found', NULL, NULL),
(1421, 3, 'Please try the following', 'Please try the following', NULL, NULL),
(1422, 3, 'Check the spelling of the url', 'Check the spelling of the url', NULL, NULL),
(1423, 3, 'If you are still puzzled, click on the home link below', 'If you are still puzzled, click on the home link below', NULL, NULL),
(1424, 3, 'Back to home', 'Back to home', NULL, NULL),
(1425, 3, 'Page not found', 'Page not found', NULL, NULL),
(1426, 3, 'Unauthorized', 'Unauthorized', NULL, NULL),
(1427, 3, '401 Unauthorized request', '401 Unauthorized request', NULL, NULL),
(1428, 3, 'The page you requested could not authorized', 'The page you requested could not authorized', NULL, NULL),
(1429, 3, 'Already have account.', 'Already have account.', NULL, NULL),
(1430, 3, 'Sign in', 'Sign in', NULL, NULL),
(1431, 3, 'Forget Password', 'Forget Password', NULL, NULL),
(1432, 3, 'See your growth and get consulting support !', 'See your growth and get consulting support !', NULL, NULL),
(1433, 3, 'Forgot Password', 'Forgot Password', NULL, NULL),
(1434, 3, 'Submit your account email address.', 'Submit your account email address.', NULL, NULL),
(1435, 3, 'Enter Your Email', 'Enter Your Email', NULL, NULL),
(1436, 3, 'Send Request', 'Send Request', NULL, NULL),
(1437, 3, 'Back to login page', 'Back to login page', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lesson_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lesson_src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` longtext COLLATE utf8mb4_unicode_ci,
  `attachment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_free` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `summary` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `like_dislike_reviews`
--

CREATE TABLE `like_dislike_reviews` (
  `id` int(255) NOT NULL,
  `review_id` int(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `liked` int(255) DEFAULT '0',
  `disliked` int(255) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `live_classes`
--

CREATE TABLE `live_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_date_and_time` timestamp NULL DEFAULT NULL,
  `additional_info` longtext COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_files`
--

CREATE TABLE `media_files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `story_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `chat_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privacy` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `thread_id` int(255) DEFAULT NULL,
  `sender_id` int(255) DEFAULT NULL,
  `receiver_id` int(255) DEFAULT NULL,
  `message` longtext,
  `read` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message_threads`
--

CREATE TABLE `message_threads` (
  `id` int(255) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_one` int(255) DEFAULT NULL,
  `contact_two` int(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_settings`
--

CREATE TABLE `notification_settings` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_editable` int(11) DEFAULT NULL,
  `addon_identifier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_types` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `system_notification` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_notification` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `template` longtext COLLATE utf8_unicode_ci,
  `setting_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `setting_sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_updated` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification_settings`
--

INSERT INTO `notification_settings` (`id`, `type`, `is_editable`, `addon_identifier`, `user_types`, `system_notification`, `email_notification`, `subject`, `template`, `setting_title`, `setting_sub_title`, `date_updated`, `created_at`, `updated_at`) VALUES
(1, 'edit_email_template', 1, NULL, '[\"admin\",\"user\"]', '{\"admin\":\"1\",\"user\":\"1\"}', '{\"admin\":\"1\",\"user\":\"0\"}', '{\"admin\":\"New user registered\",\"user\":\"Registered successfully\"}', '{\"admin\":\"New user registered [user_name] \\r\\n<br>User email: <b>[user_email]<\\/b>\",\"user\":\"You have successfully registered with us at [system_name].\"}', 'New user registration', 'Get notified when a new user signs up', '1693215071', '2023-11-02 11:13:07', '2023-12-05 01:23:15'),
(2, 'email_verification', 0, NULL, '[\"user\"]', '{\"user\":\"0\"}', '{\"user\":\"1\"}', '{\"user\":\"Email verification code\"}', '{\"user\":\"You have received a email verification code. Your verification code is [email_verification_code]\"}', 'Email verification', 'It is permanently enabled for student email verification.', '1684135777', '2023-11-02 11:13:07', '2023-11-02 11:13:07'),
(3, 'forget_password_mail', 0, NULL, '[\"user\"]', '{\"user\":\"0\"}', '{\"user\":\"1\"}', '{\"user\":\"Forgot password verification code\"}', '{\"user\":\"You have received a email verification code. Your verification code is [system_name][verification_link][minutes]\"}', 'Forgot password mail', 'It is permanently enabled for student email verification.', '1684145383', '2023-11-02 11:13:07', '2023-11-02 11:13:07'),
(4, 'new_device_login_confirmation', 0, NULL, '[\"user\"]', '{\"user\":\"0\"}', '{\"user\":\"1\"}', '{\"user\":\"Please confirm your login\"}', '{\"user\":\"Have you tried logging in with a different device? Confirm using the verification code. Your verification code is [verification_code]. Remember that you will lose access to your previous device after logging in to the new device <b>[user_agent]<\\/b>.<br> Use the verification code within [minutes] minutes\"}', 'Account security alert', 'Send verification code for login from a new device', '1684145383', '2023-11-02 11:13:07', '2023-11-02 11:13:07'),
(6, 'course_purchase', 1, NULL, '[\"admin\",\"student\",\"instructor\"]', '{\"admin\":\"1\",\"student\":\"1\",\"instructor\":\"1\"}', '{\"admin\":\"0\",\"student\":\"0\",\"instructor\":\"0\"}', '{\"admin\":\"A new course has been sold\",\"instructor\":\"A new course has been sold\",\"student\":\"You have purchased a new course\"}', '{\"admin\":\"<p>Course title: [course_title]<\\/p><p>Student: [student_name]\\r\\n<\\/p><p>Paid amount: [paid_amount]<\\/p><p>Instructor: [instructor_name]<\\/p>\",\"instructor\":\"Course title: [course_title]\\r\\nStudent: [student_name]\\r\\nPaid amount: [paid_amount]\",\"student\":\"Course title: [course_title]\\r\\nPaid amount: [paid_amount]\\r\\nInstructor: [instructor_name]\"}', 'Course purchase notification', 'Stay up-to-date on student course purchases.', '1684303456', '2023-11-02 11:13:07', '2023-11-02 11:13:07'),
(7, 'course_completion_mail', 1, NULL, '[\"student\",\"instructor\"]', '{\"student\":\"1\",\"instructor\":\"1\"}', '{\"student\":\"0\",\"instructor\":\"0\"}', '{\"instructor\":\"Course completion\",\"student\":\"You have completed a new course\"}', '{\"instructor\":\"Course completed [course_title]\\r\\nStudent: [student_name]\",\"student\":\"Course: [course_title]\\r\\nInstructor: [instructor_name]\"}', 'Course completion mail', 'Stay up to date on student course completion.', '1684303457', '2023-11-02 11:13:07', '2023-11-02 11:13:07'),
(8, 'certificate_eligibility', 1, 'certificate', '[\"student\",\"instructor\"]', '{\"student\":\"1\",\"instructor\":\"1\"}', '{\"student\":\"0\",\"instructor\":\"0\"}', '{\"instructor\":\"Certificate eligibility\",\"student\":\"certificate eligibility\"}', '{\"instructor\":\"Course: [course_title]\\r\\nStudent: [student_name]\\r\\nCertificate link: [certificate_link]\",\"student\":\"Course: [course_title]\\r\\nInstructor: [instructor_name]\\r\\nCertificate link: [certificate_link]\"}', 'Course eligibility notification', 'Stay up to date on course certificate eligibility.', '1684303460', '2023-11-02 11:13:07', '2023-11-02 11:13:07'),
(9, 'offline_payment_suspended_mail', 1, 'offline_payment', '[\"student\"]', '{\"student\":\"1\"}', '{\"student\":\"0\"}', '{\"student\":\"Your payment has been suspended\"}', '{\"student\":\"<p>Your offline payment has been <b style=\'color: red;\'>suspended</b> !</p><p>Please provide a valid document of your payment.</p>\"}', 'Offline payment suspended mail', 'If students provides fake information, notify them of the suspension', '1684303463', '2023-11-02 11:13:07', '2023-11-02 11:13:07'),
(10, 'bundle_purchase', 1, 'course_bundle', '[\"admin\",\"student\",\"instructor\"]', '{\"admin\":\"1\",\"student\":\"1\",\"instructor\":\"1\"}', '{\"admin\":\"0\",\"student\":\"0\",\"instructor\":\"0\"}', '{\"admin\":\"A new course bundle has been sold \",\"instructor\":\"A new course bundle has been sold \",\"student\":\"You have purchased a new course bundle test\"}', '{\"admin\":\"Course bundle: [bundle_title]\\r\\nStudent: [student_name]\\r\\nInstructor: [instructor_name] \",\"instructor\":\"Course bundle: [bundle_title]\\r\\nStudent: [student_name] \",\"student\":\"Course bundle: [bundle_title]\\r\\nInstructor: [instructor_name] \"}', 'Course bundle purchase notification', 'Stay up-to-date on student course bundle purchases.', '1684303467', '2023-11-02 11:13:07', '2023-11-02 11:13:07'),
(13, 'add_new_user_as_affiliator', 0, 'affiliate_course', '[\"affiliator\"]', '{\"affiliator\":\"0\"}', '{\"affiliator\":\"1\"}', '{\"affiliator\":\"Congratulation ! You are assigned as an affiliator\"}', '{\"affiliator\":\"You are assigned as a website Affiliator.\\r\\nWebsite: [website_link]\\r\\n<br>\\r\\nPassword: [password]\"}', 'New user added as affiliator', 'Send account information to the new user', '1684135777', '2023-11-02 11:13:07', '2023-11-02 11:13:07'),
(14, 'affiliator_approval_notification', 1, 'affiliate_course', '[\"affiliator\"]', '{\"affiliator\":\"1\"}', '{\"affiliator\":\"0\"}', '{\"affiliator\":\"Congratulations! Your affiliate request has been approved\"}', '{\"affiliator\":\"Congratulations! Your affiliate request has been approved\"}', 'Affiliate approval notification', 'Send affiliate approval mail to the user account', '1684303472', '2023-11-02 11:13:07', '2023-11-02 11:13:07'),
(15, 'affiliator_request_cancellation', 1, 'affiliate_course', '[\"affiliator\"]', '{\"affiliator\":\"1\"}', '{\"affiliator\":\"0\"}', '{\"affiliator\":\"Sorry ! Your request has been currently refused\"}', '{\"affiliator\":\"Sorry ! Your request has been currently refused.\"}', 'Affiliator request cancellation', 'Send mail, when you cancel the affiliation request', '1684303473', '2023-11-02 11:13:07', '2023-11-02 11:13:07'),
(16, 'affiliation_amount_withdrawal_request', 1, 'affiliate_course', '[\"admin\",\"affiliator\"]', '{\"admin\":\"1\",\"affiliator\":\"1\"}', '{\"admin\":\"0\",\"affiliator\":\"0\"}', '{\"admin\":\"New money withdrawal request\",\"affiliator\":\"New money withdrawal request\"}', '{\"admin\":\"New money withdrawal request by [\'user_name] [amount]\",\"affiliator\":\"Your Withdrawal request of [amount] has been sent to authority\"}', 'Affiliation money withdrawal request', 'Send mail, when the users request the withdrawal of money', '1684303476', '2023-11-02 11:13:07', '2023-11-02 11:13:07'),
(17, 'approval_affiliation_amount_withdrawal_request', 1, 'affiliate_course', '[\"affiliator\"]', '{\"affiliator\":\"1\"}', '{\"affiliator\":\"0\"}', '{\"affiliator\":\"Congartulation ! Your withdrawal request has been approved\"}', '{\"affiliator\":\"Congartulation ! Your payment request has been approved.\"}', 'Approval of withdrawal request of affiliation', 'Send mail, when you approved the affiliation withdrawal request', '1684303480', '2023-11-02 11:13:07', '2023-11-02 11:13:07'),
(18, 'course_gift', 1, NULL, '[\"payer\",\"receiver\"]', '{\"payer\":\"1\",\"receiver\":\"1\"}', '{\"payer\":\"1\",\"receiver\":\"1\"}', '{\"payer\":\"You have gift a course\",\"receiver\":\"You have received a course gift\"}', '{\"payer\":\"You have gift a course to [user_name] [course_title][instructor]\",\"receiver\":\"You have received a course gift by [payer][course_title][instructor]\"}', 'Course gift notification', 'Notify users after course gift', '1691818623', '2023-11-02 11:13:07', '2023-11-06 05:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `offline_payments`
--

CREATE TABLE `offline_payments` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `item_type` varchar(255) DEFAULT NULL,
  `items` varchar(255) DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `coupon` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `bank_no` varchar(255) DEFAULT NULL,
  `doc` varchar(255) DEFAULT NULL,
  `status` int(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keys` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `test_mode` int(11) DEFAULT NULL,
  `is_addon` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `identifier`, `currency`, `title`, `model_name`, `description`, `keys`, `status`, `test_mode`, `is_addon`, `created_at`, `updated_at`) VALUES
(1, 'paypal', 'USD', 'Paypal', 'Paypal', '', '{\"sandbox_client_id\":\"AfGaziKslex-scLAyYdDYXNFaz2aL5qGau-SbDgE_D2E80D3AFauLagP8e0kCq9au7W4IasmFbirUUYc\",\"sandbox_secret_key\":\"EMa5pCTuOpmHkhHaCGibGhVUcKg0yt5-C3CzJw-OWJCzaXXzTlyD17SICob_BkfM_0Nlk7TWnN42cbGz\",\"production_client_id\":\"1234\",\"production_secret_key\":\"12345\"}', 1, 1, 0, '2023-06-24 03:51:49', '2023-11-28 01:44:37'),
(2, 'stripe', 'USD', 'Stripe', 'StripePay', '', '{\"public_key\":\"pk_test_c6VvBEbwHFdulFZ62q1IQrar\",\"secret_key\":\"sk_test_9IMkiM6Ykxr1LCe2dJ3PgaxS\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx\"}', 1, 1, 0, '2023-06-24 03:51:49', '2023-10-30 01:33:32'),
(3, 'razorpay', 'USD', 'Razorpay', 'Razorpay', '', '{\"public_key\":\"rzp_test_J60bqBOi1z1aF5\",\"secret_key\":\"uk935K7p4j96UCJgHK8kAU4q\"}', 1, 1, 0, '2023-06-24 03:51:49', '2023-10-30 01:37:12'),
(4, 'flutterwave', 'USD', 'Flutterwave', 'Flutterwave', '', '{\"public_key\":\"FLWPUBK_TEST-48dfbeb50344ecd8bc075b4ffe9ba266-X\",\"secret_key\":\"FLWSECK_TEST-1691582e23bd6ee4fb04213ec0b862dd-X\"}', 1, 1, 0, '2023-06-24 03:51:49', '2023-10-30 01:39:58'),
(5, 'paytm', 'USD', 'Paytm', 'Paytm', '', '{\"public_key\":\"ApLWOX88722132489587\",\"secret_key\":\"#iFa7&W_C50VL@aT\"}', 1, 1, 0, '2023-06-24 03:51:49', '2023-10-30 01:42:32'),
(6, 'offline', 'USD', 'Offline Payment', 'Paytm', '', '{\"public_key\":\"ApLWOX88722132489587\",\"secret_key\":\"#iFa7&W_C50VL@aT\"}', 1, NULL, 0, '2023-06-24 03:51:49', '2023-10-30 01:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `payment_histories`
--

CREATE TABLE `payment_histories` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `admin_revenue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instructor_revenue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `instructor_payment_status` int(11) DEFAULT '0',
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payouts`
--

CREATE TABLE `payouts` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `permissions` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `section_id` int(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `total_mark` int(255) DEFAULT NULL,
  `pass_mark` int(255) DEFAULT NULL,
  `drip_rule` int(255) DEFAULT NULL,
  `summary` longtext,
  `attempts` longtext,
  `sort` int(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(255) UNSIGNED NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `course_id` int(255) DEFAULT NULL,
  `rating` int(255) DEFAULT NULL,
  `review_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo_fields`
--

CREATE TABLE `seo_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(20) DEFAULT NULL,
  `blog_id` int(20) DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_robot` text COLLATE utf8mb4_unicode_ci,
  `canonical_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_ld` longtext COLLATE utf8mb4_unicode_ci,
  `og_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` text COLLATE utf8mb4_unicode_ci,
  `og_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_fields`
--

INSERT INTO `seo_fields` (`id`, `course_id`, `blog_id`, `route`, `name_route`, `meta_title`, `meta_keywords`, `meta_description`, `meta_robot`, `canonical_url`, `custom_url`, `json_ld`, `og_title`, `og_description`, `og_image`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Home', 'home', 'Home page', NULL, 'Home page for academy Seo', 'xxxxxx', 'https://academy.com', 'https://academy.com', '<script type=\"application/ld+json\"> {   \"@context\": \"http://schema.org\",   \"@type\": \"WebSite\",   \"name\": \"CodeCanyon\",   \"url\": \"https://codecanyon.net\" } </script>', 'ooooooooo', 'zzzzzzzzzz', 'OG-home.jpg', NULL, NULL),
(2, NULL, NULL, 'Compare', 'compare', 'Course compare', 'course, compare, difference', 'Course compare', 'xxxxxx', 'https:://academy.com/course-compare', 'https:://academy.com/course-compare', NULL, 'Course compare', 'Course compare', '2-customer-php-version.PNG', NULL, NULL),
(3, NULL, NULL, 'Privacy', 'privacy.policy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'OG-documantation.jpg', NULL, NULL),
(4, NULL, NULL, 'Refund', 'refund.policy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'OG-Blog.jpg', NULL, NULL),
(5, NULL, NULL, 'Terms- condition', 'terms.condition', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'OG-service.jpg', NULL, NULL),
(6, NULL, NULL, 'Faq', 'faq', 'Creative elements - ui subscription system', 'ui kits, website template, video template', 'Best and affordable ui kit subscription system', NULL, NULL, NULL, NULL, NULL, NULL, 'OG-elements home.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'language', 'english', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(2, 'system_name', 'Academy', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(3, 'system_title', 'Academy Learning Club', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(4, 'system_email', 'academy@example.com', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(5, 'address', 'Sydney, Australia', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(6, 'phone', '+143-52-9933631', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(7, 'purchase_code', '2719930f-9f8e-4712-80b2-fc7455ec59f9', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(8, 'paypal', '[{\"active\":\"1\",\"mode\":\"sandbox\",\"sandbox_client_id\":\"AfGaziKslex-scLAyYdDYXNFaz2aL5qGau-SbDgE_D2E80D3AFauLagP8e0kCq9au7W4IasmFbirUUYc\",\"sandbox_secret_key\":\"EMa5pCTuOpmHkhHaCGibGhVUcKg0yt5-C3CzJw-OWJCzaXXzTlyD17SICob_BkfM_0Nlk7TWnN42cbGz\",\"production_client_id\":\"1234\",\"production_secret_key\":\"12345\"}]', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(9, 'stripe_keys', '[{\"active\":\"1\",\"testmode\":\"on\",\"public_key\":\"pk_test_CAC3cB1mhgkJqXtypYBTGb4f\",\"secret_key\":\"sk_test_iatnshcHhQVRXdygXw3L2Pp2\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx\"}]', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(10, 'youtube_api_key', 'AIzaSyDthDJK7F5kKCDIcZeSFxU4rx9s3DSaBAU', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(11, 'vimeo_api_key', 'vimeo-api-key', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(12, 'slogan', 'A course based video CMS', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(13, 'text_align', NULL, '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(14, 'allow_instructor', '1', '2023-10-29 05:36:40', '2023-12-05 23:04:06'),
(15, 'instructor_revenue', '70', '2023-10-29 05:36:40', '2023-12-05 23:04:11'),
(16, 'system_currency', 'USD', '2023-10-29 05:36:40', '2024-04-08 00:03:24'),
(17, 'paypal_currency', 'USD', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(18, 'stripe_currency', 'USD', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(19, 'author', 'Creativeitem', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(20, 'currency_position', 'right-space', '2023-10-29 05:36:40', '2024-04-08 00:03:24'),
(21, 'website_description', 'Talemy is your ideal education the WordPress theme for sharing and selling your knowledge online. Teach what you love. Talemy gives you the tools.', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(22, 'website_keywords', 'LMS,Learning Management System,Creativeitem,Academy LMS', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(23, 'footer_text', '2022 @ By Creativeitem', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(24, 'footer_link', 'https://creativeitem.com/', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(25, 'protocol', 'smtp', '2023-10-29 05:36:40', '2023-12-17 01:46:58'),
(26, 'smtp_host', 'smtp.gmail.com', '2023-10-29 05:36:40', '2023-12-17 01:46:58'),
(27, 'smtp_port', '587', '2023-10-29 05:36:40', '2023-12-17 01:46:58'),
(28, 'smtp_user', 'raamsarkar9911@gmail.com', '2023-10-29 05:36:40', '2023-12-17 01:46:58'),
(29, 'smtp_pass', 'vthywkogenjumglt', '2023-10-29 05:36:40', '2023-12-17 01:46:58'),
(30, 'version', '1.0', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(31, 'student_email_verification', 'disable', '2023-10-29 05:36:40', '2023-12-05 00:54:45'),
(32, 'instructor_application_note', 'Fill all the fields carefully and share if you want to share any document with us it will help us to evaluate you as an instructor. dfdfs', '2023-10-29 05:36:40', '2023-12-05 23:04:06'),
(33, 'razorpay_keys', '[{\"active\":\"1\",\"key\":\"rzp_test_J60bqBOi1z1aF5\",\"secret_key\":\"uk935K7p4j96UCJgHK8kAU4q\",\"theme_color\":\"#c7a600\"}]', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(34, 'razorpay_currency', 'USD', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(35, 'fb_app_id', 'fb-app-id', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(36, 'fb_app_secret', 'fb-app-secret', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(37, 'fb_social_login', '0', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(38, 'drip_content_settings', '{\"lesson_completion_role\":\"duration\",\"minimum_duration\":\"15:30:00\",\"minimum_percentage\":\"60\",\"locked_lesson_message\":\"<h3 xss=\\\"removed\\\" style=\\\"text-align: center; \\\"><span xss=\\\"removed\\\" style=\\\"\\\">Permission denied!<\\/span><\\/h3><p xss=\\\"removed\\\" style=\\\"text-align: center; \\\"><span xss=\\\"removed\\\">This course supports drip content, so you must complete the previous lessons.<\\/span><\\/p>\",\"files\":null}', '2023-10-29 05:36:40', '2023-10-29 05:26:38'),
(41, 'course_accessibility', 'publicly', '2023-10-29 05:36:40', '2023-12-05 00:54:45'),
(42, 'smtp_crypto', 'tls', '2023-10-29 05:36:40', '2023-12-17 01:46:58'),
(43, 'allowed_device_number_of_loging', '5', '2023-10-29 05:36:40', '2023-12-05 00:54:45'),
(47, 'academy_cloud_access_token', 'jdfghasdfasdfasdfasdfasdf', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(48, 'course_selling_tax', '4', '2023-10-29 05:36:40', '2024-05-13 02:00:05'),
(49, 'ccavenue_keys', '[{\"active\":\"1\",\"ccavenue_merchant_id\":\"cmi_xxxxxx\",\"ccavenue_working_key\":\"cwk_xxxxxxxxxxxx\",\"ccavenue_access_code\":\"ccc_xxxxxxxxxxxxx\"}]', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(50, 'ccavenue_currency', 'INR', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(51, 'iyzico_keys', '[{\"active\":\"1\",\"testmode\":\"on\",\"iyzico_currency\":\"TRY\",\"api_test_key\":\"atk_xxxxxxxx\",\"secret_test_key\":\"stk_xxxxxxxx\",\"api_live_key\":\"alk_xxxxxxxx\",\"secret_live_key\":\"slk_xxxxxxxx\"}]', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(52, 'iyzico_currency', 'TRY', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(53, 'paystack_keys', '[{\"active\":\"1\",\"testmode\":\"on\",\"secret_test_key\":\"sk_test_c746060e693dd50c6f397dffc6c3b2f655217c94\",\"public_test_key\":\"pk_test_0816abbed3c339b8473ff22f970c7da1c78cbe1b\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxx\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxx\"}]', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(54, 'paystack_currency', 'NGN', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(55, 'paytm_keys', '[{\"PAYTM_MERCHANT_KEY\":\"PAYTM_MERCHANT_KEY\",\"PAYTM_MERCHANT_MID\":\"PAYTM_MERCHANT_MID\",\"PAYTM_MERCHANT_WEBSITE\":\"DEFAULT\",\"INDUSTRY_TYPE_ID\":\"Retail\",\"CHANNEL_ID\":\"WEB\"}]', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(57, 'google_analytics_id', NULL, '2023-10-29 05:36:40', '2023-12-05 00:54:45'),
(58, 'meta_pixel_id', NULL, '2023-10-29 05:36:40', '2023-12-05 00:54:45'),
(59, 'smtp_from_email', 'raamsarkar9911@gmail.com', '2023-10-29 05:36:40', '2023-12-17 01:46:58'),
(61, 'language_dirs', '{\"english\":\"ltr\",\"hindi\":\"rtl\",\"arabic\":\"rtl\"}', '2023-10-29 05:36:40', '2023-10-29 05:36:40'),
(62, 'certificate_template', 'uploads/certificate-template/1715845997-UI6JlaYpu9NQHyKW0vqemnLdc2xhtB.png', '2024-03-12 08:17:10', '2024-05-16 01:53:19'),
(63, 'certificate_builder_content', '<style>\n            @import url(\'https://fonts.googleapis.com/css2?family=Italianno&display=swap\');\n            @import url(\'https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap%27\');\n            @import url(\'https://fonts.googleapis.com/css2?family=Miss+Fajardose&display=swap%27\');\n        </style>\n        \n\n                    <style>\n            @import url(\'https://fonts.googleapis.com/css2?family=Italianno&display=swap\');\n            @import url(\'https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap%27\');\n            @import url(\'https://fonts.googleapis.com/css2?family=Miss+Fajardose&display=swap%27\');\n        </style>\n        \n\n                    <style>\n            @import url(\'https://fonts.googleapis.com/css2?family=Italianno&display=swap\');\n            @import url(\'https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap%27\');\n            @import url(\'https://fonts.googleapis.com/css2?family=Miss+Fajardose&display=swap%27\');\n        </style>\n        \n\n                    <style>\n            @import url(\'https://fonts.googleapis.com/css2?family=Italianno&display=swap\');\n            @import url(\'https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap%27\');\n            @import url(\'https://fonts.googleapis.com/css2?family=Miss+Fajardose&display=swap%27\');\n        </style>\n        \n\n                    <div id=\"certificate-layout-module\" class=\"certificate-layout-module resizeable-canvas draggable ui-draggable ui-draggable-handle ui-resizable hidden-position\" style=\"position: relative; width: 1069.2px; height: 755.055px; left: 0px; top: -1px;\">\n                <img class=\"certificate-template\" style=\"width: 100%; height: 100%;\" src=\"/academy/academy_lite_latest/public/uploads/certificate-template/1715845997-UI6JlaYpu9NQHyKW0vqemnLdc2xhtB.png\">\n            <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div><div class=\"draggable resizeable-canvas ui-draggable ui-draggable-handle ui-resizable\" style=\"position: absolute; font-size: 16px; top: 114px; left: 93px; width: 84.8906px; font-family: &quot;default&quot;; padding: 5px !important; height: 80px;\">\n                {qr_code}\n                <i class=\"remove-item fi-rr-cross-circle cursor-pointer\" onclick=\"$(this).parent().remove()\">\n            </i><div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div><div class=\"draggable resizeable-canvas ui-draggable ui-draggable-handle ui-resizable\" style=\"position: absolute; font-size: 18px; top: 546px; left: 125px; width: 210.031px; font-family: &quot;Pinyon Script&quot;; padding: 5px !important; height: 37px;\">\n                {instructor_name}\n                <i class=\"remove-item fi-rr-cross-circle cursor-pointer\" onclick=\"$(this).parent().remove()\">\n            </i><div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div><div class=\"draggable resizeable-canvas ui-draggable ui-draggable-handle ui-resizable\" style=\"position: absolute; font-size: 18px; top: 546px; left: 724px; width: 210.188px; font-family: &quot;Pinyon Script&quot;; padding: 5px !important; height: 39px;\">\n                {student_name}\n                <i class=\"remove-item fi-rr-cross-circle cursor-pointer\" onclick=\"$(this).parent().remove()\">\n            </i><div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div><div class=\"draggable resizeable-canvas ui-draggable ui-draggable-handle ui-resizable\" style=\"position: absolute; font-size: 16px; top: 545px; left: 442px; width: min-content; font-family: &quot;default&quot;; padding: 5px !important;\">\n                {course_completion_date}\n                <i class=\"remove-item fi-rr-cross-circle cursor-pointer\" onclick=\"$(this).parent().remove()\">\n            </i><div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div><div class=\"draggable resizeable-canvas ui-draggable ui-draggable-handle ui-resizable\" style=\"position: absolute; font-size: 12px; top: 665px; left: 457px; width: min-content; font-family: &quot;default&quot;; padding: 5px !important;\">\n                {certificate_download_date}\n                <i class=\"remove-item fi-rr-cross-circle cursor-pointer\" onclick=\"$(this).parent().remove()\">\n            </i><div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div><div class=\"draggable resizeable-canvas ui-draggable ui-draggable-handle ui-resizable\" style=\"position: absolute; font-size: 30px; top: 136px; left: 264px; width: 534.336px; font-family: &quot;default&quot;; padding: 5px !important; height: 62px;\">\n                COURSE COMPLETION CERTIFICATE\n                <i class=\"remove-item fi-rr-cross-circle cursor-pointer\" onclick=\"$(this).parent().remove()\">\n            </i><div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div><div class=\"draggable resizeable-canvas ui-draggable ui-draggable-handle ui-resizable\" style=\"position: absolute; font-size: 18px; top: 211px; left: 205px; width: 664.5px; font-family: &quot;Pinyon Script&quot;; padding: 5px !important; height: 98px;\">\n                This certificate is awarded to {student_name} in recognition of their successful completion of Course on {course_completion_date}. Your hard work, dedication, and commitment to learning have enabled you to achieve this milestone, and we are proud to recognize your accomplishment.\n                <i class=\"remove-item fi-rr-cross-circle cursor-pointer\" onclick=\"$(this).parent().remove()\">\n            </i><div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div><div class=\"draggable resizeable-canvas ui-draggable ui-draggable-handle ui-resizable\" style=\"position: absolute; font-size: 18px; top: 316px; left: 315px; width: 428.25px; font-family: &quot;default&quot;; padding: 5px !important; height: 48px;\">\n                {course_title}\n                <i class=\"remove-item fi-rr-cross-circle cursor-pointer\" onclick=\"$(this).parent().remove()\">\n            </i><div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div></div>', '2024-03-12 08:17:50', '2024-05-16 02:06:56'),
(64, '_token', 'oCweKhYOOnY7H57Eqtan4qRnqFgW3yDEpAIMlba6', '2024-03-12 08:18:24', '2024-03-12 05:25:21'),
(65, 'zoom_account_email', 'ponkojr1998@gmail.com', '2024-03-12 08:18:24', '2024-03-12 08:18:24'),
(66, 'zoom_account_id', 'RG4XYUQ3RKqu8NetilQ9UA', '2024-03-12 08:18:24', '2024-03-12 08:18:24'),
(67, 'zoom_client_id', 'mFgJ4QB0S_ue5YhRrbQ7yg', '2024-03-12 08:18:24', '2024-03-12 08:18:24'),
(68, 'zoom_client_secret', 'OZ6m9dwejrFoWywAKDGQK1mh3yRyhyl3', '2024-03-12 08:18:24', '2024-03-12 08:18:24'),
(69, 'zoom_web_sdk', 'active', '2024-03-12 08:18:24', '2024-03-12 08:18:24'),
(70, 'zoom_sdk_client_id', '7M6Wg3sxRP6fRudLqqskYQ', '2024-03-12 08:18:24', '2024-03-12 08:18:24'),
(71, 'zoom_sdk_client_secret', 'z1NzSPndVwGqmquWnoJgza2i2R4GJOai', '2024-03-12 08:18:24', '2024-03-12 08:18:24'),
(72, 'open_ai_model', 'gpt-3.5-turbo-0125', '2024-03-12 09:11:12', '2024-03-12 05:25:21'),
(73, 'open_ai_max_token', '100', '2024-03-12 09:11:12', '2024-03-12 05:25:21'),
(74, 'open_ai_secret_key', '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', '2024-03-12 09:11:12', '2024-03-12 05:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `biography` longtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentkeys` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_reviews`
--

CREATE TABLE `user_reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `watch_durations`
--

CREATE TABLE `watch_durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `watch_histories`
--

CREATE TABLE `watch_histories` (
  `id` int(255) UNSIGNED NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `completed_lesson` longtext COLLATE utf8mb4_unicode_ci,
  `watching_lesson_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed_date` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `course_id` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addtocarts`
--
ALTER TABLE `addtocarts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_likes`
--
ALTER TABLE `blog_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `builder_blocks`
--
ALTER TABLE `builder_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `builder_pages`
--
ALTER TABLE `builder_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_index` (`parent_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `certificates_identifier_unique` (`identifier`),
  ADD KEY `certificates_user_id_index` (`user_id`),
  ADD KEY `certificates_course_id_index` (`course_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_user_id_index` (`user_id`),
  ADD KEY `courses_category_id_index` (`category_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrollments_user_id_index` (`user_id`),
  ADD KEY `enrollments_course_id_index` (`course_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_settings`
--
ALTER TABLE `home_page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor_reviews`
--
ALTER TABLE `instructor_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_phrases`
--
ALTER TABLE `language_phrases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_phrases_language_id_index` (`language_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_user_id_index` (`user_id`),
  ADD KEY `lessons_course_id_index` (`course_id`),
  ADD KEY `lessons_section_id_index` (`section_id`);

--
-- Indexes for table `like_dislike_reviews`
--
ALTER TABLE `like_dislike_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_classes`
--
ALTER TABLE `live_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `live_classes_user_id_index` (`user_id`),
  ADD KEY `live_classes_course_id_index` (`course_id`);

--
-- Indexes for table `media_files`
--
ALTER TABLE `media_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_threads`
--
ALTER TABLE `message_threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_thread_sender_foreign` (`contact_one`),
  ADD KEY `message_thread_receiver_foreign` (`contact_two`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_settings`
--
ALTER TABLE `notification_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offline_payments`
--
ALTER TABLE `offline_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_histories`
--
ALTER TABLE `payment_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payouts`
--
ALTER TABLE `payouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_user_id_index` (`user_id`),
  ADD KEY `sections_course_id_index` (`course_id`);

--
-- Indexes for table `seo_fields`
--
ALTER TABLE `seo_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_reviews`
--
ALTER TABLE `user_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watch_durations`
--
ALTER TABLE `watch_durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watch_histories`
--
ALTER TABLE `watch_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addtocarts`
--
ALTER TABLE `addtocarts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_likes`
--
ALTER TABLE `blog_likes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `builder_blocks`
--
ALTER TABLE `builder_blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `builder_pages`
--
ALTER TABLE `builder_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `home_page_settings`
--
ALTER TABLE `home_page_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `instructor_reviews`
--
ALTER TABLE `instructor_reviews`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `language_phrases`
--
ALTER TABLE `language_phrases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1438;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like_dislike_reviews`
--
ALTER TABLE `like_dislike_reviews`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_classes`
--
ALTER TABLE `live_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_files`
--
ALTER TABLE `media_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_threads`
--
ALTER TABLE `message_threads`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_settings`
--
ALTER TABLE `notification_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `offline_payments`
--
ALTER TABLE `offline_payments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_histories`
--
ALTER TABLE `payment_histories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payouts`
--
ALTER TABLE `payouts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo_fields`
--
ALTER TABLE `seo_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_reviews`
--
ALTER TABLE `user_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `watch_durations`
--
ALTER TABLE `watch_durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `watch_histories`
--
ALTER TABLE `watch_histories`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
