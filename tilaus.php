<?php
//lomaketiedot muuttujiin
$aika=date("Y-m-d H:i:s");
$timetag=date("YmdHis");
$ip=$_SERVER["REMOTE_ADDR"];
$etunimi=htmlspecialchars($_POST["etunimi"]);
$sukunimi=htmlspecialchars($_POST["sukunimi"]);
$email=htmlspecialchars($_POST["email"]);
$puhelin=htmlspecialchars($_POST["puhelin"]);
$koko=$_POST["koko"];
$maksu=$_POST["maksu"];
$info=htmlspecialchars($_POST["info"]);

if ($info==""){
	$info=" - ";
}

//naistenmallin valinnnan tarkistus 
if (isset($_POST["malli"])){
    $malli="naisten";
}else{
	$malli="miesten";
}

//maksutavan tulkkaus 
if ($maksu=="tilisiirto"){
    $m=htmlspecialchars("Maksu 15 euroa tilisiirrolla 31.7.2011 mennessä. Koutain reserviupseerikerho, tilinumero 313130-1232958.");
}else{
	$m=htmlspecialchars("Maksu 20 euroa käteisellä tapahtumassa.");
}

//tilauksen kokoaminen vahvistusviestiin
$viesti=("Tilausaika: $aika\r\nTilaaja: $etunimi $sukunimi\r\nPuhelin: $puhelin\r\nEmail: $email\r\nPaidan koko: $koko\r\nMallitoive: $malli\r\nMaksutapa: $m\r\nLisätietoja: $info");

//tilauksen kokoaminen merkkijonoon
$tilaus=("$aika;$ip;$etunimi;$sukunimi;$email;$puhelin;$koko;$malli;$maksu;$info");

//tilauksen kelvollisuuden tarkistus
if (check_email($email) && check_len($etunimi, $sukunimi, $puhelin) && $koko!=""){
	done($tilaus, $viesti, $timetag, $sukunimi, $etunimi, $email);
}else{
    error();
}

//funktio sähköpostiosoitteen likimääräiseen tarkastamiseen
function check_email($osoite) {
    $pituus=strlen($osoite);
    return $pituus>=5 && $pituus<=256 && substr_count($osoite, "@")==1;
}

//funktio muiden merkkijonojen pituuden tarkastamiseen
function check_len($etu, $suku, $num) {
    $en=strlen($etu);
	$sn=strlen($suku);
	$puh=strlen($num);
    return $en>=2 && $sn>=3 && $puh>=6 && $puh<=15;
}

//funktio toimintoihin onnistuneessa tilauksessa
function done($data, $tuloste, $tag, $suku, $etu, $maili) {
	header("Location: kiitos.php?t=$tag");
    file_put_contents("tilaukset/tilaukset.csv", "$data\r\n", FILE_APPEND);
	file_put_contents("tilaukset/$suku-$etu.txt", "$tuloste\r\n\r\n", FILE_APPEND);
	file_put_contents("data/$tag.txt", "$tuloste", FILE_APPEND);
	mail("info@korkki.fi",
		"Korkkifest paitatilaus $tag",
		"Uusi paitatilaus:\r\n\r\n$tuloste");
    $headers2='From: info@korkki.fi' . "\r\n" .
     'Reply-To: info@korkki.fi' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();
	mail("$maili",
		"Paitatilausvahvistus $tag",
		"Korkkifest 2012 paitatilauksenne tiedot ja maksuohjeet:\r\n\r\n$tuloste\r\n\r\nTilaukseen liittyvissä asioissa voitte tarvittaessa olla yhteydessä vastaamalla tähän viestiin.",
		"$headers2");
}

//funktio toimintoihin virhetilanteessa
function error() {
	header("Location: virhe.php");
}

?>