<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Hub</title>
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

$adminID = $_SESSION["adminID"];

if(!isset($_SESSION["adminID"])){
    header('Location: registrationPage.php');
}
?>
    <h1>Admin Hub</h1>
    <br>
    
    <h2> Personal Information</h2>
    
    <table>
        <tr>
            <th>Employment ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Date of Birth</th>
        </tr>
        
    <?php

    $sql = "SELECT * FROM administrator WHERE employmentID =$adminID";
    $result = mysqli_query($database, $sql);
    if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <td><?php echo $row['employmentID']; ?></td>
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
    
    <div class="createCourse">
    <h2>Create A Course</h2>
    <form method="post" action="addCourse.php">
        <label>Course Code (ex: COMP387):
        <input type="text" name="courseCode" /></label> <br><br>

        <label>Title:
        <input type="text" name="title" /></label> <br><br>

        <label>Semester (ex: Fall 2022):
        <input type="text" name="semester"/></label> <br><br>

        <label>Days (ex: MoFr):
        <input type="text" name="days"/></label> <br><br>

        <label>Time (ex: 10:30am):
        <input type="text" name="time"/></label> <br><br>

        <label>Instructor Name:
        <input type="text" name="instructor"/> </label><br><br>

        <label>Room:
        <input type="text" name="room" size="4"/> </label><br><br>

        <label>Start Date (YYYYMMDD):
        <input type="text" name="startDate"/> </label> <br><br>

        <label>End Date (YYYYMMDD):
        <input type="text" name="endDate"/> </label><br>
        <br>
        <br>
        <input type="submit" value="Submit" />
    </form>
    </div>
<br>
    <h2>Student Reports</h2> 

    <div class="searchByCourse">
        <h3> List of students in a course: </h3>
        <form method="POST" action="studentList.php">
        <input type="text" name="courseCode" value="Course Code"/>
        <br>
        <input type="submit" value="Submit" />
        </form>
    </div>
<br>
    <div class="searchByStudent">
        <h3> List of courses taken by a student: </h3>
        <form method="POST" action="courseList.php">
        <input type="text" name="studentID" value="Student ID"/>
        <br>
        <input type="submit" value="Submit" />
        </form>
    </div>
<br>
<br>

        
</body>
</html>
