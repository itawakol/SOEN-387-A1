<!DOCTYPE html>
<html>
    <head>
        <title>Student Hub</title>
    </head>
<body>
    <h2> Courses Available to Add</h2>
    <br><br>
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
if ( !( $database = mysqli_connect( "localhost",
"root", "") ) ) {
die( "Could not connect to database </body></html>" );
};


if ( !mysqli_select_db( $database ,"assignment 1" ) ) {
die( "Could not open Online Registration database </body></html>" );
};
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
 
    <div class="addCourse">
        <h2>Add Courses</h2> <br>
        <p> You can add up to 5 courses </p>
        <form method="post" action="enrolledIn.php">
        
        <label>Enter Student ID (8 digits):
        <input type="text" name="id" /> </label><br><br>

        <label>Course 1 (enter course code):
        <input type="text" name="course1" /></label> <br><br>

        <label>Course 2 (enter course code):
        <input type="text" name="course2"/> </label><br><br>

        <label>Course 3 (enter course code):
        <input type="text" name="course3"/> </label><br><br>

        <label>Course 4 (enter course code):
        <input type="text" name="course4"/> </label><br><br>

        <label>Course 5 (enter course code):
        <input type="text" name="course5"/> </label><br><br>
        <br>
        <br>
        <input type="submit" value="Submit" />
        </form>

    </div>
    
</body>
</html>
