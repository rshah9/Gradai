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

/// Get intern full names
$sql = "CALL GetInternFullNames(?)";
$result = execute_query($conn, $sql, $Intern_Id);

if ($result) {
    // Begin the HTML table
    echo "<table border='1'>";
    echo "<tr><th>Intern Full Name</th></tr>";

    // Loop through the result set and output each row in the table
    while ($row = $result->fetch_assoc()) {
        $full_name = $row['FullName'];
        echo "<tr><td>" . $full_name . "</td></tr>";
    }

    // End the HTML table
    echo "</table>";
}
// Get total credits
$sql = "SELECT GetTotalCredits(?) AS TotalCredits";
$result = execute_query($conn, $sql, $Intern_Id);
if ($result) {
    $row = $result->fetch_assoc();
    $total_credits = $row['TotalCredits'];
    echo "Intern Total Credits: " . $total_credits . "<br>";
}

// Get department name
$sql = "SELECT GetDepartmentName(?) AS DepartmentName";
$result = execute_query($conn, $sql, $Department_Number);
if ($result) {
    $row = $result->fetch_assoc();
    $department_name = $row['DepartmentName'];
    echo "Department Name: " . $department_name . "<br>";
}

$conn->close();
?>
