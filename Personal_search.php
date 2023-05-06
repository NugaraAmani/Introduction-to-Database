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
