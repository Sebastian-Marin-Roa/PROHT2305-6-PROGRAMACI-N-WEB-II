<?php
include 'database.php';

try {
    $sql = "SELECT r.*, v.origen, v.destino, h.nombre AS nombre_hotel
            FROM RESERVA r
            LEFT JOIN VUELO v ON r.id_vuelo = v.id_vuelo
            LEFT JOIN HOTEL h ON r.id_hotel = h.id_hotel
            ORDER BY r.id_reserva DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservas Agregadas Recientemente</title>
</head>
<body>
    <h1>Reservas Agregadas Recientemente</h1>
    <ul>
        <?php foreach ($reservas as $reserva): ?>
            <li>Cliente: <?php echo $reserva['id_cliente']; ?> - Fecha: <?php echo $reserva['fecha_reserva']; ?> - Vuelo: <?php echo "{$reserva['origen']} - {$reserva['destino']}"; ?> - Hotel: <?php echo $reserva['nombre_hotel']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
