<?php

$servername = "qxr982.clinicahuella.com";
$username = "qxr982";
$password = "7538Alba";
$dbname = "qxr982";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_errno) {
	    echo "Falló la conexión a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
	die("No se puede conectar con la base de datos.");
}

$conn->query("SET NAMES 'utf8'");
?>