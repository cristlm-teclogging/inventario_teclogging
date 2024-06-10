<?php include "../../header.php"; ?>
<?php include "../../nav.php"; 

require "../../config/conexion.php";

$id_kit = isset($_GET['id_kit']) ? $_GET['id_kit'] : 0;
$sql_kit = "SELECT * FROM `relacion_kit_item` WHERE id_kit = '$id_kit'";
$resultado_kit = $conexion->query($sql_kit);

$id_item = isset($_GET['id_item']) ? $_GET['id_item'] : 0;
$sql_item = "SELECT * FROM `relacion_kit_item` WHERE id_item = '$id_item'";
$resultado_item = $conexion->query($sql_item);
?>

<div class="container mt-2">
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/">Kit <i class="fa-solid fa-box-open fa-sm"></i></a> 
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/antena">Antena <i class="fa-solid fa-satellite-dish fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/items/index.php">Items  <i class="fa-solid fa-tv fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/ip/">IP <i class="fa-solid fa-ethernet fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/compañia">Compañia <i class="fa-solid fa-industry fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link active" aria-current="true" href="http://localhost/inventario_tec/salidas/">Entradas/Salidas <i class="fa-solid fa-truck-ramp-box fa-sm"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h3 class="fw-bolder">Registro de Salidas</h3>
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <!--a href="./registro_salida.php" class="btn btn-primary"> <i class="fa-solid fa-square-plus fa-sm"></i> Agregar nueva salidas</a-->
                    <a href="./registro_salida.php?id_kit=<?php echo urlencode($id_kit); ?>&id_item=<?php echo urlencode($id_item); ?>" class="btn btn-primary"><i class="fa-solid fa-square-plus fa-sm"></i> Agregar nueva salidas </a>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-truck-arrow-right fa-flip-horizontal fa-sm"></i> Entradas</button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/entradas/registro_entrada.php"> <i class="fa-solid fa-truck-arrow-right fa-sm"></i> Registrar Nueva Entrada</a></li>
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/salidas/salidas_ki.php"> <i class="fa-solid fa-boxes-packing fa-sm"></i> Encargos salidas</a></li>
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/salidas/salidas_kit.php?id_kit=<?php echo urlencode($id_kit); ?>"> <i class="fa-solid fa-boxes-stacked fa-sm"></i> Encargos KIT's</a></li>
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/entradas/index.php"> <i class="fa-solid fa-clipboard fa-sm"></i>  Vista de Entradas</a></li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                <div class="col- table-responsive">
                <table class="table table-sm table-hover table-bordered">
                     <thead class="col-">
                        <th class="col-">Fecha salida</th>
                        <th class="col-">Numero de kit</th>
                        <th class="col-">Numero de Serie</th>
                        <th class="col-">Ubicacion</th>
                        <th class="col-">Compañia</th>
                        <th class="col-">Comentarios</th>
                        <th class="col-">Documentos Firmados</th>

                        <th class="col-">Editar</th>
                        <th class="col-">Eliminar</th>
                    </thead>
                    <tbody>
                     <?php 
                       require "../../config/conexion.php";

                       $sql = "SELECT sa.id_salida as 'id_salida', sa.id_kit as 'id_kit', sa.id_item as 'id_item', sa.fecha_salida as 'fecha_salida', sa.ubicacion as 'ubicacion_sa', sa.compañia as 'compania_sa', sa.comentarios 'comentarios', sa.documentos_firmados 'documentos_firmados', rit.id_item as 'id_item_rit', rit.id_tipo_item as 'tipo_item', rit.num_serie as 'num_serie', rit.descripcion as 'descripcion_item', com.id_compañia as 'id_compania', com.nombre_compañia as 'compania', ub.id_ubicacion as 'id_ubicacion', ub.ubicacion as 'ubicacion' FROM salida sa LEFT JOIN relacion_item_tipo_item rit ON sa.id_item = rit.id_item LEFT JOIN compañia com ON sa.compañia = com.id_compañia LEFT JOIN ubicacion ub ON sa.ubicacion = ub.id_ubicacion";
                       $resultado = $conexion->query($sql);

                       while($row = $resultado->fetch_assoc()) { ?>
                        <tr class="col-">
                            <!--Mostrar el nombre de las propiedades-->
                            <td class="col-"><?php echo $row['fecha_salida'];?></td>
                            <td class="col-"><?php echo $row['id_kit'];?></td>
                            <td class="col-"><?php echo $row['num_serie'];?></td>
                            <td class="col-"><?php echo $row['ubicacion'];?></td>
                            <td class="col-"><?php echo $row['compania'];?></td>
                            <td class="col-"><?php echo $row['comentarios'];?></td>
                            
                            <td><embed src="data:application/pdf;base64,<?php echo base64_encode($row['documentos_firmados']); ?>" width="80px" height="80px" type='application/pdf' /></td>        
                            <!--td class="col-"><!-?php echo $row['documentos_firmados'];?></td-->

                             <td class="col- text-center">
                                <a href="./editar_salida.php?id_salida=<?php echo $row['id_salida'];?>" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></a>
                             </td>
                             <td class="col-text-center">
                                <a href="./eliminar_salida.php?id_salida=<?php echo $row['id_salida'];?>" class="btn btn-danger"><i class="fas fa-trash-can"></i></a>
                            </td>
                        </tr>
                             <?php  } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>