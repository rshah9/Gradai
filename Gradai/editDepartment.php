<?php
include "dbconn.php";

$sql = "SELECT * FROM Departments where Department_Number = ? ";
$id = $_REQUEST["id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
}  

?>
<form action="updateDepartment.php">
  <label for="deptName">Department Name:</label><br>
  <input type="text" id="deptName" name="deptName" value="<?php echo $row["Department_Name"]?>"><br>
  <input type="hidden" id="id" name="id"  value="<?php echo $row["Department_Number"]?>"><br>
  <input type="submit" value="Submit">
</form>
<?php
$conn->close();
?>
