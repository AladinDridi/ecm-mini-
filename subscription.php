<?php
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
$msg="";
$username = mysqli_real_escape_string($conn, $_REQUEST['username']);
$pwd = mysqli_real_escape_string($conn, $_REQUEST['userspwd']);
$role=$_POST['role'];
// attempt insert query execution
$sql = "INSERT INTO users (username, password,role) VALUES ('$username','$pwd','$role')";
if(mysqli_query($conn, $sql)){
   echo'<p>un utilisateur ajouté ...</P>';
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </header>
<body>
     <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
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
    <h2 style="text-align:center;">Ajouter utilisateur  </h2>
    <div class="form-group">
    <form method="post" >
        <label for="username">Nom'd'utilisateur</label>
    <input type="text" name="username" placeholder="tapez user name" required class="form-control" >
        <label for="repeatws">Repetez nom d'utilisateur</label>
    <input type="text" name="repeatws" placeholder="repetez user name" required class="form-control" >
    <label for="role">Rôle</label>
    <select name="role" class="form-control">
        <option>membre</option>
        <option>administrateur</option>
        </select>
        <label for="userpwd">Mot de passe</label>
    <input type="password" required name="userspwd" class="form-control" placeholder="Mot de passe">
        <input type="submit" value="inscrire" class="btn btn-primary form-control" name="submit">
    
    </form>
    </div>
    </div>
     <div class="col-lg-4"></div>

</body>

</html>