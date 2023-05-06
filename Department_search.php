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
    
$sql = "SELECT * FROM department where department_id = ?";
$department_id = $_REQUEST["department_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$department_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows >0) {
    $row = $result->fetch_assoc();
     
}

?>
<body style="background-color:powderblue;">   
<fieldset>
	<h2>Department Data for Department ID <?php echo $row["department_id"]?> </h2>
	<form action="Department_update.php">
	<input type="hidden" id="department_id" name="department_id"  value="<?php echo $row["department_id"]?>"><br>
    
	<label for="deptname">Department Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label>
    <input type="text" id="deptname" name="deptname"  value="<?php echo $row["deptname"]?>"><br>
    
	<label for "fname">Manager First name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="fname" name="fname" value="<?php echo $row["fname"]?>"><br>
    
     <label for "mname">Manager Middle name:&nbsp;&nbsp;&nbsp;</label>
     <input type="text" id="mname" name="mname" value="<?php echo $row["mname"]?>"><br>
     
    <label for "lname">Manager Last name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
   <input type="text" id="lname" name="lname"  value="<?php echo $row["lname"]?>"><br>
    
    <label for "org_id">Organization ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="org_id" name="org_id"  value="<?php echo $row["org_id"]?>"><br> <br><br>
    
    <input type="submit" value="Update Department Data">
    </form>
    <form action="Department_delete.php">
    <input type="submit" value="Delete Department">
    </form>
    </fieldset>

</body>