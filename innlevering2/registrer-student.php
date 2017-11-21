<!DOCTYPE html>

<head>
	<title>Registrer student</title>
	<html lang="no">
	<meta charset="utf-8">
</head>

<body>
	<h2>Registrer student</h2>

	<form method="post" action="#" id="student" name ="student">
		<text>Brukernavn</text> <input type="text" id="brukernavn" name ="brukernavn" required="" /> <br>
		<text>Fornavn</text> <input type="text" id="fornavn" name="fornavn" required="" /> <br>
		<text>Etternavn</text> <input type="text" id="etternavn" name="etternavn" required="" /> <br>
		<text>Klassekode</text> <input type="text" id="klassekode" name="klassekode" required="" /> <br>
		</br>
		<input name="submit" type="submit" value ="Registrer">
		<input name="reset" type="reset" value="Nullstill">
	</form>
</body>
	<?php
	if(isset($_POST{"submit"}))
		{
			$brukernavn = $_POST["brukernavn"];
			$fornavn = $_POST["fornavn"];
			$etternavn = $_POST["etternavn"];
			$klassekode = $_POST["klassekode"];

			$fil = fopen("filer/student.txt","a") or die ("filen er ikke åpen");
			$samlet= $brukernavn. ";". $fornavn. ";". $etternavn. ";". $klassekode. ";". "\n";
			if ($brukernavn && $fornavn && $etternavn && $klassekode)
			{
				$fil = fopen('filer/student.txt','a');
				fwrite($fil, $samlet);
				fclose($fil);
				print("Informasjonen ble lagret!");
			}
		}

	?>

</html>