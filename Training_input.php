<?php

$employee_id = $_POST["employee_id"];
$course_id= $_POST["course_id"];
$course_name = $_POST["course_name"];
$date_taken = $_POST["date_taken"];

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
        
$sql = "INSERT INTO training (employee_id,course_id,course_name,date_taken) VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,'iiss', $employee_id, $course_id, $course_name, $date_taken);

mysqli_stmt_execute($stmt);

echo "*** Training record added for $employee_id";
echo nl2br("\n\n");
echo "<a href='Employee_menu.html?employee_id=". "" . "'>return</a></td>";
$conn->close();
?>