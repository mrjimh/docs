<!DOCTYPE html>

<head>
	<title>Registrer skoleklasse</title>
	<html lang="en">
	<meta charset="utf-8">
	

	<link rel="java" type="text/javascript" href="javascript/javascript.js">
	<link rel="java" type="text/javascript" href="javascript/stil.js">
	<link rel="stylesheet" type="text/css" href="css/style.css">

<script type="text/javascript">
function registrerKlasseJs()
{
  	var kode = document.getElementById["kode"].value;
	var navn = document.getElementById["navn"].value;

    if (kode == "" || navn=="")
	{
        document.getElementById("kode").innerHTML = "Du må taste inn kode";
		alert("KLASSEKODE MANGLER");
	    return false;
	}
}
</script>
</head>

<body>







	<h2>Registrer skoleklasse</h2>

	<form method="post" action="" id="klasse" name ="klasse" input type="text" onsubmit="return registrerKlasseJs()">
		Klassekode <input type="text" onFocus="fokus(this) onMouseOver="musOver(this)" onMouseOut="musAv()" id="kode" name ="kode" required="" /> <br>
		Klassenavn <input type="text" onFocus="fokus(this) onMouseOver="musOver(this)" onMouseOut="musAv()" id="navn" name="navn" required="" /> <br>
		</br>
		</br>
		<input name="submit" type="submit" value ="Registrer">
		<input name="reset" type="reset" value="Nullstill">
		</form>
		

	
<?php
if (isset($_POST["submit"]))
{
	$kode = $_POST["kode"];
	$navn = $_POST["navn"];

	$klassefil = fopen("filer/klasse.txt", "a") or die ("filen er ikke åpen");
	$samlet = $kode. ";". $navn. ";". "\n";

	if ($kode && $navn)
	{
		$klassefil = fopen('filer/klasse.txt','a');
		fwrite($klassefil,$samlet);
		fclose($klassefil);
		print("Informasjonen ble lagt til");

	}

}
?>

	

</body>
</html>