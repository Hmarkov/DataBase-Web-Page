<?php
$title="Member";
require_once('head.php');
echo "<body>";
$conn = mysqli_connect('localhost', 'root', 'password', 'canary');
$firstName = mysqli_real_escape_string($conn, $_REQUEST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_REQUEST['lastName']);

echo"<h2> List of races which ".$firstName.' '.$lastName." has partecipated</h2>";
$query = "SELECT firstName,lastName,grade,seriesName,seriesYear,raceName,raceDate,position
 FROM competitor as c
 JOIN member m
 ON m.memberID=c.memberID 
 JOIN race r
 ON c.raceID=r.raceID
 JOIN series s
 ON r.seriesID=s.seriesID
 WHERE m.firstName='$firstName' 
 and m.lastName='$lastName'
 HAVING MIN(position) >0 
 ORDER BY position ASC";
$result = mysqli_query($conn, $query);
echo "<a href='Web.php' class='btn'><span>HOME</span></a>";
echo"<br><br><br>";
echo "<table class='s1'>";
echo "<tr> <th> First Name</th><th> Last Name</th><th> Grade</th><th> Series Name</th><th> Series Year</th>
<th> Race Name</th><th>Race Date</th><th> Position</th> </tr>";
while ($row= mysqli_fetch_assoc($result))
{
echo "<tr>";
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
