<?php
$title="Member";
require_once('head.php');

echo "<body>";
echo"<h2> Details about all members</h2>";
$conn = mysqli_connect('localhost', 'root', 'password', 'canary');
$query = "SELECT * FROM member";
$result = mysqli_query($conn, $query);
echo "<a href='Web.php' class='btn'><span>HOME</span></a>";
echo"<br><br><br>";
echo "<table class='s1'>";
echo "<tr> <th> ID</th> <th> First Name</th><th>Last Name</th><th>Grade</th></tr>";
while ($row= mysqli_fetch_assoc($result))
{
echo "<tr>";
echo "<td>" .$row['memberID']. "</td> ";
echo "<td>" .$row['firstName']. "</td> ";
echo "<td>".$row['lastName']."</td>";
echo "<td>".$row['grade']."</td>";

echo "</tr>";
}
echo "</table>";

mysqli_close($conn);

echo "</body>";
echo "</html>";
?>
