<?php
include 'database.php';

if (isset($conn)) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $ubicacion = $_POST['ubicacion'];
        $habitaciones_disponibles = $_POST['habitaciones_disponibles'];
        $tarifa_noche = $_POST['tarifa_noche'];

        $sql = "INSERT INTO HOTEL (nombre, ubicacion, habitaciones_disponibles, tarifa_noche)
                VALUES (:nombre, :ubicacion, :habitaciones_disponibles, :tarifa_noche)";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':ubicacion', $ubicacion);
            $stmt->bindParam(':habitaciones_disponibles', $habitaciones_disponibles);
            $stmt->bindParam(':tarifa_noche', $tarifa_noche);
            $stmt->execute();
            echo "Hotel agregado correctamente.";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    echo "No se pudo establecer la conexión a la base de datos.";
}
?>
