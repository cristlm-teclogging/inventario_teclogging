<?php
require_once('../../config/conexion.php');
//Variables para validar los datos de la tabla
$num_serie_item = $_POST['num_serie'];
$id_item = $_POST['id_item'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$nombre = $_POST['nombre'];
$estado = $_POST['estado_item'];
$status_item = $_POST['status'];

$num_serie_sensor = $_POST['num_serie'];
$id_item_sensor = $_POST['id_item'];
$rango = $_POST['rango'];
$output = $_POST['output'];
$cert_enyca = $_POST['cert_enyca'];
$fecha_calibracion = $_POST['fecha_calibracion'];
$url_enyca = $_POST['url_enyca'];
$status_sensor = $_POST['status'];

$conexion->begin_transaction();

$sql_items = $conexion->prepare("INSERT INTO `items`(`num_serie`, `id_item`, `modelo`, `marca`, `descripcion`, `nombre`, `estado_item`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$sql_items->bind_param("isssssss", $num_serie_item, $id_item, $modelo, $marca, $descripcion, $nombre, $estado, $status_item);
$sql_items_executed = $sql_items->execute(); // Verifica si la consulta se ejecutó correctamente

$sql_sensores = $conexion->prepare("INSERT INTO `sensores`(`num_serie`, `id_item`, `rango`, `output`, `cert_enyca`, `fecha_calibracion`, `url_enyca`, `status`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");
$sql_sensores->bind_param("isssssss", $num_serie_sensor, $id_item_sensor, $rango, $output, $cert_enyca, $fecha_calibracion, $url_enyca, $status_sensor);
$sql_sensores_executed = $sql_sensores->execute(); // Verifica si la consulta se ejecutó correctamente


if($sql_items_executed && $sql_sensores_executed){
    $conexion->commit();
    header('Location: index.php');
}else{
    $conexion->rollback();
    echo "Error: " . $conexion->error;
}
//consultas para verificar si los datos exitan
$sql_num_serie ="SELECT * FROM `items` WHERE `num_serie` = '$num_serie'";
$result_num_serie = $conexion->query($sql_num_serie);

$sql_cert_enyca ="SELECT * FROM `sensores` WHERE `cert_enyca` = '$cert_enyca'";
$result_cert_enyca = $conexion->query($sql_cert_enyca);

if($result_num_serie->num_rows > 0){
    echo "El Numero de serie ya está registrado.";
} elseif ($result_cert_enyca->num_rows > 0) {
    echo "El numero de serie del modem ya está registrado.";
} else {
    $sql_insert = "INSERT INTO `sensores`(`num_serie`, `rango`, `output`, `cert_enyca`, `fecha_calibracion`, `url_enyca`, `status`)VALUES('$num_serie', '$rango', '$output', '$cert_enyca', '$fecha_calibracion', '$status')";
    if($conexion->query($sql_insert) === TRUE){
       // echo "Registro insertado correctamente.";
       header('Location: index.php');
    } else {
        //echo "Error al insertar el registro.";
        echo "No se insertaron los datos";

    }
}

/*
$sql_items = $conexion->prepare("INSERT INTO `items`(`num_serie`, `modelo`, `marca`, `descripcion`, `nombre`, `estado_item`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?)");
$sql_items->bind_param("issssss", $num_serie_item, $modelo, $marca, $descripcion, $nombre, $estado, $status_item);
$sql_items->execute();

$sql_sensores = $conexion->prepare("INSERT INTO `sensores`(`num_serie`, `rango`, `output`, `cert_enyca`, `fecha_calibracion`, `url_enyca`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?)");
$sql_sensores->bind_param("issssss", $num_serie_sensor, $rango, $output, $cert_enyca, $fecha_calibracion, $url_enyca, $status_sensor);
$sql_sensores->execute();

if($sql_items && $sql_sensores){
    $conexion->commit();
    //echo "Datos se Insertaron Correctamente.";
    header('Location: index.php');
}else{
    $conexion->rollback();
    echo "Error: " . $conexion->error;
}
*/

/*
$sql = "INSERT INTO `sensores`(`num_serie`, `rango`, `output`, `cert_enyca`, `fecha_calibracion`, `url_enyca`, `status`)VALUES('$num_serie','$rango','$output','$cert_enyca','$fecha_calibracion','$url_enyca','$status')";

$resultado = $conexion -> query($sql);
//condicones de la tabla kit
if($resultado){
    header('Location: index.php');
}else{
    echo "No se insertaron los datos";
}*/
?>