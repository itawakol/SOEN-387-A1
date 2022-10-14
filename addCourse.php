<!DOCTYPE html>
<html>
<head>
    <title>Add Course to Database</title>
</head>
<body>

<?php

extract( $_POST ); 

$courseCode = $_POST['courseCode'];
$title = $_POST['title'];
$semester = $_POST['semester'];
$days = $_POST['days'];
$time = $_POST['time'];
$instructor = $_POST['instructor'];
$room = $_POST['room'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];



if ( !( $database = mysqli_connect( "localhost",
    "root", "") ) ) {
    die( "Could not connect to database </body></html>" );
    };


if ( !mysqli_select_db( $database ,"assignment1" ) ) {
    die( "Could not open Online Registration database </body></html>" );
};
$query="INSERT INTO course (courseCode,title,semester,days,time,instructor,room,startDate,endDate)
				 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($database);
if (!mysqli_stmt_prepare($stmt, $query)){
    die(mysqli_error($database));
}
mysqli_stmt_bind_param($stmt, "issssii", $courseCode, $title, $semester,
                         $days, $time, $instructor, $room, $startDate, $endDate);
mysqli_stmt_execute($stmt);
echo "Course has been added";



mysqli_close( $database );

?>

</body>
</html>