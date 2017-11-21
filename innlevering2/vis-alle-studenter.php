<html>

<head>
<title>Vis alle studenter</title>
</head>

<body>
	<h2>Alle studenter</h2>
	<table style="border-collapse: expand" border="2">
	<tbody>
		<tr>
			<th width="100px"> <h4>brukernavn</h4></th>
			<th width="100px"> <h4>fornavn</h4></th>
			<th width="100px"> <h4>etternavn</h4></th>
			<th width="100px"> <h4>klassekode</h4></th>
		</tr>

		<?php
			$studentfilen = file('filer/student.txt');
			$studentfilen = array_filter($studentfilen);
			foreach($studentfilen AS $row)
			{
				$student[]=explode(';',$row);
			}
		?>

		<?php
			$teller = count($student);
			for($i=0; $i<$teller; $i++)
			{
				echo '<tr><td>'.$student[$i][0]."</td><td>".$student[$i][1]."</td><td>".$student[$i][2]."</td><td>".$student[$i][3]."</td></tr>";
			}
		?>

	</tbody>
	</table>
</body>
</html>
