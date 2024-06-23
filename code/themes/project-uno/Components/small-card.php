<article class="small-article">
    <a  href="<?php echo get_permalink($post); ?>">
        <div>
            <figure class="figure">
                <img src="<?php echo get_the_post_thumbnail_url($post); ?>" alt="<?php echo $post->post_title; ?>">
            </figure>
        </div>
        <div>
            <h2><?php echo $post->post_title; ?></h2>
                <time><?php echo get_the_date('j M Y', $post->ID);  ?></time>
            </div>
    </a>
</article>