    <?php if ($page_number != 1) : ?>
        <div class="section-pagination__item">
            <a class="pagination-button" href="?page=<?php echo $page_number - 1; ?>">назад</a>
        </div>
    <?php endif; ?>