<!DOCTYPE html>
<html >
<head>
<title>collect passenger details</title>
</head>
<style>.head{color:white;
background-image:linear-gradient(to left,blue,red);

align:center;       
      }
</style>

<body class="head">

	<h3>  ENTER  YOUR DETAILS</h3>
<?php

$mysqli = new mysqli('localhost', 'root', '', 'project');
 
// Check connection
if($mysqli === false){
  die("ERROR: Could not connect. " . $mysqli->connect_error);
}

 
// Escape user inputs for security
//$name = $mysqli->real_escape_string($_REQUEST['name']);
$quota = $mysqli->real_escape_string($_REQUEST['quota']);
$sq="UPDATE passenger SET quota='$quota' WHERE pnr=(SELECT pnr FROM passenger ORDER BY pnr DESC LIMIT 1)";
    if($co->query($sq)===TRUE)
{
    echo "sucess";
}
else{
    echo "fail";
}
<form action="booking.php" method="post">
    <p>
        <label for="pname">NAME:</label>
        <input type="text" required name="name" id="name">
    </p>
      <p>
        <label for="paddr">ADDRESS:</label>
        <input type="text" required name="addr" id="addr">
    </p>
    <p>
        <label for="pnum">PHONE NUM:</label>
        <input type="text" required name="num" id="num">
    </p>
    <p>
        <label for="page">AGE:</label>
        <input type="text" required name="age" id="age">
    </p>
    
   <p>
        <label for="pgender">GENDER:</label>
        <input type="text" required name="gender" id="gender">
    </p>
    <input type="submit" value="Submit">
</form>
</body>
</html>




