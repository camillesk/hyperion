<!DOCTYPE html>
<html>

	<head>
		<title>Lothus - Cadastro de Clientes</title>
		<meta charset="utf-8">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	</head>

	<body>
		<div style="margin:0 auto; margin-top:10px; width:25%; display:table;">
			<div class="dropdown" style="display:table-cell;">
		  		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Clientes
		  		<span class="caret"></span></button>
		  		<ul class="dropdown-menu">
		    		<li><a href="cadastroCliente.php">Cadastrar Cliente</a></li>
		    		<li><a href="listaCliente.php">Lista de Clientes</a></li>
		  		</ul>
			</div> 
			<div class="dropdown" style="display:table-cell;">
		  		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Imóveis
		  		<span class="caret"></span></button>
		  		<ul class="dropdown-menu">
		    		<li><a href="cadastroImovel.php">Cadastrar Imóvel</a></li>
		    		<li><a href="listaImovel.php">Lista de Imóveis</a></li>
		  		</ul>
			</div> 
			<div class="dropdown" style="display:table-cell;">
		  		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Financiamentos
		  		<span class="caret"></span></button>
		  		<ul class="dropdown-menu">
		    		<li><a href="cadastroSimu.php">Simulação</a></li>
		    		<li><a href="listaSimu.php">Lista de Financiamentos</a></li>
		  		</ul>
			</div> 
		</div>
		<h2 style="text-align: center;"> Cadastro de Clientes </h2><br>
		<form action="salvaCliente.php" method="post" style="width: 25%; margin: 0 auto;">
			 	<div class="form-group">
					<label for="nome">Nome:</label>
			    	<input type="text" class="form-control" id="nome" name="nome">
			  	</div>

			  	<div class="form-group">
			    	<label for="cpf">CPF:</label>
			    	<input type="text" class="form-control" id="cpf" name="cpf">
			  	</div>

			  	<div class="form-group">
			    	<label for="idade">Idade:</label>
			    	<input type="number" class="form-control" id="idade" name="idade">
			  	</div>

			  	<div class="form-group">
			    	<label for="renda">Renda:</label>
			    	<input type="float" class="form-control" id="renda" name="renda">
			  	</div>

			  	<button type="submit" class="btn btn-default">Cadastrar</button>
		</form> 
	</body>

</html>