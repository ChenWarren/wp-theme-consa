<?php
/**
 * Cosa Theme Content Services template
 */
?>

<div class="col-lg-4">
	<div class="icon_box">
		<div class="icon_1">
		<?php
		the_post_thumbnail('thumbnail');
		?>
		</div>
	</div>
	<h4 class="selection_text">
		<?php 
		if ( is_singular() ) :
			the_title();
		else :
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		endif;
		?>
	</h4>
	<p class="ipsum_text">
		<?php
		the_excerpt();
		?>
	</p>
</div>
	
<div>
	<?php
	
	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'consa' ),
			'after'  => '</div>',
		)
	);
	?>
</div>