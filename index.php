<?php
include_once("config.php");
$result = $dbConn->query("SELECT * FROM nis ORDER BY id DESC");
?>
<html>
<head>	
	<title>Desafio NIS</title>
</head>
<body>
<a href="add.html">NIS (Número de Identificação Social) </a><br/><br/>
	<table width='80%' border=0>
	<tr bgcolor='#CCCCCC'>
		<td>Nome</td>
		<td>Idade</td>
		<td>NIS</td>
		<td>Update</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['age']."</td>";
		echo "<td>".$row['nis']."</td>";	
		echo "<td><a href=\"edit.php?id=$row[id]\">Editar</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Tem certeza?')\">Apagar</a></td>";		
	}
	?>
	</table>
</body>
</html>
