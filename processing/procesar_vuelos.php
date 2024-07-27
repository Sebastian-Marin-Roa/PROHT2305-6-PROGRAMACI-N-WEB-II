<?php
include 'database.php';

if (isset($conn)) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $origen = $_POST['origen'];
        $destino = $_POST['destino'];
        $fecha = $_POST['fecha'];
        $plazas_disponibles = $_POST['plazas_disponibles'];
        $precio = $_POST['precio'];

        $sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio)
                VALUES (:origen, :destino, :fecha, :plazas_disponibles, :precio)";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':origen', $origen);
            $stmt->bindParam(':destino', $destino);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':plazas_disponibles', $plazas_disponibles);
            $stmt->bindParam(':precio', $precio);
            $stmt->execute();
            echo "Vuelo agregado correctamente.";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    echo "No se pudo establecer la conexión a la base de datos.";
}
?>
