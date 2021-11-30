/*---------------------------------------------------------*/
/*FIRST TASK*/
ALTER TABLE enrolment
ADD FOREIGN KEY (memberID) REFERENCES member(memberID),
ADD FOREIGN KEY (courseID) REFERENCES course(courseID)
ON DELETE CASCADE
ON UPDATE CASCADE;


ALTER TABLE competitor
ADD FOREIGN KEY (memberID) REFERENCES member(memberID),
ADD FOREIGN KEY (raceID) REFERENCES race(raceID)
ON DELETE CASCADE
ON UPDATE CASCADE;


ALTER TABLE race
ADD FOREIGN KEY (seriesID) REFERENCES series(seriesID)
ON DELETE CASCADE
ON UPDATE CASCADE;

/*-------------------------------------------------------------------------------------------------------------*/

/*SECOND TASK*/
INSERT INTO member VALUES(NULL,'Jack','Smith','j');
INSERT INTO member VALUES(NULL,'Alice','Williams','j');
INSERT INTO member VALUES(NULL,'Ben','Felton','s');
INSERT INTO member VALUES(NULL,'Zack','Colborn','s');

INSERT INTO series VALUES(NULL,'April',2016);
INSERT INTO series VALUES(NULL,'May',2016);
INSERT INTO series VALUES(NULL,'Winter',2018);
INSERT INTO series VALUES(NULL,'Summer',2018);


INSERT INTO course VALUES(NULL,'Junior',1);
INSERT INTO course VALUES(NULL,'Senior',2);
INSERT INTO course VALUES(NULL,'Adult',3);
/*---*/
INSERT INTO enrolment VALUES(NULL,1,2);
INSERT INTO enrolment VALUES(NULL,3,4);
INSERT INTO enrolment VALUES(NULL,2,2);
INSERT INTO enrolment VALUES(NULL,4,3);

INSERT INTO race VALUES(NULL,1,'Norwich-Cambridge','2017-5-8');
INSERT INTO race VALUES(NULL,2,'Norwich-Surrey','2017-6-9');
INSERT INTO race VALUES(NULL,3,'Norwich-London','2018-8-8');
INSERT INTO race VALUES(NULL,4,'Norwich-Glasgow','2018-9-2');


INSERT INTO competitor VALUES(NULL,1,1,0);
INSERT INTO competitor VALUES(NULL,2,1,0);
INSERT INTO competitor VALUES(NULL,3,2,0);
INSERT INTO competitor VALUES(NULL,4,3,0);


/*-----------------------------------------------------------------------------------------------------------------*/
/*Query1 with check for existance */
INSERT INTO member(memberID,firstName, lastName, grade) 
VALUES(NULL,'$_POST[firstName]','$_POST[lastName]','$_POST[grade]');

SELECT * FROM member WHERE firstName = '$_POST[firstName]' AND lastName = '$_POST[lastName]' ;

/*Query2 */ 
SELECT * FROM member;

/*Query3 */
DELETE FROM race WHERE raceID=$raceid;

/*Query4 with check*/
INSERT INTO competitor (competitorID,memberID, raceID, position) VALUES (NULL,$_POST[memberID],$_POST[raceID], 0);

SELECT * FROM competitor WHERE memberID = $_POST[memberID] AND raceID = $_POST[raceID];
/*Query5 */

UPDATE competitor SET position=$pos 
WHERE memberid=$memberid 
and raceid=$raceid;

/*Query6 */
SELECT firstName,lastName,grade,seriesName,seriesYear,raceName,raceDate,position
 FROM member,series,race,competitor 
 where member.memberID=competitor.memberID 
 and competitor.raceID=race.raceID 
 and race.seriesID=series.seriesID
 and member.firstName='$firstName' 
 and member.lastName='$lastName'
 HAVING MIN(position) >0 
 ORDER BY position ASC;
 
 /*Query7 */
 SELECT courseName,firstName,lastName,grade,seriesName,seriesYear,raceName,raceDate,position
 FROM member as m,series as s,race as r,competitor as com,enrolment as e,course as c where m.memberID=com.memberID 
 and com.raceID=r.raceID and m.memberID=com.memberID and e.courseID=c.courseID 
 HAVING MIN(position) >0 
 ORDER BY lastname ASC;
 
 /*Query8 */
 UPDATE enrolment 
SET courseID=(SELECT courseID FROM course
WHERE courseName='$courseName') 
WHERE memberID=(Select memberID FROM member WHERE firstname='$firstName' AND lastName='$lastName');

/*Query9 with check */
INSERT INTO race (raceID,seriesID,raceName, raceDate) 
VALUES (NULL,(SELECT seriesID FROM series WHERE seriesName='$_POST[seriesName]' AND seriesYear='$_POST[seriesYear]'), '$_POST[raceName]','$_POST[raceDate]');

SELECT * FROM race WHERE raceName = '$_POST[raceName]';

/*Query10 */
UPDATE competitor 
SET raceID=(SELECT raceID FROM race,series 
WHERE raceName='$raceName' AND seriesName='$seriesName' AND seriesYear='$seriesYear'),memberID=(SELECT memberID 
FROM member
WHERE firstName='$firstName' 
AND lastName='$lastName');


