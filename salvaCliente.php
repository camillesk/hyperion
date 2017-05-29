<?php

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$idade = $_POST["idade"];
$renda = $_POST["renda"];

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

$query = 	"INSERT INTO cliente (Nome_Cliente, CPF, Idade, Renda)
			VALUES ('$nome', '$cpf', '$idade', '$renda')";

$result = mysqli_query($conn, $query);

if($result){
    echo("<br>Dados inseridos com sucesso");
} else{
    echo("<br>ERRO: Dados não inseridos!");
}

mysqli_close($conn);

header('Location:listaCliente.php');

?>