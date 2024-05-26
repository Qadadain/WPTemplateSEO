<?php get_header(); ?>
    <main class="mt-fixed">
        <div class="category-container">
            <section>
                <div>
                    <?php
                    global $wp_query;
                    $category_slug = $wp_query->query['category_name'];
                    $category = get_category_by_slug($category_slug);
                    $paged = get_page_number();

                    $postsArgs = [
                        'numberposts' => 12,
                        'category' => $category->term_id,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'paged' => $paged
                    ];
                    $posts = get_posts($postsArgs);


                    $counter = 0;
                    foreach ($posts as $post):
                        $article_class = "big-article post-list";
                        include 'Components/card.php';
                    endforeach; ?>
                </div>
                <?php wp_reset_postdata(); ?>
                <div class="pagination-container">
                    <?php blog_pagination($posts); ?>
                </div>
            </section>
        </div>
    </main>
<?php get_footer();
