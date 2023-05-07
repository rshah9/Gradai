<?php
include "dbconn.php";
include "menu.php";

echo "</br>";

echo "<table border=1>
        <tr>
            <th>Intern Id</th>
            <th>Role</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Action</th>
        </tr>";

$sql = "SELECT * FROM Roles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $deleteLink = "deleteRoles.php?intId={$row['Intern_Intern_Id']}&startDate={$row['Start_Date']}";
        $editLink = "editRole.php?intId={$row['Intern_Intern_Id']}&startDate={$row['Start_Date']}";

        echo "<tr>
                <td>{$row['Intern_Intern_Id']}</td>
                <td>{$row['Role']}</td>
                <td>{$row['Start_Date']}</td>
                <td>{$row['End_Date']}</td>
                <td>
                    <a href='{$deleteLink}'>Delete</a>
                    <a href='{$editLink}'>Edit</a>
                </td>
              </tr>";
    }
}

echo "</table>";

$conn->close();
?>

<a href="addRoles.htm">Add New</a>
