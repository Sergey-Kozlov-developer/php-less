<?php
require("./config.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Post - Travel Blog";
include(ROOT . "templates/head.tpl");
?>


<body>
    <?php
    include(ROOT . "templates/navigation.tpl");
    include(ROOT . "templates/header.tpl");


    ?>


    <main class="container">
        <div class="content-wrapper">

            <!-- Content -->
            <div class="content">
                <article class="post">
                    <div class="post-content">
                        <div class="post__title">Single post page</div>
                        <div class="post__text">
                            <p>Ted fermentum sed felis ut eleifend. Integer
                                laoreet massa sed leo rhoncus, non posuere eros
                                varius. Sed congue ligula leo, in molestie
                                mauris viverra quis. Ut a dui a lectus molestie
                                pulvinar id non magna. Nam blandit dictum ante
                                id venenatis.</p>

                            <div class="post-img" style=" background-image: url(./img/post/post-2.jpg); "></div>

                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem, labore iusto sit,
                                eligendi numquam at ex voluptates cumque ducimus sapiente reprehenderit, nihil adipisci
                                nesciunt vitae mollitia illo animi modi explicabo.</p>
                            <p>Quasi quisquam accusamus ullam impedit animi, autem exercitationem laboriosam maxime
                                praesentium quidem assumenda numquam aspernatur hic incidunt rerum architecto. Est ad
                                ratione non impedit autem, quas culpa quasi facere reiciendis.</p>

                            <div class="post-img" style=" background-image: url(./img/post/post-1.jpg); "></div>

                            <p>Beatae rem eligendi est aspernatur blanditiis ad nobis saepe voluptas reiciendis laborum
                                tempora perspiciatis, suscipit ipsam soluta debitis sint provident amet dolorum
                                voluptatibus hic dignissimos illo unde nihil odit. Dolore.</p>

                            <div class="post-img" style=" background-image: url(./img/post/post-3.jpg); "></div>

                            <p>Ullam modi excepturi earum placeat beatae ad nostrum eius quia omnis, blanditiis quisquam
                                voluptatum. Porro quisquam perspiciatis temporibus incidunt, vitae illo repellat quod
                                dolorum? Esse aliquid nesciunt iure unde minus.</p>
                        </div>
                    </div>
                </article>
            </div>
            <!-- //Content -->

            <!-- Sidebar -->
            <div class="sidebar">
                <?php
                include(ROOT . "templates/sidebar.tpl");
                ?>
            </div>
            <!-- //Sidebar -->
        </div>
    </main>

    <?php
    include(ROOT . "templates/footer.tpl");
    ?>
</body>

</html>