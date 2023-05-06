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
    
$sql = "SELECT * FROM organization where org_id = ?";
$org_id = $_REQUEST["org_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$org_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows >0) {
    $row = $result->fetch_assoc(); 
}
?>

<fieldset>
    <body style="background-color:powderblue;" >
	<legend style="text-align:center"><b>Human Resource - Organization Details</b> </legend>
	
	<form action="Organization_update.php"><br><br>
	<label for="org_id">Organization ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label>
    <input type="text" id="org_id" name="org_id"  value="<?php echo $row["org_id"]?>" readonly> (readonly)<br>
        
	<label for="org_name">Organization Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label>
    <input type="text" id="org_name" name="org_name"  value="<?php echo $row["org_name"]?>"><br>
    
	<label for "fname">Manager First name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp </label>
    <input type="text" id="fname" name="fname" value="<?php echo $row["fname"]?>"><br>
    
     <label for "mname">Manager Middle name:&nbsp;&nbsp;&nbsp;</label>
     <input type="text" id="mname" name="mname" value="<?php echo $row["mname"]?>"><br>
     
    <label for "lname">Manager Last name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp </label>
   <input type="text" id="lname" name="lname"  value="<?php echo $row["lname"]?>">
    <br><br>
    <input type="submit" value="Edit/Update Organization Data">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
    </form>
    <form action="Organization_delete.php">
     <input type="hidden" id="org_id" name="org_id"  value="<?php echo $row["org_id"]?>" >
      <input type="submit" value="Delete Organization Data">
	</form>
    </body>
    </fieldset>
