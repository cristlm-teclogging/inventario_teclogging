<?php 
error_reporting(1);

require('../../config/conexion.php');

// Obtener datos del formulario
$id_kit = $_GET['id_kit'];
$id_item = $_POST['id_item'];

// Insertar datos en la base de datos

/*
$sql = "INSERT INTO relacion_kit_item (id_item) VALUES ('$id_item')";
$resultado = $conexion -> query($sql);
if($resultado){
    header("Location: salidas_kit.php?id_kit=$id_kit");
} else {
    echo "Error al insertar datos: ";
}*/

$query = "INSERT INTO relacion_kit_item (id_item) VALUES ('$id_item')";
if ($mysqli->query($query) === TRUE) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar datos: ";
}
?>