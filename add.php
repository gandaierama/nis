<html>
<head>
	<title>Add Data</title>
</head>
<body>
<?php
include_once("config.php");
if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$age = $_POST['age'];
	$email = $_POST['email'];
		
	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>Opssss.. esqueceu o nome.</font><br/>";
		}
		if(empty($age)) {
			echo "<font color='red'>Opssss.. esqueceu a idade.</font><br/>";
		}
		if(empty($email)) {
			echo "<font color='red'>Opssss.. esqueceu o e-mail.</font><br/>";
		}
		echo "<br/><a href='javascript:self.history.back();'>Voltar</a>";
	} else { 
		$sql = "INSERT INTO users(name, age, email) VALUES(:name, :age, :email)";
		$query = $dbConn->prepare($sql);		
		$query->bindparam(':name', $name);
		$query->bindparam(':age', $age);
		$query->bindparam(':email', $email);
		$query->execute();
		echo "<font color='green'>Adicionado com sucesso!!!.";
		echo "<br/><a href='index.php'>Ver NIS cadastrados</a>";
	}
}
?>
</body>
</html>
