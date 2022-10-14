<!DOCTYPE html>
<html>
<head>
    <title>New Admin Registration</title>
</head>
<body>
		
<?php

extract( $_POST ); 

$id = $_POST['id'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$address = $_POST['address'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$dob = $_POST['dob'];



if ( !( $database = mysqli_connect( "localhost",
    "root", "") ) ) {
    die( "Could not connect to database </body></html>" );
    };


if ( !mysqli_select_db( $database ,"assignment 1" ) ) {
    die( "Could not open Online Registration database </body></html>" );
};
$query="INSERT INTO administrator (employmentID,firstName,lastName,address,email,phoneNumber,dateOfBirth)
				 VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($database);
$result = mysqli_query($database, "SELECT * FROM student WHERE employmentID='$id'");
$num_rows = mysqli_num_rows($result);	
if($num_rows) {
    trigger_error('Employment ID already exists');
}
	
if (!mysqli_stmt_prepare($stmt, $query)){
    die(mysqli_error($database));
}
mysqli_stmt_bind_param($stmt, "issssii", $id, $firstName, $lastName,
                         $address, $email, $phoneNumber, $dob);
mysqli_stmt_execute($stmt);
echo "New Admin record has been saved";



mysqli_close( $database );

?>
	
<br><br>
<a href="registrationPage.html">
    <button type="submit">Press here to go to login page</button>
</a>
<br><br>
<a href="newAdminRegistration.html">
    <button type="submit">Press here to register a new Admin ID</button>
</a>
	
</body>
</html>
