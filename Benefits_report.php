<?php
/* Benefits TABLE  */

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
    
$sql = "SELECT employee_id, stock,saving,fsa FROM benefits ORDER BY employee_id ASC ";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows >0) {
    
    echo "<a href='Employee_report.php ?employee_id=". "?" . "&nbsp;&nbsp;"."'>Employee</a></td>\n";  
    echo nl2br("\n\n");
    echo "<th><b>Benefits TABLE</th>";
	// Return the results, loop through them and echo
	echo "<table border=1 width='60%'>\n";
		echo '<tr>'."\n";
		echo "<th><b>EMPLOYEE ID</th>\n" . "<th><b>ELIGIBLE FOR STOCK </th>\n" . "<th><b>ELIGIBLE FOR 401k</th>\n" . "<td><b>SELECTED FSA</td>\n" ;
        echo '</tr>'."\n"; 
	 while($row = $result->fetch_assoc())
     {
		echo '<tr>'."\n";
		echo "<td>{$row['employee_id']}</td>\n" . "<td>{$row['stock']}</td>\n" . "<td>{$row['saving']}</td>\n" . 
        "<td>{$row['fsa']}</td>\n" .
        "<td><a href='Benefits_search.php?employee_id=". $row['employee_id'] . "'>EDIT &nbsp;&nbsp </a> ";
        /*"<td><a href='Benefits_delete.php?employee_id=". $row['employee_id'] . "'>DELETE &nbsp;&nbsp </a> ";*/
		echo '</tr>'."\n";    
	}
    echo "</table>\n";
} 
$conn->close();
?>
