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

$sql = "delete from addresses where employee_id=?";
$employee_id = $_REQUEST["employee_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employee_id);
if($stmt->execute() === TRUE) {
    echo "*** Training record deleted *** ";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>