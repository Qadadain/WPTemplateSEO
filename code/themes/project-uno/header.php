<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <!-- Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<header class="header">
    <div>
        <a href="" class="logo">Logo</a>
        <input class="menu-btn" type="checkbox" id="menu-btn"/>
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <?php
        $categories = get_categories( array(
            'orderby' => 'name',
            'parent'  => 0
        ) ); ?>
        <ul class="menu">
        <?php
        foreach ( $categories as $category ) {
            printf( '<li><a href="%1$s">%2$s</a></li>',
                esc_url( get_category_link( $category->term_id ) ),
                esc_html( $category->name )
            );
        }
        ?>
        </ul>
    </div>
</header>
<?php
