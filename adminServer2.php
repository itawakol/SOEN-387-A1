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


if ( !mysqli_select_db( $database ,"assignment1" ) ) {
    die( "Could not open Online Registration database </body></html>" );
};
$query="INSERT INTO administrator (employmentID,firstName,lastName,address,email,phoneNumber,dateOfBirth)
				 VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($database);
if (!mysqli_stmt_prepare($stmt, $query)){
    die(mysqli_error($database));
}
mysqli_stmt_bind_param($stmt, "issssii", $id, $firstName, $lastName,
                         $address, $email, $phoneNumber, $dob);
mysqli_stmt_execute($stmt);
echo "record has been saved";



mysqli_close( $database );

?>

</body>
</html>
