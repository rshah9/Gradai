<?php
include "dbconn.php";
include "menu.php";

$Intern_Id = 1;
$Department_Number = 1;

function execute_query($conn, $sql, $param) {
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error . "<br>";
        return false;
    }
    $stmt->bind_param("i", $param);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result) {
        echo "Error executing statement: " . $stmt->error . "<br>";
        return false;
    }
    return $result;
}

// Function GetDepartmentName: Get department name
$sql = "SELECT GetDepartmentName(?) AS DepartmentName";
$result = execute_query($conn, $sql, $Department_Number);

if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>Department Name</th></tr>";
    while ($row = $result->fetch_assoc()) {
        $department_name = $row['DepartmentName'];
        echo "<tr><td>" . $department_name . "</td></tr>";
    }
    echo "</table>";
}
$conn->close();
?>
