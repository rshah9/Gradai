// <?php
// include "dbconn.php";
//
// var_dump($_REQUEST);
// $sql = "insert into Credits (Intern_Intern_Id, Credit, Start_Date, End_Date) VALUES (?,?,?,?)";
//
// $intId = $_REQUEST["intId"];
// $credit = $_REQUEST["credit"];
// $startDate = $_REQUEST["startDate"];
// $endDate = $_REQUEST["endDate"];
//
//
//
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("ssss", $intId, $credit, $startDate, $endDate);
// if($stmt->execute() === TRUE) {
//     echo "<script>window.location.href = 'credits.php'</script>";
// }
// else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
// $conn->close();
// ?>

<?php
// Include the database connection file
include "dbconn.php";

// Prepare the SQL query for inserting data into the Credits table
$sql = "INSERT INTO Credits (Intern_Intern_Id, Credit, Start_Date, End_Date) VALUES (?, ?, ?, ?)";

// Get the form data
$intId = $_REQUEST["intId"];
$credit = $_REQUEST["credit"];
$startDate = $_REQUEST["startDate"];
$endDate = $_REQUEST["endDate"];

// Prepare the SQL statement
$stmt = $conn->prepare($sql);
if (!$stmt) {
  die("Error preparing the statement: " . $conn->error);
}

// Bind the form data to the SQL statement
$stmt->bind_param("iiss", $intId, $credit, $startDate, $endDate);

// Execute the SQL statement and check for success
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'credits.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
