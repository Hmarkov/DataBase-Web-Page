<?php
 $title="Delete Race";
 require_once('head.php');


$conn = mysqli_connect('localhost', 'root', 'password', 'canary');

$check="SELECT raceID FROM race WHERE raceID = '$_POST[raceID]'";
$rs = mysqli_query($conn,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[0] < 1) {
    echo "Invalid race ID :$_POST[raceID]<br/>";
}

else
{
    $newUser="DELETE FROM race WHERE raceID='$_POST[raceID]'";
    if (mysqli_query($conn,$newUser))
    {
        echo "<h2>Successfully deleted race with ID:$_POST[raceID] </h2>";
    }
    else
    {
        echo "Error Deleting race from database<br/>";
    }
}
echo "<a href='Web.php' class='btn'><span>HOME</span></a>";
mysqli_close($conn);





?>