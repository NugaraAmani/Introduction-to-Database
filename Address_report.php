<?php
/* Address TABLE  */

$host = "localhost";
$dbname = "fab";
$username = "root";
$password = "";
     
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);   
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}       
    
$sql = "SELECT employee_id, street1,street2,city,state, zipcode  FROM addresses ORDER BY employee_id ASC ";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows >0) {
    
    echo "<a href='Employee_report.php ?employee_id=". "?" . "&nbsp;&nbsp;"."'>Employee</a></td>\n";  
    echo nl2br("\n\n");
    echo "<th><b>Address TABLE</th>";
	// Return the results, loop through them and echo
	echo "<table border=1 width='80%'>\n";
		echo '<tr>'."\n";
		echo "<th><b>EMPLOYEE ID</th>\n" . "<th><b>STREET </th>\n" . "<th><b>STREET</th>\n" . "<td><b>CITY</td>\n" . "<th><b>STATE</th>\n" . "<th><b>ZIPCODE</th>\n" ;
        echo '</tr>'."\n"; 
	 while($row = $result->fetch_assoc())
     {
		echo '<tr>'."\n";
		echo "<td>{$row['employee_id']}</td>\n" . "<td>{$row['street1']}</td>\n" . "<td>{$row['street2']}</td>\n" . 
        "<td>{$row['city']}</td>\n" . "<td>{$row['state']}</td>\n" . "<td>{$row['zipcode']}</td>\n".
        "<td><a href='Address_search.php?employee_id=". $row['employee_id'] . "'>EDIT &nbsp;&nbsp </a> ";
        /*"<td><a href='Address_delete.php?employee_id=". $row['employee_id'] . "'>DELETE &nbsp;&nbsp </a> ";*/
		echo '</tr>'."\n";    
	}
    echo "</table>\n";
} 
$conn->close();
?>
