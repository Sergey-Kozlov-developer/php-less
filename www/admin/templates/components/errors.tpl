<?php

    // Проверка что массив $errors НЕ пуст, значит есть ошиьки на вывод
    if ( !empty($_SESSION['errors'])):

        // Обходим массив, выводя каждую ошибку
        foreach ($_SESSION['errors'] as $error ):

            // Если в ошибке только заголовок
            if ( count($error) == 1):
            ?>
                <div class="notifications mb-20">
                    <div class="notifications__title notifications__title--error">
                        <?php echo $error['title'];?>
                    </div>
                </div>
            <?php
            // Если в ошибке заголовок с описанием
            elseif ( count($error) == 2):
            ?>
                <div class="notifications mb-20 notifications__title--with-message">
					<div class="notifications__title notifications__title--error"><?php echo $error['title']; ?></div>
					<div class="notifications__message">
						<?php echo $error['desc']; ?>
					</div>
				</div>
            <?php
            endif;
        endforeach;

        $_SESSION['errors'] = array();
    endif;
?>