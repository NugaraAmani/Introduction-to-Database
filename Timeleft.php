<?php
/* Timeoff TABLE Edit and Update */
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

/*$sql = "SELECT timeoff.sick-timeoff.sick_taken INTO @sick_left, timeoff.vac-timeoff.vac_taken INTO @vac_left, timeoff.per-timeoff.per_taken INTO @per_left ,employee.fname INTO fname, employee.lname INTO lname FROM timeoff JOIN empoyee where employee_id = ?";*/
$sql = "SELECT employee_id, vac,sick,per,vac_taken, sick_taken, per_taken FROM timeoff ORDER BY employee_id ASC ";
$employee_id = $_REQUEST["employee_id"];
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

echo "<table border=1 width='80%'>\n";
		
	echo '<tr>'."\n";
	echo "<th><b>EMPLOYEE ID</th>\n"  . "<th><b>VACATION LEFT </th>\n" . 
        "<th><b>SICK DAYS LEFT </th>\n" . "<td><b> PERSONAL DAYS LEFT</td>\n";
	echo '</tr>'."\n"; 
    
	while($row = $result->fetch_assoc())
     {
		$vac_left = $row["vac"]-$row["vac_taken"];
		$sick_left = $row["sick"]-$row["sick_taken"];
		$per_left = $row["per"]-$row["per_taken"];
        
		echo '<tr>'."\n";
		echo "<td>{$row['employee_id']}</td>\n" ."<td>{$vac_left}</td>\n" .
        "<td>{$sick_left}</td>\n" .  "<td>{$per_left}</td>\n" ;
       
       	echo '</tr>'."\n";    
	}
    echo "</table>\n";
	
    echo nl2br("\n\n");
    echo "<a href='Employee_report.php?employee_id=". "" . "'>Return to Employee Report</a></td>";
?>

 