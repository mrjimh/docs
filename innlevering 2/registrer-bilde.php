
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


<h2>Registrer bilde</h2>
 <html lang="en">
 <meta charset="UTF=8">
 <script src="funksjoner.js"></script>
 <script src="script.js"></script>


<form method="post" action="" enctype="multipart/form-data" id="registrerBildeSkjema" name="registrerBildeSkjema" onSubmit="return validerRegistrerBildeSkjema()">
    Bildenr <input type="text" id="bildenr" name="bildenr" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" onChange="endreTilStoreBokstaver(this)"/><br/>
    Beskrivelse <input type="text" id="beskrivelse" name="beskrivelse" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt(this)"/><br/>
    Opplastingsdato <input type="datepicker" id="opplastingsdato" value=<?php echo "" . date("Y-m-d");?> name="opplastingsdato" readonly onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt(this)"/><br/>
	Bilde <input type="file" name="bilde" id="bilde" size="60"> <br/>
    <input type="submit" value="Registrer bilde" id="registrerBildeknapp" name="registrerBildeKnapp"/>
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" onClick="fjernMelding()"/>
</form>
<div id="melding"></div>

<?php
//$lovligBildenr = $lovligFilnavn = $bildenr = $opplastingsdato = $filnavn = "";
include ("validering.php");

if (isset($_POST["registrerBildeKnapp"]))
{
    $bildenr = $_POST["bildenr"];
    $beskrivelse = $_POST["beskrivelse"];
    $opplastingsdato = "datepicker";

    $filnavn=$_FILES["bilde"]["name"];
	$filtype=$_FILES["bilde"]["type"];
	$filstorrelse=$_FILES ["bilde"]["size"];
    $tmpnavn=$_FILES ["bilde"]["tmp_name"];
   	$nyttnavn="bilder/".$filnavn;



    $lovligBildenr = validerBildenr($bildenr);
    //$lovligFilnavn = validerFilnavn($filnavn);


//NY
	if (!$bildenr || !$beskrivelse)
    {
        print ("Alle felt må fylles ut og bilde må velges");
    }
    else
    {
    if ($filtype !="image/gif" && $filtype != "image/jpeg" && $filtype != "image/png")
    {
        print ("Det er kun tilatt å laste opp bilder");
    }
    else if ($filstorrelse>9000000)
    {
        print ("Bildet er for stort!");
    }
    else
    {
        include ("databasetilkobling.php");

        $sqlSetning = "SELECT * FROM bilde WHERE bildenr='$bildenr';";
        $sqlResultat = mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data!");
        $antallRader = mysqli_num_rows($sqlResultat);

        if ($antallRader!=0)
        {
            print ("Bildet er allerede registrert!");
        }
        else
        {
            move_uploaded_file($tmpnavn,$nyttnavn) or die ("Ikke mulig å laste opp fila");

            $sqlSetning="INSERT INTO bilde (bildenr,beskrivelse,opplastingsdato,filnavn) VALUES ('$bildenr','$beskrivelse','$opplastingsdato','$filnavn');";
            mysqli_query($db,$sqlSetning) or die ("Det var ikke mulig å registrere data.."); // Bilde registrert i db

            print ("Bilde er nå registrert: <br/> Bildenr: $bildenr <br/> Beskrivelse: $beskrivelse<br/>Opplastingsdato: $opplastingsdato <br/> Filnavn: $filnavn <br/> ");
        }
     }
   }
}
}
include ("lukk.html");
?>


