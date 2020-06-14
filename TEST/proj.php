<!DOCTYPE html>
<html>
<head>
	<title>Choosing train number</title>
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
	<th>source station</th>
	<th>destination station</th>
    <th>departure time </th>
    <th>arrival time </th>


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

$ssta = $conn->real_escape_string($_REQUEST['ss']);
$dsta = $conn->real_escape_string($_REQUEST['ds']);
$jd=$conn->real_escape_string($_REQUEST['jd']);
session_start();

$email = $_SESSION['email'];

$sql = "SELECT * FROM trains WHERE sstation='$ssta'AND dstation='$dsta'";
$result = $conn->query($sql);
     if ($result&&$result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["train_num"]. "</td><td>" . $row["tname"]."</td><td>" . $row["sstation"]. "</td><td> " . $row["dstation"]. "</td><td>" . $row["deptime"] ."</td><td>" . $row["arrtime"]. "</td></tr>";
    }
    echo "</table>";

     $sq="INSERT INTO passenger(email,journey_date)VALUES('$email','$jd')";
if($co->query($sq)===TRUE)
{
   // echo "sucess";
}
else{
    echo "fail";
}
} else {
    echo "0 results";

}
$conn->close();



?>
</table>

<form action="seat.php" method="post">
    <p>
        <label for="trainnum">train number:</label>
        <input type="text" required name="tn" id="tn">
    </p>
      
    <input type="submit" value="Submit">
</form>

</body>
</html>