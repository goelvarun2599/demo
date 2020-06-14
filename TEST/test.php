<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT  train_num,sstation, dstation FROM trains";
$result = $conn->query($sql);
$conn->close();
//$r=$conn->query($sql);
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();

$email = $_SESSION['email'];
//$_SESSION['email'] = $email;
 
$sql = "SELECT train_num,sstation, dstation FROM trains";
$r = $conn->query($sql);
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Choosing stations</title>
</head>
<style>.head{color:white;
background-image:linear-gradient(to left,blue,red);

align:center;       
      }
</style>

<body class="head">
	<h3>Search the source station and destination station names from the options and fill in the appropriate details in the space available.</h3>
<table>
    <tr>
    <th>source station </th>
    <th>destination station </th>
   </tr>
</table>
<select>
<?php

while ($row=$result->fetch_assoc()):;?>

<option><?php echo $row['sstation'];?></option>	<br>
<?php endwhile;?>

 
</select>

<select>
<?php
while ($row1=$r->fetch_assoc()):;?>
<option><?php echo $row1['dstation'];?></option>	
 <?php endwhile;?>
</select>
<form action="proj.php" method="post">
    <p>
        <label for="source">source station:</label>
        <input type="text" required name="ss" id="ss">
    </p>
      <p>
        <label for="destination">destination station:</label>
        <input type="text" required name="ds" id="ds">
    </p>
     <p>
        <label for="journey-date">journey date:</label>
        <input type="text" required name="jd" id="jd">
    </p>
   
    <input type="submit" value="Submit">
</form>
</body>
</html>