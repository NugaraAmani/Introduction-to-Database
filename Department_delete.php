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

$sql = "delete from department where department_id=?";
$department_id = $_REQUEST["department_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $department_id);
if($stmt->execute() === TRUE) {
    echo "*** Record with department_id = $department_id deleted *** ";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo nl2br("\n\n");
echo "<a href='Employee_menu.html?employee_id=". "" . "'>return to Menu</a></td>";
$conn->close();
?>