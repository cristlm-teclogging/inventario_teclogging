<?php include "header.php"; ?>
<?php include "../../nav.php"; ?>

<div class="container mt-2">
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="col nav-item">
                        <a class="nav-link active" aria-current="true" href="http://localhost/inventario_tec/">Kit <i class="fa-solid fa-box-open fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/items">Item <i class="fa-solid fa-tv fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/antena">Antena <i class="fa-solid fa-satellite-dish fa-sm"></i></a>
                        </li>
                        <li class="col nav-item">
                        <a class="nav-link" href="http://localhost/inventario_tec/modules/ip/">IP <i class="fa-solid fa-ethernet fa-sm"></i></a>
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
                    <h3 class="fw-bolder">Registro de kit, Antenas y Sensor</h3>
                    <a href="registrar_ki.php" class="btn btn-primary">
                    Agregar nuevo registro <i class="fa-solid fa-circle-plus"></i>
                    </a>
                    <hr>
                <div class="col table-responsive">
                <table class="table table-sm table-hover table-bordered">
                                <thead class="col-">
                                <th class="col-">id_kit</th>
                                <th class="col-">id_item</th>
                                <th class="col-">tipo item</th>

                                <th class="col-">Editar</th>
                                <th class="col-">Eliminar</th>
                                </thead>
                                <tbody>
                     <?php 
                       require "../../config/conexion.php";

                       $sql = "SELECT rki.id_kit as 'id_kit', rki.id_item as 'id_item', rki.tipo_item as 'tipo_item', ti.id_tipo_item as 'id_tipo_item', ti.tipo_item as 'tipo_item' FROM relacion_kit_item rki LEFT JOIN tipo_item ti ON rki.id_item = ti.id_tipo_item";
                       $resultado = $conexion->query($sql);

                       while($row = $resultado->fetch_assoc()) { ?>
                                     <tr>
                                         <!--corregir el nombre de las propiedades-->
                                         
                                         <td class="col-"><?php echo $row['id_kit'];?></td>
                                         <td class="col-"><?php echo $row['id_item'];?></td>
                                         <td class="col-"><?php echo $row['tipo_item'];?></td>

                                         <!--falta modificar direccion ip-->

                                         <td class="col- text-center">
                                         <a href="./editar_kit_item.php?id_kit=<?php echo $row['id_kit'];?>" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></a>
             
                                         </td>
                                         <td class="col-text-center">
                                         <a href="./eliminar_kit_item?id_kit=<?php echo $row['id_kit'];?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
