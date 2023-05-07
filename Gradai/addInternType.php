<?php
include "dbconn.php";

$sql = "INSERT INTO Type (Intern_Type) VALUES (?)";

$internType = $_REQUEST["internType"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $internType);

if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'type.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
