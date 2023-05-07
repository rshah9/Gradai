<?php
// Include the database connection file
include "dbconn.php";

// Display the submitted form data (for debugging purposes)
var_dump($_REQUEST);

// Prepare the SQL query for inserting data into the Departments table
$sql = "INSERT INTO Departments (Department_Name) VALUES (?)";

// Get the form data
$deptName = $_REQUEST["deptName"];

// Prepare the SQL statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $deptName);

// Execute the SQL statement and check for success
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'department.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
