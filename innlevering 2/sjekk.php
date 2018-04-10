<?php
function sjekkBrukernavnPassord($brukernavn,$passord)
{

include("databasetilkobling.php"); /* tilkobling til database-server og valg av database utført */
$lovligBruker=true;
$sqlSetning="SELECT * FROM bruker WHERE brukernavn='$brukernavn';";
$sqlResultat=mysqli_query($db,$sqlSetning); /* SQL-setning sendt til database-serveren */
if (!$sqlResultat) /* SQL-setningen ble ikke utført med vellykket resultat */
{
$lovligBruker=false;
}
else
{
$rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
$lagretBrukernavn=$rad["brukernavn"];
$lagretPassord=$rad["passord"]; /* brukernavn og passord hentet fra databasen */
if($brukernavn!=$lagretBrukernavn || $passord!=$lagretPassord)
{
$lovligBruker=false;
}
}
return $lovligBruker;
}
?>