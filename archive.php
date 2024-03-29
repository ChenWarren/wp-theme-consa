<?php
/**
 * Cosa Theme archive page
 */
get_header();
?>

<!-- blog section start -->
<?php get_template_part('template-parts/home/home-blog'); ?>
<!-- blog section end -->

	<?php if ( have_posts() ) : ?>

		<header>
			<h1><?php 
			preg_match( '/<span>(.*?)<\/span>/s', get_the_archive_title(), $match);
			echo esc_html($match[1]);
			?></h1>
			<?php
			the_archive_description( '<div>', '</div>' );
			?>
		</header><!-- .page-header -->

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

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>


<?php

get_footer();