<!DOCTYPE html>
<html>
<head>
	<title>train reservation system</title>
</head>
<style>.head{color:white;
background-image:linear-gradient(to left,blue,red);

align:center;       
      }
</style>

<body class="head">
    <h3> See the list of trains below and enter the train number below</h3>
<table>
	<tr>
	<th>train num</th>
	<th>train name</th>
	<th>remaining general seats</th>
    <th>remaining sleeper seats </th>
    <th>remaining ac seats </th>


</tr>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$co = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($co->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tn = $conn->real_escape_string($_REQUEST['tn']);

session_start();

$_SESSION['tn'] = $tn;

$sql = "SELECT * FROM seat WHERE train_num='$tn'";
$result = $conn->query($sql);
     if ($result&&$result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["train_num"]. "</td><td>" . $row["tname"]. "</td><td> " . $row["general"]. "</td><td>" . $row["sleeper"] ."</td><td>" . $row["ac"]. "</td></tr>";
    }
    echo "</table>";
    
    $sq="UPDATE passenger SET train_num='$tn' WHERE pnr=(SELECT pnr FROM passenger ORDER BY pnr DESC LIMIT 1)";
    if($co->query($sq)===TRUE){

    }
    else
    {
        echo "fail";
    }


} else {
    echo "0 results";
}
$conn->close();


?>
</table>
<h4>Choose the seat ,you want to get if available by entering general,sleeper or ac in the space</h4>
<form action="p1.php" method="post">
    <p>
        <label for="quota">Seat Quota:</label>
        <input type="text" required name="quota" id="quota">
    </p>
      
    <input type="submit" value="Submit">
</form>

</body>
</html>