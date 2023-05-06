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
    
$sql = "SELECT department_id, deptname,fname,mname,lname,org_id  FROM department ORDER BY department_id ASC ";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows >0) {
    
    echo "<a href='Org_report.php?employee_id=". "?" . "'>Organization</a></td>\n";
    echo str_repeat("&nbsp;", 3);
    echo nl2br("\n\n");
    
    echo "<th><b> DEPATMENT/ORGANIZATION REPORT </th><br>\n";
    echo nl2br("\n\n");
	// Return the results, loop through them and echo
	echo "<table border=1 width='100%'>\n";
		echo '<tr>'."\n";
		echo "<td><b>DEPARTMENT ID</td>\n" . "<td><b>DEPARTMENT NAME</td>\n" . "<td><b>DEPT-MANAGER FIRST NAME</td>\n" . "<td><b>DEPT-MANAGER MIDDLE NAME</td>\n" . "<td><b>DEPT-MANAGER LAST NAME</td>\n" . "<td><b>ORGANIZATION ID</td>\n" . "<td><b>ORG NAME</td>\n" . "<td><b>ORG-MANAGER FIRST NAME</td>\n" . "<td><b>ORG-MANAGER LAST NAME</b> </td>\n";
		echo '</tr>'."\n"; 
	 while($row = $result->fetch_assoc())
     {
        
        
        $sql = "SELECT  org_name,fname,lname FROM organization WHERE org_id =? ";
        $norg_id = $row['org_id'];
        
		$stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $norg_id);
		$stmt->execute();
		$result2 = $stmt->get_result();
        $row2 = $result2->fetch_assoc();
        
		echo '<tr>'."\n";
		echo "<td>{$row['department_id']}</td>\n" . "<td>{$row['deptname']}</td>\n". "<td>{$row['fname']}</td>\n" . "<td>{$row['mname']}</td>\n" .
        "<td>{$row['lname']}</td>\n" . "<td>{$row['org_id']}</td>\n" . "<td>{$row2['org_name']}</td>\n" . "<td>{$row2['fname']}</td>\n" . 
        "<td>{$row2['lname']}</td>\n".  "<td><a href='Department_search.php?department_id=". $row['department_id'] . "'>EDIT &nbsp;&nbsp </a> " .
        "<a href='Department_delete.php?department_id=". $row['department_id'] . "'>DELETE</a></td>";;
		echo '</tr>'."\n";    
	}
    echo "</table>\n";
     echo nl2br("\n\n");
	echo "<a href='Employee_menu.html?employee_id=". "" . "'>Add Department</a></td>"; 
    echo nl2br("\n\n");
	echo "<a href='Employee_menu.html?employee_id=". "" . "'>Return to Main HR Menu</a></td>";
} 
$conn->close();
?>
 