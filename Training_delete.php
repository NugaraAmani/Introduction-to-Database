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

$sql = "delete from training where employee_id=? && course_id =?";
$employee_id = $_REQUEST["employee_id"];
$course_id = $_REQUEST["course_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $employee_id,$course_id);
if($stmt->execute() === TRUE) {
    echo "*** Record with Employee Id =  $employee_id and course id = $course_id deleted *** ";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo nl2br("\n\n");
	echo "<a href='Training_report.php?employee_id=". "" . "'>Return to Training</a></td>";

$conn->close();
?>