<!DOCTYPE html>

<head>
	<title>Vis alle klasser</title>
	<html lang="no">
	<meta charset="utf-8">
</head>

<body>
	<h2>Alle skoleklasser</h2>
	<table style="border-collapse: expand" border="2">
	<tbody>
		<tr>
		<th width="100px"> <h4>Klassekode</h4></th>
		<th width="250px"> <h4>Klassenavn</h4></th>
		</tr>

		<tr>
		<td width="200px">
			<?php
				$klassefilen = file('filer/klasse.txt');
				$klassefilen = array_filter($klassefilen);
				foreach($klassefilen AS $row)
				{
					$klasse[]=explode(';',$row);
				}
			?>

		</td>
		<td width="250px">
			<?php
				$teller = count($klasse);
				for($i=0; $i<$teller; $i++)
				{
					echo '<tr><td>'. $klasse[$i][0]. "</td><td>". $klasse[$i][1]. "</td></tr>";
				}
			?>
</body>
