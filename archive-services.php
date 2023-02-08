<?php
/**
 * Cosa Theme Services archive page
 */
get_header();
?>

<div class="services_section layout_padding">
    <div class="container">

        <?php if ( have_posts() ) : ?>


        <h1 class="services_taital">
            <?php //
                //preg_match( '/<span>(.*?)<\/span>/s', get_the_archive_title(), $match);
                //echo esc_html($match[1]);
            ?>
            What We Do
        </h1>
        <p class="about_text">
            <?php
            preg_match(('/<p>(.*?)<\/p>/s'), get_the_archive_description(), $match_des);
            echo esc_html($match_des[1]);
            ?>
        </p>

        <div class="services_section_2">
            <div class="row">

                <?php
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();

                    /*
                    * Include the Post-Type-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                    */
                    get_template_part( 'template-parts/content/content', get_post_type() );

                endwhile;

                the_posts_navigation();

                else :

                    get_template_part( 'template-parts/content/content', 'none' );

                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<!-- testimonial section start -->
<?php get_template_part('template-parts/home/home-testimonial'); ?>
<!-- testimonial section end -->

<?php
get_footer();