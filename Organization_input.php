<?php

$org_id = $_POST["org_id"];
$org_name = $_POST["org_name"];
$fname = $_POST["fname"];
$mname = $_POST["mname"];
$lname = $_POST["lname"];

   
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
        
$sql = "INSERT INTO organization (org_id,org_name,lname,mname,fname)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,'issss', $org_id, $org_name, $lname, $mname, $fname);
mysqli_stmt_execute($stmt);

echo "***New Organization Record saved ***";
echo nl2br("\n\n");
echo "<a href='Employee_menu.html?employee_id=". "" . "'>return</a></td>";
?>