<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Festaripaita</title>
<link rel="stylesheet" href="tyylit.css" type="text/css">
</head>
<body>

<h1>FESTARIPAITA</h1>

<h2>Korkkifest 2012 festaripaidan tilaaminen</h2>

<hr>

<h2>Kiitos tilauksesta!</h2>

<p>Tilauksesi on kirjautunut seuraavilla tiedoilla:</p>

<div style="color:#79261B">

<?php

$tilaus=htmlspecialchars($_GET["t"]);
echo "<ul>";
$tiedosto=fopen("data/$tilaus.txt","r");
while(!feof($tiedosto)){
$rivi=fgets($tiedosto,1024);
echo("$rivi<br>");
}
fclose($tiedosto);
?>

 </div>

<p>Tilatut paidat jaetaan viimeist‰‰n tapahtumassa.</p>

<p>Vinkki: Jos haluat tilata useamman paidan, voit palata <a href="javascript:javascript:history.go(-1)">t‰st‰</a> takaisin t‰ytt‰m‰llesi lomakkeelle ja tehd‰ tietoja muuttamalla helposti uuden tilauksen.</p>

<br>

<p><a href="uutiset_2012.php">Paluu etusivulle</a></p>

</body>
</html>
