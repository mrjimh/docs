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
/* Viser klasser */
//include ("forside.html");
include ("databasetilkobling.php");

$sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Kunne ikke hente data fra databasen!");
$antallRader=mysqli_num_rows($sqlResultat);

print ("<h2>Registrerte klasser</h2>");
print ("<table border=2 align=center>");
print ("<th>Klassekode</th><th>Klassenavn</th>");

for ($t=1;$t<=$antallRader;$t++)
{
    $rad=mysqli_fetch_array($sqlResultat);
    $klassekode=$rad["klassekode"];
    $klassenavn=$rad["klassenavn"];

    print ("<tr> <th>$klassekode</td> <td>$klassenavn</th> </tr>");
}
}
print ("</table>");
include ("lukk.html");
?>