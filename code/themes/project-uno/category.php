<?php get_header(); ?>
    <main class="mt-fixed">
        <div class="category-container">
            <section>
                <div>
                    <?php
                    global $wp_query;
                    $category_slug = $wp_query->query['category_name'];
                    $query = get_custom_category_posts($category_slug);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            $article_class = "big-article post-list";
                            include 'Components/card.php';
                        endwhile;
                    endif;
                    ?>
                </div>
                <?php wp_reset_postdata(); ?>
                <div class="pagination-container">
                    <?php blog_pagination($category_slug); ?>
                </div>
            </section>
        </div>
    </main>
<?php get_footer();
