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
}
?>

<h2>Søk etter informasjon</h2>
 <html lang="en">
 <meta charset="UTF=8">


<form method="post" action="" id="sokeSkjema" name="sokeSkjema">
    <input type="text" id="sokestreng" name="sokestreng" required/> <br/>
    <input type="submit" value="Fortsett" id="sokeKnapp" name="sokeKnapp"/>
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/> <br/>
</form>

<?php
/* Søk i klassetabell*/
if (isset($_POST ["sokeKnapp"]))
    {
      $sokestreng=$_POST ["sokestreng"];
      include("databasetilkobling.php");
      print ("</br></br><h3>Resultat av <strong>$sokestreng:</strong></h3><br/>");
      $sqlSetning="SELECT * FROM klasse WHERE klassekode LIKE '%$sokestreng%' OR klassenavn LIKE '%$sokestreng%';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Feil! Fikk ikke hentet data fra database!");
      $antallRader=mysqli_num_rows($sqlResultat);

      if ($antallRader==0)
        {
          print ("</br><bold>Funn i tabellen KLASSE:</bold></br> Ingen treff!</br>");
        }
      else
        {
          print ("Funn i tabellen KLASSE: <br/><br/>");
          print ("<table border=2 align=center>");
          print ("<tr><th>Klassekode / Klassenavn</th> </tr>");

          for ($t=1;$t<=$antallRader;$t++)
            {
              $rad=mysqli_fetch_array($sqlResultat);
              $klassekode=$rad["klassekode"];
              $klassenavn=$rad["klassenavn"];

              $sokestrenglengde=strlen($sokestreng);

              print("<tr><td>");
              $tekst="$klassekode - $klassenavn";
              $startpos=stripos($tekst,$sokestreng);

              while ($startpos!==false)
                {
                  $tekstlengde=strlen($tekst);

                  $hode=substr($tekst,0,$startpos);
                  $sok=substr($tekst,$startpos,$sokestrenglengde);
                  $hale=substr($tekst,$startpos+$sokestrenglengde,$tekstlengde-$startpos-$sokestrenglengde);

                  print("$hode<strong>$sok</strong>");

                  $tekst=$hale;
                  $startpos=stripos($tekst,$sokestreng);
                }
              print("$hale </td></tr>");
            }
          print ("</table></br/>");
        }

      /*Søk i STUDENT*/
      $sqlSetning="SELECT * FROM student WHERE brukernavn LIKE '%$sokestreng%' OR fornavn LIKE '%$sokestreng%' OR etternavn LIKE '%$sokestreng%' OR klassekode LIKE '%$sokestreng%';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
      $antallRader=mysqli_num_rows($sqlResultat);

      if ($antallRader==0)
        {
          print ("</br>Funn i tabellen STUDENT:</br> Ingen treff!</br>");
        }
      else
        {
          print ("<br/>Funn i tabellen STUDENT: <br/><br/>");
          print ("<table border=2 align=center>");
          print ("<tr><th>Brukernavn / Fornavn / Etternavn / Klassekode </th></tr>");

          for ($r=1;$r<=$antallRader;$r++)
            {
              $rad=mysqli_fetch_array($sqlResultat);
              $brukernavn=$rad["brukernavn"];
              $fornavn=$rad["fornavn"];
              $etternavn=$rad["etternavn"];
              $klassekode=$rad["klassekode"];

              $sokestrenglengde=strlen($sokestreng);

              print("<tr> <td>");
              $tekst="$brukernavn - $fornavn - $etternavn - $klassekode";
              $startpos=stripos($tekst,$sokestreng);

              while ($startpos!==false)
                {
                  $tekstlengde=strlen($tekst);

                  $hode=substr($tekst,0,$startpos);
                  $sok=substr($tekst,$startpos,$sokestrenglengde);
                  $hale=substr($tekst,$startpos+$sokestrenglengde,$tekstlengde-$startpos-$sokestrenglengde);

                  print("$hode<strong>$sok</strong>");

                  $tekst=$hale;
                  $startpos=stripos($tekst,$sokestreng);
                }
                print("$hale </td> </tr>");
            }
          print ("</table> </br />");
        }
    }
include ("lukk.html");
?>