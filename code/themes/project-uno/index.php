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
                        <h3>Catégories</h3>
                        <?php
                        $categories = get_categories(array(
                            'parent' => 0
                        ));
                        foreach ($categories as $category) {
                            echo '<div class="category">';
                            echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';

                            // Récupérer les sous-catégories
                            $subcategories = get_categories(array(
                                'child_of' => $category->term_id,
                                'hide_empty' => 0
                            ));

                            if ($subcategories) {
                                echo '<ul>';
                                foreach ($subcategories as $subcategory) {
                                    echo '<li><a href="' . get_category_link($subcategory->term_id) . '">' . $subcategory->name . '</a></li>';
                                }
                                echo '</ul>';
                            }

                            echo '</div>';
                        }
                        ?>
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
