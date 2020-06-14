<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli('localhost', 'root', '', 'tut');
 
// Check connection
if($mysqli === false){
  die("ERROR: Could not connect. " . $mysqli->connect_error);
}

 
// Escape user inputs for security
//$name = $mysqli->real_escape_string($_REQUEST['name']);
$ssta = $mysqli->real_escape_string($_REQUEST['ss']);
$dsta = $mysqli->real_escape_string($_REQUEST['ds']);

$sql = "SELECT * FROM tr WHERE ss='$ssta' AND 'ds=$dsta'";
$result = $mysqli->query($sql);
     if ($result&&$result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "train_num: " . $row["id"]. " - source_to_destination " . $row["ss"]. " " . $row["ds"]. "<br>";
    }
} else {
    echo "0 results";
}
// if ($conn->query($sql) === TRUE) {
//     echo "Table MyGuests created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }
$mysqli->close();
?>