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
$sql = "update employee set fname = ?, mname = ?, lname = ?, email = ?, phone = ?, department_id = ?, birthdate =? where employee_id = ?";

$employee_id = $_REQUEST["employee_id"];
$fname = $_REQUEST["fname"];
$mname = $_REQUEST["mname"];
$lname = $_REQUEST["lname"];
$email = $_REQUEST["email"];
$phone = $_REQUEST["phone"];
$department_id = $_REQUEST["department_id"];
$birthdate = $_REQUEST["birthdate"];

$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
$stmt = $conn->prepare($sql);
mysqli_stmt_bind_param($stmt,'sssssisi', $fname, $mname, $lname, $email, $phone, $department_id, $birthdate,$employee_id);

if($stmt->execute() === TRUE) {
    echo "*** Record updated ***";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo nl2br("\n\n");
echo "<a href='Employee_report.php?employee_id=". "" . "'>return</a></td>";
$conn->close();
?>