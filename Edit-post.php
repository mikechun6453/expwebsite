
<html>
<head>
<title>Edit-Post</title>
<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet"/>

<style>
		body{background-color: #f2f2f2; color: #333;}
		.col-md-8{border-radius: 6px; }
	  
</style>
</head>
<body>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
    <div class="d-flex flex-grow-1">
        <span class="w-100 d-lg-none d-block"><!-- hidden spacer to center brand on mobile --></span>
        <a class="navbar-brand" href="Instagraham.php">
            Instagraham
        </a>
        <div class="w-100 text-right">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                <i class="fas fa-bars fa-lg"></i>
            </button>
        </div>
    </div>
    <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
        <ul class="navbar-nav ml-auto flex-nowrap">
            <li class="nav-item me-3 me-lg-0">
                <a href="Instagraham.php" class="nav-link">
                	<i class="fas fa-home fa-lg"></i>
                </a>
                </li>
            <li class="nav-item  me-3 me-lg-0">
                <a href="#" class="nav-link">
                	<i class="fas fa-globe-asia fa-lg"></i>
                </a>
            </li>
            <li class="nav-item  me-3 me-lg-0">
                <a href="#" class="nav-link">
                	<i class="fas fa-heart fa-lg"></i>
                </a>
            </li>
            <li class="nav-item  me-3 me-lg-0 ">
                <a href="#" class="nav-link">
                	<i class="fas fa-user fa-lg"></i>
                </a>
            </li>
         </ul>
    </div>
</nav>
<br>
<br>

<div class="container mt-5">
<?php 

$mysqli = new mysqli("127.0.0.1", "root", "", "5114asst1");
if ($mysqli->connect_errno) {
    // if there is an error, output the details
    echo "Failed to connect to MySQL: (" .
        $mysqli->connect_errno . ") " . $mysqli->connect_error;
        
}

    $q = 'SELECT idphoto, title, imageurl, idcreator, idalbum  FROM photo WHERE idphoto=' . $_GET['id'] . ';';

// execute SQL query. If there is an error, print an error message.
if ($res = $mysqli->query($q)) {
    // set the pointer to the first result. If there are no results, tell the user.
    if ($res->data_seek(0)) {
        while ($row = $res->fetch_assoc())
        {
            $title = $row['title'];
            $id = $row['idphoto']
?>
<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 border">
	<form action="Update-Post.php" method="GET" >
      <div class="form-group">
        <label >Title</label>
        <input type="text" class="form-control"  name="title" id="title"  value="<?php echo $title?>">
      </div>
      
      <input type="hidden" name="updateID" value="<?php echo $id?>">
      <button type="submit" value="Update" name="submit" class="btn btn-primary">Edit</button>
    </form>
    </div>
		<div class="col-md-2"></div>
<?php
	}
    }
    else {
        echo "No messages found"; // no results
    }
}
else {
    echo "Query error: please contact your system administrator.";
}
?>
</div>
</div>
</body>
</html>