<?php
$servername = "localhost";
$username = "root";
$password = ""; // Sin contraseña
$dbname = "AGENCIA";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión exitosa"; // Puedes descomentar esto para verificar la conexión
} catch(PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
