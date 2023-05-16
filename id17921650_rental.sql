-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2023 at 04:38 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17921650_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_srno` int(100) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_author` varchar(75) NOT NULL,
  `book_quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_srno`, `book_title`, `book_author`, `book_quantity`) VALUES
(1, 'The Hill We Clim', 'Amanda Gorman', 3),
(2, 'Home Body', 'Rupi Kaur', 4),
(3, 'The Tradition', 'Jericho Brown', 10),
(4, 'Deaf Republic', 'Ilya Kaminsky', 8),
(5, 'Soft Science', 'Franny Choi', 10),
(6, 'Venus and Adonis', 'William Shakespeare', 11),
(7, 'Hamlet', 'William Shakespeare', 15),
(8, 'The Sun and Her Flowers', 'Rupi Kaur', 5),
(9, 'Mindset', 'carol dweck', 15),
(10, 'The Alchemist', 'paulo Coelho', 5),
(11, 'The Power of Now', 'Eckhart Tolle', 9),
(12, 'Start with why ', 'Simon Sinek', 5),
(13, 'Tell me a Story', 'Ravinder Singh', 11),
(14, 'Lighthouse Road', 'Debbie Macomber', 15),
(15, 'The wedding date', 'Jasmine Guilloey', 4),
(16, 'The serpent Garden', 'Judith Merkle Riley', 7),
(17, 'An unseen attraction', 'K.J. Charles', 8),
(18, 'Wish I Could Tell You', 'Durjoy Datta', 9),
(19, 'Baaz', 'Anuja Chauhan', 10),
(20, 'Two States', 'Chetan Bhagat', 11),
(21, 'Chitra', 'Rabindranath Tagore', 12),
(22, 'Coolie', 'Mulkhraj Anand', 13),
(23, 'My Truth', 'Indira Gandhi', 14),
(24, 'Our films,Their films', 'Satyajit Ray', 15),
(25, 'Post office', 'Rabindranath Tagore', 16),
(26, 'Ravi Paar', 'Gulzar', 17),
(27, 'War of Independence', 'Vir Savarkar', 18),
(29, 'The Turn of the Screw', 'Henry James', 19),
(30, 'The Last Mughal', 'William Dalrymple', 17),
(31, 'The Turn of the Screw', 'Henry James', 19),
(32, 'The Monkey\'s paw', 'W.W. Jacobs', 20),
(33, 'The 5 am club', 'Robin Sharma', 13),
(34, 'Think Like a Monk', 'Jay Shetty', 12),
(35, 'Gone girl', 'Gillian Flynn', 4),
(36, 'Think Again', 'Adam Grant', 5),
(37, 'The House of Strange Stories', 'Ruskin Bond', 8),
(38, 'Better than Bestfriends', 'Ahona Sadhu', 4),
(39, 'A little Book of Happiness', 'Ruskin Bond', 5),
(40, 'Ikigai', 'Rector Garcia and Francesc miralles', 11),
(41, 'The Birth of Kali', 'Anita sivakumaran', 20),
(42, 'A Thing Beyond Forever', 'Novoneel Chakraborty', 18),
(43, 'The mistake', 'Bishwanath Singh', 9),
(44, 'Yesterday I was the moon', 'Noor Unnahar', 15),
(45, 'The Art of Letting go', 'Sunita Baruah', 9),
(46, 'Love hope and Magic', 'Ashish Bagrecha', 8),
(47, 'Rumi', 'Farruk Dhondy', 10),
(48, 'Milk and Honey', 'Rupi Kaur', 9),
(49, 'The moon', 'K. Tolnoe', 8),
(50, 'I know I don\'t know', 'Sonali Sharma', 19),
(51, 'The Wokf', 'K.Tolnoe', 6),
(52, 'The unheard voices', 'Aliana Hirani', 3),
(53, 'September Love', 'Lang leav', 15),
(54, 'Klara and the sun', 'Kazuo Ishiguro', 19),
(55, 'The Fourth Child', 'Jessica winter', 13),
(56, 'Libertie', 'Kaitlyn Greenidge', 5),
(57, 'The book of difficult fruit', 'Kate Lebo', 7),
(58, 'Aftershocks', 'Nadia Owusu', 9),
(59, 'India\'s ancient past', 'Ram sharan sharma', 18),
(60, 'The discovery of India', 'Jawarharlal Nehru', 18),
(61, 'The Last Queen', 'Chitra Banerjee Divakaruni', 11),
(62, 'A mirror made of rain', 'Naheed Phiroze Patel', 20),
(63, 'The Earthspinner', 'Anuradha Roy', 18),
(64, 'Wild and wilful', 'Neha sinha', 16),
(65, 'The Sickle', 'Anita Agnihotri', 12),
(66, 'Write me a love story', 'Ravinder singh', 19),
(67, 'Spooky Stories', 'Tanushree Podder', 18),
(68, 'The Loves of Yuri', 'Jerry Pinto', 14),
(69, 'Water', 'Mridula Ramesh', 8),
(70, 'China room', 'Sunjeev suhota', 10),
(71, 'Asoca', 'Irwin Allan Sealy', 7),
(72, 'Sarojini\'s mother', 'Kunal Basu', 8),
(73, 'Burnt Sugar', 'Avni Doshi', 10),
(74, 'One Arranged Murder', 'Chetan Bhagat', 12),
(75, 'PLANE TRIGONOMETRY- PART 1', 'SL LONEY', 10),
(76, 'Vedic maths made easy', 'Dhaval Bhatia', 15),
(77, 'Higher Algebra', 'Hall and Knight', 12),
(78, 'Higher Engineering Mathematics', 'B.S Grewal', 18),
(79, 'Fundamentals of Mathematical statistics', 'Sultan Chand and Sons', 8),
(80, 'The Elements of Coordinate Geometry', 'SL Loney', 8),
(81, 'Mathematical Formulae and Definations', 'Ramanand Thakur', 6),
(82, 'Problems of Calculus of One Variable', 'IA Maron', 20),
(83, 'Differential Calculus', 'Shanti Narayan', 11),
(84, 'Integral Calculus for beginners', 'Joseph Edwards', 13),
(85, 'Problems in General Physics', 'IE Irdov', 4),
(86, 'Applied Physics for Engineers', 'P.K Diwan', 19),
(87, 'Engineering Physics', 'V.Rajendran', 9),
(88, 'The Chemistry Book', 'Derik Lowe', 10),
(89, 'Basic chemistry', 'John Kenkel', 2),
(90, 'A Textbook of Inorganic Chemistry', 'O.P Tandon', 8),
(91, 'Physical Chemistry', 'Navendra Avasthi', 11),
(92, 'Pharmaceutical Chemistry', 'Ali M', 14),
(93, 'Medicinal Chemistry', 'Ruchi S', 16),
(94, 'Immune', 'phillip deltmer', 17),
(95, 'COMPUTER SCIENCE an overview', 'Glenn Brookshear', 5),
(96, 'Introductory Discrete Mathematics', 'V k Radhakrishnan', 12),
(97, 'Fundamentals of COMPUTERS', 'Reema Thareja', 11),
(98, 'IMAGE PROCESSING FOR COMPUTER GRAPHICS', 'Silvo Levy', 17),
(99, 'Programming in C', 'Reema Thareja', 13),
(100, 'MODEL LOGIC', 'Patrick.B', 19),
(101, 'Artificial Inteligence', 'Michael .W', 5),
(102, 'DEEP MEDICINE', 'Eric Topal', 6),
(103, 'Data interpretation and analysis', 'Adda', 8),
(104, 'COMPUTER APTITUDE', 'Adda', 4),
(105, 'Objective in civil', 'Vs MURTHY', 7),
(106, 'Civil Engineering', 'G.K', 11),
(107, 'Basic Electrical Engineering', 'S.K Bhattacharya', 13),
(108, 'Conventional Civil engineering ', 'JK gupta', 19),
(109, 'OBJECTIVE  EE', 'Rohit Mehta', 9),
(110, 'BASIC MECHENICAL ENGINEERING', 'Pravin K', 8),
(111, 'ME Metrology', 'M adithan', 4),
(112, 'Modern Control engineering ', 'Ogata', 7),
(113, 'Environmental Engineering', 'NN Baskar', 6),
(114, 'Mark', 'Mark', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_book_count` int(11) NOT NULL,
  `book_srno` int(11) NOT NULL,
  `customer_srno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_book_count`, `book_srno`, `customer_srno`) VALUES
(4, 1, 5, 1),
(11, 1, 1, 4),
(12, 1, 3, 4),
(13, 1, 2, 5),
(42, 1, 80, 2),
(45, 1, 4, 2),
(48, 1, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_srno` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_contact` bigint(11) NOT NULL,
  `address_srno` int(11) DEFAULT NULL,
  `login_srno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_srno`, `customer_name`, `customer_contact`, `address_srno`, `login_srno`) VALUES
(1, 'admin', 9856321475, 1, 1),
(2, 'Yash Ghorpade', 9422415779, 2, 3),
(3, 'Ananya', 2312656017, 6, 6),
(6, 'Khushboo', 91031533888, 6, 7),
(7, 'Sam boy', 101020203030, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_srno` int(50) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `employee_contact` int(11) NOT NULL,
  `preferred_pin` int(11) NOT NULL,
  `login_srno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_srno`, `employee_name`, `employee_contact`, `preferred_pin`, `login_srno`) VALUES
