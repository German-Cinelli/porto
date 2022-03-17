<div class="pagination-box text-center">

    <ul class="list-unstyled list-inline">
        <li class="list-inline-item">
            <a href="<?= URL_PATH ?><?= $path ?><?= $products->previousPageUrl() ?><?= $sort_path ?>">
                <i class="fa fa-angle-left"></i>
            </a>
        </li>

        <?php for ($i = 0 ; $i < $products->lastpage(); $i++) : ?>
            <li class="list-inline-item <?= $_GET['page'] == $i + 1 ? 'active' : '' ?>">
                <a href="<?= URL_PATH ?><?= $path ?>/?page=<?= $i + 1 ?><?= $sort_path ?>"><?= $i + 1 ?></a>
            </li>
        <?php endfor ?>
        
        <li class="list-inline-item">
            <a href="<?= URL_PATH ?><?= $path ?><?= $products->nextPageUrl() ?><?= $sort_path ?>">
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>

</div><!-- ./pagination -->