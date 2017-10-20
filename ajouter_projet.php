<?php
header('Content-Type: text/html; charset=utf-8');
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >';
if($_POST)
{ 

$host="localhost";
$user="root";
$pass="";
$db="calendar";
$conn=mysqli_connect($host,$user,$pass,$db); 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
 $projetnm=utf8_decode($_POST['projectname']);
// attempt insert query execution
$sql = "INSERT INTO projets (project_name) VALUES ('$projetnm')";
if(mysqli_query($conn, $sql)){
    echo "success.";
} else{
    echo "oops verifiez encore $sql. " . mysqli_error($conn);
}
 
// close connection
mysqli_close($conn);
}
?>
<html>
    <header>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
        </style>
    </header>
<body>
        <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index2.php">Calendrier</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="subscription.php">Ajouter utilisateur</a>
                    </li> 
               
                    <li>
                    <a href="taches.php">Tâches</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container">
    <div class="col-lg-4"></div>
    <div class="col-lg-4"></div>
    <div class="col-lg-4"></div>
    <div class="jumborton" style="margin-top:150px;">
    
    </div>
    <h2 style="text-align:center;">Ajoutez un projet</h2>
    <div class="form-group">
    <form method="post">
     <input type="text" name="projectname" placeholder="projets" class="form-control">

        <Button type="submit" class="btn btn-primary form-control" name="submit">sauvegarder </Button>
    
    </form>
    </div>
    </div>
     <div class="col-lg-4"></div>

    </body>

</html>
