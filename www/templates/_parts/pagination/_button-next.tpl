<?php if ( $page_number != $number_of_pages  ) : ?>
    <div class="section-pagination__item">
        <a class="pagination-button" href="?page=<?php echo $page_number + 1; ?>">вперед</a>
    </div>
    <?endif;?>