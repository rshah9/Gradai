<?php
include "dbconn.php";

$sql = "SELECT * FROM Intern where Intern_Id = ?";
$intId = $_REQUEST["id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$intId);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows >0) {
    $row = $result->fetch_assoc();
}

?>
<form action="updateIntern.php">
    <label for "firstName">First name:</label><br>
    <input type="text" id="firstName" name="firstName" value="<?php echo $row["First_Name"]?>"><br>
    <label for "lastName">Last name:</label><br>
    <input type="text" id="lastName" name="lastName"  value="<?php echo $row["Last_Name"]?>"><br>
    <label for "email">Email Address:</label><br>
    <input type="text" id="email" name="email"  value="<?php echo $row["Email_Address"]?>"><br>
    <label for "city">City:</label><br>
    <input type="text" id="city" name="city"  value="<?php echo $row["City"]?>"><br>
    <label for "state">State:</label><br>
    <input type="text" id="state" name="state" value="<?php echo $row["State"]?>"><br>
    <label for "zip">Zip Code:</label><br>
    <input type="text" id="zip" name="zip"  value="<?php echo $row["Zip_code"]?>"><br>
    <label for "startDate">Start Date:</label><br>
    <input type="text" id="startDate" name="startDate"  value="<?php echo $row["Start_Date"]?>"><br>
    <label for "DoB">Date of Birth:</label><br>
    <input type="text" id="DoB" name="DoB"  value="<?php echo $row["DoB"]?>"><br>
    <label for "internTypeId">Internship Type ID:</label><br>
    <input type="text" id="internTypeId" name="internTypeId"  value="<?php echo $row["Type_Intern_Type_Id"]?>"><br>
    <input type="hidden" id="intId" name="intId"  value="<?php echo $row["Intern_Id"]?>"><br>

    <input type="submit" value="Submit">
</form>
