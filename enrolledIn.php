<!DOCTYPE html>
<html>
<head>
    <title>Add Courses</title>
</head>
<body>

<?php

extract( $_POST );

$id = $_POST['id'];
$course1= $_POST['course1'];
$course2= $_POST['course2'];
$course3 = $_POST['course3'];
$course4 = $_POST['course4'];
$course5 = $_POST['course5'];


if ( !( $database = mysqli_connect( "localhost",
    "root", "") ) ) {
    die( "Could not connect to database </body></html>" );
};


if ( !mysqli_select_db( $database ,"assignment 1" ) ) {
    die( "Could not open Online Registration database </body></html>" );
};

$query="INSERT INTO enrolledin (studentID,courseCode1,courseCode2,courseCode3,courseCode4,courseCode5)
				 VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($database);


if (!mysqli_stmt_prepare($stmt, $query)){
    die(mysqli_error($database));
}

mysqli_stmt_bind_param($stmt, "isssss", $id, $course1, $course2,
    $course3, $course4, $course5);
mysqli_stmt_execute($stmt);
echo "Course(s) has/have been added";


mysqli_close( $database );

?>
<br><br>

<a href="registrationPage.html">
    <button type="submit">Press here to go to login page</button>
</a>

</body>
</html>