(1, 'employee', 156253, 416012, 9);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issue_id` int(50) NOT NULL,
  `issue_date` date DEFAULT NULL,
  `order_date` date NOT NULL,
  `issue_status` char(1) NOT NULL,
  `book_srno` int(11) NOT NULL,
  `customer_srno` int(11) NOT NULL,
  `employee_srno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`issue_id`, `issue_date`, `order_date`, `issue_status`, `book_srno`, `customer_srno`, `employee_srno`) VALUES
(1, NULL, '2021-11-24', 'o', 1, 6, 1),
(2, NULL, '2021-11-24', 'o', 3, 6, 1),
(3, '2021-11-24', '2021-11-24', 'd', 3, 7, 1),
(4, '2021-12-08', '2021-12-05', 'c', 30, 2, 1),
(10, '2021-12-08', '2021-12-07', 'c', 15, 2, 1),
(13, '2021-12-08', '2021-12-08', 'c', 2, 2, 1),
(18, NULL, '2021-12-08', 'o', 11, 2, 1),
(19, NULL, '2021-12-08', 'o', 15, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `address_srno` int(100) NOT NULL,
  `address` varchar(60) NOT NULL,
  `State` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`address_srno`, `address`, `State`, `City`, `Pincode`) VALUES
(1, 'plot number 37 abc', 'maharashtra', 'kolhapur', 416012),
(2, 'Kolhapur', 'Maharashtra', 'Kolhapur', 416012),
(3, 'Dipti palace nagala park new palace road', 'MAHARASHTRA', 'KOLHAPUR', 416003),
(6, 'Dutta colony ,jammu', 'Jammu and Kashmir', 'Jammu', 181234),
(7, 'United States of Kolhapur ', 'Maharashtra ', 'Kolhapur ', 440);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_srno` int(100) NOT NULL,
  `login_email` varchar(50) NOT NULL,
  `login_password` text NOT NULL,
  `login_username` varchar(30) NOT NULL,
  `login_role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_srno`, `login_email`, `login_password`, `login_username`, `login_role`) VALUES
(1, 'admin@admin', 'e7255d6d2d37cd3dd5a1b7869350b90c', 'admin', 'o'),
(2, 'yashmayughorpade1@gmail.com', 'c296539f3286a899d8b3f6632fd62274', 'yashm', 'c'),
(3, 'yashmayughorpade@gmail.com', 'c296539f3286a899d8b3f6632fd62274', 'yash', 'c'),
(4, 'pjadhav3031@gmail.com', '76b851c9b786083d93caf486161979d5', 'prathamesh', 'c'),
(5, 'tkhushboo36@gmail.com', '3f8b267744f7077e5ccaf1a39cbe25b5', 'Admin1', 'c'),
(6, 'anushetti17@gmail.com', '8dc699704b3556b5f9d590b2b499c1a8', 'Ananya', 'c'),
(7, 'kishuuuthakur@gmail.com', '202cb962ac59075b964b07152d234b70', 'Khushboo', 'c'),
(8, 'sarveshchougule222@gmail.com', '2ec6f4cb513bcfacd3c1123eb5c3cf38', 'sam', 'c'),
(9, 'employee@employee', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 'employee', 'e'),
(10, 'rvjadhav5884@gmail.com', 'd99430a659d4730ffb9c6b6ca6a24ed2', 'Rahul', 'c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_srno`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `book_srno` (`book_srno`),
  ADD KEY `customer_srno` (`customer_srno`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_srno`),
  ADD KEY `login_srno` (`login_srno`),
  ADD KEY `address_srno` (`address_srno`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_srno`),
  ADD KEY `login_srno` (`login_srno`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `book_srno` (`book_srno`),
  ADD KEY `customer_srno` (`customer_srno`),
  ADD KEY `employee_srno` (`employee_srno`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`address_srno`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_srno`),
  ADD UNIQUE KEY `login_email` (`login_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_srno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_srno` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `issue_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_srno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`book_srno`) REFERENCES `book` (`book_srno`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`customer_srno`) REFERENCES `customer` (`customer_srno`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`login_srno`) REFERENCES `login` (`login_srno`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`address_srno`) REFERENCES `location` (`address_srno`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`login_srno`) REFERENCES `login` (`login_srno`);

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`book_srno`) REFERENCES `book` (`book_srno`),
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`customer_srno`) REFERENCES `customer` (`customer_srno`),
  ADD CONSTRAINT `issue_ibfk_3` FOREIGN KEY (`employee_srno`) REFERENCES `employee` (`employee_srno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
