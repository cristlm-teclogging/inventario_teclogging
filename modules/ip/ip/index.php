<?php include "header.php"; ?>
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
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/items">Item <i class="fa-solid fa-tv fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/antena">Antena <i class="fa-solid fa-satellite-dish fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link active" aria-current="true" href="http://localhost/inventario_tec/modules/ip/">IP <i class="fa-solid fa-ethernet fa-sm"></i></a>
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
                    <h3 class="fw-bolder">Registro IP</h3>
                    <a href="registro_ip.php" class="btn btn-primary">
                    Agregar nuevo registro <i class="fa-solid fa-circle-plus"></i>
                    </a>
                    <hr>
                <div class="col table-responsive">
                <table class="table table-sm table-hover table-bordered">
                                <thead class="col-">
                                <th class="col-">id_ip</th>
                                <th class="col-">Direccion IP</th>
                                <th class="col-">Num_kit</th>

                                <th class="col-">Editar</th>
                                <th class="col-">Eliminar</th>
                                </thead>
                                <tbody>
                     <?php 
                       require "../../config/conexion.php";

                       $sql = "SELECT * FROM `ip`";
                       $resultado = $conexion->query($sql);

                       while($row = $resultado->fetch_assoc()) { ?>
                                     <tr>
                                         <!--corregir el nombre de las propiedades-->
                                         
                                         <td class="col-"><?php echo $row['id_ip'];?></td>
                                         <td class="col-"><?php echo $row['direccion_ip'];?></td>
                                         <td class="col-"><?php echo $row['num_kit'];?></td>

                                         <!--falta modificar direccion ip-->

                                         <td class="col- text-center">
                                         <a href="./editar_ip.php?id_ip=<?php echo $row['id_ip'];?>" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></a>
             
                                         </td>
                                         <td class="col-text-center">
                                         <a href="./eliminar_ip.php?id_ip=<?php echo $row['id_ip'];?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
