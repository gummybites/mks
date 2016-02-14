/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : mks

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2016-02-14 02:31:17
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tblattendance`
-- ----------------------------
DROP TABLE IF EXISTS `tblattendance`;
CREATE TABLE `tblattendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admission_number` int(11) NOT NULL,
  `date_absent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of tblattendance
-- ----------------------------
INSERT INTO tblattendance VALUES ('1', '11820152', '1432737590');

-- ----------------------------
-- Table structure for `tblgrades`
-- ----------------------------
DROP TABLE IF EXISTS `tblgrades`;
CREATE TABLE `tblgrades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admission_number` varchar(11) NOT NULL,
  `subj_code` varchar(11) NOT NULL,
  `firstquarter` int(3) NOT NULL,
  `secondquarter` int(3) NOT NULL,
  `thirdquarter` int(3) NOT NULL,
  `fourthquarter` int(3) NOT NULL,
  `section` varchar(30) NOT NULL,
  `teacher` varchar(30) NOT NULL,
  `subj_units` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of tblgrades
-- ----------------------------
INSERT INTO tblgrades VALUES ('1', '118201529', 'A.P', '81', '82', '80', '81', 'C', 'Ms. Elly', '3');
INSERT INTO tblgrades VALUES ('2', '11820153', 'MATH', '89', '89', '89', '89', 'A', 'Ms. NAVARRA', '3');

