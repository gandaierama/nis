<html>
<head>
	<title>Busque seu NIS</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	<nav class="nav navbar-expand-lg navbar-light bg-light justify-content-center">
	  <li class="nav-item">
	    <a class="nav-link text-dark text-bold" href="/">Desafio Nis - Gesuas/Cientec</a>
	  </li>
	</nav>
	<div class="container mt-5">
		<div class="card card-info card-body">
			<div id="app" class="row">
			  	<div class="col-12 ">
			  		<div class="card bg-secondary">
			  			<div class="card-body text-center">
			  					<h3 class="text-light">Busca</h3>
			  					<hr/>
			  				<?php
							include_once("config.php");
							if(isset($_POST['nis'])) {	
								$nis = $_POST['nis'];
								
								if(empty($nis)) {
									echo "<font color='red'>Opssss.. esqueceu o nome.</font><br/>";
									echo "<br/><a href='javascript:self.history.back();'>Voltar</a>";
								} else { 
									$sqlC = "SELECT name, nis FROM nis  WHERE nis='".$nis."' LIMIT 1";
									$queryC = $dbConn->prepare($sqlC);
									$queryC->execute();
									$res=$queryC->fetchAll();
									if(isset($res[0]["name"])){
										?>
											<div class="alert alert-success text-center">
												<h3 color='red'>Encontramos seu NIS</h3>
												<hr/>
												<h4>
													<?=$res[0]["name"]?><br/>
													<b>Nº NIS: <?=$res[0]["nis"]?></b>
												</h4>
											</div>
											<div class="d-grid gap-2 col-6 mx-auto">
											 	<a class="btn btn-warning" href="/">Voltar</a>
											</div>
										<?php
									}else{
							
										?>
											<div class="alert alert-danger text-center ">
												<h3 color='green'>Não encontramos em nosso cadastro nenhum NIS com essa numaração.</h3>
												<h5><?=$nis?></h5>
												<hr/>
												<b>
													Verifique se digitou corretamente ou volte e faça seu cadastro.

												</b>
											</div>
											<div class="d-grid gap-2 col-6 mx-auto">
											 	<a class="btn btn-warning" href="/">Voltar e cadastrar</a>
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

