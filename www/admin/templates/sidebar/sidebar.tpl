<div class="admin-page__left-panel">
    <div class="control-panel">
        <div class="control-panel__container">
            <a href="<?=HOST?>" class="control-panel__title-wrapper">
                <h2 class="control-panel__title">Digital Nomad</h2>
                <p class="control-panel__subtitle">панель управления</p>
            </a>
            <ul class="control-panel__list">

                <?php include ROOT . "admin/templates/sidebar/links/_main.tpl"; ?>
                <?php include ROOT . "admin/templates/sidebar/links/_blog.tpl"; ?>
                <?php include ROOT . "admin/templates/sidebar/links/_cats.tpl"; ?>
                <?php include ROOT . "admin/templates/sidebar/links/_contacts.tpl"; ?>
                <?php include ROOT . "admin/templates/sidebar/links/_profile.tpl"; ?>
                <?php include ROOT . "admin/templates/sidebar/links/_settings.tpl"; ?>

<!--                <li class="control-panel__list-item"><a class="control-panel__list-link" href="#">-->
<!--                        <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="--><?php //= HOST ?><!--static/img/control-panel/portfolio.svg" alt="icon" />-->
<!--                        </div>Портфолио-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="control-panel__list-item"><a class="control-panel__list-link" href="#">-->
<!--                        <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="--><?php //= HOST ?><!--static/img/control-panel/file.svg" alt="icon" />-->
<!--                        </div>Страницы-->
<!--                    </a>-->
<!--                </li>-->


<!--                <li class="control-panel__list-item"><a class="control-panel__list-link" href="#">-->
<!--                        <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="--><?php //= HOST ?><!--static/img/control-panel/message.svg" alt="icon" />-->
<!--                            <div class="control-panel__list-img-badge">15</div>-->
<!--                        </div>Комментарии-->
<!--                    </a>-->
<!--                </li>-->

<!--                <li class="control-panel__list-item"><a class="control-panel__list-link" href="#">-->
<!--                        <div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="--><?php //= HOST ?><!--static/img/control-panel/users.svg" alt="icon" />-->
<!--                        </div>Пользователи-->
<!--                    </a>-->
<!--                </li>-->


            </ul>
        </div>
        <ul class="control-panel__list">

            <?php include ROOT . "admin/templates/sidebar/links/_profile.tpl"; ?>
            <?php include ROOT . "admin/templates/sidebar/links/_exit.tpl"; ?>


        </ul>
    </div>
</div>