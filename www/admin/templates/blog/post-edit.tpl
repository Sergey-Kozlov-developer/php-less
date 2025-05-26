<script src="<?php echo HOST; ?>libs/ckeditor/ckeditor.js"></script>


<div class="admin-page__content-form">

    <form enctype="multipart/form-data" class="admin-form" method="POST" action="<?= HOST ?>admin/post-new">

        <?php include ROOT . 'admin/templates/components/errors.tpl'; ?>
        <?php include ROOT . 'admin/templates/components/success.tpl'; ?>

        <div class="admin-form__item">
            <h2 class="heading">Редактировать пост </h2>
        </div>
        <div class="admin-form__item">
            <label class="input__label">
                Введите название записи
                <input name="title" class="input input--width-label" type="text" placeholder="Заголовок поста"/>
            </label>
        </div>
        <div class="admin-form__item">
            <label class="select-label">Выберите категорию
                <select class="select">
                    <option value="notes1">Заметки путешественника</option>
                    <option value="notes2">Заметки программиста</option>
                    <option value="notes3">Заметки спортсмена</option>
                </select>
            </label>
        </div>
        <div class="admin-form__item">
            <label class="textarea__label mb-15" for="editor">Содержимое поста</label>
            <textarea id="editor" name="content" class="textarea textarea--width-label"
                      placeholder="Введите текст"></textarea>

        </div>
        <div class="admin-form__item">
            <div class="block-upload">
                <div class="block-upload__description">
                    <div class="block-upload__title">Обложка поста:</div>
                    <p>Изображение jpg или png, рекомендуемая ширина 945px и больше, высота от 400px и более. Вес до
                        2Мб.</p>
                    <div class="block-upload__file-wrapper">
                        <input name="cover" class="file-button" type="file">
                    </div>
                </div>
                <div class="block-upload__img">
                    <img src="<?= HOST ?>static/img/block-upload/block-upload.jpg" alt="Загрузка картинки"/>
                </div>
            </div>

            <?php /* if (!empty($user->avatar)) : ?>
                    <label class="checkbox__item mt-15">
                        <input class="checkbox__btn" type="checkbox" name="delete-avatar">
                        <span class="checkbox__label">Удалить фотографию</span>
                    </label>
                <?php endif; */ ?>


        </div>
        <div class="admin-form__item buttons">
            <button name="postSubmit" class="primary-button" type="submit">Опубликовать</button>
            <a class="secondary-button" href="#">Отмена</a>
        </div>
        <div class="admin-form__item"></div>
        <div class="admin-form__item"></div>
    </form>
</div>

<script>
    CKEDITOR.replace('editor', {

        filebrowserUploadMethod: 'form',
        filebrowserUploadUrl: '<?php echo HOST; ?>libs/ck-upload/upload.php'
    });
</script>