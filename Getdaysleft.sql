CREATE FUNCTION Getdaysleft($employee_id, $ptype, $days) RETURNS CHAR
BEGIN
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
    
        /* calling stored procedure command*/
        if($ptype = "vac")
        {
			$sql = "CALL GetVacApproval(?,?,@status)";
            echo "vac\n";
		}
         
		elseif($ptype = "sick")
        {
			$sql = "CALL GetSickApproval(?,?, @status)";
            echo "sick\n";
		}
        //prepare for execution of the stored procedure
        
        $stmt = $conn->prepare($sql);

        // pass value to the command
        $stmt->bindParam('ii', $employee_id, $days);

        // execute the stored procedure
        $stat=$stmt->execute();
        $stmt->closeCursor();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    
		RETURN $row["status"];
END