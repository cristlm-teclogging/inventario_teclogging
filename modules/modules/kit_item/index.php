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
                   $sql_total = "SELECT COUNT(*) as total FROM `relacion_kit_item`";
                   $resultado_total = $conexion->query($sql_total);
                   $total_filas = $resultado_total->fetch_assoc()['total'];

                   // Calcular el número total de páginas
                   $total_paginas = ceil($total_filas / $resultados_por_pagina);

                   // Consulta SQL para obtener los datos para la página actual
                   $sql_paginacion = "SELECT rki.id_kit as 'id_kit', rki.id_item as 'id_item', rki.tipo_item as 'tipo_item', ti.id_tipo_item as 'id_tipo_item', ti.tipo_item as 'tipo_item' FROM relacion_kit_item rki LEFT JOIN tipo_item ti ON rki.id_item = ti.id_tipo_item LIMIT $empezar_desde, $resultados_por_pagina";
                   $resultado_paginacion = $conexion->query($sql_paginacion);
                ?>
                
                <div class="col table-responsive">
                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>id_kit</th>
                                <th>id_item</th>
                                <th>tipo item</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $resultado_paginacion->fetch_assoc()):?> 
                                <tr class="">
                                    <td><?php echo $row['id_kit'];?></td>
                                    <td><?php echo $row['id_item'];?></td>
                                    <td><?php echo $row['tipo_item'];?></td>
                                    <td class="text-center">
                                        <a href="./editar_ki.php?id_kit=<?php echo $row['id_kit'];?>" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="./eliminar_ki.php?id_kit=<?php echo $row['id_kit'];?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                    <?php endwhile; ?> 
                                </tr>
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul  class="pagination justify-content-center">
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
