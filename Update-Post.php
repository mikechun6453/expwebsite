
<?php
// connect to database
$mysqli = new mysqli("127.0.0.1", "root", "", "5114asst1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


    $title = $_GET['title'];
    $id = $_GET['updateID'];

        //$q = "UPDATE photo SET title='$title' comment='$comment' WHERE idphoto='$id'";
        //$q = "UPDATE photo SET title='$title' WHERE idphoto='$id'";
        $q = "UPDATE photo SET title='$title' WHERE idphoto='$id'";
   
        if ($mysqli->query($q)) {
            
            echo "Message updated.";
            header('Location: Instagraham.php' );
            
            
        }
        else {
            echo "Query error: please contact your system administrator.";
        }

?>