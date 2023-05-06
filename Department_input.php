<?php

$department_id = $_POST["department_id"];
$deptname = $_POST["deptname"];
$fname = $_POST["fname"];
$mname = $_POST["mname"];
$lname = $_POST["lname"];
$org_id = $_POST["org_id"];
   
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
        
$sql = "INSERT INTO department (department_id,deptname,lname,mname,fname,org_id)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,'issssi', $department_id, $deptname,$fname, $mname,$lname,$org_id);
mysqli_stmt_execute($stmt);

echo "***Department Record saved ***";
echo nl2br("\n\n");
echo "<a href='Employee_menu.html?employee_id=". "" . "'>return</a></td>";
?>