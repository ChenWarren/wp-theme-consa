<?php
/**
 * Cosa Theme Contact Page
 * 
 * @package consa
 */

get_header();
?>

<!-- contact section start -->
<?php get_template_part('template-parts/home/home-contact'); ?>
<!-- contact section end -->

<?php the_title(); 

the_content();
?>

<?php get_footer(); ?>