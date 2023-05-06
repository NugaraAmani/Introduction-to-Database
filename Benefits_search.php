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
    <input type="text" id="stock" name="stock" size = "1" value="<?php echo $row["stock"]?>"> &nbsp;&nbsp;<br>
    <label for "saving">Eligible for 401K (Y/N): &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp</label>
    <input type="text" id="saving" name="saving" size = "1" value="<?php echo $row["saving"]?>">&nbsp;&nbsp;&nbsp<br>
     <label for "fsa">Eligible for Flexible saving account (Y/N):&nbsp;&nbsp  </label>
    <input type="text" id="fsa" name="fsa" size = "1" value="<?php echo $row["fsa"]?>"> <br>
    <input type="submit" value="Benefit Update">
  </form>
 
<?php