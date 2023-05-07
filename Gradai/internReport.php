<?php
 include "dbconn.php";
 include "menu.php";

    echo "<table border=1><tr><th>First Name</th><th>Last Name</th> <th> Assigned Department(s) </th></tr>";
$sql = "select * from interns_per_dept";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       echo "<tr><td>" . $row["First_Name"] . "</td><td>" . $row["Last_Name"] . "</td><td>"
          . $row["Total"] . "</td></tr>";

    }
}
echo "</table>";
$conn->close();
?>
