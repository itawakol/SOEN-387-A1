<!DOCTYPE html>
<html>
<head>
    <title>Student Hub</title>
</head>
<body>
<?php
if ( !( $database = mysqli_connect( "localhost",
    "root", "") ) ) {
    die( "Could not connect to database </body></html>" );
};


if ( !mysqli_select_db( $database ,"assignment1" ) ) {
    die( "Could not open Online Registration database </body></html>" );
};
session_start();

$id = $_SESSION["id"];

if(!isset($_SESSION["id"])){
    header('Location: registrationPage.php');


}
?>
<h1>Student Hub </h1> <br>
<h2> Personal Information</h2>

<table>
    <tr>
        <th>Student ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Date of Birth</th>
    </tr>
    <?php

    $sql = "SELECT * FROM student WHERE studentID =$id";
    $result = mysqli_query($database, $sql);
    if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <td><?php echo $row['studentID']; ?></td>
        <td><?php echo $row['firstName']; ?></td>
        <td><?php echo $row['lastName']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phoneNumber']; ?></td>
        <td><?php echo $row['dateOfBirth']; ?></td>

    <tr>
        <?php
        }
        } else{
    }
        ?>
</table> <br> <br>

<h2> List of registered courses</h2>
<table>
    <tr>
        <th>Student ID</th>
        <th>course1</th>
        <th>course2</th>
        <th>course3</th>
        <th>course4</th>
        <th>course5</th>
    </tr>
    <?php
    $sid = $_SESSION["id"];
    $query = "SELECT * FROM enrolledin WHERE studentID=$sid";
    $result = $database->query($query);

    if ($result->num_rows > 0) {
        while($data = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $data['studentID']; ?></td>
                <td><?php echo $data['courseCode1']; ?></td>
                <td><?php echo $data['courseCode2']; ?></td>
                <td><?php echo $data['courseCode3']; ?></td>
                <td><?php echo $data['courseCode4']; ?></td>
                <td><?php echo $data['courseCode5']; ?></td>
            </tr>
        <?php
        }
        } else{

        }
        ?>
</table> <br> <br>
    


    <h2> Courses Available to Add</h2>
    
    <table>
        <tr>
            <th>Course code</th>
            <th>Title</th>
            <th>Semester</th>
            <th>Days</th>
            <th>Time</th>
            <th>Instuctor</th>
            <th>Room</th>
            <th>Start date</th>
            <th>End date</th>

        </tr>
        <?php 

        $sql = "SELECT * FROM course";
        $result = mysqli_query($database, $sql);
        if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['courseCode']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['semester']; ?></td>
            <td><?php echo $row['days']; ?></td>
            <td><?php echo $row['time']; ?></td>
            <td><?php echo $row['instructor']; ?></td>
            <td><?php echo $row['room']; ?></td>
            <td><?php echo $row['startDate']; ?></td>
            <td><?php echo $row['endDate']; ?></td>
        <tr>
            <?php
            }
            } else{
                echo "0 result";
            }
            $database->close();
            ?>
    </table>
    <br>
    <br>
    <br>


    <div class="addCourse">
        <h2>Add Courses</h2> 
        <p> You can add up to 5 courses </p>
        <form method="post" action="enrolledIn.php">

            <label>Course (enter course code):
                <input type="text" name="course1" /></label> <br><br>
            <br>
            <input type="submit" value="Submit" />
        </form>

    </div>


    <div class="deleteCourse">
        <h2>Delete a Course</h2>

        <form method="post" action="deleteEnrolledIn.php">

            <label>Course (enter course code):
                <input type="text" name="course1" /></label> <br><br>
            <br>
            <input type="submit" value="Submit" />
        </form>

    </div>

</body>
</html>
