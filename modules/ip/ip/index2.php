<?php include "header.php"; ?>
<?php include "../../nav.php"; 
?>

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
                    <?php 
                    require "../../config/conexion.php";

                    // Configuración de la paginación
                    $resultados_por_pagina = 5; // Cambia este valor según tus necesidades
                    if (isset($_GET['pagina'])) {
                        $pagina = $_GET['pagina'];
                    }else{
                        $pagina = 1;
                    }

                    $empezar_desde = ($pagina - 1) * $resultados_por_pagina;

                    // Consulta SQL para obtener el total de filas
                    $sql_total = "SELECT COUNT(*) as total FROM `ip`";
                    $resultado_total = $conexion->query($sql_total);
                    $total_filas = $resultado_total->fetch_assoc()['total'];

                    // Calcular el número total de páginas
                    $total_paginas = ceil($total_filas / $resultados_por_pagina);

                    // Consulta SQL para obtener los datos para la página actual
                    $sql_paginacion = "SELECT * FROM `ip` LIMIT $empezar_desde, $resultados_por_pagina";
                    $resultado_paginacion = $conexion->query($sql_paginacion);

                    ?>
                    <div class="col table-responsive">
                        <table class="table table-sm table-hover table-bordered">
                            <thead>
                               <tr>
                                <th>id_ip</th>
                                <th>direccion ip</th>
                                <th>num kit</th>
                                <th>Editar</th>
                                <th>eliminar</th>
                               </tr> 
                            </thead>
                            <tbody>
                                <?php while ($row = $resultado_paginacion->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['id_ip']; ?></td>
                                        <td><?php echo $row['direccion_ip']; ?></td>
                                        <td><?php echo $row['num_kit']; ?></td>
                                        <td class="text-center">
                                            <a href="./editar_ip.php?id_ip=<?php echo $row['id_ip']; ?>" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="./eliminar_ip.php?id_ip=<?php echo $row['id_ip']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
                                    <a class="page-link" href="?pagina=<?php echo $pagina - 1; ?>" aria-label="Anterior">
                                        <span aria-hidden="true">&laquo; Anterior</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                                 <li class="page-item <?php if ($pagina == $i) echo 'active'; ?>">
                                    <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            <?php if ($pagina < $total_paginas): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?pagina=<?php echo $pagina + 1; ?>" aria-label="Siguiente">
                                     <span aria-hidden="true">Siguiente &raquo;</span>
                                    </a>
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
