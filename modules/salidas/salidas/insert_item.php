<?php 
error_reporting(1);

require('../../config/conexion.php');

// Variables de la tabla relacion_kit_item
$id_item = $_POST['id_item'];

// Preparar y ejecutar consulta SQL para insertar datos
    // Insertar los datos en la base de datos
    $sql = "INSERT INTO relacion_kit_item (id_item) VALUES ('$form_item')";
    if ($conexion->query($sql) === TRUE) {
        // Si la inserción fue exitosa, puedes devolver una respuesta indicando éxito
        echo "El elemento se agregó correctamente al kit.";
    } else {
        // Si hubo un error en la inserción, puedes devolver un mensaje de error
        echo "Error al agregar el elemento al kit:"; 
        //. $conexion->error;
    }

?>