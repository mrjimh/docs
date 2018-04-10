<?php
/* Valedering */
function validerKlassekode($klassekode)
{
  $lovligKlassekode=true;
  if(!$klassekode)
  {
    $lovligKlassekode=false;
    print ("Klassekoden må fylles ut!!");
  }
  else if(strlen($klassekode)<3)
  {
    $lovligKlassekode=false;
    print ("Klassekoden skal ha TO bokstaver og ETT siffer - totalt 3 tegn!");
  }
  else if(!ctype_upper(substr($klassekode, 0, -1)))
  {
    $lovligKlassekode=false;
    print ("Klassekoden skal ha 2 store bokstaver og et siffer.");
  }
  else if(!is_numeric(substr($klassekode, -1)))
  {
    $lovligKlassekode=false;
    ("Det siste symboler er ikke et siffer!!");
  }
  else
  {
    return true;
  }
}

function validerKlassenavn($klassenavn){
  $lovligKlassenavn=true;
  if(!$klassenavn)
  {
    $lovligKlassenavn=false;
    ("Fyll ut klassenavn!");
  }
  else
  {
    return true;
  }
}


function validerBildenr($bildenr)
{
  $lovligBildenr=true;
  if(!$bildenr)
  {
    $lovligBildenr=false;
    print ("Bildenr må fylles ut!!");
  }
  else if(strlen($bildenr)<3)
  {
    $lovligBildenr=false;
    print ("Bildenr skal ha TRE tall - totalt 3 tegn!");
  }
  /*else if(strlen($bildenr) 0, -1)
  {
    $lovligBildenr=false;
    print ("Bildenr skal ha 3 siffer.");
  }*/
  else if(!is_numeric(substr($bildenr, -1)))
  {
    $lovligBildenr=false;
    ("Det siste symboler er ikke et siffer!!");
  }
  else
  {
    return true;
  }
}







function validerFilnavn($filnavn){
  $lovligFilnavn=true;
  if(!$filnavn)
  {
    $lovligFilnavn=false;
    ("Fyll ut filnavn!");
  }
  else
  {
    return true;
  }
}









?>