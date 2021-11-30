<?php
$title="Member";
require_once('head.php');
echo "<body>";
$conn = mysqli_connect('localhost', 'root', 'password', 'canary');

$courseName = mysqli_real_escape_string($conn, $_REQUEST['courseName']);
echo"<h2> Lists of all races and members who partecipated in course :$courseName</h2>";
$query = "SELECT cou.courseName,m.firstName,m.lastName,m.grade,s.seriesName,s.seriesYear,r.raceName,r.raceDate,com.position
 FROM member m ,series s,race r,competitor com,enrolment e,course cou 
 WHERE m.memberID=e.memberID
 AND e.courseID=cou.courseID
 AND m.memberID=com.memberID
 AND com.raceID=r.raceID
 AND r.seriesID=s.seriesID
 AND cou.courseName='$courseName'
 HAVING MIN(position) >0 
 ORDER BY lastname ASC";
$result = mysqli_query($conn, $query);
echo "<a href='Web.php' class='btn'><span>HOME</span></a>";
echo"<br><br><br>";
echo "<table class='s1'>";
echo "<tr> <th> Course Name</th> <th> First Name</th><th> Last Name</th><th> Grade</th><th> Series Name</th><th> Series Year</th>
<th> Race Name</th><th>Race Date</th><th> Position</th> </tr>";
while ($row= mysqli_fetch_assoc($result))
{
echo "<tr>";
echo "<td>" .$row['courseName']. "</td> ";
echo "<td>" .$row['firstName']. "</td> ";
echo "<td>".$row['lastName']."</td>";
echo "<td>".$row['grade']."</td>";
echo "<td>".$row['seriesName']."</td>";
echo "<td>".$row['seriesYear']."</td>";
echo "<td>".$row['raceName']."</td>";
echo "<td>".$row['raceDate']."</td>";
echo "<td>".$row['position']."</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);

echo "</body>";
echo "</html>";
?>
