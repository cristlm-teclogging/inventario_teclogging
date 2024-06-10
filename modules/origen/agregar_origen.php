<?php
error_reporting(1);

require('../../config/conexion.php');

$id_salida = $_POST['id_salida'];
$id_item = $_POST['id_item'];
$estado_item = $_POST['estado_item'];
$fecha_entrada = $_POST['fecha_entrada'];
$descripcion_origen = $_POST['descripcion_origen'];

// Consulta para verificar si ya existe un registro con los mismos valores
$sql_origen = "SELECT * FROM origen WHERE id_salida = '$id_salida' AND id_item = '$id_item'";
$resultado_origen = $conexion->query($sql_origen);

if ($resultado_origen->num_rows > 0) {
    echo "Los datos ya existen en la base de datos.";
} else {
    // Insertar los datos si no existen duplicados
    $sql = "INSERT INTO `origen`(`id_salida`,`id_item`, `estado_item`,`fecha_entrada`,`descripcion_origen`)VALUES('$id_salida', '$id_item', '$estado_item', '$fecha_entrada', '$descripcion_origen')";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        header('Location: registro_origen.php');
    } else {
        echo "No se insertaron los datos.";
    }
}
?>