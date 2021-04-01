<html>
<head>
	<title>Cadastre seu NIS</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

</head>
<body>
	<nav class="nav navbar-expand-lg navbar-light bg-light justify-content-center">
	  <li class="nav-item">
	    <a class="nav-link text-black" href="/">Desafio Nis</a>
	  </li>
	</nav>
	<div class="container mt-5">
		<div class="card card-info card-body">
			<div id="app" class="row">
			  	<div class="col-12 ">
			  		<div class="card">
			  			<div class="card-body">
			  				<?php
							include_once("config.php");
							if(isset($_POST['name'])) {	
								$name = $_POST['name'];
								$date = new DateTime();
								$timestamp=$date->getTimestamp();
								$nis=rand(1,9).$timestamp;
								
								if(empty($name)) {
									echo "<font color='red'>Opssss.. esqueceu o nome.</font><br/>";
									echo "<br/><a href='javascript:self.history.back();'>Voltar</a>";
								} else { 

									$sqlC = "SELECT name, nis FROM nis  WHERE name='".$name."' LIMIT 1";
									$queryC = $dbConn->prepare($sqlC);
									$queryC->execute();
									$res=$queryC->fetchAll();

									if(isset($res[0]["name"])){
										echo "";
										?>
											<div class="alert alert-danger text-center">
												<h3 color='red'>Este nome já consta em nosso cadastro</h3>
												<hr/>
												<h4>
													<?=$name?><br/>
													<b>Nº NIS: <?=$res[0]["nis"]?></b>
												</h4>
											</div>
											<div class="d-grid gap-2 col-6 mx-auto">
											 	<a class="btn btn-info" href="/">Voltar</a>
											</div>
										<?php
									}else{
										$sql = "INSERT INTO nis(name, nis) VALUES(:name, :nis)";
										$query = $dbConn->prepare($sql);		
										$query->bindparam(':name', $name);
										$query->bindparam(':nis', $nis);
										$query->execute();
										?>
											<div class="alert alert-success text-center ">
												<h3 color='green'>Cadastro efetuado copm sucesso</h3>
												<hr/>
												<h4>
													<?=$name?><br/>
													<b>>Nº NIS: <?=$nis?></b>
												</h4>
											</div>
											<div class="d-grid gap-2 col-6 mx-auto">
											 	<a class="btn btn-info" href="/">Voltar</a>
											</div>
										<?php
									
									}

									
								}
							}
							?>
			  			</div>
			  		</div>
				</div>
			</div>
		</div>
	</div>
	<style>
		body{
			font-family: 'Roboto', sans-serif;
		}
	</style>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</body>
</html>

