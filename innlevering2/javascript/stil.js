function fokus(element)
{
element.style.background="yellow";
}


function ikkeFokus(element)
{
element.style.background="white";

}




function musOver(element)
{
document.getElementById("melding").style.color="blue";
if (element==document.getElementById("kode"))
  {
    document.getElementById("melding").innerHTML="Tast inn klassekode - 3 tegn";
  }
else if (element==document.getElementById("navn"))
  {
    document.getElementById("melding").innerHTML="FFyll inn ditt navn";
  }
}


function musAv()
{
document.getElementById("melding").innerHTML="";
}
