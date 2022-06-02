<?php

  include_once("pictures.php");
  
  $pics = get_pic_list();
  $yearlist = get_year_list($pics);
  
  if (isset($_GET['pic'])) {
    $name = stripslashes($_GET['pic']);
  } else if (isset($_GET['year'])) {
    $new_year = stripslashes($_GET['year']);
    $name = $yearlist[$new_year];
  } else {
    $name = get_start_pic($pics);
  }
  $pic = $pics[$name];
  
?>

<html>
<head>
<title>Wall City - Ultimate Berlin, Baby</title>
<link rel="stylesheet" type="text/css" href="styles.css" /2>
<script src="scripts.js" type="text/javascript"></script>
</head>

<body>

<div class="middle-block">


<div class='centered'>
<img src='logo_wall_city_inverted.jpg' alt='Wall City Logo' width='40%' />
</div>
<p></p>
<p></p>

<?php

  $newer = "&nbsp;&nbsp; Vor &nbsp;&nbsp;";
  $older = "Zur&uuml;ck";
  
  if (get_newer_pic($pics, $name) != "") {
    $newer = "<a href='?pic=".get_newer_pic($pics, $name)."'>".$newer."</a>";
  }
  
  if (get_older_pic($pics, $name) != "") {
    $older = "<a href='?pic=".get_older_pic($pics, $name)."'>".$older."</a>";
  }

  $dropdown = "<ul id='nav' class='drop'>";
  $dropdown .= "<li>".$older."</li>";
  $dropdown .= "<li>".$pic['year']."<ul>";
  
  foreach ($yearlist as $year => $nname) {
    $dropdown .= "<li><a href='?year=".$year."'>".$year."</a></li>";
  }
  
  $dropdown .= "</ul></li>";
  $dropdown .= "<li>".$newer."</li>";
  $dropdown .= "</ul>";
  
  
  echo "<a href='".$pic["loc"]."'><div class='team_pic'><img src='".$pic["loc"]."' alt='Teamfoto' width='100%' /></div></a><br/>";

  echo "<div class='caption'>";
  echo get_description($pic);
  echo "</div>";
?>



<div class='centered'>
<?php echo $dropdown; ?>
</div>


<a href="http://www.tib1848ev.de/sportarten/ultimate-frisbee/">
<h2> Herren Ultimate Frisbee Team des Tib1848 e.V.
</h2>
</a>


<div class='centered'>
WallCity ist ein Erstliga Ultimate Frisbee Team aus Berlin. Wir suchen immer nach neuen, ambitionierten Spielern f&uuml;r unser Team.
Wenn du Lust hast Teil von dem Projekt WallCity zu werden schreib uns einfach eine kurze Mail an <a href='mailto:info@wallcity.de'>info@wallcity.de</a>.
<br/>
<br/>
WallCity is a Berlin based Ultimate Frisbee Team. We´re playing in germanys top division and are always looking for new, motivated players. If you are interested in being part of this project drop us a line at: <a href='mailto:info@wallcity.de'>info@wallcity.de</a>. 
We are looking forward to meet you.
</div>

<h2>Training</h2>
<div class='centered'>Dienstags, 18:30 (Rasen)<br/>Donnerstags, 18:00 (Kunstrasen)<br/>TIB 1848 e.V. | Columbiadamm 111 | 10965 Berlin<br/>

<h2>Fragen?</h2>
<div class='centered'>Schreibt an: <a
href="mailto:info@wallcity.de">info@wallcity.de</a><br/>
<br/>
<a href="http://www.twitter.com/wallzetten">@wallzetten</a> oder <a href="https://www.facebook.com/wallcityberlin">facebook.com/wallcityberlin</a>
</div>

<h2>Mitglied werden?</h2>
<div class='centered'>Anmeldung TiB: <a target="_blank" 
href="http://www.tib1848ev.de/mitgliedschaft/">Formular</a>
<br/>

</div>
<br/><br/>
<a href="/impressum.html">Impressum</a>
</div>

</body>
</html>