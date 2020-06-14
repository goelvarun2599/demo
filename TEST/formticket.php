<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>.head{color:white;
background-image:linear-gradient(to left,blue,green);

align:center;       
      }
</style>

<body class="head">
<h2>  YOUR  TICKET  IS  BELOW</h2>
<table>
	<tr>
	<th>PNR num</th>
	<th>Train num</th>
	<th>Passenger name</th>
    <th>Seat Quota </th>
    <th>Passenger age </th>
     <th>Passenger gender </th>
      <th>Journey Date </th>



</tr>

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli('localhost', 'root', '', 'project');
 
// Check connection
if($mysqli === false){
  die("ERROR: Could not connect. " . $mysqli->connect_error);
}

 
// Escape user inputs for security
//$num = $mysqli->real_escape_string($_REQUEST['num']);
 
// Attempt insert query execution
$sql = "SELECT pnr,name,age,train_num,quota,gender,Journey_date from passenger where pnr=(SELECT pnr FROM passenger ORDER BY pnr DESC LIMIT 1)";
$result = $mysqli->query($sql);
     if ($result&&$result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["pnr"]. "</td><td>" . $row["train_num"]. "</td><td> " . $row["name"]. "</td><td>" . $row["quota"] ."</td><td>" . $row["age"]."</td><td>" . $row["gender"]."</td><td>" . $row["Journey_date"].
         "</td></tr>";
    }
    echo "</table>";

 }
 
// Close connection
$mysqli->close();

?>
</table>

<h3>   WANT TO CANCEL YOUR TICKET, CLICK BELOW</h3>
<form action="cancel.php" method="post">
       
    <input type="submit" value="  CANCEL TICKET  ">
</form>
</body>
</html>