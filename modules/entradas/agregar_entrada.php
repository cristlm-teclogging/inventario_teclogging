<?php 
require('../../config/conexion.php');

$id_entrada = $_POST['id_entrada'];
$fecha_entrada = $_POST['fecha_entrada'];
$dias_trabajados = $_POST['dias_trabajados'];
$documentos_firmados = addslashes(file_get_contents($_FILES['documentos_firmados']['tmp_name'])); 

$sql = "INSERT INTO `entrada`(`id_entrada`, `fecha_entrada`, `dias_trabajados`, `documentos_firmados`)VALUES('$id_entrada', '$fecha_entrada', '$dias_trabajados', '$documentos_firmados')";

$resultado = $conexion -> query($sql);

if($resultado){
    header('Location: index.php');
}else{
    echo "No se insertaron los datos";
}
?>