
CREATE DATABASE rateskill;

CREATE TABLE IF NOT EXISTS `tbans` (
  `anscod` int(11) NOT NULL 		AUTO_INCREMENT,		  PRIMARY KEY (`anscod`)
  `ansqstcod` int(11) NOT NULL,
  `ansdsc` varchar(2000) NOT NULL,
  `anssts` char(1) NOT NULL,

  CREATE TABLE IF NOT EXISTS `tbqst` (
  `qstcod` int(11) NOT NULL 			AUTO_INCREMENT,		 PRIMARY KEY (`qstcod`)
  `qstdsc` varchar(2000) NOT NULL,
  `qstteccod` int(11) NOT NULL,
  `qstlvl` char(1) NOT NULL,
  `qstdat` datetime NOT NULL,
  
  
  
  CREATE TABLE IF NOT EXISTS `tbreg` (
  `regcod` int(11) NOT NULL 			AUTO_INCREMENT,		 PRIMARY KEY (`regcod`),
  `regeml` varchar(100) NOT NULL,		UNIQUE KEY `regeml` (`regeml`)
  `regpwd` varchar(50) NOT NULL,
  `regdat` datetime NOT NULL,
  `regrol` char(1) NOT NULL,
  
  
  
  
CREATE TABLE IF NOT EXISTS `tbtec` (
  `teccod` int(11) NOT NULL 			AUTO_INCREMENT,		  PRIMARY KEY (`teccod`)
  `tecname` varchar(100) NOT NULL,

 
  
 