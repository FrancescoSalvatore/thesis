SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `coap` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `coap`;

CREATE TABLE IF NOT EXISTS `action` (
`ActionID` int(32) unsigned NOT NULL,
  `ActionName` varchar(255) COLLATE utf8_bin NOT NULL,
  `ConnectionID` int(16) DEFAULT NULL,
  `ResourceURI` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `EventType` int(2) DEFAULT NULL,
  `Period` int(255) unsigned DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `connector` (
`ConnectorID` int(10) unsigned NOT NULL,
  `ConnectorName` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `user` (
`UserID` int(10) unsigned NOT NULL,
  `Email` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `Password` varchar(64) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `user_connection` (
`ConnectionID` int(16) unsigned NOT NULL,
  `UserID` int(10) DEFAULT NULL,
  `ConnectorID` int(10) DEFAULT NULL,
  `ConnectionInfo` text COLLATE utf8_bin,
  `ConnectionName` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


ALTER TABLE `action`
 ADD PRIMARY KEY (`ActionID`);

ALTER TABLE `connector`
 ADD PRIMARY KEY (`ConnectorID`);

ALTER TABLE `user`
 ADD PRIMARY KEY (`UserID`);

ALTER TABLE `user_connection`
 ADD PRIMARY KEY (`ConnectionID`);


ALTER TABLE `action`
MODIFY `ActionID` int(32) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
ALTER TABLE `connector`
MODIFY `ConnectorID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
ALTER TABLE `user`
MODIFY `UserID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
ALTER TABLE `user_connection`
MODIFY `ConnectionID` int(16) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
