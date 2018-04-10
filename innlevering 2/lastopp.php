<div id="melding"></div>
<?php
$lovligBildenr = $lovligFilnavn = $bildenr = $opplastingsdato = $filnavn = "";
   include ("validering.php");
if (isset($_POST["registrerBildeKnapp"]))
{

    $bildenr = $_POST["bildenr"];
    $opplastingsdato = $_POST["opplastingsdato"];
    $filnavn = $_POST["filnavn"];

    $lovligBildenr = validerBildenr($bildenr);
    $lovligFilnavn = validerFilnavn($filnavn);


        if($lovligBildenr && $lovligFilnavn)
        {
        include ("databasetilkobling.php");

        $sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Feil! Kunne ikke hente data fra databasen!");
        $antallRader=mysqli_num_rows($sqlResultat);

        if ($antallRader!=0)
        {
            print ("Bilde er allerede registrert!!");
        }
        else
        {
            $sqlSetning="INSERT INTO bilde (bildenr,opplastingsdato,filnavn, beskrivelse) VALUES ('$bildenr','$opplastingsdato','$filnavn','$beskrivelse');";
            mysqli_query($db,$sqlSetning) or die ("Kunne ikke registrere bilde i databasen!!");

            print ("Bilde er nå registrert: <br/> Bilde: $bildenr <br/> Opplastingsdato: $opplastingsdato <br/> Filnavn: $filnavn");
        }
    }
}
include ("lukk.html");
?>

<?php
$target_dir = "bilder/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["bildenr"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>
<?php
$target_dir = "bilder/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>