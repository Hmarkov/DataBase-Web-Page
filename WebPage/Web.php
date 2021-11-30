<html>
 <head>
  <title>Home Page</title>
  <link href="menu.css" rel="stylesheet" type="text/css" />
    <link href="Form.css" rel="stylesheet" type="text/css" />
	<link href="table.css" rel="stylesheet" type="text/css" />
	<script>
	 function showhide(id) {
       	var a = document.getElementById(id);
       	a.style.display = (a.style.display == 'block') ? 'none' : 'block';
     }

 

  
</script>
	
	
 </head>
 <body>

<div class="drop">
<a class="btn1"  name="btn1" href="Web.php" title="Web Home">Clear</a>


</div>

<div class="drop" >
<a  class="btn2"   name="btn2" href="javascript:showhide('push1')" title="Update">Update</a>

</div>



<div class="drop" >
<a  class="btn3"   name="btn3" href="javascript:showhide('push2')" title="Member">Member</a>

</div>


<div class="drop" >
<a  class="btn4"    name="btn4" href="javascript:showhide('push3')" title="Race">Race</a>

</div>
<div class="drop">
<a class="btn5"  name="btn5" href="javascript:showhide('push4')" title="View">View</a>


</div>


<div class="intro">
<h2>Web Interface</h2>
</div>
<div class="details">
<h2>Canary Canoes Data Manipulation<h2>
</div>

 <div id="push1" style="display:none;">
<h3>Enrol a member on a course</h3>
<form id="form8" action ="Query8.php"  method = "post">
                  <label>Member First Name </label><input type = "text" name = "firstName" class = "box" required /><br /><br />
                  <label>Member Last Name  </label><input type = "text"  name = "lastName" class = "box" required /><br/><br />
				   <label>Course Name      </label><input type = "text"  name = "courseName" class = "box" required /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
</form>
<h3>Assign a member to a race</h3>
<form id="form10" action = "Query10.php" method = "post">
                  <label>Race Name </label><input type = "text" name = "raceName" class = "box" required /><br /><br />
                  <label>Member First Name </label><input type = "text"  name = "firstName" class = "box" required /><br/><br />
				  <label>Member Last Name  </label><input type = "text"  name = "lastName" class = "box" required /><br/><br />
				  <label>Series Name </label><input type = "text"  name = "seriesName" class = "box" required /><br/><br />
				  <label>Year </label><input type = "text"  name = "seriesYear" class = "box" pattern="[0-9.]+" required /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
</form>
 <h3> Add a race result for an existing competitor</h3>
<form id="form5" action = "Query5.php" method = "post">
                  <label>Race ID  </label><input type = "text" name = "raceID" class = "box" pattern="[0-9.]+" required/><br /><br />
                  <label>Member ID </label><input type = "text"  name = "memberID" class = "box" pattern="[0-9.]+" required /><br/><br />
				  <label>Position </label><input type = "text"  name = "position" class = "box" pattern="[0-9.]+" required /><br/><br />

                  <input type = "submit" value = " Submit "/><br />
</form>
</div>



 <div id="push2" style="display:none;">

<h3> Search member in DB</h3>
<form id="form2" action = "Query2.php" method = "post" >
                  
                  <input type = "submit" value = " Submit "/><br />
</form>
 <h3> Insert new member in DB</h3>
<form id="form1" action = "Query1.php" method = "post">
                  <label>First Name </label><input type = "text" name = "firstName" class = "box" required  /><br /><br />
				  <label>Last Name </label><input type = "text" name = "lastName" class = "box" required /><br /><br />
				  <label>Grade </label><input type = "text" name = "grade" class = "box" required  /><br /><br />
                  
                  <input type = "submit" value = " Submit "/><br />
</form>
<h3> Assaing a member to Race</h3>
<form id="form4" action = "Query4.php" method = "post">
                  <label>Member ID </label><input type = "text" name = "memberID" class = "box" pattern="[0-9.]+" required /><br /><br />
                  <label>Race ID </label><input type = "text"  name = "raceID" class = "box" pattern="[0-9.]+" required /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
</form>




</div>






 <div id="push3" style="display:none;">
 <h3>Add a new race</h3>
<form id="form9" action = "Query9.php" method = "post">
                  <label>Race Name </label><input type = "text" name = "raceName" class = "box" required /><br /><br />
                  <label>Race Date </label><input type = "date"  name = "raceDate" class = "box" required /><br/><br />
				     <label>Series Name </label><input type = "text"  name = "seriesName" class = "box" required /><br/><br />
				     <label>Series Year </label><input type = "text"  name = "seriesYear" class = "box" pattern="[0-9.]+" required /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
</form>


 <h3> Delete race by specifying Race ID</h3>
<form id="form3" action = "Query3.php" method = "post">
                  <label>Race ID </label><input type = "text" name = "raceID" class = "box" pattern="[0-9.]+" required /><br /><br />
                  
                  <input type = "submit" value = " Submit "/><br />
</form>

</div>




 <div id="push4" style="display:none;">

<h3>List the results of all races in which a given member has participated</h3>
<form id="form6" action = "Query6.php" method = "post">
                  <label>First Name </label><input type = "text" name = "firstName" class = "box" required /><br /><br />
                  <label>Last Name </label><input type = "text"  name = "lastName" class = "box" required /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
</form>
<h3>Show the results of all races participated in by members enrolled on a course</h3>
<form id="form7" action = "Query7.php" method = "post">
                  <label>Course Name </label><input type = "text" name = "courseName" class = "box" required /><br /><br />
                 
                  <input type = "submit" value = " Submit "/><br />
</form>
</div>




</body>
</html>