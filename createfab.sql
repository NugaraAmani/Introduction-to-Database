/********************************************************
* This script creates the database named my_guitar_shop 
*********************************************************/

DROP DATABASE IF EXISTS fab_company;
CREATE DATABASE fab_company;
USE fab_company;

-- create the tables for the database
CREATE TABLE employees(
  employee_id        INT           PRIMARY KEY   AUTO_INCREMENT,
  lname          	 VARCHAR(25)   NOT NULL,
  fname         	 VARCHAR(25)   NOT NULL,
  mname        		 VARCHAR(25),
  email			     VARCHAR(25),  NOT NULL,
  phone              VARCHAR(12)   NOT NULL,
  data_of_birth      DATE           NOT NULL,
  department_id      VARCHAR(25)   NOT NULL
  );

CREATE TABLE personal_details(
  employee_id        INT            PRIMARY KEY  ,
  social_sec_num     INT            NOT NULL,
  Employee_type      INT            NOT NULL,
  Employee_level     VARCHAR(40)    NOT NULL,
  salary             VARCHAR(2)     NOT NULL,
  disabled           TINYINT(1)     NOT NULL      DEFAULT 0
  );

CREATE TABLE department (
  department_id         INT            PRIMARY KEY   DEFAULT 1010,
  department_name       VARCHAR(255)   NOT NULL      UNIQUE,
  fname       			VARCHAR(255)   NOT NULL,
  mname        			VARCHAR(255)   NOT NULL,
  lname        			VARCHAR(255)   NOT NULL,
  ord_id                INT                          DEFAULT NULL 
);

CREATE TABLE organization (
  org_id         INT            PRIMARY KEY,
  org_name       VARCHAR(255)   NOT NULL,
  fname    		 VARCHAR(255)   NOT NULL,
  mname      	 VARCHAR(255)   NOT NULL,
  lname     	 VARCHAR(255)   NOT NULL
);

CREATE TABLE addresses (
  employee_id        INT            NOT NULL,
  street1            VARCHAR(60)    NOT NULL,
  street2            VARCHAR(60)  DEFAULT NULL,
  city               VARCHAR(40)    NOT NULL,
  state              VARCHAR(2)     NOT NULL,
  zipcode            VARCHAR(10)    NOT NULL,
  FOREIGN KEY (employee_id)
    REFERENCES employee (employee_id)
);


CREATE TABLE benefits (
  employee_id    INT            PRIMARY KEY,
  fsa      		 VARCHAR(255)   NOT NULL,
  savings        VARCHAR(255)   NOT NULL,
  stock          VARCHAR(255)   NOT NULL
);

CREATE TABLE timeoff (
  employee_id    INT   PRIMARY KEY   
  vac      		 INT   NOT NULL,
  sick        	 INT   NOT NULL,
  per            INT   NOT NULL,
  vac_taken      INT   NULL,
  sick_taken     INT   NULL,
  per_taken      INT   NULL,
  req_days       INT   NULL,
  req_type       VARCHAR(6)  NULL,
);

CREATE TABLE training (
  employee_id    INT            PRIMARY KEY    
  course_id      INT            PRIMARY KEY    
  course_name    VARCHAR(255)   NOT NULL,
  date_taken     DATE   		NOT NULL,
);
-- Create a user named mgs_user
CREATE USER IF NOT EXISTS mgs_user@localhost
IDENTIFIED BY 'pa55word';

-- Grant privileges to that user
GRANT SELECT, INSERT, UPDATE, DELETE, DROP, CREATE VIEW, CREATE ROUTINE, EXECUTE
ON fab_company.*
TO mgs_user@localhost;