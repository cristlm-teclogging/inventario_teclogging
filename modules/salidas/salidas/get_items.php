<?php
// Conexión a la base de datos
require('../../config/conexion.php');

// Obtener el id del item seleccionado del primer select
$id_tipo_item = $_POST['id_tipo_item'];
//$id_item = $_POST['id_tipo_item'];

// Consulta SQL para obtener las opciones relacionadas
$sql = "SELECT id_item, num_serie FROM relacion_item_tipo_item WHERE id_tipo_item = $id_tipo_item";
$resultado = $conexion->query($sql);

// Preparar el array de opciones
$options = array();

// Construir el array de opciones
while ($row = $resultado->fetch_assoc()) {
    $options[] = $row;
}

// Devolver las opciones como respuesta en formato JSON
echo json_encode($options);
?>
