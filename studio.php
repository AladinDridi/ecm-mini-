<?php 

$date = new DateTime();
$date->setTimeZone(new DateTimeZone("Asia/Dhaka"));
$get_datetime = $date->format('d.m.Y H:i:s');
// Get prev & next month

if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}
  
// Check format
$timestamp = strtotime($ym,"-01");
if ($timestamp === false) {
    $timestamp = time();
}
  
// Today
$today = date('Y-m-j', time());
  
// For H3 title
$html_title = date('Y / m', $timestamp);
  
// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));



?>


<html>
<head>
<meta charset="utf8">
<title></title>
</head>
<body>
<table></table>   
<thead>
    <tr><a class="suivant" href="<?php echo $prev; ?>">Précedent</a> <a class="precedent" href="<?php echo $next;?>">Suivant</a></tr>
    <br>
<tr><th><?php  echo $today; ?></th></tr>
    
</thead>

</body>

</html>