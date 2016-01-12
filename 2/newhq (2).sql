-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2016 at 11:00 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_branch`
--

INSERT INTO `hq_branch` (`id`, `language`, `name`, `branchid`, `address`) VALUES
(1, 0, 'Mumbai', 'br1', 'Mumbai,Maharashtra'),
(2, 0, 'Branch2', 'br2', '2,2 area,2,2,2'),
(3, 0, 'Vikroli1', 'V121', 'lbs road111'),
(4, 0, 'North', '', ''),
(5, 0, 'South', '', ''),
(6, 0, 'East', '', ''),
(7, 0, 'West', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hq_conclusion`
--

CREATE TABLE IF NOT EXISTS `hq_conclusion` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_conclusion`
--

INSERT INTO `hq_conclusion` (`id`, `order`, `name`) VALUES
(1, 1, 'Personal values'),
(2, 2, 'What an individual believes in'),
(3, 3, 'Managing time with respect to exercising'),
(4, 4, 'Managing time with respect to food habits'),
(5, 5, 'Vacations and weekends'),
(6, 6, 'Balancing physical and mental health'),
(7, 7, 'Managing deadlines'),
(8, 8, 'Managing stressful situations'),
(9, 9, 'Managing stressful situations'),
(10, 10, 'Awareness about policies in organization'),
(11, 11, 'Awareness about policies in organization'),
(12, 12, 'Views towards workplace'),
(13, 13, 'Views towards workplace'),
(14, 14, 'Views toward the Leadership team'),
(15, 15, 'Views toward the Leadership team'),
(16, 16, 'Handling work when someone is unable to come to  office/Confidence factor at work'),
(17, 17, 'Reviews and meetings'),
(18, 18, 'Interactions with the boss'),
(19, 19, 'Views towards the workplace'),
(20, 20, 'Telling others about work'),
(21, 21, 'Telling others about work'),
(22, 22, 'Telling others about work/Recommending your workplace'),
(23, 23, ''),
(24, 24, 'Studying besides work'),
(25, 25, 'Views towards workplace'),
(26, 26, 'Balance between rewards and review'),
(27, 27, 'Having a career path');

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_conclusionquestion`
--

INSERT INTO `hq_conclusionquestion` (`id`, `conclusion`, `question`) VALUES
(1, 1, 1),
(2, 1, 9),
(3, 2, 1),
(4, 2, 10),
(5, 3, 2),
(6, 3, 13),
(7, 4, 2),
(8, 4, 16),
(9, 5, 3),
(10, 5, 11),
(11, 6, 4),
(12, 6, 14),
(13, 7, 4),
(14, 7, 15),
(15, 8, 4),
(16, 8, 26),
(17, 9, 4),
(18, 9, 6),
(19, 10, 29),
(20, 10, 23),
(21, 11, 30),
(22, 11, 23),
(23, 12, 31),
(24, 12, 20),
(25, 13, 31),
(26, 13, 12),
(27, 14, 32),
(28, 14, 25),
(29, 15, 32),
(30, 15, 8),
(31, 16, 27),
(32, 16, 34),
(33, 17, 28),
(34, 17, 17),
(35, 18, 18),
(36, 18, 36),
(37, 19, 19),
(38, 19, 12),
(39, 20, 5),
(40, 20, 38),
(41, 21, 5),
(42, 21, 21),
(43, 22, 7),
(44, 22, 38),
(45, 23, 37),
(46, 23, 7),
(47, 24, 40),
(48, 24, 35),
(49, 25, 39),
(50, 25, 12),
(51, 26, 22),
(52, 26, 28),
(53, 27, 24),
(54, 27, 33);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_department`
--

INSERT INTO `hq_department` (`id`, `name`, `deptid`) VALUES
(1, 'IT', 'IT-12'),
(2, 'Account', 'dept1'),
(3, 'Marketing1', 'M12111'),
(4, 'Marketing', ''),
(5, 'Finance', ''),
(6, 'HR', ''),
(7, 'Operations', ''),
(8, 'BD', ''),
(9, 'Finance ', '');

-- --------------------------------------------------------

--
-- Table structure for table `hq_designation`
--

CREATE TABLE IF NOT EXISTS `hq_designation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_designation`
--

INSERT INTO `hq_designation` (`id`, `name`, `language`) VALUES
(1, 'Sr. Manager', '0'),
(2, 'Manager', ''),
(3, 'It Analyst', '0'),
(4, 'Associate', ''),
(5, 'Senior Associate', ''),
(6, 'Junior Manager', ''),
(7, 'Senior Manager', ''),
(8, 'HOD', ''),
(9, 'Regional Head', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_options`
--

