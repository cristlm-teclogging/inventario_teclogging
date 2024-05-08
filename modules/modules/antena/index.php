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
                   $sql_total = "SELECT COUNT(*) as total FROM `item`";
                   $resultado_total = $conexion->query($sql_total);
                   $total_filas = $resultado_total->fetch_assoc()['total'];

                   // Calcular el número total de páginas
                   $total_paginas = ceil($total_filas / $resultados_por_pagina);

                   // Consulta SQL para obtener los datos para la página actual
                   $sql_paginacion = "SELECT i.id_item as 'id_item',i.descripcion as 'descripcion',i.modelo as 'modelo',i.num_plato as 'num_plato', i.ns_modem as 'ns_modem', ti.tipo_item as 'tipo_item', ma.nombre_marca as 'marca', est.estado_item as 'estado_item', sta.status FROM item i LEFT JOIN tipo_item ti ON i.id_tipo_item = ti.id_tipo_item LEFT JOIN marca ma ON i.marca = ma.id_marca LEFT JOIN estado_item est ON i.estado_item = est.id_estado LEFT JOIN status sta ON i.status = sta.id_status WHERE i.id_tipo_item = '3' LIMIT $empezar_desde, $resultados_por_pagina";
                   $resultado_paginacion = $conexion->query($sql_paginacion);
                ?>
                        <div class="col table-responsive">
                            <table class="table table-sm table-hover table-bordered">
                                <thead>
                                <th>ID Item</th>
                                <th>Descripcion</th>
                                <th>Tipo de Item</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Numero_plato</th>
                                <th>Num_serie del moden</th>
                                <th>status</th>

                                <th>Editar</th>
                                <th>Eliminar</th>
                                </thead>
                                <tbody>
                                     <tr>
                                     <?php while ($row = $resultado_paginacion->fetch_assoc()):?>
                                         <!--corregir el nombre de las propiedades-->
                                         
                                         <td><?php echo $row['id_item'];?></td>          
                                         <td><?php echo $row['tipo_item'];?></td>
                                         <td><?php echo $row['descripcion'];?></td>
                                         <td><?php echo $row['marca'];?></td>
                                         <td><?php echo $row['modelo'];?></td>
                                         <td><?php echo $row['num_plato'];?></td>
                                         <td><?php echo $row['ns_modem'];?></td>
                                         <td><?php echo $row['status'];?></td>

                                         <td class="text-center">
                                         <a href="./editar_antena.php?id_item=<?php echo $row['id_item'];?>" class="btn btn-warning"> <i class="fa-solid fa-user-pen"></i></a>
             
                                         </td>
                                         <td class="text-center">
                                         <a href="./eliminar_antena.php?id_item=<?php echo $row['id_item'];?>" class="btn btn-danger"> <i class="fas fa-trash-can"></i></a>
                                         </td>
                                     </tr>
                                     <?php endwhile; ?> 
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