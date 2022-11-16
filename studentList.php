<!DOCTYPE html>
<html>
    <head>
        <title>List of students</title>
    </head>
<body>


    <table>
        <tr>
            <th>student ID</th>
</tr>
<?php
extract( $_POST );

$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "assignment1";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$cid = $_POST["courseCode"];
$query = "SELECT studentID FROM enrolledin WHERE courseCode1='$cid' or courseCode2='$cid' or courseCode3='$cid' or courseCode4='$cid' or courseCode5='$cid'";
$result = $conn->query($query);

echo "List of students registered in $cid :";



if ($result->num_rows > 0) {
    while($data = $result->fetch_assoc()) {
?>
<tr>
    <td><?php
              echo $data['studentID']; ?></td>
    </tr>
    <?php
    }}else { ?>
        <tr>
         <td colspan="8">No data found</td>
        </tr>
     <?php } ?>
    </table>
<br>
    <br>

    <a href="adminHub.php">
        <button type="submit">Press here to go back to your hub </button>
    </a>
    <a href="registrationPage.php">
        <button type="submit">Press here to logout </button>
    </a>
    
</body> </HTML>
