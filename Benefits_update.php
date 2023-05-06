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
$sql = "update benefits set stock = ?, saving = ?, fsa = ? where employee_id = ?";

$employee_id = $_REQUEST["employee_id"];
$stock = $_REQUEST["stock"];
$saving = $_REQUEST["saving"];
$fsa = $_REQUEST["fsa"];

$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
$stmt = $conn->prepare($sql);
mysqli_stmt_bind_param($stmt,'sssi', $stock, $saving, $fsa ,$employee_id);

if($stmt->execute() === TRUE) {
    echo "***Benefits updated ***";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo nl2br("\n\n");
echo "<a href='Employee_report.php?employee_id=". "" . "'>return</a></td>";
$conn->close();
?>