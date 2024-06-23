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
                        include 'Components/card.php';
                    endforeach; ?>
                </div>
            </section>
            <aside>
                <div class="sticky-aside">
                    <div>
                        <h3>Articles</h3>
                        <?php
                        $latest_posts = get_posts([
                            'numberposts' => 5, // change this to 5
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post_type' => 'post',
                            'post_status' => 'publish'
                        ]);
                        foreach ($latest_posts as $post):
                            include 'Components/small-card.php';
                        endforeach; ?>

                    </div>
                </div>
            </aside>
        </div>
        <section>
            <div>
                <?php //ICI Autres ?>

            </div>
        </section>
    </main>
<?php get_footer();
