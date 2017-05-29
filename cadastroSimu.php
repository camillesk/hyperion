<?php

$servername = "localhost";
$username = "root";
$password = "usbw";
$database = "hyperion";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//select's para mostrar nos selects os dados que existem no database

$select1 = mysqli_query($conn, "SELECT CPF, Nome_Cliente FROM cliente");

$select2 = mysqli_query($conn, "SELECT Codigo_Imovel, Nome_Imovel FROM imovel");

?>

<!DOCTYPE html>
<html>

	<head>
		<title>Lothus - Simulação</title>
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
		<h2 style="text-align: center;"> Simulação </h2><br>
		<form action="salvaSimu.php" method="post" style="width: 25%; margin: 0 auto;">
			 	<div class="form-group">
					<label for="nome">Cliente:</label>
			    	<select class="form-control" id="sel1" name="sel1">
			    		<option selected="selected" value="default">Escolha um cliente</option>
			    		<?php 
							//passa dos dados para options do select
							while ($row = mysqli_fetch_assoc($select1)){
							echo "<option value=".$row['CPF'].">" . $row['Nome_Cliente'] . "</option>";
							}
						?>
			    	</select>
			  	</div>

			  	<div class="form-group">
			    	<label for="unidade">Imóvel:</label>
			    	<select class="form-control" id="sel2"  name="sel2">
			    	<option selected="selected">Escolha um imóvel</option>
			    		<?php 
							//passa dos dados para options do select
							while ($row = mysqli_fetch_assoc($select2)){
							echo "<option value=".$row['Codigo_Imovel'].">" . $row['Nome_Imovel'] . "</option>";
							}
						?>
			    	</select>
			  	</div>

			  	<div class="form-group">
			    	<label for="preco">Número de parcelas:</label>
			    	<select class="form-control" id="sel3"  name="sel3">
			    		<option selected="selected">Escolha uma parcela</option>
			    		<option value="1">1x</option>
			    		<option value="3">3x</option>
			    		<option value="5">5x</option>
			    		<option value="10">10x</option>
			    		<option value="12">12x</option>
			    		<option value="24">24x</option>
			    		<option value="36">36x</option>
			    		<option value="48">48x</option>
			    	</select>
			  	</div>

			  	<button type="submit" class="btn btn-default">Cadastrar</button>
		</form> 
	</body>

</html>