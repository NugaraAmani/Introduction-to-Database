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
$sql = "update training set course_name =?, date_taken = ? where employee_id = ? && course_id = ?";

$employee_id = $_REQUEST["employee_id"];
$course_id = $_REQUEST["course_id"];
$course_name = $_REQUEST["course_name"];
$date_taken = $_REQUEST["date_taken"];


$stmt = mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
$stmt = $conn->prepare($sql);

mysqli_stmt_bind_param($stmt,"ssii", $course_name, $date_taken, $employee_id, $course_id);

mysqli_stmt_execute($stmt);

if($stmt->execute() === TRUE) {
    echo "*** Training Record updated ***";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo nl2br("\n\n");
echo "<a href='Employee_menu.html?employee_id=". "" . "'>return</a></td>";
$conn->close();
?>