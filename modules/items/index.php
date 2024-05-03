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

                        <hr>
                        <?php 
                   require "../../config/conexion.php";

                   // Configuración de la paginación
                   $resultados_por_pagina = 3; // Cambia este valor según tus necesidades
                   if (isset($_GET['pagina'])) {
                       $pagina = $_GET['pagina'];
                   }else{
                       $pagina = 1;
                   }

                   $empezar_desde = ($pagina - 1) * $resultados_por_pagina;

                   // Consulta SQL para obtener el total de filas
                   $sql_total = "SELECT COUNT(*) as total FROM `items`";
                   $resultado_total = $conexion->query($sql_total);
                   $total_filas = $resultado_total->fetch_assoc()['total'];

                   // Calcular el número total de páginas
                   $total_paginas = ceil($total_filas / $resultados_por_pagina);

                   // Consulta SQL para obtener los datos para la página actual
                   //$sql_paginacion = "SELECT ite.num_serie as 'num_serie', ite.id_item as 'id_item', ite.id_tipo_item as 'id_tipo_item_ite', ite.modelo as'modelo', ite.marca as 'num_marca', ite.descripcion as 'descripcion', ite.nombre as 'nombre', ite.estado_item as 'num_estado', ite.status as 'status_item', sta.id_status as 'id_status', sta.status as 'status', ti.id_tipo_item as 'id_tipo_item', ti.tipo_item as 'tipo_item', ma.id_marca as 'id_marca', ma.nombre_marca as 'marca', est.id_estado as 'id_estado', est.estado_item as 'estado_item' FROM items ite LEFT JOIN status sta ON ite.status = sta.id_status LEFT JOIN tipo_item ti ON ite.id_tipo_item = ti.id_tipo_item LEFT JOIN marca ma ON ite.marca = ma.id_marca LEFT JOIN estado_item est ON ite.estado_item = est.id_estado";
                   $sql_paginacion = "SELECT * FROM `item`";
                   $resultado_paginacion = $conexion->query($sql_paginacion);
                ?> 
                <div class="col table-responsive">
                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Numero_serie</th>
                                <th>Tipo de Item</th>
                                <th>Descripcion</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>estado_item</th>
                                <th>status</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $resultado_paginacion->fetch_assoc()): ?>
                                <tr class="">
                                    <td><?php echo $row['id_item'];?></td>
                                    <td><?php echo $row['id_tipo_item'];?></td>
                                    <td><?php echo $row['descripcion'];?></td>
                                    <td><?php echo $row['marca'];?></td>
                                    <td><?php echo $row['modelo'];?></td>
                                    <td><?php echo $row['estado_item'];?></td>
                                    <td><?php echo $row['status'];?></td>
                                    <td class="col- text-center">
                                        <a href="./editar_item.php?id_item=<?php echo $row['id_item'];?>" class="btn btn-warning"> <i class="fa-solid fa-user-pen"></i></a>
                                    </td>
                                    <td class="col- text-center">
                                    <a href="./eliminar_item.php?id_item=<?php echo $row['id_item'];?>" class="btn btn-danger"> <i class="fas fa-trash-can"></i></a>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>