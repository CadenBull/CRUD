<?php
//read.php
require_once 'login.php';
$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

	
$sql = "SELECT * FROM Products WHERE balltype='" . $_POST['balltype'] . "'";
$result = $conn->query($sql);

$lastName = $row[0];
$balltype = $row[1];
$amount = $row[2];
// HTML to display the form on this page.
echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD><BODY>";
echo nl2br("<H2>Here are the orders to be completed"." ". $_POST['Products']."</H2>");

if ($result->num_rows > 0)//will only do this if there is something to be returned from the above line
	{	echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
		echo "<TABLE><TR><TH>Name</TH><TH>Balltype</TH><TH>Amount</TH></TR>";
		// Iterate through all of the returned images, placing them in a table for easy viewing
	while($row = $result->fetch_assoc())
		{
			// The following few lines store information from specific cells in the data about an image
			echo "<TR>";
			echo "<TD>".$row['lastName']. "</TD><TD>". $row['balltype']. "</TD><TD>".$row['amount'] ."</TD>";
			echo "<TD><form action= 'update.php' method = 'post'>";
			echo "<button name = 'update'   type = 'submit' value =".$row['StudentID'].">Edit</button></FORM>";
			echo "<TD><form action= 'delete.php' method = 'post'>";
			echo "<button name = 'delete'   type = 'submit' value =".$row['lastName'].">Delete</button></FORM>";
			echo "</TR>";
		}
	echo "</TABLE>";
	}
	else{
		echo "<br> 0 results";
		}
echo"<br><form action= 'update.php' method = 'get'>";
echo "<input name = 'action'   type = 'submit' value = 'Go Back'></form>";
echo '</body>';
	
?>