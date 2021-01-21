-- equity create / edit / delete / view / list 
-- explore prepare + array in select + arraywith value insert/update 
-- exception + error handling

-- view
CREATE VIEW equity_v AS
SELECT e.*, s.name as sector_name
FROM  equity AS e
LEFT JOIN sector AS s ON (s.id = e.sector_id)

-- stored procedure

-- list / single view 
DELIMITER $$
DROP PROCEDURE IF EXISTS s_equity$$
CREATE DEFINER=`dba`@`localhost` PROCEDURE `s_equity`( 
    e_user_id INT(11),  
    e_id INT(11),
    e_full ENUM('-1','0','1'))
BEGIN
    SELECT *
    FROM equity_v
    WHERE user_id = e_user_id 
    AND status = '1' 
    AND CASE WHEN e_id != -1 THEN id = e_id
            ELSE 1=1
        END
    AND CASE WHEN e_full != '-1'THEN is_full = e_full
            ELSE 1=1
        END;
END$$
DELIMITER ;

-- equity create

DELIMITER $$
DROP PROCEDURE IF EXISTS i_equity$$
CREATE DEFINER=`dba`@`localhost` PROCEDURE `i_equity`(
     e_user_id     INT(11),
     e_sector_id    INT(11),
     e_is_full     ENUM('0','1'),
     e_name        VARCHAR(200),
     e_number     VARCHAR(200),
     e_start_date     DATE,
     e_finish_date    DATE,
     e_notes          TEXT,
     e_initial_price    DOUBLE(20, 2),
     e_current_price    DOUBLE(20, 2),
     e_future_price    DOUBLE(20, 2),
     e_current_invest_year    DOUBLE(5, 2),
     e_future_invest_year   DOUBLE(5, 2),
     e_current_cagr   DOUBLE(5, 2),
     e_future_cagr   DOUBLE(5, 2)
    )
BEGIN
    -- exit if the duplicate key occurs
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SHOW ERRORS;
    BEGIN 
        INSERT INTO equity
            SET user_id = e_user_id,
                sector_id = e_sector_id,
                is_full = e_is_full,
                name = e_name,
                number = e_number,
                start_date = e_start_date,
                finish_date = e_finish_date,
                notes = e_notes,
                initial_price = e_initial_price,
                current_price = e_current_price,
                future_price = e_future_price,
                current_invest_year = e_current_invest_year,
                future_invest_year = e_future_invest_year,
                current_cagr = e_current_cagr,
                future_cagr = e_future_cagr,
                created_date = NOW(),
                updated_date = NOW(),
                status = '1';
            SELECT LAST_INSERT_ID() AS insert_id;
    END;
END$$
DELIMITER ;

-- update equity 
DELIMITER $$
DROP PROCEDURE IF EXISTS u_equity$$
CREATE DEFINER=`dba`@`localhost` PROCEDURE `u_equity`(
    e_id            INT(11), 
    e_user_id     INT(11),
     e_sector_id    INT(11),
     e_is_full     ENUM('0','1'),
     e_name        VARCHAR(200),
     e_number     VARCHAR(200),
     e_start_date     DATE,
     e_finish_date    DATE,
     e_notes          TEXT,
     e_initial_price    DOUBLE(20, 2),
     e_current_price    DOUBLE(20, 2),
     e_future_price    DOUBLE(20, 2),
     e_current_invest_year    DOUBLE(5, 2),
     e_future_invest_year   DOUBLE(5, 2),
     e_current_cagr   DOUBLE(5, 2),
     e_future_cagr   DOUBLE(5, 2)
    )
BEGIN
    UPDATE equity
    SET 
        user_id = IF(e_user_id IS NOT NULL, e_user_id, user_id),
        sector_id = IF(e_sector_id IS NOT NULL, e_sector_id, sector_id),
        is_full  = IF(e_is_full IS NOT NULL, e_is_full, is_full),
        name     = IF(e_name IS NOT NULL, e_name, name),
        number  = IF(e_number IS NOT NULL, e_number, number),
        start_date  = IF(e_start_date IS NOT NULL, e_start_date, start_date),
        finish_date = IF(e_finish_date IS NOT NULL, e_finish_date, finish_date),
        notes   = IF(e_notes IS NOT NULL, e_notes, notes),
        initial_price = IF(e_initial_price IS NOT NULL, e_initial_price, initial_price),
        current_price = IF(e_current_price IS NOT NULL, e_current_price, current_price),
        future_price = IF(e_future_price IS NOT NULL, e_future_price, future_price),
        current_invest_year = IF(e_current_invest_year IS NOT NULL, e_current_invest_year, current_invest_year),
        future_invest_year = IF(e_future_invest_year IS NOT NULL, e_future_invest_year, future_invest_year),
        current_cagr = IF(e_current_cagr IS NOT NULL, e_current_cagr, current_cagr),
        future_cagr = IF(e_future_cagr IS NOT NULL, e_future_cagr, future_cagr),
        updated_date = NOW(),
        status = '1'
    WHERE   id = e_id AND
            user_id = e_user_id;
END$$
DELIMITER ;

-- delete equity
DELIMITER $$
DROP PROCEDURE IF EXISTS d_equity$$
CREATE DEFINER=`dba`@`localhost` PROCEDURE `d_equity`(
    e_id INT(11),
    e_user_id INT(11)
)
BEGIN
    DELETE FROM equity 
        WHERE id = e_id AND 
        user_id = e_user_id;          
END$$
DELIMITER ;


