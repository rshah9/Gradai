<?php
include "dbconn.php";
$sql = "delete from Department_Lead where Department_Number=? and Intern_Id = ? LIMIT 1";
$departmentId = $_REQUEST["departmentId"];
$intId = $_REQUEST["intId"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $departmentId, $intId);


if($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'deptLead.php'</script>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>