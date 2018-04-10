<?php
session_start();
@$innloggetBruker=$_SESSION["brukernavn"];
if (!$innloggetBruker)
{
	print("Denne siden krever innlogging <br />");

print ("<a href='innlogging.php'>G&aring; til innloggingsside </a>");}
else
{
include("forside.html");

?>






<h2>Endre studenter</h2>
 <html lang="en">
 <meta charset="UTF=8">


<form method="post" action="" id="endreStudentSkjema" name="endreStudentSkjema">
    Lagret informasjon: <select name="brukernavn" id="brukernavn">
        <?php include ("dynamikk.php"); listeboksBrukernavn();?>
    </select><br/>
    <input type="submit" value="Finn student" name="finnStudentKnapp" id="finnStudentKnapp">
</form>




<?php
	if(isset($_POST["finnStudentKnapp"]))
	{
		include ("databasetilkobling.php");
		$brukernavn=$_POST["brukernavn"];
		$sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";

		$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Det var ikke mulig å endre databasen!");
		$rad=mysqli_fetch_array($sqlResultat);
		$fornavn=$rad["fornavn"];
		$etternavn=$rad["etternavn"];
		$klassekode=$rad["klassekode"];
		$neste_leveringsfrist=$rad["neste_leveringsfrist"];
		$bildenr=$rad["bildenr"];


		print ("<br/>");
		print ("<form method='post' action='' id='endreStudentSkjema' name='endreStudentSkjema'>");
		print ("<br/>");
		print ("Brukernavn <input type='text' value='$brukernavn' name='brukernavn' id='brukernavn' readonly />");
		print ("<br/>");
		print ("Fornavn <input type='text' value='$fornavn' name='fornavn' id='fornavn' required />");
		print ("<br/>");
		print ("Etternavn <input type='text' value='$etternavn' name='etternavn' id='etternavn' required />");
		print ("<br/>");

?>

		Klassekode <select name="klassekode" id="klassekode">
		<?php include("dynamikk.php");listeboksKlassekode($klassekode);?>
		</select></br>



		<br/>
		<?php print ("Neste leveringsdato <input type='date' value='$neste_leveringsfrist' name='neste_leveringsfrist' id='neste_leveringsfrist' required/>");
		$originalDate = "2010-03-21";
		$newDate = date("d-m-Y", strtotime($originalDate));
		?>
		<br/>
		Bildenr <select name="bildenr" id="bildenr">
		<?php include ("dynamikk.php"); listeboksBildenr($bildenr);?>
		</select><br/>

<?php
		print ("</br><input type='submit' value='Utfør endringer' name='endreStudentKnapp' id='endreStudentKnapp'>");
		print ("</form>");


	}

	if (isset($_POST["endreStudentKnapp"]))
	{
		$brukernavn=$_POST["brukernavn"];
		$fornavn=$_POST["fornavn"];
		$etternavn=$_POST["etternavn"];
		$klassekode=$_POST["klassekode"];
		$neste_leveringsfrist=$_POST["neste_leveringsfrist"];
   		$bildenr=$_POST["bildenr"];

		if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode || !$neste_leveringsfrist || !$bildenr)
		{
			print ("</br></br>Fyll ut alle felt!");
		}
		else
		{
			include ("databasetilkobling.php");

			$sqlSetning="UPDATE student SET klassekode='$klassekode', fornavn='$fornavn', etternavn='$etternavn', neste_leveringsfrist='$neste_leveringsfrist', bildenr='$bildenr' WHERE brukernavn='$brukernavn';";
			mysqli_query($db,$sqlSetning) or die ("</br></br>Det gikk ikke å endre informasjonen i databasen!</br>");

			print ("Endringene er utført og databasen er oppdatert! <br/>");
		}
	}
}
include ("lukk.html");


?>