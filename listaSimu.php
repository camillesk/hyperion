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

$query = "SELECT *
			FROM financiamento
			LEFT JOIN imovel ON financiamento.Codigo_Imovel = imovel.Codigo_Imovel
			LEFT JOIN cliente ON financiamento.CPF = cliente.CPF";



$result = mysqli_query($conn, $query) or die(mysql_error());

$row = mysqli_fetch_assoc($result);

$total = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>

	<head>
		<title>Lothus - Lista de Financiamentos</title>
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
		<h2 style="text-align: center;">Lista de Financiamentos</h2>
		<table class="table table-hover" style="width: 80%; margin: 0 auto;">
			<tr>
				<th style="text-align:center;">Cliente</th>
				<th style="text-align:center;">Imóvel</th>
				<th style="text-align:center;">Entrada</th>
				<th style="text-align:center;">Subsídio</th>
				<th style="text-align:center;">Juros</th>
				<th style="text-align:center;">Quantidade de Parcelas</th>
				<th style="text-align:center;">Status</th>
				<th style="text-align:center;"></th>
				<th style="text-align:center;"></th>
				<th></th>
			</tr>
			<?php
			// se o número de resultados for maior que zero, mostra os dados
			if($total > 0) {
				// inicia o loop que vai mostrar todos os dados
				do {
			?>
					<tr>
						<td style="text-align:center; vertical-align:middle;"><?=$row['Nome_Cliente']?></td>
						<td style="text-align:center; vertical-align:middle;"><?=$row['Nome_Imovel']?></td>
						<td style="text-align:center; vertical-align:middle;"><?=$row['Entrada']?></td>
						<td style="text-align:center; vertical-align:middle;"><?=$row['Subsidio']?></td>
						<td style="text-align:center; vertical-align:middle;"><?=$row['Juros']?></td>
						<td style="text-align:center; vertical-align:middle;"><?=$row['Qtd_Parcelas']?></td>
						<td style="text-align:center; vertical-align:middle;"><?=$row['Status']?></td>
						<!-- caso o status seja simulação, é criada a opção de alterar o status para aceito ou não aceito -->
						<?php if( $row['Status'] == 'SIMULACAO'){
							$cod = $row['Codigo_Finan'];
							echo"<form method='post' action='atualizaSimu.php'>
									<td style='text-align:center;'><input value='$cod' id='cod' name='cod' style='display:none'></input></td>
									<td style='text-align:center;'>
										<select class='form-control' id='status' name='status'>
											<option value='A' >Aceito</option>
											<option value='N' >Não Aceito</option>
										</select>
									</td>
									<td style='text-align:center;'>
										<button class='btn btn-warning' type='submit' >Salvar</button>
									</td>
								</form>";
						}else
							echo "<td></td><td></td><td></td>"; ?>
					</tr>
			<?php
				// finaliza o loop que vai mostrar os dados
				}while($row = mysqli_fetch_assoc($result));
			}

			mysqli_close($conn);
			?>
		</table>
	</body>

</html>