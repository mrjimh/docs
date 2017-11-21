function registrerKlasseJs() {
    var kode = document.forms["klasse"]["kode"].value;
    if (kode == "") {
        alert("KLASSEKODE MANGLER");
		
        return false;
    }
	
	var navn = document.forms["klasse"]["navn"].value;
	if (navn == "") {
	alert("NAVN MANGLER");

      return false;
    }
}
