-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.17-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for library
CREATE DATABASE IF NOT EXISTS `library` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `library`;

-- Dumping structure for table library.account
CREATE TABLE IF NOT EXISTS `account` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_username` varchar(10) NOT NULL,
  `acc_pass` varchar(10) NOT NULL,
  `acc_type` enum('borrower','admin') DEFAULT 'borrower',
  PRIMARY KEY (`acc_id`),
  UNIQUE KEY `acc_username` (`acc_username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table library.book
CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(255) NOT NULL,
  `book_auth` varchar(255) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table library.book_category
CREATE TABLE IF NOT EXISTS `book_category` (
  `book_categ_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `categ_id` int(11) NOT NULL,
  PRIMARY KEY (`book_categ_id`),
  UNIQUE KEY `book_id` (`book_id`),
  KEY `categ_id` (`categ_id`),
  CONSTRAINT `book_category_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`),
  CONSTRAINT `book_category_ibfk_2` FOREIGN KEY (`categ_id`) REFERENCES `category` (`categ_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table library.borrower
CREATE TABLE IF NOT EXISTS `borrower` (
  `borrower_id` int(11) NOT NULL AUTO_INCREMENT,
  `borrower_fname` varchar(100) NOT NULL,
  `borrower_mname` varchar(100) NOT NULL,
  `borrower_lname` varchar(100) NOT NULL,
  PRIMARY KEY (`borrower_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table library.borrower_account
CREATE TABLE IF NOT EXISTS `borrower_account` (
  `bacc_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  PRIMARY KEY (`bacc_id`),
  UNIQUE KEY `acc_id` (`acc_id`),
  UNIQUE KEY `borrower_id` (`borrower_id`),
  CONSTRAINT `borrower_account_ibfk_1` FOREIGN KEY (`bacc_id`) REFERENCES `account` (`acc_id`),
  CONSTRAINT `borrower_account_ibfk_2` FOREIGN KEY (`borrower_id`) REFERENCES `borrower` (`borrower_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table library.borrow_logs
CREATE TABLE IF NOT EXISTS `borrow_logs` (
  `borrow_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `borrower_id` int(11) NOT NULL,
  `inv_id` int(11) NOT NULL,
  `borrow_date` date NOT NULL,
  `borrow_return` date DEFAULT NULL,
  `due_date` date NOT NULL,
  PRIMARY KEY (`borrow_log_id`),
  KEY `borrower_id` (`borrower_id`),
  KEY `inv_id` (`inv_id`),
  CONSTRAINT `borrow_logs_ibfk_1` FOREIGN KEY (`borrower_id`) REFERENCES `borrower` (`borrower_id`),
  CONSTRAINT `borrow_logs_ibfk_2` FOREIGN KEY (`inv_id`) REFERENCES `inventory` (`inv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table library.category
CREATE TABLE IF NOT EXISTS `category` (
  `categ_id` int(11) NOT NULL AUTO_INCREMENT,
  `categ_code` varchar(6) NOT NULL,
  `categ_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`categ_id`),
  UNIQUE KEY `categ_code` (`categ_code`),
  UNIQUE KEY `categ_desc` (`categ_desc`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for procedure library.GetAccount
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAccount`(
	IN `username` VARCHAR(100),
	IN `password` VARCHAR(100)
)
BEGIN
	SELECT *
	  FROM lib_accounts li
	 WHERE li.user_name = username AND li.user_pass = password;
END//
DELIMITER ;

-- Dumping structure for procedure library.GetAccountByID
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAccountByID`(
	IN `id` INT
)
BEGIN
	SELECT *
	  FROM lib_accounts li
	 WHERE li.lib_acc_id = id;
END//
DELIMITER ;

-- Dumping structure for procedure library.GetBooks
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBooks`()
BEGIN
	SELECT * FROM book;
END//
DELIMITER ;

-- Dumping structure for procedure library.GetBooksDueToday
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBooksDueToday`()
BEGIN
	SELECT * 
     FROM borrow_logs b
    WHERE b.due_date = curDate() AND borrow_return is null;
END//
DELIMITER ;

-- Dumping structure for procedure library.GetBooksWithCategory
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBooksWithCategory`()
BEGIN
	  SELECT * 
		FROM book b
		LEFT
		JOIN book_category bc
		  ON bc.book_id = b.book_id
		JOIN category c
		  ON bc.categ_id = c.categ_id;
   END//
DELIMITER ;

-- Dumping structure for procedure library.GetBooksWithFilter
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBooksWithFilter`(
	IN `search` VARCHAR(100)
)
BEGIN
	SELECT * 
	  FROM book 
	 WHERE book.book_title LIKE CONCAT('%',search,'%') OR
	       book.book_auth LIKE CONCAT('%',search,'%') OR
			 book.book_pub LIKE CONCAT('%',search,'%');
	  
END//
DELIMITER ;

-- Dumping structure for procedure library.GetBorrowerHistory
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBorrowerHistory`(
	IN `id` INT
)
BEGIN
	SELECT *
	  FROM borrow_logs bl 
	  JOIN borrower br ON bl.borrower_id = br.borrower_id
	  JOIN inventory i on bl.inv_id = i.inv_id
	  JOIN book bk ON i.book_id = bk.book_id
	  JOIN book_category bc ON bk.book_id = bc.book_id
	  JOIN category c ON bc.categ_id = c.categ_id
	  WHERE bl.borrower_id = id
	  ORDER BY bl.borrow_date desc;
END//
DELIMITER ;

-- Dumping structure for procedure library.GetBorrowerList
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBorrowerList`()
BEGIN
	SELECT * 
	  FROM borrower;
END//
DELIMITER ;

-- Dumping structure for procedure library.GetBorrowLogList
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBorrowLogList`()
BEGIN
	SELECT *
	  FROM borrow_logs bl 
	  JOIN borrower br ON bl.borrower_id = br.borrower_id
	  JOIN inventory i on bl.inv_id = i.inv_id
	  JOIN book bk ON i.book_id = bk.book_id
	  JOIN book_category bc ON bk.book_id = bc.book_id
	  JOIN category c ON bc.categ_id = c.categ_id
	  ORDER BY bl.borrow_date desc;
END//
DELIMITER ;

-- Dumping structure for procedure library.GetCategories
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCategories`()
BEGIN
	SELECT * FROM category;
END//
DELIMITER ;

-- Dumping structure for procedure library.GetInventories
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetInventories`()
BEGIN
 SELECT bi.*,b.*
		   FROM inventory bi
	  LEFT JOIN book b ON bi.book_id = b.book_id;
END//
DELIMITER ;

-- Dumping structure for procedure library.GetInventoriesWithCategory
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetInventoriesWithCategory`()
BEGIN
	SELECT * FROM inventory bi
   JOIN book b ON bi.book_id = b.book_id
   JOIN book_category bc ON b.book_id = bc.book_id
   JOIN category c ON c.categ_id = bc.categ_id;
END//
DELIMITER ;

-- Dumping structure for procedure library.GetUser
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUser`(
	IN `username` VARCHAR(100),
	IN `password` VARCHAR(100)
)
BEGIN
	SELECT * 
	  FROM account 
	 WHERE account.acc_username = username and account.acc_pass = password;
END//
DELIMITER ;

-- Dumping structure for table library.inventory
CREATE TABLE IF NOT EXISTS `inventory` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `book_code` varchar(6) NOT NULL,
  `status` enum('available','borrowed') DEFAULT 'available',
  PRIMARY KEY (`inv_id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table library.lib_accounts
CREATE TABLE IF NOT EXISTS `lib_accounts` (
  `lib_acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(10) NOT NULL,
  `user_pass` varchar(10) NOT NULL,
  `acc_fname` varchar(100) NOT NULL,
  `acc_mname` varchar(100) NOT NULL,
  `acc_lname` varchar(100) NOT NULL,
  `user_type` enum('admin','user') DEFAULT 'user',
  PRIMARY KEY (`lib_acc_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
