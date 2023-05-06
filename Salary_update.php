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
$sql = "update personal_details set ssnum = ?, type = ?, level = ?, startdate = ?, salary= ?  where employee_id = ?";

$employee_id = $_REQUEST["employee_id"];
$ssnum = $_REQUEST["ssnum"];
$type = $_REQUEST["type"];
$level = $_REQUEST["level"];
$startdate = $_REQUEST["startdate"];
$salary = $_REQUEST["salary"];


$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
$stmt = $conn->prepare($sql);
mysqli_stmt_bind_param($stmt,'ssssii', $ssnum, $type, $level, $startdate, $salary, $employee_id);

if($stmt->execute() === TRUE) {
    echo "*** Personal details updated ***";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo nl2br("\n\n");
echo "<a href='Employee_report.php?employee_id=". "" . "'>Return to Employee report</a></td>";
$conn->close();
?>