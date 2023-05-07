<?php
include "dbconn.php";

$sql = "SELECT * FROM Roles where Intern_Id = ? and Start_Date = ? LIMIT 1";
$intId = $_REQUEST["intId"];
$startDate = $_REQUEST["startDate"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii",$intId, $startDate);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows >0) {
    $row = $result->fetch_assoc();
}

?>
<form action="updateRoles.php">
    <label for "role"> Role:</label><br>
    <input type="text" id="role" name="role"  value="<?php echo $row["Role"]?>"><br>
    <label for "endDate">End Date:</label><br>
    <input type="text" id="endDate" name="endDate"  value="<?php echo $row["End_Date"]?>"><br>
    <input type="hidden" id="intId" name="intId"  value="<?php echo $row["Intern_Id"]?>"><br>
    <input type="hidden" id="startDate" name="startDate"  value="<?php echo $row["Start_Date"]?>"><br>
    <input type="submit" value="Submit">
</form>




