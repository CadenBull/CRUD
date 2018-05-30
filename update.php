<HTML>
    <head></head>
    <body>
<?php
//update_delete.php
if ($_GET['action'] == 'Go Back') 
    {
             //action for No
        header('Location: template.html');
        exit;   
    }
else
    {
        echo $lastName;
        echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
    
        require_once 'login.php';
        $conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
            if ($conn->connect_error) 
            {
             die("Connection failed: " . $conn->connect_error);
            }

	
        $sql = "SELECT * FROM Products WHERE balltype='" . $_POST['update'] . "'";
        $result = $conn->query($sql);

        $lastName = $row[0];
        $balltype = $row[1];
        $amount = $row[2];

        
        if ($result->num_rows > 0)//will only do this if there is something to be returned from the above line
	        {
                while($row = $result->fetch_assoc())
		            {
                        // HTML to display the form on this page.
                        echo"Edit the information for".$row['lastName'].".";
	                    echo "<TABLE><TR><TH>Name</TH><TH>Balltype</TH><TH>Amount</TH></TR>";
                        echo "<TR>";
	                    echo "<TD>".$row['lastName']. "</TD><TD>". $row['balltype']. "</TD><TD>". $row['amount']. "</TD></TR>";
	                    echo "<form action='changeItem.php' method = 'post'>";
	                    echo "<TR><TD><input type='text' name = lastName value=".$row['balltype']." class='field left' readonly></TD>";
                        echo "<TD><input type='text' placeholder='Full Name' name='lastName' class='advancedSearchTextBox'></TD>";
                        echo "<TD><select id='select' name='balltype'>";
                        echo "<option value='Golfball' >Golfball</option>";
                        echo "<option value='Basketball' >Basketball</option>";
                        echo "<option value='Baseball' >Baseball</option>";
                        echo "<option value='Volleyball' >Volleyball</option>";
                        echo "<option value='Soccerball' >Soccerball</option>";
                        echo "<option value='Football' >Football</option>";
                        echo "<option value='Tennisball' >Tennisball</option>";
                        echo "</select></TD>";
                        echo "<TD><select id='select' name='amount'>";
                        echo "<option value='1' >1</option>";
                        echo "<option value='3' >3</option>";
                        echo "<option value='5' >5</option>";
                        echo "<option value='10' >10</option>";
                        echo "<option value='15' >15</option>";
                        echo "<option value='20' >20</option>";
                        echo "</select></TD></TR></TABLE>";
                        echo "<input name = 'create' type = 'submit' value = 'Submit Changes'>";
                        echo "</form>";
	                    
	                    
                    } 
                 echo "</body>";   
	        }
    }
?>
</HTML>