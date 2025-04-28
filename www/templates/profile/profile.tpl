<main class="page-profile">

    <!-- Если пользователь открывает profile и не залогинился -->
    <?php if (isset($userNotLoggedIn)) : ?>
        <div class="section">
            <div class="container">
                <div class="section__title">
                    <h2 class="heading mb-25">Профиль пользователя</h2>
                    <p>Чтобы посмотреть свой профиль
                        <a href="<?= HOST ?>login">войдите</a>
                        либо
                        <a href="<?= HOST ?>registration">зарегистрируйтесь</a>.</p>
                </div>
            </div>
        </div>
        <!-- Если пользователь с таким ID не существует -->
    <?php elseif ($user['id'] === 0) : ?>
        <div class="section">
            <div class="container">
                <div class="section__title">
                    <h2 class="heading mb-25">Такого пользователя не существует</h2>
                    <p><a href="<?= HOST ?>">Вернуться на главную</a>.</p>
                </div>
            </div>
        </div>
        <!-- Если пользователь НАЙДЕН -->
    <?php else : ?>
        <div class="section">
            <div class="container">
                <div class="section__title">
                    <h2 class="heading">Профиль пользователя </h2>
                </div>
                <div class="section__body">
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <div class="avatar-big">
                                <img src="<?= HOST ?>static/img/section-about-me/img-01.jpg" alt="Аватарка" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="definition-list mb-20">
                                <dl class="definition">
                                    <dt class="definition__term">имя и фамилия</dt>
                                    <dd class="definition__description"> <?= $user->name ?> <?= $user->surname ?></dd>
                                </dl>
                                <dl class="definition">
                                    <dt class="definition__term">Страна, город</dt>
                                    <dd class="definition__description"> <?= $user->country ?>, <?= $user->city ?></dd>
                                </dl>
                            </div>


<!-- Проверяем что пользователь Залогинен. Юзер либо Админ -->
<?php if (isset($_SESSION['login']) && $_SESSION['login'] === 1) :
        // Прооверка на юзера или админа
        $btnLink = $_SESSION['logged_user']['role'] === 'admin' ? '/' . $user->id : '';
?>

    <a class="secondary-button" href="<?= HOST . 'profile-edit' . $btnLink?>">Редактировать</a>

<?php endif; ?>









                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section bg-grey">
            <div class="container">
                <div class="section__title">
                    <h2 class="heading">Комментарии пользователя </h2>
                </div>
                <div class="section__body">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="comment">
                                <div class="comment__avatar"><a href="#">
                                        <div class="avatar-small">
                                            <img src="<?= HOST ?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" />
                                        </div>
                                    </a>
                                </div>
                                <div class="comment__data">
                                    <div class="comment__user-info">
                                        <div class="comment__username">Джон До</div>
                                        <div class="comment__date">
                                            <img src="<?= HOST ?>static/img/favicons/clock.svg" alt="Дата публикации" />
                                            05 мая 2017 года 15:45</div>
                                    </div>
                                    <div class="comment__text">
                                        <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="comment">
                                <div class="comment__avatar"><a href="#">
                                        <div class="avatar-small">
                                            <img src="<?= HOST ?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
                                    </a>
                                </div>
                                <div class="comment__data">
                                    <div class="comment__user-info">
                                        <div class="comment__username">Джон До</div>
                                        <div class="comment__date"><img src="<?= HOST ?>static/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
                                    </div>
                                    <div class="comment__text">
                                        <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="comment">
                                <div class="comment__avatar"><a href="#">
                                        <div class="avatar-small"><img src="<?= HOST ?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
                                    </a>
                                </div>
                                <div class="comment__data">
                                    <div class="comment__user-info">
                                        <div class="comment__username">Джон До</div>
                                        <div class="comment__date"><img src="<?= HOST ?>static/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
                                    </div>
                                    <div class="comment__text">
                                        <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>