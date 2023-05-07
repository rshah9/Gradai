<?php
include "dbconn.php";
$sql = "delete from Roles where Intern_Id=? and Start_Date = ? LIMIT 1";
$intId = $_REQUEST["intId"];
$startDate = $_REQUEST["startDate"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii",$intId, $startDate);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'roles.php'</script>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>


