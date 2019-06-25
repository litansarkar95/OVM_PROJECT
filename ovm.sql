-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 02:12 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ovm`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `dashboard` ()  BEGIN
SELECT * FROM voter ORDER by id desc LIMIT 1;
SELECT COUNT(id) total FROM voter;
SELECT COUNT(id) total FROM candidate;
SELECT COUNT(id) total FROM party_list;

end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(10) UNSIGNED NOT NULL,
  `candidate_no` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `education` varchar(50) NOT NULL,
  `picture` varchar(4) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `party_listid` tinyint(3) UNSIGNED NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `candidate_areaid` smallint(5) UNSIGNED NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `active` varchar(10) NOT NULL,
  `votecount` int(11) NOT NULL,
  `status` varchar(5) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `candidate_no`, `first_name`, `last_name`, `nid`, `contact`, `education`, `picture`, `gender`, `party_listid`, `dob`, `email`, `candidate_areaid`, `nationality`, `religion`, `active`, `votecount`, `status`, `date`) VALUES
(1, '33', '33', 'u', '33', '33', 'S.S.C', 'jpg', 'Male', 6, '2019-03-30', '3li@mail.com', 2, 'Bangladesh', 'Muslim', '', 2, '1', '2019-03-30'),
(2, '12133997994', 'Mim', 'Akter', '12133997994', '019273635333', 'PHD', 'png', 'Female', 5, '1989-02-14', 'mim23@gmail.com', 3, 'Bangladesh', 'Muslim', '', 6, '1', '2019-04-07'),
(3, '12133929083', 'MR. Masum', 'Islam', '12133929083', '01921097564', 'Masters', 'png', 'Male', 6, '1992-06-17', 'masum1@hotmail.com', 3, 'Bangladesh', 'Muslim', '', 4, '1', '2019-04-07'),
(4, '12133560986', 'Nurul', 'Islam', '12133560986', '0182383734646', 'Degree', 'png', 'Male', 10, '2019-04-03', 'nurul@gmail.com', 3, 'Bangladesh', 'Muslim', '', 7, '1', '2019-04-07'),
(5, '3026627893', 'Joy', 'Shaha', '3026627893', '01772396054', 'H.S.C', 'png', 'Male', 6, '1990-06-10', 'joy@gmail.com', 4, 'Bangladesh', 'Hindu', '', 9, '1', '2019-06-10'),
(6, '3026565298', 'Mitu', 'Akter', '3026565298', '0192235343435', 'PHD', 'png', 'Female', 5, '1989-06-10', 'mitu@yahoo.com', 4, 'Bangladesh', 'Muslim', '', 5, '1', '2019-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_area`
--

