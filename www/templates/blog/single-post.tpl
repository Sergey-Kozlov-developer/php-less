<main class="page-post">
    <section class="page-post__post">
        <div class="section-posts">
            <div class="section-posts__title">
                <h1 class="heading"><?= $post['title'] ?></h1>
            </div>
            <div class="section-posts__info">
				<span>
					<?php echo rus_date("j F Y", $post['timestamp']); ?>
				</span>
                <?php if (!empty($post['cat_title'])) : ?>
                    <a href="<?= HOST ?>blog/cat/<?= $post['cat'] ?>" class="badge"><?= $post['cat_title'] ?></a>
                <?php endif; ?>
            </div>

            <?php if (!empty($post['cover'])) : ?>
                <div class="section-posts__img">
                    <img src="<?= HOST ?>usercontent/blog/<?= $post['cover'] ?>" alt="<?= $post['title'] ?>"/>
                </div>
            <?php endif; ?>

            <div class="section-posts__content">
                <?= $post['content'] ?>
            </div>
        </div>

        <?php include ROOT . "templates/blog/parts/post-nav.tpl" ?>

    </section>

    <?php include ROOT . "templates/blog/parts/comments.tpl" ?>
    <?php include ROOT . "templates/blog/parts/comments-form.tpl" ?>

    <section class="page-post__see-also">
        <div class="container">
            <div class="page-post__title">
                <h2 class="heading">Смотрите также </h2>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="card-post">
                        <div class="card-post__img"><a href="#"><img src="./img/posts/post-10.jpg"
                                                                     alt="Как устроена подземка в NY. Плюсы и минусы"/></a>
                        </div>
                        <h4 class="card-post__title"><a href="#"> Как устроена подземка в NY. Плюсы и минусы</a></h4>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card-post">
                        <div class="card-post__img"><a href="#"><img src="./img/posts/post-11.jpg"
                                                                     alt="Летние воспоминания. Трекинг поход по Кавказским горам"/></a>
                        </div>
                        <h4 class="card-post__title"><a href="#"> Летние воспоминания. Трекинг поход по Кавказским
                                горам</a></h4>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card-post">
                        <div class="card-post__img"><a href="#"><img src="./img/posts/post-12.jpg"
                                                                     alt="Купил дрон. Впечатления и фотосессия "/></a>
                        </div>
                        <h4 class="card-post__title"><a href="#"> Купил дрон. Впечатления и фотосессия </a></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>