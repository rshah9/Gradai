<?php
include "dbconn.php";

$sql = "update Credits set Credit = ?,End_Date = ? where Intern_Id = ? and Start_Date = ? LIMIT 1";

$intId = $_REQUEST["intId"];
$credit = $_REQUEST["credit"];
$startDate = $_REQUEST["startDate"];
$endDate = $_REQUEST["endDate"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $credit, $endDate, $intId, $startDate);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'credits.php'</script>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>