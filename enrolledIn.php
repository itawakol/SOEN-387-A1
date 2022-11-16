<!DOCTYPE html>
<html>
<head>
    <title>Add Courses</title>
</head>
<body>

<?php

extract( $_POST );
session_start();

$id = $_SESSION["id"];
$course1= $_POST['course1'];


if ( !( $database = mysqli_connect( "localhost",
    "root", "") ) ) {
    die( "Could not connect to database </body></html>" );
};


if ( !mysqli_select_db( $database ,"assignment1" ) ) {
    die( "Could not open Online Registration database </body></html>" );
};


$query1 = "SELECT courseCode1 FROM enrolledin WHERE studentID=$id";
$result1 = mysqli_query($database, $query1);
$row1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT courseCode2 FROM enrolledin WHERE studentID=$id";
$result2 = mysqli_query($database, $query2);
$row2 = mysqli_fetch_assoc($result2);

$query3 = "SELECT courseCode3 FROM enrolledin WHERE studentID=$id";
$result3 = mysqli_query($database, $query3);
$row3 = mysqli_fetch_assoc($result3);

$query4 = "SELECT courseCode4 FROM enrolledin WHERE studentID=$id";
$result4 = mysqli_query($database, $query4);
$row4 = mysqli_fetch_assoc($result4);

$query5 = "SELECT courseCode5 FROM enrolledin WHERE studentID=$id";
$result5 = mysqli_query($database, $query5);
$row5 = mysqli_fetch_assoc($result5);

if($row1 && $row1["courseCode1"] == null){
    $update1="UPDATE enrolledin SET courseCode1= '$course1' WHERE studentID=$id";
    $updated1=mysqli_query($database, $update1);
    echo "$course1 has been added";

} else if($row2 && $row2["courseCode2"]==null){
    $update2="UPDATE enrolledin SET courseCode2= '$course1' WHERE studentID=$id";
    $updated2=mysqli_query($database, $update2);
    echo "$course1 has been added";

} else if($row3 && $row3["courseCode3"]==null){
    $update3 = "UPDATE enrolledin SET courseCode3= '$course1' WHERE studentID=$id";
    $updated3 = mysqli_query($database, $update3);
    echo "$course1 has been added";

} else if($row4 && $row4["courseCode4"]==null){
    $update4 = "UPDATE enrolledin SET courseCode4= '$course1' WHERE studentID=$id";
    $updated4 = mysqli_query($database, $update4);
    echo "$course1 has been added";

} else if($row5 && $row5["courseCode5"]== null){
    $update5 = "UPDATE enrolledin SET courseCode5= '$course1' WHERE studentID=$id";
    $updated5 = mysqli_query($database, $update5);
    echo "$course1 has been added";
}else {
    echo " You are already registered in 5 courses";
}

mysqli_close( $database );

?>
<br><br>

<a href="studentHub.php">
    <button type="submit">Press here to go to your hub </button>
</a>
<a href="registrationPage.php">
    <button type="submit">Press here to go to logout </button>
</a>

</body>
</html>
