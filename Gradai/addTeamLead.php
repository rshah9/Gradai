<?php
include "dbconn.php";

$sql = "call Lead_Insert(?,?,?,?,@m_status)";

$intId = $_REQUEST["intId"];
$deptNumber = $_REQUEST["deptNumber"];
$startDate = $_REQUEST["startDate"];
$endDate = $_REQUEST["endDate"];


$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss",  $deptNumber, $intId, $startDate, $endDate);
$stmt->execute();
$sql1 = "Select @m_status";
$stmt1 = $conn->query($sql1); 
$result = $stmt1->fetch_assoc();
if($result['@m_status'] == 'success') {
    echo "<script>window.location.href = 'deptLead.php'</script>";
}
else if($result['@m_status'] == 'failure') {
    echo "Lead Limit Has Reached";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>