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
                            <li><a class="dropdown-item" href="http://localhost/inventario_tec/modules/kit_item/index.php"> <i class="fa-solid fa-scroll fa-sm"></i>  Registrar kit_item</a></li>
                        </ul>
                    </div>
                </div>

                <hr>
                <?php 
                   require "./config/conexion.php";

                   // Configuración de la paginación
                   $resultados_por_pagina = 5; // Cambia este valor según tus necesidades
                   if (isset($_GET['pagina'])) {
                       $pagina = $_GET['pagina'];
                   }else{
                       $pagina = 1;
                   }

                   $empezar_desde = ($pagina - 1) * $resultados_por_pagina;

                   // Consulta SQL para obtener el total de filas
                   $sql_total = "SELECT COUNT(*) as total FROM `kit`";
                   $resultado_total = $conexion->query($sql_total);
                   $total_filas = $resultado_total->fetch_assoc()['total'];

                   // Calcular el número total de páginas
                   $total_paginas = ceil($total_filas / $resultados_por_pagina);

                   // Consulta SQL para obtener los datos para la página actual
                   $sql_paginacion = "SELECT kit.num_kit as 'num_kit', kit.id_kit as 'id_kit', kit.ip as 'ip', kit.tw as 'tw', kit.status as 'status_kit', st.id_status as 'id_status', st.status as 'status' FROM kit kit LEFT JOIN status st ON kit.status = st.id_status LIMIT $empezar_desde, $resultados_por_pagina";
                   $resultado_paginacion = $conexion->query($sql_paginacion);
                ?>
                <div class="col table-responsive">
                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Numero de Kit</th>
                                <th>direccion ip</th>
                                <th>Teamviewer</th>
                                <th>status</th>
                                <th>Editar</th>
                                <th>Agregar Item</th>
                                <th>eliminar</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $resultado_paginacion->fetch_assoc()):?>
                                <tr class="">
                                    <td><?php echo $row['num_kit'];?></td>
                                     <td><?php echo $row['ip'];?></td>
                                    <td><?php echo $row['tw'];?></td>
                                    <td><?php echo $row['status'];?></td>
                                    <td class="text-center">
                                        <a href="./modules/editar_kit.php?num_kit=<?php echo $row['num_kit'];?>" class="btn btn-warning"> <i class="fa-solid fa-user-pen"></i></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="./modules/registrar_items.php?num_kit=<?php echo $row['num_kit'];?>" class="btn btn-success"> <i class="fa-solid fa-plus"></i>
                                    </td>
                                    <td class="text-center">
                                        <a href="./modules/eliminar_kit.php?num_kit=<?php echo $row['num_kit'];?>" class="btn btn-danger"> <i class="fas fa-trash-can"></i></a>
                                    </td> 
                                    <?php endwhile; ?>                                   
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
                    <!-- Paginación -->
                    <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php if ($pagina > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?pagina=<?php echo $pagina - 1; ?>">Anterior</a>
            </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
            <li class="page-item <?php if ($pagina == $i) echo 'active'; ?>">
                <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
        <?php if ($pagina < $total_paginas): ?>
            <li class="page-item">
                <a class="page-link" href="?pagina=<?php echo $pagina + 1; ?>">Siguiente</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

              

            </div>
        </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</div>
