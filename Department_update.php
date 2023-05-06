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
$sql = "update department set  deptname =?, fname = ?, mname = ?, lname = ?, org_id = ?  where department_id = ?";

$department_id = $_REQUEST["department_id"];
$deptname = $_REQUEST["deptname"];
$fname = $_REQUEST["fname"];
$mname = $_REQUEST["mname"];
$lname = $_REQUEST["lname"];
$org_id = $_REQUEST["org_id"];

$stmt = mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
$stmt = $conn->prepare($sql);

mysqli_stmt_bind_param($stmt,"ssssii", $deptname, $lname, $mname, $fname, $org_id,$department_id );

mysqli_stmt_execute($stmt);

if($stmt->execute() === TRUE) {
    echo "*** Department Record updated ***";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo nl2br("\n\n");
echo "<a href='Employee_menu.html?employee_id=". "" . "'>return to Menu</a></td>";
$conn->close();
?>