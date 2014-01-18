<p>Voit tehdä paitatilauksen kätevästi tällä lomakkeella:</p>

<form action="tilaus.php" method="post">
<div style="color:#79261B">

<h2>PAITATILAUS</h2>

Etunimi: <input type="text" name="etunimi" size="25"> <br><br>
Sukunimi: <input type="text" name="sukunimi" size="25"> <br><br>
Sähköposti: <input type="text" name="email" size="25"> <br><br>
Puhelinnumero: <input type="text" name="puhelin" size="25"> <br><br>

Paidan koko: <br>
<input type="radio" name="koko" value="S"> S <br>
<input type="radio" name="koko" value="M"> M <br>
<input type="radio" name="koko" value="L"> L <br>
<input type="radio" name="koko" value="XL"> XL <br>
<input type="radio" name="koko" value="XXL"> XXL <br><br>

<input type="checkbox" name="malli"> naistenmalli (jos mahdollista)<br><br>

Maksutapa:
<select name="maksu">
<option value="tilisiirto" selected> 15 € tilisiirtona etukäteen
<option value="kateinen"> 20 € käteisellä tapahtumassa
</select> <br><br>

Lisätietoja tai turhia toiveita: <br><br>
<textarea name="info" rows="3" cols="42">
</textarea> <br><br>

<input type="submit" value="Lähetä">
<input type="reset" value="Tyhjennä">

<br>
<br>
<hr>

</div>
</form>

<p>Maksuohjeet näet lähetettyäsi lomakkeen.</p>

</body>
</html>
