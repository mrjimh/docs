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
<script src="funksjoner.js"> </script>

<h3>Slett bilde</h3>
<form method="post" action="" id="slettBildeSkjema" name="slettBildeSkjema" onSubmit="return bekreft()">
Bilde
<select name="bildenr" id="bildenr">
<?php include("dynamikk.php"); listeboksBildenr(); ?>
</select> <br/>
<input type="submit" value="Slett bilde" name="slettBildeKnapp" id="slettBildeKnapp" />
</form>
<?php
if (isset($_POST ["slettBildeKnapp"]))
{
$bildenr=$_POST ["bildenr"];
include("databasetilkobling.php");
$sqlSetning="SELECT filnavn FROM bilde WHERE bildenr='$bildenr';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
$rad=mysqli_fetch_array($sqlResultat);
$filnavn=$rad["filnavn"];
$sqlSetning="DELETE FROM bilde WHERE bildenr='$bildenr';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
$bildefil="bilder/".$filnavn;
unlink($bildefil) or die ("ikke mulig &aring; slette bilde på serveren");
print ("F&oslash;lgende bilde er n&aring; slettet: $bildenr $filnavn <br />");
}
}
?>