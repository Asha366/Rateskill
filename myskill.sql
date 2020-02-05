-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 07:47 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myskill`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delans`(IN `acod` INT)
    NO SQL
begin
delete from tbans where anscod=acod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delqst`(IN `qcod` INT)
    NO SQL
begin
delete from tbqst where qstcod=qcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delreg`(IN `rcod` INT)
    NO SQL
begin 
delete from tbreg where regcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deltec`(IN `tcod` INT)
    NO SQL
begin
delete from tbtec where teccod=tcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispans`(IN `qcod` INT)
    NO SQL
begin
select * from tbans where ansqstcod=qcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispqst`(IN `tcod` INT)
    NO SQL
begin 
select * from tbqst where qstteccod=tcod order by qstdat desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispreg`()
    NO SQL
begin
select * from tbreg;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `disptec`()
    NO SQL
begin
select * from tbtec;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspqstbyteclvl`(IN `tcod` INT, IN `lvl` CHAR(1))
    NO SQL
select * from tbqst where qstteccod=tcod and qstlvl=lvl order by qstdat DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findans`(IN `acod` INT)
    NO SQL
begin
select * from tbans where anscod=acod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findqst`(IN `qcod` INT)
    NO SQL
begin
select * from tbqst where qstcod=qcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findreg`(IN `rcod` INT)
    NO SQL
begin
select * from tbreg where regcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findtec`(IN `tcod` INT)
    NO SQL
begin
select * from tbtec where teccod=tcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insans`(IN `aqstcod` INT, IN `adsc` VARCHAR(2000), IN `asts` CHAR(1))
    NO SQL
begin
insert tbans values(null,aqstcod,adsc,asts);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insqst`(IN `qdsc` VARCHAR(2000), IN `qteccod` INT, IN `qlvl` CHAR(1), IN `qstdat` DATETIME)
    NO SQL
begin
insert tbqst values(null,qdsc,qteccod,qlvl,qstdat);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insreg`(IN `reml` VARCHAR(100), IN `rpwd` VARCHAR(50), IN `rdat` DATETIME, IN `rsts` CHAR(1))
    NO SQL
begin
insert tbreg values(null,reml,rpwd,rdat,rsts);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `instec`(IN `tname` VARCHAR(100))
    NO SQL
begin
insert tbtec values(null,tname);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logincheck`(IN `eml` VARCHAR(100), IN `pwd` VARCHAR(100), OUT `cod` INT, OUT `rol` CHAR(1))
    NO SQL
BEGIN
declare actpwd varchar(50);
select regpwd from tbreg where regeml=eml into @actpwd;
if @actpwd is null THEN
   set cod=-1;
   set rol='N';
else
if pwd=@actpwd then
select regcod from tbreg where regeml=eml into cod;
select regsts from tbreg where regeml=eml into rol;
else
	set cod=-2;
    set rol='N';
end if;
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updans`(IN `acod` INT, IN `aqstcod` INT, IN `adsc` VARCHAR(2000), IN `asts` CHAR(1))
    NO SQL
begin
update tbans set ansqstcod=aqstcod,ansdsc=adsc,anssts=asts where anscod=acod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updqst`(IN `qcod` INT, IN `qdsc` VARCHAR(2000), IN `qteccod` INT, IN `qlvl` CHAR(1), IN `qdat` DATETIME)
    NO SQL
begin
update tbqst set qstdsc=qdsc,qstteccod=qteccod,qstlvl=qlvl where qstcod=qcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updreg`(IN `rcod` INT, IN `reml` VARCHAR(100), IN `rpwd` VARCHAR(50), IN `rdat` DATETIME, IN `rsts` CHAR(1))
    NO SQL
begin
update tbreg set regeml=reml,regpwd=rpwd,regdat=rdat,regsts=rsts where regcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updtec`(IN `tcod` INT, IN `tname` VARCHAR(100))
    NO SQL
begin
update tbtec set tecname=tname where teccod=tcod;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbans`
--

