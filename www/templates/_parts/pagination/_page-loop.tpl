<!-- Кнопки с номерами страниц "1" "2" "3" -->
<?php for ($page = 1; $page <= $number_of_pages; $page++) : ?>
<div class="section-pagination__item">

<?php
    $active_class = '';
    if ($page_number == $page ) {
        $active_class = 'active';
    } else if ($page_number === 1 && $page === 1) {
        $active_class = 'active';
    }
?>
    <a
        class="pagination-button <?=$active_class?>"
        href="?page=<?= $page?>"
    ><?= $page?></a>
</div>
<?endfor;?>