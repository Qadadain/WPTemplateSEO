<?php get_header(); ?>
<?php
// get latest posts
$latest_posts = get_posts([
    'numberposts' => 10,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish'
]);
?>
    <main class="mt-fixed">
        <div class="home-container">
            <section>
                <div>
                    <?php $counter = 0;
                    foreach ($latest_posts as $post):
                        $counter++;
                        if ($counter <= 2 || ($counter > 5 && $counter <= 7)) {
                            $article_class = "big-article";
                        } else {
                            $article_class = "medium-article";
                        }
                        ?>
                        <article class="<?php echo $article_class; ?>">
                            <div class="header-article">
                                <div class="category">
                                    <span><?php echo get_the_category($post->ID)[0]->cat_name; ?></span>
                                </div>
                                <h2><?php echo $post->post_title; ?></h2>
                            </div>
                            <figure class="figure">
                                <img src="<?php echo get_the_post_thumbnail_url($post); ?>" alt="<?php echo $post->post_title; ?>">
                            </figure>
                            <div class="footer-article">
                                <?php echo get_the_excerpt($post); ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
            <aside>
                <div class="sticky-aside">
                aside

                </div>
                <?php //ICI sidebar ?>

            </aside>
        </div>
        <section>
            <div>
                <?php //ICI Autres ?>

            </div>
        </section>
    </main>
<?php get_footer();
