<?php

error_reporting(1);
require('../../config/conexion.php');

// Obtener el último id_salida y sumarle 1
$query = "SELECT IFNULL(MAX(id_salida), 0) + 1 AS new_id_salida FROM salida";
$result = $conexion->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $new_id_salida = $row['new_id_salida'];

    // Variables de la tabla salida
    $id_tipo_item = $_POST['id_tipo_item'];
    $id_item = $_POST['id_item'];
    $id_info = $_POST['id_info'];

    // Insertar el nuevo registro
    $sql = "INSERT INTO `salida` (`id_salida`, `id_tipo_item`, `id_item`, `id_info`) 
            VALUES ('$new_id_salida', '$id_tipo_item', '$id_item', '$id_info')";
    $resultado = $conexion->query($sql);

    if ($resultado) {
        header('Location: salidas_ki.php');
    } else {
        echo "No se insertaron los datos";
    }
} else {
    echo "Error al obtener el nuevo id_salida";
}

/*
if ($conexion->query($sql) === TRUE) {
    header('Location: salidas_ki.php');
} else {
    echo "Error al insertar el registro: " . $conexion->error;
}*/

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