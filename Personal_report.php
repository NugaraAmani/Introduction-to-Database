<?php
/* Training TABLE  */

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
    
$sql = "SELECT employee_id,ssnum,type,level,startdate,salary FROM personal_details ORDER BY employee_id ASC ";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "<a href='Employee_report.php ?employee_id=". "?" . "&nbsp;&nbsp;"."'>Employee</a></td>\n";  
    echo nl2br("\n\n");
    /*print '<table class="your_class">'; */
    echo "<th><b>PERSONAL DATE TABLE</th> \n";  
	// Return the results, loop through them and echo
	echo "<table border=1 width='60%'>\n";
	echo '<tr>'."\n";
	echo "<th><b>EMPLOYEE ID</th></\n" .  "<th><b>SOCIAL SECURITY</th>\n" .  "<th><b>SOCIAL SECURITY</th>\n". "<th><b>EMPLOYEMENT TYPE</th>\n" . "<th><b>EMPLOYEE LEVEL</b> </th>\n". "<th><b>EMPLOYEE HIRED DATE</b> </th>\n". "<th><b>CURRENT SALARY ($)</b> </th>\n";
	echo '</tr>'."\n";
	while($row = $result->fetch_assoc())
     {
		echo '<tr>'."\n";
		echo "<td>{$row['employee_id']}</td>\n" . "<td>{$row['ssnum']}</td>\n" . "<td>{$row['type']}</td>\n" . "<td>{$row['level']}</td>\n" . "<td>{$row['startdate']}</td>\n" . "<td>{$row['salary']}</td>\n".
		 "<td><a href='Personal_search.php?employee_id=". $row['employee_id'] . "'>EDIT &nbsp;&nbsp </a> ";
        echo '</tr>'."\n";    
	}
    echo "</table>\n";
} 
$conn->close();
?>
 