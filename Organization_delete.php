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

$sql = "delete from organization where org_id=?";
$org_id = $_REQUEST["org_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $org_id);
if($stmt->execute() === TRUE) {
    echo "*** Record with Organization Id =  $org_id  deleted *** ";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>