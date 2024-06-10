<?php
error_reporting(1);

require('../../config/conexion.php');

$id_info = $_POST['id_info'];

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_kit'])) {
    // Recibir el ID del kit seleccionado
    $id_kit = $_POST['id_kit'];

    // Obtener el último id_salida y sumarle 1
    $query = "SELECT IFNULL(MAX(id_salida), 0) + 1 AS new_id_salida FROM salida";
    $result = $conexion->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $new_id_salida = $row['new_id_salida'];

        // Insertar el ID del kit en la base de datos
        $sql = "INSERT INTO `salida` (`id_salida`, `id_kit`, `id_info`) VALUES ('$new_id_salida', '$id_kit', '$id_info')";
        $resultado = $conexion->query($sql);

        if ($resultado) {
            header('Location: salidas_kit.php?id_kit=' . $id_kit);
            exit; // Terminar el script para evitar que se renderice el formulario nuevamente
        } else {
            echo "No se insertaron los datos";
        }
    } else {
        echo "Error al obtener el nuevo id_salida";
    }
}

/*
$id_info = $_POST['id_info'];

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_kit'])) {
    // Recibir el ID del kit seleccionado
    $id_kit = $_POST['id_kit'];

    
    // Insertar el ID del kit en la base de datos
    $sql = "INSERT INTO `salida`(`id_kit`, id_info) VALUES ('$id_kit', '$id_info')";
    $resultado = $conexion->query($sql); 


    if ($resultado) {
        header('Location: salidas_kit.php?id_kit=' . $id_kit);
        exit; // Terminar el script para evitar que se renderice el formulario nuevamente
    } else {
        echo "No se insertaron los datos";
    }
}
/*
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