INSERT INTO `hq_options` (`id`, `question`, `representation`, `actualorder`, `image`, `order`, `weight`, `optiontext`, `text`) VALUES
(1, 1, 1, 0, 'Getting-recognized1.png', '', '12.5', 'Getting recognized', 'Getting recognized'),
(3, 1, 1, 0, 'Enough-money1.png', '', '12.5', 'Enough money', 'Enough money'),
(4, 1, 1, 0, 'Happy-workplace1.png', '', '12.5', 'A happy workplace', 'A happy workplace'),
(5, 1, 1, 0, 'Time-with-family-and-friends1.png', '', '12.5', 'Time with family & friends', 'Time with family & friends'),
(6, 1, 1, 0, 'Success1.png', '', '12.5', 'Success', 'Success'),
(7, 1, 1, 0, 'Independence1.png', '', '12.5', 'Independence', 'Independence'),
(8, 1, 1, 0, 'Support1.png', '', '12.5', 'Support', 'Support'),
(9, 1, 1, 0, 'Community-service1.png', '', '12.5', 'Community Service', 'Community Service'),
(10, 2, 1, 0, '15.png', '', '40', 'I take the same bus back home everyday', 'I take the same bus back home everyday'),
(11, 2, 1, 0, '21.png', '', '10', 'I secretly have a bunk bed in office', 'I secretly have a bunk bed in office'),
(12, 2, 1, 0, '41.png', '', '20', 'I wasn''t able to attend the last family function', 'I wasn''t able to attend the last family function'),
(13, 2, 1, 0, '35.png', '', '30', 'I manage to see the sun set almost everyday', 'I manage to see the sun set almost everyday'),
(14, 3, 1, 0, '22.png', '', '40', 'I only spend time with my family.', 'I only spend time with my family.'),
(15, 3, 1, 0, '36.png', '', '30', 'I manage to have fun but get some work done.', 'I manage to have fun but get some work done.'),
(16, 3, 1, 0, '16.png', '', '20', 'I do end up working when I am on a vacation.', 'I do end up working when I am on a vacation.'),
(17, 3, 1, 0, '42.png', '', '10', 'What vacation? There is so much work to do.', 'What vacation? There is so much work to do.'),
(18, 4, 1, 0, '43.png', '', '40', 'One thing at a time it is!', 'One thing at a time it is!'),
(19, 4, 1, 0, '17.png', '', '30', 'It''s simple. I manage both!', 'It''s simple. I manage both!'),
(20, 4, 1, 0, '37.png', '', '20', 'I am ''sooo out of practice''', 'I am ''sooo out of practice'''),
(21, 4, 1, 0, '23.png', '', '10', 'I can''t help thinking about work (Work in thought bubble)', 'I can''t help thinking about work (Work in thought bubble)'),
(22, 5, 1, 0, '44.png', '', '40', 'It''s going really well!', 'It''s going really well!'),
(23, 5, 1, 0, '24.png', '', '30', 'We all have good days and bad days.', 'We all have good days and bad days.'),
(24, 5, 1, 0, '18.png', '', '20', 'Some things need to change.', 'Some things need to change.'),
(25, 5, 1, 0, '38.png', '', '10', 'Let''s not even talk about work.', 'Let''s not even talk about work.'),
(26, 6, 1, 0, '316.png', '', '40', 'I''m not stressed. I get to learn something new.', 'I''m not stressed. I get to learn something new.'),
(27, 6, 1, 0, '116.png', '', '30', 'Not really an issue because I can always reach out to someone.', 'Not really an issue because I can always reach out to someone.'),
(28, 6, 1, 0, '412.png', '', '20', 'I''m not sure of who I can go to for help.', 'I''m not sure of who I can go to for help.'),
(29, 6, 1, 0, '213.png', '', '10', 'I don''t know what to do.', 'I don''t know what to do.'),
(30, 7, 1, 0, '413.png', '', '40', 'Sure! You should definitely apply. Send in your CV.', 'Sure! You should definitely apply. Send in your CV.'),
(31, 7, 1, 0, '117.png', '', '30', 'Not a bad idea.', 'Not a bad idea.'),
(32, 1, 1, 0, '317.png', '', '20', 'Are you sure you want to apply in my company?', 'Are you sure you want to apply in my company?'),
(33, 7, 1, 0, '214.png', '', '10', 'I''m not sure if you should apply right now.', 'I''m not sure if you should apply right now.'),
(34, 8, 1, 0, '215.png', '', '40', 'Yes, I know! Wow, that''s such good news!', 'Yes, I know! Wow, that''s such good news!'),
(35, 8, 1, 0, '414.png', '', '30', 'That''s nice, I guess.', 'That''s nice, I guess.'),
(36, 8, 1, 0, '118.png', '', '20', 'Okay. I don''t have much to say about this.', 'Okay. I don''t have much to say about this.'),
(37, 8, 1, 0, '318.png', '', '10', 'Why would someone reward us?', 'Why would someone reward us?'),
(38, 9, 1, 0, '7.png', '', '12.5', 'Freedom', 'Freedom'),
(39, 9, 1, 0, '61.png', '', '12.5', 'Integrity', 'Integrity'),
(40, 9, 1, 0, '25.png', '', '12.5', 'Team Work', 'Team Work'),
(41, 9, 1, 0, '39.png', '', '12.5', 'Relationships', 'Relationships'),
(42, 9, 1, 0, '5.png', '', '12.5', 'Job Security', 'Job Security'),
(43, 9, 1, 0, '8.png', '', '12.5', 'Recognition', 'Recognition'),
(44, 9, 1, 0, '45.png', '', '12.5', 'Social responsibility', 'Social responsibility'),
(45, 9, 1, 0, '19.png', '', '12.5', 'Personal growth', 'Personal growth'),
(46, 10, 1, 0, '51.png', '', '12.5', 'Respect from others', 'Respect from others'),
(47, 10, 1, 0, '81.png', '', '12.5', 'Appreciation', 'Appreciation'),
(48, 10, 1, 0, '119.png', '', '12.5', 'Financial stability (Remove the rupee sign)', 'Financial stability (Remove the rupee sign)'),
(49, 10, 1, 0, '319.png', '', '12.5', 'Social network (Friends and Family)', 'Social network (Friends and Family)'),
(50, 10, 1, 0, '415.png', '', '12.5', 'Helping the society', 'Helping the society'),
(51, 10, 1, 0, '71.png', '', '12.5', 'Pursuing hobbies', 'Pursuing hobbies'),
(52, 10, 1, 0, '62.png', '', '12.5', 'Work', 'Work'),
(53, 10, 1, 0, '216.png', '', '12.5', 'Good health', 'Good health'),
(54, 11, 1, 0, '11.3_.png', '', '40', 'I can''t wait to have my morning cup of tea and start the day!', 'I can''t wait to have my morning cup of tea and start the day!'),
(55, 11, 1, 0, '11.2_.png', '', '30', 'I need to check my mail first thing in the morning.', 'I need to check my mail first thing in the morning.'),
(56, 11, 1, 0, '11.1_.png', '', '20', 'It''s a little hard to get out of bed.', 'It''s a little hard to get out of bed.'),
(57, 11, 1, 0, '11.4_.png', '', '10', 'Can I go back in time to have the weekend again?', 'Can I go back in time to have the weekend again?'),
(58, 13, 1, 0, 'I-have-an-exercise-routine-that-I-follow._.png', '', '40', 'I have an exercise routine that I follow.', 'I have an exercise routine that I follow.'),
(59, 13, 1, 0, 'I-exercise-when-I-can.-It-depends-on-work_._.png', '', '30', 'I exercise when I can. It depends on work.', 'I exercise when I can. It depends on work.'),
(60, 13, 1, 0, 'I-have-the-time-What-exercise-should-I-be-doing.png', '', '20', 'I have the time. What exercise should I be doing?', 'I have the time. What exercise should I be doing?'),
(61, 13, 1, 0, 'Exercise-I-wish-I-had-the-time._.png', '', '10', 'Exercise? I wish I had the time.', 'Exercise? I wish I had the time.'),
(62, 14, 1, 0, 'I-dont-know-what-to-do._.png', '', '10', '"I don''t know what to do."', '"I don''t know what to do."'),
(63, 14, 1, 0, 'This-happens-at-work-I-know-how-to-deal-with-this._.png', '', '40', '"This happens at work. I know how to deal with this."', '"This happens at work. I know how to deal with this."'),
(64, 14, 1, 0, 'I-will-talk-to-the-counsellor.-That-helps_._.png', '', '30', '"I will talk to the Counsellor. That helps."', '"I will talk to the Counsellor. That helps."'),
(65, 14, 1, 0, 'I-need-help.-Who-should-I-talk-to_.png', '', '20', '"I need help. Who should I talk to?"', '"I need help. Who should I talk to?"'),
(66, 15, 1, 0, '120.png', '', '30', 'Let me finish what I''m doing. I''ll start once that is done.', 'Let me finish what I''m doing. I''ll start once that is done.'),
(67, 15, 1, 0, '217.png', '', '40', 'I need to finish this today. Let''s do this!', 'I need to finish this today. Let''s do this!'),
(68, 15, 1, 0, '320.png', '', '10', 'It''s due in the evening. Plenty of time left.', 'It''s due in the evening. Plenty of time left.'),
(69, 15, 1, 0, '416.png', '', '20', 'I can work on this while sending out those mails.', 'I can work on this while sending out those mails.'),
(70, 16, 1, 0, 'I-follow-a-routine-when-I-eat-at-work._.png', '', '40', 'I follow a routine when I eat at work.', 'I follow a routine when I eat at work.'),
(71, 16, 1, 0, 'I-eat-whatever-is-available,-even-if-its-junk._.png', '', '30', 'I eat whatever is available, even if its junk.', 'I eat whatever is available, even if its junk.'),
(72, 16, 1, 0, 'Its-faster-and-easier-to-have-junk-food._.png', '', '20', 'It''s faster and easier to have junk food.', 'It''s faster and easier to have junk food.'),
(73, 16, 1, 0, 'eating-in-office.i-wish-i-had-the-time_.png', '', '10', 'Eating in office? I wish I had the time!', 'Eating in office? I wish I had the time!'),
(74, 12, 1, 0, '82.png', '', '20', 'It matters to me', 'It matters to me'),
(75, 12, 1, 0, '72.png', '', '20', 'I get to learn something new', 'I get to learn something new'),
(76, 12, 1, 0, '417.png', '', '15', 'I like stability in life', 'I like stability in life'),
(77, 12, 1, 0, '63.png', '', '15', 'I love my team', 'I love my team'),
(78, 12, 1, 0, '121.png', '', '10', 'Money matters', 'Money matters'),
(79, 12, 1, 0, '52.png', '', '10', 'How else will people know me?', 'How else will people know me?'),
(80, 12, 1, 0, '321.png', '', '5', 'I have deadlines & targets', 'I have deadlines & targets'),
(81, 12, 1, 0, '218.png', '', '5', 'Why work?', 'Why work?'),
(82, 17, 1, 0, '110.png', '', '30', 'I am not sure of what to do. I can ask someone to tell me again though.', 'I am not sure of what to do. I can ask someone to tell me again though.'),
(83, 17, 0, 0, '26.png', '', '10', 'Please don''t pick me for this one.', 'Please don''t pick me for this one.'),
(84, 17, 1, 0, '310.png', '', '40', 'I know what to do. Not a problem.', 'I know what to do. Not a problem.'),
(85, 17, 1, 0, '46.png', '', '20', 'I don''t know what needs to be done. Who should I be asking?', 'I don''t know what needs to be done. Who should I be asking?'),
(86, 18, 1, 0, '219.png', '', '30', 'It''s a little awkward. What am I supposed to say?', 'It''s a little awkward. What am I supposed to say?'),
(87, 18, 1, 0, '418.png', '', '10', 'I would prefer to look at my phone.', 'I would prefer to look at my phone.'),
(88, 18, 1, 0, '322.png', '', '20', 'Why does the lift get stuck at a time like this? I don''t know what to do.', 'Why does the lift get stuck at a time like this? I don''t know what to do.'),
(89, 18, 1, 0, '122.png', '', '40', 'No problem! I get a chance to catch up with my boss.', 'No problem! I get a chance to catch up with my boss.'),
(90, 19, 1, 0, '123.png', '', '30', 'Some colleagues might want to be there.', 'Some colleagues might want to be there.'),
(91, 19, 1, 0, '220.png', '', '20', 'Colleagues for my party? Not so sure.', 'Colleagues for my party? Not so sure.'),
(92, 19, 1, 0, '323.png', '', '40', 'There are so many colleagues who would love to be there!', 'There are so many colleagues who would love to be there!'),
(93, 19, 1, 0, '419.png', '', '10', 'I am not sure of who I can call.', 'I am not sure of who I can call.'),
(94, 20, 1, 0, '324.png', '', '20', 'I''m part of a bigger family', 'I''m part of a bigger family'),
(95, 20, 1, 0, '124.png', '', '15', 'Normal', 'Normal'),
(96, 20, 1, 0, '221.png', '', '10', 'Like something wrong might happen', 'Like something wrong might happen'),
(97, 20, 1, 0, '83.png', '', '5', 'Like you don''t belong', 'Like you don''t belong'),
(98, 21, 1, 0, '111.png', '', '30', '"My colleagues were happy for me. Surprised my Boss didn''t say anything."', '"My colleagues were happy for me. Surprised my Boss didn''t say anything."'),
(99, 21, 1, 0, '27.png', '', '10', '"No one realized when I finished working on it."', '"No one realized when I finished working on it."'),
(100, 21, 1, 0, '311.png', '', '20', '"My colleagues were aware but didn''t really talk about it. Not such a big deal I guess."', '"My colleagues were aware but didn''t really talk about it. Not such a big deal I guess."'),
(101, 21, 1, 0, '47.png', '', '40', '"Everyone at work said I did a really good job!"', '"Everyone at work said I did a really good job!"'),
(102, 22, 1, 0, '125.png', '', '30', 'My rewards are at par with what the market offers', 'My rewards are at par with what the market offers'),
(103, 22, 1, 0, '222.png', '', '10', 'I''ve been rewarded much lesser than what the market offers', 'I''ve been rewarded much lesser than what the market offers'),
(104, 22, 1, 0, '325.png', '', '40', 'Wow! I''m a super achiever!', 'Wow! I''m a super achiever!'),
(105, 22, 1, 0, '421.png', '', '20', 'Not bad. Could have been better.', 'Not bad. Could have been better.'),
(106, 23, 1, 0, '223.png', '', '20', '"I don''t know too much about it. Who should I be asking?"', '"I don''t know too much about it. Who should I be asking?"'),
(107, 23, 1, 0, '126.png', '', '40', '"This happens often. I know all about it."', '"This happens often. I know all about it."'),
(108, 23, 1, 0, '422.png', '', '30', '"I know about this in brief. I got a mail this morning."', '"I know about this in brief. I got a mail this morning."'),
(109, 23, 1, 0, '326.png', '', '10', '"Appraisal Time? What''s it about?"', '"Appraisal Time? What''s it about?"'),
(110, 24, 1, 0, '127.png', '', '10', 'There are so many choices. It''s confusing.', 'There are so many choices. It''s confusing.'),
(111, 24, 1, 0, '224.png', '', '30', 'Am headed in the right direction.', 'Am headed in the right direction.'),
(112, 24, 1, 0, '327.png', '', '40', 'I''m doing what works for me!', 'I''m doing what works for me!'),
(113, 24, 1, 0, '423.png', '', '20', 'I am not sure if I am headed in the right direction.', 'I am not sure if I am headed in the right direction.'),
(114, 25, 1, 0, '112.png', '', '20', '"I don''t really know anything about it."', '"I don''t really know anything about it."'),
(115, 25, 1, 0, '28.png', '', '10', '"How does my life change?"', '"How does my life change?"'),
(116, 25, 1, 0, '312.png', '', '40', '"Yes, I know all about it. I know what needs to be done next too."', '"Yes, I know all about it. I know what needs to be done next too."'),
(117, 25, 1, 0, '48.png', '', '30', '"I know about what happened in the Meeting briefly."', '"I know about what happened in the Meeting briefly."'),
(118, 26, 1, 0, '128.png', '', '40', 'I have the rough notes with me. Let me make it again quickly.', 'I have the rough notes with me. Let me make it again quickly.'),
(119, 26, 1, 0, '225.png', '', '10', 'How could I delete that file? What was I thinking?', 'How could I delete that file? What was I thinking?'),
(120, 26, 1, 0, '328.png', '', '30', 'Let''s try and restart work.', 'Let''s try and restart work.'),
(121, 26, 1, 0, '424.png', '', '20', 'The presentation is in a few hours. What do I do?', 'The presentation is in a few hours. What do I do?'),
(122, 27, 1, 0, '129.png', '', '20', 'My team tells me about what needs to be done next and how to go about it.', 'My team tells me about what needs to be done next and how to go about it.'),
(123, 27, 1, 0, '235.png', '', '40', 'I complete what has to be done on my own. Not a problem.', 'I complete what has to be done on my own. Not a problem.'),
(124, 27, 1, 0, '339.png', '', '10', 'My team does everything for me.', 'My team does everything for me.'),
(125, 27, 1, 0, '434.png', '', '30', 'I handle parts of the project with a colleague.', 'I handle parts of the project with a colleague.'),
(126, 28, 1, 0, '140.png', '', '40', 'Let''s have a look at our weekly updates to see how we have done.', 'Let''s have a look at our weekly updates to see how we have done.'),
(127, 28, 1, 0, '236.png', '', '30', 'Let me give you a brief summary for the month.', 'Let me give you a brief summary for the month.'),
(128, 28, 1, 0, '340.png', '', '20', 'This has not been one of our best months.', 'This has not been one of our best months.'),
(129, 28, 1, 0, '435.png', '', '10', 'There isn''t much to say about the month.', 'There isn''t much to say about the month.'),
(130, 29, 1, 0, '113.png', '', '30', '"They might ask us about it."', '"They might ask us about it."'),
(131, 29, 1, 0, '210.png', '', '40', '"Did you send in your feedback about how the policy can be changed? It helps!"', '"Did you send in your feedback about how the policy can be changed? It helps!"'),
(132, 29, 1, 0, '313.png', '', '10', '"We''ll know about the leave policy once it is changed."', '"We''ll know about the leave policy once it is changed."'),
(133, 29, 1, 0, '49.png', '', '20', '"I was asked about it. Do you think it matters?"', '"I was asked about it. Do you think it matters?"'),
(134, 30, 1, 0, '130.png', '', '30', '"I could give you a brief outline."', '"I could give you a brief outline."'),
(135, 30, 1, 0, '226.png', '', '20', '"You might want to ask someone else about that."', '"You might want to ask someone else about that."'),
(136, 30, 1, 0, '329.png', '', '10', '"Let''s not get into that right now."', '"Let''s not get into that right now."'),
(137, 30, 1, 0, '425.png', '', '40', '"Let me send you the mail with the information right away."', '"Let me send you the mail with the information right away."'),
(138, 31, 1, 0, '65.png', '', '12.5', 'My Chair', 'My Chair'),
(139, 31, 1, 0, '54.png', '', '12.5', 'Our cafeteria', 'Our cafeteria'),
(140, 31, 1, 0, '426.png', '', '12.5', 'Lighting', 'Lighting'),
(141, 31, 1, 0, '330.png', '', '12.5', 'Ventilation', 'Ventilation'),
(142, 31, 1, 0, '131.png', '', '12.5', 'Commute to work', 'Commute to work'),
(143, 31, 1, 0, '84.png', '', '12.5', 'Clean washrooms', 'Clean washrooms'),
(144, 31, 1, 0, '227.png', '', '12.5', 'Technology at work', 'Technology at work'),
(145, 31, 1, 0, '74.png', '', '12.5', 'Safety', 'Safety'),
(146, 32, 1, 0, '132.png', '', '20', 'So who exactly will be coming?', 'So who exactly will be coming?'),
(147, 32, 1, 0, '228.png', '', '10', 'I wonder why they will be coming.', 'I wonder why they will be coming.'),
(148, 32, 1, 0, '331.png', '', '30', 'This might be a chance to talk to some of them.', 'This might be a chance to talk to some of them.'),
(149, 32, 1, 0, '427.png', '', '40', 'We have had meet-ups with them before. This should be fun.', 'We have had meet-ups with them before. This should be fun.'),
(150, 33, 1, 0, '114.png', '', '30', 'Not sure if I have felt this way before.', 'Not sure if I have felt this way before.'),
(151, 33, 1, 0, '211.png', '', '10', 'I know exactly how that feels.', 'I know exactly how that feels.'),
(152, 33, 1, 0, '410.png', '', '20', 'I feel that way sometimes.', 'I feel that way sometimes.'),
(153, 33, 1, 0, '314.png', '', '40', 'What should I be saying? I don''t know how that feels.', 'What should I be saying? I don''t know how that feels.'),
(154, 34, 1, 0, '133.png', '', '10', 'I''ll wait till my Boss is back. Work can wait.', 'I''ll wait till my Boss is back. Work can wait.'),
(155, 34, 1, 0, '229.png', '', '20', 'I am not sure of what to do. Who can I talk to?', 'I am not sure of what to do. Who can I talk to?'),
(156, 34, 1, 0, '332.png', '', '30', 'I know what to do. If I need help, I can always ask someone.', 'I know what to do. If I need help, I can always ask someone.'),
(157, 34, 1, 0, '428.png', '', '40', 'I can run the show.', 'I can run the show.'),
(158, 35, 1, 0, '135.png', '', '10', '"Should I be doing the same?"', '"Should I be doing the same?"'),
(159, 35, 1, 0, '230.png', '', '20', '"Is the break needed?"', '"Is the break needed?"'),
(160, 35, 1, 0, '333.png', '', '40', '"Makes sense. It will be helpful."', '"Makes sense. It will be helpful."'),
(161, 35, 1, 0, '429.png', '', '30', '"Might work!"', '"Might work!"'),
(162, 36, 1, 0, '136.png', '', '20', '"Are you prepared for the meeting?"', '"Are you prepared for the meeting?"'),
(163, 36, 1, 0, '231.png', '', '10', '"I might take someone else."', '"I might take someone else."'),
(164, 36, 1, 0, '334.png', '', '40', '"I know this meeting will go well!"', '"I know this meeting will go well!"'),
(165, 36, 1, 0, '430.png', '', '30', '"All the best. Let''s do well."', '"All the best. Let''s do well."'),
(166, 37, 1, 0, '115.png', '', '10', '"You want to talk about work at a party?"', '"You want to talk about work at a party?"'),
(167, 37, 1, 0, '212.png', '', '30', '"Yes, I read about it too. I don''t think it''s true."', '"Yes, I read about it too. I don''t think it''s true."'),
(168, 37, 1, 0, '315.png', '', '20', '"I don''t know too much about this."', '"I don''t know too much about this."'),
(169, 37, 1, 0, '411.png', '', '40', '"I am sure it''s not true. Let me tell you why."', '"I am sure it''s not true. Let me tell you why."'),
(170, 38, 1, 0, '137.png', '', '40', 'There is so much I can talk to them about!', 'There is so much I can talk to them about!'),
(171, 38, 1, 0, '232.png', '', '10', 'Why do they ask so many questions?', 'Why do they ask so many questions?'),
(172, 38, 1, 0, '335.png', '', '20', 'There isn''t much to tell them.', 'There isn''t much to tell them.'),
(173, 38, 1, 0, '431.png', '', '30', 'I don''t mind telling them about work.', 'I don''t mind telling them about work.'),
(174, 39, 1, 0, '138.png', '', '20', 'Someone will respond', 'Someone will respond'),
(175, 39, 1, 0, '233.png', '', '10', 'Laugh along', 'Laugh along'),
(176, 39, 1, 0, '336.png', '', '40', 'Share your viewpoint', 'Share your viewpoint'),
(177, 39, 1, 0, '432.png', '', '30', 'Tell my company about it', 'Tell my company about it'),
(178, 40, 1, 0, '139.png', '', '20', 'Doing the course might help. Not too sure.', 'Doing the course might help. Not too sure.'),
(179, 40, 1, 0, '234.png', '', '40', 'I have been wanting to do this course. This is great!', 'I have been wanting to do this course. This is great!'),
(180, 40, 1, 0, '337.png', '', '10', 'There is a lot to do at work already. Will doing this course help?', 'There is a lot to do at work already. Will doing this course help?'),
(181, 40, 1, 0, '433.png', '', '30', 'I should be able to manage that with work.', 'I should be able to manage that with work.'),
(182, 20, 1, 0, '64.png', '', '20', 'Work is fun!', 'Work is fun!'),
(183, 20, 1, 0, '420.png', '', '15', 'You are in a room full of strangers', 'You are in a room full of strangers'),
(184, 20, 1, 0, '53.png', '', '10', 'Alone', 'Alone'),
(185, 20, 1, 0, '73.png', '', '5', 'Like you are waiting for 6:30 PM', 'Like you are waiting for 6:30 PM');

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
(1, 'Work-Life Blend', '', '1', '26'),
(2, 'Employee Engagement', '', '2', '57'),
(3, 'Driving Force', '', '3', '29'),
(4, 'Health of an Individual', '', '4', '74'),
(5, 'Interpersonal Relationships at Work', '', '5', '16'),
(6, 'Rewards and Recognition', '', '6', '27'),
(7, 'Sense of Ownership', '', '7', '62'),
(8, 'Work Environment', '', '8', '32'),
(9, 'Job Security', '', '9', '59'),
(10, 'Alignment', '', '10', '72');

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_question`
--

INSERT INTO `hq_question` (`id`, `pillar`, `noofans`, `order`, `timestamp`, `text`) VALUES
(1, 1, 1, '', '2015-12-30 08:31:42', 'You just met a genie who grants you four wishes. You choose:'),
(2, 1, 1, '', '2015-12-30 08:41:41', 'You put in your best at work. We know you do. So, your life looks something like this:'),
(3, 1, 1, '', '2015-12-30 09:07:36', 'You have managed to get that much-awaited annual leave with family. Your vacation goes something like this:'),
(4, 1, 1, '', '2015-12-30 09:12:53', 'Your health is as important as the next deadline.'),
(5, 2, 1, '', '2015-12-30 09:19:55', 'You meet a school friend after a long time and he asks you, "How''s work?" You say:'),
(6, 2, 1, '', '2015-12-30 09:21:21', 'You are in the middle of a project and things aren''t going your way.  What next?'),
(7, 2, 1, '', '2015-12-30 09:22:15', 'Your friend approaches you for a job in your company. You are most likely to say this:'),
(8, 2, 1, '', '2015-12-30 09:22:46', 'Congratulations! Your organization just won an award.'),
(9, 3, 1, '', '2015-12-30 09:51:05', 'Some of the things that you value in life are :'),
(10, 3, 1, '', '2015-12-30 09:51:47', 'You find yourself smiling because you are blessed with:'),
(11, 3, 1, '', '2015-12-30 09:52:27', 'Yes, the weekend is over and Monday morning is back.'),
(12, 3, 1, '', '2015-12-30 09:53:08', 'You work because:'),
(13, 4, 1, '', '2015-12-30 10:41:49', 'To exercise or not to exercise…that is the question.'),
(14, 4, 1, '', '2015-12-30 10:42:21', 'Say one day, there is just too much work. You are likely to think:'),
(15, 4, 1, '', '2015-12-30 10:42:59', 'It''s the start of the day and you need to submit a report. You think:'),
(16, 4, 1, '', '2015-12-30 10:43:39', 'Your food habits at work look like this:'),
(17, 5, 1, '', '2015-12-30 11:17:28', 'You are in a team meeting where tasks are being allocated. You think:'),
(18, 5, 1, '', '2015-12-30 11:18:00', 'You are stuck in the lift with your boss. Which of these is most likely to happen?'),
(19, 5, 1, '', '2015-12-30 11:18:37', 'You are making a guest list for your birthday party. You think to yourself: (Our names)'),
(20, 5, 1, '', '2015-12-30 11:19:12', 'When you are at work, you feel:'),
(21, 6, 1, '', '2015-12-30 11:47:14', 'When you tell your best friend about a project you just completed at work, you say:'),
(22, 6, 1, '', '2015-12-30 11:47:42', 'You are talking to your family about the rewards you get at work and then you realize:'),
(23, 6, 1, '', '2015-12-30 11:48:10', 'When it''s time for appraisals in office, you think:'),
(24, 6, 1, '', '2015-12-30 11:48:55', 'One year from now, you see your life looking like this:'),
(25, 7, 1, '', '2015-12-30 12:12:31', 'Your colleague tells you about the recent Board Meeting and you say:'),
(26, 7, 1, '', '2015-12-30 12:13:01', 'You accidentally delete a presentation that needs to be made this afternoon. You think:'),
(27, 7, 1, '', '2015-12-30 12:13:43', 'Your team member is unwell and you take over the project. What next?'),
(28, 7, 1, '', '2015-12-30 12:14:19', 'Your boss is most likely to say this during your monthly review (Remove the stick):'),
(29, 8, 1, '', '2015-12-30 12:37:54', 'You''ve heard that your company is deciding to  change its leave policy. You tell your colleague this:'),
(30, 8, 1, '', '2015-12-30 12:38:53', 'An intern walks up to you and asks you about some policies at work. You say this:'),
(31, 8, 1, '', '2015-12-30 12:39:30', 'Here''s what is awesome about the place I work!'),
(32, 8, 1, '', '2015-12-30 12:40:06', 'You are part of a gathering with the leadership team. You think:'),
(33, 9, 1, '', '2015-12-30 12:42:22', 'Over dinner, your cousin tells you he almost thought he would lose his job yesterday. You think:'),
(34, 9, 1, '', '2015-12-30 12:42:52', 'You have reached office and your boss calls saying he had to take leave urgently. You think:'),
(35, 9, 1, '', '2015-12-30 12:43:22', 'Your colleague tells you he is taking a break to study & be eligible for a promotion. You think:'),
(36, 9, 1, '', '2015-12-30 12:43:47', 'You are getting ready to leave office and meet an important client with your boss. You are most likely to hear this:'),
(37, 10, 1, '', '2015-12-30 12:44:24', 'At a party, your friend asks you about something negative she has read in the papers about your company. You say:'),
(38, 10, 1, '', '2015-12-30 12:44:51', 'When your relatives ask you about your work, you feel:'),
(39, 10, 1, '', '2015-12-30 12:45:25', 'You come across a social media post that makes fun of the company you work for. You look at it and think:'),
(40, 10, 1, '', '2015-12-30 12:46:39', 'Your Boss tells you about an online course to consider and you think:');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hq_team`
--

