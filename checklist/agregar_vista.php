<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "checklist_tracker");

// Obtener los tipos de tareas
$query = "SELECT * FROM tipos_tareas";
$resultado = mysqli_query($conexion, $query);
$tipos_tareas = array();
while ($fila = mysqli_fetch_assoc($resultado)) {
  $tipos_tareas[] = $fila['nombre'];
}

// Cerrar la conexión
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar Tarea</title>
        <link rel="stylesheet" href="css/styles_agregar.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
        <div class="container-fluid">

            <h1>Agregar Tarea</h1>
            <form action="" method="post">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo">
                <br>
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"></textarea>
                <br>
                <label for="fecha_compromiso">Fecha compromiso:</label>
                <input type="date" id="fecha_compromiso" name="fecha_compromiso">
                <br>
                <label for="responsable">Responsable:</label>
                <input type="text" id="responsable" name="responsable">
                <br>
                <label for="tipo_tarea">Tipo de tarea:</label>
                <select id="tipo_tarea" name="tipo_tarea">
                <?php foreach ($tipos_tareas as $tipo_tarea) { ?>
                    <option value="<?php echo $tipo_tarea; ?>"><?php echo $tipo_tarea; ?></option>
                <?php } ?>
                </select>
                <br>
                <label for="estado">Estado:</label>
                <select id="estado" name="estado">
                <option value="por hacer">Por hacer</option>
                <option value="en progreso">En progreso</option>
                <option value="terminada">Terminada</option>
                </select>
                <br>
                <input type="submit" name="agregar" value="Agregar">
            </form>

            <a href="index.php" class="btn btn-primary text-decoration-none">Regresar</a><br>
        </div>

    </body>
</html>