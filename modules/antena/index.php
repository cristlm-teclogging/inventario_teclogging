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

                    </ul>
                    </div>
                    <div class="card-body">
                        <h3 class="fw-bolder">Registro de Antena</h3>
                        <a href="registrar_antena.php" class="btn btn-primary">
                            Agregar nuevo registro <i class="fa-solid fa-circle-plus"></i>
                        </a>
                        <hr>
                        <div class="col table-responsive">
                            <table class="table table-sm table-hover table-bordered">
                                <thead>
                                <th>Numero_kit</th>
                                <th>Numero_plato</th>
                                <th>Num_serie del moden</th>
                                <th>status</th>

                                <th>Editar</th>
                                <th>Eliminar</th>
                                </thead>
                                <tbody>
                     <?php 
                       require "../../config/conexion.php";

                       $sql = "SELECT ant.num_kit as 'num_kit', ant.num_plato as 'num_plato', ant.ns_modem as 'ns_modem', ant.status as 'status_antena', sta.id_status as 'id_status', sta.status as 'status' FROM antena ant LEFT JOIN status sta ON ant.status = sta.id_status";
                       $resultado = $conexion->query($sql);

                       while($row = $resultado->fetch_assoc()) { ?>
                                     <tr>
                                         <!--corregir el nombre de las propiedades-->
                                         
                                         <td><?php echo $row['num_kit'];?></td>
                                         <td><?php echo $row['num_plato'];?></td>
                                         <td><?php echo $row['ns_modem'];?></td>
                                         <td><?php echo $row['status'];?></td>

                                         <td class="text-center">
                                         <a href="./editar_antena.php?num_kit=<?php echo $row['num_kit'];?>" class="btn btn-warning"> <i class="fa-solid fa-user-pen"></i></a>
             
                                         </td>
                                         <td class="text-center">
                                         <a href="./eliminar_antena.php?num_kit=<?php echo $row['num_kit'];?>" class="btn btn-danger"> <i class="fas fa-trash-can"></i></a>
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