<?php
include "dbconn.php";
include "menu.php";
?>
</br>
<table border="1">
  <tr>
    <th>Department Number</th>
    <th>Intern Id</th>
    <th>Start Date</th>
    <th>End Date</th>
  </tr>
<?php
$stmt = $conn->prepare("SELECT Departments_Department_Number, Intern_Intern_Id, Start_Date,
End_Date FROM Department_Lead");
$stmt->execute();
$result = $stmt->get_result();
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>{$row['Departments_Department_Number']}</td>";
  echo "<td>{$row['Intern_Intern_Id']}</td>";
  echo "<td>{$row['Start_Date']}</td>";
  echo "<td>{$row['End_Date']}</td>";
  echo "<td><a href='deleteTeamLead.php?departmentId={$row['Departments_Department_Number']}&intId={$row['Intern_Intern_Id']}'>Delete</a></td>";
  echo "<td><a href='editDepartmentLead.php?departmentId={$row['Departments_Department_Number']}&intId={$row['Intern_Intern_Id']}'>Edit</a></td>";
  echo "</tr>";
}
$conn->close();
?>
</table>
<a href="addTeamLead.htm">Add New</a>
