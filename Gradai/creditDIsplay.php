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

// Function GetTotalCredits: Get total credits

$sql = "SELECT GetTotalCredits(?) AS TotalCredits";
$result = execute_query($conn, $sql, $Intern_Id);


if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>Credit Arranged</th></tr>";
    while ($row = $result->fetch_assoc()) {
        $total_credits = $row['TotalCredits'];
        echo "<tr><td>" . $total_credits . "</td></tr>";
    }
    echo "</table>";
}

$conn->close();
?>