CREATE TABLE `candidate_area` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `seat_no` varchar(10) NOT NULL,
  `seat_name` varchar(100) NOT NULL,
  `candidate_area` varchar(255) NOT NULL,
  `districtid` tinyint(3) UNSIGNED NOT NULL,
  `status` varchar(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate_area`
--

INSERT INTO `candidate_area` (`id`, `seat_no`, `seat_name`, `candidate_area`, `districtid`, `status`, `date`) VALUES
(1, '133', 'Tangail-4', 'Kalihati Upazila', 4, '1', '2019-03-30'),
(2, '134', 'Tangail-5', 'Tangail Sadar Upazila', 4, '1', '2019-03-30'),
(3, '135', 'Tangail-6', 'Delduar and Nagarpur upazilas', 4, '1', '2019-03-30'),
(4, '174', 'Dhaka-1', 'Dohar and Nawabganj Upazila', 3, '1', '2019-03-30'),
(5, '01', 'Panchagarh-1', 'Panchagarh Sadar Upazila, Tetulia Upazila and Atwari Upazila', 79, '1', '2019-04-09'),
(6, '02', 'Panchagarh-2', 'Debiganj Upazila, Boda Upazila', 79, '1', '2019-04-09'),
(7, '03', 'Thakurgaon-1', 'x', 81, '1', '2019-04-09'),
(8, '04', 'Thakurgaon-2', 'y', 81, '1', '2019-04-09'),
(9, '05', 'Thakurgaon-3', 'z', 81, '1', '2019-04-09'),
(10, '06', 'Dinajpur-1', 'Birganj Upazila, Kaharole Upazila', 23, '1', '2019-04-09'),
(11, '07', 'Dinajpur-2', 'x', 23, '1', '2019-04-09'),
(12, '08', 'Dinajpur-3', 'x', 23, '1', '2019-04-09'),
(13, '09', 'Dinajpur-4', 'x', 23, '1', '2019-04-09'),
(14, '10', 'Dinajpur-5', 'x', 23, '1', '2019-04-09'),
(15, '11', 'Dinajpur-6', 'Nawabganj Upazila, Birampur Upazila Hakimpur Upazila and Ghoraghat Upazila', 23, '1', '2019-04-09'),
(16, '12', 'Nilphamari-1', 'Dimla Upazila and Domar Upazila', 78, '1', '2019-04-09'),
(17, '13', 'Nilphamari-2', 'Nilphamari Sadar Upazila', 78, '1', '2019-04-09'),
(18, '14', 'Nilphamari-3', 'Jaldhaka Upazila', 78, '1', '2019-04-09'),
(19, '15', 'Nilphamari-4', 'Saidpur Upazila', 78, '1', '2019-04-09'),
(20, '16', 'Lalmonirhat-1', 'Patgram Upazila and Hatibandha Upazila', 77, '1', '2019-04-09'),
(21, '17', 'Lalmonirhat-2', 'x', 77, '1', '2019-04-09'),
(22, '18', 'Lalmonirhat-3', 'x', 77, '1', '2019-04-09'),
(23, '19', 'Rangpur-1', 'Gangachhara Upazila', 24, '1', '2019-04-09'),
(24, '20', 'Rangpur-2', 'x', 24, '1', '2019-04-09'),
(25, '21', 'Rangpur-3', 'Rangpur Sadar Upazila', 24, '1', '2019-04-09'),
(26, '22', 'Rangpur-4', 'x', 24, '1', '2019-04-09'),
(27, '23', 'Rangpur-5', 'x', 24, '1', '2019-04-09'),
(28, '24', 'Rangpur-6', 'x', 24, '1', '2019-04-09'),
(29, '25', 'Kurigram-1', 'Bhurungamari Upazila and Nageshwari Upazila', 75, '1', '2019-04-09'),
(30, '26', 'Kurigram-2', 'Kurigram Sadar Upazila, Rajarhat Upazila, and Phulbari Upazila, Kurigram', 75, '1', '2019-04-09'),
(31, '27', 'Kurigram-3', 'part of Ulipur Upazila and part of Chilmari Upazila', 75, '1', '2019-04-09'),
(32, '28', 'Kurigram-4', 'Raomari Upazila, Char Rajibpur Upazila, part of Chilmari Upazila, and part of Ulipur Upazila', 75, '1', '2019-04-09'),
(33, '29', 'Gaibandha-1', 'Sundarganj Upazila', 76, '1', '2019-04-09'),
(34, '30', 'Gaibandha-2', 'Gaibandha Sadar Upazila', 76, '1', '2019-04-09'),
(35, '31', 'Gaibandha-3', 'Palashbari Upazila and Sadullapur Upazila', 76, '1', '2019-04-09'),
(36, '32', 'Gaibandha-4', 'Gobindaganj Upazila', 76, '1', '2019-04-09'),
(37, '33', 'Gaibandha-5', 'Sughatta Upazila and Phulchhari Upazila', 76, '1', '2019-04-09'),
(38, '34', 'Joypurhat-1', 'Joypurhat Sadar Upazila and Panchbibi Upazila', 68, '1', '2019-04-09'),
(39, '35', 'Joypurhat-2', 'Akkelpur Upazila, Kalai Upazila and Khetlal Upazila', 68, '1', '2019-04-09'),
(40, '36', 'Bogra-1', 'Sariakandi Upazila and Sonatala Upazila', 21, '1', '2019-04-09'),
(41, '37', 'Bogra-2', 'Shibganj Upazila', 21, '1', '2019-04-09'),
(42, '38', 'Bogra-3', 'Adamdighi Upazila and Dhupchanchia Upazila', 21, '1', '2019-04-09'),
(43, '39', 'Bogra-4', 'Kahaloo Upazila and Nandigram Upazila', 21, '1', '2019-04-09'),
(44, '40', 'Bogra-5', 'Sherpur Upazila', 21, '1', '2019-04-09'),
(45, '41', 'Bogra-6', 'Bogra Sadar Upazila', 21, '1', '2019-04-09'),
(46, '42', 'Bogra-7', 'Gabtali Upazila and Shajahanpur Upazila', 21, '1', '2019-04-09'),
(47, '43', 'Chapai Nawabganj-1', 'Shibganj Upazila', 71, '1', '2019-04-09'),
(48, '44', 'Chapai Nawabganj-2', 'Bholahat Upazila, Gomastapur Upazila and Nachole Upazila', 71, '1', '2019-04-09'),
(49, '45', 'Chapai Nawabganj-3', 'Nawabganj Sadar Upazila', 71, '1', '2019-04-09'),
(50, '46', 'Naogaon-1', 'Sapahar Upazila, Porsha Upazila and Niamatpur Upazila', 69, '1', '2019-04-09'),
(51, '47', 'Naogaon-2', 'Patnitala Upazila and Dhamoirhat Upazila', 69, '1', '2019-04-09'),
(52, '48', 'Naogaon-3', 'Mohadevpur Upazila and Badalgachhi Upazila', 69, '1', '2019-04-09'),
(53, '49', 'Naogaon-4', 'Manda Upazila', 69, '1', '2019-04-09'),
(54, '50', 'Naogaon-5', 'Naogaon Sadar Upazila', 69, '1', '2019-04-09'),
(55, '51', 'Naogaon-6', 'Raninagar Upazila and Atrai Upazila', 69, '1', '2019-04-09'),
(56, '52', 'Rajshahi-1', 'Tanore Upazila and Godagari Upazila', 73, '1', '2019-04-09'),
(57, '53', 'Rajshahi-2', 'Rajshahi City Corporation (Shah Makhdum, Raipara, Boalia and Motihar)', 73, '1', '2019-04-09'),
(58, '54', 'Rajshahi-3', 'Mohanpur Upazila and Paba Upazila', 73, '1', '2019-04-09'),
(59, '55', 'Rajshahi-4', 'Bagmara Upazila', 73, '1', '2019-04-09'),
(60, '56', 'Rajshahi-5', 'Durgapur Upazila and Puthia Upazila', 73, '1', '2019-04-09'),
(61, '57', 'Rajshahi-6', 'Charghat Upazila and Bagha Upazila', 73, '1', '2019-04-09'),
(62, '58', 'Natore-1', 'Lalpur and Bagatipara Upazila', 70, '1', '2019-04-09'),
(63, '59', 'Natore-2', 'x', 70, '1', '2019-04-09'),
(64, '60', 'Natore-3', 'x', 70, '1', '2019-04-09'),
(65, '61', 'Natore-4', 'x', 70, '1', '2019-04-09'),
(66, '62', 'Sirajganj-1', 'x', 74, '1', '2019-04-09'),
(67, '63', 'Sirajganj-2', 'x', 74, '1', '2019-04-09'),
(68, '64', 'Sirajganj-3', 'x', 74, '1', '2019-04-09'),
(69, '65', 'Sirajganj-4', 'x', 74, '1', '2019-04-09'),
(70, '66', 'Sirajganj-5', 'x', 74, '1', '2019-04-09'),
(71, '67', 'Sirajganj-6', 'x', 74, '1', '2019-04-09'),
(72, '68', 'Pabna-1', 'x', 72, '1', '2019-04-09'),
(73, '69', 'Pabna-2', 'x', 72, '1', '2019-04-09'),
(74, '70', 'Pabna-3', 'x', 72, '1', '2019-04-09'),
(75, '71', 'Pabna-4', 'x', 72, '1', '2019-04-09'),
(76, '72', 'Pabna-5', 'x', 72, '1', '2019-04-09'),
(77, '73', 'Meherpur-1', 'Meherpur Sadar Upazila and Mujibnagar Upazila', 64, '1', '2019-04-09'),
(78, '74', 'Meherpur-2', 'Gangni Upazila', 64, '1', '2019-04-09'),
(79, '75', 'Kushtia-1', 'x', 62, '1', '2019-04-09'),
(80, '76', 'Kushtia-2', 'Mirpur Upazila and Bheramara Upazila', 62, '1', '2019-04-09'),
(81, '77', 'Kushtia-3', 'x', 62, '1', '2019-04-09'),
(82, '78', 'Kushtia-4', 'x', 62, '1', '2019-04-09'),
(83, '79', 'Chuadanga-1', 'Alamdanga Upazila, and part of Chuadanga Sadar Upazila', 59, '1', '2019-04-09'),
(84, '80', 'Chuadanga-2', 'Chuadanga Sadar Upazila, Damurhuda Upazila, and Jibannagar Upazila', 59, '1', '2019-04-09'),
(85, '81', 'Jhenaidah-1', 'x', 61, '1', '2019-04-09'),
(86, '82', 'Jhenaidah-1', 'x', 61, '1', '2019-04-09'),
(87, '83', 'Jhenaidah-3', 'Maheshpur Upazila, and Kotchandpur Upazila', 61, '1', '2019-04-09'),
(88, '84', 'Jhenaidah-4', 'x', 61, '1', '2019-04-09'),
(89, '91', 'Magura-1', 'Sharsha UpaSreepur Upazila, Magura Sadar Upazila (not include Shotrujitpur Union, Gopalgram Union, Kuciamora Union, Berilpur Union).zila', 63, '1', '2019-04-09'),
(90, '92', 'Magura-2', 'Mohammadpur Upazila, Shotrujitpur Union, Gopalgram Union, Kuciamora Union, Berilpur Union', 63, '1', '2019-04-09'),
(91, '93', 'Narail-1', 'Kalia Upazila and part of Narail Sadar Upazila', 65, '1', '2019-04-09'),
(92, '94', 'Narail-2', 'Lohagara Upazila and part of Narail Sadar Upazila', 65, '1', '2019-04-09'),
(93, '95', 'Bagerhat-1', 'Chitalmari Upazila, Fakirhat Upazila, and Mollahat Upazila', 15, '1', '2019-04-09'),
(94, '96', 'Bagerhat-2', 'Bagerhat Sadar Upazila, and Kachua Upazila', 15, '1', '2019-04-09'),
(95, '97', 'Bagerhat-3', 'Mongla Upazila and Rampal Upazila', 15, '1', '2019-04-09'),
(96, '98', 'Bagerhat-4', 'Morrelganj Upazila and Sarankhola Upazila', 15, '1', '2019-04-09'),
(97, '99', 'Khulna-1', 'Dacope Upazila and Batiaghata Upazila', 17, '1', '2019-04-09'),
(98, '100', 'Khulna-2', 'Khulna Kotwali Thana and Sonadanga Thana', 17, '1', '2019-04-09'),
(99, '101', 'Khulna-3', 'Khalishpur Thana and Khan Jahan Ali Thana', 17, '1', '2019-04-09'),
(100, '102', 'Khulna-4', 'Rupsha Upazila, Dighalia Upazila and Terokhada Upazila', 17, '1', '2019-04-09'),
(101, '103', 'Khulna-5', 'Dumuria Upazila and Phultala Upazila', 17, '1', '2019-04-09'),
(102, '104', 'Khulna-6', 'Koyra Upazila and paikgachha Upazila', 17, '1', '2019-04-09'),
(103, '105', 'Satkhira-1', 'Kalaroa Upazila and Tala Upazila', 66, '1', '2019-04-09'),
(104, '106', 'Satkhira-2', 'Satkhira Sadar Upazila', 66, '1', '2019-04-09'),
(105, '107', 'Satkhira-3', 'x', 66, '1', '2019-04-09'),
(106, '108', 'Satkhira-4', 'x', 66, '1', '2019-04-09'),
(107, '109', 'Barguna-1', 'Barguna Sadar Upazila and Amtali Upazila', 13, '1', '2019-04-09'),
(108, '110', 'Barguna-2', 'Bamna Upazila, Patharghata Upazila and Betagi Upazila', 13, '1', '2019-04-09'),
(109, '111', 'Patuakhali-1', 'Patuakhali Sadar Upazila, Mirzaganj Upazila, and Dumki Upazila', 32, '1', '2019-04-09'),
(110, '112', 'Patuakhali-2', 'Bauphal Upazila', 32, '1', '2019-04-09'),
(111, '113', 'Patuakhali-3', 'Dashmina Upazila, Galachipa Upazila', 32, '1', '2019-04-09'),
(112, '114', 'Patuakhali-4', 'Kalapara Upazila, Rangabali Upazila', 32, '1', '2019-04-09'),
(113, '115', 'Bhola-1', 'Bhola Sadar Upazila', 30, '1', '2019-04-09'),
(114, '116', 'Bhola-2', 'Burhanuddin Upazila and Daulatkhan Upazila', 30, '1', '2019-04-09'),
(115, '117', 'Bhola-3', 'Lalmohan Upazila and Tazumuddin Upazila', 30, '1', '2019-04-09'),
(116, '118', 'Bhola-4', 'Char Fasson Upazila and Manpura Upazila', 30, '1', '2019-04-09'),
(117, '119', 'Barisal-1', 'Agailjhara Upazila and Gaurnadi Upazila', 14, '1', '2019-04-09'),
(118, '120', 'Barisal-2', 'Banaripara Upazila and Wazirpur Upazila', 14, '1', '2019-04-09'),
(119, '121', 'Barisal-3', 'Babuganj Upazila and Muladi Upazila', 14, '1', '2019-04-09'),
(120, '122', 'Barisal-4', 'Hizla Upazila and Mehendiganj Upazila', 14, '1', '2019-04-09'),
(121, '123', 'Barisal-5', 'Barisal Sadar Upazila', 14, '1', '2019-04-09'),
(122, '124', 'Barisal-6', 'Bakerganj Upazila', 14, '1', '2019-04-09'),
(123, '125', 'Jhalokati-1', 'Rajapur Upazila and Kathalia Upazila', 31, '1', '2019-04-09'),
(124, '126', 'Jhalokati-2', 'Jhalokati Sadar Upazila and Nalchity Upazila', 31, '1', '2019-04-09'),
(125, '127', 'Pirojpur-1', 'Pirojpur Sadar Upazila, Nazirpur Upazila and Nesarabad (Swarupkati) Upazila', 33, '1', '2019-04-09'),
(126, '128', 'Pirojpur-2', 'Bhandaria Upazila, Kawkhali Upazila, Pirojpur, Zianagar Upazila', 33, '1', '2019-04-09'),
(127, '129', 'Pirojpur-3', 'Mathbaria Upazila', 33, '1', '2019-04-09'),
(128, '168', 'Manikganj-1', 'x', 50, '1', '2019-04-09'),
(129, '169', 'Manikganj-2', 'x', 50, '1', '2019-04-09'),
(130, '170', 'Manikganj-3', 'x', 50, '1', '2019-04-09'),
(131, '171', 'Munshiganj-1', 'x', 51, '1', '2019-04-09'),
(132, '172', 'Munshiganj-2', 'x', 51, '1', '2019-04-09'),
(133, '173', 'Munshiganj-3', 'x', 51, '1', '2019-04-09'),
(135, '175', 'Dhaka-2', 'x', 3, '1', '2019-04-09'),
(136, '176', 'Dhaka-3', 'x', 3, '1', '2019-04-09'),
(138, '177', 'Dhaka-4', 'x', 3, '1', '2019-04-09'),
(139, '178', 'Dhaka-5', 'x', 3, '1', '2019-04-09'),
(140, '179', 'Dhaka-6', 'x', 3, '1', '2019-04-09'),
(141, '180', 'Dhaka-7', 'x', 3, '1', '2019-04-09'),
(142, '181', 'Dhaka-8', 'x', 3, '1', '2019-04-09'),
(143, '182', 'Dhaka-9', 'x', 3, '1', '2019-04-09'),
(144, '183', 'Dhaka-10', 'x', 3, '1', '2019-04-09'),
(145, '184', 'Dhaka-11', 'x', 3, '1', '2019-04-09'),
(146, '185', 'Dhaka-12', 'x', 3, '1', '2019-04-09'),
(147, '186', 'Dhaka-13', 'x', 3, '1', '2019-04-09'),
(148, '187', 'Dhaka-14', 'Dhaka wards 7,8,9,10,11,12, and part of Savar Upazila', 3, '1', '2019-04-09'),
(149, '188', 'Dhaka-15', 'Dhaka wards 4, 13, 14, and 16', 3, '1', '2019-04-09'),
(150, '189', 'Dhaka-16', 'x', 3, '1', '2019-04-09'),
(151, '190', 'Dhaka-17', 'x', 3, '1', '2019-04-09'),
(152, '191', 'Dhaka-18', 'x', 3, '1', '2019-04-09'),
(153, '192', 'Dhaka-19', 'x', 3, '1', '2019-04-09'),
(154, '193', 'Dhaka-20', 'x', 3, '1', '2019-04-09'),
(155, '194', 'Gazipur-1', 'x', 6, '1', '2019-04-09'),
(156, '195', 'Gazipur-2', 'part of Gazipur city', 6, '1', '2019-04-09'),
(157, '196', 'Gazipur-3', 'Sreepur Upazila, Gazipur and part of Gazipur Sadar Upazila', 3, '1', '2019-04-09'),
(158, '197', 'Gazipur-4', 'x', 3, '1', '2019-04-09'),
(159, '198', 'Gazipur-5', 'x', 6, '1', '2019-04-09'),
(160, '199', 'Narsingdi-1', 'part of Narsingdi Sadar Upazila', 53, '1', '2019-04-09'),
(161, '200', 'Narsingdi-2', 'Palash Upazila and part of Narsingdi Sadar Upazila', 53, '1', '2019-04-09'),
(162, '201', 'Narsingdi-3', 'Shibpur Upazila', 53, '1', '2019-04-09'),
(163, '202', 'Narsingdi-4', 'Monohardi Upazila and Belabo Upazila', 53, '1', '2019-04-09'),
(164, '203', 'Narsingdi-5', 'Raipura Upazila', 53, '1', '2019-04-09'),
(165, '204', 'Narayanganj-1', 'x', 52, '1', '2019-04-09'),
(166, '205', 'Narayanganj-2', 'Araihazar Upazila', 52, '1', '2019-04-09'),
(167, '206', 'Narayanganj-3', 'Sonargaon Upazila', 52, '1', '2019-04-09'),
(168, '207', 'Narayanganj-4', 'Fatullah Thana and Siddhirganj Thana', 52, '1', '2019-04-09'),
(169, '208', 'Narayanganj-5', 'x', 52, '1', '2019-04-09'),
(170, '209', 'Rajbari-1', 'Rajbari Sadar Thana and Goalondo Thana', 55, '1', '2019-04-09'),
(171, '210', 'Rajbari-2', 'Baliakandi Thana and Pangsha Thana', 55, '1', '2019-04-09'),
(172, '211', 'Faridpur-1', 'x', 5, '1', '2019-04-09'),
(173, '212', 'Faridpur-2', 'x', 5, '1', '2019-04-09'),
(174, '213', 'Faridpur-3', 'x', 5, '1', '2019-04-09'),
(175, '214', 'Faridpur-4', 'x', 5, '1', '2019-04-09'),
(176, '215', 'Gopalganj-1', 'x', 7, '1', '2019-04-09'),
(177, '216', 'Gopalganj-2', 'x', 7, '1', '2019-04-09'),
(178, '217', 'Gopalganj-3', 'x', 7, '1', '2019-04-09'),
(179, '218', 'Madaripur-1', 'x', 9, '1', '2019-04-09'),
(180, '219', 'Madaripur-2', 'x', 9, '1', '2019-04-09'),
(181, '220', 'Madaripur-3', 'x', 9, '1', '2019-04-09'),
(182, '221', 'Shariatpur-1', 'Shariatpur Sadar Upazila and Zajira Upazila', 56, '1', '2019-04-09'),
(183, '222', 'Shariatpur-2', 'Naria Upazila and Shakhipur Thana', 56, '1', '2019-04-09'),
(184, '223', 'Shariatpur-3', 'Gosairhat Upazila, Damudya Upazila, Bhedarganj Thana', 56, '1', '2019-04-09'),
(185, '224', 'Sunamganj-1', 'Dharampasha Upazila, Tahirpur Upazila and Jamalganj Upazila', 84, '1', '2019-04-09'),
(186, '225', 'Sunamganj-2', 'Derai Upazila and Sullah Upazila', 84, '1', '2019-04-09'),
(187, '226', 'Sunamganj-3', 'Jagannathpur Upazila and Dakshin Surman Upazila', 84, '1', '2019-04-09'),
(188, '227', 'Sunamganj-4', 'x', 84, '1', '2019-04-09'),
(189, '228', 'Sunamganj-5', 'x', 84, '1', '2019-04-09'),
(190, '229', 'Sylhet-1', 'Sylhet Sadar Upazila', 27, '1', '2019-04-09'),
(191, '230', 'Sylhet-2', 'Bishwanath Upazila, Osmani Nagar Upazila and Balaganj Upazila', 27, '1', '2019-04-09'),
(192, '231', 'Sylhet-3', 'Dakshin Surma Upazila and Fenchuganj Upazila', 27, '1', '2019-04-09'),
(193, '232', 'Sylhet-4', 'Gowainghat Upazila, Jaintiapur Upazila and Companiganj Upazila', 27, '1', '2019-04-09'),
(194, '233', 'Sylhet-5', 'Kanaighat Upazila and Zakiganj Upazila', 27, '1', '2019-04-09'),
(195, '234', 'Sylhet-6', 'Beanibazar Upazila and Golapganj Upazila', 27, '1', '2019-04-09'),
(196, '235', 'Maulvibazar-1', 'Barlekha Upazila and Juri Upazila', 83, '1', '2019-04-09'),
(197, '236', 'Maulvibazar-2', 'x', 83, '1', '2019-04-09'),
(198, '237', 'Maulvibazar-3', 'Maulvibazar Sadar Upazila and Rajnagar Upazila', 83, '1', '2019-04-09'),
(199, '238', 'Maulvibazar-4', 'x', 83, '1', '2019-04-09'),
(200, '239', 'Habiganj-1', 'Nabiganj Upazila and Bahubal Upazila', 25, '1', '2019-04-09'),
(201, '240', 'Habiganj-2', 'Ajmiriganj Upazila and Baniyachong Upazila', 25, '1', '2019-04-09'),
(202, '241', 'Habiganj-3', 'Habiganj Sadar Upazila and Lakhai Upazila', 25, '1', '2019-04-09'),
(203, '242', 'Habiganj-4', 'Chunarughat Upazila and Madhabpur Upazila', 25, '1', '2019-04-09'),
(204, '243', 'Brahmanbaria-1', 'Nasirnagar Upazila', 35, '1', '2019-04-09'),
(205, '244', 'Brahmanbaria-2', 'Ashuganj Upazila and Sarail Upazila', 35, '1', '2019-04-09'),
(206, '245', 'Brahmanbaria-3', 'Brahmanbaria Sadar Upazila Bijoynagar Upazila', 35, '1', '2019-04-09'),
(207, '246', 'Brahmanbaria-4', 'Akhaura Upazila and Kasba Upazila', 35, '1', '2019-04-09'),
(208, '247', 'Brahmanbaria-5', 'Nabinagar Upazila', 35, '1', '2019-04-09'),
(209, '248', 'Brahmanbaria-6', 'Bancharampur Upazila and part of Nabinagar Upazila', 35, '1', '2019-04-09'),
(210, '249', 'Comilla-1', 'Daudkandi Upazila and Meghna Upazila', 12, '1', '2019-04-09'),
(211, '250', 'Comilla-2', 'Homna Upazila and Titas Upazila', 12, '1', '2019-04-09'),
(212, '251', 'Comilla-3', 'Muradnagar Upazila', 12, '1', '2019-04-09'),
(213, '252', 'Comilla-4', 'Debidwar Upazila', 12, '1', '2019-04-09'),
(214, '253', 'Comilla-5', 'Brahmanpara Upazila and Burichang Upazila', 12, '1', '2019-04-09'),
(215, '254', 'Comilla-6', 'part of Comilla Sadar Upazila', 12, '1', '2019-04-09'),
(216, '255', 'Comilla-7', 'Chandina Upazila', 12, '1', '2019-04-09'),
(217, '256', 'Comilla-8', 'Barura Upazila', 12, '1', '2019-04-09'),
(218, '257', 'Comilla-9', 'Laksham', 12, '1', '2019-04-09'),
(219, '258', 'Comilla-10', 'part of Comilla Sadar Upazila and Nangalkot Upazila', 12, '1', '2019-04-09'),
(220, '259', 'Comilla-11', 'Chauddagram Upazila', 12, '1', '2019-04-09'),
(221, '260', 'Chandpur-1', 'Kachua Upazila', 36, '1', '2019-04-09'),
(222, '261', 'Chandpur-2', 'Matlab Uttar Upazila and Matlab Dakshin Upazila', 36, '1', '2019-04-09'),
(223, '262', 'Chandpur-3', 'Chandpur Sadar Upazila and Haimchar Upazila', 36, '1', '2019-04-09'),
(224, '263', 'Chandpur-4', 'Faridganj Upazila', 36, '1', '2019-04-09'),
(225, '264', 'Chandpur-5', 'Haziganj Upazila and Shahrasti Upazila', 36, '1', '2019-04-09'),
(226, '265', 'Feni-1', 'Parshuram Upazila, Chhagalnaiya Upazila and Fulgazi Upazila', 40, '1', '2019-04-09'),
(227, '266', 'Feni-2', 'Feni Sadar Upazila', 40, '1', '2019-04-09'),
(228, '267', 'Feni-3', 'Sonagazi Upazila and Daganbhuiyan Upazila', 40, '1', '2019-04-09'),
(229, '268', 'Noakhali-1', 'x', 43, '1', '2019-04-09'),
(230, '269', 'Noakhali-2', 'x', 43, '1', '2019-04-09'),
(231, '270', 'Noakhali-3', 'x', 43, '1', '2019-04-09'),
(232, '271', 'Noakhali-4', 'x', 43, '1', '2019-04-09'),
(233, '272', 'Noakhali-5', 'x', 43, '1', '2019-04-09'),
(234, '273', 'Noakhali-6', 'Hatiya Upazila', 43, '1', '2019-04-09'),
(235, '274', 'Lakshmipur-1', 'Ramganj Upazila', 42, '1', '2019-04-09'),
(236, '275', 'Lakshmipur-2', 'x', 42, '1', '2019-04-09'),
(237, '276', 'Lakshmipur-3', 'x', 42, '1', '2019-04-09'),
(238, '277', 'Lakshmipur-4', 'x', 42, '1', '2019-04-09'),
(239, '278', 'Chittagong-1', 'Mirsharai Upazila', 11, '1', '2019-04-09'),
(240, '279', 'Chittagong-2', 'Fatikchhari Upazila', 11, '1', '2019-04-09'),
(241, '280', 'Chittagong-3', 'Sandwip Upazila', 11, '1', '2019-04-09'),
(242, '281', 'Chittagong-4', 'x', 11, '1', '2019-04-09'),
(243, '282', 'Chittagong-5', 'Hathazari Upazila and part of Chittagong', 11, '1', '2019-04-09'),
(244, '283', 'Chittagong-6', 'Raozan Upazila', 11, '1', '2019-04-09'),
(245, '284', 'Chittagong-7', 'x', 11, '1', '2019-04-09'),
(246, '285', 'Chittagong-8', 'part of Boalkhali thana and part of Chittagong', 11, '1', '2019-04-09'),
(247, '286', 'Chittagong-9', 'x', 11, '1', '2019-04-09'),
(248, '287', 'Chittagong-10', 'x', 11, '1', '2019-04-09'),
(249, '288', 'Chittagong-11', 'x', 11, '1', '2019-04-09'),
(250, '289', 'Chittagong-12', 'x', 11, '1', '2019-04-09'),
(251, '290', 'Chittagong-13', 'Anwara Upazila and part of Patiya Upazila', 11, '1', '2019-04-09'),
(252, '291', 'Chittagong-14', 'Chandanaish Upazila and Satkania Upazila', 11, '1', '2019-04-09'),
(253, '292', 'Chittagong-15', 'Lohagara Upazila', 11, '1', '2019-04-09'),
(254, '293', 'Chittagong-16', 'Banshkhali Upazila', 11, '1', '2019-04-09'),
(255, '294', 'Cox''s Bazar-1', 'x', 39, '1', '2019-04-09'),
(256, '295', 'Cox''s Bazar-2', 'Kutubdia Upazila and Maheshkhali Upazila', 39, '1', '2019-04-09'),
(257, '296', 'Cox''s Bazar-3', 'Cox''s Bazar Sadar Upazila and Ramu Upazila', 39, '1', '2019-04-09'),
(258, '297', 'Cox''s Bazar-4', 'Ukhia Upazila and Teknaf Upazila', 39, '1', '2019-04-09'),
(259, '298', 'Parbatya Khagrachari', 'Khagrachari District', 41, '1', '2019-04-09'),
(260, '299', 'Parbatya Rangamati', 'Rangamati District', 44, '1', '2019-04-09'),
(261, '300', 'Parbatya Bandarban', 'Bandarban District', 44, '1', '2019-04-09'),
(262, '85', 'Jessore-1', 'Sharsha Upazila', 85, '1', '2019-04-09'),
(263, '86', 'Jessore-2', 'Chaugachha Upazila, and Jhikargachha Upazila', 85, '1', '2019-04-09'),
(264, '87', 'Jessore-3', 'Jessore Sadar Upazila', 85, '1', '2019-04-09'),
(265, '88', 'Jessore-4', 'Bagherpara Upazila, Abhaynagar Upazila, Jessore Sadar Upazila', 85, '1', '2019-04-09'),
(266, '89', 'Jessore-5', 'Manirampur Upazila', 85, '1', '2019-04-09'),
(267, '90', 'Jessore-6', 'Keshabpur Upazila', 85, '1', '2019-04-09'),
(268, '130', 'Tangail-1', 'x', 4, '1', '2019-04-09'),
(269, '131', 'Tangail-2', 'x', 4, '1', '2019-04-09'),
(270, '132', 'Tangail-3', 'x', 4, '1', '2019-04-09'),
(273, '136', 'Tangail-7', 'x', 4, '1', '2019-04-09'),
(274, '137', 'Tangail-8', 'x', 4, '1', '2019-04-09'),
(275, '138', 'Jamalpur-1', 'Baksiganj Upazila and Dewanganj Upazila', 47, '1', '2019-04-09'),
(276, '139', 'Jamalpur-2', 'Islampur Upazila', 47, '1', '2019-04-09'),
(277, '140', 'Jamalpur-3', 'Madarganj Upazila and Melandaha Upazila', 47, '1', '2019-04-09'),
(278, '141', 'Jamalpur-4', 'Sarishabari Upazila and part of Jamalpur Sadar Upazila', 47, '1', '2019-04-09'),
(279, '142', 'Jamalpur-5', 'part of Jamalpur Sadar Upazila', 47, '1', '2019-04-09'),
(280, '143', 'Sherpur-1', 'Sherpur Sadar Upazila', 57, '1', '2019-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(20) NOT NULL,
  `divisionsid` tinyint(3) UNSIGNED NOT NULL,
  `status` varchar(2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `code`, `divisionsid`, `status`, `date`) VALUES
(3, 'Dhaka', '26', 1, '1', '2019-03-30'),
(4, 'Tangail', '93', 1, '1', '2019-03-30'),
(5, 'Faridpur', '29', 1, '1', '2019-03-30'),
(6, 'Gazipur', '33', 1, '1', '2019-03-30'),
(7, 'Gopalganj', '35', 1, '1', '2019-03-30'),
(9, 'Madaripur', '54', 1, '1', '2019-03-30'),
(10, 'Bandarban', '3', 10, '1', '2019-03-30'),
(11, 'Chittagong', '15', 4, '1', '2019-03-30'),
(12, 'Comilla', '19', 4, '1', '2019-03-30'),
(13, 'Barguna', '4', 5, '1', '2019-03-30'),
(14, 'Barisal', '6', 5, '1', '2019-03-30'),
(15, 'Bagerhat', '1', 6, '1', '2019-03-30'),
(16, 'Jessore', '41', 40, '1', '2019-03-30'),
(17, 'Khulna', '47', 6, '1', '2019-03-30'),
(21, 'Bogra', '10', 8, '1', '2019-03-30'),
(23, 'Dinajpur', '27', 9, '1', '2019-03-30'),
(24, 'Rangpur', '85', 9, '1', '2019-03-30'),
(25, 'Habiganj', '36', 10, '1', '2019-03-30'),
(27, 'Sylhet', '91', 10, '1', '2019-03-30'),
(28, 'Bagura', '6', 5, '1', '2019-04-09'),
(30, 'Bhola', '9', 5, '1', '2019-04-09'),
(31, 'Jhalokati ', '42', 5, '1', '2019-04-09'),
(32, 'Patuakhali ', '78', 5, '1', '2019-04-09'),
(33, 'Pirojpur', '79', 5, '1', '2019-04-09'),
(35, 'Brahamanbaria', '12', 4, '1', '2019-04-09'),
(36, 'Chandpur ', '13', 4, '1', '2019-04-09'),
(39, 'Cox''S Bazar ', '22', 4, '1', '2019-04-09'),
(40, 'Feni', '30', 4, '1', '2019-04-09'),
(41, 'Khagrachhari', '46', 4, '1', '2019-04-09'),
(42, 'Lakshmipur', '51', 4, '1', '2019-04-09'),
(43, 'Noakhali', '75', 4, '1', '2019-04-09'),
(44, 'Rangamati', '84', 4, '1', '2019-04-09'),
(47, 'Jamalpur ', '39', 1, '1', '2019-04-09'),
(48, 'Kishoreganj ', '48', 1, '1', '2019-04-09'),
(50, 'Manikganj', '56', 1, '1', '2019-04-09'),
(51, 'Munshiganj', '59', 1, '1', '2019-04-09'),
(52, 'Narayanganj', '67', 1, '1', '2019-04-09'),
(53, 'Narsingdi ', '68', 1, '1', '2019-04-09'),
(54, 'Netrakona', '72', 1, '1', '2019-04-09'),
(55, 'Rajbari', '82', 1, '1', '2019-04-09'),
(56, 'Shariatpur', '86', 1, '1', '2019-04-09'),
(57, 'Sherpur', '89', 1, '1', '2019-04-09'),
(59, 'Chuadanga', '18', 6, '1', '2019-04-09'),
(61, 'Jhenaidah ', '44', 6, '1', '2019-04-09'),
(62, 'Kushtia ', '50', 6, '1', '2019-04-09'),
(63, 'Magura ', '55', 6, '1', '2019-04-09'),
(64, 'Meherpur', '57', 6, '1', '2019-04-09'),
(65, 'Narail', '65', 6, '1', '2019-04-09'),
(66, 'Satkhira', '87', 6, '1', '2019-04-09'),
(68, 'Joypurhat ', '38', 8, '1', '2019-04-09'),
(69, 'Naogaon', '64', 8, '1', '2019-04-09'),
(70, 'Natore ', '69', 8, '1', '2019-04-09'),
(71, 'Nawabganj', '70', 8, '1', '2019-04-09'),
(72, 'Pabna ', '76', 8, '1', '2019-04-09'),
(73, 'Rajshahi', '81', 8, '1', '2019-04-09'),
(74, 'Sirajganj ', '88', 8, '1', '2019-04-09'),
(75, 'Kurigram ', '49', 9, '1', '2019-04-09'),
(76, 'Gaibandha', '32', 9, '1', '2019-04-09'),
(77, 'Lalmonirhat ', '52', 9, '1', '2019-04-09'),
(78, 'Nilphamari ', '73', 9, '1', '2019-04-09'),
(79, 'Panchagarh', '77', 9, '1', '2019-04-09'),
(81, 'Thakurgaon', '94', 9, '1', '2019-04-09'),
(83, 'Maulvibazar', '58', 10, '1', '2019-04-09'),
(84, 'Sunamganj', '90', 10, '1', '2019-04-09'),
(85, 'Jessore ', '41', 6, '1', '2019-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `status` varchar(2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `code`, `status`, `date`) VALUES
(1, 'Dhaka', '30', '1', '2019-03-27'),
(4, 'Chattogram', '20', '1', '2019-03-30'),
(5, 'Barishal', '10', '1', '2019-03-30'),
(6, 'Khulna', '40', '1', '2019-03-30'),
(7, 'Mymensingh', '65', '1', '2019-03-30'),
(8, 'Rajshahi', '50', '1', '2019-03-30'),
(9, 'Rangpur', '55', '1', '2019-03-30'),
(10, 'Sylhet', '60', '1', '2019-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `party_list`
--

CREATE TABLE `party_list` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `symbol_name` varchar(255) NOT NULL,
  `president` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL,
  `picture` varchar(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `party_list`
--

INSERT INTO `party_list` (`id`, `name`, `symbol_name`, `president`, `status`, `picture`, `date`) VALUES
(4, 'Jatiya Party', 'Plow', 'Hussein Muhammad Ershad', '1', 'png', '2019-03-30'),
(5, 'Bangladesh Nationalist Party - BNP', 'Rice pine', 'Begum Khaleda Zia', '1', 'jpg', '2019-03-30'),
(6, 'Bangladesh Awami League', 'Boat', 'Sheikh Hasina', '1', 'png', '2019-03-30'),
(7, 'Liberal Democratic Party - LDP', '', '', '1', 'png', '2019-04-07'),
(8, 'Krishak Sramik Janata League', 'Towel', 'Bangabir Kader Siddiqui, Bir Uttam', '1', 'png', '2019-04-07'),
(9, 'Communist Party of Bangladesh', 'scythe', 'Mujahidul Islam Selim', '1', 'jpg', '2019-04-07'),
(10, 'Workers Party of Bangladesh', 'Hammer', 'Rashed Khan Menon', '1', 'jpg', '2019-04-07'),
(11, 'National Socialist Party - JSD', 'Torch', 'Hasanul Haque Inu', '1', 'jpg', '2019-04-07'),
(12, 'Bangladesh Jatiya Party-BJP', 'cart', 'Barrister Andalib Rahman', '1', 'jpg', '2019-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(35) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `districtid` tinyint(4) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fullname`, `email`, `password`, `gender`, `districtid`, `mobile`, `status`, `active`, `type`, `date`) VALUES
(3, 'MD. Litan Sarkar', 'litan@gmail.com', '202cb962ac59075b964b07152d234b70', 'm', 4, '4455666', '1', '1', 'a', '2019-04-05'),
(4, 'jewel', 'jewel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'm', 9, '014789456', '1', '1', 'a', '2019-04-08'),
(5, 'mon', 'mon@gmail.com', '202cb962ac59075b964b07152d234b70', 'm', 13, '1133333', '0', '', 'ad', '2019-06-21'),
(6, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'm', 3, '01829107469', '1', '1', 'a', '2019-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `id` int(10) UNSIGNED NOT NULL,
  `nid` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `candidate_areaid` smallint(5) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(20) NOT NULL,
  `education` varchar(50) NOT NULL,
  `picture` varchar(4) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`id`, `nid`, `first_name`, `last_name`, `father_name`, `candidate_areaid`, `address`, `contact`, `education`, `picture`, `gender`, `dob`, `email`, `nationality`, `religion`, `status`, `date`) VALUES
(1, '12133560986', 'Nurul', 'Islam', 'ismail', 2, 'dhaka bangladesh', '0182383734646', 'H.S.C', 'jpg', 'Male', '2019-04-03', 'nurul@gmail.com', 'Bangladesh', 'Muslim', '1', '2019-04-03'),
(2, '11', 'litan ', 'sarkar', 'Ibrahim', 3, 'dhaka', '11', 'Masters', '', 'Male', '2019-04-06', 'litan@gamil.com', 'Bangladesh', 'Hindu', '1', '2019-04-06'),
(3, '12132539782', 'Mr', ' Jon', 'Mr. Kibriya', 4, 'dhaka 1', '018111111111', 'S.S.C', 'png', 'Male', '1993-02-09', 'jon@gmail.com', 'Bangladesh', 'Muslim', '1', '2019-04-07'),
(4, '12133929083', 'MR. Masum', 'Islam', 'Mr .Ismail', 3, 'Tangail', '01921097564', 'Masters', 'png', 'Male', '1992-06-17', 'masum1@hotmail.com', 'Bangladesh', 'Muslim', '1', '2019-04-07'),
(5, '12133490014', 'Mitu', 'Akter', 'Jon', 3, 'Delduar Tangil', '01729373644', 'S.S.C', 'jpg', 'Female', '1991-10-22', 'mitu@gmail.com', 'Bangladesh', 'Muslim', '1', '2019-04-07'),
(6, '12133147186', 'Mr Kobir', 'Hossan', 'mr. Halim', 1, 'Delduar ', '01493387464', 'Degree', 'png', 'Male', '1983-06-22', 'halim33@gmail.com', 'Bangladesh', 'Muslim', '1', '2019-04-07'),
(7, '12133997994', 'Mim', 'Akter', 'Halim', 3, 'delduar Tangail', '019273635333', 'PHD', 'jpg', 'Female', '1989-02-14', 'mim23@gmail.com', 'Bangladesh', 'Muslim', '1', '2019-04-07'),
(8, '12133643521', 'juwel', 'Dhali', 'Mr.', 3, 'Tangail', '01682633535', 'Degree', 'png', 'Male', '1995-07-19', 'juwel@gmail.com', 'Bangladesh', 'Muslim', '1', '2019-04-07'),
(9, '3026428656', 'Robin', 'Miah', 'ismail', 4, 'dhaka 1 ', '018944664426', 'Degree', 'jpg', 'Male', '1196-06-27', 'robin@hotmail.com', 'Bangladesh', 'Muslim', '1', '2019-06-10'),
(10, '3026565298', 'Mitu', 'Akter', 'Jobbar', 4, 'Dhaka 1 ', '0192235343435', 'PHD', 'png', 'Select One', '1989-06-10', 'mitu@yahoo.com', 'Bangladesh', 'Muslim', '1', '2019-06-10'),
(11, '3026627893', 'Joy', 'Shaha', 'Loknat', 4, 'dhaka 1 dhoha', '01772396054', 'H.S.C', 'png', 'Male', '1990-06-10', 'joy@gmail.com', 'Bangladesh', 'Hindu', '1', '2019-06-10'),
(12, '3026548159', 'Mitun ', 'Roy', 'Davnat', 4, 'dhaka 1`', '01823956544', 'S.S.C', 'png', 'Select One', '1990-06-10', 'devhat1010@gmail.com', 'Bangladesh', 'Hindu', '1', '2019-06-10'),
(13, '2015866488', 'piu', 'akter', 'jon', 254, 'chattogram', '0192837636', 'None', 'png', 'Female', '1998-06-10', 'piu@gmail.com', 'Bangladesh', 'Muslim', '1', '2019-06-10'),
(14, '3093324560', 'md Litan', 'Sarkar', 'Ibrahim', 3, 'Tangail', '01887454', 'Select One', '', 'Select One', '2019-06-24', '', 'Select One', 'Select One', '1', '2019-06-24'),
(15, '3093628112', 'Md litan', 'sarkar', 'ibrahim', 3, 'tangail', '01678899908', 'Masters', 'jpg', 'Male', '2019-06-24', 'litan11@gmail.com', 'Select One', 'Muslim', '1', '2019-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `voter_verify`
--

CREATE TABLE `voter_verify` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voter_verify`
--

INSERT INTO `voter_verify` (`id`, `code`, `nid`, `status`, `date`) VALUES
(3, ' ', '12133643521', '1', '2019-04-08 07:25:27'),
(10, ' ', '3026565298', '1', '2019-06-11 10:53:59'),
(14, ' ', '3026548159', '1', '2019-06-14 13:07:23'),
(16, ' ', '3026627893', '1', '2019-06-15 17:30:25'),
(17, ' ', '12133560986', '1', '2019-06-23 01:54:00'),
(18, ' ', '11', '1', '2019-06-25 16:15:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_area`
--
ALTER TABLE `candidate_area`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seat_no` (`seat_no`),
  ADD UNIQUE KEY `seat_no_2` (`seat_no`,`seat_name`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`divisionsid`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `party_list`
--
ALTER TABLE `party_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nid` (`nid`);

--
-- Indexes for table `voter_verify`
--
ALTER TABLE `voter_verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `candidate_area`
--
ALTER TABLE `candidate_area`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `party_list`
--
ALTER TABLE `party_list`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `voter`
--
ALTER TABLE `voter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `voter_verify`
--
ALTER TABLE `voter_verify`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
