<?php

$servername = "localhost";
$username = "root";
$password = "usbw";
$database = "hyperion";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = "DELETE FROM imovel WHERE Codigo = " . $_GET["cod"];

$result = mysqli_query($conn, $query);

if($result){
    echo("<br>Dados excluidos com sucesso");
} else{
    echo("<br>ERRO: Dados nao excluidos!");
}

mysqli_close($conn);

?>