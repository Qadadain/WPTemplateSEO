<?php get_header(); ?>
    <div class="mt-fixed">
        <div class="page-content">
        <div class="page-title">
            <h1><?= the_title() ?></h1>
        </div>
            <?php the_content(); ?>
        </div>
    </div>
<?php get_footer();
