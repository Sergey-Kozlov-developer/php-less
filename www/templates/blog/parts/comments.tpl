<?php if (count($comments)): ?>

<section class="page-post__comments">
    <div class="page-post__title">
        <h2 class="heading">Комментарий к посту: <?=count($comments)?> </h2>
    </div>
    <?php foreach ($comments as $comment): ?>
        <div class="page-post__comments-comment">
            <div class="comment">
                <div class="comment__avatar">
                    <a href="<?=HOST?>profile/<?=$comment['user']?>">
                        <div class="avatar-small">
                            <?php if(!empty($comment['avatar_small'])): ?>
                                <img src="<?=HOST?>usercontent/avatars/<?=$comment['avatar_small']?>" alt="Аватарка"/>
                            <?php else: ?>
                                <img src="<?=HOST?>usercontent/avatars/no-avatar.svg" alt="Аватарка"/>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
                <div class="comment__data">
                    <div class="comment__user-info">
                        <div class="comment__username">
                            <a href="<?=HOST?>profile/<?=$comment['user']?>">
                                <?=$comment['name']?> <?=$comment['surname']?>
                            </a>

                        </div>
                        <div class="comment__date">
                            <img src="<?=HOST?>static/img/favicons/clock.svg" alt="Дата публикации"/>
                            <?=rus_date("j F Y, H:i", $comment['timestamp'])?>
                        </div>
                    </div>
                    <div class="comment__text">
                        <p><?=$comment['text']?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</section>
<?php endif; ?>