<?php
 $title="Member";
 require_once('head.php');



 
$conn = mysqli_connect('localhost', 'root', 'password', 'canary');
$check="SELECT position FROM competitor WHERE memberID='$_POST[memberID]' 
AND raceID='$_POST[raceID]' AND position = '$_POST[position]' ";
$rs = mysqli_query($conn,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[0] != 0) {
    echo "Member already in position:$_POST[position]<br/>";
}

else
{
    $newUser="UPDATE competitor SET position='$_POST[position]' 
WHERE memberIDd='$_POST[memberID]' 
AND raceID='$_POST[raceID]'";
    if (mysqli_query($conn,$newUser))
    {
	echo  "<h2>Competitor with ID:$_POST[memberID] <br>Partecipating in Race with ID:$_POST[raceID] was updated to Position:$_POST[position] </h2> ";
    }
    else
    {
        echo "Error pdating position of competitor in database<br/>";
    }
}


echo "<a href='Web.php' class='btn'><span>HOME</span></a>";
mysqli_close($conn);






?>