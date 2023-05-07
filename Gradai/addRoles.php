<?php
include "dbconn.php";

var_dump($_REQUEST);
$sql = "insert into Roles (Intern_Id, Role, Start_Date, End_Date) VALUES (?,?,?,?)";

$intern_id = $_REQUEST["intern_id"];
$role = $_REQUEST["role"];
$startDate = $_REQUEST["startDate"];
$endDate = $_REQUEST["endDate"];



$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $intern_id, $role, $startDate, $endDate);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'roles.php'</script>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>

