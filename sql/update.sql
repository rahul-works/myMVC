
-- update jobs 
DELIMITER $$
DROP PROCEDURE IF EXISTS u_data$$
CREATE DEFINER=`php`@`localhost` PROCEDURE `u_user`(
    u_id            INT(11), 
    u_password      VARCHAR(100),
    activate        TINYINT(1)
    )
BEGIN
    UPDATE user
    SET password = u_password,
        activate = activate,
        updated = NOW()
    WHERE id = u_id;
END$$
DELIMITER ;
