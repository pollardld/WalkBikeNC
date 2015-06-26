<section class="other-pillars">
	
	<strong class="other-title">Find out more about the 5 Pillars of the Plan</strong>

	<?php 

	$args = array(
		'post_type' => 'page',
		'post_parent' => 7
	);
	
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) :
		
		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<section class="spread">

				<div class="span3">
					<?php the_post_thumbnail( 'featured-image' ); ?>
				</div>

				<div class="span1">&nbsp;</div>

				<div class="span8">
					<a href="<?php the_permalink(); ?>" class="other-link"><?php the_title(); ?></a>
				</div>

			</section>

		<?php endwhile;

		wp_reset_query();
		
	endif; ?>

</section>