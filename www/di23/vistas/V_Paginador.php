<div id="paginador" class="container-fluid">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php
            for ($i = 1; $i <= $datosPaginacion['totalPaginas']; $i++) {
                echo '<li class="page-item ' . ($i == $datosPaginacion['paginaActual'] ? 'active' : '') . '"><a class="page-link" href="?pagina=' . $i
                 . '&registrosPorPagina=' . $datosPaginacion['registrosPorPagina'] . '">' . $i . '</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>
