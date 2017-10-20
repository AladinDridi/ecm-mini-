<?php
    header('Content-Type: charset=utf-8');
require_once('bdd.php');
require_once('users_select.php');
$list_users=utf8_decode($option);
require_once('select_projects.php');
$list_projets=$option2;

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
    
      <button  onclick="document.location.href='ajouter_taches.php'" class="btn">Ajouter tâches</button>
  <button  class="btn">filtrer/approuver</button>
  <button onclick="document.location.href='ajouter_projet.php'" class="btn">Ajouter projet</button>
  <button  onclick="document.location.href='statistiques.php'" class="btn">Taux d'avancement</button>
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
    <h2 style="text-align:center;">Ajoutez des tâches</h2>
    <div class="form-group">
    <form method="post" action="tasksadding.php">
        <label for="projects">Projets</label>
     <select name="projects" class="form-control">
         <?php echo utf8_encode($list_projets) ; ?>
     </select>
    <label for="chapitres">Nom du tâche</label>
     <input type="text" name="chapitres" placeholder="chapitres/leçons" class="form-control">
    <label for="usernames">assigner à</label>
     <select name="usernames" class="form-control">
         <?php echo utf8_encode($list_users) ; ?>
     </select>
        <label for="datedebut">Date Debut</label>
        <input type="date" name="datedebut"  class="form-control" >
        <label for="Datefin">Date Fin</label>
        <input type="date" name="Datefin" class="form-control" >
        <label for="days">Jours</label>
        <input type="text"  maxsize="10" name="days" placeholder="Jours" class="form-control" >
        <label for="stattus">Status de taches</label>
        <select name="stattus" class="form-control">
         <option>non-achevé</option> 
         <option>achevé</option>
        </select>

        <Button type="submit" class="btn btn-primary form-control" name="submit">sauvegarder </Button>
    
    </form>
    </div>
    </div>
     <div class="col-lg-4"></div>

    </body>

</html>
