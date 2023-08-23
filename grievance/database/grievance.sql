/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 80031
Source Host           : localhost:3306
Source Database       : grievance

Target Server Type    : MYSQL
Target Server Version : 80031
File Encoding         : 65001

Date: 2023-08-23 14:47:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for grievance_table
-- ----------------------------
DROP TABLE IF EXISTS `grievance_table`;
CREATE TABLE `grievance_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `First_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `Last_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` bigint NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Status` varchar(30) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Pending',
  `ref_no` int NOT NULL DEFAULT '12345678',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of grievance_table
-- ----------------------------
INSERT INTO `grievance_table` VALUES ('1', ' Ram', 'Yadav', 'ram@gmail.com', '7894561230', 'check grievance', 'Pending', '12345678');

-- ----------------------------
-- Table structure for registration_table
-- ----------------------------
DROP TABLE IF EXISTS `registration_table`;
CREATE TABLE `registration_table` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `First_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Last_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `User_type` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `District` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Block` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Vilage` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `pincode` int NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` bigint NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of registration_table
-- ----------------------------
INSERT INTO `registration_table` VALUES ('1', 'Ram', 'Yadav', '2023-08-23', 'Male', 'User', 'indore', 'indore', 'indore', '451225', 'Nandra', '7894561230', 'ram@gmail.com', '12345', 'images/user_logo.png');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `Address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Tarun', 'Patidar', '2000-06-29', 'Male', 'Nandra,teh.Maheshwar,Dist.Khargone(MP)', '8965820900', 'tarun@gmail.com', '123', 'Admin', '0', '2023-08-22 19:23:43');
INSERT INTO `users` VALUES ('2', 'Tarun', 'Patidar', '2023-08-22', 'Male', 'Indore', '7778958956', 'dsdo@gmail.com', '1234', 'DSDO', '0', '2023-08-22 19:24:52');
