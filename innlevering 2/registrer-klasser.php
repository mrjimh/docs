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



<h2>Registrer klasser</h2>
 <html lang="en">
 <meta charset="UTF=8">
 <script src="funksjoner.js"></script>


<form method="post" action="" id="registrerKlasseSkjema" name="registrerKlasseSkjema" onSubmit="return validerRegistrerKlasseSkjema()">
    Klassekode <input type="text" id="klassekode" name="klassekode" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" onChange="endreTilStoreBokstaver(this)"/><br/>
    Klassenavn <input type="text" id="klassenavn" name="klassenavn" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt(this)"/><br/>
    <input type="submit" value="Registrer klasser" id="registrerKlasseknapp" name="registrerKlasseKnapp"/>
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" onClick="fjernMelding()"/>
</form>
<div id="melding"></div>


<?php
$lovligKlassekode = $lovligKlassenavn = $klassekode = $klassenavn = "";
   include ("validering.php");
if (isset($_POST["registrerKlasseKnapp"]))
{

    $klassekode = $_POST["klassekode"];
    $klassenavn = $_POST["klassenavn"];

    $lovligKlassekode = validerKlassekode($klassekode);
    $lovligKlassenavn = validerKlassenavn($klassenavn);


        if($lovligKlassekode && $lovligKlassenavn)
        {
        include ("databasetilkobling.php");

        $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Feil! Kunne ikke hente data fra databasen!");
        $antallRader=mysqli_num_rows($sqlResultat);

        if ($antallRader!=0)
        {
            print ("Klassen er allerede registrert!!");
        }
        else
        {
            $sqlSetning="INSERT INTO klasse (klassekode,klassenavn) VALUES ('$klassekode','$klassenavn');";
            mysqli_query($db,$sqlSetning) or die ("Kunne ikke registrere date i databasen!!");

            print ("Data er nå registrert: <br/> Klassekode: $klassekode <br/> Klassenavn: $klassenavn");
        }
    }
}
}
include ("lukk.html");
?>