<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli('localhost', 'root', '', 'project');
 
// Check connection
if($mysqli === false){
  die("ERROR: Could not connect. " . $mysqli->connect_error);
}

 
// Escape user inputs for security
//$name = $mysqli->real_escape_string($_REQUEST['name']);
$name = $mysqli->real_escape_string($_REQUEST['name']);
$addr = $mysqli->real_escape_string($_REQUEST['addr']);
$age = $mysqli->real_escape_string($_REQUEST['age']);
$num = $mysqli->real_escape_string($_REQUEST['num']);
$gender = $mysqli->real_escape_string($_REQUEST['gender']);
 
// Attempt insert query execution
$sql = "UPDATE passenger SET name='$name',address='$addr',age='$age',pnum='$num',gender='$gender' WHERE pnr=(SELECT pnr FROM passenger ORDER BY pnr DESC LIMIT 1)" ;
if($mysqli->query($sql) === true){
header("Location:payment.php");    
//echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>