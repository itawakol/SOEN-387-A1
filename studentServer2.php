<!DOCTYPE html>
<html>
<head>
    <title>New Student Registration</title>
</head>
<body>
<a href="registrationPage.html">
            <button type="submit">Press here to go to login page</button>
</a>
<a href="newStudentRegistration.html">
            <button type="submit">Press here to register a new student ID</button>
</a>
        

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
	
$query="INSERT INTO student (studentID,firstName,lastName,address,email,phoneNumber,dateOfBirth)
				 VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($database);

$result = mysqli_query($database, "SELECT * FROM student WHERE studentID='$id'");
$num_rows = mysqli_num_rows($result);
if($num_rows) {
    trigger_error('student id already exists');
}
	
if (!mysqli_stmt_prepare($stmt, $query)){
    die(mysqli_error($database));
}
	
mysqli_stmt_bind_param($stmt, "issssii", $id, $firstName, $lastName,
                         $address, $email, $phoneNumber, $dob);
mysqli_stmt_execute($stmt);
echo "New Student record has been saved";



mysqli_close( $database );

?>

</body>
</html>
