<?php
/* Employee TABLE Edit and Update */

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
 
$sql = "SELECT * from department";
$result = $conn->query($sql);
$department = $result->fetch_all(MYSQLI_ASSOC);

    
$sql = "SELECT * FROM employee where employee_id = ?";
$employee_id = $_REQUEST["employee_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$employee_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows >0) {
    $row = $result->fetch_assoc();
}
$conn->close();
?>
<body style="background-color:powderblue;">   
<fieldset>
	<legend style="text-align:center"><b>Human Resource - Employee Details</b> </legend>
	<h4 >Employee Data for Employee id ="<?php echo $row["employee_id"]?>" </h4>
	<form action="Employee_update.php">
    <input type="hidden" id="employee_id" name="employee_id"  value="<?php echo $row["employee_id"]?>">
	<label for "fname">First name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="fname" name="fname" value="<?php echo $row["fname"]?>"> &nbsp;&nbsp;&nbsp
     <label for "mname">Middle name:&nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="mname" name="mname" value="<?php echo $row["mname"]?>">&nbsp;&nbsp;&nbsp
    <label for "lname">Last name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="lname" name="lname"  value="<?php echo $row["lname"]?>"><br>
    <label for="phone">Phone Number: 
	<input type="text" id="phone" name="phone"  value="<?php echo $row["phone"]?>" 
       placeholder="123-456-6789"      pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"></label> &nbsp;&nbsp;&nbsp;
	<label for "email">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label>
    <input type="email" id="email" name="email"  value="<?php echo $row["email"]?>"><br>
    <label for "birthdate">Date of Birth:&nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="birthdate" name="birthdate"  value="<?php echo $row["birthdate"]?>">&nbsp;&nbsp;&nbsp;&nbsp
	<label for="department_id">department_id:&nbsp;</label><tb>
    <input type="text" name="department_id" id="department_id" value="<?php echo $row["department_id"]?> ">&nbsp;&nbsp;&nbsp;&nbsp<br>
    <input type="submit" value="Update Employee Data"><br>
    </form>
     <form action="Employee_delete.php" method="post">
       <input type="hidden" id="employee_id" name="employee_id"  value="<?php echo $row["employee_id"]?>">
       <input type="submit" value="Delete Employee record"> </label>
    </form>
</body>

<?php
/* Address TABLE Edit and Update */
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

$sql = "SELECT * FROM addresses where employee_id = ?";
$employee_id = $_REQUEST["employee_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$employee_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows >0) {
    $row = $result->fetch_assoc();
}
$conn->close();
?>

  <h4>Employee Address </h4>
  <form action="Address_update.php">
	<input type="hidden" id="employee_id" name="employee_id"  value="<?php echo $row["employee_id"]?>">
	<label for "street1">Street Address: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="street1" name="street1" value="<?php echo $row["street1"]?>"> <br>
    <label for "street2">Street Address: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="street2" name="street2" value="<?php echo $row["street2"]?>"> <br>
     <label for "city">City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label>
    <input type="text" id="city" name="city" value="<?php echo $row["city"]?>">&nbsp;&nbsp;&nbsp;
    <label for "state">State:&nbsp;&nbsp</label>
    <input type="text" id="state" name="state"  value="<?php echo $row["state"]?>">&nbsp;&nbsp;&nbsp;
    <label for="zipcode">Zip Code:&nbsp;&nbsp 
	<input type="number" id="zipcode" name="zipcode" size = "5" value="<?php echo $row["zipcode"]?>" ><br>
	<input type="submit" value="Address Update">
</form>
 


<?php
/* Timeoff TABLE Edit and Update */
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

