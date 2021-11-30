<?php
$title="Competitor";
require_once('head.php');




 
$conn = mysqli_connect('localhost', 'root', 'password', 'canary');
$check="SELECT * FROM competitor WHERE memberID = $_POST[memberID] AND raceID = $_POST[raceID] ";
$rs = mysqli_query($conn,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[0] > 0 ) {
    echo "Competitor Already Exists<br/>";
}

else
{
    $newUser= "INSERT INTO competitor (competitorID,memberID, raceID, position) VALUES (NULL,$_POST[memberID],$_POST[raceID], 0)";
    if (mysqli_query($conn,$newUser))
    {
          echo "<h2>Member with ID:$_POST[memberID] was assigned to race with ID:$_POST[raceID] </h2>";
    }
    else
    {
        echo "Error adding user in database<br/>";
    }
}


echo "<a href='Web.php' class='btn'><span>HOME</span></a>";
mysqli_close($conn);





?>