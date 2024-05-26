<article class="<?php echo $article_class; ?>">
    <a href="<?php echo get_permalink($post); ?>">
        <div class="header-article">
            <div class="category">
                <?php foreach (get_the_category($post->ID) as $category): ?>
                    <span><?php echo $category->cat_name; ?></span>
                <?php endforeach; ?>
            </div>
            <h2><?php echo $post->post_title; ?></h2>
        </div>
        <figure class="figure">
            <img src="<?php echo get_the_post_thumbnail_url($post); ?>" alt="<?php echo $post->post_title; ?>">
        </figure>
        <div class="footer-article">
            <?php echo get_the_excerpt($post); ?>
        </div>
    </a>
</article>