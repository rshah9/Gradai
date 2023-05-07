<?php
include "dbconn.php";

$sql = "update Roles set Role = ?,End_Date = ? where Intern_Id = ? and Start_Date = ? LIMIT 1";

$intId = $_REQUEST["intId"];
$role = $_REQUEST["role"];
$startDate = $_REQUEST["startDate"];
$endDate = $_REQUEST["endDate"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $role, $endDate, $intId, $startDate);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'roles.php'</script>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>


