<?php
include "dbconn.php";
include "menu.php";

echo "</br>";
echo "<table border=1><tr><th>Intern Id</th><th>Credit</th><th>Start Date</th><th>End Date</th></tr>";
$sql = "SELECT * FROM Credits";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Intern_Intern_Id"] . "</td><td>" . $row["Credit"] . "</td><td>" . $row["Start_Date"] . "</td><td>" . $row["End_Date"] .
            "</td><td><a href='deleteCredits.php?intId=" . $row["Intern_Intern_Id"] . "&startDate=" . $row["Start_Date"] . "'>Delete </a></td>" .
            "</td><td><a href='editCredits.php?intId=" . $row["Intern_Intern_Id"] . "&startDate=" . $row["Start_Date"] . "'>Edit</a></td>";
    }
}
echo "</table>";
$conn->close();
?>
<a href="addCredits.htm">Add New Credit</a>
