<?php
include "dbconn.php";

$sql = "update Intern set First_Name = ?,Last_Name = ?,Email_Address = ?, City = ?, State = ?, Zip_code = ?,
 Start_Date = ?, DoB = ?, Type_Intern_Type_Id = ? where Intern_Id = ?";

$intId = $_REQUEST["intId"];
$firstName = $_REQUEST["firstName"];
$lastName = $_REQUEST["lastName"];
$email = $_REQUEST["email"];
$city = $_REQUEST["city"];
$state = $_REQUEST["state"];
$zip = $_REQUEST["zip"];
$startDate = $_REQUEST["startDate"];
$dob = $_REQUEST["DoB"];
$internTypeId = $_REQUEST["internTypeId"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssi", $firstName, $lastName, $email, $city, $state, $zip, $startDate, $dob, $internTypeId, $intId);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'intern.php'</script>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>