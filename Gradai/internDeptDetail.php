<?php
include "dbconn.php";
include "menu.php";

echo "</br>";

echo "<table border=1>
        <tr>
            <th>Department Name</th>
            <th>Total Interns</th>
            <th>Minimum Credit</th>
            <th>Maximum Credit</th>
            <th>Sum Credit</th>
            <th>Average Credit</th>
        </tr>";

$sql = "SELECT * FROM `DEPARTMENT_AGGREGATION`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['department_name']}</td>
                <td>{$row['total_interns']}</td>
                <td>{$row['minimum_credit']}</td>
                <td>{$row['maximum_credit']}</td>
                <td>{$row['sum_credit']}</td>
                <td>{$row['avg_credit']}
              </tr>";
    }
}

echo "</table>";

$conn->close();
?>
