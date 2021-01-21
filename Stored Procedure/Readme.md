There we have written stored procedure for data request 
Reason for writing stored procedure is 
1. It will faster 
2. It will be secure (user will have access only to stored procedure than to data/query)
3. Clean code 


## Challenges with store procedure 

1. Exception Handling:

`CREATE PROCEDURE <procedure name> ()
BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION SHOW ERRORS;
  BEGIN
    <SQL query>
  END
END`

This helps to get custom error messsage so that we will know what to solve 

2. Can we update only selected fields in Stored Procedure

`CREATE PROCEDURE <procedure name> (para1)
BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION SHOW ERRORS;
  BEGIN
    UPDATE <table name>
    SET
      <field name in DB> = IF(para1 IS NOT NULL, para1, <field name in DB>),
  END
END` 

Example explains how we can skip field its NULL is passed in the parameter in stored procedure

3. Test case is very valuable 
We have written test cases as much as possible so that in production code doesn't break 
