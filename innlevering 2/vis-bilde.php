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

<?php
/* Vis bilde */
include ("databasetilkobling.php");

$sqlSetning="SELECT * FROM bilde ORDER BY bildenr;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Kunne ikke hente data fra databasen!");
$antallRader=mysqli_num_rows($sqlResultat);

print ("<h2>Registrerte bilder</h2>");
print ("<table border=2 align=center>");
print ("<th>Bildenr</th><th>Opplastingsdato</th><th>Filnavn</th><th>Beskrivelse</th>");

for ($t=1;$t<=$antallRader;$t++)
{
    $rad=mysqli_fetch_array($sqlResultat);
    $bildenr=$rad["bildenr"];
    $opplastingsdato=$rad["opplastingsdato"];
	$filnavn=$rad["filnavn"];
	$beskrivelse=$rad["beskrivelse"];
    print ("<tr> <th>$bildenr</td> <td>$opplastingsdato</th> <td>$filnavn</th> <td>$beskrivelse</th> </tr>");
}
}
print ("</table>");
include ("lukk.html");
?>