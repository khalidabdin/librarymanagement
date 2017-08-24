-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2017 at 11:17 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `adminid` int(8) NOT NULL,
  `password` varchar(250) NOT NULL,
  `universityid` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`adminid`, `password`, `universityid`) VALUES
(20000001, 'd34e7d2facf6044e15e77a5fd0fd3aad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Author` varchar(50) NOT NULL,
  `ISBN` char(14) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Edition` int(2) NOT NULL,
  `Publisher` varchar(30) NOT NULL,
  `Year_Pub` int(4) NOT NULL,
  `Sub_Name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Author`, `ISBN`, `Title`, `Category`, `Edition`, `Publisher`, `Year_Pub`, `Sub_Name`) VALUES
('Benjamin Graham', '0060555661', 'The Intelligent Investor', 'Business', 1, 'Harper Business', 2006, 'Finance'),
('Kjell B. Zandin', '0070411026', 'Maynard\'s Industrial Engineering Handbook', 'Engineering', 5, 'McGraw-Hill Education', 2001, 'Engineering'),
('Frank J. Fabozzi', '0071768467', 'The Handbook of Fixed Income Securities', 'Business', 8, 'McGraw-Hill Education', 2012, 'Finance'),
('Douglas Gray ', '0071784713', 'Complete Canadian Small Business Guide', 'Business', 4, 'McGraw-Hill Education', 2013, 'Business'),
('Steven Rose', '0073101699', 'The Chemistry of Life', 'Science', 4, 'Penguin', 1999, 'Chemistry'),
('David A. Patterson', '0123704901', 'Computer Architecture: A Quantitative Approach', 'Computer Science', 4, 'Morgan Kaufmann', 2006, 'Computer'),
('John L. Hennessy', '0123944244', 'Digital Design and Computer Architecture', 'Computer Science ', 2, 'Morgan Kaufmann', 2012, 'Computer'),
('Lorne Tepperman', '0195443802', 'Sociology: A Canadian Perspective', 'Sociology', 3, 'Oxford University Press', 2012, 'Sociology'),
('Bjarne Stroustrup', '0201543303', 'The Design and Evolution of C++', 'Computer Science', 1, 'Addison-Wesley Professional', 1994, 'Computer Science'),
('David Harris', '0205973361', 'Psychology', 'Psychology', 4, ' Pearson ', 2014, 'Psychology'),
('Frank J. Fabozzi', '0262029480', 'Capital Markets: Institutions, Instruments, and Risk Management', 'Business', 5, 'The MIT Press', 2015, 'Finance'),
('Bjarne Stroustrup', '0321563840', 'The C++ Programming Language', 'Computer Science', 4, 'Addison-Wesley Professional', 2013, 'Computer Science'),
('Sarah Harris', '0321696867', 'University Physics with Modern Physics ', 'Physics', 13, 'Addison-Wesley ', 2011, 'Physics'),
('Rogerio Studart', '0415108667', 'Investment Finance in Economic Development', 'Business', 1, 'Routledge', 1995, 'Finance'),
('Frank J. Fabozzi', '0470929914', 'Equity Valuation and Portfolio Management', 'Business', 1, 'Wiley', 2011, 'Finance'),
('Bernard Friedland', '0486442780', 'Control System Design', 'Engineering', 1, 'Dover Publications', 2005, 'Engineering'),
('Neil A. Campbell', '0805366245', 'Biology', 'Science', 6, 'Benjamin Cummings', 2001, 'Biology'),
('James Stewart', '1285741552', 'Calculus Early Transcendentals', 'Mathematics', 8, 'Brooks Cole', 2015, 'Mathematics'),
('John Scherk', '1584880643', 'Algebra: A Computational Introduction', 'Mathematics', 1, 'Chapman and Hall', 2000, 'Mathematics'),
('Frederic Bastiat ', '1940177014', 'The Law', 'Law', 1, 'Creative Commons', 2013, 'Law');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `universityid` int(8) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `ISBN` char(14) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Edition` int(2) NOT NULL,
  `Publisher` varchar(30) NOT NULL,
  `Year_Pub` int(4) NOT NULL,
  `dateissued` date NOT NULL,
  `datereturned` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`universityid`, `Author`, `ISBN`, `Title`, `Category`, `Edition`, `Publisher`, `Year_Pub`, `dateissued`, `datereturned`) VALUES
