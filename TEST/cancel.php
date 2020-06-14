<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>WELCOME FORM</title>
<style>.head{color:white;
background-image:linear-gradient(to left,yellow,green);

align:center;       
      }
</style>
</head>
<body class="head">
    <h2>ENTER PNR NUMBER TO CANCEL YOUR TICKET</h2>
    <!-- <img src="https://c.ndtvimg.com/2018-12/l358rd1o_train-18-twitter_625x300_03_December_18.jpg"> -->
    <!-- <img src="https://images.livemint.com/img/2019/09/04/600x338/9f0248da-ce45-11e9-9b24-806e1219a662_1567622026376_1567622289371.jpg">
    <h3>FILL THE DETAILS BELOW TO BOOK YOUR TICKET</h3>
 --><form action="ticket_cancel.php" method="post">
    <p>
        <label for="pnr">PNR NUMBER:</label>
        <input type="text" required name="pnr" id="pnr">
    </p>
    <p>
        <label for="pnr">EMAIL:</label>
        <input type="text" required name="email" id="email">
    </p>
     
    <input type="submit" value="Submit">
</form>
</body>
</html>




