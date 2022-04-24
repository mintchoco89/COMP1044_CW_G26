-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 06:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(8) NOT NULL,
  `book_title` varchar(80) NOT NULL,
  `category_id` int(8) NOT NULL,
  `author` varchar(80) NOT NULL,
  `book_copies` int(8) NOT NULL,
  `book_publisher` varchar(80) NOT NULL,
  `publisher_city` varchar(80) NOT NULL,
  `isbn` varchar(80) NOT NULL,
  `copyright_year` int(8) NOT NULL,
  `date_receive` date NOT NULL,
  `date_added` date NOT NULL,
  `status` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `category_id`, `author`, `book_copies`, `book_publisher`, `publisher_city`, `isbn`, `copyright_year`, `date_receive`, `date_added`, `status`) VALUES
(15, 'Natural Resources\r\n', 8, 'Robin Kerrod', 16, 'Marshall Cavendish Corporation', 'Singapore', '1-85435-628-3', 1997, '2013-12-12', '2013-12-30', 'New'),
(16, 'Encyclopedia Americana', 5, 'Francis Lieber', 20, 'Grolier Incorporation', 'Connecticut, United States', '0-7172-0119-8', 1988, '2013-12-13', '2013-12-30', 'Archive'),
(17, 'Algebra 1', 3, 'Carolyn Bradshaw, Michael Seals', 35, 'Pearson Education, Inc', 'London, United Kingdom', '0-13-125087-6', 2004, '2013-12-14', '2013-12-30', 'Damage'),
(18, 'The Philippine Daily Inquirer', 7, 'Joseph Voltaire Contreras', 3, 'Raul Pangalanan', 'Makati, Philippines', '978-971-893539-2', 2013, '2013-12-15', '2013-12-30', 'New'),
(19, 'Science in our World', 4, 'Brian Knapp', 25, 'Regency Publishing Group', 'Hertfordshire, United Kingdom', '978-1869860356', 1996, '2013-12-16', '2013-12-30', 'Lost'),
(20, 'Literature', 9, 'Greg Glowka', 20, 'Regency Publishing Group', 'Hertfordshire, United Kingdom', '0-13-050841-1\r\n', 2001, '2013-12-17', '2013-12-30', 'Old'),
(21, 'Lexicon Universal Encyclopedia', 5, 'Lexicon', 10, 'Lexicon Publication', 'New York, United States', '0-7172-2043-5', 1993, '2013-12-18', '2013-12-30', 'Old'),
(22, 'Science and Invention Encyclopedia', 5, 'Clarke Donald, Dartford Mark', 16, 'H.S. Stuttman Marshall Cavendish', 'Singapore', '0-87475-450-9', 1992, '2013-12-19', '2013-12-30', 'New'),
(23, 'Integrated Science Textbook ', 4, 'Merde C. Tan', 15, 'Vibal Publishing House Inc.', 'Quezon City, Philipppines', '971-570-124-8', 2009, '2013-12-20', '2013-12-30', 'New'),
(24, 'Algebra 2', 3, 'Glencoe McGraw Hill', 15, 'The McGrawHill Companies Inc.', 'New York, United States', '978-0-07-873830-2', 2008, '2013-12-21', '2013-12-30', 'New'),
(25, 'Wiki at Panitikan ', 7, 'Lorenza P. Avera', 28, 'JGM & S Corporation', 'Makati, Philippines', '971-07-1574-7', 2000, '2013-12-22', '2013-12-30', 'Damage'),
(26, 'English Expressways TextBook for 4th year', 9, 'Virginia Bermudez Ed. O. et al', 23, 'SD Publications, Inc.', 'Quezon City, Philipppines', '978-971-0315-33-8', 2007, '2013-12-23', '2013-12-30', 'New'),
(27, 'Asya Pag-usbong Ng Kabihasnan ', 8, 'Ricardo T. Jose, Ph . D.', 21, 'Vibal Publishing House Inc.', 'Quezon City, Philipppines', '971-07-2324-3', 2008, '2013-12-24', '2013-12-30', 'New'),
(28, 'Literature (the readers choice)', 9, 'Glencoe McGraw Hill', 20, 'The McGrawHill Companies Inc.', 'New York, United States', '0-02-817934-3', 2001, '2013-12-25', '2013-12-30', 'Damage'),
(29, 'Beloved a Novel', 9, 'Toni Morrison', 13, 'Alfred A. Knopf, Inc', 'New York, United States', '0-394-53597-9', 1987, '2013-12-26', '2013-12-30', 'Old'),
(30, 'Silver Burdett Engish', 2, 'Judy Brim', 11, 'Silver Burdett Company', 'New York, United States', '0-382-03575-5', 1985, '2013-12-27', '2012-12-30', 'Old'),
(31, 'The Corporate Warriors (Six Classic Cases in American Business)', 8, 'Douglas K. Ramsey', 8, 'Houghton Mifflin Company', 'Massachusetts, United States', '0-395-35487-0', 1987, '2013-12-28', '2013-12-30', 'Old'),
(32, 'Introduction to Information System', 9, 'Cristine Redoblo', 10, 'Carlos Hilado Memorial State College', 'Talisay, Philippines', '0-394-53586-5', 2013, '2014-01-18', '2014-01-20', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(8) NOT NULL,
  `member_id` int(8) NOT NULL,
  `date_borrow` date NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `member_id`, `date_borrow`, `due_date`) VALUES
