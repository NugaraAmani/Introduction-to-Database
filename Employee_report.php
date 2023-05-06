<?php
/* Employee TABLE  */

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
    
$sql = "SELECT employee_id, fname,mname,lname,birthdate, phone,email,department_id FROM employee ORDER BY employee_id ASC ";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows >0) 
{
    
    echo "<a href='Address_report.php?employee_id=". "?" . "'>Addresses</a></td>\n";
    echo str_repeat("&nbsp;", 3);
    echo "<a href='Benefits_report.php?employee_id=". "?" . "'>Benefits</a></td>\n";
    echo str_repeat("&nbsp;", 3);
    echo "<a href='Timeoff_report.php?employee_id=". "?" . "'>Time Off</a></td>\n";
    echo str_repeat("&nbsp;", 3);
    echo "<a href='Personal_report.php?employee_id=". "?" . "'>Personal Information</a></td>\n";
    echo str_repeat("&nbsp;", 3);
    echo "<a href='Training_report.php ?employee_id=". "?" . "&nbsp;&nbsp;"."'>Training</a></td>\n";  
    echo nl2br("\n\n");
    echo "<th><b>EMPLOYEE REPORT</th>";
    echo nl2br("\n\n");
	// Return the results, loop through them and echo
	echo "<table border=1 width='100%'>\n";
		echo '<tr>'."\n";
		echo "<th><b>EMPLOYEE ID</th>\n" . "<th><b>FIRST NAME</th>\n" . "<th><b>MIDDLE NAME</th>\n" . "<td><b>LAST NAME</td>\n" . "<th><b>PHONE</th>\n" . "<th><b>EMAIL</th>\n" . 
        "<th><b>BIRTH DATE</th>\n" . "<th><b>DEPARTMENT ID</b> </th>\n" ."<th><b>JOB LEVEL</b> </th>\n" ."<th><b>EMPLOYMENT TYPE (FULL/PART/CONT)</b> </th>\n" . "<th><b>EDIT/DELETE</b> </th>\n";
		echo '</tr>'."\n"; 
	 while($row = $result->fetch_assoc())
     {
		$sql = "SELECT level,type FROM personal_details WHERE employee_id =? ";
        $nemployee_id = $row['employee_id'];
        
		$stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $nemployee_id);
		$stmt->execute();
		$result2 = $stmt->get_result();
        $row2 = $result2->fetch_assoc();
     
		echo '<tr>'."\n";
		echo "<td>{$row['employee_id']}</td>\n" . "<td>{$row['fname']}</td>\n" . "<td>{$row['mname']}</td>\n" . 
        "<td>{$row['lname']}</td>\n" . "<td>{$row['phone']}</td>\n" . "<td>{$row['email']}</td>\n" .
        "<td>{$row['birthdate']}</td>\n" . "<td>{$row['department_id']}</td>\n" .
        "<td>{$row2['level']}</td>\n" . "<td>{$row2['type']}</td>\n" .
        "<td><a href='Employee_search.php?employee_id=". $row['employee_id'] . "'>EDIT &nbsp;&nbsp </a> " .
        "<a href='Employee_delete.php?employee_id=". $row['employee_id'] . "'>DELETE</a></td>";
		echo '</tr>'."\n";    
	}
    echo "</table>\n";
    
    echo nl2br("\n\n");
	echo "<a href='Employee_input.html?employee_id=". "" . "'>Add Employee</a></td>";
	echo nl2br("\n\n");
    echo "<a href='Employee_menu.html?employee_id=". "" . "'>Return to Main Menu</a></td>";
}  


$conn->close();

?>
