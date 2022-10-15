<!DOCTYPE html>
<html>
    <head>
        <title>List of students</title>
    </head>
<body>
    <table>
        <tr>
            <th>course code</th>
            <th>title</th>
            <th>semester</th>
            <th>days</th>
            <th>time</th>
            <th>instuctor</th>
            <th>room</th>
            <th>start date</th>
            <th>end date</th>
        
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
</body>
</html>
