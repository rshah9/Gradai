<?php
include "dbconn.php";
include "menu.php";

echo "</br>";
echo "<table border=1><tr><th>Last Name</th><th>First Name</th><th>Hire Date</th><th>Email Address</th><th>Intern Type
</th></tr>";
$sql = "SELECT * FROM Intern";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc())
     echo "<tr><td>" . $row["Last_Name"] . "</td><td>" . $row["First_Name"] .  "</td><td>" .
     $row["Start_Date"] . "</td><td>" . $row["Email_Address"] . "</td><td>" .
     $row["Type_Intern_Type_Id"];
}  
echo "</table>";
$conn->close();
?>