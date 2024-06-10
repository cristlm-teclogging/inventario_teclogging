<?php
error_reporting(1);

require('../../config/conexion.php');

// Verificar si se recibió el parámetro id_kit
if(isset($_GET['id_kit'])) {
    // Obtener el id_kit de la URL
    $id_kit = $_GET['id_kit'];

        // Realizar la consulta para obtener los datos relacionados con el id_kit
        $sql = "SELECT * FROM relacion_kit_item WHERE id_kit = '$id_kit'";
        $resultado = $conexion->query($sql);
        
        // Verificar si se obtuvieron resultados
        if ($resultado->num_rows > 0) {
            // Convertir los resultados a un array asociativo
            $datos_kit = $resultado->fetch_assoc();
            
            // Convertir el array a formato JSON y devolverlo como respuesta
            echo json_encode($datos_kit);
        } else {
            // Si no se encontraron resultados, devolver un mensaje de error
            echo "No se encontraron datos para el id_kit proporcionado.";
        }
        
        // Cerrar la conexión a la base de datos (si es necesario)
        $conexion->close();
    } else {
        // Si no se recibió el parámetro id_kit, devolver un mensaje de error
        echo "No se proporcionó el parámetro id_kit en la URL.";
    }
?>