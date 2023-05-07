<?php
include "dbconn.php";

$sql = "update Type set Intern_Type = ? where Intern_Type_Id = ?";

$id = $_REQUEST["id"];
$internType = $_REQUEST["internType"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $internType, $id);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'type.php'</script>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>