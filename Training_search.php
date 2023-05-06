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
    
$sql = "SELECT employee_id, course_id,course_name,date_taken FROM training WHERE employee_id = ? ORDER BY employee_id ASC ";
$employee_id = $_REQUEST["employee_id"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$employee_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "<a href='Employee_report.php ?employee_id=". "?" . "&nbsp;&nbsp;"."'>Employee</a></td>\n";  
    echo nl2br("\n\n");
    /*print '<table class="your_class">'; */
    echo "<th><b>TRAINING TABLE</th> \n";  
	// Return the results, loop through them and echo
	echo "<table border=1 width='60%'>\n";
	echo '<tr>'."\n";
	echo "<th><b>EMPLOYEE ID</th></\n" . "<th><b> </th>\n". "<th><b>COURSE ID</th>\n" . "<th><b>COURSE NAME</th>\n" . "<th><b>DATE TAKEN</b> </th>\n";
	echo '</tr>'."\n";
	while($row = $result->fetch_assoc())
     {
		echo "<tr>"."\n";
		echo "<td>{$row['employee_id']}</td>\n" . "<td>{$row['course_id']}</td>\n" . "<td>{$row['course_name']}</td>\n" . "<td>{$row['date_taken']}</td>\n".
		 "<td><a href='Training_edit.php?employee_id=". $row['employee_id'] . "& course_id=". $row['course_id'] ."'>EDIT &nbsp;&nbsp </a> " .
        "<a href='Training_delete.php?employee_id=". $row['employee_id'] . "& course_id=". $row['course_id'] ."'>DELETE</a></td>";
        echo '</tr>'."\n";    
	}
    echo "</table>\n";
    echo nl2br("\n\n");
	echo "<a href='Training_input.html?employee_id=". "" . "'>Add Training</a></td>";
    /**/
    echo nl2br("\n\n");
	echo "<a href='Employee_menu.html?employee_id=". "" . "'>Return</a></td>";
} 
$conn->close();
?>
 