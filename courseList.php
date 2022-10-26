<!DOCTYPE html>
<html>
<head>
    <title>List of courses</title>
</head>
<body>
<table>
    <tr>
        <th>student name</th>
        <th>course1</th>
        <th>course2</th>
        <th>course3</th>
        <th>course4</th>
        <th>course5</th>
    </tr>
    <?php
    extract( $_POST );

    $studentID = $_POST["studentID"];

    if ( !( $database = mysqli_connect( "localhost",
        "root", "") ) ) {
        die( "Could not connect to database </body></html>" );
    };


    if ( !mysqli_select_db( $database ,"assignment1" ) ) {
        die( "Could not open Online Registration database </body></html>" );
    };
    
    $query = "SELECT studentID, courseCode1, courseCode2, courseCode3, courseCode4, courseCode5 FROM enrolledin WHERE studentID=$sid";
    $result = $conn->query($query);

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
        }}else { ?>
        <tr>
            <td colspan="8">No data found</td>
        </tr>
    <?php } ?>
</table>
<body>
    
