-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 07:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartrestaurantdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `ID` int(10) NOT NULL,
  `Description` longtext NOT NULL,
  `Username` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`ID`, `Description`, `Username`, `datetime`) VALUES
(2, 'An excellent dinner, with little twists to make it interesting. The fresh bread at the start came with butter with a hint of chili and herbs. The seabass came with a few hazelnuts on top - not expected, but the tastes worked together well.', 'Vishwa Thennakon', '2020-04-12 10:08:19'),
(3, 'An excellent dinner, with little twists to make it interesting. The fresh bread at the start came with butter with a hint of chili and herbs. The seabass came with a few hazelnuts on top - not expected, but the tastes worked together well.', 'Vishwa Thennakon', '2020-04-12 10:08:37'),
(4, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs. The seabass came with a few hazelnuts on top - not expected, but the tastes worked together well.', 'Vishwa Thennakon', '2020-04-12 10:08:34'),
(5, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs. The seabass came with a few hazelnuts on top - not expected, but the tastes worked together well.', '', '2020-04-12 10:09:53'),
(6, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs. The seabass came with a few hazelnuts on top - not expected, but the tastes worked together well.', '', '2020-04-12 10:11:53'),
(7, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs. The seabass came with a few hazelnuts on top - not expected, but the tastes worked together well.', '', '2020-04-12 10:20:22'),
(8, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs. The seabass came with a few hazelnuts on top - not expected, but the tastes worked together well.', '', '2020-04-12 10:20:41'),
(9, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs. The seabass came with a few hazelnuts on top - not expected, but the tastes worked together well.', '', '2020-04-12 10:21:15'),
(10, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs. The seabass came with a few hazelnuts on top - not expected, but the tastes worked together well.', '', '2020-04-12 10:25:05'),
(11, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs. The seabass came with a few hazelnuts on top - not expected, but the tastes worked together well.', '', '2020-04-12 10:27:27'),
(14, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', 'piumi', '2020-04-12 10:40:00'),
(15, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:40:02'),
(16, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:40:59'),
(17, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:45:27'),
(18, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:45:35'),
(19, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:48:06'),
(20, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:49:03'),
(21, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:50:40'),
(22, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:51:05'),
(23, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:51:54'),
(24, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:52:25'),
(25, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:52:52'),
(26, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:52:54'),
(27, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:53:02'),
(28, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:57:24'),
(29, 'Lovely place and delicious food The fresh bread at the start came with butter with a hint of chili and herbs.', '', '2020-04-12 10:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblfoodcategory`
--

CREATE TABLE `tblfoodcategory` (
  `ID` int(5) NOT NULL,
  `CategoryNo` varchar(20) NOT NULL,
  `Description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfoodcategory`
--

INSERT INTO `tblfoodcategory` (`ID`, `CategoryNo`, `Description`) VALUES
(1, 'C001', 'Main Meal'),
(4, 'C002', 'Desserts'),
(5, 'C003', 'Beverage'),
(6, 'C004', 'Pizza'),
(7, 'C005', 'Fast Food'),
(8, 'C006', 'Indian');

-- --------------------------------------------------------

--
-- Table structure for table `tblfoodmenuitem`
--

CREATE TABLE `tblfoodmenuitem` (
  `ID` int(5) NOT NULL,
  `SubID` varchar(100) NOT NULL,
  `SubFoodType` int(10) NOT NULL,
  `FoodType` int(10) NOT NULL,
  `MenuItemNo` varchar(10) NOT NULL DEFAULT '0',
  `FoodCatID` float NOT NULL DEFAULT '0',
  `FoodName` varchar(30) NOT NULL,
  `FoodImage` varchar(500) NOT NULL,
  `Qty` int(10) NOT NULL,
  `Price` double NOT NULL,
  `LogUser` varchar(20) NOT NULL,
  `DateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfoodmenuitem`
--

INSERT INTO `tblfoodmenuitem` (`ID`, `SubID`, `SubFoodType`, `FoodType`, `MenuItemNo`, `FoodCatID`, `FoodName`, `FoodImage`, `Qty`, `Price`, `LogUser`, `DateTime`) VALUES
(1, '3,4,6,25,26,27', 0, 1, 'M001', 1, 'Traditional Rice and Curry', 'img/food_item/TraditionalRiceandCurry.jpg', 1, 300, '', '0000-00-00 00:00:00'),
(2, '3,4', 0, 1, 'M002', 1, 'String Hoppers', 'img/food_item/stringhoppers.jpg', 1, 200, '', '0000-00-00 00:00:00'),
(3, '', 0, 2, 'MS001', 1, 'Dhal Curry', 'img/food_menu/dhal.jpeg', 1, 100, '', '0000-00-00 00:00:00'),
(4, '', 0, 2, 'MS002', 1, 'Chicken  Curry', 'img/food_item/ChickenCurry.jpg', 1, 100, '', '0000-00-00 00:00:00'),
(5, '3,4', 0, 1, 'M003', 1, 'Vegetable Rice', 'img/food_item/vegetablerice.jpg', 1, 200, '', '0000-00-00 00:00:00'),
(6, '', 0, 2, 'MS003', 1, 'Green Bean Curry', 'img/food_item/GreenBeanCurry.jpg', 1, 100, '', '0000-00-00 00:00:00'),
(7, '', 0, 1, 'D001', 4, 'Strawberry Ice Cream in Conne', 'img/food_item/strawberryicecreaminconne.jpg', 1, 100, '', '0000-00-00 00:00:00'),
(8, '7', 0, 2, 'DS001', 4, 'Apple', '0', 1, 100, '', '0000-00-00 00:00:00'),
(9, '7', 0, 2, 'DS002', 4, 'Fineapple', '0', 1, 100, '', '0000-00-00 00:00:00'),
(10, '', 0, 1, 'B001', 5, 'Mango Juice', 'img/food_item/mangojuice.jpg', 1, 150, '', '0000-00-00 00:00:00'),
(11, '4', 0, 1, 'M004', 1, 'Biryani', 'img/food_item/riceandcurry.jpg', 1, 250, '', '0000-00-00 00:00:00'),
(12, '', 0, 1, 'M005', 1, 'Yellow Rice', 'img/food_item/Yellowrice.jpg', 1, 350, '', '0000-00-00 00:00:00'),
(13, '', 0, 1, 'B002', 5, 'Pomegranate Juice', 'img/food_item/pomegranatejuice.jpg', 1, 150, '', '0000-00-00 00:00:00'),
(14, '', 0, 1, 'B003', 5, 'Green Lime', 'img/food_item/greenlime.jpg', 1, 150, '', '0000-00-00 00:00:00'),
(15, '', 0, 1, 'B004', 5, 'Chocolate Shake', 'img/food_item/chocolateshake.jpg', 1, 200, '', '0000-00-00 00:00:00'),
(16, '', 0, 1, 'B005', 5, 'White and Brown bottle', 'img/food_item/whiteandbrownplasticbottle.jpg', 1, 320, '', '0000-00-00 00:00:00'),
(17, '', 0, 1, 'B006', 5, 'Passion Fruit Juice', 'img/food_item/passionfruitjuice.jpg', 1, 220, '', '0000-00-00 00:00:00'),
(18, '', 0, 1, 'B007', 5, 'Coffee in Cup', 'img/food_item/coffeeincup.jpg', 1, 50, '', '0000-00-00 00:00:00'),
(19, '', 0, 1, 'D002', 4, 'Fruit Salad', 'img/food_item/fruitsalad.jpg', 1, 180, '', '0000-00-00 00:00:00'),
(24, '', 0, 1, 'M006', 1, 'Milk Rice', 'img/food_item/milkrice.png', 1, 120, '', '0000-00-00 00:00:00'),
(25, '', 0, 2, 'MS004', 1, 'Fry Fish', 'img/food_item/88158461_218892286155146_3107258914232598528_o.jpg', 1, 100, '', '0000-00-00 00:00:00'),
(26, '', 1, 2, 'MS005', 1, 'Plate of rice', 'img/food_item/stock-photo-cooked-white-rice-thai-jasmine-rice-with-herbs-spices-pepper-rice-in-dark-wooden-bowl-with-700509694.jpg', 1, 100, '', '0000-00-00 00:00:00'),
(27, '', 1, 2, 'MS006', 1, 'Red Rice', 'img/food_item/stock-photo-fresh-cooked-red-rice-on-a-plate-141946000.jpg', 1, 100, '', '0000-00-00 00:00:00'),
(28, '', 1, 1, 'P001', 6, 'pepperoni pizza', 'img/food_item/photo-1534308983496-4fabb1a015ee.jpg', 0, 1200, '', '0000-00-00 00:00:00'),
(29, '', 1, 1, 'M007', 1, 'Nomal Rice And Curry', 'img/food_item/81969436_179428406768201_2094753844880736256_o.jpg', 0, 200, '', '0000-00-00 00:00:00'),
(30, '', 1, 1, 'M008', 1, 'Bread and Curry', 'img/food_item/67659118_102641514423580_6429670676105265152_n.jpg', 0, 150, '', '0000-00-00 00:00:00'),
(31, '', 1, 1, 'M009', 1, 'Parata', 'img/food_item/90292452_10220801265528913_8129782546209701888_n.jpg', 0, 100, '', '0000-00-00 00:00:00'),
(32, '', 1, 1, 'D003', 4, 'Chocolate Icing', 'img/food_item/90240064_10220801272889097_1586267933653336064_n.jpg', 0, 120, '', '0000-00-00 00:00:00'),
(33, '', 1, 1, 'D004', 4, 'Chocolate Cake', 'img/food_item/90242271_10220801272449086_8363767133225615360_n.jpg', 0, 200, '', '0000-00-00 00:00:00'),
(36, '', 1, 1, 'M0010', 1, 'Pittu', 'img/food_item/78493111_2814434001923516_3868090002529320960_n.jpg', 0, 200, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblingredients`
--

CREATE TABLE `tblingredients` (
  `ingredientID` int(5) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Price` double NOT NULL,
  `ingredientImage` int(5) NOT NULL,
  `Status` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblitemstock`
--

CREATE TABLE `tblitemstock` (
  `MenuItem` int(5) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `MinimumQTY` int(11) NOT NULL,
  `CurrentTQY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblorderheader`
--

CREATE TABLE `tblorderheader` (
  `ID` int(5) NOT NULL,
  `OrderID` varchar(50) NOT NULL DEFAULT '0',
  `TableNo` int(5) NOT NULL,
  `SubTotal` float NOT NULL,
  `Discount` float NOT NULL,
  `Totale` float NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` varchar(10) NOT NULL DEFAULT '0',
  `CusName` varchar(100) NOT NULL,
  `CusAddress` longtext NOT NULL,
  `CusPhone` varchar(15) NOT NULL,
  `CusEmail` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorderheader`
--

INSERT INTO `tblorderheader` (`ID`, `OrderID`, `TableNo`, `SubTotal`, `Discount`, `Totale`, `DateTime`, `Status`, `CusName`, `CusAddress`, `CusPhone`, `CusEmail`) VALUES
(10, 'IN001', 3, 0, 0, 400, '2020-04-14 09:00:10', 'Delivering', 'Rohini', '', '0775222232', 'hdpiumigeethma@gmail.com'),
(11, 'IN002', 4, 0, 0, 270, '2020-04-14 08:41:46', 'Pendding', 'Keshan', '', '0771267554', ''),
(12, 'IN003', 4, 0, 0, 1200, '2020-04-14 08:41:34', 'Processing', 'shiran', '', '0771423887', ''),
(13, 'IN004', 4, 0, 0, 200, '2020-04-14 08:41:49', 'Pendding', 'shiran', '', '0771423887', ''),
(14, 'IN005', 4, 0, 0, 250, '2020-04-14 09:19:13', 'Done', 'shiran', '', '0771423887', ''),
(24, 'IN006', 2, 0, 0, 800, '2020-04-14 11:54:32', 'Done', 'sonali', '', '0713242543', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblorderitem`
--

CREATE TABLE `tblorderitem` (
  `ID` int(5) NOT NULL,
  `OrderID` varchar(50) NOT NULL DEFAULT '0',
  `FoodCode` varchar(50) NOT NULL DEFAULT '0',
  `Name` longtext NOT NULL,
  `Price` float NOT NULL,
  `Qty` int(10) NOT NULL,
  `Image` longtext NOT NULL,
  `SubfoodID` longtext NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorderitem`
--

INSERT INTO `tblorderitem` (`ID`, `OrderID`, `FoodCode`, `Name`, `Price`, `Qty`, `Image`, `SubfoodID`, `DateTime`) VALUES
(13, 'IN001', 'M003', 'Vegetable Rice', 200, 1, 'img/food_item/vegetablerice.jpg', '', '2020-04-14 06:49:58'),
(14, 'IN001', 'M002', 'String Hoppers', 200, 1, 'img/food_item/stringhoppers.jpg', '', '2020-04-14 06:49:58'),
(15, 'IN002', 'M006', 'Milk Rice', 120, 1, 'img/food_item/milkrice.png', '', '2020-04-14 07:01:30'),
(16, 'IN002', 'B001', 'Mango Juice', 150, 1, 'img/food_item/mangojuice.jpg', '', '2020-04-14 07:01:30'),
(17, 'IN003', 'P001', 'pepperoni pizza', 1200, 1, 'img/food_item/photo-1534308983496-4fabb1a015ee.jpg', '', '2020-04-14 07:17:01'),
(18, 'IN004', 'B004', 'Chocolate Shake', 200, 1, 'img/food_item/chocolateshake.jpg', '', '2020-04-14 07:43:09'),
(19, 'IN005', 'B004', 'Chocolate Shake', 200, 1, 'img/food_item/chocolateshake.jpg', '', '2020-04-14 07:51:00'),
(20, 'IN005', 'B007', 'Coffee in Cup', 50, 1, 'img/food_item/coffeeincup.jpg', '', '2020-04-14 07:51:00'),
(29, 'IN006', 'M001', 'Traditional Rice and Curry', 300, 1, 'img/food_item/TraditionalRiceandCurry.jpg', '', '2020-04-14 11:53:16'),
(30, 'IN006', 'M002', 'String Hoppers', 200, 1, 'img/food_item/stringhoppers.jpg', '', '2020-04-14 11:53:16'),
(31, 'IN006', 'B001', 'Mango Juice', 150, 1, 'img/food_item/mangojuice.jpg', '', '2020-04-14 11:53:16'),
(32, 'IN006', 'B002', 'Pomegranate Juice', 150, 1, 'img/food_item/pomegranatejuice.jpg', '', '2020-04-14 11:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `tblprivilege`
--

CREATE TABLE `tblprivilege` (
  `ID` int(5) NOT NULL,
  `PrivilegeName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbltable`
--

CREATE TABLE `tbltable` (
  `TableID` int(5) NOT NULL,
  `TableNo` int(5) NOT NULL DEFAULT '0',
  `NoOfChairs` int(5) NOT NULL DEFAULT '0',
  `Status` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `UserRoleID` int(5) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `Name`, `PhoneNo`, `Email`, `UserRoleID`, `Password`, `DateTime`) VALUES
(1, 'Admin', 'Admin', '', 1, '10.1.38-MariaDB', '2020-04-14 11:38:03'),
(2, 'Bahagya', '0711106539', 'kenok.user@gmail.com', 3, '0711106539', '2020-04-14 11:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserreservation`
--

CREATE TABLE `tbluserreservation` (
  `ID` int(5) NOT NULL,
  `OrderID` int(5) NOT NULL DEFAULT '0',
  `TableID` int(5) NOT NULL DEFAULT '0',
  `DateTime` datetime NOT NULL,
  `Status` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluserrole`
--

CREATE TABLE `tbluserrole` (
  `ID` int(5) NOT NULL,
  `PrivilegeID` int(5) NOT NULL DEFAULT '0',
  `UerRole` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluserrole`
--

INSERT INTO `tbluserrole` (`ID`, `PrivilegeID`, `UerRole`) VALUES
(1, 0, 'Administrator'),
(2, 0, 'Employee'),
(3, 0, 'Customer'),
(4, 0, 'Operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfoodcategory`
--
ALTER TABLE `tblfoodcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfoodmenuitem`
--
ALTER TABLE `tblfoodmenuitem`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblingredients`
--
ALTER TABLE `tblingredients`
  ADD PRIMARY KEY (`ingredientID`);

--
-- Indexes for table `tblitemstock`
--
ALTER TABLE `tblitemstock`
  ADD PRIMARY KEY (`MenuItem`);

--
-- Indexes for table `tblorderheader`
--
ALTER TABLE `tblorderheader`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblorderitem`
--
ALTER TABLE `tblorderitem`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblprivilege`
--
ALTER TABLE `tblprivilege`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltable`
--
ALTER TABLE `tbltable`
  ADD PRIMARY KEY (`TableID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluserreservation`
--
ALTER TABLE `tbluserreservation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluserrole`
--
ALTER TABLE `tbluserrole`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tblfoodcategory`
--
ALTER TABLE `tblfoodcategory`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblfoodmenuitem`
--
ALTER TABLE `tblfoodmenuitem`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblingredients`
--
ALTER TABLE `tblingredients`
  MODIFY `ingredientID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblitemstock`
--
ALTER TABLE `tblitemstock`
  MODIFY `MenuItem` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblorderheader`
--
ALTER TABLE `tblorderheader`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblorderitem`
--
ALTER TABLE `tblorderitem`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblprivilege`
--
ALTER TABLE `tblprivilege`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbltable`
--
ALTER TABLE `tbltable`
  MODIFY `TableID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluserreservation`
--
ALTER TABLE `tbluserreservation`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluserrole`
--
ALTER TABLE `tbluserrole`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
