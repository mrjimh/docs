<?php
session_start();
@$innloggetBruker=$_SESSION["brukernavn"];
if (!$innloggetBruker)
{
	print("Denne siden krever innlogging! <br />");
	print ("<a href='innlogging.php'>Til innloggingsside </a>");

}
else
{
	include("forside.html");
	print("<h3>Velkommen, $innloggetBruker! </h3>");
	print("</br><h4>Vennligst velg funksjoner i menyen til venstre.</h4>");
	include("lukk.html");
}
?>

