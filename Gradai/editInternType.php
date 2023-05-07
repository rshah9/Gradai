<?php
include "dbconn.php";

$sql = "SELECT * FROM Type where Intern_Type_Id = ? ";
$id = $_REQUEST["id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
}  

?>
<form action="updateIntershipType.php">
  <label for="internType">Internship Type:</label><br>
  <input type="text" id="internType" name="internType" value="<?php echo $row["Intern_Type"]?>"><br>
  <input type="hidden" id="id" name="id"  value="<?php echo $row["Intern_Type_Id"]?>"><br>
  <input type="submit" value="Submit">
</form>
<?php
$conn->close();
?>