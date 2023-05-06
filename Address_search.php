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
<fieldset>
	<legend style="text-align:center"><b>Human Resource - Employee Details</b> </legend>

<body style="background-color:powderblue; boarder=1">   
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
 
