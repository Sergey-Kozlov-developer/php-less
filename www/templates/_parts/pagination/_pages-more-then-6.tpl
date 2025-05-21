<!-- Показываем многоточие в начале -->
<?php if ($page_number - 3 === 1) : ?>
    <div class="section-pagination__item">
        <a class="pagination-button" href="?page=1">1</a>
    </div>
<?php elseif ($page_number - 3 > 1) : ?>
    <div class="section-pagination__item">
        <a class="pagination-button" href="?page=1">1</a>
    </div>
    <div class="section-pagination__item">
        <a class="pagination-button" href="?page=<?echo ($page_number - 3);?>">
            ...
        </a>
    </div>
<?php endif; ?>


<?php if ($page_number - 2 > 0) : ?>
    <div class="section-pagination__item">
        <a class="pagination-button" href="?page=<?echo ($page_number - 2);?>">
            <?echo ($page_number - 2);?>
        </a>
    </div>
<?php endif; ?>

<?php if ($page_number - 1 > 0) : ?>
    <div class="section-pagination__item">
        <a class="pagination-button" href="?page=<?echo ($page_number - 1);?>">
            <?echo ($page_number - 1);?>
        </a>
    </div>
<?php endif; ?>

<div class="section-pagination__item">
    <a class="pagination-button active" href="?page=<?= $page_number ?>"><?= $page_number ?></a>
</div>

<?php if ($page_number + 1 <= $number_of_pages) : ?>
    <div class="section-pagination__item">
        <a class="pagination-button" href="?page=<?echo ($page_number + 1);?>">
            <?echo ($page_number + 1);?>
        </a>
    </div>
<?php endif; ?>

<?php if ($page_number + 2 <= $number_of_pages) : ?>
    <div class="section-pagination__item">
        <a class="pagination-button" href="?page=<?echo ($page_number + 2);?>">
            <?echo ($page_number + 2);?>
        </a>
    </div>
<?php endif; ?>


<!-- Показываем многоточие в концк -->
<?php if ($page_number + 3 <= $number_of_pages) : ?>
    <div class="section-pagination__item">
        <a class="pagination-button" href="?page=<?echo ($page_number + 3);?>">
            ...
        </a>
    </div>
<?php endif; ?>