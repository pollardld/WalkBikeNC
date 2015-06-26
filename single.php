<?php get_header();

$post_type = get_post_type(); ?>

<div class="overflow-hidden">

	<?php get_template_part( 'content', 'single_bg' ); ?>

	<main class="overflow-visible">

		<div class="container spread overflow-visible">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'sidebar_single' ); ?>

				<article class="content spread">

					<div class="span9">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
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