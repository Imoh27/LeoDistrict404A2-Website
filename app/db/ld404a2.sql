-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 12:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ld404a2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblactivityareas`
--

CREATE TABLE `tblactivityareas` (
  `areasID` int(11) NOT NULL,
  `activityCatID` int(11) DEFAULT NULL,
  `areaName` varchar(50) NOT NULL,
  `areaDescription` mediumtext NOT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `isActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblactivitycategory`
--

CREATE TABLE `tblactivitycategory` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblclubpresidents`
--

CREATE TABLE `tblclubpresidents` (
  `presidentID` int(11) NOT NULL,
  `president` int(11) DEFAULT NULL,
  `clubID` int(11) DEFAULT NULL,
  `serviceYr` int(11) DEFAULT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblclubpresidents`
--

INSERT INTO `tblclubpresidents` (`presidentID`, `president`, `clubID`, `serviceYr`, `dateUpdated`, `updatedBy`, `isActive`) VALUES
(1, 1, 1, 1, '2023-06-16 16:03:31', 1, 1),
(2, 2, 2, 1, '2023-06-19 09:20:32', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblclubs`
--

CREATE TABLE `tblclubs` (
  `clubID` int(11) NOT NULL,
  `regionID` int(11) NOT NULL,
  `clubName` varchar(60) NOT NULL,
  `indexNo` varchar(10) DEFAULT NULL,
  `SponsorLions` varchar(60) NOT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblclubs`
--

INSERT INTO `tblclubs` (`clubID`, `regionID`, `clubName`, `indexNo`, `SponsorLions`, `dateUpdated`, `updatedBy`, `isActive`) VALUES
(1, 4, 'Calabar Paradise', '12345', 'Calabar Paradise', '2023-06-15 17:02:56', 1, 1),
(2, 4, 'Prestigious Tinapa', '12335', 'Calabar Tinapa', '2023-06-19 15:45:15', 1, 1),
(3, 4, 'Akpabuyo Isand', '16145', 'Akpabuyo Isand', '2023-06-15 17:04:14', 1, 1),
(4, 1, 'Abuja Unity', '13421', 'Abuja Unity', '2023-06-15 17:07:32', 1, 1),
(5, 4, 'Calabar Paradise', '12345', 'Calabar Paradise', '2023-06-15 17:02:56', 1, 1),
(6, 4, 'Prestigious Tinapa', '12335', 'Calabar Tinapa', '2023-06-15 17:03:29', 1, 1),
(7, 4, 'Akpabuyo Isand', '16145', 'Akpabuyo Isand', '2023-06-15 17:04:14', 1, 1),
(8, 1, 'Abuja Unity', '13421', 'Abuja Unity', '2023-06-15 17:07:32', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldistrictofficers`
--

CREATE TABLE `tbldistrictofficers` (
  `dOfficersID` int(11) NOT NULL,
  `dOfficesID` int(11) DEFAULT NULL,
  `memberID` int(11) DEFAULT NULL,
  `serviceYrID` int(11) DEFAULT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbldistrictoffices`
--

CREATE TABLE `tbldistrictoffices` (
  `dOfficesID` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `abbr` varchar(10) NOT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldistrictoffices`
--

INSERT INTO `tbldistrictoffices` (`dOfficesID`, `position`, `abbr`, `dateUpdated`, `updatedBy`, `isActive`) VALUES
(1, ' District President', 'DP', '2023-06-20 14:28:48', 1, 1),
(2, ' Immediate Past DP', 'IPDP', '2023-06-20 17:25:01', 1, 1),
(3, ' 1st Vice District President', 'FVDP', '2023-06-20 14:32:27', 1, 1),
(4, ' 2nd Vice District President', '2VDP', '2023-06-20 14:33:26', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldpsteam`
--

CREATE TABLE `tbldpsteam` (
  `teamID` int(11) NOT NULL,
  `memberName` varchar(60) NOT NULL,
  `dOfficesID` int(11) NOT NULL,
  `fbProfile` varchar(50) NOT NULL,
  `lnProfile` varchar(50) NOT NULL,
  `igProfile` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `serviceYrID` int(11) NOT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldpsteam`
--

INSERT INTO `tbldpsteam` (`teamID`, `memberName`, `dOfficesID`, `fbProfile`, `lnProfile`, `igProfile`, `foto`, `serviceYrID`, `dateUpdated`, `updatedBy`) VALUES
(1, 'Esther Esua', 2, 'bbakawu', 'bbakawu', 'bbakawu', '7bbd8e8a0995ddbbc872bc206661fe8e.jpeg', 1, '2023-06-20 17:53:14', 1),
(2, 'Ikoh Unoh', 1, 'bbakawu', 'bbakawu', 'bbakawu', '5cb045762ec3cfe9a11205ed20e23401.jpeg', 1, '2023-06-20 17:53:58', 1),
(3, 'Ekpeita Edet', 3, 'bbakawu', 'bbakawu', 'bbakawu', '8d015894e7c7115dab1fcaccaa04e53f.jpeg', 1, '2023-06-20 17:54:55', 1),
(4, 'Joyce Eduebuk', 4, 'bbakawu', 'bbakawu', 'bbakawu', '240bba13a2af431fa6ae586dc96f8dc3.jpeg', 1, '2023-06-20 17:55:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldpteam`
--

CREATE TABLE `tbldpteam` (
  `teamID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `dOfficesID` int(11) NOT NULL,
  `fbProfile` varchar(50) NOT NULL,
  `lnProfile` varchar(50) NOT NULL,
  `igProfile` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `serviceYrID` int(11) NOT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldpteam`
--

INSERT INTO `tbldpteam` (`teamID`, `memberID`, `dOfficesID`, `fbProfile`, `lnProfile`, `igProfile`, `foto`, `serviceYrID`, `dateUpdated`, `updatedBy`) VALUES
(1, 1, 1, 'bbakawu', 'bbakawu', 'bbakawu', '', 1, '2023-06-20 16:58:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbllga`
--

CREATE TABLE `tbllga` (
  `lgaID` int(11) NOT NULL,
  `stateID` int(11) DEFAULT NULL,
  `lgaName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbllga`
--

INSERT INTO `tbllga` (`lgaID`, `stateID`, `lgaName`) VALUES
(1, 1, 'Aba North'),
(2, 1, 'Aba South'),
(3, 1, 'Arochukwu'),
(4, 1, 'Bende'),
(5, 1, 'Ikwuano'),
(6, 1, 'Isiala Ngwa North'),
(7, 1, 'Isiala Ngwa South'),
(8, 1, 'Isuikwuato'),
(9, 1, 'Obi Ngwa'),
(10, 1, 'Ohafia'),
(11, 1, 'Osisioma'),
(12, 1, 'Ugwunagbo'),
(13, 1, 'Ukwa East'),
(14, 1, 'Ukwa West'),
(15, 1, 'Umuahia North'),
(16, 1, 'Umuahia South'),
(17, 1, 'Umu Nneochi'),
(18, 2, 'Demsa'),
(19, 2, 'Fufure'),
(20, 2, 'Ganye'),
(21, 2, 'Gayuk'),
(22, 2, 'Gombi'),
(23, 2, 'Grie'),
(24, 2, 'Hong'),
(25, 2, 'Jada'),
(26, 2, 'Larmurde'),
(27, 2, 'Madagali'),
(28, 2, 'Maiha'),
(29, 2, 'Mayo Belwa'),
(30, 2, 'Michika'),
(31, 2, 'Mubi North'),
(32, 2, 'Mubi South'),
(33, 2, 'Numan'),
(34, 2, 'Shelleng'),
(35, 2, 'Song'),
(36, 2, 'Toungo'),
(37, 2, 'Yola North'),
(38, 2, 'Yola South'),
(39, 3, 'Abak'),
(40, 3, 'Eastern Obolo'),
(41, 3, 'Eket'),
(42, 3, 'Esit Eket'),
(43, 3, 'Essien Udim'),
(44, 3, 'Etim Ekpo'),
(45, 3, 'Etinan'),
(46, 3, 'Ibeno'),
(47, 3, 'Ibesikpo Asutan'),
(48, 3, 'Ibiono-Ibom'),
(49, 3, 'Ika'),
(50, 3, 'Ikono'),
(51, 3, 'Ikot Abasi'),
(52, 3, 'Ikot Ekpene'),
(53, 3, 'Ini'),
(54, 3, 'Itu'),
(55, 3, 'Mbo'),
(56, 3, 'Mkpat-Enin'),
(57, 3, 'Nsit-Atai'),
(58, 3, 'Nsit-Ibom'),
(59, 3, 'Nsit-Ubium'),
(60, 3, 'Obot Akara'),
(61, 3, 'Okobo'),
(62, 3, 'Onna'),
(63, 3, 'Oron'),
(64, 3, 'Oruk Anam'),
(65, 3, 'Udung-Uko'),
(66, 3, 'Ukanafun'),
(67, 3, 'Uruan'),
(68, 3, 'Urue-Offong/Oruko'),
(69, 3, 'Uyo'),
(70, 4, 'Aguata'),
(71, 4, 'Anambra East'),
(72, 4, 'Anambra West'),
(73, 4, 'Anaocha'),
(74, 4, 'Awka North'),
(75, 4, 'Awka South'),
(76, 4, 'Ayamelum'),
(77, 4, 'Dunukofia'),
(78, 4, 'Ekwusigo'),
(79, 4, 'Idemili North'),
(80, 4, 'Idemili South'),
(81, 4, 'Ihiala'),
(82, 4, 'Njikoka'),
(83, 4, 'Nnewi North'),
(84, 4, 'Nnewi South'),
(85, 4, 'Ogbaru'),
(86, 4, 'Onitsha North'),
(87, 4, 'Onitsha South'),
(88, 4, 'Orumba North'),
(89, 4, 'Orumba South'),
(90, 4, 'Oyi'),
(91, 5, 'Alkaleri'),
(92, 5, 'Bauchi'),
(93, 5, 'Bogoro'),
(94, 5, 'Damban'),
(95, 5, 'Darazo'),
(96, 5, 'Dass'),
(97, 5, 'Gamawa'),
(98, 5, 'Ganjuwa'),
(99, 5, 'Giade'),
(100, 5, 'Itas/Gadau'),
(101, 5, 'Jama\'are'),
(102, 5, 'Katagum'),
(103, 5, 'Kirfi'),
(104, 5, 'Misau'),
(105, 5, 'Ningi'),
(106, 5, 'Shira'),
(107, 5, 'Tafawa Balewa'),
(108, 5, 'Toro'),
(109, 5, 'Warji'),
(110, 5, 'Zaki'),
(111, 6, 'Brass'),
(112, 6, 'Ekeremor'),
(113, 6, 'Kolokuma/Opokuma'),
(114, 6, 'Nembe'),
(115, 6, 'Ogbia'),
(116, 6, 'Sagbama'),
(117, 6, 'Southern Ijaw'),
(118, 6, 'Yenagoa'),
(119, 7, 'Agatu'),
(120, 7, 'Apa'),
(121, 7, 'Ado'),
(122, 7, 'Buruku'),
(123, 7, 'Gboko'),
(124, 7, 'Guma'),
(125, 7, 'Gwer East'),
(126, 7, 'Gwer West'),
(127, 7, 'Katsina-Ala'),
(128, 7, 'Konshisha'),
(129, 7, 'Kwande'),
(130, 7, 'Logo'),
(131, 7, 'Makurdi'),
(132, 7, 'Obi'),
(133, 7, 'Ogbadibo'),
(134, 7, 'Ohimini'),
(135, 7, 'Oju'),
(136, 7, 'Okpokwu'),
(137, 7, 'Oturkpo'),
(138, 7, 'Tarka'),
(139, 7, 'Ukum'),
(140, 7, 'Ushongo'),
(141, 7, 'Vandeikya'),
(142, 8, 'Abadam'),
(143, 8, 'Askira/Uba'),
(144, 8, 'Bama'),
(145, 8, 'Bayo'),
(146, 8, 'Biu'),
(147, 8, 'Chibok'),
(148, 8, 'Damboa'),
(149, 8, 'Dikwa'),
(150, 8, 'Gubio'),
(151, 8, 'Guzamala'),
(152, 8, 'Gwoza'),
(153, 8, 'Hawul'),
(154, 8, 'Jere'),
(155, 8, 'Kaga'),
(156, 8, 'Kala/Balge'),
(157, 8, 'Konduga'),
(158, 8, 'Kukawa'),
(159, 8, 'Kwaya Kusar'),
(160, 8, 'Mafa'),
(161, 8, 'Magumeri'),
(162, 8, 'Maiduguri'),
(163, 8, 'Marte'),
(164, 8, 'Mobbar'),
(165, 8, 'Monguno'),
(166, 8, 'Ngala'),
(167, 8, 'Nganzai'),
(168, 8, 'Shani'),
(169, 9, 'Abi'),
(170, 9, 'Akamkpa'),
(171, 9, 'Akpabuyo'),
(172, 9, 'Bakassi'),
(173, 9, 'Bekwarra'),
(174, 9, 'Biase'),
(175, 9, 'Boki'),
(176, 9, 'Calabar Municipal'),
(177, 9, 'Calabar South'),
(178, 9, 'Etung'),
(179, 9, 'Ikom'),
(180, 9, 'Obanliku'),
(181, 9, 'Obubra'),
(182, 9, 'Obudu'),
(183, 9, 'Odukpani'),
(184, 9, 'Ogoja'),
(185, 9, 'Yakuur'),
(186, 9, 'Yala'),
(187, 10, 'Aniocha North'),
(188, 10, 'Aniocha South'),
(189, 10, 'Bomadi'),
(190, 10, 'Burutu'),
(191, 10, 'Ethiope East'),
(192, 10, 'Ethiope West'),
(193, 10, 'Ika North East'),
(194, 10, 'Ika South'),
(195, 10, 'Isoko North'),
(196, 10, 'Isoko South'),
(197, 10, 'Ndokwa East'),
(198, 10, 'Ndokwa West'),
(199, 10, 'Okpe'),
(200, 10, 'Oshimili North'),
(201, 10, 'Oshimili South'),
(202, 10, 'Patani'),
(203, 10, 'Sapele, Delta'),
(204, 10, 'Udu'),
(205, 10, 'Ughelli North'),
(206, 10, 'Ughelli South'),
(207, 10, 'Ukwuani'),
(208, 10, 'Uvwie'),
(209, 10, 'Warri North'),
(210, 10, 'Warri South'),
(211, 10, 'Warri South West'),
(212, 11, 'Abakaliki'),
(213, 11, 'Afikpo North'),
(214, 11, 'Afikpo South'),
(215, 11, 'Ebonyi'),
(216, 11, 'Ezza North'),
(217, 11, 'Ezza South'),
(218, 11, 'Ikwo'),
(219, 11, 'Ishielu'),
(220, 11, 'Ivo'),
(221, 11, 'Izzi'),
(222, 11, 'Ohaozara'),
(223, 11, 'Ohaukwu'),
(224, 11, 'Onicha'),
(225, 12, 'Akoko-Edo'),
(226, 12, 'Egor'),
(227, 12, 'Esan Central'),
(228, 12, 'Esan North-East'),
(229, 12, 'Esan South-East'),
(230, 12, 'Esan West'),
(231, 12, 'Etsako Central'),
(232, 12, 'Etsako East'),
(233, 12, 'Etsako West'),
(234, 12, 'Igueben'),
(235, 12, 'Ikpoba Okha'),
(236, 12, 'Orhionmwon'),
(237, 12, 'Oredo'),
(238, 12, 'Ovia North-East'),
(239, 12, 'Ovia South-West'),
(240, 12, 'Owan East'),
(241, 12, 'Owan West'),
(242, 12, 'Uhunmwonde'),
(243, 13, 'Ado Ekiti'),
(244, 13, 'Efon'),
(245, 13, 'Ekiti East'),
(246, 13, 'Ekiti South-West'),
(247, 13, 'Ekiti West'),
(248, 13, 'Emure'),
(249, 13, 'Gbonyin'),
(250, 13, 'Ido Osi'),
(251, 13, 'Ijero'),
(252, 13, 'Ikere'),
(253, 13, 'Ikole'),
(254, 13, 'Ilejemeje'),
(255, 13, 'Irepodun/Ifelodun'),
(256, 13, 'Ise/Orun'),
(257, 13, 'Moba'),
(258, 13, 'Oye'),
(259, 14, 'Aninri'),
(260, 14, 'Awgu'),
(261, 14, 'Enugu East'),
(262, 14, 'Enugu North'),
(263, 14, 'Enugu South'),
(264, 14, 'Ezeagu'),
(265, 14, 'Igbo Etiti'),
(266, 14, 'Igbo Eze North'),
(267, 14, 'Igbo Eze South'),
(268, 14, 'Isi Uzo'),
(269, 14, 'Nkanu East'),
(270, 14, 'Nkanu West'),
(271, 14, 'Nsukka'),
(272, 14, 'Oji River'),
(273, 14, 'Udenu'),
(274, 14, 'Udi'),
(275, 14, 'Uzo Uwani'),
(276, 15, 'Abaji'),
(277, 15, 'Bwari'),
(278, 15, 'Gwagwalada'),
(279, 15, 'Kuje'),
(280, 15, 'Kwali'),
(281, 15, 'Municipal Area Council'),
(282, 16, 'Akko'),
(283, 16, 'Balanga'),
(284, 16, 'Billiri'),
(285, 16, 'Dukku'),
(286, 16, 'Funakaye'),
(287, 16, 'Gombe'),
(288, 16, 'Kaltungo'),
(289, 16, 'Kwami'),
(290, 16, 'Nafada'),
(291, 16, 'Shongom'),
(292, 16, 'Yamaltu/Deba'),
(293, 17, 'Aboh Mbaise'),
(294, 17, 'Ahiazu Mbaise'),
(295, 17, 'Ehime Mbano'),
(296, 17, 'Ezinihitte'),
(297, 17, 'Ideato North'),
(298, 17, 'Ideato South'),
(299, 17, 'Ihitte/Uboma'),
(300, 17, 'Ikeduru'),
(301, 17, 'Isiala Mbano'),
(302, 17, 'Isu'),
(303, 17, 'Mbaitoli'),
(304, 17, 'Ngor Okpala'),
(305, 17, 'Njaba'),
(306, 17, 'Nkwerre'),
(307, 17, 'Nwangele'),
(308, 17, 'Obowo'),
(309, 17, 'Oguta'),
(310, 17, 'Ohaji/Egbema'),
(311, 17, 'Okigwe'),
(312, 17, 'Orlu'),
(313, 17, 'Orsu'),
(314, 17, 'Oru East'),
(315, 17, 'Oru West'),
(316, 17, 'Owerri Municipal'),
(317, 17, 'Owerri North'),
(318, 17, 'Owerri West'),
(319, 17, 'Unuimo'),
(320, 18, 'Auyo'),
(321, 18, 'Babura'),
(322, 18, 'Biriniwa'),
(323, 18, 'Birnin Kudu'),
(324, 18, 'Buji'),
(325, 18, 'Dutse'),
(326, 18, 'Gagarawa'),
(327, 18, 'Garki'),
(328, 18, 'Gumel'),
(329, 18, 'Guri'),
(330, 18, 'Gwaram'),
(331, 18, 'Gwiwa'),
(332, 18, 'Hadejia'),
(333, 18, 'Jahun'),
(334, 18, 'Kafin Hausa'),
(335, 18, 'Kazaure'),
(336, 18, 'Kiri Kasama'),
(337, 18, 'Kiyawa'),
(338, 18, 'Kaugama'),
(339, 18, 'Maigatari'),
(340, 18, 'Malam Madori'),
(341, 18, 'Miga'),
(342, 18, 'Ringim'),
(343, 18, 'Roni'),
(344, 18, 'Sule Tankarkar'),
(345, 18, 'Taura'),
(346, 18, 'Yankwashi'),
(347, 19, 'Birnin Gwari'),
(348, 19, 'Chikun'),
(349, 19, 'Giwa'),
(350, 19, 'Igabi'),
(351, 19, 'Ikara'),
(352, 19, 'Jaba'),
(353, 19, 'Jema\'a'),
(354, 19, 'Kachia'),
(355, 19, 'Kaduna North'),
(356, 19, 'Kaduna South'),
(357, 19, 'Kagarko'),
(358, 19, 'Kajuru'),
(359, 19, 'Kaura'),
(360, 19, 'Kauru'),
(361, 19, 'Kubau'),
(362, 19, 'Kudan'),
(363, 19, 'Lere'),
(364, 19, 'Makarfi'),
(365, 19, 'Sabon Gari'),
(366, 19, 'Sanga'),
(367, 19, 'Soba'),
(368, 19, 'Zangon Kataf'),
(369, 19, 'Zaria'),
(370, 20, 'Ajingi'),
(371, 20, 'Albasu'),
(372, 20, 'Bagwai'),
(373, 20, 'Bebeji'),
(374, 20, 'Bichi'),
(375, 20, 'Bunkure'),
(376, 20, 'Dala'),
(377, 20, 'Dambatta'),
(378, 20, 'Dawakin Kudu'),
(379, 20, 'Dawakin Tofa'),
(380, 20, 'Doguwa'),
(381, 20, 'Fagge'),
(382, 20, 'Gabasawa'),
(383, 20, 'Garko'),
(384, 20, 'Garun Mallam'),
(385, 20, 'Gaya'),
(386, 20, 'Gezawa'),
(387, 20, 'Gwale'),
(388, 20, 'Gwarzo'),
(389, 20, 'Kabo'),
(390, 20, 'Kano Municipal'),
(391, 20, 'Karaye'),
(392, 20, 'Kibiya'),
(393, 20, 'Kiru'),
(394, 20, 'Kumbotso'),
(395, 20, 'Kunchi'),
(396, 20, 'Kura'),
(397, 20, 'Madobi'),
(398, 20, 'Makoda'),
(399, 20, 'Minjibir'),
(400, 20, 'Nasarawa'),
(401, 20, 'Rano'),
(402, 20, 'Rimin Gado'),
(403, 20, 'Rogo'),
(404, 20, 'Shanono'),
(405, 20, 'Sumaila'),
(406, 20, 'Takai'),
(407, 20, 'Tarauni'),
(408, 20, 'Tofa'),
(409, 20, 'Tsanyawa'),
(410, 20, 'Tudun Wada'),
(411, 20, 'Ungogo'),
(412, 20, 'Warawa'),
(413, 20, 'Wudil'),
(414, 21, 'Bakori'),
(415, 21, 'Batagarawa'),
(416, 21, 'Batsari'),
(417, 21, 'Baure'),
(418, 21, 'Bindawa'),
(419, 21, 'Charanchi'),
(420, 21, 'Dandume'),
(421, 21, 'Danja'),
(422, 21, 'Dan Musa'),
(423, 21, 'Daura'),
(424, 21, 'Dutsi'),
(425, 21, 'Dutsin Ma'),
(426, 21, 'Faskari'),
(427, 21, 'Funtua'),
(428, 21, 'Ingawa'),
(429, 21, 'Jibia'),
(430, 21, 'Kafur'),
(431, 21, 'Kaita'),
(432, 21, 'Kankara'),
(433, 21, 'Kankia'),
(434, 21, 'Katsina'),
(435, 21, 'Kurfi'),
(436, 21, 'Kusada'),
(437, 21, 'Mai\'Adua'),
(438, 21, 'Malumfashi'),
(439, 21, 'Mani'),
(440, 21, 'Mashi'),
(441, 21, 'Matazu'),
(442, 21, 'Musawa'),
(443, 21, 'Rimi'),
(444, 21, 'Sabuwa'),
(445, 21, 'Safana'),
(446, 21, 'Sandamu'),
(447, 21, 'Zango'),
(448, 22, 'Aleiro'),
(449, 22, 'Arewa Dandi'),
(450, 22, 'Argungu'),
(451, 22, 'Augie'),
(452, 22, 'Bagudo'),
(453, 22, 'Birnin Kebbi'),
(454, 22, 'Bunza'),
(455, 22, 'Dandi'),
(456, 22, 'Fakai'),
(457, 22, 'Gwandu'),
(458, 22, 'Jega'),
(459, 22, 'Kalgo'),
(460, 22, 'Koko/Besse'),
(461, 22, 'Maiyama'),
(462, 22, 'Ngaski'),
(463, 22, 'Sakaba'),
(464, 22, 'Shanga'),
(465, 22, 'Suru'),
(466, 22, 'Wasagu/Danko'),
(467, 22, 'Yauri'),
(468, 22, 'Zuru'),
(469, 23, 'Adavi'),
(470, 23, 'Ajaokuta'),
(471, 23, 'Ankpa'),
(472, 23, 'Bassa'),
(473, 23, 'Dekina'),
(474, 23, 'Ibaji'),
(475, 23, 'Idah'),
(476, 23, 'Igalamela Odolu'),
(477, 23, 'Ijumu'),
(478, 23, 'Kabba/Bunu'),
(479, 23, 'Kogi'),
(480, 23, 'Lokoja'),
(481, 23, 'Mopa Muro'),
(482, 23, 'Ofu'),
(483, 23, 'Ogori/Magongo'),
(484, 23, 'Okehi'),
(485, 23, 'Okene'),
(486, 23, 'Olamaboro'),
(487, 23, 'Omala'),
(488, 23, 'Yagba East'),
(489, 23, 'Yagba West'),
(490, 24, 'Asa'),
(491, 24, 'Baruten'),
(492, 24, 'Edu'),
(493, 24, 'Ekiti, Kwara State'),
(494, 24, 'Ifelodun'),
(495, 24, 'Ilorin East'),
(496, 24, 'Ilorin South'),
(497, 24, 'Ilorin West'),
(498, 24, 'Irepodun'),
(499, 24, 'Isin'),
(500, 24, 'Kaiama'),
(501, 24, 'Moro'),
(502, 24, 'Offa'),
(503, 24, 'Oke Ero'),
(504, 24, 'Oyun'),
(505, 24, 'Pategi'),
(506, 25, 'Agege'),
(507, 25, 'Ajeromi-Ifelodun'),
(508, 25, 'Alimosho'),
(509, 25, 'Amuwo-Odofin'),
(510, 25, 'Apapa'),
(511, 25, 'Badagry'),
(512, 25, 'Epe'),
(513, 25, 'Eti Osa'),
(514, 25, 'Ibeju-Lekki'),
(515, 25, 'Ifako-Ijaiye'),
(516, 25, 'Ikeja'),
(517, 25, 'Ikorodu'),
(518, 25, 'Kosofe'),
(519, 25, 'Lagos Island'),
(520, 25, 'Lagos Mainland'),
(521, 25, 'Mushin'),
(522, 25, 'Ojo'),
(523, 25, 'Oshodi-Isolo'),
(524, 25, 'Shomolu'),
(525, 25, 'Surulere, Lagos State'),
(526, 26, 'Akwanga'),
(527, 26, 'Awe'),
(528, 26, 'Doma'),
(529, 26, 'Karu'),
(530, 26, 'Keana'),
(531, 26, 'Keffi'),
(532, 26, 'Kokona'),
(533, 26, 'Lafia'),
(534, 26, 'Nasarawa'),
(535, 26, 'Nasarawa Egon'),
(536, 26, 'Obi'),
(537, 26, 'Toto'),
(538, 26, 'Wamba'),
(539, 27, 'Agaie'),
(540, 27, 'Agwara'),
(541, 27, 'Bida'),
(542, 27, 'Borgu'),
(543, 27, 'Bosso'),
(544, 27, 'Chanchaga'),
(545, 27, 'Edati'),
(546, 27, 'Gbako'),
(547, 27, 'Gurara'),
(548, 27, 'Katcha'),
(549, 27, 'Kontagora'),
(550, 27, 'Lapai'),
(551, 27, 'Lavun'),
(552, 27, 'Magama'),
(553, 27, 'Mariga'),
(554, 27, 'Mashegu'),
(555, 27, 'Mokwa'),
(556, 27, 'Moya'),
(557, 27, 'Paikoro'),
(558, 27, 'Rafi'),
(559, 27, 'Rijau'),
(560, 27, 'Shiroro'),
(561, 27, 'Suleja'),
(562, 27, 'Tafa'),
(563, 27, 'Wushishi'),
(564, 28, 'Abeokuta North'),
(565, 28, 'Abeokuta South'),
(566, 28, 'Ado-Odo/Ota'),
(567, 28, 'Egbado North'),
(568, 28, 'Egbado South'),
(569, 28, 'Ewekoro'),
(570, 28, 'Ifo'),
(571, 28, 'Ijebu East'),
(572, 28, 'Ijebu North'),
(573, 28, 'Ijebu North East'),
(574, 28, 'Ijebu Ode'),
(575, 28, 'Ikenne'),
(576, 28, 'Imeko Afon'),
(577, 28, 'Ipokia'),
(578, 28, 'Obafemi Owode'),
(579, 28, 'Odeda'),
(580, 28, 'Odogbolu'),
(581, 28, 'Ogun Waterside'),
(582, 28, 'Remo North'),
(583, 28, 'Shagamu'),
(584, 29, 'Akoko North-East'),
(585, 29, 'Akoko North-West'),
(586, 29, 'Akoko South-West'),
(587, 29, 'Akoko South-East'),
(588, 29, 'Akure North'),
(589, 29, 'Akure South'),
(590, 29, 'Ese Odo'),
(591, 29, 'Idanre'),
(592, 29, 'Ifedore'),
(593, 29, 'Ilaje'),
(594, 29, 'Ile Oluji/Okeigbo'),
(595, 29, 'Irele'),
(596, 29, 'Odigbo'),
(597, 29, 'Okitipupa'),
(598, 29, 'Ondo East'),
(599, 29, 'Ondo West'),
(600, 29, 'Ose'),
(601, 29, 'Owo'),
(602, 30, 'Atakunmosa East'),
(603, 30, 'Atakunmosa West'),
(604, 30, 'Aiyedaade'),
(605, 30, 'Aiyedire'),
(606, 30, 'Boluwaduro'),
(607, 30, 'Boripe'),
(608, 30, 'Ede North'),
(609, 30, 'Ede South'),
(610, 30, 'Ife Central'),
(611, 30, 'Ife East'),
(612, 30, 'Ife North'),
(613, 30, 'Ife South'),
(614, 30, 'Egbedore'),
(615, 30, 'Ejigbo'),
(616, 30, 'Ifedayo'),
(617, 30, 'Ifelodun'),
(618, 30, 'Ila'),
(619, 30, 'Ilesa East'),
(620, 30, 'Ilesa West'),
(621, 30, 'Irepodun'),
(622, 30, 'Irewole'),
(623, 30, 'Isokan'),
(624, 30, 'Iwo'),
(625, 30, 'Obokun'),
(626, 30, 'Odo Otin'),
(627, 30, 'Ola Oluwa'),
(628, 30, 'Olorunda'),
(629, 30, 'Oriade'),
(630, 30, 'Orolu'),
(631, 30, 'Osogbo'),
(632, 31, 'Afijio'),
(633, 31, 'Akinyele'),
(634, 31, 'Atiba'),
(635, 31, 'Atisbo'),
(636, 31, 'Egbeda'),
(637, 31, 'Ibadan North'),
(638, 31, 'Ibadan North-East'),
(639, 31, 'Ibadan North-West'),
(640, 31, 'Ibadan South-East'),
(641, 31, 'Ibadan South-West'),
(642, 31, 'Ibarapa Central'),
(643, 31, 'Ibarapa East'),
(644, 31, 'Ibarapa North'),
(645, 31, 'Ido'),
(646, 31, 'Irepo'),
(647, 31, 'Iseyin'),
(648, 31, 'Itesiwaju'),
(649, 31, 'Iwajowa'),
(650, 31, 'Kajola'),
(651, 31, 'Lagelu'),
(652, 31, 'Ogbomosho North'),
(653, 31, 'Ogbomosho South'),
(654, 31, 'Ogo Oluwa'),
(655, 31, 'Olorunsogo'),
(656, 31, 'Oluyole'),
(657, 31, 'Ona Ara'),
(658, 31, 'Orelope'),
(659, 31, 'Ori Ire'),
(660, 31, 'Oyo'),
(661, 31, 'Oyo East'),
(662, 31, 'Saki East'),
(663, 31, 'Saki West'),
(664, 31, 'Surulere, Oyo State'),
(665, 32, 'Bokkos'),
(666, 32, 'Barkin Ladi'),
(667, 32, 'Bassa'),
(668, 32, 'Jos East'),
(669, 32, 'Jos North'),
(670, 32, 'Jos South'),
(671, 32, 'Kanam'),
(672, 32, 'Kanke'),
(673, 32, 'Langtang South'),
(674, 32, 'Langtang North'),
(675, 32, 'Mangu'),
(676, 32, 'Mikang'),
(677, 32, 'Pankshin'),
(678, 32, 'Qua\'an Pan'),
(679, 32, 'Riyom'),
(680, 32, 'Shendam'),
(681, 32, 'Wase'),
(682, 33, 'Abua/Odual'),
(683, 33, 'Ahoada East'),
(684, 33, 'Ahoada West'),
(685, 33, 'Akuku-Toru'),
(686, 33, 'Andoni'),
(687, 33, 'Asari-Toru'),
(688, 33, 'Bonny'),
(689, 33, 'Degema'),
(690, 33, 'Eleme'),
(691, 33, 'Emuoha'),
(692, 33, 'Etche'),
(693, 33, 'Gokana'),
(694, 33, 'Ikwerre'),
(695, 33, 'Khana'),
(696, 33, 'Obio/Akpor'),
(697, 33, 'Ogba/Egbema/Ndoni'),
(698, 33, 'Ogu/Bolo'),
(699, 33, 'Okrika'),
(700, 33, 'Omuma'),
(701, 33, 'Opobo/Nkoro'),
(702, 33, 'Oyigbo'),
(703, 33, 'Port Harcourt'),
(704, 33, 'Tai'),
(705, 34, 'Binji'),
(706, 34, 'Bodinga'),
(707, 34, 'Dange Shuni'),
(708, 34, 'Gada'),
(709, 34, 'Goronyo'),
(710, 34, 'Gudu'),
(711, 34, 'Gwadabawa'),
(712, 34, 'Illela'),
(713, 34, 'Isa'),
(714, 34, 'Kebbe'),
(715, 34, 'Kware'),
(716, 34, 'Rabah'),
(717, 34, 'Sabon Birni'),
(718, 34, 'Shagari'),
(719, 34, 'Silame'),
(720, 34, 'Sokoto North'),
(721, 34, 'Sokoto South'),
(722, 34, 'Tambuwal'),
(723, 34, 'Tangaza'),
(724, 34, 'Tureta'),
(725, 34, 'Wamako'),
(726, 34, 'Wurno'),
(727, 34, 'Yabo'),
(728, 35, 'Ardo Kola'),
(729, 35, 'Bali'),
(730, 35, 'Donga'),
(731, 35, 'Gashaka'),
(732, 35, 'Gassol'),
(733, 35, 'Ibi'),
(734, 35, 'Jalingo'),
(735, 35, 'Karim Lamido'),
(736, 35, 'Kumi'),
(737, 35, 'Lau'),
(738, 35, 'Sardauna'),
(739, 35, 'Takum'),
(740, 35, 'Ussa'),
(741, 35, 'Wukari'),
(742, 35, 'Yorro'),
(743, 35, 'Zing'),
(744, 36, 'Bade'),
(745, 36, 'Bursari'),
(746, 36, 'Damaturu'),
(747, 36, 'Fika'),
(748, 36, 'Fune'),
(749, 36, 'Geidam'),
(750, 36, 'Gujba'),
(751, 36, 'Gulani'),
(752, 36, 'Jakusko'),
(753, 36, 'Karasuwa'),
(754, 36, 'Machina'),
(755, 36, 'Nangere'),
(756, 36, 'Nguru'),
(757, 36, 'Potiskum'),
(758, 36, 'Tarmuwa'),
(759, 36, 'Yunusari'),
(760, 36, 'Yusufari'),
(761, 37, 'Anka'),
(762, 37, 'Bakura'),
(763, 37, 'Birnin Magaji/Kiyaw'),
(764, 37, 'Bukkuyum'),
(765, 37, 'Bungudu'),
(766, 37, 'Gummi'),
(767, 37, 'Gusau'),
(768, 37, 'Kaura Namoda'),
(769, 37, 'Maradun'),
(770, 37, 'Maru'),
(771, 37, 'Shinkafi'),
(772, 37, 'Talata Mafara'),
(773, 37, 'Chafe'),
(774, 37, 'Zurmi');

-- --------------------------------------------------------

--
-- Table structure for table `tblmembers`
--

CREATE TABLE `tblmembers` (
  `memberID` int(11) NOT NULL,
  `clubID` int(11) DEFAULT NULL,
  `regionID` int(11) DEFAULT NULL,
  `membershipNo` varchar(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `middleName` varchar(60) DEFAULT NULL,
  `memberEmail` varchar(60) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `phone1` varchar(12) NOT NULL,
  `phone2` varchar(12) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `maritalStatus` varchar(30) NOT NULL,
  `occupation` varchar(40) NOT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `stateOfOrigin` int(11) NOT NULL,
  `lgaOfOrigin` int(11) NOT NULL,
  `memberSince` varchar(5) NOT NULL,
  `dob` date NOT NULL,
  `memberPhoto` varchar(255) NOT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmembers`
--

INSERT INTO `tblmembers` (`memberID`, `clubID`, `regionID`, `membershipNo`, `firstName`, `lastName`, `middleName`, `memberEmail`, `gender`, `phone1`, `phone2`, `address`, `maritalStatus`, `occupation`, `city`, `state`, `stateOfOrigin`, `lgaOfOrigin`, `memberSince`, `dob`, `memberPhoto`, `dateUpdated`, `updatedBy`, `isActive`) VALUES
(1, 1, 4, '5353040', 'Benjamin', 'Akawu', '', 'akawuben@gmail.com', 'Male', '08133314846', '09069351146', '11 Bassey Street ', 'Single', 'Business', 'Calabar', 9, 9, 182, ' 2019', '1996-04-21', 'f48fc3e869a4c26811dad2449dd563f8.jpg', '2023-06-15 20:22:35', 1, 1),
(2, 2, 4, '5352040', 'MIchael', 'Okon', '', 'mikeokon@gmail.com', 'Male', '08144640312', '09069351146', 'someWhere in Calabar', 'Single', 'Student', 'Calabar', 9, 9, 171, ' 2016', '1994-01-13', 'edf8c765c54d669360bbe30274480fa5.jpg', '2023-06-19 09:19:52', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpdp`
--

CREATE TABLE `tblpdp` (
  `pdpID` int(11) NOT NULL,
  `fullName` varchar(60) NOT NULL,
  `serviceSlogan` varchar(50) DEFAULT NULL,
  `serviceYR` varchar(15) NOT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE `tblpost` (
  `postID` int(11) NOT NULL,
  `postCatID` int(11) DEFAULT NULL,
  `postTitle` varchar(100) NOT NULL,
  `postDetails` longtext NOT NULL,
  `postURL` mediumtext DEFAULT NULL,
  `postPhoto` varchar(250) DEFAULT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `isActive` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpostcategory`
--

CREATE TABLE `tblpostcategory` (
  `postCatID` int(11) NOT NULL,
  `postCategory` varchar(100) NOT NULL,
  `CatDescription` longtext NOT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `isActive` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblregion`
--

CREATE TABLE `tblregion` (
  `regionID` int(11) NOT NULL,
  `region` varchar(20) NOT NULL,
  `dateUpdated` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedBy` int(11) NOT NULL,
  `isActive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblregion`
--

INSERT INTO `tblregion` (`regionID`, `region`, `dateUpdated`, `updatedBy`, `isActive`) VALUES
(1, 'One', '2023-06-15 07:51:25', 1, 1),
(2, 'Two', '2023-06-15 08:57:51', 1, 1),
(3, 'Three', '2023-06-15 08:57:55', 1, 1),
(4, 'Four', '2023-06-15 08:58:04', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblregiondirector`
--

CREATE TABLE `tblregiondirector` (
  `regiondirID` int(11) NOT NULL,
  `regionID` int(11) DEFAULT NULL,
  `memberID` int(11) DEFAULT NULL,
  `serviceYrID` int(11) DEFAULT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblregiondirector`
--

INSERT INTO `tblregiondirector` (`regiondirID`, `regionID`, `memberID`, `serviceYrID`, `dateUpdated`, `updatedBy`, `isActive`) VALUES
(1, 4, 1, 1, '2023-06-16 10:55:50', 1, 1),
(2, 4, 1, 1, '2023-06-16 10:55:50', 1, 1),
(3, 4, 1, 1, '2023-06-16 10:55:50', 1, 1),
(4, 4, 1, 1, '2023-06-16 10:55:50', 1, 1),
(5, 4, 1, 1, '2023-06-16 10:55:50', 1, 1),
(6, 4, 1, 1, '2023-06-16 10:55:50', 1, 1),
(7, 4, 1, 1, '2023-06-16 10:55:50', 1, 1),
(8, 4, 1, 1, '2023-06-16 10:55:50', 1, 1),
(9, 4, 1, 1, '2023-06-16 10:55:50', 1, 1),
(10, 4, 1, 1, '2023-06-16 10:55:50', 1, 1),
(11, 4, 1, 1, '2023-06-16 10:55:50', 1, 1),
(12, 4, 1, 1, '2023-06-16 10:55:50', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblreport`
--

CREATE TABLE `tblreport` (
  `reportID` int(11) NOT NULL,
  `clubID` int(11) DEFAULT NULL,
  `areasID` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `Description` longtext NOT NULL,
  `reportPhoto` varchar(100) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `stopDate` date DEFAULT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblserviceyr`
--

CREATE TABLE `tblserviceyr` (
  `serviceYrID` int(11) NOT NULL,
  `serviceYr` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `stop_date` date NOT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblserviceyr`
--

INSERT INTO `tblserviceyr` (`serviceYrID`, `serviceYr`, `start_date`, `stop_date`, `dateUpdated`, `updatedBy`, `isActive`) VALUES
(1, '2023/2024', '2023-07-01', '2024-06-30', '2023-06-15 15:06:18', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstates`
--

CREATE TABLE `tblstates` (
  `stateID` int(11) NOT NULL,
  `stateName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstates`
--

INSERT INTO `tblstates` (`stateID`, `stateName`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'FCT'),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi'),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nasarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `userID` int(11) NOT NULL,
  `loginID` varchar(30) NOT NULL,
  `loginPWD` varchar(10) NOT NULL,
  `dateUpdated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`userID`, `loginID`, `loginPWD`, `dateUpdated`) VALUES
(1, 'admin', 'admin', '2023-06-15 12:00:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblactivityareas`
--
ALTER TABLE `tblactivityareas`
  ADD PRIMARY KEY (`areasID`),
  ADD KEY `updatedBy` (`updatedBy`),
  ADD KEY `activityCatID` (`activityCatID`);

--
-- Indexes for table `tblactivitycategory`
--
ALTER TABLE `tblactivitycategory`
  ADD PRIMARY KEY (`categoryID`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `tblclubpresidents`
--
ALTER TABLE `tblclubpresidents`
  ADD PRIMARY KEY (`presidentID`),
  ADD KEY `president` (`president`),
  ADD KEY `clubID` (`clubID`),
  ADD KEY `serviceYr` (`serviceYr`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `tblclubs`
--
ALTER TABLE `tblclubs`
  ADD PRIMARY KEY (`clubID`),
  ADD KEY `regionID` (`regionID`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `tbldistrictofficers`
--
ALTER TABLE `tbldistrictofficers`
  ADD PRIMARY KEY (`dOfficersID`),
  ADD KEY `dOfficesID` (`dOfficesID`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `serviceYrID` (`serviceYrID`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `tbldistrictoffices`
--
ALTER TABLE `tbldistrictoffices`
  ADD PRIMARY KEY (`dOfficesID`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `tbldpsteam`
--
ALTER TABLE `tbldpsteam`
  ADD PRIMARY KEY (`teamID`),
  ADD KEY `dOfficesID` (`dOfficesID`),
  ADD KEY `serviceYrID` (`serviceYrID`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `tbldpteam`
--
ALTER TABLE `tbldpteam`
  ADD PRIMARY KEY (`teamID`),
  ADD KEY `dOfficesID` (`dOfficesID`),
  ADD KEY `serviceYrID` (`serviceYrID`),
  ADD KEY `updatedBy` (`updatedBy`),
  ADD KEY `memberID` (`memberID`);

--
-- Indexes for table `tbllga`
--
ALTER TABLE `tbllga`
  ADD PRIMARY KEY (`lgaID`),
  ADD KEY `stateID` (`stateID`);

--
-- Indexes for table `tblmembers`
--
ALTER TABLE `tblmembers`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `clubID` (`clubID`),
  ADD KEY `regionID` (`regionID`),
  ADD KEY `state` (`state`),
  ADD KEY `updatedBy` (`updatedBy`),
  ADD KEY `stateOfOrigin` (`stateOfOrigin`),
  ADD KEY `lgaOfOrigin` (`lgaOfOrigin`);

--
-- Indexes for table `tblpdp`
--
ALTER TABLE `tblpdp`
  ADD PRIMARY KEY (`pdpID`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `postCatID` (`postCatID`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `tblpostcategory`
--
ALTER TABLE `tblpostcategory`
  ADD PRIMARY KEY (`postCatID`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `tblregion`
--
ALTER TABLE `tblregion`
  ADD PRIMARY KEY (`regionID`);

--
-- Indexes for table `tblregiondirector`
--
ALTER TABLE `tblregiondirector`
  ADD PRIMARY KEY (`regiondirID`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `regionID` (`regionID`),
  ADD KEY `serviceYrID` (`serviceYrID`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `tblreport`
--
ALTER TABLE `tblreport`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `clubID` (`clubID`),
  ADD KEY `areasID` (`areasID`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `tblserviceyr`
--
ALTER TABLE `tblserviceyr`
  ADD PRIMARY KEY (`serviceYrID`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `tblstates`
--
ALTER TABLE `tblstates`
  ADD PRIMARY KEY (`stateID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblactivityareas`
--
ALTER TABLE `tblactivityareas`
  MODIFY `areasID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblactivitycategory`
--
ALTER TABLE `tblactivitycategory`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblclubpresidents`
--
ALTER TABLE `tblclubpresidents`
  MODIFY `presidentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblclubs`
--
ALTER TABLE `tblclubs`
  MODIFY `clubID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbldistrictofficers`
--
ALTER TABLE `tbldistrictofficers`
  MODIFY `dOfficersID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbldistrictoffices`
--
ALTER TABLE `tbldistrictoffices`
  MODIFY `dOfficesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbldpsteam`
--
ALTER TABLE `tbldpsteam`
  MODIFY `teamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbldpteam`
--
ALTER TABLE `tbldpteam`
  MODIFY `teamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbllga`
--
ALTER TABLE `tbllga`
  MODIFY `lgaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=775;

--
-- AUTO_INCREMENT for table `tblmembers`
--
ALTER TABLE `tblmembers`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpdp`
--
ALTER TABLE `tblpdp`
  MODIFY `pdpID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpostcategory`
--
ALTER TABLE `tblpostcategory`
  MODIFY `postCatID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblregion`
--
ALTER TABLE `tblregion`
  MODIFY `regionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblregiondirector`
--
ALTER TABLE `tblregiondirector`
  MODIFY `regiondirID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblreport`
--
ALTER TABLE `tblreport`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblserviceyr`
--
ALTER TABLE `tblserviceyr`
  MODIFY `serviceYrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblstates`
--
ALTER TABLE `tblstates`
  MODIFY `stateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblactivityareas`
--
ALTER TABLE `tblactivityareas`
  ADD CONSTRAINT `tblactivityareas_ibfk_1` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`),
  ADD CONSTRAINT `tblactivityareas_ibfk_2` FOREIGN KEY (`activityCatID`) REFERENCES `tblactivitycategory` (`categoryID`);

--
-- Constraints for table `tblactivitycategory`
--
ALTER TABLE `tblactivitycategory`
  ADD CONSTRAINT `tblactivitycategory_ibfk_1` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`);

--
-- Constraints for table `tblclubpresidents`
--
ALTER TABLE `tblclubpresidents`
  ADD CONSTRAINT `tblclubpresidents_ibfk_1` FOREIGN KEY (`president`) REFERENCES `tblmembers` (`memberID`),
  ADD CONSTRAINT `tblclubpresidents_ibfk_2` FOREIGN KEY (`clubID`) REFERENCES `tblclubs` (`clubID`),
  ADD CONSTRAINT `tblclubpresidents_ibfk_3` FOREIGN KEY (`serviceYr`) REFERENCES `tblserviceyr` (`serviceYrID`),
  ADD CONSTRAINT `tblclubpresidents_ibfk_4` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`);

--
-- Constraints for table `tblclubs`
--
ALTER TABLE `tblclubs`
  ADD CONSTRAINT `tblclubs_ibfk_1` FOREIGN KEY (`regionID`) REFERENCES `tblregion` (`regionID`),
  ADD CONSTRAINT `tblclubs_ibfk_2` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`);

--
-- Constraints for table `tbldistrictofficers`
--
ALTER TABLE `tbldistrictofficers`
  ADD CONSTRAINT `tbldistrictofficers_ibfk_1` FOREIGN KEY (`dOfficesID`) REFERENCES `tbldistrictoffices` (`dOfficesID`),
  ADD CONSTRAINT `tbldistrictofficers_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `tblmembers` (`memberID`),
  ADD CONSTRAINT `tbldistrictofficers_ibfk_3` FOREIGN KEY (`serviceYrID`) REFERENCES `tblserviceyr` (`serviceYrID`),
  ADD CONSTRAINT `tbldistrictofficers_ibfk_4` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`);

--
-- Constraints for table `tbldistrictoffices`
--
ALTER TABLE `tbldistrictoffices`
  ADD CONSTRAINT `tbldistrictoffices_ibfk_1` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`);

--
-- Constraints for table `tbldpsteam`
--
ALTER TABLE `tbldpsteam`
  ADD CONSTRAINT `tbldpsteam_ibfk_1` FOREIGN KEY (`dOfficesID`) REFERENCES `tbldistrictoffices` (`dOfficesID`),
  ADD CONSTRAINT `tbldpsteam_ibfk_2` FOREIGN KEY (`serviceYrID`) REFERENCES `tblserviceyr` (`serviceYrID`),
  ADD CONSTRAINT `tbldpsteam_ibfk_3` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`);

--
-- Constraints for table `tbldpteam`
--
ALTER TABLE `tbldpteam`
  ADD CONSTRAINT `tbldpteam_ibfk_1` FOREIGN KEY (`dOfficesID`) REFERENCES `tbldistrictoffices` (`dOfficesID`),
  ADD CONSTRAINT `tbldpteam_ibfk_2` FOREIGN KEY (`serviceYrID`) REFERENCES `tblserviceyr` (`serviceYrID`),
  ADD CONSTRAINT `tbldpteam_ibfk_3` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`),
  ADD CONSTRAINT `tbldpteam_ibfk_4` FOREIGN KEY (`memberID`) REFERENCES `tblmembers` (`memberID`);

--
-- Constraints for table `tbllga`
--
ALTER TABLE `tbllga`
  ADD CONSTRAINT `tbllga_ibfk_1` FOREIGN KEY (`stateID`) REFERENCES `tblstates` (`stateID`);

--
-- Constraints for table `tblmembers`
--
ALTER TABLE `tblmembers`
  ADD CONSTRAINT `tblmembers_ibfk_1` FOREIGN KEY (`clubID`) REFERENCES `tblclubs` (`clubID`),
  ADD CONSTRAINT `tblmembers_ibfk_2` FOREIGN KEY (`regionID`) REFERENCES `tblregion` (`regionID`),
  ADD CONSTRAINT `tblmembers_ibfk_3` FOREIGN KEY (`state`) REFERENCES `tblstates` (`stateID`),
  ADD CONSTRAINT `tblmembers_ibfk_4` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`),
  ADD CONSTRAINT `tblmembers_ibfk_5` FOREIGN KEY (`lgaOfOrigin`) REFERENCES `tbllga` (`lgaID`),
  ADD CONSTRAINT `tblmembers_ibfk_6` FOREIGN KEY (`stateOfOrigin`) REFERENCES `tblstates` (`stateID`);

--
-- Constraints for table `tblpdp`
--
ALTER TABLE `tblpdp`
  ADD CONSTRAINT `tblpdp_ibfk_1` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`);

--
-- Constraints for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD CONSTRAINT `tblpost_ibfk_1` FOREIGN KEY (`postCatID`) REFERENCES `tblpostcategory` (`postCatID`),
  ADD CONSTRAINT `tblpost_ibfk_2` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`);

--
-- Constraints for table `tblpostcategory`
--
ALTER TABLE `tblpostcategory`
  ADD CONSTRAINT `tblpostcategory_ibfk_1` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`);

--
-- Constraints for table `tblregiondirector`
--
ALTER TABLE `tblregiondirector`
  ADD CONSTRAINT `tblregiondirector_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `tblmembers` (`memberID`),
  ADD CONSTRAINT `tblregiondirector_ibfk_2` FOREIGN KEY (`regionID`) REFERENCES `tblregion` (`regionID`),
  ADD CONSTRAINT `tblregiondirector_ibfk_3` FOREIGN KEY (`serviceYrID`) REFERENCES `tblserviceyr` (`serviceYrID`),
  ADD CONSTRAINT `tblregiondirector_ibfk_4` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`);

--
-- Constraints for table `tblreport`
--
ALTER TABLE `tblreport`
  ADD CONSTRAINT `tblreport_ibfk_1` FOREIGN KEY (`clubID`) REFERENCES `tblclubs` (`clubID`),
  ADD CONSTRAINT `tblreport_ibfk_2` FOREIGN KEY (`areasID`) REFERENCES `tblactivityareas` (`areasID`),
  ADD CONSTRAINT `tblreport_ibfk_3` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`);

--
-- Constraints for table `tblserviceyr`
--
ALTER TABLE `tblserviceyr`
  ADD CONSTRAINT `tblserviceyr_ibfk_1` FOREIGN KEY (`updatedBy`) REFERENCES `tblusers` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
