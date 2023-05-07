<?php
include "dbconn.php";
include "menu.php";

echo "</br>";
echo "<table border=1><tr><th>Intern Type</th><th>Total Interns</th><th>Minimum Credit</th><th>Maximum Credit
</th><th>Average Credit</th><th>Total Credit</th></tr>";
$sql = "SELECT * FROM `INTERN_TYPE_AGGREGATION`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc())
     echo "<tr><td>" . $row["Intern_Type"] . "</td><td>" . $row["total_interns"] .  "</td><td>" .
     $row["Minnimum_Credit"] . "</td><td>" . $row["Maximum_Credit"] . "</td><td>" . $row["Avg_Credit"] .
     "</td><td>" . $row["Total_Credit"];
}  
echo "</table>";
$conn->close();
?>