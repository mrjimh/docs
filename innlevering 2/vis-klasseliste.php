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

<h2>Klasseliste</h2>
 <html lang="en">
 <meta charset="UTF=8">

<form method="post" action="" id="endreKlasseSkjema" name="endreKlasseSkjema">
    Klasse <select name="klassekode" id="klassekode">
    <?php include ("dynamikk.php"); listeboksKlassekode();?>
    </select><br/>
    <input type="submit" value=" Vis klasseliste " name="finnKlasseKnapp" id="finnKlasseKnapp">
</form>


<?php
if (isset($_POST["finnKlasseKnapp"]))
{
	include ("databasetilkobling.php");

	$sqlSetning="SELECT * FROM student ORDER by bildenr;";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra databasen");
	$antallRader=mysqli_num_rows($sqlResultat);



print ("<h2>Klasseliste</h2>");
print ("<table border=3 align=center>");
print ("<th>Fornavn</th><th>Etternavn</th> <th>Bilde</th> <th>Bildenr</th>");
	for ($t=1;$t<=$antallRader;$t++)
	{
		$rad=mysqli_fetch_array($sqlResultat);
		$fornavn=$rad["fornavn"];
		$etternavn=$rad["etternavn"];
		$bilde=$rad["bilde"];
		$bildenr=$rad["bildenr"];

    	print ("<tr> <td> $fornavn </td> <td> $etternavn </td> <td> <img src='bilder/".$rad['$bilde']."'> </td> <td> $bildenr </td> </tr>");
	}


print ("</table>");
include ("lukk.html");





}
}
include ("lukk.html");
?>
