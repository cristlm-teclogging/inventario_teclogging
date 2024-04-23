<?php include "./header.php"; ?>
<?php include "../../nav.php"; 

require "../../config/conexion.php";

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
                        <a class="nav-link active" aria-current="true" href="http://localhost/inventario_tec/entradas/">Entradas/Salidas <i class="fa-solid fa-truck-ramp-box fa-sm"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h3 class="fw-bolder">Registro de Entradas</h3>
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <a href="./registro_entrada.php" class="btn btn-primary"> <i class="fa-solid fa-square-plus fa-sm"></i> Agregar nueva entrada</a>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-truck-arrow-right fa-sm"></i> Salidas</button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/salidas/registro_salida.php"> <i class="fa-solid fa-truck-arrow-right fa-sm"></i> Registrar Nueva Salida</a></li>
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/salidas/index.php"> <i class="fa-solid fa-clipboard fa-sm"></i>  Vista de Salidas</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <!--div class="dropdown">
                        <a href="./registro_compañia.php" class="btn btn-primary">  Agregar nuevo registro <i class="fa-solid fa-circle-plus"></i></a>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> Agregar nuevo Registro <i class="fa-solid fa-circle-plus"></i></button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/sensor/registro_sensor.php"> <i class="fa-brands fa-creative-commons-sampling fa-sm"></i>Registrar Nuevo Sensor</a></li>
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/items/registrar_item.php">  <i class="fa-solid fa-desktop fa-sm"></i> Registrar Nuevo Item</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/items/index.php"><i class="fa-solid fa-clipboard-list fa-sm"></i> Tabla de Item</a></li>
                            </ul>
                        </div-->
                    <hr>
                <div class="col- table-responsive">
                <table class="table table-sm table-hover table-bordered">
                     <thead class="col-">
                        <th class="col-">ID entrada</th>
                        <th class="col-">Fecha entrada</th>
                        <th class="col-">Dias_trabajados</th>
                        <th class="col-">Documentos Firmados</th>

                        <th class="col-">Editar</th>
                        <th class="col-">Eliminar</th>
                    </thead>
                    <tbody>
                     <?php 
                       require "../../config/conexion.php";

                       $sql = "SELECT * FROM `entrada`";
                       $resultado = $conexion->query($sql);

                       while($row = $resultado->fetch_assoc()) { ?>
                        <tr class="col-">
                            <!--corregir el nombre de las propiedades-->
                                         
                            <td class="col-"><?php echo $row['id_entrada'];?></td>
                            <td class="col-"><?php echo $row['fecha_entrada'];?></td>
                            <td class="col-"><?php echo $row['dias_trabajados'];?></td>
                            
                            <td><embed src="data:application/pdf;base64,<?php echo base64_encode($row['documentos_firmados']); ?>" width="80px" height="80px" type='application/pdf' /></td>        
                            <!--td class="col-"><!-?php echo $row['documentos_firmados'];?></td-->

                             <td class="col- text-center">
                                <a href="./editar_entrada.php?id_entrada=<?php echo $row['id_entrada'];?>" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></a>
                             </td>
                             <td class="col-text-center">
                                <a href="./eliminar_entrada.php?id_entrada=<?php echo $row['id_entrada'];?>" class="btn btn-danger"><i class="fas fa-trash-can"></i></a>
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