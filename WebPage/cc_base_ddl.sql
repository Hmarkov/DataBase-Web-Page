DROP DATABASE IF EXISTS canary;
CREATE DATABASE canary;
USE canary;
 
  CREATE TABLE member(
  memberID INT AUTO_INCREMENT,
  firstName VARCHAR(40),
  lastName VARCHAR(40),
  grade char, -- j, junior, s, senior
  PRIMARY KEY(memberID)
);
  
  CREATE TABLE series(
  seriesID INT AUTO_INCREMENT,
  seriesName VARCHAR(40),
  seriesYear INTEGER,
  PRIMARY KEY(seriesID)
);
  
CREATE TABLE race(
  raceID INT AUTO_INCREMENT,
  seriesID INT,
  raceName VARCHAR(40),
  raceDate DATE,
  PRIMARY KEY(raceID)
);
CREATE TABLE competitor(
  competitorID INT AUTO_INCREMENT,
  memberID INT,
  raceID INT,
  position INT,
  PRIMARY KEY(competitorID)
);

CREATE TABLE course(
    courseID INT AUTO_INCREMENT,
    courseName VARCHAR(50),
    courseLevel INT,
    PRIMARY KEY(courseID)
);

CREATE TABLE enrolment(
  enrolmentID INT AUTO_INCREMENT,
  memberID INT, 
  courseID INT,
  PRIMARY KEY(enrolmentID)
);


