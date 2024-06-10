<?php 
error_reporting(1);

require('../../config/conexion.php');

// Obtener datos del formulario
$id_item = $_POST['id_item'];
$id_kit = $_POST['id_kit'];

// Insertar datos en la base de datos
$sql = "INSERT INTO relacion_kit_item (id_kit, id_item) VALUES ('$id_kit', '$id_item')";

if ($conexion->query($sql) === TRUE) {
    echo "Datos insertados correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}
?>