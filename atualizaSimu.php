<?php

$codigo = $_POST["cod"];
$status = $_POST["status"];

$servername = "localhost";
$username = "root";
$password = "usbw";
$database = "hyperion";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if($status != 'D'){
	if ($status == 'A') $status = 'ACEITO';
	else $status = 'NAO ACEITO';
	$query = "	UPDATE financiamento
				SET Status = '$status'
				WHERE Codigo_Finan = '$codigo'";

	$result = mysqli_query($conn, $query) or die(mysql_error());

	echo $codigo;	
}

header('Location: listaSimu.php');

?>