-- ----------------------------
-- Table structure for `tbl_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of tbl_admin
-- ----------------------------
INSERT INTO tbl_admin VALUES ('1', 's', 'a');

-- ----------------------------
-- Table structure for `tbl_applicationform`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_applicationform`;
CREATE TABLE `tbl_applicationform` (
  `id` int(10) NOT NULL,
  `newstudentform` varchar(50) NOT NULL,
  `transfereeform` varchar(50) NOT NULL,
  `seniorhighform` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_applicationform
-- ----------------------------
INSERT INTO tbl_applicationform VALUES ('1', '87707-math-2015-16.pdf', 'applicationformfortransferee.pdf', 'applicationformforseniorhigh.pdf');

-- ----------------------------
-- Table structure for `tbl_cashier`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cashier`;
CREATE TABLE `tbl_cashier` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_cashier
-- ----------------------------
INSERT INTO tbl_cashier VALUES ('admin', 'admin');

-- ----------------------------
-- Table structure for `tbl_employees`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_employees`;
CREATE TABLE `tbl_employees` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `joining_date` varchar(20) NOT NULL,
  `access_code` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_employees
-- ----------------------------
INSERT INTO tbl_employees VALUES ('30', 'EMP00020151', 'Sep 15,2015', 's', 'Kenneth', 'Armeza', 'Berdensen', '');
INSERT INTO tbl_employees VALUES ('31', 'EMP00020152', 'Sep 15,2015', 'CNX2YZ', 'Karl', 'Malone', 'Berdensen', '');
INSERT INTO tbl_employees VALUES ('32', 'EMP00020153', 'Sep 15,2015', 'CNX3YZ', 'Myra', 'Armeza', 'Berdensen', '');

-- ----------------------------
-- Table structure for `tbl_enrolledstudents`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_enrolledstudents`;
CREATE TABLE `tbl_enrolledstudents` (
  `username` varchar(220) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `middlename` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `section` varchar(255) NOT NULL,
  `First_Payment` int(220) NOT NULL,
  `Second_Payment` int(220) NOT NULL,
  `Third_Payment` int(220) NOT NULL,
  `Fourth_Payment` int(220) NOT NULL,
  `First_Status` varchar(220) NOT NULL,
  `Second_Status` varchar(220) NOT NULL,
  `Third_Status` varchar(220) NOT NULL,
  `Fourth_Status` varchar(220) NOT NULL,
  `std_gwa` double NOT NULL,
  `Balance` varchar(220) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- ----------------------------
-- Records of tbl_enrolledstudents
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_event`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_event`;
CREATE TABLE `tbl_event` (
  `id` int(11) NOT NULL,
  `event1_image` varchar(200) NOT NULL,
  `event1_date` varchar(50) NOT NULL,
  `event1_title` varchar(200) NOT NULL,
  `event1_description` varchar(200) NOT NULL,
  `event2_image` varchar(200) NOT NULL,
  `event2_date` varchar(200) NOT NULL,
  `event2_title` varchar(200) NOT NULL,
  `event2_description` varchar(200) NOT NULL,
  `event3_image` varchar(200) NOT NULL,
  `event3_date` varchar(200) NOT NULL,
  `event3_title` varchar(200) NOT NULL,
  `event3_description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_event
-- ----------------------------
INSERT INTO tbl_event VALUES ('1', '65676-ferrer.jpg', '1/3/2017', 'Chinese New Year', 'Happy Chinese New year Katrinians!', '57050-jeremiah-29-11-fb-coverphoto.jpg', '1/3/2016', 'Rizal Day dasd', 'december a234234', '4519-jeremiah-29-11-fb-coverphoto.jpg', '1/3/2017', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'december a234234');

-- ----------------------------
-- Table structure for `tbl_prospectivestudents`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_prospectivestudents`;
CREATE TABLE `tbl_prospectivestudents` (
  `id` int(10) NOT NULL,
  `email` varchar(225) NOT NULL,
  `username` varchar(20) NOT NULL,
  `applicant_number` int(65) NOT NULL,
  `year` varchar(20) NOT NULL,
  `seeking` varchar(20) NOT NULL,
  `applieddate` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `prospectivestatus` varchar(225) NOT NULL DEFAULT 'PENDING',
  `honors` varchar(100) NOT NULL,
  `First_Status` int(220) NOT NULL,
  `Second_Status` int(220) NOT NULL,
  `Third_Status` int(220) NOT NULL,
  `Fourth_Status` int(220) NOT NULL,
  `First_Payment` decimal(65,2) NOT NULL,
  `Second_Payment` decimal(65,2) NOT NULL,
  `Third_Payment` decimal(65,2) NOT NULL,
  `Fourth_Payment` decimal(65,2) NOT NULL,
  `Discount` int(220) NOT NULL,
  `Mode` int(220) NOT NULL,
  `Fee` decimal(65,2) NOT NULL,
  `Balance` decimal(65,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_prospectivestudents
-- ----------------------------
INSERT INTO tbl_prospectivestudents VALUES ('1', 'none', '', '0', '2017 - 2018', 'Grade 7', 'February 13,2016', 'new student', 'santos', 'jeremiah', 'ania', 'PENDING', '', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0.00');
INSERT INTO tbl_prospectivestudents VALUES ('2', 'kevinreyes@yahoo.com', '', '0', '2017 - 2018', 'Grade 7', 'February 13,2016', 'new student', 'Reyes', 'Kevin', 'Armeza', 'PENDING', '', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0.00');
INSERT INTO tbl_prospectivestudents VALUES ('3', 'none', '', '0', '2017 - 2018', '', 'February 13,2016', 'new student', 'aaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaa', 'recycle', '', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0.00');
INSERT INTO tbl_prospectivestudents VALUES ('4', 'none', '', '0', '2017 - 2018', 'Grade 11', 'February 13,2016', 'new student', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaa', 'PENDING', '', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '0', '0', '0.00', '0.00');

-- ----------------------------
-- Table structure for `tbl_registrar`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_registrar`;
CREATE TABLE `tbl_registrar` (
  `id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `time_in` varchar(50) DEFAULT NULL,
  `time_out` varchar(50) DEFAULT NULL,
  `photo_file` varchar(50) NOT NULL,
  `photo_size` varchar(50) NOT NULL,
  `photo_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_registrar
-- ----------------------------
INSERT INTO tbl_registrar VALUES ('1', 'kentberdensen', '7b52dc3f0b1edd509a9ac4114ee3433827971c8b', 'February 12, 2016, 12:17am', 'February 12, 2016, 12:18am', '84695-jeremiah-29-11-fb-coverphoto.jpg', '87.7265625', 'image/jpeg');
INSERT INTO tbl_registrar VALUES ('2', 'kentberdensen', '7b52dc3f0b1edd509a9ac4114ee3433827971c8b', 'February 12, 2016, 04:58am', 'February 12, 2016, 11:49am', '84695-jeremiah-29-11-fb-coverphoto.jpg', '87.7265625', 'image/jpeg');
INSERT INTO tbl_registrar VALUES ('3', 'kentberdensen', '7b52dc3f0b1edd509a9ac4114ee3433827971c8b', 'February 13, 2016, 07:19am', 'February 13, 2016, 8:15am', '84695-jeremiah-29-11-fb-coverphoto.jpg', '87.7265625', 'image/jpeg');
INSERT INTO tbl_registrar VALUES ('4', 'kentberdensen', '7b52dc3f0b1edd509a9ac4114ee3433827971c8b', 'February 13, 2016, 08:17am', 'February 13, 2016, 8:45am', '84695-jeremiah-29-11-fb-coverphoto.jpg', '87.7265625', 'image/jpeg');
INSERT INTO tbl_registrar VALUES ('5', 'kentberdensen', '7b52dc3f0b1edd509a9ac4114ee3433827971c8b', 'February 14, 2016, 01:34am', '', '33910-img_20160131_200516.jpg', '74.181640625', 'image/jpeg');

-- ----------------------------
-- Table structure for `tbl_studentdetails`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_studentdetails`;
CREATE TABLE `tbl_studentdetails` (
  `id` int(10) NOT NULL,
  `peraddress` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `age` int(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `guardianname` varchar(50) NOT NULL,
  `guardianaddress` varchar(50) NOT NULL,
  `guardiancontact` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_studentdetails
-- ----------------------------
INSERT INTO tbl_studentdetails VALUES ('1', 'dagatdagatan', '3372323', '09082333727', '6/1/1999', '17', 'Male', 'Valenzuela', 'CATHOLIC', 'Mariakatherine', 'dagatdagatan', '09058357333');
INSERT INTO tbl_studentdetails VALUES ('2', 'Malaboncity', '0000000', '00000000000', '1/10/1993', '23', 'Male', 'Malaboncity', 'CATHOLIC', 'Oskiness', 'Navotascity', '99999999999');
INSERT INTO tbl_studentdetails VALUES ('3', 'aaaaaaaaaaaaaaaaaaaaaaaaa', '2222222', '22222222222', '6/1/1999', '17', 'Male', '22222222222222222222222222222222222', 'CHRISTIAN', 'dsssssssssssssssssssss', 'ssssssssssssssssss', '22222222222');
INSERT INTO tbl_studentdetails VALUES ('4', 'aaaaaaaaaaaaaaaaaaaaaaaa', '2222222', '22222222222', '11/1/2000', '16', 'Male', '222222222222222', 'CATHOLIC', 'ssssssssssssssssss', 'ssssssssssssssssssssssss', '22222222222');

-- ----------------------------
-- Table structure for `tbl_studentimages`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_studentimages`;
CREATE TABLE `tbl_studentimages` (
  `id` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_studentimages
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_studentregistration`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_studentregistration`;
CREATE TABLE `tbl_studentregistration` (
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` int(25) NOT NULL,
  `confirm_code` int(25) NOT NULL,
  `seeking` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `prospectivestatus` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_studentregistration
-- ----------------------------
INSERT INTO tbl_studentregistration VALUES ('Jeremy', 'Rojas', 'gummybites', '975224e998c74f2c4160c8c777705a35c9216872', 'jeremy@yahoo.com', '0', '798', 'Grade 7', 'new student', 'pending');
INSERT INTO tbl_studentregistration VALUES ('Reyes', 'Kevin', 'kevin1234', 'b102ce1d5eebac2b6d74bda8c87c47a050c80491', 'kevinreyes@yahoo.com', '1', '0', 'Grade 7', 'new student', 'pending');

-- ----------------------------
-- Table structure for `tbl_studentrequirements`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_studentrequirements`;
CREATE TABLE `tbl_studentrequirements` (
  `id` varchar(100) NOT NULL,
  `form138_file` varchar(100) NOT NULL,
  `form138_type` varchar(10) NOT NULL,
  `form138_size` int(11) NOT NULL,
  `Form138` int(11) NOT NULL,
  `goodmoral_file` varchar(100) NOT NULL,
  `goodmoral_type` varchar(10) NOT NULL,
  `goodmoral_size` int(11) NOT NULL,
  `GoodMoral` int(11) NOT NULL,
  `birthcertificate_file` varchar(100) NOT NULL,
  `birthcertificate_type` varchar(10) NOT NULL,
  `birthcertificate_size` int(11) NOT NULL,
  `BirthCertificate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_studentrequirements
-- ----------------------------
INSERT INTO tbl_studentrequirements VALUES ('1', '', '', '0', '0', '', '', '0', '0', '', '', '0', '0');
INSERT INTO tbl_studentrequirements VALUES ('2', '', '', '0', '0', '', '', '0', '0', '', '', '0', '0');
INSERT INTO tbl_studentrequirements VALUES ('3', '', '', '0', '0', '', '', '0', '0', '', '', '0', '0');
INSERT INTO tbl_studentrequirements VALUES ('4', '', '', '0', '0', '', '', '0', '0', '', '', '0', '0');

-- ----------------------------
-- Table structure for `tbl_subjects`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_subjects`;
CREATE TABLE `tbl_subjects` (
  `yearlevel` varchar(250) NOT NULL,
  `subjects` varchar(250) NOT NULL,
  `subject_code` varchar(250) NOT NULL,
  `Extras` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tbl_subjects
-- ----------------------------
INSERT INTO tbl_subjects VALUES ('Grade 7', 'Mathematics', 'MATH', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 7', 'Science', 'SCI', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 7', 'Filipino', 'FIL', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 7', 'English', 'ENG', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 7', 'Araling Panlipunan', 'AP', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 7', 'Technology And Livelihood Education', 'TLE', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 7', 'Musics,Arts,PhysicalEducation,Health', 'MAPEH', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 7', 'EdukasyonSaPagpapahalaga', 'ESP', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 8', 'Mathematics', 'MATH', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 8', 'Science', 'SCI', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 8', 'Filipino', 'FIL', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 8', 'English', 'ENG', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 8', 'Araling Panlipunan', 'AP', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 8', 'Technology And Livelihood Education', 'TLE', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 8', 'Musics,Arts,PhysicalEducation,Health', 'MAPEH', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 8', 'EdukasyonSaPagpapahalaga', 'ESP', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 9', 'Mathematics', 'MATH', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 9', 'Science', 'SCI', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 9', 'Filipino', 'FIL', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 9', 'English', 'ENG', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 9', 'Araling Panlipunan', 'AP', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 9', 'Technology And Livelihood Education', 'TLE', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 9', 'Musics,Arts,PhysicalEducation,Health', 'MAPEH', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 9', 'EdukasyonSaPagpapahalaga', 'ESP', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 10', 'Science', 'SCI', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 10', 'Mathematics', 'MATH', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 10', 'Filipino', 'FIL', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 10', 'English', 'ENG', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 10', 'Araling Panlipunan', 'AP', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 10', 'Technology And Livelihood Education', 'TLE', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 10', 'Musics,Arts,PhysicalEducation,Health', 'MAPEH', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 10', 'EdukasyonSaPagpapahalaga', 'ESP', 'no');
INSERT INTO tbl_subjects VALUES ('Grade 10', 'Combat Alpha Training', 'CAT', 'yes');
INSERT INTO tbl_subjects VALUES ('Grade 10', 'Computer', 'COMP', 'yes');

-- ----------------------------
-- Table structure for `tbl_tuition`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tuition`;
CREATE TABLE `tbl_tuition` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `year` varchar(20) NOT NULL,
  `tuition` decimal(20,2) NOT NULL,
  `registration` decimal(20,2) NOT NULL,
  `medical` decimal(20,2) NOT NULL,
  `library` decimal(20,2) NOT NULL,
  `athletics` decimal(20,2) NOT NULL,
  `student_government_fee` decimal(20,2) NOT NULL,
  `prisaa_fee` decimal(20,2) NOT NULL,
  `bulprisa_fee` decimal(20,2) NOT NULL,
  `aprism_fee` decimal(20,2) NOT NULL,
  `student_id` decimal(20,2) NOT NULL,
  `handbook` decimal(20,2) NOT NULL,
  `energy_fee` decimal(20,2) NOT NULL,
  `insurance_fee` decimal(20,2) NOT NULL,
  `organization_fee` decimal(20,2) NOT NULL,
  `computer_lab` decimal(20,2) NOT NULL,
  `science_lab` decimal(20,2) NOT NULL,
  `tle_lab` decimal(20,2) NOT NULL,
  `school_activities_fee` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_tuition
-- ----------------------------
INSERT INTO tbl_tuition VALUES ('1', '2015', '9746.25', '573.00', '300.00', '236.00', '726.00', '100.00', '150.00', '100.00', '100.00', '100.00', '100.00', '1500.00', '150.00', '100.00', '1380.00', '450.00', '450.00', '168.75');

-- ----------------------------
-- Table structure for `walalang`
-- ----------------------------
DROP TABLE IF EXISTS `walalang`;
CREATE TABLE `walalang` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of walalang
-- ----------------------------
INSERT INTO walalang VALUES ('15', '99061-jpeg2000-home.jpeg', 'image/jpeg', '16');
