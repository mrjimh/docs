<?php
session_start();
@$innloggetBruker=$_SESSION["brukernavn"];
if (!$innloggetBruker)
{
	print("<br />");

}
else
{
include("forside.html");
}
?>



<link rel="stylesheet" type="text/css" href="style.css"/>

<div id="box1">
<h2>Velkommen</h2>
<h4>Denne applikasjonen gir deg tilgang til visning, endring, sletting og registrering av databaseinformasjon.</br>
<?php
if ($innloggetBruker)
{
	print("</br><h4>Vennligst velg funksjoner i menyen til venstre.</h4>");
}

else
{
print("</br>Logg inn for benyttelse av denne applikasjonen!<br /><br />");

print ("<a href='innlogging.php'>G&aring; til innloggingsside </a>");
}
?>
</div>



