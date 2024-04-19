-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: nedsc002.mysql.guardedhost.com
-- Generation Time: Feb 23, 2023 at 04:49 PM
-- Server version: 10.4.22-MariaDB-1:10.4.22+maria~buster
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nedsc002_medport`
--

-- --------------------------------------------------------

--
-- Table structure for table `billinginfo`
--

DROP TABLE IF EXISTS `billinginfo`;
CREATE TABLE `billinginfo` (
  `bill_id` int(11) UNSIGNED NOT NULL,
  `std_id` int(250) NOT NULL,
  `patient_id` int(250) UNSIGNED NOT NULL,
  `billdate` varchar(50) NOT NULL,
  `amount` int(250) NOT NULL,
  `uploadedfile` varchar(250) NOT NULL,
  `billsubmission` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `billusers`
--

DROP TABLE IF EXISTS `billusers`;
CREATE TABLE `billusers` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(50) NOT NULL DEFAULT 0 COMMENT '0=user 1=admin',
  `status` int(50) NOT NULL DEFAULT 0 COMMENT '0=off 1=on',
  `code` int(50) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billusers`
--

INSERT INTO `billusers` (`user_id`, `name`, `contact`, `email`, `password`, `role`, `status`, `code`, `date`) VALUES
(1, 'syedhilaladmin', '03322172583', 'syedhilalkhan64@gmail.com', '$2y$10$59HmK79qOV4Dd9Lznal5d.WpgPHVTZKSGGgHlWRoOmls2tF7EgrOS', 1, 1, 0, '2022-10-02'),
(2, 'Dr Sohail Ahmed', '+1 (248) 703-3544', 'msohailahmed@yahoo.com', '$2y$10$KzpFzEvcP/XwW5JOEP9DjuF4LjhQJDjGeMD5v/qhRaUf3aiw6xUMS', 1, 1, 0, '2022-10-02'),
(3, 'SyedHilalHussain', '03322172583', 'syedhilalaseel@gmail.com', '$2y$10$dIT0HVc0Eb6owJEoaSd89OK4hthO9TtCA5JrviYWQ8TH92HqRIh.G', 0, 1, 0, '2022-10-02'),
(4, 'NaheedAkhter', '2488943738', 'naheedakhter1@yahoo.com', '$2y$10$pPZe9WyTc.6oQzrUjozjsekC/WW.GcSbhn7TQMEgkFuCU0nVx.yJ.', 0, 1, 0, '2022-10-02'),
(5, 'syedhamidhussain', '03003626454', 'syedhamidhussain20@gmail.com', '$2y$10$.JFXh6D4OW0B0xnxQ5m6hejUur4a7WWSQaR/TXd2Nm5HEbp0.y2W.', 0, 1, 0, '2022-10-02'),
(6, 'Athar Rafiq', '03212708299', 'athar@neduet.edu.pk', '$2y$10$Ur06Ucv.YetTdO0KqjczVeIjlB/K7dB5iaxhJyRZjcsPT0cnoOTJC', 0, 1, 0, '2022-10-04'),
(7, 'Kaivan Lor', '03332353025', 'kaivanlor@neduet.edu.pk', '$2y$10$y5spS6d.V3L7WukAk8yIUeu4EE0Qz6X3pFCe/SCer2nodWGhmalSe', 0, 1, 0, '2022-10-04'),
(8, 'Manahil Ilyas', '03303009361', 'manahilsheikh195@gmail.com', '$2y$10$9tCNX9QHfkyZnLdCGu5AQuDJMJKMxX8pSzYH.WkMwDBBoyVXllNoW', 0, 1, 0, '2022-10-05'),
(9, 'Syed Umaid Ahmed', '03323117626', 'syedumaidahmed96@gmail.com', '$2y$10$SVcGAA/k6BiTAqakEwrqDObNDCyyyJkyb23iU7eLCCdTSUTDkKWzK', 0, 1, 0, '2022-10-11'),
(10, 'Tabish Anis', '+923322373552', 'tabishanis93@gmail.com', '$2y$10$BtUC7xjFQv70SsHWuOO.Uu83mM1De8s4aEL3nmrmYyGSEJUDzPfyG', 0, 1, 0, '2022-10-20'),
(11, 'Zubair Akhtar', '03015936823', 'akhtarzubair2323@gmail.com', '$2y$10$GNojisSfUnFpSNgPuylsw.3gojso/4etiQn6zaKBMq3DJGpHeRIBm', 0, 1, 0, '2022-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `billusersheetname`
--

DROP TABLE IF EXISTS `billusersheetname`;
CREATE TABLE `billusersheetname` (
  `user_id` int(50) NOT NULL,
  `sheetname` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=Hide 1= Show'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billusersheetname`
--

INSERT INTO `billusersheetname` (`user_id`, `sheetname`, `status`) VALUES
(3, '6338e8276c4d7.test', 0),
(4, '63393283b49c4.Sheet1', 1),
(5, '6339b669c68e0.hamid1', 1),
(7, '633bbdff3f1dd.NED Scholars Scholarship', 1),
(6, '633c02f71b92e.Laptop', 1),
(6, '633c0314ea7e4.Financial Assistance By Student Affairs Department', 1),
(8, '633d1d4a4ac6b.Manahil Ilyas', 1),
(5, '6346ec306f50a.Hamid tabish umaid', 1),
(3, '63484fa66a9a7.hilalbill', 1),
(10, '635160fb357e1.NED Scholars - Tabish Anis Account', 1),
(11, '637cdc0ae0887.VT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `billusersheets`
--

DROP TABLE IF EXISTS `billusersheets`;
CREATE TABLE `billusersheets` (
  `billid` int(250) NOT NULL,
  `user_id` int(50) NOT NULL,
  `sheetname` varchar(250) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `balance` int(250) NOT NULL,
  `acknowledge` varchar(250) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billusersheets`
--

INSERT INTO `billusersheets` (`billid`, `user_id`, `sheetname`, `description`, `balance`, `acknowledge`, `note`, `date`) VALUES
(1, 4, '63393283b49c4.Sheet1', 'open accountÂ ', 12010, 'Yes', 'by KL', '12/2/2022'),
(33, 5, '6339b669c68e0.hamid1', 'Muhammad Moiz', 100000, 'yes', 'from csa account', '29/09/2022'),
(34, 5, '6339b669c68e0.hamid1', 'Muhammad Arif Boota - Fee for Bahiouddin Zakarya University', -40750, 'Yes (no return)', 'For Tahira fee Bahauddin Zakarya Uni Multan', '30/09/2022'),
(36, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Starting Balance', 4261871, 'Yes', 'Yes', '04/10/2022'),
(37, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Taha Shams', 1500, 'Yes', 'Yes', '30/09/2022'),
(38, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Iqra Bibi', 2000, 'Yes', 'Yes', '03/10/2022'),
(39, 6, '633c0314ea7e4.Financial Assistance By Student Affairs Department', '\n  Dr.\n  Sohail (NED Scholars) for Laptop Disserving Students of NEDÂ and Financial Assistance 2022', 600788, 'yes', 'previous BalanceÂ ', '10/04/2022'),
(40, 6, '633c02f71b92e.Laptop', '10 laptops in hand for deserving students main campus and thar campusÂ ', 0, 'yes', 'waiting for list', '10/04/2022'),
(41, 8, '633d1d4a4ac6b.Manahil Ilyas', 'A cheque was given to me by Dr. Sohail.', 120000, 'ack', 'I received the cheque from SFC.Â ', '30/03/2022'),
(42, 8, '633d1d4a4ac6b.Manahil Ilyas', 'Dr. Sohail allowed me to use the following amount.', -20000, 'ack', 'Because I lost my job, Dr. Sohail helped me with my monthly expense.', '03/04/2022'),
(43, 8, '633d1d4a4ac6b.Manahil Ilyas', 'Dr.Sohail gave me Proofreading work', -7000, 'ack', 'The work was distributed in 2 parts, for part 1 I was given 4000rs and for part 2 I was given 3000rs.', '04/04/2022'),
(44, 8, '633d1d4a4ac6b.Manahil Ilyas', 'Dr. Sohail gave me designing work.', -3000, 'ack', 'I made the Annual report for NED Scholars by using Canva.', '05/04/2022'),
(45, 8, '633d1d4a4ac6b.Manahil Ilyas', 'I deducted my fee for Teaching Essa.', -10000, 'ack', 'I taught Essa for 2 months, 5000/month. I just mentioned it as combined so its easier check.', '20/05/2022'),
(46, 8, '633d1d4a4ac6b.Manahil Ilyas', 'Dr. Sohail gave me Content work.', -4000, 'ack', 'I made MCQs of 4 Documents that Dr.Sohail sent me.', '26/05/2022'),
(47, 8, '633d1d4a4ac6b.Manahil Ilyas', 'Funds Transferred', -10000, 'ack', 'Funds were transferred to Ghulam Haider as instructed by Dr. Sohail.', '06/06/2022'),
(48, 8, '633d1d4a4ac6b.Manahil Ilyas', 'Dr. Sohail paid for my medical expenses.', -5000, 'ack', 'I got Dengue Virus, and Dr.Sohail allowed me to use the amount on my medication.Â ', '12/09/2022'),
(49, 5, '6339b669c68e0.hamid1', 'M.Raza Rizvi', 100000, 'Yes', 'Received from Raza by hamid', '4/10/2022'),
(50, 5, '6339b669c68e0.hamid1', 'M.Osama', 100000, 'Yes', 'Received from Osama by hamid', '4/10/2022'),
(51, 5, '6339b669c68e0.hamid1', 'Amna ahmed', 100000, 'Yes', 'Received from Amna by hamid', '5/10/2022'),
(52, 5, '6339b669c68e0.hamid1', 'Kivan Lor', -70000, 'Yes (no return)', 'Received by Lord kelvin from hamid', '6/10/2022'),
(53, 5, '6339b669c68e0.hamid1', 'Tariq Abu Umer - He will keep it', -100000, 'Yes', 'Transfer amount to Tariq sab A/c no0102587706', '6/10/2022'),
(54, 5, '6339b669c68e0.hamid1', 'HilalÂ ', -5000, 'Yes', 'Award', '6/10/2022'),
(58, 7, '633bbdff3f1dd.NED Scholars Scholarship', '46 students Scholarship (Renewa)', -3656500, 'Yes', '442657-WhatsApp Image 2022-10-10 at 10.43.12 AM (1) (1).jpeg', '11/10/2022'),
(60, 5, '6346ec306f50a.Hamid tabish umaid', 'M. Hammas. S (to Umaid)', 100000, 'yes', '379940-hamid.jpeg', '6/10/2022'),
(63, 5, '6339b669c68e0.hamid1', 'madam taranum - For student help', -10000, 'yes (No return)', NULL, '13/10/2022'),
(64, 5, '6339b669c68e0.hamid1', 'Tahira Akram - ??? According to Excel she gave you 100000', 50000, 'yes', NULL, '13/10/2022'),
(65, 5, '6339b669c68e0.hamid1', 'Syed Hamid Hussain Loan for tuition fee - Will return after the scholarship check of Rs 125000 received in Nov 2022', -45000, 'yes', '754339-13.jpeg', '13/10/2022'),
(66, 5, '6339b669c68e0.hamid1', 'Fizza Sehar', 100000, 'yes', '923001-14.jpeg', '10/10/2022'),
(67, 5, '6339b669c68e0.hamid1', 'Sheroz Khan', 100000, 'Yes', '362960-15.jpeg', '10/10/2022'),
(68, 3, '63484fa66a9a7.hilalbill', 'M.Wajih.Waseem', 100000, 'yes', '456306-16.jpeg', '13/10/2022'),
(69, 5, '6339b669c68e0.hamid1', 'Raees jamil', 100000, 'yes', '450966-WhatsApp Image 2022-10-15 at 3.41.18 PM.jpeg', '15/10/2022'),
(70, 5, '6339b669c68e0.hamid1', 'Tariq abu umerÂ  (sent by Raees Jamil 15/10/22) He will keep it', -100000, 'yes (No return)', '901990-WhatsApp Image 2022-10-15 at 3.41.18 PM.jpeg', '15/10/2022'),
(71, 5, '6339b669c68e0.hamid1', 'M. Anas Hassan - Received 100000 (60000 left)', 40000, 'yes', '280725-WhatsApp Image 2022-10-15 at 3.30.15 PM.jpeg', '15/10/2022'),
(72, 5, '6339b669c68e0.hamid1', 'Ghulam haiderÂ (Sent by Anas 15/10/2022)Â ', -40000, 'yes', '107607-WhatsApp Image 2022-10-15 at 3.30.15 PM.jpeg', '15/10/2022'),
(73, 3, '63484fa66a9a7.hilalbill', 'Abdul Basit - for MS fee - Get the money back when he gets the cheque in Nov (Re 125000)', -54000, 'Yes', '543578-IMG-20221019-WA0029.jpg', '19/10/2022'),
(74, 3, '63484fa66a9a7.hilalbill', 'Ali javed sir (Dr. Sohail requested)', -24000, 'Yes', '346525-IMG-20221020-WA0021.jpg', '20/10/2022'),
(75, 3, '63484fa66a9a7.hilalbill', 'Received from Hamid bhai', 126000, 'Yes', NULL, '20/10/2022'),
(76, 5, '6339b669c68e0.hamid1', 'M. Anas Hassan - Received 100000 , 40000 received in 15/10/22 (10000 left)', 50000, 'yes', '828827-WhatsApp Image 2022-10-18 at 10.52.54 PM.jpeg', '18/10/2022'),
(77, 5, '6339b669c68e0.hamid1', 'Shahzad Bugti for father meds - (Sent by Anas 18/10/2022)Â ', -50000, 'yes', '189356-WhatsApp Image 2022-10-18 at 10.52.54 PM.jpeg', '18/10/2022'),
(78, 5, '6339b669c68e0.hamid1', 'S Hilal Hussain admission Fee (Will return after his scholarship)', -37500, 'admission fees', NULL, '20/10/2022'),
(79, 5, '6339b669c68e0.hamid1', 'S Hilal Hussain', -126000, 'transfer his account', NULL, '20/10/2022'),
(80, 3, '63484fa66a9a7.hilalbill', 'Shezad Bugti - Flood- He will return once he has his cheque', -50000, 'yes', '691933-bt.jpeg', '22/10/2022'),
(81, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Moiz Ali Scholarhsip', -70000, 'Yes', NULL, '24/10/2022'),
(82, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Abdul Basit', -125000, 'Yes', NULL, '24/10/2022'),
(83, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Syed Hamid Hussain', -125000, 'Yes', NULL, '24/10/2022'),
(84, 3, '63484fa66a9a7.hilalbill', 'eshaal shahzad', 100000, 'yes', NULL, '28/10/2022'),
(85, 3, '63484fa66a9a7.hilalbill', 'Ghulam Haider bhai Islamabad', -30000, 'yes', '425619-ghulam.jpeg', '29/10/2022'),
(86, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Taha Shams', 1000, 'Yes', NULL, '31/10/2022'),
(87, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Iqra Bibi', 2000, 'Yes', NULL, '03/11/2022'),
(88, 3, '63484fa66a9a7.hilalbill', 'M.rehan - Naheed', -29000, 'yes (no return)', '644648-rehan.jpeg', '1/11/2022'),
(89, 3, '63484fa66a9a7.hilalbill', 'M.musab saleem', -20000, 'yes', '926337-musab.jpeg', '1/11/2022'),
(90, 3, '63484fa66a9a7.hilalbill', 'Izma', 100000, 'yes', '238064-izma.jpeg', '3/11/2022'),
(91, 3, '63484fa66a9a7.hilalbill', 'Ghulam Haider - Islamabad visit', -20000, 'yes', '321910-ghulam.jpeg', '5/11/2022'),
(92, 3, '6338e8276c4d7.test', 'k', 1, 'k', NULL, '12/2/2222'),
(93, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Shamsuddin', 100000, 'Yes', NULL, '10/11/2022'),
(94, 3, '63484fa66a9a7.hilalbill', 'Fawad CFD training academy fee', -10000, 'yes', '875410-fawad.jpeg', '10/11/2022'),
(95, 3, '63484fa66a9a7.hilalbill', 'Muslim CFD training academy fee', -10000, 'yes', '585460-muslim.jpeg', '10/11/2022'),
(96, 3, '63484fa66a9a7.hilalbill', 'Ghulam Haider for Islamabad visit', -20000, 'yes', '620742-ghulam.jpeg', '12/11/2022'),
(97, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Fund Received US $ 9463', 2100786, 'Yes', NULL, '11/11/2022'),
(98, 6, '633c0314ea7e4.Financial Assistance By Student Affairs Department', 'Syeda Fiza PE-044 / Oil & Gas Conference', -30000, 'Yes', NULL, '15/11/2022'),
(100, 6, '633c0314ea7e4.Financial Assistance By Student Affairs Department', 'Payment for laptop bags for NED Scholars Students (50 bags)', -65000, 'Yes', '801854-WhatsApp Image 2022-11-17 at 9.16.08 PM.jpeg', '18/11/2022'),
(102, 3, '63484fa66a9a7.hilalbill', 'shezad bugti - Loan (22/10/22) returnedÂ ', 50000, 'yes', '861373-shezad.jpeg', '16/11/2022'),
(103, 3, '63484fa66a9a7.hilalbill', 'Kaiwen sir for Adeel Naeem DHA Suffa student -Â ', -54000, 'yes (no return)', NULL, '18/11/2022'),
(104, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Fund Received US $ 9463', 2114980, 'Yes', NULL, '21/11/2022'),
(105, 7, '633bbdff3f1dd.NED Scholars Scholarship', '07 Students Project + Research (Hamid, Basit, Aqsa, Anas, Hifza, Muddassir, Zubair)Â ', -750000, 'Yes', NULL, '22/11/2022'),
(107, 11, '637cdc0ae0887.VT', 'Petrol in 2 motorbikes to visit the centre', -1100, 'acknowledged', '272495-fuel 27 06 22.jpeg', '27/06/2022'),
(108, 11, '637cdc0ae0887.VT', 'Lunch and water bottles', -1250, 'acknowledged	', '534586-lunch 27 06 22.jpeg', '27/06/2022'),
(109, 11, '637cdc0ae0887.VT', 'Petrol expense for visiting Madina Market', -400, 'acknowledged', '477741-30 06 22 (400).jpeg', '30/06/2022'),
(110, 5, '6339b669c68e0.hamid1', 'M. Anas Hassan - Received 100000 , 40000 received in 15/10/22 and 50000 on 18/10/22', 9900, 'yes', '700915-WhatsApp Image 2022-10-20 at 11.36.50 PM.jpeg', '20/10/2022'),
(111, 5, '6346ec306f50a.Hamid tabish umaid', 'Zubair Akhtar (Cheque to Tabhis Anees)', 100000, 'yes', '285326-WhatsApp Image 2022-11-22 at 11.10.38 PM.jpeg', '5/10/2022'),
(112, 11, '637cdc0ae0887.VT', 'Material for Training program :=>    a) Measuring tape (11)  -  b) Chalk box (1)  - c) Thread boxes (3) -  d) Clippers (3)  - e) Scale Patti (2)   -  f) Needles Packet (3)  -  g) Steel scale (4) ', -2650, 'acknowledged', '442987-measuring tape 18 07 22.jpeg', '18/07/2022'),
(113, 5, '6346ec306f50a.Hamid tabish umaid', 'Ali Javed Siddique (Tabish Anees)', 100000, 'yes', NULL, '10/11/2022'),
(114, 11, '637cdc0ae0887.VT', 'Material for Training program :=> h) scissors (12)', -3000, 'acknowledged', '923192-18 07 22.jpeg', '18/07/2022'),
(115, 5, '6346ec306f50a.Hamid tabish umaid', 'Binish Haseeb (Cheque to Tabish Anees)', 100000, 'yes', '540944-WhatsApp Image 2022-11-22 at 11.15.10 PM.jpeg', '8/11/2022'),
(116, 5, '6346ec306f50a.Hamid tabish umaid', 'M.Anas hassan (40K send to GHaider,50k ShahzadB,9900with hamid)', 100000, 'yes', '714097-WhatsApp Image 2022-11-22 at 11.19.02 PM.jpeg', '4/10/2022'),
(117, 11, '637cdc0ae0887.VT', 'Purchase machines', -90000, 'acknowledged', '559111-ned 27072022(90000).jpeg', '27/07/2022'),
(118, 11, '637cdc0ae0887.VT', 'Fuel Expense', -500, 'acknowledged', '188917-27 07 22.jpeg', '27/07/2022'),
(119, 11, '637cdc0ae0887.VT', 'Fuel Expense', -1100, 'acknowledged', '708312-fuel 27 07 22 (1100).jpeg', '27/07/2022'),
(120, 11, '637cdc0ae0887.VT', 'Lunch and Water bottles', -480, 'acknowledged', '815542-27 07 22.jpeg', '27/07/2022'),
(121, 11, '637cdc0ae0887.VT', 'Fuel Expense', -400, 'acknowledged', '852478-fuel 2 10 22.jpeg', '02/10/2022'),
(122, 11, '637cdc0ae0887.VT', 'Purchase of chairs', -13900, 'acknowledged', '523365-chair ned.jpeg', '05/10/2022'),
(123, 11, '637cdc0ae0887.VT', 'Fuel Expense', -1300, 'acknowledged', '588731-fuel 05 10 22 (1300).jpeg', '05/10/2022'),
(124, 11, '637cdc0ae0887.VT', 'Fuel Expense', -400, 'acknowledged', '275781-fuel 05 10 22 (400).jpeg', '05/10/2022'),
(125, 11, '637cdc0ae0887.VT', 'Lunch and Water bottles', -1040, 'acknowledged', '356839-lunch 05 10 22.jpeg', '05/10/2022'),
(126, 11, '637cdc0ae0887.VT', 'Furniture & Carpenter work', -30000, 'acknowledged', '532479-furniture.png', '05/10/2022'),
(127, 11, '637cdc0ae0887.VT', 'Eatables', -410, 'acknowledged', '554945-lunch 12 10 22.jpeg', '12/10/2022'),
(128, 11, '637cdc0ae0887.VT', 'Transport & Fuel expense', -2000, 'acknowledged	', '454922-fuel 12 10 22.jpeg', '12/10/2022'),
(129, 11, '637cdc0ae0887.VT', 'Lunch and HiTea', -1280, 'acknowledged', '967986-lunch 12 10 22.jpeg', '12/10/2022'),
(130, 11, '637cdc0ae0887.VT', 'Fuel Expense', -400, 'acknowledged', '358448-fuel.png', '13/10/2022'),
(131, 11, '637cdc0ae0887.VT', 'Stationery Items', -548, 'acknowledged', '459344-16 10 2022.jpeg', '16/10/2022'),
(132, 11, '637cdc0ae0887.VT', 'Eatables', -160, 'acknowledged', '942884-eatables 160.jpeg', '22/10/2022'),
(133, 11, '637cdc0ae0887.VT', 'Panaflex & Registration forms', -2300, 'acknowledged', '559608-penaflix and registeration.png', '22/10/2022'),
(134, 11, '637cdc0ae0887.VT', 'Transport Expense', -1100, 'acknowledged', '872913-Transport expensis.png', '22/10/2022'),
(135, 11, '637cdc0ae0887.VT', 'Transport Expense', -1000, 'acknowledged', '753482-petrol 06 11 22 (1000).jpeg', '06/11/2022'),
(136, 11, '637cdc0ae0887.VT', 'Fuel Expense', -400, 'acknowledged', '223431-petrol 11 11 22 (400).jpeg', '11/11/2022'),
(137, 11, '637cdc0ae0887.VT', 'Fuel Expense', -250, 'acknowledged', '785405-petrol 12 11  22 (250).jpeg', '12/11/2022'),
(138, 8, '633d1d4a4ac6b.Manahil Ilyas', 'Paid 5th semester fee', -36500, 'ack', NULL, '18/10/2022'),
(139, 5, '6339b669c68e0.hamid1', 'S Hilal Hussain', -100000, 'yes', NULL, '25/11/2022'),
(140, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Ehsan Ur Rehman (09-08-2022)', 10000, 'Yes', NULL, '09/08/2022'),
(141, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Ehsan Ur Rehman (25-11-2022)', 10000, 'Yes', NULL, '25/11/2022'),
(142, 3, '63484fa66a9a7.hilalbill', 'From hamid bhai', 100000, 'Yes', NULL, '25/11/2022'),
(143, 3, '63484fa66a9a7.hilalbill', 'Huzaifa - EMUiNVENT development', -50000, 'Yes', '624945-IMG-20221201-WA0010.jpg', '25/11/2022'),
(144, 3, '63484fa66a9a7.hilalbill', 'Javed Iqbal - Sarmad Iqbal fee - Hamid will get Rs125000 for this from CSA in December', -100000, 'Yes', '453707-img_2022111115419.jpeg', '1/12/2022'),
(149, 3, '63484fa66a9a7.hilalbill', 'Khawar sir - Loan for Vocational Training Center - Get this back from him once VT groups girls get their cheques and gave the money to Khawar Sahib', -100000, 'Yes', '742441-IMG-20221201-WA0081.jpg', '1/12/2022'),
(153, 3, '63484fa66a9a7.hilalbill', 'For madrasa students meal - Dr Sohail will send this money', -43000, 'yes', '883527-br.jpeg', '3/12/2022'),
(154, 5, '6339b669c68e0.hamid1', 'Alishah got Rs100000, kept 30000', 70000, 'Yes', NULL, '30/09/2022'),
(155, 3, '63484fa66a9a7.hilalbill', 'From hamid bhai', 200000, 'Yes', NULL, '6/12/2022'),
(157, 3, '63484fa66a9a7.hilalbill', 'Khawar sir', -100000, 'Yes (no return)', '844113-img_2022116105231.jpeg', '6/12/2022'),
(158, 3, '63484fa66a9a7.hilalbill', 'Ali Javaid - Shahtaj', -10000, 'Yes', '868530-img_2022115204336.jpeg', '6/12/2022'),
(159, 3, '63484fa66a9a7.hilalbill', 'Abdul basit will return the money that he received from the CSA office Rs 125000 + 125000', -1, 'No', NULL, '10/12/2022'),
(160, 5, '6339b669c68e0.hamid1', 'Syedhamidhussain scholarship cheque', 125000, 'yes', '743515-WhatsApp Image 2022-12-11 at 3.16.56 PM.jpeg', '2/12/2022'),
(161, 5, '6339b669c68e0.hamid1', 'transferred amount to hilal account', -200000, 'yes', NULL, '5/12/2022'),
(162, 5, '6346ec306f50a.Hamid tabish umaid', 'M. Raza Rizvi (Hamid)', 100000, 'yes', NULL, '13/10/1022'),
(163, 5, '6346ec306f50a.Hamid tabish umaid', 'M.wajih waseem (Hilal)', 100000, 'yes', NULL, '13/10/2022'),
(164, 3, '63484fa66a9a7.hilalbill', 'hifza waseem', -2000, 'yes', '159932-hifza.jpeg', '11/12/2022'),
(165, 3, '63484fa66a9a7.hilalbill', 'debit tax on all below transactions', -1000, 'yes', NULL, '11/12/2022'),
(166, 5, '6346ec306f50a.Hamid tabish umaid', 'Alishah anwar(Hamid)', 70000, 'yes', NULL, '2/10/2022'),
(167, 5, '6346ec306f50a.Hamid tabish umaid', 'Eshaal shahzad(hilal)', 100000, 'yes', NULL, '28/10/2022'),
(168, 5, '6346ec306f50a.Hamid tabish umaid', 'M.Moiz(hamid)', 100000, 'yes', NULL, '29/09/2022'),
(169, 5, '6346ec306f50a.Hamid tabish umaid', 'shahroz khan (Hilal TID:103886)', 100000, 'yes', NULL, '10/10/2022'),
(170, 5, '6346ec306f50a.Hamid tabish umaid', 'sidrah khursheed(will not recieved any amount tution fees for shahzaib indus university)', 100000, 'no', NULL, '25/09/2022'),
(171, 5, '6346ec306f50a.Hamid tabish umaid', 'Fiza sehar (recieved by hamid)', 100000, 'yes', NULL, '10/10/2022'),
(172, 5, '6346ec306f50a.Hamid tabish umaid', 'tahira akram(cheque to hamid(45Khamid admission)', 100000, 'yes', NULL, '13/10/2022'),
(175, 5, '6346ec306f50a.Hamid tabish umaid', 'Amna Ahmed(hamid)', 100000, 'yes', NULL, '5/10/2022'),
(177, 5, '6346ec306f50a.Hamid tabish umaid', 'Izma sajid(send to hilal)', 100000, 'yes', NULL, '3/11/2022'),
(178, 5, '6346ec306f50a.Hamid tabish umaid', 'M.Osama (Umaid)', 100000, 'yes', NULL, '3/10/2022'),
(179, 5, '6346ec306f50a.Hamid tabish umaid', 'Ezatullah(for amazon service)', 100000, 'yes', NULL, '25/09/2022'),
(180, 5, '6346ec306f50a.Hamid tabish umaid', 'Rafiullah(send to ezatullah)', 100000, 'yes', NULL, '25/09/2022'),
(181, 5, '6346ec306f50a.Hamid tabish umaid', 'M.Raees jamil(send to tariq aba umar sab)', 100000, 'yes', NULL, '15/10/2022'),
(182, 5, '6346ec306f50a.Hamid tabish umaid', 'M.anas ahmed(cheque to tabhis sir)', 100000, 'yes', NULL, '4/10/2022'),
(183, 5, '6339b669c68e0.hamid1', 'Manahil ilyas (total amount 120000 recieved by hamid Rs24500)', 24500, 'yes', '302592-WhatsApp Image 2022-12-11 at 11.15.57 PM.jpeg', '12/11/2022'),
(185, 5, '6339b669c68e0.hamid1', 'Hilal fees returned ', 37500, 'Yes', NULL, '12/12/2022'),
(186, 5, '6339b669c68e0.hamid1', 'Transfered to hilal account ', -77500, 'Yes', NULL, '15/12/2022'),
(187, 3, '63484fa66a9a7.hilalbill', 'From hamid bhai', 77500, 'Yes', NULL, '15/12/2022'),
(188, 3, '63484fa66a9a7.hilalbill', 'For bike ', -55000, 'Yes', NULL, '15/12/2022'),
(189, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Farhan', 150000, 'Yes', NULL, '20/11/2022'),
(190, 3, '63484fa66a9a7.hilalbill', '(35000 for hoodie)(5000 for logo printing)(500 for bike fuel three time gone to saddar 1 time light house for bargaining)(1000 for riksha for picking hoddies)', -41500, 'yes', '905913-hoddie.jpeg', '26/12/2022'),
(191, 3, '63484fa66a9a7.hilalbill', '1900 for  extension board 100 for fuel', -2000, 'yes', '474268-extension.jpeg', '26/12/2022'),
(192, 3, '63484fa66a9a7.hilalbill', 'to sameenhamid for refreshment', -9000, 'yes', '102421-sameen.jpeg', '26/12/2022'),
(193, 5, '6339b669c68e0.hamid1', 'Transfer to hilal account ', -75000, 'yes', NULL, '29/12/2022'),
(194, 3, '63484fa66a9a7.hilalbill', 'From hamid bhai', 75000, 'yes', NULL, '29/12/2022'),
(195, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Fund Received US $ 9463', 2141003, 'Yes', NULL, '30/12/2022'),
(196, 3, '63484fa66a9a7.hilalbill', 'to shagufta', -10000, 'yes', '802080-shagufta.jpeg', '3/1/2023'),
(197, 3, '63484fa66a9a7.hilalbill', 'fuel for sarmad hoddie delivery from keamari to star gate', -300, 'yes', NULL, '7/1/2023'),
(198, 5, '6346ec306f50a.Hamid tabish umaid', 'Abdul Basit Oct Cheque (Send to Umaid)', 125000, 'yes', '452372-Basit2Umaid.jpeg', '11/01/2022'),
(199, 5, '6346ec306f50a.Hamid tabish umaid', 'Syed Hamid Hussain Oct cheque (Hamid) ', 125000, 'yes', NULL, '11/12/2022'),
(200, 7, '633bbdff3f1dd.NED Scholars Scholarship', '25 students scholarhsip', -2205000, 'Yes', NULL, '13/1/2022'),
(202, 3, '63484fa66a9a7.hilalbill', 'from hifza', 100000, 'yes', '809242-hifza.jpeg', '18/1/2023'),
(203, 11, '637cdc0ae0887.VT', 'Received cheque from CSA', 100000, 'acknowledged', '918647-69DA60BD-D69C-4461-8092-424CDE98A1EF.jpeg', '07/01/2022'),
(204, 11, '637cdc0ae0887.VT', 'Online transaction to Hammad bhai for Carpet and Monthly VT project budget ', -65000, 'acknowledged ', '889643-9CEAC9D1-0908-4882-893E-CB4086B45D90.jpeg', '09/01/2022'),
(205, 11, '637cdc0ae0887.VT', 'Bykea charge Zubair and Muzammil ,shopping from kids fun fair stall etc', -1250, 'acknowledged ', '977086-0907E2F2-783B-405C-A164-A3B300B9A657.jpeg', '21/01/2023'),
(206, 11, '637cdc0ae0887.VT', 'lunch after ceremony ', -730, 'acknowledged ', '870244-4BE55054-CA8C-4ABF-9313-B91502BB8A00.jpeg', '21/01/2023'),
(207, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Yaqut Ali Scholarship', -110000, 'Yes', NULL, '3/2/2023'),
(208, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Abid Hassan Scholarship', -110000, 'Yes', NULL, '3/2/2023'),
(209, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Madiha Furqan Scholarship cheque cancelled Due to response, amount retained.', 70000, 'Yes', NULL, '3/2/2023'),
(210, 6, '633c0314ea7e4.Financial Assistance By Student Affairs Department', 'Dr. Sohail (NED Scholars) for Laptop Disserving Students, Office Chairs, Classroom Renovation of NED and Financial Assistance 2023', 1060102, 'yes', '353608-WireCSALaptop.jpeg', '02/02/2023'),
(211, 3, '63484fa66a9a7.hilalbill', 'from aqsa zaib', 99900, 'yes', '896933-aqsa.jpeg', '28/1/2023'),
(212, 3, '63484fa66a9a7.hilalbill', 'to javed iqbal', -74000, 'yes', '220102-javed.jpeg', '3/2/2023'),
(213, 3, '63484fa66a9a7.hilalbill', 'from basit bhai', 125000, 'yes', NULL, '9/2/2023'),
(214, 3, '63484fa66a9a7.hilalbill', 'to huzaifa', -50000, 'yes', '501334-huzaifa.jpeg', '14/2/2023'),
(215, 3, '63484fa66a9a7.hilalbill', 'to wajahat for microphone', -2100, 'yes', '388501-wajahat.jpeg', '19/2/2023'),
(216, 5, '6346ec306f50a.Hamid tabish umaid', 'Abdul basit (send to hilal)', 125000, 'yes', NULL, '09/12/2022'),
(217, 5, '6346ec306f50a.Hamid tabish umaid', 'syed hamid hussain(hamid)', 125000, 'yes', NULL, '13/01/2023'),
(218, 5, '6339b669c68e0.hamid1', 'syedhamidhussain scholarship cheque', 125000, 'yes', NULL, '13/01/2023'),
(219, 5, '6346ec306f50a.Hamid tabish umaid', 'Aqsa zaib(send hilal)', 99900, 'yes', '845366-WhatsApp Image 2023-02-20 at 10.22.49 PM.jpeg', '28/01/2023'),
(220, 5, '6346ec306f50a.Hamid tabish umaid', 'Hifza waseem(send hilal)', 100000, 'yes', '613705-WhatsApp Image 2023-02-20 at 10.25.15 PM.jpeg', '18/01/2023'),
(221, 5, '6346ec306f50a.Hamid tabish umaid', 'zubair akhtar(vocational training)', 100000, 'yes', NULL, '24/01/2023'),
(222, 5, '6339b669c68e0.hamid1', 'Tahira akram(cheque hamid)', 50000, 'yes', '338963-WhatsApp Image 2023-02-21 at 7.49.05 PM.jpeg', '11/01/2023'),
(223, 7, '633bbdff3f1dd.NED Scholars Scholarship', 'Saeed Bakhtiar Fund Received', 185000, 'Yes', NULL, '21/02/2023');

-- --------------------------------------------------------

--
-- Table structure for table `patientinfo`
--

DROP TABLE IF EXISTS `patientinfo`;
CREATE TABLE `patientinfo` (
  `patient_id` int(11) UNSIGNED NOT NULL,
  `std_id` int(250) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `relation` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `ill` varchar(50) NOT NULL,
  `treatment` varchar(50) NOT NULL,
  `doc_name` varchar(50) NOT NULL,
  `currenthhospital` varchar(50) NOT NULL,
  `pasthospital` varchar(50) NOT NULL,
  `detailofill` varchar(250) NOT NULL,
  `expact` varchar(250) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientinfo`
--

INSERT INTO `patientinfo` (`patient_id`, `std_id`, `contact`, `pname`, `relation`, `city`, `ill`, `treatment`, `doc_name`, `currenthhospital`, `pasthospital`, `detailofill`, `expact`, `date`) VALUES
(24, 14, '03312739615', 'Mehboob Ali ', 'Father ', 'Dera Bugti ', 'Colorectal Cancer ', 'yes', 'Dr Inam Pal', 'Agha Khan hospital Karachi ', 'Dr. Zia u din hospital Karachi ', 'He is diagnosed with Colorectal cancer and go through Surgery. Now he have a Stoma bag attached hopefully Doctor will remove it in October ', 'I want to thank Whole NED Scholar team and specially Dr. Sohail Ahmed. I hope NED Scholar helps me in curing my father ', '2022-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `std_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT '0' COMMENT '0=user 1= admin',
  `status` varchar(10) NOT NULL DEFAULT '0' COMMENT '0=off 1=on',
  `code` int(50) DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`std_id`, `name`, `contact`, `email`, `password`, `role`, `status`, `code`, `date`) VALUES
(1, 'admincheck', '03003626454', 'syedhilalaseel@gmail.com', '$2y$10$KDp9sWDOuSN4g1WbPeS8yeYSq74VVqi7uhZS6MVQLZV.hEUBpcscK', '1', '1', 0, '2022-09-08'),
(5, 'usercheck', '03303033303', 'syedhilalkhan64@gmail.com', '$2y$10$KAiz2RMWaBoIOPiR9XohmuuzncLI0TuB.OsfqUFhqOPVsz9MSq3YC', '0', '1', 0, '2022-09-11'),
(13, 'Dr Sohail Ahmed', '+1 (248) 703-3544', 'msohailahmed@yahoo.com', '$2y$10$eSqpBepavOsv2wTZP9vea.KMPQF69sqzmgCNRhUIfptqDKmHMLT2q', '1', '1', 742802, '2022-09-23'),
(14, 'Shehzad Bugti ', '03312739615', 'shehzadbugti2739@gmail.com', '$2y$10$TcVZqmAcSNLaF2wNG7p8lul6axf3Sgq1CYC0e.PgyviKksZf5ARVa', '0', '1', 0, '2022-09-24'),
(18, 'ADAISH LAL', '0343093970', 'adaish18@gmail.com', '$2y$10$n1ic7kWOAB3FPnrJ1lRgjeH0XziSsuwpORd9x2iXYr3dYROAk0Fk.', '0', '1', 0, '2022-09-30'),
(19, 'Aleeshba', '03130017988', 'alishbahshareef@gmail.com', '$2y$10$aqz5amC0ABi4y/F6rRQLKeinZo34PJgvFyCW6X8HKMbUA4Q1XJHAW', '0', '0', 0, '2023-02-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billinginfo`
--
ALTER TABLE `billinginfo`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `billusers`
--
ALTER TABLE `billusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `billusersheetname`
--
ALTER TABLE `billusersheetname`
  ADD PRIMARY KEY (`sheetname`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `billusersheets`
--
ALTER TABLE `billusersheets`
  ADD PRIMARY KEY (`billid`),
  ADD KEY `test` (`sheetname`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `patientinfo`
--
ALTER TABLE `patientinfo`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billinginfo`
--
ALTER TABLE `billinginfo`
  MODIFY `bill_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `billusers`
--
ALTER TABLE `billusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `billusersheets`
--
ALTER TABLE `billusersheets`
  MODIFY `billid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `patientinfo`
--
ALTER TABLE `patientinfo`
  MODIFY `patient_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billinginfo`
--
ALTER TABLE `billinginfo`
  ADD CONSTRAINT `billinginfo_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `users` (`std_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `billinginfo_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patientinfo` (`patient_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `billusersheetname`
--
ALTER TABLE `billusersheetname`
  ADD CONSTRAINT `billusersheetname_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `billusers` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `billusersheets`
--
ALTER TABLE `billusersheets`
  ADD CONSTRAINT `billusersheets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `billusers` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test` FOREIGN KEY (`sheetname`) REFERENCES `billusersheetname` (`sheetname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patientinfo`
--
ALTER TABLE `patientinfo`
  ADD CONSTRAINT `patientinfo_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `users` (`std_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
