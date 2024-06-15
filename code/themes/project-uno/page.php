<?php get_header(); ?>
    <div class="mt-fixed">
        <div class="page-header">
            <h1><?= the_title() ?></h1>
        </div>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
    </div>
<?php get_footer();
