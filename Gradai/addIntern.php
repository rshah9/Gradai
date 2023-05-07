<?php

// Include the database connection file
include "dbconn.php";

// Prepare the SQL query for inserting data into the Intern table
$sql = "INSERT INTO Intern (Intern_Id, First_Name, Last_Name, Email_Address, City, State, Zip_code, Start_Date, DoB, Type_Intern_Type_Id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Get the form data
$intId = $_REQUEST["intId"];
$firstName = $_REQUEST["firstName"];
$lastName = $_REQUEST["lastName"];
$email = $_REQUEST["email"];
$city = $_REQUEST["city"];
$state = $_REQUEST["state"];
$zip = $_REQUEST["zip"];
$startDate = date("Y-m-d", strtotime($_REQUEST["startDate"]));
$dob = date("Y-m-d", strtotime($_REQUEST["DoB"]));
$internTypeId = $_REQUEST["internTypeId"];

// Prepare the SQL statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("issssssssi", $intId, $firstName, $lastName, $email, $city, $state, $zip, $startDate, $dob, $internTypeId);

// Execute the SQL statement and check for success
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'intern.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

?>
