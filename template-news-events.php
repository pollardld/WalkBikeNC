<?php 
/*
* Template Name: News and Events
*/
get_header();

$post_type = get_post_type(); ?>

<div class="overflow-hidden">

	<?php get_template_part( 'content', 'single_bg' ); ?>

	<main class="overflow-visible">

		<div class="container spread overflow-visible">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'sidebar_page' ); ?>

				<article class="content spread">

					<div class="span9">
						
						<h1 class="page-title"><?php the_title(); ?></h1>
						
						<div class="span12">
							<?php the_content(); ?>
						</div>

						<?php 

							$args = array(
								'post_type'      => 'news_events',
								'paged'          => $paged,
								'posts_per_page' => 8
							);

							query_posts( $args );

							while ( have_posts() ) : the_post(); 
						?>

							<article class="news-post">

								<div class="news-content">
									
									<span class="post-date">
										<span class="day"><?php the_time('j'); ?></span>
										<span class="month"><?php the_time('M'); ?></span>
									</span>

									<h1>
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h1>

									<a href="<?php the_permalink(); ?>" class="news-image"><?php the_post_thumbnail( 'news_thumb' ); ?></a>

									<div class="news-excerpt">
										<?php the_excerpt(); ?>
									</div>

								</div>

							</article>

						<?php 
							endwhile;

							wp_reset_query();

						?>

					</div>

					<div class="span3">
						<?php get_template_part( 'content', 'sidebar_pillars' ); ?>
					</div>

				</article>
					
			<?php endwhile; ?>

		</div>

	</main>

</div>

<?php get_footer(); ?>