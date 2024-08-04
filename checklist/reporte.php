<?php
include 'conexion.php'; // Asegúrate de que tu archivo de conexión esté configurado correctamente

// Consultas para el reporte
$reportes = [
    'Por Tipo de Tarea' => "SELECT tt.nombre AS tipo_tarea, COUNT(t.id) AS cantidad
                            FROM tareas t
                            JOIN tipos_tareas tt ON t.tipo_tarea = tt.id
                            GROUP BY tt.nombre",
    
    'Por Estado' => "SELECT estado, COUNT(id) AS cantidad
                     FROM tareas
                     GROUP BY estado",
    
    'Por Día' => "SELECT DATE(fecha_compromiso) AS fecha, COUNT(id) AS cantidad
                  FROM tareas
                  GROUP BY DATE(fecha_compromiso)",
    
    'Por Semana' => "SELECT YEARWEEK(fecha_compromiso, 1) AS semana, COUNT(id) AS cantidad
                     FROM tareas
                     GROUP BY YEARWEEK(fecha_compromiso, 1)",
    
    'Por Mes' => "SELECT YEAR(fecha_compromiso) AS anio, MONTH(fecha_compromiso) AS mes, COUNT(id) AS cantidad
                  FROM tareas
                  GROUP BY YEAR(fecha_compromiso), MONTH(fecha_compromiso)",
    
    'Por Año' => "SELECT YEAR(fecha_compromiso) AS anio, COUNT(id) AS cantidad
                  FROM tareas
                  GROUP BY YEAR(fecha_compromiso)"
];

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reportes de Tareas</title>
        <link rel="stylesheet" href="css/styles_reporte.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <h1>Reportes de Tareas</h1>

        <?php foreach ($reportes as $titulo => $sql): ?>
            <h2><?php echo htmlspecialchars($titulo); ?></h2>
            <table>
                <thead>
                    <tr>
                        <?php
                        // Obtén los nombres de las columnas
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $columns = array_keys($result->fetch_assoc());
                            foreach ($columns as $column) {
                                echo "<th>" . htmlspecialchars(ucfirst(str_replace('_', ' ', $column))) . "</th>";
                            }
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ejecuta la consulta y muestra los resultados
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <?php foreach ($row as $value): ?>
                                <td><?php echo htmlspecialchars($value); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
        <a href="index.php" class="btn btn-primary text-decoration-none">Regresar</a><br>
    </body>
</html>

<?php $conn->close(); ?>


