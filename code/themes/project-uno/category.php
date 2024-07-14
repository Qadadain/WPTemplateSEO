<?php get_header(); ?>
<main class="mt-fixed">
    <div class="category-container">
        <?php echo get_breadcrumbs(); ?>
        <section>
            <div class="post-grid">
                <?php
                global $wp_query;
                $category_slug = $wp_query->query['category_name'];
                $query = get_custom_category_posts($category_slug);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $article_class = "big-article post-list";
                        include 'Components/card.php';
                    endwhile;
                else :
                    echo '<p>Postes non trouvés</p>';
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
<?php get_footer(); ?>
