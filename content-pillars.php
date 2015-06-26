<div class="main spread">

	<aside class="span3 home-sidebar">
		
		<?php wp_nav_menu( array(
			'theme_location' => 'sidebar-menu',
			'container' => false,
			'items_wrap' => '<ul class="main-nav">%3$s</ul>'
		)); ?>
	
	</aside>
	
	<section class="span9 pillars-intro">

		<?php if ( is_active_sidebar( 'pillars_intro' ) ) : ?>
			<?php dynamic_sidebar( 'pillars_intro' ); ?>
		<?php endif; ?>
		
	</section>

</div>

<div class="pillars">

<?php 
	$args = array(
		'post_type' => 'page',
		'post_parent' => 7
	);
	
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) :
		
		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				
			<article id="post-<?php the_ID(); ?>">

				<div class="container spread">

					<div class="span3">
						<div class="span10">
							<?php the_post_thumbnail( 'featured-image' ); ?>
						</div>
					</div>

					<div class="span9">
						
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								
						<?php 
							$excerpt = get_field( 'page_excerpt' ); 

							if ($excerpt) :
								echo $excerpt;
							else :
								the_content();
							endif;
						?>

						<a href="<?php the_permalink(); ?>" class="more-detail">Find Out More <span>&rsaquo;</span></a>

					</div>
					
				</div>

			</article>

		<?php endwhile; ?>

		<?php wp_reset_query(); ?>

	<?php endif; ?>

	<button class="tiptop">Back To Top <span>&and;</span></button>

</div>