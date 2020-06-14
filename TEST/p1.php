<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>.head{color:white;
background-image:linear-gradient(to left,blue,red);

align:center;       
      }
</style>
<body class="head">
<h3>ENTER YOUR DETAILS</h3>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
$co = new mysqli($servername, $username, $password, $dbname);

if ($co->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$quota = $mysqli->real_escape_string($_REQUEST['quota']);
session_start();

$tn = $_SESSION['tn'];

 
// Attempt insert query execution
$sql="UPDATE passenger SET quota='$quota' WHERE pnr=(SELECT pnr FROM passenger ORDER BY pnr DESC LIMIT 1)";
    
if($mysqli->query($sql) === true){
//header("Location:test.php");   
if($quota='ac'){ 
$sq="UPDATE seat SET ac=ac-1,general=general-1,sleeper=sleeper-1 WHERE train_num='$tn'";
    if($co->query($sq)===TRUE){

    }
    else
    {
        echo "fail1";
    }
}
else if($quota='sleeper')
{
    $sq="UPDATE seat SET sleeper=sleeper-1 WHERE train_num='$tn'";
    if($co->query($sq)===TRUE){

    }
    else
    {
        echo "fail2";
    }
}
else
{
    $sq="UPDATE seat SET general=general-1 WHERE train_num='$tn'";
    if($co->query($sq)===TRUE){

    }
    else
    {
        echo "fail3";
    }
}

} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

$mysqli->close();
?>
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
