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
/* Vis alle studenter i tabellen */
include ("databasetilkobling.php");

$sqlSetning="SELECT * FROM student ORDER BY brukernavn;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Feil! Kunne ikke hente data!");
$antallRader=mysqli_num_rows($sqlResultat);

print ("<h2>Registrerte studenter</h2>");
print ("<table border=2 align=center>");
print ("<th>Brukernavn</th><th>Fornavn</th> <th>Etternavn</th><th>Klassekode</th><th>Leveringsfrist</th><th>Bildenr</th>");

for ($t=1;$t<=$antallRader;$t++)
{
    $rad=mysqli_fetch_array($sqlResultat);
    $brukernavn=$rad["brukernavn"];
    $fornavn=$rad["fornavn"];
    $etternavn=$rad["etternavn"];
    $klassekode=$rad["klassekode"];
    $neste_leveringsfrist=$rad["neste_leveringsfrist"];
    $bildenr=$rad["bildenr"];

    print ("<tr> <td> $brukernavn </td> <td> $fornavn </td> <td> $etternavn </td> <td> $klassekode </td> <td> $neste_leveringsfrist </td> <td> $bildenr </td></tr>");
}
}
print ("</table>");
include ("lukk.html");
?>