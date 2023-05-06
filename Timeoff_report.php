<?php
/* Timeoff Report  */

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
    
$sql = "SELECT employee_id, vac,sick,per,vac_taken, sick_taken, per_taken, req_type, req_days FROM timeoff ORDER BY employee_id ASC ";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows >0) {
    
    echo "<a href='Employee_report.php ?employee_id=". "?" . "&nbsp;&nbsp;"."'>Employee</a></td>\n";  
    echo nl2br("\n\n");
    echo "<th><b>TIME OFF TABLE</th>";
	// Return the results, loop through them and echo
	echo "<table border=1 width='80%'>\n";
		echo '<tr>'."\n";
		echo "<th><b>EMPLOYEE ID</th>\n" . "<th><b>ELIGIBLE VACATION DAYS </th>\n" . "<th><b>ELIGIBLE SICK DAYS </th>\n" . "<td><b>ELIGIBLE PERSONAL DAYS </td>\n" . 
        "<th><b>VACATION TAKEN</th>\n" . "<th><b>SICK DAYS TAKEN</th>\n". "<th><b>PERSOAL DAYS TAKEN</th>\n". "<th><b>RECENT TYPE OF DAYS REQUESTED</th>\n" . 
        "<th><b>RECENTLY REQUESTED DAYS</th>\n";
        echo '</tr>'."\n"; 
	  while($row = $result->fetch_assoc())
      {
		echo '<tr>'."\n";
		echo "<td>{$row['employee_id']}</td>\n" . "<td>{$row['vac']}</td>\n" . "<td>{$row['sick']}</td>\n" . 
        "<td>{$row['per']}</td>\n" . "<td>{$row['vac_taken']}</td>\n" . "<td>{$row['sick_taken']}</td>\n". "<td>{$row['per_taken']}</td>\n".
        "<td>{$row['req_type']}</td>\n"."<td>{$row['req_days']}</td>\n".
        "<td><a href='Timeoff_search.php?employee_id=". $row['employee_id'] . " & req_type=". $row['req_type'] ."& req_days=". $row['req_days'] . "'>EDIT &nbsp;&nbsp </a> ";
		echo '</tr>'."\n";    
	  }
	echo "</table>\n";
} 
echo nl2br("\n\n"); 
echo "<a href='Timeleft.php ?employee_id=". "?" . "&nbsp;&nbsp;"."'>Time left View</td>\n";  

$conn->close();
?>
