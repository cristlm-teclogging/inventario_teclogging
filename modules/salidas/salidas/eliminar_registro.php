<?php
error_reporting(1);

require('../../config/conexion.php');

// Conexión a la base de datos y otras configuraciones
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del kit anterior desde la solicitud POST
    $id_kit_anterior = $_POST["id_kit_anterior"];

    // Consulta SQL para eliminar el registro anterior (anteriormente salida_item)
    $query = "DELETE FROM salida WHERE id_kit = $id_kit_anterior";

    // Ejecutar la consulta
    if ($conexion->query($query) === TRUE) {
        echo "El registro anterior ha sido eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro anterior: " . $conexion->error;
    }

    // Cerrar la conexión u otras tareas de limpieza si es necesario
}
?>