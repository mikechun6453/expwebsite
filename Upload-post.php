<html>
<head>
<title>Upload Post</title>
</head>
<body>
<?php


$target_dir = "upload/"; // set target directory
$target_filename = basename($_FILES["fileToUpload"]["name"]); // set target filename
$target_file = $target_dir . $target_filename; // concatenate
$uploadOk = TRUE; // variable to determine if upload was successful
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // get file type/extension
// Only allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "HEIC") {
echo "Error: only .JPG, .JEPG, and .HEIC files are allowed.";
$uploadOk = FALSE;
}
// Check if $uploadOk is set to FALSE by an error
if (!$uploadOk) {
    echo "Failure: your file was not uploaded.";
}else{
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been
uploaded.";
} else {
    echo "Error: there was an error uploading your file.";
}
}
if ($uploadOk) {
$mysqli = new mysqli("localhost", "root", "", "5114asst1");
if ($mysqli->connect_errno) {
   


    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$q = "INSERT INTO photo (title, imageurl) VALUES ('" .($_POST['title']) . "' , '" . $target_filename . "')";

if ($mysqli->query($q)) {
    echo "<script>alert('File added to database')</script>";
    header('Location: Instagraham.php' );
}
else {
    echo "<script>alert('Something went wrong. Please contact your system adminstrator')</script>";
}
}

?>
</body>
</html>