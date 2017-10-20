<?php
require_once('select_projects.php');
$value=utf8_encode($option2);


?>

<html>
    <header>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <style>
        
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
@media screen and (max-width: 640px) {
            th,td{
                font-size:1.0rem;
            }
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
                   <li><a href="taches.php">Tâches</a></li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="btn-group">
  <button  onclick="document.location.href='ajouter_taches.php'" class="btn">Ajouter tâches</button>
  <button  class="btn" onclick="document.location.href='filtrer_taches.php'">filtrer/approuver</button>
  <button onclick="document.location.href='ajouter_projet.php'" class="btn">Ajouter projet</button>
  <button  onclick="document.location.href='statistiques.php'" class="btn">Taux d'avancement</button>
</div> 
<p></p>
    <form class="form-inline" method="post" >
   
    <div class="form-group">
        <label for="projets"><p>Filtrer (selectionnez un projet)</p></label>
      <select  class="form-control" name="projets"><?php echo $value; ?></select>
    </div>
  
    <input type="submit" name="submit" value="Valider"class="btn btn-default"/>
  </form>
    <div class="container">
  <h2>Tableau</h2>
  <p>tableau de bord</p>
  <table class="table table-striped">
    <thead>
    <th>Chapitres</th>
    <th>Assigner à</th>
    <th>Date_debut</th>
    <th>Date_fin</th>
    <th>Projets</th>
    <th>Status</th>
    <th>approuver</th>
    </thead>
    <tbody>
<?php 
        // connection a la db //
    header('Content-Type: charset=utf-8');
 $host="localhost";
$user="root";
$pass="";
$db="calendar";

$conn=mysqli_connect($host,$user,$pass,$db); 
//executer une requite // 
if($_POST){ 
$projet=$_POST['projets'];
$SQL = mysqli_query($conn,"SELECT * from taches WHERE projects='".utf8_decode($projet)."' ORDER BY Date_debut DESC LIMIT 10");
    while($row=mysqli_fetch_array($SQL)){
        ?>
        <tr>
        <td><?php echo $row['chapitres']?></td>
        <td><?php echo utf8_encode($row['username']);?></td>
        <td><?php echo $row['Date_debut']?></td>
        <td><?php echo $row['Date_fin']?></td>
        <td><?php echo utf8_encode($row['projects']);?></td>
        <td><?php echo utf8_encode($row['status']);?></td>
        <td><form method="POST" action="update_taches.php"><input type="submit" name="change" value="approuver"/>
            <label for="id"></label>
            <input style="display:none;" type="text" name="id" readonly value="<?php echo $row['id'];?>"/></form>
            </td>
        </tr>
       <?php 
    }}
        ?>
        

        </tbody>
        </table>
    </div>

    </body>

</html>
