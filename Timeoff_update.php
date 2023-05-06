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
$sql = "update timeoff set vac = ?, sick = ?, per = ?, vac_taken = ?, sick_taken = ?, per_taken = ?, req_days =?, req_type = ? where employee_id = ?";

$employee_id = $_REQUEST["employee_id"];
$vac = $_REQUEST["vac"];
$sick = $_REQUEST["sick"];
$per = $_REQUEST["per"];
$vac_taken = $_REQUEST["vac_taken"];
$sick_taken = $_REQUEST["sick_taken"];
$per_taken = $_REQUEST["per_taken"];
$req_days = $_REQUEST["req_days"];
$req_type = $_REQUEST["req_type"];
$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
$stmt = $conn->prepare($sql);
mysqli_stmt_bind_param($stmt,'iiiiiiisi', $vac, $sick, $per, $vac_taken, $sick_taken,$per_taken, $req_days, $req_type, $employee_id);

if($stmt->execute() === TRUE) {
    echo "*** Time taken updated ***";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo nl2br("\n\n");
echo "<a href='Employee_report.php?employee_id=". "" . "'>return</a></td>";
echo nl2br("\n\n");
echo "<a href='Employee_menu.html?employee_id=". "" . "'>Return to HR Main Menu</a></td>";
$conn->close();
?>