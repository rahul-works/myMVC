ALTER TABLE `user` ADD UNIQUE(`email`); 

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

-- Insert, Update, Delete, Read
DELIMITER $$
CREATE PROCEDURE user
  ( email       CHAR(100)
  , password    CHAR(100) DEFAULT NULL
  , p_oper      CHAR(1)
  )
BEGIN
  -- exit if the duplicate key occurs
  DECLARE EXIT HANDLER FOR 1062
  BEGIN
    SELECT CONCAT('Duplicate key (',email,') occurred') AS message, 1 AS error;
  END;

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

// login 
// select 
// admin-user, customer-user, employee-user 
// admin_view -> admin_user, company, signup-plan, company-plan, gateway-setting
// select * from admin_view where id = xyz
// view -> employee, company,  signup-plan, company-plan, gateway-setting
// view -> customer-user, webpay-setting, company, customer, customer-address 

//PROCEDURE email, password
// check admin_view 
// if not found check in employee-view
// if not found check in temp-user-TABLE
// return admin, temp, employee, <data>

//job 
// select -> conmpany_id, job_id
// job-view -> job, customer
// return data (where condn)


