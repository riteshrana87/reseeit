-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2016 at 04:17 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reseeit`
--

-- --------------------------------------------------------

--
-- Table structure for table `logtable`
--

CREATE TABLE IF NOT EXISTS `logtable` (
  `log` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rst_admin_users`
--

CREATE TABLE IF NOT EXISTS `rst_admin_users` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_type` tinyint(1) NOT NULL COMMENT '1-super admin,2-admin',
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1-Active,0-Deactive',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rst_admin_users`
--

INSERT INTO `rst_admin_users` (`admin_id`, `admin_type`, `name`, `email`, `password`, `address`, `image`, `created_date`, `status`) VALUES
(1, 1, 'admin', 'admin@c-metric.com', '123123', 'infocity', '', '2016-02-22 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rst_app_ads`
--

CREATE TABLE IF NOT EXISTS `rst_app_ads` (
  `app_ads_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `app_img` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`app_ads_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rst_client_reward`
--

CREATE TABLE IF NOT EXISTS `rst_client_reward` (
  `client_reward_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reward_type_id` int(11) NOT NULL,
  `reward_summary_img` varchar(250) NOT NULL,
  `reward_img` varchar(250) NOT NULL,
  `reward_point` int(11) NOT NULL,
  PRIMARY KEY (`client_reward_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rst_client_type`
--

CREATE TABLE IF NOT EXISTS `rst_client_type` (
  `client_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_type_name` varchar(255) NOT NULL,
  `client_type` int(11) NOT NULL,
  PRIMARY KEY (`client_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rst_client_type`
--

INSERT INTO `rst_client_type` (`client_type_id`, `client_type_name`, `client_type`) VALUES
(2, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rst_cms_master`
--

CREATE TABLE IF NOT EXISTS `rst_cms_master` (
  `cms_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`cms_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rst_cms_master`
--

INSERT INTO `rst_cms_master` (`cms_id`, `page_name`, `slug`, `content`, `created_date`, `status`) VALUES
(1, 'Technology', 'technology', '<!-- Section 1 -->\r\n                <div class = "row section-basic section-type1">\r\n                    <div class = "col-sm-5 col-lg-4 col-lg-offset-1 clearfix">\r\n                        <img class = "section-image-left"  style="margin-top: 10px;" src="http://localhost/reseeit/images/technology1.jpg">\r\n                    </div>\r\n                    <div class = "col-sm-7 col-lg-6 text-left">\r\n                        <h2 class="text-quote"  style="margin-top: 10px;">A picture is worth a million bytes.</h2>\r\n                        <p>This is even more true today, especially in the smartphone era, because pictures come packaged with additional data.</p>\r\n                        <p>Noviah''s <strong>patented technology</strong> analyzes images and data that users send using Vidusi (Noviah''s smartphone app), and <strong>connects</strong> them with relevant information <strong>instantaneously</strong>.</p>                                \r\n                    </div>\r\n                </div><!-- Section 1 -->\r\n<!-- Section 2 -->\r\n                <div class = "row section-basic section-type2">\r\n                    <div class = "col-sm-6 col-md-4 col-lg-4 col-lg-offset-1">\r\n                        <h1 class = "text-left text-quote margin-top-zero">Our platform is designed with you, the client, in mind.</h1>\r\n                    </div>\r\n                    <div class = "col-sm-6 col-md-8 col-lg-6">\r\n                            <h3 class = "col-sm-5 col-md-6  col-sm-offset-1 col-md-offset-0 margin-top-zero"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;Easy to Use</h3>\r\n                            <h3 class = "col-sm-6 col-md-6 margin-top-zero"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> &nbsp;Easy to Deploy</h3>\r\n                            <h3 class = "col-sm-11 col-sm-offset-1 col-md-12 col-md-offset-0 margin-top-zero"><span class="glyphicon glyphicon-resize-full" aria-hidden="true"></span> &nbsp;Easy to Scale</h3>\r\n                    </div>\r\n<!-- The Columns -->\r\n                    <div class = "col-sm-12 col-md-12 col-lg-10 col-lg-offset-1 sub-section-box sub-section-border">\r\n                        <p class = "text-left">The platform has three key modules:<p>\r\n<!-- Column 1 -->\r\n                        <div class = "col-sm-4 text-left">\r\n                            <h2 class = "margin-top-zero"><span class="col-sm-12 label label-default column-header-tech">Client Interface</span></h2>\r\n                            <p>A simple to use and intuitive set of web-enabled tools for you to:</p>\r\n                            <ul>\r\n                                <li>Segment your audience, setup interactions and implement your messaging strategy</li>\r\n                                <li>Analyze results in real-time, refine your message or strategy</li>\r\n                                <li>Quickly turnaround and implement the refined strategy</li>\r\n                            </ul>\r\n                            <p>You can do it all from the Client Interface.  It is specifically designed with your needs in mind.</p>\r\n                        </div> <!-- Column 1 -->\r\n<!-- Column 2 -->       <div class = "col-sm-4 text-left">\r\n                            <h2 class = "margin-top-zero"><span class="col-sm-12 label label-default column-header-tech">Smartphone App</span></h2>\r\n                            <img class = "vidusi-logo" src="http://localhost/reseeit/images/VidusiLogo_blue.png">\r\n                            <p>Vidusi, Noviah''s smartphone app, is your audiences'' portal for interaction.</p>\r\n                            <p>To interact with your ad, users follow two simple steps:</p>\r\n                            <ol>\r\n                                <li>Launch Vidusi</li>\r\n                                <li>Point smartphone''s camera at your ad</li>\r\n                            </ol>\r\n                            <p>That''s it. &nbsp;Vidusi takes care of the rest. &nbsp;Next, your response is displayed to user.</p>\r\n                            <p>Vidusi is available for both Android and iOS platforms.</p>\r\n                        </div>  <!-- Column 2 -->\r\n<!-- Column 3 -->\r\n                        <div class = "col-sm-4 text-left">\r\n                            <h2 class = "margin-top-zero"><span class="col-sm-12 label label-default column-header-tech">Connection Engine</span></h2>\r\n                            <p>Noviah''s <b>patented technology</b> is at the core of this engine, the heart of our platform.</p>\r\n                            <p>It''s sole purpose: connect your audience with the most relevant information.</p>\r\n                            <p>This module analyzes data sent by users'' smartphone, and using the latest methodologies in data science, identifies the most relevant response and sends it to user.</p>\r\n                        </div> <!-- Column 3 -->\r\n                    </div> <!-- The Columns -->\r\n                </div> <!-- Section 2 -->\r\n<!-- Section 3 -->\r\n                <div class = "row section-basic section-type1">\r\n                    <div class = "col-sm-12 col-lg-10 col-lg-offset-1">\r\n                        <p class = "text-left">Noviah''s technology can be used with a range of media formats. &nbsp;For sample use cases check out the <a href="applicationsNew.html" style = "color: inherit;"><strong>Applications</strong></a> page. &nbsp;We promise it will be revealing.</p>\r\n                        <p class = "text-left">Do you have questions? &nbsp;Our hunch is that you definitely do. &nbsp;<a href="contactUsNew.html" style = "color: inherit;"><strong>Contact us.</strong></a> &nbsp;We''ll be more than happy to answer your questions and even give you a demo - <span class = "text-quote" style = "font-size: 1.4em;">a picture is worth a thousand words.</span> &nbsp;Wouldn''t you agree?</p>\r\n                    </div>\r\n                </div> <!-- Section 3 -->', '2015-10-29 10:52:47', 1),
(2, 'About US', 'aboutus', '<div class="row section-basic section-type1" style="padding-bottom: 0px;">\r\n<div class="col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 text-left">\r\n<h3 style="margin-top: 0px;"><strong>Our Vision: &nbsp;</strong><span class="text-quote">A connected world where every interaction is valued.</span></h3>\r\n<h3 style="display: inline;"><strong>Our Mission: &nbsp;</strong></h3>\r\n<p style="display: inline;">To be the best at connecting people with information, because we believe that every connection matters. But, that''s only the first part of our mission. Achieving success hinges on the four others below:</p>\r\n<ul style="margin-left: 10px;">\r\n<li>To be our clients'' most valuable partners.</li>\r\n<li>To be our investors'' best asset.</li>\r\n<li>To be our employees'' best investment of their talent and time.</li>\r\n<li>To be a model citizen in the locales we do business.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="row section-basic section-type2">\r\n<div class="col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 text-left">\r\n<h3 class="margin-top-zero" style="display: inline;"><strong>Our Story: &nbsp;</strong></h3>\r\n<p style="display: inline;">Can the chasm between the online and offline worlds be closed? &nbsp;Can the boundary between the two be made seamless?</p>\r\n<p>These questions intrigued us, two friends, one an avid techie with a strong background in computer programming and image processing, and the other a technology entrepreneur and a veteran. &nbsp;We developed a concept to solve the challenge, and very quickly realized the market potential of the technology, its many applications and benefits to consumers. &nbsp;Thus was born Noviah Technology Corp.</p>\r\n</div>\r\n</div>\r\n<div class="row section-basic section-type1">\r\n<div class="col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 text-left">\r\n<p>We have since tested the concept, deployed a minimum viable version of the solution, and also received a patent for our technology. &nbsp;And, in 2014 we signed-up our first client - a Minor League Baseball team.</p>\r\n<p>Our hard won laurels spur us on. &nbsp;We have our eyes are on the road ahead, but with a sharp focus on providing value to all our stakeholders.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>', '2015-10-29 12:16:48', 1),
(3, 'Contact Us', 'contactus', '<div><!-- Product Support/FAQ block -->\r\n<div class="row section-basic section-type1">\r\n<div class="col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2" style="margin-top: 10px;">\r\n<div class="col-sm-5">\r\n<div class="block-highlight text-left">\r\n<h2 style="margin-bottom: 20px;">Product Support</h2>\r\n<p style="margin-bottom: 25px;">Having trouble using Vidusi?</p>\r\n<button id="vidusiFAQLg" class="btn-primary btnSizeSelect btnBasicNVT" type="button">Vidusi FAQ</button></div>\r\n</div>\r\n<div class="col-sm-7">\r\n<div class="text-left" style="margin-top: 10px;">\r\n<h3>Noviah Terms &amp; Policies</h3>\r\n<p>Your trust in us is precious. &nbsp;Our committment to earn and keep your trust is reflected in our <a href="http://www.noviahtech.com/terms.html">terms</a> and <a href="http://www.noviahtech.com/privacy.html">privacy policies</a>. &nbsp;If you recognize any violation bring it to our attention right away.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- Product Support/FAQ block --> <!--SECTION 2--> <!-- We want to connect you, block -->\r\n<div class="row section-basic section-type2">\r\n<div class="col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2" style="margin-top: 10px;">\r\n<div class="col-sm-3 text-left">\r\n<h2 style="margin-top: 1em;">We would like to hear from you</h2>\r\n</div>\r\n<div class="col-sm-6 text-left">\r\n<ul>\r\n<li>Need to resolve a technical issue</li>\r\n<li>Have questions about our terms and policies</li>\r\n<li>Want to kick the tires of our technology</li>\r\n<li>Interested to integrate our technolgy with yours</li>\r\n</ul>\r\n</div>\r\n<div class="col-sm-3">\r\n<h3 style="margin-top: 1em;">Or, have any other questions?</h3>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- We want to connect you, block --> <!--SECTION 3--> <!-- Connect Us -->\r\n<div class="row section-basic section-type1">\r\n<div class="col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2" style="margin-top: 10px;">\r\n<h3 class="text-left">Connect with Us @</h3>\r\n<div class="col-sm-4">\r\n<p class="text-left" style="margin-left: 60px;">: 517-914-8984</p>\r\n</div>\r\n<div class="col-sm-6">\r\n<p class="text-left">: connect@noviahtech.com</p>\r\n</div>\r\n<div class="col-sm-11">\r\n<p class="text-left" style="margin-left: 60px;">: 817 Silver Spring Ave., Suite 306, Silver Spring, MD 20909, USA</p>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- Connect Us --></div>', '2015-10-29 12:45:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rst_company`
--

CREATE TABLE IF NOT EXISTS `rst_company` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `com_name` varchar(50) NOT NULL,
  `com_url` varchar(50) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  PRIMARY KEY (`com_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rst_company`
--

INSERT INTO `rst_company` (`com_id`, `user_id`, `com_name`, `com_url`, `added_date`, `status`) VALUES
(1, 2, 'c-metric test', '', '2016-02-22 18:29:00', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `rst_company_location`
--

CREATE TABLE IF NOT EXISTS `rst_company_location` (
  `com_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(250) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `long` varchar(50) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  PRIMARY KEY (`com_location_id`),
  KEY `com_id` (`com_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rst_company_location`
--

INSERT INTO `rst_company_location` (`com_location_id`, `com_id`, `user_id`, `description`, `address`, `state`, `country`, `city`, `zipcode`, `lat`, `long`, `added_date`, `status`) VALUES
(1, 1, 2, '', '1221 N Church St #202', 'New Jersey', '', 'Moorestown', '08057', '39.9688817', '-74.948886', '2016-02-22 18:29:00', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `rst_coupon`
--

CREATE TABLE IF NOT EXISTS `rst_coupon` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `max_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_img` varchar(50) NOT NULL,
  `coupon_type` enum('featured','nearby') NOT NULL DEFAULT 'featured',
  `coupon_featured` enum('yes','no') NOT NULL DEFAULT 'no',
  `com_location_id` int(11) NOT NULL,
  `delivery_method` enum('Push','Pull') NOT NULL DEFAULT 'Pull',
  `start_date` varchar(25) NOT NULL,
  `expiry_date` varchar(25) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tags_text` text NOT NULL,
  `summary` text NOT NULL,
  `detailed_coupon_img` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`coupon_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rst_coupon`
--

INSERT INTO `rst_coupon` (`coupon_id`, `max_number`, `user_id`, `coupon_code`, `coupon_img`, `coupon_type`, `coupon_featured`, `com_location_id`, `delivery_method`, `start_date`, `expiry_date`, `added_date`, `tags_text`, `summary`, `detailed_coupon_img`, `status`) VALUES
(1, 10, 2, '1', '1434203896.jpg', 'featured', 'no', 0, 'Push', '04/11/2016', '04/15/2016', '2016-02-25 11:19:30', 'Dragos', 'Dragos', '1917106653.jpg', 'active'),
(2, 0, 2, '2', '', 'featured', 'no', 0, 'Push', '', '', '2016-02-25 11:19:30', '', '', '', 'active'),
(3, 0, 2, '3', '', 'featured', 'no', 0, 'Push', '', '', '2016-02-25 11:19:30', '', '', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `rst_coupon_favorite`
--

CREATE TABLE IF NOT EXISTS `rst_coupon_favorite` (
  `coupon_fid` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`coupon_fid`),
  KEY `coupon_id` (`coupon_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rst_coupon_favorite`
--

INSERT INTO `rst_coupon_favorite` (`coupon_fid`, `coupon_id`, `user_id`, `added_date`) VALUES
(2, 1, 10, '2016-02-24 16:36:26'),
(3, 1, 11, '2016-02-24 16:54:24'),
(4, 1, 12, '2016-02-24 16:55:58'),
(5, 1, 16, '2016-02-25 11:15:46'),
(6, 1, 17, '2016-02-25 11:42:24'),
(7, 1, 18, '2016-02-25 12:07:10'),
(8, 1, 22, '2016-02-25 14:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `rst_earning_point`
--

CREATE TABLE IF NOT EXISTS `rst_earning_point` (
  `earning_point_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `com_name` varchar(255) NOT NULL,
  `client_type` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_activity` varchar(255) NOT NULL,
  `client_points_earned` int(11) NOT NULL,
  `noviah_points_earned` int(11) NOT NULL,
  `non_profit_points_earned` int(11) NOT NULL,
  PRIMARY KEY (`earning_point_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `rst_earning_point`
--

INSERT INTO `rst_earning_point` (`earning_point_id`, `user_id`, `com_name`, `client_type`, `client_id`, `client_activity`, `client_points_earned`, `noviah_points_earned`, `non_profit_points_earned`) VALUES
(1, 3, '', 0, 0, '', 10, 10, 15),
(2, 3, '', 0, 0, '', 10, 20, 15),
(12, 6, '', 0, 0, '', 10, 10, 15),
(13, 6, '', 0, 0, '', 10, 20, 15),
(14, 7, '', 0, 0, '', 10, 10, 15),
(15, 7, '', 0, 0, '', 10, 20, 15),
(24, 10, '', 0, 0, '', 10, 10, 15),
(25, 10, '', 0, 0, '', 10, 20, 15),
(26, 11, '', 0, 0, '', 10, 10, 15),
(27, 11, '', 0, 0, '', 10, 20, 15),
(28, 12, '', 0, 0, '', 10, 10, 15),
(29, 12, '', 0, 0, '', 10, 20, 15),
(41, 16, '', 0, 0, '', 10, 10, 15),
(42, 16, '', 0, 0, '', 10, 20, 15),
(43, 16, '', 0, 0, '', 0, 1, 0),
(44, 17, '', 0, 0, '', 10, 10, 15),
(45, 17, '', 0, 0, '', 10, 20, 15),
(46, 17, '', 0, 0, '', 10, 3, 15),
(47, 17, '', 0, 0, '', 10, 4, 15),
(48, 17, '', 0, 0, '', 10, 5, 15),
(49, 17, '', 0, 0, '', 10, 8, 15),
(50, 18, '', 0, 0, '', 10, 10, 15),
(51, 18, '', 0, 0, '', 10, 20, 15),
(52, 18, '', 0, 0, '', 10, 3, 15),
(53, 18, '', 0, 0, '', 10, 4, 15),
(54, 18, '', 0, 0, '', 10, 5, 15),
(59, 18, '', 0, 0, '', 10, 8, 15),
(60, 15, '', 0, 0, '', 10, 10, 15),
(61, 15, '', 0, 0, '', 10, 20, 15),
(62, 15, '', 0, 0, '', 10, 3, 15),
(63, 15, '', 0, 0, '', 10, 4, 15),
(64, 15, '', 0, 0, '', 10, 5, 15),
(65, 15, '', 0, 0, '', 10, 8, 15),
(66, 15, '', 0, 0, '', 10, 10, 15),
(67, 20, '', 0, 0, '', 10, 10, 15),
(68, 22, '', 0, 0, '', 10, 10, 15),
(69, 22, '', 0, 0, '', 10, 20, 15),
(70, 22, '', 0, 0, '', 10, 3, 15),
(71, 22, '', 0, 0, '', 10, 4, 15),
(72, 22, '', 0, 0, '', 10, 5, 15),
(73, 22, '', 0, 0, '', 10, 8, 15);

-- --------------------------------------------------------

--
-- Table structure for table `rst_earning_total_point`
--

CREATE TABLE IF NOT EXISTS `rst_earning_total_point` (
  `earning_total_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `com_name` varchar(255) NOT NULL,
  `client_points_totals` int(11) NOT NULL,
  `noviah_points_totals` int(11) NOT NULL,
  `non_profit_points_totals` int(11) NOT NULL,
  PRIMARY KEY (`earning_total_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `rst_earning_total_point`
--

INSERT INTO `rst_earning_total_point` (`earning_total_id`, `user_id`, `com_name`, `client_points_totals`, `noviah_points_totals`, `non_profit_points_totals`) VALUES
(1, 3, '', 30, 30, 30),
(16, 16, '', 30, 31, 30),
(17, 17, '', 50, 50, 90),
(18, 18, '', 50, 50, 90),
(19, 15, '', 60, 60, 105),
(20, 20, '', 10, 10, 15),
(21, 22, '', 50, 50, 90);

-- --------------------------------------------------------

--
-- Table structure for table `rst_interactions`
--

CREATE TABLE IF NOT EXISTS `rst_interactions` (
  `interaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `expiry_date` varchar(255) NOT NULL,
  `default_interaction` varchar(255) NOT NULL,
  `default_interaction_type` varchar(255) NOT NULL,
  `Type` varchar(250) NOT NULL,
  PRIMARY KEY (`interaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rst_interactions`
--

INSERT INTO `rst_interactions` (`interaction_id`, `user_id`, `start_date`, `expiry_date`, `default_interaction`, `default_interaction_type`, `Type`) VALUES
(1, 2, '02/21/2016', '02/26/2016', 'https://www.youtube.com/watch?v=RhFMIRuHAL4', 'video', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `rst_interaction_watch`
--

CREATE TABLE IF NOT EXISTS `rst_interaction_watch` (
  `user_interaction_watch_id` int(11) NOT NULL AUTO_INCREMENT,
  `Logged_UserId` int(11) NOT NULL,
  `interaction_id` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`user_interaction_watch_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `rst_interaction_watch`
--

INSERT INTO `rst_interaction_watch` (`user_interaction_watch_id`, `Logged_UserId`, `interaction_id`, `added_date`) VALUES
(1, 3, 1, '2016-02-22 18:32:02'),
(2, 3, 2, '2016-02-22 18:33:58'),
(70, 22, 4, '2016-02-25 14:38:25'),
(69, 22, 3, '2016-02-25 14:37:19'),
(49, 18, 1, '2016-02-25 11:54:28'),
(48, 17, 6, '2016-02-25 11:43:04'),
(47, 17, 5, '2016-02-25 11:42:19'),
(46, 17, 4, '2016-02-25 11:41:07'),
(45, 17, 3, '2016-02-25 11:40:13'),
(68, 22, 2, '2016-02-25 14:36:13'),
(53, 18, 5, '2016-02-25 11:58:17'),
(44, 17, 2, '2016-02-25 11:39:19'),
(43, 17, 1, '2016-02-25 11:37:25'),
(42, 16, 2, '2016-02-25 11:14:34'),
(41, 16, 1, '2016-02-25 11:12:51'),
(67, 22, 1, '2016-02-25 14:34:36'),
(52, 18, 4, '2016-02-25 11:57:15'),
(51, 18, 3, '2016-02-25 11:56:40'),
(50, 18, 2, '2016-02-25 11:56:06'),
(66, 20, 1, '2016-02-25 14:19:42'),
(58, 18, 6, '2016-02-25 12:07:57'),
(65, 15, 1, '2016-02-25 13:18:37'),
(71, 22, 5, '2016-02-25 14:39:20'),
(72, 22, 6, '2016-02-25 14:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `rst_loyalty_interactions`
--

CREATE TABLE IF NOT EXISTS `rst_loyalty_interactions` (
  `loyalty_interaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `interaction_id` int(11) NOT NULL,
  `link_to_interaction` varchar(255) NOT NULL,
  `link_to_interaction_type` varchar(250) NOT NULL,
  `interaction_level` int(11) NOT NULL,
  `award_points` int(11) NOT NULL,
  `introduction_message` text NOT NULL,
  `tags_text` text NOT NULL,
  `Type` varchar(250) NOT NULL,
  `Status` enum('1','0') NOT NULL DEFAULT '0',
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`loyalty_interaction_id`),
  KEY `interaction_id` (`interaction_id`),
  KEY `interaction_id_2` (`interaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rst_loyalty_interactions`
--

INSERT INTO `rst_loyalty_interactions` (`loyalty_interaction_id`, `interaction_id`, `link_to_interaction`, `link_to_interaction_type`, `interaction_level`, `award_points`, `introduction_message`, `tags_text`, `Type`, `Status`, `added_date`) VALUES
(1, 1, 'https://www.youtube.com/watch?v=-byQ_xzsyUE', 'video', 1, 10, 'C-metric test 1', '', '', '1', '2016-02-25 11:33:53'),
(2, 1, 'https://www.youtube.com/watch?v=cicO37Xkkig', 'video', 2, 20, 'C-metric test 2', '', '', '1', '2016-02-25 11:33:54'),
(3, 1, 'https://www.youtube.com/watch?v=-byQ_xzsyUE', 'video', 3, 3, 'C-metric test 3', '', '', '1', '2016-02-25 11:33:55'),
(4, 1, 'https://www.youtube.com/watch?v=-byQ_xzsyUE', 'video', 4, 4, 'C-metric test 4', '', '', '1', '2016-02-25 11:33:57'),
(5, 1, 'https://www.youtube.com/watch?v=-byQ_xzsyUE', 'video', 5, 5, 'C-metric test 5', 'C-metric test 1', '', '1', '2016-02-25 11:33:59'),
(6, 1, 'https://www.youtube.com/watch?v=-byQ_xzsyUE', 'video', 6, 8, 'C-metric test 6', '', '', '1', '2016-02-25 11:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `rst_point_add`
--

CREATE TABLE IF NOT EXISTS `rst_point_add` (
  `reward_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_points_earned` int(11) NOT NULL,
  `noviah_points_earned` int(11) NOT NULL,
  `non_profit_points_earned` int(11) NOT NULL,
  PRIMARY KEY (`reward_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rst_product`
--

CREATE TABLE IF NOT EXISTS `rst_product` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_point` int(50) NOT NULL,
  `pro_address` text NOT NULL,
  `pro_state` varchar(50) NOT NULL,
  `pro_country` varchar(50) NOT NULL,
  `pro_zipcode` varchar(50) NOT NULL,
  `pro_lat` varchar(50) NOT NULL,
  `pro_long` varchar(50) NOT NULL,
  `pro_added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pro_status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  PRIMARY KEY (`pro_id`),
  KEY `user_id` (`user_id`,`eid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rst_product_event`
--

CREATE TABLE IF NOT EXISTS `rst_product_event` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `ename` varchar(50) NOT NULL,
  `eaddress` text NOT NULL,
  `eadded_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estatus` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rst_receipt_image`
--

CREATE TABLE IF NOT EXISTS `rst_receipt_image` (
  `receipt_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `img_text` varchar(50) NOT NULL,
  `receipt_img` varchar(50) NOT NULL,
  `receipt_point` int(21) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(55) NOT NULL DEFAULT '',
  PRIMARY KEY (`receipt_id`),
  KEY `user_id` (`user_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `rst_receipt_image`
--

INSERT INTO `rst_receipt_image` (`receipt_id`, `user_id`, `pro_id`, `img_text`, `receipt_img`, `receipt_point`, `added_date`, `modified_date`, `status`) VALUES
(1, 10, 1, 'Test Receipt', '1808869080.jpg', 0, '2016-02-24 16:35:36', '2016-02-24 16:35:36', ''),
(2, 10, 1, 'Test Receipt', '1159362413.jpg', 0, '2016-02-24 16:35:48', '2016-02-24 16:35:48', ''),
(3, 11, 1, 'Test Receipt', '2131214214.jpg', 0, '2016-02-24 16:53:37', '2016-02-24 16:53:37', ''),
(6, 16, 1, 'Test Receipt', '1344145193.jpg', 0, '2016-02-25 11:11:48', '2016-02-25 11:11:48', ''),
(7, 16, 1, 'Test Receipt', '1320987871.jpg', 0, '2016-02-25 11:15:10', '2016-02-25 11:15:10', ''),
(8, 16, 1, 'Test Receipt', '585624047.jpg', 0, '2016-02-25 11:16:03', '2016-02-25 11:16:03', 'offer_received'),
(9, 17, 1, 'Test Receipt', '843071230.jpg', 0, '2016-02-25 11:41:27', '2016-02-25 11:41:27', ''),
(11, 22, 1, 'Test Receipt', '1440298385.jpg', 0, '2016-02-25 14:43:38', '2016-02-25 14:43:38', ''),
(12, 15, 1, 'Test Receipt', '1319163408.jpg', 0, '2016-04-14 15:30:01', '2016-04-14 15:30:01', '');

-- --------------------------------------------------------

--
-- Table structure for table `rst_roles`
--

CREATE TABLE IF NOT EXISTS `rst_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(64) NOT NULL,
  `role_level` int(11) NOT NULL,
  `permissions` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rst_roles`
--

INSERT INTO `rst_roles` (`role_id`, `role_name`, `role_level`, `permissions`) VALUES
(1, 'Super admin', 1, ''),
(2, 'Client admin', 2, ''),
(3, 'Location admin account', 3, ''),
(4, 'Location user account', 4, ''),
(5, 'App user account', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `rst_roles_permission`
--

CREATE TABLE IF NOT EXISTS `rst_roles_permission` (
  `role_pid` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `role_pname` varchar(50) NOT NULL,
  `role_pdesc` text NOT NULL,
  PRIMARY KEY (`role_pid`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rst_users`
--

CREATE TABLE IF NOT EXISTS `rst_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_img` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `total_point` int(100) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` int(15) NOT NULL,
  `parent_uid` int(11) NOT NULL,
  `device_token` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `register_type` enum('fb','gplus','reseeit') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'reseeit',
  `client_type_id` int(11) NOT NULL,
  `new_password_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_password_requested` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activated` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`),
  KEY `username_2` (`username`),
  KEY `username_3` (`username`),
  KEY `username_4` (`username`),
  KEY `username_6` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `rst_users`
--

INSERT INTO `rst_users` (`user_id`, `role_id`, `username`, `password`, `email`, `fullname`, `first_name`, `last_name`, `user_img`, `total_point`, `address`, `zipcode`, `phone_number`, `parent_uid`, `device_token`, `register_type`, `client_type_id`, `new_password_key`, `new_password_requested`, `created`, `modified_date`, `activated`) VALUES
(1, 1, 'admin@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'admin@c-metric.com', 'admin', 'admin', '', '', 0, '', '', 0, 0, '', 'reseeit', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(2, 2, 'nimesh.thakkar@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'nimesh.thakkar@c-metric.com', 'Nimesh Thakkar', 'Nimesh', 'Thakkar', 'ca99ae5-10256179_676525859050475_2971035558098741580_o.jpg', 0, '', '380005', 2147483647, 0, '', 'reseeit', 2, NULL, '0000-00-00 00:00:00', '2016-02-22 18:24:51', '0000-00-00 00:00:00', 'active'),
(3, 5, 'niksmd86@gmail.com', 'a5a7ab05409771f1c6d5f500d00c5800', 'niksmd86@gmail.com', 'niksmd86', '', '', '', 0, '', '123456', 0, 0, '', 'reseeit', 4, NULL, '0000-00-00 00:00:00', '2016-02-22 18:27:05', '2016-02-22 18:27:05', 'active'),
(15, 5, 'ravi.lukka13@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'ravi.lukka13@gmail.com', 'Ravi Lukka', '', '', 'https://lh3.googleusercontent.com/-hGQ5UxIXs38/AAAAAAAAAAI/AAAAAAAADtI/ktM0R6X5QoI/photo.jpg', 0, '', '', 0, 0, 'APA91bG07P-ZXIfuPYDHmLPbRiIhD3J0W7p7uivocZDBH22H1M', 'gplus', 4, NULL, '0000-00-00 00:00:00', '2016-02-24 19:23:10', '2016-02-24 19:23:10', 'active'),
(16, 5, 'tester@c-metric.com', '3f96b3588dc5ae8e639722d1e25069da', 'tester@c-metric.com', 'test', '', '', '', 0, '', '380008', 0, 0, '', 'reseeit', 4, NULL, '0000-00-00 00:00:00', '2016-02-25 11:11:38', '2016-02-25 11:11:38', 'active'),
(17, 5, 'nt@test.cim', 'c71caf8bacbdd510e0091a8e2213b5bc', 'nt@test.cim', 'nt', '', '', '', 0, '', '38009', 0, 0, '', 'reseeit', 4, NULL, '0000-00-00 00:00:00', '2016-02-25 11:36:16', '2016-02-25 11:36:16', 'active'),
(18, 5, 'abc@test.com', '3f96b3588dc5ae8e639722d1e25069da', 'abc@test.com', 'abc', '', '', '', 0, '', '38008', 0, 0, '', 'reseeit', 4, NULL, '0000-00-00 00:00:00', '2016-02-25 11:50:22', '2016-02-25 11:50:22', 'active'),
(19, 5, 'tester@test.com', '3f96b3588dc5ae8e639722d1e25069da', 'tester@test.com', 'tester', '', '', '', 0, '', '380009', 0, 0, '', 'reseeit', 4, NULL, '0000-00-00 00:00:00', '2016-02-25 14:06:31', '2016-02-25 14:06:31', 'active'),
(20, 5, 'ravi.lukka@gmail.com', 'de0b9b364558558d25c48e21f70f83bc', 'ravi.lukka@gmail.com', 'Ravi', '', '', '', 0, '', '380015', 0, 0, '', 'reseeit', 4, NULL, '0000-00-00 00:00:00', '2016-02-25 14:19:03', '2016-02-25 14:19:03', 'active'),
(21, 5, 'nimesh@test.com', '3f96b3588dc5ae8e639722d1e25069da', 'nimesh@test.com', 'n', '', '', '', 0, '', '38009', 0, 0, '', 'reseeit', 4, NULL, '0000-00-00 00:00:00', '2016-02-25 14:31:24', '2016-02-25 14:31:24', 'active'),
(22, 5, 'nt@test.com', '3f96b3588dc5ae8e639722d1e25069da', 'nt@test.com', 'nth', '', '', '', 0, '', '380009', 0, 0, '', 'reseeit', 4, NULL, '0000-00-00 00:00:00', '2016-02-25 14:33:39', '2016-02-25 14:33:39', 'active'),
(23, 5, 'jinesh@c-metric.com', 'a1a63014ee7f09983b1e86819134a036', 'jinesh@c-metric.com', 'Jinesh Dalal', '', '', '', 0, '', '380015', 0, 0, '', 'reseeit', 4, NULL, '0000-00-00 00:00:00', '2016-02-25 14:34:23', '2016-02-25 14:34:23', 'active'),
(24, 5, 'aleandre@vyalex.com', '21232f297a57a5a743894a0e4a801fc3', 'aleandre@vyalex.com', 'Alland Leandre', '', '', 'https://graph.facebook.com/10153160265351889/picture?type=large&return_ssl_resources=1', 0, '', '', 0, 0, 'db471d45df396162d506503cb4e276e529e71c0c923c390af9', 'fb', 4, NULL, '0000-00-00 00:00:00', '2016-02-26 22:56:07', '2016-02-26 22:56:07', 'active'),
(25, 5, 'swong05@syr.edu', '21232f297a57a5a743894a0e4a801fc3', 'swong05@syr.edu', 'Sara Wong', '', '', 'https://graph.facebook.com/10208816683198940/picture?type=large&return_ssl_resources=1', 0, '', '', 0, 0, '29860e3f360461584f3f1451d21280a10bd27bad24aa5d471e', 'fb', 4, NULL, '0000-00-00 00:00:00', '2016-02-29 09:17:44', '2016-02-29 09:17:44', 'active'),
(26, 1, 'ravi.lukka1@c-metric.com', '0192023a7bbd73250516f069df18b500', 'ravi.lukka1@c-metric.com', 'Ravi lukka', 'Ravi', 'Lukka', '', 0, '', '123456', 123457891, 0, '', 'reseeit', 2, NULL, '0000-00-00 00:00:00', '2016-04-14 16:00:32', '0000-00-00 00:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `rst_users_devicetoken`
--

CREATE TABLE IF NOT EXISTS `rst_users_devicetoken` (
  `ud_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_deviceid` text NOT NULL,
  `device_type` enum('ios','android') NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ud_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `rst_users_devicetoken`
--

INSERT INTO `rst_users_devicetoken` (`ud_id`, `user_id`, `user_deviceid`, `device_type`, `created`) VALUES
(1, 3, 'adad', 'ios', '2016-02-22 18:27:05'),
(3, 6, 'APA91bEht3iJCZhGUc7tfu80f21QnhBmgbLPieb7aDmUnn8bRMpEBn4A5ZvcFQW3MkbSfLcTJznCVqBR2MCluK3huEnkAZVWUpR8KBkOsEv_U0J4AC7aiVk', 'android', '2016-02-23 10:31:00'),
(4, 7, 'APA91bEht3iJCZhGUc7tfu80f21QnhBmgbLPieb7aDmUnn8bRMpEBn4A5ZvcFQW3MkbSfLcTJznCVqBR2MCluK3huEnkAZVWUpR8KBkOsEv_U0J4AC7aiVk', 'android', '2016-02-23 10:58:20'),
(6, 9, 'APA91bEht3iJCZhGUc7tfu80f21QnhBmgbLPieb7aDmUnn8bRMpEBn4A5ZvcFQW3MkbSfLcTJznCVqBR2MCluK3huEnkAZVWUpR8KBkOsEv_U0J4AC7aiVk', 'android', '2016-02-24 14:28:55'),
(7, 10, 'APA91bHsVWKqkVNVJLlxVY_WiFbYg55lFBmdOVQ1nDn7G7PVm6ZbuM_1TuMZ29yoCWnrp3dBAY9g2vqEghJbn-S6iyj9B2qMMRFlHhB2miYYTz9eE13rJOQ', 'android', '2016-02-24 16:34:59'),
(8, 11, 'APA91bHsVWKqkVNVJLlxVY_WiFbYg55lFBmdOVQ1nDn7G7PVm6ZbuM_1TuMZ29yoCWnrp3dBAY9g2vqEghJbn-S6iyj9B2qMMRFlHhB2miYYTz9eE13rJOQ', 'android', '2016-02-24 16:50:15'),
(9, 12, 'APA91bHsVWKqkVNVJLlxVY_WiFbYg55lFBmdOVQ1nDn7G7PVm6ZbuM_1TuMZ29yoCWnrp3dBAY9g2vqEghJbn-S6iyj9B2qMMRFlHhB2miYYTz9eE13rJOQ', 'android', '2016-02-24 16:55:49'),
(12, 15, 'APA91bG07P-ZXIfuPYDHmLPbRiIhD3J0W7p7uivocZDBH22H1MvXc9wo9Ejs5pVpWRTaWbBWT12ukOfMStuBHQEtaBWhF65j0J5z2E13tSqqcLBjZhPrCkc', 'android', '2016-02-24 19:23:10'),
(13, 16, 'APA91bHdICfDQXX4DirsHIrupXbwhpkTt3Snl5xco75qWaDDkn2BHg162n4DH5AwqkMn50dl_0csOe8lvTU14L6ThMTQ9gGv0csZn981vCZacqLizrDs6d0', 'android', '2016-02-25 11:11:38'),
(14, 17, 'APA91bHdICfDQXX4DirsHIrupXbwhpkTt3Snl5xco75qWaDDkn2BHg162n4DH5AwqkMn50dl_0csOe8lvTU14L6ThMTQ9gGv0csZn981vCZacqLizrDs6d0', 'android', '2016-02-25 11:36:16'),
(15, 18, 'APA91bHdICfDQXX4DirsHIrupXbwhpkTt3Snl5xco75qWaDDkn2BHg162n4DH5AwqkMn50dl_0csOe8lvTU14L6ThMTQ9gGv0csZn981vCZacqLizrDs6d0', 'android', '2016-02-25 11:50:22'),
(16, 19, 'APA91bEx6J_VIvvNugZFy3MJJIsT5wr2vXYFrorDpiedfmM2m1rxf5LDqCITkOv7X50j8LbG2l1Q4e7wj94L9qVT7HMpNa3UvelvuD6vgBcyTK_jKVqDj98', 'android', '2016-02-25 14:06:31'),
(17, 15, 'APA91bEcH3VMIl_lWxuvpnAZmKGpEijjufzRkRb8g-vhj2-xQD21Ev8RhdGVNw-oKpo1Du5QeXiFtyEkE0d7pdJ76HUoykBRAcbMCWty_bThI1vBm1yqDYY', 'android', '2016-02-25 14:17:32'),
(18, 20, 'APA91bGjqFbAPzHIgzWVqO-baUzFdOhy2-srZ77U2bi631__7H3rGNbl4JmDvB92FO_SYjxZCDij7u0nc2X6mVpvMVK7FkJIEaDFuesQAl3fbjXhtnPD-Mk', 'android', '2016-02-25 14:19:03'),
(19, 21, 'APA91bEh7hClPrQ5jEWsZ6Ngb8PD3lsqCwN8NG_0LVw2FOky04Bj-PYkXQLxKdjmasXJejZZQBzxMHk288ky4W8XakvhNvNTQvvK8kCXE7LeVNF-AyVgXs0', 'android', '2016-02-25 14:31:24'),
(20, 22, 'APA91bHU5y34jpYTCxzTOSXsC9K0KsFQiNnrdowVm_ndhmulwApPqABD3zPuguwxP0hb8fh6LEO5JYwbSSv9HGfun8KJTZ3co3mu8qbL5OV0IwQAXOqoJzo', 'android', '2016-02-25 14:33:39'),
(21, 23, 'APA91bH8kHLSdoC-XgD3K-gnqAJ2WtlcfYv6JyC1-jCiT5xV-UnFVqenvCwc697IRmNxIJqeh2MIoR-xcXgzdh8DqkXCVcaY8Q2pw867RYUNhWnGmZoDoLc', 'android', '2016-02-25 14:34:23'),
(22, 24, 'db471d45df396162d506503cb4e276e529e71c0c923c390af9baa4c2bb0aef9e', 'ios', '2016-02-26 22:56:07'),
(23, 25, '29860e3f360461584f3f1451d21280a10bd27bad24aa5d471ee6fb08665f06c3', 'ios', '2016-02-29 09:17:44'),
(24, 15, 'APA91bEfKU1yWMfz8OZiNH-4wnGUuKZrFUv_n7DUHWimbRuSOQmanonLgRe_hGbjSblffpGv8s_o60Cc1pYf4mvo22f5geV_KcnfsojLxdgzGy5Sg_uBXIQ', 'android', '2016-04-14 15:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `rst_user_coupon_reward`
--

CREATE TABLE IF NOT EXISTS `rst_user_coupon_reward` (
  `user_coupon_reward_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`user_coupon_reward_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `rst_user_coupon_reward`
--

INSERT INTO `rst_user_coupon_reward` (`user_coupon_reward_id`, `user_id`, `coupon_id`, `point`, `added_date`) VALUES
(1, 6, 1, 10, '2016-02-23 10:31:14'),
(8, 17, 1, 10, '2016-02-25 11:39:32'),
(7, 16, 1, 10, '2016-02-25 11:12:07'),
(4, 10, 1, 10, '2016-02-24 16:36:34'),
(5, 11, 1, 10, '2016-02-24 16:53:28'),
(6, 12, 1, 10, '2016-02-24 16:56:05'),
(9, 18, 1, 10, '2016-02-25 12:08:56'),
(10, 22, 1, 10, '2016-02-25 14:34:01'),
(11, 15, 1, 10, '2016-04-14 15:27:24');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rst_users`
--
ALTER TABLE `rst_users`
  ADD CONSTRAINT `rst_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `rst_roles` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
