-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2022 at 07:09 AM
-- Server version: 5.7.38
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scitasdds_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `access`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'rilesh@webtech-evolution.com', 'admin', NULL, '5ff1c3531ed3f1609679699.jpg', NULL, '$2y$10$UkQQzTu7HpS.FwDEN1sQ8u4uEguKlE5RRc1C1EF8vWg8Yw9gHff4S', NULL, '2022-03-31 16:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '1 => Active , 2 => Pending',
  `hide` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `hide`, `created_at`, `updated_at`) VALUES
(1, 'Male', 'male', 0, 1, '2022-04-01 13:52:10', '2022-04-30 16:00:16'),
(2, 'Female', 'female', 0, 1, '2022-04-14 15:28:29', '2022-04-30 16:00:11'),
(3, 'Cereal Factor', 'cereal-factor', 1, 0, '2022-04-19 14:28:53', '2022-04-19 14:28:53'),
(4, 'Politics Factor', 'politics-factor', 1, 0, '2022-04-19 14:29:24', '2022-04-19 14:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `act` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortcodes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `act`, `body`, `shortcodes`, `created_at`, `updated_at`) VALUES
(1, 'CERTIFICATE', '<style>\r\n        @font-face {\r\n          font-family: \'Open Sans\';\r\n          font-style: normal;\r\n          font-weight: 400;\r\n          src: url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFVZ0e.ttf) format(\'truetype\');\r\n        }\r\n        @font-face {\r\n          font-family: \'Pinyon Script\';\r\n          font-style: normal;\r\n          font-weight: 400;\r\n          src: url(https://fonts.gstatic.com/s/pinyonscript/v11/6xKpdSJbL9-e9LuoeQiDRQR8WOXaPw.ttf) format(\'truetype\');\r\n        }\r\n        @font-face {\r\n          font-family: \'Rochester\';\r\n          font-style: normal;\r\n          font-weight: 400;\r\n          src: url(https://fonts.gstatic.com/s/rochester/v11/6ae-4KCqVa4Zy6Fif-UC2FHS.ttf) format(\'truetype\');\r\n        }\r\n        .cursive {\r\n          font-family: \"Pinyon Script\", cursive;\r\n        }\r\n        .sans {\r\n          font-family: \"Open Sans\", sans-serif;\r\n        }\r\n        .bold {\r\n          font-weight: bold;\r\n        }\r\n        .block {\r\n          display: block;\r\n        }\r\n        .underline {\r\n          border-bottom: 1px solid #777;\r\n          padding: 5px;\r\n          margin-bottom: 15px;\r\n        }\r\n        .margin-0 {\r\n          margin: 0;\r\n        }\r\n        .padding-0 {\r\n          padding: 0;\r\n        }\r\n        .pm-empty-space {\r\n          height: 40px;\r\n          width: 100%;\r\n        }\r\n       \r\n        .pm-certificate-container {\r\n          position: relative;\r\n          width: 800px;\r\n          height: 600px;\r\n          background-color: #618597;\r\n          padding: 30px;\r\n          color: #333;\r\n          font-family: \"Open Sans\", sans-serif;\r\n          box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);\r\n          margin: 0 auto;\r\n        }\r\n        .pm-certificate-container .outer-border {\r\n          width: 794px;\r\n          height: 594px;\r\n          position: absolute;\r\n          left: 50%;\r\n          margin-left: -397px;\r\n          top: 50%;\r\n          margin-top: -297px;\r\n          border: 2px solid #fff;\r\n        }\r\n        .pm-certificate-container .inner-border {\r\n          width: 730px;\r\n          height: 530px;\r\n          position: absolute;\r\n          left: 50%;\r\n          margin-left: -365px;\r\n          top: 50%;\r\n          margin-top: -265px;\r\n          border: 2px solid #fff;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border {\r\n          position: relative;\r\n          width: 720px;\r\n          height: 520px;\r\n          padding: 0;\r\n          border: 1px solid #E1E5F0;\r\n          background-color: #FFFFFF;\r\n          background-image: none;\r\n          left: 50%;\r\n          margin-left: -360px;\r\n          top: 50%;\r\n          margin-top: -260px;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border .pm-certificate-block {\r\n          position: relative;\r\n          margin: 0 auto;\r\n          top: 0;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border .pm-certificate-header {\r\n          margin-bottom: 10px;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border .pm-certificate-title {\r\n          position: relative;\r\n          top: 20px;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border .pm-certificate-title h2 {\r\n          font-size: 34px !important;\r\n          font-family: \"Pinyon Script\", cursive;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border .pm-certificate-body {\r\n          padding: 20px;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border .pm-certificate-body .pm-name-text {\r\n          font-size: 20px;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border .pm-earned {\r\n          margin: 15px 0 20px;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border .pm-earned .pm-earned-text {\r\n          font-size: 20px;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border .pm-earned .pm-credits-text {\r\n          font-size: 15px;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border .pm-course-title .pm-earned-text {\r\n          font-size: 20px;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border .pm-course-title .pm-credits-text {\r\n          font-size: 15px;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border .pm-certified {\r\n          font-size: 12px;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border .pm-certified .underline {\r\n          margin-bottom: 5px;\r\n        }\r\n        .pm-certificate-container .pm-certificate-border .pm-certificate-footer {\r\n          position: relative;\r\n          top: 70px;\r\n          margin-left: 20px;\r\n          margin-right: 60px;\r\n        }\r\n        .mt-5{\r\n            margin-top: 50px\r\n        }\r\n        .row {\r\n            display: -ms-flexbox;\r\n            display: flex;\r\n            -ms-flex-wrap: wrap;\r\n            flex-wrap: wrap;\r\n            margin-right: -15px;\r\n            margin-left: -15px;\r\n        }\r\n        .col-xl-12{\r\n          position: relative;\r\n            width: 100%;\r\n            padding-right: 15px;\r\n            padding-left: 15px;\r\n        }\r\n        @media (min-width: 1200px){\r\n          .col-xl-4 {\r\n              -ms-flex: 0 0 33.333333%;\r\n            flex: 0 0 33.333333%;\r\n            max-width: 33.333333%;\r\n          }\r\n        }\r\n        @media (min-width: 1200px){\r\n          .col-xl-12 {\r\n              -ms-flex: 0 0 100%;\r\n              flex: 0 0 100%;\r\n              max-width: 100%;\r\n          }\r\n        }\r\n        .justify-content-center {\r\n            -ms-flex-pack: center!important;\r\n            justify-content: center!important;\r\n        }\r\n        .text-center {\r\n            text-align: center!important;\r\n        }\r\n        \r\n        \r\n   </style>\r\n    <div id=\"block1\">\r\n        <div class=\"container pm-certificate-container\">\r\n            <div class=\"outer-border\"></div>\r\n            <div class=\"inner-border\"></div>\r\n            <div class=\"pm-certificate-border col-xl-12\">\r\n                <div class=\"row justify-content-center pm-certificate-header\">\r\n                    <div class=\"pm-certificate-title cursive col-xl-12 text-center\">\r\n                        <h2><b>{{sitename}} </b>Certificate of Completion</h2>\r\n                    </div>\r\n                </div>\r\n                <div class=\"row pm-certificate-body\">\r\n                    <div class=\"pm-certificate-block\">\r\n                        <div class=\"col-xl-12\">\r\n                            <div class=\"row justify-content-center\">\r\n                                <div class=\"col-xl-2\">\r\n                                    <!-- LEAVE EMPTY -->\r\n                                </div>\r\n                                <div class=\"pm-certificate-name underline margin-0 col-xl-8 text-center\"><span style=\"font-size: 20px;\"><b>{{name}}</b></span></div>\r\n                                <div class=\"col-xl-2\">\r\n                                    <!-- LEAVE EMPTY -->\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                        <div class=\"col-xl-12\">\r\n                            <div class=\"row justify-content-center\">\r\n                                <div class=\"col-xl-2\">\r\n                                    <!-- LEAVE EMPTY -->\r\n                                </div>\r\n                                <div class=\"pm-earned col-xl-8 text-center\">\r\n                                    <span class=\"pm-earned-text padding-0 block cursive\">has earned</span>\r\n                                    <span class=\"pm-credits-text block bold sans\">Score: {{score}}</span><span class=\"pm-credits-text block bold sans\">----------------------------------------</span>\r\n                                </div>\r\n                                <div class=\"col-xl-2\">\r\n                                    <!-- LEAVE EMPTY -->\r\n                                </div>\r\n                                <div class=\"col-xl-12\"></div>\r\n                            </div>\r\n                        </div>\r\n                        <div class=\"col-xl-12\">\r\n                            <div class=\"row justify-content-center\">\r\n                                <div class=\"col-xl-2\">\r\n                                    <!-- LEAVE EMPTY -->\r\n                                </div>\r\n                                <div class=\"pm-course-title col-xl-8 text-center\">\r\n                                    <span class=\"pm-earned-text block cursive\">while completing the exam entitled</span>\r\n                                </div>\r\n                                <div class=\"col-xl-2\">\r\n                                    <!-- LEAVE EMPTY -->\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                        <div class=\"col-xl-12\">\r\n                            <div class=\"row justify-content-center\">\r\n                                <div class=\"col-xl-2\">\r\n                                    <!-- LEAVE EMPTY -->\r\n                                </div>\r\n                                <div class=\"pm-course-title underline col-xl-8 text-center\">\r\n                                    <span class=\"pm-credits-text block bold sans\">{{exam_title}}</span>\r\n                                </div>\r\n                                <div class=\"col-xl-2\">\r\n                                    <!-- LEAVE EMPTY -->\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                    <div class=\"col-xl-12\">\r\n                        <div class=\"pm-certificate-footer\">\r\n                            <div class=\"row\">\r\n                                <div class=\"col-xl-4 pm-certified text-center\">\r\n                                    <span class=\"pm-credits-text block sans\">Authority signature</span>\r\n                                    <span class=\"pm-empty-space block underline\"></span>\r\n                                    <span class=\"bold block\">demo text</span>\r\n                                </div>\r\n                                <div class=\"col-xl-4\">\r\n                                    <!-- LEAVE EMPTY -->\r\n                                </div>\r\n                                <div class=\"col-xl-4 pm-certified text-center\">\r\n                                    <span class=\"pm-credits-text block sans\">Date Completed</span>\r\n                                    <span class=\"pm-empty-space block underline\">{{date}}</span>\r\n                                    <span class=\"bold block\">demo text</span>\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>', '{\"sitename\":\"site name\",\"name\":\"student name\",\"score\":\"exam mark\",\"exam_title\":\"exam name\",\"date\":\"completed date\"} ', '2021-03-29 07:20:07', '2021-04-21 02:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` int(1) NOT NULL COMMENT '1 = percentage, 2 = neat amount',
  `coupon_amount` decimal(18,8) NOT NULL,
  `min_order_amount` decimal(18,8) DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `use_limit` int(11) DEFAULT NULL,
  `usage_per_user` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '1 = active, 0 = inactive',
  `exam_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_users`
--

CREATE TABLE `coupon_users` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `method_code` int(10) UNSIGNED NOT NULL,
  `amount` decimal(18,8) NOT NULL,
  `method_currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` decimal(18,8) NOT NULL,
  `rate` decimal(18,8) NOT NULL,
  `final_amo` decimal(18,8) DEFAULT '0.00000000',
  `detail` text COLLATE utf8mb4_unicode_ci,
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `try` int(11) NOT NULL DEFAULT '0',
  `exam_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=>success, 2=>pending, 3=>cancel',
  `admin_feedback` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_sms_templates`
--

CREATE TABLE `email_sms_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `act` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subj` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_body` text COLLATE utf8mb4_unicode_ci,
  `sms_body` text COLLATE utf8mb4_unicode_ci,
  `shortcodes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_status` tinyint(4) NOT NULL DEFAULT '1',
  `sms_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_sms_templates`
--

INSERT INTO `email_sms_templates` (`id`, `act`, `name`, `subj`, `email_body`, `sms_body`, `shortcodes`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 'PASS_RESET_CODE', 'Password Reset', 'Password Reset', '<div>We have received a request to reset the password for your account on <b>{{time}} .<br></b></div><div>Requested From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div><div><br></div><br><div><div><div>Your account recovery code is:&nbsp;&nbsp; <font size=\"6\"><b>{{code}}</b></font></div><div><br></div></div></div><div><br></div><div><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><br>', 'Your account recovery code is: {{code}}', ' {\"code\":\"Password Reset Code\",\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2021-01-06 00:49:06'),
(2, 'PASS_RESET_DONE', 'Password Reset Confirmation', 'You have Reset your password', '<div><p>\r\n    You have successfully reset your password.</p><p>You changed from&nbsp; IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}}&nbsp;</b> on <b>{{time}}</b></p><p><b><br></b></p><p><font color=\"#FF0000\"><b>If you did not changed that, Please contact with us as soon as possible.</b></font><br></p></div>', 'Your password has been changed successfully', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-07 10:23:47'),
(3, 'EVER_CODE', 'Email Verification', 'Please verify your email address', '<div><br></div><div>Thanks For join with us. <br></div><div>Please use below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> {{code}}</b></font></div>', 'Your email verification code is: {{code}}', '{\"code\":\"Verification code\"}', 1, 1, '2019-09-24 23:04:05', '2021-01-03 23:35:10'),
(4, 'SVER_CODE', 'SMS Verification ', 'Please verify your phone', 'Your phone verification code is: {{code}}', 'Your phone verification code is: {{code}}', '{\"code\":\"Verification code\"}', 0, 0, '2019-09-24 23:04:05', '2022-04-01 21:23:28'),
(5, '2FA_ENABLE', 'Google Two Factor - Enable', 'Google Two Factor Authentication is now  Enabled for Your Account', '<div>You just enabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Enabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Your verification code is: {{code}}', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-08 01:42:59'),
(6, '2FA_DISABLE', 'Google Two Factor Disable', 'Google Two Factor Authentication is now  Disabled for Your Account', '<div>You just Disabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Disabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Google two factor verification is disabled', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-08 01:43:46'),
(16, 'ADMIN_SUPPORT_REPLY', 'Support Ticket Reply ', 'Reply Support Ticket', '<div><p><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong>A member from our support team has replied to the following ticket:</strong></span></p><p><b><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong><br></strong></span></b></p><p><b>[Ticket#{{ticket_id}}] {{ticket_subject}}<br><br>Click here to reply:&nbsp; {{link}}</b></p><p>----------------------------------------------</p><p>Here is the reply : <br></p><p> {{reply}}<br></p></div><div><br></div>', '{{subject}}\r\n\r\n{{reply}}\r\n\r\n\r\nClick here to reply:  {{link}}', '{\"ticket_id\":\"Support Ticket ID\", \"ticket_subject\":\"Subject Of Support Ticket\", \"reply\":\"Reply from Staff/Admin\",\"link\":\"Ticket URL For relpy\"}', 1, 1, '2020-06-08 18:00:00', '2020-05-04 02:24:40'),
(206, 'DEPOSIT_COMPLETE', 'Automated Deposit - Successful', 'Deposit Completed Successfully', '<div>Your deposit of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>has been completed Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#000000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br></div>', '{{amount}} {{currrency}} Deposit successfully by {{gateway_name}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-06-24 18:00:00', '2020-11-17 03:10:00'),
(207, 'DEPOSIT_REQUEST', 'Manual Deposit - User Requested', 'Deposit Request Submitted Successfully', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Pay via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br></div>', '{{amount}} Deposit requested by {{method}}. Charge: {{charge}} . Trx: {{trx}}\r\n', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\"}', 1, 1, '2020-05-31 18:00:00', '2020-06-01 18:00:00'),
(208, 'DEPOSIT_APPROVE', 'Manual Deposit - Admin Approved', 'Your Deposit is Approved', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>is Approved .<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br></div>', 'Admin Approve Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}} transaction : {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-06-16 18:00:00', '2020-06-14 18:00:00'),
(209, 'DEPOSIT_REJECT', 'Manual Deposit - Admin Rejected', 'Your Deposit Request is Rejected', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} has been rejected</b>.<b><br></b></div><br><div>Transaction Number was : {{trx}}</div><div><br></div><div>if you have any query, feel free to contact us.<br></div><br><div><br><br></div>\r\n\r\n\r\n\r\n{{rejection_message}}', 'Admin Rejected Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}}\r\n\r\n{{rejection_message}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\",\"rejection_message\":\"Rejection message\"}', 1, 1, '2020-06-09 18:00:00', '2020-06-14 18:00:00'),
(210, 'WITHDRAW_REQUEST', 'Withdraw  - User Requested', 'Withdraw Request Submitted Successfully', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b>has been submitted Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>You will get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"4\" color=\"#FF0000\"><b><br></b></font></div><div><font size=\"4\" color=\"#FF0000\"><b>This may take {{delay}} to process the payment.</b></font><br></div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br><br></div>', '{{amount}} {{currency}} withdraw requested by {{withdraw_method}}. You will get {{method_amount}} {{method_currency}} in {{duration}}. Trx: {{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\", \"delay\":\"Delay time for processing\"}', 1, 1, '2020-06-07 18:00:00', '2020-06-14 18:00:00'),
(211, 'WITHDRAW_REJECT', 'Withdraw - Admin Rejected', 'Withdraw Request has been Rejected and your money is refunded to your account', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b>has been Rejected.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>You should get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br></div><div>----</div><div><font size=\"3\"><br></font></div><div><font size=\"3\"> {{amount}} {{currency}} has been <b>refunded </b>to your account and your current Balance is <b>{{post_balance}}</b><b> {{currency}}</b></font></div><div><br></div><div>-----</div><div><br></div><div><font size=\"4\">Details of Rejection :</font></div><div><font size=\"4\"><b>{{admin_details}}</b></font></div><div><br></div><div><br><br><br><br><br><br></div>', 'Admin Rejected Your {{amount}} {{currency}} withdraw request. Your Main Balance {{main_balance}}  {{method}} , Transaction {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\", \"admin_details\":\"Details Provided By Admin\"}', 1, 1, '2020-06-09 18:00:00', '2020-06-14 18:00:00'),
(212, 'WITHDRAW_APPROVE', 'Withdraw - Admin  Approved', 'Withdraw Request has been Processed and your money is sent', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b>has been Processed Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>You will get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div>-----</div><div><br></div><div><font size=\"4\">Details of Processed Payment :</font></div><div><font size=\"4\"><b>{{admin_details}}</b></font></div><div><br></div><div><br><br><br><br><br></div>', 'Admin Approve Your {{amount}} {{currency}} withdraw request by {{method}}. Transaction {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"admin_details\":\"Details Provided By Admin\"}', 1, 1, '2020-06-10 18:00:00', '2020-06-06 18:00:00'),
(215, 'BAL_ADD', 'Balance Add by Admin', 'Your Account has been Credited', '<div>{{amount}} {{currency}} has been added to your account .</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div>Your Current Balance is : <font size=\"3\"><b>{{post_balance}}&nbsp; {{currency}}&nbsp;</b></font>', '{{amount}} {{currency}} credited in your account. Your Current Balance {{remaining_balance}} {{currency}} . Transaction: #{{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-14 19:14:22', '2021-01-06 00:46:18'),
(216, 'BAL_SUB', 'Balance Subtracted by Admin', 'Your Account has been Debited', '<div>{{amount}} {{currency}} has been subtracted from your account .</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div>Your Current Balance is : <font size=\"3\"><b>{{post_balance}}&nbsp; {{currency}}</b></font>', '{{amount}} {{currency}} debited from your account. Your Current Balance {{remaining_balance}} {{currency}} . Transaction: #{{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-14 19:14:22', '2019-11-10 09:07:12'),
(217, 'EXAM_FEE', 'Exam Fee has been paid', 'Exam Fee has been payment confirmation', '<div>Your exam fee of <b>{{amount}} \r\n{{currency}}</b> is via&nbsp; <b>{{method_name}} </b>has been completed Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your payment:<br></b></div><div>Exam title : {{title}}</div><div>Exam Type: {{type}}</div><div>Total mark : {{mark}}</div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#cc3300\">{{charge}}</font><font color=\"#000000\"> </font><font color=\"#cc3300\">{{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br></div>', '{{amount}} {{currrency}} payment successfully by {{gateway_name}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\",\"title\":\"exam title\",\"type\":\"exam type\",\"mark\":\"total mark\"}', 1, 1, '2020-06-24 18:00:00', '2021-04-28 23:06:46'),
(218, 'PAYMENT_REQUEST', 'Mannual Exam Fee Payment Request', 'Exam Fee Payment Request Submitted Successfully', '<div>Your Exam Fee payment request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your payment:<br></b></div><div>Exam title : {{title}}</div><div>Exam Type : {{type}}</div><div>Total&nbsp; Mark : {{mark}}</div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Pay via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div>While Your payment is approved you will be able to take the exam.<br></div><div><br></div>', '{{amount}} Exam fee payment requested by {{method}}. Charge: {{charge}} . Trx: {{trx}}\r\n', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\",\"title\":\"exam title\",\"type\":\"exam type\",\"mark\":\"total mark\"}', 1, 1, '2020-05-31 18:00:00', '2021-03-28 01:08:25'),
(219, 'PAYMENT_APPROVE', 'Manual Payment - Admin Approved', 'Your Payment is Approved', '<div>Your Payment request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>is Approved .<b><br></b></div><div><b><br></b></div><div><b>Details of your Payment:<br></b></div><div>Exam title : {{title}}</div><div>Exam Type : {{type}}</div><div>Total Mark : {{mark}}<br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\"><b>You can attend your exam now. </b><a>{{link}}</a><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br></div>', 'Admin Approve Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}} \r\nGoto this link : <a>{{link}}</a>\r\ntransaction : {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\",\"title\":\"exam title\",\"type\":\"exam type\",\"mark\":\"total mark\",\"link\":\"exam link\"}', 1, 1, '2020-06-16 18:00:00', '2021-03-28 02:25:15'),
(220, 'EXAM_FEE_FROM_BALANCE', 'Exam Fee has been paid from balance', 'Exam Fee payment confirmation from balance', '<div>Your exam fee of <b>{{amount}} \r\n{{currency}}</b> <b>&nbsp;</b>has been paid from your balance.</div><div><b>Details of your payment:<br></b></div><div>Exam title : {{title}}</div><div>Exam Type: {{type}}</div><div>Total mark : {{mark}}</div><div>Amount : {{amount}} {{currency}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br></div>', '{{amount}} {{currrency}} payment successfully from your balance', '{\"trx\":\"transaction number\",\"amount\":\"exam fee\",\"currency\":\"currency\", \"post_balance\":\"Users Balance After this operation\",\"title\":\"exam title\",\"type\":\"exam type\",\"mark\":\"total mark\"}\r\n', 1, 1, '2020-06-24 18:00:00', '2021-04-12 21:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `negative_marking` int(10) UNSIGNED DEFAULT '0' COMMENT '1 = yes, 0 = no',
  `reduce_mark` int(10) UNSIGNED DEFAULT NULL COMMENT 'mark will be reduce for wrong answer',
  `pass_percentage` int(10) UNSIGNED DEFAULT NULL COMMENT 'pass mark percentage for exam',
  `duration` int(10) UNSIGNED DEFAULT NULL COMMENT 'exam duration time',
  `totalmark` int(10) UNSIGNED DEFAULT NULL COMMENT 'exam total mark',
  `value` int(10) UNSIGNED NOT NULL COMMENT '1=> paid, 2 => unpaid',
  `exam_fee` int(10) UNSIGNED DEFAULT NULL COMMENT 'exam fee',
  `random_question` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'questions will be random or not, 1=yes, 0= no',
  `option_suffle` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'question options will be suffle or , not , 1 = yes, 0= no',
  `question_type` int(1) DEFAULT NULL COMMENT '1 => MCQ, 2 => Written',
  `status` int(1) NOT NULL COMMENT '1 = active, 2 =inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `conditionquetion` int(10) UNSIGNED NOT NULL COMMENT '1=> true, 2 => false',
  `choosecategory` int(11) NOT NULL COMMENT 'droupdown select category',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `datecheck` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `subject_id`, `gender_id`, `title`, `instruction`, `negative_marking`, `reduce_mark`, `pass_percentage`, `duration`, `totalmark`, `value`, `exam_fee`, `random_question`, `option_suffle`, `question_type`, `status`, `created_at`, `updated_at`, `conditionquetion`, `choosecategory`, `start_date`, `end_date`, `datecheck`) VALUES
(1, 1, NULL, 'Test', 'Test', 0, NULL, 0, 0, 1, 2, NULL, 1, 1, 1, 1, '2022-04-01 23:34:04', NULL, 0, 0, '2022-04-01', '2022-04-27', NULL),
(2, 1, NULL, 'Ashok Test', 'Test', 0, NULL, 50, 60, 100, 2, NULL, 1, 1, 1, 1, '2022-04-02 23:34:15', NULL, 0, 0, '2022-04-01', '2022-04-27', NULL),
(3, 1, NULL, 'Test 1347', 'dasd', 0, NULL, NULL, NULL, NULL, 2, NULL, 0, 0, 1, 0, '2022-04-01 23:34:12', NULL, 0, 0, '2022-04-01', '2022-04-25', 1),
(4, 1, NULL, 'Test 1445', 'Test 1445<br>', 0, NULL, 33, 30, 40, 2, NULL, 0, 0, 1, 1, '2022-04-01 23:34:18', NULL, 0, 0, '2022-04-01', '2022-04-26', 1),
(5, 1, NULL, 'Test 1630', 'Test 1630<br>', 0, NULL, 20, 30, 50, 2, NULL, 0, 0, 1, 1, '2022-04-01 23:34:23', NULL, 0, 0, '2022-04-01', '2022-04-20', NULL),
(6, 1, NULL, 'Test 1642', 'Test 1642<br>', 0, NULL, 33, 60, 50, 2, NULL, 0, 0, 1, 1, '2022-04-15 18:13:13', '2022-04-15 18:13:13', 0, 0, '2022-04-15', '2050-12-30', NULL),
(7, 0, 1, 'Test 2045', 'Test 2045<br>', 0, NULL, 20, 60, 50, 2, NULL, 0, 0, 1, 1, '2022-04-15 18:25:40', '2022-04-22 22:18:53', 0, 0, '2022-04-22', '2050-12-30', NULL),
(8, 0, 1, 'New test 1249', 'New test 1249<br>', 0, NULL, NULL, NULL, NULL, 2, NULL, 0, 0, 1, 1, '2022-04-28 14:20:18', '2022-04-28 14:20:18', 0, 0, '2022-04-28', '2050-12-30', NULL),
(9, 0, 1, 'New test 1430', 'New test 1430<br>', 0, NULL, NULL, NULL, NULL, 2, NULL, 0, 0, 1, 1, '2022-04-30 16:01:04', '2022-04-30 16:01:04', 0, 0, '2022-04-30', '2050-12-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_images`
--

CREATE TABLE `exam_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_images`
--

INSERT INTO `exam_images` (`id`, `exam_id`, `image`, `created_at`, `updated_at`) VALUES
(4, 1, '624c286d20b5a1649158253.jpg', '2022-04-05 18:30:53', '2022-04-05 18:30:53'),
(5, 1, '624c286d78c481649158253.jpg', '2022-04-05 18:30:53', '2022-04-05 18:30:53'),
(6, 2, '624d376a169b71649227626.jpg', '2022-04-06 13:47:06', '2022-04-06 13:47:06'),
(7, 4, '625942504af1e1650016848.png', '2022-04-15 17:00:48', '2022-04-15 17:00:48'),
(8, 9, '626cfad08a3df1651309264.jpg', '2022-04-30 16:01:04', '2022-04-30 16:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `id` int(10) UNSIGNED NOT NULL,
  `act` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script` text COLLATE utf8mb4_unicode_ci,
  `shortcode` text COLLATE utf8mb4_unicode_ci COMMENT 'object',
  `support` text COLLATE utf8mb4_unicode_ci COMMENT 'help section',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extensions`
--

INSERT INTO `extensions` (`id`, `act`, `name`, `description`, `image`, `script`, `shortcode`, `support`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'tawk-chat', 'Tawk.to', 'Key location is shown bellow', 'tawky_big.png', '<script>\r\n                        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n                        (function(){\r\n                        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\n                        s1.async=true;\r\n                        s1.src=\"https://embed.tawk.to/{{app_key}}\";\r\n                        s1.charset=\"UTF-8\";\r\n                        s1.setAttribute(\"crossorigin\",\"*\");\r\n                        s0.parentNode.insertBefore(s1,s0);\r\n                        })();\r\n                    </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"58dd135ef7bbaa72709c3470\\/default\"}}', 'twak.png', 1, NULL, '2019-10-18 23:16:05', '2021-01-03 23:39:18'),
(2, 'google-recaptcha2', 'Google Recaptcha 2', 'Key location is shown bellow', 'recaptcha3.png', '\r\n<script src=\"https://www.google.com/recaptcha/api.js\"></script>\r\n<div class=\"g-recaptcha\" data-sitekey=\"{{sitekey}}\" data-callback=\"verifyCaptcha\"></div>\r\n<div id=\"g-recaptcha-error\"></div>', '{\"sitekey\":{\"title\":\"Site Key\",\"value\":\"6Lfpm3cUAAAAAGIjbEJKhJNKS4X1Gns9ANjh8MfH\"}}', 'recaptcha.png', 0, NULL, '2019-10-18 23:16:05', '2021-03-21 00:13:12'),
(3, 'custom-captcha', 'Custom Captcha', 'Just Put Any Random String', 'customcaptcha.png', NULL, '{\"random_key\":{\"title\":\"Random String\",\"value\":\"SecureString\"}}', 'na', 0, NULL, '2019-10-18 23:16:05', '2021-03-21 00:13:06'),
(4, 'google-analytics', 'Google Analytics', 'Key location is shown bellow', 'google-analytics.png', '<script async src=\"https://www.googletagmanager.com/gtag/js?id={{app_key}}\"></script>\r\n                <script>\r\n                  window.dataLayer = window.dataLayer || [];\r\n                  function gtag(){dataLayer.push(arguments);}\r\n                  gtag(\"js\", new Date());\r\n                \r\n                  gtag(\"config\", \"{{app_key}}\");\r\n                </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"Demo\"}}', 'ganalytics.png', 1, NULL, NULL, '2021-03-21 00:13:03'),
(5, 'fb-comment', 'Facebook Comment ', 'Key location is shown bellow', 'Facebook.png', '<div id=\"fb-root\"></div><script async defer crossorigin=\"anonymous\" src=\"https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId={{app_key}}&autoLogAppEvents=1\"></script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"713047905830100\"}}', 'fb_com.PNG', 1, NULL, NULL, '2021-03-21 03:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontends`
--

CREATE TABLE `frontends` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_keys` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_values` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(40, 'banner.content', '{\"has_image\":\"1\",\"heading\":\"The Most Popular Online Exam Site\",\"sub_heading\":\"We Will Open The World Of Knowledge For You !\",\"button_1_text\":\"Get Started\",\"button_1_link\":\"\\/user\\/dashboard\",\"button_2_text\":\"Learn More\",\"button_2_link\":\"\\/login\",\"background_image\":\"6092589a56d991620203674.jpg\"}', '2021-03-20 04:26:41', '2021-05-22 16:49:22'),
(41, 'feature.element', '{\"heading\":\"Join Us\",\"sub_heading\":\"Welcome to the SCIT\",\"short_details\":\"Join to our SCIT community. Get the latest update and Our support team are always by your side and provide you with the best possible support!\"}', '2021-03-20 04:38:12', '2022-04-07 13:43:58'),
(42, 'feature.element', '{\"heading\":\"Attend Your Examination\",\"sub_heading\":\"Subject &amp; Resources\",\"short_details\":\"Choose your subject and question bank with lots of questions. And get ready to give the exam. The random questions you you will get in your exams.\"}', '2021-03-20 04:38:27', '2021-05-22 16:18:31'),
(43, 'feature.element', '{\"heading\":\"Get Support\",\"sub_heading\":\"Support &amp; Service\",\"short_details\":\"Our Support team are at your service. If need anything, request or support! We are available for You!\"}', '2021-03-20 04:39:01', '2021-05-22 16:12:41'),
(44, 'popular.content', '{\"heading\":\"Our Most Popular Subjects\"}', '2021-03-20 05:10:04', '2021-03-20 05:10:04'),
(45, 'statistic.content', '{\"heading\":\"Our Achievements\"}', '2021-03-20 05:20:49', '2021-03-20 05:20:49'),
(46, 'statistic.element', '{\"icon\":\"<i class=\\\"fas fa-users\\\"><\\/i>\",\"count\":\"5000+\",\"title\":\"Total Student\"}', '2021-03-20 05:21:21', '2021-03-20 05:21:21'),
(47, 'statistic.element', '{\"icon\":\"<i class=\\\"fas fa-graduation-cap\\\"><\\/i>\",\"count\":\"2555+\",\"title\":\"Graduation Completed\"}', '2021-03-20 05:21:54', '2021-03-20 05:21:54'),
(48, 'statistic.element', '{\"icon\":\"<i class=\\\"las la-globe-africa\\\"><\\/i>\",\"count\":\"5,342+\",\"title\":\"Global Position\"}', '2021-03-20 05:22:43', '2021-03-20 05:22:43'),
(49, 'statistic.element', '{\"icon\":\"<i class=\\\"fas fa-book-open\\\"><\\/i>\",\"count\":\"255+\",\"title\":\"Total Courses\"}', '2021-03-20 05:23:12', '2021-03-20 05:23:12'),
(50, 'upcomming.content', '{\"heading\":\"Upcoming Exams\"}', '2021-03-20 05:34:56', '2021-03-20 05:34:56'),
(51, 'career.content', '{\"heading\":\"Why SCIT Is Best\"}', '2021-03-20 06:03:26', '2022-03-31 17:46:42'),
(52, 'career.element', '{\"title\":\"Choose Your Own Category\",\"short_details\":\"Choose the exam category based on your subject. This helps you typically differentiate between subjects that are essential for studying a particular course and subjects.\"}', '2021-03-20 06:03:43', '2021-05-22 18:26:17'),
(53, 'career.element', '{\"title\":\"Select The Preferable Subject\",\"short_details\":\"The aim of this to help you see things more clearly and get a good impression of the possible options, whether you have your heart set on a particular career path or not.\"}', '2021-03-20 06:03:52', '2021-05-22 18:26:01'),
(54, 'career.element', '{\"title\":\"Attend The Examination\",\"short_details\":\"On a good thing, Here you can give an online exam that is required based on your preferable subject. This is too easy,  you just need to register and get ready for the exam.\"}', '2021-03-20 06:04:02', '2021-05-22 15:57:23'),
(55, 'career.element', '{\"title\":\"Get Your Result Fast\",\"short_details\":\"After finished your examination, you can get your result very easily. Go to your dashboard and see the result of the examination you attend. Isn\'t so easy!\"}', '2021-03-20 06:04:09', '2021-05-22 16:00:32'),
(57, 'testimonial.content', '{\"heading\":\"What Client\\u2019s Say About Us\",\"has_image\":\"1\",\"background_image\":\"6055f04624b471616244806.jpg\"}', '2021-03-20 06:15:19', '2021-03-20 06:53:27'),
(58, 'testimonial.element', '{\"has_image\":\"1\",\"author_name\":\"William Troyson\",\"author_designation\":\"Candidate\",\"quote\":\"Very informative professional site, hope to have the opportunity to see more subject. Nice experience  from here and great work,  This such a honest, decent and reliable site\",\"author_image\":\"6055e7874ef6e1616242567.jpg\"}', '2021-03-20 06:16:07', '2021-05-22 16:46:32'),
(59, 'testimonial.element', '{\"has_image\":\"1\",\"author_name\":\"Max Polins\",\"author_designation\":\"Candidate\",\"quote\":\"This such a honest, decent and reliable site i love it. This Site has a unique feel, thanks to the the maker. Thanks so much! You were an EXCELLENT!\",\"author_image\":\"6055e79bda8631616242587.jpg\"}', '2021-03-20 06:16:27', '2021-05-22 16:45:59'),
(60, 'testimonial.element', '{\"has_image\":\"1\",\"author_name\":\"Ben Kitrew\",\"author_designation\":\"Candidate\",\"quote\":\"This page has a unique feel, thanks to the the maker. Thanks so much! You were an EXCELLENT! This such a honest, decent and reliable site i love it.\",\"author_image\":\"6055e7b57fa351616242613.jpg\"}', '2021-03-20 06:16:53', '2021-05-22 16:45:21'),
(61, 'faq.content', '{\"has_image\":\"1\",\"heading\":\"Frequently Asked Question\",\"video_link\":\"https:\\/\\/www.youtube.com\\/embed\\/shfeN07ZBJg\",\"background_image\":\"6055eed07ccf31616244432.jpg\"}', '2021-03-20 06:41:37', '2021-03-20 06:47:12'),
(62, 'faq.element', '{\"question\":\"How to register?\",\"answer\":\"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.\\u00a0\"}', '2021-03-20 06:42:50', '2021-05-22 16:03:53'),
(63, 'faq.element', '{\"question\":\"How to attend the exam?\",\"answer\":\"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.\\u00a0\"}', '2021-03-20 06:43:05', '2021-05-22 16:04:15'),
(64, 'faq.element', '{\"question\":\"How will I get my result?\",\"answer\":\"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.\\u00a0\"}', '2021-03-20 06:43:18', '2021-05-22 16:04:40'),
(65, 'faq.element', '{\"question\":\"How may subjects are there?\",\"answer\":\"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.\\u00a0\"}', '2021-03-20 06:43:25', '2021-05-22 16:05:02'),
(66, 'faq.element', '{\"question\":\"How I will get the support?\",\"answer\":\"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.\\u00a0\"}', '2021-03-20 06:43:32', '2021-05-22 16:05:37'),
(67, 'subscribe.content', '{\"has_image\":\"1\",\"heading\":\"Subscribe for newsletter\",\"button_text\":\"subscribe\",\"placeholder\":\"Enter Your Valid Email Adress\",\"background_image\":\"6055f18f50e6b1616245135.jpg\"}', '2021-03-20 06:58:55', '2021-03-20 06:58:56'),
(68, 'blog.content', '{\"heading\":\"Get Every Latest News Feed\"}', '2021-03-20 23:10:38', '2021-03-20 23:11:42'),
(69, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Top Exam Preparation Tips\",\"body\":\"<h3 style=\\\"font-weight:400;line-height:40px;color:rgb(42,42,42);margin-top:20px;margin-bottom:10px;font-size:24px;font-style:normal;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">1. Start your revision early<\\/h3><p class=\\\"first-para\\\" style=\\\"margin:0px 0px 15px;font-weight:700;font-size:18px;line-height:24px;color:rgb(42,42,42);font-style:normal;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">There is no substitute for starting early with revision.<\\/p><p style=\\\"margin:0px 0px 15px;color:rgb(42,42,42);font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">You need to give yourself enough time to review everything that you have studied, and make sure that you understand it (or to read round the subject or ask for help if you are struggling). Last minute cramming is much less productive.<\\/p><p style=\\\"margin:0px 0px 15px;color:rgb(42,42,42);font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">Ideally, review each subject as you go, and make sure that you understand it fully as this will make revision much easier. Ultimately, the best tip is to study hard and know your subject, and starting early is the best way to achieve this.<\\/p><hr style=\\\"height:0px;margin-top:20px;margin-bottom:20px;border-color:rgb(144,144,144);border-style:solid none none;border-width:1px 0px medium;color:rgb(42,42,42);font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\" \\/><h3 style=\\\"font-weight:400;line-height:40px;color:rgb(42,42,42);margin-top:20px;margin-bottom:10px;font-size:24px;font-style:normal;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">2. Organise your study time<\\/h3><p style=\\\"margin:0px 0px 15px;color:rgb(42,42,42);font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">You will almost certainly find some subjects easier than others. You will also find that you have more to revise for some subjects than others.<\\/p><div class=\\\"infobox2 text-info\\\" style=\\\"color:rgb(49,112,143);background:rgb(236,236,236) none repeat scroll 0% 0%;border-bottom:1px solid rgba(255,255,255,0.9);padding:20px 20px 10px;margin-bottom:30px;font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\"><p style=\\\"margin:0px 0px 15px;\\\">It is worth taking the time to plan your revision and consider how much time you might need for each subject.<\\/p><\\/div><p style=\\\"margin:0px 0px 15px;color:rgb(42,42,42);font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">It is also helpful to consider when and how long you plan to spend studying each day. How much time will you be able to manage each day? What other commitments do you have during your study period?<\\/p><p style=\\\"margin:0px 0px 15px;color:rgb(42,42,42);font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">Plan your revision to ensure that you use your time to best advantage. When is the best time of day for you\\u2014morning, afternoon or evening? Can you do more reading at particular times? This will help you to plan broadly what you intend to do, although you should always make sure that you leave it flexible enough to adapt later if circumstances change.<\\/p><p style=\\\"margin:0px 0px 15px;color:rgb(42,42,42);font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">There is more about this in our pages of\\u00a0<span style=\\\"background-color:transparent;color:rgb(2,46,97);text-decoration:none;\\\">Top Tips for Studying<\\/span>\\u00a0and on\\u00a0<span style=\\\"background-color:transparent;color:rgb(2,46,97);text-decoration:none;\\\">Getting Organised to Study<\\/span>.<\\/p><hr style=\\\"height:0px;margin-top:20px;margin-bottom:20px;border-color:rgb(144,144,144);border-style:solid none none;border-width:1px 0px medium;color:rgb(42,42,42);font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\" \\/><h3 style=\\\"font-weight:400;line-height:40px;color:rgb(42,42,42);margin-top:20px;margin-bottom:10px;font-size:24px;font-style:normal;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">3. Look after yourself during study and exam time<\\/h3><p class=\\\"first-para\\\" style=\\\"margin:0px 0px 15px;font-weight:700;font-size:18px;line-height:24px;color:rgb(42,42,42);font-style:normal;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">You will be able to work better if you eat a healthy diet, and get plenty of sleep.<\\/p><p style=\\\"margin:0px 0px 15px;color:rgb(42,42,42);font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">This applies both during your exam period, and when you are revising. Surviving on junk food is not a good idea. For more about the importance of diet and sleep, see our pages on\\u00a0<span style=\\\"background-color:transparent;color:rgb(2,46,97);text-decoration:none;\\\">Food, Diet, and Nutrition<\\/span>\\u00a0and\\u00a0<span style=\\\"background-color:transparent;color:rgb(2,46,97);text-decoration:none;\\\">The Importance of Sleep<\\/span>.<\\/p><p style=\\\"margin:0px 0px 15px;color:rgb(42,42,42);font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">It is also a good idea to take regular exercise when studying. A brisk walk, or more vigorous exercise, will get your blood moving and ensure that you are better able to concentrate. There is more about this in our page on\\u00a0<span style=\\\"background-color:transparent;color:rgb(2,46,97);text-decoration:none;\\\">The Importance of Exercise<\\/span>.<\\/p><hr style=\\\"height:0px;margin-top:20px;margin-bottom:20px;border-color:rgb(144,144,144);border-style:solid none none;border-width:1px 0px medium;color:rgb(42,42,42);font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\" \\/><h3 style=\\\"font-weight:400;line-height:40px;color:rgb(42,42,42);margin-top:20px;margin-bottom:10px;font-size:24px;font-style:normal;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">4. Vary your revision techniques<\\/h3><p class=\\\"first-para\\\" style=\\\"margin:0px 0px 15px;font-weight:700;font-size:18px;line-height:24px;color:rgb(42,42,42);font-style:normal;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\">They say that variety is the spice of life, and it certainly helps to improve your studying.<\\/p><br style=\\\"color:rgb(42,42,42);font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\" \\/><br style=\\\"color:rgb(42,42,42);font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(245,245,245);\\\" \\/>Read more at:\\u00a0<span style=\\\"background-color:rgb(245,245,245);color:rgb(2,46,97);text-decoration:none;font-size:16px;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\">https:\\/\\/www.skillsyouneed.com\\/learn\\/exam-tips.html<\\/span>\",\"cover_image\":\"608e1f2c9c5421619926828.jpg\"}', '2021-03-20 23:13:22', '2021-05-22 14:00:55'),
(70, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"15 Exam Preparation Tips: Key To Success\",\"body\":\"<h2 style=\\\"margin-bottom:10px;line-height:24px;color:rgb(0,0,0);padding:0px;\\\"><span style=\\\"color:rgb(102,102,102);\\\"><font size=\\\"3\\\" face=\\\"arial\\\"><span style=\\\"font-weight:bolder;\\\">!!Far far away, behind the word mountains?<\\/span><\\/font><\\/span><\\/h2><h2 style=\\\"margin-bottom:10px;line-height:24px;color:rgb(0,0,0);padding:0px;\\\"><span style=\\\"color:rgb(102,102,102);\\\"><font size=\\\"3\\\" face=\\\"arial\\\">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn\\u2019t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek,<\\/font><\\/span><br \\/><\\/h2><h2 style=\\\"margin-bottom:10px;line-height:24px;color:rgb(0,0,0);padding:0px;\\\"><span style=\\\"color:rgb(102,102,102);\\\"><font size=\\\"3\\\" face=\\\"arial\\\">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn\\u2019t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then<\\/font><\\/span><\\/h2><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div style=\\\"color:rgb(33,37,41);font-family:Montserrat, sans-serif;font-size:16px;\\\"><\\/div><div style=\\\"color:rgb(33,37,41);font-family:Montserrat, sans-serif;font-size:16px;\\\"><span style=\\\"color:rgb(102,102,102);\\\"><font size=\\\"3\\\" face=\\\"arial\\\"><br \\/><\\/font><\\/span><\\/div><div style=\\\"color:rgb(33,37,41);font-family:Montserrat, sans-serif;font-size:16px;\\\"><\\/div><h2 style=\\\"margin:0px 0px 10px;font-weight:500;line-height:24px;font-size:2rem;color:rgb(0,0,0);padding:0px;\\\"><span style=\\\"color:rgb(102,102,102);margin-bottom:0px;\\\"><font size=\\\"3\\\" face=\\\"arial\\\">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn\\u2019t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then<\\/font><\\/span><\\/h2>\",\"cover_image\":\"608e1f8d4fb5b1619926925.jpg\"}', '2021-03-20 23:14:24', '2021-05-22 14:07:23'),
(71, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Exam Preparation: Ten Study Tips\",\"body\":\"<h2 style=\\\"margin-bottom:10px;line-height:24px;color:rgb(0,0,0);padding:0px;\\\"><span style=\\\"color:rgb(102,102,102);\\\"><font size=\\\"3\\\" face=\\\"arial\\\"><span style=\\\"font-weight:bolder;\\\">!!Far far away, behind the word mountains?<\\/span><\\/font><\\/span><\\/h2><h2 style=\\\"margin-bottom:10px;line-height:24px;color:rgb(0,0,0);padding:0px;\\\"><span style=\\\"color:rgb(102,102,102);\\\"><font size=\\\"3\\\" face=\\\"arial\\\">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn\\u2019t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek,<\\/font><\\/span><br \\/><\\/h2><h2 style=\\\"margin-bottom:10px;line-height:24px;color:rgb(0,0,0);padding:0px;\\\"><span style=\\\"color:rgb(102,102,102);\\\"><font size=\\\"3\\\" face=\\\"arial\\\">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn\\u2019t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then<\\/font><\\/span><\\/h2><h2 style=\\\"margin-bottom:10px;line-height:24px;font-size:24px;color:rgb(0,0,0);padding:0px;font-family:DauphinPlain;\\\"><\\/h2><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div style=\\\"color:rgb(33,37,41);font-family:Montserrat, sans-serif;font-size:16px;\\\"><\\/div><div style=\\\"color:rgb(33,37,41);font-family:Montserrat, sans-serif;font-size:16px;\\\"><span style=\\\"color:rgb(102,102,102);\\\"><font size=\\\"3\\\" face=\\\"arial\\\"><br \\/><\\/font><\\/span><\\/div><div style=\\\"color:rgb(33,37,41);font-family:Montserrat, sans-serif;font-size:16px;\\\"><\\/div><h2 style=\\\"margin-bottom:10px;line-height:24px;color:rgb(0,0,0);padding:0px;\\\"><span style=\\\"color:rgb(102,102,102);\\\"><font size=\\\"3\\\" face=\\\"arial\\\">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn\\u2019t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then<\\/font><\\/span><\\/h2>\",\"cover_image\":\"608e202b191411619927083.jpg\"}', '2021-03-20 23:14:48', '2021-05-22 14:08:31'),
(72, 'footer.element', '{\"icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"link\":\"https:\\/\\/www.facebook.com\\/\"}', '2021-03-20 23:38:55', '2021-05-22 16:27:01'),
(73, 'footer.element', '{\"icon\":\"<i class=\\\"fab fa-linkedin-in\\\"><\\/i>\",\"link\":\"https:\\/\\/www.linkedin.com\\/\"}', '2021-03-20 23:39:20', '2021-05-22 16:27:36'),
(74, 'footer.element', '{\"icon\":\"<i class=\\\"fab fa-instagram\\\"><\\/i>\",\"link\":\"https:\\/\\/www.instagram.com\\/\"}', '2021-03-20 23:40:33', '2021-05-22 16:27:47'),
(75, 'footer.element', '{\"icon\":\"<i class=\\\"fab fa-twitter\\\"><\\/i>\",\"link\":\"https:\\/\\/www.twitter.com\\/\"}', '2021-03-20 23:41:08', '2021-05-22 16:27:56'),
(76, 'footer.content', '{\"short_details\":\"We Will Open The World Of Knowledge For You! This is the latest online examination system you will ever need! With our easy online exam site, you will set up your own engaging exams that fit any kind of difficulty level and be a learning expert.\"}', '2021-03-20 23:41:23', '2021-05-22 16:33:57'),
(77, 'policy.element', '{\"title\":\"Terms and Condition\",\"description\":\"<h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;font-size:16px;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We claim all authority to dismiss, end, or handicap any help with or without cause per administrator discretion. This is a Complete independent facilitating, on the off chance that you misuse our ticket or Livechat or emotionally supportive network by submitting solicitations or protests we will impair your record. The solitary time you should reach us about the seaward facilitating is if there is an issue with the worker. We have not many substance limitations and everything is as per laws and guidelines. Try not to join on the off chance that you intend to do anything contrary to the guidelines, we do check these things and we will know, don\'t burn through our own and your time by joining on the off chance that you figure you will have the option to sneak by us and break the terms.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;font-size:16px;margin-bottom:3rem;\\\"><ul class=\\\"font-18\\\" style=\\\"padding-left:15px;list-style-type:disc;font-size:18px;\\\"><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Configuration requests - If you have a fully managed dedicated server with us then we offer custom PHP\\/MySQL configurations, firewalls for dedicated IPs, DNS, and httpd configurations.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Software requests - Cpanel Extension Installation will be granted as long as it does not interfere with the security, stability, and performance of other users on the server.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Emergency Support - We do not provide emergency support \\/ Phone Support \\/ LiveChat Support. Support may take some hours sometimes.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Webmaster help - We do not offer any support for webmaster related issues and difficulty including coding, &amp; installs, Error solving. if there is an issue where a library or configuration of the server then we can help you if it\'s possible from our end.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Backups - We keep backups but we are not responsible for data loss, you are fully responsible for all backups.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">We Don\'t support any child porn or such material.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">No spam-related sites or material, such as email lists, mass mail programs, and scripts, etc.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">No harassing material that may cause people to retaliate against you.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">No phishing pages.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">You may not run any exploitation script from the server. reason can be terminated immediately.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">If Anyone attempting to hack or exploit the server by using your script or hosting, we will terminate your account to keep safe other users.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Malicious Botnets are strictly forbidden.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Spam, mass mailing, or email marketing in any way are strictly forbidden here.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Malicious hacking materials, trojans, viruses, &amp; malicious bots running or for download are forbidden.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Resource and cronjob abuse is forbidden and will result in suspension or termination.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Php\\/CGI proxies are strictly forbidden.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">CGI-IRC is strictly forbidden.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">No fake or disposal mailers, mass mailing, mail bombers, SMS bombers, etc.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">NO CREDIT OR REFUND will be granted for interruptions of service, due to User Agreement violations.<\\/li><\\/ul><\\/div><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Terms &amp; Conditions for Users<\\/h3><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;font-size:16px;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">Before getting to this site, you are consenting to be limited by these site Terms and Conditions of Use, every single appropriate law, and guidelines, and concur that you are answerable for consistency with any material neighborhood laws. If you disagree with any of these terms, you are restricted from utilizing or getting to this site.<\\/p><\\/div><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Support<\\/h3><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;font-size:16px;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">Whenever you have downloaded our item, you may get in touch with us for help through email and we will give a valiant effort to determine your issue. We will attempt to answer using the Email for more modest bug fixes, after which we will refresh the center bundle. Content help is offered to confirmed clients by Tickets as it were. Backing demands made by email and Livechat.<\\/p><p class=\\\"my-3 font-18 font-weight-bold\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">On the off chance that your help requires extra adjustment of the System, at that point, you have two alternatives:<\\/p><ul class=\\\"font-18\\\" style=\\\"padding-left:15px;list-style-type:disc;font-size:18px;\\\"><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Hang tight for additional update discharge.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Or on the other hand, enlist a specialist (We offer customization for extra charges).<\\/li><\\/ul><\\/div><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Ownership<\\/h3><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;font-size:16px;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">You may not guarantee scholarly or selective possession of any of our items, altered or unmodified. All items are property, we created them. Our items are given \\\"with no guarantees\\\" without guarantee of any sort, either communicated or suggested. On no occasion will our juridical individual be subject to any harms including, however not restricted to, immediate, roundabout, extraordinary, accidental, or significant harms or different misfortunes emerging out of the utilization of or powerlessness to utilize our items.<\\/p><\\/div><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Warranty<\\/h3><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;font-size:16px;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We don\'t offer any guarantee or assurance of these Services in any way. When our Services have been modified we can\'t ensure they will work with all outsider plugins, modules, or internet browsers. Program similarity ought to be tried against the show formats on the demo worker. If you don\'t mind guarantee that the programs you use will work with the component, as we can not ensure that our systems will work with all program mixes.<\\/p><\\/div><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Unauthorized\\/Illegal Usage<\\/h3><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;font-size:16px;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">You may not utilize our things for any illicit or unapproved reason or may you, in the utilization of the stage, disregard any laws in your locale (counting yet not restricted to copyright laws) just as the laws of your nation and International law. Specifically, it is disallowed to utilize the things on our foundation for pages that advance: brutality, illegal intimidation, hard sexual entertainment, bigotry, obscenity content or warez programming joins.<br \\/><br \\/>You can\'t imitate, copy, duplicate, sell, exchange or adventure any of our segment, utilization of the offered on our things, or admittance to the administration without the express composed consent by us or item proprietor.<br \\/><br \\/>Our Members are liable for all substance posted on the discussion and demo and movement that happens under your record.<br \\/><br \\/>We hold the chance of hindering your participation account quickly if we will think about a particularly not allowed conduct.<br \\/><br \\/>If you make a record on our site, you are liable for keeping up the security of your record, and you are completely answerable for all exercises that happen under the record and some other activities taken regarding the record. You should quickly inform us, of any unapproved employments of your record or some other penetrates of security.<\\/p><\\/div>\"}', '2021-03-20 23:49:10', '2021-05-01 21:55:50'),
(78, 'policy.element', '{\"title\":\"Privacy Policy\",\"description\":\"<h3 class=\\\"mb-3\\\" style=\\\"margin-top:0px;margin-bottom:1rem;font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);margin-right:0px;margin-left:0px;\\\">What information do we collect?<\\/h3><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;font-size:16px;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We gather data from you when you register on our site, submit a request, buy any services, react to an overview, or round out a structure. At the point when requesting any assistance or enrolling on our site, as suitable, you might be approached to enter your: name, email address, or telephone number. You may, nonetheless, visit our site anonymously.<\\/p><\\/div><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">How do we protect your information?<\\/h3><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;font-size:16px;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">All provided delicate\\/credit data is sent through Stripe.<br \\/>After an exchange, your private data (credit cards, social security numbers, financials, and so on) won\'t be put away on our workers.<\\/p><\\/div><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Do we disclose any information to outside parties?<\\/h3><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;font-size:16px;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We don\'t sell, exchange, or in any case move to outside gatherings by and by recognizable data. This does exclude confided in outsiders who help us in working our site, leading our business, or adjusting you, since those gatherings consent to keep this data private. We may likewise deliver your data when we accept discharge is suitable to follow the law, implement our site strategies, or ensure our own or others\' rights, property, or wellbeing.<\\/p><\\/div><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Children\'s Online Privacy Protection Act Compliance<\\/h3><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;font-size:16px;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We are consistent with the prerequisites of COPPA (Children\'s Online Privacy Protection Act), we don\'t gather any data from anybody under 13 years old. Our site, items, and administrations are completely coordinated to individuals who are in any event 13 years of age or more established.<\\/p><\\/div><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Changes to our Privacy Policy<\\/h3><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;font-size:16px;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">If we decide to change our privacy policy, we will post those changes on this page.<\\/p><\\/div><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">How long we retain your information?<\\/h3><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;font-size:16px;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">At the point when you register for our site, we cycle and keep your information we have about you however long you don\'t erase the record or withdraw yourself (subject to laws and guidelines).<\\/p><\\/div><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">What we don\\u2019t do with your data<\\/h3><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\"><\\/h2><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;font-size:16px;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We don\'t and will never share, unveil, sell, or in any case give your information to different organizations for the promoting of their items or administrations.<\\/p><\\/div>\"}', '2021-03-20 23:49:53', '2021-05-01 21:54:56'),
(79, 'login.content', '{\"has_image\":\"1\",\"background_image\":\"6056ef489cd601616310088.jpg\"}', '2021-03-21 01:01:28', '2021-03-21 01:01:29'),
(80, 'breadcrumb.content', '{\"has_image\":\"1\",\"background_image\":\"60570407be1c91616315399.jpg\"}', '2021-03-21 02:29:59', '2021-03-21 02:30:00'),
(81, 'contact.content', '{\"heading\":\"Get In Touch\",\"short_details\":\"Questions, bug reports, complaints, and compliments \\u2014 we\\u2019re here for it all. Our support team is ready to help you!\",\"address\":\"22,bekar street, london\",\"email\":\"Example@company.com\",\"phone\":\"+56866954646\",\"latitude\":\"1.352083\",\"longitude\":\"103.819839\",\"map_api\":\"AIzaSyCo_pcAdFNbTDCAvMwAD19oRTuEmb9M50c\"}', '2021-03-21 07:19:08', '2021-05-22 16:02:31'),
(82, 'seo.data', '{\"seo_image\":\"1\",\"keywords\":[\"online exam\",\"exam\",\"mcq\"],\"description\":\"online exam Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\",\"social_title\":\"SCIT\",\"social_description\":\"SCIT Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\",\"image\":\"624e854b6b1a81649313099.png\"}', '2021-04-21 02:01:23', '2022-04-07 13:31:39');
INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(83, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Organize study groups with friends\",\"body\":\"<div><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">Get together with friends for a<span>\\u00a0<\\/span><\\/span><a href=\\\"https:\\/\\/www.topuniversities.com\\/blog\\/university-study-groups-benefits\\\" style=\\\"color:rgb(23,71,148);text-decoration:none;background-color:rgb(255,255,255);font-family:lato;font-size:18px;font-weight:400;font-style:normal;font-variant:normal;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\">study session<\\/a><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">. You may have questions that they have the answers to and vice versa. As long as you make sure you stay focused on the topic for an agreed amount of time, this can be one of the most effective ways to challenge yourself.<\\/span><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">Get together with friends for a<span>\\u00a0<\\/span><\\/span><a href=\\\"https:\\/\\/www.topuniversities.com\\/blog\\/university-study-groups-benefits\\\" style=\\\"color:rgb(23,71,148);text-decoration:none;background-color:rgb(255,255,255);font-family:lato;font-size:18px;font-weight:400;font-style:normal;font-variant:normal;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\">study session<\\/a><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">. You may have questions that they have the answers to and vice versa. As long as you make sure you stay focused on the topic for an agreed amount of time, this can be one of the most effective ways to challenge yourself.<\\/span><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">Get together with friends for a<span>\\u00a0<\\/span><\\/span><a href=\\\"https:\\/\\/www.topuniversities.com\\/blog\\/university-study-groups-benefits\\\" style=\\\"color:rgb(23,71,148);text-decoration:none;background-color:rgb(255,255,255);font-family:lato;font-size:18px;font-weight:400;font-style:normal;font-variant:normal;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\">study session<\\/a><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">. You may have questions that they have the answers to and vice versa. As long as you make sure you stay focused on the topic for an agreed amount of time, this can be one of the most effective ways to challenge yourself.<\\/span><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">Get together with friends for a<span>\\u00a0<\\/span><\\/span><a href=\\\"https:\\/\\/www.topuniversities.com\\/blog\\/university-study-groups-benefits\\\" style=\\\"color:rgb(23,71,148);text-decoration:none;background-color:rgb(255,255,255);font-family:lato;font-size:18px;font-weight:400;font-style:normal;font-variant:normal;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\">study session<\\/a><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">. You may have questions that they have the answers to and vice versa. As long as you make sure you stay focused on the topic for an agreed amount of time, this can be one of the most effective ways to challenge yourself.<\\/span><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">Get together with friends for a<span>\\u00a0<\\/span><\\/span><a href=\\\"https:\\/\\/www.topuniversities.com\\/blog\\/university-study-groups-benefits\\\" style=\\\"color:rgb(23,71,148);text-decoration:none;background-color:rgb(255,255,255);font-family:lato;font-size:18px;font-weight:400;font-style:normal;font-variant:normal;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\">study session<\\/a><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">. You may have questions that they have the answers to and vice versa. As long as you make sure you stay focused on the topic for an agreed amount of time, this can be one of the most effective ways to challenge yourself.<\\/span><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">Get together with friends for a<span>\\u00a0<\\/span><\\/span><a href=\\\"https:\\/\\/www.topuniversities.com\\/blog\\/university-study-groups-benefits\\\" style=\\\"color:rgb(23,71,148);text-decoration:none;background-color:rgb(255,255,255);font-family:lato;font-size:18px;font-weight:400;font-style:normal;font-variant:normal;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\">study session<\\/a><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">. You may have questions that they have the answers to and vice versa. As long as you make sure you stay focused on the topic for an agreed amount of time, this can be one of the most effective ways to challenge yourself.<\\/span><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">Get together with friends for a<span>\\u00a0<\\/span><\\/span><a href=\\\"https:\\/\\/www.topuniversities.com\\/blog\\/university-study-groups-benefits\\\" style=\\\"color:rgb(23,71,148);text-decoration:none;background-color:rgb(255,255,255);font-family:lato;font-size:18px;font-weight:400;font-style:normal;font-variant:normal;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\">study session<\\/a><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">. You may have questions that they have the answers to and vice versa. As long as you make sure you stay focused on the topic for an agreed amount of time, this can be one of the most effective ways to challenge yourself.<\\/span><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">Get together with friends for a<span>\\u00a0<\\/span><\\/span><a href=\\\"https:\\/\\/www.topuniversities.com\\/blog\\/university-study-groups-benefits\\\" style=\\\"color:rgb(23,71,148);text-decoration:none;background-color:rgb(255,255,255);font-family:lato;font-size:18px;font-weight:400;font-style:normal;font-variant:normal;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\">study session<\\/a><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">. You may have questions that they have the answers to and vice versa. As long as you make sure you stay focused on the topic for an agreed amount of time, this can be one of the most effective ways to challenge yourself.<\\/span><\\/div><div><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\"><br \\/><\\/span><\\/div><div><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\"><br \\/><\\/span><\\/div><div><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\"><br \\/><\\/span><\\/div><div><br \\/><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\"><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">Get together with friends for a<span>\\u00a0<\\/span><\\/span><a href=\\\"https:\\/\\/www.topuniversities.com\\/blog\\/university-study-groups-benefits\\\" style=\\\"color:rgb(23,71,148);text-decoration:none;background-color:rgb(255,255,255);font-family:lato;font-size:18px;font-weight:400;font-style:normal;font-variant:normal;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\">study session<\\/a><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">. You may have questions that they have the answers to and vice versa. As long as you make sure you stay focused on the topic for an agreed amount of time, this can be one of the most effective ways to challenge yourself.<\\/span><\\/span><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">Get together with friends for a<span>\\u00a0<\\/span><\\/span><a href=\\\"https:\\/\\/www.topuniversities.com\\/blog\\/university-study-groups-benefits\\\" style=\\\"color:rgb(23,71,148);text-decoration:none;background-color:rgb(255,255,255);font-family:lato;font-size:18px;font-weight:400;font-style:normal;font-variant:normal;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\">study session<\\/a><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">. You may have questions that they have the answers to and vice versa. As long as you make sure you stay focused on the topic for an agreed amount of time, this can be one of the most effective ways to challenge yourself.<\\/span><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">Get together with friends for a<span>\\u00a0<\\/span><\\/span><a href=\\\"https:\\/\\/www.topuniversities.com\\/blog\\/university-study-groups-benefits\\\" style=\\\"color:rgb(23,71,148);text-decoration:none;background-color:rgb(255,255,255);font-family:lato;font-size:18px;font-weight:400;font-style:normal;font-variant:normal;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\">study session<\\/a><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">. You may have questions that they have the answers to and vice versa. As long as you make sure you stay focused on the topic for an agreed amount of time, this can be one of the most effective ways to challenge yourself.<\\/span><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">Get together with friends for a<span>\\u00a0<\\/span><\\/span><a href=\\\"https:\\/\\/www.topuniversities.com\\/blog\\/university-study-groups-benefits\\\" style=\\\"color:rgb(23,71,148);text-decoration:none;background-color:rgb(255,255,255);font-family:lato;font-size:18px;font-weight:400;font-style:normal;font-variant:normal;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\">study session<\\/a><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">. You may have questions that they have the answers to and vice versa. As long as you make sure you stay focused on the topic for an agreed amount of time, this can be one of the most effective ways to challenge yourself.<\\/span><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">Get together with friends for a<span>\\u00a0<\\/span><\\/span><a href=\\\"https:\\/\\/www.topuniversities.com\\/blog\\/university-study-groups-benefits\\\" style=\\\"color:rgb(23,71,148);text-decoration:none;background-color:rgb(255,255,255);font-family:lato;font-size:18px;font-weight:400;font-style:normal;font-variant:normal;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;\\\">study session<\\/a><span style=\\\"color:rgb(29,29,27);font-family:lato;font-size:18px;font-style:normal;font-weight:400;letter-spacing:normal;text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);float:none;\\\">. You may have questions that they have the answers to and vice versa. As long as you make sure you stay focused on the topic for an agreed amount of time, this can be one of the most effective ways to challenge yourself.<\\/span><\\/div>\",\"cover_image\":\"60a8cc325387d1621675058.jpg\"}', '2021-05-22 14:10:30', '2021-05-22 14:17:39'),
(84, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Plan your exam day\",\"body\":\"<p style=\\\"margin-top:0px;margin-bottom:8px;font-family:lato;font-size:18px;font-style:normal;font-variant:normal;font-weight:400;letter-spacing:normal;line-height:28px;color:rgb(29,29,27);text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);\\\">Make sure you get everything ready well in advance of the exam - don\'t leave it to the day before to suddenly realize you don\'t know the way, or what you\'re supposed to bring. Check all the rules and requirements, and plan your route and journey time. If possible, do a test run of the trip. If not, write down clear directions.<\\/p><p style=\\\"margin-top:0px;margin-bottom:8px;font-family:lato;font-size:18px;font-style:normal;font-variant:normal;font-weight:400;letter-spacing:normal;line-height:28px;color:rgb(29,29,27);text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);\\\">Work out how long it will take to get there - then add on some extra time. You really don\'t want to arrive having had to run halfway or feeling frazzled from losing your way.\\u00a0You could also make plans to travel to the exam with friends or classmates, as long as you know they\'re likely to be punctual.<\\/p><p style=\\\"margin-top:0px;margin-bottom:8px;font-family:lato;font-size:18px;font-style:normal;font-variant:normal;font-weight:400;letter-spacing:normal;line-height:28px;color:rgb(29,29,27);text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);\\\">Make sure you get everything ready well in advance of the exam - don\'t leave it to the day before to suddenly realize you don\'t know the way, or what you\'re supposed to bring. Check all the rules and requirements, and plan your route and journey time. If possible, do a test run of the trip. If not, write down clear directions.<\\/p><p style=\\\"margin-top:0px;margin-bottom:8px;font-family:lato;font-size:18px;font-style:normal;font-variant:normal;font-weight:400;letter-spacing:normal;line-height:28px;color:rgb(29,29,27);text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);\\\">Work out how long it will take to get there - then add on some extra time. You really don\'t want to arrive having had to run halfway or feeling frazzled from losing your way.\\u00a0You could also make plans to travel to the exam with friends or classmates, as long as you know they\'re likely to be punctual.<\\/p><p style=\\\"margin-top:0px;margin-bottom:8px;font-family:lato;font-size:18px;font-style:normal;font-variant:normal;font-weight:400;letter-spacing:normal;line-height:28px;color:rgb(29,29,27);text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);\\\"><br \\/><\\/p><p style=\\\"margin-top:0px;margin-bottom:8px;font-family:lato;font-size:18px;font-style:normal;font-variant:normal;font-weight:400;letter-spacing:normal;line-height:28px;color:rgb(29,29,27);text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);\\\"><br \\/><\\/p><p style=\\\"margin-top:0px;margin-bottom:8px;font-family:lato;font-size:18px;font-style:normal;font-variant:normal;font-weight:400;letter-spacing:normal;line-height:28px;color:rgb(29,29,27);text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);\\\">Make sure you get everything ready well in advance of the exam - don\'t leave it to the day before to suddenly realize you don\'t know the way, or what you\'re supposed to bring. Check all the rules and requirements, and plan your route and journey time. If possible, do a test run of the trip. If not, write down clear directions.<\\/p><p style=\\\"margin-top:0px;margin-bottom:8px;font-family:lato;font-size:18px;font-style:normal;font-variant:normal;font-weight:400;letter-spacing:normal;line-height:28px;color:rgb(29,29,27);text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);\\\">Work out how long it will take to get there - then add on some extra time. You really don\'t want to arrive having had to run halfway or feeling frazzled from losing your way.\\u00a0You could also make plans to travel to the exam with friends or classmates, as long as you know they\'re likely to be punctual.<\\/p><p style=\\\"margin-top:0px;margin-bottom:8px;font-family:lato;font-size:18px;font-style:normal;font-variant:normal;font-weight:400;letter-spacing:normal;line-height:28px;color:rgb(29,29,27);text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);\\\">Make sure you get everything ready well in advance of the exam - don\'t leave it to the day before to suddenly realize you don\'t know the way, or what you\'re supposed to bring. Check all the rules and requirements, and plan your route and journey time. If possible, do a test run of the trip. If not, write down clear directions.<\\/p><p style=\\\"margin-top:0px;margin-bottom:8px;font-family:lato;font-size:18px;font-style:normal;font-variant:normal;font-weight:400;letter-spacing:normal;line-height:28px;color:rgb(29,29,27);text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);\\\">Work out how long it will take to get there - then add on some extra time. You really don\'t want to arrive having had to run halfway or feeling frazzled from losing your way.\\u00a0You could also make plans to travel to the exam with friends or classmates, as long as you know they\'re likely to be punctual.<\\/p><p style=\\\"margin-top:0px;margin-bottom:8px;font-family:lato;font-size:18px;font-style:normal;font-variant:normal;font-weight:400;letter-spacing:normal;line-height:28px;color:rgb(29,29,27);text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);\\\">Make sure you get everything ready well in advance of the exam - don\'t leave it to the day before to suddenly realize you don\'t know the way, or what you\'re supposed to bring. Check all the rules and requirements, and plan your route and journey time. If possible, do a test run of the trip. If not, write down clear directions.<\\/p><p style=\\\"margin-top:0px;margin-bottom:8px;font-family:lato;font-size:18px;font-style:normal;font-variant:normal;font-weight:400;letter-spacing:normal;line-height:28px;color:rgb(29,29,27);text-align:left;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);\\\">Work out how long it will take to get there - then add on some extra time. You really don\'t want to arrive having had to run halfway or feeling frazzled from losing your way.\\u00a0You could also make plans to travel to the exam with friends or classmates, as long as you know they\'re likely to be punctual.<\\/p>\",\"cover_image\":\"60a8cb54d08ef1621674836.png\"}', '2021-05-22 14:11:18', '2021-05-22 14:13:57'),
(85, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Quick Tips for Successful Exam\",\"body\":\"<p style=\\\"margin:0px 0px 1.5rem;padding:0px;font-size:16px;line-height:1.6;color:rgb(61,67,97);font-family:Averta, Helvetica, Arial, sans-serif;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(254,254,254);\\\">There are always various activities that can be done separately or combined in enhancing one\\u2019s experience. Herewith, there are few guidelines respectively outlined to serve as a practical reference.<\\/p><p style=\\\"margin:0px 0px 1.5rem;padding:0px;font-size:16px;line-height:1.6;color:rgb(61,67,97);font-family:Averta, Helvetica, Arial, sans-serif;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(254,254,254);\\\"><span style=\\\"color:rgb(11,121,83);font-size:21px;\\\">1. Give yourself enough time to study<\\/span><\\/p><p style=\\\"margin:0px 0px 1.5rem;padding:0px;font-size:16px;line-height:1.6;color:rgb(61,67,97);font-family:Averta, Helvetica, Arial, sans-serif;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(254,254,254);\\\">Make a<span>\\u00a0<\\/span><strong style=\\\"line-height:inherit;font-weight:600;\\\">study schedule<\\/strong><span>\\u00a0<\\/span>that fits your way of studying and<span>\\u00a0<\\/span><strong style=\\\"line-height:inherit;font-weight:600;\\\">do not leave anything for the last minute<\\/strong>. While some students do seem to thrive on last-minute studying, often this way of partial studying is not the best approach for exam preparation. Write down how many exams you have, how many pages you have to learn, and the days you have left. Afterwards,<span>\\u00a0<\\/span><strong style=\\\"line-height:inherit;font-weight:600;\\\">organize<\\/strong><\\/p><p style=\\\"margin:0px 0px 1.5rem;padding:0px;font-size:16px;line-height:1.6;color:rgb(61,67,97);font-family:Averta, Helvetica, Arial, sans-serif;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(254,254,254);\\\">There are always various activities that can be done separately or combined in enhancing one\\u2019s experience. Herewith, there are few guidelines respectively outlined to serve as a practical reference.<\\/p><p style=\\\"margin:0px 0px 1.5rem;padding:0px;font-size:16px;line-height:1.6;color:rgb(61,67,97);font-family:Averta, Helvetica, Arial, sans-serif;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(254,254,254);\\\"><span style=\\\"color:rgb(11,121,83);font-size:21px;\\\">1. Give yourself enough time to study<\\/span><\\/p><p style=\\\"margin:0px 0px 1.5rem;padding:0px;font-size:16px;line-height:1.6;color:rgb(61,67,97);font-family:Averta, Helvetica, Arial, sans-serif;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(254,254,254);\\\">Make a<span>\\u00a0<\\/span><strong style=\\\"line-height:inherit;font-weight:600;\\\">study schedule<\\/strong><span>\\u00a0<\\/span>that fits your way of studying and<span>\\u00a0<\\/span><strong style=\\\"line-height:inherit;font-weight:600;\\\">do not leave anything for the last minute<\\/strong>. While some students do seem to thrive on last-minute studying, often this way of partial studying is not the best approach for exam preparation. Write down how many exams you have, how many pages you have to learn, and the days you have left. Afterwards,<span>\\u00a0<\\/span><strong style=\\\"line-height:inherit;font-weight:600;\\\">organize<\\/strong><\\/p><p style=\\\"margin:0px 0px 1.5rem;padding:0px;font-size:16px;line-height:1.6;color:rgb(61,67,97);font-family:Averta, Helvetica, Arial, sans-serif;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(254,254,254);\\\">There are always various activities that can be done separately or combined in enhancing one\\u2019s experience. Herewith, there are few guidelines respectively outlined to serve as a practical reference.<\\/p><p style=\\\"margin:0px 0px 1.5rem;padding:0px;font-size:16px;line-height:1.6;color:rgb(61,67,97);font-family:Averta, Helvetica, Arial, sans-serif;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(254,254,254);\\\"><span style=\\\"color:rgb(11,121,83);font-size:21px;\\\">1. Give yourself enough time to study<\\/span><\\/p><p style=\\\"margin:0px 0px 1.5rem;padding:0px;font-size:16px;line-height:1.6;color:rgb(61,67,97);font-family:Averta, Helvetica, Arial, sans-serif;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(254,254,254);\\\">Make a<span>\\u00a0<\\/span><strong style=\\\"line-height:inherit;font-weight:600;\\\">study schedule<\\/strong><span>\\u00a0<\\/span>that fits your way of studying and<span>\\u00a0<\\/span><strong style=\\\"line-height:inherit;font-weight:600;\\\">do not leave anything for the last minute<\\/strong>. While some students do seem to thrive on last-minute studying, often this way of partial studying is not the best approach for exam preparation. Write down how many exams you have, how many pages you have to learn, and the days you have left. Afterwards,<span>\\u00a0<\\/span><strong style=\\\"line-height:inherit;font-weight:600;\\\">organize<\\/strong><\\/p><p style=\\\"margin:0px 0px 1.5rem;padding:0px;font-size:16px;line-height:1.6;color:rgb(61,67,97);font-family:Averta, Helvetica, Arial, sans-serif;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(254,254,254);\\\">There are always various activities that can be done separately or combined in enhancing one\\u2019s experience. Herewith, there are few guidelines respectively outlined to serve as a practical reference.<\\/p><p style=\\\"margin:0px 0px 1.5rem;padding:0px;font-size:16px;line-height:1.6;color:rgb(61,67,97);font-family:Averta, Helvetica, Arial, sans-serif;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(254,254,254);\\\"><span style=\\\"color:rgb(11,121,83);font-size:21px;\\\">1. Give yourself enough time to study<\\/span><\\/p><p style=\\\"margin:0px 0px 1.5rem;padding:0px;font-size:16px;line-height:1.6;color:rgb(61,67,97);font-family:Averta, Helvetica, Arial, sans-serif;font-style:normal;font-weight:400;letter-spacing:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(254,254,254);\\\">Make a<span>\\u00a0<\\/span><strong style=\\\"line-height:inherit;font-weight:600;\\\">study schedule<\\/strong><span>\\u00a0<\\/span>that fits your way of studying and<span>\\u00a0<\\/span><strong style=\\\"line-height:inherit;font-weight:600;\\\">do not leave anything for the last minute<\\/strong>. While some students do seem to thrive on last-minute studying, often this way of partial studying is not the best approach for exam preparation. Write down how many exams you have, how many pages you have to learn, and the days you have left. Afterwards,<span>\\u00a0<\\/span><strong style=\\\"line-height:inherit;font-weight:600;\\\">organize<\\/strong><\\/p>\",\"cover_image\":\"60a8ce31d68601621675569.jpg\"}', '2021-05-22 14:26:09', '2021-05-22 14:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `parameters` text COLLATE utf8mb4_unicode_ci,
  `supported_currencies` text COLLATE utf8mb4_unicode_ci,
  `crypto` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: fiat currency, 1: crypto currency',
  `extra` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `input_form` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `code`, `alias`, `image`, `name`, `status`, `parameters`, `supported_currencies`, `crypto`, `extra`, `description`, `input_form`, `created_at`, `updated_at`) VALUES
(1, 101, 'paypal', '5f6f1bd8678601601117144.jpg', 'Paypal', 1, '{\"paypal_email\":{\"title\":\"PayPal Email\",\"global\":true,\"value\":\"sb-zlbi7986064@personal.example.com\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-01-17 03:02:44'),
(2, 102, 'perfect_money', '5f6f1d2a742211601117482.jpg', 'Perfect Money', 1, '{\"passphrase\":{\"title\":\"ALTERNATE PASSPHRASE\",\"global\":true,\"value\":\"6451561651551\"},\"wallet_id\":{\"title\":\"PM Wallet\",\"global\":false,\"value\":\"\"}}', '{\"USD\":\"$\",\"EUR\":\"\\u20ac\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:46'),
(3, 103, 'stripe', '5f6f1d4bc69e71601117515.jpg', 'Stripe Hosted', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51HuxFUHyGzEKoTKAfIosswAQduMOGU4q4elcNr8OE6LoBZcp2MHKalOW835wjRiF6fxVTc7RmBgatKfAt1Qq0heb00rUaCOd2T\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51HuxFUHyGzEKoTKAueAuF9BrMDA5boMcpJLLt0vu4q3QdPX5isaGudKNe6OyVjZP1UugpYd6JA7i7TczRWsbutaP004YmBiSp5\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:49'),
(4, 104, 'skrill', '5f6f1d41257181601117505.jpg', 'Skrill', 1, '{\"pay_to_email\":{\"title\":\"Skrill Email\",\"global\":true,\"value\":\"merchant@skrill.com\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"---\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JOD\":\"JOD\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"KWD\":\"KWD\",\"MAD\":\"MAD\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"OMR\":\"OMR\",\"PLN\":\"PLN\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"SAR\":\"SAR\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TND\":\"TND\",\"TRY\":\"TRY\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\",\"COP\":\"COP\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:52'),
(5, 105, 'paytm', '5f6f1d1d3ec731601117469.jpg', 'PayTM', 1, '{\"MID\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"DIY12386817555501617\"},\"merchant_key\":{\"title\":\"Merchant Key\",\"global\":true,\"value\":\"bKMfNxPPf_QdZppa\"},\"WEBSITE\":{\"title\":\"Paytm Website\",\"global\":true,\"value\":\"DIYtestingweb\"},\"INDUSTRY_TYPE_ID\":{\"title\":\"Industry Type\",\"global\":true,\"value\":\"Retail\"},\"CHANNEL_ID\":{\"title\":\"CHANNEL ID\",\"global\":true,\"value\":\"WEB\"},\"transaction_url\":{\"title\":\"Transaction URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/oltp-web\\/processTransaction\"},\"transaction_status_url\":{\"title\":\"Transaction STATUS URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/paytmchecksum\\/paytmCallback.jsp\"}}', '{\"AUD\":\"AUD\",\"ARS\":\"ARS\",\"BDT\":\"BDT\",\"BRL\":\"BRL\",\"BGN\":\"BGN\",\"CAD\":\"CAD\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"HRK\":\"HRK\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"GEL\":\"GEL\",\"GHS\":\"GHS\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"KES\":\"KES\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"MAD\":\"MAD\",\"NPR\":\"NPR\",\"NZD\":\"NZD\",\"NGN\":\"NGN\",\"NOK\":\"NOK\",\"PKR\":\"PKR\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"ZAR\":\"ZAR\",\"KRW\":\"KRW\",\"LKR\":\"LKR\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"TRY\":\"TRY\",\"UGX\":\"UGX\",\"UAH\":\"UAH\",\"AED\":\"AED\",\"GBP\":\"GBP\",\"USD\":\"USD\",\"VND\":\"VND\",\"XOF\":\"XOF\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:54'),
(6, 106, 'payeer', '5f6f1bc61518b1601117126.jpg', 'Payeer', 1, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"866989763\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"7575\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"RUB\":\"RUB\"}', 0, '{\"status\":{\"title\": \"Status URL\",\"value\":\"ipn.payeer\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:58'),
(7, 107, 'paystack', '5f7096563dfb71601214038.jpg', 'PayStack', 1, '{\"public_key\":{\"title\":\"Public key\",\"global\":true,\"value\":\"pk_test_3c9c87f51b13c15d99eb367ca6ebc52cc9eb1f33\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"sk_test_2a3f97a146ab5694801f993b60fcb81cd7254f12\"}}', '{\"USD\":\"USD\",\"NGN\":\"NGN\"}', 0, '{\"callback\":{\"title\": \"Callback URL\",\"value\":\"ipn.paystack\"},\"webhook\":{\"title\": \"Webhook URL\",\"value\":\"ipn.paystack\"}}\r\n', NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:25:38'),
(8, 108, 'voguepay', '5f6f1d5951a111601117529.jpg', 'VoguePay', 1, '{\"merchant_id\":{\"title\":\"MERCHANT ID\",\"global\":true,\"value\":\"demo\"}}', '{\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:52:09'),
(9, 109, 'flutterwave', '5f6f1b9e4bb961601117086.jpg', 'Flutterwave', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"demo_publisher_key\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"demo_secret_key\"},\"encryption_key\":{\"title\":\"Encryption Key\",\"global\":true,\"value\":\"demo_encryption_key\"}}', '{\"BIF\":\"BIF\",\"CAD\":\"CAD\",\"CDF\":\"CDF\",\"CVE\":\"CVE\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"GHS\":\"GHS\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"KES\":\"KES\",\"LRD\":\"LRD\",\"MWK\":\"MWK\",\"MZN\":\"MZN\",\"NGN\":\"NGN\",\"RWF\":\"RWF\",\"SLL\":\"SLL\",\"STD\":\"STD\",\"TZS\":\"TZS\",\"UGX\":\"UGX\",\"USD\":\"USD\",\"XAF\":\"XAF\",\"XOF\":\"XOF\",\"ZMK\":\"ZMK\",\"ZMW\":\"ZMW\",\"ZWD\":\"ZWD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-01-04 03:29:50'),
(10, 110, 'razorpay', '5f6f1d3672dd61601117494.jpg', 'RazorPay', 1, '{\"key_id\":{\"title\":\"Key Id\",\"global\":true,\"value\":\"rzp_test_kiOtejPbRZU90E\"},\"key_secret\":{\"title\":\"Key Secret \",\"global\":true,\"value\":\"osRDebzEqbsE1kbyQJ4y0re7\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:51:34'),
(11, 111, 'stripe_js', '5f7096a31ed9a1601214115.jpg', 'Stripe Storefront', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51HuxFUHyGzEKoTKAfIosswAQduMOGU4q4elcNr8OE6LoBZcp2MHKalOW835wjRiF6fxVTc7RmBgatKfAt1Qq0heb00rUaCOd2T\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51HuxFUHyGzEKoTKAueAuF9BrMDA5boMcpJLLt0vu4q3QdPX5isaGudKNe6OyVjZP1UugpYd6JA7i7TczRWsbutaP004YmBiSp5\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-12-05 03:56:20'),
(12, 112, 'instamojo', '5f6f1babbdbb31601117099.jpg', 'Instamojo', 1, '{\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"test_2241633c3bc44a3de84a3b33969\"},\"auth_token\":{\"title\":\"Auth Token\",\"global\":true,\"value\":\"test_279f083f7bebefd35217feef22d\"},\"salt\":{\"title\":\"Salt\",\"global\":true,\"value\":\"19d38908eeff4f58b2ddda2c6d86ca25\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:44:59'),
(13, 501, 'blockchain', '5f6f1b2b20c6f1601116971.jpg', 'Blockchain', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"55529946-05ca-48ff-8710-f279d86b1cc5\"},\"xpub_code\":{\"title\":\"XPUB CODE\",\"global\":true,\"value\":\"xpub6CKQ3xxWyBoFAF83izZCSFUorptEU9AF8TezhtWeMU5oefjX3sFSBw62Lr9iHXPkXmDQJJiHZeTRtD9Vzt8grAYRhvbz4nEvBu3QKELVzFK\"}}', '{\"BTC\":\"BTC\"}', 1, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-01-31 06:55:45'),
(14, 502, 'blockio', '5f6f19432bedf1601116483.jpg', 'Block.io', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":false,\"value\":\"1658-8015-2e5e-9afb\"},\"api_pin\":{\"title\":\"API PIN\",\"global\":true,\"value\":\"covidvai2020\"}}', '{\"BTC\":\"BTC\",\"LTC\":\"LTC\",\"DOGE\":\"DOGE\"}', 1, '{\"cron\":{\"title\": \"Cron URL\",\"value\":\"ipn.blockio\"}}', NULL, NULL, '2019-09-14 13:14:22', '2021-01-03 23:19:59'),
(15, 503, 'coinpayments', '5f6f1b6c02ecd1601117036.jpg', 'CoinPayments', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"7638eebaf4061b7f7cdfceb14046318bbdabf7e2f64944773d6550bd59f70274\"},\"private_key\":{\"title\":\"Private Key\",\"global\":true,\"value\":\"Cb6dee7af8Eb9E0D4123543E690dA3673294147A5Dc8e7a621B5d484a3803207\"},\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"93a1e014c4ad60a7980b4a7239673cb4\"}}', '{\"BTC\":\"Bitcoin\",\"BTC.LN\":\"Bitcoin (Lightning Network)\",\"LTC\":\"Litecoin\",\"CPS\":\"CPS Coin\",\"VLX\":\"Velas\",\"APL\":\"Apollo\",\"AYA\":\"Aryacoin\",\"BAD\":\"Badcoin\",\"BCD\":\"Bitcoin Diamond\",\"BCH\":\"Bitcoin Cash\",\"BCN\":\"Bytecoin\",\"BEAM\":\"BEAM\",\"BITB\":\"Bean Cash\",\"BLK\":\"BlackCoin\",\"BSV\":\"Bitcoin SV\",\"BTAD\":\"Bitcoin Adult\",\"BTG\":\"Bitcoin Gold\",\"BTT\":\"BitTorrent\",\"CLOAK\":\"CloakCoin\",\"CLUB\":\"ClubCoin\",\"CRW\":\"Crown\",\"CRYP\":\"CrypticCoin\",\"CRYT\":\"CryTrExCoin\",\"CURE\":\"CureCoin\",\"DASH\":\"DASH\",\"DCR\":\"Decred\",\"DEV\":\"DeviantCoin\",\"DGB\":\"DigiByte\",\"DOGE\":\"Dogecoin\",\"EBST\":\"eBoost\",\"EOS\":\"EOS\",\"ETC\":\"Ether Classic\",\"ETH\":\"Ethereum\",\"ETN\":\"Electroneum\",\"EUNO\":\"EUNO\",\"EXP\":\"EXP\",\"Expanse\":\"Expanse\",\"FLASH\":\"FLASH\",\"GAME\":\"GameCredits\",\"GLC\":\"Goldcoin\",\"GRS\":\"Groestlcoin\",\"KMD\":\"Komodo\",\"LOKI\":\"LOKI\",\"LSK\":\"LSK\",\"MAID\":\"MaidSafeCoin\",\"MUE\":\"MonetaryUnit\",\"NAV\":\"NAV Coin\",\"NEO\":\"NEO\",\"NMC\":\"Namecoin\",\"NVST\":\"NVO Token\",\"NXT\":\"NXT\",\"OMNI\":\"OMNI\",\"PINK\":\"PinkCoin\",\"PIVX\":\"PIVX\",\"POT\":\"PotCoin\",\"PPC\":\"Peercoin\",\"PROC\":\"ProCurrency\",\"PURA\":\"PURA\",\"QTUM\":\"QTUM\",\"RES\":\"Resistance\",\"RVN\":\"Ravencoin\",\"RVR\":\"RevolutionVR\",\"SBD\":\"Steem Dollars\",\"SMART\":\"SmartCash\",\"SOXAX\":\"SOXAX\",\"STEEM\":\"STEEM\",\"STRAT\":\"STRAT\",\"SYS\":\"Syscoin\",\"TPAY\":\"TokenPay\",\"TRIGGERS\":\"Triggers\",\"TRX\":\" TRON\",\"UBQ\":\"Ubiq\",\"UNIT\":\"UniversalCurrency\",\"USDT\":\"Tether USD (Omni Layer)\",\"VTC\":\"Vertcoin\",\"WAVES\":\"Waves\",\"XCP\":\"Counterparty\",\"XEM\":\"NEM\",\"XMR\":\"Monero\",\"XSN\":\"Stakenet\",\"XSR\":\"SucreCoin\",\"XVG\":\"VERGE\",\"XZC\":\"ZCoin\",\"ZEC\":\"ZCash\",\"ZEN\":\"Horizen\"}', 1, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:43:56'),
(16, 504, 'coinpayments_fiat', '5f6f1b94e9b2b1601117076.jpg', 'CoinPayments Fiat', 1, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"93a1e014c4ad60a7980b4a7239673cb4\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-10-22 03:17:29'),
(17, 505, 'coingate', '5f6f1b5fe18ee1601117023.jpg', 'Coingate', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"Ba1VgPx6d437xLXGKCBkmwVCEw5kHzRJ6thbGo-N\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:43:44'),
(18, 506, 'coinbase_commerce', '5f6f1b4c774af1601117004.jpg', 'Coinbase Commerce', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"c47cd7df-d8e8-424b-a20a\"},\"secret\":{\"title\":\"Webhook Shared Secret\",\"global\":true,\"value\":\"55871878-2c32-4f64-ab66\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"JPY\":\"JPY\",\"GBP\":\"GBP\",\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CNY\":\"CNY\",\"SEK\":\"SEK\",\"NZD\":\"NZD\",\"MXN\":\"MXN\",\"SGD\":\"SGD\",\"HKD\":\"HKD\",\"NOK\":\"NOK\",\"KRW\":\"KRW\",\"TRY\":\"TRY\",\"RUB\":\"RUB\",\"INR\":\"INR\",\"BRL\":\"BRL\",\"ZAR\":\"ZAR\",\"AED\":\"AED\",\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"AMD\":\"AMD\",\"ANG\":\"ANG\",\"AOA\":\"AOA\",\"ARS\":\"ARS\",\"AWG\":\"AWG\",\"AZN\":\"AZN\",\"BAM\":\"BAM\",\"BBD\":\"BBD\",\"BDT\":\"BDT\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"BIF\":\"BIF\",\"BMD\":\"BMD\",\"BND\":\"BND\",\"BOB\":\"BOB\",\"BSD\":\"BSD\",\"BTN\":\"BTN\",\"BWP\":\"BWP\",\"BYN\":\"BYN\",\"BZD\":\"BZD\",\"CDF\":\"CDF\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"CVE\":\"CVE\",\"CZK\":\"CZK\",\"DJF\":\"DJF\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"DZD\":\"DZD\",\"EGP\":\"EGP\",\"ERN\":\"ERN\",\"ETB\":\"ETB\",\"FJD\":\"FJD\",\"FKP\":\"FKP\",\"GEL\":\"GEL\",\"GGP\":\"GGP\",\"GHS\":\"GHS\",\"GIP\":\"GIP\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"GTQ\":\"GTQ\",\"GYD\":\"GYD\",\"HNL\":\"HNL\",\"HRK\":\"HRK\",\"HTG\":\"HTG\",\"HUF\":\"HUF\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"IMP\":\"IMP\",\"IQD\":\"IQD\",\"IRR\":\"IRR\",\"ISK\":\"ISK\",\"JEP\":\"JEP\",\"JMD\":\"JMD\",\"JOD\":\"JOD\",\"KES\":\"KES\",\"KGS\":\"KGS\",\"KHR\":\"KHR\",\"KMF\":\"KMF\",\"KPW\":\"KPW\",\"KWD\":\"KWD\",\"KYD\":\"KYD\",\"KZT\":\"KZT\",\"LAK\":\"LAK\",\"LBP\":\"LBP\",\"LKR\":\"LKR\",\"LRD\":\"LRD\",\"LSL\":\"LSL\",\"LYD\":\"LYD\",\"MAD\":\"MAD\",\"MDL\":\"MDL\",\"MGA\":\"MGA\",\"MKD\":\"MKD\",\"MMK\":\"MMK\",\"MNT\":\"MNT\",\"MOP\":\"MOP\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MVR\":\"MVR\",\"MWK\":\"MWK\",\"MYR\":\"MYR\",\"MZN\":\"MZN\",\"NAD\":\"NAD\",\"NGN\":\"NGN\",\"NIO\":\"NIO\",\"NPR\":\"NPR\",\"OMR\":\"OMR\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PGK\":\"PGK\",\"PHP\":\"PHP\",\"PKR\":\"PKR\",\"PLN\":\"PLN\",\"PYG\":\"PYG\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"RWF\":\"RWF\",\"SAR\":\"SAR\",\"SBD\":\"SBD\",\"SCR\":\"SCR\",\"SDG\":\"SDG\",\"SHP\":\"SHP\",\"SLL\":\"SLL\",\"SOS\":\"SOS\",\"SRD\":\"SRD\",\"SSP\":\"SSP\",\"STD\":\"STD\",\"SVC\":\"SVC\",\"SYP\":\"SYP\",\"SZL\":\"SZL\",\"THB\":\"THB\",\"TJS\":\"TJS\",\"TMT\":\"TMT\",\"TND\":\"TND\",\"TOP\":\"TOP\",\"TTD\":\"TTD\",\"TWD\":\"TWD\",\"TZS\":\"TZS\",\"UAH\":\"UAH\",\"UGX\":\"UGX\",\"UYU\":\"UYU\",\"UZS\":\"UZS\",\"VEF\":\"VEF\",\"VND\":\"VND\",\"VUV\":\"VUV\",\"WST\":\"WST\",\"XAF\":\"XAF\",\"XAG\":\"XAG\",\"XAU\":\"XAU\",\"XCD\":\"XCD\",\"XDR\":\"XDR\",\"XOF\":\"XOF\",\"XPD\":\"XPD\",\"XPF\":\"XPF\",\"XPT\":\"XPT\",\"YER\":\"YER\",\"ZMW\":\"ZMW\",\"ZWL\":\"ZWL\"}\r\n\r\n', 0, '{\"endpoint\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.coinbase_commerce\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:43:24'),
(24, 113, 'paypal_sdk', '5f6f1bec255c61601117164.jpg', 'Paypal Express', 1, '{\"clientId\":{\"title\":\"Paypal Client ID\",\"global\":true,\"value\":\"Ae0-tixtSV7DvLwIh3Bmu7JvHrjh5EfGdXr_cEklKAVjjezRZ747BxKILiBdzlKKyp-W8W_T7CKH1Ken\"},\"clientSecret\":{\"title\":\"Client Secret\",\"global\":true,\"value\":\"EOhbvHZgFNO21soQJT1L9Q00M3rK6PIEsdiTgXRBt2gtGtxwRer5JvKnVUGNU5oE63fFnjnYY7hq3HBA\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-10-31 23:50:27'),
(25, 114, 'stripe_v3', '5f709684736321601214084.jpg', 'Stripe Checkout', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51HuxFUHyGzEKoTKAfIosswAQduMOGU4q4elcNr8OE6LoBZcp2MHKalOW835wjRiF6fxVTc7RmBgatKfAt1Qq0heb00rUaCOd2T\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51HuxFUHyGzEKoTKAueAuF9BrMDA5boMcpJLLt0vu4q3QdPX5isaGudKNe6OyVjZP1UugpYd6JA7i7TczRWsbutaP004YmBiSp5\"},\"end_point\":{\"title\":\"End Point Secret\",\"global\":true,\"value\":\"w5555\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, '{\"webhook\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.stripe_v3\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-12-05 03:56:14'),
(27, 115, 'mollie', '5f6f1bb765ab11601117111.jpg', 'Mollie', 1, '{\"mollie_email\":{\"title\":\"Mollie Email \",\"global\":true,\"value\":\"admin@gmail.com\"},\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"test_cucfwKTWfft9s337qsVfn5CC4vNkrn\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-23 07:54:48'),
(30, 116, 'cashmaal', '5f9a8b62bb4dd1603963746.png', 'Cashmaal', 1, '{\"web_id\":{\"title\":\"Web Id\",\"global\":true,\"value\":\"3748\"},\"ipn_key\":{\"title\":\"IPN Key\",\"global\":true,\"value\":\"546254628759524554647987\"}}', '{\"PKR\":\"PKR\",\"USD\":\"USD\"}', 0, '{\"webhook\":{\"title\": \"IPN URL\",\"value\":\"ipn.cashmaal\"}}', NULL, NULL, NULL, '2020-10-29 03:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

CREATE TABLE `gateway_currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_code` int(11) DEFAULT NULL,
  `gateway_alias` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amount` decimal(18,8) NOT NULL,
  `max_amount` decimal(18,8) NOT NULL,
  `percent_charge` decimal(5,2) NOT NULL DEFAULT '0.00',
  `fixed_charge` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `rate` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_parameter` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `slug`, `short_details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Male', 'male', 'Male', 1, '2022-04-20 21:16:03', '2022-04-20 21:16:03'),
(2, 'Female', 'female', 'Female', 1, '2022-04-20 21:16:18', '2022-04-20 21:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cur_text` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency text',
  `cur_sym` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency symbol',
  `email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_template` text COLLATE utf8mb4_unicode_ci,
  `sms_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_color` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_color` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_config` text COLLATE utf8mb4_unicode_ci COMMENT 'email configuration',
  `ev` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'email verification, 0 - dont check, 1 - check',
  `en` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'email notification, 0 - dont send, 1 - send',
  `sv` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'sms verication, 0 - dont check, 1 - check',
  `sn` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'sms notification, 0 - dont send, 1 - send',
  `registration` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Off	, 1: On',
  `social_login` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'social login',
  `social_credential` text COLLATE utf8mb4_unicode_ci,
  `active_template` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sys_version` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `cur_text`, `cur_sym`, `email_from`, `email_template`, `sms_api`, `base_color`, `secondary_color`, `mail_config`, `ev`, `en`, `sv`, `sn`, `registration`, `social_login`, `social_credential`, `active_template`, `sys_version`, `created_at`, `updated_at`) VALUES
(1, 'SCIT', 'USD', '$', 'demo@vvyu.com', '<table style=\"color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(0, 23, 54); text-decoration-style: initial; text-decoration-color: initial;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#001736\"><tbody><tr><td valign=\"top\" align=\"center\"><table class=\"mobile-shell\" width=\"650\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"td container\" style=\"width: 650px; min-width: 650px; font-size: 0pt; line-height: 0pt; margin: 0px; font-weight: normal; padding: 55px 0px;\"><div style=\"text-align: center;\"><img src=\"https://i.imgur.com/Xnt2WEu.png\" style=\"font-size: 0pt; text-align: left;\" width=\"400\"></div><table style=\"width: 650px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"padding-bottom: 10px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"tbrr p30-15\" style=\"padding: 60px 30px; border-radius: 26px 26px 0px 0px;\" bgcolor=\"#000036\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"color: rgb(255, 255, 255); font-family: Muli, Arial, sans-serif; font-size: 20px; line-height: 46px; padding-bottom: 25px; font-weight: bold;\">Hi {{name}} ,</td></tr><tr><td style=\"color: rgb(193, 205, 220); font-family: Muli, Arial, sans-serif; font-size: 20px; line-height: 30px; padding-bottom: 25px;\">{{message}}</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table style=\"width: 650px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"p30-15 bbrr\" style=\"padding: 50px 30px; border-radius: 0px 0px 26px 26px;\" bgcolor=\"#000036\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"text-footer1 pb10\" style=\"color: rgb(0, 153, 255); font-family: Muli, Arial, sans-serif; font-size: 18px; line-height: 30px; text-align: center; padding-bottom: 10px;\">© 2022 SCIT. All Rights Reserved.</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>', 'https://api.infobip.com/api/v3/sendsms/plain?user=viserlab&password=26289099&sender=ViserLab&SMSText={{message}}&GSM={{number}}&type=longSMS', '2ecc71', '040a2c', '{\"name\":\"smtp\",\"host\":\"scit.sataware.dev\",\"port\":\"465\",\"enc\":\"ssl\",\"username\":\"_mainaccount@scit.sataware.dev\",\"password\":\"sdv561S&()*609ynpohuasc$#\"}', 1, 1, 0, 1, 1, 0, '{\"google_client_id\":\"53929591142-l40gafo7efd9onfe6tj545sf9g7tv15t.apps.googleusercontent.com\",\"google_client_secret\":\"BRdB3np2IgYLiy4-bwMcmOwN\",\"fb_client_id\":\"277229062999748\",\"fb_client_secret\":\"1acfc850f73d1955d14b282938585122\"}', 'basic', NULL, NULL, '2022-04-06 19:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_align` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: left to right text align, 1: right to left text align',
  `is_default` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: not default language, 1: default language',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `icon`, `text_align`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '5f15968db08911595250317.png', 0, 1, '2020-07-06 03:47:55', '2022-04-07 13:52:14'),
(5, 'Hindi', 'hn', NULL, 0, 0, '2020-12-29 02:20:07', '2022-04-07 13:51:26');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_14_061757_create_support_tickets_table', 3),
(5, '2020_06_14_061837_create_support_messages_table', 3),
(6, '2020_06_14_061904_create_support_attachments_table', 3),
(7, '2020_06_14_062359_create_admins_table', 3),
(8, '2020_06_14_064604_create_transactions_table', 4),
(9, '2020_06_14_065247_create_general_settings_table', 5),
(12, '2014_10_12_100000_create_password_resets_table', 6),
(13, '2020_06_14_060541_create_user_logins_table', 6),
(14, '2020_06_14_071708_create_admin_password_resets_table', 7),
(15, '2020_09_14_053026_create_countries_table', 8),
(16, '2021_03_16_092401_create_categories_table', 9),
(17, '2021_03_16_114115_create_subjects_table', 10),
(18, '2021_03_16_125354_create_exams_table', 11),
(19, '2021_03_17_093328_create_questions_table', 12),
(20, '2021_03_17_094018_create_options_table', 13),
(21, '2021_03_18_084234_create_coupons_table', 14),
(22, '2021_03_23_053718_create_results_table', 15),
(23, '2021_03_23_094457_create_written_previews_table', 16),
(24, '2021_03_27_051523_create_coupon_users_table', 17),
(25, '2021_03_29_070935_create_cetificates_table', 18),
(26, '2021_03_29_071251_create_certificates_table', 19),
(27, '2022_04_04_045709_create_exam_images_table', 20),
(28, '2022_04_04_091320_questionimages', 20),
(29, '2022_04_04_133304_optionimages', 20),
(30, '2022_04_11_134813_add_exams_filed_table', 21),
(31, '2022_04_12_093542_add_questions_new_field_table', 21),
(32, '2022_04_14_132838_change_quetion_true_and_false_tbl', 22),
(33, '2022_04_15_062836_add_null_field_exam_table', 23),
(34, '2022_04_16_083243_add_question_category_table', 24),
(35, '2022_04_16_132958_scoretbl', 24),
(36, '2022_04_18_062309_change_exam_table_column', 25),
(37, '2022_04_20_100306_create_genders_table', 26),
(38, '2022_04_20_113544_add_gender_id_to_exams_table', 27),
(39, '2022_04_20_131309_add_reverse_to_questions_table', 28),
(40, '2022_04_22_120413_create_question_categories_table', 29),
(41, '2022_04_22_133444_add_result_data_to_results_table', 30),
(42, '2022_04_26_110900_add_score_id_to_options_table', 31),
(43, '2022_04_29_081031_add_hide_to_categories_table', 32),
(44, '2022_04_29_114253_add_dob_to_users_table', 33);

-- --------------------------------------------------------

--
-- Table structure for table `Optionimages`
--

CREATE TABLE `Optionimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Optionimages`
--

INSERT INTO `Optionimages` (`id`, `option_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 4, '624afac18c5bb1649081025.jpg', '2022-04-04 21:03:45', '2022-04-04 21:03:45'),
(2, 5, '624afac19d1ff1649081025.jpg', '2022-04-04 21:03:45', '2022-04-04 21:03:45'),
(3, 6, '624afac1ac6e01649081025.jpg', '2022-04-04 21:03:45', '2022-04-04 21:03:45'),
(4, 7, '624afac18c5bb1649081025.jpg', '2022-04-05 16:59:44', '2022-04-05 16:59:44'),
(5, 8, '624c1310f2d1f1649152784.jpg', '2022-04-05 16:59:45', '2022-04-05 16:59:45'),
(6, 8, '624c13111212e1649152785.jpg', '2022-04-05 16:59:45', '2022-04-05 16:59:45'),
(7, 8, '624c1311213961649152785.jpg', '2022-04-05 16:59:45', '2022-04-05 16:59:45'),
(8, 9, '624afac1ac6e01649081025.jpg', '2022-04-05 16:59:45', '2022-04-05 16:59:45'),
(9, 10, '624afac18c5bb1649081025.jpg', '2022-04-05 17:02:56', '2022-04-05 17:02:56'),
(12, 13, '624afac18c5bb1649081025.jpg', '2022-04-05 18:19:51', '2022-04-05 18:19:51'),
(14, 14, '624c25d83c0bb1649157592.png', '2022-04-05 18:19:52', '2022-04-05 18:19:52'),
(15, 15, '624c25d85eb5b1649157592.jpg', '2022-04-05 18:19:52', '2022-04-05 18:19:52'),
(16, 15, '624c25d89368e1649157592.png', '2022-04-05 18:19:53', '2022-04-05 18:19:53'),
(17, 16, '624afac18c5bb1649081025.jpg', '2022-04-05 18:25:17', '2022-04-05 18:25:17'),
(18, 17, '624c25d83c0bb1649157592.png', '2022-04-05 18:25:17', '2022-04-05 18:25:17'),
(19, 18, '624c25d85eb5b1649157592.jpg', '2022-04-05 18:25:17', '2022-04-05 18:25:17'),
(21, 19, '624afac18c5bb1649081025.jpg', '2022-04-05 18:26:44', '2022-04-05 18:26:44'),
(22, 20, '624c25d83c0bb1649157592.png', '2022-04-05 18:26:44', '2022-04-05 18:26:44'),
(23, 21, '624c25d85eb5b1649157592.jpg', '2022-04-05 18:26:44', '2022-04-05 18:26:44'),
(24, 22, '624c27e9396291649158121.jpg', '2022-04-05 18:28:41', '2022-04-05 18:28:41'),
(25, 23, '624c25d83c0bb1649157592.png', '2022-04-05 18:28:41', '2022-04-05 18:28:41'),
(26, 24, '624c25d85eb5b1649157592.jpg', '2022-04-05 18:28:41', '2022-04-05 18:28:41'),
(27, 25, '624c27e9396291649158121.jpg', '2022-04-05 18:29:54', '2022-04-05 18:29:54'),
(28, 26, '624c25d83c0bb1649157592.png', '2022-04-05 18:29:54', '2022-04-05 18:29:54'),
(29, 27, '624c25d85eb5b1649157592.jpg', '2022-04-05 18:29:54', '2022-04-05 18:29:54'),
(31, 39, '6253f3780479f1649668984.jpg', '2022-04-11 16:23:04', '2022-04-11 16:23:04'),
(32, 42, '6253f3780479f1649668984.jpg', '2022-04-11 16:25:54', '2022-04-11 16:25:54'),
(33, 44, '6253f422ed3191649669154.png', '2022-04-11 16:25:55', '2022-04-11 16:25:55'),
(34, 45, '6253f48f809061649669263.jpg', '2022-04-11 16:27:43', '2022-04-11 16:27:43'),
(35, 46, '6253f5674909e1649669479.jpg', '2022-04-11 16:31:19', '2022-04-11 16:31:19'),
(36, 47, '6253f6b6ca4e71649669814.jpg', '2022-04-11 16:36:55', '2022-04-11 16:36:55'),
(37, 49, '6253fc72c504b1649671282.png', '2022-04-11 17:01:23', '2022-04-11 17:01:23'),
(38, 51, '625410b2121a81649676466.jpg', '2022-04-11 18:27:46', '2022-04-11 18:27:46'),
(39, 53, '62541135b33601649676597.jpg', '2022-04-11 18:29:57', '2022-04-11 18:29:57'),
(40, 54, '62541135b33601649676597.jpg', '2022-04-11 18:30:19', '2022-04-11 18:30:19'),
(41, 55, '6254114b2ca321649676619.jpg', '2022-04-11 18:30:19', '2022-04-11 18:30:19'),
(42, 56, '6254114b4cc371649676619.jpg', '2022-04-11 18:30:19', '2022-04-11 18:30:19'),
(44, 58, '6254114b2ca321649676619.jpg', '2022-04-11 18:30:33', '2022-04-11 18:30:33'),
(45, 59, '6254114b4cc371649676619.jpg', '2022-04-11 18:30:33', '2022-04-11 18:30:33'),
(46, 61, '625411c7062591649676743.jpg', '2022-04-11 18:32:23', '2022-04-11 18:32:23'),
(47, 62, '625411e3c14791649676771.jpg', '2022-04-11 18:32:51', '2022-04-11 18:32:51'),
(48, 63, '625411c7062591649676743.jpg', '2022-04-11 18:32:51', '2022-04-11 18:32:51'),
(49, 64, '625411e3c14791649676771.jpg', '2022-04-11 18:33:04', '2022-04-11 18:33:04'),
(50, 65, '625411c7062591649676743.jpg', '2022-04-11 18:33:04', '2022-04-11 18:33:04'),
(51, 66, '625412da384f21649677018.jpg', '2022-04-11 18:36:58', '2022-04-11 18:36:58'),
(52, 67, '625412da585311649677018.jpg', '2022-04-11 18:36:58', '2022-04-11 18:36:58'),
(53, 68, '624c27e9396291649158121.jpg', '2022-04-15 17:54:58', '2022-04-15 17:54:58'),
(54, 69, '624c25d83c0bb1649157592.png', '2022-04-15 17:54:58', '2022-04-15 17:54:58'),
(55, 70, '624c25d85eb5b1649157592.jpg', '2022-04-15 17:54:58', '2022-04-15 17:54:58'),
(56, 71, '625e640d141461650353165.jpg', '2022-04-19 14:26:05', '2022-04-19 14:26:05'),
(57, 71, '625e640d6c76a1650353165.jpg', '2022-04-19 14:26:05', '2022-04-19 14:26:05'),
(58, 107, '6262c7a0331671650640800.jpg', '2022-04-22 22:20:00', '2022-04-22 22:20:00'),
(59, 108, '6262c7a08dc461650640800.jpg', '2022-04-22 22:20:01', '2022-04-22 22:20:01'),
(60, 109, '6262c7a10556e1650640801.png', '2022-04-22 22:20:01', '2022-04-22 22:20:01'),
(61, 116, '626a40e689aba1651130598.jpg', '2022-04-28 14:23:18', '2022-04-28 14:23:18'),
(62, 116, '626a40e6ec6911651130598.jpg', '2022-04-28 14:23:19', '2022-04-28 14:23:19'),
(63, 117, '626a40e746ffc1651130599.jpg', '2022-04-28 14:23:19', '2022-04-28 14:23:19'),
(64, 117, '626a40e799cd81651130599.png', '2022-04-28 14:23:20', '2022-04-28 14:23:20'),
(65, 118, '626a40e801ef21651130600.jpg', '2022-04-28 14:23:20', '2022-04-28 14:23:20'),
(66, 124, '626cfb075bf201651309319.jpg', '2022-04-30 16:01:59', '2022-04-30 16:01:59'),
(67, 125, '626cfb07b446b1651309319.jpg', '2022-04-30 16:02:00', '2022-04-30 16:02:00'),
(68, 126, '626cfb0817d8f1651309320.png', '2022-04-30 16:02:00', '2022-04-30 16:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score_id` int(11) DEFAULT NULL,
  `correct_ans` int(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '1 = yes, 0 = No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option`, `score_id`, `correct_ans`, `created_at`, `updated_at`) VALUES
(30, 3, 'Test 1', NULL, 1, '2022-04-06 13:48:40', '2022-04-06 13:48:40'),
(31, 3, 'Test 2', NULL, 0, '2022-04-06 13:48:40', '2022-04-06 13:48:40'),
(41, 2, 'Test 1', NULL, 1, '2022-04-11 16:25:54', '2022-04-11 16:25:54'),
(42, 2, 'Test 2', NULL, 0, '2022-04-11 16:25:54', '2022-04-11 16:25:54'),
(43, 2, 'Test 3', NULL, 0, '2022-04-11 16:25:54', '2022-04-11 16:25:54'),
(44, 2, 'new', NULL, 0, '2022-04-11 16:25:54', '2022-04-11 16:25:54'),
(49, 8, 'vishal', NULL, 1, '2022-04-11 17:01:22', '2022-04-11 17:01:22'),
(68, 1, 'Test', NULL, 0, '2022-04-15 17:54:58', '2022-04-15 17:54:58'),
(69, 1, 'Test 2', NULL, 1, '2022-04-15 17:54:58', '2022-04-15 17:54:58'),
(70, 1, 'Test 3', NULL, 0, '2022-04-15 17:54:58', '2022-04-15 17:54:58'),
(107, 12, 'Dislike', NULL, 1, '2022-04-22 22:20:00', '2022-04-22 22:20:00'),
(108, 12, 'Like', NULL, 2, '2022-04-22 22:20:00', '2022-04-22 22:20:00'),
(109, 12, 'Good', NULL, 3, '2022-04-22 22:20:01', '2022-04-22 22:20:01'),
(114, 15, 'Yes', NULL, 0, '2022-04-22 22:21:44', '2022-04-22 22:21:44'),
(115, 15, 'No', NULL, 1, '2022-04-22 22:21:44', '2022-04-22 22:21:44'),
(116, 16, 'Dislike', 89, 1, '2022-04-28 14:23:18', '2022-04-28 14:23:18'),
(117, 16, 'Like', 97, 2, '2022-04-28 14:23:19', '2022-04-28 14:23:19'),
(118, 16, 'Good', 98, 3, '2022-04-28 14:23:20', '2022-04-28 14:23:20'),
(119, 17, 'Yes', NULL, 0, '2022-04-28 14:24:05', '2022-04-28 14:24:05'),
(120, 17, 'No', NULL, 1, '2022-04-28 14:24:05', '2022-04-28 14:24:05'),
(121, 18, 'Option 1', NULL, 1, '2022-04-28 14:27:43', '2022-04-28 14:27:43'),
(122, 18, 'Option 2', NULL, 2, '2022-04-28 14:27:43', '2022-04-28 14:27:43'),
(123, 18, 'Option 3', NULL, 3, '2022-04-28 14:27:43', '2022-04-28 14:27:43'),
(124, 19, 'Dislike', 89, 1, '2022-04-30 16:01:59', '2022-04-30 16:01:59'),
(125, 19, 'Like', 97, 2, '2022-04-30 16:01:59', '2022-04-30 16:01:59'),
(126, 19, 'Good', 98, 3, '2022-04-30 16:02:00', '2022-04-30 16:02:00'),
(127, 20, 'Yes', NULL, 0, '2022-04-30 16:04:30', '2022-04-30 16:04:30'),
(128, 20, 'No', NULL, 1, '2022-04-30 16:04:30', '2022-04-30 16:04:30'),
(129, 21, 'Option 1', NULL, 1, '2022-04-30 16:09:51', '2022-04-30 16:09:51'),
(130, 21, 'Option 2', NULL, 2, '2022-04-30 16:09:51', '2022-04-30 16:09:51'),
(131, 21, 'Option 3', NULL, 3, '2022-04-30 16:09:51', '2022-04-30 16:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'template name',
  `secs` text COLLATE utf8mb4_unicode_ci,
  `is_default` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `tempname`, `secs`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'HOME', 'home', 'templates.basic.', '[\"feature\",\"popular\",\"statistic\",\"upcomming\",\"career\",\"testimonial\",\"faq\",\"subscribe\",\"blog\"]', 1, '2020-07-11 06:23:58', '2021-03-20 04:42:30'),
(10, 'About', 'about-us', 'templates.basic.', '[\"popular\",\"statistic\",\"career\",\"testimonial\",\"faq\"]', 0, '2021-03-21 06:52:42', '2021-05-23 08:20:27');

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
-- Table structure for table `Questionimages`
--

CREATE TABLE `Questionimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Questionimages`
--

INSERT INTO `Questionimages` (`id`, `question_id`, `image`, `created_at`, `updated_at`) VALUES
(5, 1, '624c2773d7ffc1649158003.jpg', '2022-04-05 18:26:44', '2022-04-05 18:26:44'),
(6, 1, '624c27744cad01649158004.jpg', '2022-04-05 18:26:44', '2022-04-05 18:26:44'),
(7, 1, '624c2831b12911649158193.png', '2022-04-05 18:29:54', '2022-04-05 18:29:54'),
(8, 2, '624d379cb19171649227676.jpg', '2022-04-06 13:47:56', '2022-04-06 13:47:56'),
(9, 3, '624d37c85ec791649227720.jpg', '2022-04-06 13:48:40', '2022-04-06 13:48:40'),
(10, 4, '6253f48f08c701649669263.png', '2022-04-11 16:27:43', '2022-04-11 16:27:43'),
(11, 5, '6253f566c36e51649669478.png', '2022-04-11 16:31:19', '2022-04-11 16:31:19'),
(12, 6, '6253f6b655dde1649669814.png', '2022-04-11 16:36:54', '2022-04-11 16:36:54'),
(13, 7, '6253f81e87dec1649670174.png', '2022-04-11 16:42:55', '2022-04-11 16:42:55'),
(14, 8, '6253fc72547421649671282.jpg', '2022-04-11 17:01:22', '2022-04-11 17:01:22'),
(15, 9, '625410b1e4f531649676465.jpg', '2022-04-11 18:27:46', '2022-04-11 18:27:46'),
(16, 10, '625411c6d817c1649676742.jpg', '2022-04-11 18:32:23', '2022-04-11 18:32:23'),
(17, 11, '625412da1515e1649677018.jpg', '2022-04-11 18:36:58', '2022-04-11 18:36:58'),
(18, 12, '625e640ca6eb01650353164.png', '2022-04-19 14:26:05', '2022-04-19 14:26:05'),
(19, 13, '6262c7ca972751650640842.jpg', '2022-04-22 22:20:42', '2022-04-22 22:20:42'),
(20, 14, '6262c7d4eeebe1650640852.jpg', '2022-04-22 22:20:53', '2022-04-22 22:20:53'),
(21, 15, '6262c82080ada1650640928.png', '2022-04-22 22:22:08', '2022-04-22 22:22:08'),
(22, 17, '626a411504d6e1651130645.jpg', '2022-04-28 14:24:05', '2022-04-28 14:24:05'),
(23, 19, '626cfb070309d1651309319.jpg', '2022-04-30 16:01:59', '2022-04-30 16:01:59'),
(24, 20, '626cfb9df25f11651309469.jpg', '2022-04-30 16:04:30', '2022-04-30 16:04:30'),
(25, 21, '626cfcded51711651309790.jpg', '2022-04-30 16:09:51', '2022-04-30 16:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` double UNSIGNED NOT NULL,
  `written_ans` text COLLATE utf8mb4_unicode_ci COMMENT 'when exam type is written this field is fillable',
  `status` int(1) NOT NULL COMMENT '1 = Active, 2 = Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `choosecategory` int(11) DEFAULT NULL COMMENT '1=> multiple with image, 2 => multiple without image, 3=> true & false',
  `reverse` tinyint(1) NOT NULL DEFAULT '0',
  `conditionquetion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorymain` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `question`, `marks`, `written_ans`, `status`, `created_at`, `updated_at`, `choosecategory`, `reverse`, `conditionquetion`, `categorymain`) VALUES
(1, 1, 'Test&nbsp;<span style=\"color: rgb(33, 37, 41); font-size: 12px; font-weight: 700;\">Question</span>', 1, NULL, 0, '2022-04-01 13:55:19', '2022-04-01 13:55:19', 1, 0, NULL, NULL),
(2, 2, 'Test q 1', 10, NULL, 0, '2022-04-06 13:47:56', '2022-04-06 13:47:56', 1, 0, NULL, NULL),
(3, 2, 'tEST', 10, NULL, 0, '2022-04-06 13:48:40', '2022-04-06 13:48:40', 1, 0, NULL, NULL),
(8, 2, 'chkong mulit', 24, NULL, 0, '2022-04-11 17:01:22', '2022-04-11 17:01:22', 1, 0, NULL, NULL),
(12, 7, '<br>', 1, NULL, 0, '2022-04-19 14:26:04', '2022-04-22 22:19:35', 1, 1, NULL, 0),
(15, 7, 'Test Question 2', 1, NULL, 0, '2022-04-22 22:21:44', '2022-04-22 22:22:08', 3, 0, NULL, 0),
(16, 8, 'Test 1', 0, NULL, 0, '2022-04-28 14:23:18', '2022-04-28 14:23:18', 1, 0, 'null', 0),
(17, 8, 'test 2', 1, NULL, 0, '2022-04-28 14:24:05', '2022-04-28 14:24:31', 3, 0, NULL, 0),
(18, 8, 'test 3', 0, NULL, 0, '2022-04-28 14:27:43', '2022-04-28 14:27:43', 2, 0, 'null', 0),
(19, 9, '<br>', 0, NULL, 0, '2022-04-30 16:01:59', '2022-04-30 16:01:59', 1, 0, 'null', 0),
(20, 9, '<br>', 0, NULL, 0, '2022-04-30 16:04:29', '2022-04-30 16:04:29', 3, 0, 'null', 0),
(21, 9, '<br>', 0, NULL, 0, '2022-04-30 16:09:50', '2022-04-30 16:09:50', 2, 0, 'null', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_categories`
--

CREATE TABLE `question_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_categories`
--

INSERT INTO `question_categories` (`id`, `question_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 12, 3, '2022-04-22 22:20:00', '2022-04-22 22:20:00'),
(3, 13, 1, '2022-04-22 22:20:42', '2022-04-22 22:20:42'),
(4, 13, 4, '2022-04-22 22:20:42', '2022-04-22 22:20:42'),
(5, 14, 4, '2022-04-22 22:20:52', '2022-04-22 22:20:52'),
(7, 15, 4, '2022-04-22 22:22:08', '2022-04-22 22:22:08'),
(8, 16, 3, '2022-04-28 14:23:18', '2022-04-28 14:23:18'),
(9, 16, 4, '2022-04-28 14:23:18', '2022-04-28 14:23:18'),
(11, 17, 4, '2022-04-28 14:24:31', '2022-04-28 14:24:31'),
(12, 18, 2, '2022-04-28 14:27:43', '2022-04-28 14:27:43'),
(13, 19, 3, '2022-04-30 16:01:59', '2022-04-30 16:01:59'),
(14, 20, 4, '2022-04-30 16:04:29', '2022-04-30 16:04:29'),
(15, 21, 4, '2022-04-30 16:09:50', '2022-04-30 16:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `result_mark` double NOT NULL,
  `total_correct_ans` int(11) NOT NULL,
  `total_wrong_ans` int(11) NOT NULL,
  `result_status` int(1) NOT NULL COMMENT '1 = passed, 0 = failed, 2="attend"',
  `result` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `exam_id`, `result_mark`, `total_correct_ans`, `total_wrong_ans`, `result_status`, `result`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 0, 1, NULL, '2022-04-01 13:56:25', '2022-04-01 13:56:34'),
(2, 3, 1, 0, 0, 0, 0, NULL, '2022-04-06 13:35:43', '2022-04-06 13:35:43'),
(3, 3, 2, 0, 0, 0, 0, NULL, '2022-04-06 13:48:50', '2022-04-06 13:48:50'),
(4, 2, 2, 0, 0, 0, 0, NULL, '2022-04-06 14:10:14', '2022-04-06 14:10:14'),
(5, 2, 1, 1, 1, 0, 1, NULL, '2022-04-15 12:12:25', '2022-04-15 12:12:43'),
(6, 2, 6, 0, 0, 0, 0, NULL, '2022-04-15 18:18:31', '2022-04-15 18:18:31'),
(7, 2, 2, 0, 0, 0, 0, NULL, '2022-04-22 22:16:30', '2022-04-22 22:16:30'),
(8, 2, 2, 0, 0, 0, 0, NULL, '2022-04-22 22:16:48', '2022-04-22 22:16:48'),
(9, 2, 1, 0, 0, 0, 0, NULL, '2022-04-22 22:16:56', '2022-04-22 22:16:56'),
(10, 2, 7, 3, 0, 0, 0, '{\"resultMark\": 3, \"categories_score\": {\"3\": {\"label\": \"Cereal Factor\", \"score\": 3}, \"4\": {\"label\": \"Politics Factor\", \"score\": 0}}}', '2022-04-22 22:22:24', '2022-04-22 22:28:30'),
(11, 2, 7, 0, 0, 0, 0, NULL, '2022-04-22 22:24:27', '2022-04-22 22:24:27'),
(13, 2, 8, 2, 0, 0, 1, '{\"resultMark\": 2, \"categories_score\": {\"2\": {\"label\": \"Female\", \"score\": 1}, \"3\": {\"label\": \"Cereal Factor\", \"score\": 1}, \"4\": {\"label\": \"Politics Factor\", \"score\": 1}}}', '2022-04-28 14:26:40', '2022-04-28 14:28:46'),
(14, 2, 8, 0, 0, 0, 0, NULL, '2022-04-28 14:27:50', '2022-04-28 14:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scorecategory` int(10) UNSIGNED DEFAULT NULL,
  `scorevalue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scorenumber` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `scorecategory`, `scorevalue`, `scorenumber`, `created_at`, `updated_at`) VALUES
(42, 3, 'Yes', 0, '2022-04-17 07:13:56', '2022-04-22 14:19:29'),
(50, 3, 'No', 1, '2022-04-27 05:55:40', '2022-04-22 14:19:29'),
(89, 1, 'Dislike', 1, '2022-04-22 13:48:09', '2022-04-22 13:53:43'),
(91, 2, 'Option 1', 1, '2022-04-22 13:48:09', '2022-04-22 14:19:29'),
(97, 1, 'Like', 2, '2022-04-22 14:19:29', '2022-04-22 14:19:29'),
(98, 1, 'Good', 3, '2022-04-22 14:19:29', '2022-04-22 14:19:29'),
(99, 2, 'Option 2', 2, '2022-04-22 14:19:29', '2022-04-22 14:19:29'),
(100, 2, 'Option 3', 3, '2022-04-22 14:19:29', '2022-04-22 14:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `is_popular` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `category_id`, `name`, `slug`, `short_details`, `status`, `is_popular`, `created_at`, `updated_at`) VALUES
(1, 1, 'M_Cerel', 'test-subject', 'M_Cerel', 1, 1, '2022-04-01 13:52:40', '2022-04-14 15:32:18'),
(2, 2, 'F_Politics', 'female-test-1', 'F_Politics', 1, 1, '2022-04-14 15:29:20', '2022-04-14 15:32:04'),
(3, 1, 'M_Politics', 'male-test-2', 'M_Politics', 1, 1, '2022-04-14 15:29:51', '2022-04-14 15:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_attachments`
--

CREATE TABLE `support_attachments` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `support_message_id` int(11) NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `supportticket_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT '0',
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed',
  `last_reply` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `charge` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `post_balance` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `trx_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_by` int(11) DEFAULT NULL,
  `balance` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci COMMENT 'contains full address',
  `race` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: banned, 1: active',
  `ev` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: email unverified, 1: email verified',
  `sv` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: sms unverified, 1: sms verified',
  `ver_code` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'stores verification code',
  `ver_code_send_at` datetime DEFAULT NULL COMMENT 'verification send time',
  `ts` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: 2fa off, 1: 2fa on',
  `tv` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: 2fa unverified, 1: 2fa verified',
  `tsc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `mobile`, `gender`, `ref_by`, `balance`, `password`, `image`, `address`, `race`, `date_of_birth`, `status`, `ev`, `sv`, `ver_code`, `ver_code_send_at`, `ts`, `tv`, `tsc`, `provider`, `provider_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ashok', 'M', 'test625', 'ashokinclude@gmail.com', '9108220737047', NULL, NULL, '0.00000000', '$2y$10$yHmSZ7k0aQAmjb9oH3bE9uXxgYB4WxVbEBhDXvWhFQOLazpaVtWYS', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"India\",\"city\":\"\"}', NULL, NULL, 1, 1, 1, '453737', '2022-04-01 06:48:36', 1, 1, NULL, NULL, NULL, NULL, '2022-04-01 13:48:35', '2022-04-01 13:49:14'),
(2, 'Rilesh', 'Dev', 'rilesh1996', 'dev_rilesh@gmail.com', '123456789', 'male', NULL, '0.00000000', '$2y$10$aY/iPOwoow9uRLZI5BEAg.UppLtHHYtw9O6Z3lWLv7pcYBOPasZyS', NULL, '{\"address\":\"\",\"state\":\"raj\",\"zip\":\"\",\"country\":\"India\",\"city\":\"pali\"}', 'Black', '1996-11-11', 1, 1, 1, '639113', '2022-04-01 14:27:39', 0, 1, NULL, NULL, NULL, NULL, '2022-04-01 21:27:37', '2022-04-06 14:09:37'),
(3, 'Test', 'Test2', 'tedst2123', 'satawaretechnologies@gmail.com', '91652616126', NULL, NULL, '0.00000000', '$2y$10$GzzzGdnX0yFxfeVS1eS36eKsBBBVuu.4MY8wG8fwg9Is4wUpCozI.', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"India\",\"city\":\"\"}', NULL, NULL, 1, 1, 1, '748193', '2022-04-06 06:35:00', 0, 1, NULL, NULL, NULL, NULL, '2022-04-06 13:34:59', '2022-04-06 13:35:18'),
(4, 'dev', 'user', 'devuser', 'useremailtest@gmail.com', '18104698526', 'male', NULL, '0.00000000', '$2y$10$avXHagsqUptNq6s9cLlimeYicDMGlGAYW4aggQaTgwq9ot7d.Dm46', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"Canada\",\"city\":\"\"}', NULL, NULL, 1, 1, 1, '328334', '2022-04-08 06:38:18', 0, 1, NULL, NULL, NULL, NULL, '2022-04-08 13:38:17', '2022-04-08 13:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `user_ip`, `location`, `browser`, `os`, `longitude`, `latitude`, `country`, `country_code`, `created_at`, `updated_at`) VALUES
(1, 1, '103.160.217.166', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-04-01 13:48:35', '2022-04-01 13:48:35'),
(2, 2, '157.38.213.236', 'Hyderabad - - India - IN ', 'Chrome', 'Windows 10', '78.4744', '17.3753', 'India', 'IN', '2022-04-01 21:27:38', '2022-04-01 21:27:38'),
(3, 3, '103.160.217.133', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-04-06 13:34:59', '2022-04-06 13:34:59'),
(4, 2, '157.38.213.236', 'Hyderabad - - India - IN ', 'Chrome', 'Windows 10', '78.4744', '17.3753', 'India', 'IN', '2022-04-06 14:09:12', '2022-04-06 14:09:12'),
(5, 2, '103.160.217.133', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-04-07 18:25:49', '2022-04-07 18:25:49'),
(6, 2, '106.77.79.76', 'Ahmedabad - - India - IN ', 'Chrome', 'Windows 7', '72.5871', '23.0276', 'India', 'IN', '2022-04-07 18:29:18', '2022-04-07 18:29:18'),
(7, 4, '157.38.132.37', 'Delhi - - India - IN ', 'Chrome', 'Windows 10', '77.2315', '28.6519', 'India', 'IN', '2022-04-08 13:38:17', '2022-04-08 13:38:17'),
(8, 2, '157.38.130.101', 'Delhi - - India - IN ', 'Chrome', 'Windows 10', '77.2315', '28.6519', 'India', 'IN', '2022-04-15 12:12:05', '2022-04-15 12:12:05'),
(9, 2, '157.38.130.101', 'Delhi - - India - IN ', 'Chrome', 'Windows 10', '77.2315', '28.6519', 'India', 'IN', '2022-04-15 17:58:56', '2022-04-15 17:58:56'),
(10, 2, '103.160.217.236', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-04-22 13:30:08', '2022-04-22 13:30:08'),
(11, 2, '157.38.128.39', 'Delhi - - India - IN ', 'Chrome', 'Windows 10', '77.2315', '28.6519', 'India', 'IN', '2022-04-22 22:16:14', '2022-04-22 22:16:14'),
(12, 2, '157.38.93.150', 'Jaipur - - India - IN ', 'Chrome', 'Windows 10', '75.7928', '26.9261', 'India', 'IN', '2022-04-28 14:19:12', '2022-04-28 14:19:12'),
(13, 2, '157.38.67.96', 'Jaipur - - India - IN ', 'Chrome', 'Windows 10', '75.7928', '26.9261', 'India', 'IN', '2022-04-29 21:31:33', '2022-04-29 21:31:33'),
(14, 2, '157.38.67.96', 'Jaipur - - India - IN ', 'Chrome', 'Windows 10', '75.7928', '26.9261', 'India', 'IN', '2022-04-30 16:05:15', '2022-04-30 16:05:15'),
(15, 2, '157.38.67.96', 'Jaipur - - India - IN ', 'Chrome', 'Windows 10', '75.7928', '26.9261', 'India', 'IN', '2022-04-30 21:06:35', '2022-04-30 21:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(10) UNSIGNED NOT NULL,
  `method_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(18,8) NOT NULL,
  `currency` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(18,8) NOT NULL,
  `charge` decimal(18,8) NOT NULL,
  `trx` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_amount` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `after_charge` decimal(18,8) NOT NULL,
  `withdraw_information` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=>success, 2=>pending, 3=>cancel,  ',
  `admin_feedback` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_limit` decimal(18,8) DEFAULT NULL,
  `max_limit` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `delay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_charge` decimal(18,8) DEFAULT NULL,
  `rate` decimal(18,8) DEFAULT NULL,
  `percent_charge` decimal(5,2) DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_data` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `written_previews`
--

CREATE TABLE `written_previews` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `given_mark` double DEFAULT NULL,
  `correct_ans` int(1) DEFAULT NULL COMMENT '1 = prove correct ans, 0 = not provide\r\n',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '1 = reviewed, 0 = not reviewed, "2" => ''attend''',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_users`
--
ALTER TABLE `coupon_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_images`
--
ALTER TABLE `exam_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontends`
--
ALTER TABLE `frontends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genders_name_unique` (`name`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Optionimages`
--
ALTER TABLE `Optionimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Questionimages`
--
ALTER TABLE `Questionimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_categories`
--
ALTER TABLE `question_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_name_unique` (`name`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_attachments`
--
ALTER TABLE `support_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `written_previews`
--
ALTER TABLE `written_previews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_users`
--
ALTER TABLE `coupon_users`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exam_images`
--
ALTER TABLE `exam_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `extensions`
--
ALTER TABLE `extensions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontends`
--
ALTER TABLE `frontends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `Optionimages`
--
ALTER TABLE `Optionimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Questionimages`
--
ALTER TABLE `Questionimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `question_categories`
--
ALTER TABLE `question_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_attachments`
--
ALTER TABLE `support_attachments`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `written_previews`
--
ALTER TABLE `written_previews`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
