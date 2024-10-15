-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 04 juil. 2023 à 17:35
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mysql_db`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `A_B` ()   BEGIN
select cust.*,
            spouse.Branch_desc as prn_id
            from branches cust
            LEFT OUTER JOIN branches spouse
            on cust.Parent_id = spouse.Branch_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `A_paramerters` ()   BEGIN
SELECT * FROM paramerters;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `A_Priv` ()   BEGIN
SELECT * from programs;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `A_T` ()   BEGIN
SELECT * FROM types;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Last_priv` ()   BEGIN
SELECT  MAX(`PRO_ID`) as Id_Prog FROM `programs`;
END$$

--
-- Fonctions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `Del_p` (`Fp0` INT(11)) RETURNS VARCHAR(255) CHARSET utf8  BEGIN
DELETE FROM paramerters where par_id = Fp0;
RETURN 'Deleted Successfully';
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `Del_priv` (`prv0` INT(11)) RETURNS VARCHAR(255) CHARSET utf8  BEGIN
DELETE FROM programs where PRO_ID = prv0;
RETURN 'Deleted Successfully';
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `Del_T` (`pt0` SMALLINT(3)) RETURNS VARCHAR(255) CHARSET utf8  BEGIN
DELETE FROM types WHERE TYP_ID = pt0;
RETURN 'Deleted Successfully';
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `Ins_P` (`Fp1` INT(11), `Fp2` VARCHAR(100) CHARSET utf8, `Fp3` VARCHAR(100) CHARSET utf8, `Fp4` VARCHAR(14), `Fp5` TEXT, `Fp6` VARCHAR(100) CHARSET utf8, `Fp7` VARCHAR(100), `Fp8` VARCHAR(100), `Fp9` VARCHAR(100), `Fp10` VARCHAR(100) CHARSET utf8, `Fp11` VARCHAR(100) CHARSET utf8, `Fp12` VARCHAR(14) CHARSET utf8, `Fp13` TEXT) RETURNS VARCHAR(255) CHARSET utf8  BEGIN
INSERT INTO `paramerters`(`par_id`, `par_name`, `par_namee`, `Par_phone`, `Par_website`, `Par_Addr1`, `Par_Addr1e`, `Par_Addr2`, `Par_Addr2e`, `Par_Addr3`, `Par_Addr3e`, `Par_whatsapp`, `Par_logo`) VALUES (Fp1, Fp2, Fp3, Fp4, Fp5, Fp6, Fp7, Fp8, Fp9, Fp10, Fp11, Fp12, Fp13);
RETURN 'Inserted Successfully';
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `Ins_priv` (`prv0` INT(11), `prv1` VARCHAR(100) CHARSET utf8, `prv2` VARCHAR(100) CHARSET utf8, `prv3` VARCHAR(20) CHARSET utf8, `prv4` VARCHAR(3) CHARSET utf8, `prv5` INT(11), `prv6` CHAR(1) CHARSET utf8) RETURNS VARCHAR(255) CHARSET utf8  BEGIN
INSERT INTO `programs` (`PRO_ID`, `PRO_NAME`, `PRO_NAMEE`, `PRO_FILE_NAME`, `PRO_SYS_NAME`, `PRO_INS_USER`, `PRO_FREEZE`) VALUES(prv0,prv1,prv2,prv3,prv4,prv5,prv6);
RETURN 'Inserted Record Successfully';
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `Ins_T` (`pt1` VARCHAR(30) CHARSET utf8, `pt2` VARCHAR(30) CHARSET utf8, `pt3` VARCHAR(20) CHARSET utf8, `pt4` VARCHAR(8) CHARSET utf8, `pt6` VARCHAR(30), `pt7` VARCHAR(30), `pt15` VARCHAR(30), `pt16` INT, `pt17` DATETIME, `pt18` CHAR(1)) RETURNS VARCHAR(255) CHARSET utf8  BEGIN
insert into types(`TYP_NAME`, `TYP_NAMEE`, `TYP_REP_NAME`, `TYP_TYPE`,`TYP_Sig_one`, `TYP_Sig_two`, `TYP_Sig_three`, `TYP_INS_USER`,`TYP_INS_DATE`,`TYP_FREEZE`) 
values (pt1, pt2, pt3, pt4,pt6,pt7,pt15,pt16,pt17,pt18);
RETURN 'Inserted Successfully';
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `Upd_p` (`Fp0` INT(11), `Fp1` VARCHAR(100) CHARSET utf8, `Fp2` VARCHAR(100) CHARSET utf8, `Fp3` VARCHAR(14), `Fp4` TEXT, `Fp5` VARCHAR(100) CHARSET utf8, `Fp6` VARCHAR(100) CHARSET utf8, `Fp7` VARCHAR(100) CHARSET utf8, `Fp8` VARCHAR(14) CHARSET utf8, `Fp9` TEXT CHARSET utf8) RETURNS VARCHAR(255) CHARSET utf8  BEGIN
UPDATE `paramerters` SET `par_name` = Fp1, `par_namee` = Fp2, `Par_phone` = Fp3, `Par_website` = Fp4, `Par_Addr1` = Fp5, `Par_Addr2` = Fp6, `Par_Addr3` = Fp7,`Par_whatsapp` = Fp8, `Par_logo` = Fp9 WHERE `paramerters`.`par_id` = Fp0;
RETURN 'Updated Successfully';
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `Upd_priv` (`prv0` INT(11), `prv1` VARCHAR(100) CHARSET utf8, `prv2` VARCHAR(100) CHARSET utf8, `prv3` VARCHAR(20) CHARSET utf8, `prv4` VARCHAR(3) CHARSET utf8, `prv5` INT(6), `prv6` DATETIME, `prv7` CHAR(1) CHARSET utf8) RETURNS VARCHAR(255) CHARSET utf8  BEGIN
UPDATE `programs` SET `PRO_NAME` = prv1, `PRO_NAMEE` = prv2, `PRO_FILE_NAME` = prv3, `PRO_SYS_NAME` = prv4, `PRO_UPD_USER` = prv5, `PRO_UPD_DATE` = prv6, `PRO_FREEZE` = prv7 WHERE `programs`.`PRO_ID` = prv0;
RETURN 'Updated Record Successfully';
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `Upd_T` (`pt0` SMALLINT(3), `pt1` VARCHAR(30) CHARSET utf8, `pt2` VARCHAR(30) CHARSET utf8, `pt3` VARCHAR(20) CHARSET utf8, `pt4` VARCHAR(8) CHARSET utf8, `pt6` VARCHAR(100), `pt7` VARCHAR(100), `pt15` VARCHAR(100), `pt16` INT(6), `pt17` DATETIME, `pt18` CHAR(1)) RETURNS VARCHAR(255) CHARSET utf8  BEGIN
UPDATE types SET TYP_NAME = pt1,TYP_NAMEE= pt2,TYP_REP_NAME= pt3,TYP_TYPE=pt4 ,TYP_Sig_one=pt6,TYP_Sig_two=pt7 ,TYP_UPD_USER=pt16,TYP_UPD_DATE=pt17,TYP_FREEZE=pt18  WHERE TYP_ID = pt0;
RETURN 'Updated Successfully';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `amnt_dlivd`
--

