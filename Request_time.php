<?php

/* Timeoff TABLE - Request time off */
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

$sql = "SELECT * FROM timeoff where employee_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$employee_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows >0) {
    $row = $result->fetch_assoc();
    var_dump($row);
}
$employee_id = $_REQUEST["employee_id"];
$req_type = $_REQUEST["req_type"];
$req_days = $_REQUEST["req_days"];

		
		/* calling stored procedure command */
        if($req_type == "sick")
        {
			$sql = "call GetSickApproval(?,?, @status)";
            echo "Sick\n";
		}
        elseif($req_type == "vac")
        {
			$sql = "call GetVacApproval(?,?, @status)";
            echo "Vacation \n";
		}
        elseif($req_type == "per")
        {
			$sql = "call GetPerApproval(?,?, @status)";
            echo "Personal\n";
		}
        
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ii",$employee_id,$req_days);
	if($stmt->execute() === TRUE) 
	{
		$sql = "SELECT @status as status, @newdays as newdays";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
        
		if($row["status"] == "APPROVED")
        {
			echo "Time off APPROVED for Employee ID = $employee_id ";
			
            echo nl2br("\n\n"); 
            echo "<td><a href='Timeoff_search.php?employee_id=". $employee_id . " & req_days=". $req_days . " & req_type=". $req_type . " '>UPDATE TIME OFF FOR EMPLOYEE &nbsp;&nbsp </a> ";
            
		}else
			echo "Time off NOT APPROVED for Employee ID = $employee_id. Time requested $req_days is over Remaining time off ";
	
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close();
?>

            
            