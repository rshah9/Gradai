<?php
include "dbconn.php";
include "menu.php";
echo "</br>";
echo "<table border=1>
        <tr><th>Intern Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip Code</th>
        <th>Hire Date</th>
        <th>Date of Birth</th>
        <th>Intern Type</th>
    </tr>";

$sql = "SELECT I.Intern_Id, I.First_Name, I.Last_Name, I.Email_Address, I.City, I.State, I.Zip_code, I.Start_Date,
I.DoB, T.Intern_Type FROM `Intern` I, Type T WHERE I.Type_Intern_Type_Id=T.Intern_Type_Id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" .
            $row["Intern_Id"] .
            "</td><td>" .
            $row["First_Name"] .
            "</td><td>" .
            $row["Last_Name"] .
            "</td><td>" .
            $row["Email_Address"] .
            "</td><td>" .
            $row["City"] .
            "</td><td>" .
            $row["State"] .
            "</td><td>" .
            $row["Zip_code"] .
            "</td><td>" .
            $row["Start_Date"] .
            "</td><td>" .
            $row["DoB"] .
            "</td><td>" .
            $row["Intern_Type"] .
            "</td><td><a href='deleteIntern.php?id=" .
            $row["Intern_Id"] .
            "'>Delete </a>" .
            "</td><td><a href='editIntern.php?id=" .
            $row["Intern_Id"] .
            "'>Edit</a>" .
            "</td></tr>";
    }
}
echo "</table>";
$conn->close();
?>
<a href="addIntern.htm">Add New Intern</a>