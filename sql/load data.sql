INSERT INTO user (email, password) VALUES ('rahul@test.com',  AES_ENCRYPT('123123', 'encrypt_key'));
UPDATE user password = AES_ENCRYPT('123123', 'encrypt_key');
UPDATE `user` SET `password` = AES_ENCRYPT('123123', 'encrypt_key') WHERE `id` = 1; 
SELECT email,cast(AES_DECRYPT(password, "encrypt_key") as char) FROM user 