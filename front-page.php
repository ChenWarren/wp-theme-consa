<?php
/**
 * Cosa Theme Home page
 */

 get_header();  
 ?>

<!--banner section start -->
<div class="header_section">
    <?php get_template_part('template-parts/home/banner'); ?>
</div>
<!--banner section end -->

<!--about section start -->
<?php get_template_part('template-parts/home/home-about'); ?>
<!--about section end -->

<!-- services section start -->
<?php get_template_part('template-parts/home/home-services'); ?>
<!-- services section end -->

<!-- blog section start -->
<?php get_template_part('template-parts/home/home-blog'); ?>
<!-- blog section end -->

<!-- events section start -->
<?php get_template_part('template-parts/home/home-events'); ?>
<!-- events section end -->

<!-- testimonial section start -->
<?php get_template_part('template-parts/home/home-testimonial'); ?>
<!-- testimonial section end -->

<!-- contact section start -->
<?php get_template_part('template-parts/home/home-contact'); ?>
<!-- contact section end -->

<?php get_footer(); ?>