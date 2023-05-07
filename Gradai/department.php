<?php
include "dbconn.php";
include "menu.php";

echo "</br>";
echo "<table border=1><tr><th>Department Number</th><th>Department</th></tr>";
$sql = "SELECT * FROM Departments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Department_Number"] . "</td><td>" . $row["Department_Name"] .
            "</td><td><a href='deleteDepartment.php?id=" . $row["Department_Number"] . "'>Delete </a></td>" .
            "</td><td><a href='editDepartment.php?id=" . $row["Department_Number"] . "'>Edit</a></td></tr>";
    }
}
echo "</table>";
$conn->close();
?>
<a href="addDepartment.htm">Add New Department</a>
