CREATE USER 'php'@'localhost' IDENTIFIED BY 'access';
GRANT EXECUTE ON bikestores.* TO 'php'@'localhost';

CREATE VIEW login AS
SELECT *
FROM user 

DELIMITER $$
DROP PROCEDURE IF EXISTS login$$
CREATE PROCEDURE login( userName VARCHAR(100),
                        pwd VARCHAR(100), 
                        encryptKey VARCHAR(100) )
BEGIN
    SELECT *
    FROM login
    WHERE email = userName
        AND password = pwd;
END$$
DELIMITER ;

-- test view 
SELECT * FROM login

CALL login('rahul@test.com', '123123', 'encrypt_key');

-- Insert, Update, Delete
DELIMITER $$
CREATE PROCEDURE user
  ( email       CHAR(100)
  , password    CHAR(100)
  , p_oper      CHAR(1)
  )
BEGIN
    IF p_oper = 'I' THEN     
      INSERT INTO user
      SET email = email
        , password = password;
    ELSEIF p_oper = 'U' THEN      
       UPDATE user
       SET password = password
       WHERE email = email;
    ELSEIF p_oper = 'D' THEN
       DELETE FROM user 
       WHERE email = email;           
    END IF;          
END$$
DELIMITER ;
