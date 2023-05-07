<?php
include "dbconn.php";

$sql = "update InternDept set Start_Date = ?, End_Date = ?  where Department_Number = ? and Intern_Id = ? LIMIT 1";

$departmentId = $_REQUEST["departmentId"];
$intId = $_REQUEST["intId"];
$startDate = $_REQUEST["startDate"];
$endDate = $_REQUEST["endDate"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $startDate, $endDate, $departmentId, $intId);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'internDept.php'</script>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>


