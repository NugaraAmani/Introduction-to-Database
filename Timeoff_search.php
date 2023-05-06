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
$req_type = $_REQUEST["req_type"];
$req_days = $_REQUEST["req_days"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$employee_id);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows >0) {
    $row = $result->fetch_assoc();
}

$conn->close();
?>
<fieldset>
	<legend style="text-align:center"><b>Human Resource - Employee Timeoff Details</b> </legend>
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
    <input type="number" id="per_taken" name="per_taken"  value="<?php echo $row["per_taken"]?>"> <br><br>
    <label for "req_days">Most recently Requested days:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label>
    <input type="text" id="req_days" name="req_days"  value="<?php echo $req_days ?>"> <br>
    <label for "req_type">Most recently Requested days type: &nbsp;&nbsp;&nbsp</label>
    <input type="text" id="req_type" name="req_type"  value="<?php echo $req_type ?>"> <br><br>
	<input type="submit" value="Timeoff Update">
  </form>
  </fieldset>