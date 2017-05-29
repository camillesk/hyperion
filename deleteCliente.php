<?php

$servername = "localhost";
$username = "root";
$password = "usbw";
$database = "hyperion";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = "DELETE FROM cliente WHERE CPF = '" . $_GET["cpf"] . " ' ";

$result = mysqli_query($conn, $query);

if($result){
    echo("<br>Dados excluidos com sucesso");
} else{
    echo("<br>ERRO: Dados nao excluidos!");
}

echo $_GET['cpf'];

mysqli_close($conn);

header('Location:listaCliente.php');

?>