(482, 55, '2014-03-07', '2014-03-21'),
(483, 55, '2014-03-07', '2014-03-21'),
(484, 52, '2013-12-20', '2014-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `borrowdetails`
--

CREATE TABLE `borrowdetails` (
  `borrow_details_id` int(8) NOT NULL,
  `book_id` int(8) NOT NULL,
  `borrow_id` int(8) NOT NULL,
  `borrow_status` varchar(80) NOT NULL,
  `date_return` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowdetails`
--

INSERT INTO `borrowdetails` (`borrow_details_id`, `book_id`, `borrow_id`, `borrow_status`, `date_return`) VALUES
(162, 15, 482, 'pending', NULL),
(163, 15, 483, 'returned', '2014-03-21'),
(164, 16, 484, 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(8) NOT NULL,
  `classname` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `classname`) VALUES
(1, 'Periodical'),
(2, 'English'),
(3, 'Math'),
(4, 'Science'),
(5, 'Encyclopedia'),
(6, 'Filipiniana'),
(7, 'Newspaper'),
(8, 'General'),
(9, 'References');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(8) NOT NULL,
  `firstname` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL,
  `gender` varchar(80) NOT NULL,
  `address` varchar(80) NOT NULL,
  `contact` varchar(80) NOT NULL,
  `type_id` int(8) NOT NULL,
  `year_level` varchar(80) NOT NULL,
  `status` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `firstname`, `lastname`, `gender`, `address`, `contact`, `type_id`, `year_level`, `status`) VALUES
(52, 'Mark', 'Sanchez', 'Male', 'Talisay', '0112345678', 19, 'Faculty', 'Active'),
(53, 'April Joy', 'Aguilar', 'Female', 'E.B. Magalona\r\n', '0112345679\r\n', 22, 'Second Year', 'Banned'),
(54, 'Alfonso', 'Pancho', 'Male', 'E.B. Magalona', '0162345678\r\n', 22, 'First Year', 'Active'),
(55, 'Jonathan', 'Antanilla', 'Male', 'E.B. Magalona', '0132345673\r\n', 22, 'Fourth Year', 'Active'),
(56, 'Renzo Bryan', 'Pedroso', 'Male', 'Silay City', '0162345679', 22, 'Third Year', 'Active'),
(57, 'Eleazar', 'Duterte', 'Male', 'E.B. Magalona', '0132345679', 22, 'Second Year', 'Active'),
(58, 'Ellen Mae', 'Espino', 'Female', 'E.B. Magalona', '0132345674', 22, 'First Year', 'Active'),
(59, 'Ruth', 'Magbanua', 'Female', 'E.B. Magalona', '0165367723', 22, 'Second Year', 'Active'),
(60, 'Shaina Marie', 'Gabino', 'Female', 'Silay City', '0165297334', 22, 'Second Year', 'Active'),
(61, 'Charity Joy', 'Punzalan', 'Female', 'E.B. Magalona', '0135167324', 19, 'Faculty', 'Active'),
(62, 'Kristine May', 'Dela Rosa', 'Female', 'Silay City', '0139236283', 22, 'Second Year', 'Active'),
(63, 'Chinie Marie\r\n', 'Laborosa', 'Female', 'E.B. Magalona', '0139275123', 22, 'Second Year', 'Active'),
(64, 'Ruby', 'Morante', 'Female', 'E.B. Magalona', '0165273843', 19, 'Faculty', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(8) NOT NULL,
  `borrowtype` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `borrowtype`) VALUES
(19, 'Teacher'),
(20, 'Employee'),
(21, 'Non-Teaching'),
(22, 'Student'),
(23, 'Construction');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `firstname` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'admin', 'admin', 'John', 'Smith'),
(2, 'apriljoyaguilar', 'abc1234', 'April Joy', 'Aguilar'),
(3, 'alfonsopancho', 'abcd123', 'Alfonso', 'Pancho'),
(4, 'jonathanantanilla', 'abcd1234', 'Jonathan', 'Antanilla'),
(5, 'renzobryanpedroso', 'ab123', 'Renzo Bryan', 'Pedroso'),
(6, 'eleazarduterte', 'ab1234', 'Eleazar', 'Duterte'),
(7, 'ellenmaeespino', 'abcde123', 'Ellen Mae', 'Espino'),
(8, 'ruthmagbanua', 'abcde1234', 'Ruth', 'Magbanua'),
(9, 'shainamariegabino', '123456', 'Shaina Marie', 'Gabino'),
(10, 'chairtyjoypunzalan\r\n', '1234', 'Charity Joy', 'Punzalan'),
(11, 'kristinemaydelarosa', '1234567', 'Kristine May', 'Dela Rosa'),
(12, 'chiniemarielaborosa', '12345', 'Chinie Marie', 'Laborosa'),
(13, 'rubymorante', '12345678', 'Ruby', 'Morante'),
(14, 'marksanchez', 'abc123', 'Mark', 'Sanchez');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD PRIMARY KEY (`borrow_details_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `borrow_id` (`borrow_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD CONSTRAINT `borrowdetails_ibfk_1` FOREIGN KEY (`borrow_id`) REFERENCES `borrow` (`borrow_id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
