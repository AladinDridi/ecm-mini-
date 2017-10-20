<?php 
include'bdd.php';
if($_POST){
 session_start();
 $username = "";
 $password = "";
 
  $username = $_POST['username'];
 
  $password = $_POST['password'];
 
 
 $q = "SELECT * FROM users WHERE username='$username' AND password='$password'";
 $query = $bdd->prepare($q);
 $query->execute();
 if($query->rowCount() == 0){
  header('Location: login.php?err=1');
 }else{
  $row = $query->fetch(PDO::FETCH_ASSOC);
  session_regenerate_id();
  $_SESSION['sess_user_id'] = $row['id'];
  $_SESSION['username'] = $row['username'];
$_SESSION['sess_userrole'] = $row['role'];
  session_write_close();
  if($_SESSION['sess_userrole']=="administrateur"){
   header('Location: index2.php');
  }else{
   header('Location: index.php');
  }
  
  
 }
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
    <div class="container">
    <div class="col-lg-4"></div>
    <div class="col-lg-4"></div>
    <div class="col-lg-4"></div>
    <div class="jumborton" style="margin-top:150px;">
    
    </div>
    <h2 style="text-align:center;">Se connecter</h2>
    <div class="form-group">
    <form method="post">
    <input type="text" name="username" placeholder="tapez votre user name" class="form-control" >
    <input type="password" name="password" class="form-control" placeholder="Mot de passe">
        <Button type="submit" class="btn btn-primary form-control" name="submit">Login </Button>
    
    </form>
    </div>
    </div>
     <div class="col-lg-4"></div>

    </body>

</html>