-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2013 at 03:26 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `techno_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `script` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sector` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `presentcost` decimal(10,2) NOT NULL,
  `startcost` decimal(10,2) NOT NULL,
  `difference` decimal(10,2) NOT NULL,
  `percentage` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`script`, `name`, `sector`, `quantity`, `presentcost`, `startcost`, `difference`, `percentage`) VALUES
('500010', 'Housing Development Finance Corporation', 'Consumer Finance', 149986, '66.00', '66.00', '0.00', '0.00'),
('500087', 'Cipla', 'Pharmaceuticals', 25010, '43.07', '43.07', '0.00', '0.00'),
('500103', 'Bharat Heavy Electricals', 'Electrical Equipment', 50000, '30.00', '30.00', '0.00', '0.00'),
('500112', 'State Bank Of India', 'Banking', 8000, '165.00', '165.00', '0.00', '0.00'),
('500180', 'HDFC Bank', 'Banking', 12000, '81.00', '81.00', '0.00', '0.00'),
('500182', 'Hero MotoCorp', 'Automotive', 5000, '208.00', '208.00', '0.00', '0.00'),
('500209', 'Infosys', 'Information Technology', 3000, '327.00', '327.00', '0.00', '0.00'),
('500312', 'ONGC', 'Oil and Gas', 40000, '27.00', '27.00', '0.00', '0.00'),
('500325', 'Reliance Industries', 'Oil and Gas', 12000, '86.00', '86.00', '0.00', '0.00'),
('500400', 'Tata Power', 'Power', 60000, '25.00', '25.00', '0.00', '0.00'),
('500440', 'Hindalco Industries', 'Metals and Mining', 50000, '20.00', '20.00', '0.00', '0.00'),
('500470', 'Tata Steel', 'Steel', 25000, '30.00', '30.00', '0.00', '0.00'),
('500510', 'L & T', 'Conglomerate', 10000, '88.00', '88.00', '0.00', '0.00'),
('500520', 'Mahindra & Mahindra', 'Automotive', 39989, '102.00', '102.00', '0.00', '0.00'),
('500570', 'Tata Motors', 'Automotive', 30000, '38.00', '38.00', '0.00', '0.00'),
('500696', 'Hindustan Unilever', 'Consumer goods', 20000, '70.00', '70.00', '0.00', '0.00'),
('500875', 'ITC', 'Conglomerate', 25000, '34.00', '34.00', '0.00', '0.00'),
('500900', 'Sterlite Industriess', 'Metals and Mining', 22000, '69.00', '69.00', '0.00', '0.00'),
('507685', 'Wipro', 'Information Technology', 19996, '49.00', '49.00', '0.00', '0.00'),
('524715', 'Sun Pharma', 'Pharmaceuticals', 20000, '63.00', '63.00', '0.00', '0.00'),
('532155', 'GAIL', 'Oil and Gas', 25000, '34.00', '34.00', '0.00', '0.00'),
('532174', 'ICICI', 'Banking', 10000, '100.00', '100.00', '0.00', '0.00'),
('532286', 'Jindal Steel and Power', 'Steel and Power', 5000, '225.00', '225.00', '0.00', '0.00'),
('532454', 'Bharti Airtel', 'Telecommunication', 40000, '33.00', '33.00', '0.00', '0.00'),
('532500', 'Maruiti Suzuki', 'Automotive', 8000, '146.00', '146.00', '0.00', '0.00'),
('532540', 'TCS', 'Information Technology', 5000, '212.00', '212.00', '0.00', '0.00'),
('532555', 'NTPC', 'Power', 50000, '47.00', '47.00', '0.00', '0.00'),
('532868', 'DLF', 'Real Estate', 1500, '50.00', '50.00', '0.00', '0.00'),
('532977', 'Bajaj Auto', 'Automotive', 5000, '214.00', '214.00', '0.00', '0.00'),
('533278', 'Coal India', 'Metals and Mining', 40000, '28.00', '28.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `newsab`
--

CREATE TABLE IF NOT EXISTS `newsab` (
  `news` int(11) NOT NULL,
  `Automotive` int(11) NOT NULL,
  `Telecommunication` int(11) NOT NULL,
  `Electrical` int(11) NOT NULL,
  `Pharma` int(11) NOT NULL,
  `Information` int(11) NOT NULL,
  `Metals` int(11) NOT NULL,
  `Oil` int(11) NOT NULL,
  `banking` int(11) NOT NULL,
  `consumer` int(11) NOT NULL,
  `Conglomerate` int(11) NOT NULL,
  `power` int(11) NOT NULL,
  `steel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsab`
--

INSERT INTO `newsab` (`news`, `Automotive`, `Telecommunication`, `Electrical`, `Pharma`, `Information`, `Metals`, `Oil`, `banking`, `consumer`, `Conglomerate`, `power`, `steel`) VALUES
(0, 3, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1);

--
-- Triggers `newsab`
--
DROP TRIGGER IF EXISTS `afternews`;
DELIMITER //
CREATE TRIGGER `afternews` AFTER DELETE ON `newsab`
 FOR EACH ROW begin
update company set presentcost=presentcost+(presentcost*(old.automotive*rand()/100)) where sector like '%automotive%';
update company set presentcost=presentcost+(presentcost*(old.telecommunication*rand()/100)) where sector like '%tele%';
update company set presentcost=presentcost+(presentcost*(old.electrical*rand()/100)) where sector like '%elec%';
update company set presentcost=presentcost+(presentcost*(old.pharma*rand()/100)) where sector like '%pharma%';
update company set presentcost=presentcost+(presentcost*(old.information*rand()/100)) where sector like '%information%';
update company set presentcost=presentcost+(presentcost*(old.metals*rand()/100)) where sector like '%metal%';
update company set presentcost=presentcost+(presentcost*(old.oil*rand()/100)) where sector like '%oil%';
update company set presentcost=presentcost+(presentcost*(old.banking*rand()/100)) where sector like '%banking%';
update company set presentcost=presentcost+(presentcost*(old.consumer*rand()/100)) where sector like '%consumer%';
update company set presentcost=presentcost+(presentcost*(old.conglomerate*rand()/100)) where sector like '%cong%';
update company set presentcost=presentcost+(presentcost*(old.power*rand()/100)) where sector like '%power%';
update company set presentcost=presentcost+(presentcost*(old.steel*rand()/100)) where sector like '%steel%';
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `script` varchar(40) NOT NULL,
  `amnt` decimal(10,2) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--


-- --------------------------------------------------------

--
-- Table structure for table `ubal`
--

CREATE TABLE IF NOT EXISTS `ubal` (
  `userid` int(11) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ubal`
--

INSERT INTO `ubal` (`userid`, `balance`) VALUES
(1, '9374.00'),
(2, '9951.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` bigint(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `college` varchar(30) NOT NULL,
  `course` varchar(10) NOT NULL,
  `mobileno` bigint(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `gender` char(1) NOT NULL,
  `random` bigint(6) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `name`, `email`, `password`, `college`, `course`, `mobileno`, `city`, `verified`, `gender`, `random`) VALUES
(1, 'sunnynandwani1', 'Sunny', 'sunnynandwani1993@gmail.com', 'sunnynandwani', 'VJTI', 'TYBTECH IT', 9699952800, 'Ulhasnagar', 0, 'M', 0),
(2, 'Rahul1', 'Rahul', 'rahul1211', 'rahullachhani', 'VJTI', 'SYBTECH CO', 93898393829, 'Ulhasnagar', 0, 'M', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usershare`
--

CREATE TABLE IF NOT EXISTS `usershare` (
  `userid` int(11) NOT NULL,
  `script` varchar(40) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usershare`
--

INSERT INTO `usershare` (`userid`, `script`, `qty`, `cost`, `time`) VALUES
(1, '500010', 1, '66.00', '2013-12-17 15:21:45'),
(2, '507685', 1, '49.00', '2013-12-17 15:07:55'),
(1, '507685', 1, '49.00', '2013-12-17 15:06:33'),
(1, '500010', 1, '66.00', '2013-12-17 15:21:55'),
(1, '500087', 5, '43.00', '2013-12-17 15:28:13'),
(1, '500087', 5, '43.00', '2013-12-17 15:30:06'),
(1, '500087', 5, '43.00', '2013-12-17 15:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `usershare1`
--

CREATE TABLE IF NOT EXISTS `usershare1` (
  `userid` int(11) NOT NULL,
  `script` varchar(40) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usershare1`
--

INSERT INTO `usershare1` (`userid`, `script`, `qty`) VALUES
(2, '507685', 1),
(1, '507685', 1),
(1, '500010', 2),
(1, '500087', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
