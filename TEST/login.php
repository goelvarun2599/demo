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
$email = $mysqli->real_escape_string($_REQUEST['email']);
$pass = $mysqli->real_escape_string($_REQUEST['pass']);
session_start();

$_SESSION['email'] = $email;
 
// Attempt insert query execution
$sql = "INSERT  INTO users (email, password) VALUES ('$email',$pass)";
if($mysqli->query($sql) === true){
header("Location:test.php");    
//echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>