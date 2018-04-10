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
include("script.js");

?>

<script src="funksjoner.js"></script>
<html lang="en">
<meta charset="UTF=8">

<h2>Registrer studenter</h2>

<form method="post" action="" id="registrerStudentSkjema" name="registrerStudentSkjema" onSubmit="return validerRegistrerStudentSkjema()">
    <h7>Brukernavn:</h7> <input type="text" id="brukernavn" name="brukernavn" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt(this)" onChange="endreTilStoreBokstaver(this)"/><br/>
    Fornavn: <input type="text" id="fornavn" name="fornavn" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt(this)"/><br/>
    Etternavn: <input type="text" id="etternavn" name="etternavn" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt(this)"/><br/>
    Klasse: <select name="klassekode" id="klassekode">
    <?php include ("dynamikk.php"); listeboksKlassekode();?>
    </select><br/>
    Neste leveringsfrist: <input type="text" id="datepicker" name="neste_leveringsfrist" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt(this)"/><br/>
    Studentbilde: <select name="bildenr" id="bildenr">
    <?php include ("dynamikk.php"); listeboksBildenr();?>
    </select><br/>
    <input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp"/>
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" onClick="fjernMelding()"/>
</form>





<div id="melding"></div>

<?php
if (isset($_POST["registrerStudentKnapp"]))
{
    $brukernavn=$_POST["brukernavn"];
    $fornavn=$_POST["fornavn"];
    $etternavn=$_POST["etternavn"];
    $klassekode=$_POST["klassekode"];
    $neste_leveringsfrist=$_POST["neste_leveringsfrist"];
    $bildenr=$_POST["bildenr"];

    if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode)
    {
        print ("Alle felt må fylles ut!!");
    }
    else
    {
        include ("validering.php");

        $lovligKlassekode=validerKlassekode($klassekode);

        if (!$lovligKlassekode)
        {
            print ("Klassekode er ikke korrekt utfylt!");
        }
        else
        {
        include ("databasetilkobling.php");

        $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente fra databasen!!");
        $antallRader=mysqli_num_rows($sqlResultat);

        if ($antallRader!=0)
        {
            print ("Studenten er allerede registrert!");
        }
        else
        {
            $sqlSetning="INSERT INTO student (brukernavn,fornavn,etternavn,klassekode,neste_leveringsfrist,bildenr) VALUES ('$brukernavn','$fornavn','$etternavn','$klassekode','$neste_leveringsfrist','$bildenr');";
            mysqli_query($db,$sqlSetning) or die ("Feil! Det var ikke mulig å registrere data!");

            print ("Student er nå registrert: <br/> Brukernavn: $brukernavn<br/> Fornavn: $fornavn<br/> Etternavn: $etternavn</br> Klassekode: $klassekode<br/></br> Neste leveringsfrist: $neste_leveringsfrist<br/></br> Studentbilde: $bildenr<br/>");
        }
     }
  }
}
}
include ("lukk.html");
?>