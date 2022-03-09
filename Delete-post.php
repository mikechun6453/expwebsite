
<?php

// connect to database
//if (isset($_POST["btn_delete"]))
//{
  //  $idphoto = $_GET['id'];
$mysqli = new mysqli("localhost", "root", "", "5114asst1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


// create SQL query to delete message with idmessage=id
$q = 'DELETE FROM photo WHERE idphoto=' . $_GET['id'] . ';';


// execute query and output a success/error message/
if ($mysqli->query($q)) {
    
    //echo '<p>Message ' . $_GET['id'] . ' deleted.</p>';
    echo "<script>alert('Message deleted')</script>";
    header('Location: Instagraham.php' ); 
    
}
else {
    echo "<p>Something went wrong. Please contact your system adminstrator.</p>";
}
//}

?>
