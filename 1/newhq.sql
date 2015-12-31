-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2015 at 08:38 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `newhq`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'CEO'),
(4, 'Employee'),
(3, 'HR'),
(5, 'Master Admin');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL,
  `androidtext` varchar(255) NOT NULL,
  `iostext` varchar(255) NOT NULL,
  `pem` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `androidtext`, `iostext`, `pem`, `name`) VALUES
(1, 'AIzaSyAtK86s_4J4gyZM9AHpxtHXGp59UDqSifs', '1234', '', 'Push Notification');

-- --------------------------------------------------------

--
-- Table structure for table `hq_branch`
--

CREATE TABLE IF NOT EXISTS `hq_branch` (
  `id` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `branchid` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_branch`
--

INSERT INTO `hq_branch` (`id`, `language`, `name`, `branchid`, `address`) VALUES
(1, 0, 'Mumbai', 'br1', 'Mumbai,Maharashtra'),
(2, 0, 'Branch2', 'br2', '2,2 area,2,2,2'),
(3, 0, 'Vikroli1', 'V121', 'lbs road111');

-- --------------------------------------------------------

--
-- Table structure for table `hq_conclusion`
--

CREATE TABLE IF NOT EXISTS `hq_conclusion` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_conclusion`
--

INSERT INTO `hq_conclusion` (`id`, `order`, `name`) VALUES
(2, 1, 'first conclusions'),
(3, 2, 'Second Conclusion');

-- --------------------------------------------------------

--
-- Table structure for table `hq_conclusionfinalsuggestion`
--

CREATE TABLE IF NOT EXISTS `hq_conclusionfinalsuggestion` (
  `id` int(11) NOT NULL,
  `conclusion` int(11) NOT NULL,
  `conclusionsuggestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hq_conclusionquestion`
--

CREATE TABLE IF NOT EXISTS `hq_conclusionquestion` (
  `id` int(11) NOT NULL,
  `conclusion` int(11) NOT NULL,
  `question` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_conclusionquestion`
--

INSERT INTO `hq_conclusionquestion` (`id`, `conclusion`, `question`) VALUES
(1, 2, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hq_conclusionsuggestion`
--

CREATE TABLE IF NOT EXISTS `hq_conclusionsuggestion` (
  `id` int(11) NOT NULL,
  `conclusion` int(11) NOT NULL,
  `suggestion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hq_content`
--

CREATE TABLE IF NOT EXISTS `hq_content` (
  `id` int(11) NOT NULL,
  `pillar` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_content`
--

INSERT INTO `hq_content` (`id`, `pillar`, `image`, `timestamp`, `text`) VALUES
(1, 4, 'download_(1)1.jpg', '2015-10-31 09:24:48', 'abcdafr');

-- --------------------------------------------------------

--
-- Table structure for table `hq_department`
--

CREATE TABLE IF NOT EXISTS `hq_department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deptid` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_department`
--

INSERT INTO `hq_department` (`id`, `name`, `deptid`) VALUES
(1, 'IT', 'IT-12'),
(2, 'Account', 'dept1'),
(3, 'Marketing1', 'M12111');

-- --------------------------------------------------------

--
-- Table structure for table `hq_designation`
--

CREATE TABLE IF NOT EXISTS `hq_designation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_designation`
--

INSERT INTO `hq_designation` (`id`, `name`, `language`) VALUES
(1, 'Sr. Manager', '0'),
(2, 'Manager', ''),
(3, 'It Analyst', '0');

-- --------------------------------------------------------

--
-- Table structure for table `hq_options`
--

CREATE TABLE IF NOT EXISTS `hq_options` (
  `id` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `representation` int(11) NOT NULL,
  `actualorder` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `optiontext` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_options`
--

INSERT INTO `hq_options` (`id`, `question`, `representation`, `actualorder`, `image`, `order`, `weight`, `optiontext`, `text`) VALUES
(7, 1, 1, 0, '', '', '20', '1: I try to take the same bus back home everyday', '1: I try to take the same bus back home everyday'),
(8, 1, 1, 0, '', '', '50', '2: I secretly have a bunk bed in office', '2: I secretly have a bunk bed in office'),
(9, 1, 1, 0, '', '', '70', '3: I see the sun set everyday', '3: I see the sun set everyday'),
(10, 1, 1, 0, '', '', '100', '4: I wasn''t able to attend the last family function', '4: I wasn''t able to attend the last family function'),
(11, 2, 1, 0, '', '', '100', '4 pictures as mentioned in the Pictorial Representation column.', '4 pictures as mentioned in the Pictorial Representation column.'),
(12, 3, 1, 0, '', '', '20', 'Getting recognized', 'Getting recognized'),
(13, 3, 1, 0, '', '', '30', 'Money', 'Money'),
(14, 3, 1, 0, '', '', '50', 'Happy Workplace', 'Happy Workplace'),
(15, 3, 1, 0, '', '', '70', 'Time with family and friends', 'Time with family and friends'),
(16, 3, 1, 0, '', '', '80', 'Success', 'Success'),
(17, 3, 1, 0, '', '', '90', 'Independence', 'Independence'),
(18, 3, 1, 0, '', '', '25', 'Support', 'Support'),
(19, 3, 1, 0, '', '', '100', 'Community Service', 'Community Service'),
(20, 4, 1, 0, '', '', '50', '1: It''s simple. I do both!', '1: It''s simple. I do both!'),
(21, 4, 1, 0, '', '', '20', '2: I can''t help thinking about work while exercising', '2: I can''t help thinking about work while exercising'),
(22, 4, 1, 0, '', '', '100', '3: I am out of practice when it comes to exercising', '3: I am out of practice when it comes to exercising'),
(23, 4, 1, 0, '', '', '70', '4:  I focus on exercising while I am at it', '4:  I focus on exercising while I am at it'),
(24, 5, 1, 0, '', '', '100', '1: Some things need to change', '1: Some things need to change'),
(25, 5, 1, 0, '', '', '50', '2: We all have good days and bad days', '2: We all have good days and bad days'),
(26, 5, 1, 0, '', '', '20', '3: Let''s not even talk about work', '3: Let''s not even talk about work'),
(27, 5, 1, 0, '', '', '70', '4: It''s going really well!', '4: It''s going really well!'),
(28, 6, 1, 0, '', '', '40', '1: Not really an issue because I can always reach out to someone.', '1: Not really an issue because I can always reach out to someone.'),
(29, 6, 1, 0, '', '', '20', '2:  I don''t know what to do.', '2:  I don''t know what to do.'),
(30, 6, 1, 0, '', '', '100', '3:  I''m not stressed. I get to learn something new.', '3:  I''m not stressed. I get to learn something new.'),
(31, 6, 1, 0, '', '', '60', '4:  I''m not sure of who I can go to for help.', '4:  I''m not sure of who I can go to for help.'),
(32, 7, 1, 0, '', '', '90', '1: Not a bad idea.', '1: Not a bad idea.'),
(33, 7, 1, 0, '', '', '50', '2:  I''m not sure if you should apply  right now.', '2:  I''m not sure if you should apply  right now.'),
(34, 7, 1, 0, '', '', '80', '3: Are you sure you want to apply in my company? `', '3: Are you sure you want to apply in my company?'),
(35, 7, 1, 0, '', '', '100', '4: Sure! You should definitely apply. Send in your CV.', '4: Sure! You should definitely apply. Send in your CV.'),
(36, 8, 1, 0, '', '', '100', '1: Okay. I don''t have much to say about this.', '1: Okay. I don''t have much to say about this.'),
(37, 8, 1, 0, '', '', '20', '2: Yes, I know! Wow, that''s such good news!', '2: Yes, I know! Wow, that''s such good news!'),
(38, 8, 1, 0, '', '', '60', '3: What is my organization getting an award for?', '3: What is my organization getting an award for?'),
(39, 8, 1, 0, '', '', '80', '4:  That''s nice, I guess.', '4:  That''s nice, I guess.'),
(40, 9, 1, 0, '', '', '20', 'Freedom', 'Freedom'),
(41, 9, 1, 0, '', '', '30', 'Integrity', 'Integrity'),
(42, 9, 1, 0, '', '', '40', 'Team Work', 'Team Work'),
(43, 9, 1, 0, '', '', '50', 'Relationships', 'Relationships'),
(44, 9, 1, 0, '', '', '60', 'Job Security', 'Job Security'),
(45, 9, 1, 0, '', '', '70', 'Recognition', 'Recognition'),
(46, 9, 1, 0, '', '', '80', 'Social Responsibility', 'Social Responsibility'),
(47, 9, 1, 0, '', '', '100', 'Personal Growth', 'Personal Growth'),
(48, 10, 1, 0, '', '', '30', 'Respect  from others', 'Respect  from others'),
(49, 10, 1, 0, '', '', '40', 'Appreciation', 'Appreciation'),
(50, 10, 1, 0, '', '', '50', 'Financial Stability', 'Financial Stability'),
(51, 10, 1, 0, '', '', '60', 'Social Network (Friends and Family)', 'Social Network (Friends and Family)'),
(52, 10, 1, 0, '', '', '70', 'Helping the Society', 'Helping the Society'),
(53, 10, 1, 0, '', '', '80', 'Pursuing Hobbies', 'Pursuing Hobbies'),
(54, 10, 1, 0, '', '', '90', 'Work', 'Work'),
(55, 10, 1, 0, '', '', '100', 'Good Health', 'Good Health'),
(56, 11, 1, 0, '', '', '30', '1: It''s a little hard to get out of bed.', '1: It''s a little hard to get out of bed.'),
(57, 11, 1, 0, '', '', '50', '2: I need to check my mail first thing in the morning.', '2: I need to check my mail first thing in the morning.'),
(58, 11, 1, 0, '', '', '70', '3: I can''t wait to have my morning cup of tea and start the day!', '3: I can''t wait to have my morning cup of tea and start the day!'),
(59, 11, 1, 0, '', '', '100', '4: Can I go back in time to have the weekend again?', '4: Can I go back in time to have the weekend again?'),
(60, 12, 1, 0, '', '', '100', 'Afford the luxuries', 'Afford the luxuries'),
(61, 12, 1, 0, '', '', '90', 'The Team', 'The Team'),
(62, 12, 1, 0, '', '', '80', 'It matters to me', 'It matters to me'),
(63, 12, 1, 0, '', '', '70', 'Meet my deadlines/targets', 'Meet my deadlines/targets'),
(64, 12, 1, 0, '', '', '60', 'Societal Acceptance', 'Societal Acceptance'),
(65, 12, 1, 0, '', '', '50', 'Salary', 'Salary'),
(66, 12, 1, 0, '', '', '40', 'Stability in Life', 'Stability in Life'),
(67, 12, 1, 0, '', '', '30', 'Learn Something New', 'Learn Something New'),
(68, 13, 1, 0, '', '', '30', '1: I have the time. What exercise should I be doing?', '1: I have the time. What exercise should I be doing?'),
(69, 13, 1, 0, '', '', '100', '2: I exercise when I can. It depends on work.', '2: I exercise when I can. It depends on work.'),
(70, 13, 1, 0, '', '', '70', '3:  I have an exercise routine that I follow.', '3:  I have an exercise routine that I follow.'),
(71, 13, 1, 0, '', '', '50', '4: Exercise? I wish I had the time.', '4: Exercise? I wish I had the time.'),
(72, 14, 1, 0, '', '', '50', '1: "I don''t know what to do."', '1: "I don''t know what to do."'),
(73, 14, 1, 0, '', '', '40', '2: "This happens at work. I know how to deal with this."', '2: "This happens at work. I know how to deal with this."'),
(74, 14, 1, 0, '', '', '70', '3: "I will talk to the Counsellor. That helps."', '3: "I will talk to the Counsellor. That helps."'),
(75, 14, 1, 0, '', '', '100', '4: "I need help. Who should I talk to?"', '4: "I need help. Who should I talk to?"'),
(76, 15, 1, 0, '', '', '40', '1: Let me make that call. I''ll start once that is done.', '1: Let me make that call. I''ll start once that is done.'),
(77, 15, 1, 0, '', '', '30', '2: I need to finish this today. Let''s do this!', '2: I need to finish this today. Let''s do this!'),
(78, 15, 1, 0, '', '', '100', '3: It''s due in the evening. Plenty of time left.', '3: It''s due in the evening. Plenty of time left.'),
(79, 15, 1, 0, '', '', '70', '4: I can work on this while sending out those mails.', '4: I can work on this while sending out those mails.'),
(80, 16, 1, 0, '', '', '10', '1: I follow a routine when I eat at work.', '1: I follow a routine when I eat at work.'),
(81, 16, 1, 0, '', '', '40', '2: I eat a bit of both.', '2: I eat a bit of both.'),
(82, 16, 1, 0, '', '', '70', '3: It''s faster and easier to have junk food at work.', '3: It''s faster and easier to have junk food at work.'),
(83, 16, 1, 0, '', '', '100', '4: Eating in office? I wish I had the time!', '4: Eating in office? I wish I had the time!'),
(84, 17, 1, 0, '', '', '40', '1: I am not sure of what to do. I can ask someone to tell me again.', '1: I am not sure of what to do. I can ask someone to tell me again.'),
(85, 17, 1, 0, '', '', '60', '2:  Please don''t pick me for this one.', '2:  Please don''t pick me for this one.'),
(86, 17, 1, 0, '', '', '80', '3:  I know what to do. Not a problem.', '3:  I know what to do. Not a problem.'),
(87, 17, 1, 0, '', '', '100', '4: I don''t know what needs to be done. Who should I be asking?', '4: I don''t know what needs to be done. Who should I be asking?'),
(88, 18, 1, 0, '', '', '100', '1: It''s a little awkward. What am I supposed to say?', '1: It''s a little awkward. What am I supposed to say?'),
(89, 18, 1, 0, '', '', '60', '2: I would prefer to look at my phone.', '2: I would prefer to look at my phone.'),
(90, 18, 1, 0, '', '', '40', '3: Why does the lift get stuck at a time like this? I don''t know what to do.', '3: Why does the lift get stuck at a time like this? I don''t know what to do.'),
(91, 18, 1, 0, '', '', '20', '4: No problem! I get a chance to catch up with my boss.', '4: No problem! I get a chance to catch up with my boss.'),
(92, 19, 1, 0, '', '', '30', '1: Some colleagues might want to be there.', '1: Some colleagues might want to be there.'),
(93, 19, 1, 0, '', '', '50', '2: Colleagues for my party? Not so sure.', '2: Colleagues for my party? Not so sure.'),
(94, 19, 1, 0, '', '', '60', '3: There are so many colleagues who would love to be there', '3: There are so many colleagues who would love to be there'),
(95, 19, 1, 0, '', '', '100', '4: I am not sure of who I can call.', '4: I am not sure of who I can call.'),
(96, 20, 1, 0, '', '', '100', 'Part of a Bigger Family', 'Part of a Bigger Family'),
(97, 20, 1, 0, '', '', '90', 'Fun', 'Fun'),
(98, 20, 1, 0, '', '', '80', 'Room full of strangers', 'Room full of strangers'),
(99, 20, 1, 0, '', '', '70', 'Neutral', 'Neutral'),
(100, 20, 1, 0, '', '', '60', 'Sense of Fear', 'Sense of Fear'),
(101, 20, 1, 0, '', '', '50', 'Lack of Acceptance', 'Lack of Acceptance'),
(102, 20, 1, 0, '', '', '40', 'Each employee in one''s own zone', 'Each employee in one''s own zone'),
(103, 20, 1, 0, '', '', '30', 'Waiting for 6:30 PM', 'Waiting for 6:30 PM'),
(104, 1, 0, 2345, 'download_(2)1.jpg', '123', '543', 'abc', 'abc123'),
(105, 21, 1, 0, '', '', '50', 'dummy option 1', 'dummy option 1'),
(106, 22, 1, 0, '', '', '70', 'dummy option 2', 'dummy option 2'),
(107, 23, 1, 0, '', '', '80', 'dummy option 3', 'dummy option 3'),
(108, 24, 1, 0, '', '', '55', 'dummy option 4', 'dummy option 4'),
(109, 25, 0, 0, '', '', '85', 'dummy option 5', 'dummy option 5'),
(110, 22, 1, 0, '', '', '75', 'Dummy option 2', 'Dummy option 2');

-- --------------------------------------------------------

--
-- Table structure for table `hq_pillar`
--

CREATE TABLE IF NOT EXISTS `hq_pillar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `order` varchar(255) NOT NULL,
  `expectedweight` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_pillar`
--

INSERT INTO `hq_pillar` (`id`, `name`, `weight`, `order`, `expectedweight`) VALUES
(1, 'Work Life Blend', '50', '1', '80'),
(2, 'Employee Engagement', '50', '2', '85'),
(3, 'Driving Force', '50', '3', '75'),
(4, 'Health of an Individual', '50', '4', '60'),
(5, 'Interpersonal Relationships at Work', '50', '5', '45'),
(6, 'Pillar 6', '50', '6', '50'),
(7, 'Pillar 7', '50', '7', '90'),
(8, 'Pillar 8', '50', '8', '85'),
(9, 'Pillar 9', '50', '9', '65'),
(10, 'Pillar 10', '50', '10', '70');

-- --------------------------------------------------------

--
-- Table structure for table `hq_question`
--

CREATE TABLE IF NOT EXISTS `hq_question` (
  `id` int(11) NOT NULL,
  `pillar` int(11) NOT NULL,
  `noofans` int(11) NOT NULL,
  `order` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_question`
--

INSERT INTO `hq_question` (`id`, `pillar`, `noofans`, `order`, `timestamp`, `text`) VALUES
(1, 1, 1, '', '2015-11-24 10:00:59', 'You put in your best at work. We know you do. But, your life\n\nlooks like this...'),
(2, 1, 0, '', '2015-11-24 10:01:01', 'You have managed to get the much-awaited annual leave. You have taken your family along. You will be like…'),
(3, 1, 0, '', '2015-08-04 11:34:14', 'You just met a genie who can grant you wishes of your choice. You choose…'),
(4, 1, 0, '', '2015-08-04 11:34:42', 'You know how important it is to exercise as well as meet deadlines. We know you can do both. So…'),
(5, 2, 0, '', '2015-08-04 11:35:01', 'You meet a school friend after a long time and she asks you, "How''s work?". You say…'),
(6, 2, 0, '', '2015-08-04 11:35:28', 'You are in the middle of a project and things aren''t going your way.  What next?'),
(7, 2, 0, '', '2015-08-04 11:35:56', 'Your junior in college approaches you for a job in your company and you say…'),
(8, 2, 0, '', '2015-08-04 11:36:11', 'Congratulations! Your organization just won an award.'),
(9, 3, 0, '', '2015-08-04 11:36:27', 'The values and/or beliefs that drive you in life are :'),
(10, 3, 0, '', '2015-08-04 11:36:36', 'What will make you sing ''Because I''m happy..''?\n\nIn case audio option of the song (Because I''m happy) unavailable,\nWhat will make you want to say, "This makes me happy!"?'),
(11, 3, 0, '', '2015-08-04 11:36:48', 'Yes, the weekend is over and Monday morning is back.'),
(12, 3, 0, '', '2015-08-04 11:37:02', 'You come to work because.'),
(13, 4, 0, '', '2015-08-04 11:37:21', 'To exercise or not to exercise…that is the question.'),
(14, 4, 0, '', '2015-08-04 11:37:30', 'When work gets stressful, you say…'),
(15, 4, 0, '', '2015-08-04 11:37:39', 'You need to submit that report by today evening and you think…'),
(16, 4, 0, '', '2015-08-04 11:37:52', 'Your food habits at work looks like this…'),
(17, 5, 0, '', '2015-08-04 11:38:10', 'When you are in a team meeting where tasks are being allocated, you think…'),
(18, 5, 0, '', '2015-08-04 11:38:16', 'You are stuck in the lift with your boss. What next?'),
(19, 5, 0, '', '2015-08-04 11:38:24', 'You are making a guest list for your birthday party. You think to yourself…'),
(20, 5, 0, '', '2015-08-04 11:38:39', 'When I am at work, it is like…'),
(21, 6, 0, '6', '2015-12-29 05:48:12', 'Dummy 1'),
(22, 7, 0, '7', '2015-12-29 05:48:26', 'Dummy 2'),
(23, 8, 0, '8', '2015-12-29 05:48:42', 'Dummy 3'),
(24, 9, 0, '9', '2015-12-29 05:49:16', 'Dummy 4'),
(25, 10, 0, '10', '2015-12-29 05:50:29', 'Dummy 5');

-- --------------------------------------------------------

--
-- Table structure for table `hq_surveyoption`
--

CREATE TABLE IF NOT EXISTS `hq_surveyoption` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_surveyoption`
--

INSERT INTO `hq_surveyoption` (`id`, `order`, `question`, `title`, `image`) VALUES
(1, 1, 1, 'first option', '_322.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hq_surveyquestion`
--

CREATE TABLE IF NOT EXISTS `hq_surveyquestion` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_surveyquestion`
--

INSERT INTO `hq_surveyquestion` (`id`, `type`, `text`, `starttime`, `endtime`) VALUES
(1, 1, 'first que', '02:03:00', '06:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `hq_surveyquestionanswer`
--

CREATE TABLE IF NOT EXISTS `hq_surveyquestionanswer` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `option` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_surveyquestionanswer`
--

INSERT INTO `hq_surveyquestionanswer` (`id`, `user`, `question`, `option`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hq_surveyquestionuser`
--

CREATE TABLE IF NOT EXISTS `hq_surveyquestionuser` (
  `id` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_surveyquestionuser`
--

INSERT INTO `hq_surveyquestionuser` (`id`, `question`, `email`) VALUES
(1, 1, 'pooja@wohlig.com');

-- --------------------------------------------------------

--
-- Table structure for table `hq_team`
--

CREATE TABLE IF NOT EXISTS `hq_team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teamid` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hq_team`
--

INSERT INTO `hq_team` (`id`, `name`, `teamid`) VALUES
(5, 'HR Team', 'H1'),
(6, 'Team B', 't2');

-- --------------------------------------------------------

--
-- Table structure for table `hq_useranswer`
--

CREATE TABLE IF NOT EXISTS `hq_useranswer` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `pillar` int(11) DEFAULT NULL,
  `question` int(11) NOT NULL,
  `option` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `test` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_useranswer`
--

INSERT INTO `hq_useranswer` (`id`, `user`, `pillar`, `question`, `option`, `order`, `timestamp`, `test`) VALUES
(1, 15, 1, 1, 7, 0, '2015-08-04 13:05:48', 1),
(2, 15, 1, 2, 11, 0, '2015-08-04 13:06:17', 1),
(3, 15, 1, 3, 15, 0, '2015-08-04 13:06:47', 1),
(4, 15, 1, 4, 21, 0, '2015-08-04 13:07:38', 1),
(5, 15, 2, 5, 25, 0, '2015-08-04 13:08:38', 1),
(6, 15, 2, 6, 0, 0, '2015-08-04 13:08:54', 1),
(7, 15, 2, 7, 33, 0, '2015-08-04 13:09:42', 1),
(8, 15, 2, 8, 37, 0, '2015-08-04 13:11:00', 1),
(9, 15, 3, 9, 43, 0, '2015-08-04 13:11:52', 1),
(10, 15, 3, 10, 52, 0, '2015-08-04 13:12:41', 1),
(11, 15, 3, 11, 56, 0, '2015-08-04 13:15:24', 1),
(12, 15, 3, 12, 64, 0, '2015-08-04 13:16:30', 1),
(13, 15, 4, 13, 70, 0, '2015-08-04 13:16:58', 1),
(14, 15, 4, 14, 74, 0, '2015-08-04 13:17:11', 1),
(15, 15, 4, 15, 76, 0, '2015-08-04 13:17:46', 1),
(16, 15, 4, 17, 84, 0, '2015-08-04 13:18:06', 1),
(17, 15, 4, 18, 90, 0, '2015-08-04 13:19:03', 1),
(18, 15, 5, 17, 84, 0, '2015-08-05 04:20:22', 1),
(19, 15, 5, 18, 89, 0, '2015-08-05 04:20:42', 1),
(20, 15, 5, 19, 94, 0, '2015-08-05 04:21:03', 1),
(21, 15, 5, 20, 99, 0, '2015-08-05 04:21:29', 1),
(22, 16, 1, 1, 0, 0, '2015-11-27 05:59:59', 1),
(23, 16, 1, 2, 0, 0, '2015-11-26 11:27:44', 1),
(24, 16, 1, 3, 0, 0, '2015-11-26 11:27:47', 1),
(25, 16, 1, 4, 0, 0, '2015-11-27 05:59:59', 1),
(26, 16, 2, 5, 0, 0, '2015-11-27 05:59:59', 1),
(27, 16, 2, 6, 0, 0, '2015-11-27 05:59:59', 1),
(28, 16, 2, 7, 0, 0, '2015-11-27 05:59:59', 1),
(29, 16, 2, 8, 0, 0, '2015-11-27 05:59:59', 1),
(30, 16, 3, 9, 0, 0, '2015-11-27 05:59:59', 1),
(31, 16, 3, 11, 0, 0, '2015-11-27 05:59:59', 1),
(32, 16, 3, 12, 0, 0, '2015-11-27 05:59:59', 1),
(33, 16, 4, 13, 0, 0, '2015-11-27 05:59:59', 1),
(34, 16, 4, 14, 0, 0, '2015-11-27 05:59:59', 1),
(35, 16, 4, 15, 0, 0, '2015-11-27 05:59:59', 1),
(36, 16, 4, 16, 0, 0, '2015-11-27 05:59:59', 1),
(37, 16, 5, 17, 0, 0, '2015-11-27 05:59:59', 1),
(38, 16, 5, 18, 0, 0, '2015-11-27 05:59:59', 1),
(39, 16, 5, 19, 0, 0, '2015-11-27 05:59:59', 1),
(40, 16, 5, 20, 0, 0, '2015-11-27 05:59:59', 1),
(41, 7, 1, 1, 8, 0, '2015-08-05 05:44:49', 1),
(42, 7, 1, 2, 11, 0, '2015-08-05 05:44:59', 1),
(43, 7, 1, 3, 17, 0, '2015-08-05 05:45:11', 1),
(44, 7, 1, 4, 21, 0, '2015-08-05 05:45:23', 1),
(45, 7, 2, 5, 25, 0, '2015-08-05 05:45:44', 1),
(46, 7, 2, 6, 30, 0, '2015-08-05 05:45:55', 1),
(47, 7, 2, 7, 33, 0, '2015-08-05 05:46:07', 1),
(48, 7, 2, 8, 37, 0, '2015-08-05 05:46:31', 1),
(49, 7, 3, 9, 45, 0, '2015-08-05 05:46:47', 1),
(50, 7, 3, 10, 52, 0, '2015-08-05 05:47:01', 1),
(51, 7, 3, 11, 57, 0, '2015-08-05 05:47:17', 1),
(52, 7, 3, 12, 64, 0, '2015-08-05 05:47:28', 1),
(53, 7, 4, 13, 70, 0, '2015-08-05 05:47:38', 1),
(54, 7, 4, 14, 72, 0, '2015-08-05 05:47:51', 1),
(55, 7, 4, 15, 76, 0, '2015-08-05 05:48:16', 1),
(56, 7, 4, 16, 81, 0, '2015-08-05 05:59:18', 1),
(57, 7, 5, 17, 85, 0, '2015-08-05 05:59:31', 1),
(58, 7, 5, 18, 89, 0, '2015-08-05 05:59:43', 1),
(59, 7, 5, 19, 94, 0, '2015-08-05 05:59:56', 1),
(60, 7, 5, 20, 101, 0, '2015-08-05 06:00:09', 1),
(61, 15, 1, 1, 8, 0, '2015-08-05 11:00:06', 2),
(62, 15, 1, 2, 11, 0, '2015-08-05 11:00:33', 2),
(63, 15, 1, 3, 18, 0, '2015-08-05 11:01:01', 2),
(64, 15, 1, 4, 21, 0, '2015-08-05 11:01:17', 2),
(65, 15, 2, 5, 24, 0, '2015-08-05 11:01:52', 2),
(66, 15, 2, 6, 30, 0, '2015-08-05 11:02:11', 2),
(67, 15, 2, 7, 33, 0, '2015-08-05 11:02:30', 2),
(68, 15, 2, 8, 36, 0, '2015-08-05 11:02:53', 2),
(69, 15, 3, 9, 44, 0, '2015-08-05 11:03:13', 2),
(70, 15, 3, 10, 52, 0, '2015-08-05 11:03:30', 2),
(71, 15, 3, 11, 57, 0, '2015-08-05 11:03:45', 2),
(72, 15, 3, 12, 65, 0, '2015-08-05 11:04:07', 2),
(73, 15, 4, 13, 68, 0, '2015-08-05 11:04:41', 2),
(74, 15, 4, 14, 73, 0, '2015-08-05 11:05:10', 2),
(75, 15, 4, 15, 77, 0, '2015-08-05 11:05:25', 2),
(76, 15, 4, 16, 81, 0, '2015-08-05 11:05:39', 2),
(77, 15, 5, 17, 85, 0, '2015-08-05 11:06:00', 2),
(78, 15, 5, 18, 89, 0, '2015-08-05 11:06:14', 2),
(79, 15, 5, 19, 93, 0, '2015-08-05 11:06:29', 2),
(80, 15, 5, 20, 103, 0, '2015-08-05 11:06:44', 2),
(81, 7, 1, 1, 10, 0, '2015-08-05 11:10:15', 2),
(82, 7, 1, 2, 11, 0, '2015-08-05 11:11:07', 2),
(83, 7, 1, 3, 16, 0, '2015-08-05 11:11:47', 2),
(84, 7, 1, 4, 21, 0, '2015-08-05 11:21:30', 2),
(85, 7, 2, 5, 27, 0, '2015-08-05 11:22:12', 2),
(86, 7, 2, 6, 29, 0, '2015-08-05 11:22:28', 2),
(87, 7, 2, 7, 34, 0, '2015-08-05 11:22:43', 2),
(88, 7, 2, 8, 37, 0, '2015-08-05 11:22:58', 2),
(89, 7, 3, 9, 44, 0, '2015-08-05 11:23:21', 2),
(90, 7, 3, 10, 54, 0, '2015-08-05 11:23:44', 2),
(91, 7, 3, 11, 57, 0, '2015-08-05 11:24:19', 2),
(92, 7, 3, 12, 67, 0, '2015-08-05 11:24:34', 2),
(93, 7, 4, 13, 69, 0, '2015-08-05 11:24:50', 2),
(94, 7, 4, 14, 73, 0, '2015-08-05 11:28:12', 2),
(95, 7, 4, 15, 77, 0, '2015-08-05 11:28:27', 2),
(96, 7, 4, 16, 81, 0, '2015-08-05 11:29:18', 2),
(97, 7, 5, 17, 86, 0, '2015-08-05 11:30:42', 2),
(98, 7, 5, 18, 90, 0, '2015-08-05 11:32:38', 2),
(99, 7, 5, 19, 94, 0, '2015-08-05 11:32:54', 2),
(100, 7, 5, 20, 103, 0, '2015-08-05 11:33:09', 2),
(101, 1, 1, 2, 0, 0, '2015-11-25 14:24:10', 2),
(103, 0, 1, 2, 2, 0, '2015-11-27 05:57:56', 2),
(104, 16, 1, 2, 0, 0, '2015-11-27 05:59:59', 2),
(105, 16, 1, 2, 0, 0, '2015-11-27 05:59:59', 2),
(106, 15, 1, 1, 7, 1, '2015-12-12 08:54:57', 6),
(107, 15, 1, 2, 11, 0, '2015-12-12 08:55:13', 6),
(108, 15, 2, 5, 25, 0, '2015-12-29 05:31:44', 6),
(109, 15, 2, 6, 29, 0, '2015-12-29 05:31:55', 6),
(110, 15, 3, 1, 10, 0, '2015-12-29 05:33:19', 6),
(111, 15, 3, 10, 50, 0, '2015-12-29 05:33:36', 6),
(112, 15, 4, 13, 68, 0, '2015-12-29 05:33:56', 6),
(113, 15, 4, 14, 74, 0, '2015-12-29 05:34:08', 6),
(114, 15, 5, 17, 85, 0, '2015-12-29 05:34:22', 6),
(115, 15, 5, 18, 90, 0, '2015-12-29 05:34:40', 6),
(116, 15, 6, 21, 105, 0, '2015-12-29 05:57:52', 6),
(117, 15, 7, 22, 106, 0, '2015-12-29 05:58:02', 6),
(118, 15, 8, 23, 107, 0, '2015-12-29 06:00:54', 6),
(119, 15, 9, 24, 108, 0, '2015-12-29 06:01:13', 6),
(120, 15, 10, 25, 109, 0, '2015-12-29 06:01:33', 6);

-- --------------------------------------------------------

--
-- Table structure for table `hq_userpillar`
--

CREATE TABLE IF NOT EXISTS `hq_userpillar` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `pillar` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_userpillar`
--

INSERT INTO `hq_userpillar` (`id`, `user`, `pillar`, `timestamp`) VALUES
(1, 14, 5, '2015-10-31 09:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `logintype`
--

CREATE TABLE IF NOT EXISTS `logintype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintype`
--

INSERT INTO `logintype` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Email'),
(4, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Profile', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(2, 'Branch', '', '', 'site/viewbranch', 1, 0, 1, 2, 'icon-dashboard'),
(3, 'Department', '', '', 'site/viewdepartment', 1, 0, 1, 3, 'icon-dashboard'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(5, 'Designation', '', '', 'site/viewdesignation', 1, 0, 1, 4, 'icon-dashboard'),
(6, 'Pillar', '', '', 'site/viewpillar', 1, 0, 1, 6, 'icon-dashboard'),
(7, 'Questions', '', '', 'site/viewquestion', 1, 0, 1, 7, 'icon-dashboard'),
(8, 'Options', '', '', 'site/viewoptions', 1, 0, 1, 8, 'icon-dashboard'),
(9, 'User Answers', '', '', 'site/viewuseranswer', 1, 0, 1, 8, 'icon-dashboard'),
(10, 'User Pillar', '', '', 'site/viewuserpillar', 1, 0, 1, 9, 'icon-dashboard'),
(11, 'Content', '', '', 'site/viewcontent', 1, 0, 1, 10, 'icon-dashboard'),
(12, 'Team', '', '', 'site/viewteam', 1, 0, 1, 5, 'icon-dashboard'),
(14, 'Test ', '', '', 'site/viewtest', 1, 0, 1, 13, 'icon-dashboard'),
(15, 'Pillar Expected Value', '', '', 'site/viewtestpillarexpected', 1, 0, 1, 14, 'icon-dashboard'),
(16, 'Config', '', '', 'site/viewconfig', 1, 0, 1, 15, 'icon-dashboard'),
(17, 'Survey', '', '', 'site/viewsurveyquestion', 1, 0, 1, 16, 'icon-dashboard'),
(18, 'Survey Users', '', '', 'site/viewsurveyquestionuser', 1, 0, 1, 17, 'icon-dashboard'),
(19, 'Conclusion', '', '', 'site/viewconclusion1', 1, 0, 1, 18, 'icon-dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(4, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(15, 0),
(15, 0),
(15, 0),
(12, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(8, 2),
(15, 0),
(15, 0),
(15, 0),
(12, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(8, 3),
(15, 0),
(12, 3),
(13, 1),
(14, 1),
(15, 0),
(15, 0),
(15, 0),
(15, 0),
(7, 3),
(17, 1),
(18, 1),
(19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'inactive'),
(2, 'Active'),
(3, 'Waiting'),
(4, 'Active Waiting'),
(5, 'Blocked');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `units` varchar(255) NOT NULL,
  `schedule` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `department` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `check` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enddate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `units`, `schedule`, `startdate`, `department`, `branch`, `designation`, `check`, `team`, `timestamp`, `enddate`) VALUES
(6, 'New Test', '2', 1, '2015-12-25', 1, 2, 2, 0, 5, '2015-12-12 08:51:26', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `testpillarexpected`
--

CREATE TABLE IF NOT EXISTS `testpillarexpected` (
  `id` int(11) NOT NULL,
  `test` int(11) NOT NULL,
  `pillar` int(11) NOT NULL,
  `expectedvalue` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testpillarexpected`
--

INSERT INTO `testpillarexpected` (`id`, `test`, `pillar`, `expectedvalue`) VALUES
(1, 1, 1, 70),
(2, 1, 2, 99),
(3, 2, 1, 20),
(4, 2, 2, 60),
(5, 1, 3, 50),
(6, 2, 3, 60),
(7, 1, 4, 80),
(8, 2, 4, 80),
(9, 1, 5, 20),
(10, 2, 5, 70),
(11, 6, 1, 50),
(12, 6, 2, 50),
(13, 6, 3, 70),
(14, 6, 4, 65),
(15, 6, 5, 80),
(20, 6, 6, 45),
(21, 6, 7, 75),
(22, 6, 8, 60),
(23, 6, 9, 60),
(24, 6, 10, 50);

-- --------------------------------------------------------

--
-- Table structure for table `testquestion`
--

CREATE TABLE IF NOT EXISTS `testquestion` (
  `id` int(11) NOT NULL,
  `test` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `datetimestatus` int(11) NOT NULL,
  `dateandtime` datetime NOT NULL,
  `sendstatus` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testquestion`
--

INSERT INTO `testquestion` (`id`, `test`, `question`, `datetimestatus`, `dateandtime`, `sendstatus`) VALUES
(1, 1, 1, 0, '0000-00-00 00:00:00', 0),
(2, 1, 2, 0, '0000-00-00 00:00:00', 0),
(3, 1, 3, 0, '0000-00-00 00:00:00', 0),
(4, 2, 4, 0, '0000-00-00 00:00:00', 0),
(5, 2, 5, 0, '0000-00-00 00:00:00', 0),
(6, 2, 6, 0, '0000-00-00 00:00:00', 0),
(14, 5, 1, 0, '2015-11-26 00:00:00', 0),
(15, 5, 2, 0, '2015-11-27 00:00:00', 0),
(16, 5, 3, 0, '2015-11-28 00:00:00', 0),
(17, 5, 4, 0, '2015-11-29 00:00:00', 0),
(30, 6, 1, 0, '2015-12-25 00:00:00', 0),
(31, 6, 2, 0, '2015-12-26 00:00:00', 0),
(32, 6, 5, 0, '2015-12-27 00:00:00', 0),
(33, 6, 6, 0, '2015-12-28 00:00:00', 0),
(34, 6, 9, 0, '2015-12-29 00:00:00', 0),
(35, 6, 10, 0, '2015-12-30 00:00:00', 0),
(36, 6, 13, 0, '2015-12-31 00:00:00', 0),
(37, 6, 14, 0, '2016-01-01 00:00:00', 0),
(38, 6, 17, 0, '2016-01-02 00:00:00', 0),
(39, 6, 18, 0, '2016-01-03 00:00:00', 0),
(40, 6, 21, 0, '2016-01-04 00:00:00', 0),
(41, 6, 22, 0, '2016-01-05 00:00:00', 0),
(42, 6, 23, 0, '2016-01-06 00:00:00', 0),
(43, 6, 24, 0, '2016-01-07 00:00:00', 0),
(44, 6, 25, 0, '2016-01-08 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` varchar(50) NOT NULL,
  `json` text NOT NULL,
  `gender` int(11) NOT NULL,
  `age` varchar(255) NOT NULL,
  `maritalstatus` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `noofyearsinorganization` varchar(255) NOT NULL,
  `spanofcontrol` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `employeeid` varchar(255) NOT NULL,
  `branch` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `team` int(11) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `isfirst` varchar(255) NOT NULL,
  `isblock` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `gender`, `age`, `maritalstatus`, `designation`, `department`, `noofyearsinorganization`, `spanofcontrol`, `description`, `employeeid`, `branch`, `language`, `team`, `salary`, `isfirst`, `isblock`) VALUES
(1, 'wohlig', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', 1, '0000-00-00 00:00:00', 1, NULL, '', '', '1', '', 0, '0', 0, 1, 1, '', '7', '															', '', 1, '0', 5, '', '1', 0),
(4, 'pratik', '0cb2b62754dfd12b6ed0161d4b447df7', 'pratik@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, 'pratik', '1', '1', '', 0, '', 0, 0, 0, '', '7', '', '', 0, '', 0, '', '', 0),
(5, 'wohlig123', 'wohlig123', 'wohlig1@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', '0', '', 0, '', 0, 0, 0, '', '7', '', '', 0, '', 0, '', '', 0),
(6, 'wohlig1', 'a63526467438df9566c508027d9cb06b', 'wohlig2@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', '0', '', 0, '', 0, 0, 0, '', '7', '', '', 0, '', 0, '', '', 0),
(7, 'Avinash', 'a63526467438df9566c508027d9cb06b', 'shn619@gmail.com', 4, '2014-10-17 06:22:29', 1, NULL, '', '', '0', '', 0, '', 0, 1, 1, '10', '7', '', '', 1, '1', 1, '', '', 0),
(9, 'avinash', 'a208e5837519309129fa466b0c68396b', 'a@email.com', 2, '2014-12-03 11:06:19', 3, '', '', '123', '1', 'demojson', 0, '', 0, 0, 0, '', '7', '', '', 0, '', 0, '', '', 0),
(13, 'aaa', 'a208e5837519309129fa466b0c68396b', 'aaa3@email.com', 3, '2014-12-04 06:55:42', 3, NULL, '', '1', '2', 'userjson', 0, '', 0, 0, 0, '', '7', '', '', 0, '', 0, '', '', 0),
(14, 'xdcvghbn', 'e99a18c428cb38d5f260853678922e03', 'dcvgb@rftgh.ghhb', 1, '2015-07-30 11:47:58', 1, '', '', '', '0', '', 0, '', 0, 1, 1, '', '7', '															', '', 1, '0', 5, '', '', 0),
(15, 'Pooja', 'a63526467438df9566c508027d9cb06b', 'pooja.wohlig@gmail.com', 4, '2014-10-17 06:22:29', 1, NULL, '', '', '0', '', 1, '', 0, 1, 1, '10', '4', '', '', 1, '1', 1, '600000', '', 0),
(16, 'Jagruti', 'a63526467438df9566c508027d9cb06b', 'jagruti@wohlig.com', 4, '2014-10-17 06:22:29', 1, NULL, '', '', '0', '', 0, '', 0, 1, 1, '10', '7', '', '', 1, '1', 1, '', '', 0),
(17, 'HR', 'a63526467438df9566c508027d9cb06b', 'hr@wohlig.com', 3, '0000-00-00 00:00:00', 1, '', '0', '12345678', '', '', 0, '20', 0, 0, 1, '12', '7', '		hbjhb													', '65656', 0, '0', 5, '', '1', 0),
(18, 'puja1', 'bb1a3428923be23e476267e097e4b342', 'puja1@email.com', 1, '0000-00-00 00:00:00', 3, 'download_(2).jpg', '0', '123451', 'Twitter', 'json11', 1, '25', 1, 2, 2, '12', '7', 'des111', 'emp111', 2, '0', 5, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL,
  `onuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `status`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 9, 6, 'User Created', '2014-12-02 10:46:36'),
(28, 9, 6, 'User Details Edited', '2014-12-02 10:47:34'),
(29, 4, 6, 'User Details Edited', '2014-12-03 10:34:49'),
(30, 4, 6, 'User Details Edited', '2014-12-03 10:36:34'),
(31, 4, 6, 'User Details Edited', '2014-12-03 10:36:49'),
(32, 8, 6, 'User Details Edited', '2014-12-03 10:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `userquestionsend`
--

CREATE TABLE IF NOT EXISTS `userquestionsend` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `test` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userquestionsend`
--

INSERT INTO `userquestionsend` (`id`, `user`, `test`, `question`, `timestamp`) VALUES
(1, 7, 1, 6, '2015-08-08 07:15:43'),
(2, 15, 1, 6, '2015-08-08 07:15:45'),
(3, 16, 1, 6, '2015-08-08 07:15:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_branch`
--
ALTER TABLE `hq_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_conclusion`
--
ALTER TABLE `hq_conclusion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_conclusionfinalsuggestion`
--
ALTER TABLE `hq_conclusionfinalsuggestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_conclusionquestion`
--
ALTER TABLE `hq_conclusionquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_conclusionsuggestion`
--
ALTER TABLE `hq_conclusionsuggestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_content`
--
ALTER TABLE `hq_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_department`
--
ALTER TABLE `hq_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_designation`
--
ALTER TABLE `hq_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_options`
--
ALTER TABLE `hq_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_pillar`
--
ALTER TABLE `hq_pillar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_question`
--
ALTER TABLE `hq_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_surveyoption`
--
ALTER TABLE `hq_surveyoption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_surveyquestion`
--
ALTER TABLE `hq_surveyquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_surveyquestionanswer`
--
ALTER TABLE `hq_surveyquestionanswer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_surveyquestionuser`
--
ALTER TABLE `hq_surveyquestionuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_team`
--
ALTER TABLE `hq_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_useranswer`
--
ALTER TABLE `hq_useranswer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_userpillar`
--
ALTER TABLE `hq_userpillar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logintype`
--
ALTER TABLE `logintype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testpillarexpected`
--
ALTER TABLE `testpillarexpected`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testquestion`
--
ALTER TABLE `testquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userquestionsend`
--
ALTER TABLE `userquestionsend`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hq_branch`
--
ALTER TABLE `hq_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hq_conclusion`
--
ALTER TABLE `hq_conclusion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hq_conclusionfinalsuggestion`
--
ALTER TABLE `hq_conclusionfinalsuggestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hq_conclusionquestion`
--
ALTER TABLE `hq_conclusionquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hq_conclusionsuggestion`
--
ALTER TABLE `hq_conclusionsuggestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hq_content`
--
ALTER TABLE `hq_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hq_department`
--
ALTER TABLE `hq_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hq_designation`
--
ALTER TABLE `hq_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hq_options`
--
ALTER TABLE `hq_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `hq_pillar`
--
ALTER TABLE `hq_pillar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hq_question`
--
ALTER TABLE `hq_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `hq_surveyoption`
--
ALTER TABLE `hq_surveyoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hq_surveyquestion`
--
ALTER TABLE `hq_surveyquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hq_surveyquestionanswer`
--
ALTER TABLE `hq_surveyquestionanswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hq_surveyquestionuser`
--
ALTER TABLE `hq_surveyquestionuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hq_team`
--
ALTER TABLE `hq_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hq_useranswer`
--
ALTER TABLE `hq_useranswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `hq_userpillar`
--
ALTER TABLE `hq_userpillar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `testpillarexpected`
--
ALTER TABLE `testpillarexpected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `testquestion`
--
ALTER TABLE `testquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `userquestionsend`
--
ALTER TABLE `userquestionsend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
