-- sector view 

DELIMITER $$
DROP PROCEDURE IF EXISTS s_sector$$
CREATE DEFINER=`dba`@`localhost` PROCEDURE `s_sector`( 
    s_search varchar(50))
BEGIN
    SELECT *
    FROM sector
    WHERE CASE WHEN s_search != '' THEN name = s_search
            ELSE 1=1
        END;
END$$
DELIMITER ;