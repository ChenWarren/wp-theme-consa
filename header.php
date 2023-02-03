<?php

/**
 * Cosa Theme header
 * 
 * @package consa
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body>
    <?php wp_body_open(); ?>

    <!--header section start -->
    <div class="header_section">

        <!--header section start -->
        <?php get_template_part('template-parts/header/navbar'); ?>
        <!--header section end -->

        <!--banner section start -->
        <?php get_template_part('template-parts/header/banner'); ?>
        <!--banner section end -->
    </div>
    <!--header section end -->