<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli('localhost', 'root', '', 'project');
 
// Check connection
if($mysqli === false){
  die("ERROR: Could not connect. " . $mysqli->connect_error);
}
$mysql = new mysqli('localhost', 'root', '', 'project');
 
// Check connection
if($mysql === false){
  die("ERROR: Could not connect. " . $mysql->connect_error);
}

$mysq = new mysqli('localhost', 'root', '', 'project');
 
// Check connection
if($mysq === false){
  die("ERROR: Could not connect. " . $mysql->connect_error);
}

 
// Escape user inputs for security
//$name = $mysqli->real_escape_string($_REQUEST['name']);
$pnr = $mysqli->real_escape_string($_REQUEST['pnr']);
$email = $mysqli->real_escape_string($_REQUEST['email']);

 
// Attempt insert query execution
$s="UPDATE seat set general=general+1,sleeper=sleeper+1,ac=ac+1 where train_num=(select train_num from passenger where pnr=$pnr)";
$sql="DELETE FROM passenger WHERE pnr ='$pnr' ";
$sq="DELETE FROM users WHERE email ='$email'";
if($mysqli->query($sql) === true&&$mysql->query($sq) === true&&$mysq->query($s) === true){
header("Location:final.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>