$sql = "SELECT * FROM timeoff where employee_id = ?";
$employee_id = $_REQUEST["employee_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$employee_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows >0) {
    $row = $result->fetch_assoc();
}
$conn->close();
?>

  <h4>Employee Time off </h4>
  <form action="Timeoff_update.php">
	<input type="hidden" id="employee_id" name="employee_id"  value="<?php echo $row["employee_id"]?>">
	<label for "vac">Eligible Vacation days: &nbsp;&nbsp; </label>
    <input type="number" id="vac" name="vac" value="<?php echo $row["vac"]?>"> &nbsp;&nbsp;
    <label for "sick">Eligible Sick days: &nbsp;&nbsp;&nbsp</label>
    <input type="number" id="sick" name="sick" value="<?php echo $row["sick"]?>">&nbsp;&nbsp;&nbsp
     <label for "per">Eligible Personal days:&nbsp;&nbsp  </label>
    <input type="number" id="per" name="per" value="<?php echo $row["per"]?>"> <br>
    <label for "vac_taken">Vacation days Taken:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label>
    <input type="number" id="vac_taken" name="vac_taken"  value="<?php echo $row["vac_taken"]?>">&nbsp;&nbsp;&nbsp
	<label for="sick_taken">Sick days Taken: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp </label>
	<input type="number" id="sick_taken" name="sick_taken"  value="<?php echo $row["sick_taken"]?>" >&nbsp;&nbsp;&nbsp
    <label for "per_taken">Personal day Taken:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label>
    <input type="number" id="per_taken" name="per_taken"  value="<?php echo $row["per_taken"]?>"> <br>
	<input type="submit" value="Timeoff Update">
  </form>
 


<?php
/* Benifits TABLE Edit and Update */
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

$sql = "SELECT * FROM benefits where employee_id = ?";
$employee_id = $_REQUEST["employee_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$employee_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows >0) {
    $row = $result->fetch_assoc();
}
$conn->close();
?>

  <h4>Employee Benefit Options </h4>
  <form action="Benefits_update.php">
	<input type="hidden" id="employee_id" name="employee_id"  value="<?php echo $row["employee_id"]?>">
	<label for "stock">Eligible for Stock option (Y/N): &nbsp;&nbsp; </label>
    <input type="text" id="stock" name="stock" size = "1" value="<?php echo $row["stock"]?>"> &nbsp;&nbsp;
    <label for "saving">Eligible for 401K (Y/N): &nbsp;&nbsp;&nbsp</label>
    <input type="text" id="saving" name="saving" size = "1" value="<?php echo $row["saving"]?>">&nbsp;&nbsp;&nbsp
     <label for "fsa">Eligible for Flexible saving account (Y/N):&nbsp;&nbsp  </label>
    <input type="text" id="fsa" name="fsa" size = "1" value="<?php echo $row["fsa"]?>"> <br>
    <input type="submit" value="Benefit Update">
  </form>
 
<?php
/* Personal_details TABLE Edit and Update */
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
$sql = "SELECT * FROM personal_details where employee_id = ?";
$employee_id = $_REQUEST["employee_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$employee_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows >0) {
    $row = $result->fetch_assoc();
}
$conn->close();
?>

  <h4>Employee Personal Details </h4>
  <form action="Salary_update.php">
	<input type="hidden" id="employee_id" name="employee_id"  value="<?php echo $row["employee_id"]?>">
	<label for "ssnum">Social Security: &nbsp;&nbsp; </label>
    <input type="text" id="ssnum" name="ssnum" size = "11" value="<?php echo $row["ssnum"]?>"> &nbsp;&nbsp;
    <label for "type">Employement Type (F/P/C): &nbsp;&nbsp;&nbsp</label>
    <input type="text" id="type" name="type" size = "1" value="<?php echo $row["type"]?>">&nbsp;&nbsp;&nbsp
     <label for "level">Employement Level:&nbsp;&nbsp  </label>
    <input type="text" id="level" name="level" size = "4" value="<?php echo $row["level"]?>">
     <label for "Startdate">Employed Date: &nbsp;&nbsp;&nbsp</label>
    <input type="text" id="startdate" name="startdate"  size = "10" value="<?php echo $row["startdate"]?>">&nbsp;&nbsp;&nbsp
     <label for "salary">Salary: &nbsp;&nbsp;&nbsp</label>
    <input type="text" id="salary" name="salary" size = "12" value="<?php echo $row["salary"]?>"><br>
    <input type="submit" value="Salary/Level Update">
  </form>  
</fieldset>
