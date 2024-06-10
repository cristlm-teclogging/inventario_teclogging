<?php
require_once('../../config/conexion.php');

// Verificar si id_kit está definido en $_GET
if(isset($_GET['id_kit'])) {
    $id_kit = $_GET['id_kit'];

    // Verificar si id_item está definido en $_GET
    if(isset($_GET['id_item'])) {
        $id_item = $_GET['id_item'];

        // Eliminar registro de la tabla
        $sql = "DELETE FROM `relacion_kit_item` WHERE `id_item`='$id_item'";
        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            echo "<script language='JavaScript'> alert('Los datos se eliminaron correctamente'); 
            location.assign('salidas_kit.php?id_kit=$id_kit'); </script>";
        } else {
            echo "<script language='JavaScript'> alert('Los datos NO se eliminaron'); 
            location.assign('salidas_kit.php?id_kit=$id_kit'); </script>";
        }
    } else {
        // Manejar el caso en que id_item no esté definido
        echo "<script language='JavaScript'> alert('id_item no está definido'); 
        location.assign('salidas_kit.php?id_kit=$id_kit'); </script>";
    }
} else {
    // Manejar el caso en que id_kit no esté definido
    echo "<script language='JavaScript'> alert('id_kit no está definido'); 
    location.assign('salidas_kit.php'); </script>";
}
?>