CREATE TABLE `amnt_dlivd` (
  `AMNTS_ID` bigint(10) NOT NULL,
  `AMNTS_V_ID` bigint(10) DEFAULT NULL,
  `AMNTS_DAT` datetime DEFAULT NULL,
  `VOU_USE_ID` int(6) DEFAULT NULL,
  `AMTS_BENF` int(11) DEFAULT NULL,
  `TSTOTSALE` decimal(15,2) DEFAULT NULL,
  `TSMUS` decimal(15,2) DEFAULT NULL,
  `TSHISREMD` decimal(15,2) DEFAULT NULL,
  `TSONREMD` decimal(15,2) DEFAULT NULL,
  `DLIVAMNT` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `amnt_dlivd`
--

INSERT INTO `amnt_dlivd` (`AMNTS_ID`, `AMNTS_V_ID`, `AMNTS_DAT`, `VOU_USE_ID`, `AMTS_BENF`, `TSTOTSALE`, `TSMUS`, `TSHISREMD`, `TSONREMD`, `DLIVAMNT`) VALUES
(28, 1, '2023-07-04 00:00:00', 2, 9, '80700.00', '40000.00', '40700.00', '0.00', NULL),
(29, 2, '2021-09-05 00:00:00', 2, 27, '101700.00', '20000.00', '81700.00', '0.00', NULL),
(30, 3, '2023-07-04 00:00:00', 2, 2, '110200.00', '110000.00', '200.00', '0.00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `branches`
--

CREATE TABLE `branches` (
  `Branch_id` int(6) NOT NULL,
  `Branch_desc` varchar(120) NOT NULL,
  `Parent_id` int(3) DEFAULT NULL,
  `BRA_NAMEE` varchar(60) DEFAULT NULL,
  `BRA_ADDRESS1` varchar(60) DEFAULT NULL,
  `BRA_ADDRESS2` varchar(60) DEFAULT NULL,
  `BRA_ADDRESS3` varchar(100) NOT NULL,
  `BRA_TEL_NO` varchar(60) DEFAULT NULL,
  `BRA_FAX_NO` varchar(60) DEFAULT NULL,
  `BRA_MAIL` varchar(60) DEFAULT NULL,
  `BRA_CUS_RANGE1` int(6) DEFAULT 0,
  `BRA_CUS_RANGE2` int(6) DEFAULT 999999,
  `BRA_INS_USER` int(6) DEFAULT NULL,
  `BRA_INS_DATE` datetime DEFAULT NULL,
  `BRA_UPD_USER` int(6) DEFAULT NULL,
  `BRA_UPD_DATE` datetime DEFAULT NULL,
  `BRA_FREEZE` char(1) DEFAULT ucase('N') CHECK (`BRA_FREEZE` in (ucase('Y'),ucase('N')))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `branches`
--

INSERT INTO `branches` (`Branch_id`, `Branch_desc`, `Parent_id`, `BRA_NAMEE`, `BRA_ADDRESS1`, `BRA_ADDRESS2`, `BRA_ADDRESS3`, `BRA_TEL_NO`, `BRA_FAX_NO`, `BRA_MAIL`, `BRA_CUS_RANGE1`, `BRA_CUS_RANGE2`, `BRA_INS_USER`, `BRA_INS_DATE`, `BRA_UPD_USER`, `BRA_UPD_DATE`, `BRA_FREEZE`) VALUES
(0, 'الادارة العام', 0, '', '', '', '', '', '', '', 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(100, 'المركز الرئيسي', 0, '0', '', '', '', '', '', '', 0, 0, NULL, NULL, NULL, NULL, 'Y');

-- --------------------------------------------------------

--
-- Structure de la table `cust`
--

CREATE TABLE `cust` (
  `CUST_ID` int(11) NOT NULL,
  `CUST_NAME` varchar(200) NOT NULL,
  `CUST_PHONE` varchar(14) NOT NULL,
  `CUST_EMAIL` varchar(50) NOT NULL,
  `CUST_INS_USER` int(6) DEFAULT NULL,
  `CUST_INS_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `CUST_UPD_USER` int(6) DEFAULT NULL,
  `CUST_UPD_DATE` datetime DEFAULT NULL,
  `CUST_FREEZE` char(1) DEFAULT ucase('N') CHECK (`CUST_FREEZE` in (ucase('Y'),ucase('N')))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cust`
--

INSERT INTO `cust` (`CUST_ID`, `CUST_NAME`, `CUST_PHONE`, `CUST_EMAIL`, `CUST_INS_USER`, `CUST_INS_DATE`, `CUST_UPD_USER`, `CUST_UPD_DATE`, `CUST_FREEZE`) VALUES
(0, 'مجهول', '77742466', '', 2, '2023-06-13 18:51:04', NULL, NULL, 'Y'),
(1, 'ابراهيم البدري', '77000000', 'test@gmail.com', 1, '2023-05-01 17:28:27', 2, '2023-05-26 08:36:50', 'Y'),
(2, 'ابراهيم الجيلاني', '77000000', 'test@gmail.com', 1, '2023-05-02 17:28:27', NULL, NULL, 'Y'),
(3, 'ابراهيم القيسي', '77000000', 'test@gmail.com', 1, '2023-05-03 17:28:27', NULL, NULL, 'Y'),
(4, 'ابراهيم فقيه', '77000000', 'test@gmail.com', 1, '2023-05-04 17:28:27', NULL, NULL, 'Y'),
(5, 'ابن عبده صغير', '77000000', 'test@gmail.com', 1, '2023-05-05 17:28:27', NULL, NULL, 'Y'),
(6, 'ابوعلي', '77000000', 'test@gmail.com', 1, '2023-05-06 17:28:27', NULL, NULL, 'Y'),
(7, 'احمد', '77000000', 'test@gmail.com', 1, '2023-05-07 17:28:27', NULL, NULL, 'Y'),
(8, 'احمد الخولاني', '77000000', 'test@gmail.com', 1, '2023-05-08 17:28:27', NULL, NULL, 'Y'),
(9, 'احمد الرازحي', '77000000', 'test@gmail.com', 1, '2023-05-09 17:28:27', NULL, NULL, 'Y'),
(10, 'احمد النويرة', '77000000', 'test@gmail.com', 1, '2023-05-10 17:28:27', NULL, NULL, 'Y'),
(11, 'احمد جبري ', '77000000', 'test@gmail.com', 1, '2023-05-11 17:28:27', NULL, NULL, 'Y'),
(12, 'احمد حج', '77000000', 'test@gmail.com', 1, '2023-05-12 17:28:27', NULL, NULL, 'Y'),
(13, 'احمد حسن الريمي', '77000000', 'test@gmail.com', 1, '2023-05-13 17:28:27', NULL, NULL, 'Y'),
(14, 'احمد حسن حجي', '77000000', 'test@gmail.com', 1, '2023-05-14 17:28:27', NULL, NULL, 'Y'),
(15, 'احمد حميد الفقيه', '77000000', 'test@gmail.com', 1, '2023-05-15 17:28:27', NULL, NULL, 'Y'),
(16, 'اخو عماد', '77000000', 'test@gmail.com', 1, '2023-05-16 17:28:27', NULL, NULL, 'Y'),
(17, 'اخوبرقق عبداللطيف', '77000000', 'test@gmail.com', 1, '2023-05-17 17:28:27', NULL, NULL, 'Y'),
(18, 'اخوبسام الابي', '77000000', 'test@gmail.com', 1, '2023-05-18 17:28:27', NULL, NULL, 'Y'),
(19, 'اسامه المحاقري', '77000000', 'test@gmail.com', 1, '2023-05-19 17:28:27', NULL, NULL, 'Y'),
(20, 'اسماعيل الريمي', '77000000', 'test@gmail.com', 1, '2023-05-20 17:28:27', NULL, NULL, 'Y'),
(21, 'اكرم الجبلي', '77000000', 'test@gmail.com', 1, '2023-05-21 17:28:27', NULL, NULL, 'Y'),
(22, 'اكرم الشدادي', '77000000', 'test@gmail.com', 1, '2023-05-22 17:28:27', NULL, NULL, 'Y'),
(23, 'اكرم القاضي', '77000000', 'test@gmail.com', 1, '2023-05-23 17:28:27', NULL, NULL, 'Y'),
(24, 'اكرم بكيل', '77000000', 'test@gmail.com', 1, '2023-05-24 17:28:27', NULL, NULL, 'Y'),
(25, 'الابي', '77000000', 'test@gmail.com', 1, '2023-05-25 17:28:27', NULL, NULL, 'Y'),
(26, 'الابي ', '77000000', 'test@gmail.com', 1, '2023-05-26 17:28:27', NULL, NULL, 'Y'),
(27, 'الاشموري', '77000000', 'test@gmail.com', 1, '2023-05-27 17:28:27', NULL, NULL, 'Y'),
(28, 'الاوزري', '77000000', 'test@gmail.com', 1, '2023-05-28 17:28:27', NULL, NULL, 'Y'),
(29, 'الأبيض', '77000000', 'test@gmail.com', 1, '2023-05-29 17:28:27', NULL, NULL, 'Y'),
(30, 'الأزرق', '77000000', 'test@gmail.com', 1, '2023-05-30 17:28:27', NULL, NULL, 'Y'),
(31, 'الأزرق العزب', '77000000', 'test@gmail.com', 1, '2023-05-31 17:28:27', NULL, NULL, 'Y'),
(32, 'البسباسي', '77000000', 'test@gmail.com', 1, '2023-06-01 17:28:27', NULL, NULL, 'Y'),
(33, 'البعجور', '77000000', 'test@gmail.com', 1, '2023-06-02 17:28:27', NULL, NULL, 'Y'),
(34, 'البوني', '77000000', 'test@gmail.com', 1, '2023-06-03 17:28:27', NULL, NULL, 'Y'),
(35, 'الجايفي', '77000000', 'test@gmail.com', 1, '2023-06-04 17:28:27', NULL, NULL, 'Y'),
(36, 'الجمره', '77000000', 'test@gmail.com', 1, '2023-06-05 17:28:27', NULL, NULL, 'Y'),
(37, 'الجنيد', '77000000', 'test@gmail.com', 1, '2023-06-06 17:28:27', NULL, NULL, 'Y'),
(38, 'الجولبي', '77000000', 'test@gmail.com', 1, '2023-06-07 17:28:27', NULL, NULL, 'Y'),
(39, 'الحر راجح علي', '77000000', 'test@gmail.com', 1, '2023-06-08 17:28:27', NULL, NULL, 'Y'),
(40, 'الحرازي', '77000000', 'test@gmail.com', 1, '2023-06-09 17:28:27', NULL, NULL, 'Y'),
(41, 'الحرمانع راجح السنه', '77000000', 'test@gmail.com', 1, '2023-06-10 17:28:27', NULL, NULL, 'Y'),
(42, 'الخروف', '77000000', 'test@gmail.com', 1, '2023-06-11 17:28:27', NULL, NULL, 'Y'),
(43, 'الديلمي', '77000000', 'test@gmail.com', 1, '2023-06-12 17:28:27', NULL, NULL, 'Y'),
(44, 'الديلمي عمار', '77000000', 'test@gmail.com', 1, '2023-06-13 17:28:27', NULL, NULL, 'Y'),
(45, 'الرجوي', '77000000', 'test@gmail.com', 1, '2023-06-14 17:28:27', NULL, NULL, 'Y'),
(46, 'الروني', '77000000', 'test@gmail.com', 1, '2023-06-15 17:28:27', NULL, NULL, 'Y'),
(47, 'الزري', '77000000', 'test@gmail.com', 1, '2023-06-16 17:28:27', NULL, NULL, 'Y'),
(48, 'السريحي', '77000000', 'test@gmail.com', 1, '2023-06-17 17:28:27', NULL, NULL, 'Y'),
(49, 'السماوي', '77000000', 'test@gmail.com', 1, '2023-06-18 17:28:27', NULL, NULL, 'Y'),
(50, 'السياغي', '77000000', 'test@gmail.com', 1, '2023-06-19 17:28:27', NULL, NULL, 'Y'),
(51, 'السياني', '77000000', 'test@gmail.com', 1, '2023-06-20 17:28:27', NULL, NULL, 'Y'),
(52, 'الشهاري', '77000000', 'test@gmail.com', 1, '2023-06-21 17:28:27', NULL, NULL, 'Y'),
(53, 'الشوعة', '77000000', 'test@gmail.com', 1, '2023-06-22 17:28:27', NULL, NULL, 'Y'),
(54, 'الصاروخ', '77000000', 'test@gmail.com', 1, '2023-06-23 17:28:27', NULL, NULL, 'Y'),
(55, 'الضعيف', '77000000', 'test@gmail.com', 1, '2023-06-24 17:28:27', NULL, NULL, 'Y'),
(56, 'العبال', '77000000', 'test@gmail.com', 1, '2023-06-25 17:28:27', NULL, NULL, 'Y'),
(57, 'العرشي', '77000000', 'test@gmail.com', 1, '2023-06-26 17:28:27', NULL, NULL, 'Y'),
(58, 'العليمي', '77000000', 'test@gmail.com', 1, '2023-06-27 17:28:27', NULL, NULL, 'Y'),
(59, 'القاضي', '77000000', 'test@gmail.com', 1, '2023-06-28 17:28:27', NULL, NULL, 'Y'),
(60, 'القديمي', '77000000', 'test@gmail.com', 1, '2023-06-29 17:28:27', NULL, NULL, 'Y'),
(61, 'القديمي للمحاسب', '77000000', 'test@gmail.com', 1, '2023-06-30 17:28:27', NULL, NULL, 'Y'),
(62, 'القربوع', '77000000', 'test@gmail.com', 1, '2023-07-01 17:28:27', NULL, NULL, 'Y'),
(63, 'القطوع', '77000000', 'test@gmail.com', 1, '2023-07-02 17:28:27', NULL, NULL, 'Y'),
(64, 'القيسي ', '77000000', 'test@gmail.com', 1, '2023-07-03 17:28:27', NULL, NULL, 'Y'),
(65, 'المتر', '77000000', 'test@gmail.com', 1, '2023-07-04 17:28:27', NULL, NULL, 'Y'),
(66, 'المتر عبده', '77000000', 'test@gmail.com', 1, '2023-07-05 17:28:27', NULL, NULL, 'Y'),
(67, 'المدقل', '77000000', 'test@gmail.com', 1, '2023-07-06 17:28:27', NULL, NULL, 'Y'),
(68, 'المراني', '77000000', 'test@gmail.com', 1, '2023-07-07 17:28:27', NULL, NULL, 'Y'),
(69, 'المراني 2', '77000000', 'test@gmail.com', 1, '2023-07-08 17:28:27', NULL, NULL, 'Y'),
(70, 'المسوري', '77000000', 'test@gmail.com', 1, '2023-07-09 17:28:27', NULL, NULL, 'Y'),
(71, 'المصري', '77000000', 'test@gmail.com', 1, '2023-07-10 17:28:27', NULL, NULL, 'Y'),
(72, 'الملحاني', '77000000', 'test@gmail.com', 1, '2023-07-11 17:28:27', NULL, NULL, 'Y'),
(73, 'المهدي', '77000000', 'test@gmail.com', 1, '2023-07-12 17:28:27', NULL, NULL, 'Y'),
(74, 'الموتر', '77000000', 'test@gmail.com', 1, '2023-07-13 17:28:27', NULL, NULL, 'Y'),
(75, 'المؤمن', '77000000', 'test@gmail.com', 1, '2023-07-14 17:28:27', NULL, NULL, 'Y'),
(76, 'النمله', '77000000', 'test@gmail.com', 1, '2023-07-15 17:28:27', NULL, NULL, 'Y'),
(77, 'النهاري', '77000000', 'test@gmail.com', 1, '2023-07-16 17:28:27', NULL, NULL, 'Y'),
(78, 'الهبه', '77000000', 'test@gmail.com', 1, '2023-07-17 17:28:27', NULL, NULL, 'Y'),
(79, 'الوجيه', '77000000', 'test@gmail.com', 1, '2023-07-18 17:28:27', NULL, NULL, 'Y'),
(80, 'الوقشي', '77000000', 'test@gmail.com', 1, '2023-07-19 17:28:27', NULL, NULL, 'Y'),
(81, 'امير غيلان', '77000000', 'test@gmail.com', 1, '2023-07-20 17:28:27', NULL, NULL, 'Y'),
(82, 'امين الجمره', '77000000', 'test@gmail.com', 1, '2023-07-21 17:28:27', NULL, NULL, 'Y'),
(83, 'امين الزبيدي', '77000000', 'test@gmail.com', 1, '2023-07-22 17:28:27', NULL, NULL, 'Y'),
(84, 'امين العتمي', '77000000', 'test@gmail.com', 1, '2023-07-23 17:28:27', NULL, NULL, 'Y'),
(85, 'امين سعد الجايفي', '77000000', 'test@gmail.com', 1, '2023-07-24 17:28:27', NULL, NULL, 'Y'),
(86, 'انس', '77000000', 'test@gmail.com', 1, '2023-07-25 17:28:27', NULL, NULL, 'Y'),
(87, 'انوار', '77000000', 'test@gmail.com', 1, '2023-07-26 17:28:27', NULL, NULL, 'Y'),
(88, 'اويس', '77000000', 'test@gmail.com', 1, '2023-07-27 17:28:27', NULL, NULL, 'Y'),
(89, 'إبراهيم الانسي', '77000000', 'test@gmail.com', 1, '2023-07-28 17:28:27', NULL, NULL, 'Y'),
(90, 'إبراهيم الوسادة', '77000000', 'test@gmail.com', 1, '2023-07-29 17:28:27', NULL, NULL, 'Y'),
(91, 'إبراهيم هيكل', '77000000', 'test@gmail.com', 1, '2023-07-30 17:28:27', NULL, NULL, 'Y'),
(92, 'إبوفارس', '77000000', 'test@gmail.com', 1, '2023-07-31 17:28:27', NULL, NULL, 'Y'),
(93, 'أبواسامة', '77000000', 'test@gmail.com', 1, '2023-08-01 17:28:27', NULL, NULL, 'Y'),
(94, 'أحمد مفلح', '77000000', 'test@gmail.com', 1, '2023-08-02 17:28:27', NULL, NULL, 'Y'),
(95, 'أحمد مفلح', '77000000', 'test@gmail.com', 1, '2023-08-03 17:28:27', NULL, NULL, 'Y'),
(96, 'أكرم الحاشدي', '77000000', 'test@gmail.com', 1, '2023-08-04 17:28:27', NULL, NULL, 'Y'),
(97, 'بترول', '77000000', 'test@gmail.com', 1, '2023-08-05 17:28:27', NULL, NULL, 'Y'),
(98, 'بدر', '77000000', 'test@gmail.com', 1, '2023-08-06 17:28:27', NULL, NULL, 'Y'),
(99, 'بدر الارحبي', '77000000', 'test@gmail.com', 1, '2023-08-07 17:28:27', NULL, NULL, 'Y'),
(100, 'بدر الزري', '77000000', 'test@gmail.com', 1, '2023-08-08 17:28:27', NULL, NULL, 'Y'),
(101, 'بديع', '77000000', 'test@gmail.com', 1, '2023-08-09 17:28:27', NULL, NULL, 'Y'),
(102, 'برقق', '77000000', 'test@gmail.com', 1, '2023-08-10 17:28:27', NULL, NULL, 'Y'),
(103, 'برقق محمد', '77000000', 'test@gmail.com', 1, '2023-08-11 17:28:27', NULL, NULL, 'Y'),
(104, 'برقق نورالدين', '77000000', 'test@gmail.com', 1, '2023-08-12 17:28:27', NULL, NULL, 'Y'),
(105, 'بركات', '77000000', 'test@gmail.com', 1, '2023-08-13 17:28:27', NULL, NULL, 'Y'),
(106, 'بسام ', '77000000', 'test@gmail.com', 1, '2023-08-14 17:28:27', NULL, NULL, 'Y'),
(107, 'بسام الابي', '77000000', 'test@gmail.com', 1, '2023-08-15 17:28:27', NULL, NULL, 'Y'),
(108, 'بسام الغباسي', '77000000', 'test@gmail.com', 1, '2023-08-16 17:28:27', NULL, NULL, 'Y'),
(109, 'بسام قازه', '77000000', 'test@gmail.com', 1, '2023-08-17 17:28:27', NULL, NULL, 'Y'),
(110, 'بشار الريمي', '77000000', 'test@gmail.com', 1, '2023-08-18 17:28:27', NULL, NULL, 'Y'),
(111, 'بشير الابي ', '77000000', 'test@gmail.com', 1, '2023-08-19 17:28:27', NULL, NULL, 'Y'),
(112, 'بشير المجنه', '77000000', 'test@gmail.com', 1, '2023-08-20 17:28:27', NULL, NULL, 'Y'),
(113, 'بشير جسار', '77000000', 'test@gmail.com', 1, '2023-08-21 17:28:27', NULL, NULL, 'Y'),
(114, 'بكيل الخولاني', '77000000', 'test@gmail.com', 1, '2023-08-22 17:28:27', NULL, NULL, 'Y'),
(115, 'بكيل حميد', '77000000', 'test@gmail.com', 1, '2023-08-23 17:28:27', NULL, NULL, 'Y'),
(116, 'بلال', '77000000', 'test@gmail.com', 1, '2023-08-24 17:28:27', NULL, NULL, 'Y'),
(117, 'بلال الابي', '77000000', 'test@gmail.com', 1, '2023-08-25 17:28:27', NULL, NULL, 'Y'),
(118, 'بلال الوجيه', '77000000', 'test@gmail.com', 1, '2023-08-26 17:28:27', NULL, NULL, 'Y'),
(119, 'بياع طه فقيه', '77000000', 'test@gmail.com', 1, '2023-08-27 17:28:27', NULL, NULL, 'Y'),
(120, 'توفيق الحرازي', '77000000', 'test@gmail.com', 1, '2023-08-28 17:28:27', NULL, NULL, 'Y'),
(121, 'توفيق الهمداني', '77000000', 'test@gmail.com', 1, '2023-08-29 17:28:27', NULL, NULL, 'Y'),
(122, 'توفيق صغير', '77000000', 'test@gmail.com', 1, '2023-08-30 17:28:27', NULL, NULL, 'Y'),
(123, 'توفيق على الله', '77000000', 'test@gmail.com', 1, '2023-08-31 17:28:27', NULL, NULL, 'Y'),
(124, 'جبر الانسي', '77000000', 'test@gmail.com', 1, '2023-09-01 17:28:27', NULL, NULL, 'Y'),
(125, 'جعبان', '77000000', 'test@gmail.com', 1, '2023-09-02 17:28:27', NULL, NULL, 'Y'),
(126, 'جمال الشاوري', '77000000', 'test@gmail.com', 1, '2023-09-03 17:28:27', NULL, NULL, 'Y'),
(127, 'جمال المراني', '77000000', 'test@gmail.com', 1, '2023-09-04 17:28:27', NULL, NULL, 'Y'),
(128, 'جمال جبل', '77000000', 'test@gmail.com', 1, '2023-09-05 17:28:27', NULL, NULL, 'Y'),
(129, 'جمال رفيق', '77000000', 'test@gmail.com', 1, '2023-09-06 17:28:27', NULL, NULL, 'Y'),
(130, 'جمال عريج', '77000000', 'test@gmail.com', 1, '2023-09-07 17:28:27', NULL, NULL, 'Y'),
(131, 'جمهور', '77000000', 'test@gmail.com', 1, '2023-09-08 17:28:27', NULL, NULL, 'Y'),
(132, 'جميل الجماعي', '77000000', 'test@gmail.com', 1, '2023-09-09 17:28:27', NULL, NULL, 'Y'),
(133, 'جميل زلعاط', '77000000', 'test@gmail.com', 1, '2023-09-10 17:28:27', NULL, NULL, 'Y'),
(134, 'جنيد', '77000000', 'test@gmail.com', 1, '2023-09-11 17:28:27', NULL, NULL, 'Y'),
(135, 'جوله', '77000000', 'test@gmail.com', 1, '2023-09-12 17:28:27', NULL, NULL, 'Y'),
(136, 'حارقه', '77000000', 'test@gmail.com', 1, '2023-09-13 17:28:27', NULL, NULL, 'Y'),
(137, 'حاشد', '77000000', 'test@gmail.com', 1, '2023-09-14 17:28:27', NULL, NULL, 'Y'),
(138, 'حاشد مارب', '77000000', 'test@gmail.com', 1, '2023-09-15 17:28:27', NULL, NULL, 'Y'),
(139, 'حافظ القطيلي', '77000000', 'test@gmail.com', 1, '2023-09-16 17:28:27', NULL, NULL, 'Y'),
(140, 'حجيرة', '77000000', 'test@gmail.com', 1, '2023-09-17 17:28:27', NULL, NULL, 'Y'),
(141, 'حسن غالب', '77000000', 'test@gmail.com', 1, '2023-09-18 17:28:27', NULL, NULL, 'Y'),
(142, 'حسين اليريمي', '77000000', 'test@gmail.com', 1, '2023-09-19 17:28:27', NULL, NULL, 'Y'),
(143, 'حمود الورد', '77000000', 'test@gmail.com', 1, '2023-09-20 17:28:27', NULL, NULL, 'Y'),
(144, 'حمود هايل', '77000000', 'test@gmail.com', 1, '2023-09-21 17:28:27', NULL, NULL, 'Y'),
(145, 'حمود يوسف', '77000000', 'test@gmail.com', 1, '2023-09-22 17:28:27', NULL, NULL, 'Y'),
(146, 'حميد', '77000000', 'test@gmail.com', 1, '2023-09-23 17:28:27', NULL, NULL, 'Y'),
(147, 'حميد الاسطى', '77000000', 'test@gmail.com', 1, '2023-09-24 17:28:27', NULL, NULL, 'Y'),
(148, 'حمير الشدادي  ', '77000000', 'test@gmail.com', 1, '2023-09-25 17:28:27', NULL, NULL, 'Y'),
(149, 'حيدر', '77000000', 'test@gmail.com', 1, '2023-09-26 17:28:27', NULL, NULL, 'Y'),
(150, 'حيدر الغشمي', '77000000', 'test@gmail.com', 1, '2023-09-27 17:28:27', NULL, NULL, 'Y'),
(151, 'خالد الابيض', '77000000', 'test@gmail.com', 1, '2023-09-28 17:28:27', NULL, NULL, 'Y'),
(152, 'خالد الحمزي', '77000000', 'test@gmail.com', 1, '2023-09-29 17:28:27', NULL, NULL, 'Y'),
(153, 'خالد الشدادي', '77000000', 'test@gmail.com', 1, '2023-09-30 17:28:27', NULL, NULL, 'Y'),
(154, 'خالد العواضي', '77000000', 'test@gmail.com', 1, '2023-10-01 17:28:27', NULL, NULL, 'Y'),
(155, 'خالد دكام', '77000000', 'test@gmail.com', 1, '2023-10-02 17:28:27', NULL, NULL, 'Y'),
(156, 'خالد قاسم', '77000000', 'test@gmail.com', 1, '2023-10-03 17:28:27', NULL, NULL, 'Y'),
(157, 'خصم ', '77000000', 'test@gmail.com', 1, '2023-10-04 17:28:27', NULL, NULL, 'Y'),
(158, 'خليل', '77000000', 'test@gmail.com', 1, '2023-10-05 17:28:27', NULL, NULL, 'Y'),
(159, 'داحش', '77000000', 'test@gmail.com', 1, '2023-10-06 17:28:27', NULL, NULL, 'Y'),
(160, 'داوود', '77000000', 'test@gmail.com', 1, '2023-10-07 17:28:27', NULL, NULL, 'Y'),
(161, 'ديلمي', '77000000', 'test@gmail.com', 1, '2023-10-08 17:28:27', NULL, NULL, 'Y'),
(162, 'ذكوان', '77000000', 'test@gmail.com', 1, '2023-10-09 17:28:27', NULL, NULL, 'Y'),
(163, 'ذياب', '77000000', 'test@gmail.com', 1, '2023-10-10 17:28:27', NULL, NULL, 'Y'),
(164, 'راجح السنه', '77000000', 'test@gmail.com', 1, '2023-10-11 17:28:27', NULL, NULL, 'Y'),
(165, 'راجح الشدادي', '77000000', 'test@gmail.com', 1, '2023-10-12 17:28:27', NULL, NULL, 'Y'),
(166, 'رائد البدري', '77000000', 'test@gmail.com', 1, '2023-10-13 17:28:27', NULL, NULL, 'Y'),
(167, 'رائد الغشمي', '77000000', 'test@gmail.com', 1, '2023-10-14 17:28:27', NULL, NULL, 'Y'),
(168, 'رائد برقق', '77000000', 'test@gmail.com', 1, '2023-10-15 17:28:27', NULL, NULL, 'Y'),
(169, 'رشيد الريمي', '77000000', 'test@gmail.com', 1, '2023-10-16 17:28:27', NULL, NULL, 'Y'),
(170, 'رضوان', '77000000', 'test@gmail.com', 1, '2023-10-17 17:28:27', NULL, NULL, 'Y'),
(171, 'رفيق', '77000000', 'test@gmail.com', 1, '2023-10-18 17:28:27', NULL, NULL, 'Y'),
(172, 'رمزان', '77000000', 'test@gmail.com', 1, '2023-10-19 17:28:27', NULL, NULL, 'Y'),
(173, 'رمزي ', '77000000', 'test@gmail.com', 1, '2023-10-20 17:28:27', NULL, NULL, 'Y'),
(174, 'رمضان', '77000000', 'test@gmail.com', 1, '2023-10-21 17:28:27', NULL, NULL, 'Y'),
(175, 'زايد ', '77000000', 'test@gmail.com', 1, '2023-10-22 17:28:27', NULL, NULL, 'Y'),
(176, 'زكريا', '77000000', 'test@gmail.com', 1, '2023-10-23 17:28:27', NULL, NULL, 'Y'),
(177, 'زكريا اويس', '77000000', 'test@gmail.com', 1, '2023-10-24 17:28:27', NULL, NULL, 'Y'),
(178, 'زياد غباسي', '77000000', 'test@gmail.com', 1, '2023-10-25 17:28:27', NULL, NULL, 'Y'),
(179, 'زيد', '77000000', 'test@gmail.com', 1, '2023-10-26 17:28:27', NULL, NULL, 'Y'),
(180, 'زيد علي ', '77000000', 'test@gmail.com', 1, '2023-10-27 17:28:27', NULL, NULL, 'Y'),
(181, 'زين المتر ', '77000000', 'test@gmail.com', 1, '2023-10-28 17:28:27', NULL, NULL, 'Y'),
(182, 'سام السمينه', '77000000', 'test@gmail.com', 1, '2023-10-29 17:28:27', NULL, NULL, 'Y'),
(183, 'سامي', '77000000', 'test@gmail.com', 1, '2023-10-30 17:28:27', NULL, NULL, 'Y'),
(184, 'سامي فقيه', '77000000', 'test@gmail.com', 1, '2023-10-31 17:28:27', NULL, NULL, 'Y'),
(185, 'سراج', '77000000', 'test@gmail.com', 1, '2023-11-01 17:28:27', NULL, NULL, 'Y'),
(186, 'سعد ', '77000000', 'test@gmail.com', 1, '2023-11-02 17:28:27', NULL, NULL, 'Y'),
(187, 'سعيد الابي', '77000000', 'test@gmail.com', 1, '2023-11-03 17:28:27', NULL, NULL, 'Y'),
(188, 'سعيد الريمي', '77000000', 'test@gmail.com', 1, '2023-11-04 17:28:27', NULL, NULL, 'Y'),
(189, 'سعيد العتمي', '77000000', 'test@gmail.com', 1, '2023-11-05 17:28:27', NULL, NULL, 'Y'),
(190, 'سفيان مانع', '77000000', 'test@gmail.com', 1, '2023-11-06 17:28:27', NULL, NULL, 'Y'),
(191, 'سلطان ', '77000000', 'test@gmail.com', 1, '2023-11-07 17:28:27', NULL, NULL, 'Y'),
(192, 'سلطان الأخضر', '77000000', 'test@gmail.com', 1, '2023-11-08 17:28:27', NULL, NULL, 'Y'),
(193, 'سلطان الريمي', '77000000', 'test@gmail.com', 1, '2023-11-09 17:28:27', NULL, NULL, 'Y'),
(194, 'سلمان ', '77000000', 'test@gmail.com', 1, '2023-11-10 17:28:27', NULL, NULL, 'Y'),
(195, 'سليم ', '77000000', 'test@gmail.com', 1, '2023-11-11 17:28:27', NULL, NULL, 'Y'),
(196, 'سليمان الشدادي', '77000000', 'test@gmail.com', 1, '2023-11-12 17:28:27', NULL, NULL, 'Y'),
(197, 'سمير الارحبي', '77000000', 'test@gmail.com', 1, '2023-11-13 17:28:27', NULL, NULL, 'Y'),
(198, 'سمير العزكي', '77000000', 'test@gmail.com', 1, '2023-11-14 17:28:27', NULL, NULL, 'Y'),
(199, 'سمير الغشمي', '77000000', 'test@gmail.com', 1, '2023-11-15 17:28:27', NULL, NULL, 'Y'),
(200, 'سمير المسوري', '77000000', 'test@gmail.com', 1, '2023-11-16 17:28:27', NULL, NULL, 'Y'),
(201, 'سمير جازر', '77000000', 'test@gmail.com', 1, '2023-11-17 17:28:27', NULL, NULL, 'Y'),
(202, 'سميرالغشمي', '77000000', 'test@gmail.com', 1, '2023-11-18 17:28:27', NULL, NULL, 'Y'),
(203, 'سهيل ', '77000000', 'test@gmail.com', 1, '2023-11-19 17:28:27', NULL, NULL, 'Y'),
(204, 'سواق المتر علي', '77000000', 'test@gmail.com', 1, '2023-11-20 17:28:27', NULL, NULL, 'Y'),
(205, 'سياف الاوزري', '77000000', 'test@gmail.com', 1, '2023-11-21 17:28:27', NULL, NULL, 'Y'),
(206, 'سيف جباره', '77000000', 'test@gmail.com', 1, '2023-11-22 17:28:27', NULL, NULL, 'Y'),
(207, 'سيف علي', '77000000', 'test@gmail.com', 1, '2023-11-23 17:28:27', NULL, NULL, 'Y'),
(208, 'شرف', '77000000', 'test@gmail.com', 1, '2023-11-24 17:28:27', NULL, NULL, 'Y'),
(209, 'صاحب ارحب', '77000000', 'test@gmail.com', 1, '2023-11-25 17:28:27', NULL, NULL, 'Y'),
(210, 'صادق  رفيق', '77000000', 'test@gmail.com', 1, '2023-11-26 17:28:27', NULL, NULL, 'Y'),
(211, 'صادق الريمي', '77000000', 'test@gmail.com', 1, '2023-11-27 17:28:27', NULL, NULL, 'Y'),
(212, 'صادق الوجيه', '77000000', 'test@gmail.com', 1, '2023-11-28 17:28:27', NULL, NULL, 'Y'),
(213, 'صادق برقق', '77000000', 'test@gmail.com', 1, '2023-11-29 17:28:27', NULL, NULL, 'Y'),
(214, 'صادق بكيل', '77000000', 'test@gmail.com', 1, '2023-11-30 17:28:27', NULL, NULL, 'Y'),
(215, 'صادق شمسان', '77000000', 'test@gmail.com', 1, '2023-12-01 17:28:27', NULL, NULL, 'Y'),
(216, 'صالح الراعي', '77000000', 'test@gmail.com', 1, '2023-12-02 17:28:27', NULL, NULL, 'Y'),
(217, 'صالح الراعي ', '77000000', 'test@gmail.com', 1, '2023-12-03 17:28:27', NULL, NULL, 'Y'),
(218, 'صالح النهمي ', '77000000', 'test@gmail.com', 1, '2023-12-04 17:28:27', NULL, NULL, 'Y'),
(219, 'صالح حمود', '77000000', 'test@gmail.com', 1, '2023-12-05 17:28:27', NULL, NULL, 'Y'),
(220, 'صالح نصر', '77000000', 'test@gmail.com', 1, '2023-12-06 17:28:27', NULL, NULL, 'Y'),
(221, 'صدام الجبلي', '77000000', 'test@gmail.com', 1, '2023-12-07 17:28:27', NULL, NULL, 'Y'),
(222, 'صدام المصري', '77000000', 'test@gmail.com', 1, '2023-12-08 17:28:27', NULL, NULL, 'Y'),
(223, 'صدام النفيعي', '77000000', 'test@gmail.com', 1, '2023-12-09 17:28:27', NULL, NULL, 'Y'),
(224, 'صدام جعبان', '77000000', 'test@gmail.com', 1, '2023-12-10 17:28:27', NULL, NULL, 'Y'),
(225, 'صدام جوله', '77000000', 'test@gmail.com', 1, '2023-12-11 17:28:27', NULL, NULL, 'Y'),
(226, 'صدام فرحان', '77000000', 'test@gmail.com', 1, '2023-12-12 17:28:27', NULL, NULL, 'Y'),
(227, 'صدام كلاب', '77000000', 'test@gmail.com', 1, '2023-12-13 17:28:27', NULL, NULL, 'Y'),
(228, 'صفوان', '77000000', 'test@gmail.com', 1, '2023-12-14 17:28:27', NULL, NULL, 'Y'),
(229, 'صلاح الريمي', '77000000', 'test@gmail.com', 1, '2023-12-15 17:28:27', NULL, NULL, 'Y'),
(230, 'صهيب', '77000000', 'test@gmail.com', 1, '2023-12-16 17:28:27', NULL, NULL, 'Y'),
(231, 'ضايعات', '77000000', 'test@gmail.com', 1, '2023-12-17 17:28:27', NULL, NULL, 'Y'),
(232, 'ضمانه غسان ', '77000000', 'test@gmail.com', 1, '2023-12-18 17:28:27', NULL, NULL, 'Y'),
(233, 'ضيف الله الاغبري', '77000000', 'test@gmail.com', 1, '2023-12-19 17:28:27', NULL, NULL, 'Y'),
(234, 'ضيف الله البدري', '77000000', 'test@gmail.com', 1, '2023-12-20 17:28:27', NULL, NULL, 'Y'),
(235, 'طالب', '77000000', 'test@gmail.com', 1, '2023-12-21 17:28:27', NULL, NULL, 'Y'),
(236, 'طاهر', '77000000', 'test@gmail.com', 1, '2023-12-22 17:28:27', NULL, NULL, 'Y'),
(237, 'طه فقيه', '77000000', 'test@gmail.com', 1, '2023-12-23 17:28:27', NULL, NULL, 'Y'),
(238, 'عادل البدري', '77000000', 'test@gmail.com', 1, '2023-12-24 17:28:27', NULL, NULL, 'Y'),
(239, 'عادل حيران', '77000000', 'test@gmail.com', 1, '2023-12-25 17:28:27', NULL, NULL, 'Y'),
(240, 'عاصم الحاشدي', '77000000', 'test@gmail.com', 1, '2023-12-26 17:28:27', NULL, NULL, 'Y'),
(241, 'عاصم غباسي', '77000000', 'test@gmail.com', 1, '2023-12-27 17:28:27', NULL, NULL, 'Y'),
(242, 'عاصم مثلث', '77000000', 'test@gmail.com', 1, '2023-12-28 17:28:27', NULL, NULL, 'Y'),
(243, 'عامل علي صرفي ', '77000000', 'test@gmail.com', 1, '2023-12-29 17:28:27', NULL, NULL, 'Y'),
(244, 'عامل محمد يحي ', '77000000', 'test@gmail.com', 1, '2023-12-30 17:28:27', NULL, NULL, 'Y'),
(245, 'عبدالحكيم ', '77000000', 'test@gmail.com', 1, '2023-12-31 17:28:27', NULL, NULL, 'Y'),
(246, 'عبدالرحمن', '77000000', 'test@gmail.com', 1, '2024-01-01 17:28:27', NULL, NULL, 'Y'),
(247, 'عبدالرحمن الانسي', '77000000', 'test@gmail.com', 1, '2024-01-02 17:28:27', NULL, NULL, 'Y'),
(248, 'عبدالرحمن الانسي', '77000000', 'test@gmail.com', 1, '2024-01-03 17:28:27', NULL, NULL, 'Y'),
(249, 'عبدالسلام المهندس الكترونيات', '77000000', 'test@gmail.com', 1, '2024-01-04 17:28:27', NULL, NULL, 'Y'),
(250, 'عبدالغني الحاشدي', '77000000', 'test@gmail.com', 1, '2024-01-05 17:28:27', NULL, NULL, 'Y'),
(251, 'عبدالغني دكام ', '77000000', 'test@gmail.com', 1, '2024-01-06 17:28:27', NULL, NULL, 'Y'),
(252, 'عبدالغني مانع', '77000000', 'test@gmail.com', 1, '2024-01-07 17:28:27', NULL, NULL, 'Y'),
(253, 'عبدالغني مانع', '77000000', 'test@gmail.com', 1, '2024-01-08 17:28:27', NULL, NULL, 'Y'),
(254, 'عبدالكريم القطاع', '77000000', 'test@gmail.com', 1, '2024-01-09 17:28:27', NULL, NULL, 'Y'),
(255, 'عبدالكريم القطاع ', '77000000', 'test@gmail.com', 1, '2024-01-10 17:28:27', NULL, NULL, 'Y'),
(256, 'عبدالكريم المصلح', '77000000', 'test@gmail.com', 1, '2024-01-11 17:28:27', NULL, NULL, 'Y'),
(257, 'عبدالكريم صالح حج القطاع', '77000000', 'test@gmail.com', 1, '2024-01-12 17:28:27', NULL, NULL, 'Y'),
(258, 'عبداللطيف برقق', '77000000', 'test@gmail.com', 1, '2024-01-13 17:28:27', NULL, NULL, 'Y'),
(259, 'عبدالله', '77000000', 'test@gmail.com', 1, '2024-01-14 17:28:27', NULL, NULL, 'Y'),
(260, 'عبدالله الازرق', '77000000', 'test@gmail.com', 1, '2024-01-15 17:28:27', NULL, NULL, 'Y'),
(261, 'عبدالله الحاشدي', '77000000', 'test@gmail.com', 1, '2024-01-16 17:28:27', NULL, NULL, 'Y'),
(262, 'عبدالله شمسان', '77000000', 'test@gmail.com', 1, '2024-01-17 17:28:27', NULL, NULL, 'Y'),
(263, 'عبدالله علي', '77000000', 'test@gmail.com', 1, '2024-01-18 17:28:27', NULL, NULL, 'Y'),
(264, 'عبدالمغني', '77000000', 'test@gmail.com', 1, '2024-01-19 17:28:27', NULL, NULL, 'Y'),
(265, 'عبدالهادي العباد', '77000000', 'test@gmail.com', 1, '2024-01-20 17:28:27', NULL, NULL, 'Y'),
(266, 'عبدالواحد الجايفي', '77000000', 'test@gmail.com', 1, '2024-01-21 17:28:27', NULL, NULL, 'Y'),
(267, 'عبدالواسع', '77000000', 'test@gmail.com', 1, '2024-01-22 17:28:27', NULL, NULL, 'Y'),
(268, 'عبدالولي قاطن', '77000000', 'test@gmail.com', 1, '2024-01-23 17:28:27', NULL, NULL, 'Y'),
(269, 'عبده احمد', '77000000', 'test@gmail.com', 1, '2024-01-24 17:28:27', NULL, NULL, 'Y'),
(270, 'عبده المصري', '77000000', 'test@gmail.com', 1, '2024-01-25 17:28:27', NULL, NULL, 'Y'),
(271, 'عبده حسن حجي ', '77000000', 'test@gmail.com', 1, '2024-01-26 17:28:27', NULL, NULL, 'Y'),
(272, 'عبده حسين عبده', '77000000', 'test@gmail.com', 1, '2024-01-27 17:28:27', NULL, NULL, 'Y'),
(273, 'عبده راشد ', '77000000', 'test@gmail.com', 1, '2024-01-28 17:28:27', NULL, NULL, 'Y'),
(274, 'عبده شرف', '77000000', 'test@gmail.com', 1, '2024-01-29 17:28:27', NULL, NULL, 'Y'),
(275, 'عبده صغير', '77000000', 'test@gmail.com', 1, '2024-01-30 17:28:27', NULL, NULL, 'Y'),
(276, 'عدنان الريمي', '77000000', 'test@gmail.com', 1, '2024-01-31 17:28:27', NULL, NULL, 'Y'),
(277, 'عرفات', '77000000', 'test@gmail.com', 1, '2024-02-01 17:28:27', NULL, NULL, 'Y'),
(278, 'عزالدين العليمي', '77000000', 'test@gmail.com', 1, '2024-02-02 17:28:27', NULL, NULL, 'Y'),
(279, 'عصام النويره', '77000000', 'test@gmail.com', 1, '2024-02-03 17:28:27', NULL, NULL, 'Y'),
(280, 'عصام جوحل ', '77000000', 'test@gmail.com', 1, '2024-02-04 17:28:27', NULL, NULL, 'Y'),
(281, 'عصام شنب', '77000000', 'test@gmail.com', 1, '2024-02-05 17:28:27', NULL, NULL, 'Y'),
(282, 'عصام مذكور', '77000000', 'test@gmail.com', 1, '2024-02-06 17:28:27', NULL, NULL, 'Y'),
(283, 'عقلان', '77000000', 'test@gmail.com', 1, '2024-02-07 17:28:27', NULL, NULL, 'Y'),
(284, 'عقيل الصباح', '77000000', 'test@gmail.com', 1, '2024-02-08 17:28:27', NULL, NULL, 'Y'),
(285, 'عقيل مارب', '77000000', 'test@gmail.com', 1, '2024-02-09 17:28:27', NULL, NULL, 'Y'),
(286, 'علوي', '77000000', 'test@gmail.com', 1, '2024-02-10 17:28:27', NULL, NULL, 'Y'),
(287, 'علي  حسن', '77000000', 'test@gmail.com', 1, '2024-02-11 17:28:27', NULL, NULL, 'Y'),
(288, 'علي اخو المليون', '77000000', 'test@gmail.com', 1, '2024-02-12 17:28:27', NULL, NULL, 'Y'),
(289, 'علي الانسي', '77000000', 'test@gmail.com', 1, '2024-02-13 17:28:27', NULL, NULL, 'Y'),
(290, 'علي العمراني', '77000000', 'test@gmail.com', 1, '2024-02-14 17:28:27', NULL, NULL, 'Y'),
(291, 'علي المنتصر', '77000000', 'test@gmail.com', 1, '2024-02-15 17:28:27', NULL, NULL, 'Y'),
(292, 'علي انسي', '77000000', 'test@gmail.com', 1, '2024-02-16 17:28:27', NULL, NULL, 'Y'),
(293, 'علي انسي الجبلي', '77000000', 'test@gmail.com', 1, '2024-02-17 17:28:27', NULL, NULL, 'Y'),
(294, 'علي إسماعيل', '77000000', 'test@gmail.com', 1, '2024-02-18 17:28:27', NULL, NULL, 'Y'),
(295, 'علي بن علي', '77000000', 'test@gmail.com', 1, '2024-02-19 17:28:27', NULL, NULL, 'Y'),
(296, 'علي جبري', '77000000', 'test@gmail.com', 1, '2024-02-20 17:28:27', NULL, NULL, 'Y'),
(297, 'علي حسن حجي', '77000000', 'test@gmail.com', 1, '2024-02-21 17:28:27', NULL, NULL, 'Y'),
(298, 'علي حميد ', '77000000', 'test@gmail.com', 1, '2024-02-22 17:28:27', NULL, NULL, 'Y'),
(299, 'علي دكام', '77000000', 'test@gmail.com', 1, '2024-02-23 17:28:27', NULL, NULL, 'Y'),
(300, 'علي زبير ', '77000000', 'test@gmail.com', 1, '2024-02-24 17:28:27', NULL, NULL, 'Y'),
(301, 'علي صرفي', '77000000', 'test@gmail.com', 1, '2024-02-25 17:28:27', NULL, NULL, 'Y'),
(302, 'علي ضيف الله ', '77000000', 'test@gmail.com', 1, '2024-02-26 17:28:27', NULL, NULL, 'Y'),
(303, 'علي عباس', '77000000', 'test@gmail.com', 1, '2024-02-27 17:28:27', NULL, NULL, 'Y'),
(304, 'علي متر', '77000000', 'test@gmail.com', 1, '2024-02-28 17:28:27', NULL, NULL, 'Y'),
(305, 'علي محسن', '77000000', 'test@gmail.com', 1, '2024-02-29 17:28:27', NULL, NULL, 'Y'),
(306, 'علي مقدام', '77000000', 'test@gmail.com', 1, '2024-03-01 17:28:27', NULL, NULL, 'Y'),
(307, 'عماد', '77000000', 'test@gmail.com', 1, '2024-03-02 17:28:27', NULL, NULL, 'Y'),
(308, 'عمار السنه', '77000000', 'test@gmail.com', 1, '2024-03-03 17:28:27', NULL, NULL, 'Y'),
(309, 'عمار نوح البحر', '77000000', 'test@gmail.com', 1, '2024-03-04 17:28:27', NULL, NULL, 'Y'),
(310, 'عوض الجبلي', '77000000', 'test@gmail.com', 1, '2024-03-05 17:28:27', NULL, NULL, 'Y'),
(311, 'عيسى الابي', '77000000', 'test@gmail.com', 1, '2024-03-06 17:28:27', NULL, NULL, 'Y'),
(312, 'غسان الارحبي', '77000000', 'test@gmail.com', 1, '2024-03-07 17:28:27', NULL, NULL, 'Y'),
(313, 'فارس عريج', '77000000', 'test@gmail.com', 1, '2024-03-08 17:28:27', NULL, NULL, 'Y'),
(314, 'فايز الحاشدي', '77000000', 'test@gmail.com', 1, '2024-03-09 17:28:27', NULL, NULL, 'Y'),
(315, 'فايز العليمي', '77000000', 'test@gmail.com', 1, '2024-03-10 17:28:27', NULL, NULL, 'Y'),
(316, 'فايز العليمي محمدغيثان', '77000000', 'test@gmail.com', 1, '2024-03-11 17:28:27', NULL, NULL, 'Y'),
(317, 'فايز الغباسي', '77000000', 'test@gmail.com', 1, '2024-03-12 17:28:27', NULL, NULL, 'Y'),
(318, 'فايز شبج', '77000000', 'test@gmail.com', 1, '2024-03-13 17:28:27', NULL, NULL, 'Y'),
(319, 'فتح', '77000000', 'test@gmail.com', 1, '2024-03-14 17:28:27', NULL, NULL, 'Y'),
(320, 'فواز الكامل', '77000000', 'test@gmail.com', 1, '2024-03-15 17:28:27', NULL, NULL, 'Y'),
(321, 'فؤاد الكبه', '77000000', 'test@gmail.com', 1, '2024-03-16 17:28:27', NULL, NULL, 'Y'),
(322, 'فيصل الجمرة', '77000000', 'test@gmail.com', 1, '2024-03-17 17:28:27', NULL, NULL, 'Y'),
(323, 'فيصل الحاشدي', '77000000', 'test@gmail.com', 1, '2024-03-18 17:28:27', NULL, NULL, 'Y'),
(324, 'فيصل عكش', '77000000', 'test@gmail.com', 1, '2024-03-19 17:28:27', NULL, NULL, 'Y'),
(325, 'فيصل محمد', '77000000', 'test@gmail.com', 1, '2024-03-20 17:28:27', NULL, NULL, 'Y'),
(326, 'قاسم الريمي', '77000000', 'test@gmail.com', 1, '2024-03-21 17:28:27', NULL, NULL, 'Y'),
(327, 'قاسي', '77000000', 'test@gmail.com', 1, '2024-03-22 17:28:27', NULL, NULL, 'Y'),
(328, 'قايد الشعبي', '77000000', 'test@gmail.com', 1, '2024-03-23 17:28:27', NULL, NULL, 'Y'),
(329, 'قايد الكبه', '77000000', 'test@gmail.com', 1, '2024-03-24 17:28:27', NULL, NULL, 'Y'),
(330, 'قصي ', '77000000', 'test@gmail.com', 1, '2024-03-25 17:28:27', NULL, NULL, 'Y'),
(331, 'قياع', '77000000', 'test@gmail.com', 1, '2024-03-26 17:28:27', NULL, NULL, 'Y'),
(332, 'قيس شملان', '77000000', 'test@gmail.com', 1, '2024-03-27 17:28:27', NULL, NULL, 'Y'),
(333, 'قيس عصدان', '77000000', 'test@gmail.com', 1, '2024-03-28 17:28:27', NULL, NULL, 'Y'),
(334, 'كرشان', '77000000', 'test@gmail.com', 1, '2024-03-29 17:28:27', NULL, NULL, 'Y'),
(335, 'ماجد', '77000000', 'test@gmail.com', 1, '2024-03-30 17:28:27', NULL, NULL, 'Y'),
(336, 'ماجد الابي', '77000000', 'test@gmail.com', 1, '2024-03-31 17:28:27', NULL, NULL, 'Y'),
(337, 'ماجد الريمي', '77000000', 'test@gmail.com', 1, '2024-04-01 17:28:27', NULL, NULL, 'Y'),
(338, 'ماجد الكامل', '77000000', 'test@gmail.com', 1, '2024-04-02 17:28:27', NULL, NULL, 'Y'),
(339, 'ماجد سنان', '77000000', 'test@gmail.com', 1, '2024-04-03 17:28:27', NULL, NULL, 'Y'),
(340, 'ماجد شمسان', '77000000', 'test@gmail.com', 1, '2024-04-04 17:28:27', NULL, NULL, 'Y'),
(341, 'ماجد قطاع', '77000000', 'test@gmail.com', 1, '2024-04-05 17:28:27', NULL, NULL, 'Y'),
(342, 'ماجد مصلح', '77000000', 'test@gmail.com', 1, '2024-04-06 17:28:27', NULL, NULL, 'Y'),
(343, 'مالك الورد', '77000000', 'test@gmail.com', 1, '2024-04-07 17:28:27', NULL, NULL, 'Y'),
(344, 'ماهر الابي', '77000000', 'test@gmail.com', 1, '2024-04-08 17:28:27', NULL, NULL, 'Y'),
(345, 'ماهر الغشمي', '77000000', 'test@gmail.com', 1, '2024-04-09 17:28:27', NULL, NULL, 'Y'),
(346, 'مبارك الريمي', '77000000', 'test@gmail.com', 1, '2024-04-10 17:28:27', NULL, NULL, 'Y'),
(347, 'مبارك غيثان', '77000000', 'test@gmail.com', 1, '2024-04-11 17:28:27', NULL, NULL, 'Y'),
(348, 'مجاهد الحاشدي', '77000000', 'test@gmail.com', 1, '2024-04-12 17:28:27', NULL, NULL, 'Y'),
(349, 'محاسب القديمي', '77000000', 'test@gmail.com', 1, '2024-04-13 17:28:27', NULL, NULL, 'Y'),
(350, 'محاسب محمد عمر', '77000000', 'test@gmail.com', 1, '2024-04-14 17:28:27', NULL, NULL, 'Y'),
(351, 'محسن الفرجي', '77000000', 'test@gmail.com', 1, '2024-04-15 17:28:27', NULL, NULL, 'Y'),
(352, 'محسن غباسي', '77000000', 'test@gmail.com', 1, '2024-04-16 17:28:27', NULL, NULL, 'Y'),
(353, 'محسن مارب', '77000000', 'test@gmail.com', 1, '2024-04-17 17:28:27', NULL, NULL, 'Y'),
(354, 'محمد احمد الفقيه', '77000000', 'test@gmail.com', 1, '2024-04-18 17:28:27', NULL, NULL, 'Y'),
(355, 'محمد احمدالابي', '77000000', 'test@gmail.com', 1, '2024-04-19 17:28:27', NULL, NULL, 'Y'),
(356, 'محمد الانسي', '77000000', 'test@gmail.com', 1, '2024-04-20 17:28:27', NULL, NULL, 'Y'),
(357, 'محمد الجمره', '77000000', 'test@gmail.com', 1, '2024-04-21 17:28:27', NULL, NULL, 'Y'),
(358, 'محمد الجنيد', '77000000', 'test@gmail.com', 1, '2024-04-22 17:28:27', NULL, NULL, 'Y'),
(359, 'محمد الحمودي', '77000000', 'test@gmail.com', 1, '2024-04-23 17:28:27', NULL, NULL, 'Y'),
(360, 'محمد الدميني ', '77000000', 'test@gmail.com', 1, '2024-04-24 17:28:27', NULL, NULL, 'Y'),
(361, 'محمد الراعي', '77000000', 'test@gmail.com', 1, '2024-04-25 17:28:27', NULL, NULL, 'Y'),
(362, 'محمد الردوم', '77000000', 'test@gmail.com', 1, '2024-04-26 17:28:27', NULL, NULL, 'Y'),
(363, 'محمد الزري', '77000000', 'test@gmail.com', 1, '2024-04-27 17:28:27', NULL, NULL, 'Y'),
(364, 'محمد السياني', '77000000', 'test@gmail.com', 1, '2024-04-28 17:28:27', NULL, NULL, 'Y'),
(365, 'محمد القشقه', '77000000', 'test@gmail.com', 1, '2024-04-29 17:28:27', NULL, NULL, 'Y'),
(366, 'محمد المحمودي', '77000000', 'test@gmail.com', 1, '2024-04-30 17:28:27', NULL, NULL, 'Y'),
(367, 'محمد المراني ', '77000000', 'test@gmail.com', 1, '2024-05-01 17:28:27', NULL, NULL, 'Y'),
(368, 'محمد المطري', '77000000', 'test@gmail.com', 1, '2024-05-02 17:28:27', NULL, NULL, 'Y'),
(369, 'محمد الورد', '77000000', 'test@gmail.com', 1, '2024-05-03 17:28:27', NULL, NULL, 'Y'),
(370, 'محمد بكيل الحاشدي', '77000000', 'test@gmail.com', 1, '2024-05-04 17:28:27', NULL, NULL, 'Y'),
(371, 'محمد حسن', '77000000', 'test@gmail.com', 1, '2024-05-05 17:28:27', NULL, NULL, 'Y'),
(372, 'محمد حفظ الله', '77000000', 'test@gmail.com', 1, '2024-05-06 17:28:27', NULL, NULL, 'Y'),
(373, 'محمد حميد الفقيه', '77000000', 'test@gmail.com', 1, '2024-05-07 17:28:27', NULL, NULL, 'Y'),
(374, 'محمد دلاق', '77000000', 'test@gmail.com', 1, '2024-05-08 17:28:27', NULL, NULL, 'Y'),
(375, 'محمد دميني', '77000000', 'test@gmail.com', 1, '2024-05-09 17:28:27', NULL, NULL, 'Y'),
(376, 'محمد عايض ', '77000000', 'test@gmail.com', 1, '2024-05-10 17:28:27', NULL, NULL, 'Y'),
(377, 'محمد عبده الابي', '77000000', 'test@gmail.com', 1, '2024-05-11 17:28:27', NULL, NULL, 'Y'),
(378, 'محمد علي الدب', '77000000', 'test@gmail.com', 1, '2024-05-12 17:28:27', NULL, NULL, 'Y'),
(379, 'محمد علي الورد', '77000000', 'test@gmail.com', 1, '2024-05-13 17:28:27', NULL, NULL, 'Y'),
(380, 'محمد علي حج القطاع', '77000000', 'test@gmail.com', 1, '2024-05-14 17:28:27', NULL, NULL, 'Y'),
(381, 'محمد عمر', '77000000', 'test@gmail.com', 1, '2024-05-15 17:28:27', NULL, NULL, 'Y'),
(382, 'محمد غيثان', '77000000', 'test@gmail.com', 1, '2024-05-16 17:28:27', NULL, NULL, 'Y'),
(383, 'محمد كرشان', '77000000', 'test@gmail.com', 1, '2024-05-17 17:28:27', NULL, NULL, 'Y'),
(384, 'محمد محبوب', '77000000', 'test@gmail.com', 1, '2024-05-18 17:28:27', NULL, NULL, 'Y'),
(385, 'محمد يحي الحاشدي', '77000000', 'test@gmail.com', 1, '2024-05-19 17:28:27', NULL, NULL, 'Y'),
(386, 'محمد يحيى القربوع', '77000000', 'test@gmail.com', 1, '2024-05-20 17:28:27', NULL, NULL, 'Y'),
(387, 'محمد يوسف', '77000000', 'test@gmail.com', 1, '2024-05-21 17:28:27', NULL, NULL, 'Y'),
(388, 'محمداحمدالفقيه', '77000000', 'test@gmail.com', 1, '2024-05-22 17:28:27', NULL, NULL, 'Y'),
(389, 'محمدالدميني', '77000000', 'test@gmail.com', 1, '2024-05-23 17:28:27', NULL, NULL, 'Y'),
(390, 'محمدعلي الدب', '77000000', 'test@gmail.com', 1, '2024-05-24 17:28:27', NULL, NULL, 'Y'),
(391, 'محمود طلال', '77000000', 'test@gmail.com', 1, '2024-05-25 17:28:27', NULL, NULL, 'Y'),
(392, 'مراد الشوعه', '77000000', 'test@gmail.com', 1, '2024-05-26 17:28:27', NULL, NULL, 'Y'),
(393, 'مراد العوبلي', '77000000', 'test@gmail.com', 1, '2024-05-27 17:28:27', NULL, NULL, 'Y'),
(394, 'مراد الكبه', '77000000', 'test@gmail.com', 1, '2024-05-28 17:28:27', NULL, NULL, 'Y'),
(395, 'مصطفى غيثان', '77000000', 'test@gmail.com', 1, '2024-05-29 17:28:27', NULL, NULL, 'Y'),
(396, 'مصلح', '77000000', 'test@gmail.com', 1, '2024-05-30 17:28:27', NULL, NULL, 'Y'),
(397, 'مطهر ', '77000000', 'test@gmail.com', 1, '2024-05-31 17:28:27', NULL, NULL, 'Y'),
(398, 'مطهر العرشي', '77000000', 'test@gmail.com', 1, '2024-06-01 17:28:27', NULL, NULL, 'Y'),
(399, 'مطهر المصلح', '77000000', 'test@gmail.com', 1, '2024-06-02 17:28:27', NULL, NULL, 'Y'),
(400, 'مطيع دهمان', '77000000', 'test@gmail.com', 1, '2024-06-03 17:28:27', NULL, NULL, 'Y'),
(401, 'مع صاحب المطعم', '77000000', 'test@gmail.com', 1, '2024-06-04 17:28:27', NULL, NULL, 'Y'),
(402, 'معاذ الحرازي', '77000000', 'test@gmail.com', 1, '2024-06-05 17:28:27', NULL, NULL, 'Y'),
(403, 'معاذ العمراني', '77000000', 'test@gmail.com', 1, '2024-06-06 17:28:27', NULL, NULL, 'Y'),
(404, 'معمر فتح', '77000000', 'test@gmail.com', 1, '2024-06-07 17:28:27', NULL, NULL, 'Y'),
(405, 'منصر ', '77000000', 'test@gmail.com', 1, '2024-06-08 17:28:27', NULL, NULL, 'Y'),
(406, 'منصور الريمي', '77000000', 'test@gmail.com', 1, '2024-06-09 17:28:27', NULL, NULL, 'Y'),
(407, 'منصور جبل', '77000000', 'test@gmail.com', 1, '2024-06-10 17:28:27', NULL, NULL, 'Y'),
(408, 'منير', '77000000', 'test@gmail.com', 1, '2024-06-11 17:28:27', NULL, NULL, 'Y'),
(409, 'منيف الحرازي', '77000000', 'test@gmail.com', 1, '2024-06-12 17:28:27', NULL, NULL, 'Y'),
(410, 'مهدي المجنه', '77000000', 'test@gmail.com', 1, '2024-06-13 17:28:27', NULL, NULL, 'Y'),
(411, 'مهيل شبج', '77000000', 'test@gmail.com', 1, '2024-06-14 17:28:27', NULL, NULL, 'Y'),
(412, 'موسى ', '77000000', 'test@gmail.com', 1, '2024-06-15 17:28:27', NULL, NULL, 'Y'),
(413, 'ناصر عريج', '77000000', 'test@gmail.com', 1, '2024-06-16 17:28:27', NULL, NULL, 'Y'),
(414, 'ناصر مانع', '77000000', 'test@gmail.com', 1, '2024-06-17 17:28:27', NULL, NULL, 'Y'),
(415, 'ناصرعريج', '77000000', 'test@gmail.com', 1, '2024-06-18 17:28:27', NULL, NULL, 'Y'),
(416, 'نايف ', '77000000', 'test@gmail.com', 1, '2024-06-19 17:28:27', NULL, NULL, 'Y'),
(417, 'نايف الراعي', '77000000', 'test@gmail.com', 1, '2024-06-20 17:28:27', NULL, NULL, 'Y'),
(418, 'نايف الملاحاني', '77000000', 'test@gmail.com', 1, '2024-06-21 17:28:27', NULL, NULL, 'Y'),
(419, 'نبيل العليمي', '77000000', 'test@gmail.com', 1, '2024-06-22 17:28:27', NULL, NULL, 'Y'),
(420, 'نبيل عدلان ', '77000000', 'test@gmail.com', 1, '2024-06-23 17:28:27', NULL, NULL, 'Y'),
(421, 'نجيب سمير', '77000000', 'test@gmail.com', 1, '2024-06-24 17:28:27', NULL, NULL, 'Y'),
(422, 'نجيب غضب', '77000000', 'test@gmail.com', 1, '2024-06-25 17:28:27', NULL, NULL, 'Y'),
(423, 'نسيم الطوقي', '77000000', 'test@gmail.com', 1, '2024-06-26 17:28:27', NULL, NULL, 'Y'),
(424, 'نشوان الحمدي', '77000000', 'test@gmail.com', 1, '2024-06-27 17:28:27', NULL, NULL, 'Y'),
(425, 'نشوان الريمي مارب', '77000000', 'test@gmail.com', 1, '2024-06-28 17:28:27', NULL, NULL, 'Y'),
(426, 'نصر الريمي', '77000000', 'test@gmail.com', 1, '2024-06-29 17:28:27', NULL, NULL, 'Y'),
(427, 'نضال المصلح', '77000000', 'test@gmail.com', 1, '2024-06-30 17:28:27', NULL, NULL, 'Y'),
(428, 'نقدا', '77000000', 'test@gmail.com', 1, '2024-07-01 17:28:27', NULL, NULL, 'Y'),
(429, 'نواف الحرازي', '77000000', 'test@gmail.com', 1, '2024-07-02 17:28:27', NULL, NULL, 'Y'),
(430, 'نواف المصري ', '77000000', 'test@gmail.com', 1, '2024-07-03 17:28:27', NULL, NULL, 'Y'),
(431, 'نورالدين', '77000000', 'test@gmail.com', 1, '2024-07-04 17:28:27', NULL, NULL, 'Y'),
(432, 'نورالدين برقق', '77000000', 'test@gmail.com', 1, '2024-07-05 17:28:27', NULL, NULL, 'Y'),
(433, 'نويره ', '77000000', 'test@gmail.com', 1, '2024-07-06 17:28:27', NULL, NULL, 'Y'),
(434, 'هاشم الغشمي', '77000000', 'test@gmail.com', 1, '2024-07-07 17:28:27', NULL, NULL, 'Y'),
(435, 'هايل الريمي', '77000000', 'test@gmail.com', 1, '2024-07-08 17:28:27', NULL, NULL, 'Y'),
(436, 'هايل عباس', '77000000', 'test@gmail.com', 1, '2024-07-09 17:28:27', NULL, NULL, 'Y'),
(437, 'هشام ', '77000000', 'test@gmail.com', 1, '2024-07-10 17:28:27', NULL, NULL, 'Y'),
(438, 'هشام القصعه', '77000000', 'test@gmail.com', 1, '2024-07-11 17:28:27', NULL, NULL, 'Y'),
(439, 'هشام القطمه', '77000000', 'test@gmail.com', 1, '2024-07-12 17:28:27', NULL, NULL, 'Y'),
(440, 'هشام غيلان', '77000000', 'test@gmail.com', 1, '2024-07-13 17:28:27', NULL, NULL, 'Y'),
(441, 'هلال الريمي', '77000000', 'test@gmail.com', 1, '2024-07-14 17:28:27', NULL, NULL, 'Y'),
(442, 'هيثم الشدادي', '77000000', 'test@gmail.com', 1, '2024-07-15 17:28:27', NULL, NULL, 'Y'),
(443, 'هيثم الشيخ', '77000000', 'test@gmail.com', 1, '2024-07-16 17:28:27', NULL, NULL, 'Y'),
(444, 'هيثم العجل', '77000000', 'test@gmail.com', 1, '2024-07-17 17:28:27', NULL, NULL, 'Y'),
(445, 'هيثم المعزبه', '77000000', 'test@gmail.com', 1, '2024-07-18 17:28:27', NULL, NULL, 'Y'),
(446, 'هيثم المنتصر', '77000000', 'test@gmail.com', 1, '2024-07-19 17:28:27', NULL, NULL, 'Y'),
(447, 'هيثم سيف', '77000000', 'test@gmail.com', 1, '2024-07-20 17:28:27', NULL, NULL, 'Y'),
(448, 'هيثم مطيع', '77000000', 'test@gmail.com', 1, '2024-07-21 17:28:27', NULL, NULL, 'Y'),
(449, 'وائل الابي', '77000000', 'test@gmail.com', 1, '2024-07-22 17:28:27', NULL, NULL, 'Y'),
(450, 'وسيم العرشي', '77000000', 'test@gmail.com', 1, '2024-07-23 17:28:27', NULL, NULL, 'Y'),
(451, 'وضاح', '77000000', 'test@gmail.com', 1, '2024-07-24 17:28:27', NULL, NULL, 'Y'),
(452, 'وليد عبيه', '77000000', 'test@gmail.com', 1, '2024-07-25 17:28:27', NULL, NULL, 'Y'),
(453, 'وليد منصر', '77000000', 'test@gmail.com', 1, '2024-07-26 17:28:27', NULL, NULL, 'Y'),
(454, 'وهيب', '77000000', 'test@gmail.com', 1, '2024-07-27 17:28:27', NULL, NULL, 'Y'),
(455, 'ياسر حميان', '77000000', 'test@gmail.com', 1, '2024-07-28 17:28:27', NULL, NULL, 'Y'),
(456, 'يحيى  سعد الجايفي', '77000000', 'test@gmail.com', 1, '2024-07-29 17:28:27', NULL, NULL, 'Y'),
(457, 'يحيى كلاب', '77000000', 'test@gmail.com', 1, '2024-07-30 17:28:27', NULL, NULL, 'Y'),
(458, 'يعقوب الريمي', '77000000', 'test@gmail.com', 1, '2024-07-31 17:28:27', NULL, NULL, 'Y'),
(459, 'يوسف الابي', '77000000', 'test@gmail.com', 1, '2024-08-01 17:28:27', NULL, NULL, 'Y'),
(460, 'يوسف الخاوي', '77000000', 'test@gmail.com', 1, '2024-08-02 17:28:27', NULL, NULL, 'Y'),
(461, 'يوسف حمود', '77000000', 'test@gmail.com', 1, '2024-08-03 17:28:27', NULL, NULL, 'Y'),
(462, 'يونس', '77000000', 'test@gmail.com', 1, '2024-08-04 17:28:27', NULL, NULL, 'Y'),
(463, 'يونس الخولاني', '77000000', 'test@gmail.com', 1, '2024-08-05 17:28:27', NULL, NULL, 'Y'),
(464, 'عبدالجليل كلاب', '77000000', 'test@gmail.com', 1, '2024-08-06 17:28:27', NULL, NULL, 'Y'),
(465, 'عبادي حميد', '77000000', 'test@gmail.com', 1, '2024-08-07 17:28:27', NULL, NULL, 'Y'),
(466, 'هشام غباسي', '77000000', 'test@gmail.com', 1, '2024-08-08 17:28:27', NULL, NULL, 'Y'),
(467, 'محمد مثنى', '77000000', 'test@gmail.com', 1, '2024-08-09 17:28:27', NULL, NULL, 'Y'),
(468, 'اسامه الفقيه', '77000000', 'test@gmail.com', 1, '2024-08-10 17:28:27', NULL, NULL, 'Y'),
(469, 'اكرم مانع', '77000000', 'test@gmail.com', 1, '2024-08-11 17:28:27', NULL, NULL, 'Y'),
(470, 'الاسطى', '77742466', '', 2, '2023-06-12 00:22:46', NULL, NULL, 'Y'),
(471, 'مجاهد', '77742466', '', 2, '2023-06-12 00:23:42', NULL, NULL, 'Y'),
(472, 'مارب', '77742466', '', 2, '2023-06-12 00:24:39', NULL, NULL, 'Y'),
(473, 'فيصل', '77742466', '', 2, '2023-06-12 00:26:09', NULL, NULL, 'Y'),
(474, 'محمد بكيل', '77742466', '', 2, '2023-06-12 00:36:18', NULL, NULL, 'Y'),
(475, 'امين الجايفي', '77742466', '', 2, '2023-06-12 00:38:47', NULL, NULL, 'Y'),
(476, 'عبادي', '77742466', '', 2, '2023-06-12 00:41:02', NULL, NULL, 'Y'),
(477, 'صادق', '77742466', '', 2, '2023-06-12 00:43:04', NULL, NULL, 'Y'),
(478, 'نبيل الولي', '77742466', '', 2, '2023-06-12 00:44:40', NULL, NULL, 'Y'),
(479, 'اصيل عبدالعزيز', '77742466', '', 2, '2023-06-12 00:45:30', NULL, NULL, 'Y'),
(480, 'محفوظ هيكل', '77742466', '', 2, '2023-06-12 00:46:04', NULL, NULL, 'Y'),
(481, 'فهد الابي', '77742466', '', 2, '2023-06-12 00:46:46', NULL, NULL, 'Y'),
(482, 'شجين', '77742466', '', 2, '2023-06-12 00:47:20', NULL, NULL, 'Y'),
(483, 'اصيل الفقية', '77742466', '', 2, '2023-06-12 00:48:14', NULL, NULL, 'Y'),
(484, 'خالد غزوان', '77742466', '', 2, '2023-06-12 00:48:44', NULL, NULL, 'Y'),
(485, 'علي الجايفي', '77742466', '', 2, '2023-06-12 00:49:16', NULL, NULL, 'Y'),
(486, 'علي عليان', '77742466', '', 2, '2023-06-12 00:49:46', NULL, NULL, 'Y'),
(487, 'عامل فيصل محمد', '77742466', '', 2, '2023-06-12 00:50:15', NULL, NULL, 'Y'),
(488, 'الخولاني صاحب السوق', '77742466', '', 2, '2023-06-12 00:50:48', NULL, NULL, 'Y'),
(489, 'محمد الحجاجي', '77742466', '', 2, '2023-06-12 00:51:20', NULL, NULL, 'Y'),
(490, 'امين العوامي', '77742466', '', 2, '2023-06-12 00:51:54', NULL, NULL, 'Y'),
(491, 'ضيف الله', '77742466', '', 2, '2023-06-12 00:52:22', NULL, NULL, 'Y'),
(492, 'فايز السامدي', '77742466', '', 2, '2023-06-12 00:52:55', NULL, NULL, 'Y'),
(493, 'السحامي', '77742466', '', 2, '2023-06-12 00:53:53', NULL, NULL, 'Y'),
(494, 'جمال توفيق حرازي', '77742466', '', 2, '2023-06-12 00:54:18', NULL, NULL, 'Y'),
(495, 'يحيى', '77742466', '', 2, '2023-06-12 00:55:11', NULL, NULL, 'Y'),
(496, 'رياض ضمانة وليد', '77742466', '', 2, '2023-06-12 00:55:54', NULL, NULL, 'Y'),
(497, 'عاصم', '77742466', '', 2, '2023-06-12 00:56:31', NULL, NULL, 'Y'),
(498, 'خالد الخاوي', '77742466', '', 2, '2023-06-12 00:57:05', NULL, NULL, 'Y'),
(499, 'عبدالله جبلي', '77742466', '', 2, '2023-06-12 00:57:37', NULL, NULL, 'Y'),
(500, 'صدام الريمي', '77742466', '', 2, '2023-06-12 00:58:06', NULL, NULL, 'Y'),
(501, 'رائد', '77742466', '', 2, '2023-06-12 00:58:39', NULL, NULL, 'Y'),
(502, 'فهيم الابي', '77742466', '', 2, '2023-06-12 00:59:07', NULL, NULL, 'Y'),
(503, 'بدر الفقيه', '77742466', '', 2, '2023-06-12 00:59:30', NULL, NULL, 'Y'),
(504, 'علي حده', '77742466', '', 2, '2023-06-12 00:59:58', NULL, NULL, 'Y'),
(505, 'محمد', '77742466', '', 2, '2023-06-12 01:00:55', NULL, NULL, 'Y'),
(506, 'بدر قطين', '77742466', '', 2, '2023-06-12 01:01:26', NULL, NULL, 'Y'),
(507, 'انس الكبه', '77742466', '', 2, '2023-06-12 01:01:56', NULL, NULL, 'Y'),
(508, 'محمد امين', '77742466', '', 2, '2023-06-12 01:02:42', NULL, NULL, 'Y'),
(509, 'فؤاد', '77742466', '', 2, '2023-06-12 01:03:22', NULL, NULL, 'Y'),
(510, 'علي الريمي', '77742466', '', 2, '2023-06-12 01:04:11', NULL, NULL, 'Y'),
(511, 'فايز قاسم', '77742466', '', 2, '2023-06-12 01:04:47', NULL, NULL, 'Y'),
(512, 'صادق الجبلي', '77742466', '', 2, '2023-06-12 01:05:18', NULL, NULL, 'Y'),
(513, 'وليد الحلاق', '77742466', '', 2, '2023-06-12 01:05:53', NULL, NULL, 'Y'),
(514, 'عامل فيصل رفيق', '77742466', '', 2, '2023-06-12 01:06:39', NULL, NULL, 'Y'),
(515, 'أكرم غباسي', '77742466', '', 2, '2023-06-12 01:07:18', NULL, NULL, 'Y'),
(516, 'عبدالرزاق الشدادي', '77742466', '', 2, '2023-06-12 01:07:42', NULL, NULL, 'Y'),
(517, 'الخدري', '77742466', '', 2, '2023-06-12 01:08:33', NULL, NULL, 'Y'),
(518, 'مالك العقاب', '77742466', '', 2, '2023-06-12 01:09:23', NULL, NULL, 'Y'),
(519, 'علي عقبه', '77742466', '', 2, '2023-06-12 01:09:55', NULL, NULL, 'Y'),
(520, 'عادل مهدي', '77742466', '', 2, '2023-06-12 01:10:42', NULL, NULL, 'Y'),
(521, 'العديني', '77742466', '', 2, '2023-06-12 01:11:09', NULL, NULL, 'Y'),
(522, 'عبدالرحمن شايع', '77742466', '', 2, '2023-06-12 01:11:45', NULL, NULL, 'Y'),
(523, 'القرن', '77742466', '', 2, '2023-06-12 01:12:15', NULL, NULL, 'Y'),
(524, 'وليد', '77742466', '', 2, '2023-06-12 01:12:57', NULL, NULL, 'Y'),
(525, 'الدكتور عامر', '77742466', '', 2, '2023-06-12 01:13:23', NULL, NULL, 'Y'),
(526, 'ياسر السنيدار', '77742466', '', 2, '2023-06-12 01:14:09', NULL, NULL, 'Y'),
(527, 'صادق عريج', '77742466', '', 2, '2023-06-12 01:14:41', NULL, NULL, 'Y'),
(528, 'صدام السباعي', '77742466', '', 2, '2023-06-12 01:15:11', NULL, NULL, 'Y');

-- --------------------------------------------------------

--
-- Structure de la table `days`
--

CREATE TABLE `days` (
  `DY_ID` int(11) NOT NULL,
  `DY_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `days`
--

INSERT INTO `days` (`DY_ID`, `DY_name`) VALUES
(1, 'السبت'),
(2, 'الأحد'),
(3, 'الأثنين'),
(4, 'الثلاثاء'),
(5, 'الأربعاء'),
(6, 'الخميس'),
(7, 'الجمعة');

-- --------------------------------------------------------

--
-- Structure de la table `paramerters`
--

CREATE TABLE `paramerters` (
  `par_id` int(11) NOT NULL,
  `par_name` varchar(100) NOT NULL,
  `par_namee` varchar(100) NOT NULL,
  `Par_phone` varchar(14) NOT NULL,
  `Par_website` text NOT NULL,
  `Par_Addr1` varchar(100) DEFAULT NULL,
  `Par_Addr1e` varchar(100) DEFAULT NULL,
  `Par_Addr2` varchar(100) NOT NULL,
  `Par_Addr2e` varchar(100) DEFAULT NULL,
  `Par_Addr3` varchar(100) DEFAULT NULL,
  `Par_Addr3e` varchar(100) DEFAULT NULL,
  `Par_whatsapp` varchar(14) DEFAULT NULL,
  `Par_logo` text DEFAULT NULL,
  `Par_INS_USER` int(6) DEFAULT 1,
  `Par_INS_DATE` datetime DEFAULT sysdate(),
  `Par_UPD_USER` int(11) DEFAULT 1,
  `Par_UPD_DATE` datetime DEFAULT sysdate(),
  `Par_FREEZE` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paramerters`
--

INSERT INTO `paramerters` (`par_id`, `par_name`, `par_namee`, `Par_phone`, `Par_website`, `Par_Addr1`, `Par_Addr1e`, `Par_Addr2`, `Par_Addr2e`, `Par_Addr3`, `Par_Addr3e`, `Par_whatsapp`, `Par_logo`, `Par_INS_USER`, `Par_INS_DATE`, `Par_UPD_USER`, `Par_UPD_DATE`, `Par_FREEZE`) VALUES
(1, 'وكالة رفيق الله السنة ', 'Agency companion of God Sunnah', '774222092', '', 'لبيع جميع انواع القات ', 'Selling all kinds of khat', 'حيوفي -أرحبي- همداني-مساحي', 'Hayoufi-welcome-Hamdani-Masahi', 'للتواصل عبر الرقم 774222092', 'To contact via the number 774222092', '777214212', '../Piecejointe/logo.jpg', NULL, '2023-01-03 00:00:00', NULL, '2023-01-03 00:00:00', '0');

-- --------------------------------------------------------

--
-- Structure de la table `programs`
--

CREATE TABLE `programs` (
  `PRO_ID` int(11) NOT NULL,
  `PRO_NAME` varchar(100) NOT NULL,
  `PRO_NAMEE` varchar(100) DEFAULT NULL,
  `PRO_FILE_NAME` varchar(20) DEFAULT NULL,
  `PRO_SYS_NAME` varchar(3) NOT NULL DEFAULT ucase('ACC'),
  `PRO_INS_USER` int(11) DEFAULT NULL,
  `PRO_INS_DATE` datetime DEFAULT sysdate(),
  `PRO_UPD_USER` int(11) DEFAULT NULL,
  `PRO_UPD_DATE` datetime DEFAULT NULL,
  `PRO_FREEZE` char(1) DEFAULT ucase('N') CHECK (`PRO_FREEZE` in (ucase('Y'),ucase('N')))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `programs`
--

INSERT INTO `programs` (`PRO_ID`, `PRO_NAME`, `PRO_NAMEE`, `PRO_FILE_NAME`, `PRO_SYS_NAME`, `PRO_INS_USER`, `PRO_INS_DATE`, `PRO_UPD_USER`, `PRO_UPD_DATE`, `PRO_FREEZE`) VALUES
(1, 'المستخدمين ', '', 'page_activities.php', 'INN', 1, '2022-08-10 14:27:43', 1, '2023-01-09 01:06:51', 'Y'),
(2, 'البرامج والصلاحيات', 'page privilege', 'page_privilege.php', 'ACC', 1, '2022-08-10 14:28:37', 1, '2023-01-09 01:07:00', 'N'),
(3, 'متغيرات النظام', 'page paramer', 'page_paramerters.php', 'ACC', 1, '2022-08-10 14:29:15', 1, '0000-00-00 00:00:00', 'Y'),
(4, 'الفروع', 'page branches', 'page_branches.php', 'ACC', 1, '2022-08-28 09:31:20', 1, '2023-01-04 04:42:02', 'Y'),
(5, 'مراكز التكلفة', 'page activities', 'page_activities.php', 'uca', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Y'),
(6, 'العملات', 'page currency', 'page_currency.php', 'INN', 1, '2022-08-28 09:31:20', 1, '0000-00-00 00:00:00', 'Y'),
(7, 'أسعار الصرف', 'page general accounts', 'page_general_ledger_', 'ACC', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Y'),
(8, 'دليل الحسابات', 'page analytical accounts', 'page_analytical_acco', 'ACC', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Y'),
(9, 'الحسابات التحليلية', 'page types', 'page_types.php', 'ACC', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Y'),
(10, 'المستندات', 'page main trans', 'page_main_trans.php', 'ACC', 1, '2022-09-25 10:30:19', 1, '0000-00-00 00:00:00', 'Y'),
(11, 'القيود اليومية', 'التقارير', 'التقارير', 'ACC', 1, '2022-10-11 23:14:31', 1, '0000-00-00 00:00:00', 'Y'),
(12, 'مراجعة القيود', '', '', 'uca', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Y'),
(13, 'شاشة الاستعلام', '', '', 'uca', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Y'),
(14, 'الأستعلام عن الحسابات', '', '', 'uca', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Y'),
(15, 'كشف الحساب', '', '', 'uca', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Y'),
(16, 'ميزان المراجعة', '', '', 'uca', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Y'),
(17, 'طباعة القيود', '', '', 'uca', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Y');

-- --------------------------------------------------------

--
-- Structure de la table `securities`
--

CREATE TABLE `securities` (
  `SEC_ID` int(6) NOT NULL,
  `SEC_BRA_ID` int(6) NOT NULL,
  `SEC_USE_ID` int(6) NOT NULL,
  `SEC_PRO_ID` int(15) NOT NULL,
  `SEC_INSERT` char(1) NOT NULL,
  `SEC_UPDATE` char(1) NOT NULL,
  `SEC_DELETE` char(1) NOT NULL,
  `SEC_SHOW` char(1) NOT NULL,
  `SEC_FREEZE` char(1) NOT NULL,
  `SEC_10` char(1) NOT NULL DEFAULT 'N',
  `SEC_11` char(1) NOT NULL DEFAULT 'N',
  `SEC_12` char(1) NOT NULL DEFAULT 'N',
  `SEC_13` char(1) NOT NULL DEFAULT 'N',
  `SEC_14` char(1) NOT NULL DEFAULT 'N',
  `SEC_15` char(1) NOT NULL DEFAULT 'N',
  `SEC_16` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `securities`
--

INSERT INTO `securities` (`SEC_ID`, `SEC_BRA_ID`, `SEC_USE_ID`, `SEC_PRO_ID`, `SEC_INSERT`, `SEC_UPDATE`, `SEC_DELETE`, `SEC_SHOW`, `SEC_FREEZE`, `SEC_10`, `SEC_11`, `SEC_12`, `SEC_13`, `SEC_14`, `SEC_15`, `SEC_16`) VALUES
(1, 0, 1, 1, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(2, 0, 1, 2, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(3, 0, 1, 3, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(4, 0, 1, 4, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(5, 0, 1, 5, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(6, 0, 1, 6, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(7, 0, 1, 7, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(8, 0, 1, 8, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(9, 0, 1, 9, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(10, 0, 1, 10, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(11, 0, 1, 11, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'Y', 'Y', 'Y', 'Y'),
(12, 0, 1, 12, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(13, 0, 1, 13, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(14, 0, 1, 14, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(15, 0, 1, 15, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(16, 0, 1, 16, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(17, 0, 1, 17, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(18, 0, 2, 1, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(19, 0, 2, 3, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(20, 0, 2, 4, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(21, 0, 2, 5, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(22, 0, 2, 6, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(23, 0, 2, 7, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(24, 0, 2, 8, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(25, 0, 2, 9, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(26, 0, 2, 10, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(27, 0, 2, 11, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(28, 0, 2, 12, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(29, 0, 2, 13, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(30, 0, 2, 14, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(31, 0, 2, 15, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(32, 0, 2, 16, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(33, 0, 2, 17, 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Structure de la table `supp`
--

CREATE TABLE `supp` (
  `SUPP_ID` int(11) NOT NULL,
  `SUPP_NAME` varchar(200) NOT NULL,
  `SUPP_PHONE` varchar(14) NOT NULL,
  `SUPP_EMAIL` varchar(50) NOT NULL,
  `SUPP_INS_USER` int(6) NOT NULL,
  `SUPP_INS_DATE` datetime DEFAULT NULL,
  `SUPP_UPD_USER` int(6) DEFAULT NULL,
  `SUPP_UPD_DATE` datetime DEFAULT current_timestamp(),
  `SUPP_FREEZE` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `supp`
--

INSERT INTO `supp` (`SUPP_ID`, `SUPP_NAME`, `SUPP_PHONE`, `SUPP_EMAIL`, `SUPP_INS_USER`, `SUPP_INS_DATE`, `SUPP_UPD_USER`, `SUPP_UPD_DATE`, `SUPP_FREEZE`) VALUES
(1, 'ذكوان', '734023407', 'ali@gmail.com', 1, '2023-05-01 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(2, 'احسن جسار', '775481245', 'abd@gmail.com', 1, '2023-05-02 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(3, 'احمد', '816939083', 'ali@gmail.com', 1, '2023-05-03 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(4, 'احمد حج', '858396921', 'abd@gmail.com', 1, '2023-05-04 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(5, 'احمد حميد الفقيه', '899854759', 'ali@gmail.com', 1, '2023-05-05 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(6, 'احمد رفيق الله النجار', '941312597', 'abd@gmail.com', 1, '2023-05-06 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(7, 'احمد هادي حج القطاع', '982770435', 'ali@gmail.com', 1, '2023-05-07 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(8, 'اخو سعد', '1024228273', 'abd@gmail.com', 1, '2023-05-08 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(9, 'ادهم المنتصر', '1065686111', 'ali@gmail.com', 1, '2023-05-09 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(10, 'اشرف المنتصر', '1107143949', 'abd@gmail.com', 1, '2023-05-10 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(11, 'اصيل الفقيه', '1148601787', 'ali@gmail.com', 1, '2023-05-11 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(12, 'اصيل المنتصر', '1190059625', 'abd@gmail.com', 1, '2023-05-12 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(13, 'اكرم القطاع', '1231517463', 'ali@gmail.com', 1, '2023-05-13 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(14, 'اكرم مانع', '1272975301', 'abd@gmail.com', 1, '2023-05-14 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(15, 'البراري', '1314433139', 'ali@gmail.com', 1, '2023-05-15 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(16, 'السبايا', '1355890977', 'abd@gmail.com', 1, '2023-05-16 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(17, 'السياغي', '1397348815', 'ali@gmail.com', 1, '2023-05-17 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(18, 'الشعبي', '1438806653', 'abd@gmail.com', 1, '2023-05-18 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(19, 'العباد ابن هادي', '1480264491', 'ali@gmail.com', 1, '2023-05-19 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(20, 'القطيلي', '1521722329', 'ali@gmail.com', 1, '2023-05-20 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(21, 'المطري', '1563180167', 'abd@gmail.com', 1, '2023-05-21 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(22, 'الوشلي', '1604638005', 'ali@gmail.com', 1, '2023-05-22 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(23, 'الوقشي', '1646095843', 'abd@gmail.com', 1, '2023-05-23 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(24, 'امين العراقي', '1687553681', 'ali@gmail.com', 1, '2023-05-24 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(25, 'ايمن شرهان', '1729011519', 'abd@gmail.com', 1, '2023-05-25 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(26, 'إبراهيم القطاع', '1770469357', 'ali@gmail.com', 1, '2023-05-26 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(27, 'إبراهيم هيكل', '1811927195', 'abd@gmail.com', 1, '2023-05-27 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(28, 'أكرم الانسي', '1853385033', 'ali@gmail.com', 1, '2023-05-28 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(29, 'بشار عبده المنتصر', '1894842871', 'abd@gmail.com', 1, '2023-05-29 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(30, 'بشير المنتصر', '1936300709', 'ali@gmail.com', 1, '2023-05-30 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(31, 'بشير جسار', '1977758547', 'abd@gmail.com', 1, '2023-05-31 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(32, 'بشير عبدالله القطاع', '2019216385', 'ali@gmail.com', 1, '2023-06-01 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(33, 'بكيل الجبلي', '2060674223', 'abd@gmail.com', 1, '2023-06-02 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(34, 'توفيق الحرازي', '2102132061', 'ali@gmail.com', 1, '2023-06-03 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(35, 'جبران الابي', '2143589899', 'abd@gmail.com', 1, '2023-06-04 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(36, 'جعبان', '2185047737', 'ali@gmail.com', 1, '2023-06-05 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(37, 'جمال القطاع', '2226505575', 'abd@gmail.com', 1, '2023-06-06 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(38, 'حازم امين', '2267963413', 'ali@gmail.com', 1, '2023-06-07 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(39, 'حاشد المنتصر', '2309421251', 'ali@gmail.com', 1, '2023-06-08 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(40, 'حافظ القطيلي', '2350879089', 'abd@gmail.com', 1, '2023-06-09 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(41, 'حامد المنتصر', '2392336927', 'ali@gmail.com', 1, '2023-06-10 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(42, 'حامد هادي المنتصر', '2433794765', 'abd@gmail.com', 1, '2023-06-11 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(43, 'حسين حج', '2475252603', 'ali@gmail.com', 1, '2023-06-12 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(44, 'حسين مهدي', '2516710441', 'abd@gmail.com', 1, '2023-06-13 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(45, 'حصن المنتصر', '2558168279', 'ali@gmail.com', 1, '2023-06-14 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(46, 'حكيم', '2599626117', 'abd@gmail.com', 1, '2023-06-15 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(47, 'حمير', '2641083955', 'ali@gmail.com', 1, '2023-06-16 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(48, 'خالد عبدالله مفلح', '2682541793', 'abd@gmail.com', 1, '2023-06-17 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(49, 'خالد محمد المالكي', '2723999631', 'ali@gmail.com', 1, '2023-06-18 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(50, 'خليل حفظ الله خليل', '2765457469', 'abd@gmail.com', 1, '2023-06-19 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(51, 'ربيع علي جميل', '2806915307', 'ali@gmail.com', 1, '2023-06-20 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(52, 'رسام جسار', '2848373145', 'abd@gmail.com', 1, '2023-06-21 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(53, 'رشوان الابي', '2889830983', 'ali@gmail.com', 1, '2023-06-22 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(54, 'رمضان', '2931288821', 'abd@gmail.com', 1, '2023-06-23 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(55, 'رنين الله النجار', '2972746659', 'ali@gmail.com', 1, '2023-06-24 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(56, 'زيد علي', '3014204497', 'abd@gmail.com', 1, '2023-06-25 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(57, 'سلطان عبدالعزيز القطاع', '3055662335', 'ali@gmail.com', 1, '2023-06-26 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(58, 'سلمان', '3097120173', 'ali@gmail.com', 1, '2023-06-27 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(59, 'شايف المنتصر', '3138578011', 'abd@gmail.com', 1, '2023-06-28 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(60, 'شمان القضبه', '3180035849', 'ali@gmail.com', 1, '2023-06-29 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(61, 'شمسان المنتصر', '3221493687', 'abd@gmail.com', 1, '2023-06-30 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(62, 'صالح الراعي', '3262951525', 'ali@gmail.com', 1, '2023-07-01 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(63, 'صالح القطاع', '3304409363', 'abd@gmail.com', 1, '2023-07-02 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(64, 'صالح عبدالله علي النجار', '3345867201', 'ali@gmail.com', 1, '2023-07-03 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(65, 'صدام النفيعي', '3387325039', 'abd@gmail.com', 1, '2023-07-04 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(66, 'صدام النقيب', '3428782877', 'ali@gmail.com', 1, '2023-07-05 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(67, 'صفوان', '3470240715', 'abd@gmail.com', 1, '2023-07-06 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(68, 'طاهر', '3511698553', 'ali@gmail.com', 1, '2023-07-07 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(69, 'طه المنتصر', '3553156391', 'abd@gmail.com', 1, '2023-07-08 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(70, 'عبدالجليل قاطن', '3594614229', 'ali@gmail.com', 1, '2023-07-09 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(71, 'عبدالعزيز السحامي', '3636072067', 'abd@gmail.com', 1, '2023-07-10 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(72, 'عبدالكريم صالح القطاع', '3677529905', 'ali@gmail.com', 1, '2023-07-11 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(73, 'عبدالكريم صالح حج القطاع', '3718987743', 'abd@gmail.com', 1, '2023-07-12 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(74, 'عبدالمجيد صالح حج القطاع', '3760445581', 'ali@gmail.com', 1, '2023-07-13 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(75, 'عبدالمجيد راشد القطاع', '3801903419', 'abd@gmail.com', 1, '2023-07-14 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(76, 'عبدالواحد العزب', '3843361257', 'ali@gmail.com', 1, '2023-07-15 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(77, 'عبدالولي قاطن', '3884819095', 'ali@gmail.com', 1, '2023-07-16 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(78, 'عبدالوهاب المنتصر', '3926276933', 'abd@gmail.com', 1, '2023-07-17 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(79, 'عبده حسين عبده', '3967734771', 'ali@gmail.com', 1, '2023-07-18 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(80, 'عبده هادي حج القطاع', '4009192609', 'abd@gmail.com', 1, '2023-07-19 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(81, 'علي حسن حجي', '4050650447', 'ali@gmail.com', 1, '2023-07-20 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(82, 'علي حميان ', '4092108285', 'abd@gmail.com', 1, '2023-07-21 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(83, 'علي دكام', '4133566123', 'ali@gmail.com', 1, '2023-07-22 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(84, 'علي ذرة', '4175023961', 'abd@gmail.com', 1, '2023-07-23 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(85, 'علي صالح القطاع', '4216481799', 'ali@gmail.com', 1, '2023-07-24 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(86, 'علي صالح المنتصر الاخير ', '4257939637', 'abd@gmail.com', 1, '2023-07-25 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(87, 'علي صرفي', '4299397475', 'ali@gmail.com', 1, '2023-07-26 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(88, 'عمار السنه', '4340855313', 'abd@gmail.com', 1, '2023-07-27 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(89, 'عمار قاطن', '4382313151', 'ali@gmail.com', 1, '2023-07-28 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(90, 'عمار ناجي عراقي', '4423770989', 'abd@gmail.com', 1, '2023-07-29 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(91, 'قاسي', '4465228827', 'ali@gmail.com', 1, '2023-07-30 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(92, 'قايد القطاع', '4506686665', 'abd@gmail.com', 1, '2023-07-31 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(93, 'قطاع', '4548144503', 'ali@gmail.com', 1, '2023-08-01 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(94, 'مازن ', '4589602341', 'abd@gmail.com', 1, '2023-08-02 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(95, 'محسن الشجع', '4631060179', 'ali@gmail.com', 1, '2023-08-03 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(96, 'محفوظ القطاع', '4672518017', 'ali@gmail.com', 1, '2023-08-04 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(97, 'محمد احمد الفقيه', '4713975855', 'abd@gmail.com', 1, '2023-08-05 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(98, 'محمد السنه', '4755433693', 'ali@gmail.com', 1, '2023-08-06 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(99, 'محمد امين المنتصر', '4796891531', 'abd@gmail.com', 1, '2023-08-07 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(100, 'محمد حسين القطاع', '4838349369', 'ali@gmail.com', 1, '2023-08-08 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(101, 'محمد حسين اقايد المنتصر', '4879807207', 'abd@gmail.com', 1, '2023-08-09 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(102, 'محمد حفظ الله', '4921265045', 'ali@gmail.com', 1, '2023-08-10 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(103, 'محمد حميد الفقيه', '4962722883', 'abd@gmail.com', 1, '2023-08-11 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(104, 'محمد حميد القطاع', '5004180721', 'ali@gmail.com', 1, '2023-08-12 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(105, 'محمد صالح ابوبكر', '5045638559', 'abd@gmail.com', 1, '2023-08-13 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(106, 'محمد صالح السفياني', '5087096397', 'ali@gmail.com', 1, '2023-08-14 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(107, 'محمد صالح القطاع', '5128554235', 'abd@gmail.com', 1, '2023-08-15 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(108, 'محمد عبدالله إسماعيل الحيمي', '5170012073', 'ali@gmail.com', 1, '2023-08-16 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(109, 'محمد علي النجار', '5211469911', 'abd@gmail.com', 1, '2023-08-17 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(110, 'محمد علي حج القطاع', '5252927749', 'ali@gmail.com', 1, '2023-08-18 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(111, 'محمد محسن احسن', '5294385587', 'abd@gmail.com', 1, '2023-08-19 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(112, 'محمد مهدي المغربي', '5335843425', 'ali@gmail.com', 1, '2023-08-20 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(113, 'محمد ناجي المنتصر', '5377301263', 'abd@gmail.com', 1, '2023-08-21 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(114, 'محمد هادي القطاع', '5418759101', 'ali@gmail.com', 1, '2023-08-22 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(115, 'مطيع ابن الرعوي', '5460216939', 'ali@gmail.com', 1, '2023-08-23 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(116, 'مطيع دهمان', '5501674777', 'abd@gmail.com', 1, '2023-08-24 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(117, 'مقداد القطاع', '5543132615', 'ali@gmail.com', 1, '2023-08-25 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(118, 'مهند عبدالله القطاع', '5584590453', 'abd@gmail.com', 1, '2023-08-26 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(119, 'ناجي القطاع', '5626048291', 'ali@gmail.com', 1, '2023-08-27 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(120, 'نايف الجبلي', '5667506129', 'abd@gmail.com', 1, '2023-08-28 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(121, 'نايف النجار', '5708963967', 'ali@gmail.com', 1, '2023-08-29 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(122, 'هزاع القطاع', '5750421805', 'abd@gmail.com', 1, '2023-08-30 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(123, 'هلال الريمي', '5791879643', 'ali@gmail.com', 1, '2023-08-31 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(124, 'همدان دهمان', '5833337481', 'abd@gmail.com', 1, '2023-09-01 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(125, 'هيثم المنتصر', '5874795319', 'ali@gmail.com', 1, '2023-09-02 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(126, 'وليد منصر', '5916253157', 'abd@gmail.com', 1, '2023-09-03 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(127, 'ياسر حميان', '5957710995', 'ali@gmail.com', 1, '2023-09-04 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(128, 'ياسر لطف', '5999168833', 'abd@gmail.com', 1, '2023-09-05 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(129, 'يحيى كلاب', '6040626671', 'ali@gmail.com', 1, '2023-09-06 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(130, 'يوسف الحنمي', '6082084509', 'abd@gmail.com', 1, '2023-09-07 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(131, 'ايمن القطاع', '6123542347', 'ali@gmail.com', 1, '2023-09-08 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(132, 'طاهر النوباني', '6165000185', 'abd@gmail.com', 1, '2023-09-09 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(133, 'احمد حسن حجي', '6206458023', 'ali@gmail.com', 1, '2023-09-10 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(134, 'احمد المنتصر', '6247915861', 'ali@gmail.com', 1, '2023-09-11 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(135, 'علي حج', '6289373699', 'ali@gmail.com', 1, '2023-09-12 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(136, 'عبده احمد صالح المنتصر', '6330831537', 'ali@gmail.com', 1, '2023-09-13 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(137, 'محمد قاسم النجار', '6372289375', 'ali@gmail.com', 1, '2023-09-14 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(138, 'جمهور', '6413747213', 'ali@gmail.com', 1, '2023-09-15 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(139, 'قصي', '6455205051', 'ali@gmail.com', 1, '2023-09-16 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(140, 'محمد محمد النجار', '6496662889', 'ali@gmail.com', 1, '2023-09-17 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(141, 'صالح جارالله', '6538120727', 'ali@gmail.com', 1, '2023-09-18 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(142, 'محفوظ هيكل', '6579578565', 'ali@gmail.com', 1, '2023-09-19 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(143, 'وليد الظفيري', '6621036403', 'ali@gmail.com', 1, '2023-09-20 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(144, 'علي صالح منتصر', '6662494241', 'ali@gmail.com', 1, '2023-09-21 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(145, 'بلال خليل', '6703952079', 'ali@gmail.com', 1, '2023-09-22 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(146, 'زايدي زايد', '6745409917', 'ali@gmail.com', 1, '2023-09-23 17:28:27', NULL, '2023-06-02 14:15:54', 'Y'),
(147, 'مجهول', '7777777777', '', 2, NULL, NULL, '2023-06-13 18:58:13', 'Y');

-- --------------------------------------------------------

--
-- Structure de la table `tn_c`
--

CREATE TABLE `tn_c` (
  `TC_V_ID` bigint(10) NOT NULL,
  `TC_SER` smallint(4) NOT NULL,
  `TC_DY` int(11) NOT NULL,
  `VC_CUSTID` int(11) NOT NULL,
  `TCNUM` decimal(15,2) NOT NULL,
  `TC_PRC` decimal(15,2) NOT NULL,
  `TC_TOT` decimal(15,2) NOT NULL,
  `TCCOMIS` decimal(15,2) DEFAULT NULL,
  `TCCOMISM` decimal(15,2) DEFAULT NULL,
  `TCTOTDISC` decimal(15,2) DEFAULT NULL,
  `TCTOTDISCM` decimal(15,2) DEFAULT NULL,
  `TCPST` int(11) DEFAULT NULL,
  `TCNT` text DEFAULT NULL,
  `TC_DAT` datetime DEFAULT sysdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tn_c`
--

INSERT INTO `tn_c` (`TC_V_ID`, `TC_SER`, `TC_DY`, `VC_CUSTID`, `TCNUM`, `TC_PRC`, `TC_TOT`, `TCCOMIS`, `TCCOMISM`, `TCTOTDISC`, `TCTOTDISCM`, `TCPST`, `TCNT`, `TC_DAT`) VALUES
(1, 1, 1, 2, '9.00', '200.00', '1800.00', '144.00', '97.20', '1944.00', '1846.80', 9, '', '2023-07-04 00:00:00'),
(1, 2, 1, 2, '8.00', '300.00', '2400.00', '192.00', '129.60', '2592.00', '2462.40', 9, '', '2023-07-04 00:00:00'),
(1, 3, 1, 3, '8.00', '500.00', '4000.00', '320.00', '216.00', '4320.00', '4104.00', 9, '', '2023-07-04 00:00:00'),
(1, 4, 1, 3, '8.00', '4000.00', '32000.00', '2560.00', '1728.00', '34560.00', '32832.00', 9, '', '2023-07-04 00:00:00'),
(1, 5, 1, 11, '6.00', '7000.00', '42000.00', '3360.00', '2268.00', '45360.00', '43092.00', 9, '', '2023-07-04 00:00:00'),
(1, 6, 1, 11, '7.00', '800.00', '5600.00', '448.00', '302.40', '6048.00', '5745.60', 9, '', '2023-07-04 00:00:00'),
(2, 1, 6, 445, '20.00', '2000.00', '40000.00', '0.00', '0.00', '40000.00', '40000.00', 27, '', '2021-09-05 00:00:00'),
(2, 2, 6, 428, '6.00', '1500.00', '9000.00', '0.00', '0.00', '9000.00', '9000.00', 27, '', '2021-09-05 00:00:00'),
(2, 3, 6, 138, '20.00', '1500.00', '30000.00', '0.00', '0.00', '30000.00', '30000.00', 27, '', '2021-09-05 00:00:00'),
(2, 4, 6, 428, '1.00', '10000.00', '10000.00', '0.00', '0.00', '10000.00', '10000.00', 27, '', '2021-09-05 00:00:00'),
(2, 5, 6, 0, '2.00', '1700.00', '3400.00', '0.00', '0.00', '3400.00', '3400.00', 27, '', '2021-09-05 00:00:00'),
(2, 6, 6, 177, '13.00', '1400.00', '18200.00', '0.00', '0.00', '18200.00', '18200.00', 27, '', '2021-09-05 00:00:00'),
(3, 1, 1, 1, '20.00', '2000.00', '40000.00', '0.00', '0.00', '40000.00', '40000.00', 2, '', '2023-07-04 00:00:00'),
(3, 2, 1, 1, '10.00', '3000.00', '30000.00', '0.00', '0.00', '30000.00', '30000.00', 2, '', '2023-07-04 00:00:00'),
(3, 3, 1, 8, '9.00', '5000.00', '45000.00', '0.00', '0.00', '45000.00', '45000.00', 2, '', '2023-07-04 00:00:00'),
(3, 4, 1, 8, '8.00', '600.00', '4800.00', '0.00', '0.00', '4800.00', '4800.00', 2, '', '2023-07-04 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `tn_s`
--

CREATE TABLE `tn_s` (
  `TS_V_ID` bigint(10) NOT NULL,
  `TS_SER` smallint(4) NOT NULL,
  `TS_DY` int(11) NOT NULL,
  `TSDAT` datetime NOT NULL,
  `VS_CUSTID` int(11) NOT NULL DEFAULT 0,
  `TS_NUM` decimal(10,0) NOT NULL,
  `TS_PRC` decimal(15,2) NOT NULL,
  `TS_TOT` decimal(15,2) NOT NULL,
  `TS_DISC` decimal(15,2) NOT NULL,
  `TSTOTDISC` decimal(15,2) NOT NULL,
  `TSNT` text DEFAULT NULL,
  `TSTOTSALE` decimal(15,2) NOT NULL,
  `TSMUS` decimal(15,2) NOT NULL,
  `TSMUST` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tn_s`
--

INSERT INTO `tn_s` (`TS_V_ID`, `TS_SER`, `TS_DY`, `TSDAT`, `VS_CUSTID`, `TS_NUM`, `TS_PRC`, `TS_TOT`, `TS_DISC`, `TSTOTDISC`, `TSNT`, `TSTOTSALE`, `TSMUS`, `TSMUST`) VALUES
(1, 1, 1, '2023-07-04 00:00:00', 2, '9', '200.00', '1800.00', '144.00', '1656.00', '', '80700.00', '40000.00', '0.00'),
(1, 2, 1, '2023-07-04 00:00:00', 2, '8', '300.00', '2400.00', '192.00', '2208.00', '', '80700.00', '40000.00', '0.00'),
(1, 3, 1, '2023-07-04 00:00:00', 3, '8', '500.00', '4000.00', '320.00', '3680.00', '', '80700.00', '40000.00', '0.00'),
(1, 4, 1, '2023-07-04 00:00:00', 3, '8', '4000.00', '32000.00', '2560.00', '29440.00', '', '80700.00', '40000.00', '0.00'),
(1, 5, 1, '2023-07-04 00:00:00', 11, '6', '7000.00', '42000.00', '3360.00', '38640.00', '', '80700.00', '40000.00', '0.00'),
(1, 6, 1, '2023-07-04 00:00:00', 11, '7', '800.00', '5600.00', '448.00', '5152.00', '', '80700.00', '40000.00', '0.00'),
(2, 1, 6, '2021-09-05 00:00:00', 445, '20', '2000.00', '40000.00', '3200.00', '36800.00', '', '101700.00', '20000.00', '0.00'),
(2, 2, 6, '2021-09-05 00:00:00', 428, '6', '1500.00', '9000.00', '720.00', '8280.00', '', '101700.00', '20000.00', '0.00'),
(2, 3, 6, '2021-09-05 00:00:00', 138, '20', '1500.00', '30000.00', '2400.00', '27600.00', '', '101700.00', '20000.00', '0.00'),
(2, 4, 6, '2021-09-05 00:00:00', 428, '1', '10000.00', '10000.00', '800.00', '9200.00', '', '101700.00', '20000.00', '0.00'),
(2, 5, 6, '2021-09-05 00:00:00', 0, '2', '1700.00', '3400.00', '272.00', '3128.00', '', '101700.00', '20000.00', '0.00'),
(2, 6, 6, '2021-09-05 00:00:00', 177, '13', '1400.00', '18200.00', '1456.00', '16744.00', '', '101700.00', '20000.00', '0.00'),
(3, 1, 1, '2023-07-04 00:00:00', 1, '20', '2000.00', '40000.00', '3200.00', '36800.00', '', '110200.00', '110000.00', '40000.00'),
(3, 2, 1, '2023-07-04 00:00:00', 1, '10', '3000.00', '30000.00', '2400.00', '27600.00', '', '110200.00', '110000.00', '50000.00'),
(3, 3, 1, '2023-07-04 00:00:00', 8, '9', '5000.00', '45000.00', '3600.00', '41400.00', '', '110200.00', '110000.00', '10000.00'),
(3, 4, 1, '2023-07-04 00:00:00', 8, '8', '600.00', '4800.00', '384.00', '4416.00', '', '110200.00', '110000.00', '10000.00');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `TYP_ID` smallint(3) NOT NULL,
  `TYP_NAME` varchar(30) NOT NULL,
  `TYP_NAMEE` varchar(30) DEFAULT NULL,
  `TYP_REP_NAME` varchar(20) DEFAULT NULL,
  `TYP_TYPE` varchar(8) DEFAULT NULL,
  `TYP_Sig_one` varchar(30) DEFAULT NULL,
  `TYP_Sig_two` varchar(30) DEFAULT NULL,
  `TYP_Sig_three` varchar(30) DEFAULT NULL,
  `TYP_INS_USER` int(6) DEFAULT NULL,
  `TYP_INS_DATE` datetime DEFAULT sysdate(),
  `TYP_UPD_USER` int(6) DEFAULT NULL,
  `TYP_UPD_DATE` datetime DEFAULT NULL,
  `TYP_FREEZE` char(1) DEFAULT ucase('N') CHECK (`TYP_FREEZE` in (ucase('Y'),ucase('N')))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`TYP_ID`, `TYP_NAME`, `TYP_NAMEE`, `TYP_REP_NAME`, `TYP_TYPE`, `TYP_Sig_one`, `TYP_Sig_two`, `TYP_Sig_three`, `TYP_INS_USER`, `TYP_INS_DATE`, `TYP_UPD_USER`, `TYP_UPD_DATE`, `TYP_FREEZE`) VALUES
(111, 'سند صرف نقدا ', 'Cash voucher', '', '', 'المحاسب', 'المدير العام', 'المدير المالي', NULL, '0000-00-00 00:00:00', 2, '2023-01-10 12:23:02', 'Y'),
(112, 'سند صرف حوالة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, 'Y'),
(113, 'rRRTE', 'df', 'fgg', 'نقد', 'fffdd', 'f', 'f', 2, '2023-07-03 05:30:30', 2, '2023-07-03 05:31:25', 'Y'),
(114, 'YY', '', '', '', '', '', '', 2, '2023-07-03 05:36:32', NULL, NULL, 'Y');

-- --------------------------------------------------------

--
-- Structure de la table `userss`
--

CREATE TABLE `userss` (
  `Analytic_Acc_id` int(6) NOT NULL,
  `SYS_User_name` varchar(200) DEFAULT NULL,
  `USE_NAMEE` varchar(60) DEFAULT NULL,
  `USE_PARENT_ID` int(11) DEFAULT 0,
  `USE_BRA_ID` int(6) NOT NULL,
  `SYS_User_email` varchar(50) DEFAULT NULL,
  `SYS_User_login` varchar(50) DEFAULT NULL,
  `PasswordHash` varchar(200) DEFAULT NULL,
  `SYS_User_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `userss`
--

INSERT INTO `userss` (`Analytic_Acc_id`, `SYS_User_name`, `USE_NAMEE`, `USE_PARENT_ID`, `USE_BRA_ID`, `SYS_User_email`, `SYS_User_login`, `PasswordHash`, `SYS_User_status`) VALUES
(1, 'الادارة العامة', NULL, NULL, 0, 'admin3clicks@gmail.com', 'admin3clicks', 'b7f3d0375e3e45ffb75a34d62c17a134', 2),
(2, 'رفيق الله السنة', '', 0, 100, 'test@gmail.com', 'test', '098f6bcd4621d373cade4e832627b4f6', 1),
(3, 'ali', 'ali', 0, 100, 'ali@gmail.com', 'ali', 'fa377a1337126da4e11ee722242c7ba9', 1);

-- --------------------------------------------------------

--
-- Structure de la table `v_s`
--

CREATE TABLE `v_s` (
  `VS_ID` bigint(10) NOT NULL,
  `VS_TYP_ID` smallint(3) NOT NULL,
  `VS_TYP_NO` int(6) NOT NULL,
  `VS_DAT` datetime NOT NULL,
  `VOU_USE_ID` int(6) NOT NULL,
  `VS_BENF` int(11) NOT NULL DEFAULT 0,
  `VS_NT` text NOT NULL,
  `VS_ST` char(1) NOT NULL,
  `VS_Count_Print` int(11) DEFAULT NULL,
  `TSTOTDYCOM` decimal(15,2) NOT NULL,
  `TSITOTRET` decimal(15,2) NOT NULL,
  `TSTOTAMOU` decimal(15,2) NOT NULL,
  `TSTOTSALE` decimal(15,2) NOT NULL,
  `TSMUS` decimal(15,2) NOT NULL,
  `TSHISREMD` decimal(15,2) NOT NULL,
  `TSONREMD` decimal(15,2) NOT NULL,
  `TCTOTDY` decimal(15,2) DEFAULT NULL,
  `TCITOTRET` decimal(15,2) DEFAULT NULL,
  `TCTOTAMOU` decimal(15,2) DEFAULT NULL,
  `TCTOTSALE` decimal(15,2) DEFAULT NULL,
  `TCMITOTRET` decimal(15,2) DEFAULT NULL,
  `TCMTOTAMOU` decimal(15,2) DEFAULT NULL,
  `TCTOTSALEF` decimal(15,2) DEFAULT NULL,
  `TCMUS` decimal(15,2) DEFAULT NULL,
  `TCHISREMD` decimal(15,2) DEFAULT NULL,
  `TCONREMD` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `v_s`
--

INSERT INTO `v_s` (`VS_ID`, `VS_TYP_ID`, `VS_TYP_NO`, `VS_DAT`, `VOU_USE_ID`, `VS_BENF`, `VS_NT`, `VS_ST`, `VS_Count_Print`, `TSTOTDYCOM`, `TSITOTRET`, `TSTOTAMOU`, `TSTOTSALE`, `TSMUS`, `TSHISREMD`, `TSONREMD`, `TCTOTDY`, `TCITOTRET`, `TCTOTAMOU`, `TCTOTSALE`, `TCMITOTRET`, `TCMTOTAMOU`, `TCTOTSALEF`, `TCMUS`, `TCHISREMD`, `TCONREMD`) VALUES
(1, 111, 1, '2023-07-04 00:00:00', 2, 9, '', '0', NULL, '87800.00', '8.00', '7024.00', '80700.00', '40000.00', '40700.00', '0.00', '87800.00', '8.00', '7024.00', '94824.00', '5.00', '4741.20', '90082.80', '0.00', '90082.80', '0.00'),
(2, 111, 1, '2021-09-05 00:00:00', 2, 27, '', '0', NULL, '110600.00', '8.00', '8848.00', '101700.00', '20000.00', '81700.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 111, 2, '2023-07-04 00:00:00', 2, 2, 'best', '0', NULL, '119800.00', '8.00', '9584.00', '110200.00', '110000.00', '200.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `amnt_dlivd`
--
ALTER TABLE `amnt_dlivd`
  ADD PRIMARY KEY (`AMNTS_ID`),
  ADD KEY `AMNTS_V_ID` (`AMNTS_V_ID`);

--
-- Index pour la table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`Branch_id`),
  ADD UNIQUE KEY `Branch_desc` (`Branch_desc`),
  ADD KEY `Parent_id` (`Parent_id`);

--
-- Index pour la table `cust`
--
ALTER TABLE `cust`
  ADD PRIMARY KEY (`CUST_ID`);

--
-- Index pour la table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`DY_ID`);

--
-- Index pour la table `paramerters`
--
ALTER TABLE `paramerters`
  ADD PRIMARY KEY (`par_id`),
  ADD KEY `Par_UPD_USER` (`Par_UPD_USER`),
  ADD KEY `Par_INS_USER` (`Par_INS_USER`);

--
-- Index pour la table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`PRO_ID`),
  ADD KEY `PRO_INS_USER` (`PRO_INS_USER`),
  ADD KEY `PRO_UPD_USER` (`PRO_UPD_USER`);

--
-- Index pour la table `securities`
--
ALTER TABLE `securities`
  ADD PRIMARY KEY (`SEC_ID`),
  ADD UNIQUE KEY `SEC_BRA_ID` (`SEC_BRA_ID`,`SEC_USE_ID`,`SEC_PRO_ID`),
  ADD KEY `SEC_USE_ID` (`SEC_USE_ID`),
  ADD KEY `SEC_PRO_ID` (`SEC_PRO_ID`);

--
-- Index pour la table `supp`
--
ALTER TABLE `supp`
  ADD PRIMARY KEY (`SUPP_ID`);

--
-- Index pour la table `tn_c`
--
ALTER TABLE `tn_c`
  ADD PRIMARY KEY (`TC_V_ID`,`TC_SER`),
  ADD KEY `TC_DY` (`TC_DY`),
  ADD KEY `VC_CUSTID` (`VC_CUSTID`),
  ADD KEY `TCPST` (`TCPST`);

--
-- Index pour la table `tn_s`
--
ALTER TABLE `tn_s`
  ADD PRIMARY KEY (`TS_V_ID`,`TS_SER`),
  ADD KEY `TS_DY` (`TS_DY`),
  ADD KEY `VS_CUSTID` (`VS_CUSTID`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`TYP_ID`);

--
-- Index pour la table `userss`
--
ALTER TABLE `userss`
  ADD PRIMARY KEY (`Analytic_Acc_id`),
  ADD KEY `USE_BRA_ID` (`USE_BRA_ID`);

--
-- Index pour la table `v_s`
--
ALTER TABLE `v_s`
  ADD PRIMARY KEY (`VS_ID`),
  ADD KEY `VS_BENF` (`VS_BENF`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `amnt_dlivd`
--
ALTER TABLE `amnt_dlivd`
  MODIFY `AMNTS_ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `cust`
--
ALTER TABLE `cust`
  MODIFY `CUST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=530;

--
-- AUTO_INCREMENT pour la table `days`
--
ALTER TABLE `days`
  MODIFY `DY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `paramerters`
--
ALTER TABLE `paramerters`
  MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `securities`
--
ALTER TABLE `securities`
  MODIFY `SEC_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `supp`
--
ALTER TABLE `supp`
  MODIFY `SUPP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT pour la table `tn_s`
--
ALTER TABLE `tn_s`
  MODIFY `TS_V_ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `TYP_ID` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT pour la table `userss`
--
ALTER TABLE `userss`
  MODIFY `Analytic_Acc_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `v_s`
--
ALTER TABLE `v_s`
  MODIFY `VS_ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `amnt_dlivd`
--
ALTER TABLE `amnt_dlivd`
  ADD CONSTRAINT `amnt_dlivd_ibfk_1` FOREIGN KEY (`AMNTS_V_ID`) REFERENCES `v_s` (`VS_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`Parent_id`) REFERENCES `branches` (`Branch_id`);

--
-- Contraintes pour la table `paramerters`
--
ALTER TABLE `paramerters`
  ADD CONSTRAINT `paramerters_ibfk_1` FOREIGN KEY (`Par_UPD_USER`) REFERENCES `userss` (`Analytic_Acc_id`),
  ADD CONSTRAINT `paramerters_ibfk_2` FOREIGN KEY (`Par_INS_USER`) REFERENCES `userss` (`Analytic_Acc_id`);

--
-- Contraintes pour la table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_ibfk_1` FOREIGN KEY (`PRO_INS_USER`) REFERENCES `userss` (`Analytic_Acc_id`),
  ADD CONSTRAINT `programs_ibfk_2` FOREIGN KEY (`PRO_UPD_USER`) REFERENCES `userss` (`Analytic_Acc_id`);

--
-- Contraintes pour la table `securities`
--
ALTER TABLE `securities`
  ADD CONSTRAINT `securities_ibfk_1` FOREIGN KEY (`SEC_BRA_ID`) REFERENCES `branches` (`Branch_id`),
  ADD CONSTRAINT `securities_ibfk_2` FOREIGN KEY (`SEC_USE_ID`) REFERENCES `userss` (`Analytic_Acc_id`),
  ADD CONSTRAINT `securities_ibfk_3` FOREIGN KEY (`SEC_PRO_ID`) REFERENCES `programs` (`PRO_ID`);

--
-- Contraintes pour la table `tn_c`
--
ALTER TABLE `tn_c`
  ADD CONSTRAINT `tn_c_ibfk_1` FOREIGN KEY (`TC_DY`) REFERENCES `days` (`DY_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tn_c_ibfk_3` FOREIGN KEY (`VC_CUSTID`) REFERENCES `cust` (`CUST_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tn_c_ibfk_4` FOREIGN KEY (`TCPST`) REFERENCES `supp` (`SUPP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tn_c_ibfk_5` FOREIGN KEY (`TC_V_ID`) REFERENCES `v_s` (`VS_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tn_s`
--
ALTER TABLE `tn_s`
  ADD CONSTRAINT `tn_s_ibfk_1` FOREIGN KEY (`TS_V_ID`) REFERENCES `v_s` (`VS_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tn_s_ibfk_2` FOREIGN KEY (`TS_DY`) REFERENCES `days` (`DY_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tn_s_ibfk_3` FOREIGN KEY (`VS_CUSTID`) REFERENCES `cust` (`CUST_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `userss`
--
ALTER TABLE `userss`
  ADD CONSTRAINT `userss_ibfk_2` FOREIGN KEY (`USE_BRA_ID`) REFERENCES `branches` (`Branch_id`);

--
-- Contraintes pour la table `v_s`
--
ALTER TABLE `v_s`
  ADD CONSTRAINT `v_s_ibfk_1` FOREIGN KEY (`VS_BENF`) REFERENCES `supp` (`SUPP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
