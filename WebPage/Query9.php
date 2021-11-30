<?php
 $title="Race";
 require_once('head.php');

$conn = mysqli_connect('localhost', 'root', 'password', 'canary');
$check="SELECT * FROM race WHERE raceName = '$_POST[raceName]'";
$rs = mysqli_query($conn,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[0] > 0) {
    echo "Race Already Exists<br/>";
}

else
{
    $newUser="INSERT INTO race (raceID,seriesID,raceName, raceDate) 
VALUES (NULL,(SELECT seriesID FROM series WHERE seriesName='$_POST[seriesName]' AND seriesYear='$_POST[seriesYear]'), '$_POST[raceName]','$_POST[raceDate]')";
    if (mysqli_query($conn,$newUser))
    {
        echo "<h2>New Race <br>Race Name:'$_POST[raceName]'<br> race Date:'$_POST[raceDate]'<br> added successfully</h2> ";
    }
    else
    {
        echo "Error adding user in database<br/>";
    }
}



echo "<a href='Web.php' class='btn'><span>HOME</span></a>";
mysqli_close($conn);




?>