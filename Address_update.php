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
$sql = "update addresses set street1 = ?, street2 = ?, city = ?, state = ?, zipcode = ?  where employee_id = ?";

$employee_id = $_REQUEST["employee_id"];
$street1 = $_REQUEST["street1"];
$street2 = $_REQUEST["street2"];
$city = $_REQUEST["city"];
$state = $_REQUEST["state"];
$zipcode = $_REQUEST["zipcode"];

$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
$stmt = $conn->prepare($sql);
mysqli_stmt_bind_param($stmt,'sssssi', $street1, $street2, $city, $state, $zipcode,$employee_id);

if($stmt->execute() === TRUE) {
    echo "*** Address updated ***";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
echo nl2br("\n\n");
echo "<a href='Employee_report.php?employee_id=". "" . "'>return</a></td>";
 
?>