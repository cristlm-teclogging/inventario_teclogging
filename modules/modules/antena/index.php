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
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/items/index.php">Items  <i class="fa-solid fa-tv fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link active" aria-current="true" href="http://localhost/inventario_tec/modules/antena/index.php">Antena <i class="fa-solid fa-satellite-dish fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/ip/index.php">IP <i class="fa-solid fa-ethernet fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/compañia">Compañia <i class="fa-solid fa-industry fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/entradas">Entradas/Salidas <i class="fa-solid fa-truck-ramp-box fa-sm"></i></a>
                    </li>

                    </ul>
                    </div>
                    <div class="card-body">
                        <h3 class="fw-bolder">Registro de Antena</h3>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <a href="registrar_antena.php" class="btn btn-primary"> Agregar nuevo registro <i class="fa-solid fa-circle-plus"></i> </a>          
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-box-open fa-xs"></i> Registro de Kit</button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/registro_kit.php"> <i class="fa-solid fa-box fa-sm"></i> Registrar Nuevo Kit</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/inventario_tec/index.php"> <i class="fa-solid fa-clipboard fa-sm"></i>  Vista de Kit</a></li>
                                </ul>
                                </div>
                        </div>
                        
                        <hr>
                        <div class="col table-responsive">
                            <table class="table table-sm table-hover table-bordered">
                                <thead>
                                <th>Numero_Antena</th>
                                <th>Tipo de Item</th>
                                <th>Numero_plato</th>
                                <th>Num_serie del moden</th>
                                <th>status</th>

                                <th>Editar</th>
                                <th>Eliminar</th>
                                </thead>
                                <tbody>
                     <?php 
                       require "../../config/conexion.php";

                       $sql = "SELECT ant.num_antena as 'num_antena', ant.num_plato as 'num_plato', ant.ns_modem as 'ns_modem', ant.status as 'status_antena', sta.id_status as 'id_status', sta.status as 'status', rki.id_kit as 'id_kit', rki.id_item as 'id_item', rki.tipo_item as 'tipo_item' FROM antena ant LEFT JOIN status sta ON ant.status = sta.id_status LEFT JOIN relacion_kit_item rki ON ant.id_item = rki.id_item";
                       $resultado = $conexion->query($sql);

                       while($row = $resultado->fetch_assoc()) { ?>
                                     <tr>
                                         <!--corregir el nombre de las propiedades-->
                                         
                                         <td><?php echo $row['num_antena'];?></td>
                                         <td><?php echo $row['tipo_item'];?></td>
                                         <td><?php echo $row['num_plato'];?></td>
                                         <td><?php echo $row['ns_modem'];?></td>
                                         <td><?php echo $row['status'];?></td>

                                         <td class="text-center">
                                         <a href="./editar_antena.php?num_antena=<?php echo $row['num_antena'];?>" class="btn btn-warning"> <i class="fa-solid fa-user-pen"></i></a>
             
                                         </td>
                                         <td class="text-center">
                                         <a href="./eliminar_antena.php?num_antena=<?php echo $row['num_antena'];?>" class="btn btn-danger"> <i class="fas fa-trash-can"></i></a>
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