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

<h2>Endre klasser</h2>
 <html lang="en">
 <meta charset="UTF=8">
<form method="post" action="" id="endreKlasseSkjema" name="endreKlasseSkjema">
    Klasse <select name="klassekode" id="klassekode">
        <?php include ("dynamikk.php"); listeboksKlassekode();?>
    </select><br/>
    <input type="submit" value=" Finn klassen " name="finnKlasseKnapp" id="finnKlasseKnapp">
</form>

<?php
if (isset($_POST["finnKlasseKnapp"]))
{
    include("databasetilkobling.php");
    $klassekode=$_POST["klassekode"];

    $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Det var ikke mulig å endre databasen!");

    $rad=mysqli_fetch_array($sqlResultat);
    $klassenavn=$rad["klassenavn"];

    print ("<br/>");
    print ("<form method='post' action='' id='endreKlasseSkjema' name='endreKlasseSkjema'>");
    print ("Klassekode <input type='text' value='$klassekode' name='klassekode' id='klassekode'readonly/><br/>");
    print ("Klassenavn <input type='text' value='$klassenavn' name='klassenavn' id='klassenavn' required/><br/>");
    print ("<input type='submit' value='Endre klasse' name='endreKlasseKnapp' id='endreKlasseKnapp'>");
    print ("</form>");
}
if (isset($_POST["endreKlasseKnapp"]))
{
    $klassekode=$_POST["klassekode"];
    $klassenavn=$_POST["klassenavn"];

    if (!$klassekode || !$klassenavn)
    {
        print ("Fyll ut alle feltene!");
    }
    else
    {
        include ("databasetilkobling.php");

        $sqlSetning="UPDATE klasse SET klassenavn='$klassenavn' WHERE klassekode='$klassekode';";
        mysqli_query($db,$sqlSetning) or die ("</br></br>Databasen kunne ikke endres!");

        print ("</br></br>Klassen med klassekode $klassekode er blitt endret!<br/>");
    }
}
}
include ("lukk.html");
?>