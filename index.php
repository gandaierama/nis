<html>
<head>
	<title>Cadastre seu NIS</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	<nav class="nav navbar-expand-lg navbar-light bg-light justify-content-center">
	  <li class="nav-item">
	    <a class="nav-link text-dark text-bold" href="/">Desafio Nis - Gesuas/Cientec</a>
	  </li>
	</nav>
	<div class="container mt-5">
		<div class="card card-info card-body bg-secondary text-light">
			<div id="app" class="row">
			  	<div class="col-12 col-md-6 text-left">
			  		<h2>NIS <small class="fs-6">(Número de Identificação Social)</small></h2>
			  		<hr/>
			  		<p>{{ message }}</p>
			  		<p>{{ message2 }}</p>
			  	</div>
			  	<div class="col-12 col-md-6 text-dark">
			  		<div class="card">
			  			<div class="card-header">
							Cadastre aqui
						</div>
			  			<div class="card-body">
			  				<div class="alert alert-danger "  v-bind:class="{ 'd-none': isActive, 'text-danger': hasError }">Digite seu nome corretamente!</div>
			  				<form ref="form" method="POST" action="add.php"><input type="text" value="" id="name" class="form-control form-control-lg" placeholder="Digite seu nome" name="name"></form>
			  				<div class="d-grid gap-2 col-6 mx-auto">
							 	<button class="btn btn-warning" type="button" v-on:click="cadastroSend">Cadastrar</button>
							</div>
			  			</div>
			  		</div>

			  		<div class="card mt-5">
			  			<div class="card-header">
							Já tem cadastro? Veririfique seu NIS.
						</div>
			  			<div class="card-body">
			  				<div class="alert alert-danger "  v-bind:class="{ 'd-none': isActive2, 'text-danger': hasError }">Digite o NIS corretamente!</div>
			  				<form ref="form2" method="POST" action="search.php"><input type="text" value="" id="nis" class="form-control form-control-lg" placeholder="Digite o numero do seu NIS" name="nis"></form>
			  				<div class="d-grid gap-2 col-6 mx-auto">
							 	<button class="btn btn-warning" type="button" v-on:click="buscaSend">Buscar</button>
							</div>
			  			</div>
			  		</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <style>
		body{
			font-family: 'Roboto', sans-serif;
		}
	</style>
    <script>
		window.onload = function () {
			var app = new Vue({
			  el: '#app',
			  data: {
			    message: 'O Número de Identificação Social (NIS) é um registro atribuído pela Caixa Econômica Federal que está relacionado as pessoas que recebem ou não benefícios sociais criados pelo Governo Federal e garante o acesso do trabalhador aos programas sociais do governo, mesmo que ele ainda não tenha nenhum vínculo trabalhista. Esse número é composto por uma sequência numérica de 11 dígitos.',
			    message2: 'O NIS está associado ao PIS (Programa Integração Social), destinado aos trabalhadores do setor privado. Caso uma pessoa que já obteve o NIS pretenda futuramente trabalhar com carteira assinada, usará o mesmo número.',
			    isActive: true,
  				hasError: false,
  				isActive2: true,
  				hasError2: false,
			  },
			  methods: {
			    cadastroSend: function (event) {
			    	event.preventDefault();
			    	let name= document.getElementById("name").value;
			    	let url ="./add.php";
			    	if(name==""){
			    		console.log("vazio");
			    		this.isActive=false;
			    		return{
			    			'd-none': this.isActive
			    		}
			    	}else{
			    		this.$refs.form.submit();
			    	}	
			    },
			    buscaSend: function (event) {
			    	event.preventDefault();
			    	let nis= document.getElementById("nis").value;
			    	let url2 ="./search.php";
			    	if(nis==""){
			    		console.log("vazio");
			    		this.isActive2=false;
			    		return{
			    			'd-none': this.isActive2
			    		}
			    	}else{
			    		this.$refs.form2.submit();
			    	}
			    }
			  }
			})
		}
	</script>
</body>
</html>