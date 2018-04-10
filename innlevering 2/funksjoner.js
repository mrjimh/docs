/* Javascript*/


/* Justin Case box */
function bekreft()
{
    return confirm ("Er du sikker du vil dette?");
}

/*Registrer av nye klasser validering */
function validerRegistrerKlasseSkjema()
{
    var klassekode=document.getElementById("klassekode").value;
    var klassenavn=document.getElementById("klassenavn").value;

    var lovligKlassekode=validerKlassekode(klassekode);
    var lovligKlassenavn=validerKlassenavn(klassenavn);

    var feilmelding="";

    if (!klassekode)
    {
       lovligKlassekode=false;
       feilmelding=feilmelding + "FEIL! Bruk følgende format eks: AB3<br/>";
    }
    if (!klassenavn)
    {
        lovligKlassenavn=false;
        feilmelding=feilmelding + "Klassenavn mangler<br/>";
    }
    if (strlen(klassekode)<3)
    {
        lovligKlassekode=false;
        feilmelding=feilmelding + "Klassekode har for fåå tegn";
    }
    if (!ctype_upper(substr(klassekode, 0, -1)))
    {
        lovligKlassekode=false;
        feilmelding=feilmelding + "Feil! Klassekode må ha to store bokstaver og ett tall.";
    }
    if (!is_numeric(substr(klassekode, -1)))
    {
        lovligKlassekode=false;
        feilmelding=feilmelding + "Tall mangler i klassekoden";
    }
    if (lovligKlassekode && lovligKlassenavn)
    {
        return true;
    }
    else
    {
        document.getElementById("melding").style.color="red";
        document.getElementById("melding").innerHTML=feilmelding;
        return false;
    }
}

/* Registrering av studenter - Validering*/
function validerRegistrerStudentSkjema()
{
    var brukernavn=document.getElementById("brukernavn").value;
    var fornavn=document.getElementById("fornavn").value;
    var etternavn=document.getElementById("etternavn").value;
    var klassekode=document.getElementById("klassekode").value;

    var lovligKlassekode=validerKlassekode(klassekode);

    var feilmelding="";

    if (!brukernavn)
    {
       feilmelding=feilmelding + "Brukernavn er feil </br>";
    }
    if (!lovligKlassekode)
    {
       feilmelding=feilmelding + "Klassekoden er feil <br/>";
    }
    if (!fornavn)
    {
        feilmelding=feilmelding + "Fornavn er feil eller mangler <br/>";
    }
    if (!etternavn)
    {
        feilmelding=feilmelding + "Etternavn mangler <br/>";
    }
    if (brukernavn && fornavn && etternavn && lovligKlassekode)
    {
        return true;
    }
    else
    {
        document.getElementById("melding").style.color="orange";
        document.getElementById("melding").innerHTML=feilmelding;
        return false;
    }
}

/* Fokuselement */
function fokus(element)
{
    element.style.background="#f9dea2";
}

function mistetFokus(element)
{
    element.style.background="#fff";
}

function musInn(element)
{
    document.getElementById("melding").style.color="#00000";
    if (element==document.getElementById("klassekode"))
    {
        document.getElementById("melding").innerHTML="F.eks. på klassekode: AB3 ";
    }
    if (element==document.getElementById("klassenavn"))
    {
        document.getElementById("melding").innerHTML="F.eks. IT og informasjonssystemer 1. år";
    }
    if (element==document.getElementById("fornavn"))
    {
        document.getElementById("melding").innerHTML="Ditt fornavn";
    }
    if (element==document.getElementById("etternavn"))
    {
        document.getElementById("melding").innerHTML="Ditt etternavn";
    }
    if (element==document.getElementById("brukernavn"))
    {
        document.getElementById("melding").innerHTML="F.eks: JH";
    }

}

function musUt(element)
{
    document.getElementById("melding").innerHTML="";
}

function endreTilStoreBokstaver(element)
{
    element.value=element.value.toUpperCase();
}

function fjernMelding()
{
    document.getElementById("melding").innerHTML="";
}

/*Registrer bilde validering */
function validerRegistrerBildeSkjema()
{
    var bildenr=document.getElementById("bildenr").value;
    var opplastingsdato=document.getElementById("opplastingsdato").value;
    var filnavn=document.getElementById("filnavn").value;

    var lovligBildenr=validerBildenr(bildenr);
    var lovligOpplastingsadto=validerOpplastingsdato(opplastingsdato);
    var lovligFilnavn=validerFilnavn(filnavn);

    var feilmelding="";

    if (!bildenr)
    {
       lovligBildenr=false;
       feilmelding=feilmelding + "FEIL! Bruk følgende format eks: AB3<br/>";
    }
    if (!opplastingsdato)
    {
        lovligOpplastingsdato=false;
        feilmelding=feilmelding + "Opplastingsdato mangler<br/>";
    }
    if (strlen(bildenr)<3)
    {
        lovligBildenr=false;
        feilmelding=feilmelding + "Bildenr har for fåå tegn";
    }
    if (!ctype_upper(substr(bildenr, 0, -1)))
    {
        lovligBildenr=false;
        feilmelding=feilmelding + "Feil! Bildenr må ha to store bokstaver og ett tall.";
    }
    if (!is_numeric(substr(bildenr, -1)))
    {
        lovligBildenr=false;
        feilmelding=feilmelding + "Tall mangler i klassekoden";
    }
    if (lovligBildenr && lovligOpplastingsdato && lovligFilnavn)
    {
        return true;
    }
    else
    {
        document.getElementById("melding").style.color="red";
        document.getElementById("melding").innerHTML=feilmelding;
        return false;
    }
}