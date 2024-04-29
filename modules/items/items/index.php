<?php include "../header.php"; ?>
<?php include "../../nav.php"; ?>

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
                        <a class="nav-link active" aria-current="true" href="http://localhost/inventario_tec/modules/items/index.php">Item <i class="fa-solid fa-tv fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/antena/index.php">Antena <i class="fa-solid fa-satellite-dish fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/ip/index.php">IP <i class="fa-solid fa-ethernet fa-sm"></i></a>
                       </li>
                       <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/compañia">Compañia <i class="fa-solid fa-industry fa-sm"></i></a>
                        </li>
                    </ul>
                    </div>
                    <div class="card-body">
                        <h3 class="fw-bolder">Registro de Items</h3>
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> Agregar nuevo Registro <i class="fa-solid fa-circle-plus"></i></button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/items/registrar_item.php"><i class="fa-solid fa-desktop fa-sm"></i> Registrar Nuevo Item</a></li>
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/sensor/registro_sensor.php"><i class="fa-brands fa-creative-commons-sampling fa-sm"></i> Registrar Nuevo Sensor</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/sensor/index.php"><i class="fa-solid fa-clipboard-list fa-sm"></i> Tabla de Sensores</a></li>
                            </ul>
                        </div>
                        <!--a href="./registrar_item.php" class="btn btn-primary">
                        Agregar nuevo registro <i class="fa-solid fa-circle-plus"></i>
                        </a-->
                        <hr>
                        <div class="col table-responsive">
                            <table class="table table-sm table-hover table-bordered">
                                <thead>
                                <th class="col-">ID item</th>
                                <th class="col-">Numero_serie</th>
                                <th class="col-">Tipo de Item</th>
                                <th class="col-">Modelo</th>
                                <th class="col-">Marca</th>
                                <th class="col-">Descripcion</th>
                                <th class="col-">Nombre</th>
                                <th class="col-">estado_item</th>
                                <th class="col-">status</th>

                                <th class="col-">Editar</th>
                                <th class="col-">Eliminar</th>
                                </thead>
                                <tbody>
                     <?php 
                       require "../../config/conexion.php";

                       $sql = "SELECT ite.num_serie as 'num_serie', ite.id_item as 'id_item', ite.id_tipo_item as 'id_tipo_item_ite', ite.modelo as'modelo', ite.marca as 'num_marca', ite.descripcion as 'descripcion', ite.nombre as 'nombre', ite.estado_item as 'num_estado', ite.status as 'status_item', sta.id_status as 'id_status', sta.status as 'status', ti.id_tipo_item as 'id_tipo_item', ti.tipo_item as 'tipo_item', ma.id_marca as 'id_marca', ma.nombre_marca as 'marca', est.id_estado as 'id_estado', est.estado_item as 'estado_item' FROM items ite LEFT JOIN status sta ON ite.status = sta.id_status LEFT JOIN tipo_item ti ON ite.id_tipo_item = ti.id_tipo_item LEFT JOIN marca ma ON ite.marca = ma.id_marca LEFT JOIN estado_item est ON ite.estado_item = est.id_estado";
                       $resultado = $conexion->query($sql);

                       while($row = $resultado->fetch_assoc()) { ?>
                                     <tr>
                                         <!--corregir el nombre de las propiedades-->
                                         <td class="col-"><?php echo $row['id_item'];?></td>
                                         <td class="col-"><?php echo $row['num_serie'];?></td>
                                         <td class="col-"><?php echo $row['tipo_item'];?></td>
                                         <td class="col-"><?php echo $row['modelo'];?></td>
                                         <td class="col-"><?php echo $row['marca'];?></td>
                                         <td class="col-"><?php echo $row['descripcion'];?></td>
                                         <td class="col-"><?php echo $row['nombre'];?></td>
                                         <td class="col-"><?php echo $row['estado_item'];?></td>
                                         <td class="col-"><?php echo $row['status'];?></td>

                                         <td class="col- text-center">
                                         <a href="./editar_item.php?num_serie=<?php echo $row['num_serie'];?>" class="btn btn-warning"> <i class="fa-solid fa-user-pen"></i></a>
             
                                         </td>
                                         <td class="col- text-center">
                                         <a href="./eliminar_item.php?num_serie=<?php echo $row['num_serie'];?>" class="btn btn-danger"> <i class="fas fa-trash-can"></i></a>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>