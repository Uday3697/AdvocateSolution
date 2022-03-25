-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2018 at 07:15 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3020511_courtalpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `accused_details`
--

CREATE TABLE `accused_details` (
  `accused_id` int(40) NOT NULL,
  `case_no` varchar(50) NOT NULL,
  `name` varchar(80) NOT NULL,
  `father_name` varchar(80) NOT NULL,
  `phone_no` int(30) NOT NULL,
  `address_line1` varchar(80) NOT NULL,
  `address_line2` varchar(80) NOT NULL,
  `address_line3` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accused_details`
--

INSERT INTO `accused_details` (`accused_id`, `case_no`, `name`, `father_name`, `phone_no`, `address_line1`, `address_line2`, `address_line3`) VALUES
(16, 'cxc', 'cxCC', 'xcCxc', 0, 'cCxCc', 'cCxc', '0'),
(17, 'dfdfa', 'daff', 'fdaf', 0, 'fdaf', 'faf', '0'),
(18, 'dfdfa', 'dafaf', 'faf', 0, 'fdff', 'fasdfaf', 'dfffaf'),
(21, 'fdaf', 'fdf', 'dfaf', 0, 'fdff', 'fdfaf', 'fdafdf'),
(25, 'fdaf', 'bvbvb', 'bhvbvbb', 0, 'bvbvb', 'bvbb', 'bcxbvb'),
(26, 'fdaf', 'chayan', 'gsdjgjhg', 0, 'gsgsg', 'gsg', 'gsfgsg'),
(28, 'fdaf', 'fdf', 'fff', 0, 'fff', 'fff', 'ffff'),
(29, 'fdaf', 'qq', 'q', 0, 'qq', 'q', 'q'),
(30, 'vzvcv', 'vzvzv', 'vvzvz', 0, 'zvv', 'vzzv', 'zvvzv'),
(31, 'ggg', 'gg', 'gggg', 0, 'ggg', 'gg', 'ggg'),
(32, 'in123', 'dkfjdjfij', 'djkdjfk', 0, 'r', 'r', 'r'),
(33, '1456', 'ftr', 'j', 0, 'rjkl', 'fghjkl', 'rthjkl'),
(34, '1456', 'ijolj', 'kjhkjh', 0, 'jhhj', 'kjj', 'jj'),
(35, 'fhg', 'kjhkjh', 'kjh', 0, 'hkj', 'hkjh', 'kjkkjhk'),
(36, 'fhg', ';ljkjhj', 'hkjh', 0, 'hkj', 'hkjh', 'kj'),
(37, 'ggg', 'asuf', 'lafjlk', 0, 'jlfkjlkj', 'lkjlfkjl', 'lkjfljaklf'),
(38, 'ggg', 'asuf', 'lafjlk', 0, 'jlfkjlkj', 'lkjlfkjl', 'lkjfljaklf'),
(39, 'ggg', 'tgqga', 'gggg', 0, 'fggsfdg', 'gsgg', 'gsggsdfs'),
(42, 'JH/HC/34567', 'Jojo', 'Dhirubhai bhai ambani', 445545454, 'Lepo road', 'Near Lakshmi Cinema', 'HAZARIBAGH'),
(44, 'JH/HC/34567', 'Chinni chang', 'Jhandu ram', 1234567890, 'Beko', 'Bagodar', 'Giridih'),
(45, '4521', 'hari', 'jeevan', 0, 'Lepo road', 'Near Lakshmi Cinema', 'HAZARIBAGH'),
(46, '4521', 'gaurav', 'hkjbjnjb', 0, 'xtcfvygbhnjmk,l', 'tghjk', 'tfghjkl;'),
(47, '4521', 'hghhgbb', 'fhhgghh', 78545525, 'gytfdg', 'liuygjkj', 'kjhguijkl'),
(48, '8596', 'uyhyy', 'iikkiikkk', 0, 'Lepo road', 'Near Lakshmi Cinema', 'HAZARIBAGH'),
(49, 'vvvv', 'vvv', 'vvv', 0, 'vvv', 'vvv', 'vvv'),
(50, '458585', 'huyhh', 'kikikk', 0, 'ghghhhhkkkk', 'Near Lakshmi Cinema', 'HAZARIBAGH'),
(51, '21254tt', 'hari', 'kjhkjh', 0, 'Lepo road', 'Near Lakshmi Cinema', 'HAZARIBAGH'),
(52, 'Ch123', 'Amit', 'Raj', 0, 'Ghs', 'Hdgs', 'Hdhs'),
(53, '45676', 'dfdfdsf', 'dfsafafa', 0, 'fadfadsf', 'fafsdaf', 'fasdfasd'),
(54, 'mud123', 'amit', 'raj ver', 0, 'ranchi', 'aaaa', 'aaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `advo_user` int(30) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`advo_user`, `user_name`, `password`) VALUES
(1, 'amit', 'amit');

-- --------------------------------------------------------

--
-- Table structure for table `advo_details`
--

CREATE TABLE `advo_details` (
  `advo_id` int(30) NOT NULL,
  `user_id` int(20) NOT NULL,
  `enrollment_no` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `dob` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advo_details`
--

INSERT INTO `advo_details` (`advo_id`, `user_id`, `enrollment_no`, `first_name`, `last_name`, `dob`, `email`, `gender`) VALUES
(15, 32, 'ch123', 'chayan', 'kumar', '1997-12-12', 'chayan508@gmail.com', 'male'),
(16, 33, 'jfjiejie', 'sjjijreij', 'jfweijr', '2017-09-08', 'hrrtrtw``', 'male'),
(17, 34, '456', 'anuj', 'kuamr', '2017-09-01', 'anuj@gmail. com', 'male'),
(18, 35, '345', 'srv', 'kmr', '2017-09-19', 'srv@gmail.com', 'male'),
(19, 36, '2621/2013', 'RANA RAHUL', 'PRATAP', '1973-01-02', 'ranarahulpratap@gmail.com', 'male'),
(20, 37, '123', 'sura', 'kumar', '2017-09-14', 'seasuraj@gmail.com', 'male'),
(21, 38, 'a', 'a', 'a', 'a', 'a', 'male'),
(22, 39, 'as123', 'asif', 'khan', '12/12/1998', 'as@gmail.com', 'male'),
(23, 40, '45755', 'SATISH', 'KUMAR', '2017-10-01', 'sat.shah36@gmail.com', 'male'),
(24, 41, 'Ami123', 'Amit', 'Verma', '2017-10-02', 'Amit@gmail.com', '--Gender--'),
(25, 42, 'ver-1213', 'amit', 'verma', '2018-01-10', 'verma.4435@gmail.com', 'male'),
(27, 44, '944/1999', 'Dhananjay Kumar  ', 'Singh', '1999-07-09', 'dhananjaykrsingh24@gmail.com', 'male'),
(28, 45, '4169/2005', 'Ashwini ', 'kumar', '2005-05-05', 'ashwini2381972gmail .com', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `advo_login`
--

CREATE TABLE `advo_login` (
  `advo_id` int(10) NOT NULL,
  `advo_user` varchar(30) NOT NULL,
  `advo_password` varchar(30) NOT NULL,
  `permission` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advo_login`
--

INSERT INTO `advo_login` (`advo_id`, `advo_user`, `advo_password`, `permission`) VALUES
(15, 'chayan508@gmail.com', 'kumar', 1),
(16, 'hrrtrtw``', 'fdss', 0),
(17, 'anuj@gmail. com', '123', 1),
(18, 'srv@gmail.com', '123', 1),
(19, 'ranarahulpratap@gmail.com', 'hzbadv', 1),
(20, 'seasuraj@gmail.com', 'seasuraj', 0),
(21, 'a', 'a', 1),
(22, 'as@gmail.com', 'as', 1),
(23, 'sat.shah36@gmail.com', '123456', 1),
(24, 'Amit@gmail.com', 'ami', 1),
(25, 'verma.4435@gmail.com', '1234', 1),
(27, 'dhananjaykrsingh24@gmail.com', 'dks123', 1),
(28, 'ashwini2381972gmail .com', 'ak123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `advo_profile`
--

CREATE TABLE `advo_profile` (
  `profile_id` int(30) NOT NULL,
  `advo_id` int(30) NOT NULL,
  `professional_area` varchar(40) NOT NULL,
  `date_joining` date NOT NULL,
  `experience` varchar(40) NOT NULL,
  `phone_no` varchar(40) NOT NULL,
  `office_address` varchar(500) NOT NULL,
  `residential_address` varchar(500) NOT NULL,
  `profile_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advo_profile`
--

INSERT INTO `advo_profile` (`profile_id`, `advo_id`, `professional_area`, `date_joining`, `experience`, `phone_no`, `office_address`, `residential_address`, `profile_photo`) VALUES
(21, 15, 'criminal', '2017-09-30', '21', '8102027536', 'Lepo road\r\nNear Lakshmi Cinema', 'GTC, Hazaribag', 'IMG_20170706_130929.jpg'),
(22, 16, '', '0000-00-00', '', '', '', '', ''),
(23, 17, 'criminal', '2017-09-30', '33', '1234567890', 'rgssgsgsgsg', 'gsgfsgsgsg', 'unicycle.jpg'),
(24, 18, '', '0000-00-00', '', '', 'fsdfafafaf', '', ''),
(25, 19, 'civil', '2017-09-07', '4 years', '1234567890', 'jhjhg', '45rertr', 'unicycle.jpg'),
(26, 20, '', '0000-00-00', '', '', '', '', ''),
(27, 21, '', '0000-00-00', '', '', '', '', ''),
(28, 22, 'criminal', '1999-12-12', '21', '9088334455', 'g,jklgjl', 'kjfkajfklioj fjlkfjlkjtegeghg dhghbgd', 'Haider (2014) _Poster.png'),
(29, 23, '', '0000-00-00', '', '', '', '', ''),
(30, 24, 'criminal', '2017-10-08', '21', '9031123335', 'Anad Puri hazar\r\n', 'Anand', 'IMG_20171030_135507.jpg'),
(31, 19, '', '0000-00-00', '', '', '', '', ''),
(32, 19, '', '0000-00-00', '', '', '', '', ''),
(33, 25, 'criminal', '2018-01-10', '21', '9031123335', 'ranchi', 'rmghar', 'IMG_20171030_134309.jpg'),
(34, 19, '', '0000-00-00', '', '', '', '', ''),
(35, 27, '', '0000-00-00', '', '', '', '', ''),
(36, 28, '', '0000-00-00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `case_date`
--

CREATE TABLE `case_date` (
  `date_id` int(20) NOT NULL,
  `case_no` varchar(50) NOT NULL,
  `previous_date` date NOT NULL,
  `case_detail` varchar(5000) NOT NULL,
  `next_date` date NOT NULL,
  `judge` varchar(100) NOT NULL,
  `court` varchar(1000) NOT NULL,
  `edit` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_date`
--

INSERT INTO `case_date` (`date_id`, `case_no`, `previous_date`, `case_detail`, `next_date`, `judge`, `court`, `edit`) VALUES
(1, 'ch123', '2017-09-13', 'ji', '2017-09-27', '', '', 0),
(2, 'ch123', '2017-09-27', 'ji', '2017-09-30', '', '', 0),
(3, 'wwwwwwwww', '2017-09-21', 'ji', '2017-09-27', '', '', 0),
(4, 'dadf', '2017-09-20', 'ji', '2017-09-28', '', '', 0),
(5, 'in123', '2017-09-27', 'FDFDF', '2017-09-28', '', '', 0),
(6, 'in123', '2017-09-28', 'FAFAFASF', '2017-09-29', '', '', 0),
(7, 'in33333', '2017-09-01', 'ASGASGG', '2017-09-14', 'vczvv', 'cvzvc', 0),
(8, 'seresr', '2017-09-13', 'ji', '2017-09-17', 'rdrt', 'stss', 0),
(9, 'q', '2017-09-21', 'ji', '2017-09-30', 'ddd', 'ddd', 0),
(10, 'income-123', '2017-09-13', 'gn', '2017-09-29', 'rajesh singh', 'ranchi high court', 0),
(11, 'income-123', '2017-09-29', 'RDFFAFFF', '2017-09-29', '', '', 0),
(12, 'income-123', '2017-09-29', 'FDGDSGS', '2017-09-30', 'dfafaf', '', 0),
(13, 'income-123', '2017-09-30', 'SDASFFFDF', '2017-09-29', '', '', 0),
(14, 'income-123', '2017-09-29', 'xz', '2017-09-29', 'kfjlkjfkl', 'jdlkfjlkjkjdf', 0),
(15, 'income-123', '2017-09-29', 'fffffffffffffffff', '2017-09-28', 'ffff', '', 0),
(16, 'income-123', '2017-09-28', 'ggsag', '2017-09-28', 'fsadffa', 'fafdsf', 0),
(17, 'haw123', '2017-09-28', 'ljdljflajflkj ', '2017-09-30', 'dfd', 'fdff', 0),
(18, 'haw123', '2017-09-30', 'fafafaf', '2017-10-01', 'fdfdfd', 'ddddd', 0),
(19, 'seresr', '2017-09-17', 'sfdgsgsg', '2017-09-29', 'fs', 'gfs', 0),
(20, 'haw123', '2017-10-01', 'bbxbxcbxb', '2017-10-26', 'bbb', 'bbb', 0),
(21, '26/13', '2017-09-01', 'dfadghjhkjhk\r\nkfkjaslkfjlsdkjfsa\r\nsfasdfsda\r\nfasdfkasdjfksdfas\r\nfdsdftyuytjjhgjhjkukui', '2017-09-04', 'sourav', 'high court / 23', 0),
(22, 'in123', '2017-09-29', 'iikikijijhji', '2017-09-30', 'ujj', '6', 0),
(23, 'in123', '2017-09-30', 'gagdgdfg', '2017-09-30', 'gggggg', 'fffff', 0),
(24, 'in123', '2017-09-30', 'lgjlkjlkgjlkjg', '2017-10-28', 'amit', 'ranchi high court', 0),
(25, 'in123', '2017-10-28', 'lkjflkjalkjfkljl', '2017-10-31', 'amit', 'jf;j;f', 0),
(26, 'in123', '2017-10-31', 'jlkadjflkjalkf', '2017-11-04', 'fafdfdf', 'df', 0),
(27, 'in123', '2017-11-04', 'gwfgg', '2017-11-24', 'gsgdsggg', 'ggg', 0),
(28, '3333', '2017-09-21', 'zcvzcxvzv', '2017-09-28', 'ravi', '53', 0),
(33, '3333', '2017-09-28', 'LLKJLKFJLKJALK', '2017-09-30', 'ravi', 'jlkjlk', 0),
(34, '3333', '2017-09-30', 'kua kdjflkjflkj', '2017-10-14', 'gsdfggg', 'gfgfg', 0),
(35, '3333', '2017-10-14', 'ki tm be gunha hai', '2017-10-27', 'amit', '7676', 0),
(36, '3333', '2017-10-27', 'gsfgfg', '2017-11-03', 'fgfgfg', 'gfsgs', 0),
(37, '3333', '2017-11-03', 'fafafdfadf', '2017-11-30', 'dafdf', 'fafdf', 0),
(38, '3333', '2017-11-30', 'vdvsavavdv', '2017-12-02', 'dfdffdf', 'fdfadffd', 1),
(42, '40/2017', '2017-09-30', 'jdkfkaklfj', '2017-10-14', 'fFFff', 'cxCC', 0),
(43, '29/2017', '2017-09-22', 'jgkljlkgl jlkjglk glgjlkgjg jlkjlgkjlkj sg lkfjglkjglq', '2017-09-29', 'dsfff', 'dfafa', 0),
(44, '29/2017', '2017-09-29', 'dsagag', '2017-09-30', 'adfafasdf', 'fafafaf', 1),
(45, 'fdsaf', '2017-09-22', 'fafaf', '2017-09-29', 'afadfaf', 'fafasf', 1),
(46, 'fdFD', '2017-09-27', 'DFAFAF', '2017-09-29', 'FAFASF', 'AFA', 1),
(47, 'in123', '2017-11-24', 'fadfafa', '2017-11-25', 'fff', 'fff', 0),
(48, 'ffdfd', '2017-09-27', 'fafaf', '2017-09-29', 'fasfdafaf', 'ffaffdf', 1),
(49, 'fdfd', '2017-09-14', 'fafdf', '2017-09-28', 'fdffff', 'fffff', 1),
(50, 'fdfqdfaf', '2017-09-05', 'fffffff', '2017-09-07', 'ffaff', 'fdfdfd', 1),
(51, 'fafaf', '2017-09-20', 'fafafaf', '2017-09-28', 'ffaff', 'fafaf', 1),
(52, 'cxc', '2017-09-28', 'cCcc', '2017-09-30', 'cxcCc', 'cCcc', 1),
(53, 'dfdfa', '2017-09-28', 'faff', '2017-09-30', 'fafd', 'dfaf', 1),
(54, 'fdaf', '2017-09-13', 'faf', '2017-09-14', 'dfafadf', 'FAFafaf', 1),
(55, 'vzvcv', '2017-09-23', 'vzvv', '2017-09-29', 'cvzvv', 'VZcxvzv', 1),
(56, 'ggg', '2017-09-13', 'gg', '2017-09-20', 'Gggg', 'ggg', 1),
(57, '21254', '2017-09-24', 'gjhkjkhlphhvjguj\r\njvjgjkj', '2017-09-28', 'jhookk', '12', 1),
(58, '123', '2017-09-19', 'ajdsojiojifw', '2017-09-15', 'ak singh', '203', 0),
(59, '123', '2017-09-15', 'gjhhkj llklk', '2017-09-19', 'jagan', '506', 0),
(60, '123', '2017-09-19', 'lkjfdljadl\r\nkljsdflkas\r\nlsflajsdlf\r\nldljaslf\r\nlsdjflsdjflsaf\r\nsdflsdjflsdf\r\nsdlfsdlfjasd', '2017-09-21', 'jagan', '506', 1),
(61, '1456', '2017-09-01', 'department sent notice for the period 2017-18 for scrutiny of od a.c no 45868 ', '2017-09-24', 'Mukul roy', 'IT court / 125', 1),
(62, 'sec', '2017-09-20', 'jfiewjij', '2017-09-21', 'abcd', '420', 1),
(63, 'in123', '2017-11-25', 'kya bhia', '2017-11-26', 'ravi', '45 high court', 1),
(64, 'fhg', '0000-00-00', 'jhjgjhg', '0000-00-00', 'jhhgjh', 'gjgjg', 1),
(65, 'JH/HC/34567', '2017-09-01', 'As the father died Ryder both brother claims the same property. My client was mentally tortured by his younger brother and his wife. They threatened my client to kill them.', '2017-09-08', 'Lalu ram', '12', 0),
(66, 'JH/HC/34567', '2017-09-08', 'Judge granted the case and adjourned to the next hearing', '2017-09-09', 'Lalu ram', '204', 1),
(67, '452', '2017-10-12', 'OIKJHKMJ', '2017-10-13', 'YTYHG', '45', 0),
(68, '452', '2017-10-13', 'TYHUJUJUJUHYG', '2017-10-14', 'jagan', '78', 1),
(69, '4521', '2017-10-01', 'kjhnj jjkkikmj', '2017-10-11', 'booom', '12', 1),
(70, '8596', '2017-10-06', 'kkhhjhj ', '2017-10-09', 'juju', '41', 0),
(71, 'vvvv', '2017-10-20', 'vzvzv', '2017-10-27', 'vvvvv', 'Vvvv', 1),
(72, '567', '2017-10-03', 'Yy', '2017-10-11', 'Ry', '56', 1),
(73, '458585', '2017-10-10', 'hhjjoj jhjhj kjhjh', '2017-10-15', '457', '855', 1),
(74, 'fddrhgdh', '2017-10-16', 'gjffhfjfj', '2017-10-18', 'dfgsg', 'fhfdg', 1),
(75, '123456', '2017-10-12', 'half murder', '2017-10-14', 'ak singh', 'room234', 1),
(76, '21254tt', '2017-10-09', 'Hj VN ok DC ok ok DM of dj of room other ingredients and you can see myself in the next week', '2017-10-15', 'jhookk', '45', 1),
(77, '45676', '2017-10-24', 'fkwkfjeijfiwq', '2017-10-27', 'kfiriqwe', 'khefihfi', 0),
(78, 'seresr', '2017-09-29', 'ijijfdfjdojfdjglkfdgfdgf', '2017-10-11', 'mahesh', '12', 1),
(79, 'Ch123', '2017-10-24', 'Such Ohio such office stay dunno', '2017-10-31', 'Amit', 'Ranchi', 1),
(80, '45676', '2017-10-27', 'fgdsgsdfgsdgfdgf g g sg gdfg sg g  gdsgsdgsdg', '2017-11-30', 'gggf', 'sg r', 1),
(81, 'mud123', '2018-01-17', 'murder at road ..', '2018-01-25', 'raj', '123ranchi', 0),
(82, 'mud123', '2018-01-25', 'accusssed sentes', '2018-02-10', 'raj', 'raj123', 0),
(83, 'mud123', '2018-02-10', 'biollll', '2018-02-22', 'ver', 'ranchi123', 1),
(84, '32/2016', '2018-01-09', 'evidence', '2018-02-09', 'MVACT', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `case_details`
--

CREATE TABLE `case_details` (
  `case_id` int(30) NOT NULL,
  `advo_id` int(40) NOT NULL,
  `case_category` varchar(40) NOT NULL,
  `case_no` varchar(60) NOT NULL,
  `case_title` varchar(200) NOT NULL,
  `client_name` varchar(90) NOT NULL,
  `client_phone_no` int(20) NOT NULL,
  `client_address` varchar(400) NOT NULL,
  `case_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_details`
--

INSERT INTO `case_details` (`case_id`, `advo_id`, `case_category`, `case_no`, `case_title`, `client_name`, `client_phone_no`, `client_address`, `case_date`) VALUES
(4, 15, 'criminal', 'in123', 'income tax delay', 'rajeev', 3334334, 'jvkzjlkvjlkjvlkjzlvjlzvj', '2017-09-27'),
(5, 15, 'civil', 'in33333', 'dafafa', 'fsdfaf', 22222, 'vzvzcv', '2017-09-01'),
(6, 15, 'criminal', 'seresr', 'estset', 'tsese', 0, 'stsets', '2017-09-13'),
(7, 15, 'civil', 'q', 'q', 'q', 1, 'q', '2017-09-21'),
(8, 15, 'income tax', 'income-123', 'income tax relaaxcation', 'raj', 88777565, 'ggs road hazaribag jarkhand', '2017-09-13'),
(9, 15, 'criminal', 'haw123', 'hawla se aaye hua', 'rahul', 534343, 'lfjlkajlkfjlka ljdljflkjdfl ', '2017-09-28'),
(10, 19, 'criminal', '26/13', 'half murder', 'sanjay kumar', 1234567890, 'vill -badam', '2017-09-01'),
(11, 17, 'civil', '3333', 'fdff', 'dfda', 1234567890, 'dfsdggvzvcv', '2017-09-21'),
(13, 18, 'civil', '40/2017', 'HOME LOAN', 'RAJIV', 2147483647, ';jldfjlkdkl ljkj jfj', '2017-09-30'),
(14, 18, 'sales tax', '29/2017', 'wrong sale statement', 'sudha co.', 554664466, 'lkjflk fljlkf flkjljfdkjkl', '2017-09-22'),
(15, 18, 'income tax', 'fdsaf', 'fdfdf', 'affa', 0, 'fadfdf', '2017-09-22'),
(16, 15, 'civil', 'fdFD', 'fFF', 'dfdF', 333, 'FAFA', '2017-09-27'),
(17, 15, 'civil', 'ffdfd', 'dsdsdsd', 'dfdfd', 3333333, 'fdfdfdaf', '2017-09-27'),
(19, 15, 'civil', 'fdfqdfaf', 'fafdffffff', 'ffdd', 333333, 'fafdfdafafaf', '2017-09-05'),
(20, 15, 'criminal', 'fafaf', 'ffffffff', 'faff', 2147483647, 'asfafafaf', '2017-09-20'),
(21, 15, 'criminal', 'cxc', 'cxc', 'cxc', 0, 'xcxcC', '2017-09-28'),
(22, 15, 'civil', 'dfdfa', 'ddfaf', 'fdafd', 3334334, 'dfafaf', '2017-09-28'),
(23, 15, 'criminal', 'fdaf', 'fafadsf', 'fafaf', 4444, 'dfadfaf', '2017-09-13'),
(24, 15, 'civil', 'vzvcv', 'vzvv', 'vzvv', 0, 'vzvv', '2017-09-23'),
(25, 15, 'criminal', 'ggg', 'gggf', 'ggg', 0, 'ggg', '2017-09-13'),
(26, 0, 'criminal', '123', 'Murder', 'srv', 1234567890, 'hazaribag', '2017-09-19'),
(27, 0, 'income tax', '1456', 'filed', 'mukesh ambani', 45868, 'saroni, hazaribagh', '2017-09-01'),
(28, 0, 'civil', 'sec', 'abc', 'kumar', 1234, 'ksjrjiejriej', '2017-09-20'),
(29, 22, 'criminal', 'fhg', 'fhgf', 'fhfhg', 1122443355, 'gjhg', '0000-00-00'),
(30, 15, 'civil', 'JH/HC/34567', 'Land objection between brothers', 'mukesh ambani', 1234567890, 'At beko po aura Giridih', '2017-09-01'),
(31, 15, 'civil', '452', 'TYUITTUU', 'jjlijkjjn', 2147483647, 'Lepo road\r\nNear Lakshmi Cinema', '2017-10-12'),
(32, 15, 'criminal', '4521', 'hhjhjg', 'dtgfghkkj', 1234567890, 'vghujnjjj jjjj jjjnjj', '2017-10-01'),
(33, 15, 'civil', '8596', 'thk,', 'jjlijkjjn', 1234567890, 'juimhgfdvg hjhjkj jhjj ', '2017-10-06'),
(34, 15, 'criminal', 'vvvv', 'vvv', 'vvv', 1234567890, 'dgdggsg', '2017-10-20'),
(35, 15, 'civil', '467965', 'Huhshsbd', 'Gehu cnb job', 2147483647, 'Lepo road\r\nNear Lakshmi Cinema6', '2017-10-02'),
(36, 15, 'civil', '567', 'Land objection between brothers', 'TGHJKL;', 2147483647, 'Lepo road\r\nNear Lakshmi Cinema', '2017-10-03'),
(37, 15, 'criminal', '458585', 'uuui', 'vhgfghjnj', 2147483647, 'Lepo road\r\nNear Lakshmi Cinema', '2017-10-10'),
(38, 15, 'criminal', 'fddrhgdh', 'gfgre', 'fhfdhd', 1234567890, 'tgsrtwetwt', '2017-10-16'),
(39, 15, 'criminal', '123456', 'half murder', 'sourav', 2147483647, 'hazaribag', '2017-10-12'),
(40, 15, 'income tax', '21254tt', 'Input credit', 'Cha tab', 2147483647, 'Lepo road\r\nNear Lakshmi Cinema', '2017-10-09'),
(41, 15, 'criminal', '45676', 'half murder', 'srv', 1234567890, 'djksjfsid', '2017-10-24'),
(42, 24, 'civil', 'Ch123', 'Chotku', 'Murder', 1234567890, 'She', '2017-10-24'),
(43, 25, 'criminal', 'mud123', 'murder', 'ravi', 2147483647, 'hazaribag', '2018-01-17'),
(44, 27, 'civil', '32/2016', 'anil keshari vs new india assurance co. ltd', 'anil keshari', 2147483647, 'at- barhi , hazaribag road, Hazaribag', '2018-01-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accused_details`
--
ALTER TABLE `accused_details`
  ADD PRIMARY KEY (`accused_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`advo_user`);

--
-- Indexes for table `advo_details`
--
ALTER TABLE `advo_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `enrollment_no` (`enrollment_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `advo_login`
--
ALTER TABLE `advo_login`
  ADD PRIMARY KEY (`advo_id`),
  ADD UNIQUE KEY `user_name` (`advo_user`);

--
-- Indexes for table `advo_profile`
--
ALTER TABLE `advo_profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `case_date`
--
ALTER TABLE `case_date`
  ADD PRIMARY KEY (`date_id`);

--
-- Indexes for table `case_details`
--
ALTER TABLE `case_details`
  ADD PRIMARY KEY (`case_id`),
  ADD UNIQUE KEY `case_no` (`case_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accused_details`
--
ALTER TABLE `accused_details`
  MODIFY `accused_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `advo_user` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advo_details`
--
ALTER TABLE `advo_details`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `advo_login`
--
ALTER TABLE `advo_login`
  MODIFY `advo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `advo_profile`
--
ALTER TABLE `advo_profile`
  MODIFY `profile_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `case_date`
--
ALTER TABLE `case_date`
  MODIFY `date_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `case_details`
--
ALTER TABLE `case_details`
  MODIFY `case_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
