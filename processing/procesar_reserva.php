<?php
include 'database.php';

if (isset($conn)) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recibir y sanitizar los datos del formulario
        $id_cliente = $_POST['id_cliente'];
        $fecha_reserva = $_POST['fecha_reserva'];
        $id_vuelo = $_POST['id_vuelo'];
        $id_hotel = $_POST['id_hotel'];

        try {
            // Preparar la consulta SQL de inserción
            $sql = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) 
                    VALUES (:id_cliente, :fecha_reserva, :id_vuelo, :id_hotel)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':fecha_reserva', $fecha_reserva);
            $stmt->bindParam(':id_vuelo', $id_vuelo, PDO::PARAM_INT);
            $stmt->bindParam(':id_hotel', $id_hotel, PDO::PARAM_INT);
            
            // Ejecutar la consulta
            $stmt->execute();
            
            // Mostrar mensaje de éxito
            echo "Reserva agregada correctamente.";

        } catch(PDOException $e) {
            // Mostrar mensaje de error si ocurre una excepción
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    // Mostrar mensaje si no se pudo establecer la conexión a la base de datos
    echo "Error en la conexión a la base de datos.";
}
?>
