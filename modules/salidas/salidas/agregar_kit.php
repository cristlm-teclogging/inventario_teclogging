<?php
error_reporting(1);

require('../../config/conexion.php');

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_kit'])) {
    // Recibir el ID del kit seleccionado
    $id_kit = $_POST['id_kit'];

    // Insertar el ID del kit en la base de datos
    $sql = "INSERT INTO `salida_item`(`id_kit`) VALUES ('$id_kit')";
    $resultado = $conexion->query($sql);

    if ($resultado) {
        header('Location: salidas_kit.php?id_kit=' . $id_kit);
        exit; // Terminar el script para evitar que se renderice el formulario nuevamente
    } else {
        echo "No se insertaron los datos";
    }
}
//consultas para verificar si los datos exiten y no
/*$sql_id_kit ="SELECT * FROM `relacion_kit_item` WHERE `id_kit` = '$id_kit'";
$result_id_kit = $conexion->query($sql_id_kit);

if($result_id_kit->num_rows> 0){
    echo "El id_kit ya esta registrado";
}else{
    $sql_insert = "INSERT INTO `relacion_kit_sensor`(`id_kit`, `id_item`,`tipo_item`)VALUES('$id_kit', '$id_item', '$tipo_item')";
    if($conexion->query($sql_insert) == TRUE){
        header('Location: ../../index.php');
    }else{
    echo "No se insertaron los datos";
    }
}*/

?>