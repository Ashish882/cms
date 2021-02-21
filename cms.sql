-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:1433
-- Generation Time: Dec 08, 2020 at 05:33 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(12) NOT NULL,
  `dateandtime` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passsword` varchar(50) NOT NULL,
  `aname` varchar(50) NOT NULL,
  `addedby` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `dateandtime`, `username`, `passsword`, `aname`, `addedby`, `role`) VALUES
(3, 'April-08-20-16-16-21', 'Ashish', 'ashish882@', 'Ashish Sharma', 'admin', 'admin'),
(4, 'April-09-20-21-05-12', 'admin', 'ashish882@', 'admin', 'Ashish', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `Dateandtime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `title`, `author`, `Dateandtime`) VALUES
(9, 'programmming', 'admin', 'March-12-20-21-45-20'),
(10, 'PHP', 'admin', 'March-12-20-21-45-27'),
(11, 'news', 'Ashish', 'April-09-20-21-05-48'),
(12, 'http', 'Ashish', 'April-09-20-21-05-59'),
(13, 'ashish', 'admin', 'April-17-20-22-01-34');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) NOT NULL,
  `dateandtime` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approvedby` varchar(50) NOT NULL,
  `statues` varchar(5) NOT NULL,
  `postid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `dateandtime`, `name`, `email`, `comment`, `approvedby`, `statues`, `postid`) VALUES
(1, 'April-13-20-22-08-17', 'Hi', 'TEST@DARKWEB.IN', '<b> hi guys </b>', 'admin', 'ON', 3);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(10) NOT NULL,
  `dateandtime` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `post` varchar(10000) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `dateandtime`, `title`, `cat`, `author`, `image`, `post`, `slug`) VALUES
(1, 'March-25-20-11-19-30', 'Public URL shortener website for Developers ', 'programmming', 'admin', 'best-url-shortener-sites-1020x570 (1).jpg', 'URL shortening is a technique on the World Wide Web in which a Uniform Resource Locator may be made substantially shorter and still direct to the required page. This is achieved by using a redirect which links to the web page that has a long URL.    \r\n<br>\r\n<br>\r\n\r\n\r\n                                                                                                                                                                                                                                                            ', 'public-url-shortener'),
(3, 'March-31-20-11-00-53', 'Time Conversion c++ Program In this C++ Program', 'programmming', 'admin', 'fbimage-tzconverter.png', '#include<iostream> \r\nusing namespace std; \r\n  \r\nvoid print24(string str) \r\n{ \r\n    // Get hours \r\n    int h1 = (int)str[1] - \'0\'; \r\n    int h2 = (int)str[0] - \'0\'; \r\n    int hh = (h2 * 10 + h1 % 10); \r\n  \r\n    // If time is in \"AM\" \r\n    if (str[8] == \'A\') \r\n    { \r\n        if (hh == 12) \r\n        { \r\n            cout << \"00\"; \r\n            for (int i=2; i <= 7; i++) \r\n                cout << str[i]; \r\n        } \r\n        else\r\n        { \r\n            for (int i=0; i <= 7; i++) \r\n                cout << str[i]; \r\n        } \r\n    } \r\n  \r\n    // If time is in \"PM\" \r\n    else\r\n    { \r\n        if (hh == 12) \r\n        { \r\n            cout << \"12\"; \r\n            for (int i=2; i <= 7; i++) \r\n                cout << str[i]; \r\n        } \r\n        else\r\n        { \r\n            hh = hh + 12; \r\n            cout << hh; \r\n            for (int i=2; i <= 7; i++) \r\n                cout << str[i]; \r\n        } \r\n    } \r\n} \r\n  \r\n// Driver code \r\nint main() \r\n{ \r\n   string str = \"07:05:45PM\"; \r\n   print24(str); \r\n   return 0; \r\n}                                                 ', 'time-conversion-program'),
(9, 'May-16-20-20-53-10', 'Create unlimted email account from Cpanel', 'programmming', 'Ashish', 'email account.jpg', '<h1>Script to create unlimted email account from Cpanel</h1>\r\n<br>\r\n<br>\r\n\r\nSo if you want to create a toon of the email account from  cPanel Here is the way to do so this by this script\r\n<br>\r\n<br>\r\n\r\n<b>Note:-- This Script is tested in cPanel & WHM Version 78</b>                ', 'create-unlimted-email-account-from-cpanel'),
(10, 'October-04-20-20-27-39', 'Kangaroo Problem Solving C++ HackerRank', 'programmming', 'Ashish', 'download (2).jpg', '#include<bits/stdc++.h>\r\nusing namespace std;\r\n\r\nint main(){\r\n    \r\n	    int x1,v1,x2,v2;\r\n	    cin>>x1>>v1>>x2>>v2;\r\n\r\n//It has tow possbilities If the two speed is equal that mean that two kangaroos never meet as they both are jummping with same distance also if the speed is same the demonataare will be zero which will give comipele error\r\nif(v1==v2){\r\n    \r\n      cout<<\"NO\";  \r\n\r\n}\r\n\r\n\r\n//This is the condtione implies that two kangroo should meet they will no meet eache other in condione that they cant able to catch each other as the distance coverd by one kangroo is more as compare two other this condtione will check that two kangaroo should meet at particular interval of time \r\nelse if((x1>x2 && v1>v2) || (x2>x1 && v2>v1)){\r\n    \r\n    cout<<\"NO\";  \r\n    \r\n	//This is the main condtione which will telll that on  how much jump they will meet as there is a mathmatically equatione two find that is x1 +nv1 = x2 + nv2 here n will point at which they will meet and point at which two kangroo meet should be an whole number not an deciamal number so that we will considers its reamainder is equal two 0 \r\n}else if((x2-x1)%(v2-v1)==0 ){\r\n       cout<<\"YES\";\r\n}\r\n\r\nelse{\r\n\r\ncout<<\"NO\";    \r\n    \r\n}\r\n    \r\n    return 0;\r\n    \r\n}                                ', 'rank-kangaroo-problem-solving-hacker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
