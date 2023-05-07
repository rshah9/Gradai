<?php
include "dbconn.php";

$sql = "SELECT * FROM Department_Lead where Department_Number = ? and Intern_Id = ? LIMIT 1";
$departmentId = $_REQUEST["departmentId"];
$intId = $_REQUEST["intId"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii",$departmentId, $intId);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows >0) {
    $row = $result->fetch_assoc();
} 

?>
<form action="upateTeamLead.php">
    <label for "startDate">Start Date:</label><br>
    <input type="text" id="startDate" name="startDate"  value="<?php echo $row["Start_Date"]?>"><br>
    <label for "endDate">End Date:</label><br>
    <input type="text" id="endDate" name="endDate"  value="<?php echo $row["End_Date"]?>"><br>
    <input type="hidden" id="departmentId" name="departmentId"  value="<?php echo $row["Department_Number"]?>"><br>
    <input type="hidden" id="intId" name="intId"  value="<?php echo $row["Intern_Id"]?>"><br>
    
    <input type="submit" value="Submit">
</form>



