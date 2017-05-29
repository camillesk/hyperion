<?php

$nome = $_POST["nome"];
$unidade = $_POST["unidade"];
$preco = $_POST["preco"];

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

$query = 	"INSERT INTO imovel (Nome_Imovel, Unidade, Preco)
			VALUES ('$nome', '$unidade', '$preco')";

$result = mysqli_query($conn, $query);

if($result){
    echo("<br>Dados inseridos com sucesso");
} else{
    echo("<br>ERRO: Dados não inseridos!");
}

mysqli_close($conn);

header('Location: listaImovel.php');

?>