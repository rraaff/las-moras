CREATE DATABASE LASMORAS CHARACTER SET utf8 COLLATE utf8_unicode_ci;
CREATE USER LASMORAS_USER IDENTIFIED BY 'LASMORAS_USER';
GRANT ALL ON LASMORAS.* TO LASMORAS_USER IDENTIFIED BY 'LASMORAS_USER';