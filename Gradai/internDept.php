<?php
include "dbconn.php";
include "menu.php";

echo "</br>";
echo "<table border=1><tr><th>Department Number</th><th>Intern Id</th><th>Start Date</th><th>End Date</th></tr>";
$sql = "SELECT * FROM InternDept";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Departments_Department_Number"] . "</td><td>" . $row["Intern_Intern_Id"] . "</td><td>" . $row["Start_Date"] .
            "</td><td>" . $row["End_Date"] . "</td><td><a href='deleteInternDept.php?departmentId=" .
            $row["Departments_Department_Number"] . " & intId=" . $row["Intern_Intern_Id"] .  "'>Delete </a></td>" .
            "</td><td><a href='editInternDept.php?departmentId=" . $row["Departments_Department_Number"] . " & intId=" .
            $row["Intern_Intern_Id"] .  "'>Edit</a></td>";
    }
}
echo "</table>";
$conn->close();
?>
<a href="addInternDept.htm">Add New</a>
