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
    
$sql = "SELECT  org_id, org_name,fname,lname FROM organization";
     
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows >0) {
    
    echo "<a href='Departmetn_report.php?employee_id=". "?" . "'>Department</a></td>\n";
    echo str_repeat("&nbsp;", 3);
    echo nl2br("\n\n");
    
    echo "<th><b>ORGANIZATION TABLE </th><br>\n";
	// Return the results, loop through them and echo
	echo "<table border=1 width='100%'>\n";
		echo '<tr>'."\n";
		echo "<td><b>ORGANIZATION ID</td>\n" . "<td><b>ORG NAME</td>\n" . "<td><b>ORG-MANAGER FIRST NAME</td>\n" . "<td><b>ORG-MANAGER LAST NAME</b> </td>\n";
		echo '</tr>'."\n"; 
	 while($row = $result->fetch_assoc())
     {
                
		echo '<tr>'."\n";
		echo "<td>{$row['org_id']}</td>\n" . "<td>{$row['org_name']}</td>\n" . "<td>{$row['fname']}</td>\n" . "<td>{$row['lname']}</td>\n".
         "<td><a href='Organization_search.php?org_id=". $row['org_id'] . "'>EDIT &nbsp;&nbsp </a> " .
        "<a href='Organization_delete.php?org_id=". $row['org_id'] . "'>DELETE</a></td>";;
		echo '</tr>'."\n";    
	}
    echo "</table>\n";
} 
 echo nl2br("\n\n");
 echo "<a href='Employee_menu.html?employee_id=". "" . "'>Add Organization</a></td>";  
 echo nl2br("\n\n");
 echo "<a href='Employee_menu.html?employee_id=". "" . "'>Return to Main HR Menu</a></td>";
$conn->close();
?>
 