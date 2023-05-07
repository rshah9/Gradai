<?php
include "dbconn.php";

$sql = "update Departments set Department_Name = ? where Department_Number = ?";

$id = $_REQUEST["id"];
$deptName = $_REQUEST["deptName"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $deptName, $id);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'department.php'</script>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>