(10222222, 'Benjamin Graham', '0060555661', 'The Intelligent Investor', 'Business', 1, 'Harper Business', 2006, '2017-08-23', '2017-09-22'),
(10303030, 'John L. Hennessy', '0123944244', 'Digital Design and Computer Architecture', 'Computer Science', 2, 'Morgan Kaufmann', 2012, '2017-08-25', '2017-09-25'),
(10303030, 'David A. Patterson', '0123704901', 'Computer Architecture: A Quantitative Approach', 'Computer Science', 4, 'Morgan Kaufmann', 2006, '2017-08-31', '2017-09-29'),
(10999999, 'Frank J. Fabozzi', '0470929914', 'Equity Valuation and Portfolio Management', 'Business', 1, 'Wiley', 2011, '2017-09-05', '2017-10-05'),
(10222222, 'John Scherk', '1584880643', 'Algebra: A Computational Introduction', 'Mathematics', 1, 'Chapman and Hall', 2000, '2017-09-27', '2017-10-27'),
(10404040, 'Frederic Bastiat', '1940177014', 'The Law', 'Law', 1, 'Creative Commons', 2013, '2017-09-11', '2017-10-11'),
(10303030, 'Bjarne Stroustrup', '0321563840', 'The C++ Programming Language', 'Computer Science', 4, 'Addison-Wesley Professional', 2013, '2017-09-20', '2017-10-20'),
(10303030, 'Bjarne Stroustrup', '0201543303', 'The Design and Evolution of C++', 'Computer Science', 1, 'Addison-Wesley Professional', 1994, '2017-09-13', '2017-10-13'),
(10222222, 'James Stewart', '1285741552', 'Calculus Early Transcendentals', 'Mathematics', 8, 'Brooks Cole', 2015, '2017-09-23', '2017-10-23'),
(10999999, 'Rogerio Studart', '0415108667', 'Investment Finance in Economic Development', 'Business', 1, 'Routledge', 1995, '2017-09-01', '2017-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `client_ident`
--

CREATE TABLE `client_ident` (
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `universityid` int(8) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_ident`
--

INSERT INTO `client_ident` (`fname`, `lname`, `universityid`, `password`) VALUES
('khalid', 'mohd', 1001111, '307ad33bee0662531575392d18c29c75'),
('khalid', 'zein', 10002222, '6afb4cd984f56d34f404c34e365d59fc'),
('John', 'Zein', 10077777, '307ad33bee0662531575392d18c29c75'),
('peter', 'john', 10101010, '112bb25b62812f49ffbbf4e98521350d'),
('khalid', 'dwayne', 10111111, '3c256b2ff64fe7bce6111e6da88598ba'),
('abed', 'alkhateeb', 10202020, '112bb25b62812f49ffbbf4e98521350d'),
('mohd', 'khalid', 10303030, 'dcabe0428f84244aa50350892d36b42b'),
('wil', 'smith', 10404040, 'be25ac0ca4f43c6dd806538bd7511868'),
('khalid', 'peter', 10777777, '0c0f3f162431acaf9e5120a0cdd473d2'),
('eddie', 'jordan', 10808080, '6018a8846dc64b107bfccf9f198b79c9'),
('lebron', 'james', 10909090, 'b8d6bbd57538791f346b1172b984d4f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `universityID` (`adminid`),
  ADD KEY `universityid_2` (`universityid`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `Sub_Name` (`Sub_Name`),
  ADD KEY `Title` (`Title`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD KEY `ISBN` (`ISBN`),
  ADD KEY `University_ID` (`universityid`);

--
-- Indexes for table `client_ident`
--
ALTER TABLE `client_ident`
  ADD PRIMARY KEY (`universityid`),
  ADD UNIQUE KEY `universityID` (`universityid`),
  ADD KEY `University_ID` (`universityid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD CONSTRAINT `borrowed_books_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
