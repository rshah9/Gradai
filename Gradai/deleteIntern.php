<?php
include "dbconn.php";

$id = $_REQUEST["id"];

$sql1 = "DELETE FROM Roles WHERE Intern_Intern_Id=?";
$stmt1 = $conn->prepare($sql1);

if ($stmt1 === false) {
    die('Error: ' . htmlspecialchars($conn->error));
}

$stmt1->bind_param("i", $id);
if($stmt1->execute() === TRUE) {
    $sql2 = "DELETE FROM Intern WHERE Intern_Id=?";
    $stmt2 = $conn->prepare($sql2);

    if ($stmt2 === false) {
        die('Error: ' . htmlspecialchars($conn->error));
    }

    $stmt2->bind_param("i", $id);
    if($stmt2->execute() === TRUE) {
        echo "<script>window.location.href = 'intern.php'</script>";
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$conn->close();
?>
