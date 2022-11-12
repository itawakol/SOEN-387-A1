<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Registration</title>
</head>
<body>
    <h1>Online Course Registration</h1>
    <br>
    <div class="student">

        <h2>Student</h2>
        <?php
session_start();
extract( $_POST ); 
if ( !( $database = mysqli_connect( "localhost", "root", "") ) ) {
    die( "Could not connect to database </body></html>" );
};
if ( !mysqli_select_db( $database ,"assignment 1" ) ) {
    die( "Could not open Online Registration database </body></html>" );
};


if(isset($_POST['studentSubmit'])){
    $id = mysqli_real_escape_string($database, $_POST['id']);
    if($id != "") {
        $sql_query = "SELECT count(*) as cntID FROM student WHERE studentID='$id'";
        $result = mysqli_query($database, $sql_query);
        $row = mysqli_fetch_array($result);
        $count = $row['cntID'];
        if ($count >0) {
            $_SESSION['id'] = $id;
            header('Location: studentHub.php');
        } else {
            echo "invalid student ID";
        }
    } else {
        echo "please enter a valid student ID";
    }
}


?>
        <form method="POST" action="">
            <p>Student ID (8 digits):</p>
            <input type="text" id="id" name="id" size="8" /><br><br>
            <input type="submit" id ="id" name="studentSubmit" value="Sign In" />
        </form> <br>

        <a href="newStudentRegistration.html">
            <button type="submit">Don't have an account? Register here!</button>
        </a>

    </div>

    <div class="admin">

        <h2>Administrator</h2>
        <?php
        extract( $_POST ); 
        if ( !( $database = mysqli_connect( "localhost", "root", "") ) ) {
            die( "Could not connect to database </body></html>" );
        };
        if ( !mysqli_select_db( $database ,"assignment 1" ) ){
            die( "Could not open Online Registration database </body></html>" );
};

if(isset($_POST['adminSubmit'])){
    
    if($adminID != "") {
        $sql_query = "SELECT count(*) as cntID FROM administrator WHERE employmentID='$adminID'";
        $result = mysqli_query($database, $sql_query);
        $row = mysqli_fetch_array($result);
        $count = $row['cntID'];
        if ($count >0) {
            $_SESSION['adminID'] = $adminID;
            header('Location: adminHub.html');
        } else {
            echo "invalid admin ID";
        }
        } else {
        echo "please enter a valid admin ID";
    }
}

?>
        <form method="POST" action="">
           <p>Administrator ID (8 digits):</p>
            <input type="text" name="adminID" size="8" /> <br><br>
            <input type="submit" name="adminSubmit" value="Sign In" />
        </form> <br>
        <a href="newAdminRegistration.html">
            <button type="submit">Don't have an account? Register here!</button>
        </a>
        
    </div>


</body>
</html>
