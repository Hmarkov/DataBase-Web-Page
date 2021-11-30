<?php
 $title="Enrolment";
 require_once('head.php');

 
$conn = mysqli_connect('localhost', 'root', 'password', 'canary');
$check="SELECT memberID FROM enrolment WHERE courseID = (SELECT c.courseID FROM course as c,enrolment as e,member as m 
WHERE m.memberID=e.memberID AND e.courseID=c.courseID 
AND courseName='$_POST[courseName]' AND firstName='$_POST[firstName]' AND lastName='$_POST[lastName]'
)";
$rs = mysqli_query($conn,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[0] > 1) {
    echo "MemberID already enrolled on this course<br/>";
}

else
{
    $newUser="INSERT INTO enrolment (enrolmentID,memberID,courseID) 
VALUES (NULL,(SELECT memberID FROM member WHERE firstName='$_POST[firstName]' AND lastName='$_POST[lastName]'), (SELECT courseID FROM course where courseName='$_POST[courseName]'))";
    if (mysqli_query($conn,$newUser))
    {
           echo "<h2> Member with Name:$_POST[firstName] $_POST[lastName] was enrolled on Course:$_POST[courseName] Successfully </h2>";
    }
    else
    {
        echo "Error enrolling Member on a course <br/>";
    }
}


echo "<a href='Web.php' class='btn'><span>HOME</span></a>";
mysqli_close($conn);




?>