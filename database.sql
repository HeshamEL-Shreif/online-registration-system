create database campus;
go


use [campus] 
CREATE TABLE Account
(
  Account_ID INT IDENTITY(005,1) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  Password VARCHAR(50) NOT NULL,
  Type VARCHAR(20) NOT NULL,
  PRIMARY KEY (Account_ID),
);


CREATE TABLE Faculty
(
  Address VARCHAR(50),
  Faculty_ID_ INT IDENTITY(1,1) NOT NULL,
  city VARCHAR(50),
  Name VARCHAR(50) NOT NULL,
  PRIMARY KEY (Faculty_ID_)
);
CREATE TABLE Room
(
  Room_ID INT IDENTITY(1,1) NOT NULL,
  Room_num INT NOT NULL,
  PRIMARY KEY (Room_ID),
   Faculty_ID int ,
  FOREIGN KEY (Faculty_ID) 
      REFERENCES Faculty(Faculty_ID_)
      ON UPDATE CASCADE ON DELETE CASCADE

);

CREATE TABLE Department
(
  depart_name VARCHAR(50) NOT NULL,
  dep_code INT IDENTITY(001,1) NOT NULL,
  Faculty_ID int ,
  PRIMARY KEY (dep_code),
  FOREIGN KEY (Faculty_ID) 
      REFERENCES Faculty(Faculty_ID_)
      ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Courses
(
  course_code INT IDENTITY(002,1) NOT NULL,
  course_hours INT NOT NULL,
  course_name VARCHAR(50) NOT NULL,
  dep_code INT ,
  PRIMARY KEY (course_code),
  FOREIGN KEY (dep_code)
      REFERENCES Department(dep_code)
      ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE perquisite
(
  course_code_1 INT ,
  perquisite_course_code_2 INT ,
  PRIMARY KEY (course_code_1, perquisite_course_code_2),
  FOREIGN KEY (course_code_1) REFERENCES Courses(course_code) ON UPDATE CASCADE ON DELETE cascade ,
  FOREIGN KEY (perquisite_course_code_2) REFERENCES Courses(course_code) ON UPDATE no action ON DELETE no action
);



CREATE TABLE Instructor
(
  ID INT IDENTITY(004,1) NOT NULL,
  SSN varchar(15) NOT NULL,
  Age int NOT NULL,
  city VARCHAR(50),
  zipcode INT,
  building_no INT NOT NULL,
  street_name VARCHAR(50) NOT NULL,
  Name VARCHAR(50) NOT NULL,
  Gender varchar(6) NOT NULL,
  Degree VARCHAR(20) NOT NULL,
  PRIMARY KEY (ID),
   Account_ID INT,
  FOREIGN KEY (Account_ID) REFERENCES Account(Account_ID) ON UPDATE CASCADE ON DELETE CASCADE,
  UNIQUE (SSN)
);
CREATE TABLE section
(
  Section_ID INT IDENTITY(003,1) NOT NULL,
  semester VARCHAR(15) NOT NULL,
  day smallint NOT NULL,
  capacity INT,
  start_time TIME NOT NULL,
  End_time TIME NOT NULL,
  course_code INT,
  Room_ID INT ,
  ID INT ,
  PRIMARY KEY (Section_ID),
  FOREIGN KEY (course_code) REFERENCES Courses(course_code) ON UPDATE CASCADE ON DELETE CASCADE ,
  FOREIGN KEY (Room_ID) REFERENCES Room(Room_ID) ON UPDATE no action ON DELETE no action,
  FOREIGN KEY (ID) REFERENCES Instructor(ID) ON UPDATE cascade ON DELETE no action,
  CONSTRAINT time_ck CHECK(start_time<End_time)
);

CREATE TABLE Instructor_Phone
(
  Phone varchar(12),
  ID INT ,
  PRIMARY KEY (Phone, ID),
  FOREIGN KEY (ID) REFERENCES Instructor(ID) ON UPDATE CASCADE ON DELETE CASCADE
);



CREATE TABLE IT
(
  Age int NOT NULL,
  city VARCHAR(50) NOT NULL,
  zipcode INT,
  Bulding_no INT NOT NULL,
  street VARCHAR(50) NOT NULL,
  Name VARCHAR(50) NOT NULL,
  SSN VARCHAR(15) NOT NULL,
  ID INT IDENTITY(006,1) NOT NULL,
  Account_ID INT,
  PRIMARY KEY (ID),
  FOREIGN KEY (Account_ID) REFERENCES Account(Account_ID) ON UPDATE CASCADE ON DELETE CASCADE,
  UNIQUE (SSN)
);

CREATE TABLE IT_Phone
(
  Phone varchar(12),
  ID INT ,
  PRIMARY KEY (Phone, ID),
  FOREIGN KEY (ID) REFERENCES IT(ID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Student
(
  SName VARCHAR(50) NOT NULL,
  SSN VARCHAR(15) NOT NULL,
  ID INT IDENTITY(20220001,1) NOT NULL,
   Age int NOT NULL,
  city VARCHAR(50) NOT NULL,
  zipcode INT,
  street_name VARCHAR(50) NOT NULL,
  building_no INT NOT NULL,
  Gender VARCHAR(15) NOT NULL,
  dep_code INT ,
  Account_ID INT ,
  PRIMARY KEY (ID),
  FOREIGN KEY (dep_code) REFERENCES Department(dep_code) ON UPDATE cascade ON DELETE no action ,
  FOREIGN KEY (Account_ID) REFERENCES Account(Account_ID) ON UPDATE CASCADE ON DELETE CASCADE ,
  UNIQUE (SSN)
);

CREATE TABLE Cart
(
  ID INT,
  course_code INT,
  PRIMARY KEY (ID, course_code),
  FOREIGN KEY (ID) REFERENCES Student(ID) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (course_code) REFERENCES Courses(course_code) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Register
(
  Grade INT NOT NULL default 0,
  ID INT,
  course_code INT 
  PRIMARY KEY (ID, course_code),
  FOREIGN KEY (ID) REFERENCES Student(ID) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (course_code) REFERENCES Courses(course_code) ON UPDATE Cascade ON DELETE Cascade
);


CREATE TABLE Attended
(
  num_presences INT NOT NULL default 0,
  num_abcence INT NOT NULL default 0,
  ID INT ,
  Section_ID INT ,
  PRIMARY KEY (ID, Section_ID),
  FOREIGN KEY (ID) REFERENCES Student(ID) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (Section_ID) REFERENCES Section(Section_ID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE students_Phone
(
  Phone varchar(13),
  ID INT ,
  PRIMARY KEY (Phone, ID),
  FOREIGN KEY (ID) REFERENCES Student(ID) ON UPDATE CASCADE ON DELETE CASCADE
);