INSERT INTO `hq_team` (`id`, `name`, `teamid`) VALUES
(5, 'HR Team', 'H1'),
(6, 'Team B', 't2'),
(7, '', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Active'),
(2, 'inactive'),
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `units`, `schedule`, `startdate`, `department`, `branch`, `designation`, `check`, `team`, `timestamp`, `enddate`) VALUES
(1, 'demo', '', 1, '2016-01-02', 0, 0, 0, 0, 0, '2016-01-02 05:11:30', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `testpillarexpected`
--

CREATE TABLE IF NOT EXISTS `testpillarexpected` (
  `id` int(11) NOT NULL,
  `test` int(11) NOT NULL,
  `pillar` int(11) NOT NULL,
  `expectedvalue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testquestion`
--

INSERT INTO `testquestion` (`id`, `test`, `question`, `datetimestatus`, `dateandtime`, `sendstatus`) VALUES
(11, 1, 1, 0, '2016-01-02 00:00:00', 0),
(12, 1, 5, 0, '2016-01-03 00:00:00', 0),
(13, 1, 9, 0, '2016-01-04 00:00:00', 0),
(14, 1, 13, 0, '2016-01-05 00:00:00', 0),
(15, 1, 17, 0, '2016-01-06 00:00:00', 0),
(16, 1, 21, 0, '2016-01-07 00:00:00', 0),
(17, 1, 25, 0, '2016-01-08 00:00:00', 0),
(18, 1, 29, 0, '2016-01-09 00:00:00', 0),
(19, 1, 33, 0, '2016-01-10 00:00:00', 0),
(20, 1, 37, 0, '2016-01-11 00:00:00', 0);

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
  `isblock` int(11) DEFAULT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `gender`, `age`, `maritalstatus`, `designation`, `department`, `noofyearsinorganization`, `spanofcontrol`, `description`, `employeeid`, `branch`, `language`, `team`, `salary`, `isfirst`, `isblock`, `dob`) VALUES
(1, 'wohlig', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', 1, '0000-00-00 00:00:00', 1, NULL, '0', '0', '0', '0', 0, '0', 0, 1, 1, '', '7', '															', '', 1, '0', 5, '', '1', 0, '0000-00-00'),
(7, 'Sohan', 'a63526467438df9566c508027d9cb06b', 'shn619@gmail.com', 4, '0000-00-00 00:00:00', 2, NULL, '0', '0', '0', '0', 0, '', 0, 1, 1, '10', '7', '', '', 1, '0', 5, '300000', '', 0, '0000-00-00'),
(13, 'aaa', 'a208e5837519309129fa466b0c68396b', 'aaa3@email.com', 3, '2014-12-04 06:55:42', 3, NULL, '', '1', '2', 'userjson', 0, '', 0, 0, 0, '', '7', '', '', 0, '', 0, '', '', 0, '0000-00-00'),
(15, 'Pooja', 'a63526467438df9566c508027d9cb06b', 'pooja.wohlig@gmail.com', 4, '2014-10-17 06:22:29', 1, NULL, '', '', '0', '', 1, '', 0, 1, 1, '10', '4', '', '', 1, '1', 1, '600000', '', 0, '0000-00-00'),
(16, 'Jagruti', 'a63526467438df9566c508027d9cb06b', 'jagruti@wohlig.com', 4, '2014-10-17 06:22:29', 1, NULL, '', '', '0', '', 0, '', 0, 1, 1, '10', '7', '', '', 1, '1', 1, '', '', 0, '0000-00-00'),
(17, 'HR', 'a63526467438df9566c508027d9cb06b', 'hr@wohlig.com', 3, '0000-00-00 00:00:00', 1, '', '0', '12345678', '', '', 0, '20', 0, 0, 1, '12', '7', '		hbjhb													', '65656', 0, '0', 5, '', '1', 0, '0000-00-00'),
(18, 'puja1', 'bb1a3428923be23e476267e097e4b342', 'puja1@email.com', 1, '0000-00-00 00:00:00', 3, 'download_(2).jpg', '0', '123451', 'Twitter', 'json11', 1, '25', 1, 2, 2, '12', '7', 'des111', 'emp111', 2, '0', 5, '', '', 0, '0000-00-00'),
(19, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:18', 1, NULL, '', '', '', '', 0, '23', 0, 4, 4, '10', '6', '', '1', 4, '0', 7, '', '', NULL, '0000-00-00'),
(20, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:18', 1, NULL, '', '', '', '', 0, '27', 0, 5, 5, '9', '5', '', '2', 5, '0', 7, '', '', NULL, '0000-00-00'),
(21, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:18', 1, NULL, '', '', '', '', 0, '57', 0, 6, 6, '8', '4', '', '3', 6, '0', 7, '', '', NULL, '0000-00-00'),
(22, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '53', 0, 7, 7, '7', '3', '', '4', 7, '0', 7, '', '', NULL, '0000-00-00'),
(23, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '55', 0, 8, 8, '6', '2', '', '5', 4, '0', 7, '', '', NULL, '0000-00-00'),
(24, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '22', 0, 9, 4, '5', '1', '', '6', 5, '0', 7, '', '', NULL, '0000-00-00'),
(25, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '26', 0, 4, 5, '4', '7', '', '7', 6, '0', 7, '', '', NULL, '0000-00-00'),
(26, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '50', 0, 5, 6, '3', '5', '', '8', 7, '0', 7, '', '', NULL, '0000-00-00'),
(27, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '53', 0, 6, 7, '2', '3', '', '9', 4, '0', 7, '', '', NULL, '0000-00-00'),
(28, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '59', 0, 7, 8, '1', '1', '', '10', 5, '0', 7, '', '', NULL, '0000-00-00'),
(29, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '26', 0, 8, 4, '9', '8', '', '11', 6, '0', 7, '', '', NULL, '0000-00-00'),
(30, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '21', 0, 9, 5, '8', '6', '', '12', 7, '0', 7, '', '', NULL, '0000-00-00'),
(31, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '48', 0, 4, 6, '7', '4', '', '13', 4, '0', 7, '', '', NULL, '0000-00-00'),
(32, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '39', 0, 5, 7, '6', '2', '', '14', 5, '0', 7, '', '', NULL, '0000-00-00'),
(33, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '36', 0, 6, 8, '5', '9', '', '15', 6, '0', 7, '', '', NULL, '0000-00-00'),
(34, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '29', 0, 7, 4, '4', '7', '', '16', 7, '0', 7, '', '', NULL, '0000-00-00'),
(35, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '25', 0, 8, 5, '3', '5', '', '17', 4, '0', 7, '', '', NULL, '0000-00-00'),
(36, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '31', 0, 9, 6, '2', '3', '', '18', 5, '0', 7, '', '', NULL, '0000-00-00'),
(37, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '56', 0, 4, 7, '1', '1', '', '19', 6, '0', 7, '', '', NULL, '0000-00-00'),
(38, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '57', 0, 5, 8, '8', '6', '', '20', 7, '0', 7, '', '', NULL, '0000-00-00'),
(39, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '22', 0, 6, 4, '7', '5', '', '21', 4, '0', 7, '', '', NULL, '0000-00-00'),
(40, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '115', 0, 7, 5, '6', '4', '', '22', 5, '0', 7, '', '', NULL, '0000-00-00'),
(41, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:19', 1, NULL, '', '', '', '', 0, '48', 0, 8, 6, '5', '3', '', '23', 6, '0', 7, '', '', NULL, '0000-00-00'),
(42, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '23', 0, 9, 7, '4', '2', '', '24', 7, '0', 7, '', '', NULL, '0000-00-00'),
(43, '', '', 'gayatri@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '27', 0, 4, 8, '3', '1', '', '25', 4, '0', 7, '', '', NULL, '0000-00-00'),
(44, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '57', 0, 5, 4, '2', '1', '', '26', 5, '0', 7, '', '', NULL, '0000-00-00'),
(45, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '53', 0, 6, 5, '1', '2', '', '27', 6, '0', 7, '', '', NULL, '0000-00-00'),
(46, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '55', 0, 7, 6, '7', '3', '', '28', 7, '0', 7, '', '', NULL, '0000-00-00'),
(47, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '23', 0, 8, 7, '6', '4', '', '29', 4, '0', 7, '', '', NULL, '0000-00-00'),
(48, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '26', 0, 9, 8, '5', '5', '', '30', 5, '0', 7, '', '', NULL, '0000-00-00'),
(49, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '50', 0, 4, 4, '4', '1', '', '31', 6, '0', 7, '', '', NULL, '0000-00-00'),
(50, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '53', 0, 5, 9, '3', '2', '', '32', 7, '0', 7, '', '', NULL, '0000-00-00'),
(51, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '59', 0, 6, 6, '2', '3', '', '33', 4, '0', 7, '', '', NULL, '0000-00-00'),
(52, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '26', 0, 7, 7, '1', '4', '', '34', 5, '0', 7, '', '', NULL, '0000-00-00'),
(53, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '21', 0, 8, 8, '6', '5', '', '35', 6, '0', 7, '', '', NULL, '0000-00-00'),
(54, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '48', 0, 9, 4, '5', '6', '', '36', 7, '0', 7, '', '', NULL, '0000-00-00'),
(55, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '39', 0, 4, 5, '4', '1', '', '37', 4, '0', 7, '', '', NULL, '0000-00-00'),
(56, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '36', 0, 5, 6, '3', '2', '', '38', 5, '0', 7, '', '', NULL, '0000-00-00'),
(57, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '29', 0, 6, 7, '2', '3', '', '39', 6, '0', 7, '', '', NULL, '0000-00-00'),
(58, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '25', 0, 7, 8, '1', '4', '', '40', 7, '0', 7, '', '', NULL, '0000-00-00'),
(59, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '56', 0, 8, 4, '5', '5', '', '41', 4, '0', 7, '', '', NULL, '0000-00-00'),
(60, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '23', 0, 9, 5, '4', '6', '', '42', 5, '0', 7, '', '', NULL, '0000-00-00'),
(61, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '28', 0, 4, 6, '3', '5', '', '43', 6, '0', 7, '', '', NULL, '0000-00-00'),
(62, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '43', 0, 5, 7, '2', '4', '', '44', 7, '0', 7, '', '', NULL, '0000-00-00'),
(63, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '21', 0, 6, 8, '1', '3', '', '45', 4, '0', 7, '', '', NULL, '0000-00-00'),
(64, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '26', 0, 7, 4, '10', '2', '', '46', 5, '0', 7, '', '', NULL, '0000-00-00'),
(65, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '41', 0, 8, 5, '9', '1', '', '47', 6, '0', 7, '', '', NULL, '0000-00-00'),
(66, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '40', 0, 9, 6, '7', '4', '', '48', 7, '0', 7, '', '', NULL, '0000-00-00'),
(67, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '27', 0, 4, 7, '5', '3', '', '49', 4, '0', 7, '', '', NULL, '0000-00-00'),
(68, '', '', 'asif@willnevergrowup.com', 4, '2016-01-07 04:58:20', 1, NULL, '', '', '', '', 0, '25', 0, 5, 8, '3', '2', '', '50', 5, '0', 7, '', '', NULL, '0000-00-00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hq_conclusion`
--
ALTER TABLE `hq_conclusion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `hq_conclusionfinalsuggestion`
--
ALTER TABLE `hq_conclusionfinalsuggestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hq_conclusionquestion`
--
ALTER TABLE `hq_conclusionquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `hq_designation`
--
ALTER TABLE `hq_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `hq_options`
--
ALTER TABLE `hq_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=186;
--
-- AUTO_INCREMENT for table `hq_pillar`
--
ALTER TABLE `hq_pillar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hq_question`
--
ALTER TABLE `hq_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hq_useranswer`
--
ALTER TABLE `hq_useranswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hq_userpillar`
--
ALTER TABLE `hq_userpillar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `testpillarexpected`
--
ALTER TABLE `testpillarexpected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testquestion`
--
ALTER TABLE `testquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `userquestionsend`
--
ALTER TABLE `userquestionsend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
