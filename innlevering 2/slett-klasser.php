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

 <html lang="en">
 <meta charset="UTF=8">
<script src="funksjoner.js"></script>
<h2>Slett klasser</h2>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()"><br/>
    Klasse <select name="klassekode" id="klassekode">
        		<?php include ("dynamikk.php"); listeboksKlassekode();?>
    		</select>    <br/>
    <input type="submit" value="Slett klassen" name="slettKlasseKnapp" id="slettKlasseKnapp"/>
</form>

<?php
if (isset($_POST["slettKlasseKnapp"]))
{
    include ("databasetilkobling.php");

    $klassekode=$_POST["klassekode"];

    $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
    mysqli_query($db,$sqlSetning) or die ("</br></br>Feil! Kunne ikke slette data i databasen.");

    print ("</br></br>Suksess!</br> Klassekode: $klassekode er slettet!<br/>");
}
}
include ("lukk.html");
?>