<?php

$fname = $_POST["firstname"];
$mname = $_POST["middlename"];
$lname = $_POST["lastname"];
$birthdate = $_POST["birthDate"];
$department_id = $_POST["department_id"];
$email = $_POST["emailAddress"];
$phone = $_POST["phoneNumber"];
$street1 = $_POST["street1"];
$street2 = $_POST["street2"];
$city = $_POST["city"];
$state = $_POST["state"];
$zipcode = $_POST["zipcode"];
$ssnum = $_POST["ssnum"];
$etype = $_POST["type"];
$elevel = $_POST["level"];
$startdate = $_POST["startdate"];
$salary = $_POST["salary"];
$vac = $_POST["vac"];
$per = $_POST["per"];
$sick = $_POST["sick"]; 
$saving = $_POST["saving"]; 
$stock = $_POST["stock"]; 
$fsa = $_POST["fsa"]; 


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
        
$sql = "INSERT INTO employee (lname,fname,mname,birthdate,department_id,email,phone) VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,'ssssiss', $lname, $fname, $mname, $birthdate, $department_id, $email, $phone);

mysqli_stmt_execute($stmt);

echo "*** Record saved for employee_id =". $employee_id = mysqli_insert_id($conn);

$sql = "INSERT INTO addresses (employee_id,street1,street2,city,state,zipcode) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,'isssss', $employee_id,$street1,$street2,$city,$state,$zipcode);

mysqli_stmt_execute($stmt);
echo "*** Employee address saved for employee_id = $employee_id ";

$sql = "INSERT INTO personal_details (employee_id,ssnum,type,level,startdate,salary) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,'issssi', $employee_id,$ssnum,$etype,$elevel,$startdate,$salary);

mysqli_stmt_execute($stmt);

$sql = "INSERT INTO timeoff (employee_id,vac,per,sick) VALUES (?, ?, ?, ? )";
$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,'iiii', $employee_id,$vac,$per,$sick );

mysqli_stmt_execute($stmt);

$sql = "INSERT INTO benefits (employee_id,stock,saving,fsa ) VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)) {
     die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,'isss', $employee_id,$stock,$saving,$fsa);
mysqli_stmt_execute($stmt);


echo nl2br("\n\n");
echo "<a href='Employee_menu.html?employee_id=". "" . "'>return</a></td>";

$conn->close();
?>