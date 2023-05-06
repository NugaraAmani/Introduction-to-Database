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
$sql = "update organization set  org_name =?, fname = ?, mname = ?, lname = ? where org_id = ?";

$org_id = $_REQUEST["org_id"];
$org_name = $_REQUEST["org_name"];
$fname = $_REQUEST["fname"];
$mname = $_REQUEST["mname"];
$lname = $_REQUEST["lname"];


$stmt = mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
$stmt = $conn->prepare($sql);

mysqli_stmt_bind_param($stmt,"ssssi", $org_name, $fname, $mname, $lname, $org_id );

mysqli_stmt_execute($stmt);

if($stmt->execute() === TRUE) {
    echo "*** Organization Record updated ***";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo nl2br("\n\n");
echo "<a href='Org_report.php?org_id=". "" . "'>return</a></td>";
$conn->close();
?>