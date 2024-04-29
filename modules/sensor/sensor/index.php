<?php include "../header.php"; ?>
<?php include "../../nav.php"; 

require "../../config/conexion.php";

$sql_select1 =  "SELECT * FROM `status`";
$resultado_select1 = $conexion->query($sql_select1);
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
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link active" aria-current="true" href="http://localhost/inventario_tec/sensor/">Sensores <i class="fa-brands fa-creative-commons-sampling fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/antena">Antena <i class="fa-solid fa-satellite-dish fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/ip/">IP <i class="fa-solid fa-ethernet fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/compañia">compañia <i class="fa-solid fa-industry fa-sm"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h3 class="fw-bolder">Registro de Sensores</h3>
                    <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> Agregar nuevo Registro <i class="fa-solid fa-circle-plus"></i></button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/sensor/registro_sensor.php"> <i class="fa-brands fa-creative-commons-sampling fa-sm"></i>Registrar Nuevo Sensor</a></li>
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/items/registrar_item.php">  <i class="fa-solid fa-desktop fa-sm"></i> Registrar Nuevo Item</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/items/index.php"><i class="fa-solid fa-clipboard-list fa-sm"></i> Tabla de Item</a></li>
                            </ul>
                        </div>
                    <!--a href="./registro_sensor.php" class="btn btn-primary">
                    Agregar nuevo registro <i class="fa-solid fa-circle-plus"></i>
                    </a-->
                    <hr>
                <div class="col- table-responsive">
                <table class="table table-sm table-hover table-bordered">
                     <thead class="col-">
                        <th class="col-">Numero de Serie</th>
                        <th class="col-">Tipo de item</th>
                        <th class="col-">Rango</th>
                        <th class="col-">Output</th>
                        <th class="col-">certificado Enyca</th>
                        <th class="col-">Fecha Calibracion</th>
                        <th class="col-">URL Enyca</th>
                        <th class="col-">Status</th>

                        <th class="col-">Editar</th>
                        <th class="col-">Eliminar</th>
                    </thead>
                    <tbody>
                     <?php 
                       require "../../config/conexion.php";

                       $sql = "SELECT sen.num_serie as 'num_serie', sen.id_item as 'id_item', sen.id_tipo_item as 'id_item_sensor', sen.rango as 'rango', sen.output as 'output', sen.cert_enyca as 'cert_enyca', sen.fecha_calibracion as 'fecha_calibracion', sen.url_enyca as 'url_enyca',sen.status as 'status_sensor', sta.id_status as 'id_status', sta.status as 'status', tp.id_tipo_item as 'id_tipo_item', tp.tipo_item as 'tipo_item' FROM sensores sen LEFT JOIN status sta ON sen.status = sta.id_status LEFT JOIN tipo_item tp ON sen.id_tipo_item = tp.id_tipo_item";
                       $resultado = $conexion->query($sql);

                       while($row = $resultado->fetch_assoc()) { ?>
                        <tr class="col-">
                            <!--corregir el nombre de las propiedades-->

                            <td class="col-"><?php echo $row['id_item'];?></td>             
                            <td class="col-"><?php echo $row['num_serie'];?></td>
                            <td class="col-"><?php echo $row['tipo_item'];?></td>
                            <td class="col-"><?php echo $row['rango'];?></td>
                            <td class="col-"><?php echo $row['output'];?></td>
                            <td class="col-"><?php echo $row['cert_enyca'];?></td>
                            <td class="col-"><?php echo $row['fecha_calibracion'];?></td>
                            <td><a href="<?php echo $row['url_enyca']; ?>" class="link-primary" target="_blank"><?php echo $row ['url_enyca']?></a></td>
                            <!--td class="col-"><!?php echo $row['url_enyca'];?></td-->
                            <td class="col-"><?php echo $row['status'];?></td>


                             <td class="col- text-center">
                                <a href="./editar_sensor.php?num_serie=<?php echo $row['num_serie'];?>" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></a>
                             </td>
                             <td class="col-text-center">
                                <a href="./eliminar_sensor.php?num_serie=<?php echo $row['num_serie'];?>" class="btn btn-danger"><i class="fas fa-trash-can"></i></a>
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