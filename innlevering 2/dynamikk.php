<?php
function listeboksKlassekode ($registrertKlassekode)
{
    include ("databasetilkobling.php");

    $sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Fikk ikke hentet informasjon fra databasen!");

    $antallRader=mysqli_num_rows($sqlResultat);

    for ($t=1;$t<=$antallRader;$t++)
    {
        $rad=mysqli_fetch_array($sqlResultat);
        $klassekode=$rad["klassekode"];
        $klassenavn=$rad["klassenavn"];

		if ($registrertKlassekode == $klassekode)
		{
				print ("<option value='$klassekode' selected >$klassekode $klassenavn </option>");
		}

		else {
				print ("<option value='$klassekode'>$klassekode $klassenavn </option>");
			}
     }
}

/* Brukernavn lista */
function listeboksBrukernavn()
{
    include("databasetilkobling.php");


    $sqlSetning="SELECT * FROM student ORDER BY brukernavn;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Fikk ikke hentet informasjon fra databasen!");

    $antallRader=mysqli_num_rows($sqlResultat);

    for ($t=1;$t<=$antallRader;$t++)
    {
        $rad=mysqli_fetch_array($sqlResultat);
        $brukernavn=$rad["brukernavn"];
        $fornavn=$rad["fornavn"];
        $etternavn=$rad["etternavn"];
        $klassekode=$rad["klassekode"];

        print ("<option value='$brukernavn'>$brukernavn $fornavn $etternavn $klassekode </option>");
    }
}


function listeboksBildenr ($registrertBildenr)
{
    include ("databasetilkobling.php");

    $sqlSetning="SELECT * FROM bilde ORDER BY bildenr;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Fikk ikke hentet informasjon fra databasen!");

    $antallRader=mysqli_num_rows($sqlResultat);

    for ($t=1;$t<=$antallRader;$t++)
    {
        $rad=mysqli_fetch_array($sqlResultat);
        $bildenr=$rad["bildenr"];
        $filnavn=$rad["filnavn"];

		if ($registrertBildenr == $bildenr)
		{
				print ("<option value='$bildenr' selected >$bildenr $filnavn </option>");
		}

		else {
				print ("<option value='$bildenr'>$bildenr $filnavn </option>");
			}
     }
}