CREATE TABLE IF NOT EXISTS `tbans` (
  `anscod` int(11) NOT NULL AUTO_INCREMENT,
  `ansqstcod` int(11) NOT NULL,
  `ansdsc` varchar(2000) NOT NULL,
  `anssts` char(1) NOT NULL,
  PRIMARY KEY (`anscod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=137 ;

--
-- Dumping data for table `tbans`
--

INSERT INTO `tbans` (`anscod`, `ansqstcod`, `ansdsc`, `anssts`) VALUES
(1, 1, 'Php Hypertext Processor', 'F'),
(2, 1, 'Php Hypertext Preprocessor', 'T'),
(3, 1, 'Php Hypermarkup Preprocessor', 'F'),
(4, 1, 'Php Hypermarkup Processor', 'F'),
(5, 2, ' Server-side', 'T'),
(6, 2, 'Clint-side  ', 'F'),
(7, 2, 'Middle-side', 'F'),
(8, 2, 'Out-side', 'F'),
(9, 3, 'ISP Computer', 'F'),
(10, 3, 'Client Computer', 'F'),
(11, 3, 'Server Computer', 'T'),
(12, 3, 'It depends on PHP scripts', 'F'),
(17, 5, 'Out', 'F'),
(18, 5, 'Write', 'F'),
(19, 5, ' Echo', 'T'),
(20, 5, 'Display', 'F'),
(21, 10, 'Local', 'F'),
(22, 10, 'Global', 'F'),
(23, 10, 'Static', 'F'),
(24, 10, 'Extern', 'T'),
(25, 7, '! (Exclamation)', 'F'),
(26, 7, '& (Ampersand)', 'F'),
(27, 7, '* (Asterisk)', 'F'),
(28, 7, '$ (Dollar)', 'T'),
(29, 8, 'True', 'T'),
(30, 8, 'False', 'F'),
(31, 8, 'Depends on website', 'F'),
(32, 8, 'Depends on server', 'F'),
(33, 9, 'True', 'F'),
(34, 9, 'False', 'T'),
(35, 9, ' Depends on website', 'F'),
(36, 9, 'Depends on server', 'F'),
(37, 6, '. (dot)', 'F'),
(38, 6, '; (semicolon)', 'T'),
(39, 6, '/ (slash)', 'F'),
(40, 6, ': (colon)', 'F'),
(41, 11, 'readable language', 'T'),
(42, 11, 'writable language', 'F'),
(43, 11, 'bug-able language', 'F'),
(44, 11, 'script-able language', 'F'),
(45, 12, 'Python', 'T'),
(46, 12, 'Perl', 'F'),
(47, 12, 'PHP', 'F'),
(48, 12, 'Ada', 'F'),
(49, 13, '1941', 'F'),
(50, 13, '1971', 'F'),
(51, 13, '1981', 'F'),
(52, 13, '1991', 'T'),
(53, 14, 'Conditional types', 'F'),
(54, 14, 'Compound types', 'F'),
(55, 14, 'Enumeration types', 'T'),
(56, 14, 'None of them', 'F'),
(57, 15, 'Statement', 'F'),
(58, 15, 'Block of statements', 'F'),
(59, 15, 'Operator', 'F'),
(60, 15, 'Both A and B', 'T'),
(61, 16, 'Operators', 'F'),
(62, 16, 'Variables', 'F'),
(63, 16, 'Enumerators', 'T'),
(64, 16, 'Enum', 'F'),
(65, 17, 'For loop', 'F'),
(66, 17, 'Foreach loop', 'F'),
(67, 17, 'While loop', 'T'),
(68, 17, 'NOne Of these', 'F'),
(69, 18, 'Class diagram', 'T'),
(70, 18, 'sequential diagram', 'F'),
(71, 18, 'use case diagram', 'F'),
(72, 18, 'communication diagram', 'F'),
(73, 19, 'Grady Booch', 'F'),
(74, 19, 'James Rumbaugh', 'F'),
(75, 19, 'Ivar Jacobson', 'T'),
(76, 19, 'Robert Lafore', 'F'),
(77, 20, 'HTMLForms', 'F'),
(78, 20, 'Webforms', 'T'),
(79, 20, 'Winforms', 'F'),
(80, 25, 'Configures the time that the server-side codebehind module is called', 'F'),
(82, 25, 'To store the global information and variable definitions for the application', 'T'),
(83, 25, 'To configure the web server', 'F'),
(84, 25, 'To configure the web browser', 'F'),
(85, 26, 'Server.CreateObject("Scripting.FileSystemObject")', 'T'),
(86, 26, 'Create("FileSystemObject")', 'F'),
(87, 26, 'Create Object:"Scripting.FileSystemObject"', 'F'),
(88, 26, 'Server.CreateObject("FileSystemObject")', 'F'),
(89, 22, 'Page_Init()', 'T'),
(90, 22, 'Page_Load()', 'F'),
(91, 22, 'Page_click()', 'F'),
(92, 23, 'Response.Output.Write() allows you to buffer output', 'F'),
(93, 23, 'Response.Output.Write() allows you to write formatted output', 'T'),
(94, 23, 'Response.Output.Write() allows you to flush output', 'F'),
(95, 23, 'Response.Output.Write() allows you to stream output', 'F'),
(96, 24, 'The Paint() method', 'F'),
(97, 24, 'The Control_Build() method', 'F'),
(98, 24, ' The default constructor', 'F'),
(99, 24, 'The Render() method', 'F'),
(100, 27, 'Bjarne Stroustrup', 'F'),
(101, 27, 'Dennis Ritchie\r\n', 'T'),
(102, 27, 'James A. Gosling', 'F'),
(103, 27, 'Dr. E.F. Codd\r\n', 'F'),
(104, 28, ' Sun Microsystems in 1973', 'F'),
(105, 28, ' Cambridge University in 1972\r\n', 'F'),
(107, 28, 'Sun Microsystems in 1973\r\n', 'F'),
(108, 28, 'Cambridge University in 1972\r\n', 'T'),
(109, 30, '[]\r\n', 'F'),
(110, 30, ' {}\r\n', 'F'),
(111, 30, '()\r\n', 'T'),
(112, 30, ' None of the above\r\n', 'F'),
(113, 31, ' An array is a collection of variables that are of the dissimilar data type.', 'F'),
(114, 31, ' An array is a collection of variables that are of the same data type.\r\n', 'T'),
(115, 31, ' An array is not a collection of variables that are of the same data type', 'F'),
(116, 31, ' None of the above.\r\n', 'F'),
(117, 32, ' int num[6] = { 2, 4, 12, 5, 45, 5 } ;', 'T'),
(118, 32, ' int n{} = { 2, 4, 12, 5, 45, 5 } ;\r\n', 'F'),
(119, 32, ' int n{6} = { 2, 4, 12 } ;\r\n', 'F'),
(120, 32, ' int n(6) = { 2, 4, 12, 5, 45, 5 } ;', 'F'),
(121, 33, ' double and chars\r\n', 'F'),
(122, 33, ' floats and doubles', 'F'),
(123, 33, ' ints and floats\r\n', 'F'),
(124, 33, 'ints and chars\r\n', 'T'),
(125, 34, ' Keywords have some predefine meanings and these meanings can be changed.\r\n', 'F'),
(126, 34, 'Keywords have some unknown meanings and these meanings cannot be changed.', 'F'),
(127, 34, 'Keywords have some predefine meanings and these meanings cannot be changed.\r\n', 'T'),
(128, 34, ' None of the above\r\n', 'F'),
(129, 35, ' Constants have fixed values that do not change during the execution of a program', 'T'),
(130, 35, 'Constants have fixed values that change during the execution of a program', 'F'),
(131, 35, 'Constants have unknown values that may be change during the execution of a program', 'F'),
(132, 35, 'None of the above', 'F'),
(133, 29, 'An alphabet\r\n', 'F'),
(134, 29, 'A number\r\n', 'F'),
(135, 29, 'A special symbol other than underscore', 'F'),
(136, 29, 'both (b) and (c)\r\n', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tbqst`
--

CREATE TABLE IF NOT EXISTS `tbqst` (
  `qstcod` int(11) NOT NULL AUTO_INCREMENT,
  `qstdsc` varchar(2000) NOT NULL,
  `qstteccod` int(11) NOT NULL,
  `qstlvl` char(1) NOT NULL,
  `qstdat` datetime NOT NULL,
  PRIMARY KEY (`qstcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbqst`
--

INSERT INTO `tbqst` (`qstcod`, `qstdsc`, `qstteccod`, `qstlvl`, `qstdat`) VALUES
(1, 'PHP Stands for                                                               ', 2, 'B', '2019-07-18 00:00:00'),
(2, 'PHP is _______ scripting language.                                                          ', 2, 'B', '2019-07-18 00:00:00'),
(3, '  PHP scripts are executed on _________                                                         ', 2, 'B', '2019-07-18 00:00:00'),
(5, '  Which of the following statements prints in PHP?                                                             ', 2, 'I', '2019-07-18 00:00:00'),
(6, ' In PHP, each statement must be end with ______                                                               ', 2, 'I', '2019-07-18 00:00:00'),
(7, 'In PHP Language variables name starts with _____                                                               ', 2, 'E', '2019-07-18 00:00:00'),
(8, 'In PHP Language variables are case sensitive                                                          ', 2, 'E', '2019-07-18 00:00:00'),
(9, 'In PHP a variable needs to be declare before assign                                                           ', 2, 'E', '2019-07-18 00:00:00'),
(10, 'Which of the following is not the scope of Variable in PHP?                                                       ', 2, 'I', '2019-07-18 00:00:00'),
(11, '         Python is said to be easily                                                      ', 1, 'B', '2019-07-18 00:00:00'),
(12, '         Extensible programming language that can be extended through classes and programming interfaces is                                                      ', 1, 'B', '2019-07-18 00:00:00'),
(13, '       Python was released publicly in                                                         ', 1, 'B', '2019-07-18 00:00:00'),
(14, ' Special data types that are defined by users is called                                                        ', 1, 'I', '2019-07-18 00:00:00'),
(15, ' Iteration is repetition of a                                                              ', 1, 'I', '2019-07-18 00:00:00'),
(16, 'Actual values defined in enumeratorlist is called                                                               ', 1, 'I', '2019-07-18 00:00:00'),
(17, 'Do while statement is almost same as                                                               ', 1, 'E', '2019-07-18 00:00:00'),
(18, '    Diagram which shows relationship between classes is termed as                                                           ', 1, 'E', '2019-07-18 00:00:00'),
(19, 'At Ericson, UML was developed by                                                               ', 1, 'E', '2019-07-18 00:00:00'),
(20, '   Choose the form in which Postback occur                                                           ', 3, 'B', '2019-07-18 00:00:00'),
(22, ' The first event triggers in an aspx page is.                                                              ', 3, 'I', '2019-07-18 00:00:00'),
(23, 'Difference between Response.Write() andResponse.Output.Write                                                            ', 3, 'I', '2019-07-18 00:00:00'),
(24, 'Which of the following method must be overridden in a custom control?                                                               ', 3, 'I', '2019-07-18 00:00:00'),
(25, 'Web.config file is used...                                                               ', 3, 'B', '2019-07-18 00:00:00'),
(26, 'How do we create a FileSystemObject?                                                    ', 3, 'B', '2019-07-18 00:00:00'),
(27, '    Who is father of C Language?                                                           ', 4, 'B', '2019-07-18 00:00:00'),
(28, 'C Language developed at _____?\r\n                                                             ', 4, 'B', '2019-07-18 00:00:00'),
(29, ' C variable cannot start with                                                               ', 4, 'B', '2019-07-18 00:00:00'),
(30, ' Which of the following is allowed in a C Arithmetic instruction\r\n                                                 ', 4, 'I', '2019-07-18 00:00:00'),
(31, ' What is an array?                                                               ', 4, 'I', '2019-07-18 00:00:00'),
(32, ' What is right way to Initialization array?                                                             ', 4, 'I', '2019-07-18 00:00:00'),
(33, 'Bitwise operators can operate upon?\r\n                                                          ', 4, 'E', '2019-07-18 00:00:00'),
(34, 'What is Keywords?                                               ', 4, 'E', '2019-07-18 00:00:00'),
(35, 'What is constant?\r\n                                                               ', 4, 'E', '2019-07-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbreg`
--

CREATE TABLE IF NOT EXISTS `tbreg` (
  `regcod` int(11) NOT NULL AUTO_INCREMENT,
  `regeml` varchar(100) NOT NULL,
  `regpwd` varchar(50) NOT NULL,
  `regdat` datetime NOT NULL,
  `regsts` char(1) NOT NULL,
  PRIMARY KEY (`regcod`),
  UNIQUE KEY `regeml` (`regeml`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbreg`
--

INSERT INTO `tbreg` (`regcod`, `regeml`, `regpwd`, `regdat`, `regsts`) VALUES
(1, 'admin@ratemyskill.com', 'Admin', '2019-07-17 00:00:00', 'A'),
(2, 'jaidev.msn@gmail.com', '12345', '2019-07-17 00:00:00', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `tbtec`
--

CREATE TABLE IF NOT EXISTS `tbtec` (
  `teccod` int(11) NOT NULL AUTO_INCREMENT,
  `tecname` varchar(100) NOT NULL,
  PRIMARY KEY (`teccod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbtec`
--

INSERT INTO `tbtec` (`teccod`, `tecname`) VALUES
(1, 'python'),
(2, 'php'),
(3, 'asp'),
(4, 'c'),
(5, 'java');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
