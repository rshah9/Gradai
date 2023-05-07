<?php
include "dbconn.php";
include "menu.php";

echo "</br>";
echo "<table border=1><tr><th>Internship Type ID</th><th>Intern Type</th></tr>";
$sql = "SELECT * FROM Type";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Intern_Type_Id"] . "</td><td>" . $row["Intern_Type"] .
            "</td><td><a href='deleteInternType.php?id=" . $row["Intern_Type_Id"] . "'>Delete </a></td>" .
            "</td><td><a href='editInternType.php?id=" . $row["Intern_Type_Id"] . "'>Edit</a></td></tr>";
    }
}
echo "</table>";
$conn->close();
?>
<a href="addInternType.htm">Add New Type</a>
