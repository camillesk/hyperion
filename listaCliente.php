<?php

$servername = "localhost";
$username = "root";
$password = "usbw";
$database = "hyperion";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = sprintf("SELECT * FROM cliente");

$result = mysqli_query($conn, $query) or die(mysql_error());

//rows de resultado
$row = mysqli_fetch_assoc($result);

//
$total = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>

	<head>
		<title>Lothus - Lista de Clientes</title>
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
		<h2 style="text-align: center;">Lista de Clientes</h2>
		<table class="table table-hover" style="width: 80%; margin: 0 auto;">
			<tr>
				<th>Nome</th>
				<th>CPF</th>
				<th>Idade</th>
				<th>Renda</th>
				<th></th>
			</tr>
			<?php
			// se o número de resultados for maior que zero, mostra os dados
			if($total > 0) {
				// inicia o loop que vai mostrar todos os dados
				do {
			?>
					<tr>
						<td style="vertical-align:middle;"><?=$row['Nome_Cliente']?></td>
						<td style="vertical-align:middle;"><?=$row['CPF']?></td>
						<td style="vertical-align:middle;"><?=$row['Idade']?></td>
						<td style="vertical-align:middle;"><?=$row['Renda']?></td>
						<td style="vertical-align:middle;"><a class="btn btn-sm btn-danger" href="deleteCliente.php?cpf=<?php echo $row['CPF']; ?>">Excluir</a></td>
					</tr>
			<?php
				// finaliza o loop que vai mostrar os dados
				}while($row = mysqli_fetch_assoc($result));
			// fim do if 
			}

			mysqli_close($conn);
			?>
		</table>
	</body>

</html>