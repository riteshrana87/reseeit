-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2015 at 09:49 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `rst_admin_users`
--

INSERT INTO `rst_admin_users` (`admin_id`, `admin_type`, `name`, `email`, `password`, `address`, `image`, `created_date`, `status`) VALUES
(1, 1, 'Administrator', 'admin@hotmail.com', '4297f44b13955235245b2497399d7a93', '', '', '2015-10-20 00:00:00', 1),
(3, 2, 'Niral Patel', 'niral.patel@c-metric.com', '4297f44b13955235245b2497399d7a93', 'saasf', '8fec94f-user4-128x128.jpg', '2015-10-26 00:00:00', 1),
(10, 2, 'UhRCtn', 'zut@sobes.net', '4297f44b13955235245b2497399d7a93', '34 df', 'df4684f-user2-160x160.jpg', '2015-10-27 07:13:16', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rst_cms_master`
--

INSERT INTO `rst_cms_master` (`cms_id`, `page_name`, `slug`, `content`, `created_date`, `status`) VALUES
(1, 'Technology', 'technology', '<!-- Section 1 -->\n                <div class = "row section-basic section-type1">\n                    <div class = "col-sm-5 col-lg-4 col-lg-offset-1 clearfix">\n                        <img class = "section-image-left"  style="margin-top: 10px;" src="http://localhost/reseeit/images/technology1.jpg">\n                    </div>\n                    <div class = "col-sm-7 col-lg-6 text-left">\n                        <h2 class="text-quote"  style="margin-top: 10px;">A picture is worth a million bytes.</h2>\n                        <p>This is even more true today, especially in the smartphone era, because pictures come packaged with additional data.</p>\n                        <p>Noviah''s <strong>patented technology</strong> analyzes images and data that users send using Vidusi (Noviah''s smartphone app), and <strong>connects</strong> them with relevant information <strong>instantaneously</strong>.</p>                                \n                    </div>\n                </div><!-- Section 1 -->\n<!-- Section 2 -->\n                <div class = "row section-basic section-type2">\n                    <div class = "col-sm-6 col-md-4 col-lg-4 col-lg-offset-1">\n                        <h1 class = "text-left text-quote margin-top-zero">Our platform is designed with you, the client, in mind.</h1>\n                    </div>\n                    <div class = "col-sm-6 col-md-8 col-lg-6">\n                            <h3 class = "col-sm-5 col-md-6  col-sm-offset-1 col-md-offset-0 margin-top-zero"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;Easy to Use</h3>\n                            <h3 class = "col-sm-6 col-md-6 margin-top-zero"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> &nbsp;Easy to Deploy</h3>\n                            <h3 class = "col-sm-11 col-sm-offset-1 col-md-12 col-md-offset-0 margin-top-zero"><span class="glyphicon glyphicon-resize-full" aria-hidden="true"></span> &nbsp;Easy to Scale</h3>\n                    </div>\n<!-- The Columns -->\n                    <div class = "col-sm-12 col-md-12 col-lg-10 col-lg-offset-1 sub-section-box sub-section-border">\n                        <p class = "text-left">The platform has three key modules:<p>\n<!-- Column 1 -->\n                        <div class = "col-sm-4 text-left">\n                            <h2 class = "margin-top-zero"><span class="col-sm-12 label label-default column-header-tech">Client Interface</span></h2>\n                            <p>A simple to use and intuitive set of web-enabled tools for you to:</p>\n                            <ul>\n                                <li>Segment your audience, setup interactions and implement your messaging strategy</li>\n                                <li>Analyze results in real-time, refine your message or strategy</li>\n                                <li>Quickly turnaround and implement the refined strategy</li>\n                            </ul>\n                            <p>You can do it all from the Client Interface.  It is specifically designed with your needs in mind.</p>\n                        </div> <!-- Column 1 -->\n<!-- Column 2 -->       <div class = "col-sm-4 text-left">\n                            <h2 class = "margin-top-zero"><span class="col-sm-12 label label-default column-header-tech">Smartphone App</span></h2>\n                            <img class = "vidusi-logo" src="http://localhost/reseeit/images/VidusiLogo_blue.png">\n                            <p>Vidusi, Noviah''s smartphone app, is your audiences'' portal for interaction.</p>\n                            <p>To interact with your ad, users follow two simple steps:</p>\n                            <ol>\n                                <li>Launch Vidusi</li>\n                                <li>Point smartphone''s camera at your ad</li>\n                            </ol>\n                            <p>That''s it. &nbsp;Vidusi takes care of the rest. &nbsp;Next, your response is displayed to user.</p>\n                            <p>Vidusi is available for both Android and iOS platforms.</p>\n                        </div>  <!-- Column 2 -->\n<!-- Column 3 -->\n                        <div class = "col-sm-4 text-left">\n                            <h2 class = "margin-top-zero"><span class="col-sm-12 label label-default column-header-tech">Connection Engine</span></h2>\n                            <p>Noviah''s <b>patented technology</b> is at the core of this engine, the heart of our platform.</p>\n                            <p>It''s sole purpose: connect your audience with the most relevant information.</p>\n                            <p>This module analyzes data sent by users'' smartphone, and using the latest methodologies in data science, identifies the most relevant response and sends it to user.</p>\n                        </div> <!-- Column 3 -->\n                    </div> <!-- The Columns -->\n                </div> <!-- Section 2 -->\n<!-- Section 3 -->\n                <div class = "row section-basic section-type1">\n                    <div class = "col-sm-12 col-lg-10 col-lg-offset-1">\n                        <p class = "text-left">Noviah''s technology can be used with a range of media formats. &nbsp;For sample use cases check out the <a href="applicationsNew.html" style = "color: inherit;"><strong>Applications</strong></a> page. &nbsp;We promise it will be revealing.</p>\n                        <p class = "text-left">Do you have questions? &nbsp;Our hunch is that you definitely do. &nbsp;<a href="contactUsNew.html" style = "color: inherit;"><strong>Contact us.</strong></a> &nbsp;We''ll be more than happy to answer your questions and even give you a demo - <span class = "text-quote" style = "font-size: 1.4em;">a picture is worth a thousand words.</span> &nbsp;Wouldn''t you agree?</p>\n                    </div>\n                </div> <!-- Section 3 -->', '2015-10-29 10:52:47', 1),
(2, 'About US', 'aboutus', '<div class="row section-basic section-type1" style="padding-bottom: 0px;">\r\n<div class="col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 text-left">\r\n<h3 style="margin-top: 0px;"><strong><a href="../../../images/NoviahLogo.png">http://localhost/reseeit/images/NoviahLogo.png</a>Our Vision: &nbsp;</strong><span class="text-quote">A connected world where every interaction is valued.</span></h3>\r\n<h3 style="display: inline;"><strong>Our Mission: &nbsp;</strong></h3>\r\n<p style="display: inline;">To be the best at connecting people with information, because we believe that every connection matters. But, that''s only the first part of our mission. Achieving success hinges on the four others below:</p>\r\n<ul style="margin-left: 10px;">\r\n<li>To be our clients'' most valuable partners.</li>\r\n<li>To be our investors'' best asset.</li>\r\n<li>To be our employees'' best investment of their talent and time.</li>\r\n<li>To be a model citizen in the locales we do business.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="row section-basic section-type2">\r\n<div class="col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 text-left">\r\n<h3 class="margin-top-zero" style="display: inline;"><strong>Our Story: &nbsp;</strong></h3>\r\n<p style="display: inline;">Can the chasm between the online and offline worlds be closed? &nbsp;Can the boundary between the two be made seamless?</p>\r\n<p>These questions intrigued us, two friends, one an avid techie with a strong background in computer programming and image processing, and the other a technology entrepreneur and a veteran. &nbsp;We developed a concept to solve the challenge, and very quickly realized the market potential of the technology, its many applications and benefits to consumers. &nbsp;Thus was born Noviah Technology Corp.</p>\r\n</div>\r\n</div>\r\n<div class="row section-basic section-type1">\r\n<div class="col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 text-left">\r\n<p>We have since tested the concept, deployed a minimum viable version of the solution, and also received a patent for our technology. &nbsp;And, in 2014 we signed-up our first client - a Minor League Baseball team.</p>\r\n<p>Our hard won laurels spur us on. &nbsp;We have our eyes are on the road ahead, but with a sharp focus on providing value to all our stakeholders.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>', '2015-10-29 12:16:48', 1),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rst_company_location`
--

CREATE TABLE IF NOT EXISTS `rst_company_location` (
  `com_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `long` varchar(50) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  PRIMARY KEY (`com_location_id`),
  KEY `com_id` (`com_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rst_coupon`
--

CREATE TABLE IF NOT EXISTS `rst_coupon` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_img` varchar(50) NOT NULL,
  `coupon_featured` enum('yes','no') NOT NULL DEFAULT 'no',
  `com_location_id` int(11) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  PRIMARY KEY (`coupon_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rst_product`
--

INSERT INTO `rst_product` (`pro_id`, `user_id`, `eid`, `pro_name`, `pro_point`, `pro_address`, `pro_state`, `pro_country`, `pro_zipcode`, `pro_lat`, `pro_long`, `pro_added_date`, `pro_status`) VALUES
(1, 1, 1, 'First Product', 0, 'TEst Product address', 'Ahmedabad', 'IN', '380051', '312131', '32123121', '2015-10-15 06:12:06', 'active');

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
  PRIMARY KEY (`eid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rst_product_event`
--

INSERT INTO `rst_product_event` (`eid`, `ename`, `eaddress`, `eadded_date`, `estatus`) VALUES
(1, 'Product Test', 'test address', '2015-10-15 09:09:08', 'active');

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
  `status` enum('offer_received','offer_not_received') NOT NULL DEFAULT 'offer_not_received',
  PRIMARY KEY (`receipt_id`),
  KEY `user_id` (`user_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rst_receipt_image`
--

INSERT INTO `rst_receipt_image` (`receipt_id`, `user_id`, `pro_id`, `img_text`, `receipt_img`, `receipt_point`, `added_date`, `modified_date`, `status`) VALUES
(1, 13, 1, 'ReSeet+Lorem+Ipsum', '4151.jpg', 0, '2015-10-15 15:53:52', '2015-10-15 15:53:52', 'offer_not_received'),
(2, 13, 1, 'ReSeet+Lorem+Ipsum', '20998.jpg', 0, '2015-10-14 13:05:59', '2015-10-14 13:05:59', 'offer_not_received'),
(3, 13, 1, 'All+the+info', '28871.jpg', 0, '2015-10-20 13:06:42', '2015-10-20 13:06:42', 'offer_not_received'),
(4, 13, 1, 'some+support', '22260.jpg', 0, '2015-10-20 13:06:56', '2015-10-20 13:06:56', 'offer_not_received');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rst_roles`
--

INSERT INTO `rst_roles` (`role_id`, `role_name`, `role_level`, `permissions`) VALUES
(1, 'super_admin', 1, ''),
(2, 'company_admin', 2, ''),
(3, 'company_location_admin', 3, ''),
(4, 'consumers', 4, '');

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
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_img` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_point` int(100) NOT NULL,
  `zipcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `device_token` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `register_type` enum('fb','gplus','reseeit') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'reseeit',
  `new_password_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_password_requested` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activated` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `rst_users`
--

INSERT INTO `rst_users` (`user_id`, `role_id`, `username`, `password`, `email`, `fullname`, `user_img`, `total_point`, `zipcode`, `device_token`, `register_type`, `new_password_key`, `new_password_requested`, `created`, `modified_date`, `activated`) VALUES
(1, 1, 'noviah_admin', '21232f297a57a5a743894a0e4a801fc3', 'rupesh.jorkar@c-metric.com', 'Noviah', NULL, 0, '380051', '', 'reseeit', NULL, '0000-00-00 00:00:00', '2015-10-05 02:06:00', '2015-10-05 02:06:00', 'active'),
(13, 4, 'rupesh4.jorkar@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'rupesh4.jorkar@c-metric.com', 'RJ', '14130.jpg', 0, '380051', 's$w23sdfdsasadfsfwe324234', 'reseeit', '8572', '2015-10-16 13:24:51', '2015-10-12 11:09:09', '2015-10-12 11:09:09', 'active'),
(14, 4, 'rupesh2.jorkar@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'rupesh2.jorkar@c-metric.com', 'RJ', NULL, 0, '380051', '', 'reseeit', NULL, '0000-00-00 00:00:00', '2015-10-12 11:47:27', '2015-10-12 11:47:27', 'active'),
(15, 4, 'rupesh22.jorkar@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'rupesh22.jorkar@c-metric.com', 'RJ', NULL, 0, '380051', '', 'reseeit', NULL, '0000-00-00 00:00:00', '2015-10-12 11:47:38', '2015-10-12 11:47:38', 'active'),
(16, 4, 'rupesh3.jorkar@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'rupesh3.jorkar@c-metric.com', 'RJ', NULL, 0, '380051', '', 'reseeit', NULL, '0000-00-00 00:00:00', '2015-10-12 12:14:36', '2015-10-12 12:14:36', 'active'),
(17, 4, 'rupesh42.jorkar@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'rupesh42.jorkar@c-metric.com', 'RJ', NULL, 0, '380051', '', 'reseeit', NULL, '0000-00-00 00:00:00', '2015-10-12 12:15:59', '2015-10-12 12:15:59', 'active'),
(18, 4, 'rupesh412.jorkar@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'rupesh412.jorkar@c-metric.com', 'RJ', NULL, 0, '380051', '', 'reseeit', NULL, '0000-00-00 00:00:00', '2015-10-12 12:16:25', '2015-10-12 12:16:25', 'active'),
(19, 4, 'rupesh4122.jorkar@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'rupesh4122.jorkar@c-metric.com', 'RJ', NULL, 0, '380051', '', 'reseeit', NULL, '0000-00-00 00:00:00', '2015-10-12 12:18:10', '2015-10-12 12:18:10', 'active'),
(20, 4, 'rupeshad3.jorkar@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'rupeshad3.jorkar@c-metric.com', NULL, NULL, 0, '', 'sdfdsasadfsfwe324234s', 'fb', NULL, '0000-00-00 00:00:00', '2015-10-12 12:33:23', '2015-10-12 12:33:23', ''),
(21, 4, 'rupeshadd3.jorkar@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'rupeshadd3.jorkar@c-metric.com', NULL, NULL, 0, '', 'sdfdsasadfsfwe324234s', 'fb', NULL, '0000-00-00 00:00:00', '2015-10-12 12:33:38', '2015-10-12 12:33:38', ''),
(22, 4, 'rupeshadd33.jorkar@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'rupeshadd33.jorkar@c-metric.com', NULL, NULL, 0, '', 'sdfdsasadfsfwe324234s', 'fb', NULL, '0000-00-00 00:00:00', '2015-10-12 12:34:17', '2015-10-12 12:34:17', ''),
(23, 4, 'rupesh10.jorkar@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'rupesh10.jorkar@c-metric.com', NULL, NULL, 0, '', 'sdfdsa324sadfsfwe324234', 'fb', NULL, '0000-00-00 00:00:00', '2015-10-21 11:23:30', '2015-10-21 11:23:30', ''),
(24, 4, 'nirj@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'nirj@c-metric.com', NULL, NULL, 0, '', 'sdfdsa324sadfsfwe324234', 'fb', NULL, '0000-00-00 00:00:00', '2015-10-21 11:28:00', '2015-10-21 11:28:00', ''),
(25, 4, 'rupeshn.jorkar@c-metric.com', '21232f297a57a5a743894a0e4a801fc3', 'rupeshn.jorkar@c-metric.com', 'RJ', NULL, 0, '380051', '', 'reseeit', NULL, '0000-00-00 00:00:00', '2015-10-21 12:34:55', '2015-10-21 12:34:55', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `rst_users_devicetoken`
--

CREATE TABLE IF NOT EXISTS `rst_users_devicetoken` (
  `ud_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_deviceid` text NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ud_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `rst_users_devicetoken`
--

INSERT INTO `rst_users_devicetoken` (`ud_id`, `user_id`, `user_deviceid`, `created`) VALUES
(1, 1, 'sdfdsasadfsfwe324234', '2015-10-08 13:48:24'),
(2, 17, 's$w23sdfdsasadfsfwe324234', '2015-10-12 12:15:59'),
(3, 18, 's$w23sdfdsasadfsfwe324234', '2015-10-12 12:16:25'),
(4, 19, 's$w23sdfdsasadfsfwe324234', '2015-10-12 12:18:10'),
(5, 20, 'sdfdsasadfsfwe324234s', '2015-10-12 12:33:23'),
(6, 21, 'sdfdsasadfsfwe324234s', '2015-10-12 12:33:38'),
(7, 22, 'sdfdsasadfsfwe324234s', '2015-10-12 12:34:17'),
(8, 22, '324324sdfsadfd', '2015-10-12 12:35:41'),
(9, 23, 'sdfdsa324sadfsfwe324234', '2015-10-21 11:23:30'),
(10, 24, 'sdfdsa324sadfsfwe324234', '2015-10-21 11:28:00'),
(11, 13, 'sdfdsa324sadfsfwe324234', '2015-10-21 11:28:39'),
(12, 25, 'sdsf24w23sdfdsasadfsfwe324234', '2015-10-21 12:34:55');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rst_company_location`
--
ALTER TABLE `rst_company_location`
  ADD CONSTRAINT `rst_company_location_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `rst_company` (`com_id`),
  ADD CONSTRAINT `rst_company_location_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `rst_users` (`user_id`);

--
-- Constraints for table `rst_coupon`
--
ALTER TABLE `rst_coupon`
  ADD CONSTRAINT `rst_coupon_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `rst_users` (`user_id`);

--
-- Constraints for table `rst_coupon_favorite`
--
ALTER TABLE `rst_coupon_favorite`
  ADD CONSTRAINT `rst_coupon_favorite_ibfk_1` FOREIGN KEY (`coupon_id`) REFERENCES `rst_coupon` (`coupon_id`),
  ADD CONSTRAINT `rst_coupon_favorite_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `rst_users` (`user_id`);

--
-- Constraints for table `rst_product`
--
ALTER TABLE `rst_product`
  ADD CONSTRAINT `rst_product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `rst_users` (`user_id`),
  ADD CONSTRAINT `rst_product_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `rst_product_event` (`eid`);

--
-- Constraints for table `rst_receipt_image`
--
ALTER TABLE `rst_receipt_image`
  ADD CONSTRAINT `rst_receipt_image_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `rst_users` (`user_id`),
  ADD CONSTRAINT `rst_receipt_image_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `rst_product` (`pro_id`);

--
-- Constraints for table `rst_roles_permission`
--
ALTER TABLE `rst_roles_permission`
  ADD CONSTRAINT `rst_roles_permission_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `rst_roles` (`role_id`);

--
-- Constraints for table `rst_users`
--
ALTER TABLE `rst_users`
  ADD CONSTRAINT `rst_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `rst_roles` (`role_id`);

--
-- Constraints for table `rst_users_devicetoken`
--
ALTER TABLE `rst_users_devicetoken`
  ADD CONSTRAINT `rst_users_devicetoken_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `rst_users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
