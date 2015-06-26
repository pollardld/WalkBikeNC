<?php get_header();

if ( have_posts() ) : ?>

	<main class="overflow-visible">

		<div class="container spread">

			<article class="span9">
				
				<h1><?php printf( __( 'Search Results for: %s', 'walkbikenc' ), get_search_query() ); ?></h1>

				<?php while ( have_posts() ) : the_post(); ?>

					<article>

						<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>

						<p><?php the_excerpt(); ?></p>

					</article>

				<?php endwhile; ?>

			</article>

			<div class="span3">
				<?php get_template_part( 'content', 'sidebar_pillars' ); ?>
			</div>

		</div>

	</main>

<?php else : ?>

	<main class="overflow-visible">

		<div class="container spread">

			<article class="span9">
				
				<h1><?php printf( __( 'Search Results for: %s', 'walkbikenc' ), get_search_query() ); ?></h1>

				<h5>No Results</h5>

				<h6>Try another search</h6>

				<?php get_search_form(); ?>

			</article>

			<div class="span3">
				<?php get_template_part( 'content', 'sidebar_pillars' ); ?>
			</div>

		</div>

	</main>

<?php endif; ?>

<?php get_footer(); ?>