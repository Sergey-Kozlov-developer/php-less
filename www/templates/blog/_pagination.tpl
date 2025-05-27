<div class="section-pagination">

    <!-- Кнопка "Назад" -->
    <?php if ($pagination['page_number'] != 1) : ?>
        <div class="section-pagination__item">
            <a class="pagination-button" href="?page=<?php echo $pagination['page_number'] - 1; ?>">
                назад
            </a>
        </div>
    <?php endif; ?>
    <!-- // Кнопка "Назад" -->

    <!-- Кнопки с номерами страниц "1" "2" "3" -->
    <?php for ($page = 1; $page <= $pagination['number_of_pages']; $page++) : ?>
        <div class="section-pagination__item">
            <a class="
                    pagination-button
                    <?php echo $pagination['page_number'] == $page ? 'active' : ''; ?>
                    " href="?page=<?= $page ?>"><?= $page ?></a>
        </div>
    <?php endfor; ?>
    <!-- // Кнопки с номерами страниц "1" "2" "3" -->

    <!-- Кнопка "Вперед" -->
    <?php if ($pagination['page_number'] !=  $pagination['number_of_pages']) : ?>
        <div class="section-pagination__item">
            <a class="pagination-button" href="?page=<?php echo $pagination['page_number'] + 1; ?>">
                вперед
            </a>
        </div>
    <?php endif; ?>
    <!-- // Кнопка "Вперед" -->


</div>