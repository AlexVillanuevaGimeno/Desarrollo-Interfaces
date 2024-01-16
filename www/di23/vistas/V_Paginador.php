<div id="paginador" class="container-fluid">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php
            for ($i = 1; $i <= $datosPaginador['totalPaginas']; $i++) {
                echo '<li class="page-item ' . ($i == $datosPaginador['paginaActual'] ? 'active' : '') . '"><a class="page-link" href="?pagina=' . $i
                 . '&registrosPorPagina=' . $datosPaginador['registrosPorPagina'] . '">' . $i . '</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>
