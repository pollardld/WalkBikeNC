<?php get_header();

	$post_type = get_post_type(); 
	
	while ( have_posts() ) : the_post(); ?>

		<div class="overflow-hidden">

			<?php get_template_part( 'content', 'page_bg' ); ?>

			<main class="overflow-visible">

				<div class="container spread overflow-visible">

					<?php get_template_part( 'content', 'sidebar_page' ); ?>

					<article class="content spread">

						<div class="span9">
						<?php 
							$page_id = get_the_ID();
							$ancestors = get_ancestors( $page_id, 'page' );
							
							if ( $ancestors ) {
								$ancestor = $ancestors[0];
							} else {
								$ancestor = 0;
							}

							if ( $ancestor == 7 ) : ?>
								
								<h1>Introduction</h1>

							<?php else : ?>
								
								<h1><?php the_title(); ?></h1>
							
							<?php endif;
							
							the_content(); ?>

						</div>

						<div class="span3">
							<?php get_template_part( 'content', 'sidebar_pillars' ); ?>
						</div>

					</article>

				</div>

			</main>

		</div>

	<?php endwhile; ?>

<?php get_footer(); ?>