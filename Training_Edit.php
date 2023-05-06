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

$sql = "SELECT * FROM training where employee_id = ? && course_id = ?";
$employee_id = $_REQUEST["employee_id"];
$course_id = $_REQUEST["course_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii",$employee_id,$course_id);
$stmt->execute();    
    
$result = $stmt->get_result();
    
if ($result->num_rows >0) {
    $row = $result->fetch_assoc();
    
}
$conn->close();

echo "<a href='Employee_menu.html?employee_id=". "" . "'>Return to HR Main Menu</a></td>";
echo nl2br("\n\n");
?>
<fieldset>
  <legend ><b>Employee Training emplyee id = <?php echo $row["employee_id"]?> </b> </legend>
  <form action="Training_update.php">
	<input type="hidden" id="employee_id" name="employee_id"  value="<?php echo $row["employee_id"]?>"><br>
	<label for "course_id">Course ID (read only): &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label>
    <input type="text" id="course_id" name="course_id" value="<?php echo $row["course_id"]?>"> <br>
    <label for "course_name">Course Name:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp</label>
    <input type="text" id="course_name" name="course_name" value="<?php echo $row["course_name"]?>"> <br>
     <label for "date_taken">Date Course Taken:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp</label>
    <input type="text" id="date_taken" name="date_taken" value="<?php echo $row["date_taken"]?>">&nbsp;&nbsp;&nbsp;<br><br>
    <input type="submit" value="Update Training "><br>
  </form>
</fieldset>
    