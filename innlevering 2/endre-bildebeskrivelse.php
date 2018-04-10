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
<h3>Endre bildebeskrivelse</h3>
<form method="post" action="" id="finnBildeSkjema" name="finnBildeSkjema">
Bilde
<select name="bildenr" id="bildenr">
<?php include("dynamikk.php"); listeboksBildenr(); ?>
</select> <br/>
<input type="submit" value="Finn bilde" name="finnBildeKnapp" id="finnBildeKnapp">
</form>
<?php
if (isset($_POST ["finnBildeKnapp"]))
{
$bildenr=$_POST ["bildenr"];


include("databasetilkobling.php");
$sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
$rad=mysqli_fetch_array($sqlResultat);
$bildenr=$rad["bildenr"];
$filnavn=$rad["filnavn"];
$beskrivelse=$rad["beskrivelse"];

print ("<form method='post' action='' id='endreBildeSkjema' name='endreBildeSkjema'>");

print ("Bildenr <input type='text' value='$bildenr' name='bildenr' id='bildenr' readonly /> <br />");
print ("Filnavn <input type='text' value='$filnavn' name='filnavn' id='filnavn' readonly /> <br />");
print ("GJELDENDE BESKRIVELSE</br>");

print ("<input type='text' value='$beskrivelse' name='beskrivelse' id='beskrivelse' readonly /> <br />");
print ("</br>");
print ("SKRIV INN NY BESKRIVELSE UNDER</br>");

print ("<input type='text' value='' name='beskrivelse' id='beskrivelse' required /> <br />");



print ("<input type='submit' value='Endre beskrivelse' name='endreBildeKnapp' id='endreBildeKnapp'>");
print ("</form>");
}
if (isset($_POST ["endreBildeKnapp"]))
{
$bildenr=$_POST ["bildenr"];
$filnavn=$_POST ["filnavn"];
$beskrivelse=$_POST ["beskrivelse"];

if (!$beskrivelse)
{
print ("Alle felt m&aring; fylles ut");
}
else
{
include("databasetilkobling.php");
$beskrivelse=$beskrivelse;
$sqlSetning="UPDATE bilde SET beskrivelse='$beskrivelse' WHERE bildenr='$bildenr';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; endre data i databasen");
print ("Bildet med bildenr $bildenr er n&aring; endret<br />");
}
}
}
include("lukk.html");
?>