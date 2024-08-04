<?php
include 'modelo.php'; // Incluye el archivo que define la variable $tareas_por_hacer

$tareas_por_hacer = obtenerTareasPorHacer(); // Inicializa la variable
$tareas_en_progreso = obtenerTareasEnProgreso();
$tareas_terminadas = obtenerTareasTerminadas();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checklist Tracker</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
        <div class="container-fluid">        
          
            <h1>Checklist Tracker</h1>
            <br>
            <div class="button-container">
                <a href="agregar.php" class="btn btn-primary text-decoration-none">Agregar nueva tarea</a>
                <a href="reporte.php" class="btn btn-primary text-decoration-none">Ver Reporte</a>
            </div>

            <div id="card">                
                <h2>Tareas por hacer</h2>            
                <table>
                    <thead id="thead_hacer">
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha compromiso</th>
                            <th>Responsable</th>
                            <th>Tipo de tarea</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tareas_por_hacer as $tarea) { ?>
                        <tr>
                        <td><?php echo $tarea['titulo']; ?></td>
                        <td><?php echo $tarea['descripcion']; ?></td>
                        <td><?php echo $tarea['fecha_compromiso']; ?></td>
                        <td><?php echo $tarea['responsable']; ?></td>
                        <td><?php echo $tarea['tipo_tarea']; ?></td>
                        <td><?php echo $tarea['estado']; ?></td>
                        <td><a href="editar.php?id=<?php echo $tarea['id']; ?>">Editar</a></td>
                        <td><a href="eliminar.php?id=<?php echo $tarea['id']; ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <br><br>
      
            <div id="card">
                <h2>Tareas en progreso</h2>
                <table>
                    <thead id="thead_progreso">
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha compromiso</th>
                            <th>Responsable</th>
                            <th>Tipo de tarea</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tareas_en_progreso as $tarea) { ?>
                        <tr>
                        <td><?php echo $tarea['titulo']; ?></td>
                        <td><?php echo $tarea['descripcion']; ?></td>
                        <td><?php echo $tarea['fecha_compromiso']; ?></td>
                        <td><?php echo $tarea['responsable']; ?></td>
                        <td><?php echo $tarea['tipo_tarea']; ?></td>
                        <td><?php echo $tarea['estado']; ?></td>
                        <td><a href="editar.php?id=<?php echo $tarea['id']; ?>">Editar</a></td>
                        <td><a href="eliminar.php?id=<?php echo $tarea['id']; ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <br><br>
            
            <div id="card">
                <h2>Tareas terminadas</h2>
                <table>
                    <thead id="thead_terminada">
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha compromiso</th>
                            <th>Responsable</th>
                            <th>Tipo de tarea</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tareas_terminadas as $tarea) { ?>
                            <tr>
                            <td><?php echo $tarea['titulo']; ?></td>
                            <td><?php echo $tarea['descripcion']; ?></td>
                            <td><?php echo $tarea['fecha_compromiso']; ?></td>
                            <td><?php echo $tarea['responsable']; ?></td>
                            <td><?php echo $tarea['tipo_tarea']; ?></td>
                            <td><?php echo $tarea['estado']; ?></td>
                            <td><a href="editar.php?id=<?php echo $tarea['id']; ?>">Editar</a></td>
                            <td><a href="eliminar.php?id=<?php echo $tarea['id']; ?>">Eliminar</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <br><br>

            <div class="button-container">
                <a href="agregar.php" class="btn btn-primary text-decoration-none">Agregar nueva tarea</a>
                <a href="reporte.php" class="btn btn-primary text-decoration-none">Ver Reporte</a>
            </div>

        </div>
    </body>
</html>
