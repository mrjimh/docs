<script type="text/javascript" language="javascript">
function GetDateTime() {

    var param1 = new Date();
    document.getElementById('txtDateOfIncorporation').value = param1;

}


</script>


  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
  $( "#datepicker" ).datepicker({
  dateFormat: "yy-mm-dd"
});
});
</script>