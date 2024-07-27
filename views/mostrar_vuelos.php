<?php
include 'database.php';

try {
    $sql = "SELECT * FROM VUELO ORDER BY id_vuelo DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $vuelos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vuelos Agregados Recientemente</title>
</head>
<body>
    <h1>Vuelos Agregados Recientemente</h1>
    <ul>
        <?php foreach ($vuelos as $vuelo): ?>
            <li><?php echo "{$vuelo['origen']} - {$vuelo['destino']} - {$vuelo['fecha']}"; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
