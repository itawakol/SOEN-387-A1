<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php

extract( $_POST ); 


$query="INSERT INTO student (studentID,firstName,lastName,homeAddress,email,phoneNumber,dateOfBirth)
				 VALUES ('$id','$firstName','$lastName','$address','$email','$phoneNumber','$dob')";



if ( !( $database = mysqli_connect( "localhost",
    "root", "" ) ) )
    die( "Could not connect to database </body></html>" );


if ( !mysqli_select_db( $database ,"Assignment1" ) )
    die( "Could not open Online Registration database </body></html>" );



mysqli_close( $database );

?>

</body>
</html>
