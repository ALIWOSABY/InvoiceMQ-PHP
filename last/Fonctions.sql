DELIMITER $$
CREATE DEFINER=`cpses_qhecavjvie`@`localhost` FUNCTION `Del_T`(`pt0` SMALLINT(3)) RETURNS varchar(255) CHARSET utf8
BEGIN
DELETE FROM types WHERE TYP_ID = pt0;
RETURN 'Deleted Successfully';
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`cpses_qhecavjvie`@`localhost` FUNCTION `Del_p`(`Fp0` INT(11)) RETURNS varchar(255) CHARSET utf8
BEGIN
DELETE FROM paramerters where par_id = Fp0;
RETURN 'Deleted Successfully';
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`cpses_qhecavjvie`@`localhost` FUNCTION `Del_priv`(`prv0` INT(11)) RETURNS varchar(255) CHARSET utf8
BEGIN
DELETE FROM programs where PRO_ID = prv0;
RETURN 'Deleted Successfully';
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`cpses_qhecavjvie`@`localhost` FUNCTION `Ins_P`(`Fp1` INT(11), `Fp2` VARCHAR(100) CHARSET utf8, `Fp3` VARCHAR(100) CHARSET utf8, `Fp4` VARCHAR(14), `Fp5` TEXT, `Fp6` VARCHAR(100) CHARSET utf8, `Fp7` VARCHAR(100), `Fp8` VARCHAR(100), `Fp9` VARCHAR(100), `Fp10` VARCHAR(100) CHARSET utf8, `Fp11` VARCHAR(100) CHARSET utf8, `Fp12` VARCHAR(14) CHARSET utf8, `Fp13` TEXT) RETURNS varchar(255) CHARSET utf8
BEGIN
INSERT INTO `paramerters`(`par_id`, `par_name`, `par_namee`, `Par_phone`, `Par_website`, `Par_Addr1`, `Par_Addr1e`, `Par_Addr2`, `Par_Addr2e`, `Par_Addr3`, `Par_Addr3e`, `Par_whatsapp`, `Par_logo`) VALUES (Fp1, Fp2, Fp3, Fp4, Fp5, Fp6, Fp7, Fp8, Fp9, Fp10, Fp11, Fp12, Fp13);
RETURN 'Inserted Successfully';
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`cpses_qhecavjvie`@`localhost` FUNCTION `Ins_T`(`pt1` VARCHAR(30) CHARSET utf8, `pt2` VARCHAR(30) CHARSET utf8, `pt3` VARCHAR(20) CHARSET utf8, `pt4` VARCHAR(8) CHARSET utf8, `pt6` VARCHAR(30), `pt7` VARCHAR(30), `pt15` VARCHAR(30), `pt16` INT, `pt17` DATETIME, `pt18` CHAR(1)) RETURNS varchar(255) CHARSET utf8
BEGIN
insert into types(`TYP_NAME`, `TYP_NAMEE`, `TYP_REP_NAME`, `TYP_TYPE`,`TYP_Sig_one`, `TYP_Sig_two`, `TYP_Sig_three`, `TYP_INS_USER`,`TYP_INS_DATE`,`TYP_FREEZE`) 
values (pt1, pt2, pt3, pt4,pt6,pt7,pt15,pt16,pt17,pt18);
RETURN 'Inserted Successfully';
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`cpses_qhecavjvie`@`localhost` FUNCTION `Ins_priv`(`prv0` INT(11), `prv1` VARCHAR(100) CHARSET utf8, `prv2` VARCHAR(100) CHARSET utf8, `prv3` VARCHAR(20) CHARSET utf8, `prv4` VARCHAR(3) CHARSET utf8, `prv5` INT(11), `prv6` CHAR(1) CHARSET utf8) RETURNS varchar(255) CHARSET utf8
BEGIN
INSERT INTO `programs` (`PRO_ID`, `PRO_NAME`, `PRO_NAMEE`, `PRO_FILE_NAME`, `PRO_SYS_NAME`, `PRO_INS_USER`, `PRO_FREEZE`) VALUES(prv0,prv1,prv2,prv3,prv4,prv5,prv6);
RETURN 'Inserted Record Successfully';
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`cpses_qhecavjvie`@`localhost` FUNCTION `Upd_T`(`pt0` SMALLINT(3), `pt1` VARCHAR(30) CHARSET utf8, `pt2` VARCHAR(30) CHARSET utf8, `pt3` VARCHAR(20) CHARSET utf8, `pt4` VARCHAR(8) CHARSET utf8, `pt6` VARCHAR(100), `pt7` VARCHAR(100), `pt15` VARCHAR(100), `pt16` INT(6), `pt17` DATETIME, `pt18` CHAR(1)) RETURNS varchar(255) CHARSET utf8
BEGIN
UPDATE types SET TYP_NAME = pt1,TYP_NAMEE= pt2,TYP_REP_NAME= pt3,TYP_TYPE=pt4 ,TYP_Sig_one=pt6,TYP_Sig_two=pt7 ,TYP_UPD_USER=pt16,TYP_UPD_DATE=pt17,TYP_FREEZE=pt18  WHERE TYP_ID = pt0;
RETURN 'Updated Successfully';
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`cpses_qhecavjvie`@`localhost` FUNCTION `Upd_p`(`Fp0` INT(11), `Fp1` VARCHAR(100) CHARSET utf8, `Fp2` VARCHAR(100) CHARSET utf8, `Fp3` VARCHAR(14), `Fp4` TEXT, `Fp5` VARCHAR(100) CHARSET utf8, `Fp6` VARCHAR(100) CHARSET utf8, `Fp7` VARCHAR(100) CHARSET utf8, `Fp8` VARCHAR(14) CHARSET utf8, `Fp9` TEXT CHARSET utf8) RETURNS varchar(255) CHARSET utf8
BEGIN
UPDATE `paramerters` SET `par_name` = Fp1, `par_namee` = Fp2, `Par_phone` = Fp3, `Par_website` = Fp4, `Par_Addr1` = Fp5, `Par_Addr2` = Fp6, `Par_Addr3` = Fp7,`Par_whatsapp` = Fp8, `Par_logo` = Fp9 WHERE `paramerters`.`par_id` = Fp0;
RETURN 'Updated Successfully';
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`cpses_qhecavjvie`@`localhost` FUNCTION `Upd_priv`(`prv0` INT(11), `prv1` VARCHAR(100) CHARSET utf8, `prv2` VARCHAR(100) CHARSET utf8, `prv3` VARCHAR(20) CHARSET utf8, `prv4` VARCHAR(3) CHARSET utf8, `prv5` INT(6), `prv6` DATETIME, `prv7` CHAR(1) CHARSET utf8) RETURNS varchar(255) CHARSET utf8
BEGIN
UPDATE `programs` SET `PRO_NAME` = prv1, `PRO_NAMEE` = prv2, `PRO_FILE_NAME` = prv3, `PRO_SYS_NAME` = prv4, `PRO_UPD_USER` = prv5, `PRO_UPD_DATE` = prv6, `PRO_FREEZE` = prv7 WHERE `programs`.`PRO_ID` = prv0;
RETURN 'Updated Record Successfully';
END$$
DELIMITER ;
