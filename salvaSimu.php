<?php

$cliente = $_POST["sel1"];
$imovel = $_POST["sel2"];
$parcela = $_POST["sel3"];

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

$selCliente = "SELECT * FROM cliente WHERE CPF = '$cliente'";

$selImovel = "SELECT * FROM imovel WHERE Codigo_Imovel = '$imovel'";

$result1 = mysqli_query($conn, $selCliente);

$result2 = mysqli_query($conn, $selImovel);

$row1 = mysqli_fetch_assoc($result1);

$row2 = mysqli_fetch_assoc($result2);

if($row1['Idade'] < '18' or $row1['Idade'] >= 65 or $row1['Renda'] < 500.00 or $row1['Renda'] > 3499.99 or $row2['Preco'] > 180000.00){
	$insert = "INSERT INTO financiamento (CPF, Codigo_Imovel, Status)
			VALUES ('$cliente', '$imovel', 'NEGADO')";
}else{
	$entrada = $row1['Renda'] * 5;

	if($row1['Idade'] >= 18 and $row1['Idade'] <= 25){
		$percentualIdade = 0.03;
	}else if($row1['Idade'] >= 26 and $row1['Idade'] <= 34){
		$percentualIdade = 0.025;
	}else if($row1['Idade'] >= 35 and $row1['Idade'] <= 64){
		$percentualIdade = 0.02;
	}

	if($row1['Renda'] >= 500 and $row1['Renda'] <= 1499.99){
		$percentualRenda = 0.03;
	}else if($row1['Renda'] >= 1500 and $row1['Renda'] <= 2499.99){
		$percentualRenda = 0.025;
	}else if($row1['Renda'] >= 2500 and $row1['Renda'] <= 3499.99){
		$percentualRenda = 0.015;
	}

	if($row1['Renda'] >= 500 and $row1['Renda'] <= 1499.99){
		$juros = 0.02;
	}else if($row1['Renda'] >= 1500 and $row1['Renda'] <= 2499.99){
		$juros = 0.015;
	}else if($row1['Renda'] >= 2500 and $row1['Renda'] <= 3499.99){
		$juros = 0.01;
	}

	$subsidio = ($percentualIdade + $percentualRenda) * $row2['Preco'];

	$financiar = $row2['Preco'] - $subsidio - $entrada;

	$prestacao = ($financiar * (1 + pow($juros,$parcela/12))) / $parcela;

	if($prestacao > $row1['Renda']/2){
		$insert = "INSERT INTO financiamento (CPF, Codigo_Imovel, Juros, Parcela, Entrada, Subsidio, Qtd_Parcelas, Status)
			VALUES ('$cliente', '$imovel', '$juros', '$prestacao', '$entrada', '$subsidio', '$parcela', 'INVIAVEL')";
	}else{
		$insert = "INSERT INTO financiamento (CPF, Codigo_Imovel, Juros, Parcela, Entrada, Subsidio, Qtd_Parcelas, Status)
			VALUES ('$cliente', '$imovel', '$juros', '$prestacao', '$entrada', '$subsidio', '$parcela', 'SIMULACAO')";
	}
}	

$result3 = mysqli_query($conn, $insert);

if($result3){
    echo("<br>Dados inseridos com sucesso");
} else{
    echo("<br>ERRO: Dados não inseridos!");
}

mysqli_close($conn);

header('Location: listaSimu.php');

?>