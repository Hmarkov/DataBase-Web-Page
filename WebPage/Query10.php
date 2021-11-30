<?php
 $title="Competitor";
 require_once('head.php');

$conn = mysqli_connect('localhost', 'root', 'password', 'canary');
 

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$firstName = mysqli_real_escape_string($conn, $_REQUEST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_REQUEST['lastName']);
$raceName = mysqli_real_escape_string($conn, $_REQUEST['raceName']);
$seriesName = mysqli_real_escape_string($conn, $_REQUEST['seriesName']);
$seriesYear = mysqli_real_escape_string($conn, $_REQUEST['seriesName']);

$sql = "UPDATE competitor 
SET raceID=(SELECT raceID FROM race,series 
WHERE raceName='$raceName' AND seriesName='$seriesName' AND seriesYear='$seriesYear'),memberID=(SELECT memberID 
FROM member
WHERE firstName='$firstName' 
AND lastName='$lastName')
" ;
if(mysqli_query($conn, $sql)){
    echo "<h2>Member$firstName $lastName was assigned to a race:$raceName </h2>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
echo "<a href='Web.php' class='btn'><span>HOME</span></a>";
mysqli_close($conn);
?>

