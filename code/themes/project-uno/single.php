<?php get_header(); ?>
    <main class="mt-fixed">
        <section class="section-post">
            <article>
                <div class="header-post">
                    <h1><?= get_the_title() ?></h1>
                    <time>Publié le <?= get_the_date() ?> </time>
                    <figure>
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                    </figure>
                </div>
                <section class="content">
                    <?php the_content(); ?>
                </section>

            </article>
        </section>
    </main>
<?php get_footer();