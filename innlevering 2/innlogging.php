<?php /* innlogging */
?>
<link rel="stylesheet" type="text/css" href="style.css"/>

<h2>Innlogging</h2>
<h4>Vedlikeholdsapplikasjon - Obligatorisk innlevering 2 - PRG1100V</h4>
<form action="" id="innloggingSkjema" name="innloggingSkjema" method="post">
Brukernavn <input name="brukernavn" type="text" id="brukernavn"> <br />
Passord <input name="passord" type="password" id="passord" > <br />
<input type="submit" name="logginnKnapp" value="Logg inn">
<input type="reset" name="nullstill" id="nullstill" value="Nullstill"> <br />
</form>
Ny bruker? <br />
<a href="registrer-bruker.php">Registrer deg</a>
<?php
if (isset($_POST ["logginnKnapp"]))
{
include("sjekk.php");
$brukernavn=$_POST ["brukernavn"];
$passord=$_POST["passord"];
if (!sjekkBrukernavnPassord($brukernavn,$passord)) /* brukernavn og passord er ikke korrekt */
{
print("Feil brukernavn/passord <br />");
}
else /* brukernavn og passord er korrekt */
{
session_start();
$_SESSION["brukernavn"]=$brukernavn; /* brukernavn lagt inn i session-variabelen */
print("<meta http-equiv='refresh' content='0;url=hoved.php'>");
/* redirigering til hoved-siden (hoved.php) */ }
}
?>