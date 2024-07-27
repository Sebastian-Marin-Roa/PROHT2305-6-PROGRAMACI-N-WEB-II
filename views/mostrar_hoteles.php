<?php
include 'database.php';

try {
    $sql = "SELECT * FROM HOTEL ORDER BY id_hotel DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hoteles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hoteles Agregados Recientemente</title>
</head>
<body>
    <h1>Hoteles Agregados Recientemente</h1>
    <ul>
        <?php foreach ($hoteles as $hotel): ?>
            <li><?php echo "{$hotel['nombre']} - {$hotel['ubicacion']}"; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
