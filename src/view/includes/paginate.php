<nav aria-label="...">
    <ul class="pagination justify-content-end mb-0">
        <li class="page-item">
            <a class="page-link" href="<?= base_url("{$paginate->controller}/1") ?>">
                <i class="fas fa-angle-left"></i>
                <span class="sr-only">Anterior</span>
            </a>
        </li>
        <?php if (!empty($paginate->previousPage)): ?>
            <li class="page-item">
                <a class="page-link"
                   href="<?= base_url("{$paginate->controller}/{$paginate->previousPage}") ?>">
                    <?= $paginate->previousPage  ?>
                </a>
            </li>
        <?php endif ?>
        <li class="page-item active">
            <a class="page-link" href="javascript:;"><?= $paginate->currentPage ?> <span
                    class="sr-only">(current)</span></a>
        </li>
        <?php if (!empty($paginate->nextPage)): ?>
            <li class="page-item">
                <a class="page-link"
                   href="<?= base_url("{$paginate->controller}/{$paginate->nextPage}") ?>">
                    <?= $paginate->nextPage ?>
                </a>
            </li>
        <?php endif ?>
        <li class="page-item">
            <a class="page-link" href="<?= base_url("{$paginate->controller}/{$paginate->lastPage}") ?>">
                <i class="fas fa-angle-right"></i>
                <span class="sr-only">Última</span>
            </a>
        </li>
    </ul>
</nav>