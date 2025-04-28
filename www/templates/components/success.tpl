<?php
    // Проверка что массив $errors НЕ пуст, значит есть ошиьки на вывод
    if ( !empty($_SESSION['success'])):

        // Обходим массив, выводя каждую ошибку
        foreach ($_SESSION['success'] as $item ):

            // Если в ошибке только заголовок
            if ( count($item) == 1):
            ?>
                <div class="notifications mb-20">
                    <div class="notifications__title notifications__title--success"><?php echo $item['title'];?></div>
                </div>
            <?php
            // Если в ошибке заголовок с описанием
            elseif ( count($item) == 2):
            ?>
                <div class="notifications mb-20 notifications__title--with-message">
					<div class="notifications__title notifications__title--success"><?php echo $item['title']; ?></div>
					<div class="notifications__message">
						<?php echo $item['desc']; ?>
					</div>
				</div>
            <?php
            endif;
        endforeach;

        $_SESSION['success'] = array();
    endif;
?>