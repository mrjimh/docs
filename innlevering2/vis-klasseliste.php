<html>
<head>
	<html lang="no">
	<meta charset="utf-8">
	<title>Vis klasseliste</title>
</head>
<body>

<h2>Vis klasseliste</h2>

<form action="#" method="POST">
 	<label for="klasseliste"> Klassekode: </label><input id="klassekode" name="klassekode" type="text" required><br />
	<input name="submit" type="submit" value="Søk">
	<input name="reset" type="reset" value="Nullstill">
</form>

<?php
	if(isset($_POST["submit"]))
	{
		 $klassekode = $_POST["klassekode"];
		 $data = file('filer/student.txt');
		 $data = array_filter($data);
		 foreach($data AS $row){
		 $student[] = explode(';', $row);
	 }
?>


<h2>Resultat av søket:</h2>
	<table style="border-collapse: expand" border="2">
		<tbody>
			<tr>
				<th width="100px"> <h4>brukernavn</h4></th>
				<th width="100px"> <h4>fornavn</h4></th>
				<th width="100px"> <h4>etternavn</h4></th>
				<th width="100px"> <h4>klassekode</h4></th>
			</tr>
			<?php
				$teller=count($student);
				for ($i = 0; $i < $teller; $i++)
				{
					if($klassekode==trim($student[$i][3]))
					{
						print('<tr><td>'.$student[$i][0]."</td><td>".$student[$i][1]."</td><td>".$student[$i][2]."</td><td>".$student[$i][3]."</td></tr>");
					}
				}

			}
			?>
		</tbody>
	</table>
</body>
</html>