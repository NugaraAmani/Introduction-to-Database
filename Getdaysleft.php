<?php	

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

  
  $employee_id = $_REQUEST["employee_id"];
  $req_type = $_REQUEST["req_type"];
  $req_days = $_REQUEST["req_days"];
  $new_days = $_REQUEST["req_days"];
  
  $sql = "SELECT vac_taken,sick_taken,per_taken FROM timeoff where employee_id = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i",$employee_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();  
 echo "req type = $req_type and $req_days for $employee_id";
  
  if ($req_type == "vac")
  {
		echo $req_days;
        $sql = "update timeoff set vac_taken = ? where employee_id = ?";
        $new_days = $new_days + row["vac_taken"];
        echo $new_days;
  }
  else ($req_type == "sick")
  {
        $sql = "UPDATE timeoff set sick_taken = ? where employee_id = ?"
        $new_days +=  row["sick_taken"];
        echo $new_days;
  }
  else ($req_type == "per")
  {
		$sql = "update timeoff set per_taken= $req_days + row["per_taken"] where employee_id = ?";
        echo $sql;
  } 
    
  $stmt = mysqli_stmt_init($conn);

  if( ! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
  }
  $stmt = $conn->prepare($sql);
  mysqli_stmt_bind_param($stmt,'ii', $req_days,$employee_id);

   if($stmt->execute() === TRUE) {
		echo "*** Time off Days updated ***";
   }
   else {
		echo "Error: " . $sql . "<br>" . $conn->error;
   }
?>
 