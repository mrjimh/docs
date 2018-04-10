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
<h2>Slett student</h2>

<form method="post" action="" id="slettFagSkjema" name="slettFagSkjema" onSubmit="return bekreft()"><br/>
    Brukernavn <select name="brukernavn" id="brukernavn">
        <?php include ("dynamikk.php"); listeboksBrukernavn();?>
    </select>    <br/>
    <input type="submit" value="Slett studenten" name="slettStudentKnapp" id="slettStudentKnapp"/>
</form>

<?php
if (isset($_POST["slettStudentKnapp"]))
{
    include ("databasetilkobling.php");

    $brukernavn=$_POST["brukernavn"];

    $sqlSetning="DELETE FROM student WHERE brukernavn='$brukernavn';";
    mysqli_query($db,$sqlSetning) or die ("</br></br>Feil! Det var ikke mulig å endre informasjonen i databasen!");

    print ("</br></br> Databasen er oppdatert!</br>$brukernavn ble slettet: <br/>");
}
}
include ("lukk.html");
?>