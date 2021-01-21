
DROP USER dev@localhost;
CREATE USER 'dev'@'localhost' IDENTIFIED BY 'devsp111';
GRANT EXECUTE ON portfolio.* TO 'dev'@'localhost'; 

CREATE VIEW user_v AS 
SELECT id, email, password, first_name, last_name, country, created_date, active, DATEDIFF(NOW(), created_date) AS date_difference
FROM user;


-- login select
DELIMITER $$
DROP PROCEDURE IF EXISTS login$$
CREATE DEFINER=`dba`@`localhost` PROCEDURE `login`(
    login_email VARCHAR(100), 
    pwd         VARCHAR(100)
)
BEGIN
    SELECT *
      FROM user_v
      WHERE email = login_email
      AND password = AES_ENCRYPT(pwd, "123456");
END $$
DELIMITER ;




