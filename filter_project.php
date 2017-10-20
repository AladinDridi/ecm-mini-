<?php
header('Content-Type: text/html; charset=utf-8');
require_once('select_projects.php');
$projects=utf8_encode($option2);
$host="localhost";
$user="root";
$pass="";
$db="calendar";
$name=$_POST['stat'];
$connect=mysqli_connect($host,$user,$pass,$db); 
 $query = "SELECT COUNT(*) AS number, status  FROM taches WHERE projects='".utf8_decode($name)."' GROUP BY status";  
 $result =mysqli_query($connect, $query);  


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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row=mysqli_fetch_array($result)){ 
                            
                               echo "['".utf8_encode($row["status"])."', ".$row["number"]."],"; }
                          ?>  
                     ]);  
                var options = {  
                      title: 'Taux avancement de ce projet',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>          
        <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
        form{
            margin-bottom: 150px;
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
                        <a href="subscription.php">Ajouter utilisateur</a>
                    </li> 
                   
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
 <div class="btn-group">
  <button  onclick="document.location.href='taches.php'" class="btn"> tâches</button>
</div> 
    <div class="container">
    <div class="col-lg-4"></div>
    <div class="col-lg-4"></div>
    <div class="col-lg-4"></div>
    <div class="jumborton" style="margin-top:150px;">
    
    </div>
    <h2>Taux d'avancement de projet <p><?php echo $name; ?></p></h2>
    
    <div id="piechart"></div>
    </body>
    </html>
