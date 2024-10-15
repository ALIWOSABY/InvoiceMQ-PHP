DELIMITER $$
CREATE DEFINER=`cpses_qhecavjvie`@`localhost` PROCEDURE `A_B`()
BEGIN
select cust.*,
            spouse.Branch_desc as prn_id
            from branches cust
            LEFT OUTER JOIN branches spouse
            on cust.Parent_id = spouse.Branch_id;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`cpses_qhecavjvie`@`localhost` PROCEDURE `A_Priv`()
BEGIN
SELECT * from programs;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`cpses_qhecavjvie`@`localhost` PROCEDURE `A_T`()
BEGIN
SELECT * FROM types;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`cpses_qhecavjvie`@`localhost` PROCEDURE `A_paramerters`()
BEGIN
SELECT * FROM paramerters;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`cpses_qhecavjvie`@`localhost` PROCEDURE `Last_priv`()
BEGIN
SELECT  MAX(`PRO_ID`) as Id_Prog FROM `programs`;
END$$
DELIMITER ;
