<?php
$title="Member";
require_once('head.php');

 
$conn = mysqli_connect('localhost', 'root', 'password', 'canary');
$check="SELECT * FROM member WHERE firstName = '$_POST[firstName]' AND lastName = '$_POST[lastName]' ";
$rs = mysqli_query($conn,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[0] > 0) {
    echo "Member Already Exists<br/>";
}

else
{
    $newUser="INSERT INTO member(memberID,firstName, lastName, grade) VALUES(NULL,'$_POST[firstName]','$_POST[lastName]','$_POST[grade]')";
    if (mysqli_query($conn,$newUser))
    {
        echo "<h2>New member <br>First Name:$_POST[firstName]<br> Last Name:$_POST[lastName]<br> Grade:$_POST[grade] <br> added successfully</h2> ";
    }
    else
    {
        echo "Error adding user in database<br/>";
    }
}

echo "<a href='Web.php' class='btn'><span>HOME</span></a>";
mysqli_close($conn);









?>