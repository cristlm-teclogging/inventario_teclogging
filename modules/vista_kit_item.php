<?php include "./header.php"; ?>
<?php include "./nav.php"; ?>

<div class="container mt-2"><!--contanier-->
  <div class="row"><!--row-->
    <div class="col"><!--col-->
        <div class="card mt-3"><!--card mt-3-->
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
            <div class="card-body"><!--card-body-->
                <h3 class="fw-bolder">Registro de kit</h3>
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <a href="./modules/registro_kit.php" class="btn btn-primary"> Agregar nuevo registro <i class="fa-solid fa-circle-plus"></i></a>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-satellite-dish fa-sm"></i> Registro de Antena</button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/antena/registrar_antena.php"> <i class="fa-solid fa-satellite-dish fa-sm"></i> Registrar Nueva Antena</a></li>
                            <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/antena/index.php"> <i class="fa-solid fa-clipboard fa-sm"></i>  Vista de Antenas</a></li>
                        </ul>
                    </div>
                </div>

                <hr>
                <div class="col table-responsive">
                <table class="table table-sm table-hover table-bordered ">
                    <thead>
                        <th>Numero_kit</th>
                        <th>id_kit</th>
                        <th>Ip</th>
                        <th>Teamviewer</th>
                        <th>Status</th>
                        <th>Editar</th>
                        <th>Eliminar</th>

                    </thead>
                    <tbody>
                    <?php
                       require "./config/conexion.php";

                       $sql = "SELECT kit.num_kit as 'num_kit', kit.id_kit as 'id_kit', kit.ip as 'ip', kit.tw as 'tw', kit.status as 'status_kit', st.id_status as 'id_status', st.status as 'status' FROM kit kit LEFT JOIN status st ON kit.status = st.id_status";
                   
                       $resultado = $conexion->query($sql);

                       while($row = $resultado->fetch_assoc()) { ?>
                        <tr>
                            <!--corregir el nombre de las propiedades-->
                            
                            <td><?php echo $row['num_kit'];?></td>
                            <td><?php echo $row['id_kit'];?></td>
                            <td><?php echo $row['ip'];?></td>
                            <td><?php echo $row['tw'];?></td>
                            <td><?php echo $row['status'];?></td>
                            <td class="text-center">
                            <a href="./modules/editar_kit.php?num_kit=<?php echo $row['num_kit'];?>" class="btn btn-warning"> <i class="fa-solid fa-user-pen"></i></a>

                            </td>
                            <td class="text-center">
                            <a href="./modules/eliminar_kit.php?num_kit=<?php echo $row['num_kit'];?>" class="btn btn-danger"> <i class="fas fa-trash-can"></i></a>
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
